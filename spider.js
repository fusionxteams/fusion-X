// --- SPIDER WEB 3D SCENE ---
const spiderContainer = document.getElementById('spider-container');
if (spiderContainer && typeof THREE !== 'undefined') {
    const sceneWeb = new THREE.Scene();
    sceneWeb.background = new THREE.Color(0x0a0a0a);
    sceneWeb.fog = new THREE.FogExp2(0x0a0a0a, 0.02);

    const cameraWeb = new THREE.PerspectiveCamera(45, spiderContainer.clientWidth / spiderContainer.clientHeight, 0.1, 1000);
    cameraWeb.position.set(0, 0, 25);

    const rendererWeb = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    rendererWeb.setSize(spiderContainer.clientWidth, spiderContainer.clientHeight);
    rendererWeb.setPixelRatio(window.devicePixelRatio);
    spiderContainer.appendChild(rendererWeb.domElement);

    const orbitWeb = new THREE.OrbitControls(cameraWeb, rendererWeb.domElement);
    orbitWeb.enableDamping = true;
    orbitWeb.dampingFactor = 0.05;
    orbitWeb.enableZoom = false;
    orbitWeb.maxPolarAngle = Math.PI / 1.5;

    // 1. Procedural 3D Spider Web
    const webMat = new THREE.LineBasicMaterial({ color: 0xff5722, transparent: true, opacity: 0.4 });
    const webPoints = [];
    const radials = 16;
    const rings = 12;
    const maxRadius = 20;

    // Radials
    for (let i = 0; i < radials; i++) {
        const angle = (i / radials) * Math.PI * 2;
        webPoints.push(new THREE.Vector3(0, 0, 0));
        webPoints.push(new THREE.Vector3(Math.cos(angle) * maxRadius, Math.sin(angle) * maxRadius, (Math.random() - 0.5) * 2));
    }
    // Rings
    for (let r = 1; r <= rings; r++) {
        const radius = (r / rings) * maxRadius;
        for (let i = 0; i < radials; i++) {
            const angle1 = (i / radials) * Math.PI * 2;
            const angle2 = ((i + 1) % radials) * Math.PI * 2;
            const sag1 = Math.sin(angle1 * 3) * 0.5;
            const sag2 = Math.sin(angle2 * 3) * 0.5;
            webPoints.push(new THREE.Vector3(Math.cos(angle1) * radius, Math.sin(angle1) * radius, sag1));
            webPoints.push(new THREE.Vector3(Math.cos(angle2) * radius, Math.sin(angle2) * radius, sag2));
        }
    }
    const webGeo = new THREE.BufferGeometry().setFromPoints(webPoints);
    const web = new THREE.LineSegments(webGeo, webMat);
    sceneWeb.add(web);

    // 2. Fusion X Logo Stuck in Center
    const logoLoader = new THREE.TextureLoader();
    const logoTex = logoLoader.load('logo.png');
    const logoGeo = new THREE.PlaneGeometry(6, 6);
    const logoMat = new THREE.MeshBasicMaterial({ map: logoTex, transparent: true, side: THREE.DoubleSide });
    const centerLogo = new THREE.Mesh(logoGeo, logoMat);
    centerLogo.position.z = 0.5;
    sceneWeb.add(centerLogo);

    // 3. Digital Marketing Icons (Clickable targets)
    const iconData = [
        { emoji: '🔍', title: 'SEO', pos: new THREE.Vector3(-10, 8, 1) },
        { emoji: '💻', title: 'Web Dev', pos: new THREE.Vector3(12, 6, -1) },
        { emoji: '🤖', title: 'AI', pos: new THREE.Vector3(-12, -6, 2) },
        { emoji: '📱', title: 'Social', pos: new THREE.Vector3(10, -9, 0) },
        { emoji: '📈', title: 'Analytics', pos: new THREE.Vector3(0, -12, 1) },
        { emoji: '🎯', title: 'Ads', pos: new THREE.Vector3(0, 12, -2) }
    ];
    
    const iconMeshes = [];
    iconData.forEach(data => {
        // Create canvas texture for emoji
        const canvas = document.createElement('canvas');
        canvas.width = 256; canvas.height = 256;
        const ctx = canvas.getContext('2d');
        
        ctx.fillStyle = 'rgba(255, 87, 34, 0.1)';
        ctx.beginPath();
        ctx.arc(128, 128, 120, 0, Math.PI * 2);
        ctx.fill();
        ctx.strokeStyle = '#ff5722';
        ctx.lineWidth = 8;
        ctx.stroke();

        ctx.font = '100px sans-serif';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(data.emoji, 128, 128);

        ctx.fillStyle = '#ffffff';
        ctx.font = 'bold 30px Arial';
        ctx.fillText(data.title, 128, 220);

        const tex = new THREE.CanvasTexture(canvas);
        const geo = new THREE.PlaneGeometry(4, 4);
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
        const mat = new THREE.MeshStandardMaterial({ color: 0x111111, metalness: 0.9, roughness: 0.1 });
        const glow = new THREE.MeshBasicMaterial({ color: 0xff5722 });
        
        // Body (Abdomen + Head)
        const abdomen = new THREE.Mesh(new THREE.SphereGeometry(0.4, 16, 16), mat);
        const head = new THREE.Mesh(new THREE.SphereGeometry(0.25, 16, 16), mat);
        head.position.set(0, 0.4, 0); // Head points forward along +Y
        spider.add(abdomen, head);
        
        // Eyes
        const eye1 = new THREE.Mesh(new THREE.SphereGeometry(0.05), glow);
        eye1.position.set(-0.1, 0.55, 0.15);
        const eye2 = new THREE.Mesh(new THREE.SphereGeometry(0.05), glow);
        eye2.position.set(0.1, 0.55, 0.15);
        spider.add(eye1, eye2);
        
        // 8 Legs
        const legs = [];
        for (let i = 0; i < 8; i++) {
            const side = i < 4 ? -1 : 1;
            const index = i % 4;
            
            const leg = new THREE.Group();
            
            // Upper leg joint
            const upper = new THREE.Mesh(new THREE.CylinderGeometry(0.03, 0.03, 0.6), mat);
            upper.position.set(side * 0.3, 0.3, (index - 1.5) * 0.2);
            upper.rotation.z = side * Math.PI / 4;
            upper.rotation.x = (index - 1.5) * 0.2;
            
            // Lower leg joint
            const lower = new THREE.Mesh(new THREE.CylinderGeometry(0.02, 0.01, 0.8), mat);
            lower.position.set(side * 0.6, 0.3, (index - 1.5) * 0.3);
            lower.rotation.z = side * -Math.PI / 6;
            
            leg.add(upper, lower);
            spider.add(leg);
            legs.push(leg);
        }
        
        spider.userData = { legs: legs, target: new THREE.Vector3(0, 0, 0), speed: 0.02 + Math.random() * 0.03 };
        return spider;
    }

    const spiders = [];
    for (let i = 0; i < 7; i++) {
        const spider = createSpider();
        // Start randomly on the web
        spider.position.set((Math.random() - 0.5) * 20, (Math.random() - 0.5) * 20, 0.5);
        sceneWeb.add(spider);
        spiders.push(spider);
    }

    // Lights
    const ambientWeb = new THREE.AmbientLight(0xffffff, 0.5);
    sceneWeb.add(ambientWeb);
    const pointWeb = new THREE.PointLight(0xff5722, 2, 50);
    pointWeb.position.set(0, 0, 10);
    sceneWeb.add(pointWeb);

    // Interaction (Raycaster)
    const raycasterWeb = new THREE.Raycaster();
    const mouseWeb = new THREE.Vector2();
    let currentTarget = new THREE.Vector3(0, 0, 0); // Default: center logo

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
            currentTarget = intersects[0].object.userData.targetPos;
            // Flash the icon
            pointWeb.position.copy(currentTarget);
            pointWeb.position.z += 5;
        } else {
            // Click empty space: return to center
            currentTarget = new THREE.Vector3(0, 0, 0);
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
        webTime += 0.1;
        orbitWeb.update();

        // Animate Spiders
        spiders.forEach((spider, sIndex) => {
            // Give each spider a slightly offset target so they don't pile exactly on top of each other
            const offsetTarget = currentTarget.clone().add(new THREE.Vector3(Math.sin(sIndex) * 2, Math.cos(sIndex) * 2, 0));
            
            // Move spider towards target
            spider.position.lerp(offsetTarget, spider.userData.speed);
            
            // Look at target (spider head points +Y, so we need to adjust up vector)
            const dir = offsetTarget.clone().sub(spider.position).normalize();
            // In 2D plane (XY), angle to target:
            const angle = Math.atan2(dir.y, dir.x);
            // Three.js rotation: +Y is UP. We want +Y to point along 'dir'.
            spider.rotation.z = angle - Math.PI / 2;

            // Wiggle legs to simulate walking if moving
            const dist = spider.position.distanceTo(offsetTarget);
            if (dist > 1.0) {
                spider.userData.legs.forEach((leg, i) => {
                    leg.rotation.x = Math.sin(webTime * 2 + i) * 0.3;
                    leg.rotation.y = Math.cos(webTime * 2 + i) * 0.2;
                });
            } else {
                spider.userData.legs.forEach(leg => leg.rotation.set(0,0,0));
            }
        });

        // Gently rotate center logo
        centerLogo.rotation.z = Math.sin(webTime * 0.05) * 0.1;

        rendererWeb.render(sceneWeb, cameraWeb);
    }
    
    animateWeb();
}
