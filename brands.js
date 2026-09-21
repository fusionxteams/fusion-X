const brandsContainer = document.getElementById('brands-3d-container');

if (brandsContainer && typeof THREE !== 'undefined' && typeof brandTextures !== 'undefined') {
    const scene = new THREE.Scene();
    scene.fog = new THREE.FogExp2(0xffffff, 0.025); // Digital fog fading into the white background
    
    const aspect = brandsContainer.clientWidth / brandsContainer.clientHeight;
    // Command Center perspective
    const camera = new THREE.PerspectiveCamera(55, aspect, 0.1, 1000);
    camera.position.set(0, 4, 20);
    
    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(brandsContainer.clientWidth, brandsContainer.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    brandsContainer.appendChild(renderer.domElement);
    
    // --- Digital World Architecture ---
    
    // 1. Tron-style Floor Grid (Orange neon)
    const gridHelper = new THREE.GridHelper(150, 60, 0xff5722, 0xff5722);
    gridHelper.position.y = -6;
    gridHelper.material.opacity = 0.15;
    gridHelper.material.transparent = true;
    scene.add(gridHelper);

    // 2. Rising Digital Data Streams (Particles moving strictly upwards)
    const particleGeo = new THREE.BufferGeometry();
    const particleCount = 250;
    const posArray = new Float32Array(particleCount * 3);
    const speedArray = new Float32Array(particleCount);
    for(let i=0; i < particleCount; i++) {
        posArray[i*3] = (Math.random() - 0.5) * 50;     // x
        posArray[i*3+1] = (Math.random() - 0.5) * 20;   // y
        posArray[i*3+2] = (Math.random() - 0.5) * 40;   // z
        speedArray[i] = 0.05 + Math.random() * 0.1;     // upward speed
    }
    particleGeo.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
    particleGeo.setAttribute('speed', new THREE.BufferAttribute(speedArray, 1));
    
    const particleMat = new THREE.PointsMaterial({
        size: 0.2,
        color: 0xff5722,
        transparent: true,
        opacity: 0.6,
        blending: THREE.AdditiveBlending
    });
    const dataStream = new THREE.Points(particleGeo, particleMat);
    scene.add(dataStream);

    // Function to generate Holographic HUD Texture with Scanlines
    function createDigitalTexture(b64, textName = null) {
        const canvas = document.createElement('canvas');
        canvas.width = 512;
        canvas.height = 512;
        const ctx = canvas.getContext('2d');
        
        // Base white background
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, 512, 512);
        
        // Glowing Neon Border
        ctx.shadowColor = '#ff5722';
        ctx.shadowBlur = 15;
        ctx.strokeStyle = '#ff5722';
        ctx.lineWidth = 12; 
        ctx.strokeRect(6, 6, 500, 500); 
        ctx.shadowBlur = 0; // reset
        
        // Background Digital Scanlines
        ctx.fillStyle = 'rgba(255, 87, 34, 0.04)';
        for(let y = 0; y < 512; y += 8) {
            ctx.fillRect(0, y, 512, 2);
        }
        
        const tex = new THREE.CanvasTexture(canvas);
        tex.anisotropy = renderer.capabilities.getMaxAnisotropy();
        
        if (textName) {
            ctx.fillStyle = '#ff5722';
            ctx.font = 'bold 50px "Courier New", monospace'; // Digital font look
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
                
                // Foreground Scanlines (Hologram Overlay)
                ctx.fillStyle = 'rgba(255, 255, 255, 0.25)';
                for(let y = 0; y < dh; y += 5) {
                    ctx.fillRect(dx, dy + y, dw, 1);
                }
                
                // Redraw crisp neon border on top
                ctx.shadowColor = '#ff5722';
                ctx.shadowBlur = 15;
                ctx.strokeRect(6, 6, 500, 500);
                
                tex.needsUpdate = true;
            };
            img.src = b64;
        }
        return tex;
    }

    // 3. Central HUD Network Array
    const arrayGroup = new THREE.Group();
    scene.add(arrayGroup);
    
    const numCards = brandTextures.length;
    
    brandTextures.forEach((b64, i) => {
        const tex = b64 === '' ? createDigitalTexture(null, 'Dr. Madhavi Anjimati') : createDigitalTexture(b64);
        
        const geometry = new THREE.PlaneGeometry(4, 4);
        const material = new THREE.MeshBasicMaterial({ 
            map: tex, 
            transparent: true,
            side: THREE.DoubleSide
        });
        
        const mesh = new THREE.Mesh(geometry, material);
        
        // Digital Floating Cylindrical Array
        const angle = (i / numCards) * Math.PI * 2;
        const radius = 9.5;
        
        mesh.position.x = Math.sin(angle) * radius;
        mesh.position.z = Math.cos(angle) * radius;
        
        // Tilt the screens slightly upwards towards the user like an Iron Man HUD
        mesh.rotation.y = angle;
        mesh.rotation.x = -0.15; 
        
        // Unique hovering physics
        mesh.userData = {
            baseY: (Math.random() - 0.5) * 3, // Stagger heights drastically
            bobSpeed: 1 + Math.random(),
            bobOffset: Math.random() * Math.PI * 2
        };
        
        mesh.position.y = mesh.userData.baseY;
        mesh.scale.set(0, 0, 0); 
        
        arrayGroup.add(mesh);
    });

    // 4. Glowing Neural Network Lines
    const lineMat = new THREE.LineBasicMaterial({ color: 0xff5722, transparent: true, opacity: 0.35 });
    const linesGeo = new THREE.BufferGeometry();
    const lineMesh = new THREE.LineSegments(linesGeo, lineMat);
    arrayGroup.add(lineMesh); // Spins with the screens

    // 5. Central Data Core (Spinning Wireframe Octahedron)
    const coreGeo = new THREE.OctahedronGeometry(1.8, 0);
    const coreMat = new THREE.MeshBasicMaterial({ color: 0xff5722, wireframe: true, transparent: true, opacity: 0.8 });
    const dataCore = new THREE.Mesh(coreGeo, coreMat);
    dataCore.position.y = -1;
    arrayGroup.add(dataCore);

    function updateNetworkLines() {
        const positions = [];
        // Connect each screen to its neighbors to form a glowing digital ring
        // and connect every screen to the central Data Core
        for(let i = 0; i < numCards; i++) {
            const p1 = arrayGroup.children[i].position;
            const p2 = arrayGroup.children[(i + 1) % numCards].position;
            
            // Ring connections
            positions.push(p1.x, p1.y, p1.z);
            positions.push(p2.x, p2.y, p2.z);
            
            // Core connections
            positions.push(p1.x, p1.y, p1.z);
            positions.push(dataCore.position.x, dataCore.position.y, dataCore.position.z); 
        }
        linesGeo.setAttribute('position', new THREE.Float32BufferAttribute(positions, 3));
    }

    let targetRotY = 0;
    let currentRotY = 0;
    let isDragging = false;
    let previousMouseX = 0;
    
    let entranceProgress = 0;
    let hasEntered = false;

    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !hasEntered) {
            hasEntered = true;
        }
    }, { threshold: 0.2 });
    observer.observe(brandsContainer);

    // Render loop
    function animate() {
        requestAnimationFrame(animate);
        const time = Date.now() * 0.001;

        if (hasEntered && entranceProgress < 1) {
            entranceProgress += 0.012; // Slower, more dramatic entrance
            const ease = 1 - Math.pow(1 - entranceProgress, 4);
            
            arrayGroup.children.forEach((child, i) => {
                if (child.isMesh && child !== dataCore) { // HUD Screens
                    const delay = i * 0.06;
                    const p = Math.max(0, Math.min(1, (entranceProgress - delay) * 3));
                    const scale = 1 - Math.pow(1 - p, 4);
                    child.scale.set(scale, scale, scale);
                }
            });
            dataCore.scale.set(ease, ease, ease);
        }

        if (hasEntered) {
            // Idle Bobbing for HUD Screens
            arrayGroup.children.forEach((child) => {
                if (child.isMesh && child !== dataCore) {
                    child.position.y = child.userData.baseY + Math.sin(time * child.userData.bobSpeed + child.userData.bobOffset) * 0.6;
                }
            });
            
            // The laser lines dynamically stretch as the screens bob up and down
            updateNetworkLines();
            
            // Spin data core wildly
            dataCore.rotation.y = time * 0.8;
            dataCore.rotation.x = time * 0.4;
        }

        // Animate Rising Data Streams (Matrix effect)
        const positions = dataStream.geometry.attributes.position.array;
        const speeds = dataStream.geometry.attributes.speed.array;
        for(let i=0; i<particleCount; i++) {
            positions[i*3+1] += speeds[i]; // Move Y up
            if (positions[i*3+1] > 20) {
                positions[i*3+1] = -10; // Reset to bottom
            }
        }
        dataStream.geometry.attributes.position.needsUpdate = true;

        // Smooth rotation dragging
        currentRotY += (targetRotY - currentRotY) * 0.05;
        arrayGroup.rotation.y = currentRotY;

        // Auto spin if not dragging
        if (!isDragging && hasEntered) {
            targetRotY -= 0.0025;
        }

        renderer.render(scene, camera);
    }
    animate();

    // Interaction Logic
    brandsContainer.addEventListener('mousedown', (e) => {
        isDragging = true;
        previousMouseX = e.clientX;
        brandsContainer.style.cursor = 'grabbing';
    });
    
    window.addEventListener('mouseup', () => {
        isDragging = false;
        brandsContainer.style.cursor = 'grab';
    });
    
    window.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        const deltaX = e.clientX - previousMouseX;
        targetRotY += deltaX * 0.005;
        previousMouseX = e.clientX;
    });

    brandsContainer.addEventListener('touchstart', (e) => {
        isDragging = true;
        previousMouseX = e.touches[0].clientX;
    }, {passive: true});
    
    window.addEventListener('touchend', () => {
        isDragging = false;
    });
    
    window.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        const deltaX = e.touches[0].clientX - previousMouseX;
        targetRotY += deltaX * 0.006;
        previousMouseX = e.touches[0].clientX;
    }, {passive: true});

    // Handle Mobile Sizing
    window.addEventListener('resize', () => {
        if (!brandsContainer) return;
        const newAspect = brandsContainer.clientWidth / brandsContainer.clientHeight;
        camera.aspect = newAspect;
        camera.position.z = newAspect < 1 ? 30 : 20; // Pull back for massive HUD array
        camera.updateProjectionMatrix();
        renderer.setSize(brandsContainer.clientWidth, brandsContainer.clientHeight);
    });
    
    if (aspect < 1) {
        camera.position.z = 30;
        camera.updateProjectionMatrix();
    }
}
