// about-marketing-3d.js
// Relevant 3D Digital Marketing Ecosystem — interconnected channel nodes
(function () {
    const canvas = document.getElementById('about-who-canvas');
    if (!canvas || typeof THREE === 'undefined') return;

    const W = canvas.clientWidth, H = canvas.clientHeight;
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(55, W / H, 0.1, 500);
    camera.position.set(0, 10, 130);

    const renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true });
    renderer.setSize(W, H);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

    // Lighting
    scene.add(new THREE.AmbientLight(0xffffff, 0.6));
    const dirL = new THREE.DirectionalLight(0xff5722, 2.0);
    dirL.position.set(2, 3, 2);
    scene.add(dirL);
    const backL = new THREE.DirectionalLight(0xffffff, 0.4);
    backL.position.set(-2, -1, -2);
    scene.add(backL);

    const root = new THREE.Group();
    scene.add(root);

    // ── Channel data ──────────────────────────────────────────
    const channels = [
        { label: 'SEO',       color: 0xff5722, pos: [0, 0, 0],      size: 9,  ring: true  },
        { label: 'Google Ads',color: 0xff7043, pos: [45, 18, 0],     size: 5.5 },
        { label: 'Meta Ads',  color: 0xff8a65, pos: [-42, 20, 8],    size: 5.5 },
        { label: 'Social',    color: 0xffab91, pos: [28, -35, 10],   size: 5   },
        { label: 'Web Dev',   color: 0xd4511f, pos: [-30, -30, 5],   size: 5   },
        { label: 'Email',     color: 0xff6e40, pos: [50, -10, -15],  size: 4   },
        { label: 'Analytics', color: 0xbf360c, pos: [-50, -5, -12],  size: 4   },
        { label: 'Content',   color: 0xff9e80, pos: [10, 45, -10],   size: 4.5 },
        { label: 'Branding',  color: 0xe64a19, pos: [-15, 42, 5],    size: 4.5 },
    ];

    const nodes = [];

    // ── Build nodes ───────────────────────────────────────────
    channels.forEach(ch => {
        const geo = new THREE.SphereGeometry(ch.size, 32, 32);
        const mat = new THREE.MeshPhongMaterial({
            color: ch.color,
            shininess: 120,
            transparent: true,
            opacity: 0.92
        });
        const mesh = new THREE.Mesh(geo, mat);
        mesh.position.set(...ch.pos);
        root.add(mesh);

        // Glow halo ring around each node
        const ringGeo = new THREE.RingGeometry(ch.size + 1.5, ch.size + 3.5, 64);
        const ringMat = new THREE.MeshBasicMaterial({
            color: ch.color,
            side: THREE.DoubleSide,
            transparent: true,
            opacity: 0.18
        });
        const ring = new THREE.Mesh(ringGeo, ringMat);
        ring.lookAt(camera.position);
        mesh.add(ring);

        // Orbit ring for the central SEO node
        if (ch.ring) {
            const orbitGeo = new THREE.TorusGeometry(22, 0.5, 8, 80);
            const orbitMat = new THREE.MeshBasicMaterial({ color: 0xff5722, transparent: true, opacity: 0.25 });
            const orbit = new THREE.Mesh(orbitGeo, orbitMat);
            orbit.rotation.x = Math.PI / 2.5;
            root.add(orbit);

            const orbit2Geo = new THREE.TorusGeometry(30, 0.35, 8, 80);
            const orbit2 = new THREE.Mesh(orbit2Geo, new THREE.MeshBasicMaterial({ color: 0xff8a65, transparent: true, opacity: 0.15 }));
            orbit2.rotation.x = Math.PI / 4;
            orbit2.rotation.z = 0.5;
            root.add(orbit2);
        }

        // Label sprite
        const lc = document.createElement('canvas');
        lc.width = 256; lc.height = 80;
        const ctx = lc.getContext('2d');
        ctx.fillStyle = 'rgba(255,87,34,0.85)';
        ctx.roundRect(8, 20, 240, 45, 12);
        ctx.fill();
        ctx.fillStyle = '#ffffff';
        ctx.font = 'bold 24px Segoe UI';
        ctx.textAlign = 'center';
        ctx.fillText(ch.label, 128, 50);
        const tex = new THREE.CanvasTexture(lc);
        const sprite = new THREE.Sprite(new THREE.SpriteMaterial({ map: tex, transparent: true }));
        sprite.position.set(0, ch.size + 9, 0);
        sprite.scale.set(24, 7, 1);
        mesh.add(sprite);

        nodes.push({ mesh, baseY: ch.pos[1], phase: Math.random() * Math.PI * 2 });
    });

    // ── Draw connection lines between nodes ───────────────────
    const lineMat = new THREE.LineBasicMaterial({ color: 0xff5722, transparent: true, opacity: 0.22 });
    const center = new THREE.Vector3(0, 0, 0);
    nodes.slice(1).forEach(n => {
        const pts = [center, n.mesh.position.clone()];
        const lineGeo = new THREE.BufferGeometry().setFromPoints(pts);
        root.add(new THREE.Line(lineGeo, lineMat));
    });

    // Cross-links between satellite nodes (every other pair)
    for (let i = 1; i < nodes.length - 1; i += 2) {
        const pts = [nodes[i].mesh.position.clone(), nodes[i + 1].mesh.position.clone()];
        const lg = new THREE.BufferGeometry().setFromPoints(pts);
        root.add(new THREE.Line(lg, new THREE.LineBasicMaterial({ color: 0xffccbc, transparent: true, opacity: 0.12 })));
    }

    // ── Orbiting data packets (small spheres moving along lines) ──
    const packets = [];
    nodes.slice(1, 5).forEach(n => {
        const pg = new THREE.SphereGeometry(1.2, 8, 8);
        const pm = new THREE.MeshBasicMaterial({ color: 0xffffff });
        const packet = new THREE.Mesh(pg, pm);
        root.add(packet);
        packets.push({ mesh: packet, target: n.mesh.position.clone(), phase: Math.random() * Math.PI * 2 });
    });

    // ── Animate ───────────────────────────────────────────────
    let t = 0;
    function loop() {
        requestAnimationFrame(loop);
        t += 0.008;

        // Slow auto-rotation
        root.rotation.y += 0.005;
        root.rotation.x = Math.sin(t * 0.3) * 0.15;

        // Float nodes gently
        nodes.forEach(n => {
            n.mesh.position.y = n.baseY + Math.sin(t + n.phase) * 2.5;
        });

        // Animate data packets along lines
        packets.forEach((p, i) => {
            const progress = (Math.sin(t * 1.2 + p.phase) + 1) / 2;
            p.mesh.position.lerpVectors(center, p.target, progress);
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
