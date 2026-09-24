document.addEventListener('DOMContentLoaded', () => {
    const charmString = document.querySelector('.charm-string');
    const charmObj = document.querySelector('.charm-object');
    if (!charmString || !charmObj) return;

    charmObj.style.pointerEvents = 'auto';
    charmObj.style.cursor = 'grab';

    let isDragging = false;
    let isCut = false;
    
    // Physics state
    let startX = 0, startY = 0;
    let anchorX = 0, anchorY = 0;
    let currentX = 0, currentY = 0;
    let vx = 0, vy = 0;
    const gravity = 0.5;
    let bounces = 0;
    const MAX_BOUNCES = 3;

    let dragStartX = 0, dragStartY = 0;

    const onPointerDown = (e) => {
        if (isCut) return;
        e.preventDefault();
        isDragging = true;
        charmObj.style.cursor = 'grabbing';
        charmString.style.animation = 'none'; // Stop swing
        charmString.style.transform = 'none';
        
        const rect = charmObj.getBoundingClientRect();
        const stringRect = charmString.getBoundingClientRect();
        
        anchorX = stringRect.left + stringRect.width / 2;
        anchorY = stringRect.top;
        
        dragStartX = e.clientX || (e.touches && e.touches[0].clientX);
        dragStartY = e.clientY || (e.touches && e.touches[0].clientY);
        
        // Convert to absolute fixed coordinates
        charmObj.style.position = 'fixed';
        charmObj.style.left = rect.left + 'px';
        charmObj.style.top = rect.top + 'px';
        charmObj.style.margin = '0';
        charmObj.style.zIndex = '9999';
        
        document.body.appendChild(charmObj); // Move to body for free movement
        
        currentX = rect.left;
        currentY = rect.top;
        startX = currentX;
        startY = currentY;
    };

    const drawString = () => {
        // We can draw a dynamic string using a canvas or just an SVG line.
        // For simplicity, we just use the existing charm-string element by rotating it.
        if (isCut || !isDragging) return;
        const dx = (currentX + 25) - anchorX;
        const dy = (currentY + 25) - anchorY;
        const angle = Math.atan2(dy, dx) - Math.PI/2;
        const dist = Math.sqrt(dx*dx + dy*dy);
        
        charmString.style.height = dist + 'px';
        charmString.style.transform = `rotate(${angle}rad)`;
    };

    const onPointerMove = (e) => {
        if (!isDragging || isCut) return;
        e.preventDefault();
        const cx = e.clientX || (e.touches && e.touches[0].clientX);
        const cy = e.clientY || (e.touches && e.touches[0].clientY);
        
        const dx = cx - dragStartX;
        const dy = cy - dragStartY;
        
        currentX = startX + dx;
        currentY = startY + dy;
        
        charmObj.style.left = currentX + 'px';
        charmObj.style.top = currentY + 'px';
        
        drawString();
        
        // Check stretch threshold
        const stretchDist = Math.sqrt(Math.pow((currentX+25)-anchorX, 2) + Math.pow((currentY+25)-anchorY, 2));
        if (stretchDist > 200) {
            cutString();
        }
    };

    const onPointerUp = () => {
        if (!isDragging || isCut) return;
        isDragging = false;
        charmObj.style.cursor = 'grab';
        
        // Snap back if not cut
        charmString.style.height = '70px';
        charmString.style.animation = 'swing 3s ease-in-out infinite alternate';
        
        // Put object back inside string container
        charmObj.style.position = 'absolute';
        charmObj.style.left = '-25px';
        charmObj.style.top = '70px';
        charmString.appendChild(charmObj);
    };

    const cutString = () => {
        isCut = true;
        isDragging = false;
        charmString.style.display = 'none'; // Hide the broken string
        
        // Launch logic
        const pullDx = anchorX - (currentX + 25);
        const pullDy = anchorY - (currentY + 25);
        
        vx = pullDx * 0.15; // Slingshot force multiplier
        vy = pullDy * 0.15;
        
        requestAnimationFrame(physicsLoop);
    };

    const physicsLoop = () => {
        if (bounces >= MAX_BOUNCES) {
            settleAndTransform();
            return;
        }
        
        currentX += vx;
        currentY += vy;
        vy += gravity;
        
        const maxW = window.innerWidth - 50;
        const maxH = window.innerHeight - 50;
        
        let bouncedThisFrame = false;

        if (currentX < 0) { currentX = 0; vx *= -0.8; bouncedThisFrame = true; }
        if (currentX > maxW) { currentX = maxW; vx *= -0.8; bouncedThisFrame = true; }
        if (currentY < 0) { currentY = 0; vy *= -0.8; bouncedThisFrame = true; }
        if (currentY > maxH) { currentY = maxH; vy *= -0.8; bouncedThisFrame = true; }
        
        if (bouncedThisFrame) {
            bounces++;
        }
        
        charmObj.style.left = currentX + 'px';
        charmObj.style.top = currentY + 'px';
        
        requestAnimationFrame(physicsLoop);
    };

    const settleAndTransform = () => {
        // Move to center
        charmObj.style.transition = 'all 1s cubic-bezier(0.25, 1, 0.5, 1)';
        charmObj.style.left = 'calc(50vw - 25px)';
        charmObj.style.top = 'calc(50vh - 25px)';
        
        setTimeout(() => {
            showHiddenOffer();
            triggerFireworks();
        }, 1000);
    };

    const showHiddenOffer = () => {
        charmObj.style.display = 'none';
        
        const overlay = document.createElement('div');
        overlay.style.position = 'fixed';
        overlay.style.top = '0'; overlay.style.left = '0';
        overlay.style.width = '100vw'; overlay.style.height = '100vh';
        overlay.style.background = 'rgba(0,0,0,0.85)';
        overlay.style.zIndex = '10000';
        overlay.style.display = 'flex';
        overlay.style.justifyContent = 'center';
        overlay.style.alignItems = 'center';
        overlay.style.opacity = '0';
        overlay.style.transition = 'opacity 0.5s ease';
        
        const formBox = document.createElement('div');
        formBox.style.background = 'linear-gradient(135deg, #111, #222)';
        formBox.style.border = '2px solid #ff5722';
        formBox.style.padding = '40px';
        formBox.style.borderRadius = '16px';
        formBox.style.textAlign = 'center';
        formBox.style.color = '#fff';
        formBox.style.maxWidth = '400px';
        formBox.style.transform = 'scale(0.5)';
        formBox.style.transition = 'transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        formBox.style.boxShadow = '0 0 40px rgba(255, 87, 34, 0.4)';
        
        formBox.innerHTML = `
            <h2 style="color: #ff5722; font-size: 2rem; margin-bottom: 10px;">🎉 You unlocked a Hidden offer!</h2>
            <p style="font-size: 1.1rem; margin-bottom: 20px; line-height: 1.5; color: #ccc;">If you build a website with us, we give you <strong style="color: #fff;">3 blogs free!</strong></p>
            <form id="hiddenOfferForm" onsubmit="event.preventDefault(); alert('Offer Claimed!'); this.parentElement.parentElement.remove();">
                <input type="text" placeholder="Your Name" required style="width: 100%; padding: 12px; margin-bottom: 15px; border-radius: 8px; border: none; background: #333; color: #fff;">
                <input type="email" placeholder="Your Email" required style="width: 100%; padding: 12px; margin-bottom: 20px; border-radius: 8px; border: none; background: #333; color: #fff;">
                <button type="submit" style="width: 100%; padding: 15px; background: #ff5722; color: #fff; border: none; border-radius: 8px; font-size: 1.1rem; font-weight: bold; cursor: pointer;">Claim Offer</button>
            </form>
            <button onclick="this.parentElement.parentElement.remove()" style="margin-top: 15px; background: none; border: none; color: #888; cursor: pointer; text-decoration: underline;">Close</button>
        `;
        
        overlay.appendChild(formBox);
        document.body.appendChild(overlay);
        
        // Trigger animations
        setTimeout(() => {
            overlay.style.opacity = '1';
            formBox.style.transform = 'scale(1)';
        }, 50);
    };

    const triggerFireworks = () => {
        const fwCanvas = document.createElement('canvas');
        fwCanvas.style.position = 'fixed';
        fwCanvas.style.top = '0'; fwCanvas.style.left = '0';
        fwCanvas.style.width = '100vw'; fwCanvas.style.height = '100vh';
        fwCanvas.style.pointerEvents = 'none';
        fwCanvas.style.zIndex = '9999';
        document.body.appendChild(fwCanvas);
        
        const ctx = fwCanvas.getContext('2d');
        fwCanvas.width = window.innerWidth;
        fwCanvas.height = window.innerHeight;
        
        const particles = [];
        const colors = ['#ff5722', '#ffffff', '#ffd700', '#ff8a65'];
        
        for (let i = 0; i < 150; i++) {
            particles.push({
                x: fwCanvas.width / 2,
                y: fwCanvas.height / 2,
                vx: (Math.random() - 0.5) * 20,
                vy: (Math.random() - 0.5) * 20,
                color: colors[Math.floor(Math.random() * colors.length)],
                life: 1.0,
                decay: 0.01 + Math.random() * 0.02
            });
        }
        
        const fwLoop = () => {
            ctx.clearRect(0, 0, fwCanvas.width, fwCanvas.height);
            let active = false;
            
            particles.forEach(p => {
                if (p.life > 0) {
                    active = true;
                    p.x += p.vx;
                    p.y += p.vy;
                    p.vy += 0.2; // gravity
                    p.life -= p.decay;
                    
                    ctx.globalAlpha = p.life;
                    ctx.fillStyle = p.color;
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, 3, 0, Math.PI * 2);
                    ctx.fill();
                }
            });
            
            if (active) {
                requestAnimationFrame(fwLoop);
            } else {
                fwCanvas.remove();
            }
        };
        
        fwLoop();
    };

    charmObj.addEventListener('mousedown', onPointerDown);
    document.addEventListener('mousemove', onPointerMove);
    document.addEventListener('mouseup', onPointerUp);
    
    charmObj.addEventListener('touchstart', onPointerDown, {passive: false});
    document.addEventListener('touchmove', onPointerMove, {passive: false});
    document.addEventListener('touchend', onPointerUp);
});
