// Mobile Menu Toggle
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');

if (hamburger) {
    hamburger.addEventListener('click', () => {
        if (navLinks.style.display === 'flex') {
            navLinks.style.display = 'none';
        } else {
            navLinks.style.display = 'flex';
            navLinks.style.flexDirection = 'column';
            navLinks.style.position = 'absolute';
            navLinks.style.top = '70px';
            navLinks.style.left = '0';
            navLinks.style.width = '100%';
            navLinks.style.background = 'white';
            navLinks.style.padding = '20px 0';
            navLinks.style.boxShadow = '0 5px 10px rgba(0,0,0,0.1)';
        }
    });
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        if (window.innerWidth <= 768 && navLinks.style.display === 'flex') {
            navLinks.style.display = 'none';
        }
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// --- Three.js: Flat World Map, Perfect Airplane, & Popups ---
const container = document.getElementById('globe-container');
if (container && typeof THREE !== 'undefined') {
    const scene = new THREE.Scene();
    
    const aspect = container.clientWidth / container.clientHeight;
    const camera = new THREE.PerspectiveCamera(45, aspect, 0.1, 1000);
    
    // Dynamic camera scaling to fix mobile view
    function updateCameraPosition() {
        const currentAspect = container.clientWidth / container.clientHeight;
        if (currentAspect < 1) {
            // Mobile (tall screen) - pull camera back so the 24-width map fits
            camera.position.set(0, 24, 18);
        } else {
            // Desktop (wide screen)
            camera.position.set(0, 14, 12);
        }
        camera.lookAt(0, 0, 0);
    }
    updateCameraPosition();

    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    container.appendChild(renderer.domElement);

    // Handle Resize
    window.addEventListener('resize', () => {
        if (!container) return;
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
        updateCameraPosition();
        renderer.setSize(container.clientWidth, container.clientHeight);
    });

    // 1. A High-Quality Flat Map with 3D Mountains & Snow
    const textureLoader = new THREE.TextureLoader();
    // Using realistic blue marble (has snow, terrain, oceans)
    const texture = textureLoader.load('https://unpkg.com/three-globe/example/img/earth-blue-marble.jpg');
    // Using a bump map to extrude actual 3D mountains
    const bumpTexture = textureLoader.load('https://raw.githubusercontent.com/mrdoob/three.js/master/examples/textures/planets/earth_bump_1024.jpg');
    
    // Increased segments (128x64) so the geometry has enough vertices to form 3D mountains
    const mapGeo = new THREE.PlaneGeometry(24, 12, 128, 64);
    const mapMat = new THREE.MeshStandardMaterial({ 
        color: 0xffffff,
        map: texture,
        displacementMap: bumpTexture,
        displacementScale: 0.6, // Extrudes mountains out of the flat map!
        roughness: 0.8,
        metalness: 0.1,
        side: THREE.DoubleSide
    });
    const mapPlane = new THREE.Mesh(mapGeo, mapMat);
    mapPlane.rotation.x = -Math.PI / 2; // Lay it flat
    scene.add(mapPlane);

    // 2. The Detailed Commercial Jet Airplane Model
    const planeGroup = new THREE.Group();
    const jetModel = new THREE.Group(); // Subgroup for roll animation
    
    const planeMat = new THREE.MeshStandardMaterial({ 
        color: 0xffffff, 
        metalness: 0.3, 
        roughness: 0.2 
    });
    const windowMat = new THREE.MeshStandardMaterial({
        color: 0x112233, // Dark glass
        metalness: 0.9,
        roughness: 0.1
    });

    // Fuselage (Straight body for a commercial jet look)
    const bodyGeo = new THREE.CylinderGeometry(0.2, 0.2, 2.5, 32);
    bodyGeo.rotateX(Math.PI / 2); // Point forward along Z
    const body = new THREE.Mesh(bodyGeo, planeMat);
    jetModel.add(body);
    
    // Aerodynamic Nose
    const noseGeo = new THREE.SphereGeometry(0.2, 32, 32);
    const nose = new THREE.Mesh(noseGeo, planeMat);
    nose.scale.set(1, 1, 3); // Stretch into an aerodynamic cone
    nose.position.set(0, 0, 1.25);
    jetModel.add(nose);

    // Tail Cone
    const tailConeGeo = new THREE.ConeGeometry(0.2, 0.8, 32);
    tailConeGeo.rotateX(-Math.PI / 2); // Point backward
    const tailCone = new THREE.Mesh(tailConeGeo, planeMat);
    tailCone.position.set(0, 0, -1.65);
    jetModel.add(tailCone);

    // Cockpit Windshield (Glass)
    const cockpitGeo = new THREE.SphereGeometry(0.18, 32, 16, 0, Math.PI, 0, Math.PI / 2.5);
    cockpitGeo.rotateX(Math.PI / 2.2);
    const cockpit = new THREE.Mesh(cockpitGeo, windowMat);
    cockpit.scale.set(1, 0.6, 1.5);
    cockpit.position.set(0, 0.08, 1.35); // Placed perfectly on the upper nose
    jetModel.add(cockpit);

    // Passenger Windows (Rows on both sides)
    for (let i = 0; i < 10; i++) {
        // Left Window
        const winGeo = new THREE.CircleGeometry(0.025, 16);
        const winL = new THREE.Mesh(winGeo, windowMat);
        winL.position.set(-0.201, 0.05, 0.8 - (i * 0.18));
        winL.rotation.y = -Math.PI / 2;
        jetModel.add(winL);

        // Right Window
        const winR = new THREE.Mesh(winGeo, windowMat);
        winR.position.set(0.201, 0.05, 0.8 - (i * 0.18));
        winR.rotation.y = Math.PI / 2;
        jetModel.add(winR);
    }

    // Main Wings (Commercial swept-back wings)
    const shape = new THREE.Shape();
    shape.moveTo(0, 0);
    shape.lineTo(2.2, -0.6);
    shape.lineTo(2.2, -1.0);
    shape.lineTo(0, 0.2);
    shape.lineTo(-2.2, -1.0);
    shape.lineTo(-2.2, -0.6);
    shape.lineTo(0, 0);
    
    const extrudeSettings = { depth: 0.06, bevelEnabled: true, bevelSegments: 2, steps: 1, bevelSize: 0.02, bevelThickness: 0.02 };
    const wingGeo = new THREE.ExtrudeGeometry(shape, extrudeSettings);
    const wings = new THREE.Mesh(wingGeo, planeMat);
    wings.rotation.x = Math.PI / 2;
    wings.position.set(0, -0.05, 0.2); // Positioned slightly under fuselage
    jetModel.add(wings);
    
    // Vertical Tail Fin
    const finGeo = new THREE.BoxGeometry(0.04, 0.7, 0.6);
    const fin = new THREE.Mesh(finGeo, planeMat);
    fin.position.set(0, 0.35, -1.4);
    // Sweep fin back via vertex manipulation
    fin.geometry.computeBoundingBox();
    const positions = fin.geometry.attributes.position;
    for (let i = 0; i < positions.count; i++) {
        if (positions.getY(i) > 0) {
            positions.setZ(i, positions.getZ(i) - 0.4);
        }
    }
    fin.geometry.computeVertexNormals();
    jetModel.add(fin);

    // Horizontal Stabilizers (Rear small wings)
    const hStabShape = new THREE.Shape();
    hStabShape.moveTo(0, 0);
    hStabShape.lineTo(0.8, -0.3);
    hStabShape.lineTo(0.8, -0.5);
    hStabShape.lineTo(0, 0.1);
    hStabShape.lineTo(-0.8, -0.5);
    hStabShape.lineTo(-0.8, -0.3);
    hStabShape.lineTo(0, 0);
    
    const hStabGeo = new THREE.ExtrudeGeometry(hStabShape, extrudeSettings);
    const hStab = new THREE.Mesh(hStabGeo, planeMat);
    hStab.rotation.x = Math.PI / 2;
    hStab.position.set(0, 0.05, -1.4);
    jetModel.add(hStab);

    planeGroup.add(jetModel); // Add jet model to main plane group

    // 3. Fixed Cloth Banner (Larger & Readable on BOTH sides)
    const bannerCanvas = document.createElement('canvas');
    bannerCanvas.width = 1024;
    bannerCanvas.height = 256;
    const ctx = bannerCanvas.getContext('2d');
    ctx.fillStyle = '#ffffff';
    ctx.fillRect(0, 0, 1024, 256);
    
    ctx.strokeStyle = '#ff5722';
    ctx.lineWidth = 15;
    ctx.strokeRect(0, 0, 1024, 256);

    ctx.fillStyle = '#ff5722';
    ctx.font = 'bold 160px "Segoe UI", Arial, sans-serif';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.fillText('FUSION X', 512, 128);
    
    const bannerTexture = new THREE.CanvasTexture(bannerCanvas);
    bannerTexture.anisotropy = renderer.capabilities.getMaxAnisotropy();
    
    // Increased size significantly
    const bannerGeo = new THREE.PlaneGeometry(6.0, 1.2, 40, 5);
    bannerGeo.translate(3.0, 0, 0); 
    
    // FRONT Banner
    const bannerMatFront = new THREE.MeshBasicMaterial({ map: bannerTexture, side: THREE.FrontSide });
    const bannerFront = new THREE.Mesh(bannerGeo, bannerMatFront);
    
    // BACK Banner (Flipped UVs so text isn't mirrored!)
    const bannerGeoBack = bannerGeo.clone();
    const uvs = bannerGeoBack.attributes.uv;
    for (let i = 0; i < uvs.count; i++) {
        uvs.setX(i, 1 - uvs.getX(i)); // Flip X coordinate
    }
    const bannerMatBack = new THREE.MeshBasicMaterial({ map: bannerTexture, side: THREE.BackSide });
    const bannerBack = new THREE.Mesh(bannerGeoBack, bannerMatBack);

    const bannerGroup = new THREE.Group();
    bannerGroup.add(bannerFront);
    bannerGroup.add(bannerBack);
    
    // Position the banner significantly behind the longer jet model (Tail ends at z = -2.05)
    bannerGroup.position.set(0, 0, -3.5);
    bannerGroup.rotation.y = Math.PI / 2; 
    planeGroup.add(bannerGroup);

    // Tow rope connecting the very tip of the tail cone to the front of the banner
    const ropeGeo = new THREE.BufferGeometry().setFromPoints([
        new THREE.Vector3(0, 0, -2.05), // Tip of the tail cone
        new THREE.Vector3(0, 0, -3.5)   // Front edge of the banner
    ]);
    const ropeMat = new THREE.LineBasicMaterial({ color: 0x222222, linewidth: 2 });
    const rope = new THREE.Line(ropeGeo, ropeMat);
    planeGroup.add(rope);

    planeGroup.scale.set(0.6, 0.6, 0.6);
    // Raise airplane slightly higher to clear the new 3D mountains
    planeGroup.position.y = 1.0; 
    scene.add(planeGroup);

    // 4. Pop-up Services (Interactive)
    const services = [
        { name: 'Brand Consulting', pos: new THREE.Vector3(-6, 0.2, -2) },
        { name: 'SEO & Content', pos: new THREE.Vector3(1.5, 0.2, -3) },
        { name: 'Web Development', pos: new THREE.Vector3(6, 0.2, -2.5) },
        { name: 'Shopify Stores', pos: new THREE.Vector3(8.5, 0.2, 2.5) },
        { name: 'AI Visible Sites', pos: new THREE.Vector3(-3.5, 0.2, 3) }
    ];

    const popups = [];
    services.forEach(service => {
        const el = document.createElement('div');
        el.className = 'map-popup';
        el.innerText = service.name;
        // Scroll to services section when clicked
        el.addEventListener('click', () => {
            document.querySelector('#services').scrollIntoView({ behavior: 'smooth' });
        });
        container.appendChild(el);
        popups.push({ element: el, pos: service.pos, active: false });

        const dotGeo = new THREE.CircleGeometry(0.2, 16);
        const dotMat = new THREE.MeshBasicMaterial({ color: 0xff5722, transparent: true, opacity: 0.8 });
        const dot = new THREE.Mesh(dotGeo, dotMat);
        dot.rotation.x = -Math.PI / 2;
        dot.position.copy(service.pos);
        dot.position.y = 0.05;
        scene.add(dot);
    });

    // 5. Flight Path (Raised to clear mountains)
    const continents = [
        new THREE.Vector3(-6, 4, -2),  
        new THREE.Vector3(1.5, 4, -3), 
        new THREE.Vector3(6, 4, -2.5), 
        new THREE.Vector3(8.5, 4, 2.5),
        new THREE.Vector3(2, 4, 1),
        new THREE.Vector3(-3.5, 4, 3), 
        new THREE.Vector3(-6, 4, -2)   
    ];
    
    const curve = new THREE.CatmullRomCurve3(continents);
    curve.closed = true;

    const pathPoints = curve.getPoints(200);
    const pathGeo = new THREE.BufferGeometry().setFromPoints(pathPoints);
    const pathMat = new THREE.LineDashedMaterial({ 
        color: 0xff9800, 
        dashSize: 0.2, 
        gapSize: 0.1, 
        linewidth: 1,
        transparent: true,
        opacity: 0.5
    });
    const pathLine = new THREE.Line(pathGeo, pathMat);
    pathLine.computeLineDistances();
    scene.add(pathLine);

    // Lighting (Enhanced for 3D mountains)
    const ambient = new THREE.AmbientLight(0xffffff, 0.6);
    scene.add(ambient);
    const dirLight = new THREE.DirectionalLight(0xffffff, 1.5);
    dirLight.position.set(10, 20, 10);
    scene.add(dirLight);
    
    const fillLight = new THREE.DirectionalLight(0xabcdef, 0.5);
    fillLight.position.set(-10, 5, -10);
    scene.add(fillLight);

    // --- INTERACTIVITY LOGIC ---
    let isRolling = false;
    let rollAngle = 0;
    
    const raycaster = new THREE.Raycaster();
    const mouse = new THREE.Vector2();

    // Orbit Controls for Dragging the Map
    const controls = new THREE.OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;
    controls.dampingFactor = 0.05;
    controls.enableZoom = true;
    controls.minDistance = 5;
    controls.maxDistance = 25;
    controls.maxPolarAngle = Math.PI / 2 - 0.1; // Prevent going underneath the map

    // Raycaster mouse for clicking
    container.addEventListener('mousemove', (event) => {
        const rect = container.getBoundingClientRect();
        mouse.x = ((event.clientX - rect.left) / rect.width) * 2 - 1;
        mouse.y = -((event.clientY - rect.top) / rect.height) * 2 + 1;
    });

    // Barrel Roll on Click
    container.addEventListener('click', () => {
        raycaster.setFromCamera(mouse, camera);
        const intersects = raycaster.intersectObject(jetModel, true);
        if (intersects.length > 0 && !isRolling) {
            isRolling = true;
            rollAngle = 0;
        }
    });

    // Animation Loop
    let time = 0;
    const flightDuration = 2500;
    const bannerPositionsFront = bannerGeo.attributes.position;
    const bannerPositionsBack = bannerGeoBack.attributes.position;
    const bannerInitialX = [];
    for (let i = 0; i < bannerPositionsFront.count; i++) {
        bannerInitialX.push(bannerPositionsFront.getX(i));
    }

    function animate() {
        requestAnimationFrame(animate);
        time += 1;
        controls.update(); // Required for damping

        const t = (time % flightDuration) / flightDuration;
        const position = curve.getPointAt(t);
        planeGroup.position.copy(position);
        
        const nextT = ((time + 1) % flightDuration) / flightDuration;
        const nextPosition = curve.getPointAt(nextT);
        planeGroup.lookAt(nextPosition);

        // Barrel Roll Animation
        if (isRolling) {
            rollAngle += 0.15;
            jetModel.rotation.z = rollAngle;
            if (rollAngle >= Math.PI * 2) {
                isRolling = false;
                jetModel.rotation.z = 0;
            }
        }

        // Banner Wave Animation
        for (let i = 0; i < bannerPositionsFront.count; i++) {
            const x = bannerInitialX[i];
            const wave = Math.sin((x * 4) - (time * 0.4)) * (x * 0.15);
            bannerPositionsFront.setZ(i, wave);
            bannerPositionsBack.setZ(i, wave);
        }
        bannerPositionsFront.needsUpdate = true;
        bannerPositionsBack.needsUpdate = true;

        // Update HTML Popups
        popups.forEach(popup => {
            const vector = popup.pos.clone();
            vector.project(camera);
            
            const x = (vector.x * .5 + .5) * container.clientWidth;
            const y = (vector.y * -.5 + .5) * container.clientHeight;
            
            popup.element.style.left = `${x}px`;
            popup.element.style.top = `${y}px`;

            const dist = planeGroup.position.distanceTo(popup.pos);
            if (dist < 4.0) {
                popup.element.classList.add('visible');
            } else {
                popup.element.classList.remove('visible');
            }
        });

        // Slow cinematic rotation if user isn't actively dragging
        // To do this properly without fighting OrbitControls, we can just let the user control the camera fully.

        renderer.render(scene, camera);
    }
    
    animate();

    window.addEventListener('resize', () => {
        if (!container) return;
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
    });
}

// --- HTML 3D Brand Carousel ---
const carousel = document.getElementById('html-3d-carousel');
const scene3D = document.querySelector('.brands-scene');
if (carousel && scene3D) {
    const cards = carousel.querySelectorAll('.brand-card');
    const numCards = cards.length;
    // Calculate radius to perfectly fit all cards in a ring without overlapping
    const cardWidth = 220; 
    const radius = Math.round((cardWidth / 2) / Math.tan(Math.PI / numCards)) + 50;
    
    // Position cards in a 3D ring
    cards.forEach((card, index) => {
        const angle = (360 / numCards) * index;
        card.style.transform = otateY(deg) translateZ(px);
    });
    
    let currentRotation = 0;
    let isDraggingCarousel = false;
    let startX = 0;
    
    // Auto-spin animation
    function autoSpin() {
        if (!isDraggingCarousel) {
            currentRotation -= 0.1;
            carousel.style.transform = otateY(deg);
        }
        requestAnimationFrame(autoSpin);
    }
    autoSpin();

    // Mouse drag interaction
    scene3D.addEventListener('mousedown', (e) => {
        isDraggingCarousel = true;
        startX = e.pageX;
        carousel.style.transition = 'none'; // Disable transition for instant drag response
    });
    
    window.addEventListener('mouseup', () => {
        if (isDraggingCarousel) {
            isDraggingCarousel = false;
            carousel.style.transition = 'transform 0.1s';
        }
    });
    
    window.addEventListener('mousemove', (e) => {
        if (!isDraggingCarousel) return;
        const x = e.pageX;
        const dragDist = x - startX;
        currentRotation += dragDist * 0.2; // Sensitivity
        carousel.style.transform = otateY(deg);
        startX = x;
    });

    // Touch support for Mobile
    scene3D.addEventListener('touchstart', (e) => {
        isDraggingCarousel = true;
        startX = e.touches[0].clientX;
        carousel.style.transition = 'none';
    }, {passive: true});
    
    window.addEventListener('touchend', () => {
        if (isDraggingCarousel) {
            isDraggingCarousel = false;
            carousel.style.transition = 'transform 0.1s';
        }
    });
    
    window.addEventListener('touchmove', (e) => {
        if (!isDraggingCarousel) return;
        const x = e.touches[0].clientX;
        const dragDist = x - startX;
        currentRotation += dragDist * 0.3;
        carousel.style.transform = otateY(deg);
        startX = x;
    }, {passive: true});
}
