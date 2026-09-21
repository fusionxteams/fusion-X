// shatter-animation.js
const shatterContainer = document.getElementById('shatter-canvas-container');
const triggerBtn = document.getElementById('trigger-shatter-btn');
const revealText = document.getElementById('fusion-reveal-text');

if (shatterContainer && typeof THREE !== 'undefined') {
    const scene = new THREE.Scene();
    
    const aspect = shatterContainer.clientWidth / shatterContainer.clientHeight;
    const camera = new THREE.PerspectiveCamera(60, aspect, 0.1, 1000);
    camera.position.set(0, 5, 20);
    
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(shatterContainer.clientWidth, shatterContainer.clientHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    shatterContainer.appendChild(renderer.domElement);

    // Lights
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.8);
    scene.add(ambientLight);
    const dirLight = new THREE.DirectionalLight(0xffffff, 0.5);
    dirLight.position.set(10, 20, 10);
    scene.add(dirLight);

    // --- Create the Platform ---
    const platformGeo = new THREE.BoxGeometry(40, 1, 10);
    const platformMat = new THREE.MeshBasicMaterial({ color: 0xeeeeee }); // Light grey platform
    const platform = new THREE.Mesh(platformGeo, platformMat);
    platform.position.y = -0.5;
    scene.add(platform);

    // --- Create Procedural Shadow Samurai (Cartoon Style) ---
    const blackMat = new THREE.MeshBasicMaterial({ color: 0x000000 }); // Pure shadow

    const samurai = new THREE.Group();
    
    // Body
    const body = new THREE.Mesh(new THREE.BoxGeometry(1.5, 2.5, 1), blackMat);
    body.position.y = 2.5;
    samurai.add(body);

    // Head (with a small samurai hat)
    const headGroup = new THREE.Group();
    const head = new THREE.Mesh(new THREE.BoxGeometry(1.2, 1.2, 1.2), blackMat);
    const hat = new THREE.Mesh(new THREE.ConeGeometry(1.2, 0.5, 4), blackMat);
    hat.position.y = 0.85;
    hat.rotation.y = Math.PI / 4; // Square hat
    headGroup.add(head);
    headGroup.add(hat);
    headGroup.position.y = 4.3;
    samurai.add(headGroup);

    // Arms
    const rightArmPivot = new THREE.Group();
    rightArmPivot.position.set(-1.0, 3.5, 0); // Shoulder joint
    const rightArm = new THREE.Mesh(new THREE.BoxGeometry(0.5, 2, 0.5), blackMat);
    rightArm.position.y = -1; // offset so it rotates from shoulder
    rightArmPivot.add(rightArm);
    
    // Sword
    const sword = new THREE.Mesh(new THREE.BoxGeometry(0.2, 3, 0.4), blackMat);
    sword.position.set(0, -1.5, 1);
    sword.rotation.x = Math.PI / 2;
    rightArmPivot.add(sword);
    samurai.add(rightArmPivot);

    const leftArmPivot = new THREE.Group();
    leftArmPivot.position.set(1.0, 3.5, 0);
    const leftArm = new THREE.Mesh(new THREE.BoxGeometry(0.5, 2, 0.5), blackMat);
    leftArm.position.y = -1;
    leftArmPivot.add(leftArm);
    samurai.add(leftArmPivot);

    // Legs
    const rightLegPivot = new THREE.Group();
    rightLegPivot.position.set(-0.5, 1.25, 0);
    const rightLeg = new THREE.Mesh(new THREE.BoxGeometry(0.6, 1.5, 0.6), blackMat);
    rightLeg.position.y = -0.75;
    rightLegPivot.add(rightLeg);
    samurai.add(rightLegPivot);

    const leftLegPivot = new THREE.Group();
    leftLegPivot.position.set(0.5, 1.25, 0);
    const leftLeg = new THREE.Mesh(new THREE.BoxGeometry(0.6, 1.5, 0.6), blackMat);
    leftLeg.position.y = -0.75;
    leftLegPivot.add(leftLeg);
    samurai.add(leftLegPivot);

    scene.add(samurai);

    // --- The "X" Target ---
    const xGroup = new THREE.Group();
    const xMat = new THREE.MeshBasicMaterial({ color: 0x000000 });
    const bar1 = new THREE.Mesh(new THREE.BoxGeometry(0.5, 5, 1), xMat);
    bar1.rotation.z = Math.PI / 4;
    const bar2 = new THREE.Mesh(new THREE.BoxGeometry(0.5, 5, 1), xMat);
    bar2.rotation.z = -Math.PI / 4;
    xGroup.add(bar1);
    xGroup.add(bar2);
    xGroup.position.set(0, 2.5, 0);
    scene.add(xGroup);

    // --- Particles ---
    const particles = [];
    const particleGroup = new THREE.Group();
    scene.add(particleGroup);
    const orangeMat = new THREE.MeshBasicMaterial({ color: 0xff5722 });

    function explodeX() {
        xGroup.visible = false;
        const partGeo = new THREE.BoxGeometry(0.4, 0.4, 0.4);
        for(let i=0; i < 150; i++) {
            const mat = Math.random() > 0.5 ? orangeMat : blackMat;
            const mesh = new THREE.Mesh(partGeo, mat);
            mesh.position.copy(xGroup.position);
            mesh.position.x += (Math.random() - 0.5) * 2;
            mesh.position.y += (Math.random() - 0.5) * 2;
            
            const velocity = new THREE.Vector3(
                (Math.random() - 0.5) * 20,
                (Math.random()) * 20, // Blast up and out
                (Math.random() - 0.5) * 20 + 5
            );
            
            particleGroup.add(mesh);
            particles.push({ mesh, velocity });
        }
    }

    // --- Animation State Machine ---
    let state = 'waiting'; // waiting, running, slashing, exploding, falling, done
    let clock = new THREE.Clock();
    let timeInState = 0;

    function resetSequence() {
        state = 'running';
        timeInState = 0;
        
        // Reset Samurai
        samurai.position.set(15, 0, 0); // Start far right
        samurai.rotation.set(0, -Math.PI / 2, 0); // Face left
        
        // Reset limbs
        rightArmPivot.rotation.x = 0;
        leftArmPivot.rotation.x = 0;
        rightLegPivot.rotation.x = 0;
        leftLegPivot.rotation.x = 0;

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

    function animate() {
        requestAnimationFrame(animate);
        const dt = clock.getDelta();
        timeInState += dt;

        if (state === 'running') {
            // Move left
            samurai.position.x -= 12 * dt;
            
            // Procedural running animation using Sine waves
            const runSpeed = 15;
            rightLegPivot.rotation.x = Math.sin(timeInState * runSpeed) * 0.8;
            leftLegPivot.rotation.x = -Math.sin(timeInState * runSpeed) * 0.8;
            rightArmPivot.rotation.x = -Math.sin(timeInState * runSpeed) * 0.8;
            leftArmPivot.rotation.x = Math.sin(timeInState * runSpeed) * 0.8;

            // Stop when he reaches the center (near the X)
            if (samurai.position.x <= 3) {
                state = 'slashing';
                timeInState = 0;
            }
        } 
        else if (state === 'slashing') {
            // Reset legs
            rightLegPivot.rotation.x = 0;
            leftLegPivot.rotation.x = 0;
            leftArmPivot.rotation.x = 0;

            // Animate sword slash
            if (timeInState < 0.2) {
                // Raise sword
                rightArmPivot.rotation.x = Math.PI; 
            } else if (timeInState < 0.3) {
                // Slash down
                rightArmPivot.rotation.x -= 20 * dt; 
            } else {
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
                p.velocity.y -= 25 * dt; // Gravity
            });

            // The word "FUSION" pushes him back
            if (timeInState > 0.5) {
                state = 'falling';
                timeInState = 0;
            }
        }
        else if (state === 'falling') {
            particles.forEach(p => {
                p.mesh.position.addScaledVector(p.velocity, dt);
                p.velocity.y -= 25 * dt; 
            });

            // Push Samurai back and knock him over
            if (samurai.position.x < 10) {
                samurai.position.x += 8 * dt; // slide right
                samurai.position.y += 4 * dt; // knock up slightly
            } else if (samurai.position.y > 0) {
                samurai.position.y -= 10 * dt; // fall down
            }

            // Rotate him flat on his back
            if (samurai.rotation.z > -Math.PI / 2) {
                samurai.rotation.z -= 5 * dt; 
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
