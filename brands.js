const brandsContainer = document.getElementById('brands-3d-container');

if (brandsContainer && typeof THREE !== 'undefined' && typeof brandTextures !== 'undefined') {
    const scene = new THREE.Scene();
    scene.background = new THREE.Color(0xffffff); // Pure white
    scene.fog = new THREE.FogExp2(0xffffff, 0.015); // Fog to hide logos popping in far away
    
    const aspect = brandsContainer.clientWidth / brandsContainer.clientHeight;
    const camera = new THREE.PerspectiveCamera(60, aspect, 0.1, 1000);
    camera.position.set(0, 0, 0); // Start at origin
    
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
        ctx.lineWidth = 16; 
        ctx.strokeRect(8, 8, 496, 496); 
        
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
                ctx.strokeRect(8, 8, 496, 496);
                tex.needsUpdate = true;
            };
            img.src = b64;
        }
        return tex;
    }

    const tunnelGroup = new THREE.Group();
    scene.add(tunnelGroup);
    
    const numCards = brandTextures.length;
    const cards = [];
    
    // Tunnel Settings
    const tunnelDepth = 150; // Total length of the tunnel
    const zSpacing = tunnelDepth / numCards; // Space between each card
    
    // Build the Infinite Tunnel
    brandTextures.forEach((b64, i) => {
        const tex = b64 === '' ? createCleanTexture(null, 'Dr. Madhavi Anjimati') : createCleanTexture(b64);
        const geometry = new THREE.PlaneGeometry(6, 6);
        const material = new THREE.MeshBasicMaterial({ map: tex, side: THREE.DoubleSide });
        const mesh = new THREE.Mesh(geometry, material);
        
        // Randomly place along the edges of a circle (forming a tube/tunnel shape)
        const angle = Math.random() * Math.PI * 2;
        const radius = 6 + Math.random() * 4; // Distance from center of tunnel
        
        mesh.position.x = Math.cos(angle) * radius;
        mesh.position.y = Math.sin(angle) * radius;
        
        // Stagger them deeply down the Z axis (into the screen)
        mesh.position.z = - (i * zSpacing);
        
        // Random slight tilts
        mesh.rotation.x = (Math.random() - 0.5) * 0.4;
        mesh.rotation.y = (Math.random() - 0.5) * 0.4;
        
        // Save base data for infinite looping
        mesh.userData = {
            baseAngle: angle,
            baseRadius: radius,
            zOffset: -(i * zSpacing)
        };
        
        tunnelGroup.add(mesh);
        cards.push(mesh);
    });

    // Add speed lines/stars to make the tunnel feel fast
    const particleGeo = new THREE.BufferGeometry();
    const particleCount = 200;
    const posArray = new Float32Array(particleCount * 3);
    for(let i=0; i < particleCount; i++) {
        posArray[i*3] = (Math.random() - 0.5) * 40;
        posArray[i*3+1] = (Math.random() - 0.5) * 40;
        posArray[i*3+2] = -Math.random() * tunnelDepth;
    }
    particleGeo.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
    const particleMat = new THREE.PointsMaterial({ color: 0xff5722, size: 0.1, transparent: true, opacity: 0.5 });
    const stars = new THREE.Points(particleGeo, particleMat);
    scene.add(stars);

    let targetCameraZ = 0;
    let currentCameraZ = 0;

    // Calculate forward movement based strictly on window scroll
    window.addEventListener('scroll', () => {
        // As you scroll down, targetCameraZ becomes more negative (flying into the screen)
        // Multiplier controls how fast you fly based on scrolling
        targetCameraZ = -(window.scrollY * 0.08);
    });

    // Render loop
    function animate() {
        requestAnimationFrame(animate);
        
        // Smoothly interpolate the camera movement
        currentCameraZ += (targetCameraZ - currentCameraZ) * 0.08;
        camera.position.z = currentCameraZ;
        
        // Auto-spin the camera slightly as it flies for a barrel-roll effect
        camera.rotation.z = currentCameraZ * 0.005;
        camera.position.x = Math.sin(currentCameraZ * 0.02) * 2;
        camera.position.y = Math.cos(currentCameraZ * 0.02) * 2;

        // INFINITE LOOPING LOGIC
        cards.forEach((card) => {
            // If the camera flies PAST the card (card is behind the camera)
            if (card.position.z > camera.position.z + 10) {
                // Teleport the card to the very back of the tunnel
                card.position.z -= tunnelDepth;
            }
            // If the user scrolls BACKWARDS (card is too far ahead)
            else if (card.position.z < camera.position.z - tunnelDepth) {
                // Teleport the card forward
                card.position.z += tunnelDepth;
            }
        });

        // Do the same for particles
        const positions = stars.geometry.attributes.position.array;
        for(let i=0; i<particleCount; i++) {
            if (positions[i*3+2] > camera.position.z + 10) {
                positions[i*3+2] -= tunnelDepth;
            } else if (positions[i*3+2] < camera.position.z - tunnelDepth) {
                positions[i*3+2] += tunnelDepth;
            }
        }
        stars.geometry.attributes.position.needsUpdate = true;

        renderer.render(scene, camera);
    }
    animate();

    const dragText = brandsContainer.parentElement.querySelector('p');
    if (dragText) {
        dragText.innerText = "Scroll to fly through";
    }
    brandsContainer.style.cursor = 'default';

    // Handle Mobile Sizing
    window.addEventListener('resize', () => {
        if (!brandsContainer) return;
        const newAspect = brandsContainer.clientWidth / brandsContainer.clientHeight;
        camera.aspect = newAspect;
        camera.updateProjectionMatrix();
        renderer.setSize(brandsContainer.clientWidth, brandsContainer.clientHeight);
    });
}
