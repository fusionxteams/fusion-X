// --- SPIDER WEB 3D SCENE ---
const spiderContainer = document.getElementById('spider-container');
if (spiderContainer && typeof THREE !== 'undefined') {
    const sceneWeb = new THREE.Scene();
    // Removed background and fog to allow transparency so the 2D HTML web and logo are visible underneath

    const cameraWeb = new THREE.PerspectiveCamera(45, spiderContainer.clientWidth / spiderContainer.clientHeight, 0.1, 1000);
    // Looking directly down at the flat web to perfectly see the geometric hexagon pattern
    cameraWeb.position.set(0, 0, 50); 
    cameraWeb.lookAt(0, 0, 0);

    const rendererWeb = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    rendererWeb.setSize(spiderContainer.clientWidth, spiderContainer.clientHeight);
    rendererWeb.setPixelRatio(window.devicePixelRatio);
    rendererWeb.domElement.style.position = 'absolute';
    rendererWeb.domElement.style.top = '0';
    rendererWeb.domElement.style.left = '0';
    rendererWeb.domElement.style.zIndex = '3';
    spiderContainer.appendChild(rendererWeb.domElement);

    let centerLogo = { rotation: { z: 0 } };

    // 3. Digital Marketing Icons (HTML Emojis)
    const iconData = [
        { emoji: '🔍', title: 'SEO', pos: new THREE.Vector3(-10, 8, 1) },
        { emoji: '💻', title: 'Web Sites', pos: new THREE.Vector3(12, 6, -1) },
        { emoji: '🤖', title: 'AI Future', pos: new THREE.Vector3(-12, -6, 2) },
        { emoji: '📱', title: 'Social', pos: new THREE.Vector3(10, -9, 0) },
        { emoji: '📈', title: 'Analytics', pos: new THREE.Vector3(0, -12, 1) },
        { emoji: '🎯', title: 'Ads', pos: new THREE.Vector3(0, 12, -2) }
    ];

    // 1. Pure 2D HTML Canvas Spider Web (100% bug-free, perfect 360 degrees)
    const bgCanvas = document.getElementById('web-bg-canvas');
    const ctx = bgCanvas.getContext('2d');
    
    function draw2DWeb() {
        bgCanvas.width = spiderContainer.clientWidth;
        bgCanvas.height = spiderContainer.clientHeight;
        
        ctx.clearRect(0, 0, bgCanvas.width, bgCanvas.height);
        
        // 1. Draw Spider Web Background
        ctx.strokeStyle = 'rgba(255, 87, 34, 0.8)'; 
        ctx.lineWidth = 1.5; 
        
        const cx = bgCanvas.width / 2;
        const cy = bgCanvas.height / 2;
        const radials = 6; 
        const maxRadius = Math.max(bgCanvas.width, bgCanvas.height) * 0.8;
        const rings = 25;
        
        // Draw Radials
        ctx.beginPath();
        for (let i = 0; i < radials; i++) {
            const angle = (i / radials) * Math.PI * 2 + (Math.PI / 6);
            ctx.moveTo(cx, cy);
            ctx.lineTo(cx + Math.cos(angle) * maxRadius, cy + Math.sin(angle) * maxRadius);
        }
        ctx.stroke();
        
        // Draw Rings layer by layer (perfectly even spacing)
        for (let r = 1; r <= rings; r++) {
            const radius = (r / rings) * maxRadius;
            ctx.beginPath();
            
            for (let i = 0; i < radials; i++) {
                const angle = (i / radials) * Math.PI * 2 + (Math.PI / 6);
                const px = cx + Math.cos(angle) * radius;
                const py = cy + Math.sin(angle) * radius;
                
                if (i === 0) {
                    ctx.moveTo(px, py);
                } else {
                    ctx.lineTo(px, py);
                }
            }
            
            ctx.closePath(); // Closes the hexagon perfectly back to the first point
            ctx.stroke(); // Stroke each layer individually to guarantee rendering
        }
    }
    
    draw2DWeb();
    
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
        draw2DWeb();
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
