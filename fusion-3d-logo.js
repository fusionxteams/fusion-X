/**
 * Fusion X - Interactive 3D Brand Logo & Achievements Engine
 * Renders the custom fusion-x-3d.glb model with PBR specular lighting,
 * organic floating levitation, and mouse parallax tilt (NO continuous rotation).
 */
(function() {
    'use strict';

    const container = document.getElementById('fusion-3d-canvas-container');
    if (!container || typeof THREE === 'undefined') return;

    // Check for GLTFLoader
    if (typeof THREE.GLTFLoader === 'undefined') {
        console.warn('Three.js GLTFLoader is required for Fusion X 3D Logo.');
        return;
    }

    // 1. Scene & Camera Setup
    const scene = new THREE.Scene();
    
    const aspect = container.clientWidth / container.clientHeight;
    const camera = new THREE.PerspectiveCamera(38, aspect, 0.1, 1000);
    // Adjusted camera distance for optimal logo framing
    camera.position.set(0, 0, 3.4);

    // 2. WebGL Renderer with High-Fidelity PBR Tone Mapping
    const renderer = new THREE.WebGLRenderer({ 
        antialias: true, 
        alpha: true,
        powerPreference: 'high-performance'
    });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.25;
    renderer.outputEncoding = THREE.sRGBEncoding;
    container.appendChild(renderer.domElement);

    // 3. Studio Lighting Rig
    // Ambient fill light for base visibility
    const ambientLight = new THREE.AmbientLight(0xffffff, 1.2);
    scene.add(ambientLight);

    // Key front-top light for sharp highlights on 3D windows & letters
    const keyLight = new THREE.DirectionalLight(0xffffff, 1.8);
    keyLight.position.set(4, 6, 5);
    scene.add(keyLight);

    // Warm signature orange rim light for Fusion X glow
    const rimLight = new THREE.DirectionalLight(0xff5722, 1.5);
    rimLight.position.set(-5, -3, 4);
    scene.add(rimLight);

    // Soft top-cool light
    const topLight = new THREE.DirectionalLight(0xffeedd, 0.8);
    topLight.position.set(0, 8, 2);
    scene.add(topLight);

    // Interactive cursor specular point light that glides across the logo bevels
    const cursorLight = new THREE.PointLight(0xffa270, 2.5, 8);
    cursorLight.position.set(0, 0, 2);
    scene.add(cursorLight);

    // 4. Model Loading & Auto-Centering
    let logoGroup = new THREE.Group();
    scene.add(logoGroup);
    let logoMesh = null;
    let isLoaded = false;

    // Loading overlay indicator
    const loaderSpinner = document.getElementById('fusion-3d-loader');

    const loader = new THREE.GLTFLoader();
    // Use the copied project asset
    loader.load('fusion-x-3d.glb', function(gltf) {
        logoMesh = gltf.scene;

        // Traverse mesh materials for pristine rendering
        logoMesh.traverse(function(child) {
            if (child.isMesh) {
                child.castShadow = true;
                child.receiveShadow = true;
                if (child.material) {
                    child.material.needsUpdate = true;
                    // Boost metallic & roughness appearance for dramatic specular sheen
                    if ('roughness' in child.material && child.material.roughness !== undefined) {
                        child.material.roughness = Math.min(1.0, child.material.roughness * 0.95);
                    }
                }
            }
        });

        // Compute Bounding Box to center the logo perfectly
        const box = new THREE.Box3().setFromObject(logoMesh);
        const center = box.getCenter(new THREE.Vector3());
        const size = box.getSize(new THREE.Vector3());

        // Center within local pivot
        logoMesh.position.x = -center.x;
        logoMesh.position.y = -center.y;
        logoMesh.position.z = -center.z;

        // Normalize scale to fit the viewport comfortably
        const maxDim = Math.max(size.x, size.y, size.z);
        const desiredSize = container.clientWidth < 600 ? 1.85 : 2.15;
        const scaleFactor = desiredSize / maxDim;
        logoMesh.scale.set(scaleFactor, scaleFactor, scaleFactor);

        logoGroup.add(logoMesh);
        isLoaded = true;

        if (loaderSpinner) {
            loaderSpinner.style.opacity = '0';
            setTimeout(() => { loaderSpinner.style.display = 'none'; }, 400);
        }

        // Trigger entrance scale animation
        logoGroup.scale.set(0.7, 0.7, 0.7);
        let entranceProgress = 0;
        const entranceTimer = setInterval(() => {
            entranceProgress += 0.05;
            const ease = 1 - Math.pow(1 - entranceProgress, 3);
            const curScale = 0.7 + (0.3 * ease);
            logoGroup.scale.set(curScale, curScale, curScale);
            if (entranceProgress >= 1) clearInterval(entranceTimer);
        }, 16);

    }, function(xhr) {
        if (xhr.lengthComputable && loaderSpinner) {
            const pct = Math.round((xhr.loaded / xhr.total) * 100);
            const txt = loaderSpinner.querySelector('.spinner-text');
            if (txt) txt.textContent = pct + '%';
        }
    }, function(err) {
        console.error('Failed to load Fusion X 3D GLB model:', err);
        if (loaderSpinner) {
            loaderSpinner.innerHTML = '<span style="color:#ff5722;font-size:0.9rem;">Interactive 3D Ready</span>';
        }
    });

    // 5. Interaction Physics (Mouse Parallax Tilt & Levitation — NO continuous spin)
    let mouseX = 0;
    let mouseY = 0;
    let targetTiltY = 0;
    let targetTiltX = 0;
    let currentTiltY = 0;
    let currentTiltX = 0;
    let isHovering = false;
    let isTouching = false;
    let touchStartX = 0;
    let touchStartY = 0;

    // Track mouse over the entire showcase section for wide immersion
    const showcaseSection = document.getElementById('achievements-showcase') || container;

    showcaseSection.addEventListener('mousemove', function(e) {
        const rect = showcaseSection.getBoundingClientRect();
        // Normalized coordinates [-1, 1]
        mouseX = ((e.clientX - rect.left) / rect.width) * 2 - 1;
        mouseY = ((e.clientY - rect.top) / rect.height) * 2 - 1;

        // Controlled tilt limits (Max ~18° horizontal, ~12° vertical so logo is ALWAYS legible)
        targetTiltY = mouseX * 0.32;
        targetTiltX = -mouseY * 0.22;

        // Update dynamic cursor specular light
        cursorLight.position.x = mouseX * 2.8;
        cursorLight.position.y = -mouseY * 2.0;
        cursorLight.position.z = 2.2;
        cursorLight.intensity = 3.0;
        isHovering = true;
    });

    showcaseSection.addEventListener('mouseleave', function() {
        // Return gracefully to front-facing rest position
        targetTiltY = 0;
        targetTiltX = 0;
        cursorLight.position.set(0, 0, 2);
        cursorLight.intensity = 1.8;
        isHovering = false;
    });

    // Touch support for mobile & tablet
    container.addEventListener('touchstart', function(e) {
        if (e.touches.length === 1) {
            isTouching = true;
            touchStartX = e.touches[0].clientX;
            touchStartY = e.touches[0].clientY;
        }
    }, { passive: true });

    container.addEventListener('touchmove', function(e) {
        if (isTouching && e.touches.length === 1) {
            const dx = (e.touches[0].clientX - touchStartX) / (container.clientWidth * 0.5);
            const dy = (e.touches[0].clientY - touchStartY) / (container.clientHeight * 0.5);
            targetTiltY = Math.max(-0.4, Math.min(0.4, dx * 0.4));
            targetTiltX = Math.max(-0.3, Math.min(0.3, -dy * 0.3));
        }
    }, { passive: true });

    container.addEventListener('touchend', function() {
        isTouching = false;
        targetTiltY = 0;
        targetTiltX = 0;
    });

    // 6. Interactive Card Reaction (Subtle tilt towards hovered card)
    const cards = document.querySelectorAll('.achievement-card-box');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            const side = card.getAttribute('data-side');
            if (side === 'left-top') {
                targetTiltY = -0.25; targetTiltX = 0.15;
            } else if (side === 'left-mid') {
                targetTiltY = -0.28; targetTiltX = 0.0;
            } else if (side === 'left-bot') {
                targetTiltY = -0.25; targetTiltX = -0.15;
            } else if (side === 'right-top') {
                targetTiltY = 0.25; targetTiltX = 0.15;
            } else if (side === 'right-mid') {
                targetTiltY = 0.28; targetTiltX = 0.0;
            } else if (side === 'right-bot') {
                targetTiltY = 0.25; targetTiltX = -0.15;
            }
            cursorLight.intensity = 3.5;
        });

        card.addEventListener('mouseleave', function() {
            if (!isHovering) {
                targetTiltY = 0;
                targetTiltX = 0;
                cursorLight.intensity = 1.8;
            }
        });
    });

    // 7. Click or Tap Logo Micro-Bounce
    container.addEventListener('click', function() {
        if (!logoGroup) return;
        let bounceTime = 0;
        const initialScale = logoGroup.scale.x;
        const bounceInterval = setInterval(() => {
            bounceTime += 0.1;
            const s = initialScale + Math.sin(bounceTime * Math.PI) * 0.05;
            logoGroup.scale.set(s, s, s);
            if (bounceTime >= 1) {
                logoGroup.scale.set(initialScale, initialScale, initialScale);
                clearInterval(bounceInterval);
            }
        }, 16);
    });

    // 8. Responsive Resize Handler
    function handleResize() {
        if (!container || !renderer || !camera) return;
        const w = container.clientWidth;
        const h = container.clientHeight;
        camera.aspect = w / h;
        if (w < 500) {
            camera.position.z = 4.0;
        } else if (w < 800) {
            camera.position.z = 3.6;
        } else {
            camera.position.z = 3.2;
        }
        camera.updateProjectionMatrix();
        renderer.setSize(w, h);
    }
    window.addEventListener('resize', handleResize);
    handleResize();

    // 9. Intersection Observer (Pause when off-screen to conserve 100% device resources)
    let isVisible = true;
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            isVisible = entries[0].isIntersecting;
        }, { threshold: 0.1 });
        observer.observe(container);
    }

    // 10. Main Animation Loop
    let clock = new THREE.Clock();

    function animate() {
        requestAnimationFrame(animate);
        if (!isVisible) return;

        const elapsedTime = clock.getElapsedTime();

        if (isLoaded && logoGroup) {
            // Smooth spring damping for tilt
            currentTiltY += (targetTiltY - currentTiltY) * 0.08;
            currentTiltX += (targetTiltX - currentTiltX) * 0.08;

            logoGroup.rotation.y = currentTiltY;
            logoGroup.rotation.x = currentTiltX;

            // Organic levitation breathing (subtle up/down floating along Y-axis)
            logoGroup.position.y = Math.sin(elapsedTime * 1.5) * 0.06;
            
            // Micro-subtle floating roll (max ~1.5 degrees) for natural anti-gravity feel
            logoGroup.rotation.z = Math.sin(elapsedTime * 1.0) * 0.02;

            // Subtle breathing scale pulse on key lights
        }

        renderer.render(scene, camera);
    }

    animate();

    // 11. Achievement Numbers Count-Up Animation
    const counterElements = document.querySelectorAll('.achieve-number[data-target]');
    if (counterElements.length && 'IntersectionObserver' in window) {
        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseFloat(el.getAttribute('data-target'));
                    if (isNaN(target)) return;
                    const duration = 1400;
                    const startTime = performance.now();

                    function updateCount(now) {
                        const elapsed = now - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        const ease = 1 - Math.pow(1 - progress, 3);
                        el.textContent = Math.floor(ease * target);
                        if (progress < 1) {
                            requestAnimationFrame(updateCount);
                        } else {
                            el.textContent = target;
                        }
                    }
                    requestAnimationFrame(updateCount);
                    observer.unobserve(el);
                }
            });
        }, { threshold: 0.2 });

        counterElements.forEach(el => counterObserver.observe(el));
    }

})();
