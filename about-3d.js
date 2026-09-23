// about-3d.js
const container = document.getElementById('about-canvas-container');

if (container && typeof THREE !== 'undefined') {
    const scene = new THREE.Scene();
    scene.background = new THREE.Color(0xffffff); // White background theme
    scene.fog = new THREE.FogExp2(0xffffff, 0.008);

    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.z = 200;

    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: false });
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    container.appendChild(renderer.domElement);

    // --- INFINITE PARTICLE VORTEX ---
    const particleCount = 15000;
    const geometry = new THREE.BufferGeometry();
    const positions = new Float32Array(particleCount * 3);
    const colors = new Float32Array(particleCount * 3);
    const sizes = new Float32Array(particleCount);
    const angles = new Float32Array(particleCount);

    const colorOrange = new THREE.Color(0xff5722); // Theme Orange
    const colorGrey = new THREE.Color(0xd5d5d5);   // Theme Grey
    const colorDark = new THREE.Color(0x333333);   // Tech Dark

    for (let i = 0; i < particleCount; i++) {
        // Build a massive cylinder/tunnel
        const radius = 25 + Math.random() * 40;
        const angle = Math.random() * Math.PI * 2;
        const z = (Math.random() - 0.5) * 800; // Super long tunnel

        positions[i * 3] = Math.cos(angle) * radius;
        positions[i * 3 + 1] = Math.sin(angle) * radius;
        positions[i * 3 + 2] = z;

        angles[i] = angle;
        sizes[i] = Math.random() * 3.0 + 1.0;

        // Color distribution
        const randColor = Math.random();
        let c = colorOrange;
        if (randColor > 0.4) c = colorGrey;
        if (randColor > 0.85) c = colorDark;

        colors[i * 3] = c.r;
        colors[i * 3 + 1] = c.g;
        colors[i * 3 + 2] = c.b;
    }

    geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));
    geometry.setAttribute('size', new THREE.BufferAttribute(sizes, 1));
    geometry.setAttribute('angle', new THREE.BufferAttribute(angles, 1));

    // Custom Shader for the "Mind Collapsing" Warp Effect
    const material = new THREE.ShaderMaterial({
        uniforms: {
            uTime: { value: 0 },
            uScroll: { value: 0 } // Driven dynamically by the user's scroll depth
        },
        vertexShader: `
            uniform float uTime;
            uniform float uScroll;
            attribute float size;
            attribute float angle;
            varying vec3 vColor;
            
            void main() {
                vColor = color;
                
                vec3 pos = position;
                
                // MIND COLLAPSING TWIST: The further down the tunnel (pos.z), the more it twists based on scroll!
                float twistAmount = uScroll * 0.008; 
                float newAngle = angle + (pos.z * twistAmount) + (uTime * 0.2);
                
                float radius = length(pos.xy);
                
                // Breathing/Dilation effect based on scroll
                radius += sin(pos.z * 0.05 + uTime * 3.0) * (uScroll * 15.0 + 1.0);
                
                pos.x = cos(newAngle) * radius;
                pos.y = sin(newAngle) * radius;

                vec4 mvPosition = modelViewMatrix * vec4(pos, 1.0);
                
                // Perspective size scaling
                gl_PointSize = size * (200.0 / -mvPosition.z);
                gl_Position = projectionMatrix * mvPosition;
            }
        `,
        fragmentShader: `
            varying vec3 vColor;
            void main() {
                // Soft circular particles
                float r = distance(gl_PointCoord, vec2(0.5, 0.5));
                if(r > 0.5) discard;
                gl_FragColor = vec4(vColor, 1.0 - (r * 2.0));
            }
        `,
        transparent: true,
        vertexColors: true,
        depthWrite: false
    });

    const tunnel = new THREE.Points(geometry, material);
    scene.add(tunnel);

    // --- SCROLL LOGIC ---
    let currentScroll = 0;
    let targetScroll = 0;
    
    window.addEventListener('scroll', () => {
        // Calculate how far down the page the user has scrolled (0.0 to 1.0)
        const maxScroll = document.body.scrollHeight - window.innerHeight;
        if (maxScroll > 0) {
            targetScroll = window.scrollY / maxScroll;
        }
    });

    // --- ANIMATION LOOP ---
    let time = 0;
    let cameraZ = 400; // Start at the front of the tunnel

    function animate() {
        requestAnimationFrame(animate);
        time += 0.01;
        
        // Smoothly interpolate scroll for fluid physics
        currentScroll += (targetScroll - currentScroll) * 0.08;
        
        material.uniforms.uTime.value = time;
        material.uniforms.uScroll.value = currentScroll; // Passes scroll depth to GLSL shader

        // Camera flies forward. The further you scroll, the faster you warp!
        const speed = 0.8 + (currentScroll * 8.0);
        cameraZ -= speed;
        
        // Infinite tunnel loop
        if (cameraZ < -400) {
            cameraZ = 400;
        }
        camera.position.z = cameraZ;

        // Mind-Collapsing Camera Shake when scrolling deep
        if (currentScroll > 0.2) {
            const shakeIntensity = (currentScroll - 0.2) * 5.0;
            camera.position.x = (Math.random() - 0.5) * shakeIntensity;
            camera.position.y = (Math.random() - 0.5) * shakeIntensity;
        } else {
            camera.position.x = 0;
            camera.position.y = 0;
        }

        // Slowly barrel roll the camera based on scroll
        camera.rotation.z = currentScroll * Math.PI;

        renderer.render(scene, camera);
    }
    
    animate();

    // Handle Resize
    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });
}
