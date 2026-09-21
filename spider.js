// --- SPIDER WEB 3D SCENE ---
const spiderContainer = document.getElementById('spider-container');
if (spiderContainer && typeof THREE !== 'undefined') {
    const sceneWeb = new THREE.Scene();
    sceneWeb.background = new THREE.Color(0xffffff); // White Background
    sceneWeb.fog = new THREE.FogExp2(0xffffff, 0.015);

    const cameraWeb = new THREE.PerspectiveCamera(45, spiderContainer.clientWidth / spiderContainer.clientHeight, 0.1, 1000);
    // Looking directly down at the flat web to perfectly see the geometric hexagon pattern
    cameraWeb.position.set(0, 0, 50); 
    cameraWeb.lookAt(0, 0, 0);

    const rendererWeb = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    rendererWeb.setSize(spiderContainer.clientWidth, spiderContainer.clientHeight);
    rendererWeb.setPixelRatio(window.devicePixelRatio);
    spiderContainer.appendChild(rendererWeb.domElement);

    // Calculate exactly how wide the screen is in 3D units at Z=0
    const vFov = (cameraWeb.fov * Math.PI) / 180;
    const visibleHeight = 2 * Math.tan(vFov / 2) * cameraWeb.position.z;
    const visibleWidth = visibleHeight * cameraWeb.aspect;

    // 1. Procedural 3D Spider Web (Hexagon Pattern)
    const webMat = new THREE.LineBasicMaterial({ color: 0xff5722, transparent: true, opacity: 0.8 });
    const webPoints = [];
    const radials = 8; // 8 radials gives N, S, E, W, NE, NW, SE, SW perfectly
    
    // Ensure the web is always large enough to cover the corners of ANY monitor size
    const maxRadius = Math.max(visibleWidth, visibleHeight) * 1.5; 
    const rings = Math.floor(maxRadius / 3); // Dynamic ring count to keep density perfect

    // Radials (Straight lines from center to outer edge)
    for (let i = 0; i < radials; i++) {
        const angle = (i / radials) * Math.PI * 2;
        webPoints.push(new THREE.Vector3(0, 0, 0));
        webPoints.push(new THREE.Vector3(Math.cos(angle) * maxRadius, Math.sin(angle) * maxRadius, 0));
    }
    
    // Concentric Rings (Straight lines connecting adjacent radials to form octagons)
    for (let r = 1; r <= rings; r++) {
        const radius = Math.pow(r / rings, 1.2) * maxRadius; 
        
        for (let i = 0; i < radials; i++) {
            const angle1 = (i / radials) * Math.PI * 2;
            const angle2 = ((i + 1) % radials) * Math.PI * 2;
            
            const p1 = new THREE.Vector3(Math.cos(angle1) * radius, Math.sin(angle1) * radius, 0);
            const p2 = new THREE.Vector3(Math.cos(angle2) * radius, Math.sin(angle2) * radius, 0);
            
            webPoints.push(p1);
            webPoints.push(p2);
        }
    }
    const webGeo = new THREE.BufferGeometry().setFromPoints(webPoints);
    const web = new THREE.LineSegments(webGeo, webMat);
    sceneWeb.add(web);

    // 2. Load Actual FUSION X Logo (using base64 to avoid local CORS issues)
    const texLoader = new THREE.TextureLoader();
    let centerLogo = new THREE.Mesh();
    texLoader.load(logoBase64, (texture) => {
        const aspect = texture.image.width / texture.image.height;
        const width = 12; // Adjust size
        const height = width / aspect;
        
        const logoGeo = new THREE.PlaneGeometry(width, height);
        const logoMat = new THREE.MeshBasicMaterial({ map: texture, transparent: true, side: THREE.DoubleSide });
        centerLogo.geometry = logoGeo;
        centerLogo.material = logoMat;
        centerLogo.position.z = 0.5;
        sceneWeb.add(centerLogo);
    });

    // 3. Digital Marketing Icons (HTML Emojis)
    const iconData = [
        { emoji: '🔍', title: 'SEO', pos: new THREE.Vector3(-10, 8, 1) },
        { emoji: '💻', title: 'Web Sites', pos: new THREE.Vector3(12, 6, -1) },
        { emoji: '🤖', title: 'AI Future', pos: new THREE.Vector3(-12, -6, 2) },
        { emoji: '📱', title: 'Social', pos: new THREE.Vector3(10, -9, 0) },
        { emoji: '📈', title: 'Analytics', pos: new THREE.Vector3(0, -12, 1) },
        { emoji: '🎯', title: 'Ads', pos: new THREE.Vector3(0, 12, -2) }
    ];
    
    const iconElements = [];
    let currentTarget = null; 

    iconData.forEach(data => {
        const el = document.createElement('div');
        el.className = 'web-icon';
        el.innerHTML = `<span>${data.emoji}</span> ${data.title}`;
        spiderContainer.appendChild(el);
        
        iconElements.push({ element: el, pos: data.pos });

        el.addEventListener('click', (e) => {
            e.stopPropagation(); 
            currentTarget = data.pos;
            pointWeb.position.copy(currentTarget);
            pointWeb.position.z += 5;
        });
    });

    // 4. Detailed 3D Spiders
    function createSpider() {
        const spider = new THREE.Group();
        const mat = new THREE.MeshStandardMaterial({ color: 0x222222, metalness: 0.9, roughness: 0.1 });
        const glow = new THREE.MeshBasicMaterial({ color: 0xff5722 });
        
        const abdomen = new THREE.Mesh(new THREE.SphereGeometry(0.5, 16, 16), mat);
        const head = new THREE.Mesh(new THREE.SphereGeometry(0.3, 16, 16), mat);
        head.position.set(0, 0.45, 0); 
        spider.add(abdomen, head);
        
        const eye1 = new THREE.Mesh(new THREE.SphereGeometry(0.06), glow);
        eye1.position.set(-0.12, 0.6, 0.15);
        const eye2 = new THREE.Mesh(new THREE.SphereGeometry(0.06), glow);
        eye2.position.set(0.12, 0.6, 0.15);
        spider.add(eye1, eye2);
        
        const legs = [];
        for (let i = 0; i < 8; i++) {
            const side = i < 4 ? -1 : 1;
            const index = i % 4;
            const leg = new THREE.Group();
            const upper = new THREE.Mesh(new THREE.CylinderGeometry(0.04, 0.04, 0.8), mat);
            upper.position.set(side * 0.4, 0.4, (index - 1.5) * 0.25);
            upper.rotation.z = side * Math.PI / 4;
            upper.rotation.x = (index - 1.5) * 0.2;
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
            speed: 0.002 + Math.random() * 0.004 // Slower spiders!
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

    const ambientWeb = new THREE.AmbientLight(0xffffff, 0.8);
    sceneWeb.add(ambientWeb);
    const pointWeb = new THREE.PointLight(0xff5722, 1, 50);
    pointWeb.position.set(0, 0, 10);
    sceneWeb.add(pointWeb);

    spiderContainer.addEventListener('click', () => {
        currentTarget = null;
        pointWeb.position.set(0, 0, 10);
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
        webTime += 0.5; // Slow down global time step

        iconElements.forEach(icon => {
            const vector = icon.pos.clone();
            vector.project(cameraWeb);
            const x = (vector.x * .5 + .5) * spiderContainer.clientWidth;
            const y = (vector.y * -.5 + .5) * spiderContainer.clientHeight;
            icon.element.style.left = `${x}px`;
            icon.element.style.top = `${y}px`;
        });

        spiders.forEach((spider, sIndex) => {
            let targetPos;
            if (currentTarget) {
                targetPos = currentTarget.clone().add(new THREE.Vector3(Math.sin(sIndex*1.5)*3, Math.cos(sIndex*1.5)*3, 0));
            } else {
                targetPos = spider.userData.wanderTarget;
                if (spider.position.distanceTo(targetPos) < 2) {
                    spider.userData.wanderTarget.set((Math.random()-0.5)*40, (Math.random()-0.5)*40, 0.5);
                }
            }
            
            spider.position.lerp(targetPos, spider.userData.speed);
            
            const dir = targetPos.clone().sub(spider.position).normalize();
            const angle = Math.atan2(dir.y, dir.x);
            let currentAngle = spider.rotation.z;
            let diff = angle - Math.PI / 2 - currentAngle;
            while (diff < -Math.PI) diff += Math.PI * 2;
            while (diff > Math.PI) diff -= Math.PI * 2;
            spider.rotation.z += diff * 0.1;

            const dist = spider.position.distanceTo(targetPos);
            if (dist > 0.5) {
                spider.userData.legs.forEach((leg, i) => {
                    // Slower leg wiggling
                    leg.rotation.x = Math.sin(webTime * 0.1 + i) * 0.4;
                    leg.rotation.y = Math.cos(webTime * 0.1 + i) * 0.3;
                });
            } else {
                spider.userData.legs.forEach((leg, i) => {
                    leg.rotation.x = (i%4 - 1.5) * 0.2; 
                    leg.rotation.y = 0;
                });
            }
        });

        centerLogo.rotation.z = Math.sin(webTime * 0.01) * 0.1;

        rendererWeb.render(sceneWeb, cameraWeb);
    }
    
    animateWeb();
}
