import os

html = open('our-team.html', 'r', encoding='utf-8').read()

# I will replace the 3D model JS section with a cinematic version that includes the Intro Monitor Model!
new_3d_logic = """
        // --- ROLE-SPECIFIC 3D MODELS SCENE ---
        const canvas = document.getElementById('webgl-canvas');
        const scene = new THREE.Scene();
        scene.fog = new THREE.FogExp2(0x050505, 0.015);
        
        const camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 25;

        const renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

        // High contrast lighting
        const ambient = new THREE.AmbientLight(0xffffff, 0.5);
        scene.add(ambient);
        const dir1 = new THREE.DirectionalLight(0xffffff, 1.2);
        dir1.position.set(10, 20, 15);
        scene.add(dir1);
        const orangeLight = new THREE.PointLight(0xff5722, 2, 50);
        orangeLight.position.set(-10, 5, 10);
        scene.add(orangeLight);
        const blueLight = new THREE.PointLight(0x4488ff, 1, 50);
        blueLight.position.set(10, -5, -10);
        scene.add(blueLight);

        // Sleek Matte Materials
        const matOrange = new THREE.MeshStandardMaterial({ color: 0xff5722, roughness: 0.1, metalness: 0.2 });
        const matWhite = new THREE.MeshStandardMaterial({ color: 0xeeeeee, roughness: 0.1, metalness: 0.2 });
        const matDark = new THREE.MeshStandardMaterial({ color: 0x222222, roughness: 0.4, metalness: 0.5 });
        const matGold = new THREE.MeshStandardMaterial({ color: 0xffaa00, roughness: 0.3, metalness: 0.8 });
        const matGlass = new THREE.MeshPhysicalMaterial({ color: 0xffffff, transmission: 0.9, opacity: 1, transparent: true, roughness: 0.1 });

        const models = [];
        const mainGroup = new THREE.Group();
        scene.add(mainGroup);

        // 0. INTRO (Generic Monitor Model as requested)
        const g0 = new THREE.Group();
        const introScreen = new THREE.Mesh(new THREE.BoxGeometry(10, 6, 0.5), matDark);
        g0.add(introScreen);
        const introGlass = new THREE.Mesh(new THREE.PlaneGeometry(9.5, 5.5), matGlass);
        introGlass.position.z = 0.26;
        g0.add(introGlass);
        // Floating blocks in front of monitor
        for(let i=0; i<3; i++) {
            const b = new THREE.Mesh(new THREE.BoxGeometry(2, 2, 2), i%2==0 ? matOrange : matWhite);
            b.position.set(-3 + i*3, 0, 2 + i);
            b.rotation.set(Math.random(), Math.random(), 0);
            g0.add(b);
        }
        g0.visible = false;
        models.push(g0); mainGroup.add(g0);

        // 1. Kamalesh (Growth Bar)
        const g1 = new THREE.Group();
        for(let i=0; i<4; i++) {
            const bar = new THREE.Mesh(new THREE.BoxGeometry(1.5, 2 + i*2, 1.5), matOrange);
            bar.position.set(i*2 - 3, (2 + i*2)/2 - 3, 0);
            g1.add(bar);
        }
        const arrow = new THREE.Mesh(new THREE.ConeGeometry(1, 2, 16), matWhite);
        arrow.position.set(4, 5, 0);
        arrow.rotation.z = -Math.PI/4;
        g1.add(arrow);
        g1.visible = false;
        models.push(g1); mainGroup.add(g1);

        // 2. JaiHaran (Network Globe)
        const g2 = new THREE.Group();
        const globe = new THREE.Mesh(new THREE.SphereGeometry(3.5, 32, 32), matDark);
        g2.add(globe);
        for(let i=0; i<3; i++) {
            const ring = new THREE.Mesh(new THREE.TorusGeometry(4.5 + i*0.5, 0.15, 16, 100), matOrange);
            ring.rotation.x = Math.random() * Math.PI;
            ring.rotation.y = Math.random() * Math.PI;
            g2.add(ring);
        }
        g2.visible = false;
        models.push(g2); mainGroup.add(g2);

        // 3. Kannan (Web Monitor)
        const g3 = new THREE.Group();
        const screen = new THREE.Mesh(new THREE.BoxGeometry(8, 5, 0.5), matDark);
        g3.add(screen);
        const glass = new THREE.Mesh(new THREE.PlaneGeometry(7.5, 4.5), matWhite);
        glass.position.z = 0.26;
        g3.add(glass);
        const stand = new THREE.Mesh(new THREE.CylinderGeometry(0.5, 0.5, 2), matWhite);
        stand.position.y = -3.5;
        g3.add(stand);
        const base = new THREE.Mesh(new THREE.BoxGeometry(4, 0.2, 2.5), matOrange);
        base.position.y = -4.5;
        g3.add(base);
        // Code lines
        const code1 = new THREE.Mesh(new THREE.BoxGeometry(4, 0.2, 0.1), matOrange);
        code1.position.set(-1.5, 1, 0.3);
        g3.add(code1);
        const code2 = new THREE.Mesh(new THREE.BoxGeometry(6, 0.2, 0.1), matDark);
        code2.position.set(-0.5, 0, 0.3);
        g3.add(code2);
        g3.visible = false;
        models.push(g3); mainGroup.add(g3);

        // 4. Saravana (SEO Target / Bullseye)
        const g4 = new THREE.Group();
        const ring1 = new THREE.Mesh(new THREE.CylinderGeometry(4, 4, 0.5, 32), matOrange);
        ring1.rotation.x = Math.PI / 2;
        g4.add(ring1);
        const ring2 = new THREE.Mesh(new THREE.CylinderGeometry(2.5, 2.5, 0.6, 32), matWhite);
        ring2.rotation.x = Math.PI / 2;
        g4.add(ring2);
        const bullseye = new THREE.Mesh(new THREE.CylinderGeometry(1, 1, 0.7, 32), matGold);
        bullseye.rotation.x = Math.PI / 2;
        g4.add(bullseye);
        // Arrow stuck in it
        const shaft = new THREE.Mesh(new THREE.CylinderGeometry(0.15, 0.15, 6, 16), matDark);
        shaft.position.z = 3;
        shaft.rotation.x = Math.PI / 2;
        shaft.rotation.z = -0.3;
        g4.add(shaft);
        g4.visible = false;
        models.push(g4); mainGroup.add(g4);

        // 5. Jabakumar (Video Film Reel / Clapperboard)
        const g5 = new THREE.Group();
        const board = new THREE.Mesh(new THREE.BoxGeometry(6, 4, 0.5), matDark);
        g5.add(board);
        const clapper = new THREE.Mesh(new THREE.BoxGeometry(6, 1, 0.5), matWhite);
        clapper.position.set(0, 2.5, 0);
        clapper.rotation.z = 0.2;
        clapper.position.x = -0.2;
        for(let i=0; i<5; i++) {
            const stripe = new THREE.Mesh(new THREE.BoxGeometry(0.5, 1.1, 0.6), matOrange);
            stripe.position.set(-2 + i*1, 0, 0);
            stripe.rotation.z = Math.PI/6;
            clapper.add(stripe);
        }
        g5.add(clapper);
        g5.visible = false;
        models.push(g5); mainGroup.add(g5);


        const sections = ['#sec-intro', '#sec-kamalesh', '#sec-jaiharan', '#sec-kannan', '#sec-saravana', '#sec-jabakumar'];
        
        sections.forEach((sec, index) => {
            ScrollTrigger.create({
                trigger: sec,
                start: "top 60%",
                end: "bottom 60%",
                onEnter: () => switchModel(index),
                onEnterBack: () => switchModel(index)
            });
        });

        let currentActiveModel = null;
        function switchModel(index) {
            if (currentActiveModel === index) return;
            currentActiveModel = index;
            
            models.forEach((m, i) => {
                if (i === index) {
                    m.visible = true;
                    // Cinematic Fly-In Animation (from behind camera, spinning)
                    gsap.fromTo(m.position, {z: 30, y: -10}, {z: 0, y: 0, duration: 1.5, ease: 'power3.out'});
                    gsap.fromTo(m.rotation, {x: Math.PI, y: -Math.PI}, {x: 0, y: 0, duration: 1.5, ease: 'power3.out'});
                    gsap.fromTo(m.scale, {x:0, y:0, z:0}, {x:1, y:1, z:1, duration: 1.5, ease: 'back.out(1.2)'});
                } else if (m.visible) {
                    // Fly out away from camera
                    gsap.to(m.position, {z: -30, y: 10, duration: 1, ease: 'power2.in', onComplete: () => m.visible = false});
                    gsap.to(m.scale, {x:0, y:0, z:0, duration: 1, ease: 'power2.in'});
                }
            });

            // Adjust main group offset based on text alignment
            if (index === 0) { gsap.to(mainGroup.position, {x: 0, duration: 1}); } 
            else if (index === 1) { gsap.to(mainGroup.position, {x: 6, duration: 1}); } // Kamalesh left -> prop right
            else if (index === 2) { gsap.to(mainGroup.position, {x: -6, duration: 1}); } // Jaiharan right -> prop left
            else if (index === 3) { gsap.to(mainGroup.position, {x: 6, duration: 1}); } 
            else if (index === 4) { gsap.to(mainGroup.position, {x: -6, duration: 1}); } 
            else if (index === 5) { gsap.to(mainGroup.position, {x: 0, duration: 1}); }
        }

        // --- STOP MODEL FROM HITTING FOOTER ---
        ScrollTrigger.create({
            trigger: '#main-footer',
            start: "top bottom", 
            end: "bottom bottom", 
            scrub: true,
            onUpdate: (self) => {
                gsap.to(mainGroup.position, {y: self.progress * 15, duration: 0.1});
                gsap.to(themeConfig, {pOpacity: 0.8 * (1 - self.progress), duration: 0.1});
            }
        });

        // --- REACTIVE ORANGE PARTICLES ---
        const pCount = 800;
        const pGeo = new THREE.BufferGeometry();
        const pPos = new Float32Array(pCount * 3);
        const pBasePos = new Float32Array(pCount * 3);
        for(let i=0; i<pCount; i++) {
            let x = (Math.random() - 0.5) * 60;
            let y = (Math.random() - 0.5) * 60;
            let z = (Math.random() - 0.5) * 30 - 10;
            pPos[i*3] = x; pPos[i*3+1] = y; pPos[i*3+2] = z;
            pBasePos[i*3] = x; pBasePos[i*3+1] = y; pBasePos[i*3+2] = z;
        }
        pGeo.setAttribute('position', new THREE.BufferAttribute(pPos, 3));
        const pMat = new THREE.PointsMaterial({ color: 0xff5722, size: 0.2, transparent: true, opacity: 0.8 });
        const particles = new THREE.Points(pGeo, pMat);
        scene.add(particles);

        let mouseX = 0, mouseY = 0;
        window.addEventListener('mousemove', e => {
            mouseX = (e.clientX / window.innerWidth) * 2 - 1;
            mouseY = -(e.clientY / window.innerHeight) * 2 + 1;
        });

        const clock = new THREE.Clock();
        function animate() {
            requestAnimationFrame(animate);
            const time = clock.getElapsedTime();
            
            models.forEach((m, i) => {
                if(m.visible) {
                    m.rotation.y += 0.01;
                    m.rotation.x += Math.sin(time) * 0.005;
                }
            });

            // Particles logic
            const positions = particles.geometry.attributes.position.array;
            for(let i=0; i<pCount; i++) {
                let bx = pBasePos[i*3];
                let by = pBasePos[i*3+1];
                let mwX = mouseX * 25;
                let mwY = mouseY * 15;
                let dx = bx - mwX;
                let dy = by - mwY;
                let dist = Math.sqrt(dx*dx + dy*dy);
                
                if (dist < 8) {
                    let force = (8 - dist) / 8;
                    positions[i*3] = bx + (dx/dist) * force * 5;
                    positions[i*3+1] = by + (dy/dist) * force * 5;
                } else {
                    positions[i*3] += (bx - positions[i*3]) * 0.1;
                    positions[i*3+1] += (by - positions[i*3+1]) * 0.1;
                }
            }
            particles.geometry.attributes.position.needsUpdate = true;
            particles.rotation.y = time * 0.02;

            renderer.setClearColor(themeConfig.bgColor, 1);
            pMat.opacity = themeConfig.pOpacity;
            scene.fog.color.copy(themeConfig.bgColor);

            renderer.render(scene, camera);
        }
        animate();

        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    </script>
"""

# Extract everything before the old script and append the new one
start_marker = "// --- ROLE-SPECIFIC 3D MODELS SCENE ---"
end_marker = "</body>"

if start_marker in html:
    before = html.split(start_marker)[0]
    final_html = before + new_3d_logic + "</body>\n</html>"
    open('our-team.html', 'w', encoding='utf-8').write(final_html)
    print("Replaced 3D animation block.")
else:
    print("Could not find start marker")
