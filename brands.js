// brands.js - Fusion X 3D Brand Models Engine & Multi-Brand Showcase
// Combines interactive Three.js 3D Brand Cubes with responsive Brand Showcase Matrix
(function() {
    'use strict';

    
    function resolveAsset(path) {
        if (!path) return '';
        if (path.startsWith('http') || path.startsWith('//') || path.startsWith('data:')) return path;
        return themeUri + path.replace(/^\//, '');
    }
    function resolveLink(slug) {
        if (!slug) return homeUrl;
        if (slug.startsWith('http') || slug.startsWith('//')) return slug;
        const cleanSlug = slug.replace(/\.html$/i, '').replace(/^\//, '');
        return homeUrl + cleanSlug + '/';
    }
    
    const brandsContainer = document.getElementById('brands-3d-container') || document.getElementById('brands');
    if (!brandsContainer) return;

    const themeUri = (window.fusionXData && window.fusionXData.themeUri) 
        ? (window.fusionXData.themeUri.replace(/\/$/, '') + '/') 
        : (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI.replace(/\/$/, '') + '/' : '');

    const homeUrl = (window.fusionXData && window.fusionXData.homeUrl) 
        ? (window.fusionXData.homeUrl.replace(/\/$/, '') + '/') 
        : (window.FUSION_X_HOME_URL ? window.FUSION_X_HOME_URL.replace(/\/$/, '') + '/' : '/');

    // Clear existing container
    brandsContainer.innerHTML = '';

    // =========================================================================
    // 1. THREE.JS 3D BRAND CUBES STAGE (Exact Design & Color from Git b91e78f)
    // =========================================================================
    const stage3D = document.createElement('div');
    stage3D.id = 'fx-brands-3d-canvas-wrap';
    stage3D.style.width = '100%';
    stage3D.style.height = '520px';
    stage3D.style.position = 'relative';
    stage3D.style.cursor = 'grab';
    stage3D.style.overflow = 'hidden';
    stage3D.style.borderRadius = '24px';
    stage3D.style.marginBottom = '40px';
    brandsContainer.appendChild(stage3D);

    // Instruction tag for 3D interaction
    const hintTag = document.createElement('div');
    hintTag.style.position = 'absolute';
    hintTag.style.bottom = '18px';
    hintTag.style.left = '50%';
    hintTag.style.transform = 'translateX(-50%)';
    hintTag.style.background = 'rgba(15, 23, 42, 0.85)';
    hintTag.style.color = '#ffffff';
    hintTag.style.padding = '8px 20px';
    hintTag.style.borderRadius = '50px';
    hintTag.style.fontSize = '0.8rem';
    hintTag.style.fontWeight = '700';
    hintTag.style.letterSpacing = '0.5px';
    hintTag.style.border = '1px solid rgba(255, 87, 34, 0.4)';
    hintTag.style.zIndex = '5';
    hintTag.style.pointerEvents = 'none';
    hintTag.innerHTML = '<i class="fas fa-cube" style="color:#ff5722;margin-right:6px;"></i> Interactive 3D Brand Cubes • Drag to Rotate & Tilt';
    stage3D.appendChild(hintTag);

    if (typeof THREE !== 'undefined') {
        const scene = new THREE.Scene();
        const aspect = stage3D.clientWidth / stage3D.clientHeight;
        const camera = new THREE.PerspectiveCamera(52, aspect, 0.1, 1000);
        camera.position.set(0, 0, 18);

        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        renderer.setSize(stage3D.clientWidth, stage3D.clientHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        stage3D.appendChild(renderer.domElement);

        // Lighting Rig for 3D Brand Cubes
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.85);
        scene.add(ambientLight);

        const dirLight = new THREE.DirectionalLight(0xffffff, 0.7);
        dirLight.position.set(10, 20, 15);
        scene.add(dirLight);

        const pointLight = new THREE.PointLight(0xff5722, 1.8, 50);
        pointLight.position.set(-5, -5, 10);
        scene.add(pointLight);

        // Texture generation function with 1:1 signature orange border (#ff5722)
        function createBrandTexture(b64, textName) {
            const canvas = document.createElement('canvas');
            canvas.width = 512;
            canvas.height = 512;
            const ctx = canvas.getContext('2d');

            ctx.fillStyle = '#ffffff';
            ctx.fillRect(0, 0, 512, 512);

            ctx.strokeStyle = '#ff5722';
            ctx.lineWidth = 24;
            ctx.strokeRect(0, 0, 512, 512);

            const tex = new THREE.CanvasTexture(canvas);
            tex.anisotropy = renderer.capabilities.getMaxAnisotropy();
            tex.minFilter = THREE.LinearMipmapLinearFilter;

            if (textName) {
                ctx.fillStyle = '#ff5722';
                ctx.font = 'bold 50px "Space Grotesk", sans-serif';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.fillText("Dr. Madhavi", 256, 220);
                ctx.fillText("Anjimati", 256, 290);
                tex.needsUpdate = true;
            } else if (b64) {
                const img = new Image();
                img.onload = () => {
                    const imgAspect = img.width / img.height;
                    let dw = 400, dh = 400;
                    if (imgAspect > 1) { dh = dw / imgAspect; } 
                    else { dw = dh * imgAspect; }
                    const dx = (512 - dw) / 2;
                    const dy = (512 - dh) / 2;
                    ctx.drawImage(img, dx, dy, dw, dh);
                    ctx.strokeRect(0, 0, 512, 512);
                    tex.needsUpdate = true;
                };
                img.src = b64;
            }
            return tex;
        }

        const cluster = new THREE.Group();
        scene.add(cluster);
        const cubes = [];

        // Textures source from brands_b64.js or clean fallback
        const textures = (typeof window.brandTextures !== 'undefined' && Array.isArray(window.brandTextures)) 
            ? window.brandTextures 
            : ['', '', '', '', '', '', '', '', ''];

        textures.slice(0, 9).forEach((b64, i) => {
            const tex = b64 === '' ? createBrandTexture(null, 'Dr. Madhavi') : createBrandTexture(b64);
            const geometry = new THREE.BoxGeometry(3.4, 3.4, 3.4);
            const material = new THREE.MeshStandardMaterial({
                map: tex,
                roughness: 0.28,
                metalness: 0.15
            });

            const mesh = new THREE.Mesh(geometry, material);
            const row = Math.floor(i / 3);
            const col = i % 3;
            const spacing = 4.8;
            const startX = (col - 1) * spacing;
            const startY = (row - 1) * -spacing;
            const startZ = (Math.random() - 0.5) * 5;

            mesh.position.set(startX, startY, startZ);
            mesh.rotation.x = Math.random() * Math.PI;
            mesh.rotation.y = Math.random() * Math.PI;

            mesh.userData = {
                rotSpeedX: (Math.random() - 0.5) * 0.012,
                rotSpeedY: (Math.random() - 0.5) * 0.012,
                rotSpeedZ: (Math.random() - 0.5) * 0.012,
                bobSpeed: 1 + Math.random() * 2,
                bobOffset: Math.random() * Math.PI * 2,
                baseY: startY
            };

            mesh.scale.set(0, 0, 0);
            cluster.add(mesh);
            cubes.push(mesh);
        });

        let targetRotX = 0;
        let targetRotY = 0;
        let currentRotX = 0;
        let currentRotY = 0;
        let isDragging = false;
        let previousMouse = { x: 0, y: 0 };
        let entranceProgress = 0;
        let hasEntered = false;

        const observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting && !hasEntered) {
                hasEntered = true;
            }
        }, { threshold: 0.15 });
        observer.observe(stage3D);

        function animateCubes() {
            requestAnimationFrame(animateCubes);

            currentRotX += (targetRotX - currentRotX) * 0.05;
            currentRotY += (targetRotY - currentRotY) * 0.05;
            cluster.rotation.x = currentRotX;
            cluster.rotation.y = currentRotY;

            if (hasEntered && entranceProgress < 1) {
                entranceProgress += 0.016;
                cubes.forEach((cube, i) => {
                    const delay = i * 0.07;
                    const p = Math.max(0, Math.min(1, (entranceProgress - delay) * 2.5));
                    const scale = 1 - Math.pow(1 - p, 4);
                    cube.scale.set(scale, scale, scale);
                });
            }

            if (hasEntered) {
                const time = Date.now() * 0.001;
                cubes.forEach(cube => {
                    cube.rotation.x += cube.userData.rotSpeedX;
                    cube.rotation.y += cube.userData.rotSpeedY;
                    cube.rotation.z += cube.userData.rotSpeedZ;
                    cube.position.y = cube.userData.baseY + Math.sin(time * cube.userData.bobSpeed + cube.userData.bobOffset) * 0.35;
                });
            }

            renderer.render(scene, camera);
        }
        animateCubes();

        stage3D.addEventListener('mousedown', (e) => {
            isDragging = true;
            previousMouse = { x: e.clientX, y: e.clientY };
            stage3D.style.cursor = 'grabbing';
        });

        window.addEventListener('mouseup', () => {
            isDragging = false;
            stage3D.style.cursor = 'grab';
        });

        window.addEventListener('mousemove', (e) => {
            if (isDragging) {
                const deltaX = e.clientX - previousMouse.x;
                const deltaY = e.clientY - previousMouse.y;
                targetRotY += deltaX * 0.005;
                targetRotX += deltaY * 0.005;
                previousMouse = { x: e.clientX, y: e.clientY };
            } else {
                const mouseX = (e.clientX / window.innerWidth) * 2 - 1;
                const mouseY = -(e.clientY / window.innerHeight) * 2 + 1;
                targetRotY = mouseX * 0.25;
                targetRotX = -mouseY * 0.25;
            }
        });

        stage3D.addEventListener('touchstart', (e) => {
            isDragging = true;
            previousMouse = { x: e.touches[0].clientX, y: e.touches[0].clientY };
        }, { passive: true });

        window.addEventListener('touchend', () => { isDragging = false; });

        window.addEventListener('touchmove', (e) => {
            if (!isDragging || e.touches.length === 0) return;
            const deltaX = e.touches[0].clientX - previousMouse.x;
            const deltaY = e.touches[0].clientY - previousMouse.y;
            targetRotY += deltaX * 0.006;
            targetRotX += deltaY * 0.006;
            previousMouse = { x: e.touches[0].clientX, y: e.touches[0].clientY };
        }, { passive: true });

        window.addEventListener('resize', () => {
            if (!stage3D) return;
            const newAspect = stage3D.clientWidth / stage3D.clientHeight;
            camera.aspect = newAspect;
            camera.position.z = newAspect < 1 ? 30 : 18;
            camera.updateProjectionMatrix();
            renderer.setSize(stage3D.clientWidth, stage3D.clientHeight);
        });

        if (aspect < 1) {
            camera.position.z = 30;
            camera.updateProjectionMatrix();
        }
    }

    // =========================================================================
    // 2. MULTI-BRAND REGISTRY & DUAL-ROW LOGO MARQUEE WITH CASE STUDY CARDS
    // =========================================================================
    const brandList = [
        {
            id: "off-human",
            slug: "off-human",
            name: "Off Human",
            category: "ecommerce",
            categoryLabel: "D2C & E-Commerce",
            tag: "Luxury Heavyweight Streetwear",
            logo: "brands/off-human/logo.jpg",
            metric: "4.8x Meta Ad ROAS",
            metricLabel: "Ad Performance",
            deliverable: "Custom Shopify D2C Storefront, Meta CAPI Tracking & Instant Sellout Launch Strategy"
        },
        {
            id: "energy-bags",
            slug: "energy-bags",
            name: "The Energy Bags",
            category: "ecommerce",
            categoryLabel: "D2C & E-Commerce",
            tag: "Eco Luggage & Carry Gear",
            logo: "brands/the-energy-bags.png",
            metric: "+320% Order Volume",
            metricLabel: "E-Commerce Growth",
            deliverable: "Custom Shopify Store, Collection Page Architecture & High-Converting Paid Media"
        },
        {
            id: "nilaro",
            slug: "nilaro",
            name: "Nilaro",
            category: "fnb",
            categoryLabel: "Food & Beverages",
            tag: "Artisanal Specialty Filter Coffee",
            logo: "brands/nilaro.png",
            metric: "+220% Subscriptions",
            metricLabel: "D2C Retention",
            deliverable: "Brand Identity, Bespoke Retail Packaging & Subscription E-Commerce Architecture"
        },
        {
            id: "bikerz-module",
            slug: "bikerz-module",
            name: "Bikerz Module",
            category: "ecommerce",
            categoryLabel: "D2C & E-Commerce",
            tag: "Automotive & Riding Gear",
            logo: "brands/bikerz/logo.jpg",
            metric: "+310% Online Checkouts",
            metricLabel: "Checkout Volume",
            deliverable: "High-Speed WooCommerce Store, Meta Catalog Sales & Cart Abandonment Retargeting"
        },
        {
            id: "bhawani-corner",
            slug: "bhawani-corner",
            name: "Bhawani Corner Glassware",
            category: "ecommerce",
            categoryLabel: "D2C & E-Commerce",
            tag: "India's No. 1 Glassware Brand",
            logo: "brands/bhawani-corner.png",
            metric: "900+ Inbound Calls",
            metricLabel: "Local Lead Volume",
            deliverable: "Local SEO 3-Pack Rank Dominance in T Nagar & High-Speed Product Catalog Web App"
        },
        {
            id: "dr-madhavi",
            slug: "dr-madhavi",
            name: "Dr. Madhavi Clinic",
            category: "healthcare",
            categoryLabel: "Healthcare & Clinics",
            tag: "Laser & Aesthetic Dermatology Clinic",
            logo: "brands/dr-madhavi/logo.svg",
            metric: "400+ Patient Leads",
            metricLabel: "Qualified Inquiries",
            deliverable: "Full-Funnel Meta & Google Patient Acquisition, GA4 Tracking & Lead Conversion Engine"
        },
        {
            id: "truly-yours",
            slug: "truly-yours",
            name: "Truly Yours",
            category: "healthcare",
            categoryLabel: "Healthcare & Clinics",
            tag: "Clinical Dermatological Skincare",
            logo: "brands/truly-yours/logo.jpg",
            metric: "+180% Repeat Sales",
            metricLabel: "Brand Loyalty",
            deliverable: "Brand Identity Moat, Customer Messaging Matrix & High-LTV D2C Funnels"
        },
        {
            id: "sridhar-food-house",
            slug: "sridhar-food-house",
            name: "Sridhar Food House",
            category: "fnb",
            categoryLabel: "Food & Beverages",
            tag: "Heritage Chaat & Street Food",
            logo: "brands/sridhar-food-house.jpg",
            metric: "+240% Footfall Surge",
            metricLabel: "In-Store Traffic",
            deliverable: "Google Maps 3-Pack Kolathur Dominance, Viral Food Reels & Local Citation Engine"
        },
        {
            id: "tk-cinematic",
            slug: "tk-cinematic-studio",
            name: "TK Cinematic Studio",
            category: "media",
            categoryLabel: "Media & Studios",
            tag: "Film & Commercial Production",
            logo: "brands/tk/logo.png",
            metric: "7.9% Organic CTR",
            metricLabel: "Search Performance",
            deliverable: "Creator Portfolio Platform, Video Production SEO & Client Booking Engine"
        },
        {
            id: "meeras-parlour",
            slug: "meeras-beauty-parlour",
            name: "Meera's Beauty Parlour",
            category: "media",
            categoryLabel: "Media & Studios",
            tag: "Luxury Bridal & Salon Booking",
            logo: "brands/meeras/logo.webp",
            metric: "+190% Bridal Bookings",
            metricLabel: "Appointment Growth",
            deliverable: "Local SEO GMB Ranking, Social Media Creative Feeds & WhatsApp Appointment Bot"
        }
    ];

    const showcaseWrapper = document.createElement('div');
    showcaseWrapper.className = 'fx-brands-showcase-wrap';

    // Dual-Row Marquee
    const marqueeSection = document.createElement('div');
    marqueeSection.className = 'fx-brands-marquee-wrap';

    const marqueeRow1 = document.createElement('div');
    marqueeRow1.className = 'fx-marquee-row fx-marquee-left';
    const marqueeTrack1 = document.createElement('div');
    marqueeTrack1.className = 'fx-marquee-track';

    const repeatedBrands = [...brandList, ...brandList, ...brandList];

    repeatedBrands.forEach(b => {
        const item = document.createElement('div');
        item.className = 'fx-marquee-item';
        const logoUrl = themeUri + b.logo;
        const pageUrl = homeUrl + b.slug + '/';
        item.innerHTML = `
            <a href="${pageUrl}" class="fx-marquee-link" title="${b.name} - ${b.tag}">
                <img src="${logoUrl}" alt="${b.name}" class="fx-marquee-logo" loading="lazy">
                <span class="fx-marquee-name">${b.name}</span>
            </a>
        `;
        marqueeTrack1.appendChild(item);
    });

    marqueeRow1.appendChild(marqueeTrack1);
    marqueeSection.appendChild(marqueeRow1);
    showcaseWrapper.appendChild(marqueeSection);

    const controlsBar = document.createElement('div');
    controlsBar.className = 'fx-brands-controls-bar';

    // Category Filter Pills
    const filterTabs = document.createElement('div');
    filterTabs.className = 'fx-brands-filters';

    const categories = [
        { key: "all", label: "All Brands", count: brandList.length },
        { key: "ecommerce", label: "D2C & E-Commerce", count: brandList.filter(b => b.category === 'ecommerce').length },
        { key: "healthcare", label: "Healthcare & Clinics", count: brandList.filter(b => b.category === 'healthcare').length },
        { key: "fnb", label: "Food & Beverages", count: brandList.filter(b => b.category === 'fnb').length },
        { key: "media", label: "Media & Studios", count: brandList.filter(b => b.category === 'media').length }
    ];

    let currentCategory = "all";
    let currentViewMode = "grid"; // "grid" or "carousel"

    categories.forEach((cat, index) => {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = `fx-filter-pill ${index === 0 ? 'active' : ''}`;
        btn.dataset.category = cat.key;
        btn.innerHTML = `<span>${cat.label}</span><span class="fx-filter-count">${cat.count}</span>`;
        btn.addEventListener('click', () => {
            document.querySelectorAll('.fx-filter-pill').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            currentCategory = cat.key;
            renderCards();
        });
        filterTabs.appendChild(btn);
    });

    // View Switcher Buttons
    const viewSwitcher = document.createElement('div');
    viewSwitcher.className = 'fx-view-switcher';
    viewSwitcher.innerHTML = `
        <button type="button" class="fx-view-btn active" data-view="grid" title="Show All Brands in Grid View">
            <i class="fa-solid fa-grip"></i> Grid View
        </button>
        <button type="button" class="fx-view-btn" data-view="carousel" title="Browse in Multi-Card Carousel View">
            <i class="fa-solid fa-arrows-left-right"></i> Slider View
        </button>
    `;

    controlsBar.appendChild(filterTabs);
    controlsBar.appendChild(viewSwitcher);
    showcaseWrapper.appendChild(controlsBar);

    // Carousel Navigation Bar (Used when in Carousel View)
    const carouselNav = document.createElement('div');
    carouselNav.className = 'fx-carousel-nav';
    carouselNav.style.display = 'none';
    carouselNav.innerHTML = `
        <button type="button" class="fx-carousel-arrow fx-arrow-prev" aria-label="Previous Brand">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <span class="fx-carousel-counter">Showing Multiple Brands</span>
        <button type="button" class="fx-carousel-arrow fx-arrow-next" aria-label="Next Brand">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    `;
    showcaseWrapper.appendChild(carouselNav);

    // â”€â”€ 3. MULTI-BRAND SHOWCASE CARDS CONTAINER â”€â”€
    const cardsContainer = document.createElement('div');
    cardsContainer.className = 'fx-brands-grid fx-view-grid';
    showcaseWrapper.appendChild(cardsContainer);

    // Function to Render Multi-Brand Product Cards
    function renderCards() {
        cardsContainer.innerHTML = '';

        const filteredList = currentCategory === "all" 
            ? brandList 
            : brandList.filter(b => b.category === currentCategory);

        filteredList.forEach((brand, idx) => {
            const card = document.createElement('div');
            card.className = 'fx-brand-card';
            card.dataset.category = brand.category;
            card.style.animationDelay = `${idx * 0.05}s`;

            card.innerHTML = `
                <div class="fx-card-top-header">
                    <span class="fx-verified-pill"><i class="fa-solid fa-gem"></i> Verified Client</span>
                    <span class="fx-category-badge">${brand.categoryLabel}</span>
                </div>

                <div class="fx-brand-logo-stage">
                    <img src="${brand.logo}" alt="${brand.name} Logo" class="fx-brand-stage-logo" loading="lazy">
                    <div class="fx-preview-overlay">
                        <span class="fx-overlay-tag"><i class="fa-solid fa-arrow-up-right-from-square"></i> ${brand.tag}</span>
                    </div>
                </div>

                <div class="fx-card-content">
                    <div class="fx-title-row">
                        <h3 class="fx-brand-name">${brand.name}</h3>
                        <span class="fx-verified-badge" title="Verified Client Partner"><i class="fa-solid fa-circle-check"></i></span>
                    </div>
                    <span class="fx-brand-tagline">${brand.tag}</span>

                    <div class="fx-metric-pill">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <strong>${brand.metric}</strong>
                        <span class="fx-metric-lbl">(${brand.metricLabel})</span>
                    </div>

                    <p class="fx-deliverable-desc">${brand.deliverable}</p>

                    <a href="${brand.link}" class="fx-case-study-btn">
                        <span>Explore Case Study</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            `;
            cardsContainer.appendChild(card);
        });

        // Update carousel state
        updateCarouselControls();
    }

    // View Switcher Handler
    viewSwitcher.querySelectorAll('.fx-view-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            viewSwitcher.querySelectorAll('.fx-view-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            currentViewMode = btn.dataset.view;

            if (currentViewMode === 'carousel') {
                cardsContainer.className = 'fx-brands-grid fx-view-carousel';
                carouselNav.style.display = 'flex';
            } else {
                cardsContainer.className = 'fx-brands-grid fx-view-grid';
                carouselNav.style.display = 'none';
            }
            updateCarouselControls();
        });
    });

    // Carousel Arrow Handlers
    const prevArrow = carouselNav.querySelector('.fx-arrow-prev');
    const nextArrow = carouselNav.querySelector('.fx-arrow-next');

    if (prevArrow && nextArrow) {
        prevArrow.addEventListener('click', () => {
            cardsContainer.scrollBy({ left: -360, behavior: 'smooth' });
        });
        nextArrow.addEventListener('click', () => {
            cardsContainer.scrollBy({ left: 360, behavior: 'smooth' });
        });
    }

    function updateCarouselControls() {
        const counter = carouselNav.querySelector('.fx-carousel-counter');
        if (counter) {
            const count = cardsContainer.children.length;
            counter.textContent = `${count} Multiple Brands Live`;
        }
    }

    // Append Showcase System to Target Container
    brandsContainer.appendChild(showcaseWrapper);

    // Initial Card Render
    renderCards();

    brandsContainer.appendChild(showcaseWrapper);

    // Initial Card Render
    renderCards();
})();