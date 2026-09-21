const brandsContainer = document.getElementById('brands-3d-container');

if (brandsContainer && typeof THREE !== 'undefined' && typeof brandTextures !== 'undefined') {
    const scene = new THREE.Scene();
    scene.background = new THREE.Color(0xffffff); // Pure white background
    scene.fog = new THREE.FogExp2(0xffffff, 0.04); // White fog for depth
    
    const aspect = brandsContainer.clientWidth / brandsContainer.clientHeight;
    const camera = new THREE.PerspectiveCamera(45, aspect, 0.1, 1000);
    camera.position.set(0, 0, 25);
    
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: false });
    renderer.setSize(brandsContainer.clientWidth, brandsContainer.clientHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2)); // optimize performance
    brandsContainer.appendChild(renderer.domElement);
    
    // Ambient Light
    scene.add(new THREE.AmbientLight(0xffffff, 1));

    // Function to generate crisp 1:1 Texture with Orange Border
    function createCleanTexture(b64, textName = null) {
        const canvas = document.createElement('canvas');
        canvas.width = 512;
        canvas.height = 512;
        const ctx = canvas.getContext('2d');
        
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, 512, 512);
        
        // Crisp Orange Border
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
                
                // Redraw border on top
                ctx.strokeRect(8, 8, 496, 496);
                tex.needsUpdate = true;
            };
            img.src = b64;
        }
        return tex;
    }

    const cardsGroup = new THREE.Group();
    scene.add(cardsGroup);
    
    const numCards = brandTextures.length;
    const cards = [];
    
    // Create Floating Cards
    brandTextures.forEach((b64, i) => {
        const tex = b64 === '' ? createCleanTexture(null, 'Dr. Madhavi Anjimati') : createCleanTexture(b64);
        
        const geometry = new THREE.PlaneGeometry(5, 5);
        const material = new THREE.MeshBasicMaterial({ 
            map: tex, 
            transparent: true,
            side: THREE.DoubleSide
        });
        
        const mesh = new THREE.Mesh(geometry, material);
        
        // Random starting positions in a 3D box
        const startX = (Math.random() - 0.5) * 30;
        const startY = (Math.random() - 0.5) * 15;
        const startZ = (Math.random() - 0.5) * 15 - 5;
        
        mesh.position.set(startX, startY, startZ);
        
        // Random rotations
        mesh.rotation.x = (Math.random() - 0.5) * 0.5;
        mesh.rotation.y = (Math.random() - 0.5) * 0.5;
        
        // Zero-gravity physics properties
        mesh.userData = {
            velocity: new THREE.Vector3(
                (Math.random() - 0.5) * 0.02,
                (Math.random() - 0.5) * 0.02,
                (Math.random() - 0.5) * 0.02
            ),
            rotVelocity: new THREE.Vector3(
                (Math.random() - 0.5) * 0.005,
                (Math.random() - 0.5) * 0.005,
                0
            ),
            originalScale: 1,
            targetPosition: new THREE.Vector3(),
            targetRotation: new THREE.Euler(),
            isHovered: false
        };
        
        cardsGroup.add(mesh);
        cards.push(mesh);
    });

    // Add floating particles in the background
    const particleGeo = new THREE.BufferGeometry();
    const particleCount = 100;
    const posArray = new Float32Array(particleCount * 3);
    for(let i=0; i < particleCount; i++) {
        posArray[i*3] = (Math.random() - 0.5) * 50;
        posArray[i*3+1] = (Math.random() - 0.5) * 30;
        posArray[i*3+2] = (Math.random() - 0.5) * 30 - 10;
    }
    particleGeo.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
    const particleMat = new THREE.PointsMaterial({
        size: 0.2,
        color: 0xff5722,
        transparent: true,
        opacity: 0.4
    });
    const particles = new THREE.Points(particleGeo, particleMat);
    scene.add(particles);

    // Interaction setup
    const raycaster = new THREE.Raycaster();
    const mouse = new THREE.Vector2();
    let hoveredCard = null;

    brandsContainer.addEventListener('mousemove', (event) => {
        const rect = brandsContainer.getBoundingClientRect();
        mouse.x = ((event.clientX - rect.left) / rect.width) * 2 - 1;
        mouse.y = -((event.clientY - rect.top) / rect.height) * 2 + 1;

        raycaster.setFromCamera(mouse, camera);
        const intersects = raycaster.intersectObjects(cards);

        if (intersects.length > 0) {
            if (hoveredCard !== intersects[0].object) {
                hoveredCard = intersects[0].object;
                brandsContainer.style.cursor = 'pointer';
            }
        } else {
            hoveredCard = null;
            brandsContainer.style.cursor = 'default';
        }
    });

    let autoSpinAngle = 0;

    // Render loop
    function animate() {
        requestAnimationFrame(animate);
        
        // Slowly rotate the entire background particle field
        particles.rotation.y += 0.001;
        particles.rotation.x += 0.0005;
        
        // Slowly pan the camera in a tiny circle
        autoSpinAngle += 0.002;
        camera.position.x = Math.sin(autoSpinAngle) * 3;
        camera.position.y = Math.cos(autoSpinAngle) * 1.5;
        camera.lookAt(0, 0, 0);

        cards.forEach((card) => {
            const data = card.userData;
            
            if (hoveredCard === card) {
                // Pull hovered card to the very front center
                const targetPos = new THREE.Vector3(camera.position.x, camera.position.y, 10);
                card.position.lerp(targetPos, 0.08);
                
                // Snap rotation to face camera perfectly
                const targetRot = new THREE.Euler(0, 0, 0);
                card.rotation.x += (targetRot.x - card.rotation.x) * 0.1;
                card.rotation.y += (targetRot.y - card.rotation.y) * 0.1;
                
                // Scale up
                const targetScale = 1.6;
                card.scale.setScalar(card.scale.x + (targetScale - card.scale.x) * 0.1);
                
                // Full opacity
                card.material.color.setRGB(1, 1, 1);
                card.material.opacity = 1;
            } else {
                // Zero-Gravity Free Float
                card.position.add(data.velocity);
                card.rotation.x += data.rotVelocity.x;
                card.rotation.y += data.rotVelocity.y;
                
                // Bounce off invisible walls
                if (card.position.x > 18 || card.position.x < -18) data.velocity.x *= -1;
                if (card.position.y > 10 || card.position.y < -10) data.velocity.y *= -1;
                if (card.position.z > 5 || card.position.z < -15) data.velocity.z *= -1;
                
                // Scale back to normal
                const targetScale = 1.0;
                card.scale.setScalar(card.scale.x + (targetScale - card.scale.x) * 0.05);

                // If something else is hovered, fade this one into the background (depth of field effect)
                if (hoveredCard) {
                    card.material.color.setRGB(0.6, 0.6, 0.6); // Darken
                } else {
                    card.material.color.setRGB(1, 1, 1); // Normal
                }
            }
        });

        renderer.render(scene, camera);
    }
    animate();

    // Handle Mobile Sizing
    window.addEventListener('resize', () => {
        if (!brandsContainer) return;
        const newAspect = brandsContainer.clientWidth / brandsContainer.clientHeight;
        camera.aspect = newAspect;
        camera.updateProjectionMatrix();
        renderer.setSize(brandsContainer.clientWidth, brandsContainer.clientHeight);
    });
}
