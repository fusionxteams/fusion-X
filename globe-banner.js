// globe-banner.js
const spinGlobeContainer = document.getElementById('spinning-globe-container');

if (spinGlobeContainer && typeof THREE !== 'undefined') {
    const scene = new THREE.Scene();
    
    // Transparent background so it blends with the white section
    const aspect = spinGlobeContainer.clientWidth / spinGlobeContainer.clientHeight;
    const camera = new THREE.PerspectiveCamera(45, aspect, 0.1, 1000);
    
    if (aspect < 1) {
        camera.position.z = 45; // Mobile
    } else {
        camera.position.z = 28; // Desktop
    }

    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(spinGlobeContainer.clientWidth, spinGlobeContainer.clientHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    spinGlobeContainer.appendChild(renderer.domElement);

    // Add High-Quality Lights
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.7);
    scene.add(ambientLight);
    
    const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
    directionalLight.position.set(10, 10, 10);
    scene.add(directionalLight);

    // Create the 3D Sphere (Globe)
    const globeRadius = 10;
    const geometry = new THREE.SphereGeometry(globeRadius, 64, 64);
    
    const textureLoader = new THREE.TextureLoader();
    const mapTexture = textureLoader.load('https://unpkg.com/three-globe/example/img/earth-blue-marble.jpg');
    const bumpTexture = textureLoader.load('https://raw.githubusercontent.com/mrdoob/three.js/master/examples/textures/planets/earth_bump_1024.jpg');
    
    const material = new THREE.MeshStandardMaterial({ 
        map: mapTexture,
        bumpMap: bumpTexture,
        bumpScale: 0.15,
        roughness: 0.6,
        metalness: 0.1
    });
    
    const globe = new THREE.Mesh(geometry, material);
    globe.rotation.z = 0.2;
    scene.add(globe);

    // --- ADDING DIGITAL MARKETING VISUALS ---

    // 1. Orbiting Digital Data Rings
    const ringGroup = new THREE.Group();
    globe.add(ringGroup); // Attach to globe so it spins with it
    
    for(let i=0; i<3; i++) {
        const ringGeo = new THREE.TorusGeometry(globeRadius + 1.5 + (i * 0.8), 0.05, 8, 100);
        const ringMat = new THREE.MeshBasicMaterial({ 
            color: 0xff5722, 
            transparent: true, 
            opacity: 0.6 - (i * 0.1) 
        });
        const ring = new THREE.Mesh(ringGeo, ringMat);
        ring.rotation.x = Math.PI / 2 + (Math.random() * 0.5 - 0.25);
        ring.rotation.y = (Math.random() * 0.5 - 0.25);
        
        // Add random data nodes on the ring
        for(let j=0; j<10; j++) {
            const nodeGeo = new THREE.SphereGeometry(0.2, 8, 8);
            const nodeMat = new THREE.MeshBasicMaterial({ color: 0xffffff });
            const node = new THREE.Mesh(nodeGeo, nodeMat);
            const angle = Math.random() * Math.PI * 2;
            node.position.set(Math.cos(angle) * (globeRadius + 1.5 + (i * 0.8)), Math.sin(angle) * (globeRadius + 1.5 + (i * 0.8)), 0);
            ring.add(node);
        }
        ringGroup.add(ring);
    }

    // 2. Fusion X HQ Beacon & Global Arcs
    const arcsGroup = new THREE.Group();
    globe.add(arcsGroup);
    
    // Helper to convert Lat/Lon to 3D Cartesian coords
    function getPosFromLatLon(lat, lon, radius) {
        var phi = (90 - lat) * (Math.PI / 180);
        var theta = (lon + 180) * (Math.PI / 180);
        
        return new THREE.Vector3(
            -(radius * Math.sin(phi) * Math.cos(theta)),
            radius * Math.cos(phi),
            radius * Math.sin(phi) * Math.sin(theta)
        );
    }

    // Fusion X HQ (let's say London or New York)
    const hqPos = getPosFromLatLon(51.5, -0.1, globeRadius);
    
    // Target Cities worldwide
    const targets = [
        getPosFromLatLon(40.7, -74.0, globeRadius),   // NY
        getPosFromLatLon(35.6, 139.6, globeRadius),   // Tokyo
        getPosFromLatLon(-33.8, 151.2, globeRadius),  // Sydney
        getPosFromLatLon(25.2, 55.2, globeRadius),    // Dubai
        getPosFromLatLon(-23.5, -46.6, globeRadius),  // Sao Paulo
        getPosFromLatLon(1.3, 103.8, globeRadius)     // Singapore
    ];

    // Create arcs from HQ to targets
    const arcLines = [];
    targets.forEach(targetPos => {
        // Find midpoint and raise it up to create an arc
        const midPoint = hqPos.clone().lerp(targetPos, 0.5);
        midPoint.normalize().multiplyScalar(globeRadius + 3); // Height of arc
        
        const curve = new THREE.QuadraticBezierCurve3(hqPos, midPoint, targetPos);
        const points = curve.getPoints(50);
        const arcGeo = new THREE.BufferGeometry().setFromPoints(points);
        const arcMat = new THREE.LineBasicMaterial({ color: 0x00d4ff, transparent: true, opacity: 0.8, linewidth: 2 });
        
        const arc = new THREE.Line(arcGeo, arcMat);
        
        // Add a pulsing dot moving along the curve
        const dotGeo = new THREE.SphereGeometry(0.3, 8, 8);
        const dotMat = new THREE.MeshBasicMaterial({ color: 0xff5722 }); // Orange data packet
        const dot = new THREE.Mesh(dotGeo, dotMat);
        
        arcsGroup.add(arc);
        arcsGroup.add(dot);
        
        arcLines.push({ curve, dot, progress: Math.random() });
    });

    // 3. Floating Digital Marketing Text Nodes (Upgraded Tooltips)
    const textSprites = [
        'SEO', 'ADS', 'SOCIAL', 'BRAND', 'DATA', 
        'UI/UX', 'WEB 3', 'AI DRIVEN', 'METRICS', 'ROI', 
        'GROWTH', 'FUNNELS', 'VIRAL', 'CONTENT'
    ];
    
    function createTooltipSprite(text) {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        
        // Measure text first to determine canvas size
        ctx.font = 'bold 36px Arial';
        const textWidth = ctx.measureText(text).width;
        
        // Dynamically size canvas based on text length + heavy padding
        const padding = 50;
        canvas.width = textWidth + (padding * 2); 
        canvas.height = 100;
        
        // Re-apply font because resizing the canvas resets the context
        ctx.font = 'bold 36px Arial';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        
        // Draw Pill Background
        ctx.fillStyle = 'rgba(255, 255, 255, 0.9)';
        ctx.beginPath();
        // Leave 6px margin for the stroke so it doesn't clip on the edges
        ctx.roundRect(6, 10, canvas.width - 12, 80, 40); 
        ctx.fill();
        
        // Draw Orange Border
        ctx.strokeStyle = '#ff5722';
        ctx.lineWidth = 6;
        ctx.stroke();

        // Draw Text perfectly centered
        ctx.fillStyle = '#ff5722';
        ctx.fillText(text, canvas.width / 2, 50);
        
        const tex = new THREE.CanvasTexture(canvas);
        const mat = new THREE.SpriteMaterial({ map: tex, transparent: true, opacity: 1.0 });
        const sprite = new THREE.Sprite(mat);
        
        // Scale the 3D sprite proportionally so long words aren't squished
        const spriteHeight = 1.5;
        const spriteWidth = (canvas.width / canvas.height) * spriteHeight;
        sprite.scale.set(spriteWidth, spriteHeight, 1); 
        
        return sprite;
    }

    textSprites.forEach((text, index) => {
        const sprite = createTooltipSprite(text);
        
        // Distribute them evenly around the globe using Fibonacci sphere or just random
        const randLat = (Math.random() - 0.5) * 140; // -70 to 70 to avoid extreme poles
        const randLon = (Math.random() - 0.5) * 360;
        
        // Orbit distance varies slightly so they don't overlap perfectly
        const orbitDist = globeRadius + 2.0 + (Math.random() * 2);
        const pos = getPosFromLatLon(randLat, randLon, orbitDist);
        
        sprite.position.copy(pos);
        globe.add(sprite);
    });

    // Mouse Dragging Logic
    let isDragging = false;
    let previousMousePosition = { x: 0, y: 0 };
    
    spinGlobeContainer.addEventListener('mousedown', (e) => {
        isDragging = true;
        spinGlobeContainer.style.cursor = 'grabbing';
    });
    
    window.addEventListener('mouseup', () => {
        isDragging = false;
        spinGlobeContainer.style.cursor = 'grab';
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
        previousMousePosition = {
            x: e.offsetX,
            y: e.offsetY
        };
    });

    // Handle Resize
    window.addEventListener('resize', () => {
        const newAspect = spinGlobeContainer.clientWidth / spinGlobeContainer.clientHeight;
        camera.aspect = newAspect;
        camera.updateProjectionMatrix();
        renderer.setSize(spinGlobeContainer.clientWidth, spinGlobeContainer.clientHeight);
        
        if (newAspect < 1) {
            camera.position.z = 45;
        } else {
            camera.position.z = 28;
        }
    });

    // Animation Loop
    function animateGlobe() {
        requestAnimationFrame(animateGlobe);
        
        if (!isDragging) {
            globe.rotation.y += 0.002;
        }
        
        // Spin the data rings slightly faster
        ringGroup.children.forEach(ring => {
            ring.rotation.z += 0.005;
        });

        // Animate data packets along the arcs
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
