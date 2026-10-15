
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
    // Universal Mobile Navbar & Accordion Dropdown System
    (function initUniversalNavbar() {
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
        const servicesItem = document.querySelector('.nav-item-services');

        if (navLinks && !navLinks.querySelector('.mob-drawer-cta')) {
            const drawerCta = document.createElement('li');
            drawerCta.className = 'mob-drawer-cta';
            drawerCta.innerHTML = '<a href="contact.html" class="mob-cta-btn">LET\'S CONNECT <i class="fa-solid fa-arrow-right"></i></a>';
            navLinks.appendChild(drawerCta);
        }

        if (hamburger && navLinks) {
            // Strip any legacy/duplicate event listeners by cloning the element
            const newHamburger = hamburger.cloneNode(true);
            hamburger.parentNode.replaceChild(newHamburger, hamburger);

            function toggleMenu(force) {
                const isOpen = typeof force === 'boolean' ? force : !navLinks.classList.contains('mob-open');
                navLinks.classList.toggle('mob-open', isOpen);
                newHamburger.classList.toggle('active', isOpen);
                document.body.classList.toggle('mob-menu-active', isOpen);
                document.body.style.overflow = isOpen ? 'hidden' : '';
            }

            newHamburger.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                toggleMenu();
            });

            document.addEventListener('click', (e) => {
                if (navLinks.classList.contains('mob-open')) {
                    if (!e.target.closest('.nav-links') && !e.target.closest('.hamburger')) {
                        toggleMenu(false);
                    }
                }
            });

            navLinks.addEventListener('click', (e) => {
                const link = e.target.closest('a');
                if (!link) return;
                // If it's the services parent link on mobile, don't close the menu
                if (link.closest('.nav-item-services') && !link.closest('.services-mega-menu')) {
                    return;
                }
                // Allow browser to process navigation before closing mobile drawer
                setTimeout(() => {
                    toggleMenu(false);
                }, 150);
            });

            window.addEventListener('resize', () => {
                if (window.innerWidth > 1024) {
                    toggleMenu(false);
                    if (servicesItem) servicesItem.classList.remove('mob-sub-open');
                }
            });
        }

        // Setup Mobile Mega-Menu Category Accordions
        if (navLinks) {
            const megaCols = navLinks.querySelectorAll('.mega-column');
            megaCols.forEach((col) => {
                const header = col.querySelector('.mega-cat-header');
                if (header && !header.dataset.accordionBound) {
                    header.dataset.accordionBound = "true";
                    // Do NOT auto-open any category; keep all collapsed so HOME & ABOUT US stay visible!
                    header.addEventListener('click', (e) => {
                        if (window.innerWidth <= 1024) {
                            e.preventDefault();
                            e.stopPropagation();
                            const wasOpen = col.classList.contains('cat-open');
                            // Close other categories to keep mobile menu compact and keep HOME & ABOUT US in view
                            megaCols.forEach(c => c.classList.remove('cat-open'));
                            if (!wasOpen) {
                                col.classList.add('cat-open');
                            }
                            navLinks.scrollTop = 0;
                        }
                    });
                }
            });
        }

        // Services dropdown toggle on mobile
        if (servicesItem && !servicesItem.dataset.subBound) {
            servicesItem.dataset.subBound = "true";
            const mainServicesLink = servicesItem.querySelector(':scope > a');

            if (mainServicesLink) {
                mainServicesLink.addEventListener('click', (e) => {
                    if (window.innerWidth <= 1024) {
                        e.preventDefault();
                        e.stopPropagation();
                        const isOpen = servicesItem.classList.toggle('mob-sub-open');
                        // When opening or closing, reset categories and guarantee HOME & ABOUT US are in view
                        if (isOpen) {
                            navLinks.querySelectorAll('.mega-column').forEach(c => c.classList.remove('cat-open'));
                        }
                        navLinks.scrollTop = 0;
                    }
                });
            }
        }
    })();

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
        let rope2 = null;
        const danglingContainer = document.querySelector('.nav-actions .dangling-container') || charmString.parentElement;
        if (!danglingContainer) return;

        // Pause swinging while tooltip is shown so it hangs completely still and vertical (zero tilt!)
        charmString.classList.add('swing-paused');
        charmString.style.animation = 'none';
        charmString.style.transform = 'rotate(0deg)';

        if (!tt) {
            tt = document.createElement('div');
            tt.id = 'charm-tooltip';
            tt.style.position = 'absolute';
            tt.style.background = '#ff5722';
            tt.style.color = '#fff';
            tt.style.borderRadius = '8px';
            tt.style.fontWeight = 'bold';
            tt.style.pointerEvents = 'none';
            tt.style.opacity = '0';
            tt.style.transition = 'opacity 0.3s ease';
            tt.style.boxShadow = '0 4px 16px rgba(255,87,34,0.5)';
            tt.style.zIndex = '100000';
            tt.style.textAlign = 'center';
            tt.style.boxSizing = 'border-box';
            
            rope2 = document.createElement('div');
            rope2.className = 'charm-tooltip-rope';
            rope2.style.position = 'absolute';
            rope2.style.width = '2px';
            rope2.style.background = 'repeating-linear-gradient(to bottom, #ff5722, #ff5722 5px, #c24015 5px, #c24015 10px)';
            tt.appendChild(rope2);
            
            const textSpan = document.createElement('span');
            textSpan.id = 'charm-tooltip-text';
            tt.appendChild(textSpan);
            
            danglingContainer.appendChild(tt);
        } else {
            rope2 = tt.querySelector('.charm-tooltip-rope');
            if (tt.parentElement !== danglingContainer) {
                danglingContainer.appendChild(tt);
            }
        }

        const isMob = window.innerWidth <= 1024;
        const ropeLen = isMob ? 16 : 22;
        
        // Dynamically compute exact bottom of the charm object so the rope connects with NO GAP
        const containerRect = danglingContainer.getBoundingClientRect();
        const charmRect = charmObj.getBoundingClientRect();
        const charmBottom = charmRect.bottom - containerRect.top;
        
        tt.style.top = (charmBottom + ropeLen) + 'px';
        tt.style.left = '50%';
        tt.style.transform = 'translateX(-50%)';
        tt.style.right = 'auto';
        
        if (rope2) {
            rope2.style.left = '50%';
            rope2.style.transform = 'translateX(-50%)';
            rope2.style.top = (-ropeLen) + 'px';
            rope2.style.height = (ropeLen + 2) + 'px';
            rope2.style.right = 'auto';
            rope2.style.width = '2px';
        }
        
        if (isMob) {
            tt.style.whiteSpace = 'normal';
            tt.style.width = '210px';
            tt.style.maxWidth = 'calc(100vw - 28px)';
            tt.style.fontSize = '12px';
            tt.style.padding = '8px 14px';
            tt.style.textAlign = 'center';
            tt.style.lineHeight = '1.35';
            
            if (text === "Your offer still stays, pull me again!") {
                document.getElementById('charm-tooltip-text').innerHTML = 'Your offer still stays,<br>pull me again!';
            } else {
                document.getElementById('charm-tooltip-text').innerText = text;
            }
        } else {
            tt.style.whiteSpace = 'nowrap';
            tt.style.width = 'auto';
            tt.style.maxWidth = 'none';
            tt.style.fontSize = '13px';
            tt.style.padding = '8px 16px';
            tt.style.lineHeight = '1.4';
            document.getElementById('charm-tooltip-text').innerText = text;
        }
        
        tt.style.opacity = '1';
        
        if (window.charmTooltipTimeout) clearTimeout(window.charmTooltipTimeout);
        window.charmTooltipTimeout = setTimeout(() => {
            tt.style.opacity = '0';
            setTimeout(() => {
                if (!isCut && !isDragging) {
                    charmString.classList.remove('swing-paused');
                    charmString.style.animation = 'swing 3s ease-in-out infinite alternate';
                    charmString.style.transform = '';
                }
            }, 350);
        }, duration);
    };
    window.showCharmTooltip = showCharmTooltip;

    const getCoords = (e) => {
        if (e.touches && e.touches.length > 0) {
            return { x: e.touches[0].clientX, y: e.touches[0].clientY };
        }
        if (e.changedTouches && e.changedTouches.length > 0) {
            return { x: e.changedTouches[0].clientX, y: e.changedTouches[0].clientY };
        }
        return { x: e.clientX !== undefined ? e.clientX : 0, y: e.clientY !== undefined ? e.clientY : 0 };
    };

    const onPointerDown = (e) => {
        if (isCut) return;
        if (e.cancelable) e.preventDefault();
        isDragging = true;
        hasSettled = false;
        charmObj.style.cursor = 'grabbing';
        charmObj.style.touchAction = 'none';
        charmString.classList.add('swing-paused');
        charmString.style.animation = 'none';
        charmString.style.transform = 'none';
        
        const tt = document.getElementById('charm-tooltip');
        if (tt) tt.style.opacity = '0';
        if (window.charmTooltipTimeout) clearTimeout(window.charmTooltipTimeout);
        
        const rect = charmObj.getBoundingClientRect();
        const stringRect = charmString.getBoundingClientRect();
        
        anchorX = stringRect.left + stringRect.width / 2;
        anchorY = stringRect.top;
        
        const coords = getCoords(e);
        dragStartX = coords.x;
        dragStartY = coords.y;
        
        charmObj.style.setProperty('position', 'fixed', 'important');
        charmObj.style.setProperty('left', rect.left + 'px', 'important');
        charmObj.style.setProperty('top', rect.top + 'px', 'important');
        charmObj.style.setProperty('margin', '0', 'important');
        charmObj.style.setProperty('z-index', '999999', 'important');
        
        currentX = rect.left;
        currentY = rect.top;
        startX = currentX;
        startY = currentY;

        if (e.pointerId !== undefined && charmObj.setPointerCapture) {
            try { charmObj.setPointerCapture(e.pointerId); } catch(err){}
        }
    };

    const getObjMetrics = () => {
        const isMob = window.innerWidth <= 1024;
        const isTiny = window.innerWidth <= 400;
        const w = charmObj.offsetWidth || (isMob ? (isTiny ? 32 : 36) : 48);
        const h = isMob ? (isTiny ? 44 : 48) : 70;
        return { 
            halfW: w / 2, 
            restH: h, 
            minStretch: isMob ? 35 : 45, 
            maxStretch: isMob ? 220 : 280 
        };
    };

    const drawString = () => {
        if (isCut || !isDragging) return;
        const { halfW } = getObjMetrics();
        const dx = (currentX + halfW) - anchorX;
        const dy = (currentY) - anchorY;
        const angle = Math.atan2(dy, dx) - Math.PI / 2;
        const dist = Math.sqrt(dx * dx + dy * dy);
        
        charmString.style.height = dist + 'px';
        charmString.style.transform = `rotate(${angle}rad)`;
    };

    const onPointerMove = (e) => {
        if (!isDragging || isCut) return;
        if (e.cancelable) e.preventDefault();
        
        const coords = getCoords(e);
        const dx = coords.x - dragStartX;
        const dy = coords.y - dragStartY;
        
        currentX = startX + dx;
        currentY = startY + dy;
        
        charmObj.style.setProperty('left', currentX + 'px', 'important');
        charmObj.style.setProperty('top', currentY + 'px', 'important');
        
        drawString();
        
        const { halfW, maxStretch } = getObjMetrics();
        const stretchDist = Math.sqrt(Math.pow((currentX + halfW) - anchorX, 2) + Math.pow(currentY - anchorY, 2));
        if (stretchDist > maxStretch) {
            cutString();
        }
    };

    const onPointerUp = (e) => {
        if (!isDragging || isCut) return;
        isDragging = false;
        charmObj.style.cursor = 'grab';
        
        if (e && e.pointerId !== undefined && charmObj.releasePointerCapture) {
            try { charmObj.releasePointerCapture(e.pointerId); } catch(err){}
        }
        
        const { halfW, restH, minStretch } = getObjMetrics();
        const stretchDist = Math.sqrt(Math.pow((currentX + halfW) - anchorX, 2) + Math.pow(currentY - anchorY, 2));
        
        if (stretchDist >= minStretch) {
            cutString();
        } else {
            // Not pulled enough: return smoothly to rope
            charmString.style.transition = 'all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
            charmString.style.height = restH + 'px';
            charmString.style.transform = 'rotate(0deg)';
            
            charmObj.style.setProperty('transition', 'all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275)', 'important');
            const stringRect = charmString.getBoundingClientRect();
            charmObj.style.setProperty('left', (stringRect.left - halfW + stringRect.width / 2) + 'px', 'important');
            charmObj.style.setProperty('top', (stringRect.top + restH) + 'px', 'important');
            
            setTimeout(() => {
                charmString.style.transition = 'none';
                charmObj.style.removeProperty('transition');
                charmObj.style.removeProperty('position');
                charmObj.style.removeProperty('left');
                charmObj.style.removeProperty('top');
                charmObj.style.removeProperty('margin');
                charmObj.style.removeProperty('z-index');
                charmObj.style.position = 'absolute';
                charmObj.style.left = (-halfW) + 'px';
                charmObj.style.top = restH + 'px';
                charmString.appendChild(charmObj);
                charmString.classList.remove('swing-paused');
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

        // Attach charmObj to document.body for the full flight across the site
        document.body.appendChild(charmObj);
        charmObj.style.setProperty('position', 'fixed', 'important');
        charmObj.style.setProperty('z-index', '999999', 'important');
        
        const isMob = window.innerWidth <= 1024;
        const { halfW } = getObjMetrics();
        const pullDx = anchorX - (currentX + halfW);
        const pullDy = anchorY - currentY;
        
        // Calibrated launch velocity
        const speedScale = isMob ? 0.16 : 0.14;
        vx = pullDx * speedScale;
        vy = pullDy * speedScale;
        
        // Ensure energetic horizontal & vertical launch across site
        const centerDirection = (window.innerWidth / 2 > currentX) ? 1 : -1;
        if (Math.abs(vx) < (isMob ? 8 : 6)) {
            vx = centerDirection * (isMob ? (10 + Math.random() * 3) : (8 + Math.random() * 3));
        }
        if (Math.abs(vy) < (isMob ? 7 : 5)) {
            vy = (vy < 0 ? -1 : 1) * (isMob ? (9 + Math.random() * 3) : (7 + Math.random() * 3));
        }
        
        // Cap max velocity
        const maxV = isMob ? 18 : 16;
        vx = Math.max(-maxV, Math.min(maxV, vx));
        vy = Math.max(-maxV, Math.min(maxV, vy));
        
        spinVelocity = (vx > 0 ? 1 : -1) * 8;
        bounces = 0;
        
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
        
        const isMob = window.innerWidth <= 1024;
        currentX += vx;
        currentY += vy;
        vy += (isMob ? 0.22 : gravity);
        spinAngle += spinVelocity;
        
        const objW = charmObj.offsetWidth || (isMob ? 36 : 48);
        const objH = charmObj.offsetHeight || (isMob ? 36 : 48);
        const minX = 14;
        const maxX = window.innerWidth - objW - 14;
        const minY = isMob ? 65 : 12; // Keep below mobile navbar so it bounces clean off the header
        const maxY = window.innerHeight - objH - 20;
        
        let bouncedThisFrame = false;

        if (currentX <= minX) {
            currentX = minX;
            vx = Math.abs(vx) * 0.86;
            if (vx < 7) vx = 8 + Math.random() * 3; // Guaranteed energetic rebound
            spinVelocity = -spinVelocity * 0.95;
            bouncedThisFrame = true;
        } else if (currentX >= maxX) {
            currentX = maxX;
            vx = -Math.abs(vx) * 0.86;
            if (vx > -7) vx = -(8 + Math.random() * 3); // Guaranteed energetic rebound
            spinVelocity = -spinVelocity * 0.95;
            bouncedThisFrame = true;
        }
        
        if (currentY <= minY) {
            currentY = minY;
            vy = Math.abs(vy) * 0.86;
            if (vy < 7) vy = 8 + Math.random() * 3;
            bouncedThisFrame = true;
        } else if (currentY >= maxY) {
            currentY = maxY;
            vy = -Math.abs(vy) * 0.86;
            if (vy > -9) vy = -(10 + Math.random() * 4); // Strong bounce off floor
            bouncedThisFrame = true;
        }
        
        if (bouncedThisFrame) {
            bounces++;
        }
        
        charmObj.style.setProperty('left', currentX + 'px', 'important');
        charmObj.style.setProperty('top', currentY + 'px', 'important');
        charmObj.style.setProperty('transform', `rotate(${spinAngle}deg)`, 'important');
        
        requestAnimationFrame(physicsLoop);
    };

    const settleAndTransform = () => {
        if (hasSettled) return;
        hasSettled = true;
        if (fallbackTimeout) clearTimeout(fallbackTimeout);
        
        const isMob = window.innerWidth <= 1024;
        const objW = charmObj.offsetWidth || (isMob ? 36 : 48);
        const objH = charmObj.offsetHeight || (isMob ? 36 : 48);
        const targetX = (window.innerWidth - objW) / 2;
        const targetY = (window.innerHeight * 0.42) - (objH / 2);
        
        charmObj.style.setProperty('transition', 'all 0.85s cubic-bezier(0.25, 1, 0.5, 1)', 'important');
        charmObj.style.setProperty('left', targetX + 'px', 'important');
        charmObj.style.setProperty('top', targetY + 'px', 'important');
        charmObj.style.setProperty('transform', (isMob ? 'scale(1.8)' : 'scale(2.2)') + ' rotate(720deg)', 'important');
        
        setTimeout(() => {
            // Instantly hide and lower z-index of charm logo before opening modal
            charmObj.style.setProperty('z-index', '-99999', 'important');
            charmObj.style.setProperty('display', 'none', 'important');
            charmObj.style.setProperty('opacity', '0', 'important');
            charmObj.style.setProperty('visibility', 'hidden', 'important');
            charmObj.style.setProperty('pointer-events', 'none', 'important');
            showHiddenOffer();
            triggerFireworks();
        }, 900);
    };

    const returnToNavbar = (message) => {
        const stringRect = charmString.getBoundingClientRect();
        const isMobile = window.innerWidth <= 1024;
        const targetTop = isMobile ? (window.innerWidth <= 400 ? 44 : 48) : 70;
        const targetLeft = isMobile ? (window.innerWidth <= 400 ? -16 : -18) : -24;
        
        charmObj.style.setProperty('display', 'block', 'important');
        charmObj.style.setProperty('opacity', '1', 'important');
        charmObj.style.setProperty('visibility', 'visible', 'important');
        charmObj.style.setProperty('pointer-events', 'auto', 'important');
        charmObj.style.setProperty('z-index', '1001', 'important');
        charmObj.style.setProperty('transition', 'all 0.85s cubic-bezier(0.5, 0, 0.2, 1)', 'important');
        charmObj.style.setProperty('transform', 'scale(1) rotate(0deg)', 'important');
        charmObj.style.setProperty('left', (stringRect.left + targetLeft + stringRect.width / 2) + 'px', 'important');
        charmObj.style.setProperty('top', (stringRect.top + targetTop) + 'px', 'important');
        
        setTimeout(() => {
            charmString.style.opacity = '1';
            charmObj.style.removeProperty('transition');
            charmObj.style.removeProperty('position');
            charmObj.style.removeProperty('left');
            charmObj.style.removeProperty('top');
            charmObj.style.removeProperty('transform');
            charmObj.style.removeProperty('margin');
            charmObj.style.removeProperty('z-index');
            charmObj.style.removeProperty('display');
            charmObj.style.removeProperty('visibility');
            charmObj.style.removeProperty('pointer-events');
            charmObj.style.position = 'absolute';
            charmObj.style.left = targetLeft + 'px';
            charmObj.style.top = targetTop + 'px';
            charmString.appendChild(charmObj);
            
            charmString.style.height = targetTop + 'px';
            charmString.style.transform = 'rotate(0deg)';
            charmString.classList.add('swing-paused');
            charmString.style.animation = 'none';
            
            isCut = false;
            hasSettled = false;
            
            showCharmTooltip(message, 5000);
            updateCharmScrollVisibility();
        }, 900);
    };

    const showHiddenOffer = () => {
        // Eradicate any old or duplicate contact modal immediately
        document.querySelectorAll('#charm-contact-modal').forEach(el => el.remove());
        
        // Completely hide charm object and lower its z-index behind everything
        charmObj.style.setProperty('display', 'none', 'important');
        charmObj.style.setProperty('opacity', '0', 'important');
        charmObj.style.setProperty('visibility', 'hidden', 'important');
        charmObj.style.setProperty('pointer-events', 'none', 'important');
        charmObj.style.setProperty('z-index', '-99999', 'important');
        
        if (document.getElementById('hidden-offer-overlay')) {
            document.getElementById('hidden-offer-overlay').remove();
        }
        
        const overlay = document.createElement('div');
        overlay.id = 'hidden-offer-overlay';
        overlay.style.position = 'fixed';
        overlay.style.top = '0'; overlay.style.left = '0';
        overlay.style.width = '100vw'; overlay.style.height = '100vh';
        overlay.style.background = 'rgba(0,0,0,0.85)';
        overlay.style.zIndex = '1000000';
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
        formBox.style.zIndex = '1000001';
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
            <p style="font-size: 1.15rem; margin-bottom: 24px; line-height: 1.5; color: #e0e0e0; font-family: 'Segoe UI', Roboto, sans-serif;">If you build a website with us, we give you <strong style="color: #ff5722; font-size: 1.25rem;">2 blogs free!</strong></p>
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

    charmObj.addEventListener('pointerdown', onPointerDown);
    charmObj.addEventListener('mousedown', onPointerDown);
    charmObj.addEventListener('touchstart', onPointerDown, {passive: false});

    window.addEventListener('pointermove', onPointerMove, {passive: false});
    window.addEventListener('mousemove', onPointerMove, {passive: false});
    window.addEventListener('touchmove', onPointerMove, {passive: false});

    window.addEventListener('pointerup', onPointerUp);
    window.addEventListener('mouseup', onPointerUp);
    window.addEventListener('touchend', onPointerUp);
    window.addEventListener('pointercancel', onPointerUp);
    window.addEventListener('touchcancel', onPointerUp);

    // Vanish charm when scrolling down so it doesn't obstruct reading content (both mobile & desktop)
    let isCharmScrolledHidden = false;
    const updateCharmScrollVisibility = () => {
        // If user is actively dragging or charm is in flight, do not interrupt
        if (isDragging || isCut) return;
        
        const currentScroll = window.pageYOffset || window.scrollY || document.documentElement.scrollTop || document.body.scrollTop || 0;
        const shouldHide = currentScroll > 45;
        if (shouldHide !== isCharmScrolledHidden) {
            isCharmScrolledHidden = shouldHide;
            if (isCharmScrolledHidden) {
                charmString.classList.add('charm-hidden-on-scroll');
                charmObj.classList.add('charm-hidden-on-scroll');
                const tt = document.getElementById('charm-tooltip');
                if (tt) tt.classList.add('charm-hidden-on-scroll');
            } else {
                charmString.classList.remove('charm-hidden-on-scroll');
                charmObj.classList.remove('charm-hidden-on-scroll');
                const tt = document.getElementById('charm-tooltip');
                if (tt) tt.classList.remove('charm-hidden-on-scroll');
            }
        }
    };

    window.addEventListener('scroll', updateCharmScrollVisibility, { passive: true });
    document.addEventListener('scroll', updateCharmScrollVisibility, { passive: true });
    window.addEventListener('touchmove', updateCharmScrollVisibility, { passive: true });
    window.addEventListener('resize', updateCharmScrollVisibility, { passive: true });
    updateCharmScrollVisibility();

    // ==========================================================================
    // UNIVERSAL SCROLL REVEAL ANIMATION ENGINE
    // Smooth, GPU-accelerated reveal animations across services & all subpages
    // ==========================================================================
    (function initScrollReveal() {
        const targetSelectors = [
            // Subpage Primary Elements
            '.service-card-block',
            '.process-card',
            '.metric-card',
            '.tech-chip',
            '.benefit-card',
            '.package-card',
            '.pricing-card',
            '.cta-banner',
            '.spec-row',
            '.deliverable-item',

            // services.html Main Elements
            '.bento-card-unit',
            '.service-stat-card',
            '.stat-matrix-cell',
            '.stage-view-card',
            '.framework-card',
            '.industry-card-unit',
            '.sprint-step-node',
            '.faq-accordion-item',
            '.cta-conversion-box',

            // General & Company Pages
            '.team-card',
            '.brand-card',
            '.career-card',
            '.job-card',
            '.portfolio-card',
            '.work-card',
            '.about-pillar',
            '.value-box'
        ];

        // Gather matched elements and filter out any whose parent or ancestor is already a target
        const rawElements = Array.from(document.querySelectorAll(targetSelectors.join(', ')));
        const elements = rawElements.filter(el => {
            const parentTarget = el.parentElement ? el.parentElement.closest(targetSelectors.join(', ')) : null;
            return !parentTarget;
        });

        if (!elements.length) return;

        // Apply automatic stagger timing to child items in recognized grid layouts
        const gridSelectors = [
            '.process-grid',
            '.tech-chips',
            '.bento-services-grid',
            '.hero-stats-matrix',
            '.service-stats-matrix',
            '.industries-cards-matrix',
            '.sprint-timeline-row',
            '.faq-accordion-list',
            '.team-grid',
            '.brands-grid',
            '.metrics-grid'
        ];

        gridSelectors.forEach(gridSel => {
            document.querySelectorAll(gridSel).forEach(grid => {
                const items = Array.from(grid.children).filter(child => elements.includes(child));
                items.forEach((item, index) => {
                    item.classList.add(`fx-stagger-${Math.min((index % 6) + 1, 6)}`);
                });
            });
        });

        // Initialize elements with directional and scaling animation classes
        elements.forEach(el => {
            if (el.classList.contains('bento-card-unit') || el.classList.contains('process-card')) {
                el.classList.add('fx-reveal-init', 'fx-reveal-scale');
            } else {
                el.classList.add('fx-reveal-init');
            }
        });

        // Use performant IntersectionObserver for scroll-triggered reveals
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        // Clean up will-change after transition completes to preserve memory
                        setTimeout(() => {
                            entry.target.style.willChange = 'auto';
                        }, 850);
                        obs.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.05,
                rootMargin: '0px 0px -20px 0px'
            });

            elements.forEach(el => {
                // If element is already visible above the fold on initial load, reveal immediately
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    el.classList.add('is-revealed');
                } else {
                    observer.observe(el);
                }
            });
        } else {
            // Instant reveal fallback for older browsers
            elements.forEach(el => el.classList.add('is-revealed'));
        }
    })();
});
