const brandsContainer = document.getElementById('brands-3d-container');

if (brandsContainer && typeof THREE !== 'undefined' && typeof brandTextures !== 'undefined') {
    const scene = new THREE.Scene();
    const aspect = brandsContainer.clientWidth / brandsContainer.clientHeight;
    // Wider FOV for a more dramatic, spacious look
    const camera = new THREE.PerspectiveCamera(55, aspect, 0.1, 1000);
    camera.position.set(0, 0, 18);
    
    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(brandsContainer.clientWidth, brandsContainer.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    brandsContainer.appendChild(renderer.domElement);
    
    // --- Dynamic Lighting for the 3D Cubes ---
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.7);
    scene.add(ambientLight);
    
    const dirLight = new THREE.DirectionalLight(0xffffff, 0.6);
    dirLight.position.set(10, 20, 15);
    scene.add(dirLight);

    const pointLight = new THREE.PointLight(0xff5722, 1.5, 50);
    pointLight.position.set(-5, -5, 10);
    scene.add(pointLight);
    
    // Function to generate the 1:1 texture with an orange border via 2D Canvas
    function createBrandTexture(b64, textName = null) {
        const canvas = document.createElement('canvas');
        canvas.width = 512;
        canvas.height = 512;
        const ctx = canvas.getContext('2d');
        
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, 512, 512);
        
        ctx.strokeStyle = '#ff5722';
        ctx.lineWidth = 24; 
        ctx.strokeRect(0, 0, 512, 512);
        
        const tex = new THREE.CanvasTexture(canvas);
        tex.anisotropy = renderer.capabilities.getMaxAnisotropy();
        tex.minFilter = THREE.LinearMipmapLinearFilter;
        
        if (textName) {
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
                const imgAspect = img.width / img.height;
                let dw = 400, dh = 400; // 56px padding
                if (imgAspect > 1) { dh = dw / imgAspect; } 
                else { dw = dh * imgAspect; }
                
                const dx = (512 - dw) / 2;
                const dy = (512 - dh) / 2;
                ctx.drawImage(img, dx, dy, dw, dh);
                
                ctx.strokeRect(0, 0, 512, 512);
                tex.needsUpdate = true;
            };
            img.src = b64;
        }
        return tex;
    }

    // Cluster group to hold all cubes
    const cluster = new THREE.Group();
    scene.add(cluster);
    
    const cubes = [];
    
    // Create 3D Cubes (Totally Different Style)
    brandTextures.forEach((b64, i) => {
        const tex = b64 === '' ? createBrandTexture(null, 'Dr. Madhavi Anjimati') : createBrandTexture(b64);
        
        // 3D Box instead of a flat plane
        const geometry = new THREE.BoxGeometry(3.5, 3.5, 3.5); 
        // Standard material reacts beautifully to the lights
        const material = new THREE.MeshStandardMaterial({ 
            map: tex,
            roughness: 0.3,
            metalness: 0.1
        });
        
        const mesh = new THREE.Mesh(geometry, material);
        
        // Arrange in an explosive 3x3 staggered grid
        const row = Math.floor(i / 3);
        const col = i % 3;
        
        const spacing = 5;
        const startX = (col - 1) * spacing;
        const startY = (row - 1) * -spacing;
        const startZ = (Math.random() - 0.5) * 6; // Pushed randomly in/out of the screen
        
        mesh.position.set(startX, startY, startZ);
        
        // Random initial tumbles
        mesh.rotation.x = Math.random() * Math.PI;
        mesh.rotation.y = Math.random() * Math.PI;
        
        // Unique animation speeds for each cube
        mesh.userData = {
            rotSpeedX: (Math.random() - 0.5) * 0.015,
            rotSpeedY: (Math.random() - 0.5) * 0.015,
            rotSpeedZ: (Math.random() - 0.5) * 0.015,
            bobSpeed: 1 + Math.random() * 2,
            bobOffset: Math.random() * Math.PI * 2,
            baseY: startY
        };
        
        mesh.scale.set(0, 0, 0); 
        
        cluster.add(mesh);
        cubes.push(mesh);
    });
    
    // Interaction variables
    let targetRotX = 0;
    let targetRotY = 0;
    let currentRotX = 0;
    let currentRotY = 0;
    let isDragging = false;
    let previousMouse = { x: 0, y: 0 };
    
    let entranceProgress = 0;
    let hasEntered = false;

    // Trigger entrance animation
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !hasEntered) {
            hasEntered = true;
        }
    }, { threshold: 0.2 });
    observer.observe(brandsContainer);

    // Render loop
    function animate() {
        requestAnimationFrame(animate);
        
        // Smoothly rotate the entire cluster (Parallax + Drag)
        currentRotX += (targetRotX - currentRotX) * 0.05;
        currentRotY += (targetRotY - currentRotY) * 0.05;
        cluster.rotation.x = currentRotX;
        cluster.rotation.y = currentRotY;

        // Entrance Animation
        if (hasEntered && entranceProgress < 1) {
            entranceProgress += 0.015;
            
            cubes.forEach((cube, i) => {
                const delay = i * 0.08;
                const p = Math.max(0, Math.min(1, (entranceProgress - delay) * 2.5));
                const scale = 1 - Math.pow(1 - p, 4); // Elastic cubic out
                cube.scale.set(scale, scale, scale);
            });
        }

        // Idle Tumbling & Bobbing Animation
        if (hasEntered) {
            const time = Date.now() * 0.001;
            cubes.forEach(cube => {
                // Tumble on all axes
                cube.rotation.x += cube.userData.rotSpeedX;
                cube.rotation.y += cube.userData.rotSpeedY;
                cube.rotation.z += cube.userData.rotSpeedZ;
                
                // Graceful gravity bobbing
                cube.position.y = cube.userData.baseY + Math.sin(time * cube.userData.bobSpeed + cube.userData.bobOffset) * 0.4;
            });
        }
        
        renderer.render(scene, camera);
    }
    animate();

    // Multidirectional Dragging Logic
    brandsContainer.addEventListener('mousedown', (e) => {
        isDragging = true;
        previousMouse = { x: e.clientX, y: e.clientY };
        brandsContainer.style.cursor = 'grabbing';
    });
    
    window.addEventListener('mouseup', () => {
        isDragging = false;
        brandsContainer.style.cursor = 'grab';
    });
    
    window.addEventListener('mousemove', (e) => {
        if (isDragging) {
            // Drag rotates the entire cluster in 3D
            const deltaX = e.clientX - previousMouse.x;
            const deltaY = e.clientY - previousMouse.y;
            targetRotY += deltaX * 0.005;
            targetRotX += deltaY * 0.005;
            previousMouse = { x: e.clientX, y: e.clientY };
        } else {
            // Parallax effect: cluster tracks mouse softly when just hovering
            const mouseX = (e.clientX / window.innerWidth) * 2 - 1;
            const mouseY = -(e.clientY / window.innerHeight) * 2 + 1;
            targetRotY = mouseX * 0.3; // Gentle tilt
            targetRotX = -mouseY * 0.3;
        }
    });

    brandsContainer.addEventListener('touchstart', (e) => {
        isDragging = true;
        previousMouse = { x: e.touches[0].clientX, y: e.touches[0].clientY };
    }, {passive: true});
    
    window.addEventListener('touchend', () => {
        isDragging = false;
    });
    
    window.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        const deltaX = e.touches[0].clientX - previousMouse.x;
        const deltaY = e.touches[0].clientY - previousMouse.y;
        targetRotY += deltaX * 0.006;
        targetRotX += deltaY * 0.006;
        previousMouse = { x: e.touches[0].clientX, y: e.touches[0].clientY };
    }, {passive: true});

    // Handle Mobile Sizing
    window.addEventListener('resize', () => {
        if (!brandsContainer) return;
        const newAspect = brandsContainer.clientWidth / brandsContainer.clientHeight;
        camera.aspect = newAspect;
        camera.position.z = newAspect < 1 ? 32 : 18; // Pull camera way back on mobile so all cubes fit
        camera.updateProjectionMatrix();
        renderer.setSize(brandsContainer.clientWidth, brandsContainer.clientHeight);
    });
    
    if (aspect < 1) {
        camera.position.z = 32;
        camera.updateProjectionMatrix();
    }
}
