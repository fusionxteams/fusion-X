// shatter-animation.js
const shatterSect = document.getElementById('fusion-shatter');
const shatterContainer = document.getElementById('shatter-canvas-container');
const elegantElements = document.querySelectorAll('.elegant-reveal');
const xGlow = document.getElementById('x-glow');

let isAnimating = false;

// --- 3D DIGITAL NETWORK BACKGROUND ---
if (shatterContainer && typeof THREE !== 'undefined') {
    const scene = new THREE.Scene();
    // Soft fog to blend the edges of the network into the white background
    scene.fog = new THREE.FogExp2(0xffffff, 0.03);

    const camera = new THREE.PerspectiveCamera(60, shatterContainer.clientWidth / shatterContainer.clientHeight, 0.1, 1000);
    camera.position.z = 25;
    
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(shatterContainer.clientWidth, shatterContainer.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    shatterContainer.appendChild(renderer.domElement);

    const networkGroup = new THREE.Group();
    scene.add(networkGroup);

    // Helper to create a texture from an icon/text drawn on an HTML canvas
    function createIconTexture(iconType) {
        const canvas = document.createElement('canvas');
        canvas.width = 128;
        canvas.height = 128;
        const ctx = canvas.getContext('2d');
        
        ctx.fillStyle = '#ff5722'; // Orange theme
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        
        if (iconType === 'laptop') {
            // Draw a simple laptop shape
            ctx.fillRect(34, 34, 60, 40);
            ctx.fillStyle = '#fff';
            ctx.fillRect(38, 38, 52, 32);
            ctx.fillStyle = '#ff5722';
            ctx.fillRect(24, 78, 80, 10);
        } else if (iconType === 'google') {
            ctx.font = 'bold 80px Arial';
            ctx.fillText('G', 64, 64);
        } else if (iconType === 'meta') {
            ctx.font = 'bold 80px Arial';
            ctx.fillText('M', 64, 64);
        } else if (iconType === 'ads') {
            ctx.font = 'bold 50px Arial';
            ctx.fillText('ADS', 64, 64);
        } else {
            // Generic node
            ctx.beginPath();
            ctx.arc(64, 64, 20, 0, Math.PI * 2);
            ctx.fill();
        }

        const texture = new THREE.CanvasTexture(canvas);
        return texture;
    }

    // Node configuration
    const nodeCount = 50;
    const nodes = [];
    const iconTypes = ['laptop', 'google', 'meta', 'ads'];

    // Create Nodes
    for (let i = 0; i < nodeCount; i++) {
        // Decide if this node is an icon or a generic dot
        const isIcon = i < 15; // 15 icons, 35 dots
        const type = isIcon ? iconTypes[i % iconTypes.length] : 'dot';
        
        const texture = createIconTexture(type);
        const material = new THREE.SpriteMaterial({ map: texture, color: 0xffffff, transparent: true, opacity: 0.8 });
        const sprite = new THREE.Sprite(material);
        
        // Random 3D position
        sprite.position.set(
            (Math.random() - 0.5) * 60,
            (Math.random() - 0.5) * 40,
            (Math.random() - 0.5) * 40
        );
        
        // Scale icons larger than dots
        if (isIcon) {
            sprite.scale.set(4, 4, 1);
        } else {
            sprite.scale.set(1.5, 1.5, 1);
        }

        networkGroup.add(sprite);
        nodes.push(sprite.position);
    }

    // Create Dotted Lines connecting nodes
    const maxDistance = 15;
    const lineMaterial = new THREE.LineDashedMaterial({
        color: 0x00d4ff, // Blue theme for lines
        linewidth: 1,
        scale: 1,
        dashSize: 0.5,
        gapSize: 0.5,
        transparent: true,
        opacity: 0.4
    });

    const lineGeometry = new THREE.BufferGeometry();
    const positions = [];
    
    // Simple exhaustive connection check (O(N^2) but N=50 is tiny)
    for (let i = 0; i < nodeCount; i++) {
        for (let j = i + 1; j < nodeCount; j++) {
            if (nodes[i].distanceTo(nodes[j]) < maxDistance) {
                positions.push(
                    nodes[i].x, nodes[i].y, nodes[i].z,
                    nodes[j].x, nodes[j].y, nodes[j].z
                );
            }
        }
    }
    
    lineGeometry.setAttribute('position', new THREE.Float32BufferAttribute(positions, 3));
    const lines = new THREE.LineSegments(lineGeometry, lineMaterial);
    lines.computeLineDistances(); // Required for dashed lines to render properly!
    networkGroup.add(lines);

    // Animation Loop
    let clock = new THREE.Clock();
    
    function animateNetwork() {
        requestAnimationFrame(animateNetwork);
        const dt = clock.getDelta();
        
        // Slowly rotate the entire network
        networkGroup.rotation.y += 0.1 * dt;
        networkGroup.rotation.x += 0.05 * dt;

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

    // Ignite the blue X glow after a short delay
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
