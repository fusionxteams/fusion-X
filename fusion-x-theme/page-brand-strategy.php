<?php
/**
 * Template Name: Brand Strategy
 *
 * @package Fusion_X
 */

get_header();
?>

<style>
        :root {
            --dev-orange: #ff5722;
            --dev-orange-dark: #e64a19;
            --dev-dark: #0f172a;
            --dev-slate: #1e293b;
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
            background: radial-gradient(circle at 50% 20%, rgba(255, 87, 34, 0.07) 0%, transparent 60%), #ffffff;
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
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 50px;
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
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        }

        .tech-chip i {
            color: var(--dev-orange);
        }

        .hero-ctas {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
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
            transition: all 0.3s ease;
        }

        .btn-secondary-hero:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            transform: translateY(-2px);
        }

        /* ── MAIN CONTENT ── */
        .content-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 90px 24px;
        }

        .section-header {
            text-align: center;
            max-width: 760px;
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

        /* ── SERVICE CARDS ── */
        .service-card-block {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            margin-bottom: 100px;
        }

        .service-card-block:nth-child(even) {
            direction: rtl;
        }

        .service-card-block:nth-child(even) .card-content-box {
            direction: ltr;
        }

        .service-card-block:nth-child(even) .card-visual-box {
            direction: ltr;
        }

        .card-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--dev-orange);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 12px;
        }

        .card-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(1.8rem, 3.2vw, 2.6rem);
            font-weight: 800;
            color: #0f172a;
            line-height: 1.2;
            margin-bottom: 18px;
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
            margin: 0 0 30px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .card-feature-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            color: #334155;
        }

        .card-feature-list li i {
            color: var(--dev-orange);
            font-size: 1rem;
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
            margin-bottom: 6px;
        }

        .card-visual-box {
            background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.05);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .card-visual-icon {
            font-size: 3.8rem;
            color: var(--dev-orange);
            margin-bottom: 18px;
        }

        .card-visual-stat {
            font-family: 'Outfit', sans-serif;
            font-size: 2.8rem;
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 6px;
        }

        .card-visual-sub {
            font-size: 0.92rem;
            color: var(--dev-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ── PROTOCOL STEPS ── */
        .process-section {
            background: #080808;
            color: #ffffff;
            padding: 100px 24px;
            border-radius: 36px;
            margin: 60px 24px;
        }

        .process-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 60px;
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
        }

        .process-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 36px 28px;
            transition: all 0.3s ease;
        }

        .process-card:hover {
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(255, 87, 34, 0.5);
            transform: translateY(-5px);
        }

        .step-num {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 900;
            color: var(--dev-orange);
            margin-bottom: 16px;
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

        /* ── CTA BANNER ── */
        .cta-banner {
            background: linear-gradient(135deg, #ff5722 0%, #ff8a50 100%);
            border-radius: 28px;
            padding: 70px 40px;
            text-align: center;
            color: #ffffff;
            margin: 60px auto 40px;
            max-width: 1100px;
            box-shadow: 0 20px 50px rgba(255, 87, 34, 0.25);
        }

        .cta-banner h2 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2rem, 4vw, 3.2rem);
            font-weight: 900;
            margin-bottom: 16px;
        }

        .cta-banner p {
            font-size: 1.15rem;
            max-width: 650px;
            margin: 0 auto 36px;
            opacity: 0.95;
            line-height: 1.6;
        }

        .cta-banner .btn-primary-hero {
            background: #ffffff;
            color: #ff5722;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .cta-banner .btn-primary-hero:hover {
            background: #f8fafc;
            color: #e64a19;
            transform: translateY(-2px);
        }

        @media (max-width: 900px) {
            .service-card-block {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .service-card-block:nth-child(even) {
                direction: ltr;
            }
            .process-section {
                padding: 60px 20px;
                margin: 40px 16px;
                border-radius: 24px;
            }
        }
    </style>

<!-- ═══════════════════════ HERO SECTION ═══════════════════════ -->
    <header class="page-hero">
        <div class="badge-pill">
            <i class="fa-solid fa-lightbulb"></i> Strategic Brand Architecture
        </div>
        <h1 class="hero-title">Unshakeable Brand Strategy <span>That Commands Market Leadership</span></h1>
        <p class="hero-desc">Stop competing on price alone. We formulate bulletproof brand strategies, distinctive positioning frameworks, and unforgettable identity blueprints that command premium margins.</p>
        
        <div class="tech-chips">
            <div class="tech-chip"><i class="fa-solid fa-chess-knight"></i> Market Positioning & Moats</div>
            <div class="tech-chip"><i class="fa-solid fa-fingerprint"></i> Archetype & Identity Architecture</div>
            <div class="tech-chip"><i class="fa-solid fa-comment-dots"></i> Tone of Voice & Messaging Frameworks</div>
            <div class="tech-chip"><i class="fa-solid fa-compass"></i> Customer Journey Mapping</div>
            <div class="tech-chip"><i class="fa-solid fa-gem"></i> Premium Pricing Justification</div>
        </div>

        <div class="hero-ctas">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero">Request Proposal <i class="fa-solid fa-arrow-right"></i></a>
            <a href="<?php echo esc_url( home_url( '/digital-marketing-services/' ) ); ?>" class="btn-secondary-hero">Explore All Services</a>
        </div>
    </header>

    <!-- ═══════════════════════ DELIVERABLES / CORE ARCHITECTURE ═══════════════════════ -->
    <main class="content-section">
        <div class="section-header">
            <h2>Brand Positioning Architecture</h2>
            <p>Engineered to transform your business from a fungible commodity into an iconic, defensible category leader.</p>
        </div>

        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">MARKET POSITIONING</span>
                <h3 class="card-title">Uncontested Market Positioning & Strategic Moats</h3>
                <p class="card-desc">Carve out a distinct competitive position that rivals cannot easily duplicate. We identify underserved market niches, formulate your unique value proposition, and build defensible moats.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Competitor Whitespace & Gap Identification</li>
                    <li><i class="fa-solid fa-circle-check"></i> Core Value Proposition & Unique Selling Proposition (USP)</li>
                    <li><i class="fa-solid fa-circle-check"></i> Brand Moat Formulation (Network, Tech, Culture)</li>
                    <li><i class="fa-solid fa-circle-check"></i> Clear Differentiation from Incumbent Competitors</li>
                </ul>
                <div style="margin-top: 20px;">
                    <span class="card-tech-tag">Positioning</span><span class="card-tech-tag">Market Moats</span><span class="card-tech-tag">Differentiation</span><span class="card-tech-tag">Whitespace Analysis</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-chess-king"></i></div>
                <div class="card-visual-stat">3.5x</div>
                <div class="card-visual-sub">Higher Pricing Power</div>
            </div>
        </div>
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">VOICE & MESSAGING</span>
                <h3 class="card-title">Tone of Voice & Strategic Narrative Frameworks</h3>
                <p class="card-desc">Ensure every marketing touchpoint speaks with consistent authority. We create comprehensive messaging matrices, elevator pitches, vocabulary guidelines, and customer storytelling frameworks.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Brand Archetype & Personality Definition</li>
                    <li><i class="fa-solid fa-circle-check"></i> Elevator Pitches for Every Stakeholder Audience</li>
                    <li><i class="fa-solid fa-circle-check"></i> Approved Vocabulary & Forbidden Phrasing Guidelines</li>
                    <li><i class="fa-solid fa-circle-check"></i> Storytelling Frameworks for Ads, Web & Sales Decks</li>
                </ul>
                <div style="margin-top: 20px;">
                    <span class="card-tech-tag">Brand Voice</span><span class="card-tech-tag">Brand Archetype</span><span class="card-tech-tag">Messaging Matrix</span><span class="card-tech-tag">Narrative Architecture</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-bullhorn"></i></div>
                <div class="card-visual-stat">100%</div>
                <div class="card-visual-sub">Omnichannel Messaging Consistency</div>
            </div>
        </div>
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">IDENTITY BLUEPRINT</span>
                <h3 class="card-title">Visual Identity System & Comprehensive Brand Book</h3>
                <p class="card-desc">Translate abstract brand strategy into tangible visual rules. Typography pairings, chromatic color psychology, photographic art direction, and comprehensive brand guideline documentation.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Color Psychology & Accessibility Contrast Palettes</li>
                    <li><i class="fa-solid fa-circle-check"></i> Display & Body Typography Hierarchy</li>
                    <li><i class="fa-solid fa-circle-check"></i> Art Direction Guidelines for Photography & 3D Assets</li>
                    <li><i class="fa-solid fa-circle-check"></i> Exhaustive Brand Bible / Style Guide Documentation</li>
                </ul>
                <div style="margin-top: 20px;">
                    <span class="card-tech-tag">Brand Bible</span><span class="card-tech-tag">Color Psychology</span><span class="card-tech-tag">Typography Hierarchy</span><span class="card-tech-tag">Art Direction</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-swatchbook"></i></div>
                <div class="card-visual-stat">100-Page</div>
                <div class="card-visual-sub">Executive Brand Book Guideline</div>
            </div>
        </div>
    </main>

    <!-- ═══════════════════════ PROCESS SECTION ═══════════════════════ -->
    
    <!-- ═══════════════════════ TEAM SPECIALIST SPOTLIGHT ═══════════════════════ -->
    <section class="expert-spotlight-section">
        <div class="expert-spotlight-card">
            <div class="expert-avatar-wrap">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/kamalesh-j-digital-marketing-expert.webp" alt="Kamalesh J & Saravana Sanjhay M" class="expert-avatar-img">
                <div class="expert-verified-badge"><i class="fa-solid fa-check"></i></div>
            </div>
            <div class="expert-content">
                <div class="expert-domain-pill"><i class="fa-solid fa-lightbulb"></i> Strategic Market Positioning & Intelligence</div>
                <h3 class="expert-name">Mr. Kamalesh J & Saravana Sanjhay M</h3>
                <div class="expert-headline">
                    <i class="fa-solid fa-award" style="color: #ff5722;"></i>
                    <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong>
                </div>
                <p class="expert-bio">
                    Building a sustainable competitive moat demands high-level market positioning paired with deep technical intelligence. At Fusion X, the <strong>best digital marketing expert in Chennai is mr kamalesh j</strong> architects growth and <strong>b2b digital marketing services</strong>, while the <strong>best seo expert our company Saravana Sanjhay.M</strong> (ranked in the <strong>top 10 seo ai experts</strong>) decodes competitor search strategies to <strong>bring your brand in google search</strong>. For businesses looking for high-impact <strong>digital marketing services near me</strong>, our audits guarantee market leadership.
                </p>
                <div class="expert-stats-row">
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">100%</span>
                        <span class="expert-stat-lbl">Data-Backed Market Moats</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">Top 5%</span>
                        <span class="expert-stat-lbl">Industry Positioning</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">0-Waste</span>
                        <span class="expert-stat-lbl">Budget Strategy</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="process-section">
        <div class="process-header">
            <span class="badge-pill" style="background: rgba(255,87,34,0.15); border-color: rgba(255,87,34,0.35);">
                EXECUTION PROTOCOL
            </span>
            <h2>Our 4-Step Production Protocol</h2>
            <p style="color: #94a3b8; font-size: 1.05rem;">Battle-tested workflows engineered for flawless delivery, maximum ROI, and rapid scale.</p>
        </div>
        <div class="process-grid">
            <div class="process-card">
                <div class="step-num">01</div>
                <h3 class="step-title">Market & Stakeholder Discovery</h3>
                <p class="step-desc">We interview founders, audit current perception, and dissect industry dynamics.</p>
            </div>
            <div class="process-card">
                <div class="step-num">02</div>
                <h3 class="step-title">Positioning & Archetype Synthesis</h3>
                <p class="step-desc">We identify your unique category position and define your core brand personality.</p>
            </div>
            <div class="process-card">
                <div class="step-num">03</div>
                <h3 class="step-title">Messaging & Style Guide Creation</h3>
                <p class="step-desc">We codify your tone of voice, elevator pitches, and visual identity guidelines into a Brand Book.</p>
            </div>
            <div class="process-card">
                <div class="step-num">04</div>
                <h3 class="step-title">Organization-Wide Rollout</h3>
                <p class="step-desc">We train internal teams, align marketing assets, and launch your newly positioned brand to the world.</p>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ CTA BANNER ═══════════════════════ -->
    <div class="content-section" style="padding-top: 0; padding-bottom: 0;">
        <div class="cta-banner">
            <h2>Ready to Build an Iconic Brand?</h2>
            <p>Partner with Fusion X to formulate a defensible brand strategy that commands market respect and premium pricing.</p>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero" style="background: #ff5722; color: #fff;">Develop Your Brand Strategy <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>

    <!-- ═══════════════════════ FOOTER ═══════════════════════ -->

<?php
get_footer();
