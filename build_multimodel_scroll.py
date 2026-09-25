import os

# 1. Update charm-physics.js to remove the fade-out on scroll so the user can always see it
charm = open('charm-physics.js', 'r', encoding='utf-8').read()
if 'window.addEventListener(\'scroll\'' in charm:
    # Just remove the scroll event listener block
    import re
    charm = re.sub(r'// Fade out charm when scrolling down.*?\}\);', '', charm, flags=re.DOTALL)
    open('charm-physics.js', 'w', encoding='utf-8').write(charm)
    print("Fixed charm-physics.js")

# 2. Build the new our-team.html
html_content = """<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Elite Team | Fusion X Digital Marketing Agency</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;800;900&family=Space+Grotesk:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            margin: 0;
            background-color: #080808;
            color: #ffffff;
            font-family: 'Space Grotesk', sans-serif;
            overflow-x: hidden;
            transition: background-color 0.8s ease;
        }

        /* Fixed 3D Canvas Background */
        #webgl-canvas {
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            z-index: 0;
            pointer-events: none;
        }

        .team-container {
            position: relative;
            z-index: 10;
        }

        /* Member Sections */
        .member-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 100px 5%;
            position: relative;
            box-sizing: border-box;
        }

        .member-content {
            max-width: 600px;
            display: flex;
            flex-direction: column;
        }
        
        .member-section.right-align .member-content {
            margin-left: auto;
        }

        .member-name {
            font-family: 'Outfit', sans-serif;
            font-size: 3.5rem;
            font-weight: 900;
            margin: 0 0 10px 0;
            line-height: 1.1;
            text-transform: uppercase;
        }

        .member-role {
            font-size: 1.1rem;
            color: #ff5722;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 25px;
        }

        .member-desc {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 30px;
            text-align: justify;
        }

        .highlights {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .highlight-tag {
            background: rgba(255,87,34,0.1);
            border: 1px solid rgba(255,87,34,0.3);
            color: #ff5722;
            padding: 8px 15px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Light Theme overrides */
        body.light-theme {
            background-color: #ffffff;
            color: #111111;
        }
        body.light-theme .highlight-tag {
            background: rgba(255,87,34,0.05);
            border-color: rgba(255,87,34,0.2);
        }
        body.light-theme .member-desc {
            color: #444;
        }

        /* GSAP Reveals */
        .gsap-reveal {
            opacity: 0;
            transform: translateY(40px);
        }
    </style>
</head>
<body>

    <!-- Standard Navbar EXACTLY like about-us.html -->
    <nav class="navbar">
        <div class="logo-container">
            <a href="index.html">
                <img src="logo_transparent.png" alt="Fusion X" class="logo">
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="index.html#home">HOME</a></li>
            <li><a href="about-us.html">ABOUT US</a></li>
            <li><a href="services.html">SERVICES</a></li>
            <li><a href="brands.html">BRANDS</a></li>
            <li><a href="our-team.html" class="active">OUR TEAM</a></li>
            <li><a href="our-works.html">OUR WORKS</a></li>
            <li class="dangling-container">
                <a href="contact.html" class="nav-cta-btn">LET'S CONNECT</a>
                <div class="charm-string">
                    <img src="logo_transparent.png" class="charm-object" alt="Fusion X">
                </div>
            </li>
        </ul>
        <div class="hamburger">
            <svg viewBox="0 0 100 80" width="30" height="30">
                <rect width="100" height="15" rx="8" fill="#ff5722"></rect>
                <rect y="30" width="100" height="15" rx="8" fill="#ff5722"></rect>
                <rect y="60" width="100" height="15" rx="8" fill="#ff5722"></rect>
            </svg>
        </div>
    </nav>

    <!-- Fixed WebGL Background -->
    <canvas id="webgl-canvas"></canvas>

    <div class="team-container">

        <!-- KAMALESH J (Dark Theme - Text Left, Prop Right) -->
        <section class="member-section dark-mode-trigger" id="sec-kamalesh">
            <div class="member-content gsap-reveal">
                <h2 class="member-name">Kamalesh J</h2>
                <div class="member-role">Expert Digital Marketing Strategist</div>
                <div class="member-desc">
                    Meet Kamalesh, the strategic powerhouse and our leading digital marketing expert. With 4 years of elite industry experience, Kamalesh doesn't just run campaigns; he engineers digital ecosystems that generate predictable revenue. Trained by top industry experts at Digital Scholar, including Sorav Jain and Rishi Jain, he brings a deeply humanized approach to data analysis. Whether he is dissecting competitor brands or architecting a robust digital marketing strategy, his ultimate goal is to connect your brand with real people. He specializes in deploying high-ROAS Meta and Google Ads, crafting laser-targeted local audience funnels, and executing conversion rate optimization (CRO) that transforms passive visitors into loyal customers.
                </div>
                <div class="highlights">
                    <span class="highlight-tag">Digital Marketing Strategy</span>
                    <span class="highlight-tag">Meta Ads Expert</span>
                    <span class="highlight-tag">Local SEO Marketing</span>
                    <span class="highlight-tag">CRO Specialist</span>
                </div>
            </div>
        </section>

        <!-- JAIHARAN (White Theme - Text Right, Prop Left) -->
        <section class="member-section right-align light-mode-trigger" id="sec-jaiharan">
            <div class="member-content gsap-reveal">
                <h2 class="member-name">JaiHaran K</h2>
                <div class="member-role">CEO & Client Success Director</div>
                <div class="member-desc">
                    JaiHaran is the empathetic bridge between our clients and our creative execution team. With over 2 years of hands-on experience in client relationship management, he ensures that every founder's vision is heard, understood, and brought to life. He manages our social media management agency operations, fostering authentic community engagement and digital brand growth. But JaiHaran’s talents don't stop at communication—he is a multi-disciplinary force. He brings stories to life through dynamic video editing and serves as our meticulous QA specialist. Before any project launches, he rigorously tests websites, Android apps, and iOS applications to ensure a flawless, bug-free user experience across all platforms.
                </div>
                <div class="highlights">
                    <span class="highlight-tag">Client Relationship Mgt</span>
                    <span class="highlight-tag">Social Media Agency</span>
                    <span class="highlight-tag">Multi-Platform QA</span>
                </div>
            </div>
        </section>

        <!-- KANNAN S (Dark Theme - Text Left, Prop Right) -->
        <section class="member-section dark-mode-trigger" id="sec-kannan">
            <div class="member-content gsap-reveal">
                <h2 class="member-name">Kannan S</h2>
                <div class="member-role">Frontend & Technical Web Developer</div>
                <div class="member-desc">
                    Kannan is the architectural mind behind our breathtaking digital experiences. As a Certified React Developer with over 2 years of specialized expertise in custom website design and Shopify storefront development, he merges stunning visual aesthetics with lightning-fast code. Coming from a rigorous background in IT custom web development, Kannan understands that a beautiful website must also perform flawlessly. He dominates Core Web Vitals optimization, ensuring every page loads instantly to capture impatient modern audiences. Beyond his technical frontend developer skills, Kannan is a master of words, utilizing deep keyword research to craft search-optimized SEO blogs that educate humans while ranking powerfully on search engines.
                </div>
                <div class="highlights">
                    <span class="highlight-tag">Custom Website Design</span>
                    <span class="highlight-tag">Core Web Vitals</span>
                    <span class="highlight-tag">Shopify Development</span>
                    <span class="highlight-tag">SEO Blog Writing</span>
                </div>
            </div>
        </section>

        <!-- SARAVANA (White Theme - Text Right, Prop Left) -->
        <section class="member-section right-align light-mode-trigger" id="sec-saravana">
            <div class="member-content gsap-reveal">
                <h2 class="member-name">Saravana Sanjhay M</h2>
                <div class="member-role">Technical SEO & Search Expert</div>
                <div class="member-desc">
                    Saravana is our master of search visibility and organic growth. As a Certified Angular Developer and highly sought-after technical SEO specialist, he brings over 2 years of experience in propelling brands to the top of the search results. His approach to SEO is deeply analytical yet profoundly user-centric. Before joining Fusion X, he orchestrated massive local search visibility campaigns in the IT sector. Today, he excels in dominating the Google Maps 3-Pack, conducting comprehensive site audits, and mapping out intricate user search intent. By blending rich semantic keyword integration with flawless technical web design, Saravana ensures that your website doesn't just rank highly—it provides a brilliant, high-converting journey for every single visitor.
                </div>
                <div class="highlights">
                    <span class="highlight-tag">Technical SEO Specialist</span>
                    <span class="highlight-tag">Google Maps 3-Pack</span>
                    <span class="highlight-tag">Comprehensive Audits</span>
                </div>
            </div>
        </section>

        <!-- JABAKUMAR (Dark Theme - Center Align, Prop Above/Below) -->
        <section class="member-section dark-mode-trigger" id="sec-jabakumar" style="justify-content: center; text-align: center;">
            <div class="member-content gsap-reveal" style="max-width: 800px; align-items: center; margin: 0 auto;">
                <h2 class="member-name">Jabakumar</h2>
                <div class="member-role">Cinematic Video Editor</div>
                <div class="member-desc" style="text-align: center;">
                    Jabakumar is the visionary storyteller who captures the soul of your brand on film. With 2 years of specialized experience in commercial video editing and cinematic post-production, he understands how to make audiences feel something profound. Having honed his craft in demanding IT media production studios, he approaches every project with a director's eye for detail. Jabakumar is an expert in dynamic shot composition, immersive sound design optimization, and precise color grading. In today's fast-paced digital world, he is our secret weapon for short-form video marketing, perfectly timing edits to musical hooks to create highly engaging Reels, Shorts, and ads that demand instant attention and drive viral awareness.
                </div>
                <div class="highlights" style="justify-content: center;">
                    <span class="highlight-tag">Commercial Video Editing</span>
                    <span class="highlight-tag">Cinematic Post-Production</span>
                    <span class="highlight-tag">Short-Form Video</span>
                </div>
            </div>
        </section>

    </div>

    <!-- The Standard Footer -->
    <footer style="background-color:#111;color:white;text-align:center;padding:60px 20px;font-family:'Space Grotesk',sans-serif;position:relative;z-index:100;width:100%;box-sizing:border-box;">
        <h2 style="font-size:2.5rem;margin-bottom:10px;color:white;font-family:'Outfit',sans-serif;font-weight:900;">FUSION X</h2>
        <p style="color:#ff5722;font-weight:bold;letter-spacing:2px;margin:0;text-transform:uppercase;">TAKE YOUR BRAND WORLDWIDE</p>
        <div style="margin:30px 0; display:flex; justify-content:center; gap:20px; flex-wrap:wrap;">
            <a href="index.html#home" style="color:#ccc;text-decoration:none;font-size:0.9rem;font-weight:500;">HOME</a>
            <a href="about-us.html" style="color:#ccc;text-decoration:none;font-size:0.9rem;font-weight:500;">ABOUT US</a>
            <a href="services.html" style="color:#ccc;text-decoration:none;font-size:0.9rem;font-weight:500;">SERVICES</a>
            <a href="brands.html" style="color:#ccc;text-decoration:none;font-size:0.9rem;font-weight:500;">BRANDS</a>
            <a href="contact.html" style="color:#ccc;text-decoration:none;font-size:0.9rem;font-weight:500;">LET'S CONNECT</a>
        </div>
        <p style="color:#666;font-size:0.9rem;margin-top:30px;">© 2026 Fusion X Digital Marketing Agency. All Rights Reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="charm-physics.js"></script>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        // Navbar Mobile
        const hb = document.querySelector('.hamburger'), nl = document.querySelector('.nav-links');
        if (hb && nl) {
            hb.addEventListener('click', () => {
                const open = nl.classList.toggle('mob-open');
                Object.assign(nl.style, open ? { display:'flex', flexDirection:'column', position:'absolute', top:'70px', left:'0', width:'100%', background: document.body.classList.contains('light-theme') ? '#fff' : '#111', padding:'20px 0', gap:'20px' } : { display:'none' });
            });
        }

        // HTML Text Reveal Animations
        gsap.utils.toArray('.gsap-reveal').forEach(elem => {
            gsap.to(elem, {
                opacity: 1, y: 0, duration: 1, ease: 'power3.out',
                scrollTrigger: { trigger: elem, start: 'top 80%' }
            });
        });

        // --- THEME TRANSITIONS (Dark / Light) ---
        const themeConfig = { bgColor: new THREE.Color(0x080808), particleOpacity: 0.8 };
        function setDarkTheme() {
            document.body.classList.remove('light-theme');
            gsap.to(themeConfig.bgColor, { r: 0x08/255, g: 0x08/255, b: 0x08/255, duration: 0.8 });
            gsap.to(themeConfig, { particleOpacity: 0.8, duration: 0.8 });
            gsap.to('.nav-links a', { color: '#333333', duration: 0.8 }); // Navbar is always white now, so text must be dark!
            gsap.to('.nav-links a.active', { color: '#ff5722', duration: 0.8 });
        }
        function setLightTheme() {
            document.body.classList.add('light-theme');
            gsap.to(themeConfig.bgColor, { r: 1, g: 1, b: 1, duration: 0.8 });
            gsap.to(themeConfig, { particleOpacity: 0.2, duration: 0.8 });
            gsap.to('.nav-links a', { color: '#333333', duration: 0.8 });
            gsap.to('.nav-links a.active', { color: '#ff5722', duration: 0.8 });
        }
        document.querySelectorAll('.dark-mode-trigger').forEach(sec => {
            ScrollTrigger.create({ trigger: sec, start: 'top 50%', end: 'bottom 50%', onEnter: setDarkTheme, onEnterBack: setDarkTheme });
        });
        document.querySelectorAll('.light-mode-trigger').forEach(sec => {
            ScrollTrigger.create({ trigger: sec, start: 'top 50%', end: 'bottom 50%', onEnter: setLightTheme, onEnterBack: setLightTheme });
        });


        // --- THREE.JS SCENE SETUP ---
        const canvas = document.getElementById('webgl-canvas');
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 25;

        const renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

        // Lighting
        const ambient = new THREE.AmbientLight(0xffffff, 0.7);
        scene.add(ambient);
        const dirLight = new THREE.DirectionalLight(0xffffff, 1.0);
        dirLight.position.set(10, 20, 15);
        scene.add(dirLight);
        const orangeLight = new THREE.PointLight(0xff5722, 2, 50);
        orangeLight.position.set(-10, 0, 10);
        scene.add(orangeLight);

        // --- BUILD THE UNIQUE 3D MODELS ---
        const propGroup = new THREE.Group();
        scene.add(propGroup);

        const matOrange = new THREE.MeshStandardMaterial({ color: 0xff5722, roughness: 0.2, metalness: 0.5 });
        const matDark = new THREE.MeshStandardMaterial({ color: 0x333333, roughness: 0.1, metalness: 0.8 });
        const matWhite = new THREE.MeshStandardMaterial({ color: 0xeeeeee, roughness: 0.2, metalness: 0.2 });
        const matGlass = new THREE.MeshPhysicalMaterial({ color: 0xffffff, transmission: 0.9, opacity: 1, transparent: true, roughness: 0.1 });

        // MODEL 1: Growth Bar (Kamalesh)
        const modelGrowth = new THREE.Group();
        for(let i=0; i<4; i++) {
            const bar = new THREE.Mesh(new THREE.BoxGeometry(1.5, 2 + i*2, 1.5), matOrange);
            bar.position.set(i*2 - 3, (2 + i*2)/2 - 3, 0);
            modelGrowth.add(bar);
        }
        // Arrow pointing up
        const arrow = new THREE.Mesh(new THREE.ConeGeometry(1, 2, 16), matWhite);
        arrow.position.set(4, 5, 0);
        arrow.rotation.z = -Math.PI/4;
        modelGrowth.add(arrow);
        propGroup.add(modelGrowth);

        // MODEL 2: Globe/Network (JaiHaran)
        const modelNetwork = new THREE.Group();
        const globe = new THREE.Mesh(new THREE.SphereGeometry(3, 32, 32), matDark);
        modelNetwork.add(globe);
        for(let i=0; i<3; i++) {
            const ring = new THREE.Mesh(new THREE.TorusGeometry(4 + i*0.5, 0.1, 16, 100), matOrange);
            ring.rotation.x = Math.random() * Math.PI;
            ring.rotation.y = Math.random() * Math.PI;
            modelNetwork.add(ring);
        }
        modelNetwork.visible = false;
        propGroup.add(modelNetwork);

        // MODEL 3: Web Monitor (Kannan)
        const modelMonitor = new THREE.Group();
        const screen = new THREE.Mesh(new THREE.BoxGeometry(8, 5, 0.5), matDark);
        modelMonitor.add(screen);
        const glass = new THREE.Mesh(new THREE.PlaneGeometry(7.5, 4.5), matGlass);
        glass.position.z = 0.26;
        modelMonitor.add(glass);
        const stand = new THREE.Mesh(new THREE.CylinderGeometry(0.5, 0.5, 2), matWhite);
        stand.position.y = -3.5;
        modelMonitor.add(stand);
        const base = new THREE.Mesh(new THREE.BoxGeometry(3, 0.2, 2), matOrange);
        base.position.y = -4.5;
        modelMonitor.add(base);
        // Code lines on screen
        const code1 = new THREE.Mesh(new THREE.BoxGeometry(4, 0.2, 0.1), matOrange);
        code1.position.set(-1.5, 1, 0.3);
        modelMonitor.add(code1);
        const code2 = new THREE.Mesh(new THREE.BoxGeometry(6, 0.2, 0.1), matWhite);
        code2.position.set(-0.5, 0, 0.3);
        modelMonitor.add(code2);
        const code3 = new THREE.Mesh(new THREE.BoxGeometry(3, 0.2, 0.1), matOrange);
        code3.position.set(-2, -1, 0.3);
        modelMonitor.add(code3);
        modelMonitor.visible = false;
        propGroup.add(modelMonitor);

        // MODEL 4: SEO Target / Magnifying Glass (Saravana)
        const modelSEO = new THREE.Group();
        const handle = new THREE.Mesh(new THREE.CylinderGeometry(0.3, 0.3, 4), matDark);
        handle.position.set(2, -2, 0);
        handle.rotation.z = -Math.PI/4;
        modelSEO.add(handle);
        const rim = new THREE.Mesh(new THREE.TorusGeometry(3, 0.4, 16, 50), matOrange);
        modelSEO.add(rim);
        const lens = new THREE.Mesh(new THREE.CylinderGeometry(2.8, 2.8, 0.2, 32), matGlass);
        lens.rotation.x = Math.PI/2;
        modelSEO.add(lens);
        modelSEO.visible = false;
        propGroup.add(modelSEO);

        // MODEL 5: Video Editing Clapperboard (Jabakumar)
        const modelVideo = new THREE.Group();
        const board = new THREE.Mesh(new THREE.BoxGeometry(6, 4, 0.5), matDark);
        modelVideo.add(board);
        const clapper = new THREE.Mesh(new THREE.BoxGeometry(6, 1, 0.5), matWhite);
        clapper.position.set(0, 2.5, 0);
        // Stripes on clapper
        for(let i=0; i<5; i++) {
            const stripe = new THREE.Mesh(new THREE.BoxGeometry(0.5, 1.1, 0.6), matOrange);
            stripe.position.set(-2 + i*1, 2.5, 0);
            stripe.rotation.z = Math.PI/6;
            modelVideo.add(stripe);
        }
        modelVideo.visible = false;
        propGroup.add(modelVideo);

        const allModels = [modelGrowth, modelNetwork, modelMonitor, modelSEO, modelVideo];

        // --- BACKGROUND PARTICLES (React to Mouse) ---
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
            // Normalize mouse from -1 to 1
            mouseX = (e.clientX / window.innerWidth) * 2 - 1;
            mouseY = -(e.clientY / window.innerHeight) * 2 + 1;
        });

        // --- SCROLL ANIMATIONS (Morphing and moving the Prop) ---
        
        const sections = ['#sec-kamalesh', '#sec-jaiharan', '#sec-kannan', '#sec-saravana', '#sec-jabakumar'];
        
        sections.forEach((sec, index) => {
            ScrollTrigger.create({
                trigger: sec,
                start: "top 60%",
                end: "bottom 60%",
                onEnter: () => switchModel(index),
                onEnterBack: () => switchModel(index)
            });
        });

        function switchModel(index) {
            allModels.forEach((m, i) => {
                if (i === index) {
                    m.visible = true;
                    gsap.fromTo(m.scale, {x:0, y:0, z:0}, {x:1, y:1, z:1, duration: 1, ease: 'back.out(1.5)'});
                } else {
                    m.visible = false;
                }
            });

            // Move the entire group based on the section alignment
            if (index === 0) { // Kamalesh (Left text) -> Prop Right
                gsap.to(propGroup.position, {x: 5, y: 0, z: 0, duration: 1});
                gsap.to(propGroup.rotation, {x: 0.2, y: -0.3, duration: 1});
            } else if (index === 1) { // JaiHaran (Right text) -> Prop Left
                gsap.to(propGroup.position, {x: -6, y: 0, z: 0, duration: 1});
                gsap.to(propGroup.rotation, {x: 0, y: 0.5, duration: 1});
            } else if (index === 2) { // Kannan (Left text) -> Prop Right
                gsap.to(propGroup.position, {x: 6, y: 0, z: 2, duration: 1});
                gsap.to(propGroup.rotation, {x: -0.1, y: -0.4, duration: 1});
            } else if (index === 3) { // Saravana (Right text) -> Prop Left
                gsap.to(propGroup.position, {x: -5, y: 0, z: 0, duration: 1});
                gsap.to(propGroup.rotation, {x: 0.2, y: 0.2, duration: 1});
            } else if (index === 4) { // Jabakumar (Center text) -> Prop Top
                gsap.to(propGroup.position, {x: 0, y: 5, z: -5, duration: 1});
                gsap.to(propGroup.rotation, {x: 0.1, y: 0, duration: 1});
            }
        }

        // Render Loop
        const clock = new THREE.Clock();
        function animate() {
            requestAnimationFrame(animate);
            const time = clock.getElapsedTime();
            
            // Continuous idle rotation
            propGroup.children.forEach(c => {
                if(c.visible) {
                    c.rotation.y += 0.005;
                    c.position.y = Math.sin(time * 2) * 0.3; // Floating effect
                }
            });

            // Mouse interaction with particles
            const positions = particles.geometry.attributes.position.array;
            for(let i=0; i<pCount; i++) {
                let bx = pBasePos[i*3];
                let by = pBasePos[i*3+1];
                
                // Particles avoid mouse (repel)
                // Map mouseX (-1 to 1) to world space (~ -20 to 20)
                let mwX = mouseX * 25;
                let mwY = mouseY * 15;
                
                let dx = bx - mwX;
                let dy = by - mwY;
                let dist = Math.sqrt(dx*dx + dy*dy);
                
                if (dist < 10) {
                    let force = (10 - dist) / 10;
                    positions[i*3] = bx + (dx/dist) * force * 5;
                    positions[i*3+1] = by + (dy/dist) * force * 5;
                } else {
                    // Return to base smoothly
                    positions[i*3] += (bx - positions[i*3]) * 0.1;
                    positions[i*3+1] += (by - positions[i*3+1]) * 0.1;
                }
            }
            particles.geometry.attributes.position.needsUpdate = true;

            // Slowly rotate the entire particle field
            particles.rotation.y = time * 0.02;

            renderer.setClearColor(themeConfig.bgColor, 1);
            pMat.opacity = themeConfig.particleOpacity;

            renderer.render(scene, camera);
        }
        animate();

        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    </script>
</body>
</html>
"""

with open('our-team.html', 'w', encoding='utf-8') as f:
    f.write(html_content)
    print("Rewritten our-team.html")
