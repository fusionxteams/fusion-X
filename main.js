

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        if (window.innerWidth <= 768 && navLinks.style.display === 'flex') {
            navLinks.style.display = 'none';
        }
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

// --- Three.js: 3D Spinning Globe Earth Model with Digital Marketing Arcs & Tooltips ---
// Replaces the flat world map with the interactive 3D Globe Earth model
const container = document.getElementById('globe-container');

if (container && typeof THREE !== 'undefined') {
    container.style.cursor = 'grab';
    const scene = new THREE.Scene();
    
    // Transparent background so it blends seamlessly with the hero section
    const aspect = container.clientWidth / container.clientHeight;
    const camera = new THREE.PerspectiveCamera(45, aspect, 0.1, 1000);
    
    function updateGlobeCamera() {
        if (!container) return;
        const curAspect = container.clientWidth / container.clientHeight;
        if (curAspect < 1) {
            camera.position.z = 48; // Mobile - comfortable fit
        } else {
            camera.position.z = 35; // Desktop - gives extra padding for tooltips
        }
        camera.lookAt(0, 0, 0);
    }
    updateGlobeCamera();

    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    container.appendChild(renderer.domElement);

    // High-Quality Studio Lights
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.85);
    scene.add(ambientLight);
    
    const directionalLight = new THREE.DirectionalLight(0xffffff, 1.1);
    directionalLight.position.set(12, 12, 12);
    scene.add(directionalLight);

    const rimLight = new THREE.DirectionalLight(0xff5722, 0.65);
    rimLight.position.set(-10, -5, 5);
    scene.add(rimLight);

    // Create the 3D Sphere (Globe)
    const globeRadius = 10;
    const geometry = new THREE.SphereGeometry(globeRadius, 64, 64);
    
    const textureLoader = new THREE.TextureLoader();
    const mapTexture = textureLoader.load('https://unpkg.com/three-globe/example/img/earth-blue-marble.jpg');
    const bumpTexture = textureLoader.load('https://raw.githubusercontent.com/mrdoob/three.js/master/examples/textures/planets/earth_bump_1024.jpg');
    
    const material = new THREE.MeshStandardMaterial({ 
        map: mapTexture,
        bumpMap: bumpTexture,
        bumpScale: 0.18,
        roughness: 0.55,
        metalness: 0.12
    });
    
    const globe = new THREE.Mesh(geometry, material);
    globe.rotation.z = 0.2;
    scene.add(globe);

    // --- DIGITAL MARKETING VISUALS ---

    // 1. Orbiting Digital Data Rings
    const ringGroup = new THREE.Group();
    globe.add(ringGroup);
    
    for (let i = 0; i < 3; i++) {
        const ringGeo = new THREE.TorusGeometry(globeRadius + 1.5 + (i * 0.8), 0.05, 8, 100);
        const ringMat = new THREE.MeshBasicMaterial({ 
            color: 0xff5722, 
            transparent: true, 
            opacity: 0.65 - (i * 0.1) 
        });
        const ring = new THREE.Mesh(ringGeo, ringMat);
        ring.rotation.x = Math.PI / 2 + (Math.random() * 0.5 - 0.25);
        ring.rotation.y = (Math.random() * 0.5 - 0.25);
        
        // Add random data nodes on the ring
        for (let j = 0; j < 10; j++) {
            const nodeGeo = new THREE.SphereGeometry(0.2, 8, 8);
            const nodeMat = new THREE.MeshBasicMaterial({ color: 0xffffff });
            const node = new THREE.Mesh(nodeGeo, nodeMat);
            const angle = Math.random() * Math.PI * 2;
            node.position.set(Math.cos(angle) * (globeRadius + 1.5 + (i * 0.8)), Math.sin(angle) * (globeRadius + 1.5 + (i * 0.8)), 0);
            ring.add(node);
        }
        ringGroup.add(ring);
    }

    // 2. Fusion X HQ Beacon & Global Flight Arcs
    const arcsGroup = new THREE.Group();
    globe.add(arcsGroup);
    
    function getPosFromLatLon(lat, lon, radius) {
        const phi = (90 - lat) * (Math.PI / 180);
        const theta = (lon + 180) * (Math.PI / 180);
        
        return new THREE.Vector3(
            -(radius * Math.sin(phi) * Math.cos(theta)),
            radius * Math.cos(phi),
            radius * Math.sin(phi) * Math.sin(theta)
        );
    }

    // Fusion X HQ in Chennai, India: Lat 13.08, Lon 80.27
    const hqPos = getPosFromLatLon(13.08, 80.27, globeRadius);
    
    // HQ beacon pin
    const beaconGeo = new THREE.SphereGeometry(0.4, 16, 16);
    const beaconMat = new THREE.MeshBasicMaterial({ color: 0xff5722 });
    const beacon = new THREE.Mesh(beaconGeo, beaconMat);
    beacon.position.copy(hqPos);
    globe.add(beacon);

    // Target Cities worldwide
    const targets = [
        getPosFromLatLon(40.7, -74.0, globeRadius),   // New York
        getPosFromLatLon(51.5, -0.1, globeRadius),    // London
        getPosFromLatLon(35.6, 139.6, globeRadius),   // Tokyo
        getPosFromLatLon(-33.8, 151.2, globeRadius),  // Sydney
        getPosFromLatLon(25.2, 55.2, globeRadius),    // Dubai
        getPosFromLatLon(1.3, 103.8, globeRadius),    // Singapore
        getPosFromLatLon(37.7, -122.4, globeRadius)   // San Francisco
    ];

    // Create arcs from HQ to targets
    const arcLines = [];
    targets.forEach(targetPos => {
        const midPoint = hqPos.clone().lerp(targetPos, 0.5);
        midPoint.normalize().multiplyScalar(globeRadius + 3.2); // Height of arc
        
        const curve = new THREE.QuadraticBezierCurve3(hqPos, midPoint, targetPos);
        const points = curve.getPoints(50);
        const arcGeo = new THREE.BufferGeometry().setFromPoints(points);
        const arcMat = new THREE.LineBasicMaterial({ color: 0x00d4ff, transparent: true, opacity: 0.85, linewidth: 2 });
        
        const arc = new THREE.Line(arcGeo, arcMat);
        
        // Pulsing data packet along the curve
        const dotGeo = new THREE.SphereGeometry(0.3, 8, 8);
        const dotMat = new THREE.MeshBasicMaterial({ color: 0xff5722 });
        const dot = new THREE.Mesh(dotGeo, dotMat);
        
        arcsGroup.add(arc);
        arcsGroup.add(dot);
        
        arcLines.push({ curve, dot, progress: Math.random() });
    });

    // 3. Floating Digital Marketing Text Nodes (Tooltips)
    const textSprites = [
        'SEO', 'ADS', 'SOCIAL', 'BRAND', 'DATA', 
        'UI/UX', 'WEB 3', 'AI DRIVEN', 'METRICS', 'ROI', 
        'GROWTH', 'FUNNELS', 'VIRAL', 'CONTENT'
    ];
    
    function createTooltipSprite(text) {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        
        ctx.font = 'bold 36px Arial';
        const textWidth = ctx.measureText(text).width;
        
        const padding = 50;
        canvas.width = textWidth + (padding * 2); 
        canvas.height = 100;
        
        ctx.font = 'bold 36px Arial';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        
        ctx.fillStyle = 'rgba(255, 255, 255, 0.92)';
        ctx.beginPath();
        ctx.roundRect(6, 10, canvas.width - 12, 80, 40); 
        ctx.fill();
        
        ctx.strokeStyle = '#ff5722';
        ctx.lineWidth = 6;
        ctx.stroke();

        ctx.fillStyle = '#ff5722';
        ctx.fillText(text, canvas.width / 2, 50);
        
        const tex = new THREE.CanvasTexture(canvas);
        const mat = new THREE.SpriteMaterial({ map: tex, transparent: true, opacity: 1.0 });
        const sprite = new THREE.Sprite(mat);
        
        const spriteHeight = 1.4;
        const spriteWidth = (canvas.width / canvas.height) * spriteHeight;
        sprite.scale.set(spriteWidth, spriteHeight, 1); 
        
        return sprite;
    }

    textSprites.forEach((text) => {
        const sprite = createTooltipSprite(text);
        
        const randLat = (Math.random() - 0.5) * 130;
        const randLon = (Math.random() - 0.5) * 360;
        
        const orbitDist = globeRadius + 2.0 + (Math.random() * 2);
        const pos = getPosFromLatLon(randLat, randLon, orbitDist);
        
        sprite.position.copy(pos);
        globe.add(sprite);
    });

    // Mouse & Touch Dragging Logic
    let isDragging = false;
    let previousMousePosition = { x: 0, y: 0 };
    
    container.addEventListener('mousedown', (e) => {
        isDragging = true;
        container.style.cursor = 'grabbing';
    });
    
    window.addEventListener('mouseup', () => {
        isDragging = false;
        if (container) container.style.cursor = 'grab';
    });
    
    window.addEventListener('mousemove', (e) => {
        if (isDragging) {
            const deltaMove = {
                x: e.offsetX - previousMousePosition.x,
                y: e.offsetY - previousMousePosition.y
            };
            
            globe.rotation.y += deltaMove.x * 0.01;
            globe.rotation.x += deltaMove.y * 0.01;
        }
        previousMousePosition = { x: e.offsetX, y: e.offsetY };
    });

    container.addEventListener('touchstart', (e) => {
        isDragging = true;
        if (e.touches.length > 0) {
            previousMousePosition = {
                x: e.touches[0].clientX,
                y: e.touches[0].clientY
            };
        }
        if (e.cancelable) e.preventDefault(); 
    }, { passive: false });

    window.addEventListener('touchend', () => {
        isDragging = false;
    });

    window.addEventListener('touchmove', (e) => {
        if (isDragging && e.touches.length > 0) {
            const currentX = e.touches[0].clientX;
            const currentY = e.touches[0].clientY;
            const deltaMove = {
                x: currentX - previousMousePosition.x,
                y: currentY - previousMousePosition.y
            };
            
            globe.rotation.y += deltaMove.x * 0.01;
            globe.rotation.x += deltaMove.y * 0.01;
            
            previousMousePosition = { x: currentX, y: currentY };
        }
    }, { passive: false });

    window.addEventListener('resize', () => {
        if (!container) return;
        const newAspect = container.clientWidth / container.clientHeight;
        camera.aspect = newAspect;
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
        updateGlobeCamera();
    });

    function animateGlobe() {
        requestAnimationFrame(animateGlobe);
        
        if (!isDragging) {
            globe.rotation.y += 0.0025;
        }
        
        ringGroup.children.forEach(ring => {
            ring.rotation.z += 0.005;
        });

        arcLines.forEach(item => {
            item.progress += 0.005;
            if (item.progress > 1) item.progress = 0;
            const pt = item.curve.getPoint(item.progress);
            item.dot.position.copy(pt);
        });

        renderer.render(scene, camera);
    }
    
    animateGlobe();
}
