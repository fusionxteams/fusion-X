/**
 * Fusion X - Elastic Slingshot Charm Physics Engine
 * Handles interactive rubber-band stretching, slingshot launch trajectory,
 * contact modal trigger, and seamless spring reset.
 */

(function () {
    function initCharmPhysics() {
        const stringElement = document.querySelector('.charm-string');
        const charmElement = document.querySelector('.charm-object');
        const container = document.querySelector('.dangling-container');

        if (!stringElement || !charmElement || !container) return;

        // Base constants
        const DEFAULT_LENGTH = 70; // px
        const MIN_STRETCH_TO_LAUNCH = 45; // px of stretch beyond default to launch
        const MAX_PULL_DIST = 175; // max length in px

        // Physics state
        let angle = 0; // current angle in radians
        let length = DEFAULT_LENGTH;
        let aVelocity = 0;
        let isDragging = false;
        let hasDetached = false;
        let animFrameId = null;

        // Set initial styling for smooth physics
        stringElement.style.animation = 'none';
        stringElement.style.transformOrigin = 'top center';
        stringElement.style.transition = 'none';
        stringElement.style.pointerEvents = 'none';

        charmElement.style.cursor = 'grab';
        charmElement.style.pointerEvents = 'auto';
        charmElement.style.userSelect = 'none';
        charmElement.style.webkitUserDrag = 'none';
        charmElement.style.touchAction = 'none';
        charmElement.style.transition = 'none';

        // Add a gentle hover effect
        charmElement.addEventListener('mouseenter', () => {
            if (!isDragging && !hasDetached) {
                charmElement.style.filter = 'drop-shadow(0 6px 14px rgba(255, 87, 34, 0.75))';
                charmElement.title = "Pull down to slingshot!";
            }
        });
        charmElement.addEventListener('mouseleave', () => {
            if (!isDragging && !hasDetached) {
                charmElement.style.filter = 'drop-shadow(0 4px 6px rgba(0,0,0,0.25))';
            }
        });

        // Main physics loop (idle swing + spring return)
        let lastTime = performance.now();

        function physicsLoop(now) {
            const dt = Math.min((now - lastTime) / 1000, 0.1);
            lastTime = now;

            if (!isDragging && !hasDetached) {
                // Pendulum physics with gravity and damping
                const gravity = 18;
                const damping = 0.985;
                const aAcceleration = (-gravity / (length / 50)) * Math.sin(angle);
                aVelocity += aAcceleration * dt * 60;
                aVelocity *= damping;
                angle += aVelocity * dt;

                // Return length back to default with spring force
                const lengthDiff = DEFAULT_LENGTH - length;
                length += lengthDiff * 0.18;

                // Subtle natural idle sway if almost stopped
                if (Math.abs(angle) < 0.005 && Math.abs(aVelocity) < 0.005) {
                    angle = 0.07 * Math.sin(now * 0.002);
                }

                // Apply transform
                updateStringAndCharm(angle, length);
            }

            animFrameId = requestAnimationFrame(physicsLoop);
        }

        animFrameId = requestAnimationFrame(physicsLoop);

        // Helper: Updates string rotation, length, and keeps charm pinned at the tip
        function updateStringAndCharm(currentAngle, currentLength) {
            const deg = currentAngle * (180 / Math.PI);
            stringElement.style.height = `${currentLength}px`;
            stringElement.style.transform = `rotate(${deg}deg)`;

            // Keep charm at the bottom tip of string
            charmElement.style.transform = `translate(-50%, ${currentLength}px) rotate(${-deg * 0.4}deg)`;
        }

        // Start Drag
        function startDrag(e) {
            if (hasDetached) return;
            isDragging = true;
            aVelocity = 0;
            charmElement.style.cursor = 'grabbing';
            charmElement.style.filter = 'drop-shadow(0 8px 18px rgba(255, 87, 34, 0.9))';

            if (e.cancelable) e.preventDefault();
        }

        // Drag Move
        function onDrag(e) {
            if (!isDragging || hasDetached) return;

            const point = e.touches ? e.touches[0] : e;

            // Anchor point calculation (pivot point under the LET'S CONNECT button)
            const containerRect = container.getBoundingClientRect();
            const anchorX = containerRect.left + (containerRect.width / 2);
            const anchorY = containerRect.top + 35; // top of string

            // Vector from anchor to current pointer
            const vectorX = point.clientX - anchorX;
            const vectorY = Math.max(point.clientY - anchorY, 20); // pull downwards

            let dist = Math.sqrt(vectorX * vectorX + vectorY * vectorY);
            if (dist > MAX_PULL_DIST) {
                dist = MAX_PULL_DIST;
            }

            // Current angle from vertical
            const targetAngle = Math.atan2(vectorX, vectorY);

            // Stretch the string
            length = dist;
            angle = targetAngle;

            updateStringAndCharm(angle, length);

            const stretchAmount = length - DEFAULT_LENGTH;
            if (stretchAmount >= MIN_STRETCH_TO_LAUNCH) {
                stringElement.style.background = 'repeating-linear-gradient(to bottom, #ff1744, #ff1744 5px, #d50000 5px, #d50000 10px)';
                stringElement.style.boxShadow = '0 0 14px rgba(255, 23, 68, 0.9)';
                charmElement.style.transform = `translate(-50%, ${length}px) scale(1.18) rotate(${-angle * 0.4}deg)`;
            } else {
                stringElement.style.background = 'repeating-linear-gradient(to bottom, #ff5722, #ff5722 5px, #c24015 5px, #c24015 10px)';
                stringElement.style.boxShadow = 'none';
            }

            if (e.cancelable) e.preventDefault();
        }

        // Launch Slingshot!
        function launchSlingshot() {
            hasDetached = true;
            isDragging = false;

            // 1. Get exact screen coordinates of charm right now
            const charmRect = charmElement.getBoundingClientRect();

            // 2. Snap the string back immediately
            stringElement.style.transition = 'all 0.15s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
            stringElement.style.height = `${DEFAULT_LENGTH}px`;
            stringElement.style.transform = 'rotate(0deg)';
            stringElement.style.boxShadow = 'none';
            stringElement.style.background = 'repeating-linear-gradient(to bottom, #ff5722, #ff5722 5px, #c24015 5px, #c24015 10px)';

            // 3. Move charm to body for flight across screen
            const flightCharm = charmElement.cloneNode(true);
            flightCharm.id = 'flight-charm-clone';
            flightCharm.style.position = 'fixed';
            flightCharm.style.left = `${charmRect.left}px`;
            flightCharm.style.top = `${charmRect.top}px`;
            flightCharm.style.width = `${charmRect.width}px`;
            flightCharm.style.height = `${charmRect.height}px`;
            flightCharm.style.zIndex = '999999';
            flightCharm.style.margin = '0';
            flightCharm.style.pointerEvents = 'none';
            flightCharm.style.filter = 'drop-shadow(0 10px 25px rgba(255, 87, 34, 0.9))';
            flightCharm.style.transition = 'all 0.5s cubic-bezier(0.22, 1, 0.36, 1)';
            document.body.appendChild(flightCharm);

            // Hide original charm while flying
            charmElement.style.opacity = '0';

            // Target: Center of screen
            const targetX = (window.innerWidth / 2) - (charmRect.width / 2);
            const targetY = (window.innerHeight / 2) - (charmRect.height / 2);

            // Animate flight to center with 720deg spin and scale up
            requestAnimationFrame(() => {
                flightCharm.style.left = `${targetX}px`;
                flightCharm.style.top = `${targetY}px`;
                flightCharm.style.transform = 'scale(2.4) rotate(720deg)';
            });

            // Impact shockwave + Modal Open
            setTimeout(() => {
                createShockwave(window.innerWidth / 2, window.innerHeight / 2);
                flightCharm.style.transition = 'transform 0.2s ease, opacity 0.2s ease';
                flightCharm.style.transform = 'scale(3.2) rotate(740deg)';
                flightCharm.style.opacity = '0';

                setTimeout(() => {
                    flightCharm.remove();
                    openContactModal();
                }, 200);
            }, 500);
        }

        // Shockwave ripple animation
        function createShockwave(cx, cy) {
            const wave = document.createElement('div');
            wave.style.position = 'fixed';
            wave.style.left = `${cx}px`;
            wave.style.top = `${cy}px`;
            wave.style.width = '20px';
            wave.style.height = '20px';
            wave.style.borderRadius = '50%';
            wave.style.border = '4px solid #ff5722';
            wave.style.boxShadow = '0 0 35px #ff5722, inset 0 0 25px #ff5722';
            wave.style.transform = 'translate(-50%, -50%) scale(1)';
            wave.style.opacity = '1';
            wave.style.zIndex = '999998';
            wave.style.pointerEvents = 'none';
            wave.style.transition = 'transform 0.45s ease-out, opacity 0.45s ease-out';
            document.body.appendChild(wave);

            requestAnimationFrame(() => {
                wave.style.transform = 'translate(-50%, -50%) scale(28)';
                wave.style.opacity = '0';
            });

            setTimeout(() => wave.remove(), 480);
        }

        // End Drag
        function endDrag() {
            if (!isDragging || hasDetached) return;
            isDragging = false;
            charmElement.style.cursor = 'grab';

            const stretchAmount = length - DEFAULT_LENGTH;

            // Check if pulled far enough to launch slingshot
            if (stretchAmount >= MIN_STRETCH_TO_LAUNCH) {
                launchSlingshot();
            } else {
                // Snap back with spring recoil
                stringElement.style.transition = 'all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                length = DEFAULT_LENGTH;
                aVelocity = -angle * 14; // recoil bounce in opposite direction
                stringElement.style.boxShadow = 'none';
                stringElement.style.background = 'repeating-linear-gradient(to bottom, #ff5722, #ff5722 5px, #c24015 5px, #c24015 10px)';
                updateStringAndCharm(angle, length);
                setTimeout(() => {
                    stringElement.style.transition = 'none';
                }, 350);
            }
        }

        // Reset Charm back to string after modal closes
        function resetCharm() {
            hasDetached = false;
            isDragging = false;
            angle = 0;
            length = DEFAULT_LENGTH;
            aVelocity = 0;

            charmElement.style.opacity = '1';
            charmElement.style.cursor = 'grab';
            charmElement.style.filter = 'drop-shadow(0 4px 6px rgba(0,0,0,0.25))';
            stringElement.style.transition = 'none';

            updateStringAndCharm(0, DEFAULT_LENGTH);

            // Cheerful little wobble on return
            aVelocity = 1.4;
        }

        // Modal creator
        function openContactModal() {
            if (document.getElementById('charm-contact-modal')) {
                document.getElementById('charm-contact-modal').remove();
            }

            const modalHtml = `
                <div id="charm-contact-modal" style="position:fixed; inset:0; background:rgba(0,0,0,0.75); z-index:9999999; display:flex; align-items:center; justify-content:center; backdrop-filter:blur(10px); -webkit-backdrop-filter:blur(10px); opacity:0; transition:opacity 0.35s ease;">
                    <div style="background:#ffffff; border-radius:20px; padding:40px; width:90%; max-width:520px; position:relative; transform:scale(0.85); transition:transform 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275); box-shadow:0 25px 60px rgba(0,0,0,0.3); border:1px solid rgba(255,87,34,0.2);">
                        <button id="close-modal-btn" aria-label="Close" style="position:absolute; top:18px; right:20px; background:#f5f5f7; border:none; width:36px; height:36px; border-radius:50%; font-size:22px; line-height:36px; cursor:pointer; color:#333; display:flex; align-items:center; justify-content:center; transition:background 0.2s;">&times;</button>
                        
                        <div style="display:inline-block; padding:6px 14px; background:rgba(255,87,34,0.1); border-radius:20px; color:#ff5722; font-size:12px; font-weight:700; letter-spacing:1px; text-transform:uppercase; margin-bottom:12px;">Direct Hit! 🎯</div>
                        <h2 style="font-family:'Outfit', sans-serif; font-size:2.2rem; font-weight:900; margin:0 0 10px 0; color:#111; text-transform:uppercase; letter-spacing:-0.5px;">Let's Connect</h2>
                        <p style="color:#666; font-size:0.95rem; margin-bottom:24px; line-height:1.5; font-family:'Segoe UI', Roboto, sans-serif;">You launched the Fusion X slingshot! Tell us about your brand vision and we will engineer your growth roadmap.</p>
                        
                        <form id="charm-modal-form" style="display:flex; flex-direction:column; gap:14px;">
                            <input type="text" placeholder="Your Name" required style="width:100%; padding:14px 16px; border:1px solid #e0e0e0; border-radius:10px; font-size:15px; font-family:inherit; outline:none; box-sizing:border-box; transition:border-color 0.2s;">
                            <input type="email" placeholder="Your Email Address" required style="width:100%; padding:14px 16px; border:1px solid #e0e0e0; border-radius:10px; font-size:15px; font-family:inherit; outline:none; box-sizing:border-box; transition:border-color 0.2s;">
                            <textarea placeholder="Tell us about your project or business goals..." rows="3" required style="width:100%; padding:14px 16px; border:1px solid #e0e0e0; border-radius:10px; font-size:15px; font-family:inherit; outline:none; box-sizing:border-box; resize:vertical; transition:border-color 0.2s;"></textarea>
                            <button type="submit" style="width:100%; padding:16px; background:#ff5722; color:#ffffff; border:none; border-radius:10px; font-weight:700; font-size:1rem; cursor:pointer; text-transform:uppercase; letter-spacing:1px; transition:background 0.2s, transform 0.1s; box-shadow:0 8px 20px rgba(255,87,34,0.35);">Send Message</button>
                        </form>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', modalHtml);

            const modal = document.getElementById('charm-contact-modal');
            const modalBox = modal.querySelector('div');
            const closeBtn = document.getElementById('close-modal-btn');
            const form = document.getElementById('charm-modal-form');

            requestAnimationFrame(() => {
                modal.style.opacity = '1';
                modalBox.style.transform = 'scale(1)';
            });

            function closeModal() {
                modal.style.opacity = '0';
                modalBox.style.transform = 'scale(0.85)';
                setTimeout(() => {
                    modal.remove();
                    resetCharm();
                }, 350);
            }

            closeBtn.addEventListener('click', closeModal);
            closeBtn.addEventListener('mouseenter', () => closeBtn.style.background = '#e5e5ea');
            closeBtn.addEventListener('mouseleave', () => closeBtn.style.background = '#f5f5f7');

            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                alert('Thank you! Your message has been sent successfully. We will get back to you within 24 hours.');
                closeModal();
            });
        }

        // Attach event listeners for mouse and touch
        charmElement.addEventListener('mousedown', startDrag);
        window.addEventListener('mousemove', onDrag, { passive: false });
        window.addEventListener('mouseup', endDrag);

        charmElement.addEventListener('touchstart', startDrag, { passive: false });
        window.addEventListener('touchmove', onDrag, { passive: false });
        window.addEventListener('touchend', endDrag);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCharmPhysics);
    } else {
        initCharmPhysics();
    }
})();
