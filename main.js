// Mobile Menu Toggle
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');

if (hamburger) {
    hamburger.addEventListener('click', () => {
        if (navLinks.style.display === 'flex') {
            navLinks.style.display = 'none';
        } else {
            navLinks.style.display = 'flex';
            navLinks.style.flexDirection = 'column';
            navLinks.style.position = 'absolute';
            navLinks.style.top = '70px';
            navLinks.style.left = '0';
            navLinks.style.width = '100%';
            navLinks.style.background = 'white';
            navLinks.style.padding = '20px 0';
            navLinks.style.boxShadow = '0 5px 10px rgba(0,0,0,0.1)';
        }
    });
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        // Hide mobile menu on click
        if (window.innerWidth <= 768 && navLinks.style.display === 'flex') {
            navLinks.style.display = 'none';
        }

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// --- Three.js: Physical & Digital Infinity Knot ---
const container = document.getElementById('globe-container');
if (container && typeof THREE !== 'undefined') {
    // Setup Scene
    const scene = new THREE.Scene();
    
    // Camera
    const camera = new THREE.PerspectiveCamera(45, container.clientWidth / container.clientHeight, 0.1, 1000);
    camera.position.z = 15;

    // Renderer
    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    container.appendChild(renderer.domElement);

    // Group to hold our infinity shape
    const infinityGroup = new THREE.Group();
    scene.add(infinityGroup);

    // 1. The Physical World (Solid, Metallic Inner Core)
    const knotGeometry = new THREE.TorusKnotGeometry(3, 0.8, 100, 16);
    const physicalMaterial = new THREE.MeshStandardMaterial({ 
        color: 0xffffff,
        metalness: 0.9,
        roughness: 0.2
    });
    const physicalKnot = new THREE.Mesh(knotGeometry, physicalMaterial);
    infinityGroup.add(physicalKnot);

    // 2. The Digital World (Glowing, Wireframe Outer Shell)
    const digitalMaterial = new THREE.MeshBasicMaterial({ 
        color: 0xff5722, 
        wireframe: true,
        transparent: true,
        opacity: 0.3
    });
    const digitalKnot = new THREE.Mesh(knotGeometry, digitalMaterial);
    digitalKnot.scale.set(1.15, 1.15, 1.15); // Slightly larger to envelop the physical core
    infinityGroup.add(digitalKnot);

    // 3. Digital Data Particles (Floating around)
    const particleCount = 400;
    const particleGeometry = new THREE.BufferGeometry();
    const particlePositions = new Float32Array(particleCount * 3);
    
    for(let i = 0; i < particleCount * 3; i++) {
        // Random spread of particles
        particlePositions[i] = (Math.random() - 0.5) * 20;
    }
    
    particleGeometry.setAttribute('position', new THREE.BufferAttribute(particlePositions, 3));
    const particleMaterial = new THREE.PointsMaterial({
        color: 0xff5722,
        size: 0.1,
        transparent: true,
        opacity: 0.6
    });
    const particleSystem = new THREE.Points(particleGeometry, particleMaterial);
    scene.add(particleSystem);

    // 4. Lighting (Crucial for the metallic physical core)
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
    scene.add(ambientLight);

    const pointLight = new THREE.PointLight(0xffffff, 1);
    pointLight.position.set(10, 10, 10);
    scene.add(pointLight);
    
    const orangeLight = new THREE.PointLight(0xff5722, 1.5);
    orangeLight.position.set(-10, -10, 10);
    scene.add(orangeLight);

    // Animation Loop
    let time = 0;
    function animate() {
        requestAnimationFrame(animate);
        time += 0.01;

        // Rotate the infinity knot to show all angles
        infinityGroup.rotation.x += 0.005;
        infinityGroup.rotation.y += 0.01;

        // Pulse the digital wireframe scale slightly
        const pulse = 1.15 + Math.sin(time * 2) * 0.05;
        digitalKnot.scale.set(pulse, pulse, pulse);

        // Slowly rotate the particle system
        particleSystem.rotation.y -= 0.002;
        particleSystem.rotation.z += 0.001;

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
