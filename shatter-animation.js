// shatter-animation.js
const shatterContainer = document.getElementById('shatter-canvas-container');
const triggerBtn = document.getElementById('trigger-shatter-btn');
const revealText = document.getElementById('fusion-reveal-text');

if (shatterContainer && typeof THREE !== 'undefined') {
    const scene = new THREE.Scene();
    
    const aspect = shatterContainer.clientWidth / shatterContainer.clientHeight;
    const camera = new THREE.PerspectiveCamera(60, aspect, 0.1, 1000);
    camera.position.z = 25;
    
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(shatterContainer.clientWidth, shatterContainer.clientHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    shatterContainer.appendChild(renderer.domElement);

    // Lights
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.6);
    scene.add(ambientLight);
    const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
    directionalLight.position.set(10, 20, 15);
    scene.add(directionalLight);

    // Material for the X and Particles
    const xMaterial = new THREE.MeshStandardMaterial({ 
        color: 0x333333,
        roughness: 0.2,
        metalness: 0.8
    });
    const orangeMaterial = new THREE.MeshStandardMaterial({
        color: 0xff5722,
        roughness: 0.1,
        metalness: 0.5,
        emissive: 0xff5722,
        emissiveIntensity: 0.5
    });

    // Create the huge "X" (Two crossed boxes)
    const xGroup = new THREE.Group();
    
    const boxGeo = new THREE.BoxGeometry(2, 20, 4);
    const bar1 = new THREE.Mesh(boxGeo, xMaterial);
    bar1.rotation.z = Math.PI / 4;
    
    const bar2 = new THREE.Mesh(boxGeo, xMaterial);
    bar2.rotation.z = -Math.PI / 4;
    
    xGroup.add(bar1);
    xGroup.add(bar2);
    scene.add(xGroup);

    // The glowing laser slash line
    const laserGeo = new THREE.PlaneGeometry(60, 0.2);
    const laserMat = new THREE.MeshBasicMaterial({ color: 0xffffff, transparent: true, opacity: 0 });
    const laser = new THREE.Mesh(laserGeo, laserMat);
    laser.rotation.z = Math.PI / 6; // Diagonal slash
    laser.position.x = -30;
    laser.position.y = -15;
    scene.add(laser);

    // Particles for explosion
    const particles = [];
    const particleGroup = new THREE.Group();
    scene.add(particleGroup);

    let animationState = 'idle'; // idle, slashing, shattering, revealed
    let clock = new THREE.Clock();
    let slashTime = 0;

    function buildParticles() {
        // Clear old particles
        while(particleGroup.children.length > 0){ 
            particleGroup.remove(particleGroup.children[0]); 
        }
        particles.length = 0;

        const partGeo = new THREE.BoxGeometry(0.8, 0.8, 0.8);
        for(let i=0; i < 300; i++) {
            // Mix of dark grey and glowing orange particles
            const mat = Math.random() > 0.8 ? orangeMaterial : xMaterial;
            const mesh = new THREE.Mesh(partGeo, mat);
            
            // Randomly position them inside the bounds of the X
            mesh.position.x = (Math.random() - 0.5) * 15;
            mesh.position.y = (Math.random() - 0.5) * 15;
            mesh.position.z = (Math.random() - 0.5) * 4;
            
            // Velocity exploding outward from center
            const velocity = new THREE.Vector3(
                mesh.position.x * (Math.random() * 2 + 1),
                mesh.position.y * (Math.random() * 2 + 1),
                (Math.random() - 0.5) * 20 + 10 // blast towards camera
            );
            
            // Rotation speed
            const rotSpeed = new THREE.Vector3(
                Math.random() * 0.2,
                Math.random() * 0.2,
                Math.random() * 0.2
            );

            particleGroup.add(mesh);
            particles.push({ mesh, velocity, rotSpeed });
        }
    }

    function triggerSequence() {
        if (animationState !== 'idle' && animationState !== 'revealed') return;
        
        // Reset
        animationState = 'slashing';
        slashTime = 0;
        xGroup.visible = true;
        laser.position.x = -30;
        laser.position.y = -15;
        laserMat.opacity = 1;
        revealText.style.opacity = '0';
        revealText.style.transform = 'scale(0.1)';
        
        // Hide particles
        while(particleGroup.children.length > 0){ 
            particleGroup.remove(particleGroup.children[0]); 
        }
        
        triggerBtn.style.opacity = '0';
    }

    triggerBtn.addEventListener('click', triggerSequence);

    // Render Loop
    function animate() {
        requestAnimationFrame(animate);
        const dt = clock.getDelta();

        if (animationState === 'idle') {
            // Slow idle spin of the X
            xGroup.rotation.y = Math.sin(Date.now() * 0.001) * 0.2;
            xGroup.rotation.x = Math.cos(Date.now() * 0.001) * 0.1;
        } 
        else if (animationState === 'slashing') {
            slashTime += dt;
            
            // Move laser fast diagonally across the screen
            laser.position.x += 80 * dt;
            laser.position.y += 40 * dt;

            // Flash effect
            if (slashTime > 0.4) {
                animationState = 'shattering';
                xGroup.visible = false;
                laserMat.opacity = 0;
                
                // Spawn particles
                buildParticles();
                
                // Trigger HTML Reveal
                setTimeout(() => {
                    revealText.style.opacity = '1';
                    revealText.style.transform = 'scale(1)';
                }, 200);

                setTimeout(() => {
                    triggerBtn.style.opacity = '1';
                    triggerBtn.innerText = "Replay Animation";
                }, 2500);
            }
        }
        else if (animationState === 'shattering') {
            // Explode particles
            particles.forEach(p => {
                p.mesh.position.addScaledVector(p.velocity, dt);
                p.mesh.rotation.x += p.rotSpeed.x;
                p.mesh.rotation.y += p.rotSpeed.y;
                p.mesh.rotation.z += p.rotSpeed.z;
                
                // Gravity / slow down
                p.velocity.y -= 15 * dt; // gravity pulling down
                p.velocity.multiplyScalar(0.95); // air resistance
            });

            // Fade out particles over time
            if (slashTime > 3.0) {
                animationState = 'revealed';
            }
        }

        renderer.render(scene, camera);
    }
    
    clock.start();
    animate();

    // Trigger on scroll via Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && animationState === 'idle') {
            setTimeout(() => {
                triggerSequence();
            }, 500); // slight delay after scroll
        }
    }, { threshold: 0.6 });
    
    observer.observe(document.getElementById('fusion-shatter'));

    window.addEventListener('resize', () => {
        if (!shatterContainer) return;
        camera.aspect = shatterContainer.clientWidth / shatterContainer.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(shatterContainer.clientWidth, shatterContainer.clientHeight);
    });
}
