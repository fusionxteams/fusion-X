<?php
/**
 * Template Name: Google Ads & PMax
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
            <i class="fa-brands fa-google"></i> GOOGLE PERFORMANCE ADVERTISING
        </div>
        <h1 class="hero-title">
            Dominate Search Intent with <span>High-ROAS Google Ads</span> & PMax Scaling
        </h1>
        <p class="hero-desc">
            Capture customers at the exact millisecond of high purchasing intent. We engineer Google Search, Performance Max (PMax), Display Network, and Shopping campaigns powered by advanced negative keyword shielding, smart bidding algorithms, and deep attribution modeling.
        </p>

        <div class="tech-chips">
            <div class="tech-chip"><i class="fa-brands fa-google"></i> Google Premier Standards</div>
            <div class="tech-chip"><i class="fa-solid fa-bolt"></i> Performance Max (PMax) AI</div>
            <div class="tech-chip"><i class="fa-solid fa-chart-line"></i> 5.8x–9.2x Scaled ROAS</div>
            <div class="tech-chip"><i class="fa-solid fa-cart-shopping"></i> Shopping Feeds 99.4%</div>
            <div class="tech-chip"><i class="fa-solid fa-shield-halved"></i> Negative Shield (-35% Waste)</div>
        </div>

        <div class="hero-ctas">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero">Request Free Google Ads Audit <i class="fa-solid fa-arrow-right"></i></a>
            <a href="#services-breakdown" class="btn-secondary-hero">Explore Campaign Models</a>
        </div>
    </header>

    <!-- ═══════════════════════ ARCHITECTURAL CARDS ═══════════════════════ -->
    <main class="content-section" id="services-breakdown">

        <!-- Card 1: Google Search Intent & 10/10 Quality Score -->
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">HIGH-INTENT HARVESTING</span>
                <h2 class="card-title">Precision Google Search Campaigns & High-Intent Keyword Architecture</h2>
                <p class="card-desc">Convert active buyers searching for your exact solutions. We build granular single-theme ad group (STAG) structures, hyper-targeted exact and phrase match funnels, and dynamic keyword insertion (DKI) copy that consistently scores 9/10 and 10/10 Google Quality Scores.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> 10/10 Quality Score framework slashing Cost-Per-Click (CPC) by up to 40%</li>
                    <li><i class="fa-solid fa-circle-check"></i> Commercial intent keyword clustering eliminating low-value curiosity clicks</li>
                    <li><i class="fa-solid fa-circle-check"></i> Responsive Search Ads (RSAs) with 15 pinned and dynamic headline variations</li>
                    <li><i class="fa-solid fa-circle-check"></i> Complete ad asset portfolio: Sitelinks, Callouts, Snippets & Lead forms</li>
                </ul>
                <div>
                    <span class="card-tech-tag">STAG Structure</span><span class="card-tech-tag">10/10 Quality Score</span><span class="card-tech-tag">Responsive Search Ads</span><span class="card-tech-tag">CPC Optimization</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
                <div class="card-visual-stat">10/10</div>
                <div class="card-visual-sub">Target Google Quality Score</div>
            </div>
        </div>

        <!-- Card 2: Performance Max (PMax) AI Machine Learning -->
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">CROSS-CHANNEL ENGINE</span>
                <h2 class="card-title">Performance Max (PMax) Machine Learning & Audience Signals</h2>
                <p class="card-desc">Unleash Google's omnichannel AI across Search, YouTube, Gmail, Discover, Maps, and Display. We engineer high-performing asset groups with first-party audience signals, custom search intent segments, and brand exclusion lists to ensure AI buys real buyers, not junk traffic.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> First-party customer match lists uploaded for deep audience signal conditioning</li>
                    <li><i class="fa-solid fa-circle-check"></i> Brand exclusion lists preventing PMax from cannibalizing organic brand search</li>
                    <li><i class="fa-solid fa-circle-check"></i> Full-funnel creative assets: 4K video clips, lifestyle images, and persuasive copy</li>
                    <li><i class="fa-solid fa-circle-check"></i> Value-Based Bidding (tROAS) maximizing revenue rather than low-value conversions</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Performance Max</span><span class="card-tech-tag">Audience Signals</span><span class="card-tech-tag">Value-Based Bidding</span><span class="card-tech-tag">Omnichannel Scale</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-brain"></i></div>
                <div class="card-visual-stat">+310%</div>
                <div class="card-visual-sub">Omnichannel Conversion Lift</div>
            </div>
        </div>

        <!-- Card 3: Google Shopping & Merchant Center Feeds -->
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">E-COMMERCE REVENUE</span>
                <h2 class="card-title">Google Merchant Center Feeds & High-Margin Shopping Campaigns</h2>
                <p class="card-desc">Transform your product catalog into a 24/7 revenue engine. We optimize product titles with algorithmic search terms, enrich attribute schemas, fix feed suspension errors, and run tiered margin bidding so your highest-margin items get the lion's share of ad spend.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Algorithmic product title & description enrichment for top Shopping ranking</li>
                    <li><i class="fa-solid fa-circle-check"></i> Custom labels & tiered margin bidding (High, Mid, Low margin split)</li>
                    <li><i class="fa-solid fa-circle-check"></i> Automated GMC error resolution, GTIN mapping, and suspension prevention</li>
                    <li><i class="fa-solid fa-circle-check"></i> Dynamic remarketing feeds recapturing cart abandoners with exact SKU displays</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Google Merchant Center</span><span class="card-tech-tag">Product Feeds</span><span class="card-tech-tag">Custom Labels</span><span class="card-tech-tag">Dynamic Remarketing</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                <div class="card-visual-stat">99.4%</div>
                <div class="card-visual-sub">Feed Approval & Health Rate</div>
            </div>
        </div>

        <!-- Card 4: Negative Keyword Shield & Zero Wasted Spend -->
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">BUDGET DEFENSE</span>
                <h2 class="card-title">Automated Negative Keyword Shield & Competitor Conquesting</h2>
                <p class="card-desc">Stop bleeding 20% to 40% of your ad spend on irrelevant search queries. We implement aggressive negative keyword master lists with 10,000+ scrubbed terms, daily search term log auditing, and ethical competitor conquesting campaigns that capture rival traffic profitably.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> 10,000+ pre-vetted universal negative keyword list deployed instantly on day one</li>
                    <li><i class="fa-solid fa-circle-check"></i> Daily search term telemetry weeding out zero-intent and misaligned search queries</li>
                    <li><i class="fa-solid fa-circle-check"></i> Competitor brand conquesting targeting rival search terms with high-converting comparison pages</li>
                    <li><i class="fa-solid fa-circle-check"></i> Location radius exclusion stopping clicks outside your service territory</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Negative Keyword Shield</span><span class="card-tech-tag">Zero Wasted Spend</span><span class="card-tech-tag">Competitor Conquest</span><span class="card-tech-tag">Daily Query Audits</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-shield-halved"></i></div>
                <div class="card-visual-stat">-35%</div>
                <div class="card-visual-sub">Wasted Ad Spend Cut</div>
            </div>
        </div>

    </main>

    <!-- ═══════════════════════ PROCESS SECTION ═══════════════════════ -->
    <section class="process-section fx-has-orange-dots">
        <div class="process-header">
            <span class="badge-pill" style="background: rgba(255,87,34,0.15); border-color: rgba(255,87,34,0.35);">
                EXECUTION PROTOCOL
            </span>
            <h2>Our 4-Step Google Ads Scaling Protocol</h2>
            <p style="color: #94a3b8; font-size: 1.05rem;">From initial conversion tracking telemetry to enterprise ROAS scaling, our paid search flywheel guarantees maximum profitability.</p>
        </div>
        <div class="process-grid">
            <div class="process-card">
                <div class="step-num">01</div>
                <h3 class="step-title">Enhanced Conversion Tracking</h3>
                <p class="step-desc">Full integration of Google Tag Manager, Enhanced Conversions, and GA4 revenue measurement to feed Google's algorithm pristine data.</p>
            </div>
            <div class="process-card">
                <div class="step-num">02</div>
                <h3 class="step-title">STAG Keyword Architecture</h3>
                <p class="step-desc">Building tightly grouped single-theme ad groups with exact commercial intent keywords and 10/10 Quality Score copy.</p>
            </div>
            <div class="process-card">
                <div class="step-num">03</div>
                <h3 class="step-title">PMax & Smart Bidding Calibration</h3>
                <p class="step-desc">Sculpting target CPA and target ROAS smart bidding models with brand exclusions and asset group optimization.</p>
            </div>
            <div class="process-card">
                <div class="step-num">04</div>
                <h3 class="step-title">Daily Negative Scrubbing & Scale</h3>
                <p class="step-desc">Daily search term auditing, query isolation, and budget expansion onto high-margin converting keywords.</p>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ CTA BANNER ═══════════════════════ -->
    <div class="content-section" style="padding-top: 0; padding-bottom: 0;">
        <div class="cta-banner fx-has-orange-dots">
            <h2>Ready to Outrank Competitors with High-ROAS Google Ads?</h2>
            <p>Get a free 25-point Google Ads audit. We'll identify wasted search spend, keyword overlap, Quality Score leaks, and revenue opportunities within 24 hours.</p>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero">Claim Your Free Google Audit <i class="fa-solid fa-arrow-right"></i></a>
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
                <div class="expert-domain-pill"><i class="fa-solid fa-bullseye"></i> Paid Media & Performance Marketing Lead</div>
                <h3 class="expert-name">Mr. Kamalesh J</h3>
                <div class="expert-headline">
                    <i class="fa-solid fa-award" style="color: #ff5722;"></i>
                    <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong>
                </div>
                <p class="expert-bio">
                    Renowned across the industry, the <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong>. Kamalesh engineers enterprise-grade <strong>b2b digital marketing services</strong> and direct-to-consumer high-ROAS funnels. For businesses searching for the highest-performing <strong>digital marketing services near me</strong>, Kamalesh deploys full-funnel algorithmic media buying, server-side Meta CAPI tracking, and Google PMax architectures that deliver industry-leading returns on ad spend.
                </p>
                <div class="expert-stats-row">
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">4.8x</span>
                        <span class="expert-stat-lbl">Peak Campaign ROAS</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">₹23.54</span>
                        <span class="expert-stat-lbl">Lowest Cost Per Lead</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">100%</span>
                        <span class="expert-stat-lbl">Server-Side Tracking</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
