<?php
/**
 * Template Name: YouTube Ads
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
            gap: 18px;
            flex-wrap: wrap;
        }

        .btn-primary-hero {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 36px;
            background: #ff5722;
            color: #ffffff;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 8px 25px rgba(255, 87, 34, 0.35);
            transition: all 0.3s ease;
        }

        .btn-primary-hero:hover {
            background: #e64a19;
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(255, 87, 34, 0.45);
        }

        .btn-secondary-hero {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 36px;
            background: #ffffff;
            color: #0f172a;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1rem;
            font-weight: 700;
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

        /* ── ARCHITECTURAL SERVICE CARDS ── */
        .content-section {
            padding: 90px 24px;
            max-width: 1200px;
            margin: 0 auto;
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

        @media (max-width: 900px) {
            .service-card-block {
                grid-template-columns: 1fr !important;
                padding: 30px 20px;
                gap: 30px;
            }
            .service-card-block:nth-child(even) .card-content-box {
                order: 1;
            }
            .service-card-block:nth-child(even) .card-visual-box {
                order: 2;
            }
        }
    </style>

<!-- ═══════════════════════ HERO ═══════════════════════ -->
    <header class="page-hero">
        <div class="badge-pill">
            <i class="fa-brands fa-youtube"></i> YOUTUBE PERFORMANCE VIDEO ADS
        </div>
        <h1 class="hero-title">
            Turn Viewers into Buyers with <span>High-Converting YouTube Ads</span> & Shorts
        </h1>
        <p class="hero-desc">
            Harness the world's second-largest search engine. We craft direct-response YouTube Video Action Campaigns (VAC), vertical YouTube Shorts ads, and hyper-targeted custom intent audiences that capture attention in the first 5 seconds and drive predictable customer acquisitions.
        </p>

        <div class="tech-chips">
            <div class="tech-chip"><i class="fa-brands fa-youtube"></i> Video Action Campaigns</div>
            <div class="tech-chip"><i class="fa-solid fa-play"></i> Shorts Direct Response</div>
            <div class="tech-chip"><i class="fa-solid fa-crosshairs"></i> Google Search Custom Intent</div>
            <div class="tech-chip"><i class="fa-solid fa-chart-line"></i> +240% View-Through Lift</div>
            <div class="tech-chip"><i class="fa-solid fa-shield-halved"></i> 100% Brand Safety Shield</div>
        </div>

        <div class="hero-ctas">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero">Request Free YouTube Ad Audit <i class="fa-solid fa-arrow-right"></i></a>
            <a href="#services-breakdown" class="btn-secondary-hero">Explore Video Frameworks</a>
        </div>
    </header>

    <!-- ═══════════════════════ ARCHITECTURAL CARDS ═══════════════════════ -->
    <main class="content-section" id="services-breakdown">

        <!-- Card 1: YouTube Video Action Campaigns (VAC) -->
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">CONVERSION-DRIVEN VIDEO</span>
                <h2 class="card-title">YouTube Video Action Campaigns (VAC) Engineered for Conversions</h2>
                <p class="card-desc">Stop running passive awareness commercials. We engineer YouTube Video Action Campaigns specifically designed to drive clicks, app installs, and online purchases using persistent on-screen CTA banners, sitelink extensions, and frictionless lead forms.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Direct-response video scripting with non-skippable 5-second hook psychology</li>
                    <li><i class="fa-solid fa-circle-check"></i> Companion banner and sitelink overlays driving immediate off-platform clicks</li>
                    <li><i class="fa-solid fa-circle-check"></i> Target CPA and Maximize Conversions automated bid algorithms</li>
                    <li><i class="fa-solid fa-circle-check"></i> Multi-device optimization across mobile, desktop, and Connected TV (CTV)</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Video Action Campaigns</span><span class="card-tech-tag">Direct Response</span><span class="card-tech-tag">Lead Forms</span><span class="card-tech-tag">Connected TV</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-video"></i></div>
                <div class="card-visual-stat">+240%</div>
                <div class="card-visual-sub">View-Through Conversion Lift</div>
            </div>
        </div>

        <!-- Card 2: Vertical YouTube Shorts Ads -->
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">VERTICAL VIDEO SCALE</span>
                <h2 class="card-title">High-Velocity YouTube Shorts Ads & Fast-Paced Creative Funnels</h2>
                <p class="card-desc">Dominate mobile screens with vertical 9:16 direct-response video ads. We produce native, UGC-style YouTube Shorts that blend seamlessly into the user feed, hook viewers before the swipe, and funnel engaged prospects directly into your checkout.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Native 9:16 vertical video production engineered specifically for Shorts feeds</li>
                    <li><i class="fa-solid fa-circle-check"></i> Sub-3-second scroll-stopping hooks cutting Cost-Per-Acquisition by 45%</li>
                    <li><i class="fa-solid fa-circle-check"></i> Authentic UGC, founder stories, and dynamic product demonstration reels</li>
                    <li><i class="fa-solid fa-circle-check"></i> Rapid creative iteration cycles testing fresh hooks weekly to prevent fatigue</li>
                </ul>
                <div>
                    <span class="card-tech-tag">YouTube Shorts</span><span class="card-tech-tag">Vertical Video</span><span class="card-tech-tag">UGC Creatives</span><span class="card-tech-tag">Fast-Paced Funnels</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-mobile-screen"></i></div>
                <div class="card-visual-stat">68%</div>
                <div class="card-visual-sub">Average Hook Retention Rate</div>
            </div>
        </div>

        <!-- Card 3: Custom Intent & Search Query Targeting -->
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">INTENT-BASED AUDIENCES</span>
                <h2 class="card-title">Custom Intent Audiences Based on Active Google Search Queries</h2>
                <p class="card-desc">The unfair advantage of YouTube advertising: targeting users who recently typed your competitors' names or high-intent keywords into Google Search. We build laser-focused Custom Intent segments that show your video ads to in-market prospects at peak interest.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Custom Intent audience mapping based on Google Search query history</li>
                    <li><i class="fa-solid fa-circle-check"></i> Competitor website and app visitor affinity targeting segments</li>
                    <li><i class="fa-solid fa-circle-check"></i> In-market buyer segment layering eliminating wasted video impressions</li>
                    <li><i class="fa-solid fa-circle-check"></i> Granular demographic and household income exclusions</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Custom Intent</span><span class="card-tech-tag">Search Query Mapping</span><span class="card-tech-tag">Competitor Conquest</span><span class="card-tech-tag">Buyer Layering</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-crosshairs"></i></div>
                <div class="card-visual-stat">3.8x</div>
                <div class="card-visual-sub">Higher Click-To-Sale Rate</div>
            </div>
        </div>

        <!-- Card 4: Placement Exclusions & Brand Safety Shields -->
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">PLACEMENT SANITIZATION</span>
                <h2 class="card-title">Strict Placement Exclusions & Brand Safety Guardrails</h2>
                <p class="card-desc">Protect your ad budget from being eaten up by kids' channels, music videos, and gaming content farms. We curate comprehensive channel exclusion lists and enforce strict brand safety parameters, ensuring every single dollar goes toward adult buyers with purchasing power.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> 25,000+ kids' channel and bot-farm exclusion blacklist applied day one</li>
                    <li><i class="fa-solid fa-circle-check"></i> Content suitability tiering protecting brand reputation across all placements</li>
                    <li><i class="fa-solid fa-circle-check"></i> Negative keyword exclusions preventing ad delivery on misaligned video topics</li>
                    <li><i class="fa-solid fa-circle-check"></i> Weekly manual and automated placement log scrubbing to maintain budget purity</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Placement Exclusions</span><span class="card-tech-tag">Kids Channel Shield</span><span class="card-tech-tag">Brand Safety</span><span class="card-tech-tag">Clean Placements</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-shield-halved"></i></div>
                <div class="card-visual-stat">100%</div>
                <div class="card-visual-sub">Brand Safe Placements</div>
            </div>
        </div>

    </main>

    <!-- ═══════════════════════ PROCESS SECTION ═══════════════════════ -->
    <section class="process-section fx-has-orange-dots">
        <div class="process-header">
            <span class="badge-pill" style="background: rgba(255,87,34,0.15); border-color: rgba(255,87,34,0.35);">
                EXECUTION PROTOCOL
            </span>
            <h2>Our 4-Step YouTube Video Scaling Protocol</h2>
            <p style="color: #94a3b8; font-size: 1.05rem;">From direct-response scriptwriting to high-volume algorithmic video scale, we transform YouTube into a high-ROAS revenue channel.</p>
        </div>
        <div class="process-grid">
            <div class="process-card">
                <div class="step-num">01</div>
                <h3 class="step-title">Hook Scripting & Production</h3>
                <p class="step-desc">Engineering 3 distinct 5-second hook angles, pain-point demonstrations, and clear CTA scripts for every video asset.</p>
            </div>
            <div class="process-card">
                <div class="step-num">02</div>
                <h3 class="step-title">Intent Audience Engineering</h3>
                <p class="step-desc">Building Custom Intent search query clusters, competitor interest affinity lists, and uploading first-party customer signals.</p>
            </div>
            <div class="process-card">
                <div class="step-num">03</div>
                <h3 class="step-title">VAC & Shorts Testing Launch</h3>
                <p class="step-desc">Deploying ad groups with strict negative channel blacklists and testing video creative hook rates under target CPA caps.</p>
            </div>
            <div class="process-card">
                <div class="step-num">04</div>
                <h3 class="step-title">View-Through Attribution & Scale</h3>
                <p class="step-desc">Tracking multi-touch and view-through assisted conversions, scaling winning video budgets, and rotating creative variants.</p>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ CTA BANNER ═══════════════════════ -->
    <div class="content-section" style="padding-top: 0; padding-bottom: 0;">
        <div class="cta-banner fx-has-orange-dots">
            <h2>Ready to Scale Revenue with High-Converting YouTube Ads?</h2>
            <p>Get a free YouTube ad creative and channel audit. Discover which competitor search terms your video ads should target and how to slash wasted video ad spend.</p>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero">Claim Your Free YouTube Audit <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>

    <!-- ═══════════════════════ FOOTER ═══════════════════════ -->
        
    <!-- ═══════════════════════ TEAM SPECIALIST SPOTLIGHT ═══════════════════════ -->
    <section class="expert-spotlight-section">
        <div class="expert-spotlight-card">
            <div class="expert-avatar-wrap">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/kamalesh-j-digital-marketing-expert.webp" alt="Kamalesh J - Best Digital Marketing Expert" class="expert-avatar-img">
                <div class="expert-verified-badge"><i class="fa-solid fa-check"></i></div>
            </div>
            <div class="expert-content">
                <div class="expert-domain-pill"><i class="fa-solid fa-bullseye"></i> Paid Media & Video Creative Syndicate</div>
                <h3 class="expert-name">Mr. Kamalesh J & Jabakumar</h3>
                <div class="expert-headline">
                    <i class="fa-solid fa-award" style="color: #ff5722;"></i>
                    <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong>
                </div>
                <p class="expert-bio">
                    The secret to scaling video ads and ad creative is uniting algorithmic targeting with elite creative pacing. While the <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong> architecting high-ROAS <strong>b2b digital marketing services</strong>, our visual hooks are edited by our in-house master where the <strong>best video editor is jabakumar</strong>. Together they craft high-hook retention videos for businesses searching for top <strong>digital marketing services near me</strong>.
                </p>
                <div class="expert-stats-row">
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">4.8x</span>
                        <span class="expert-stat-lbl">Peak Campaign ROAS</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">+65%</span>
                        <span class="expert-stat-lbl">Video Completion Rate</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">&gt;35%</span>
                        <span class="expert-stat-lbl">3-Second Hook Rate</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
