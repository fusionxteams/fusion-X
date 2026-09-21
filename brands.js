const container = document.getElementById('brands-3d-container');

if (container && typeof THREE !== 'undefined' && typeof brandTextures !== 'undefined') {
    const scene = new THREE.Scene();
    const aspect = container.clientWidth / container.clientHeight;
    const camera = new THREE.PerspectiveCamera(45, aspect, 0.1, 1000);
    camera.position.set(0, 0, 18);
    
    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    container.appendChild(renderer.domElement);
    
    // Function to generate the 1:1 texture with an orange border via 2D Canvas
    function createBrandTexture(b64, textName = null) {
        const canvas = document.createElement('canvas');
        canvas.width = 512;
        canvas.height = 512;
        const ctx = canvas.getContext('2d');
        
        // Fill white background
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, 512, 512);
        
        // Draw crisp 10px inner orange border (20px stroke centered on edge)
        ctx.strokeStyle = '#ff5722';
        ctx.lineWidth = 20; 
        ctx.strokeRect(0, 0, 512, 512);
        
        const tex = new THREE.CanvasTexture(canvas);
        // Optimize texture quality
        tex.anisotropy = renderer.capabilities.getMaxAnisotropy();
        tex.minFilter = THREE.LinearMipmapLinearFilter;
        
        if (textName) {
            // Draw placeholder for Dr. Madhavi Anjimati
            ctx.fillStyle = '#ff5722';
            ctx.font = 'bold 50px "Segoe UI", sans-serif';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText("Dr. Madhavi", 256, 220);
            ctx.fillText("Anjimati", 256, 290);
            tex.needsUpdate = true;
        } else if (b64) {
            const img = new Image();
            img.onload = () => {
                // object-fit: contain simulation
                const imgAspect = img.width / img.height;
                let dw = 420, dh = 420; // 46px padding on each side
                if (imgAspect > 1) {
                    dh = dw / imgAspect;
                } else {
                    dw = dh * imgAspect;
                }
                
                const dx = (512 - dw) / 2;
                const dy = (512 - dh) / 2;
                ctx.drawImage(img, dx, dy, dw, dh);
                
                // Redraw border on top in case image spills slightly
                ctx.strokeRect(0, 0, 512, 512);
                tex.needsUpdate = true;
            };
            img.src = b64;
        }
        return tex;
    }

    const carousel = new THREE.Group();
    scene.add(carousel);
    
    const numCards = brandTextures.length; // 9
    const radius = 7.5;
    const cards = [];
    
    // Create 3D planes for all 9 brands
    brandTextures.forEach((b64, i) => {
        const tex = b64 === '' ? createBrandTexture(null, 'Dr. Madhavi Anjimati') : createBrandTexture(b64);
        
        const geometry = new THREE.PlaneGeometry(4, 4); // Perfect 1:1 square
        const material = new THREE.MeshBasicMaterial({ 
            map: tex,
            side: THREE.DoubleSide
        });
        
        const mesh = new THREE.Mesh(geometry, material);
        
        // Arrange in a cylinder
        const angle = (i / numCards) * Math.PI * 2;
        mesh.position.x = Math.sin(angle) * radius;
        mesh.position.z = Math.cos(angle) * radius;
        mesh.rotation.y = angle; // Face outward
        
        // Hide initially for entrance animation
        mesh.scale.set(0, 0, 0); 
        
        carousel.add(mesh);
        cards.push(mesh);
    });
    
    // Stunning 3D floating particles background effect
    const particleGeo = new THREE.BufferGeometry();
    const particleCount = 200;
    const posArray = new Float32Array(particleCount * 3);
    for(let i=0; i < particleCount * 3; i++) {
        posArray[i] = (Math.random() - 0.5) * 40; // Spread wide
    }
    particleGeo.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
    const particleMat = new THREE.PointsMaterial({
        size: 0.15,
        color: 0xff5722,
        transparent: true,
        opacity: 0.6
    });
    const particles = new THREE.Points(particleGeo, particleMat);
    scene.add(particles);

    // Interaction variables
    let targetRotation = 0;
    let currentRotation = 0;
    let isDragging = false;
    let previousMouseX = 0;
    
    let entranceProgress = 0;
    let hasEntered = false;

    // Intersection Observer to trigger the stunning entrance when scrolled into view
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !hasEntered) {
            hasEntered = true;
        }
    }, { threshold: 0.3 });
    observer.observe(container);

    // Render loop
    function animate() {
        requestAnimationFrame(animate);
        
        // 1. Staggered Pop-in Entrance Animation
        if (hasEntered && entranceProgress < 1.5) {
            entranceProgress += 0.02;
            
            cards.forEach((c, i) => {
                const delay = i * 0.1;
                // Calculate progress per card (clamped between 0 and 1)
                const p = Math.max(0, Math.min(1, (entranceProgress - delay) * 2));
                // Cubic easing
                const scale = 1 - Math.pow(1 - p, 4);
                c.scale.set(scale, scale, scale);
            });
            
            // Initial spin flourish
            const ease = 1 - Math.pow(1 - Math.min(1, entranceProgress), 3);
            carousel.rotation.y = (1 - ease) * Math.PI * 2;
        }

        // 2. Auto-spin
        if (!isDragging && hasEntered && entranceProgress >= 1) {
            targetRotation -= 0.002;
        }
        
        // 3. Smooth inertia application
        if (hasEntered && entranceProgress >= 1) {
            currentRotation += (targetRotation - currentRotation) * 0.1;
            carousel.rotation.y = currentRotation;
        }
        
        // 4. Slowly rotate particles
        particles.rotation.y += 0.001;
        particles.rotation.x += 0.0005;
        
        renderer.render(scene, camera);
    }
    animate();

    // Mouse / Touch Dragging Logic
    container.addEventListener('mousedown', (e) => {
        isDragging = true;
        previousMouseX = e.clientX;
        container.style.cursor = 'grabbing';
    });
    
    window.addEventListener('mouseup', () => {
        isDragging = false;
        container.style.cursor = 'grab';
    });
    
    window.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        const delta = e.clientX - previousMouseX;
        targetRotation += delta * 0.005; // Adjust sensitivity
        previousMouseX = e.clientX;
    });

    container.addEventListener('touchstart', (e) => {
        isDragging = true;
        previousMouseX = e.touches[0].clientX;
    }, {passive: true});
    
    window.addEventListener('touchend', () => {
        isDragging = false;
    });
    
    window.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        const delta = e.touches[0].clientX - previousMouseX;
        targetRotation += delta * 0.005;
        previousMouseX = e.touches[0].clientX;
    }, {passive: true});

    // Handle Mobile Sizing
    window.addEventListener('resize', () => {
        if (!container) return;
        const newAspect = container.clientWidth / container.clientHeight;
        camera.aspect = newAspect;
        camera.position.z = newAspect < 1 ? 28 : 18; // Pull back camera on tall mobile screens
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
    });
    
    // Initial scaling check for mobile
    if (aspect < 1) {
        camera.position.z = 28;
        camera.updateProjectionMatrix();
    }
}
