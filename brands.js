const brandsContainer = document.getElementById('brands-3d-container');

if (brandsContainer && typeof THREE !== 'undefined' && typeof brandTextures !== 'undefined') {
    const scene = new THREE.Scene();
    scene.background = new THREE.Color(0xffffff); // Pure white background
    
    // Add very light fog to fade out the logos in the back of the ring
    scene.fog = new THREE.FogExp2(0xffffff, 0.04);
    
    const aspect = brandsContainer.clientWidth / brandsContainer.clientHeight;
    // Tilted slightly up for a dynamic angle
    const camera = new THREE.PerspectiveCamera(45, aspect, 0.1, 1000);
    camera.position.set(0, 3, 24);
    camera.lookAt(0, 0, 0);
    
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: false });
    renderer.setSize(brandsContainer.clientWidth, brandsContainer.clientHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    brandsContainer.appendChild(renderer.domElement);

    // Simple, clean texture generation (1:1 with orange border)
    function createCleanTexture(b64, textName = null) {
        const canvas = document.createElement('canvas');
        canvas.width = 512;
        canvas.height = 512;
        const ctx = canvas.getContext('2d');
        
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, 512, 512);
        
        ctx.strokeStyle = '#ff5722';
        ctx.lineWidth = 20; 
        ctx.strokeRect(10, 10, 492, 492); 
        
        const tex = new THREE.CanvasTexture(canvas);
        tex.anisotropy = renderer.capabilities.getMaxAnisotropy();
        
        if (textName) {
            ctx.fillStyle = '#111111';
            ctx.font = 'bold 55px "Segoe UI", sans-serif';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText("Dr. Madhavi", 256, 220);
            ctx.fillText("Anjimati", 256, 290);
            tex.needsUpdate = true;
        } else if (b64) {
            const img = new Image();
            img.onload = () => {
                const imgAspect = img.width / img.height;
                let dw = 400, dh = 400; 
                if (imgAspect > 1) { dh = dw / imgAspect; } 
                else { dw = dh * imgAspect; }
                const dx = (512 - dw) / 2;
                const dy = (512 - dh) / 2;
                ctx.drawImage(img, dx, dy, dw, dh);
                
                // Draw border on top
                ctx.strokeRect(10, 10, 492, 492);
                tex.needsUpdate = true;
            };
            img.src = b64;
        }
        return tex;
    }

    const carouselGroup = new THREE.Group();
    scene.add(carouselGroup);
    
    const numCards = brandTextures.length;
    const radius = 11; // Size of the ring
    
    // Build the 3D Ring
    brandTextures.forEach((b64, i) => {
        const tex = b64 === '' ? createCleanTexture(null, 'Dr. Madhavi Anjimati') : createCleanTexture(b64);
        const geometry = new THREE.PlaneGeometry(5, 5);
        const material = new THREE.MeshBasicMaterial({ map: tex, side: THREE.DoubleSide });
        const mesh = new THREE.Mesh(geometry, material);
        
        const angle = (i / numCards) * Math.PI * 2;
        mesh.position.x = Math.sin(angle) * radius;
        mesh.position.z = Math.cos(angle) * radius;
        mesh.rotation.y = angle; // Face outward
        
        carouselGroup.add(mesh);
    });

    // Tilt the entire ring slightly for a better 3D perspective
    carouselGroup.rotation.x = 0.1;

    let targetRotation = 0;
    let currentRotation = 0;

    // Calculate rotation based on window scroll
    window.addEventListener('scroll', () => {
        // Multiplier controls how fast it spins when you scroll
        targetRotation = window.scrollY * 0.003;
    });

    // Render loop
    function animate() {
        requestAnimationFrame(animate);
        
        // Smoothly interpolate the rotation so it feels buttery, not rigid
        currentRotation += (targetRotation - currentRotation) * 0.08;
        
        // Apply the scroll rotation
        carouselGroup.rotation.y = currentRotation;
        
        // Add a very slow, continuous auto-spin so it's not dead when not scrolling
        targetRotation += 0.0015;

        renderer.render(scene, camera);
    }
    animate();

    // Remove the "Drag to explore" text since it's scroll-based now
    const dragText = brandsContainer.parentElement.querySelector('p');
    if (dragText) {
        dragText.innerText = "Scroll to explore";
    }
    brandsContainer.style.cursor = 'default';

    // Handle Mobile Sizing
    window.addEventListener('resize', () => {
        if (!brandsContainer) return;
        const newAspect = brandsContainer.clientWidth / brandsContainer.clientHeight;
        camera.aspect = newAspect;
        camera.position.z = newAspect < 1 ? 32 : 24;
        camera.updateProjectionMatrix();
        renderer.setSize(brandsContainer.clientWidth, brandsContainer.clientHeight);
    });
    
    if (aspect < 1) {
        camera.position.z = 32;
        camera.updateProjectionMatrix();
    }
}
