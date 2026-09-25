js = open('about-us.html', 'r', encoding='utf-8').read()

start = js.find('<script>\n/* CTA SECTION LAYERED DIGITAL MARKETING 3D SCENE */')
end = js.find('</script></body>')

full_script = '''<script>
/* CTA SECTION LAYERED DIGITAL MARKETING 3D SCENE */
(function () {
    const cv = document.getElementById('canvas-cta');
    if (!cv || typeof THREE === 'undefined') return;
    
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(60, innerWidth / innerHeight, 0.1, 3000);
    camera.position.set(0, 150, 700);
    
    const renderer = new THREE.WebGLRenderer({ canvas: cv, antialias: true, alpha: true });
    renderer.setSize(innerWidth, innerHeight);
    renderer.setPixelRatio(Math.min(devicePixelRatio, 2));

    // Colors
    const C_ORANGE = 0xff5722;
    const C_DARK = 0x111111;
    const C_GREY = 0x444444;

    // LAYER 1: The Analytics Data Grid (Floor)
    const gridGeo = new THREE.PlaneGeometry(3000, 3000, 80, 80);
    const gridMat = new THREE.MeshBasicMaterial({ color: C_GREY, wireframe: true, transparent: true, opacity: 0.15 });
    const grid = new THREE.Mesh(gridGeo, gridMat);
    grid.rotation.x = -Math.PI / 2;
    grid.position.y = -250;
    scene.add(grid);

    // LAYER 2: Inbound Traffic & Data Nodes (Particles spiraling inwards)
    const trafficGroup = new THREE.Group();
    const nodeCount = 150;
    const nodeGeo = new THREE.TetrahedronGeometry(6, 0);
    const nodeMat = new THREE.MeshBasicMaterial({ color: C_ORANGE, wireframe: true, transparent: true, opacity: 0.8 });
    
    for (let i = 0; i < nodeCount; i++) {
        const node = new THREE.Mesh(nodeGeo, nodeMat);
        const radius = 300 + Math.random() * 600;
        const angle = Math.random() * Math.PI * 2;
        const height = (Math.random() - 0.5) * 400;
        
        node.position.set(Math.cos(angle) * radius, height, Math.sin(angle) * radius);
        node.userData = {
            angle: angle,
            radius: radius,
            height: height,
            speed: 0.002 + Math.random() * 0.005,
            inwardSpeed: 0.5 + Math.random() * 1.5
        };
        trafficGroup.add(node);
    }
    scene.add(trafficGroup);

    // LAYER 3: The Brand Conversion Core
    const coreGroup = new THREE.Group();
    
    // Inner Solid Core
    const innerCoreGeo = new THREE.IcosahedronGeometry(70, 1);
    const innerCoreMat = new THREE.MeshBasicMaterial({ color: C_DARK, transparent: true, opacity: 0.95 });
    const innerCore = new THREE.Mesh(innerCoreGeo, innerCoreMat);
    coreGroup.add(innerCore);

    // Outer Wireframe Core
    const outerCoreGeo = new THREE.IcosahedronGeometry(95, 2);
    const outerCoreMat = new THREE.MeshBasicMaterial({ color: C_ORANGE, wireframe: true, transparent: true, opacity: 0.25 });
    const outerCore = new THREE.Mesh(outerCoreGeo, outerCoreMat);
    coreGroup.add(outerCore);

    // Orbital SEO & AEO Rings
    const ring1 = new THREE.Mesh(
        new THREE.TorusGeometry(180, 1, 16, 100),
        new THREE.MeshBasicMaterial({ color: C_GREY, transparent: true, opacity: 0.4 })
    );
    ring1.rotation.x = Math.PI / 2.5;
    coreGroup.add(ring1);

    const ring2 = new THREE.Mesh(
        new THREE.TorusGeometry(260, 2, 16, 100),
        new THREE.MeshBasicMaterial({ color: C_ORANGE, transparent: true, opacity: 0.15 })
    );
    ring2.rotation.y = Math.PI / 3;
    ring2.rotation.x = -Math.PI / 6;
    coreGroup.add(ring2);

    scene.add(coreGroup);

    // Mouse Interaction
    const mouse = { x: 0, y: 0 };
    window.addEventListener('mousemove', e => { 
        mouse.x = (e.clientX / innerWidth - 0.5) * 2; 
        mouse.y = -(e.clientY / innerHeight - 0.5) * 2; 
    });

    let t = 0;
    (function loop() {
        requestAnimationFrame(loop);
        t += 0.01;

        // Camera subtle sway
        camera.position.x += (mouse.x * 200 - camera.position.x) * 0.05;
        camera.position.y += ((150 + mouse.y * 100) - camera.position.y) * 0.05;
        camera.lookAt(0, 0, 0);

        // Grid Wave Animation (Data flow)
        const positions = gridGeo.attributes.position.array;
        for (let i = 0; i < positions.length; i += 3) {
            const x = positions[i];
            const y = positions[i + 1];
            // dynamic wave
            positions[i + 2] = Math.sin((x + t * 50) * 0.002) * Math.cos((y - t * 30) * 0.002) * 80;
        }
        gridGeo.attributes.position.needsUpdate = true;

        // Traffic Nodes Spiraling Inwards (Lead Generation effect)
        trafficGroup.children.forEach(node => {
            const data = node.userData;
            data.angle += data.speed;
            data.radius -= data.inwardSpeed;
            
            // If node hits the core, shoot it back out (new traffic)
            if (data.radius < 100) {
                data.radius = 800 + Math.random() * 200;
                data.height = (Math.random() - 0.5) * 400;
            }
            
            node.position.set(Math.cos(data.angle) * data.radius, data.height, Math.sin(data.angle) * data.radius);
            node.rotation.x += 0.02;
            node.rotation.y += 0.02;
        });

        // Core Rotation (Brand Authority)
        innerCore.rotation.y = t * 0.2;
        outerCore.rotation.y = -t * 0.15;
        outerCore.rotation.x = t * 0.1;
        
        ring1.rotation.z = t * 0.3;
        ring2.rotation.z = -t * 0.2;

        // Core Pulsing effect
        const scale = 1 + Math.sin(t * 2) * 0.03;
        coreGroup.scale.set(scale, scale, scale);

        renderer.render(scene, camera);
    })();

    window.addEventListener('resize', () => { 
        camera.aspect = innerWidth / innerHeight; 
        camera.updateProjectionMatrix(); 
        renderer.setSize(innerWidth, innerHeight); 
    });
})();
'''

js = js[:start] + full_script + js[end:]
open('about-us.html', 'w', encoding='utf-8').write(js)
