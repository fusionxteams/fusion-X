<?php
/**
 * Template Name: Marketing Consultation
 *
 * @package Fusion_X
 */

get_header();
?>

<style>
        :root {
            --dev-orange: #ff5722;
            --dev-orange-dark: #e64a19;
            --dev-dark: #080808;
            --dev-slate: #141414;
            --dev-muted: #64748b;
            --dev-bg-light: #f8fafc;
            --dev-border: rgba(226, 232, 240, 0.9);
        }

        body {
            font-family: 'Space Grotesk', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #ffffff;
            color: #1e293b;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* ── HERO ── */
        .page-hero {
            padding: 150px 24px 80px;
            background: radial-gradient(circle at 50% 20%, rgba(255, 87, 34, 0.08) 0%, transparent 60%), #ffffff;
            text-align: center;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 24px;
            background: rgba(255, 87, 34, 0.08);
            border: 1px solid rgba(255, 87, 34, 0.25);
            border-radius: 50px;
            font-size: 0.82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--dev-orange);
            margin-bottom: 24px;
        }

        .hero-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.5rem, 5.5vw, 4.5rem);
            font-weight: 900;
            line-height: 1.08;
            letter-spacing: -1.5px;
            color: #0f172a;
            max-width: 980px;
            margin: 0 auto 24px;
        }

        .hero-title span {
            background: linear-gradient(135deg, #ff5722 20%, #ff8a50 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-desc {
            font-size: clamp(1.05rem, 2vw, 1.25rem);
            line-height: 1.7;
            color: var(--dev-muted);
            max-width: 820px;
            margin: 0 auto 40px;
        }

        .tech-chips {
            display: flex;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 45px;
        }

        .tech-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 18px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 50px;
            font-size: 0.88rem;
            font-weight: 700;
            color: #334155;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        .tech-chip i {
            color: var(--dev-orange);
        }

        .hero-ctas {
            display: flex;
            justify-content: center;
            gap: 18px;
            flex-wrap: wrap;
            margin-bottom: 50px;
        }

        .btn-primary-hero {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 36px;
            background: var(--dev-orange);
            color: #ffffff;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 8px 25px rgba(255, 87, 34, 0.35);
            transition: all 0.3s ease;
        }

        .btn-primary-hero:hover {
            background: var(--dev-orange-dark);
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(255, 87, 34, 0.45);
        }

        .btn-secondary-hero {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 36px;
            background: #ffffff;
            color: #0f172a;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            border-radius: 50px;
            text-decoration: none;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }

        .btn-secondary-hero:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            transform: translateY(-2px);
        }

        /* ── HERO KPI GRID ── */
        .hero-kpi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
            max-width: 1100px;
            margin: 0 auto;
            text-align: left;
        }

        .hero-kpi-box {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px 20px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
        }

        .hero-kpi-box:hover {
            transform: translateY(-3px);
            border-color: rgba(255, 87, 34, 0.4);
            box-shadow: 0 10px 25px rgba(255, 87, 34, 0.08);
        }

        .kpi-top-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .kpi-num {
            font-family: 'Outfit', sans-serif;
            font-size: 2.2rem;
            font-weight: 900;
            color: #0f172a;
            line-height: 1;
        }

        .kpi-pill {
            font-size: 0.72rem;
            font-weight: 800;
            padding: 4px 8px;
            border-radius: 6px;
            text-transform: uppercase;
        }

        .kpi-pill.green {
            background: rgba(16, 185, 129, 0.12);
            color: #059669;
            border: 1px solid rgba(16, 185, 129, 0.25);
        }

        .kpi-pill.orange {
            background: rgba(255, 87, 34, 0.12);
            color: #ea580c;
            border: 1px solid rgba(255, 87, 34, 0.25);
        }

        .kpi-desc {
            font-size: 0.88rem;
            color: var(--dev-muted);
            line-height: 1.45;
            margin: 0;
            font-weight: 500;
        }

        /* ── ARCHITECTURAL SERVICE CARDS ── */
        .content-section {
            padding: 90px 24px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            max-width: 780px;
            margin: 0 auto 70px;
        }

        .section-header h2 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -1px;
            margin-bottom: 16px;
        }

        .section-header p {
            font-size: 1.1rem;
            color: var(--dev-muted);
            line-height: 1.7;
        }

        .service-card-block {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 60px;
            align-items: center;
            margin-bottom: 90px;
            padding: 50px;
            background: #ffffff;
            border: 1px solid var(--dev-border);
            border-radius: 28px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.03);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card-block:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 50px rgba(0, 0, 0, 0.06);
        }

        .service-card-block:nth-child(even) {
            grid-template-columns: 0.85fr 1.15fr;
        }

        .service-card-block:nth-child(even) .card-content-box {
            order: 2;
        }

        .service-card-block:nth-child(even) .card-visual-box {
            order: 1;
        }

        .card-tag {
            display: inline-block;
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--dev-orange);
            margin-bottom: 12px;
        }

        .card-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(1.8rem, 3.2vw, 2.4rem);
            font-weight: 800;
            line-height: 1.15;
            color: #0f172a;
            margin-bottom: 16px;
        }

        .card-desc {
            font-size: 1.05rem;
            line-height: 1.7;
            color: var(--dev-muted);
            margin-bottom: 24px;
        }

        .card-feature-list {
            list-style: none;
            padding: 0;
            margin: 0 0 24px 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .card-feature-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.95rem;
            color: #334155;
            line-height: 1.5;
        }

        .card-feature-list li i {
            color: var(--dev-orange);
            margin-top: 3px;
        }

        .card-tech-tag {
            display: inline-block;
            background: #f1f5f9;
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 700;
            color: #475569;
            margin-right: 8px;
            margin-bottom: 8px;
        }

        .card-visual-box {
            background: radial-gradient(circle at center, rgba(255, 87, 34, 0.08) 0%, rgba(248, 250, 252, 0.8) 100%);
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 320px;
        }

        .card-visual-icon {
            font-size: 3.5rem;
            color: var(--dev-orange);
            margin-bottom: 18px;
            filter: drop-shadow(0 4px 12px rgba(255,87,34,0.3));
        }

        .card-visual-stat {
            font-family: 'Outfit', sans-serif;
            font-size: 3rem;
            font-weight: 900;
            color: #0f172a;
            line-height: 1;
            margin-bottom: 8px;
        }

        .card-visual-sub {
            font-size: 0.92rem;
            font-weight: 600;
            color: var(--dev-muted);
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        /* ── BLACK BACKGROUND WITH INTERACTIVE ORANGE DOTS: PROTOCOL ── */
        .process-section {
            background: #080808;
            color: #ffffff;
            padding: 100px 24px;
            border-radius: 36px;
            margin: 60px 24px;
            position: relative;
            overflow: hidden;
        }

        .process-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 60px;
            position: relative;
            z-index: 2;
        }

        .process-header h2 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 16px;
        }

        .process-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .process-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 36px 28px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .process-card:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 87, 34, 0.5);
            transform: translateY(-5px);
        }

        .step-num {
            font-family: 'Outfit', sans-serif;
            font-size: 2.2rem;
            font-weight: 900;
            color: var(--dev-orange);
            margin-bottom: 14px;
            line-height: 1;
        }

        .step-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .step-desc {
            color: #94a3b8;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* ── BLACK BACKGROUND WITH INTERACTIVE ORANGE DOTS: SPECIALIST SPOTLIGHT ── */
        .expert-spotlight-section {
            max-width: 1200px;
            margin: 0 auto 80px;
            padding: 0 24px;
        }

        .expert-spotlight-card {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 50px;
            align-items: center;
            background: linear-gradient(135deg, #080808 0%, #141414 100%);
            border: 1px solid rgba(255, 87, 34, 0.35);
            border-radius: 32px;
            padding: 50px;
            color: #ffffff;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.4);
            position: relative;
            overflow: hidden;
        }

        .expert-avatar-wrap {
            position: relative;
            width: 260px;
            height: 260px;
            margin: 0 auto;
            z-index: 2;
        }

        .expert-avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 24px;
            border: 3px solid rgba(255, 87, 34, 0.5);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
        }

        .expert-verified-badge {
            position: absolute;
            bottom: -8px;
            right: -8px;
            width: 42px;
            height: 42px;
            background: #ff5722;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            border: 3px solid #080808;
            box-shadow: 0 4px 15px rgba(255, 87, 34, 0.6);
        }

        .expert-content {
            position: relative;
            z-index: 2;
        }

        .expert-domain-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 87, 34, 0.15);
            border: 1px solid rgba(255, 87, 34, 0.4);
            color: #ff8a65;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 14px;
        }

        .expert-name {
            font-family: 'Outfit', sans-serif;
            font-size: 2.3rem;
            font-weight: 900;
            margin-bottom: 8px;
            color: #ffffff;
        }

        .expert-headline {
            font-size: 1.05rem;
            color: #cbd5e1;
            margin-bottom: 18px;
            line-height: 1.6;
        }

        .expert-headline strong {
            color: #ff8a65;
        }

        .expert-bio {
            font-size: 0.98rem;
            color: #94a3b8;
            line-height: 1.7;
            margin-bottom: 26px;
        }

        .expert-stats-row {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .expert-stat-item {
            display: flex;
            flex-direction: column;
        }

        .expert-stat-val {
            font-family: 'Outfit', sans-serif;
            font-size: 1.8rem;
            font-weight: 900;
            color: #ff5722;
            line-height: 1;
            margin-bottom: 4px;
        }

        .expert-stat-lbl {
            font-size: 0.78rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        /* ── FAQ ACCORDION ── */
        .faq-section {
            padding: 90px 24px;
            max-width: 880px;
            margin: 0 auto;
        }

        .faq-accordion {
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-top: 40px;
        }

        .faq-item {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
            transition: all 0.25s ease;
        }

        .faq-question-btn {
            width: 100%;
            padding: 22px 26px;
            background: transparent;
            border: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            text-align: left;
            font-size: 1.05rem;
            font-weight: 700;
            color: #0f172a;
            font-family: inherit;
        }

        .faq-question-btn i {
            color: var(--dev-orange);
            transition: transform 0.25s ease;
        }

        .faq-item.active .faq-question-btn i {
            transform: rotate(180deg);
        }

        .faq-answer-panel {
            padding: 0 26px 22px;
            font-size: 0.95rem;
            color: var(--dev-muted);
            line-height: 1.7;
            display: none;
        }

        .faq-item.active .faq-answer-panel {
            display: block;
        }

        /* ── BLACK BACKGROUND WITH INTERACTIVE ORANGE DOTS: CTA BANNER ── */
        .cta-banner {
            background: linear-gradient(135deg, #080808 0%, #161616 100%);
            border: 1px solid rgba(255, 87, 34, 0.35);
            border-radius: 32px;
            padding: 70px 40px;
            text-align: center;
            color: #ffffff;
            margin: 60px auto 40px;
            max-width: 1100px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
            position: relative;
            overflow: hidden;
        }

        .cta-banner > * {
            position: relative;
            z-index: 2;
        }

        .cta-banner h2 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2rem, 4vw, 3.2rem);
            font-weight: 900;
            margin-bottom: 16px;
        }

        .cta-banner p {
            font-size: 1.15rem;
            max-width: 680px;
            margin: 0 auto 36px;
            color: #cbd5e1;
            line-height: 1.6;
        }

        .cta-banner .btn-primary-hero {
            background: #ff5722;
            color: #ffffff;
            box-shadow: 0 8px 25px rgba(255, 87, 34, 0.4);
        }

        .cta-banner .btn-primary-hero:hover {
            background: #e64a19;
            transform: translateY(-2px);
        }

        @media (max-width: 900px) {
            .service-card-block {
                grid-template-columns: 1fr !important;
                padding: 30px 20px;
                gap: 30px;
            }
            .service-card-block:nth-child(even) .card-content-box { order: 1; }
            .service-card-block:nth-child(even) .card-visual-box { order: 2; }
            .expert-spotlight-card {
                grid-template-columns: 1fr;
                text-align: center;
                padding: 36px 24px;
            }
            .expert-stats-row { justify-content: center; }
            .process-section {
                padding: 60px 20px;
                margin: 40px 16px;
                border-radius: 24px;
            }
        }
    </style>

<!-- ═══════════════════════ HERO SECTION (WHITE LUXE) ═══════════════════════ -->
    <header class="page-hero">
        <div class="badge-pill">
            <i class="fa-solid fa-user-tie"></i> 1-on-1 Strategic Advisory · Exclusively by Mr. Kamalesh J
        </div>
        <h1 class="hero-title">High-Impact Marketing Consultation <span>That Unlocks Profitable Scale</span></h1>
        <p class="hero-desc">
            Stop burning media budget on blind trial and error. Book a private, high-stakes 1-on-1 strategic consultation with <strong>Mr. Kamalesh J</strong> — the premier digital marketing and performance ads expert in Chennai. Diagnose CAC leakages, optimize paid media architectures, and build an aggressive 90-day scaling blueprint.
        </p>

        <div class="tech-chips">
            <div class="tech-chip"><i class="fa-solid fa-user-shield"></i> 1-on-1 Direct Advisory with Kamalesh J</div>
            <div class="tech-chip"><i class="fa-solid fa-chart-pie"></i> Full-Funnel CAC & ROAS Audit</div>
            <div class="tech-chip"><i class="fa-solid fa-bullseye"></i> Google & Meta Ads Scale Architecture</div>
            <div class="tech-chip"><i class="fa-solid fa-filter-circle-dollar"></i> High-Intent Conversion Funnels</div>
            <div class="tech-chip"><i class="fa-solid fa-map-location-dot"></i> Actionable 90-Day Execution Roadmap</div>
        </div>

        <div class="hero-ctas">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero">Book Consultation with Kamalesh J <i class="fa-solid fa-arrow-right"></i></a>
            <a href="https://wa.me/919600096973?text=Hi%20Kamalesh,%20I%20would%20like%20to%20book%20a%20Strategic%20Marketing%20Consultation." target="_blank" rel="noopener" class="btn-secondary-hero"><i class="fa-brands fa-whatsapp" style="color: #25d366;"></i> WhatsApp Direct</a>
        </div>

        <!-- Live KPI Telemetry Grid -->
        <div class="hero-kpi-grid">
            <div class="hero-kpi-box">
                <div class="kpi-top-row">
                    <span class="kpi-num">₹5Cr+</span>
                    <span class="kpi-pill green">Verified</span>
                </div>
                <p class="kpi-desc">Paid Media Ad Spend Strategically Guided</p>
            </div>
            <div class="hero-kpi-box">
                <div class="kpi-top-row">
                    <span class="kpi-num">4.8x</span>
                    <span class="kpi-pill orange">Peak Scale</span>
                </div>
                <p class="kpi-desc">Top Recorded Return on Ad Spend (ROAS)</p>
            </div>
            <div class="hero-kpi-box">
                <div class="kpi-top-row">
                    <span class="kpi-num">-32%</span>
                    <span class="kpi-pill green">Efficiency</span>
                </div>
                <p class="kpi-desc">Average Blended CAC Reduction Post-Audit</p>
            </div>
            <div class="hero-kpi-box">
                <div class="kpi-top-row">
                    <span class="kpi-num">100%</span>
                    <span class="kpi-pill orange">Zero Interns</span>
                </div>
                <p class="kpi-desc">Direct 1-on-1 Screen-Share Access to Kamalesh</p>
            </div>
        </div>
    </header>

    <!-- ═══════════════════════ ARCHITECTURAL CARDS (CLEAN WHITE) ═══════════════════════ -->
    <main class="content-section">
        <div class="section-header">
            <span class="card-tag">WHAT KAMALESH J DELIVERS IN YOUR CONSULTATION</span>
            <h2>Actionable Strategic Deliverables</h2>
            <p>We do not deliver vague generic tips or high-level academic theory. You receive deep forensic audits of your marketing engine, actionable engineering fixes, and a definitive scaling roadmap.</p>
        </div>

        <!-- Deliverable 1 -->
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">FORENSIC DATA AUDIT</span>
                <h3 class="card-title">Full-Funnel CAC & Revenue Leakage Diagnostic</h3>
                <p class="card-desc">Kamalesh audits your historical advertising accounts, attribution models, and conversion tracking to identify where budget is bleeding and why your blended CAC is climbing.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Server-Side CAPI & GTM Event Deduplication Review</li>
                    <li><i class="fa-solid fa-circle-check"></i> Customer Acquisition Cost (CAC) & LTV Ratio Benchmarking</li>
                    <li><i class="fa-solid fa-circle-check"></i> Audience Overlap & Budget Cannibalization Analysis</li>
                    <li><i class="fa-solid fa-circle-check"></i> Attribution Window Modeling across First-Click & Data-Driven GA4</li>
                </ul>
                <div>
                    <span class="card-tech-tag">CAC Optimization</span><span class="card-tech-tag">CAPI Audit</span><span class="card-tech-tag">GA4 Tracking</span><span class="card-tech-tag">Funnel Leakage</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
                <div class="card-visual-stat">-32%</div>
                <div class="card-visual-sub">Average CAC Reduction After Audit</div>
            </div>
        </div>

        <!-- Deliverable 2 -->
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">PAID ADS ARCHITECTURE</span>
                <h3 class="card-title">Google & Meta Ads Scaling Architecture</h3>
                <p class="card-desc">Receive a battle-tested blueprint to scale your daily paid media budget vertically and horizontally without watching ROAS crash. Learn exact campaign structures that drive profitable volume.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Advantage+ Shopping (ASC) & Broad Targeting Scaling</li>
                    <li><i class="fa-solid fa-circle-check"></i> High-Intent Google Search & PMax Asset Group Segmentation</li>
                    <li><i class="fa-solid fa-circle-check"></i> Creative Testing Frameworks & 3-Second Hook Retention</li>
                    <li><i class="fa-solid fa-circle-check"></i> Automated Bid Strategy Tuning (Target CPA vs Target ROAS)</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Meta Ads Manager</span><span class="card-tech-tag">Google PMax</span><span class="card-tech-tag">Budget Scaling</span><span class="card-tech-tag">Target ROAS</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-bullseye"></i></div>
                <div class="card-visual-stat">4.8x</div>
                <div class="card-visual-sub">Peak Paid Campaign ROAS</div>
            </div>
        </div>

        <!-- Deliverable 3 -->
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">CRO ACCELERATION</span>
                <h3 class="card-title">Landing Page CRO & High-Intent Offer Teardown</h3>
                <p class="card-desc">Even 10x traffic fails if your landing page does not convert. Kamalesh reviews your value proposition, customer friction points, mobile UX, and social proof hierarchy to dramatically boost conversion rates.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Above-The-Fold Hook & Value Proposition Refinement</li>
                    <li><i class="fa-solid fa-circle-check"></i> Mobile Form Friction Audit & One-Click Lead Capture</li>
                    <li><i class="fa-solid fa-circle-check"></i> Social Proof, Risk-Reversal & Guarantee Architecture</li>
                    <li><i class="fa-solid fa-circle-check"></i> Sub-Second Core Web Vitals & Load Speed Benchmarks</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Landing Page CRO</span><span class="card-tech-tag">Offer Framing</span><span class="card-tech-tag">Heatmap Audit</span><span class="card-tech-tag">Lead Capture</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-chart-line"></i></div>
                <div class="card-visual-stat">+140%</div>
                <div class="card-visual-sub">Conversion Rate Uplift</div>
            </div>
        </div>

        <!-- Deliverable 4 -->
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">90-DAY STRATEGY PLAYBOOK</span>
                <h3 class="card-title">Custom 90-Day Market Domination Action Plan</h3>
                <p class="card-desc">You walk away with a crystal-clear, documented execution roadmap detailing exactly what changes to implement across weeks 1-4, weeks 5-8, and weeks 9-12 for sustainable, compounding growth.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Prioritized Sprint Backlog (High Impact vs Low Effort)</li>
                    <li><i class="fa-solid fa-circle-check"></i> Target KPI Forecast & Daily Ad Spend Allocation Matrix</li>
                    <li><i class="fa-solid fa-circle-check"></i> Omnichannel Touchpoint Integration (SEO, Paid & Email)</li>
                    <li><i class="fa-solid fa-circle-check"></i> 14 Days of Direct Post-Consultation WhatsApp Support</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Strategic Roadmap</span><span class="card-tech-tag">KPI Scorecard</span><span class="card-tech-tag">Direct Support</span><span class="card-tech-tag">Execution Plan</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-file-lines"></i></div>
                <div class="card-visual-stat">90 Days</div>
                <div class="card-visual-sub">Step-By-Step Scaling Roadmap</div>
            </div>
        </div>
    </main>

    <!-- ═══════════════════════ BLACK SECTION: PROTOCOL (INTERACTIVE ORANGE DOTS) ═══════════════════════ -->
    <section class="process-section fx-has-orange-dots">
        <div class="process-header">
            <span class="badge-pill" style="background: rgba(255,87,34,0.15); border-color: rgba(255,87,34,0.35); color: #ff8a65;">
                CONSULTATION PROTOCOL
            </span>
            <h2>How Your Strategic Consultation Unfolds</h2>
            <p style="color: #94a3b8; font-size: 1.05rem;">A structured, data-first advisory engagement engineered to produce rapid ROI.</p>
        </div>
        <div class="process-grid">
            <div class="process-card">
                <div class="step-num">01</div>
                <h3 class="step-title">Intake & Account Access</h3>
                <p class="step-desc">You share read-only access to your Meta/Google Ad accounts, GA4, and website analytics. Kamalesh prepares pre-meeting teardown notes.</p>
            </div>
            <div class="process-card">
                <div class="step-num">02</div>
                <h3 class="step-title">Deep-Dive 1-on-1 Session</h3>
                <p class="step-desc">A 90-minute live screen-share session with Kamalesh J analyzing your marketing numbers, customer personas, and growth roadblocks.</p>
            </div>
            <div class="process-card">
                <div class="step-num">03</div>
                <h3 class="step-title">Teardown & Immediate Fixes</h3>
                <p class="step-desc">Live dissection of winning vs bleeding ad sets, conversion bottlenecks, landing page friction, and tracking errors.</p>
            </div>
            <div class="process-card">
                <div class="step-num">04</div>
                <h3 class="step-title">Action Playbook & Support</h3>
                <p class="step-desc">Delivery of your comprehensive 90-Day Execution Blueprint with 14 days of direct WhatsApp access to Kamalesh for implementation Q&A.</p>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ BLACK SECTION: SPECIALIST SPOTLIGHT (INTERACTIVE ORANGE DOTS) ═══════════════════════ -->
    <section class="expert-spotlight-section">
        <div class="expert-spotlight-card fx-has-orange-dots">
            <div class="expert-avatar-wrap">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/kamalesh-j-digital-marketing-expert.webp" alt="Kamalesh J - Digital Marketing Expert & Strategic Consultant" class="expert-avatar-img">
                <div class="expert-verified-badge"><i class="fa-solid fa-check"></i></div>
            </div>
            <div class="expert-content">
                <div class="expert-domain-pill"><i class="fa-solid fa-award"></i> Lead Marketing Consultant</div>
                <h2 class="expert-name">Mr. Kamalesh J</h2>
                <div class="expert-headline">
                    <i class="fa-solid fa-crown" style="color: #ff5722;"></i>
                    <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong>
                </div>
                <p class="expert-bio">
                    Every single marketing consultation session is conducted <strong>100% directly by Mr. Kamalesh J</strong>. You never get passed down to account managers, juniors, or interns. Kamalesh has engineered high-ROAS paid media funnels, B2B lead generation engines, and server-side tracking (Meta CAPI & GA4) for high-growth healthcare brands (Dr. Madhavi Skin Clinic - 400+ patient leads), D2C brands (Off-Human), and leading regional enterprises.
                </p>
                <div class="expert-stats-row">
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">₹5Cr+</span>
                        <span class="expert-stat-lbl">Ad Spend Guided</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">4.2x+</span>
                        <span class="expert-stat-lbl">Average ROAS</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">100%</span>
                        <span class="expert-stat-lbl">Direct 1-on-1 Access</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ FAQ SECTION ═══════════════════════ -->
    <section class="faq-section" id="faq">
        <div class="section-header" style="margin-bottom: 30px;">
            <span class="card-tag">FREQUENTLY ASKED QUESTIONS</span>
            <h2>Common Questions About Consultation</h2>
            <p>Everything you need to know about booking, preparing for, and executing your strategic consultation with Mr. Kamalesh J.</p>
        </div>

        <div class="faq-accordion">
            <div class="faq-item active">
                <button class="faq-question-btn" type="button">
                    <span>Who directly conducts the marketing consultation?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer-panel" style="display: block;">
                    Every single consultation session is conducted 100% directly by Mr. Kamalesh J — the best digital marketing expert in Chennai and senior Google and Meta Ads architect. You are never passed down to junior account managers, interns, or external third-party contractors.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question-btn" type="button">
                    <span>What data or account access do I need to prepare beforehand?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer-panel">
                    Prior to your session, we request read-only access to your Meta Ads Manager, Google Ads account, and Google Analytics 4 (GA4). Mr. Kamalesh J performs a pre-call forensic audit so your live session is focused entirely on strategic fixes and actionable roadmap steps rather than setup.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question-btn" type="button">
                    <span>How is this consultation different from a standard agency pitch or free audit?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer-panel">
                    Standard agency audits are automated slide decks designed to sell you monthly retainers. Our 1-on-1 strategic consultation with Kamalesh J is an elite, high-stakes advisory session dissecting your exact unit economics, attribution flaws, ad creative hooks, and conversion funnels with documented campaign-level instructions.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question-btn" type="button">
                    <span>Do you provide implementation support after the session?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer-panel">
                    Yes. Every consultation includes a comprehensive 90-Day Execution Blueprint along with 14 days of direct WhatsApp advisory with Mr. Kamalesh J to answer technical implementation questions as your team executes the strategy.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question-btn" type="button">
                    <span>Can Kamalesh J consult for both B2B and D2C brands in Chennai and pan-India?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer-panel">
                    Yes. Kamalesh has engineered high-ROAS paid media funnels, B2B lead generation engines, and server-side tracking (Meta CAPI & GA4) for healthcare clinics (Dr. Madhavi Skin Clinic - 400+ qualified patient leads), D2C brands (Off-Human), and regional B2B enterprises across India.
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ BLACK SECTION: CTA BANNER (INTERACTIVE ORANGE DOTS) ═══════════════════════ -->
    <div class="content-section" style="padding-top: 0; padding-bottom: 0;">
        <div class="cta-banner fx-has-orange-dots">
            <h2>Ready to Scale with Chennai's Premier Marketing Expert?</h2>
            <p>Schedule your private 1-on-1 strategic consultation directly with Mr. Kamalesh J today and stop leaving growth on the table.</p>
            <div class="hero-ctas" style="margin-bottom: 0;">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero">Schedule Consultation Now <i class="fa-solid fa-arrow-right"></i></a>
                <a href="https://wa.me/919600096973?text=Hi%20Kamalesh,%20I%20would%20like%20to%20book%20a%20Strategic%20Marketing%20Consultation." target="_blank" rel="noopener" class="btn-secondary-hero" style="background: rgba(255,255,255,0.08); color: #ffffff; border-color: rgba(255,255,255,0.2);"><i class="fa-brands fa-whatsapp" style="color: #25d366;"></i> WhatsApp Direct</a>
            </div>
        </div>
    </div>

    <!-- ═══════════════════════ UNIVERSAL FOOTER (BLACK WITH ORANGE DOTS) ═══════════════════════ -->

<?php
get_footer();
