// shatter-animation.js
const shatterSect = document.getElementById('fusion-shatter');
const shatterContainer = document.getElementById('shatter-canvas-container');
const elegantElements = document.querySelectorAll('.elegant-reveal');

let isAnimating = false;

// --- 3D PARTICLE WAVE BACKGROUND ---
if (shatterContainer && typeof THREE !== 'undefined') {
    const scene = new THREE.Scene();
    scene.fog = new THREE.FogExp2(0x080808, 0.003); // White fog for depth

    const camera = new THREE.PerspectiveCamera(75, shatterContainer.clientWidth / shatterContainer.clientHeight, 1, 1000);
    // Position camera looking slightly down at the wave
    camera.position.set(0, 100, 200);
    
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(shatterContainer.clientWidth, shatterContainer.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    shatterContainer.appendChild(renderer.domElement);

    // Particle Wave Configuration
    const SEPARATION = 40;
    const AMOUNTX = 60;
    const AMOUNTY = 60;
    
    const numParticles = AMOUNTX * AMOUNTY;
    const positions = new Float32Array(numParticles * 3);
    const scales = new Float32Array(numParticles);

    let i = 0;
    let j = 0;
    for (let ix = 0; ix < AMOUNTX; ix++) {
        for (let iy = 0; iy < AMOUNTY; iy++) {
            // Center the grid
            positions[i] = ix * SEPARATION - ((AMOUNTX * SEPARATION) / 2);
            positions[i + 1] = 0; // Y position is modified in animation loop
            positions[i + 2] = iy * SEPARATION - ((AMOUNTY * SEPARATION) / 2);
            
            scales[j] = 1;
            
            i += 3;
            j++;
        }
    }

    const geometry = new THREE.BufferGeometry();
    geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    geometry.setAttribute('scale', new THREE.BufferAttribute(scales, 1));

    // Custom shader material for particles to scale dynamically based on the 'scale' attribute
    const material = new THREE.ShaderMaterial({
        uniforms: {
            color: { value: new THREE.Color(0xff5722) }, // Subtle light silver/grey theme
        },
        vertexShader: `
            attribute float scale;
            void main() {
                vec4 mvPosition = modelViewMatrix * vec4(position, 1.0);
                gl_PointSize = scale * (300.0 / -mvPosition.z);
                gl_Position = projectionMatrix * mvPosition;
            }
        `,
        fragmentShader: `
            uniform vec3 color;
            void main() {
                // Make particles circular with soft edges
                float r = distance(gl_PointCoord, vec2(0.5, 0.5));
                if (r > 0.5) discard;
                gl_FragColor = vec4(color, 1.0 - (r * 2.0));
            }
        `,
        transparent: true,
        depthWrite: false
    });

    const particles = new THREE.Points(geometry, material);
    scene.add(particles);

    // Mouse Interaction
    const mouse = new THREE.Vector2(0, 0);
    const targetMouse = new THREE.Vector2(0, 0);
    const raycaster = new THREE.Raycaster();
    const plane = new THREE.Plane(new THREE.Vector3(0, 1, 0), 0);
    const intersectPoint = new THREE.Vector3();
    let isMouseOver = false;

    shatterSect.addEventListener('mousemove', (e) => {
        const rect = shatterSect.getBoundingClientRect();
        targetMouse.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
        targetMouse.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;
        isMouseOver = true;
    });
    
    shatterSect.addEventListener('mouseleave', () => {
        isMouseOver = false;
    });

    // Animation Loop
    let count = 0;
    
    function animateWave() {
        requestAnimationFrame(animateWave);
        
        // Smoothly interpolate mouse position for fluid interaction
        mouse.x += (targetMouse.x - mouse.x) * 0.1;
        mouse.y += (targetMouse.y - mouse.y) * 0.1;

        // Find where the mouse is pointing on the invisible floor plane
        raycaster.setFromCamera(mouse, camera);
        raycaster.ray.intersectPlane(plane, intersectPoint);
        
        const positions = particles.geometry.attributes.position.array;
        const scales = particles.geometry.attributes.scale.array;
        
        let i = 0;
        let j = 0;
        
        for (let ix = 0; ix < AMOUNTX; ix++) {
            for (let iy = 0; iy < AMOUNTY; iy++) {
                
                const px = positions[i];
                const pz = positions[i + 2];
                
                // Base sine wave calculation
                let waveHeight = (Math.sin((ix + count) * 0.3) * 30) + 
                                 (Math.sin((iy + count) * 0.5) * 30);
                
                let baseScale = (Math.sin((ix + count) * 0.3) + 1) * 8 + 
                                (Math.sin((iy + count) * 0.5) + 1) * 8;

                // Add Mouse Influence (Ripple/Repel effect)
                if (isMouseOver && intersectPoint) {
                    const dx = px - intersectPoint.x;
                    const dz = pz - intersectPoint.z;
                    const distance = Math.sqrt(dx*dx + dz*dz);
                    
                    const influenceRadius = 150;
                    if (distance < influenceRadius) {
                        // Create a smooth bell curve dropoff based on distance
                        const force = (influenceRadius - distance) / influenceRadius;
                        // Push particles up and make them massive!
                        waveHeight += force * 80;
                        baseScale += force * 40;
                    }
                }

                positions[i + 1] = waveHeight;
                scales[j] = baseScale;
                
                i += 3;
                j++;
            }
        }
        
        particles.geometry.attributes.position.needsUpdate = true;
        particles.geometry.attributes.scale.needsUpdate = true;
        
        count += 0.05;

        // Very slow camera rotation for extra elegance
        camera.position.x += (Math.cos(count * 0.1) * 100 - camera.position.x) * 0.01;
        camera.lookAt(scene.position);

        renderer.render(scene, camera);
    }
    
    animateWave();

    // Handle Resize
    window.addEventListener('resize', () => {
        if (!shatterContainer) return;
        camera.aspect = shatterContainer.clientWidth / shatterContainer.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(shatterContainer.clientWidth, shatterContainer.clientHeight);
    });
}


// --- ELEGANT REVEAL LOGIC ---
function triggerElegantReveal() {
    if (isAnimating) return;
    isAnimating = true;
    
    // Trigger CSS transitions
    elegantElements.forEach(el => {
        el.classList.add('is-visible');
    });
}

if (shatterSect) {
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !isAnimating) {
            triggerElegantReveal();
        } else if (!entries[0].isIntersecting && isAnimating) {
            isAnimating = false;
            elegantElements.forEach(el => {
                el.classList.remove('is-visible');
            });
        }
    }, { threshold: 0.3 });
    observer.observe(shatterSect);
}
