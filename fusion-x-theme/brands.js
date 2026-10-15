// brands.js - Fusion X Next-Gen Multi-Brand & Product Showcase System
// Displays multiple brands simultaneously with infinite logo ticker, category filters, and product cards
(function() {
    'use strict';

    const brandsContainer = document.getElementById('brands-3d-container') || document.getElementById('brands');
    if (!brandsContainer) return;

    const themeUri = (window.fusionXData && window.fusionXData.themeUri) ? (window.fusionXData.themeUri.replace(/\/$/, '') + '/') : (window.FUSION_X_THEME_URI ? window.FUSION_X_THEME_URI.replace(/\/$/, '') + '/' : '');
    const homeUrl = (window.fusionXData && window.fusionXData.homeUrl) ? (window.fusionXData.homeUrl.replace(/\/$/, '') + '/') : (window.FUSION_X_HOME_URL ? window.FUSION_X_HOME_URL.replace(/\/$/, '') + '/' : '/');

    function resolveAsset(p) {
        if (!p) return '';
        if (p.startsWith('http://') || p.startsWith('https://') || p.startsWith('/')) return p;
        return themeUri + p;
    }

    function resolveLink(l) {
        if (!l) return '#';
        if (l.startsWith('http://') || l.startsWith('https://') || l.startsWith('#')) return l;
        const slug = l.replace(/\.html$/, '');
        return homeUrl + (slug === 'index' ? '' : slug + '/');
    }

    // Master Client Brand & Product Registry
    const brandList = [
        {
            id: "off-human",
            name: "Off Human",
            category: "ecommerce",
            categoryLabel: "D2C & E-Commerce",
            tag: "Luxury Heavyweight Streetwear",
            logo: "brands/off-human/logo.jpg",
            productImage: "brands/off-human/logo.jpg",
            productTitle: "Heavyweight Oversized Streetwear Drops",
            metric: "4.8x Meta Ad ROAS",
            metricLabel: "Ad Performance",
            deliverable: "Custom Shopify D2C Storefront, Meta CAPI Tracking & Instant Sellout Launch Strategy",
            link: "off-human.html"
        },
        {
            id: "energy-bags",
            name: "The Energy Bags",
            category: "ecommerce",
            categoryLabel: "D2C & E-Commerce",
            tag: "Eco Luggage & Carry Gear",
            logo: "brands/the-energy-bags.png",
            productImage: "brands/the-energy-bags.png",
            productTitle: "Durable Eco Luggage & Travel Backpacks",
            metric: "+320% Order Volume",
            metricLabel: "E-Commerce Growth",
            deliverable: "Custom Shopify Store, Collection Page Architecture & High-Converting Paid Media",
            link: "energy-bags.html"
        },
        {
            id: "nilaro",
            name: "Nilaro",
            category: "fnb",
            categoryLabel: "Food & Beverages",
            tag: "Artisanal Specialty Filter Coffee",
            logo: "brands/nilaro.png",
            productImage: "brands/nilaro.png",
            productTitle: "Single-Origin Dark Roast Coffee Pouches",
            metric: "+220% Subscriptions",
            metricLabel: "D2C Retention",
            deliverable: "Brand Identity, Bespoke Retail Packaging & Subscription E-Commerce Architecture",
            link: "nilaro.html"
        },
        {
            id: "bikerz-module",
            name: "Bikerz Module",
            category: "ecommerce",
            categoryLabel: "D2C & E-Commerce",
            tag: "Automotive & Riding Gear",
            logo: "brands/bikerz/logo.jpg",
            productImage: "brands/bikerz/logo.jpg",
            productTitle: "High-Performance Riding Helmets & Gear",
            metric: "+310% Online Checkouts",
            metricLabel: "Checkout Volume",
            deliverable: "High-Speed WooCommerce Store, Meta Catalog Sales & Cart Abandonment Retargeting",
            link: "bikerz-module.html"
        },
        {
            id: "bhawani-corner",
            name: "Bhawani Corner Glassware",
            category: "ecommerce",
            categoryLabel: "D2C & E-Commerce",
            tag: "India's No. 1 Glassware Brand",
            logo: "brands/bhawani-corner.png",
            productImage: "brands/bhawani-corner.png",
            productTitle: "Premium Hospitality & Kitchen Glassware",
            metric: "900+ Inbound Calls",
            metricLabel: "Local Lead Volume",
            deliverable: "Local SEO 3-Pack Rank Dominance in T Nagar & High-Speed Product Catalog Web App",
            link: "bhawani-corner.html"
        },
        {
            id: "dr-madhavi",
            name: "Dr. Madhavi Clinic",
            category: "healthcare",
            categoryLabel: "Healthcare & Clinics",
            tag: "Laser & Aesthetic Dermatology Clinic",
            logo: "brands/dr-madhavi/logo.svg",
            productImage: "brands/dr-madhavi/logo.svg",
            productTitle: "Advanced Clinical Laser & Skin Treatments",
            metric: "400+ Patient Leads",
            metricLabel: "Qualified Inquiries",
            deliverable: "Full-Funnel Meta & Google Patient Acquisition, GA4 Tracking & Lead Conversion Engine",
            link: "dr-madhavi.html"
        },
        {
            id: "truly-yours",
            name: "Truly Yours",
            category: "healthcare",
            categoryLabel: "Healthcare & Clinics",
            tag: "Clinical Dermatological Skincare",
            logo: "brands/truly-yours/logo.jpg",
            productImage: "brands/truly-yours/logo.jpg",
            productTitle: "Dermatologist-Formulated Face Serums",
            metric: "+180% Repeat Sales",
            metricLabel: "Brand Loyalty",
            deliverable: "Brand Identity Moat, Customer Messaging Matrix & High-LTV D2C Funnels",
            link: "truly-yours.html"
        },
        {
            id: "sridhar-food-house",
            name: "Sridhar Food House",
            category: "fnb",
            categoryLabel: "Food & Beverages",
            tag: "Heritage Chaat & Street Food",
            logo: "brands/sridhar-food-house.jpg",
            productImage: "brands/sridhar-food-house.jpg",
            productTitle: "Authentic North Indian Chaat & Delicacies",
            metric: "+240% Footfall Surge",
            metricLabel: "In-Store Traffic",
            deliverable: "Google Maps 3-Pack Kolathur Dominance, Viral Food Reels & Local Citation Engine",
            link: "sridhar-food-house.html"
        },
        {
            id: "tk-cinematic",
            name: "TK Cinematic Studio",
            category: "media",
            categoryLabel: "Media & Studios",
            tag: "Film & Commercial Production",
            logo: "brands/tk/logo.png",
            productImage: "brands/tk/logo.png",
            productTitle: "Commercial Film & Creator Studio",
            metric: "7.9% Organic CTR",
            metricLabel: "Search Performance",
            deliverable: "Creator Portfolio Platform, Video Production SEO & Client Booking Engine",
            link: "tk-cinematic-studio.html"
        },
        {
            id: "meeras-parlour",
            name: "Meera's Beauty Parlour",
            category: "media",
            categoryLabel: "Media & Studios",
            tag: "Luxury Bridal & Salon Booking",
            logo: "brands/meeras/logo.webp",
            productImage: "brands/meeras/logo.webp",
            productTitle: "Bespoke Bridal Makeover & Spa Packages",
            metric: "+190% Bridal Bookings",
            metricLabel: "Appointment Growth",
            deliverable: "Local SEO GMB Ranking, Social Media Creative Feeds & WhatsApp Appointment Bot",
            link: "meeras-beauty-parlour.html"
        }
    ];

    // Clear existing container content
    brandsContainer.innerHTML = '';

    // Create Main Wrapper
    const showcaseWrapper = document.createElement('div');
    showcaseWrapper.className = 'fx-brands-showcase-wrap';

    // ── 1. DUAL-ROW INFINITE LOGO STREAM MARQUEE ──
    const marqueeSection = document.createElement('div');
    marqueeSection.className = 'fx-brands-marquee-wrap';

    const marqueeRow1 = document.createElement('div');
    marqueeRow1.className = 'fx-marquee-row fx-marquee-left';

    const marqueeTrack1 = document.createElement('div');
    marqueeTrack1.className = 'fx-marquee-track';

    // Duplicate list 3 times for continuous infinite seamless scrolling
    const repeatedBrands = [...brandList, ...brandList, ...brandList];

    repeatedBrands.forEach(b => {
        const item = document.createElement('div');
        item.className = 'fx-marquee-item';
        item.innerHTML = `
            <a href="${resolveLink(b.link)}" class="fx-marquee-link" title="${b.name} - ${b.tag}">
                <img src="${resolveAsset(b.logo)}" alt="${b.name}" class="fx-marquee-logo" loading="lazy">
                <span class="fx-marquee-name">${b.name}</span>
            </a>
        `;
        marqueeTrack1.appendChild(item);
    });

    marqueeRow1.appendChild(marqueeTrack1);
    marqueeSection.appendChild(marqueeRow1);
    showcaseWrapper.appendChild(marqueeSection);

    // ── 2. INTERACTIVE CONTROLS BAR (FILTERS & VIEW SWITCHER) ──
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

    // ── 3. MULTI-BRAND SHOWCASE CARDS CONTAINER ──
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
                    <img src="${resolveAsset(brand.logo)}" alt="${brand.name} Logo" class="fx-brand-stage-logo" loading="lazy">
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

                    <a href="${resolveLink(brand.link)}" class="fx-case-study-btn">
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

})();
