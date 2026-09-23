// about-3d-hero.js
// Three.js Hero Particle Field with Scroll Warp for About Us page

(function () {
    const container = document.getElementById('about-hero-canvas');
    if (!container || typeof THREE === 'undefined') return;

    const W = container.clientWidth;
    const H = container.clientHeight;

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(70, W / H, 0.1, 2000);
    camera.position.set(0, 0, 400);

    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(W, H);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    container.appendChild(renderer.domElement);

    // ---- PARTICLE GRID ----
    const COUNT = 3000;
    const geo = new THREE.BufferGeometry();
    const pos = new Float32Array(COUNT * 3);
    const col = new Float32Array(COUNT * 3);
    const vel = new Float32Array(COUNT);   // individual speed factor

    const orange = new THREE.Color(0xff5722);
    const grey   = new THREE.Color(0xcccccc);

    for (let i = 0; i < COUNT; i++) {
        pos[i * 3]     = (Math.random() - 0.5) * 1200;
        pos[i * 3 + 1] = (Math.random() - 0.5) * 600;
        pos[i * 3 + 2] = (Math.random() - 0.5) * 800;

        vel[i] = 0.3 + Math.random() * 0.7;

        const c = Math.random() > 0.25 ? grey : orange;
        col[i * 3]     = c.r;
        col[i * 3 + 1] = c.g;
        col[i * 3 + 2] = c.b;
    }

    geo.setAttribute('position', new THREE.BufferAttribute(pos, 3));
    geo.setAttribute('color',    new THREE.BufferAttribute(col, 3));

    const mat = new THREE.ShaderMaterial({
        uniforms: {
            uTime:   { value: 0 },
            uScroll: { value: 0 },
            uMouse:  { value: new THREE.Vector2(0, 0) }
        },
        vertexShader: `
            attribute vec3 color;
            varying vec3 vColor;
            uniform float uTime;
            uniform float uScroll;
            uniform vec2 uMouse;

            void main() {
                vColor = color;
                vec3 p = position;

                // Gentle wave
                p.y += sin(p.x * 0.01 + uTime * 0.8) * 15.0;
                p.x += cos(p.z * 0.01 + uTime * 0.6) * 10.0;

                // Scroll-driven tunnel suck
                float pull = uScroll * 600.0;
                p.z += pull;
                if(p.z > 400.0) p.z -= 800.0;

                // Mouse parallax
                p.x += uMouse.x * 30.0;
                p.y += uMouse.y * 20.0;

                vec4 mvPos = modelViewMatrix * vec4(p, 1.0);
                gl_PointSize = 3.5 * (300.0 / -mvPos.z);
                gl_Position  = projectionMatrix * mvPos;
            }
        `,
        fragmentShader: `
            varying vec3 vColor;
            void main() {
                float r = distance(gl_PointCoord, vec2(0.5));
                if(r > 0.5) discard;
                gl_FragColor = vec4(vColor, 1.0 - r * 1.8);
            }
        `,
        transparent: true,
        vertexColors: true,
        depthWrite: false
    });

    const points = new THREE.Points(geo, mat);
    scene.add(points);

    // ---- FLOATING RINGS ----
    const ringGroup = new THREE.Group();
    const ringColors = [0xff5722, 0xff8a65, 0xcccccc];
    for (let i = 0; i < 3; i++) {
        const r = new THREE.RingGeometry(60 + i * 40, 63 + i * 40, 80);
        const rm = new THREE.MeshBasicMaterial({ color: ringColors[i], side: THREE.DoubleSide, transparent: true, opacity: 0.12 });
        const ring = new THREE.Mesh(r, rm);
        ring.rotation.x = Math.PI / 3 + i * 0.3;
        ring.rotation.y = i * 0.5;
        ringGroup.add(ring);
    }
    scene.add(ringGroup);

    // ---- SCROLL ----
    let scrollY = 0;
    window.addEventListener('scroll', () => {
        const max = document.body.scrollHeight - window.innerHeight;
        scrollY = max > 0 ? window.scrollY / max : 0;
    });

    // ---- MOUSE ----
    const mouse = new THREE.Vector2();
    window.addEventListener('mousemove', e => {
        mouse.x = (e.clientX / window.innerWidth) * 2 - 1;
        mouse.y = -((e.clientY / window.innerHeight) * 2 - 1);
    });

    // ---- ANIMATE ----
    let t = 0;
    function loop() {
        requestAnimationFrame(loop);
        t += 0.008;

        mat.uniforms.uTime.value   = t;
        mat.uniforms.uScroll.value += (scrollY - mat.uniforms.uScroll.value) * 0.05;
        mat.uniforms.uMouse.x      += (mouse.x - mat.uniforms.uMouse.value.x) * 0.08;
        mat.uniforms.uMouse.y      += (mouse.y - mat.uniforms.uMouse.value.y) * 0.08;
        mat.uniforms.uMouse.value.x += (mouse.x - mat.uniforms.uMouse.value.x) * 0.08;
        mat.uniforms.uMouse.value.y += (mouse.y - mat.uniforms.uMouse.value.y) * 0.08;

        ringGroup.rotation.y += 0.003;
        ringGroup.rotation.x += 0.001;

        renderer.render(scene, camera);
    }
    loop();

    window.addEventListener('resize', () => {
        const nW = container.clientWidth;
        const nH = container.clientHeight;
        camera.aspect = nW / nH;
        camera.updateProjectionMatrix();
        renderer.setSize(nW, nH);
    });
})();
