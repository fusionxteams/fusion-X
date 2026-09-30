
// Global MutationObserver to instantly vaporize any legacy '#charm-contact-modal'
(function() {
    function killLegacy() {
        document.querySelectorAll('#charm-contact-modal').forEach(e => e.remove());
    }
    killLegacy();
    if (typeof MutationObserver !== 'undefined') {
        const obs = new MutationObserver(mutations => {
            for (const m of mutations) {
                for (const node of m.addedNodes) {
                    if (node.nodeType === 1) {
                        if (node.id === 'charm-contact-modal') {
                            node.remove();
                        } else if (node.querySelector) {
                            const found = node.querySelector('#charm-contact-modal');
                            if (found) found.remove();
                        }
                    }
                }
            }
        });
        if (document.body) {
            obs.observe(document.body, { childList: true, subtree: true });
        } else {
            document.addEventListener('DOMContentLoaded', () => {
                obs.observe(document.body, { childList: true, subtree: true });
            });
        }
    }
})();

/**
 * Fusion X - Slingshot Easter Egg & Exclusive Offer Engine
 * Handles interactive rubber-band stretching, 4 smooth visible screen bounces,
 * fireworks celebration, hidden offer modal, and smooth return to navbar.
 */

document.addEventListener('DOMContentLoaded', () => {
    const charmString = document.querySelector('.charm-string');
    const charmObj = document.querySelector('.charm-object');
    if (!charmString || !charmObj) return;

    charmObj.style.pointerEvents = 'auto';
    charmObj.style.cursor = 'grab';
    charmObj.style.userSelect = 'none';
    charmObj.style.webkitUserDrag = 'none';

    let isDragging = false;
    let isCut = false;
    let hasSettled = false;
    
    let startX = 0, startY = 0;
    let anchorX = 0, anchorY = 0;
    let currentX = 0, currentY = 0;
    let vx = 0, vy = 0;
    const gravity = 0.28; // calibrated gravity for visible float
    let bounces = 0;
    const MAX_BOUNCES = 4; // user requested 4 bounces
    let spinAngle = 0;
    let spinVelocity = 0;
    let fallbackTimeout = null;

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
            tt.style.padding = '8px 14px';
            tt.style.borderRadius = '8px';
            tt.style.fontSize = '13px';
            tt.style.fontWeight = 'bold';
            tt.style.whiteSpace = 'nowrap';
            tt.style.top = '145px';
            tt.style.right = '-30px';
            tt.style.pointerEvents = 'none';
            tt.style.opacity = '0';
            tt.style.transition = 'opacity 0.3s ease';
            tt.style.boxShadow = '0 4px 12px rgba(255,87,34,0.45)';
            tt.style.zIndex = '100000';
            
            const rope2 = document.createElement('div');
            rope2.style.position = 'absolute';
            rope2.style.right = '30px';
            rope2.style.top = '-25px';
            rope2.style.width = '2px';
            rope2.style.height = '25px';
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

    const onPointerDown = (e) => {
        if (isCut) return;
        if (e.cancelable) e.preventDefault();
        isDragging = true;
        hasSettled = false;
        charmObj.style.cursor = 'grabbing';
        charmString.style.animation = 'none';
        charmString.style.transform = 'none';
        
        const tt = document.getElementById('charm-tooltip');
        if (tt) tt.style.opacity = '0';
        
        const rect = charmObj.getBoundingClientRect();
        const stringRect = charmString.getBoundingClientRect();
        
        anchorX = stringRect.left + stringRect.width / 2;
        anchorY = stringRect.top;
        
        dragStartX = e.clientX !== undefined ? e.clientX : (e.touches && e.touches[0].clientX);
        dragStartY = e.clientY !== undefined ? e.clientY : (e.touches && e.touches[0].clientY);
        
        charmObj.style.position = 'fixed';
        charmObj.style.left = rect.left + 'px';
        charmObj.style.top = rect.top + 'px';
        charmObj.style.margin = '0';
        charmObj.style.zIndex = '999999';
        
        document.body.appendChild(charmObj);
        
        currentX = rect.left;
        currentY = rect.top;
        startX = currentX;
        startY = currentY;
    };

    const drawString = () => {
        if (isCut || !isDragging) return;
        const dx = (currentX + 24) - anchorX;
        const dy = (currentY) - anchorY;
        const angle = Math.atan2(dy, dx) - Math.PI / 2;
        const dist = Math.sqrt(dx * dx + dy * dy);
        
        charmString.style.height = dist + 'px';
        charmString.style.transform = `rotate(${angle}rad)`;
    };

    const onPointerMove = (e) => {
        if (!isDragging || isCut) return;
        if (e.cancelable) e.preventDefault();
        const cx = e.clientX !== undefined ? e.clientX : (e.touches && e.touches[0].clientX);
        const cy = e.clientY !== undefined ? e.clientY : (e.touches && e.touches[0].clientY);
        
        const dx = cx - dragStartX;
        const dy = cy - dragStartY;
        
        currentX = startX + dx;
        currentY = startY + dy;
        
        charmObj.style.left = currentX + 'px';
        charmObj.style.top = currentY + 'px';
        
        drawString();
        
        const stretchDist = Math.sqrt(Math.pow((currentX + 24) - anchorX, 2) + Math.pow(currentY - anchorY, 2));
        if (stretchDist > 185) {
            cutString();
        }
    };

    const onPointerUp = () => {
        if (!isDragging || isCut) return;
        isDragging = false;
        charmObj.style.cursor = 'grab';
        
        const stretchDist = Math.sqrt(Math.pow((currentX + 24) - anchorX, 2) + Math.pow(currentY - anchorY, 2));
        
        if (stretchDist >= 90) {
            cutString();
        } else {
            // Not pulled enough: return to rope
            charmString.style.transition = 'all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
            charmString.style.height = '70px';
            charmString.style.transform = 'rotate(0deg)';
            
            charmObj.style.transition = 'all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
            const stringRect = charmString.getBoundingClientRect();
            charmObj.style.left = (stringRect.left - 24 + stringRect.width / 2) + 'px';
            charmObj.style.top = (stringRect.top + 70) + 'px';
            
            setTimeout(() => {
                charmString.style.transition = 'none';
                charmObj.style.transition = 'none';
                charmObj.style.position = 'absolute';
                charmObj.style.left = '-24px';
                charmObj.style.top = '70px';
                charmString.appendChild(charmObj);
                charmString.style.animation = 'swing 3s ease-in-out infinite alternate';
            }, 320);
        }
    };

    const cutString = () => {
        isCut = true;
        isDragging = false;
        hasSettled = false;
        charmString.style.opacity = '0';
        
        if (!localStorage.getItem('fusionx_easter_egg')) {
            localStorage.setItem('fusionx_easter_egg', 'unlocked');
        }
        
        const pullDx = anchorX - (currentX + 24);
        const pullDy = anchorY - currentY;
        
        // Calibrated launch velocity
        vx = pullDx * 0.1;
        vy = pullDy * 0.1;
        
        // Ensure healthy horizontal velocity towards screen center
        const centerDirection = (window.innerWidth / 2 > currentX) ? 1 : -1;
        if (Math.abs(vx) < 5) {
            vx = centerDirection * (7 + Math.random() * 3);
        }
        
        // Cap velocities
        const maxV = 16;
        vx = Math.max(-maxV, Math.min(maxV, vx));
        vy = Math.max(-maxV, Math.min(maxV, vy));
        
        spinVelocity = (vx > 0 ? 1 : -1) * 7;
        bounces = 0;
        
        // Safety fallback: guarantee modal appears within 3.5s even if corner caught
        if (fallbackTimeout) clearTimeout(fallbackTimeout);
        fallbackTimeout = setTimeout(() => {
            if (!hasSettled) {
                settleAndTransform();
            }
        }, 3200);
        
        requestAnimationFrame(physicsLoop);
    };

    const physicsLoop = () => {
        if (hasSettled) return;
        
        if (bounces >= MAX_BOUNCES) {
            settleAndTransform();
            return;
        }
        
        currentX += vx;
        currentY += vy;
        vy += gravity;
        spinAngle += spinVelocity;
        
        const maxW = window.innerWidth - 50;
        const maxH = window.innerHeight - 50;
        
        let bouncedThisFrame = false;

        if (currentX < 0) {
            currentX = 0;
            vx *= -0.78;
            spinVelocity = -spinVelocity * 0.9;
            bouncedThisFrame = true;
        }
        if (currentX > maxW) {
            currentX = maxW;
            vx *= -0.78;
            spinVelocity = -spinVelocity * 0.9;
            bouncedThisFrame = true;
        }
        if (currentY < 0) {
            currentY = 0;
            vy *= -0.78;
            bouncedThisFrame = true;
        }
        if (currentY > maxH) {
            currentY = maxH;
            vy *= -0.78;
            bouncedThisFrame = true;
        }
        
        if (bouncedThisFrame) {
            bounces++;
        }
        
        charmObj.style.left = currentX + 'px';
        charmObj.style.top = currentY + 'px';
        charmObj.style.transform = `rotate(${spinAngle}deg)`;
        
        requestAnimationFrame(physicsLoop);
    };

    const settleAndTransform = () => {
        if (hasSettled) return;
        hasSettled = true;
        if (fallbackTimeout) clearTimeout(fallbackTimeout);
        
        charmObj.style.transition = 'all 0.85s cubic-bezier(0.25, 1, 0.5, 1)';
        charmObj.style.left = 'calc(50vw - 25px)';
        charmObj.style.top = 'calc(50vh - 25px)';
        charmObj.style.transform = 'scale(2.2) rotate(720deg)';
        
        setTimeout(() => {
            showHiddenOffer();
            triggerFireworks();
        }, 900);
    };

    const returnToNavbar = (message) => {
        const stringRect = charmString.getBoundingClientRect();
        
        charmObj.style.display = 'block';
        charmObj.style.opacity = '1';
        charmObj.style.transition = 'all 0.85s cubic-bezier(0.5, 0, 0.2, 1)';
        charmObj.style.transform = 'scale(1) rotate(0deg)';
        charmObj.style.left = (stringRect.left - 24 + stringRect.width / 2) + 'px';
        charmObj.style.top = (stringRect.top + 70) + 'px';
        
        setTimeout(() => {
            charmString.style.opacity = '1';
            charmObj.style.transition = 'none';
            charmObj.style.position = 'absolute';
            charmObj.style.left = '-24px';
            charmObj.style.top = '70px';
            charmString.appendChild(charmObj);
            
            charmString.style.height = '70px';
            charmString.style.transform = 'none';
            charmString.style.animation = 'swing 3s ease-in-out infinite alternate';
            
            isCut = false;
            hasSettled = false;
            
            showCharmTooltip(message, 5000);
        }, 900);
    };

    const showHiddenOffer = () => {
        // Eradicate any old or duplicate contact modal immediately
        document.querySelectorAll('#charm-contact-modal').forEach(el => el.remove());
        charmObj.style.display = 'none';
        
        if (document.getElementById('hidden-offer-overlay')) {
            document.getElementById('hidden-offer-overlay').remove();
        }
        
        const overlay = document.createElement('div');
        overlay.id = 'hidden-offer-overlay';
        overlay.style.position = 'fixed';
        overlay.style.top = '0'; overlay.style.left = '0';
        overlay.style.width = '100vw'; overlay.style.height = '100vh';
        overlay.style.background = 'rgba(0,0,0,0.85)';
        overlay.style.zIndex = '100000';
        overlay.style.display = 'flex';
        overlay.style.justifyContent = 'center';
        overlay.style.alignItems = 'center';
        overlay.style.opacity = '0';
        overlay.style.transition = 'opacity 0.4s ease';
        overlay.style.backdropFilter = 'blur(8px)';
        overlay.style.webkitBackdropFilter = 'blur(8px)';
        
        const formBox = document.createElement('div');
        formBox.style.background = 'linear-gradient(135deg, #111111, #1e1e1e)';
        formBox.style.border = '2px solid #ff5722';
        formBox.style.padding = '40px';
        formBox.style.borderRadius = '20px';
        formBox.style.textAlign = 'center';
        formBox.style.color = '#fff';
        formBox.style.width = '90%';
        formBox.style.maxWidth = '440px';
        formBox.style.position = 'relative';
        formBox.style.transform = 'scale(0.7)';
        formBox.style.transition = 'transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        formBox.style.boxShadow = '0 0 50px rgba(255, 87, 34, 0.5)';
        
        const closeBtn = document.createElement('button');
        closeBtn.id = 'close-offer-modal';
        closeBtn.innerHTML = '&times;';
        closeBtn.style.position = 'absolute';
        closeBtn.style.top = '12px';
        closeBtn.style.right = '18px';
        closeBtn.style.background = 'none';
        closeBtn.style.border = 'none';
        closeBtn.style.color = '#aaa';
        closeBtn.style.fontSize = '32px';
        closeBtn.style.cursor = 'pointer';
        closeBtn.style.lineHeight = '1';
        closeBtn.style.transition = 'color 0.2s';
        closeBtn.onmouseenter = () => closeBtn.style.color = '#fff';
        closeBtn.onmouseleave = () => closeBtn.style.color = '#aaa';
        
        function dismissModal() {
            overlay.style.opacity = '0';
            formBox.style.transform = 'scale(0.7)';
            setTimeout(() => {
                overlay.remove();
                returnToNavbar("Your offer still stays, pull me again!");
            }, 350);
        }
        
        closeBtn.onclick = dismissModal;
        overlay.onclick = (e) => {
            if (e.target === overlay) dismissModal();
        };
        
        formBox.innerHTML = `
            <div style="font-size: 2.2rem; margin-bottom: 6px;">🎉</div>
            <h2 style="color: #ff5722; font-family: 'Outfit', sans-serif; font-size: 2rem; font-weight: 900; margin: 0 0 10px 0; text-transform: uppercase;">You unlocked a Hidden offer!</h2>
            <p style="font-size: 1.15rem; margin-bottom: 24px; line-height: 1.5; color: #e0e0e0; font-family: 'Segoe UI', Roboto, sans-serif;">If you build a website with us, we give you <strong style="color: #ff5722; font-size: 1.25rem;">3 blogs free!</strong></p>
            <form id="hiddenOfferForm" style="display: flex; flex-direction: column; gap: 14px;">
                <input type="text" placeholder="Your Name" required style="width: 100%; padding: 14px 16px; border-radius: 10px; border: 1px solid #444; background: #262626; color: #fff; font-size: 15px; outline: none; box-sizing: border-box;">
                <input type="email" placeholder="Your Email Address" required style="width: 100%; padding: 14px 16px; border-radius: 10px; border: 1px solid #444; background: #262626; color: #fff; font-size: 15px; outline: none; box-sizing: border-box;">
                <button type="submit" style="width: 100%; padding: 16px; background: #ff5722; color: #fff; border: none; border-radius: 10px; font-size: 1.1rem; font-weight: bold; cursor: pointer; text-transform: uppercase; letter-spacing: 1px; transition: background 0.2s; box-shadow: 0 8px 25px rgba(255, 87, 34, 0.4);">Claim Offer</button>
            </form>
        `;
        
        formBox.appendChild(closeBtn);
        
        formBox.querySelector("#hiddenOfferForm").onsubmit = (e) => {
            e.preventDefault();
            localStorage.setItem('fusionx_easter_egg', 'claimed');
            overlay.style.opacity = '0';
            formBox.style.transform = 'scale(0.7)';
            setTimeout(() => {
                overlay.remove();
                returnToNavbar("Welcome to Fusion X! You've made a brilliant choice for your brand's explosive growth.");
            }, 350);
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
        fwCanvas.style.zIndex = '99999';
        document.body.appendChild(fwCanvas);
        
        const ctx = fwCanvas.getContext('2d');
        fwCanvas.width = window.innerWidth;
        fwCanvas.height = window.innerHeight;
        
        const particles = [];
        const colors = ['#ff5722', '#ffffff', '#ffd700', '#ff8a65', '#00e5ff'];
        
        for (let i = 0; i < 220; i++) {
            particles.push({
                x: fwCanvas.width / 2,
                y: fwCanvas.height / 2,
                vx: (Math.random() - 0.5) * 22,
                vy: (Math.random() - 0.5) * 22,
                color: colors[Math.floor(Math.random() * colors.length)],
                life: 1.0,
                decay: 0.012 + Math.random() * 0.018
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
                    p.vy += 0.18; 
                    p.life -= p.decay;
                    
                    ctx.globalAlpha = p.life;
                    ctx.fillStyle = p.color;
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, 4.5, 0, Math.PI * 2);
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
    charmObj.addEventListener('touchstart', onPointerDown, {passive: false});

    window.addEventListener('mousemove', onPointerMove, {passive: false});
    document.addEventListener('mousemove', onPointerMove, {passive: false});
    window.addEventListener('mouseup', onPointerUp);
    document.addEventListener('mouseup', onPointerUp);
    
    window.addEventListener('touchmove', onPointerMove, {passive: false});
    document.addEventListener('touchmove', onPointerMove, {passive: false});
    window.addEventListener('touchend', onPointerUp);
    document.addEventListener('touchend', onPointerUp);
});
