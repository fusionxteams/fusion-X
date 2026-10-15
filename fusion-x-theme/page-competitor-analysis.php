<?php
/**
 * Template Name: Competitor Analysis
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
            <i class="fa-solid fa-magnifying-glass-chart"></i> Competitive Market Intelligence
        </div>
        <h1 class="hero-title">Deep Competitor Intelligence Audits <span>To Outmaneuver & Outrank Rivals</span></h1>
        <p class="hero-desc">Know your competitors' playbooks better than they do. We reverse-engineer your rivals' organic keywords, paid ad funnels, backlink networks, pricing tiers, and vulnerability gaps.</p>
        
        <div class="tech-chips">
            <div class="tech-chip"><i class="fa-solid fa-magnifying-glass"></i> Keyword & Search Gap Intelligence</div>
            <div class="tech-chip"><i class="fa-solid fa-rectangle-ad"></i> Paid Ad Funnel Reverse-Engineering</div>
            <div class="tech-chip"><i class="fa-solid fa-link"></i> Backlink & Authority Takeover</div>
            <div class="tech-chip"><i class="fa-solid fa-shield-virus"></i> Competitor Vulnerability Audit</div>
            <div class="tech-chip"><i class="fa-solid fa-chess"></i> Counter-Positioning Strategy Matrix</div>
        </div>

        <div class="hero-ctas">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero">Request Proposal <i class="fa-solid fa-arrow-right"></i></a>
            <a href="<?php echo esc_url( home_url( '/digital-marketing-services/' ) ); ?>" class="btn-secondary-hero">Explore All Services</a>
        </div>
    </header>

    <!-- ═══════════════════════ DELIVERABLES / CORE ARCHITECTURE ═══════════════════════ -->
    <main class="content-section">
        <div class="section-header">
            <h2>Competitor Reconnaissance Frameworks</h2>
            <p>Eliminate guesswork with forensic intelligence covering your top 5 competitors across search, ads, and offers.</p>
        </div>

        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">SEARCH & KEYWORDS</span>
                <h3 class="card-title">Organic Search & Keyword Gap Intelligence</h3>
                <p class="card-desc">Discover the exact high-intent, high-margin search queries driving sales to your competitors. We reveal keyword ranking gaps, content weaknesses, and SERP takeover opportunities.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Exhaustive Competitor Keyword Ranking Maps</li>
                    <li><i class="fa-solid fa-circle-check"></i> Content Quality & EEAT Vulnerability Breakdown</li>
                    <li><i class="fa-solid fa-circle-check"></i> High-Volume / Low-Difficulty Gap Takeover Targets</li>
                    <li><i class="fa-solid fa-circle-check"></i> Google Maps Local 3-Pack Proximity Audits</li>
                </ul>
                <div style="margin-top: 20px;">
                    <span class="card-tech-tag">Keyword Gap</span><span class="card-tech-tag">SERP Takeover</span><span class="card-tech-tag">Competitor Keywords</span><span class="card-tech-tag">EEAT Audit</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-chart-line"></i></div>
                <div class="card-visual-stat">500+</div>
                <div class="card-visual-sub">Keyword Gaps Uncovered</div>
            </div>
        </div>
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">PAID AD RECONNAISSANCE</span>
                <h3 class="card-title">Paid Ad Creative & Conversion Funnel Deconstruction</h3>
                <p class="card-desc">Inspect your competitors' active Meta and Google ad campaigns. We analyze their highest-spending creative formats, hook angles, landing page copies, and checkout upsell structures.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Active Meta Ad Library Forensic Analysis</li>
                    <li><i class="fa-solid fa-circle-check"></i> Google Search & YouTube Ad Copy Deconstruction</li>
                    <li><i class="fa-solid fa-circle-check"></i> Competitor Landing Page Speed & Conversion Flaws</li>
                    <li><i class="fa-solid fa-circle-check"></i> Offer Structure & Pricing Comparison Matrices</li>
                </ul>
                <div style="margin-top: 20px;">
                    <span class="card-tech-tag">Meta Ad Intel</span><span class="card-tech-tag">Google Ads Recon</span><span class="card-tech-tag">Funnel Hacking</span><span class="card-tech-tag">Offer Audit</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-bullseye"></i></div>
                <div class="card-visual-stat">100%</div>
                <div class="card-visual-sub">Ad Funnel Transparency</div>
            </div>
        </div>
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">STRATEGIC COUNTER-PLAYBOOK</span>
                <h3 class="card-title">Actionable Counter-Positioning Strategy Matrix</h3>
                <p class="card-desc">Intelligence is meaningless without execution. We distill all competitive findings into a prioritized roadmap outlining how to systematically win market share and exploit rival weaknesses.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Step-by-Step Market Takeover Action Plan</li>
                    <li><i class="fa-solid fa-circle-check"></i> Immediate Quick-Win Search & Ad Targets</li>
                    <li><i class="fa-solid fa-circle-check"></i> Counter-Messaging & Objection-Handling Playbook</li>
                    <li><i class="fa-solid fa-circle-check"></i> Long-Term Domain Authority Catch-Up Roadmap</li>
                </ul>
                <div style="margin-top: 20px;">
                    <span class="card-tech-tag">Counter-Strategy</span><span class="card-tech-tag">Action Roadmap</span><span class="card-tech-tag">Quick Wins</span><span class="card-tech-tag">Market Takeover</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-crosshairs"></i></div>
                <div class="card-visual-stat">1-Plan</div>
                <div class="card-visual-sub">Turnkey Market Takeover Roadmap</div>
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
                <h3 class="step-title">Competitor Cohort Selection</h3>
                <p class="step-desc">We define your top 3-5 direct, indirect, and aspirational competitors in your target territory.</p>
            </div>
            <div class="process-card">
                <div class="step-num">02</div>
                <h3 class="step-title">Forensic Data Scraping</h3>
                <p class="step-desc">We analyze search rankings, ad libraries, backlink profiles, technical speed, and customer sentiment.</p>
            </div>
            <div class="process-card">
                <div class="step-num">03</div>
                <h3 class="step-title">Vulnerability Synthesis</h3>
                <p class="step-desc">We uncover where rivals are vulnerable: slow websites, weak ad hooks, neglected keywords, or negative reviews.</p>
            </div>
            <div class="process-card">
                <div class="step-num">04</div>
                <h3 class="step-title">Delivery & Strategy Session</h3>
                <p class="step-desc">We deliver an executive competitor intelligence report and lead an action-planning session.</p>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ CTA BANNER ═══════════════════════ -->
    <div class="content-section" style="padding-top: 0; padding-bottom: 0;">
        <div class="cta-banner">
            <h2>Ready to Outsmart Your Competition?</h2>
            <p>Get a comprehensive competitor analysis report that reveals exactly how to win market share from your rivals.</p>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero" style="background: #ff5722; color: #fff;">Request Competitor Audit <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>

    <!-- ═══════════════════════ FOOTER ═══════════════════════ -->

<?php
get_footer();
