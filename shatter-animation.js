// shatter-animation.js
const shatterSect = document.getElementById('fusion-shatter');
const shatterContainer = document.getElementById('shatter-canvas-container');
const revealText = document.getElementById('fusion-reveal-text');
const xGlow = document.getElementById('x-glow');
const abstractSlash = document.getElementById('abstract-slash');
const ctaReveal = document.getElementById('cta-reveal-container');

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
    let isExploding = false;
    let clock = new THREE.Clock();

    triggerSequence = () => {
        if (isAnimating) return;
        isAnimating = true;
        
        // Reset DOM
        if (revealText) {
            revealText.style.opacity = '0';
            revealText.style.transform = 'scale(0.5)';
        }
        if (xGlow) xGlow.style.opacity = '0';
        if (ctaReveal) {
            ctaReveal.style.opacity = '0';
            ctaReveal.style.transform = 'translateY(20px)';
        }
        
        if (abstractSlash) {
            abstractSlash.style.transition = 'none';
            abstractSlash.style.opacity = '0';
            abstractSlash.style.transform = 'scaleX(0) rotate(-15deg)';
        }
        
        // Clear old lightning
        while(lightningGroup.children.length > 0) lightningGroup.remove(lightningGroup.children[0]);
        lightningBolts.length = 0;

        // 1. The abstract cut
        setTimeout(() => {
            if (abstractSlash) {
                abstractSlash.style.opacity = '1';
                abstractSlash.style.transition = 'transform 0.1s ease-out';
                abstractSlash.style.transform = 'scaleX(1) rotate(-15deg)';
            }
            
            // 2. The Explosion
            setTimeout(() => {
                if (abstractSlash) {
                    abstractSlash.style.transition = 'opacity 0.2s ease-out';
                    abstractSlash.style.opacity = '0';
                }
                
                isExploding = true;
                
                for(let i=0; i < 20; i++) {
                    const angle = (i / 20) * Math.PI * 2 + (Math.random() * 0.5);
                    const bolt = createLightningBolt(0, 0, angle); 
                    lightningGroup.add(bolt);
                    lightningBolts.push(bolt);
                }
                
                // Show FUSION X Text
                if (revealText) {
                    revealText.style.opacity = '1';
                    revealText.style.transform = 'scale(1)';
                }
                setTimeout(() => { if (xGlow) xGlow.style.opacity = '1'; }, 300);
                
                // Show CTA
                if (ctaReveal) {
                    ctaReveal.style.opacity = '1';
                    ctaReveal.style.transform = 'translateY(0)';
                }
                
                // Allow re-triggering later if they scroll back up
                setTimeout(() => { isAnimating = false; }, 2000);
                
            }, 100);
            
        }, 300);
    };

    function animateBg() {
        requestAnimationFrame(animateBg);
        const dt = clock.getDelta();

        if (isExploding) {
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

if (shatterSect) {
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !isAnimating) {
            // Trigger animation immediately upon scrolling into view
            triggerSequence();
        }
    }, { threshold: 0.3 }); // Trigger when 30% of the section is visible
    observer.observe(shatterSect);
}
