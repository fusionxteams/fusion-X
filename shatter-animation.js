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

    const lightningGroup = new THREE.Group();
    scene.add(lightningGroup);
    
    // Background flash
    const flashGeo = new THREE.PlaneGeometry(200, 200);
    const flashMat = new THREE.MeshBasicMaterial({ color: 0x00aaff, transparent: true, opacity: 0 });
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
        const material = new THREE.LineBasicMaterial({ color: 0x00d4ff, linewidth: 2 });
        return new THREE.Line(geometry, material);
    }

    const lightningBolts = [];
    let isExploding = false;
    let clock = new THREE.Clock();

    triggerLightning = () => {
        isExploding = true;
        flashMat.opacity = 0.8;
        
        while(lightningGroup.children.length > 0) lightningGroup.remove(lightningGroup.children[0]);
        lightningBolts.length = 0;

        for(let i=0; i < 15; i++) {
            const angle = (i / 15) * Math.PI * 2 + (Math.random() * 0.5);
            const bolt = createLightningBolt(0, 0, angle); 
            lightningGroup.add(bolt);
            lightningBolts.push(bolt);
        }
    };

    function animateBg() {
        requestAnimationFrame(animateBg);
        const dt = clock.getDelta();

        if (isExploding) {
            if (flashMat.opacity > 0) flashMat.opacity -= 2 * dt;
            
            let allDead = true;
            lightningBolts.forEach(bolt => {
                if (bolt.material.opacity > 0) {
                    allDead = false;
                    bolt.material.opacity -= 3 * dt;
                    bolt.scale.addScalar(5 * dt);
                    
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

// --- HTML/CSS ANIMATION ORCHESTRATOR ---
let isAnimating = false;

function startSequence() {
    if (isAnimating) return;
    isAnimating = true;
    
    // Reset Everything
    triggerBtn.style.opacity = '0';
    samuraiImg.style.transition = 'none';
    samuraiImg.style.transform = 'translateX(100vw)';
    dashLine.style.transition = 'none';
    dashLine.style.opacity = '0';
    revealText.style.opacity = '0';
    revealText.style.transform = 'scale(0.5)';
    subText.style.opacity = '0';
    xGlow.style.opacity = '0';
    
    // Force DOM Reflow
    void samuraiImg.offsetWidth;
    
    // 1. Dash In
    samuraiImg.style.transition = 'transform 0.6s cubic-bezier(0.1, 0.9, 0.2, 1)';
    samuraiImg.style.transform = 'translateX(-50%)'; // Move to center
    
    // Speed lines
    dashLine.style.transition = 'opacity 0.2s';
    dashLine.style.opacity = '0.3';

    // 2. The Strike
    setTimeout(() => {
        dashLine.style.opacity = '0';
        
        // Slight pop for impact
        samuraiImg.style.transition = 'transform 0.1s ease';
        samuraiImg.style.transform = 'translateX(-50%) scale(1.05)';
        
        setTimeout(() => {
            samuraiImg.style.transform = 'translateX(-50%) scale(1)';
            
            // 3. The Explosion
            triggerLightning();
            
            // FUSION X Reveal
            revealText.style.opacity = '1';
            revealText.style.transform = 'scale(1)';
            
            // Blue glow inside the X
            setTimeout(() => {
                xGlow.style.opacity = '1';
            }, 300);

            // "UNLEASHED" text
            setTimeout(() => {
                subText.style.opacity = '1';
            }, 600);
            
            // Push Samurai away
            setTimeout(() => {
                samuraiImg.style.transition = 'transform 1s ease, opacity 0.5s ease';
                samuraiImg.style.transform = 'translateX(-150vw)';
                samuraiImg.style.opacity = '0';
                
                setTimeout(() => {
                    triggerBtn.style.opacity = '1';
                    isAnimating = false;
                    // Reset opacity for next run without showing him move back
                    setTimeout(() => {
                        samuraiImg.style.transition = 'none';
                        samuraiImg.style.opacity = '1';
                    }, 500);
                }, 1000);
            }, 800);
            
        }, 100);
        
    }, 600); // Wait for dash to finish
}

if (triggerBtn) {
    triggerBtn.addEventListener('click', startSequence);
}

const shatterSect = document.getElementById('fusion-shatter');
if (shatterSect) {
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !isAnimating) {
            setTimeout(startSequence, 300);
        }
    }, { threshold: 0.5 });
    observer.observe(shatterSect);
}
