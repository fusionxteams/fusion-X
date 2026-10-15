/**
 * Fusion X - Interactive 3D Brand Logo & Achievements Engine
 * Renders the custom fusion-x-3d.glb model with PBR specular lighting,
 * organic floating levitation, and mouse parallax tilt (NO continuous rotation).
 * Features instantaneous procedural 3D fallback so spinner never hangs.
 */
(function() {
    'use strict';

    const container = document.getElementById('fusion-3d-canvas-container');
    if (!container || typeof THREE === 'undefined') return;

    const loaderSpinner = document.getElementById('fusion-3d-loader');

    // 1. Scene & Camera Setup
    const scene = new THREE.Scene();
    
    const aspect = container.clientWidth / container.clientHeight;
    const camera = new THREE.PerspectiveCamera(38, aspect, 0.1, 1000);
    camera.position.set(0, 0, 2.75);

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
    if (renderer.domElement) {
        renderer.domElement.style.width = '100%';
        renderer.domElement.style.maxWidth = '100%';
        renderer.domElement.style.height = '100%';
    }

    // 3. Studio Lighting Rig
    const ambientLight = new THREE.AmbientLight(0xffffff, 1.2);
    scene.add(ambientLight);

    const keyLight = new THREE.DirectionalLight(0xffffff, 1.8);
    keyLight.position.set(4, 6, 5);
    scene.add(keyLight);

    const rimLight = new THREE.DirectionalLight(0xff5722, 1.5);
    rimLight.position.set(-5, -3, 4);
    scene.add(rimLight);

    const topLight = new THREE.DirectionalLight(0xffeedd, 0.8);
    topLight.position.set(0, 8, 2);
    scene.add(topLight);

    const cursorLight = new THREE.PointLight(0xffa270, 2.5, 8);
    cursorLight.position.set(0, 0, 2);
    scene.add(cursorLight);

    // 4. Model Loading & Immediate Procedural 3D Fallback
    const logoGroup = new THREE.Group();
    scene.add(logoGroup);
    let logoMesh = null;
    let isLoaded = false;

    // Instant Procedural 3D Emblem (Ensures 3D renders immediately, no waiting)
    const procEmblem = new THREE.Group();
    const matGunmetal = new THREE.MeshStandardMaterial({ 
        color: 0x18181c, 
        roughness: 0.25, 
        metalness: 0.85 
    });
    const matNeonOrange = new THREE.MeshStandardMaterial({ 
        color: 0xff5722, 
        roughness: 0.18, 
        metalness: 0.35,
        emissive: 0xff3d00,
        emissiveIntensity: 0.2
    });

    // Outer faceted diamond ring
    const ringGeo = new THREE.TorusGeometry(0.72, 0.08, 16, 6);
    const ringMesh = new THREE.Mesh(ringGeo, matNeonOrange);
    procEmblem.add(ringMesh);

    // Inner geometric core octahedron
    const coreGeo = new THREE.OctahedronGeometry(0.48, 1);
    const coreMesh = new THREE.Mesh(coreGeo, matGunmetal);
    procEmblem.add(coreMesh);

    // Central crossbars forming stylized 'X'
    const barGeo1 = new THREE.BoxGeometry(0.9, 0.12, 0.1);
    const bar1 = new THREE.Mesh(barGeo1, matNeonOrange);
    bar1.rotation.z = Math.PI / 4;
    procEmblem.add(bar1);

    const barGeo2 = new THREE.BoxGeometry(0.9, 0.12, 0.1);
    const bar2 = new THREE.Mesh(barGeo2, matNeonOrange);
    bar2.rotation.z = -Math.PI / 4;
    procEmblem.add(bar2);

    logoGroup.add(procEmblem);

    // Hide loader immediately once procedural 3D is live
    if (loaderSpinner) {
        setTimeout(() => {
            loaderSpinner.style.opacity = '0';
            setTimeout(() => { loaderSpinner.style.display = 'none'; }, 300);
        }, 200);
    }

    // Attempt to load full GLB model asynchronously in background
    if (typeof THREE.GLTFLoader !== 'undefined') {
        const themeUri = (window.fusionXData && window.fusionXData.themeUri) 
            ? (window.fusionXData.themeUri.replace(/\/$/, '') + '/') 
            : (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI.replace(/\/$/, '') + '/' : '');
        const modelUrl = themeUri + 'fusion-x-3d.glb';

        const loader = new THREE.GLTFLoader();
        loader.load(modelUrl, function(gltf) {
            logoMesh = gltf.scene;

            logoMesh.traverse(function(child) {
                if (child.isMesh) {
                    child.castShadow = true;
                    child.receiveShadow = true;
                    if (child.material) {
                        child.material.needsUpdate = true;
                        if ('roughness' in child.material && child.material.roughness !== undefined) {
                            child.material.roughness = Math.min(1.0, child.material.roughness * 0.95);
                        }
                    }
                }
            });

            const box = new THREE.Box3().setFromObject(logoMesh);
            const center = box.getCenter(new THREE.Vector3());
            const size = box.getSize(new THREE.Vector3());

            logoMesh.position.x = -center.x;
            logoMesh.position.y = -center.y;
            logoMesh.position.z = -center.z;

            const maxDim = Math.max(size.x, size.y, size.z);
            const desiredSize = container.clientWidth < 600 ? 1.95 : 2.35;
            const scaleFactor = desiredSize / maxDim;
            logoMesh.scale.set(scaleFactor, scaleFactor, scaleFactor);

            // Smoothly remove procedural emblem and replace with GLB
            logoGroup.remove(procEmblem);
            logoGroup.add(logoMesh);
            isLoaded = true;

        }, function(xhr) {
            // Progress callback (silent)
        }, function(err) {
            console.log('Using procedural 3D Fusion X emblem (GLB deferred):', err);
        });
    }

    // 5. Interaction Physics (Mouse Parallax Tilt & Levitation - NO continuous spin)
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

    const showcaseSection = document.getElementById('achievements-showcase') || container;

    window.addEventListener('mousemove', function(e) {
        const rect = container.getBoundingClientRect();
        const isInViewport = (rect.top < window.innerHeight && rect.bottom > 0);
        if (!isInViewport) return;

        const normX = (e.clientX / window.innerWidth) * 2 - 1;
        const normY = -(e.clientY / window.innerHeight) * 2 + 1;

        cursorLight.position.x = normX * 3.5;
        cursorLight.position.y = normY * 2.5;

        const maxTiltY = 0.52;
        const maxTiltX = 0.38;

        targetTiltY = normX * maxTiltY;
        targetTiltX = -normY * maxTiltX;
    }, { passive: true });

    container.addEventListener('touchstart', function(e) {
        if (e.touches.length > 0) {
            isTouching = true;
            touchStartX = e.touches[0].clientX;
            touchStartY = e.touches[0].clientY;
        }
    }, { passive: true });

    window.addEventListener('touchmove', function(e) {
        if (!isTouching || e.touches.length === 0) return;
        const deltaX = (e.touches[0].clientX - touchStartX) / (window.innerWidth * 0.5);
        const deltaY = (e.touches[0].clientY - touchStartY) / (window.innerHeight * 0.5);

        targetTiltY = Math.max(-0.6, Math.min(0.6, deltaX * 0.6));
        targetTiltX = Math.max(-0.45, Math.min(0.45, -deltaY * 0.45));
    }, { passive: true });

    window.addEventListener('touchend', function() {
        isTouching = false;
        targetTiltX = 0;
        targetTiltY = 0;
    }, { passive: true });

    // 6. Animation Loop: Organic Levitation Floating
    let clock = new THREE.Clock();

    function animate() {
        requestAnimationFrame(animate);

        const elapsedTime = clock.getElapsedTime();

        currentTiltX += (targetTiltX - currentTiltX) * 0.08;
        currentTiltY += (targetTiltY - currentTiltY) * 0.08;

        logoGroup.rotation.x = currentTiltX;
        logoGroup.rotation.y = currentTiltY;

        const levitationY = Math.sin(elapsedTime * 1.6) * 0.055;
        const levitationTiltZ = Math.cos(elapsedTime * 1.2) * 0.022;

        logoGroup.position.y = levitationY;
        logoGroup.rotation.z = levitationTiltZ;

        // If procedural emblem is active, slowly rotate its outer ring for extra flair
        if (procEmblem && !isLoaded) {
            ringMesh.rotation.z = elapsedTime * 0.4;
            coreMesh.rotation.y = elapsedTime * 0.3;
        }

        renderer.render(scene, camera);
    }
    animate();

    // 7. Responsive Viewport Handler
    function onWindowResize() {
        if (!container) return;
        const width = container.clientWidth;
        const height = container.clientHeight;
        if (width === 0 || height === 0) return;

        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        renderer.setSize(width, height);
    }
    window.addEventListener('resize', onWindowResize);
    setTimeout(onWindowResize, 500);

    // 8. Interactive Card Reaction (Subtle tilt towards hovered card)
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
            if (cursorLight) cursorLight.intensity = 3.5;
        });

        card.addEventListener('mouseleave', function() {
            targetTiltY = 0;
            targetTiltX = 0;
            if (cursorLight) cursorLight.intensity = 2.5;
        });
    });

    // 9. Achievement Numbers Count-Up Animation
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
