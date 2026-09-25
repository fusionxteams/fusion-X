
document.addEventListener("DOMContentLoaded", () => {
    const stringElement = document.querySelector('.charm-string');
    const charmElement = document.querySelector('.charm-object');
    
    if (!stringElement || !charmElement) return;

    let angle = 0.2; 
    let aVelocity = 0.0;
    let aAcceleration = 0.0;
    
    // Slingshot variables
    let pullY = 0; // How far down the charm is pulled
    let pVelocity = 0.0;
    
    const gravity = 0.4; 
    const length = 70; 
    const damping = 0.985; 
    const springDamping = 0.8;
    
    let isDragging = false;
    let startY = 0;
    
    stringElement.style.animation = 'none';
    charmElement.style.cursor = 'grab';

    function updatePhysics() {
        if (!isDragging) {
            // Pendulum Swing
            aAcceleration = (-1 * gravity / length) * Math.sin(angle);
            aVelocity += aAcceleration;
            aVelocity *= damping;
            angle += aVelocity;
            
            // Spring bounce-back for Y position
            if (pullY !== 0) {
                let pAcceleration = (0 - pullY) * 0.3; // Spring force towards 0
                pVelocity += pAcceleration;
                pVelocity *= springDamping;
                pullY += pVelocity;
                
                // Snap to 0 if very close to stop jitter
                if (Math.abs(pullY) < 0.5 && Math.abs(pVelocity) < 0.5) {
                    pullY = 0;
                    pVelocity = 0;
                }
            }
        }
        
        const degrees = angle * (180 / Math.PI);
        // Rotate the string
        stringElement.style.transform = `rotate(${degrees}deg)`;
        
        // Translate the charm element DOWN the string
        charmElement.style.transform = `translateY(${pullY}px)`;
        
        requestAnimationFrame(updatePhysics);
    }

    updatePhysics();

    function startDrag(e) {
        isDragging = true;
        charmElement.style.cursor = 'grabbing';
        aVelocity = 0;
        pVelocity = 0;
        
        if (e.touches && e.touches.length > 0) {
            startY = e.touches[0].clientY - pullY; // Offset by current pull
        } else {
            startY = e.clientY - pullY;
        }
        
        if (e.cancelable) e.preventDefault(); 
    }

    function drag(e) {
        if (!isDragging) return;
        
        const pivotRect = stringElement.getBoundingClientRect();
        const pivotX = pivotRect.left + (pivotRect.width / 2);
        const pivotY = pivotRect.top;
        
        let clientX = e.clientX;
        let clientY = e.clientY;
        if (e.touches && e.touches.length > 0) {
            clientX = e.touches[0].clientX;
            clientY = e.touches[0].clientY;
        }

        // --- PENDULUM ANGLE ---
        const dx = clientX - pivotX;
        const dy = clientY - pivotY;
        let newAngle = Math.atan2(dy, dx) - (Math.PI / 2);
        
        const maxAngle = Math.PI / 1.5; 
        if (newAngle > maxAngle) newAngle = maxAngle;
        if (newAngle < -maxAngle) newAngle = -maxAngle;
        angle = newAngle;
        
        // --- VERTICAL PULL (SLINGSHOT) ---
        let currentPull = clientY - startY;
        if (currentPull > 0) {
            // Resistance logic (harder to pull further)
            pullY = currentPull * 0.5; 
            if (pullY > 150) pullY = 150; // Max pull 150px
        } else {
            pullY = 0;
        }
    }

    function openFormModal() {
        if (document.getElementById('charm-contact-modal')) return;
        const modalHtml = `
            <div id="charm-contact-modal" style="position:fixed; inset:0; background:rgba(0,0,0,0.8); z-index:9999; display:flex; align-items:center; justify-content:center; backdrop-filter:blur(5px); opacity:0; transition:opacity 0.4s;">
                <div style="background:#fff; border-radius:15px; padding:40px; width:90%; max-width:500px; position:relative; transform:scale(0.8); transition:transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                    <button id="close-modal-btn" style="position:absolute; top:15px; right:15px; background:none; border:none; font-size:24px; cursor:pointer; color:#333;">&times;</button>
                    <h2 style="font-family:'Outfit', sans-serif; font-size:2rem; margin-top:0; color:#111; text-transform:uppercase;">Let's Connect</h2>
                    <p style="color:#666; margin-bottom:20px;">You've found the secret slingshot! Drop your details below.</p>
                    <form onsubmit="event.preventDefault(); alert('Form Submitted Successfully!'); document.getElementById('charm-contact-modal').remove();">
                        <input type="text" placeholder="Your Name" required style="width:100%; padding:12px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px; box-sizing:border-box; font-family:inherit;">
                        <input type="email" placeholder="Your Email" required style="width:100%; padding:12px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px; box-sizing:border-box; font-family:inherit;">
                        <textarea placeholder="Your Message" rows="4" required style="width:100%; padding:12px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px; box-sizing:border-box; font-family:inherit;"></textarea>
                        <button type="submit" style="width:100%; padding:15px; background:#ff5722; color:#fff; border:none; border-radius:5px; font-weight:bold; font-size:1.1rem; cursor:pointer; text-transform:uppercase;">Send Message</button>
                    </form>
                </div>
            </div>
        `;
        document.body.insertAdjacentHTML('beforeend', modalHtml);
        
        setTimeout(() => {
            const modal = document.getElementById('charm-contact-modal');
            modal.style.opacity = '1';
            modal.children[0].style.transform = 'scale(1)';
        }, 10);
        
        document.getElementById('close-modal-btn').addEventListener('click', () => {
            const modal = document.getElementById('charm-contact-modal');
            modal.style.opacity = '0';
            modal.children[0].style.transform = 'scale(0.8)';
            setTimeout(() => modal.remove(), 400);
        });
    }

    function endDrag() {
        if (isDragging) {
            isDragging = false;
            charmElement.style.cursor = 'grab';
            
            // SLINGSHOT TRIGGER: If pulled down more than 60px!
            if (pullY > 60) {
                // Snap back violently
                pVelocity = -40; // High upward velocity
                aVelocity = (Math.random() - 0.5) * 0.5; // Add some chaotic swing
                openFormModal();
            } else if (Math.abs(angle) > Math.PI / 3) {
                // Fallback for extreme side swing
                aVelocity = angle > 0 ? -1.5 : 1.5;
                openFormModal();
            }
        }
    }

    charmElement.addEventListener('mousedown', startDrag);
    window.addEventListener('mousemove', drag);
    window.addEventListener('mouseup', endDrag);

    charmElement.addEventListener('touchstart', startDrag, { passive: false });
    window.addEventListener('touchmove', drag, { passive: false });
    window.addEventListener('touchend', endDrag);
});
