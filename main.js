// Mobile Menu Toggle
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');

if (hamburger) {
    hamburger.addEventListener('click', () => {
        if (navLinks.style.display === 'flex') {
            navLinks.style.display = '';
            navLinks.style.flexDirection = '';
            navLinks.style.alignItems = '';
            navLinks.style.position = '';
            navLinks.style.top = '';
            navLinks.style.left = '';
            navLinks.style.width = '';
            navLinks.style.background = '';
            navLinks.style.padding = '';
            navLinks.style.boxShadow = '';
            navLinks.style.zIndex = '';
        } else {
            navLinks.style.display = 'flex';
            navLinks.style.flexDirection = 'column';
            navLinks.style.alignItems = 'center'; // Center the links!
            navLinks.style.position = 'absolute';
            navLinks.style.top = '70px';
            navLinks.style.left = '0';
            navLinks.style.width = '100%';
            navLinks.style.background = 'white';
            navLinks.style.padding = '30px 0'; // A bit more padding
            navLinks.style.boxShadow = '0 5px 10px rgba(0,0,0,0.1)';
            navLinks.style.zIndex = '1000'; // Ensure it's on top
        }
    });

    // Fix: Clear inline styles if resizing back to desktop
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            navLinks.removeAttribute('style');
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
            // Mobile (tall screen) - pull camera back
            camera.position.set(0, 75, 55);
        } else {
            // Desktop (wide screen) - Zoomed out to show full map with breathing room
            camera.position.set(0, 42, 38);
        }
        camera.lookAt(0, 0, 0);
    }
    updateCameraPosition();

    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    renderer.shadowMap.enabled = true;
    renderer.shadowMap.type = THREE.PCFSoftShadowMap;
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
    // 1. Optimized Geometry for smoother play (Reduced from 2 Million to 260,000 polygons)
    const mapGeo = new THREE.PlaneGeometry(48, 24, 512, 256);
    const mapMat = new THREE.MeshStandardMaterial({ 
        color: 0xffffff,
        map: texture,
        displacementScale: 2.0, // HIGH MOUNTAINS!
        displacementBias: -0.2, 
        roughness: 0.6,
        metalness: 0.2,
        side: THREE.DoubleSide
    });
    
    // 2. Load the elevation map, but BLUR it dynamically so spikes connect into smooth ridges!
    const img = new Image();
    img.crossOrigin = "Anonymous";
    img.src = 'https://unpkg.com/three-globe/example/img/earth-topology.png';
    img.onload = () => {
        const blurCanvas = document.createElement('canvas');
        blurCanvas.width = img.width;
        blurCanvas.height = img.height;
        const ctx = blurCanvas.getContext('2d');
        
        // Heavy blur forces individual pixel spikes to merge together into realistic smooth mountain ranges!
        ctx.filter = 'blur(4px)';
        ctx.drawImage(img, 0, 0);
        
        const smoothBumpTexture = new THREE.CanvasTexture(blurCanvas);
        smoothBumpTexture.minFilter = THREE.LinearFilter;
        smoothBumpTexture.magFilter = THREE.LinearFilter;
        
        mapMat.displacementMap = smoothBumpTexture;
        mapMat.needsUpdate = true;
    };
    
    const mapPlane = new THREE.Mesh(mapGeo, mapMat);
    mapPlane.rotation.x = -Math.PI / 2; // Lay it flat
    mapPlane.receiveShadow = true;
    mapPlane.castShadow = true;
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
    
    // (Jet stream removed to optimize performance and reduce GPU load)

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

    // 4. Exact Geographic Coordinates mapped to the 48x24 plane
    // Formula: X = (Lon / 180) * 24, Z = (-Lat / 90) * 12
    const locations = [
        { name: 'New York, USA', pos: new THREE.Vector3(-9.86, 2.5, -5.42) }, // 40.7N, 74.0W
        { name: 'London, UK', pos: new THREE.Vector3(-0.01, 2.5, -6.86) },   // 51.5N, 0.1W
        { name: 'Dubai, UAE', pos: new THREE.Vector3(7.36, 2.5, -3.36) },    // 25.2N, 55.2E
        { name: 'Chennai, IND', pos: new THREE.Vector3(10.70, 2.5, -1.74) }, // 13.08N, 80.27E (NEW)
        { name: 'Sydney, AUS', pos: new THREE.Vector3(20.16, 2.5, 4.50) },   // 33.8S, 151.2E
        { name: 'São Paulo, BR', pos: new THREE.Vector3(-6.21, 2.5, 3.13) }  // 23.5S, 46.6W
    ];

    const popups = [];
    locations.forEach(location => {
        const el = document.createElement('div');
        el.className = 'map-popup';
        // Add a small location pin icon before the text
        el.innerHTML = `<i class="fas fa-map-marker-alt" style="margin-right: 5px; color: #ff5722;"></i> ${location.name}`;
        
        container.appendChild(el);
        popups.push({ element: el, pos: location.pos, active: false });

        const dotGeo = new THREE.CircleGeometry(0.2, 16);
        const dotMat = new THREE.MeshBasicMaterial({ color: 0xff5722, transparent: true, opacity: 0.8 });
        const dot = new THREE.Mesh(dotGeo, dotMat);
        dot.rotation.x = -Math.PI / 2;
        
        // Make the pins float above the 3D mountains like a hologram
        dot.position.copy(location.pos);
        dot.position.y = 2.5; // Raised from 1.2 to clear mountains!
        scene.add(dot);

        // Add a hologram laser line shooting down from the pin to the map
        const poleGeo = new THREE.BufferGeometry().setFromPoints([
            new THREE.Vector3(location.pos.x, 2.5, location.pos.z),
            new THREE.Vector3(location.pos.x, -0.5, location.pos.z) // shoot into the ground
        ]);
        const poleMat = new THREE.LineBasicMaterial({ color: 0xff5722, transparent: true, opacity: 0.5 });
        const pole = new THREE.Line(poleGeo, poleMat);
        scene.add(pole);
    });

    // 5. Flight Path (Hugging the terrain closely, stopping exactly at cities!)
    const continents = [
        new THREE.Vector3(-9.86, 2.8, -5.42), // NY
        new THREE.Vector3(-4.5, 2.5, -6.5),   // Atlantic dip
        new THREE.Vector3(-0.01, 2.8, -6.86), // London
        new THREE.Vector3(4.0, 3.5, -5.0),    // Over Europe/Mountains
        new THREE.Vector3(7.36, 2.8, -3.36),  // Dubai
        new THREE.Vector3(10.70, 2.8, -1.74), // Chennai
        new THREE.Vector3(15.0, 2.5, 1.5),    // Indian Ocean dip
        new THREE.Vector3(20.16, 2.8, 4.50),  // Sydney
        new THREE.Vector3(7.0, 3.5, 6.0),     // Over Pacific/Antarctic edge
        new THREE.Vector3(-6.21, 2.8, 3.13),  // Sao Paulo
        new THREE.Vector3(-9.86, 2.8, -5.42)  // Back to NY
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

    // --- DYNAMIC DAY / NIGHT CYCLE ---
    const hour = new Date().getHours();
    const isNight = (hour >= 18 || hour < 6); // Restore dynamic day/night cycle
    
    // Ensure the 3D map itself is transparent so it beautifully blends with the new black hero section theme
    scene.background = null; 

    // Update the background color of the hero section to match the new global theme
    const heroSection = document.querySelector('.hero');
    if (heroSection) {
        heroSection.style.background = '#080808';
    }

    // Dynamic Lighting
    const ambientIntensity = isNight ? 0.2 : 0.6; 
    const ambientColor = isNight ? 0x88aaff : 0xffffff;
    const ambient = new THREE.AmbientLight(ambientColor, ambientIntensity);
    scene.add(ambient);
    
    const sunMoonColor = isNight ? 0xaaccff : 0xffffff;
    const sunMoonIntensity = isNight ? 0.6 : 1.8;
    const dirLight = new THREE.DirectionalLight(sunMoonColor, sunMoonIntensity);
    dirLight.position.set(10, 20, 10);
    dirLight.castShadow = true;
    dirLight.shadow.mapSize.width = 1024; // Lowered from 2048 for better performance
    dirLight.shadow.mapSize.height = 1024;
    dirLight.shadow.camera.near = 0.5;
    dirLight.shadow.camera.far = 100;
    dirLight.shadow.camera.left = -30;
    dirLight.shadow.camera.right = 30;
    dirLight.shadow.camera.top = 20;
    dirLight.shadow.camera.bottom = -20;
    scene.add(dirLight);
    
    if (!isNight) {
        const fillLight = new THREE.DirectionalLight(0xabcdef, 0.5);
        fillLight.position.set(-10, 5, -10);
        scene.add(fillLight);
    } else {
        // Add 3D Stars at Night!
        const starsGeo = new THREE.BufferGeometry();
        const starsCount = 3000;
        const posArray = new Float32Array(starsCount * 3);
        for(let i = 0; i < starsCount * 3; i++) {
            posArray[i] = (Math.random() - 0.5) * 300; // Spread across a huge area
        }
        starsGeo.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
        const starsMat = new THREE.PointsMaterial({size: 0.2, color: 0xffffff, transparent: true, opacity: 0.8});
        const starMesh = new THREE.Points(starsGeo, starsMat);
        scene.add(starMesh);
    }

    // --- INTERACTIVITY LOGIC ---
    let isRolling = false;
    let rollAngle = 0;
    
    const raycaster = new THREE.Raycaster();
    const mouse = new THREE.Vector2();

    // Orbit Controls for Dragging, Zooming, and Tilting the Map
    const controls = new THREE.OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true; // Smooth gliding effect
    controls.dampingFactor = 0.05;
    controls.enableZoom = true;
    controls.enablePan = true; // Allow dragging the map around
    controls.minDistance = 10; // How close you can zoom in
    controls.maxDistance = 100; // Fixed! Allows zooming out properly
    controls.maxPolarAngle = Math.PI / 2 - 0.05; // Prevent camera from going underneath the map

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

        // Holographic Map Bobbing (Slow, realistic hover effect)
        mapPlane.position.y = Math.sin(time * 0.02) * 0.1;
        
        // Ocean Satellite Movement Effect (Moving Specular Highlights)
        // By slowly orbiting the sun/moon light, it creates beautiful moving reflections across the water!
        dirLight.position.x = Math.sin(time * 0.005) * 20;
        dirLight.position.z = Math.cos(time * 0.005) * 20;

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


