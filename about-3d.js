// about-3d.js
const container = document.getElementById('about-3d-bg');

if (container && typeof THREE !== 'undefined') {
    const scene = new THREE.Scene();
    scene.background = new THREE.Color(0xffffff); // Pristine white
    scene.fog = new THREE.FogExp2(0xffffff, 0.002);

    const camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.z = 150;

    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: false });
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    container.appendChild(renderer.domElement);

    // --- ELEGANT 3D NETWORK HELIX ---
    const group = new THREE.Group();
    scene.add(group);

    const particleCount = 2000;
    const geometry = new THREE.BufferGeometry();
    const positions = new Float32Array(particleCount * 3);
    const colors = new Float32Array(particleCount * 3);
    
    const colorOrange = new THREE.Color(0xff5722);
    const colorGrey = new THREE.Color(0xdddddd);

    for (let i = 0; i < particleCount; i++) {
        // Mathematical Double Helix
        const t = i * 0.05;
        const radius = 40 + Math.sin(t * 0.2) * 10;
        
        let x = Math.cos(t) * radius;
        let y = (i - (particleCount/2)) * 0.3; // Height spread
        let z = Math.sin(t) * radius;

        // Add secondary helix strand randomly
        if (Math.random() > 0.5) {
            x = Math.cos(t + Math.PI) * radius;
            z = Math.sin(t + Math.PI) * radius;
        }

        // Add some elegant noise
        x += (Math.random() - 0.5) * 5;
        y += (Math.random() - 0.5) * 5;
        z += (Math.random() - 0.5) * 5;

        positions[i * 3] = x;
        positions[i * 3 + 1] = y;
        positions[i * 3 + 2] = z;

        // Theme colors
        const c = Math.random() > 0.3 ? colorOrange : colorGrey;
        colors[i * 3] = c.r;
        colors[i * 3 + 1] = c.g;
        colors[i * 3 + 2] = c.b;
    }

    geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

    // Draw lines connecting nearby particles to create a web/network
    const lineMaterial = new THREE.LineBasicMaterial({
        color: 0xff5722,
        transparent: true,
        opacity: 0.15
    });

    // To keep performance high, we just draw a single continuous line through the sorted points
    const lines = new THREE.Line(geometry, lineMaterial);
    group.add(lines);

    // Add glowing points
    const pointMaterial = new THREE.PointsMaterial({
        size: 2,
        vertexColors: true,
        transparent: true,
        opacity: 0.8
    });
    
    const points = new THREE.Points(geometry, pointMaterial);
    group.add(points);

    // --- SCROLL INTERACTION ---
    let targetRotationY = 0;
    let targetRotationX = 0;
    let targetCameraZ = 150;

    window.addEventListener('scroll', () => {
        const scrollY = window.scrollY;
        const maxScroll = document.body.scrollHeight - window.innerHeight;
        const scrollPercent = maxScroll > 0 ? scrollY / maxScroll : 0;

        // Elegant rotation based on scroll depth
        targetRotationY = scrollPercent * Math.PI * 2;
        
        // Smoothly zoom in as you scroll down
        targetCameraZ = 150 - (scrollPercent * 80);
    });

    // --- MOUSE PARALLAX ---
    let mouseX = 0;
    let mouseY = 0;
    window.addEventListener('mousemove', (e) => {
        mouseX = (e.clientX / window.innerWidth) * 2 - 1;
        mouseY = -(e.clientY / window.innerHeight) * 2 + 1;
    });

    // --- ANIMATION LOOP ---
    function animate() {
        requestAnimationFrame(animate);
        
        // Constant slow idle rotation
        group.rotation.y += 0.001;
        group.rotation.x += 0.0005;

        // Smooth scroll interpolation
        group.rotation.y += (targetRotationY - group.rotation.y) * 0.05;
        camera.position.z += (targetCameraZ - camera.position.z) * 0.05;

        // Elegant mouse parallax
        camera.position.x += (mouseX * 10 - camera.position.x) * 0.05;
        camera.position.y += (mouseY * 10 - camera.position.y) * 0.05;
        camera.lookAt(scene.position);

        renderer.render(scene, camera);
    }
    
    animate();

    // Handle Resize
    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });
}
