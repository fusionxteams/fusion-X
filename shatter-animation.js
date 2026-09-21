// shatter-animation.js
const shatterContainer = document.getElementById('shatter-canvas-container');
const triggerBtn = document.getElementById('trigger-shatter-btn');
const revealText = document.getElementById('fusion-reveal-text');
const subText = document.getElementById('fusion-subtext');
const samuraiImg = document.getElementById('html-samurai');
const dashLine = document.getElementById('html-dashline');
const xGlow = document.getElementById('x-glow');

// --- THREE.JS BACKGROUND LIGHTNING ---
let triggerLightning = () => {};

if (shatterContainer && typeof THREE !== 'undefined') {
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(60, shatterContainer.clientWidth / shatterContainer.clientHeight, 0.1, 1000);
    camera.position.z = 20;
    
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(shatterContainer.clientWidth, shatterContainer.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    shatterContainer.appendChild(renderer.domElement);

        transparent: true,
        blending: THREE.MultiplyBlending 
    });
    
    const samuraiGeo = new THREE.PlaneGeometry(12, 12);
    const samurai = new THREE.Mesh(samuraiGeo, samuraiMat);
    // Align his feet with the platform
    samurai.position.set(20, 0.5, 0); 
    scene.add(samurai);

    // --- The "X" Target ---
    const xGroup = new THREE.Group();
    const xMat = new THREE.MeshBasicMaterial({ color: 0x000000 });
    const bar1 = new THREE.Mesh(new THREE.BoxGeometry(0.5, 8, 1), xMat);
    bar1.rotation.z = Math.PI / 4;
    const bar2 = new THREE.Mesh(new THREE.BoxGeometry(0.5, 8, 1), xMat);
    bar2.rotation.z = -Math.PI / 4;
    xGroup.add(bar1);
    xGroup.add(bar2);
    xGroup.position.set(-2, 0, 0);
    scene.add(xGroup);

    // --- Lightning Bolts for the Explosion ---
    const lightningGroup = new THREE.Group();
    scene.add(lightningGroup);
    
    // Create a flash effect for the background
    const flashGeo = new THREE.PlaneGeometry(200, 200);
    const flashMat = new THREE.MeshBasicMaterial({ color: 0x00aaff, transparent: true, opacity: 0 });
    const flash = new THREE.Mesh(flashGeo, flashMat);
    flash.position.z = -10;
    scene.add(flash);

    function createLightningBolt(startX, startY, angle) {
        const points = [];
        let currentX = startX;
        let currentY = startY;
        points.push(new THREE.Vector3(currentX, currentY, 0));
        
        // Generate jagged points outward
        for (let i = 0; i < 8; i++) {
            // Move outward along the angle
            currentX += Math.cos(angle) * (Math.random() * 3 + 2);
            currentY += Math.sin(angle) * (Math.random() * 3 + 2);
            
            // Add jitter perpendicular to the angle for the zig-zag
            const jitter = (Math.random() - 0.5) * 4;
            const px = currentX + Math.cos(angle + Math.PI/2) * jitter;
            const py = currentY + Math.sin(angle + Math.PI/2) * jitter;
            
            points.push(new THREE.Vector3(px, py, (Math.random() - 0.5) * 2));
        }
        
        const geometry = new THREE.BufferGeometry().setFromPoints(points);
        // Bright blue neon color
        const material = new THREE.LineBasicMaterial({ color: 0x00d4ff, linewidth: 2 });
        const line = new THREE.Line(geometry, material);
        return line;
    }

    const lightningBolts = [];

    function explodeX() {
        xGroup.visible = false;
        
        // Flash the screen blue
        flashMat.opacity = 0.8;

        // Generate 12 lightning bolts blasting outward in all directions
        for(let i=0; i < 12; i++) {
            const angle = (i / 12) * Math.PI * 2 + (Math.random() * 0.5);
            const bolt = createLightningBolt(0, 2.5, angle); // start near center of X
            lightningGroup.add(bolt);
            lightningBolts.push(bolt);
        }
    }

    // --- Animation State Machine ---
    let state = 'waiting'; // waiting, dashing, slashing, exploding, falling, done
    let clock = new THREE.Clock();
    let timeInState = 0;

    function resetSequence() {
        state = 'dashing';
        timeInState = 0;
        
        // Reset Samurai
        samurai.position.set(25, 0.5, 0); 
        samurai.rotation.set(0, 0, 0); 
        samuraiMat.opacity = 1;
        
        // Reset X
        xGroup.visible = true;
        
        // Reset HTML
        revealText.style.opacity = '0';
        revealText.style.transform = 'scale(0.1)';
        triggerBtn.style.opacity = '0';
        
        // Reset Lightning
        flashMat.opacity = 0;
        while(lightningGroup.children.length > 0) lightningGroup.remove(lightningGroup.children[0]);
        lightningBolts.length = 0;
    }

    triggerBtn.addEventListener('click', resetSequence);

    // Anime-style visual effects
    const dashLineGeo = new THREE.PlaneGeometry(30, 0.1);
    const dashLineMat = new THREE.MeshBasicMaterial({ color: 0x000000, transparent: true, opacity: 0 });
    const dashLine = new THREE.Mesh(dashLineGeo, dashLineMat);
    scene.add(dashLine);

    function animate() {
        requestAnimationFrame(animate);
        const dt = clock.getDelta();
        timeInState += dt;

        if (state === 'dashing') {
            // Slower movement so the user can clearly see him run in
            samurai.position.x -= 12 * dt;
            
            // Add a bounding/bobbing effect to simulate "running" with a static image
            // Math.abs(Math.sin) creates a bouncing curve
            samurai.position.y = 0.5 + Math.abs(Math.sin(timeInState * 12)) * 0.8;
            
            // Add a dash line effect
            dashLineMat.opacity = 0.2;
            dashLine.position.copy(samurai.position);
            dashLine.position.x += 15;

            // Stop when he reaches the center (near the X)
            if (samurai.position.x <= 2) {
                state = 'slashing';
                timeInState = 0;
                dashLineMat.opacity = 0;
                samurai.position.y = 0.5; // Plant feet firmly
            }
        } 

        else if (state === 'slashing') {
            // Anime Slash pop (slight tilt and scale up to emphasize impact)
            if (timeInState < 0.1) {
                samurai.scale.set(1.1, 1.1, 1);
                samurai.rotation.z = 0.1;
            } else {
                samurai.scale.set(1, 1, 1);
                samurai.rotation.z = 0;
                
                // Slash finished
                state = 'exploding';
                timeInState = 0;
                explodeX();
                // Reveal HTML Text
                revealText.style.opacity = '1';
                revealText.style.transform = 'scale(1)';
            }
        }
        else if (state === 'exploding') {
            // Animate Lightning
            if (flashMat.opacity > 0) flashMat.opacity -= 2 * dt; // Fade flash quickly
            
            lightningBolts.forEach(bolt => {
                // Jitter the vertices randomly for a chaotic electric effect
                const positions = bolt.geometry.attributes.position.array;
                for(let i = 3; i < positions.length; i += 3) {
                    positions[i] += (Math.random() - 0.5) * 0.5;
                    positions[i+1] += (Math.random() - 0.5) * 0.5;
                }
                bolt.geometry.attributes.position.needsUpdate = true;
                
                // Expand outward
                bolt.scale.addScalar(5 * dt);
                // Fade out
                if (bolt.material.opacity > 0) bolt.material.opacity -= 3 * dt;
            });

            // The word "FUSION" pushes him back
            if (timeInState > 0.4) {
                state = 'falling';
                timeInState = 0;
            }
        }
        else if (state === 'falling') {
            if (flashMat.opacity > 0) flashMat.opacity -= 2 * dt;
            lightningBolts.forEach(bolt => {
                bolt.scale.addScalar(2 * dt);
                if (bolt.material.opacity > 0) bolt.material.opacity -= 2 * dt;
            });

            // Push Samurai back and knock him over
            if (samurai.position.x < 15) {
                samurai.position.x += 15 * dt; // slide right violently
                samurai.position.y += 2 * dt; // knock up slightly
            } else if (samurai.position.y > -3) {
                samurai.position.y -= 15 * dt; // fall down off platform
            }

            // Rotate him flat on his back
            if (samurai.rotation.z > -Math.PI / 2) {
                samurai.rotation.z -= 6 * dt; 
            }

            // Fade out
            if (samuraiMat.opacity > 0) {
                samuraiMat.opacity -= 1 * dt;
            }

            if (timeInState > 2.0) {
                state = 'done';
                triggerBtn.style.opacity = '1';
                triggerBtn.innerText = 'Replay Animation';
            }
        }

        renderer.render(scene, camera);
    }
    
    clock.start();
    animate();

    // Trigger on scroll via Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && state === 'waiting') {
            setTimeout(() => {
                resetSequence();
            }, 500); 
        }
    }, { threshold: 0.5 });
    observer.observe(document.getElementById('fusion-shatter'));

    window.addEventListener('resize', () => {
        if (!shatterContainer) return;
        camera.aspect = shatterContainer.clientWidth / shatterContainer.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(shatterContainer.clientWidth, shatterContainer.clientHeight);
    });
}
