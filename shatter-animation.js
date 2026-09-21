// shatter-animation.js
const shatterSect = document.getElementById('fusion-shatter');
const shatterContainer = document.getElementById('shatter-canvas-container');
const triggerBtn = document.getElementById('trigger-shatter-btn');
const revealText = document.getElementById('fusion-reveal-text');
const samuraiImg = document.getElementById('html-samurai');
const slashLine = document.getElementById('slash-line');
const textFusion = document.getElementById('html-fusion');
const textX = document.getElementById('html-x');
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

    const lightningGroup = new THREE.Group();
    scene.add(lightningGroup);
    
    // Background flash
    const flashGeo = new THREE.PlaneGeometry(200, 200);
    const flashMat = new THREE.MeshBasicMaterial({ color: 0xffffff, transparent: true, opacity: 0 }); // White flash
    const flash = new THREE.Mesh(flashGeo, flashMat);
    flash.position.z = -10;
    scene.add(flash);

    function createLightningBolt(startX, startY, angle) {
        const points = [];
        let cx = startX, cy = startY;
        points.push(new THREE.Vector3(cx, cy, 0));
        
        for (let i = 0; i < 8; i++) {
            cx += Math.cos(angle) * (Math.random() * 4 + 2);
            cy += Math.sin(angle) * (Math.random() * 4 + 2);
            const jitter = (Math.random() - 0.5) * 6;
            const px = cx + Math.cos(angle + Math.PI/2) * jitter;
            const py = cy + Math.sin(angle + Math.PI/2) * jitter;
            points.push(new THREE.Vector3(px, py, 0));
        }
        
        const geometry = new THREE.BufferGeometry().setFromPoints(points);
        const material = new THREE.LineBasicMaterial({ color: 0x00d4ff, linewidth: 3, transparent: true });
        return new THREE.Line(geometry, material);
    }

    const lightningBolts = [];
    let isExploding = false;
    let clock = new THREE.Clock();

    triggerLightning = () => {
        isExploding = true;
        flashMat.opacity = 1.0;
        
        while(lightningGroup.children.length > 0) lightningGroup.remove(lightningGroup.children[0]);
        lightningBolts.length = 0;

        for(let i=0; i < 20; i++) {
            const angle = (i / 20) * Math.PI * 2 + (Math.random() * 0.5);
            const bolt = createLightningBolt(0, 0, angle); 
            lightningGroup.add(bolt);
            lightningBolts.push(bolt);
        }
    };

    function animateBg() {
        requestAnimationFrame(animateBg);
        const dt = clock.getDelta();

        if (isExploding) {
            if (flashMat.opacity > 0) flashMat.opacity -= 3 * dt;
            
            let allDead = true;
            lightningBolts.forEach(bolt => {
                if (bolt.material.opacity > 0) {
                    allDead = false;
                    bolt.material.opacity -= 2 * dt;
                    bolt.scale.addScalar(8 * dt);
                    
                    const positions = bolt.geometry.attributes.position.array;
                    for(let i = 3; i < positions.length; i += 3) {
                        positions[i] += (Math.random() - 0.5) * 0.8;
                        positions[i+1] += (Math.random() - 0.5) * 0.8;
                    }
                    bolt.geometry.attributes.position.needsUpdate = true;
                }
            });
            if (allDead) isExploding = false;
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

// --- CINEMATIC ANIMATION ORCHESTRATOR ---
let isAnimating = false;

function startCinematicSequence() {
    if (isAnimating) return;
    isAnimating = true;
    
    // 0. Reset State (Samurai on Left, Text Normal)
    triggerBtn.style.opacity = '0';
    shatterSect.style.background = '#ffffff';
    samuraiImg.style.transition = 'none';
    samuraiImg.style.opacity = '1';
    samuraiImg.style.left = '5%';
    samuraiImg.style.right = 'auto';
    samuraiImg.style.transform = 'scaleX(1)'; // Facing right
    samuraiImg.style.mixBlendMode = 'multiply';
    
    slashLine.style.transition = 'none';
    slashLine.style.transform = 'scaleX(0)';
    slashLine.style.opacity = '0';
    
    textFusion.classList.remove('text-dim');
    textX.classList.remove('text-dim');
    xGlow.style.opacity = '1';
    
    // 1. The Tension (Lights out)
    setTimeout(() => {
        shatterSect.style.background = '#111111';
        textFusion.classList.add('text-dim');
        textX.classList.add('text-dim');
        xGlow.style.opacity = '0.2';
        // Make image normal blend so the white background is visible in the dark (simulating an aura) or keep multiply.
        samuraiImg.style.mixBlendMode = 'normal'; 
        
        // 2. The Flash Step Teleport
        setTimeout(() => {
            // Disappear
            samuraiImg.style.opacity = '0';
            
            // Slash effect across screen
            slashLine.style.opacity = '1';
            slashLine.style.transition = 'transform 0.1s ease-out';
            slashLine.style.transform = 'scaleX(1)';
            
            // Reappear on Right, flipped
            setTimeout(() => {
                samuraiImg.style.left = 'auto';
                samuraiImg.style.right = '5%';
                samuraiImg.style.transform = 'scaleX(-1)'; // Facing left (away)
                samuraiImg.style.opacity = '1';
                
                // 3. The Dramatic Pause
                setTimeout(() => {
                    slashLine.style.transition = 'opacity 0.2s';
                    slashLine.style.opacity = '0';
                    
                    // 4. The Sheath & Explosion
                    // Lights come back on instantly
                    shatterSect.style.background = '#ffffff';
                    textFusion.classList.remove('text-dim');
                    textX.classList.remove('text-dim');
                    xGlow.style.opacity = '1';
                    samuraiImg.style.mixBlendMode = 'multiply'; // Remove aura
                    
                    // Trigger the 3D Lightning
                    triggerLightning();
                    
                    setTimeout(() => {
                        triggerBtn.style.opacity = '1';
                        triggerBtn.innerText = 'Replay Scene';
                        isAnimating = false;
                    }, 1000);
                    
                }, 1000); // Wait for the dramatically sheathed sword
                
            }, 100); // Duration of the slash
            
        }, 1500); // 1.5s tension pause
        
    }, 100); 
}

if (triggerBtn) {
    triggerBtn.addEventListener('click', startCinematicSequence);
}

if (shatterSect) {
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !isAnimating) {
            setTimeout(startCinematicSequence, 500);
        }
    }, { threshold: 0.5 });
    observer.observe(shatterSect);
}
