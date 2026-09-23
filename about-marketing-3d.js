// about-marketing-3d.js
// Advanced Interactive 3D Digital Marketing Ecosystem
(function () {
    const canvas = document.getElementById('about-who-canvas');
    if (!canvas || typeof THREE === 'undefined') return;

    const W = canvas.clientWidth, H = canvas.clientHeight;
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(55, W / H, 0.1, 500);
    camera.position.set(0, 10, 140);

    const renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true });
    renderer.setSize(W, H);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

    // Lighting
    scene.add(new THREE.AmbientLight(0xffffff, 0.4));
    const dirL = new THREE.DirectionalLight(0xff5722, 2.5);
    dirL.position.set(2, 3, 2);
    scene.add(dirL);
    const blueL = new THREE.DirectionalLight(0x4488ff, 1.5);
    blueL.position.set(-2, -1, -2);
    scene.add(blueL);

    const root = new THREE.Group();
    scene.add(root);

    // ── Channel data ──────────────────────────────────────────
    const channels = [
        { label: 'Brand Core',color: 0xff3300, pos: [0, 0, 0],      size: 11, ring: true  },
        { label: 'Google Ads',color: 0xff7043, pos: [45, 18, 0],     size: 5.5 },
        { label: 'Meta Ads',  color: 0xff8a65, pos: [-42, 20, 8],    size: 5.5 },
        { label: 'SEO',       color: 0xffab91, pos: [28, -35, 10],   size: 6   },
        { label: 'Web Dev',   color: 0xd4511f, pos: [-30, -30, 5],   size: 5   },
        { label: 'Email',     color: 0xff6e40, pos: [50, -10, -15],  size: 4   },
        { label: 'Analytics', color: 0xbf360c, pos: [-50, -5, -12],  size: 4.5 },
        { label: 'Content',   color: 0xff9e80, pos: [10, 45, -10],   size: 4.5 },
        { label: 'Branding',  color: 0xe64a19, pos: [-15, 42, 5],    size: 4.5 },
    ];

    const nodes = [];
    const interactables = []; // For Raycaster

    // ── Build nodes ───────────────────────────────────────────
    channels.forEach(ch => {
        const group = new THREE.Group();
        group.position.set(...ch.pos);
        root.add(group);

        // Core Sphere (Glassy)
        const geo = new THREE.SphereGeometry(ch.size, 32, 32);
        const mat = new THREE.MeshPhysicalMaterial({
            color: ch.color,
            metalness: 0.1,
            roughness: 0.2,
            transmission: 0.6,
            thickness: 0.5,
            transparent: true,
            opacity: 0.95
        });
        const mesh = new THREE.Mesh(geo, mat);
        group.add(mesh);
        
        // Inner glowing core
        const innerGeo = new THREE.SphereGeometry(ch.size * 0.5, 16, 16);
        const innerMat = new THREE.MeshBasicMaterial({ color: 0xffffff });
        const innerMesh = new THREE.Mesh(innerGeo, innerMat);
        group.add(innerMesh);

        // Glow halo ring around each node
        const ringGeo = new THREE.RingGeometry(ch.size + 2, ch.size + 4, 64);
        const ringMat = new THREE.MeshBasicMaterial({
            color: ch.color,
            side: THREE.DoubleSide,
            transparent: true,
            opacity: 0.25,
            blending: THREE.AdditiveBlending
        });
        const ring = new THREE.Mesh(ringGeo, ringMat);
        group.add(ring);

        // Orbit ring for the central node
        if (ch.ring) {
            const orbitGeo = new THREE.TorusGeometry(26, 0.3, 16, 100);
            const orbitMat = new THREE.MeshBasicMaterial({ color: 0xff5722, transparent: true, opacity: 0.4 });
            const orbit = new THREE.Mesh(orbitGeo, orbitMat);
            orbit.rotation.x = Math.PI / 2.5;
            root.add(orbit);

            const orbit2Geo = new THREE.TorusGeometry(36, 0.2, 16, 100);
            const orbit2 = new THREE.Mesh(orbit2Geo, new THREE.MeshBasicMaterial({ color: 0xff8a65, transparent: true, opacity: 0.2 }));
            orbit2.rotation.x = Math.PI / 4;
            orbit2.rotation.z = 0.5;
            root.add(orbit2);
        }

        // Label sprite
        const lc = document.createElement('canvas');
        lc.width = 256; lc.height = 80;
        const ctx = lc.getContext('2d');
        ctx.fillStyle = 'rgba(17,17,17,0.85)';
        ctx.roundRect(8, 20, 240, 45, 12);
        ctx.fill();
        ctx.strokeStyle = 'rgba(255,87,34,0.8)';
        ctx.lineWidth = 2;
        ctx.stroke();
        ctx.fillStyle = '#ffffff';
        ctx.font = 'bold 22px Segoe UI';
        ctx.textAlign = 'center';
        ctx.fillText(ch.label.toUpperCase(), 128, 50);
        
        const tex = new THREE.CanvasTexture(lc);
        const sprite = new THREE.Sprite(new THREE.SpriteMaterial({ map: tex, transparent: true, depthTest: false }));
        sprite.position.set(0, ch.size + 10, 0);
        sprite.scale.set(24, 7.5, 1);
        group.add(sprite);

        // Save for animation and interaction
        mesh.userData = { originalScale: 1, targetScale: 1, ring: ring };
        interactables.push(mesh);
        nodes.push({ group, baseY: ch.pos[1], phase: Math.random() * Math.PI * 2 });
    });

    // ── Draw Curved Connection Lines (Bezier) ───────────────────
    const center = new THREE.Vector3(0, 0, 0);
    const lineMat = new THREE.LineBasicMaterial({ 
        color: 0xff5722, 
        transparent: true, 
        opacity: 0.35,
        blending: THREE.AdditiveBlending 
    });

    nodes.slice(1).forEach(n => {
        // Create a quadratic bezier curve instead of straight line
        const end = n.group.position.clone();
        const mid = end.clone().multiplyScalar(0.5);
        mid.y += 15; // arch upward
        
        const curve = new THREE.QuadraticBezierCurve3(center, mid, end);
        const points = curve.getPoints(50);
        const lineGeo = new THREE.BufferGeometry().setFromPoints(points);
        
        root.add(new THREE.Line(lineGeo, lineMat));
    });

    // ── Mouse Interactivity (Raycaster) ───────────────────────
    const raycaster = new THREE.Raycaster();
    const mouse = new THREE.Vector2(-999, -999);

    window.addEventListener('mousemove', (e) => {
        const rect = canvas.getBoundingClientRect();
        // Normalize mouse coordinates to -1 to +1 relative to the canvas
        mouse.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
        mouse.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;
    });

    // ── Animate ───────────────────────────────────────────────
    let t = 0;
    function loop() {
        requestAnimationFrame(loop);
        t += 0.008;

        // Slow auto-rotation
        root.rotation.y += 0.003;
        root.rotation.x = Math.sin(t * 0.3) * 0.1;

        // Float nodes gently & make rings face camera
        nodes.forEach(n => {
            n.group.position.y = n.baseY + Math.sin(t + n.phase) * 3;
            // The ring is the 3rd child of the group (index 2)
            if (n.group.children[2]) {
                n.group.children[2].lookAt(camera.position);
            }
        });

        // Handle Raycaster (Hover effect)
        raycaster.setFromCamera(mouse, camera);
        const intersects = raycaster.intersectObjects(interactables);
        
        // Reset all targets
        interactables.forEach(mesh => { mesh.userData.targetScale = 1; });
        
        // Grow intersected
        if (intersects.length > 0) {
            document.body.style.cursor = 'pointer';
            intersects[0].object.userData.targetScale = 1.3;
        } else {
            document.body.style.cursor = 'default';
        }

        // Smooth scale interpolation
        interactables.forEach(mesh => {
            const scale = mesh.scale.x;
            const target = mesh.userData.targetScale;
            mesh.scale.setScalar(scale + (target - scale) * 0.1);
            mesh.userData.ring.scale.setScalar(scale + (target - scale) * 0.1);
        });

        renderer.render(scene, camera);
    }
    loop();

    window.addEventListener('resize', () => {
        const nW = canvas.clientWidth, nH = canvas.clientHeight;
        camera.aspect = nW / nH;
        camera.updateProjectionMatrix();
        renderer.setSize(nW, nH);
    });
})();
