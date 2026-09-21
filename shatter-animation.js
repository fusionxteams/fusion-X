// shatter-animation.js
const shatterSect = document.getElementById('fusion-shatter');
const shatterContainer = document.getElementById('shatter-canvas-container');
const triggerBtn = document.getElementById('trigger-shatter-btn');
const revealText = document.getElementById('fusion-reveal-text');
const xGlow = document.getElementById('x-glow');

let triggerSequence = () => {};
let isAnimating = false;

if (shatterContainer && typeof THREE !== 'undefined') {
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(50, shatterContainer.clientWidth / shatterContainer.clientHeight, 0.1, 1000);
    camera.position.z = 15;
    
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(shatterContainer.clientWidth, shatterContainer.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    shatterContainer.appendChild(renderer.domElement);

    // Lights for the metal Shuriken
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
    scene.add(ambientLight);
    const dirLight = new THREE.DirectionalLight(0xffffff, 1.5);
    dirLight.position.set(5, 5, 10);
    scene.add(dirLight);

    // Shuriken Geometry (Ninja Star)
    const starShape = new THREE.Shape();
    starShape.moveTo(0, 2);
    starShape.lineTo(0.3, 0.3);
    starShape.lineTo(2, 0);
    starShape.lineTo(0.3, -0.3);
    starShape.lineTo(0, -2);
    starShape.lineTo(-0.3, -0.3);
    starShape.lineTo(-2, 0);
    starShape.lineTo(-0.3, 0.3);
    starShape.lineTo(0, 2);

    const extrudeSettings = { depth: 0.2, bevelEnabled: true, bevelThickness: 0.05, bevelSize: 0.1, bevelSegments: 2 };
    const shurikenGeo = new THREE.ExtrudeGeometry(starShape, extrudeSettings);
    // Center geometry
    shurikenGeo.computeBoundingBox();
    const centerOffset = -0.5 * (shurikenGeo.boundingBox.max.z - shurikenGeo.boundingBox.min.z);
    shurikenGeo.translate(0, 0, centerOffset);

    const shurikenMat = new THREE.MeshStandardMaterial({ 
        color: 0x333333, 
        metalness: 0.9, 
        roughness: 0.1 
    });
    
    const shuriken = new THREE.Mesh(shurikenGeo, shurikenMat);
    shuriken.position.set(-25, 0, 0); // Start far left
    shuriken.scale.set(0.1, 0.1, 0.1); // Hide initially
    scene.add(shuriken);

    // Lightning Group
    const lightningGroup = new THREE.Group();
    scene.add(lightningGroup);
    
    function createLightningBolt(startX, startY, angle) {
        const points = [];
        let cx = startX, cy = startY;
        points.push(new THREE.Vector3(cx, cy, 0));
        
        for (let i = 0; i < 6; i++) {
            cx += Math.cos(angle) * (Math.random() * 3 + 1.5);
            cy += Math.sin(angle) * (Math.random() * 3 + 1.5);
            const jitter = (Math.random() - 0.5) * 4;
            const px = cx + Math.cos(angle + Math.PI/2) * jitter;
            const py = cy + Math.sin(angle + Math.PI/2) * jitter;
            points.push(new THREE.Vector3(px, py, 0));
        }
        
        const geometry = new THREE.BufferGeometry().setFromPoints(points);
        const material = new THREE.LineBasicMaterial({ color: 0x00d4ff, linewidth: 2, transparent: true });
        return new THREE.Line(geometry, material);
    }

    const lightningBolts = [];
    
    let state = 'IDLE'; // IDLE, FLYING, EXPLODING
    let clock = new THREE.Clock();

    triggerSequence = () => {
        if (isAnimating) return;
        isAnimating = true;
        
        // Reset DOM
        triggerBtn.style.opacity = '0';
        revealText.style.opacity = '0';
        revealText.style.transform = 'scale(0.5)';
        xGlow.style.opacity = '0';
        
        // Reset Shuriken
        shuriken.position.set(-20, -5, 0); 
        shuriken.scale.set(1.5, 1.5, 1.5);
        shuriken.rotation.set(0, 0, 0);
        
        // Clear old lightning
        while(lightningGroup.children.length > 0) lightningGroup.remove(lightningGroup.children[0]);
        lightningBolts.length = 0;

        state = 'FLYING';
    };

    function animateBg() {
        requestAnimationFrame(animateBg);
        const dt = clock.getDelta();

        if (state === 'FLYING') {
            // Spin incredibly fast
            shuriken.rotation.z -= 25 * dt;
            // Arc towards center
            shuriken.position.x += 18 * dt;
            shuriken.position.y += (0 - shuriken.position.y) * 2 * dt; // Ease to center Y
            
            // If it hits the center (X > 0)
            if (shuriken.position.x >= 0) {
                state = 'EXPLODING';
                
                // Explode Lightning
                for(let i=0; i < 20; i++) {
                    const angle = (i / 20) * Math.PI * 2 + (Math.random() * 0.5);
                    const bolt = createLightningBolt(0, 0, angle); 
                    lightningGroup.add(bolt);
                    lightningBolts.push(bolt);
                }
                
                // Show FUSION X Text!
                revealText.style.opacity = '1';
                revealText.style.transform = 'scale(1)';
                setTimeout(() => { xGlow.style.opacity = '1'; }, 300);
            }
        } 
        else if (state === 'EXPLODING') {
            // Keep shuriken spinning but fly off to the right
            shuriken.rotation.z -= 25 * dt;
            shuriken.position.x += 15 * dt;
            shuriken.position.y += 10 * dt; // Arc upwards
            
            // Fade lightning
            let allDead = true;
            lightningBolts.forEach(bolt => {
                if (bolt.material.opacity > 0) {
                    allDead = false;
                    bolt.material.opacity -= 2.5 * dt;
                    bolt.scale.addScalar(10 * dt);
                    
                    const positions = bolt.geometry.attributes.position.array;
                    for(let i = 3; i < positions.length; i += 3) {
                        positions[i] += (Math.random() - 0.5) * 0.5;
                        positions[i+1] += (Math.random() - 0.5) * 0.5;
                    }
                    bolt.geometry.attributes.position.needsUpdate = true;
                }
            });
            
            if (shuriken.position.x > 25) {
                state = 'IDLE';
                shuriken.scale.set(0,0,0);
                setTimeout(() => {
                    triggerBtn.style.opacity = '1';
                    isAnimating = false;
                }, 1000);
            }
        }

        renderer.render(scene, camera);
    }
    clock.start();
    animateBg();

    window.addEventListener('resize', () => {
        if (!shatterContainer) return;
        camera.aspect = shatterContainer.clientWidth / shatterContainer.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(shatterContainer.clientWidth, shatterContainer.clientHeight);
    });
}

if (triggerBtn) {
    triggerBtn.addEventListener('click', triggerSequence);
}

if (shatterSect) {
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !isAnimating) {
            setTimeout(triggerSequence, 500);
        }
    }, { threshold: 0.5 });
    observer.observe(shatterSect);
}
