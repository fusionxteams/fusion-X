// shatter-animation.js
const shatterContainer = document.getElementById('shatter-canvas-container');
const triggerBtn = document.getElementById('trigger-shatter-btn');
const revealText = document.getElementById('fusion-reveal-text');

if (shatterContainer && typeof THREE !== 'undefined') {
    const scene = new THREE.Scene();
    
    const aspect = shatterContainer.clientWidth / shatterContainer.clientHeight;
    // We use an Orthographic Camera or a pulled back Perspective to make the 2D plane look flat
    const camera = new THREE.PerspectiveCamera(60, aspect, 0.1, 1000);
    camera.position.set(0, 0, 25);
    
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(shatterContainer.clientWidth, shatterContainer.clientHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    shatterContainer.appendChild(renderer.domElement);

    // --- Create the Platform Line ---
    const platformGeo = new THREE.PlaneGeometry(60, 0.2);
    const platformMat = new THREE.MeshBasicMaterial({ color: 0x000000 }); 
    const platform = new THREE.Mesh(platformGeo, platformMat);
    platform.position.y = -5;
    scene.add(platform);

    // --- Load the User's Samurai Image ---
    const textureLoader = new THREE.TextureLoader();
    const samuraiTexture = textureLoader.load('assets/samurai.png');
    
    // We use MultiplyBlending so the white background of the image becomes fully transparent
    // against our white HTML background, leaving only the black silhouette!
    const samuraiMat = new THREE.MeshBasicMaterial({ 
        map: samuraiTexture,
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

    // --- Particles for the Explosion ---
    const particles = [];
    const particleGroup = new THREE.Group();
    scene.add(particleGroup);
    const orangeMat = new THREE.MeshBasicMaterial({ color: 0xff5722 });
    const blackParticleMat = new THREE.MeshBasicMaterial({ color: 0x000000 });

    function explodeX() {
        xGroup.visible = false;
        const partGeo = new THREE.BoxGeometry(0.5, 0.5, 0.5);
        for(let i=0; i < 150; i++) {
            const mat = Math.random() > 0.5 ? orangeMat : blackParticleMat;
            const mesh = new THREE.Mesh(partGeo, mat);
            mesh.position.copy(xGroup.position);
            mesh.position.x += (Math.random() - 0.5) * 4;
            mesh.position.y += (Math.random() - 0.5) * 4;
            
            const velocity = new THREE.Vector3(
                (Math.random() - 0.5) * 30,
                (Math.random()) * 25, // Blast up and out
                (Math.random() - 0.5) * 20 + 10
            );
            
            const rotSpeed = new THREE.Vector3(
                Math.random() * 0.2, Math.random() * 0.2, Math.random() * 0.2
            );

            particleGroup.add(mesh);
            particles.push({ mesh, velocity, rotSpeed });
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
        samurai.position.set(25, 0.5, 0); // Start far right
        samurai.rotation.set(0, 0, 0); // Upright
        samuraiMat.opacity = 1;
        
        // Reset X
        xGroup.visible = true;
        
        // Reset HTML
        revealText.style.opacity = '0';
        revealText.style.transform = 'scale(0.1)';
        triggerBtn.style.opacity = '0';

        // Clear particles
        while(particleGroup.children.length > 0) particleGroup.remove(particleGroup.children[0]);
        particles.length = 0;
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
            // Anime Dash (super fast slide)
            samurai.position.x -= 40 * dt;
            
            // Add a dash line effect
            dashLineMat.opacity = 0.2;
            dashLine.position.copy(samurai.position);
            dashLine.position.x += 15;

            // Stop when he reaches the center (near the X)
            if (samurai.position.x <= 2) {
                state = 'slashing';
                timeInState = 0;
                dashLineMat.opacity = 0;
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
            // Simulate particles
            particles.forEach(p => {
                p.mesh.position.addScaledVector(p.velocity, dt);
                p.mesh.rotation.x += p.rotSpeed.x;
                p.mesh.rotation.y += p.rotSpeed.y;
                p.velocity.y -= 30 * dt; // Gravity
            });

            // The word "FUSION" pushes him back
            if (timeInState > 0.4) {
                state = 'falling';
                timeInState = 0;
            }
        }
        else if (state === 'falling') {
            particles.forEach(p => {
                p.mesh.position.addScaledVector(p.velocity, dt);
                p.mesh.rotation.x += p.rotSpeed.x;
                p.mesh.rotation.y += p.rotSpeed.y;
                p.velocity.y -= 30 * dt; 
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
