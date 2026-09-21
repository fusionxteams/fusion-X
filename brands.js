const brandsContainer = document.getElementById('brands-3d-container');

if (brandsContainer && typeof THREE !== 'undefined' && typeof brandTextures !== 'undefined') {
    const scene = new THREE.Scene();
    const aspect = brandsContainer.clientWidth / brandsContainer.clientHeight;
    const camera = new THREE.PerspectiveCamera(45, aspect, 0.1, 1000);
    camera.position.set(0, 0, 16);
    
    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(brandsContainer.clientWidth, brandsContainer.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    brandsContainer.appendChild(renderer.domElement);
    
    // Function to generate the 1:1 texture with an orange border
    function createBrandTexture(b64, textName = null) {
        const canvas = document.createElement('canvas');
        canvas.width = 512;
        canvas.height = 512;
        const ctx = canvas.getContext('2d');
        
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, 512, 512);
        
        ctx.strokeStyle = '#ff5722';
        ctx.lineWidth = 20; 
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
                let dw = 420, dh = 420; 
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

    const cards = [];
    const reflections = [];
    const numCards = brandTextures.length;
    
    // Create 3D planes for Cover Flow
    brandTextures.forEach((b64, i) => {
        const tex = b64 === '' ? createBrandTexture(null, 'Dr. Madhavi Anjimati') : createBrandTexture(b64);
        
        const geometry = new THREE.PlaneGeometry(5, 5);
        
        // Main Card
        const material = new THREE.MeshBasicMaterial({ map: tex, transparent: true });
        const mesh = new THREE.Mesh(geometry, material);
        scene.add(mesh);
        cards.push(mesh);
        
        // Fake Mirror Reflection on the Floor
        const refMat = new THREE.MeshBasicMaterial({ 
            map: tex, 
            transparent: true, 
            opacity: 0.15 
        });
        const refMesh = new THREE.Mesh(geometry, refMat);
        scene.add(refMesh);
        reflections.push(refMesh);
    });

    let targetIndex = Math.floor(numCards / 2); // Start in the middle
    let currentFloatIndex = targetIndex;
    let isDragging = false;
    let startX = 0;
    
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
        
        if (hasEntered && entranceProgress < 1) {
            entranceProgress += 0.02; // Fade in / slide up
        }

        // Smoothly interpolate the global index for buttery sliding
        currentFloatIndex += (targetIndex - currentFloatIndex) * 0.08;

        cards.forEach((card, i) => {
            const ref = reflections[i];
            
            // Continuous offset from the center active card
            const offset = i - currentFloatIndex; 
            const absOffset = Math.abs(offset);
            // We use a custom sign function because Math.sign(0) is 0, which breaks interpolation
            const sign = offset === 0 ? 0 : (offset > 0 ? 1 : -1); 
            
            // --- Cover Flow Math ---
            // Spread cards horizontally (2.5 units each), push center card out slightly more
            const targetX = (offset * 2.5) + (sign * Math.min(absOffset, 1) * 3);
            
            // Push side cards back into the screen
            const targetZ = -Math.min(absOffset, 3) * 1.5;
            
            // Tilt side cards inward (max 1.1 radians ~ 63 degrees)
            const targetRotY = Math.min(Math.max(offset * -0.6, -1.1), 1.1);
            
            // Apply Entrance Animation scaling and vertical slide
            const ease = 1 - Math.pow(1 - entranceProgress, 4);
            const scale = ease;
            const targetY = (1 - ease) * -10; // Slide up from bottom
            
            // Smoothly apply transforms to the cards
            card.position.x = targetX;
            card.position.y = targetY;
            card.position.z = targetZ;
            card.rotation.y = targetRotY;
            card.scale.set(scale, scale, scale);
            
            // Darken cards that are further away (depth shading)
            const colorValue = Math.max(0.3, 1 - (absOffset * 0.2));
            card.material.color.setRGB(colorValue, colorValue, colorValue);
            
            // Pin the reflection perfectly underneath
            ref.position.x = card.position.x;
            ref.position.y = card.position.y - 5.1; // Gap of 0.1
            ref.position.z = card.position.z;
            ref.rotation.y = card.rotation.y;
            ref.rotation.x = Math.PI; // Flip upside down
            ref.scale.set(scale, scale, scale);
            ref.material.color.setRGB(colorValue, colorValue, colorValue);
        });
        
        renderer.render(scene, camera);
    }
    animate();

    // Auto-scroll timer
    let autoScrollInterval = setInterval(() => {
        if (!isDragging && hasEntered && entranceProgress >= 1) {
            targetIndex = (targetIndex + 1) % numCards;
        }
    }, 4000);

    // Interactive Swiping/Dragging Logic
    brandsContainer.addEventListener('mousedown', (e) => {
        isDragging = true;
        startX = e.clientX;
        brandsContainer.style.cursor = 'grabbing';
        clearInterval(autoScrollInterval); // Stop auto-scroll if user interacts
    });
    
    window.addEventListener('mouseup', () => {
        isDragging = false;
        brandsContainer.style.cursor = 'grab';
    });
    window.addEventListener('mouseleave', () => {
        isDragging = false;
        brandsContainer.style.cursor = 'grab';
    });
    
    window.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        const delta = e.clientX - startX;
        
        // Threshold for a swipe
        if (delta > 40) { 
            targetIndex = Math.max(0, targetIndex - 1);
            startX = e.clientX;
        } else if (delta < -40) { 
            targetIndex = Math.min(numCards - 1, targetIndex + 1);
            startX = e.clientX;
        }
    });

    // Touch support
    brandsContainer.addEventListener('touchstart', (e) => {
        isDragging = true;
        startX = e.touches[0].clientX;
        clearInterval(autoScrollInterval);
    }, {passive: true});
    
    window.addEventListener('touchend', () => {
        isDragging = false;
    });
    
    window.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        const delta = e.touches[0].clientX - startX;
        if (delta > 30) { 
            targetIndex = Math.max(0, targetIndex - 1);
            startX = e.touches[0].clientX;
        } else if (delta < -30) { 
            targetIndex = Math.min(numCards - 1, targetIndex + 1);
            startX = e.touches[0].clientX;
        }
    }, {passive: true});

    // Handle Mobile Sizing
    window.addEventListener('resize', () => {
        if (!brandsContainer) return;
        const newAspect = brandsContainer.clientWidth / brandsContainer.clientHeight;
        camera.aspect = newAspect;
        camera.position.z = newAspect < 1 ? 24 : 16;
        camera.updateProjectionMatrix();
        renderer.setSize(brandsContainer.clientWidth, brandsContainer.clientHeight);
    });
    
    if (aspect < 1) {
        camera.position.z = 24;
        camera.updateProjectionMatrix();
    }
}
