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
    
    const camera = new THREE.PerspectiveCamera(45, container.clientWidth / container.clientHeight, 0.1, 1000);
    camera.position.set(0, 14, 12);
    camera.lookAt(0, 0, 0);

    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    container.appendChild(renderer.domElement);

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

    // 2. The Perfect Sleek Airplane Model
    const planeGroup = new THREE.Group();
    
    // Fuselage (Sleek body)
    const bodyGeo = new THREE.CylinderGeometry(0.1, 0.3, 2, 16);
    bodyGeo.rotateX(Math.PI / 2); // Point forward
    const planeMat = new THREE.MeshStandardMaterial({ 
        color: 0xffffff, 
        metalness: 0.5, 
        roughness: 0.1 
    });
    const body = new THREE.Mesh(bodyGeo, planeMat);
    planeGroup.add(body);
    
    // Nose Cone
    const noseGeo = new THREE.ConeGeometry(0.1, 0.5, 16);
    noseGeo.rotateX(Math.PI / 2);
    const nose = new THREE.Mesh(noseGeo, planeMat);
    nose.position.set(0, 0, 1.25);
    planeGroup.add(nose);

    // Delta Wings (swept back)
    const shape = new THREE.Shape();
    shape.moveTo(0, 0);
    shape.lineTo(1.5, -0.8);
    shape.lineTo(1.5, -1.0);
    shape.lineTo(0, -0.2);
    shape.lineTo(-1.5, -1.0);
    shape.lineTo(-1.5, -0.8);
    shape.lineTo(0, 0);
    
    const extrudeSettings = { depth: 0.05, bevelEnabled: true, bevelSegments: 2, steps: 1, bevelSize: 0.02, bevelThickness: 0.02 };
    const wingGeo = new THREE.ExtrudeGeometry(shape, extrudeSettings);
    const wings = new THREE.Mesh(wingGeo, planeMat);
    wings.rotation.x = Math.PI / 2;
    wings.position.set(0, 0, 0.5);
    planeGroup.add(wings);
    
    // Tail Stabilizer
    const finGeo = new THREE.BoxGeometry(0.05, 0.6, 0.5);
    const fin = new THREE.Mesh(finGeo, planeMat);
    fin.position.set(0, 0.3, -0.8);
    fin.geometry.computeBoundingBox();
    const positions = fin.geometry.attributes.position;
    for (let i = 0; i < positions.count; i++) {
        if (positions.getY(i) > 0) {
            positions.setZ(i, positions.getZ(i) - 0.2);
        }
    }
    fin.geometry.computeVertexNormals();
    planeGroup.add(fin);

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
    
    bannerGroup.position.set(0, 0, -1.3);
    bannerGroup.rotation.y = Math.PI / 2; 
    planeGroup.add(bannerGroup);

    const ropeGeo = new THREE.BufferGeometry().setFromPoints([
        new THREE.Vector3(0, 0, -0.8),
        new THREE.Vector3(0, 0, -1.3)
    ]);
    const ropeMat = new THREE.LineBasicMaterial({ color: 0x555555 });
    const rope = new THREE.Line(ropeGeo, ropeMat);
    planeGroup.add(rope);

    planeGroup.scale.set(0.6, 0.6, 0.6);
    // Raise airplane slightly higher to clear the new 3D mountains
    planeGroup.position.y = 1.0; 
    scene.add(planeGroup);

    // 4. Pop-up Services
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
    // Add shadow properties if we ever enable shadows
    scene.add(dirLight);
    
    // Add a secondary light to illuminate the dark side of mountains
    const fillLight = new THREE.DirectionalLight(0xabcdef, 0.5);
    fillLight.position.set(-10, 5, -10);
    scene.add(fillLight);

    // Animation
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

        const t = (time % flightDuration) / flightDuration;
        const position = curve.getPointAt(t);
        planeGroup.position.copy(position);
        
        const nextT = ((time + 1) % flightDuration) / flightDuration;
        const nextPosition = curve.getPointAt(nextT);
        planeGroup.lookAt(nextPosition);

        // Banner Wave Animation
        for (let i = 0; i < bannerPositionsFront.count; i++) {
            const x = bannerInitialX[i];
            const wave = Math.sin((x * 4) - (time * 0.4)) * (x * 0.15);
            bannerPositionsFront.setZ(i, wave);
            bannerPositionsBack.setZ(i, wave); // Keep back synced
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

        camera.position.x = Math.sin(time * 0.001) * 2;
        camera.position.z = 12 + Math.cos(time * 0.001) * 2;
        camera.lookAt(0, 0, 0);

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
