const brandsContainer = document.getElementById('brands-3d-container');

if (brandsContainer && typeof THREE !== 'undefined' && typeof brandTextures !== 'undefined') {
    const scene = new THREE.Scene();
    
    // Camera
    const aspect = brandsContainer.clientWidth / brandsContainer.clientHeight;
    const camera = new THREE.PerspectiveCamera(45, aspect, 0.1, 1000);
    camera.position.set(0, 2, 14); // Pulled back to see everything
    camera.lookAt(0, 0, 0);

    // Renderer
    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(brandsContainer.clientWidth, brandsContainer.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    brandsContainer.appendChild(renderer.domElement);

    // Group for carousel
    const carousel = new THREE.Group();
    scene.add(carousel);

    // Load textures and create 3D panels
    const loader = new THREE.TextureLoader();
    const radius = 6;
    const numBrands = brandTextures.length;
    
    brandTextures.forEach((b64, index) => {
        // Create 3D card/panel geometry (base size 3x3)
        const geometry = new THREE.PlaneGeometry(3, 3);
        
        const texture = loader.load(b64, (tex) => {
            // Fix aspect ratio when image loads so logos don't squish
            const imgAspect = tex.image.width / tex.image.height;
            mesh.scale.set(imgAspect, 1, 1);
        });
        
        // Basic material with transparent support
        const material = new THREE.MeshBasicMaterial({ 
            map: texture, 
            transparent: true,
            side: THREE.DoubleSide
        });
        
        const mesh = new THREE.Mesh(geometry, material);
        
        // Position in a circle around the center
        const angle = (index / numBrands) * Math.PI * 2;
        mesh.position.x = Math.sin(angle) * radius;
        mesh.position.z = Math.cos(angle) * radius;
        
        // Make panel face outward
        mesh.rotation.y = angle;
        
        carousel.add(mesh);
    });

    // Add a center 3D model (A cool geometric crystal)
    const coreGeo = new THREE.OctahedronGeometry(2, 0); 
    const coreMat = new THREE.MeshBasicMaterial({ 
        color: 0xff5722, 
        wireframe: true,
        transparent: true,
        opacity: 0.5
    });
    const core = new THREE.Mesh(coreGeo, coreMat);
    scene.add(core);

    // Inner glowing core
    const innerGeo = new THREE.OctahedronGeometry(1.2, 0);
    const innerMat = new THREE.MeshBasicMaterial({ color: 0xff5722 });
    const innerCore = new THREE.Mesh(innerGeo, innerMat);
    core.add(innerCore);

    // Animation Loop
    function animate() {
        requestAnimationFrame(animate);
        
        // Slowly spin the entire carousel of logos
        carousel.rotation.y -= 0.003; 
        
        // Spin the 3D crystal in the center
        core.rotation.y += 0.01;
        core.rotation.x += 0.005;
        
        // Make the logos always face the camera (Billboard effect)
        // Or leave them facing outward. Facing outward looks more like a real 3D carousel.
        
        renderer.render(scene, camera);
    }
    animate();

    // Mouse Interaction (drag to spin carousel)
    let isDragging = false;
    let previousMousePosition = { x: 0, y: 0 };

    brandsContainer.addEventListener('mousedown', (e) => {
        isDragging = true;
        previousMousePosition = { x: e.offsetX, y: e.offsetY };
    });
    brandsContainer.addEventListener('mouseup', () => isDragging = false);
    brandsContainer.addEventListener('mouseleave', () => isDragging = false);
    
    brandsContainer.addEventListener('mousemove', (e) => {
        if (isDragging) {
            const deltaMove = {
                x: e.offsetX - previousMousePosition.x
            };
            carousel.rotation.y += deltaMove.x * 0.01;
            previousMousePosition = { x: e.offsetX, y: e.offsetY };
        }
    });

    // Touch support for Mobile
    brandsContainer.addEventListener('touchstart', (e) => {
        isDragging = true;
        previousMousePosition = { x: e.touches[0].clientX, y: e.touches[0].clientY };
    }, {passive: true});
    
    brandsContainer.addEventListener('touchend', () => isDragging = false);
    
    brandsContainer.addEventListener('touchmove', (e) => {
        if (isDragging) {
            const deltaMove = {
                x: e.touches[0].clientX - previousMousePosition.x
            };
            carousel.rotation.y += deltaMove.x * 0.01;
            previousMousePosition = { x: e.touches[0].clientX, y: e.touches[0].clientY };
        }
    }, {passive: true});

    // Resize Handler
    window.addEventListener('resize', () => {
        if (!brandsContainer) return;
        const newAspect = brandsContainer.clientWidth / brandsContainer.clientHeight;
        camera.aspect = newAspect;
        
        // Push camera back on mobile so it fits
        camera.position.z = newAspect < 1 ? 22 : 14;
        
        camera.updateProjectionMatrix();
        renderer.setSize(brandsContainer.clientWidth, brandsContainer.clientHeight);
    });
    
    // Initial scaling check
    if(aspect < 1) {
        camera.position.z = 22;
        camera.updateProjectionMatrix();
    }
}
