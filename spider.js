// --- SPIDER WEB 3D SCENE ---
const spiderContainer = document.getElementById('spider-container');
if (spiderContainer && typeof THREE !== 'undefined') {
    const sceneWeb = new THREE.Scene();
    sceneWeb.background = new THREE.Color(0xffffff); // White Background
    sceneWeb.fog = new THREE.FogExp2(0xffffff, 0.015);

    const cameraWeb = new THREE.PerspectiveCamera(45, spiderContainer.clientWidth / spiderContainer.clientHeight, 0.1, 1000);
    cameraWeb.position.set(0, -15, 25);
    cameraWeb.lookAt(0, 0, 0);

    const rendererWeb = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    rendererWeb.setSize(spiderContainer.clientWidth, spiderContainer.clientHeight);
    rendererWeb.setPixelRatio(window.devicePixelRatio);
    spiderContainer.appendChild(rendererWeb.domElement);

    const orbitWeb = new THREE.OrbitControls(cameraWeb, rendererWeb.domElement);
    orbitWeb.enableDamping = true;
    orbitWeb.dampingFactor = 0.05;
    orbitWeb.enableZoom = false;
    orbitWeb.maxPolarAngle = Math.PI / 1.5;

    // 1. Procedural 3D Spider Web (Classic Orb-Weaver Pattern)
    const webMat = new THREE.LineBasicMaterial({ color: 0xff5722, transparent: true, opacity: 0.8 });
    const webPoints = [];
    const radials = 10; // Exactly 10 radials like the reference image
    const rings = 14;   // Lots of concentric rings
    const maxRadius = 30;

    // Radials (Straight lines from center to outer edge)
    for (let i = 0; i < radials; i++) {
        const angle = (i / radials) * Math.PI * 2;
        webPoints.push(new THREE.Vector3(0, 0, 0));
        webPoints.push(new THREE.Vector3(Math.cos(angle) * maxRadius, Math.sin(angle) * maxRadius, 0));
    }
    
    // Concentric Rings (Straight lines connecting adjacent radials to form polygons)
    for (let r = 1; r <= rings; r++) {
        // Exponential spacing makes rings closer together near the center
        const radius = Math.pow(r / rings, 1.2) * maxRadius; 
        
        for (let i = 0; i < radials; i++) {
            const angle1 = (i / radials) * Math.PI * 2;
            const angle2 = ((i + 1) % radials) * Math.PI * 2;
            
            // A slight Z-curve to give it 3D depth, pulling the center backwards slightly like a real web
            const zDepth = (1 - (radius / maxRadius)) * -3; 

            const p1 = new THREE.Vector3(Math.cos(angle1) * radius, Math.sin(angle1) * radius, zDepth);
            const p2 = new THREE.Vector3(Math.cos(angle2) * radius, Math.sin(angle2) * radius, zDepth);
            
            webPoints.push(p1);
            webPoints.push(p2);
        }
    }
    const webGeo = new THREE.BufferGeometry().setFromPoints(webPoints);
    const web = new THREE.LineSegments(webGeo, webMat);
    sceneWeb.add(web);

    // 2. Fusion X Logo Stuck in Center (Dynamically drawn to avoid CORS errors)
    const centerCanvas = document.createElement('canvas');
    centerCanvas.width = 512;
    centerCanvas.height = 512;
    const centerCtx = centerCanvas.getContext('2d');
    
    // Draw solid white circle with orange border
    centerCtx.fillStyle = '#ffffff';
    centerCtx.beginPath();
    centerCtx.arc(256, 256, 240, 0, Math.PI * 2);
    centerCtx.fill();
    centerCtx.strokeStyle = '#ff5722';
    centerCtx.lineWidth = 20;
    centerCtx.stroke();
    
    // Draw "FUSION X"
    centerCtx.fillStyle = '#ff5722';
    centerCtx.font = 'bold 70px Arial';
    centerCtx.textAlign = 'center';
    centerCtx.textBaseline = 'middle';
    centerCtx.fillText('FUSION X', 256, 256);

    const logoTex = new THREE.CanvasTexture(centerCanvas);
    const logoGeo = new THREE.PlaneGeometry(8, 8);
    const logoMat = new THREE.MeshBasicMaterial({ map: logoTex, transparent: true, side: THREE.DoubleSide });
    const centerLogo = new THREE.Mesh(logoGeo, logoMat);
    centerLogo.position.z = 0.5;
    sceneWeb.add(centerLogo);

    // 3. Digital Marketing Icons (Solid Orange with White Text)
    const iconData = [
        { emoji: 'SEO', title: 'Search', pos: new THREE.Vector3(-10, 8, 1) },
        { emoji: 'DEV', title: 'Web Sites', pos: new THREE.Vector3(12, 6, -1) },
        { emoji: 'AI', title: 'Future', pos: new THREE.Vector3(-12, -6, 2) },
        { emoji: 'ADS', title: 'Social', pos: new THREE.Vector3(10, -9, 0) },
        { emoji: 'ROI', title: 'Analytics', pos: new THREE.Vector3(0, -12, 1) },
        { emoji: 'BRAND', title: 'Identity', pos: new THREE.Vector3(0, 12, -2) }
    ];
    
    const iconMeshes = [];
    iconData.forEach(data => {
        const canvas = document.createElement('canvas');
        canvas.width = 256; canvas.height = 256;
        const ctx = canvas.getContext('2d');
        
        // Solid Orange Circle
        ctx.fillStyle = '#ff5722';
        ctx.beginPath();
        ctx.arc(128, 128, 120, 0, Math.PI * 2);
        ctx.fill();
        ctx.strokeStyle = '#ffffff';
        ctx.lineWidth = 10;
        ctx.stroke();

        // White Text (using letters instead of emojis so it ALWAYS renders correctly)
        ctx.fillStyle = '#ffffff';
        ctx.font = 'bold 50px Arial';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(data.emoji, 128, 100);

        ctx.font = 'bold 24px Arial';
        ctx.fillText(data.title, 128, 170);

        const tex = new THREE.CanvasTexture(canvas);
        const geo = new THREE.PlaneGeometry(5, 5);
        const mat = new THREE.MeshBasicMaterial({ map: tex, transparent: true });
        const mesh = new THREE.Mesh(geo, mat);
        mesh.position.copy(data.pos);
        mesh.userData = { isIcon: true, targetPos: data.pos.clone() };
        sceneWeb.add(mesh);
        iconMeshes.push(mesh);
    });

    // 4. Detailed 3D Spiders
    function createSpider() {
        const spider = new THREE.Group();
        const mat = new THREE.MeshStandardMaterial({ color: 0x222222, metalness: 0.9, roughness: 0.1 });
        const glow = new THREE.MeshBasicMaterial({ color: 0xff5722 });
        
        // Body (Abdomen + Head)
        const abdomen = new THREE.Mesh(new THREE.SphereGeometry(0.5, 16, 16), mat);
        const head = new THREE.Mesh(new THREE.SphereGeometry(0.3, 16, 16), mat);
        head.position.set(0, 0.45, 0); // Head points forward along +Y
        spider.add(abdomen, head);
        
        // Eyes
        const eye1 = new THREE.Mesh(new THREE.SphereGeometry(0.06), glow);
        eye1.position.set(-0.12, 0.6, 0.15);
        const eye2 = new THREE.Mesh(new THREE.SphereGeometry(0.06), glow);
        eye2.position.set(0.12, 0.6, 0.15);
        spider.add(eye1, eye2);
        
        // 8 Legs
        const legs = [];
        for (let i = 0; i < 8; i++) {
            const side = i < 4 ? -1 : 1;
            const index = i % 4;
            
            const leg = new THREE.Group();
            
            // Upper leg joint
            const upper = new THREE.Mesh(new THREE.CylinderGeometry(0.04, 0.04, 0.8), mat);
            upper.position.set(side * 0.4, 0.4, (index - 1.5) * 0.25);
            upper.rotation.z = side * Math.PI / 4;
            upper.rotation.x = (index - 1.5) * 0.2;
            
            // Lower leg joint
            const lower = new THREE.Mesh(new THREE.CylinderGeometry(0.03, 0.01, 1.0), mat);
            lower.position.set(side * 0.8, 0.4, (index - 1.5) * 0.35);
            lower.rotation.z = side * -Math.PI / 6;
            
            leg.add(upper, lower);
            spider.add(leg);
            legs.push(leg);
        }
        
        spider.userData = { 
            legs: legs, 
            wanderTarget: new THREE.Vector3((Math.random()-0.5)*20, (Math.random()-0.5)*20, 0.5),
            speed: 0.01 + Math.random() * 0.02 
        };
        return spider;
    }

    const spiders = [];
    for (let i = 0; i < 10; i++) {
        const spider = createSpider();
        spider.position.set((Math.random() - 0.5) * 25, (Math.random() - 0.5) * 25, 0.5);
        sceneWeb.add(spider);
        spiders.push(spider);
    }

    // Lights
    const ambientWeb = new THREE.AmbientLight(0xffffff, 0.8);
    sceneWeb.add(ambientWeb);
    const pointWeb = new THREE.PointLight(0xff5722, 1, 50);
    pointWeb.position.set(0, 0, 10);
    sceneWeb.add(pointWeb);

    // Interaction (Raycaster)
    const raycasterWeb = new THREE.Raycaster();
    const mouseWeb = new THREE.Vector2();
    
    // Global target. If null, spiders wander randomly.
    let currentTarget = null; 

    spiderContainer.addEventListener('mousemove', (e) => {
        const rect = spiderContainer.getBoundingClientRect();
        mouseWeb.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
        mouseWeb.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;
        
        raycasterWeb.setFromCamera(mouseWeb, cameraWeb);
        const intersects = raycasterWeb.intersectObjects(iconMeshes);
        
        iconMeshes.forEach(mesh => mesh.scale.set(1, 1, 1));
        if (intersects.length > 0) {
            spiderContainer.style.cursor = 'pointer';
            intersects[0].object.scale.set(1.2, 1.2, 1.2); // Hover effect
        } else {
            spiderContainer.style.cursor = 'default';
        }
    });

    spiderContainer.addEventListener('click', (e) => {
        raycasterWeb.setFromCamera(mouseWeb, cameraWeb);
        const intersects = raycasterWeb.intersectObjects(iconMeshes);
        
        if (intersects.length > 0) {
            // Swarm to the clicked icon
            currentTarget = intersects[0].object.userData.targetPos;
            pointWeb.position.copy(currentTarget);
            pointWeb.position.z += 5;
        } else {
            // Click empty space: release the swarm back to random wandering
            currentTarget = null;
            pointWeb.position.set(0, 0, 10);
        }
    });

    window.addEventListener('resize', () => {
        if (!spiderContainer) return;
        cameraWeb.aspect = spiderContainer.clientWidth / spiderContainer.clientHeight;
        cameraWeb.updateProjectionMatrix();
        rendererWeb.setSize(spiderContainer.clientWidth, spiderContainer.clientHeight);
    });

    let webTime = 0;
    function animateWeb() {
        requestAnimationFrame(animateWeb);
        webTime += 1;
        orbitWeb.update();

        // Animate Spiders
        spiders.forEach((spider, sIndex) => {
            let targetPos;
            
            if (currentTarget) {
                // Swarm behavior: crowd around the current target icon
                targetPos = currentTarget.clone().add(new THREE.Vector3(Math.sin(sIndex*1.5)*3, Math.cos(sIndex*1.5)*3, 0));
            } else {
                // Random wander behavior
                targetPos = spider.userData.wanderTarget;
                
                // If reached wander target, pick a new one
                if (spider.position.distanceTo(targetPos) < 2) {
                    spider.userData.wanderTarget.set((Math.random()-0.5)*30, (Math.random()-0.5)*30, 0.5);
                }
            }
            
            // Move spider towards target
            spider.position.lerp(targetPos, spider.userData.speed);
            
            // Look at target
            const dir = targetPos.clone().sub(spider.position).normalize();
            const angle = Math.atan2(dir.y, dir.x);
            // Smoothly rotate towards angle
            let currentAngle = spider.rotation.z;
            let diff = angle - Math.PI / 2 - currentAngle;
            // Normalize diff to -PI to PI
            while (diff < -Math.PI) diff += Math.PI * 2;
            while (diff > Math.PI) diff -= Math.PI * 2;
            spider.rotation.z += diff * 0.1;

            // Wiggle legs to simulate walking if moving
            const dist = spider.position.distanceTo(targetPos);
            if (dist > 0.5) {
                spider.userData.legs.forEach((leg, i) => {
                    leg.rotation.x = Math.sin(webTime * 0.2 + i) * 0.4;
                    leg.rotation.y = Math.cos(webTime * 0.2 + i) * 0.3;
                });
            } else {
                // Rest
                spider.userData.legs.forEach((leg, i) => {
                    leg.rotation.x = (i%4 - 1.5) * 0.2; // Return to default splayed position
                    leg.rotation.y = 0;
                });
            }
        });

        // Gently rotate center logo
        centerLogo.rotation.z = Math.sin(webTime * 0.01) * 0.1;

        rendererWeb.render(sceneWeb, cameraWeb);
    }
    
    animateWeb();
}
