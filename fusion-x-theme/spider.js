// ============================================================================
// FUSION X - GOOGLE CRAWLERS & DIGITAL ROBOT NETWORK
// Interactive Digital Ecosystem: High-Tech Googlebot Crawlers & Search Index Matrix
// Mobile Responsive: Adaptive Layout, Touch Interactions, Optimized Scaling
// ============================================================================

const spiderContainer = document.getElementById('spider-container');

if (spiderContainer) {
    // 1. Digital Marketing Service Nodes Data (with Desktop & Mobile coordinates)
    const iconData = [
        { 
            emoji: '🔍', 
            title: 'SEO Indexing', 
            mobileTitle: 'SEO',
            desktopX: 25, desktopY: 20, 
            mobileX: 20, mobileY: 18 
        },
        { 
            emoji: '💻', 
            title: 'Web Sites', 
            mobileTitle: 'Websites',
            desktopX: 75, desktopY: 25, 
            mobileX: 80, mobileY: 20 
        },
        { 
            emoji: '🤖', 
            title: 'AI Automation', 
            mobileTitle: 'AI Tech',
            desktopX: 20, desktopY: 70, 
            mobileX: 18, mobileY: 78 
        },
        { 
            emoji: '📱', 
            title: 'Social Media', 
            mobileTitle: 'Social',
            desktopX: 80, desktopY: 75, 
            mobileX: 82, mobileY: 76 
        },
        { 
            emoji: '📈', 
            title: 'Data Analytics', 
            mobileTitle: 'Analytics',
            desktopX: 50, desktopY: 90, 
            mobileX: 50, mobileY: 92 
        },
        { 
            emoji: '🎯', 
            title: 'Google Ads', 
            mobileTitle: 'Google Ads',
            desktopX: 50, desktopY: 10, 
            mobileX: 50, mobileY: 8 
        },
        { 
            emoji: '✍️', 
            title: 'Content Engine', 
            mobileTitle: 'Content',
            desktopX: 10, desktopY: 45, 
            mobileX: 19, mobileY: 40 
        },
        { 
            emoji: '📧', 
            title: 'Email Flows', 
            mobileTitle: 'Email',
            desktopX: 90, desktopY: 50, 
            mobileX: 81, mobileY: 40 
        },
        { 
            emoji: '✨', 
            title: 'Brand Identity', 
            mobileTitle: 'Branding',
            desktopX: 35, desktopY: 25, 
            mobileX: 23, mobileY: 59 
        },
        { 
            emoji: '🛒', 
            title: 'E-commerce', 
            mobileTitle: 'E-com',
            desktopX: 65, desktopY: 85, 
            mobileX: 77, mobileY: 59 
        },
        { 
            emoji: '🎥', 
            title: 'Video Production', 
            mobileTitle: 'Video',
            desktopX: 70, desktopY: 15, 
            mobileX: 78, mobileY: 7 
        },
        { 
            emoji: '📢', 
            title: 'Digital PR', 
            mobileTitle: 'PR',
            desktopX: 30, desktopY: 80, 
            mobileX: 22, mobileY: 7 
        }
    ];

    const iconElements = [];
    let currentTarget = null;
    let hoveredTarget = null;

    // Responsive helper to detect mobile viewport
    function isMobileView() {
        return (spiderContainer ? spiderContainer.clientWidth : window.innerWidth) < 650;
    }

    // Function to command crawlers to a target badge
    function triggerBadgeIndex(wrapper) {
        const rect = wrapper.getBoundingClientRect();
        const containerRect = spiderContainer.getBoundingClientRect();
        currentTarget = {
            x: rect.left - containerRect.left + rect.width / 2,
            y: rect.top - containerRect.top + rect.height / 2
        };

        const isMobile = isMobileView();

        // Command crawlers: Sprint & Indexing mode
        crawlers2D.forEach(bot => {
            bot.speed = (isMobile ? 2.8 : 3.6) + Math.random() * (isMobile ? 1.5 : 2.2);
            bot.isIndexing = true;
            // Scatter around target
            const scatterAngle = Math.random() * Math.PI * 2;
            const scatterDist = (isMobile ? 18 : 30) + Math.random() * (isMobile ? 25 : 45);
            bot.scatterOffsetX = Math.cos(scatterAngle) * scatterDist;
            bot.scatterOffsetY = Math.sin(scatterAngle) * scatterDist;
        });

        // Pulse visual feedback on badge
        wrapper.style.transform = 'translate(-50%, -50%) scale(1.16)';
        wrapper.style.boxShadow = '0 0 25px rgba(66, 133, 244, 0.7), 0 5px 15px rgba(255, 87, 34, 0.4)';
        wrapper.style.borderColor = '#4285F4';

        setTimeout(() => {
            wrapper.style.transform = 'translate(-50%, -50%) scale(1)';
            wrapper.style.boxShadow = '';
            wrapper.style.borderColor = '';
        }, 300);
    }

    // Render interactive HTML badges
    iconData.forEach(data => {
        const wrapper = document.createElement('div');
        wrapper.className = 'web-icon';
        wrapper.dataset.index = iconElements.length;
        wrapper.style.position = 'absolute';
        wrapper.style.transform = 'translate(-50%, -50%)';
        wrapper.style.zIndex = '10';
        wrapper.style.cursor = 'pointer';
        wrapper.style.transition = 'transform 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.25s, border-color 0.25s';

        // Hover effect to attract nearby crawler scanners (desktop only)
        wrapper.addEventListener('mouseenter', () => {
            if (isMobileView()) return;
            const rect = wrapper.getBoundingClientRect();
            const containerRect = spiderContainer.getBoundingClientRect();
            hoveredTarget = {
                x: rect.left - containerRect.left + rect.width / 2,
                y: rect.top - containerRect.top + rect.height / 2
            };
        });

        wrapper.addEventListener('mouseleave', () => {
            hoveredTarget = null;
        });

        // Click listener: Command Google crawlers to index this service
        wrapper.addEventListener('click', (e) => {
            triggerBadgeIndex(wrapper);
        });

        // Touch listener for mobile phones (instant responsive tap)
        wrapper.addEventListener('touchstart', (e) => {
            e.stopPropagation();
            triggerBadgeIndex(wrapper);
        }, { passive: true });

        spiderContainer.appendChild(wrapper);
        iconElements.push({ el: wrapper, data: data });
    });

    // Update layout positions & text labels based on screen width
    function applyResponsiveLayout() {
        const isMobile = isMobileView();

        iconElements.forEach(item => {
            const x = isMobile ? item.data.mobileX : item.data.desktopX;
            const y = isMobile ? item.data.mobileY : item.data.desktopY;
            const label = isMobile ? item.data.mobileTitle : item.data.title;

            item.el.style.left = `${x}%`;
            item.el.style.top = `${y}%`;
            item.el.innerHTML = `<span>${item.data.emoji}</span> <strong>${label}</strong>`;
        });
    }

    applyResponsiveLayout();

    // Release function for center logo
    function releaseCrawlers() {
        currentTarget = null;
        const isMobile = isMobileView();

        crawlers2D.forEach(bot => {
            bot.speed = (isMobile ? 0.35 : 0.45) + Math.random() * (isMobile ? 0.45 : 0.55);
            bot.isIndexing = false;
            bot.targetX = Math.random() * spiderContainer.clientWidth;
            bot.targetY = Math.random() * spiderContainer.clientHeight;
            bot.scatterOffsetX = 0;
            bot.scatterOffsetY = 0;
        });

        radarRipples.push({
            x: spiderContainer.clientWidth / 2,
            y: spiderContainer.clientHeight / 2,
            radius: 8,
            maxRadius: Math.max(spiderContainer.clientWidth, spiderContainer.clientHeight) * 0.75,
            opacity: 0.9
        });

        const centerLogoImg = document.getElementById('center-logo-html');
        if (centerLogoImg) {
            centerLogoImg.style.transform = 'translate(-50%, -50%) scale(1.12)';
            setTimeout(() => {
                centerLogoImg.style.transform = 'translate(-50%, -50%) scale(1)';
            }, 250);
        }
    }

    // Make Center Hub Logo Clickable to Release Google Crawlers
    const centerLogoImg = document.getElementById('center-logo-html');
    if (centerLogoImg) {
        centerLogoImg.style.pointerEvents = 'auto';
        centerLogoImg.style.cursor = 'pointer';
        centerLogoImg.style.transition = 'transform 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        centerLogoImg.title = 'Click to release Google crawlers to explore the digital index';

        centerLogoImg.addEventListener('click', releaseCrawlers);
        centerLogoImg.addEventListener('touchstart', (e) => {
            e.stopPropagation();
            releaseCrawlers();
        }, { passive: true });
    }

    // 2. 2D HTML Canvas Setup
    const bgCanvas = document.getElementById('web-bg-canvas');
    const ctx = bgCanvas.getContext('2d');

    // Radar ripples triggered by center clicks
    const radarRipples = [];

    // Data packets streaming through the digital crawl network
    const networkPackets = [];
    for (let p = 0; p < 16; p++) {
        networkPackets.push({
            trackAngleIdx: Math.floor(Math.random() * 12),
            distFactor: Math.random(),
            speed: 0.002 + Math.random() * 0.003,
            color: ['#4285F4', '#34A853', '#FBBC05', '#ff5722'][p % 4],
            size: 1.8 + Math.random() * 1.4
        });
    }

    // 3. Initialize Digital Google Crawler Robots
    const crawlers2D = [];
    const TOTAL_CRAWLERS = 18;

    for (let i = 0; i < TOTAL_CRAWLERS; i++) {
        const isMobile = isMobileView();
        const baseScale = isMobile ? (0.65 + Math.random() * 0.18) : (0.88 + Math.random() * 0.22);

        crawlers2D.push({
            x: Math.random() * spiderContainer.clientWidth,
            y: Math.random() * spiderContainer.clientHeight,
            vx: 0,
            vy: 0,
            angle: Math.random() * Math.PI * 2,
            targetX: Math.random() * spiderContainer.clientWidth,
            targetY: Math.random() * spiderContainer.clientHeight,
            scatterOffsetX: 0,
            scatterOffsetY: 0,
            legTime: Math.random() * 20,
            scanAngle: Math.random() * Math.PI * 2,
            speed: 0.45 + Math.random() * 0.55,
            scale: baseScale,
            colorIdx: i % 4, // 0: Blue, 1: Red, 2: Yellow, 3: Green
            isIndexing: false
        });
    }

    // Helper: Rounded Rectangle for Canvas
    function drawRoundRect(c, x, y, w, h, r) {
        c.beginPath();
        c.moveTo(x + r, y);
        c.lineTo(x + w - r, y);
        c.quadraticCurveTo(x + w, y, x + w, y + r);
        c.lineTo(x + w, y + h - r);
        c.quadraticCurveTo(x + w, y + h, x + w - r, y + h);
        c.lineTo(x + r, y + h);
        c.quadraticCurveTo(x, y + h, x, y + h - r);
        c.lineTo(x, y + r);
        c.quadraticCurveTo(x, y, x + r, y);
        c.closePath();
    }

    // Draw the High-Tech Google Crawl Matrix / Search Index Web
    function drawCrawlMatrix() {
        bgCanvas.width = spiderContainer.clientWidth;
        bgCanvas.height = spiderContainer.clientHeight;

        ctx.clearRect(0, 0, bgCanvas.width, bgCanvas.height);

        const cx = bgCanvas.width / 2;
        const cy = bgCanvas.height / 2;
        const radials = 12; // 12 sectors aligned to digital ecosystem
        const maxRadius = Math.max(bgCanvas.width, bgCanvas.height) * 0.85;
        const rings = isMobileView() ? 12 : 16;
        const timeNow = Date.now() * 0.002;

        // A. Draw Concentric Digital Crawl Tracks (Search Index Rings)
        for (let r = 1; r <= rings; r++) {
            const radius = (r / rings) * maxRadius;
            const isMajor = (r % 4 === 0);

            ctx.beginPath();
            for (let i = 0; i < radials; i++) {
                const angle = (i / radials) * Math.PI * 2 + (Math.PI / 12);
                const px = cx + Math.cos(angle) * radius;
                const py = cy + Math.sin(angle) * radius;
                if (i === 0) ctx.moveTo(px, py);
                else ctx.lineTo(px, py);
            }
            ctx.closePath();

            if (isMajor) {
                // Major Google Index Tier
                ctx.strokeStyle = 'rgba(66, 133, 244, 0.32)';
                ctx.lineWidth = 1.3;
                ctx.stroke();
            } else {
                // Secondary crawl connection line
                ctx.strokeStyle = (r % 2 === 0 ? 'rgba(255, 87, 34, 0.16)' : 'rgba(255, 255, 255, 0.07)');
                ctx.lineWidth = 0.8;
                ctx.stroke();
            }
        }

        // B. Draw Radial Data Transit Vectors
        for (let i = 0; i < radials; i++) {
            const angle = (i / radials) * Math.PI * 2 + (Math.PI / 12);
            const ex = cx + Math.cos(angle) * maxRadius;
            const ey = cy + Math.sin(angle) * maxRadius;

            ctx.beginPath();
            ctx.moveTo(cx, cy);
            ctx.lineTo(ex, ey);

            ctx.strokeStyle = (i % 2 === 0 ? 'rgba(66, 133, 244, 0.26)' : 'rgba(255, 87, 34, 0.20)');
            ctx.lineWidth = 1.0;
            ctx.stroke();
        }

        // C. Glowing Intersectional Data Nodes
        const stepR = isMobileView() ? 4 : 3;
        for (let r = 2; r <= rings; r += stepR) {
            const radius = (r / rings) * maxRadius;
            for (let i = 0; i < radials; i += 2) {
                const angle = (i / radials) * Math.PI * 2 + (Math.PI / 12);
                const nx = cx + Math.cos(angle) * radius;
                const ny = cy + Math.sin(angle) * radius;

                const pulse = Math.sin(timeNow + i * 0.7 + r * 0.5);
                const nodeR = 1.4 + pulse * 0.6;

                ctx.fillStyle = (i % 4 === 0 ? '#4285F4' : '#ff5722');
                ctx.beginPath();
                ctx.arc(nx, ny, Math.max(0.8, nodeR), 0, Math.PI * 2);
                ctx.fill();
            }
        }

        // D. Animate Streaming Data Packets
        networkPackets.forEach(pkt => {
            pkt.distFactor += pkt.speed;
            if (pkt.distFactor > 1.0) pkt.distFactor = 0.05;

            const angle = (pkt.trackAngleIdx / radials) * Math.PI * 2 + (Math.PI / 12);
            const curR = pkt.distFactor * maxRadius;
            const px = cx + Math.cos(angle) * curR;
            const py = cy + Math.sin(angle) * curR;

            ctx.fillStyle = pkt.color;
            ctx.beginPath();
            ctx.arc(px, py, pkt.size, 0, Math.PI * 2);
            ctx.fill();
        });

        // E. Animate Expanding Radar Ripples
        for (let ri = radarRipples.length - 1; ri >= 0; ri--) {
            const rip = radarRipples[ri];
            rip.radius += 4.5;
            rip.opacity = (1 - rip.radius / rip.maxRadius) * 0.85;

            if (rip.opacity <= 0 || rip.radius >= rip.maxRadius) {
                radarRipples.splice(ri, 1);
                continue;
            }

            ctx.strokeStyle = `rgba(66, 133, 244, ${rip.opacity})`;
            ctx.lineWidth = 1.8;
            ctx.beginPath();
            ctx.arc(rip.x, rip.y, rip.radius, 0, Math.PI * 2);
            ctx.stroke();

            if (rip.radius > 35) {
                ctx.strokeStyle = `rgba(255, 87, 34, ${rip.opacity * 0.55})`;
                ctx.lineWidth = 1.1;
                ctx.beginPath();
                ctx.arc(rip.x, rip.y, rip.radius * 0.65, 0, Math.PI * 2);
                ctx.stroke();
            }
        }
    }

    // 4. Draw Single High-Tech Digital Robot / Google Crawler (Procedural 2D)
    function drawCrawlerBot(bot) {
        ctx.save();
        ctx.translate(bot.x, bot.y);
        ctx.rotate(bot.angle + Math.PI / 2); // Rotate so front faces travel direction

        const s = bot.scale;
        ctx.scale(s, s);

        // ----------------------------------------------------
        // A. Forward Web Indexing Scanner Beam (Google Laser)
        // ----------------------------------------------------
        const beamLen = bot.isIndexing ? 48 : 34;
        const beamSpread = bot.isIndexing ? 24 : 18;
        const sweepWiggle = Math.sin(bot.scanAngle) * 4;

        const beamGrad = ctx.createRadialGradient(0, -10, 2, 0, -10 - beamLen * 0.7, beamLen);
        if (bot.isIndexing) {
            beamGrad.addColorStop(0, 'rgba(66, 133, 244, 0.48)');
            beamGrad.addColorStop(0.5, 'rgba(66, 133, 244, 0.22)');
            beamGrad.addColorStop(1, 'rgba(66, 133, 244, 0)');
        } else {
            beamGrad.addColorStop(0, 'rgba(0, 229, 255, 0.32)');
            beamGrad.addColorStop(0.6, 'rgba(66, 133, 244, 0.12)');
            beamGrad.addColorStop(1, 'rgba(66, 133, 244, 0)');
        }

        ctx.fillStyle = beamGrad;
        ctx.beginPath();
        ctx.moveTo(0, -10);
        ctx.lineTo(-beamSpread + sweepWiggle, -10 - beamLen);
        ctx.lineTo(beamSpread + sweepWiggle, -10 - beamLen);
        ctx.closePath();
        ctx.fill();

        // Sweeping laser scanner line
        const scanSweepY = -10 - (beamLen * 0.3) - Math.sin(bot.scanAngle * 2.2) * (beamLen * 0.32);
        const sweepLineW = beamSpread * Math.abs(scanSweepY + 10) / beamLen;
        ctx.strokeStyle = bot.isIndexing ? '#ea4335' : '#00e5ff';
        ctx.lineWidth = 1.2;
        ctx.beginPath();
        ctx.moveTo(-sweepLineW * 0.7, scanSweepY);
        ctx.lineTo(sweepLineW * 0.7, scanSweepY);
        ctx.stroke();

        // ----------------------------------------------------
        // B. Soft Ground Shadow
        // ----------------------------------------------------
        ctx.fillStyle = 'rgba(0, 0, 0, 0.45)';
        ctx.beginPath();
        ctx.ellipse(0, 2, 10, 13, 0, 0, Math.PI * 2);
        ctx.fill();

        // ----------------------------------------------------
        // C. 6 Articulated Mechanical Robotic Legs (Hexapod)
        // ----------------------------------------------------
        const legDefs = [
            [-6, -6, -14, -11, -21, -14, 0],       // 0: Front-Left
            [-7,  0, -16,   0, -24,   1, Math.PI], // 1: Mid-Left
            [-6,  6, -14,  11, -21,  15, 0],       // 2: Rear-Left
            [ 6, -6,  14, -11,  21, -14, Math.PI], // 3: Front-Right
            [ 7,  0,  16,   0,  24,   1, 0],       // 4: Mid-Right
            [ 6,  7,  14,  11,  21,  15, Math.PI]  // 5: Rear-Right
        ];

        legDefs.forEach((def, idx) => {
            const [bx, by, kx, ky, fx, fy, phase] = def;
            const gaitPhase = bot.legTime + phase;
            const stepDist = (bot.speed > 1.5 ? 5.5 : 2.8);
            const stepCycle = Math.sin(gaitPhase);
            const isLifted = Math.cos(gaitPhase) > 0;

            const footX = fx + (idx < 3 ? -1 : 1) * (isLifted ? 1.5 : 0);
            const footY = fy + stepCycle * stepDist;

            const kneeX = kx + (idx < 3 ? -1 : 1) * (isLifted ? 1 : 0);
            const kneeY = ky + stepCycle * (stepDist * 0.5);

            // Upper mechanical segment (Dark carbon)
            ctx.strokeStyle = '#334155';
            ctx.lineWidth = 2.2;
            ctx.lineCap = 'round';
            ctx.beginPath();
            ctx.moveTo(bx, by);
            ctx.lineTo(kneeX, kneeY);
            ctx.stroke();

            // Knee Servo Joint (Glowing Cyber Node)
            ctx.fillStyle = '#1e293b';
            ctx.beginPath();
            ctx.arc(kneeX, kneeY, 2.0, 0, Math.PI * 2);
            ctx.fill();

            // Servo LED core
            ctx.fillStyle = (idx % 2 === 0 ? '#4285F4' : '#00e5ff');
            ctx.beginPath();
            ctx.arc(kneeX, kneeY, 1.1, 0, Math.PI * 2);
            ctx.fill();

            // Lower mechanical segment (Articulated shin)
            ctx.strokeStyle = '#475569';
            ctx.lineWidth = 1.6;
            ctx.beginPath();
            ctx.moveTo(kneeX, kneeY);
            ctx.lineTo(footX, footY);
            ctx.stroke();

            // Precision foot pad
            ctx.fillStyle = '#64748b';
            ctx.beginPath();
            ctx.arc(footX, footY, 1.4, 0, Math.PI * 2);
            ctx.fill();
        });

        // ----------------------------------------------------
        // D. Dual Data Transmission Antennae (Transmits to Index)
        // ----------------------------------------------------
        ctx.strokeStyle = '#64748b';
        ctx.lineWidth = 1.3;
        ctx.beginPath();
        ctx.moveTo(-4, -10);
        ctx.lineTo(-7, -18);
        ctx.moveTo(4, -10);
        ctx.lineTo(7, -18);
        ctx.stroke();

        // Antenna LED Tips (Google Color Beacons)
        const googleColors = ['#4285F4', '#EA4335', '#FBBC05', '#34A853'];
        const tipColor1 = googleColors[bot.colorIdx % 4];
        const tipColor2 = googleColors[(bot.colorIdx + 2) % 4];

        ctx.fillStyle = tipColor1;
        ctx.beginPath();
        ctx.arc(-7, -18, 1.8, 0, Math.PI * 2);
        ctx.fill();

        ctx.fillStyle = tipColor2;
        ctx.beginPath();
        ctx.arc(7, -18, 1.8, 0, Math.PI * 2);
        ctx.fill();

        // ----------------------------------------------------
        // E. Rear Thrusters / Energy Ports
        // ----------------------------------------------------
        ctx.fillStyle = '#1e293b';
        ctx.fillRect(-5.5, 11, 3, 3);
        ctx.fillRect(2.5, 11, 3, 3);

        ctx.fillStyle = bot.isIndexing ? '#ff5722' : '#4285F4';
        ctx.fillRect(-5, 12.5, 2, 2);
        ctx.fillRect(3, 12.5, 2, 2);

        // ----------------------------------------------------
        // F. Robot Main Chassis (Sleek High-Tech Cyber Armor)
        // ----------------------------------------------------
        const bodyW = 15;
        const bodyH = 23;
        const bodyR = 5.5;

        // Dark chassis rim
        ctx.fillStyle = '#0f172a';
        drawRoundRect(ctx, -bodyW / 2 - 1, -bodyH / 2 - 1, bodyW + 2, bodyH + 2, bodyR + 1);
        ctx.fill();

        // Casing gradient: Cyber-alloy white / silver metallic
        const bodyGrad = ctx.createLinearGradient(-bodyW / 2, -bodyH / 2, bodyW / 2, bodyH / 2);
        bodyGrad.addColorStop(0, '#ffffff');
        bodyGrad.addColorStop(0.5, '#e2e8f0');
        bodyGrad.addColorStop(1, '#cbd5e1');
        ctx.fillStyle = bodyGrad;
        drawRoundRect(ctx, -bodyW / 2, -bodyH / 2, bodyW, bodyH, bodyR);
        ctx.fill();

        // Panel lines
        ctx.strokeStyle = 'rgba(100, 116, 139, 0.45)';
        ctx.lineWidth = 0.9;
        drawRoundRect(ctx, -bodyW / 2, -bodyH / 2, bodyW, bodyH, bodyR);
        ctx.stroke();

        // ----------------------------------------------------
        // G. Google Quad-Core Module (4 Google Signature Colors)
        // ----------------------------------------------------
        ctx.fillStyle = '#0f172a';
        drawRoundRect(ctx, -5, -2, 10, 8.5, 2.5);
        ctx.fill();

        const dotR = 1.3;
        ctx.fillStyle = '#4285F4';
        ctx.beginPath();
        ctx.arc(-2.3, 0.2, dotR, 0, Math.PI * 2);
        ctx.fill();

        ctx.fillStyle = '#EA4335';
        ctx.beginPath();
        ctx.arc(2.3, 0.2, dotR, 0, Math.PI * 2);
        ctx.fill();

        ctx.fillStyle = '#FBBC05';
        ctx.beginPath();
        ctx.arc(-2.3, 4.2, dotR, 0, Math.PI * 2);
        ctx.fill();

        ctx.fillStyle = '#34A853';
        ctx.beginPath();
        ctx.arc(2.3, 4.2, dotR, 0, Math.PI * 2);
        ctx.fill();

        // ----------------------------------------------------
        // H. Googlebot Sensor Visor / Panoramic Camera Head
        // ----------------------------------------------------
        ctx.fillStyle = '#0f172a';
        ctx.beginPath();
        ctx.ellipse(0, -8.5, 6, 4, 0, 0, Math.PI * 2);
        ctx.fill();

        const visorGrad = ctx.createLinearGradient(-4.5, -8.5, 4.5, -8.5);
        visorGrad.addColorStop(0, '#00e5ff');
        visorGrad.addColorStop(0.5, '#4285F4');
        visorGrad.addColorStop(1, '#00e5ff');
        ctx.fillStyle = visorGrad;
        ctx.beginPath();
        ctx.ellipse(0, -9, 4.6, 2.4, 0, 0, Math.PI * 2);
        ctx.fill();

        const eyePupilX = Math.sin(bot.scanAngle * 2.2) * 2.5;
        ctx.fillStyle = '#ffffff';
        ctx.beginPath();
        ctx.arc(eyePupilX, -9, 1.1, 0, Math.PI * 2);
        ctx.fill();

        ctx.restore();
    }

    // 5. Main Animation Loop: Update & Render Digital Crawlers
    function animateCrawlerEcosystem() {
        requestAnimationFrame(animateCrawlerEcosystem);

        // 1. Redraw high-tech crawl matrix background
        drawCrawlMatrix();

        const isMobile = isMobileView();
        const activeBots = isMobile ? crawlers2D.slice(0, 15) : crawlers2D;

        // 2. Update and draw each Google crawler robot
        activeBots.forEach(bot => {
            // Adaptive scale adjustments
            const targetScale = isMobile ? 0.72 : 1.0;
            bot.scale += (targetScale - bot.scale) * 0.05;

            let tx = bot.targetX;
            let ty = bot.targetY;

            if (currentTarget) {
                tx = currentTarget.x + bot.scatterOffsetX;
                ty = currentTarget.y + bot.scatterOffsetY;
            } else if (hoveredTarget && Math.random() < 0.25) {
                tx = hoveredTarget.x;
                ty = hoveredTarget.y;
            }

            const dx = tx - bot.x;
            const dy = ty - bot.y;
            const dist = Math.sqrt(dx * dx + dy * dy);

            if (dist < 12 && !currentTarget) {
                bot.targetX = Math.random() * bgCanvas.width;
                bot.targetY = Math.random() * bgCanvas.height;
            } else if (dist > 8) {
                bot.vx = (dx / dist) * bot.speed;
                bot.vy = (dy / dist) * bot.speed;
                bot.x += bot.vx;
                bot.y += bot.vy;
                bot.legTime += 0.16 + (bot.speed * 0.04);
            }

            bot.scanAngle += 0.06;

            const targetAngle = Math.atan2(dy, dx);
            let diff = targetAngle - bot.angle;
            while (diff < -Math.PI) diff += Math.PI * 2;
            while (diff > Math.PI) diff -= Math.PI * 2;
            bot.angle += diff * 0.12;

            drawCrawlerBot(bot);
        });
    }

    // Start Ecosystem Animation
    animateCrawlerEcosystem();

    // Responsive Window Resize Listener
    window.addEventListener('resize', () => {
        bgCanvas.width = spiderContainer.clientWidth;
        bgCanvas.height = spiderContainer.clientHeight;
        applyResponsiveLayout();
    });
}
