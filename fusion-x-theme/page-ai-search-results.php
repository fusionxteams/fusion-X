<?php
/**
 * Template Name: AI Search Results
 *
 * @package Fusion_X
 */

get_header();
?>

<style>
        :root {
            --brand-orange: #ff5722;
            --brand-orange-hover: #e64a19;
            --brand-orange-glow: rgba(255, 87, 34, 0.28);
            --brand-orange-tint: rgba(255, 87, 34, 0.08);
            --bg-page: #fbfcfd;
            --border-subtle: #e2e8f0;
            --text-heading: #0f172a;
            --text-body: #475569;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Space Grotesk', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--bg-page);
            color: var(--text-body);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* ── FILTER TABS ── */
        .proof-filter-tabs {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            margin-bottom: 45px;
            flex-wrap: wrap;
        }

        .proof-tab-btn {
            padding: 10px 24px;
            border-radius: 50px;
            border: 1px solid var(--border-subtle);
            background: #ffffff;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.88rem;
            font-weight: 700;
            color: var(--text-body);
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.02);
        }

        .proof-tab-btn:hover {
            border-color: var(--brand-orange);
            color: var(--brand-orange);
            transform: translateY(-2px);
        }

        .proof-tab-btn.active {
            background: var(--brand-orange);
            color: #ffffff !important;
            border-color: var(--brand-orange);
            box-shadow: 0 8px 25px rgba(255, 87, 34, 0.35);
        }

        .proof-tab-btn.active i {
            color: #ffffff !important;
        }

        /* ── HERO SECTION ── */
        .ai-hero {
            position: relative;
            padding: 160px 24px 80px;
            background: radial-gradient(circle at 50% 18%, rgba(255, 87, 34, 0.08) 0%, transparent 65%), #ffffff;
            text-align: center;
            border-bottom: 1px solid var(--border-subtle);
        }

        .hero-badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 24px;
            background: var(--brand-orange-tint);
            border: 1px solid rgba(255, 87, 34, 0.25);
            border-radius: 50px;
            font-size: 0.82rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--brand-orange);
            margin-bottom: 24px;
        }

        .hero-badge-dot {
            width: 8px;
            height: 8px;
            background: var(--brand-orange);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--brand-orange);
            animation: pulseDot 2s infinite ease-in-out;
        }

        @keyframes pulseDot {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.3); opacity: 0.6; }
        }

        .ai-hero h1 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.5rem, 5.8vw, 4.8rem);
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: -1.5px;
            color: var(--text-heading);
            max-width: 1040px;
            margin: 0 auto 22px;
        }

        .ai-hero h1 span {
            background: linear-gradient(135deg, #ff5722 15%, #ff8a50 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .ai-hero p {
            font-size: clamp(1.05rem, 2vw, 1.25rem);
            line-height: 1.7;
            color: var(--text-body);
            max-width: 880px;
            margin: 0 auto 45px;
        }

        /* ── STATS STRIP ── */
        .ai-metrics-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .ai-stat-card {
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: 18px;
            padding: 24px 18px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
            text-align: center;
            transition: all 0.3s ease;
        }

        .ai-stat-card:hover {
            transform: translateY(-4px);
            border-color: var(--brand-orange);
            box-shadow: 0 12px 30px var(--brand-orange-glow);
        }

        .ai-stat-num {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 3.2vw, 3rem);
            font-weight: 900;
            color: var(--text-heading);
            line-height: 1;
            margin-bottom: 8px;
        }

        .ai-stat-num span {
            color: var(--brand-orange);
        }

        .ai-stat-lbl {
            font-size: 0.82rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        /* ── MAIN CONTENT CONTAINER ── */
        .ai-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 80px 24px;
        }

        .section-intro-block {
            text-align: center;
            max-width: 840px;
            margin: 0 auto 60px;
        }

        .section-intro-block h2 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 4.2vw, 3.4rem);
            font-weight: 900;
            color: var(--text-heading);
            margin: 0 0 16px;
        }

        .section-intro-block h2 span {
            color: var(--brand-orange);
        }

        .section-intro-block p {
            font-size: 1.15rem;
            color: var(--text-body);
            line-height: 1.7;
            margin: 0;
        }

        /* ── PROOF CARDS SHOWCASE (5 IMAGES) ── */
        .proof-cards-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 36px;
            margin-bottom: 80px;
        }

        .proof-card-item {
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.03);
            display: flex;
            flex-direction: column;
            transition: all 0.35s ease;
        }

        .proof-card-item:hover {
            transform: translateY(-6px);
            border-color: var(--brand-orange);
            box-shadow: 0 20px 45px rgba(255, 87, 34, 0.12);
        }

        .proof-card-full {
            grid-column: 1 / -1;
        }

        .proof-image-wrapper {
            position: relative;
            background: #0f172a;
            border-bottom: 1px solid var(--border-subtle);
            cursor: pointer;
            overflow: hidden;
        }

        .proof-image-wrapper picture img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
        }

        .proof-card-item:hover .proof-image-wrapper picture img {
            transform: scale(1.02);
        }

        /* ── TOUCH-TO-ZOOM LIGHTBOX MODAL WITH CROSS BUTTON (MOBILE OPTIMIZED) ── */
        .ai-zoomable-img-wrap {
            cursor: zoom-in;
            position: relative;
        }

        .ai-zoom-hint-pill {
            position: absolute;
            top: 14px;
            right: 14px;
            background: rgba(15, 23, 42, 0.88);
            backdrop-filter: blur(8px);
            color: #ffffff;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 20px;
            border: 1px solid rgba(255, 87, 34, 0.45);
            display: inline-flex;
            align-items: center;
            gap: 6px;
            pointer-events: none;
            z-index: 5;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

        .proof-image-wrapper:hover .ai-zoom-hint-pill,
        .spotlight-visual:hover .ai-zoom-hint-pill {
            background: #ff5722;
            transform: scale(1.05);
            border-color: rgba(255, 255, 255, 0.6);
        }

        .ai-lightbox-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(5, 8, 15, 0.95);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            z-index: 999999999;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            padding: 20px;
            box-sizing: border-box;
        }

        .ai-lightbox-modal.active {
            opacity: 1;
            pointer-events: auto;
        }

        .ai-lightbox-close-btn {
            position: fixed;
            top: 24px;
            right: 24px;
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff5722 0%, #e64a19 100%);
            color: #ffffff;
            border: 2px solid rgba(255, 255, 255, 0.6);
            font-size: 2.2rem;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(255, 87, 34, 0.6), 0 4px 12px rgba(0, 0, 0, 0.7);
            transition: transform 0.25s ease, background 0.25s ease;
            z-index: 1000000000;
            padding: 0;
            -webkit-tap-highlight-color: transparent;
        }

        .ai-lightbox-close-btn:hover,
        .ai-lightbox-close-btn:active {
            transform: scale(1.12) rotate(90deg);
            background: #ff3d00;
        }

        .ai-lightbox-scroll-area {
            max-width: 98vw;
            max-height: 92vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: auto;
            -webkit-overflow-scrolling: touch;
            padding: 10px;
            box-sizing: border-box;
        }

        .ai-lightbox-img-el {
            max-width: 100%;
            max-height: 82vh;
            width: auto;
            height: auto;
            object-fit: contain;
            border-radius: 16px;
            border: 2px solid rgba(255, 87, 34, 0.45);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.95), 0 0 35px rgba(255, 87, 34, 0.3);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: zoom-in;
        }

        .ai-lightbox-img-el.is-zoomed {
            max-width: none;
            max-height: none;
            width: 160%;
            cursor: zoom-out;
        }

        .ai-lightbox-caption-text {
            margin-top: 14px;
            background: rgba(15, 23, 42, 0.92);
            border: 1px solid rgba(255, 87, 34, 0.35);
            padding: 8px 22px;
            border-radius: 50px;
            color: #ffffff;
            font-size: 0.88rem;
            font-weight: 700;
            text-align: center;
            max-width: 90vw;
            letter-spacing: 0.3px;
        }

        .ai-lightbox-zoom-hint {
            margin-top: 6px;
            font-size: 0.72rem;
            color: #94a3b8;
            letter-spacing: 0.4px;
        }

        @media (max-width: 768px) {
            .ai-lightbox-modal {
                padding: 12px;
            }
            .ai-lightbox-close-btn {
                top: 16px;
                right: 16px;
                width: 48px;
                height: 48px;
                font-size: 2rem;
            }
            .ai-lightbox-scroll-area {
                padding-top: 64px; /* Ensures close button never overlaps image */
                max-height: 94vh;
            }
            .ai-lightbox-img-el {
                max-height: 75vh;
                width: 100%;
                border-radius: 12px;
            }
            .ai-lightbox-img-el.is-zoomed {
                width: 220%;
                max-width: none;
                max-height: none;
            }
            .ai-lightbox-caption-text {
                font-size: 0.8rem;
                padding: 6px 16px;
            }
            .ai-zoom-hint-pill {
                top: 10px;
                right: 10px;
                font-size: 0.68rem;
                padding: 4px 10px;
            }
        }

        .proof-image-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            background: rgba(15, 23, 42, 0.9);
            border: 1px solid rgba(255, 87, 34, 0.45);
            color: #ffffff;
            backdrop-filter: blur(8px);
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .proof-image-badge i {
            color: var(--brand-orange);
        }

        .proof-card-content {
            padding: 28px 30px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            justify-content: space-between;
        }

        .proof-brand-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 14px;
            flex-wrap: wrap;
        }

        .proof-brand-name {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .proof-brand-name img {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            object-fit: contain;
            border: 1px solid var(--border-subtle);
            background: #fff;
            padding: 3px;
        }

        .proof-brand-name h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--text-heading);
            margin: 0;
        }

        .proof-pill-result {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
            border: 1px solid rgba(16, 185, 129, 0.3);
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .proof-pill-result.orange-tone {
            background: var(--brand-orange-tint);
            color: var(--brand-orange);
            border-color: rgba(255, 87, 34, 0.3);
        }

        .proof-query-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--text-heading);
            margin: 0 0 10px;
        }

        .proof-card-desc {
            font-size: 0.95rem;
            line-height: 1.65;
            color: var(--text-body);
            margin: 0 0 18px;
        }

        .proof-meta-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            padding-top: 14px;
            border-top: 1px solid #f1f5f9;
        }

        .proof-tag-chip {
            background: #f8fafc;
            border: 1px solid var(--border-subtle);
            padding: 3px 10px;
            border-radius: 6px;
            font-size: 0.74rem;
            font-weight: 700;
            color: var(--text-muted);
        }

        /* ── DEEP METHODOLOGY SECTION ── */
        .protocol-section {
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: 30px;
            padding: 60px 48px;
            margin-bottom: 80px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.02);
        }

        .protocol-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
            margin-top: 40px;
        }

        .protocol-card {
            background: #f8fafc;
            border: 1px solid var(--border-subtle);
            border-radius: 20px;
            padding: 32px 26px;
            transition: all 0.3s ease;
        }

        .protocol-card:hover {
            transform: translateY(-4px);
            border-color: var(--brand-orange);
            background: #ffffff;
            box-shadow: 0 12px 30px rgba(255, 87, 34, 0.1);
        }

        .protocol-icon-circle {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            background: var(--brand-orange-tint);
            border: 1.5px solid rgba(255, 87, 34, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: var(--brand-orange);
            margin-bottom: 20px;
        }

        .protocol-card h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--text-heading);
            margin: 0 0 12px;
        }

        .protocol-card p {
            font-size: 0.92rem;
            line-height: 1.65;
            color: var(--text-body);
            margin: 0;
        }

        /* ── CASE STUDY HIGHLIGHT CARDS (BHAWANI & NILARO) ── */
        .spotlight-section {
            margin-bottom: 80px;
        }

        .spotlight-card {
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: 28px;
            padding: 44px;
            margin-bottom: 40px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.02);
            transition: all 0.3s ease;
        }

        .spotlight-card:hover {
            border-color: var(--brand-orange);
            box-shadow: 0 16px 45px rgba(255, 87, 34, 0.1);
        }

        .spotlight-visual picture img {
            width: 100%;
            height: auto;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-subtle);
        }

        .spotlight-info h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 900;
            color: var(--text-heading);
            margin: 0 0 12px;
        }

        .spotlight-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 14px;
            background: var(--brand-orange-tint);
            border: 1px solid rgba(255, 87, 34, 0.3);
            color: var(--brand-orange);
            font-size: 0.78rem;
            font-weight: 800;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 16px;
        }

        .spotlight-info p {
            font-size: 0.98rem;
            line-height: 1.7;
            color: var(--text-body);
            margin-bottom: 24px;
        }

        .spotlight-stats-row {
            display: flex;
            gap: 20px;
            margin-bottom: 26px;
            flex-wrap: wrap;
        }

        .spotlight-stat-item {
            background: #f8fafc;
            border: 1px solid var(--border-subtle);
            border-radius: 14px;
            padding: 12px 18px;
            flex: 1;
            min-width: 130px;
        }

        .spotlight-stat-item strong {
            font-family: 'Outfit', sans-serif;
            font-size: 1.6rem;
            font-weight: 900;
            color: var(--text-heading);
            display: block;
            line-height: 1;
            margin-bottom: 4px;
        }

        .spotlight-stat-item span {
            font-size: 0.74rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        /* ── BOTTOM CTA ── */
        .bottom-cta-banner {
            padding: 90px 24px;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #ffffff;
            text-align: center;
            border-radius: 32px;
            box-shadow: 0 25px 60px rgba(15, 23, 42, 0.35);
            position: relative;
            overflow: hidden;
            margin-bottom: 60px;
        }

        .bottom-cta-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 87, 34, 0.35) 0%, transparent 70%);
            pointer-events: none;
        }

        .cta-inner-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        .bottom-cta-banner h2 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 4.5vw, 3.4rem);
            font-weight: 900;
            line-height: 1.15;
            margin: 0 0 18px;
        }

        .bottom-cta-banner h2 span {
            background: linear-gradient(135deg, #ff5722 20%, #ff8a50 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bottom-cta-banner p {
            font-size: 1.15rem;
            color: #cbd5e1;
            line-height: 1.7;
            margin: 0 auto 38px;
        }

        .cta-btn-large {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 40px;
            background: linear-gradient(135deg, #ff5722 0%, #e64a19 100%);
            color: #ffffff !important;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 800;
            font-size: 1.05rem;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 10px 30px rgba(255, 87, 34, 0.45);
            transition: all 0.3s ease;
        }

        .cta-btn-large:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 16px 40px rgba(255, 87, 34, 0.65);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .ai-metrics-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .proof-cards-grid {
                grid-template-columns: 1fr;
            }
            .protocol-grid {
                grid-template-columns: 1fr;
            }
            .spotlight-card {
                grid-template-columns: 1fr;
                padding: 30px;
            }
            .protocol-section {
                padding: 40px 24px;
            }
        }

        @media (max-width: 768px) {
            .ai-hero {
                padding: 130px 20px 60px;
            }
            .ai-metrics-grid {
                grid-template-columns: 1fr;
            }
            .bottom-cta-banner {
                border-radius: 20px;
                padding: 60px 20px;
            }
        }
    </style>

<!-- ═══════════════════════ HERO SECTION ═══════════════════════ -->
    <header class="ai-hero">
        <div class="hero-badge-pill">
            <span class="hero-badge-dot"></span>
            100% Audited AI Dominance • OpenAI ChatGPT, Google Gemini &amp; AI Overviews
        </div>
        <h1>
            How We Rank Brands &amp; Blogs in <span>ChatGPT, Google Gemini &amp; AI Search</span>
        </h1>
        <p>
            The rules of search have fundamentally shifted. Traditional 10 blue links are no longer enough. Consumers and B2B buyers now prompt ChatGPT and Google Gemini for buying advice. Through conversational prompt research, structured EEAT blog authoring, and authority backlinks, Fusion X does all possible ways to bring our client brands directly into generative AI search recommendations.
        </p>

        <!-- Live Metrics Strip -->
        <div class="ai-metrics-grid">
            <div class="ai-stat-card">
                <div class="ai-stat-num">900<span>+</span></div>
                <div class="ai-stat-lbl">Calls in 1 Month Record</div>
            </div>
            <div class="ai-stat-card">
                <div class="ai-stat-num">4<span>x</span></div>
                <div class="ai-stat-lbl">Client Investment ROI</div>
            </div>
            <div class="ai-stat-card">
                <div class="ai-stat-num">#1</div>
                <div class="ai-stat-lbl">ChatGPT &amp; Gemini Rank</div>
            </div>
            <div class="ai-stat-card">
                <div class="ai-stat-num">10</div>
                <div class="ai-stat-lbl">Verified Audited Proofs</div>
            </div>
        </div>
    </header>

    <!-- ═══════════════════════ MAIN PROOF SECTION ═══════════════════════ -->
    <main class="ai-container">
        
        <div class="section-intro-block">
            <h2>Audited Proof: <span>Direct From AI Search Engines</span></h2>
            <p>
                Real queries, real users, and real business outcomes. Below is the unedited photographic proof showing our client brands Nilaro Coffee and Bhawani Corner Glassware ranking at the absolute top of OpenAI ChatGPT, Google Gemini, and Google AI Overviews.
            </p>
        </div>

        <!-- Filter Tabs for AI Engines -->
        <div class="proof-filter-tabs">
            <button class="proof-tab-btn active" data-engine="all"><i class="fa-solid fa-border-all"></i> All AI Proofs (10)</button>
            <button class="proof-tab-btn" data-engine="chatgpt"><i class="fa-solid fa-robot" style="color: #10a37f;"></i> OpenAI ChatGPT (2)</button>
            <button class="proof-tab-btn" data-engine="gemini"><i class="fa-solid fa-sparkles" style="color: #38bdf8;"></i> Google Gemini &amp; Blogs (3)</button>
            <button class="proof-tab-btn" data-engine="ai-overviews"><i class="fa-solid fa-brain" style="color: #ff5722;"></i> Google AI Overviews &amp; Mode (5)</button>
        </div>

        <!-- 10-Image Proof Showcase Grid -->
        <div class="proof-cards-grid">
            
            <!-- Proof 1: OpenAI ChatGPT Search - Bhawani Corner #1 -->
            <article class="proof-card-item" data-engine="chatgpt">
                <div class="proof-image-wrapper ai-zoomable-img-wrap">
                    <span class="ai-zoom-hint-pill"><i class="fa-solid fa-magnifying-glass-plus"></i> Tap to view big</span>
                    <picture>
                        <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-chatgpt-search-ranking.webp" type="image/webp">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-chatgpt-search-ranking.png" alt="OpenAI ChatGPT ranking Bhawani Corner Glassware #1 Best Crockery Shop in Chennai" loading="lazy">
                    </picture>
                    <span class="proof-image-badge" style="border-color: rgba(16, 163, 127, 0.6);"><i class="fa-solid fa-robot" style="color: #10a37f;"></i> OpenAI ChatGPT Search</span>
                </div>
                <div class="proof-card-content">
                    <div>
                        <div class="proof-brand-row">
                            <div class="proof-brand-name">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani/logo.png" alt="Bhawani Corner Logo">
                                <h3>Bhawani Corner</h3>
                            </div>
                            <span class="proof-pill-result" style="background: rgba(16, 163, 127, 0.15); color: #10a37f; border-color: rgba(16, 163, 127, 0.4);"><i class="fa-solid fa-crown"></i> Ranked #1 in ChatGPT</span>
                        </div>
                        <h4 class="proof-query-title">Prompt: "Best Crockery Shops in Chennai"</h4>
                        <p class="proof-card-desc">
                            When users prompt OpenAI ChatGPT for <strong>"Best Crockery Shops in Chennai"</strong>, ChatGPT names <strong>1. Bhawani Corner Glassware Pvt Ltd</strong> as Chennai's #1 top shop to consider, describing their dinnerware, glassware, and citing our structured blog and location data.
                        </p>
                    </div>
                    <div class="proof-meta-tags">
                        <span class="proof-tag-chip">OpenAI ChatGPT</span>
                        <span class="proof-tag-chip">Natural Prompt Search</span>
                        <span class="proof-tag-chip">Blog Content Ingestion</span>
                    </div>
                </div>
            </article>

            <!-- Proof 2: OpenAI ChatGPT Map Search - Bhawani Corner Monopoly -->
            <article class="proof-card-item" data-engine="chatgpt">
                <div class="proof-image-wrapper ai-zoomable-img-wrap">
                    <span class="ai-zoom-hint-pill"><i class="fa-solid fa-magnifying-glass-plus"></i> Tap to view big map</span>
                    <picture>
                        <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-chatgpt-map-search-ranking.webp" type="image/webp">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-chatgpt-map-search-ranking.png" alt="ChatGPT Map Search ranking Bhawani Corner #1 ahead of corporate retail stores" loading="lazy">
                    </picture>
                    <span class="proof-image-badge" style="border-color: rgba(16, 163, 127, 0.6);"><i class="fa-solid fa-map-location-dot" style="color: #10a37f;"></i> ChatGPT Interactive Map</span>
                </div>
                <div class="proof-card-content">
                    <div>
                        <div class="proof-brand-row">
                            <div class="proof-brand-name">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani/logo.png" alt="Bhawani Corner Logo">
                                <h3>Bhawani Corner</h3>
                            </div>
                            <span class="proof-pill-result" style="background: rgba(16, 163, 127, 0.15); color: #10a37f; border-color: rgba(16, 163, 127, 0.4);"><i class="fa-solid fa-trophy"></i> #1 Ahead of Big Chains</span>
                        </div>
                        <h4 class="proof-query-title">Prompt: "Best Crockery Shops in Chennai" (Map Search)</h4>
                        <p class="proof-card-desc">
                            ChatGPT's Mapbox interactive map engine ranks Bhawani Corner as the #1 primary recommendation chip across Chennai, ranked ahead of multi-chain conglomerates Home Centre and Poppat Jamals with address and contact phone number.
                        </p>
                    </div>
                    <div class="proof-meta-tags">
                        <span class="proof-tag-chip">ChatGPT Mapbox</span>
                        <span class="proof-tag-chip">Map Pack Monopoly</span>
                        <span class="proof-tag-chip">Local Entity Linkage</span>
                    </div>
                </div>
            </article>

            <!-- Proof 3: Google Gemini Blog Citation - Bhawani Corner Kitchenware -->
            <article class="proof-card-item" data-engine="gemini">
                <div class="proof-image-wrapper ai-zoomable-img-wrap">
                    <span class="ai-zoom-hint-pill"><i class="fa-solid fa-magnifying-glass-plus"></i> Tap to view big</span>
                    <picture>
                        <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-gemini-blog-citation.webp" type="image/webp">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-gemini-blog-citation.png" alt="Google Gemini citing Bhawani Corner ranking blog for Best Kitchenware Shops in Chennai" loading="lazy">
                    </picture>
                    <span class="proof-image-badge" style="border-color: rgba(56, 189, 248, 0.6);"><i class="fa-solid fa-sparkles" style="color: #38bdf8;"></i> Google Gemini Blog Citation</span>
                </div>
                <div class="proof-card-content">
                    <div>
                        <div class="proof-brand-row">
                            <div class="proof-brand-name">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani/logo.png" alt="Bhawani Corner Logo">
                                <h3>Bhawani Corner</h3>
                            </div>
                            <span class="proof-pill-result"><i class="fa-solid fa-quote-left"></i> Ranking Blog Cited</span>
                        </div>
                        <h4 class="proof-query-title">Prompt: "Best Kitchenware Shops in Chennai"</h4>
                        <p class="proof-card-desc">
                            Google Gemini officially cites Bhawani Corner's ranking blog under <em>"Comprehensive Retail &amp; Wholesale Hubs"</em>. The live hover popover directly quotes our written blog FAQ: <em>"Where are the best places to buy cookware sets in Chennai? A. Bhawani Corner Glassware..."</em> with direct source link to the blog.
                        </p>
                    </div>
                    <div class="proof-meta-tags">
                        <span class="proof-tag-chip">Gemini Blog Citation</span>
                        <span class="proof-tag-chip">Direct FAQ Extraction</span>
                        <span class="proof-tag-chip">EEAT Structured Data</span>
                    </div>
                </div>
            </article>

            <!-- Proof 4: Google AI Mode - Bhawani Corner Tableware #1 -->
            <article class="proof-card-item" data-engine="ai-overviews">
                <div class="proof-image-wrapper ai-zoomable-img-wrap">
                    <span class="ai-zoom-hint-pill"><i class="fa-solid fa-magnifying-glass-plus"></i> Tap to view big map</span>
                    <picture>
                        <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-google-ai-mode-tableware-ranking.webp" type="image/webp">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-google-ai-mode-tableware-ranking.png" alt="Google AI Mode ranking Bhawani Corner #1 for Best Tableware shops in chennai" loading="lazy">
                    </picture>
                    <span class="proof-image-badge"><i class="fa-solid fa-robot"></i> Google AI Mode</span>
                </div>
                <div class="proof-card-content">
                    <div>
                        <div class="proof-brand-row">
                            <div class="proof-brand-name">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani/logo.png" alt="Bhawani Corner Logo">
                                <h3>Bhawani Corner</h3>
                            </div>
                            <span class="proof-pill-result orange-tone"><i class="fa-solid fa-crown"></i> #1 in AI Mode</span>
                        </div>
                        <h4 class="proof-query-title">Query: "Best Tableware shops in chennai"</h4>
                        <p class="proof-card-desc">
                            In Google's next-generation <strong>AI Mode</strong> search experience, Bhawani Corner Glassware Pvt Ltd is selected as the #1 store card and map point for luxury dinnerware and modern ceramics: <em>"Bhawani Corner Glassware Pvt. Ltd. is one of the best crockery shops in Chennai, trusted since 1982..."</em>
                        </p>
                    </div>
                    <div class="proof-meta-tags">
                        <span class="proof-tag-chip">Google AI Mode</span>
                        <span class="proof-tag-chip">Search Generative Exp</span>
                        <span class="proof-tag-chip">Entity Authority</span>
                    </div>
                </div>
            </article>

            <!-- Proof 5: Google Gemini Knowledge Card - Bhawani Crockery -->
            <article class="proof-card-item" data-engine="gemini">
                <div class="proof-image-wrapper ai-zoomable-img-wrap">
                    <span class="ai-zoom-hint-pill"><i class="fa-solid fa-magnifying-glass-plus"></i> Tap to view big</span>
                    <picture>
                        <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-gemini-crockery-shops-chennai.webp" type="image/webp">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-gemini-crockery-shops-chennai.png" alt="Google Gemini Knowledge Card ranking Bhawani Corner Glassware" loading="lazy">
                    </picture>
                    <span class="proof-image-badge" style="border-color: rgba(56, 189, 248, 0.6);"><i class="fa-solid fa-sparkles" style="color: #38bdf8;"></i> Gemini Knowledge Card</span>
                </div>
                <div class="proof-card-content">
                    <div>
                        <div class="proof-brand-row">
                            <div class="proof-brand-name">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani/logo.png" alt="Bhawani Corner Logo">
                                <h3>Bhawani Corner</h3>
                            </div>
                            <span class="proof-pill-result"><i class="fa-solid fa-award"></i> Premier Specialty</span>
                        </div>
                        <h4 class="proof-query-title">Prompt: "Best Crockery Shops in Chennai"</h4>
                        <p class="proof-card-desc">
                            Gemini synthesizes a standalone knowledge entity panel and local map pin identifying Bhawani Corner as Chennai's premier specialty destination for crystal ware, glassware, and branded dinner sets with 4.7-star rating.
                        </p>
                    </div>
                    <div class="proof-meta-tags">
                        <span class="proof-tag-chip">Gemini Knowledge Panel</span>
                        <span class="proof-tag-chip">Entity Schema</span>
                        <span class="proof-tag-chip">Local Map Dominance</span>
                    </div>
                </div>
            </article>

            <!-- Proof 6: Google AI Overviews - Bhawani 900+ Inbound Calls Record -->
            <article class="proof-card-item" data-engine="ai-overviews">
                <div class="proof-image-wrapper ai-zoomable-img-wrap">
                    <span class="ai-zoom-hint-pill"><i class="fa-solid fa-magnifying-glass-plus"></i> Tap to view big map</span>
                    <picture>
                        <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-google-ai-overview-ranking.webp" type="image/webp">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-google-ai-overview-ranking.png" alt="Bhawani Corner Glassware Ranked #1 in Google AI Overviews with 900+ Calls" loading="lazy">
                    </picture>
                    <span class="proof-image-badge"><i class="fa-solid fa-location-dot"></i> Google AI Overviews Map Pack</span>
                </div>
                <div class="proof-card-content">
                    <div>
                        <div class="proof-brand-row">
                            <div class="proof-brand-name">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani/logo.png" alt="Bhawani Corner Logo">
                                <h3>Bhawani Corner</h3>
                            </div>
                            <span class="proof-pill-result orange-tone"><i class="fa-solid fa-fire"></i> 900+ Calls/Mo Record</span>
                        </div>
                        <h4 class="proof-query-title">AI Overviews: 900+ Direct Showroom Calls Record</h4>
                        <p class="proof-card-desc">
                            Google AI recommends Bhawani Corner as Chennai's <em>#1 Premium &amp; Modern Retail Favorite</em>. In a 3-month technical SEO sprint, Bhawani generated an unprecedented <strong>900+ direct showroom phone calls in a single month</strong>, yielding over <strong>4x the entire financial investment</strong>!
                        </p>
                    </div>
                    <div class="proof-meta-tags">
                        <span class="proof-tag-chip">900+ Inbound Calls/Mo</span>
                        <span class="proof-tag-chip">4x Investment ROI</span>
                        <span class="proof-tag-chip">AI Map Pack Monopoly</span>
                    </div>
                </div>
            </article>

            <!-- Proof 7: Google Gemini AI - Nilaro Coffee Ranked #1 -->
            <article class="proof-card-item" data-engine="gemini">
                <div class="proof-image-wrapper ai-zoomable-img-wrap">
                    <span class="ai-zoom-hint-pill"><i class="fa-solid fa-magnifying-glass-plus"></i> Tap to view big</span>
                    <picture>
                        <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-nilaro-google-gemini-ai-ranking.webp" type="image/webp">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-nilaro-google-gemini-ai-ranking.png" alt="Google Gemini ranking Nilaro Coffee #1 for Best Chicory Coffee" loading="lazy">
                    </picture>
                    <span class="proof-image-badge" style="border-color: rgba(56, 189, 248, 0.6);"><i class="fa-solid fa-sparkles" style="color: #38bdf8;"></i> Google Gemini AI</span>
                </div>
                <div class="proof-card-content">
                    <div>
                        <div class="proof-brand-row">
                            <div class="proof-brand-name">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/logo.webp" alt="Nilaro Coffee Logo">
                                <h3>Nilaro Coffee</h3>
                            </div>
                            <span class="proof-pill-result"><i class="fa-solid fa-crown"></i> Ranked #1 Best Overall</span>
                        </div>
                        <h4 class="proof-query-title">Prompt: "best chicory coffee"</h4>
                        <p class="proof-card-desc">
                            Google Gemini officially names Nilaro Coffee as <strong>1. Nilaro Coffee (Best Overall for Traditional Blends)</strong>. Gemini quotes our written technical blog copy verbatim: <em>"delivering a thick, aromatic decoction with a clean finish... small-batch roasted"</em> with direct link citation to <code>nilaro.in</code>.
                        </p>
                    </div>
                    <div class="proof-meta-tags">
                        <span class="proof-tag-chip">Google Gemini AI</span>
                        <span class="proof-tag-chip">Prompt Engineering</span>
                        <span class="proof-tag-chip">Direct Citation (nilaro.in)</span>
                    </div>
                </div>
            </article>

            <!-- Proof 8: Google AI Overview - Nilaro Coffee Brands Chennai -->
            <article class="proof-card-item" data-engine="ai-overviews">
                <div class="proof-image-wrapper ai-zoomable-img-wrap">
                    <span class="ai-zoom-hint-pill"><i class="fa-solid fa-magnifying-glass-plus"></i> Tap to view big</span>
                    <picture>
                        <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-nilaro-google-ai-coffee-brands-chennai.webp" type="image/webp">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-nilaro-google-ai-coffee-brands-chennai.png" alt="Google AI Overviews ranking Nilaro Coffee among Top Coffee Brands in Chennai" loading="lazy">
                    </picture>
                    <span class="proof-image-badge"><i class="fa-solid fa-sparkles"></i> Google AI Overview</span>
                </div>
                <div class="proof-card-content">
                    <div>
                        <div class="proof-brand-row">
                            <div class="proof-brand-name">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/logo.webp" alt="Nilaro Coffee Logo">
                                <h3>Nilaro Coffee</h3>
                            </div>
                            <span class="proof-pill-result"><i class="fa-solid fa-award"></i> Listed with Heritage Giants</span>
                        </div>
                        <h4 class="proof-query-title">Query: "Best Coffee Brands in Chennai"</h4>
                        <p class="proof-card-desc">
                            Google's generative AI algorithm names <strong>Narasu's Coffee, Leo Coffee, and Nilaro Coffee</strong> as Chennai's premier brands. A modern artisanal startup successfully established side-by-side with 100-year-old heritage giants in AI recommendations.
                        </p>
                    </div>
                    <div class="proof-meta-tags">
                        <span class="proof-tag-chip">Google AI Overviews</span>
                        <span class="proof-tag-chip">Local Entity SEO</span>
                        <span class="proof-tag-chip">Citation (nilaro.in)</span>
                    </div>
                </div>
            </article>

            <!-- Proof 9: Google AI Overview - Nilaro Best Filter Coffee Powder -->
            <article class="proof-card-item" data-engine="ai-overviews">
                <div class="proof-image-wrapper ai-zoomable-img-wrap">
                    <span class="ai-zoom-hint-pill"><i class="fa-solid fa-magnifying-glass-plus"></i> Tap to view big</span>
                    <picture>
                        <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-nilaro-best-filter-coffee-powder-ai-overview.webp" type="image/webp">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-nilaro-best-filter-coffee-powder-ai-overview.png" alt="Google AI Overview recommending Nilaro Coffee for Best Filter Coffee Powder" loading="lazy">
                    </picture>
                    <span class="proof-image-badge"><i class="fa-solid fa-sparkles"></i> Google AI Overview</span>
                </div>
                <div class="proof-card-content">
                    <div>
                        <div class="proof-brand-row">
                            <div class="proof-brand-name">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/logo.webp" alt="Nilaro Coffee Logo">
                                <h3>Nilaro Coffee</h3>
                            </div>
                            <span class="proof-pill-result"><i class="fa-solid fa-check"></i> Top Bullet Choice</span>
                        </div>
                        <h4 class="proof-query-title">Query: "Best Filter Coffee Powder in Chennai"</h4>
                        <p class="proof-card-desc">
                            Google AI Overviews positions Nilaro Coffee at the absolute top of the bullet recommendations: <em>"Praised as a top choice for daily brewing, offering a classic 80:20 chicory-to-coffee blend as well as a 100% pure coffee option"</em> with direct link back to the brand.
                        </p>
                    </div>
                    <div class="proof-meta-tags">
                        <span class="proof-tag-chip">AI Bullet Extraction</span>
                        <span class="proof-tag-chip">AEO Architecture</span>
                        <span class="proof-tag-chip">Structured Snippets</span>
                    </div>
                </div>
            </article>

            <!-- Proof 10: Google AI Overview - Nilaro Best Chicory Coffee Blends -->
            <article class="proof-card-item" data-engine="ai-overviews">
                <div class="proof-image-wrapper ai-zoomable-img-wrap">
                    <span class="ai-zoom-hint-pill"><i class="fa-solid fa-magnifying-glass-plus"></i> Tap to view big</span>
                    <picture>
                        <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-nilaro-best-chicory-coffee-google-ai.webp" type="image/webp">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-nilaro-best-chicory-coffee-google-ai.png" alt="Google AI Overviews Best Chicory Coffee Nilaro Filter Coffee" loading="lazy">
                    </picture>
                    <span class="proof-image-badge"><i class="fa-solid fa-sparkles"></i> Google AI Overview</span>
                </div>
                <div class="proof-card-content">
                    <div>
                        <div class="proof-brand-row">
                            <div class="proof-brand-name">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/logo.webp" alt="Nilaro Coffee Logo">
                                <h3>Nilaro Coffee</h3>
                            </div>
                            <span class="proof-pill-result"><i class="fa-solid fa-bullseye"></i> Top Chicory Blend</span>
                        </div>
                        <h4 class="proof-query-title">Query: "Best Chicory Coffee"</h4>
                        <p class="proof-card-desc">
                            Under <strong>"Top Chicory Coffee Blends"</strong>, Google AI selects <strong>Nilaro Filter Coffee (80:20 Blend)</strong> as its leading featured entry across India. The AI highlights the authentic balance and value directly from our ranking content.
                        </p>
                    </div>
                    <div class="proof-meta-tags">
                        <span class="proof-tag-chip">High-Intent Keyword</span>
                        <span class="proof-tag-chip">AI Product Matching</span>
                        <span class="proof-tag-chip">Entity Schema</span>
                    </div>
                </div>
            </article>

        </div>

        <!-- ═══════════════════════ THE 3-PILLAR AI & CHATGPT RANKING PROTOCOL ═══════════════════════ -->
        <section class="protocol-section">
            <div style="text-align: center; max-width: 840px; margin: 0 auto;">
                <span class="hero-badge-pill"><i class="fa-solid fa-gears"></i> Our Proprietary Protocol</span>
                <h2 style="font-family: 'Outfit', sans-serif; font-size: clamp(2rem, 3.8vw, 2.8rem); font-weight: 900; color: var(--text-heading); margin: 0 0 14px;">
                    How Fusion X Ranks Blogs &amp; Brands in <span>ChatGPT &amp; AI Engines</span>
                </h2>
                <p style="font-size: 1.05rem; color: var(--text-body); line-height: 1.7; margin: 0;">
                    AI language models don't read websites the way old web crawlers did. Here is the verified 3-pillar engineering framework we execute to ensure ChatGPT and Google Gemini scrape and quote our clients' blogs:
                </p>
            </div>

            <div class="protocol-grid">
                
                <!-- Pillar 1 -->
                <div class="protocol-card">
                    <div class="protocol-icon-circle">
                        <i class="fa-solid fa-magnifying-glass-chart"></i>
                    </div>
                    <h3>1. Conversational Prompt Keyword Research</h3>
                    <p>
                        We map the exact natural language questions and entity prompts buyers feed into ChatGPT, Google Gemini, and AI Search (e.g. <em>"Best crockery shops in Chennai"</em>, <em>"best chicory coffee"</em>). We optimize for semantic intent rather than mechanical keywords.
                    </p>
                </div>

                <!-- Pillar 2 -->
                <div class="protocol-card">
                    <div class="protocol-icon-circle">
                        <i class="fa-solid fa-pen-nib"></i>
                    </div>
                    <h3>2. Structured Knowledge EEAT Blogging</h3>
                    <p>
                        We author deep, factual articles formatted with concise answer blocks, Q&amp;A schema, comparison ratios, and entity definitions. When ChatGPT or Gemini searches the web for answers, our client's blog is chosen as the factual ground truth.
                    </p>
                </div>

                <!-- Pillar 3 -->
                <div class="protocol-card">
                    <div class="protocol-icon-circle">
                        <i class="fa-solid fa-network-wired"></i>
                    </div>
                    <h3>3. Contextual Authority Backlinks</h3>
                    <p>
                        LLMs require third-party consensus before recommending a brand or citing a blog. We engineer high-authority contextual editorial backlinks and local directory entity citations that prove your business is an undisputed market leader.
                    </p>
                </div>

            </div>
        </section>

        <!-- ═══════════════════════ SPOTLIGHT CASE STUDIES ═══════════════════════ -->
        <section class="spotlight-section">
            <div class="section-intro-block">
                <h2>Verified Case Studies: <span>AI &amp; ChatGPT Growth in Action</span></h2>
                <p>Detailed breakdown of how our AI search optimization drove verified revenue, phone calls, and customer pipeline.</p>
            </div>

            <!-- Spotlight 1: Bhawani Corner Glassware -->
            <div class="spotlight-card">
                <div class="spotlight-info">
                    <span class="spotlight-badge"><i class="fa-solid fa-fire"></i> 900+ Calls Record • ChatGPT #1</span>
                    <h3>Bhawani Corner Glassware</h3>
                    <p>
                        Bhawani Corner wanted to dominate the Chennai retail market for architectural glassware and luxury tableware. We optimized their Google Knowledge entity, engineered local semantic keyword silos, and authored high-authority EEAT blogs. In just 3 months, they captured <strong>#1 in OpenAI ChatGPT Search</strong> and Google AI Overviews' top spot, generating over <strong>900 inbound phone calls in a single month record</strong> and <strong>4x the total financial investment</strong>!
                    </p>
                    <div class="spotlight-stats-row">
                        <div class="spotlight-stat-item">
                            <strong>900+</strong>
                            <span>Calls / Single Month</span>
                        </div>
                        <div class="spotlight-stat-item">
                            <strong>4x</strong>
                            <span>Investment ROI</span>
                        </div>
                        <div class="spotlight-stat-item">
                            <strong>#1</strong>
                            <span>ChatGPT &amp; Google AI</span>
                        </div>
                    </div>
                    <a href="<?php echo esc_url( home_url( '/bhawani-corner/' ) ); ?>" class="stage-cta-btn" style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; background:var(--brand-orange); color:#fff; border-radius:50px; text-decoration:none; font-weight:700;">
                        <span>View Bhawani Case Study</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
                <div class="spotlight-visual ai-zoomable-img-wrap">
                    <span class="ai-zoom-hint-pill"><i class="fa-solid fa-magnifying-glass-plus"></i> Tap to view big</span>
                    <picture>
                        <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-chatgpt-search-ranking.webp" type="image/webp">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-chatgpt-search-ranking.png" alt="Bhawani Corner ChatGPT Search Ranking #1">
                    </picture>
                </div>
            </div>

            <!-- Spotlight 2: Nilaro Coffee -->
            <div class="spotlight-card" style="direction: rtl;">
                <div class="spotlight-info" style="direction: ltr;">
                    <span class="spotlight-badge"><i class="fa-solid fa-crown"></i> #1 In Gemini &amp; Google AI</span>
                    <h3>Nilaro Coffee</h3>
                    <p>
                        In a market dominated by century-old heritage coffee conglomerates, Nilaro needed to establish rapid digital supremacy. We conducted natural language prompt research, authored authoritative filter coffee guides, and deployed technical structured schema. Today, Google Gemini and Google AI Overviews officially recommend Nilaro Coffee as the #1 best traditional chicory blend in India.
                    </p>
                    <div class="spotlight-stats-row">
                        <div class="spotlight-stat-item">
                            <strong>#1</strong>
                            <span>Gemini Best Chicory</span>
                        </div>
                        <div class="spotlight-stat-item">
                            <strong>+220%</strong>
                            <span>Subscription Growth</span>
                        </div>
                        <div class="spotlight-stat-item">
                            <strong>100%</strong>
                            <span>Organic AI Citations</span>
                        </div>
                    </div>
                    <a href="<?php echo esc_url( home_url( '/nilaro/' ) ); ?>" class="stage-cta-btn" style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; background:var(--brand-orange); color:#fff; border-radius:50px; text-decoration:none; font-weight:700;">
                        <span>View Nilaro Case Study</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
                <div class="spotlight-visual ai-zoomable-img-wrap" style="direction: ltr;">
                    <span class="ai-zoom-hint-pill"><i class="fa-solid fa-magnifying-glass-plus"></i> Tap to view big</span>
                    <picture>
                        <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-nilaro-google-gemini-ai-ranking.webp" type="image/webp">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-nilaro-google-gemini-ai-ranking.png" alt="Nilaro Google Gemini AI Proof Showcase">
                    </picture>
                </div>
            </div>

        </section>

        <!-- ═══════════════════════ CONVERSION CTA BANNER ═══════════════════════ -->
        <div class="bottom-cta-banner">
            <div class="cta-inner-content">
                <h2>Want Your Brand &amp; Blogs <span>Recommended by AI?</span></h2>
                <p>
                    Don't let your competitors monopolize ChatGPT, Google Gemini, and AI Overviews. Schedule a complimentary 1-on-1 Generative Engine Optimization (GEO) audit with our lead consultants today.
                </p>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn-large">
                    <span>Claim Your Free AI Search Audit</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

    </main>

    <!-- ═══════════════════════ EXACT UNIVERSAL SITE FOOTER ═══════════════════════ -->

<script>
        // Mobile Hamburger Drawer & AI Engine Filter Tabs
        document.addEventListener('DOMContentLoaded', () => {
            const hamburger = document.querySelector('.hamburger');
            const navLinks = document.querySelector('.nav-links');
            if (hamburger && navLinks) {
                hamburger.addEventListener('click', () => {
                    navLinks.classList.toggle('nav-active');
                    hamburger.classList.toggle('toggle');
                });
            }

            // AI Engine Filter Tabs
            const tabBtns = document.querySelectorAll('.proof-tab-btn');
            const proofItems = document.querySelectorAll('.proof-card-item');

            tabBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    tabBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    const engine = btn.getAttribute('data-engine');

                    proofItems.forEach(item => {
                        const itemEngine = item.getAttribute('data-engine');
                        if (engine === 'all' || itemEngine === engine) {
                            item.style.display = 'flex';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });

            // ── AI Proof Touch-To-Zoom Lightbox with Prominent Cross Button ──
            (function initAILightbox() {
                const overlay = document.getElementById('ai-image-lightbox');
                if (!overlay) return;
                const lightboxImg = document.getElementById('ai-lightbox-img');
                const lightboxCaption = document.getElementById('ai-lightbox-caption');
                const closeBtn = overlay.querySelector('.ai-lightbox-close-btn');

                function openLightbox(src, caption) {
                    lightboxImg.src = src;
                    lightboxImg.classList.remove('is-zoomed');
                    lightboxCaption.textContent = caption || 'AI Search Result & Map Proof';
                    overlay.style.display = 'flex';
                    overlay.offsetHeight; // force reflow
                    overlay.classList.add('active');
                    overlay.setAttribute('aria-hidden', 'false');
                    document.body.style.overflow = 'hidden';
                }

                function closeLightbox() {
                    overlay.classList.remove('active');
                    overlay.setAttribute('aria-hidden', 'true');
                    document.body.style.overflow = '';
                    lightboxImg.classList.remove('is-zoomed');
                    setTimeout(() => {
                        if (!overlay.classList.contains('active')) {
                            overlay.style.display = 'none';
                            lightboxImg.src = '';
                        }
                    }, 300);
                }

                closeBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    closeLightbox();
                });

                // Tap image inside lightbox to toggle zoom (ideal for reading map markers on mobile)
                lightboxImg.addEventListener('click', (e) => {
                    e.stopPropagation();
                    lightboxImg.classList.toggle('is-zoomed');
                });

                overlay.addEventListener('click', (e) => {
                    if (e.target === overlay || e.target.classList.contains('ai-lightbox-scroll-area')) {
                        closeLightbox();
                    }
                });

                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && overlay.classList.contains('active')) {
                        closeLightbox();
                    }
                });

                // Attach click/touch listeners to all proof images and wrappers
                document.querySelectorAll('.ai-zoomable-img-wrap, .proof-image-wrapper, .spotlight-visual').forEach(wrapper => {
                    wrapper.addEventListener('click', (e) => {
                        const img = wrapper.querySelector('img');
                        if (!img) return;

                        // Prefer webp source or current src
                        const pictureSource = wrapper.querySelector('picture source');
                        const fullSrc = (pictureSource && pictureSource.srcset) ? pictureSource.srcset : img.currentSrc || img.src;

                        // Extract context caption
                        const cardItem = wrapper.closest('.proof-card-item') || wrapper.closest('.spotlight-card');
                        let caption = img.alt;
                        if (cardItem) {
                            const titleEl = cardItem.querySelector('.proof-query-title') || cardItem.querySelector('h3') || cardItem.querySelector('h4');
                            if (titleEl) caption = titleEl.textContent.trim();
                        }

                        openLightbox(fullSrc, caption);
                    });
                });
            })();
        });
    </script>

    <!-- ═══════════════════════ TOUCH-TO-ENLARGE MAP & PROOF LIGHTBOX MODAL ═══════════════════════ -->
    <div id="ai-image-lightbox" class="ai-lightbox-modal" style="display: none;" aria-hidden="true">
        <button class="ai-lightbox-close-btn" aria-label="Close enlarged map" title="Close (Esc)">&times;</button>
        <div class="ai-lightbox-scroll-area">
            <img id="ai-lightbox-img" class="ai-lightbox-img-el" src="" alt="Enlarged AI Proof Map">
            <div id="ai-lightbox-caption" class="ai-lightbox-caption-text"></div>
            <div class="ai-lightbox-zoom-hint"><i class="fa-solid fa-hand-pointer"></i> Tap map/image to toggle extra zoom</div>
        </div>
    </div>

<?php
get_footer();
