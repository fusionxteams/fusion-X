// globe-banner.js
const spinGlobeContainer = document.getElementById('spinning-globe-container');

if (spinGlobeContainer && typeof THREE !== 'undefined') {
    const scene = new THREE.Scene();
    
    // Transparent background so it blends with the white section
    const aspect = spinGlobeContainer.clientWidth / spinGlobeContainer.clientHeight;
    const camera = new THREE.PerspectiveCamera(45, aspect, 0.1, 1000);
    
    // Adjust camera distance based on mobile vs desktop
    if (aspect < 1) {
        camera.position.z = 45; // Pull back heavily on mobile
    } else {
        camera.position.z = 26; // Normal desktop distance
    }

    
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(spinGlobeContainer.clientWidth, spinGlobeContainer.clientHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    spinGlobeContainer.appendChild(renderer.domElement);

    // Add High-Quality Lights
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.7); // Soft white light
    scene.add(ambientLight);
    
    const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
    directionalLight.position.set(10, 10, 10);
    scene.add(directionalLight);

    // Create the 3D Sphere (Globe)
    const geometry = new THREE.SphereGeometry(10, 64, 64);
    
    // Load high-resolution political earth map so all countries are visible
    const textureLoader = new THREE.TextureLoader();
    // Political map showing all countries clearly
    const mapTexture = textureLoader.load('https://unpkg.com/three-globe/example/img/earth-blue-marble.jpg');
    // Bump map for 3D mountains
    const bumpTexture = textureLoader.load('https://raw.githubusercontent.com/mrdoob/three.js/master/examples/textures/planets/earth_bump_1024.jpg');
    
    const material = new THREE.MeshStandardMaterial({ 
        map: mapTexture,
        bumpMap: bumpTexture,
        bumpScale: 0.15,
        roughness: 0.6,
        metalness: 0.1
    });
    
    const globe = new THREE.Mesh(geometry, material);
    // Tilt the earth slightly on its axis
    globe.rotation.z = 0.2;
    scene.add(globe);

    // Mouse Dragging Logic
    let isDragging = false;
    let previousMousePosition = { x: 0, y: 0 };
    
    spinGlobeContainer.addEventListener('mousedown', (e) => {
        isDragging = true;
        spinGlobeContainer.style.cursor = 'grabbing';
    });
    
    window.addEventListener('mouseup', () => {
        isDragging = false;
        spinGlobeContainer.style.cursor = 'grab';
    });
    
    window.addEventListener('mousemove', (e) => {
        if (isDragging) {
            const deltaMove = {
                x: e.clientX - previousMousePosition.x,
                y: e.clientY - previousMousePosition.y
            };
            
            globe.rotation.y += (deltaMove.x * 0.005);
            globe.rotation.x += (deltaMove.y * 0.005);
        }
        previousMousePosition = { x: e.clientX, y: e.clientY };
    });

    // Touch events for mobile dragging
    spinGlobeContainer.addEventListener('touchstart', (e) => {
        isDragging = true;
        previousMousePosition = { x: e.touches[0].clientX, y: e.touches[0].clientY };
    }, {passive: true});
    
    window.addEventListener('touchend', () => {
        isDragging = false;
    });
    
    window.addEventListener('touchmove', (e) => {
        if (isDragging) {
            const deltaMove = {
                x: e.touches[0].clientX - previousMousePosition.x,
                y: e.touches[0].clientY - previousMousePosition.y
            };
            globe.rotation.y += (deltaMove.x * 0.008);
            globe.rotation.x += (deltaMove.y * 0.008);
        }
        previousMousePosition = { x: e.touches[0].clientX, y: e.touches[0].clientY };
    }, {passive: true});

    // Render loop
    function animate() {
        requestAnimationFrame(animate);
        
        // Auto-spin globe if not being dragged
        if (!isDragging) {
            globe.rotation.y += 0.002;
        }
        
        renderer.render(scene, camera);
    }
    animate();

    // Handle Resize
    window.addEventListener('resize', () => {
        if (!spinGlobeContainer) return;
        const newAspect = spinGlobeContainer.clientWidth / spinGlobeContainer.clientHeight;
        camera.aspect = newAspect;
        
        // Update distance on resize
        if (newAspect < 1) {
            camera.position.z = 45;
        } else {
            camera.position.z = 26;
        }
        
        camera.updateProjectionMatrix();
        renderer.setSize(spinGlobeContainer.clientWidth, spinGlobeContainer.clientHeight);
    });
}
