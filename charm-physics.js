
document.addEventListener("DOMContentLoaded", () => {
    const stringElement = document.querySelector('.charm-string');
    const charmElement = document.querySelector('.charm-object');
    
    if (!stringElement || !charmElement) return;

    let angle = 0.2; 
    let aVelocity = 0.0;
    let aAcceleration = 0.0;
    
    let pullX = 0;
    let pullY = 0; 
    
    const gravity = 0.4; 
    const length = 70; 
    const damping = 0.985; 
    
    let isDragging = false;
    let startX = 0;
    let startY = 0;
    
    let hasDetached = false;
    
    stringElement.style.animation = 'none';
    charmElement.style.cursor = 'grab';

    function updatePhysics() {
        if (hasDetached) return; // Stop physics if it flew away!

        if (!isDragging) {
            // Pendulum Swing
            aAcceleration = (-1 * gravity / length) * Math.sin(angle);
            aVelocity += aAcceleration;
            aVelocity *= damping;
            angle += aVelocity;
            
            // Snap back to 0 if let go without enough force
            pullX += (0 - pullX) * 0.2;
            pullY += (0 - pullY) * 0.2;
        }
        
        const degrees = angle * (180 / Math.PI);
        stringElement.style.transform = `rotate(${degrees}deg)`;
        charmElement.style.transform = `translate(${pullX}px, ${pullY}px)`;
        
        requestAnimationFrame(updatePhysics);
    }

    updatePhysics();

    function startDrag(e) {
        if (hasDetached) return;
        isDragging = true;
        charmElement.style.cursor = 'grabbing';
        aVelocity = 0;
        
        if (e.touches && e.touches.length > 0) {
            startX = e.touches[0].clientX - pullX;
            startY = e.touches[0].clientY - pullY;
        } else {
            startX = e.clientX - pullX;
            startY = e.clientY - pullY;
        }
        
        if (e.cancelable) e.preventDefault(); 
    }

    function drag(e) {
        if (!isDragging || hasDetached) return;
        
        let clientX = e.clientX;
        let clientY = e.clientY;
        if (e.touches && e.touches.length > 0) {
            clientX = e.touches[0].clientX;
            clientY = e.touches[0].clientY;
        }

        let dx = clientX - startX;
        let dy = clientY - startY;
        
        // Let them pull it anywhere like a rubber band!
        pullX = dx;
        pullY = dy;
        
        // Calculate hypotenuse for max stretch
        let dist = Math.sqrt(pullX*pullX + pullY*pullY);
        if (dist > 150) {
            pullX = (pullX/dist) * 150;
            pullY = (pullY/dist) * 150;
        }
    }

    function openFormModal() {
        if (document.getElementById('charm-contact-modal')) return;
        const modalHtml = `
            <div id="charm-contact-modal" style="position:fixed; inset:0; background:rgba(0,0,0,0.8); z-index:9999; display:flex; align-items:center; justify-content:center; backdrop-filter:blur(5px); opacity:0; transition:opacity 0.4s;">
                <div style="background:#fff; border-radius:15px; padding:40px; width:90%; max-width:500px; position:relative; transform:scale(0.8); transition:transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                    <button id="close-modal-btn" style="position:absolute; top:15px; right:15px; background:none; border:none; font-size:24px; cursor:pointer; color:#333;">&times;</button>
                    <h2 style="font-family:'Outfit', sans-serif; font-size:2rem; margin-top:0; color:#111; text-transform:uppercase;">Let's Connect</h2>
                    <p style="color:#666; margin-bottom:20px;">Direct hit! You found the secret form.</p>
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
        if (!isDragging || hasDetached) return;
        isDragging = false;
        charmElement.style.cursor = 'grab';
        
        let dist = Math.sqrt(pullX*pullX + pullY*pullY);
        
        // ANGRY BIRDS TRIGGER: If they pulled it more than 80px
        if (dist > 80) {
            hasDetached = true;
            
            // 1. Detach from string visually
            const rect = charmElement.getBoundingClientRect();
            
            // Move charm to body so it flies freely over everything
            document.body.appendChild(charmElement);
            charmElement.style.position = 'fixed';
            charmElement.style.left = rect.left + 'px';
            charmElement.style.top = rect.top + 'px';
            charmElement.style.margin = '0';
            charmElement.style.transform = 'none';
            charmElement.style.zIndex = '99999';
            charmElement.style.transition = 'all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275)'; // bouncy flight
            
            // Calculate trajectory (opposite of pull)
            let flyX = (window.innerWidth / 2) - 50;
            let flyY = (window.innerHeight / 2) - 50;
            
            // Hide the string 
            stringElement.style.opacity = '0';
            stringElement.style.transition = 'opacity 0.3s';
            
            // Fly!
            setTimeout(() => {
                charmElement.style.left = flyX + 'px';
                charmElement.style.top = flyY + 'px';
                charmElement.style.transform = 'scale(5) rotate(720deg)';
                charmElement.style.opacity = '0'; // Explode/fade out
            }, 50);
            
            // Open form when it hits
            setTimeout(() => {
                charmElement.style.display = 'none'; // Remove it entirely
                openFormModal();
            }, 600);
            
        }
    }

    charmElement.addEventListener('mousedown', startDrag);
    window.addEventListener('mousemove', drag);
    window.addEventListener('mouseup', endDrag);

    charmElement.addEventListener('touchstart', startDrag, { passive: false });
    window.addEventListener('touchmove', drag, { passive: false });
    window.addEventListener('touchend', endDrag);
});
