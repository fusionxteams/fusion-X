document.addEventListener('DOMContentLoaded', () => {
    const charmString = document.querySelector('.charm-string');
    const charmObj = document.querySelector('.charm-object');
    if (!charmString || !charmObj) return;

    charmObj.style.pointerEvents = 'auto';
    charmObj.style.cursor = 'grab';

    let isDragging = false;
    let isCut = false;
    
    let startX = 0, startY = 0;
    let anchorX = 0, anchorY = 0;
    let currentX = 0, currentY = 0;
    let vx = 0, vy = 0;
    const gravity = 0.5;
    let bounces = 0;
    const MAX_BOUNCES = 6;

    let dragStartX = 0, dragStartY = 0;

    // Tooltip System
    const showCharmTooltip = (text, duration = 5000) => {
        let tt = document.getElementById('charm-tooltip');
        if (!tt) {
            tt = document.createElement('div');
            tt.id = 'charm-tooltip';
            tt.style.position = 'absolute';
            tt.style.background = '#ff5722';
            tt.style.color = '#fff';
            tt.style.padding = '8px 12px';
            tt.style.borderRadius = '8px';
            tt.style.fontSize = '13px';
            tt.style.fontWeight = 'bold';
            tt.style.whiteSpace = 'nowrap';
            tt.style.top = '150px';
            tt.style.right = '-25px';
            tt.style.pointerEvents = 'none';
            tt.style.opacity = '0';
            tt.style.transition = 'opacity 0.3s ease';
            tt.style.boxShadow = '0 4px 10px rgba(255,87,34,0.4)';
            tt.style.zIndex = '1000';
            
            const rope2 = document.createElement('div');
            rope2.style.position = 'absolute';
            rope2.style.right = '25px';
            rope2.style.top = '-30px';
            rope2.style.width = '2px';
            rope2.style.height = '30px';
            rope2.style.background = 'repeating-linear-gradient(to bottom, #ff5722, #ff5722 5px, #c24015 5px, #c24015 10px)';
            tt.appendChild(rope2);
            
            const textSpan = document.createElement('span');
            textSpan.id = 'charm-tooltip-text';
            tt.appendChild(textSpan);
            
            charmString.appendChild(tt);
        }
        
        document.getElementById('charm-tooltip-text').innerText = text;
        tt.style.opacity = '1';
        
        if (window.charmTooltipTimeout) clearTimeout(window.charmTooltipTimeout);
        window.charmTooltipTimeout = setTimeout(() => {
            tt.style.opacity = '0';
        }, duration);
    };

    // Check localStorage for initial state
    setTimeout(() => {
        const state = localStorage.getItem('fusionx_easter_egg');
        if (state === 'unlocked') {
            showCharmTooltip('Congratulations! You found a hidden offer!', 5000);
        }
    }, 1500);

    const onPointerDown = (e) => {
        if (isCut) return;
        e.preventDefault();
        isDragging = true;
        charmObj.style.cursor = 'grabbing';
        charmString.style.animation = 'none';
        charmString.style.transform = 'none';
        
        // Hide tooltip if dragging
        const tt = document.getElementById('charm-tooltip');
        if (tt) tt.style.opacity = '0';
        
        const rect = charmObj.getBoundingClientRect();
        const stringRect = charmString.getBoundingClientRect();
        
        anchorX = stringRect.left + stringRect.width / 2;
        anchorY = stringRect.top;
        
        dragStartX = e.clientX || (e.touches && e.touches[0].clientX);
        dragStartY = e.clientY || (e.touches && e.touches[0].clientY);
        
        charmObj.style.position = 'fixed';
        charmObj.style.left = rect.left + 'px';
        charmObj.style.top = rect.top + 'px';
        charmObj.style.margin = '0';
        charmObj.style.zIndex = '9999';
        
        document.body.appendChild(charmObj);
        
        currentX = rect.left;
        currentY = rect.top;
        startX = currentX;
        startY = currentY;
    };

    const drawString = () => {
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
        
        const stretchDist = Math.sqrt(Math.pow((currentX+25)-anchorX, 2) + Math.pow((currentY+25)-anchorY, 2));
        if (stretchDist > 200) {
            cutString();
        }
    };

    const onPointerUp = () => {
        if (!isDragging || isCut) return;
        isDragging = false;
        charmObj.style.cursor = 'grab';
        
        charmString.style.height = '70px';
        charmString.style.animation = 'swing 3s ease-in-out infinite alternate';
        
        charmObj.style.position = 'absolute';
        charmObj.style.left = '-25px';
        charmObj.style.top = '70px';
        charmString.appendChild(charmObj);
    };

    const cutString = () => {
        isCut = true;
        isDragging = false;
        charmString.style.opacity = '0';
        
        if (!localStorage.getItem('fusionx_easter_egg')) {
            localStorage.setItem('fusionx_easter_egg', 'unlocked');
        }
        
        const pullDx = anchorX - (currentX + 25);
        const pullDy = anchorY - (currentY + 25);
        
        vx = pullDx * 0.15;
        vy = pullDy * 0.15;
        bounces = 0;
        
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
        charmObj.style.transition = 'all 0.8s cubic-bezier(0.25, 1, 0.5, 1)';
        charmObj.style.left = 'calc(50vw - 25px)';
        charmObj.style.top = 'calc(50vh - 25px)';
        
        setTimeout(() => {
            showHiddenOffer();
            triggerFireworks();
        }, 850);
    };

    const returnToNavbar = (message) => {
        // We restore physics properties and bring it back up to the anchor
        const stringRect = charmString.getBoundingClientRect();
        
        charmObj.style.display = 'block';
        charmObj.style.transition = 'all 0.8s cubic-bezier(0.5, 0, 0.2, 1)';
        charmObj.style.left = (stringRect.left - 25 + stringRect.width/2) + 'px';
        charmObj.style.top = (stringRect.top + 70) + 'px';
        
        setTimeout(() => {
            charmString.style.opacity = '1';
            charmObj.style.transition = 'none';
            charmObj.style.position = 'absolute';
            charmObj.style.left = '-25px';
            charmObj.style.top = '70px';
            charmString.appendChild(charmObj);
            
            charmString.style.height = '70px';
            charmString.style.animation = 'swing 3s ease-in-out infinite alternate';
            
            isCut = false;
            
            showCharmTooltip(message, 5000);
        }, 850);
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
        formBox.style.position = 'relative';
        formBox.style.transform = 'scale(0.5)';
        formBox.style.transition = 'transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        formBox.style.boxShadow = '0 0 40px rgba(255, 87, 34, 0.4)';
        
        // Cross close button
        const closeBtn = document.createElement('button');
        closeBtn.innerHTML = '&times;';
        closeBtn.style.position = 'absolute';
        closeBtn.style.top = '10px';
        closeBtn.style.right = '15px';
        closeBtn.style.background = 'none';
        closeBtn.style.border = 'none';
        closeBtn.style.color = '#888';
        closeBtn.style.fontSize = '28px';
        closeBtn.style.cursor = 'pointer';
        closeBtn.style.lineHeight = '1';
        
        closeBtn.onclick = () => {
            overlay.remove();
            returnToNavbar("Your offer still stays, pull me again!");
        };
        
        formBox.innerHTML = `
            <h2 style="color: #ff5722; font-size: 2rem; margin-bottom: 10px; margin-top: 10px;">🎉 You unlocked a Hidden offer!</h2>
            <p style="font-size: 1.1rem; margin-bottom: 20px; line-height: 1.5; color: #ccc;">If you build a website with us, we give you <strong style="color: #fff;">3 blogs free!</strong></p>
            <form id="hiddenOfferForm">
                <input type="text" placeholder="Your Name" required style="width: 100%; padding: 12px; margin-bottom: 15px; border-radius: 8px; border: none; background: #333; color: #fff;">
                <input type="email" placeholder="Your Email" required style="width: 100%; padding: 12px; margin-bottom: 20px; border-radius: 8px; border: none; background: #333; color: #fff;">
                <button type="submit" style="width: 100%; padding: 15px; background: #ff5722; color: #fff; border: none; border-radius: 8px; font-size: 1.1rem; font-weight: bold; cursor: pointer;">Claim Offer</button>
            </form>
        `;
        
        formBox.appendChild(closeBtn);
        
        formBox.querySelector("#hiddenOfferForm").onsubmit = (e) => {
            e.preventDefault();
            localStorage.setItem('fusionx_easter_egg', 'claimed');
            overlay.remove();
            returnToNavbar("Welcome to Fusion X! You've made a brilliant choice for your brand's explosive growth.");
        };
        
        overlay.appendChild(formBox);
        document.body.appendChild(overlay);
        
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
        
        for (let i = 0; i < 200; i++) {
            particles.push({
                x: fwCanvas.width / 2,
                y: fwCanvas.height / 2,
                vx: (Math.random() - 0.5) * 25,
                vy: (Math.random() - 0.5) * 25,
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
                    p.vy += 0.2; 
                    p.life -= p.decay;
                    
                    ctx.globalAlpha = p.life;
                    ctx.fillStyle = p.color;
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, 4, 0, Math.PI * 2);
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
