// shatter-animation.js
const shatterSect = document.getElementById('fusion-shatter');
const shatterContainer = document.getElementById('shatter-canvas-container');
const elegantElements = document.querySelectorAll('.elegant-reveal');
const xGlow = document.getElementById('x-glow');

let isAnimating = false;

// --- 3D DIGITAL NETWORK BACKGROUND ---
if (shatterContainer && typeof THREE !== 'undefined') {
    const scene = new THREE.Scene();
    scene.fog = new THREE.FogExp2(0xffffff, 0.02); // White fog for depth

    const camera = new THREE.PerspectiveCamera(50, shatterContainer.clientWidth / shatterContainer.clientHeight, 0.1, 1000);
    camera.position.z = 35;
    
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(shatterContainer.clientWidth, shatterContainer.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    shatterContainer.appendChild(renderer.domElement);

    // Add 3D Lighting
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.6);
    scene.add(ambientLight);
    const dirLight = new THREE.DirectionalLight(0xffffff, 1);
    dirLight.position.set(10, 20, 10);
    scene.add(dirLight);

    const networkGroup = new THREE.Group();
    scene.add(networkGroup);

    const orangeColor = 0xff5722;
    const baseMaterial = new THREE.MeshStandardMaterial({ 
        color: orangeColor,
        roughness: 0.3,
        metalness: 0.2
    });

    // Helper to create 3D Laptop
    function createLaptop() {
        const group = new THREE.Group();
        const baseGeo = new THREE.BoxGeometry(4, 0.2, 3);
        const screenGeo = new THREE.BoxGeometry(4, 2.5, 0.2);
        
        const base = new THREE.Mesh(baseGeo, baseMaterial);
        const screen = new THREE.Mesh(screenGeo, baseMaterial);
        
        screen.position.set(0, 1.25, -1.4);
        screen.rotation.x = -0.2; // Open screen angle
        
        group.add(base);
        group.add(screen);
        return group;
    }

    // Helper to create Text Texture for 3D Tiles
    function createTextMaterial(text) {
        const canvas = document.createElement('canvas');
        canvas.width = 256;
        canvas.height = 256;
        const ctx = canvas.getContext('2d');
        
        // Orange background for the tile
        ctx.fillStyle = '#ff5722';
        ctx.fillRect(0, 0, 256, 256);
        
        // White text
        ctx.fillStyle = '#ffffff';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.font = 'bold 120px Arial';
        ctx.fillText(text, 128, 128);
        
        const texture = new THREE.CanvasTexture(canvas);
        return new THREE.MeshStandardMaterial({ map: texture, roughness: 0.4 });
    }

    // Node configuration
    const nodeCount = 50;
    const nodes = [];
    const iconTypes = ['laptop', 'G', 'M', 'ADS'];
    const textMaterials = {
        'G': createTextMaterial('G'),
        'M': createTextMaterial('M'),
        'ADS': createTextMaterial('ADS')
    };

    // Create 3D Nodes
    for (let i = 0; i < nodeCount; i++) {
        let nodeMesh;
        const isIcon = i < 15; 
        
        if (isIcon) {
            const type = iconTypes[i % iconTypes.length];
            if (type === 'laptop') {
                nodeMesh = createLaptop();
            } else {
                // A 3D floating tile for G, M, ADS
                const boxGeo = new THREE.BoxGeometry(3, 3, 0.5);
                nodeMesh = new THREE.Mesh(boxGeo, textMaterials[type]);
            }
        } else {
            // Generic connection nodes (3D Icosahedrons for a tech look)
            const icoGeo = new THREE.IcosahedronGeometry(0.8, 0);
            nodeMesh = new THREE.Mesh(icoGeo, baseMaterial);
        }
        
        // Random 3D position in a wide sphere/cylinder
        nodeMesh.position.set(
            (Math.random() - 0.5) * 80,
            (Math.random() - 0.5) * 40,
            (Math.random() - 0.5) * 30 - 5
        );
        
        // Give them random rotations
        nodeMesh.rotation.set(
            Math.random() * Math.PI,
            Math.random() * Math.PI,
            0
        );

        networkGroup.add(nodeMesh);
        // Store reference for line connections and animation
        nodes.push({
            mesh: nodeMesh,
            rotSpeed: {
                x: (Math.random() - 0.5) * 0.02,
                y: (Math.random() - 0.5) * 0.02
            }
        });
    }

    // Create Dotted Lines connecting nodes
    const maxDistance = 20;
    const lineMaterial = new THREE.LineDashedMaterial({
        color: orangeColor,
        linewidth: 1,
        scale: 1,
        dashSize: 1,
        gapSize: 1,
        transparent: true,
        opacity: 0.6
    });

    // We use a dynamic buffer geometry so lines move perfectly with rotating network
    const lineGeometry = new THREE.BufferGeometry();
    // Pre-allocate large array (maximum possible connections)
    const maxLines = nodeCount * nodeCount;
    const positions = new Float32Array(maxLines * 6);
    lineGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    
    const lines = new THREE.LineSegments(lineGeometry, lineMaterial);
    networkGroup.add(lines);

    // Animation Loop
    let clock = new THREE.Clock();
    
    function animateNetwork() {
        requestAnimationFrame(animateNetwork);
        const dt = clock.getDelta();
        
        // Rotate entire network slowly
        networkGroup.rotation.y += 0.05 * dt;
        networkGroup.rotation.z += 0.02 * dt;

        // Spin individual 3D objects
        let lineIndex = 0;
        for (let i = 0; i < nodeCount; i++) {
            nodes[i].mesh.rotation.x += nodes[i].rotSpeed.x;
            nodes[i].mesh.rotation.y += nodes[i].rotSpeed.y;
            
            // Recompute lines based on distance
            const posA = nodes[i].mesh.position;
            for (let j = i + 1; j < nodeCount; j++) {
                const posB = nodes[j].mesh.position;
                if (posA.distanceTo(posB) < maxDistance) {
                    positions[lineIndex++] = posA.x;
                    positions[lineIndex++] = posA.y;
                    positions[lineIndex++] = posA.z;
                    positions[lineIndex++] = posB.x;
                    positions[lineIndex++] = posB.y;
                    positions[lineIndex++] = posB.z;
                }
            }
        }
        
        // Hide unused line segments
        for (let i = lineIndex; i < maxLines * 6; i++) {
            positions[i] = 0;
        }
        
        lines.geometry.attributes.position.needsUpdate = true;
        lines.computeLineDistances(); // Update dashes

        renderer.render(scene, camera);
    }
    
    clock.start();
    animateNetwork();

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

    if (xGlow) {
        xGlow.style.opacity = '1';
    }
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
            if (xGlow) xGlow.style.opacity = '0';
        }
    }, { threshold: 0.3 });
    observer.observe(shatterSect);
}
