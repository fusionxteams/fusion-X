// Mobile Menu Toggle
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');

if (hamburger) {
    hamburger.addEventListener('click', () => {
        if (navLinks.style.display === 'flex') {
            navLinks.style.display = 'none';
        } else {
            navLinks.style.display = 'flex';
            navLinks.style.flexDirection = 'column';
            navLinks.style.position = 'absolute';
            navLinks.style.top = '70px';
            navLinks.style.left = '0';
            navLinks.style.width = '100%';
            navLinks.style.background = 'white';
            navLinks.style.padding = '20px 0';
            navLinks.style.boxShadow = '0 5px 10px rgba(0,0,0,0.1)';
        }
    });
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        // Hide mobile menu on click
        if (window.innerWidth <= 768 && navLinks.style.display === 'flex') {
            navLinks.style.display = 'none';
        }

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// --- Three.js: Flat World Map & Flight Banner ---
const container = document.getElementById('globe-container');
if (container && typeof THREE !== 'undefined') {
    const scene = new THREE.Scene();
    
    // Camera setup for a cool isometric view of the flat map
    const camera = new THREE.PerspectiveCamera(45, container.clientWidth / container.clientHeight, 0.1, 1000);
    camera.position.set(0, 12, 16);
    camera.lookAt(0, 0, 0);

    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    container.appendChild(renderer.domElement);

    // 1. The Flat World Map
    const textureLoader = new THREE.TextureLoader();
    textureLoader.load('world_map.png', (texture) => {
        // Create the map plane (24x12 to match 2:1 equirectangular ratio)
        const mapGeo = new THREE.PlaneGeometry(24, 12);
        const mapMat = new THREE.MeshBasicMaterial({ 
            color: 0xff5722, 
            map: texture,
            transparent: true, 
            opacity: 0.5,
            side: THREE.DoubleSide
        });
        const mapPlane = new THREE.Mesh(mapGeo, mapMat);
        mapPlane.rotation.x = -Math.PI / 2; // Lay it flat
        scene.add(mapPlane);

        // Add a subtle grid underneath for a digital tracking feel
        const gridHelper = new THREE.GridHelper(24, 24, 0xdddddd, 0xeeeeee);
        gridHelper.position.y = -0.1;
        scene.add(gridHelper);

        // 2. The Flight (Airplane)
        const planeGroup = new THREE.Group();
        
        // Plane Body
        const bodyGeo = new THREE.ConeGeometry(0.3, 1.8, 16);
        bodyGeo.rotateX(Math.PI / 2); // Point forward along Z axis
        const planeMat = new THREE.MeshStandardMaterial({ color: 0xffffff, metalness: 0.3, roughness: 0.4 });
        const body = new THREE.Mesh(bodyGeo, planeMat);
        planeGroup.add(body);
        
        // Wings
        const wingGeo = new THREE.BoxGeometry(2.5, 0.05, 0.5);
        const wings = new THREE.Mesh(wingGeo, planeMat);
        wings.position.set(0, 0, 0.2);
        planeGroup.add(wings);
        
        // Tail Stabilizers
        const tailGeo = new THREE.BoxGeometry(1, 0.05, 0.3);
        const tail = new THREE.Mesh(tailGeo, planeMat);
        tail.position.set(0, 0, -0.7);
        planeGroup.add(tail);
        
        const finGeo = new THREE.BoxGeometry(0.05, 0.5, 0.4);
        const fin = new THREE.Mesh(finGeo, planeMat);
        fin.position.set(0, 0.25, -0.7);
        planeGroup.add(fin);

        // 3. The Cloth Banner ("Fusion X")
        // Create a canvas for the banner text
        const bannerCanvas = document.createElement('canvas');
        bannerCanvas.width = 512;
        bannerCanvas.height = 128;
        const ctx = bannerCanvas.getContext('2d');
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, 512, 128);
        ctx.fillStyle = '#ff5722';
        ctx.font = 'bold 70px "Segoe UI", Arial, sans-serif';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText('FUSION X', 256, 64);
        
        const bannerTexture = new THREE.CanvasTexture(bannerCanvas);
        
        // PlaneGeometry with many segments for cloth simulation
        const bannerGeo = new THREE.PlaneGeometry(3.5, 0.8, 30, 5);
        bannerGeo.translate(1.75, 0, 0); // Translate so origin is at the left edge for attachment
        
        const bannerMat = new THREE.MeshBasicMaterial({ 
            map: bannerTexture, 
            side: THREE.DoubleSide 
        });
        const banner = new THREE.Mesh(bannerGeo, bannerMat);
        
        // Position banner behind the plane
        banner.position.set(0, 0, -1.2);
        // Rotate it so it trails behind (aligns with negative Z axis)
        banner.rotation.y = -Math.PI / 2;
        planeGroup.add(banner);

        // Rope connecting tail to banner
        const ropeGeo = new THREE.BufferGeometry().setFromPoints([
            new THREE.Vector3(0, 0, -0.9), // Tail of plane
            new THREE.Vector3(0, 0, -1.2)   // Front of banner
        ]);
        const ropeMat = new THREE.LineBasicMaterial({ color: 0x333333 });
        const rope = new THREE.Line(ropeGeo, ropeMat);
        planeGroup.add(rope);

        scene.add(planeGroup);

        // 4. Flight Path (Continent to Continent)
        // Coordinates mapped to the flat 24x12 map
        const continents = [
            new THREE.Vector3(-7, 2.5, -3),  // North America
            new THREE.Vector3(1, 2.5, -4),   // Europe
            new THREE.Vector3(7, 2.5, -2),   // Asia
            new THREE.Vector3(9, 2.5, 3),    // Australia
            new THREE.Vector3(2, 2.5, 1.5),  // Africa
            new THREE.Vector3(-4, 2.5, 3),   // South America
            new THREE.Vector3(-7, 2.5, -3)   // Loop back
        ];
        
        // Create a smooth curve
        const curve = new THREE.CatmullRomCurve3(continents);
        curve.closed = true;

        // Add a line to visualize the flight path
        const pathPoints = curve.getPoints(150);
        const pathGeo = new THREE.BufferGeometry().setFromPoints(pathPoints);
        const pathMat = new THREE.LineDashedMaterial({ 
            color: 0xff9800, 
            dashSize: 0.3, 
            gapSize: 0.2, 
            linewidth: 2,
            transparent: true,
            opacity: 0.6
        });
        const pathLine = new THREE.Line(pathGeo, pathMat);
        pathLine.computeLineDistances(); // Required for dashed material
        scene.add(pathLine);

        // Lighting for the airplane
        const ambient = new THREE.AmbientLight(0xffffff, 0.6);
        scene.add(ambient);
        const dirLight = new THREE.DirectionalLight(0xffffff, 1);
        dirLight.position.set(5, 10, 5);
        scene.add(dirLight);

        // Animation
        let time = 0;
        const flightDuration = 2500; // frames for one full loop
        const bannerPositions = banner.geometry.attributes.position;
        const bannerInitialX = [];
        for (let i = 0; i < bannerPositions.count; i++) {
            bannerInitialX.push(bannerPositions.getX(i));
        }

        function animate() {
            requestAnimationFrame(animate);
            time += 1;

            // Animate Plane along the curve
            const t = (time % flightDuration) / flightDuration;
            const position = curve.getPointAt(t);
            planeGroup.position.copy(position);
            
            // Look at the next point on the curve to steer
            const nextT = ((time + 1) % flightDuration) / flightDuration;
            const nextPosition = curve.getPointAt(nextT);
            planeGroup.lookAt(nextPosition);

            // Animate the cloth banner (waving in the wind)
            for (let i = 0; i < bannerPositions.count; i++) {
                const x = bannerInitialX[i];
                // The cloth waves more intensely further away from the plane attachment point
                const wave = Math.sin((x * 4) - (time * 0.3)) * (x * 0.15);
                bannerPositions.setZ(i, wave);
            }
            bannerPositions.needsUpdate = true;

            // Slowly pan the camera slightly for a dynamic cinematic view
            camera.position.x = Math.sin(time * 0.001) * 3;
            camera.position.z = 16 + Math.cos(time * 0.001) * 2;
            camera.lookAt(0, 0, 0);

            renderer.render(scene, camera);
        }
        
        animate();
    });

    // Handle Resize
    window.addEventListener('resize', () => {
        if (!container) return;
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
    });
}
