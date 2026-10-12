// brands.js - Fusion X Next-Gen 3D Horizon Showcase with Dynamic Physics & Holographic Pedestal
(function() {
    const brandsContainer = document.getElementById('brands-3d-container');
    if (!brandsContainer) return;

    // Master Client Brand Registry with verified live routes
    const brandList = [
        {
            name: "The Energy Bags",
            tag: "Eco & Luggage Brand",
            image: "brands/the-energy-bags.png",
            link: "energy-bags.html"
        },
        {
            name: "Bikerz Module",
            tag: "Automotive & Riding Gear",
            image: "brands/the-bikerz-module.jpg",
            link: "bikerz-module.html"
        },
        {
            name: "Truly Yours",
            tag: "Dermatological Skincare",
            image: "brands/truly-yours.jpg",
            link: "truly-yours.html"
        },
        {
            name: "TK Cinematic Studio",
            tag: "Film & Creator Studio",
            image: "brands/tk-cinematic-studio.png",
            link: "tk-cinematic-studio.html"
        },
        {
            name: "Nilaro",
            tag: "Artisanal Filter Coffee",
            image: "brands/nilaro.png",
            link: "nilaro.html"
        },
        {
            name: "Bhawani Corner Glassware",
            tag: "India's No. 1 Glassware Brand",
            image: "brands/bhawani-corner.png",
            link: "bhawani-corner.html"
        },
        {
            name: "Off Human",
            tag: "Luxury Streetwear Brand",
            image: "brands/off-human.jpg",
            link: "off-human.html"
        },
        {
            name: "Dr. Madhavi",
            tag: "Laser & Aesthetic Clinic",
            image: "",
            link: "dr-madhavi.html"
        },
        {
            name: "Meera's Beauty Parlour",
            tag: "Bridal & Beauty Salon",
            image: "brands/meeras-beauty-parlour.webp",
            link: "meeras-beauty-parlour.html"
        },
        {
            name: "Sridhar Food House",
            tag: "Heritage Chaat & Street Food",
            image: "brands/sridhar-food-house.jpg",
            link: "sridhar-food-house.html"
        }
    ];

    const totalBrands = brandList.length;
    const angleStep = 360 / totalBrands;

    // Clean & Prepare Stage
    brandsContainer.innerHTML = '';
    brandsContainer.style.background = 'transparent';
    brandsContainer.style.width = '100%';
    brandsContainer.style.position = 'relative';

    const stage = document.createElement('div');
    stage.className = 'brands-stage-container';

    // 3D Viewport
    const viewport = document.createElement('div');
    viewport.className = 'brands-viewport';

    // Holographic Cyber Pedestal
    const pedestal = document.createElement('div');
    pedestal.className = 'brands-pedestal';
    pedestal.innerHTML = `
        <div class="pedestal-track-outer"></div>
        <div class="pedestal-track-inner"></div>
        <div class="pedestal-core-hotspot"></div>
    `;
    viewport.appendChild(pedestal);

    // 3D Revolving Ring
    const ring = document.createElement('div');
    ring.className = 'brands-ring';
    viewport.appendChild(ring);

    // Build Brand Cards
    const cardElements = [];
    for (let i = 0; i < totalBrands; i++) {
        const item = brandList[i];
        const card = document.createElement('div');
        card.className = 'brand-card-3d';
        card.dataset.index = i;

        // Card Glass Inner Shell
        const innerShell = document.createElement('div');
        innerShell.className = 'brand-card-inner';

        if (!item.image || item.image.trim() === '') {
            // High-Tech Specialist Card for Dr. Madhavi
            const textWrap = document.createElement('div');
            textWrap.className = 'brand-card-text';
            textWrap.innerHTML = `
                <div class="brand-text-icon-wrap">
                    <i class="fa-solid fa-user-doctor brand-card-text-icon"></i>
                </div>
                <div class="brand-card-text-name">${item.name}</div>
                <div class="brand-card-text-tag">${item.tag}</div>
            `;
            innerShell.appendChild(textWrap);
        } else {
            const imgWrap = document.createElement('div');
            imgWrap.className = 'brand-img-wrap';
            const img = document.createElement('img');
            img.src = item.image;
            img.alt = item.name;
            img.draggable = false;
            img.loading = "lazy";
            imgWrap.appendChild(img);
            innerShell.appendChild(imgWrap);
        }

        // Floating Action Link Badge
        if (item.link) {
            const linkBadge = document.createElement('div');
            linkBadge.className = 'brand-card-link-badge';
            linkBadge.innerHTML = '<i class="fa-solid fa-arrow-up-right-from-square"></i>';
            linkBadge.title = `Explore ${item.name} Case Study`;
            innerShell.appendChild(linkBadge);
        }

        card.appendChild(innerShell);
        ring.appendChild(card);
        cardElements.push(card);
    }

    stage.appendChild(viewport);

    // Interactive Nav Deck
    const navDeck = document.createElement('div');
    navDeck.className = 'brands-nav-deck';

    const prevBtn = document.createElement('button');
    prevBtn.className = 'brands-arrow-btn';
    prevBtn.setAttribute('aria-label', 'Previous Brand');
    prevBtn.innerHTML = '<i class="fa-solid fa-chevron-left"></i>';

    const activeChip = document.createElement('div');
    activeChip.className = 'brands-active-chip';

    const nextBtn = document.createElement('button');
    nextBtn.className = 'brands-arrow-btn';
    nextBtn.setAttribute('aria-label', 'Next Brand');
    nextBtn.innerHTML = '<i class="fa-solid fa-chevron-right"></i>';

    navDeck.appendChild(prevBtn);
    navDeck.appendChild(activeChip);
    navDeck.appendChild(nextBtn);
    stage.appendChild(navDeck);

    // Pagination Dots
    const dotsRow = document.createElement('div');
    dotsRow.className = 'brands-dots-row';
    const dotElements = [];
    for (let i = 0; i < totalBrands; i++) {
        const dot = document.createElement('div');
        dot.className = 'brand-dot' + (i === 0 ? ' active' : '');
        dot.dataset.index = i;
        dot.title = brandList[i].name;
        dotsRow.appendChild(dot);
        dotElements.push(dot);
    }
    stage.appendChild(dotsRow);

    // Swipe Hint with live motion icon
    const hint = document.createElement('div');
    hint.className = 'brands-hint';
    hint.innerHTML = '<i class="fa-solid fa-hand-pointer"></i> Click any card to rotate into focus • Drag or swipe horizontally';
    stage.appendChild(hint);

    brandsContainer.appendChild(stage);

    // Physics & State Engine
    let currentAngle = 0;
    let targetAngle = 0;
    let isInteractingTarget = false;
    let isDragging = false;
    let startX = 0;
    let lastX = 0;
    let velocity = 0;
    let isHovered = false;
    let currentFrontIndex = -1;
    let dragDistance = 0;

    // Mouse tilt perspective
    let mouseTiltX = 8; // Default subtle pitch forward
    let mouseTiltY = 0;

    function getRadius() {
        const w = window.innerWidth;
        if (w < 480) return 195;
        if (w < 768) return 250;
        if (w < 1024) return 330;
        return 400;
    }

    let radius = getRadius();

    function updateCardPositions() {
        radius = getRadius();
        for (let i = 0; i < totalBrands; i++) {
            const card = cardElements[i];
            const baseAngle = i * angleStep;
            card.style.transform = `rotateY(${baseAngle}deg) translateZ(${radius}px)`;
        }
    }

    updateCardPositions();
    window.addEventListener('resize', updateCardPositions);

    // Active Brand Controller
    function setActiveBrand(index) {
        if (index === currentFrontIndex) return;
        currentFrontIndex = index;

        const item = brandList[index];
        if (item) {
            let linkHtml = '';
            if (item.link) {
                const isInternal = item.link.endsWith('.html');
                const targetAttr = isInternal ? '' : 'target="_blank" rel="noopener noreferrer"';
                const label = isInternal ? 'Case Study' : 'Visit Brand';
                linkHtml = `<a href="${item.link}" ${targetAttr} class="brands-chip-btn" title="${label}">${label} <i class="fa-solid fa-arrow-right"></i></a>`;
            }

            activeChip.innerHTML = `
                <div class="brands-chip-left">
                    <span class="brands-chip-pulse"></span>
                    <span class="brands-chip-name">${item.name}</span>
                    <span class="brands-chip-tag">${item.tag}</span>
                </div>
                ${linkHtml}
            `;
        }

        dotElements.forEach((dot, idx) => {
            if (idx === index) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    setActiveBrand(0);

    // 60FPS Hardware-Accelerated Physics Loop
    const idleSpeed = -0.16; // Smooth cinematic rotation

    function animate() {
        if (!isDragging) {
            if (isInteractingTarget) {
                const diff = targetAngle - currentAngle;
                if (Math.abs(diff) < 0.04) {
                    currentAngle = targetAngle;
                    isInteractingTarget = false;
                } else {
                    currentAngle += diff * 0.14; // Snappier spring transition
                }
            } else if (Math.abs(velocity) > 0.05) {
                currentAngle += velocity;
                velocity *= 0.92;
            } else {
                if (!isHovered) {
                    currentAngle += idleSpeed;
                }
            }
        }

        // Apply 3D perspective rotation with dynamic tilt
        ring.style.transform = `rotateX(${mouseTiltX}deg) rotateY(${currentAngle}deg)`;

        // Calculate card depth, opacity, and scale
        let bestCos = -2;
        let bestIndex = 0;

        for (let i = 0; i < totalBrands; i++) {
            const card = cardElements[i];
            const normAngle = ((i * angleStep + currentAngle) % 360 + 540) % 360 - 180;
            const rad = (normAngle * Math.PI) / 180;
            const cos = Math.cos(rad);

            if (cos > bestCos) {
                bestCos = cos;
                bestIndex = i;
            }

            if (cos > 0) {
                card.style.display = 'flex';
                const opacity = Math.min(1, Math.max(0.3, Math.pow(cos, 0.7)));
                card.style.opacity = opacity.toFixed(3);
                card.style.pointerEvents = 'auto';

                // Scale card based on depth (front is larger, side cards recede)
                const cardScale = 0.86 + (0.22 * cos);
                card.dataset.scale = cardScale.toFixed(3);

                if (Math.abs(normAngle) < 18) {
                    card.classList.add('is-front');
                    card.style.zIndex = '10';
                } else {
                    card.classList.remove('is-front');
                    card.style.zIndex = Math.round(cos * 8);
                }
            } else {
                card.style.opacity = '0';
                card.style.pointerEvents = 'none';
                card.classList.remove('is-front');
            }
        }

        setActiveBrand(bestIndex);
        requestAnimationFrame(animate);
    }

    requestAnimationFrame(animate);

    // Mouse Tracking for 3D Stage Tilt
    viewport.addEventListener('mousemove', (e) => {
        const rect = viewport.getBoundingClientRect();
        const yNorm = (e.clientY - rect.top) / rect.height; // 0 to 1
        mouseTiltX = 4 + (yNorm * 8); // Tilt between 4deg and 12deg
    });

    viewport.addEventListener('mouseleave', () => {
        mouseTiltX = 8;
    });

    // Pointer Drag & Swipe Handling
    function onPointerDown(e) {
        isDragging = true;
        isInteractingTarget = false;
        startX = e.clientX;
        lastX = e.clientX;
        dragDistance = 0;
        velocity = 0;
        viewport.style.cursor = 'grabbing';
    }

    function onPointerMove(e) {
        if (!isDragging) return;
        const currentX = e.clientX;
        const deltaX = currentX - lastX;
        lastX = currentX;
        dragDistance += Math.abs(deltaX);

        const sensitivity = window.innerWidth < 768 ? 0.45 : 0.35;
        currentAngle += deltaX * sensitivity;
        velocity = deltaX * sensitivity;
    }

    function onPointerUp() {
        if (!isDragging) return;
        isDragging = false;
        viewport.style.cursor = 'grab';
    }

    viewport.addEventListener('pointerdown', onPointerDown);
    window.addEventListener('pointermove', onPointerMove);
    window.addEventListener('pointerup', onPointerUp);
    window.addEventListener('pointercancel', onPointerUp);

    // Hover detection to pause idle orbit
    viewport.addEventListener('mouseenter', () => { isHovered = true; });
    viewport.addEventListener('mouseleave', () => { isHovered = false; });

    // Rotate directly to brand index
    function rotateToIndex(index) {
        isInteractingTarget = true;
        velocity = 0;
        const normAngle = ((index * angleStep + currentAngle) % 360 + 540) % 360 - 180;
        targetAngle = currentAngle - normAngle;
    }

    // Card Click Handler
    cardElements.forEach((card, index) => {
        card.addEventListener('click', (e) => {
            if (dragDistance > 8) return; // Ignore drag release
            const item = brandList[index];
            if (card.classList.contains('is-front') && item.link) {
                if (item.link.endsWith('.html')) {
                    window.location.href = item.link;
                } else {
                    window.open(item.link, '_blank');
                }
            } else {
                rotateToIndex(index);
            }
        });
    });

    // Arrow Buttons
    prevBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        isInteractingTarget = true;
        velocity = 0;
        targetAngle = Math.round((currentAngle + angleStep) / angleStep) * angleStep;
    });

    nextBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        isInteractingTarget = true;
        velocity = 0;
        targetAngle = Math.round((currentAngle - angleStep) / angleStep) * angleStep;
    });

    // Keyboard Arrow Navigation
    window.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            isInteractingTarget = true;
            velocity = 0;
            targetAngle = Math.round((currentAngle + angleStep) / angleStep) * angleStep;
        } else if (e.key === 'ArrowRight') {
            isInteractingTarget = true;
            velocity = 0;
            targetAngle = Math.round((currentAngle - angleStep) / angleStep) * angleStep;
        }
    });

    // Pagination Dots
    dotElements.forEach((dot, index) => {
        dot.addEventListener('click', (e) => {
            e.stopPropagation();
            rotateToIndex(index);
        });
    });

})();
