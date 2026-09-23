// about-marketing-3d.js
const container = document.getElementById('marketing-3d-canvas');

if (container && typeof THREE !== 'undefined') {
    const scene = new THREE.Scene();
    scene.background = new THREE.Color(0xfcfcfc);
    
    // Add soft fog for depth blending
    scene.fog = new THREE.Fog(0xfcfcfc, 50, 300);

    const camera = new THREE.PerspectiveCamera(60, container.clientWidth / container.clientHeight, 1, 1000);
    // Position camera looking down at a 3D growth chart
    camera.position.set(0, 50, 150);

    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: false });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    container.appendChild(renderer.domElement);

    // --- LIGHTING ---
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.6);
    scene.add(ambientLight);

    const dirLight = new THREE.DirectionalLight(0xffffff, 0.8);
    dirLight.position.set(50, 100, 50);
    scene.add(dirLight);
    
    const orangeLight = new THREE.PointLight(0xff5722, 1.5, 200);
    orangeLight.position.set(-50, 20, 0);
    scene.add(orangeLight);

    // --- 3D DIGITAL MARKETING REPRESENTATION ---
    const group = new THREE.Group();
    scene.add(group);

    // 1. Animated Growth Bars (SEO / Traffic Growth)
    const barCount = 12;
    const bars = [];
    const barMaterial = new THREE.MeshPhongMaterial({ 
        color: 0xff5722, 
        transparent: true,
        opacity: 0.85,
        shininess: 100
    });
    const barMaterialGrey = new THREE.MeshPhongMaterial({ 
        color: 0xe0e0e0,
        shininess: 50
    });

    for(let i=0; i<barCount; i++) {
        // Curve the bars in an arc
        const angle = (i / (barCount-1)) * Math.PI - (Math.PI / 2);
        const radius = 80;
        
        const x = Math.sin(angle) * radius;
        const z = Math.cos(angle) * radius - 100;
        
        // Competitors (Grey) vs Fusion X (Orange)
        const isFusionX = i > barCount/2;
        const mat = isFusionX ? barMaterial : barMaterialGrey;
        
        const maxH = isFusionX ? 40 + (i * 10) : 20 + Math.random() * 20;

        const geometry = new THREE.BoxGeometry(8, 1, 8);
        geometry.translate(0, 0.5, 0); // Pivot at bottom

        const mesh = new THREE.Mesh(geometry, mat);
        mesh.position.set(x, -20, z);
        
        group.add(mesh);
        bars.push({ mesh, maxH, speed: 0.02 + Math.random() * 0.03, phase: Math.random() * Math.PI * 2 });
    }

    // 2. Data Nodes / Network (Brand Connectivity)
    const nodeCount = 100;
    const nodeGeo = new THREE.BufferGeometry();
    const nodePos = new Float32Array(nodeCount * 3);
    for(let i=0; i<nodeCount; i++){
        nodePos[i*3] = (Math.random() - 0.5) * 300;
        nodePos[i*3+1] = Math.random() * 100 - 20;
        nodePos[i*3+2] = (Math.random() - 0.5) * 200 - 50;
    }
    nodeGeo.setAttribute('position', new THREE.BufferAttribute(nodePos, 3));
    const nodeMat = new THREE.PointsMaterial({ color: 0xff5722, size: 2, transparent: true, opacity: 0.6 });
    const nodes = new THREE.Points(nodeGeo, nodeMat);
    group.add(nodes);


    // --- ANIMATION LOOP ---
    let time = 0;
    function animate() {
        requestAnimationFrame(animate);
        time += 0.01;

        // Smoothly rotate the whole group
        group.rotation.y = Math.sin(time * 0.5) * 0.2;

        // Animate the growth bars scaling up and down
        bars.forEach((bar, index) => {
            // Give Fusion X bars a massive upward trend
            const scaleY = (Math.sin(time * 2 + bar.phase) * 0.5 + 0.5) * bar.maxH + 2;
            bar.mesh.scale.y = scaleY;
        });
        
        // Very slow parallax for nodes
        nodes.rotation.y -= 0.001;

        renderer.render(scene, camera);
    }
    
    animate();

    // Handle Resize
    window.addEventListener('resize', () => {
        if (!container) return;
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
    });
}
