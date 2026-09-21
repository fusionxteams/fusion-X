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

// --- Three.js: Digital Marketing Growth Hologram ---
const container = document.getElementById('globe-container');
if (container && typeof THREE !== 'undefined') {
    // Setup Scene
    const scene = new THREE.Scene();
    
    // Camera
    const camera = new THREE.PerspectiveCamera(45, container.clientWidth / container.clientHeight, 0.1, 1000);
    camera.position.set(0, 5, 12);
    camera.lookAt(0, 0, 0);

    // Renderer
    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    container.appendChild(renderer.domElement);

    const group = new THREE.Group();
    scene.add(group);

    // 1. The Physical World: A Sleek Smartphone/Tablet Device
    const phoneGeo = new THREE.BoxGeometry(4, 0.2, 7);
    const phoneMat = new THREE.MeshStandardMaterial({ 
        color: 0x333333,
        metalness: 0.8,
        roughness: 0.2
    });
    const phone = new THREE.Mesh(phoneGeo, phoneMat);
    phone.rotation.x = Math.PI / 2; // Lay it flat
    group.add(phone);

    // Phone Screen (Glowing base)
    const screenGeo = new THREE.PlaneGeometry(3.6, 6.6);
    const screenMat = new THREE.MeshBasicMaterial({ color: 0x111111 });
    const screen = new THREE.Mesh(screenGeo, screenMat);
    screen.rotation.x = -Math.PI / 2;
    screen.position.y = 0.11;
    group.add(screen);

    // 2. The Digital World: Holographic Growth Chart (Marketing ROI)
    const chartGroup = new THREE.Group();
    chartGroup.position.y = 0.15;
    group.add(chartGroup);

    // Create 5 bars representing data growth
    const bars = [];
    const barGeo = new THREE.BoxGeometry(0.4, 1, 0.4);
    const barMat = new THREE.MeshBasicMaterial({ 
        color: 0xff5722, 
        transparent: true, 
        opacity: 0.85,
        wireframe: true // Gives it a digital/hologram feel
    });

    const targetHeights = [1, 2, 3.5, 5, 7];
    for(let i=0; i<5; i++) {
        const bar = new THREE.Mesh(barGeo, barMat);
        bar.position.set(-1.2 + (i * 0.6), 0, 1.5 - (i * 0.75));
        // Start them at scale 0 for animation
        bar.scale.y = 0.01;
        bar.userData = { targetHeight: targetHeights[i] };
        chartGroup.add(bar);
        bars.push(bar);
    }

    // A glowing Arrow pointing UP (Representing Marketing Success/Traffic)
    const arrowGroup = new THREE.Group();
    
    const lineGeo = new THREE.CylinderGeometry(0.05, 0.05, 7, 8);
    const arrowMat = new THREE.MeshBasicMaterial({ color: 0xff9800 });
    const line = new THREE.Mesh(lineGeo, arrowMat);
    line.rotation.z = -Math.PI / 4;
    line.rotation.x = Math.PI / 6;
    arrowGroup.add(line);

    const headGeo = new THREE.ConeGeometry(0.3, 0.8, 8);
    const head = new THREE.Mesh(headGeo, arrowMat);
    head.position.set(2.5, 2.5, -1.5);
    head.rotation.z = -Math.PI / 4;
    head.rotation.x = Math.PI / 6;
    arrowGroup.add(head);

    arrowGroup.position.set(-1, 0, 1);
    chartGroup.add(arrowGroup);

    // 3. Floating Traffic/Data Particles pulling into the phone
    const particleCount = 150;
    const particleGeo = new THREE.BufferGeometry();
    const particlePos = new Float32Array(particleCount * 3);
    for(let i=0; i<particleCount*3; i++) {
        particlePos[i] = (Math.random() - 0.5) * 15;
    }
    particleGeo.setAttribute('position', new THREE.BufferAttribute(particlePos, 3));
    const particleMat = new THREE.PointsMaterial({
        color: 0xff5722,
        size: 0.15,
        transparent: true,
        opacity: 0.6
    });
    const particles = new THREE.Points(particleGeo, particleMat);
    scene.add(particles);

    // Lighting
    const ambient = new THREE.AmbientLight(0xffffff, 0.8);
    scene.add(ambient);
    const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
    directionalLight.position.set(5, 10, 5);
    scene.add(directionalLight);

    // Animation Loop
    let time = 0;
    function animate() {
        requestAnimationFrame(animate);
        time += 0.015;

        // Gently float and rotate the entire phone setup
        group.rotation.y = Math.sin(time * 0.5) * 0.3 - 0.5;
        group.rotation.x = Math.cos(time * 0.5) * 0.1 + 0.2;
        group.position.y = Math.sin(time) * 0.3;

        // Animate the bars growing (Marketing ROI)
        bars.forEach((bar, index) => {
            // Growth animation with a slight bounce
            const height = Math.min(bar.userData.targetHeight, bar.scale.y + 0.05);
            bar.scale.y = height + Math.sin(time * 3 + index) * 0.1;
            // Adjust position so they grow upwards, not from center
            bar.position.y = bar.scale.y / 2;
        });

        // Float the arrow
        arrowGroup.position.y = Math.sin(time * 2) * 0.2;

        // Animate particles flowing downwards into the phone (Organic Traffic)
        const positions = particles.geometry.attributes.position.array;
        for(let i=1; i<particleCount*3; i+=3) {
            positions[i] -= 0.05; // Fall down
            if (positions[i] < -5) {
                positions[i] = 10; // Reset to top
            }
        }
        particles.geometry.attributes.position.needsUpdate = true;

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
