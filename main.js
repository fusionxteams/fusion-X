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

// --- Three.js Globe with Orbiting Ball and Trail ---
const container = document.getElementById('globe-container');
if (container && typeof THREE !== 'undefined') {
    // Setup
    const scene = new THREE.Scene();
    
    // Make camera aspect ratio match the container
    const camera = new THREE.PerspectiveCamera(45, container.clientWidth / container.clientHeight, 0.1, 1000);
    camera.position.z = 18;

    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    container.appendChild(renderer.domElement);

    // 1. The Globe (Wireframe to look like digital network)
    const globeGeometry = new THREE.SphereGeometry(6, 32, 32);
    
    // Inner solid sphere to hide backfaces (makes it look cleaner)
    const innerMaterial = new THREE.MeshBasicMaterial({ color: 0xffffff });
    const innerGlobe = new THREE.Mesh(globeGeometry, innerMaterial);
    
    // Outer wireframe
    const wireframeMaterial = new THREE.MeshBasicMaterial({ 
        color: 0xff5722, 
        wireframe: true,
        transparent: true,
        opacity: 0.15
    });
    const globe = new THREE.Mesh(globeGeometry, wireframeMaterial);
    
    const globeGroup = new THREE.Group();
    globeGroup.add(innerGlobe);
    globeGroup.add(globe);
    
    // Tilt the globe slightly
    globeGroup.rotation.z = 0.4;
    scene.add(globeGroup);

    // 2. The Orbiting Ball (Satellite)
    const ballGeometry = new THREE.SphereGeometry(0.3, 16, 16);
    const ballMaterial = new THREE.MeshBasicMaterial({ color: 0xff5722 });
    const orb = new THREE.Mesh(ballGeometry, ballMaterial);
    scene.add(orb);

    // 3. The Trail
    const trailLength = 50;
    const trailPositions = new Float32Array(trailLength * 3);
    const trailGeometry = new THREE.BufferGeometry();
    trailGeometry.setAttribute('position', new THREE.BufferAttribute(trailPositions, 3));
    const trailMaterial = new THREE.LineBasicMaterial({ 
        color: 0xff5722, 
        transparent: true, 
        opacity: 0.5,
        linewidth: 2
    });
    const trail = new THREE.Line(trailGeometry, trailMaterial);
    scene.add(trail);

    let time = 0;
    const orbitRadius = 6.5; // Slightly larger than the globe

    // Initialize trail positions to the start point so it doesn't streak from 0,0,0
    const startX = Math.cos(0) * orbitRadius;
    const startY = Math.sin(0) * (orbitRadius * 0.8);
    const startZ = Math.sin(0) * orbitRadius;
    const positions = trail.geometry.attributes.position.array;
    for(let i=0; i<trailLength*3; i+=3) {
        positions[i] = startX;
        positions[i+1] = startY;
        positions[i+2] = startZ;
    }

    // Animation Loop
    function animate() {
        requestAnimationFrame(animate);
        time += 0.02;

        // Rotate the globe
        globeGroup.rotation.y += 0.005;

        // Calculate orbit position (Lissajous curve to make it go all over the globe)
        const x = Math.cos(time) * orbitRadius;
        const y = Math.sin(time * 1.5) * (orbitRadius * 0.8);
        const z = Math.sin(time) * orbitRadius;
        
        orb.position.set(x, y, z);

        // Update Trail
        const posArray = trail.geometry.attributes.position.array;
        
        // Shift old positions back
        for (let i = posArray.length - 1; i >= 3; i--) {
            posArray[i] = posArray[i - 3];
        }
        
        // Set new head position
        posArray[0] = x;
        posArray[1] = y;
        posArray[2] = z;
        
        trail.geometry.attributes.position.needsUpdate = true;

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
