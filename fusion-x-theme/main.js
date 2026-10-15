

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
// Safe dimension detection and smooth fade-in completely prevents the page-load globe glitch.
function initGlobe() {
    const container = document.getElementById('globe-container');
    if (!container || typeof THREE === 'undefined' || container.__globeInitialized) return;
    container.__globeInitialized = true;

    container.style.cursor = 'grab';
    const scene = new THREE.Scene();

    // Helper: Safely resolve dimensions to ensure non-zero aspect ratio and prevent NaN projection glitches
    function getContainerDimensions() {
        let w = container.clientWidth;
        let h = container.clientHeight;
        if (!w || w < 80) {
            w = container.parentElement ? container.parentElement.clientWidth : window.innerWidth;
        }
        if (!h || h < 80) {
            h = Math.max(420, Math.min(window.innerHeight * 0.65, 600));
        }
        return { w: Math.max(280, w), h: Math.max(320, h) };
    }

    const initialDims = getContainerDimensions();
    const aspect = initialDims.w / initialDims.h;
    const camera = new THREE.PerspectiveCamera(45, aspect, 0.1, 1000);
    
    let hudSprite = null;

    function updateGlobeCamera() {
        if (!container) return;
        const width = window.innerWidth;
        const dims = getContainerDimensions();
        const curAspect = dims.w / dims.h;
        if (width <= 360) {
            camera.position.z = 60; // Extra narrow mobile (e.g. 320px)
        } else if (width <= 480 || curAspect < 0.75) {
            camera.position.z = 56; // Standard mobile
        } else if (width <= 768 || curAspect < 1.0) {
            camera.position.z = 50; // Medium mobile / tablet portrait
        } else if (width <= 1100) {
            camera.position.z = 42; // Tablet landscape
        } else {
            camera.position.z = 37; // Desktop
        }
        if (hudSprite) {
            if (width <= 360) {
                hudSprite.scale.set(4.2, 2.1, 1);
            } else if (width <= 480 || curAspect < 0.75) {
                hudSprite.scale.set(4.8, 2.4, 1);
            } else if (width <= 768 || curAspect < 1.0) {
                hudSprite.scale.set(5.6, 2.8, 1);
            } else if (width <= 1100) {
                hudSprite.scale.set(6.4, 3.2, 1);
            } else {
                hudSprite.scale.set(7.2, 3.6, 1);
            }
        }
        camera.lookAt(0, 0, 0);
    }
    updateGlobeCamera();

    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true, powerPreference: 'high-performance' });
    renderer.setSize(initialDims.w, initialDims.h);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

    // Smooth entry to completely eliminate layout snap
    renderer.domElement.style.width = '100%';
    renderer.domElement.style.height = '100%';
    renderer.domElement.style.display = 'block';
    renderer.domElement.style.opacity = '0';
    renderer.domElement.style.transition = 'opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1)';
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

    // Create the 3D Sphere (Globe) with instant deep-cyber blue fallback so it never flashes black
    const globeRadius = 10;
    const geometry = new THREE.SphereGeometry(globeRadius, 64, 64);
    
    const material = new THREE.MeshStandardMaterial({ 
        color: 0x091d36,
        roughness: 0.55,
        metalness: 0.15,
        emissive: 0x040e1a
    });
    
    const textureLoader = new THREE.TextureLoader();
    textureLoader.load('https://unpkg.com/three-globe/example/img/earth-blue-marble.jpg', (tex) => {
        material.map = tex;
        material.color.setHex(0xffffff);
        material.emissive.setHex(0x000000);
        material.needsUpdate = true;
    });
    textureLoader.load('https://unpkg.com/three-globe/example/img/earth-topology.png', (bump) => {
        material.bumpMap = bump;
        material.bumpScale = 0.18;
        material.needsUpdate = true;
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

    // --- 4. 3D ORBITING SATELLITE & HOLOGRAPHIC DATA PROJECTION SYSTEM ---
    const satelliteGroup = new THREE.Group();
    scene.add(satelliteGroup);

    // Group for satellite model (oriented along flight velocity)
    const satModel = new THREE.Group();
    satelliteGroup.add(satModel);

    // 1. Satellite Bus & Avionics Chassis
    const busGeo = new THREE.BoxGeometry(1.2, 0.8, 1.8);
    const busMat = new THREE.MeshStandardMaterial({
        color: 0xecf0f5,
        metalness: 0.85,
        roughness: 0.25
    });
    const bus = new THREE.Mesh(busGeo, busMat);
    satModel.add(bus);

    // Gold Multi-Layer Insulation (MLI) Thermal Foil
    const foilGeo = new THREE.BoxGeometry(1.22, 0.82, 0.9);
    const foilMat = new THREE.MeshStandardMaterial({
        color: 0xf59e0b,
        metalness: 0.95,
        roughness: 0.2
    });
    const foil = new THREE.Mesh(foilGeo, foilMat);
    foil.position.z = 0.45;
    satModel.add(foil);

    // Orange Cyber Accent Trim Band
    const trimGeo = new THREE.BoxGeometry(1.24, 0.12, 1.82);
    const trimMat = new THREE.MeshBasicMaterial({ color: 0xff5722 });
    const trim = new THREE.Mesh(trimGeo, trimMat);
    satModel.add(trim);

    // 2. High-Tech Solar Array Wings (Left & Right)
    const solarWingMat = new THREE.MeshStandardMaterial({
        color: 0x091b36,
        metalness: 0.9,
        roughness: 0.15
    });
    const solarFrameMat = new THREE.MeshStandardMaterial({
        color: 0xf59e0b,
        metalness: 0.8,
        roughness: 0.3
    });

    // Left Wing
    const leftWingGroup = new THREE.Group();
    const leftWingMesh = new THREE.Mesh(new THREE.BoxGeometry(2.6, 0.04, 1.1), solarWingMat);
    const leftFrame = new THREE.Mesh(new THREE.BoxGeometry(2.64, 0.06, 1.14), solarFrameMat);
    leftFrame.position.y = -0.01;
    const leftTruss = new THREE.Mesh(new THREE.CylinderGeometry(0.04, 0.04, 0.9, 8), busMat);
    leftTruss.rotation.z = Math.PI / 2;
    leftTruss.position.x = 1.6;
    leftWingGroup.add(leftWingMesh);
    leftWingGroup.add(leftFrame);
    leftWingGroup.add(leftTruss);
    leftWingGroup.position.set(-2.2, 0, 0);
    satModel.add(leftWingGroup);

    // Right Wing
    const rightWingGroup = new THREE.Group();
    const rightWingMesh = new THREE.Mesh(new THREE.BoxGeometry(2.6, 0.04, 1.1), solarWingMat);
    const rightFrame = new THREE.Mesh(new THREE.BoxGeometry(2.64, 0.06, 1.14), solarFrameMat);
    rightFrame.position.y = -0.01;
    const rightTruss = new THREE.Mesh(new THREE.CylinderGeometry(0.04, 0.04, 0.9, 8), busMat);
    rightTruss.rotation.z = Math.PI / 2;
    rightTruss.position.x = -1.6;
    rightWingGroup.add(rightWingMesh);
    rightWingGroup.add(rightFrame);
    rightWingGroup.add(rightTruss);
    rightWingGroup.position.set(2.2, 0, 0);
    satModel.add(rightWingGroup);

    // 3. Parabolic Comms Dish & Projection Emitter
    const dishGroup = new THREE.Group();
    satModel.add(dishGroup);

    const dishBoom = new THREE.Mesh(
        new THREE.CylinderGeometry(0.05, 0.05, 0.6, 8),
        busMat
    );
    dishBoom.position.set(0, -0.6, 0.2);
    dishGroup.add(dishBoom);

    const dishGeo = new THREE.CylinderGeometry(0.75, 0.15, 0.3, 24, 1, true);
    const dishMat = new THREE.MeshStandardMaterial({
        color: 0xf8fafc,
        metalness: 0.9,
        roughness: 0.2,
        side: THREE.DoubleSide
    });
    const dish = new THREE.Mesh(dishGeo, dishMat);
    dish.position.set(0, -0.85, 0.2);
    dish.rotation.x = Math.PI;
    dishGroup.add(dish);

    const lensGeo = new THREE.SphereGeometry(0.2, 16, 16);
    const lensMat = new THREE.MeshBasicMaterial({ color: 0x00f0ff });
    const lens = new THREE.Mesh(lensGeo, lensMat);
    lens.position.set(0, -0.92, 0.2);
    dishGroup.add(lens);

    // 4. RCS Ion Thruster Nozzles & Glowing Plumes
    const thrusterGeo = new THREE.CylinderGeometry(0.08, 0.16, 0.35, 12);
    const thrusterMat = new THREE.MeshStandardMaterial({ color: 0x334155, metalness: 0.9, roughness: 0.4 });
    const thrusterLeft = new THREE.Mesh(thrusterGeo, thrusterMat);
    thrusterLeft.rotation.x = Math.PI / 2;
    thrusterLeft.position.set(-0.35, -0.1, -1.0);
    satModel.add(thrusterLeft);

    const thrusterRight = new THREE.Mesh(thrusterGeo, thrusterMat);
    thrusterRight.rotation.x = Math.PI / 2;
    thrusterRight.position.set(0.35, -0.1, -1.0);
    satModel.add(thrusterRight);

    const plumeGeo = new THREE.ConeGeometry(0.12, 0.45, 12);
    const plumeMat = new THREE.MeshBasicMaterial({
        color: 0x00f0ff,
        transparent: true,
        opacity: 0.65,
        blending: THREE.AdditiveBlending
    });
    const plumeL = new THREE.Mesh(plumeGeo, plumeMat);
    plumeL.rotation.x = -Math.PI / 2;
    plumeL.position.set(-0.35, -0.1, -1.35);
    satModel.add(plumeL);

    const plumeR = new THREE.Mesh(plumeGeo, plumeMat);
    plumeR.rotation.x = -Math.PI / 2;
    plumeR.position.set(0.35, -0.1, -1.35);
    satModel.add(plumeR);

    // 5. Navigation Mast & Pulsing LED Beacon
    const mastGeo = new THREE.CylinderGeometry(0.025, 0.025, 0.7, 8);
    const mast = new THREE.Mesh(mastGeo, busMat);
    mast.position.set(0, 0.75, 0);
    satModel.add(mast);

    const satBeaconGeo = new THREE.SphereGeometry(0.12, 12, 12);
    const satBeaconMat = new THREE.MeshBasicMaterial({ color: 0xff5722 });
    const satBeaconLight = new THREE.Mesh(satBeaconGeo, satBeaconMat);
    satBeaconLight.position.set(0, 1.12, 0);
    satModel.add(satBeaconLight);

    // 6. Holographic Projection Beam (Cone aimed at Globe)
    const beamGroup = new THREE.Group();
    satelliteGroup.add(beamGroup);

    const baseBeamHeight = 6.0;
    const beamGeo = new THREE.CylinderGeometry(0.2, 2.6, baseBeamHeight, 24, 1, true);
    beamGeo.translate(0, -baseBeamHeight / 2, 0);

    const beamMat = new THREE.MeshBasicMaterial({
        color: 0x00e5ff,
        transparent: true,
        opacity: 0.22,
        side: THREE.DoubleSide,
        depthTest: true,
        depthWrite: false,
        blending: THREE.AdditiveBlending
    });
    const projCone = new THREE.Mesh(beamGeo, beamMat);
    beamGroup.add(projCone);

    // Scanning Reticle on the Earth atmosphere / surface
    const reticleInnerGeo = new THREE.RingGeometry(0.7, 0.95, 32);
    const reticleOuterGeo = new THREE.RingGeometry(1.6, 1.85, 32);
    const reticleMat = new THREE.MeshBasicMaterial({
        color: 0x00e5ff,
        transparent: true,
        opacity: 0.75,
        side: THREE.DoubleSide,
        depthTest: true,
        depthWrite: false,
        blending: THREE.AdditiveBlending
    });
    const reticleOrangeMat = new THREE.MeshBasicMaterial({
        color: 0xff5722,
        transparent: true,
        opacity: 0.85,
        side: THREE.DoubleSide,
        depthTest: true,
        depthWrite: false,
        blending: THREE.AdditiveBlending
    });
    const reticleInner = new THREE.Mesh(reticleInnerGeo, reticleOrangeMat);
    const reticleOuter = new THREE.Mesh(reticleOuterGeo, reticleMat);
    reticleInner.position.y = -baseBeamHeight;
    reticleOuter.position.y = -baseBeamHeight;
    reticleInner.rotation.x = Math.PI / 2;
    reticleOuter.rotation.x = Math.PI / 2;
    beamGroup.add(reticleInner);
    beamGroup.add(reticleOuter);

    // 7. Holographic Data Telemetry HUD (Dynamic Canvas Sprite)
    const hudCanvas = document.createElement('canvas');
    hudCanvas.width = 680;
    hudCanvas.height = 340;
    const hudCtx = hudCanvas.getContext('2d');
    const hudTexture = new THREE.CanvasTexture(hudCanvas);
    hudTexture.minFilter = THREE.LinearFilter;

    const hudSpriteMat = new THREE.SpriteMaterial({
        map: hudTexture,
        transparent: true,
        opacity: 0.98,
        depthTest: true,
        depthWrite: false
    });
    hudSprite = new THREE.Sprite(hudSpriteMat);
    hudSprite.scale.set(7.4, 3.7, 1);
    hudSprite.position.set(0, 3.8, 0);
    hudSprite.renderOrder = 2;
    satelliteGroup.add(hudSprite);

    // Re-sync camera & sprite scale for current screen
    updateGlobeCamera();

    // Projection guide lines linking satellite to HUD display
    const hudBeamMat = new THREE.LineBasicMaterial({
        color: 0x00e5ff,
        transparent: true,
        opacity: 0.5,
        depthTest: true,
        depthWrite: false,
        blending: THREE.AdditiveBlending
    });
    const hudBeamPoints = [
        new THREE.Vector3(0, 0, 0), new THREE.Vector3(-2.8, 2.0, 0),
        new THREE.Vector3(0, 0, 0), new THREE.Vector3(2.8, 2.0, 0),
        new THREE.Vector3(0, 0, 0), new THREE.Vector3(0, 2.0, 0)
    ];
    const hudBeamGeo = new THREE.BufferGeometry().setFromPoints(hudBeamPoints);
    const hudBeams = new THREE.LineSegments(hudBeamGeo, hudBeamMat);
    satelliteGroup.add(hudBeams);

    // Multi-Round Telemetry Dataset (Each round displays a completely different vertical, changing every 1 sec)
    const telemetryRounds = [
        // ROUND 1: AI SEARCH, AEO & ORGANIC DISCOVERY
        {
            roundName: 'ROUND 01 // AI SEARCH & AEO',
            cards: [
                {
                    badge: 'AI ENGINE // RANK #1',
                    badgeColor: '#10b981',
                    metric: '+342.8%',
                    metricColor: '#ff5722',
                    title: 'AI SEARCH INDEX & CRAWL',
                    subtitle: 'AEO & GEO Authority • Top Citations',
                    statA: 'ORGANIC CALLS: 920+',
                    statB: 'SPEED: 99/100',
                    barRatio: 0.95
                },
                {
                    badge: 'SERP DOMINANCE // #1',
                    badgeColor: '#00e5ff',
                    metric: '480+ KWS',
                    metricColor: '#00e5ff',
                    title: 'TOP 3 KEYWORD RANKINGS',
                    subtitle: 'Zero-Click Search Lift • Pan-India Rank',
                    statA: 'ORGANIC IMPR: 1.8M+',
                    statB: 'CRAWL RATE: 99.8%',
                    barRatio: 0.90
                },
                {
                    badge: 'EEAT VERIFIED // 2026',
                    badgeColor: '#f59e0b',
                    metric: '99/100',
                    metricColor: '#f59e0b',
                    title: 'TECHNICAL SEO ARCHITECTURE',
                    subtitle: 'Sub-Second Next.js & Edge CDN Speed',
                    statA: 'LCP TIME: 0.6s',
                    statB: 'ZERO CLS SHIFT',
                    barRatio: 0.99
                },
                {
                    badge: 'HIGH-INTENT PIPELINE',
                    badgeColor: '#ff5722',
                    metric: '900+ CALLS',
                    metricColor: '#ff5722',
                    title: 'ORGANIC INBOUND LEADS',
                    subtitle: 'Zero Wasted Spend • 90-Day Proven Surge',
                    statA: 'CONV RATE: +215%',
                    statB: 'CHENNAI HQ NODE',
                    barRatio: 0.88
                }
            ]
        },
        // ROUND 2: PERFORMANCE ADS, ROAS & PAID MEDIA SCALE
        {
            roundName: 'ROUND 02 // PAID ADS & ROAS',
            cards: [
                {
                    badge: 'META & GOOGLE ADS',
                    badgeColor: '#10b981',
                    metric: '4.85x ROAS',
                    metricColor: '#10b981',
                    title: 'BLENDED RETURN ON AD SPEND',
                    subtitle: 'Meta, Google & PMax High-Yield Funnels',
                    statA: 'SCALED SPEND: ₹1.4 CR+',
                    statB: 'CPA REDUCTION: -42%',
                    barRatio: 0.92
                },
                {
                    badge: 'GOOGLE PMAX CAMPAIGNS',
                    badgeColor: '#00e5ff',
                    metric: '14.8% CTR',
                    metricColor: '#00e5ff',
                    title: 'HIGH-CONVERSION SEARCH ADS',
                    subtitle: 'Intent-Targeted Bidding • Top Position',
                    statA: 'CONVERSION: 8.9%',
                    statB: 'QUALITY SCORE: 10/10',
                    barRatio: 0.87
                },
                {
                    badge: 'INSTAGRAM & FB REELS',
                    badgeColor: '#ff5722',
                    metric: '5.2x ROAS',
                    metricColor: '#ff5722',
                    title: 'AD CREATIVE STRATEGY',
                    subtitle: 'Viral Creative Angles & Dynamic Retargeting',
                    statA: 'ROAS PEAK: 6.4x',
                    statB: 'VIDEO HOOK: 78%',
                    barRatio: 0.94
                },
                {
                    badge: 'PAID REVENUE SCALE',
                    badgeColor: '#f59e0b',
                    metric: '₹2.8 CR+',
                    metricColor: '#f59e0b',
                    title: 'GENERATED CLIENT REVENUE',
                    subtitle: 'Direct Attributed Paid Media Sales',
                    statA: 'YIELD GROWTH: +310%',
                    statB: 'PROFIT MOAT: ACTIVE',
                    barRatio: 0.96
                }
            ]
        },
        // ROUND 3: E-COMMERCE & CONVERSION RATE OPTIMIZATION
        {
            roundName: 'ROUND 03 // ECOM & CONVERSIONS',
            cards: [
                {
                    badge: 'E-COMMERCE GROWTH',
                    badgeColor: '#10b981',
                    metric: '+410%',
                    metricColor: '#10b981',
                    title: 'ONLINE STORE REVENUE LIFT',
                    subtitle: 'High-Converting Shopify & Headless Builds',
                    statA: 'AOV INCREASE: +38%',
                    statB: 'CART RECOVERY: 44%',
                    barRatio: 0.91
                },
                {
                    badge: 'CRO OPTIMIZATION',
                    badgeColor: '#00e5ff',
                    metric: '+18.4%',
                    metricColor: '#00e5ff',
                    title: 'LANDING PAGE CONVERSION',
                    subtitle: 'UX Psychology • Zero-Friction Checkouts',
                    statA: 'BOUNCE DROP: -54%',
                    statB: 'SESSION DURATION: 4m+',
                    barRatio: 0.89
                },
                {
                    badge: 'WHATSAPP & EMAIL FLOWS',
                    badgeColor: '#10b981',
                    metric: '68% OPEN',
                    metricColor: '#ff5722',
                    title: 'AUTOMATION & DRIP FUNNELS',
                    subtitle: 'Official WhatsApp API Broadcasts & Bots',
                    statA: 'REORDER RATE: +46%',
                    statB: 'ROI: 8.5x BLENDED',
                    barRatio: 0.93
                },
                {
                    badge: 'MARKET SHARE AUDIT',
                    badgeColor: '#f59e0b',
                    metric: '#1 BRAND',
                    metricColor: '#00e5ff',
                    title: 'COMPETITOR MARKET MOAT',
                    subtitle: 'High-Authority Brand Strategy & Identity',
                    statA: 'SEARCH VOLUME: +265%',
                    statB: 'RETENTION: 92%',
                    barRatio: 0.97
                }
            ]
        },
        // ROUND 4: LOCAL DOMINANCE & MULTI-CHANNEL SCALE
        {
            roundName: 'ROUND 04 // LOCAL & MULTI-CHANNEL',
            cards: [
                {
                    badge: 'LOCAL SEO MAP PACK',
                    badgeColor: '#00e5ff',
                    metric: '#1 MAPS',
                    metricColor: '#00e5ff',
                    title: 'GOOGLE BUSINESS PROFILE RANK',
                    subtitle: 'Chennai HQ & Pan-India High Local Intent',
                    statA: 'CALL-TO-CLICK: 88%',
                    statB: 'LOCAL REVIEWS: 4.9★',
                    barRatio: 0.98
                },
                {
                    badge: 'YOUTUBE & VIDEO SEO',
                    badgeColor: '#ff5722',
                    metric: '72% RETENTION',
                    metricColor: '#ff5722',
                    title: 'VIRAL VIDEO ADS & SHORTS',
                    subtitle: 'High-Retention Video Editing & Motion Graphics',
                    statA: 'VIDEO VIEWS: 4.5M+',
                    statB: 'VIRAL REACH: 12M+',
                    barRatio: 0.86
                },
                {
                    badge: 'TOTAL PIPELINE VALUE',
                    badgeColor: '#10b981',
                    metric: '₹5.6 CR+',
                    metricColor: '#10b981',
                    title: 'ECOSYSTEM INBOUND VALUE',
                    subtitle: 'Full-Funnel Omnichannel Digital Marketing',
                    statA: 'CLIENT RETENTION: 96%',
                    statB: 'GROWTH YIELD: MAX',
                    barRatio: 0.99
                },
                {
                    badge: 'AI AGENTIC INTEGRATION',
                    badgeColor: '#f59e0b',
                    metric: '24/7 LIVE',
                    metricColor: '#f59e0b',
                    title: 'AUTOMATED LEAD CONVERSION',
                    subtitle: 'Instant CRM Dispatch • AI Call Assistant',
                    statA: 'RESPONSE TIME: <10s',
                    statB: 'QUALIFIED RATE: 84%',
                    barRatio: 0.92
                }
            ]
        }
    ];

    let currentCardIndex = 0;
    let cardSwitchTimer = 0;

    function drawTelemetryHUD(time, roundInfo, card) {
        if (!card || !roundInfo) return;
        const w = hudCanvas.width;
        const h = hudCanvas.height;

        hudCtx.clearRect(0, 0, w, h);

        // 1. Semi-transparent dark holographic backdrop
        hudCtx.fillStyle = 'rgba(6, 12, 24, 0.88)';
        hudCtx.beginPath();
        hudCtx.roundRect(14, 14, w - 28, h - 28, 20);
        hudCtx.fill();

        // 2. Glowing Neon Border
        hudCtx.strokeStyle = 'rgba(0, 229, 255, 0.7)';
        hudCtx.lineWidth = 3;
        hudCtx.stroke();

        hudCtx.strokeStyle = 'rgba(255, 87, 34, 0.35)';
        hudCtx.lineWidth = 1;
        hudCtx.strokeRect(22, 22, w - 44, h - 44);

        // 3. Cyber Corner Brackets
        hudCtx.strokeStyle = '#00e5ff';
        hudCtx.lineWidth = 4;
        const bLen = 22;
        // Top-left
        hudCtx.beginPath();
        hudCtx.moveTo(14, 14 + bLen); hudCtx.lineTo(14, 14); hudCtx.lineTo(14 + bLen, 14);
        hudCtx.stroke();
        // Top-right
        hudCtx.beginPath();
        hudCtx.moveTo(w - 14 - bLen, 14); hudCtx.lineTo(w - 14, 14); hudCtx.lineTo(w - 14, 14 + bLen);
        hudCtx.stroke();
        // Bottom-left
        hudCtx.beginPath();
        hudCtx.moveTo(14, h - 14 - bLen); hudCtx.lineTo(14, h - 14); hudCtx.lineTo(14 + bLen, h - 14);
        hudCtx.stroke();
        // Bottom-right
        hudCtx.beginPath();
        hudCtx.moveTo(w - 14 - bLen, h - 14); hudCtx.lineTo(w - 14, h - 14); hudCtx.lineTo(w - 14, h - 14 - bLen);
        hudCtx.stroke();

        // 4. Subtle scanlines for sci-fi holographic feel
        hudCtx.fillStyle = 'rgba(0, 229, 255, 0.04)';
        for (let y = 16; y < h - 16; y += 6) {
            hudCtx.fillRect(16, y, w - 32, 2);
        }

        // 5. Header Bar
        const pulsePhase = Math.sin(time * 6) * 0.5 + 0.5;
        hudCtx.fillStyle = card.badgeColor;
        hudCtx.beginPath();
        hudCtx.arc(42, 44, 6 + pulsePhase * 2, 0, Math.PI * 2);
        hudCtx.fill();

        hudCtx.font = 'bold 15px "Space Grotesk", monospace';
        hudCtx.fillStyle = '#94a3b8';
        hudCtx.textAlign = 'left';
        hudCtx.fillText(roundInfo.roundName, 60, 49);

        hudCtx.font = 'bold 13px "Space Grotesk", monospace';
        hudCtx.fillStyle = card.badgeColor;
        hudCtx.textAlign = 'right';
        hudCtx.fillText(card.badge, w - 40, 49);

        // Separator line
        hudCtx.strokeStyle = 'rgba(255, 255, 255, 0.15)';
        hudCtx.lineWidth = 1;
        hudCtx.beginPath();
        hudCtx.moveTo(35, 68);
        hudCtx.lineTo(w - 35, 68);
        hudCtx.stroke();

        // 6. Big Metric Display (Centerpiece)
        hudCtx.font = '900 64px "Outfit", sans-serif';
        hudCtx.fillStyle = card.metricColor;
        hudCtx.textAlign = 'left';
        hudCtx.shadowColor = card.metricColor;
        hudCtx.shadowBlur = 18;
        hudCtx.fillText(card.metric, 42, 145);
        hudCtx.shadowBlur = 0;

        // Mini Live Progress Bar next to metric
        const barX = 42;
        const barY = 162;
        const barW = 340;
        hudCtx.fillStyle = 'rgba(255, 255, 255, 0.1)';
        hudCtx.beginPath();
        hudCtx.roundRect(barX, barY, barW, 6, 3);
        hudCtx.fill();
        hudCtx.fillStyle = card.metricColor;
        hudCtx.beginPath();
        hudCtx.roundRect(barX, barY, barW * card.barRatio, 6, 3);
        hudCtx.fill();

        // Equalizer visualizer bars
        const eqX = w - 170;
        const eqY = 145;
        for (let i = 0; i < 6; i++) {
            const barH = 12 + Math.abs(Math.sin(time * 8 + i * 1.2)) * 32;
            hudCtx.fillStyle = i % 2 === 0 ? '#ff5722' : '#00e5ff';
            hudCtx.fillRect(eqX + i * 20, eqY - barH, 12, barH);
        }

        // 7. Metric Title & Subtitle
        hudCtx.font = 'bold 24px "Outfit", sans-serif';
        hudCtx.fillStyle = '#ffffff';
        hudCtx.textAlign = 'left';
        hudCtx.fillText(card.title, 42, 212);

        hudCtx.font = '500 16px "Space Grotesk", sans-serif';
        hudCtx.fillStyle = '#94a3b8';
        hudCtx.fillText(card.subtitle, 42, 240);

        // 8. Bottom Telemetry Specs Strip
        hudCtx.fillStyle = 'rgba(15, 23, 42, 0.7)';
        hudCtx.beginPath();
        hudCtx.roundRect(35, 262, w - 70, 48, 12);
        hudCtx.fill();
        hudCtx.strokeStyle = 'rgba(255, 255, 255, 0.1)';
        hudCtx.lineWidth = 1;
        hudCtx.stroke();

        hudCtx.font = 'bold 14px "Space Grotesk", monospace';
        hudCtx.fillStyle = '#38bdf8';
        hudCtx.textAlign = 'left';
        hudCtx.fillText('▶ ' + card.statA, 55, 292);

        hudCtx.fillStyle = '#34d399';
        hudCtx.textAlign = 'right';
        hudCtx.fillText('▶ ' + card.statB, w - 55, 292);
    }

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

    function handleGlobeResize() {
        if (!container || !renderer) return;
        const dims = getContainerDimensions();
        camera.aspect = dims.w / dims.h;
        camera.updateProjectionMatrix();
        renderer.setSize(dims.w, dims.h);
        updateGlobeCamera();
    }
    window.addEventListener('resize', handleGlobeResize);
    if (window.ResizeObserver && container) {
        try {
            new ResizeObserver(handleGlobeResize).observe(container);
        } catch (e) {}
    }

    // Orbit State
    let satAngle = 0;
    window.setSatelliteAngle = function(angle) { satAngle = angle; };
    let lastTimestamp = 0;

    function animateGlobe(timestamp) {
        requestAnimationFrame(animateGlobe);

        const curTime = typeof timestamp === 'number' ? timestamp : performance.now();
        const deltaSec = lastTimestamp ? Math.min((curTime - lastTimestamp) / 1000, 0.1) : 0.016;
        lastTimestamp = curTime;
        const t = curTime * 0.001;
        
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

        // Orbiting Satellite Mechanics - MID EQUATORIAL SPIN
        satAngle += 0.007;
        const isNarrow = window.innerWidth <= 480;
        const satOrbitRadius = isNarrow ? 12.8 : 13.6;

        const satX = satOrbitRadius * Math.cos(satAngle);
        // Spin tightly in the MID (equator) with subtle harmonic wave between -0.9 and +0.9
        const satY = Math.sin(satAngle) * 0.9;
        const satZ = satOrbitRadius * Math.sin(satAngle);

        satelliteGroup.position.set(satX, satY, satZ);

        // Satellite Flight Tangent Orientation along MID orbit
        const nextSatX = satOrbitRadius * Math.cos(satAngle + 0.05);
        const nextSatY = Math.sin(satAngle + 0.05) * 0.9;
        const nextSatZ = satOrbitRadius * Math.sin(satAngle + 0.05);
        satModel.lookAt(nextSatX, nextSatY, nextSatZ);

        // Inward HUD position so it stays comfortably in the mid-upper view without clipping top
        const hudInwardShift = -satX * (isNarrow ? 0.22 : 0.16);
        hudSprite.position.set(hudInwardShift, 2.4, 0);

        // Dynamic Far-Side Occlusion & Depth Culling:
        // When satellite orbits behind the globe (satZ < 0), calculate if it is occulted by the Earth disk.
        // Smoothly fade out and hide HUD & projection beams so it NEVER displays over the front of the globe!
        let satOcclusion = 1.0;
        if (satZ < 0) {
            const satDist2D = Math.sqrt(satX * satX + satY * satY);
            const occultOuter = globeRadius + 1.2; // 11.2 - horizon limb boundary
            const occultInner = globeRadius - 0.6; // 9.4 - fully behind globe
            if (satDist2D <= occultInner) {
                satOcclusion = 0.0;
            } else if (satDist2D < occultOuter) {
                satOcclusion = (satDist2D - occultInner) / (occultOuter - occultInner);
            }
        }

        // Apply occlusion opacity & visibility to HUD card, projection beam, and reticle
        hudSpriteMat.opacity = 0.98 * satOcclusion;
        hudSprite.visible = (satOcclusion > 0.01);

        beamMat.opacity = 0.22 * satOcclusion;
        hudBeamMat.opacity = 0.5 * satOcclusion;
        reticleMat.opacity = 0.75 * satOcclusion;
        reticleOrangeMat.opacity = 0.85 * satOcclusion;
        beamGroup.visible = (satOcclusion > 0.01);
        hudBeams.visible = (satOcclusion > 0.01);

        // Update holographic projector beams to touch bottom of HUD card
        const hudHalfW = hudSprite.scale.x * 0.40;
        const hudBottomY = 2.4 - (hudSprite.scale.y * 0.46);
        const posAttr = hudBeamGeo.attributes.position;
        posAttr.setXYZ(1, hudInwardShift - hudHalfW, hudBottomY, 0);
        posAttr.setXYZ(3, hudInwardShift + hudHalfW, hudBottomY, 0);
        posAttr.setXYZ(5, hudInwardShift, hudBottomY, 0);
        posAttr.needsUpdate = true;

        // Holographic Projection Beam Direction (Aiming at Earth center (0,0,0))
        const toEarth = new THREE.Vector3(0, 0, 0).sub(satelliteGroup.position).normalize();
        beamGroup.quaternion.setFromUnitVectors(new THREE.Vector3(0, -1, 0), toEarth);

        // Adjust beam length dynamically so reticles rest on Earth surface
        const curDist = satelliteGroup.position.length();
        const beamLen = Math.max(2.8, curDist - globeRadius);
        projCone.scale.set(1, beamLen / baseBeamHeight, 1);
        reticleInner.position.y = -beamLen;
        reticleOuter.position.y = -beamLen;

        // Ground reticle rotation & pulse
        reticleInner.rotation.z += 0.02;
        reticleOuter.rotation.z -= 0.012;
        const rScale = 1.0 + Math.sin(t * 4) * 0.08;
        reticleInner.scale.set(rScale, rScale, 1);

        // Beacon blinking
        satBeaconMat.color.setHex((Math.sin(t * 8) > 0) ? 0xff5722 : 0x00e5ff);

        // Track Orbit Round & Change Data 1 Sec Once
        const currentRoundIndex = Math.floor(satAngle / (Math.PI * 2)) % telemetryRounds.length;
        const currentRound = telemetryRounds[currentRoundIndex];

        cardSwitchTimer += deltaSec;
        if (cardSwitchTimer >= 1.0) {
            cardSwitchTimer = 0;
            currentCardIndex = (currentCardIndex + 1) % currentRound.cards.length;
        }

        const activeCard = currentRound.cards[currentCardIndex];

        // Draw and update holographic telemetry HUD
        drawTelemetryHUD(t, currentRound, activeCard);
        hudTexture.needsUpdate = true;

        window.__satelliteState = {
            satX, satY, satZ,
            satAngle,
            satOcclusion,
            hudVisible: hudSprite.visible,
            hudOpacity: hudSpriteMat.opacity,
            beamVisible: beamGroup.visible,
            depthTest: hudSpriteMat.depthTest
        };

        renderer.render(scene, camera);
    }
    
    animateGlobe();
    requestAnimationFrame(() => {
        if (renderer && renderer.domElement) {
            renderer.domElement.style.opacity = '1';
        }
    });
}

// Safely boot globe whether script runs before or after DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initGlobe);
} else {
    initGlobe();
}
window.addEventListener('load', initGlobe);

