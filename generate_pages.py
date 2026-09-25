import os

# --- BASE TEMPLATE ---
def get_base_html(title, content):
    return f"""<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{title} | Fusion X Digital Marketing Agency</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;800;900&family=Space+Grotesk:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo-container">
            <a href="index.html">
                <img src="logo_transparent.png" alt="Fusion X - Best Digital Marketing Agency India" class="logo">
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="index.html#home">HOME</a></li>
            <li><a href="about-us.html">ABOUT US</a></li>
            <li><a href="services.html">SERVICES</a></li>
            <li><a href="brands.html">BRANDS</a></li>
            <li><a href="our-team.html">OUR TEAM</a></li>
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

    {content}

    <footer>
        <h2 style="font-size:2rem;font-weight:900;letter-spacing:-1px;margin-bottom:6px;">FUSION X</h2>
        <p style="color:#ff5722;font-weight:700;letter-spacing:3px;font-size:0.78rem;text-transform:uppercase;margin-bottom:32px;">Take Your Brand Worldwide</p>
        <div style="margin-bottom:32px;">
            <a href="index.html#home" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">Home</a>
            <a href="about-us.html" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">About</a>
            <a href="services.html" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">Services</a>
            <a href="brands.html" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">Brands</a>
            <a href="contact.html" style="color:#ccc;text-decoration:none;margin:0 10px;font-size:0.9rem;">Connect</a>
        </div>
        <p style="color:#222;font-size:0.8rem;">© 2026 Fusion X Digital Marketing Agency. All Rights Reserved.</p>
    </footer>

    <script src="charm-physics.js"></script>
    <script>
        const hb = document.querySelector('.hamburger'), nl = document.querySelector('.nav-links');
        if (hb && nl) {{
            hb.addEventListener('click', () => {{
                const open = nl.classList.toggle('mob-open');
                Object.assign(nl.style, open ? {{ display:'flex', flexDirection:'column', position:'absolute', top:'70px', left:'0', width:'100%', background:'#fff', padding:'20px 0', gap:'20px' }} : {{ display:'none' }});
            }});
        }}
    </script>
</body>
</html>
"""

# --- OUR TEAM ---
team_content = """
    <style>
        #team-hero {
            position: relative;
            width: 100%;
            height: 100vh;
            background-color: #080808;
            overflow: hidden;
            margin-top: 80px; /* offset for navbar */
        }
        #team-canvas {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 1;
            cursor: grab;
        }
        #team-canvas:active { cursor: grabbing; }
        .ui-layer {
            position: absolute;
            inset: 0;
            z-index: 10;
            pointer-events: none;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding-bottom: 80px;
        }
        .active-info {
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            pointer-events: auto;
            color: #fff;
        }
        .active-info.visible { opacity: 1; transform: translateY(0); }
        .active-info h1 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2rem, 5vw, 4rem);
            font-weight: 900;
            margin: 0 0 10px 0;
            text-transform: uppercase;
            background: linear-gradient(135deg, #ffffff, #a0a0a0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .active-info .role {
            font-size: 1.2rem;
            color: #ff5722;
            font-weight: 600;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        .active-info p {
            font-size: 1.1rem;
            color: #b0b0b0;
            max-width: 600px;
            margin: 0 auto 20px auto;
            line-height: 1.6;
        }
        .instructions {
            position: absolute;
            top: 50%; width: 100%; text-align: center;
            font-size: 0.9rem; color: rgba(255,255,255,0.3);
            letter-spacing: 4px; pointer-events: none; z-index: 5;
            animation: pulse 2s infinite alternate;
        }
        @keyframes pulse { 0% { opacity: 0.2; } 100% { opacity: 0.6; } }
    </style>

    <section id="team-hero">
        <canvas id="team-canvas"></canvas>
        <div class="instructions">[ DRAG TO EXPLORE ]</div>
        <div class="ui-layer">
            <div class="active-info" id="info-panel">
                <div class="role" id="m-role">Role</div>
                <h1 id="m-name">Name</h1>
                <p id="m-desc">Description</p>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script>
        const canvas = document.getElementById('team-canvas');
        if (canvas) {
            const scene = new THREE.Scene();
            scene.fog = new THREE.Fog(0x080808, 30, 100);

            const camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 1000);
            camera.position.z = 45;
            camera.position.y = 2;

            const renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true });
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

            const members = [
                { id: 'jaiharan', name: 'Jaiharan K', role: 'Chief Executive Officer', img: 'team/jaiharan-k-ceo.webp', desc: 'The visionary force behind Fusion X. Jaiharan orchestrates global brand strategies, ensuring every campaign is engineered for maximum ROI.' },
                { id: 'kamalesh', name: 'Kamalesh J', role: 'Digital Marketing Expert', img: 'team/kamalesh-j-digital-marketing-expert.webp', desc: 'A master of paid media and conversion funnels. Kamalesh engineers data-driven ad campaigns that turn cold traffic into hyper-loyal customers.' },
                { id: 'saravana', name: 'Saravana Sanjhay M', role: 'SEO Expert', img: 'team/saravana-sanjhay-m-seo-expert.webp', desc: 'The architect of organic visibility. Saravana leverages advanced AEO, GEO, and technical SEO frameworks to secure top rankings globally.' },
                { id: 'kannan',   name: 'Kannan S', role: 'Web Developer', img: 'team/kannan-s-web-developer.webp', desc: 'The code wizard who brings digital experiences to life. Kannan builds ultra-fast, highly responsive websites with flawless interactive UI/UX.' },
                { id: 'jabakumar',name: 'Jabakumar', role: 'Video Editor', img: 'team/jabakumar-video-editor.webp', desc: 'The visual storyteller. Jabakumar crafts highly engaging, cinematic video content that captures attention and drives viral brand awareness.' }
            ];

            const carouselGroup = new THREE.Group();
            scene.add(carouselGroup);

            const textureLoader = new THREE.TextureLoader();
            const planes = [];
            const radius = 25; 
            const count = members.length;
            const angleStep = (Math.PI * 2) / count;

            members.forEach((data, i) => {
                const tex = textureLoader.load(data.img, () => {
                    // Success callback - forces render update
                    renderer.render(scene, camera);
                });
                tex.colorSpace = THREE.SRGBColorSpace;
                
                const material = new THREE.MeshBasicMaterial({
                    map: tex,
                    transparent: true,
                    side: THREE.DoubleSide
                });

                const geometry = new THREE.PlaneGeometry(16, 16);
                const mesh = new THREE.Mesh(geometry, material);
                
                const angle = i * angleStep;
                mesh.position.x = Math.sin(angle) * radius;
                mesh.position.z = Math.cos(angle) * radius;
                mesh.rotation.y = angle;
                
                mesh.userData = { index: i, angle: angle };
                carouselGroup.add(mesh);
                planes.push(mesh);
            });

            // Particles
            const particlesGeo = new THREE.BufferGeometry();
            const pCount = 800;
            const pPos = new Float32Array(pCount * 3);
            for(let i=0; i<pCount*3; i++) {
                pPos[i] = (Math.random() - 0.5) * 150;
            }
            particlesGeo.setAttribute('position', new THREE.BufferAttribute(pPos, 3));
            const particlesMat = new THREE.PointsMaterial({ color: 0xff5722, size: 0.2, transparent: true, opacity: 0.4 });
            const particles = new THREE.Points(particlesGeo, particlesMat);
            scene.add(particles);

            let currentAngle = 0;
            let targetAngle = 0;
            let isDragging = false;
            let startX = 0;
            let activeIndex = -1;

            const infoPanel = document.getElementById('info-panel');
            const mRole = document.getElementById('m-role');
            const mName = document.getElementById('m-name');
            const mDesc = document.getElementById('m-desc');

            function updateUI(index) {
                if (activeIndex === index) return;
                activeIndex = index;
                infoPanel.classList.remove('visible');
                setTimeout(() => {
                    const d = members[index];
                    mRole.innerText = d.role;
                    mName.innerText = d.name;
                    mDesc.innerText = d.desc;
                    infoPanel.classList.add('visible');
                }, 200);
            }

            const hero = document.getElementById('team-hero');
            hero.addEventListener('mousedown', e => { isDragging = true; startX = e.clientX; });
            hero.addEventListener('touchstart', e => { isDragging = true; startX = e.touches[0].clientX; }, {passive:true});
            window.addEventListener('mousemove', e => {
                if(!isDragging) return;
                targetAngle += (e.clientX - startX) * 0.005;
                startX = e.clientX;
            });
            window.addEventListener('touchmove', e => {
                if(!isDragging) return;
                targetAngle += (e.touches[0].clientX - startX) * 0.005;
                startX = e.touches[0].clientX;
            }, {passive:true});
            window.addEventListener('mouseup', () => { isDragging = false; snapToNearest(); });
            window.addEventListener('touchend', () => { isDragging = false; snapToNearest(); });

            function snapToNearest() {
                let normalized = targetAngle % (Math.PI * 2);
                if(normalized < 0) normalized += Math.PI * 2;
                
                let closestIndex = 0;
                let minDiff = Infinity;
                planes.forEach((p, i) => {
                    let worldAngle = (p.userData.angle + targetAngle) % (Math.PI * 2);
                    if(worldAngle < 0) worldAngle += Math.PI * 2;
                    let diff = Math.min(worldAngle, Math.PI * 2 - worldAngle);
                    if(diff < minDiff) { minDiff = diff; closestIndex = i; }
                });
                
                const idealWorldAngle = targetAngle + planes[closestIndex].userData.angle;
                const remainder = idealWorldAngle % (Math.PI * 2);
                let offset = -remainder;
                if(remainder > Math.PI) offset = (Math.PI * 2) - remainder;
                if(remainder < -Math.PI) offset = -(Math.PI * 2) - remainder;
                
                targetAngle += offset;
            }
            snapToNearest();

            function animate() {
                requestAnimationFrame(animate);
                currentAngle += (targetAngle - currentAngle) * 0.1;
                carouselGroup.rotation.y = currentAngle;
                particles.rotation.y = currentAngle * 0.5;

                let closestIndex = 0;
                let maxActive = 0;
                planes.forEach((plane, i) => {
                    const worldAngle = (plane.userData.angle + currentAngle) % (Math.PI * 2);
                    const normalizedAngle = worldAngle >= 0 ? worldAngle : worldAngle + Math.PI * 2;
                    const diff = Math.min(normalizedAngle, Math.PI * 2 - normalizedAngle);
                    const activeFactor = Math.max(0, 1.0 - (diff / (Math.PI/2)));
                    
                    const scale = 1.0 + (activeFactor * 0.2);
                    plane.scale.set(scale, scale, scale);
                    
                    if(activeFactor > maxActive) {
                        maxActive = activeFactor;
                        closestIndex = i;
                    }
                });
                
                if(maxActive > 0.8) updateUI(closestIndex);
                renderer.render(scene, camera);
            }
            animate();

            window.addEventListener('resize', () => {
                const rect = hero.getBoundingClientRect();
                camera.aspect = rect.width / rect.height;
                camera.updateProjectionMatrix();
                renderer.setSize(rect.width, rect.height);
            });
            // Initial size
            const rect = hero.getBoundingClientRect();
            renderer.setSize(rect.width, rect.height);
        }
    </script>
"""

# --- PAGE GEN ---
def create_page(filename, title, heading):
    content = f"""
    <section style="min-height: 70vh; display: flex; align-items: center; justify-content: center; padding-top: 100px;">
        <div style="text-align: center;">
            <h1 style="font-family: 'Outfit', sans-serif; font-size: 4rem; color: #111;">{heading}</h1>
            <p style="color: #666; font-size: 1.2rem;">Detailed page content goes here.</p>
        </div>
    </section>
    """
    with open(filename, 'w', encoding='utf-8') as f:
        f.write(get_base_html(title, content))

# Generate the placeholder pages
create_page('services.html', 'Our Services', 'Services')
create_page('brands.html', 'Brands We Work With', 'Brands')
create_page('our-works.html', 'Our Works', 'Our Works')
create_page('contact.html', 'Contact Us', 'Let\'s Connect')

# Generate Our Team
with open('our-team.html', 'w', encoding='utf-8') as f:
    f.write(get_base_html('Our Elite Team', team_content))

print("All pages generated!")
