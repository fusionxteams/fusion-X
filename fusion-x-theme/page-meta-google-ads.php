<?php
/**
 * Template Name: Meta & Google Ads
 *
 * @package Fusion_X
 */

get_header();
?>

<style>
        :root {
            --ads-orange: #ff5722;
            --ads-orange-dark: #e64a19;
            --ads-dark: #0f172a;
            --ads-muted: #64748b;
        }

        body {
            font-family: 'Space Grotesk', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #ffffff;
            color: #1e293b;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .page-hero {
            padding: 150px 24px 80px;
            background: radial-gradient(circle at 50% 20%, rgba(255, 87, 34, 0.06) 0%, transparent 60%),
                        #ffffff;
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
            color: var(--ads-orange);
            margin-bottom: 24px;
        }

        .hero-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.5rem, 5.5vw, 4.6rem);
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
            color: var(--ads-muted);
            max-width: 800px;
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
            color: var(--ads-orange);
        }

        .content-section {
            padding: 90px 24px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .service-card-block {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
            padding: 60px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .service-card-block:nth-child(even) {
            direction: rtl;
        }

        .service-card-block:nth-child(even) .card-text-col {
            direction: ltr;
        }

        .service-card-block:nth-child(even) .card-visual-col {
            direction: ltr;
        }

        .card-tag {
            display: inline-block;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--ads-orange);
            margin-bottom: 12px;
        }

        .card-h2 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2rem, 3.5vw, 2.8rem);
            font-weight: 800;
            line-height: 1.15;
            color: #0f172a;
            margin-bottom: 18px;
        }

        .card-p {
            font-size: 1.02rem;
            color: #475569;
            line-height: 1.75;
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
            color: var(--ads-orange);
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
        }

        .card-visual-box {
            background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.05);
            text-align: center;
        }

        .card-visual-icon {
            font-size: 4rem;
            color: var(--ads-orange);
            margin-bottom: 20px;
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
            color: var(--ads-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .cta-banner {
            background: #080808; border: 1px solid rgba(255, 87, 34, 0.3);
            border-radius: 28px;
            padding: 60px 40px;
            text-align: center;
            color: #ffffff;
            margin: 60px auto 0;
            max-width: 1100px;
        }

        .cta-banner h2 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 900;
            margin-bottom: 14px;
        }

        .cta-banner p {
            font-size: 1.1rem;
            color: #cbd5e1;
            max-width: 650px;
            margin: 0 auto 30px;
        }

        .btn-banner {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 36px;
            background: var(--ads-orange);
            color: #ffffff;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 800;
            font-size: 1rem;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 8px 25px rgba(255, 87, 34, 0.4);
            transition: all 0.3s ease;
        }

        .btn-banner:hover {
            background: var(--ads-orange-dark);
            transform: translateY(-2px);
        }

        @media (max-width: 900px) {
            .service-card-block {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 40px 0;
            }
            .service-card-block:nth-child(even) {
                direction: ltr;
            }
        }
    </style>

<!-- ═══════════════════════ HERO ═══════════════════════ -->
    <section class="page-hero">
        <div class="badge-pill">
            <i class="fa-solid fa-bullseye"></i> PERFORMANCE PAID MEDIA
        </div>
        <h1 class="hero-title">
            Stop Burning Ad Spend. Scale with <span>Predatory ROAS</span>
        </h1>
        <p class="hero-desc">
            We manage multi-crore budgets across Meta Ads and Google Performance Max with surgical precision. Lower Customer Acquisition Cost (CAC) and scale revenue reliably.
        </p>

        <div class="tech-chips">
            <span class="tech-chip"><i class="fa-brands fa-meta"></i> Meta Ads Certified</span>
            <span class="tech-chip"><i class="fa-brands fa-google"></i> Google Premier Partner</span>
            <span class="tech-chip"><i class="fa-brands fa-youtube"></i> YouTube Action Ads</span>
            <span class="tech-chip"><i class="fa-solid fa-chart-pie"></i> Attribution Modeling</span>
        </div>
    </section>

    <!-- ═══════════════════════ DETAILED SERVICES ═══════════════════════ -->
    <main class="content-section">
        
        <!-- 1. Meta Ads -->
        <section id="meta-ads" class="service-card-block">
            <div class="card-text-col">
                <span class="card-tag">FACEBOOK & INSTAGRAM SCALE</span>
                <h2 class="card-h2">Meta Ads Management</h2>
                <p class="card-p">
                    Dominate consumer feeds with high-performing Meta advertising campaigns. We build full-funnel account structures (Top of Funnel Prospecting, Middle of Funnel Nurturing, Bottom of Funnel Retargeting) using Advantage+ audience intelligence and high-velocity creative rotation.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-check"></i> Advanced Conversions API (CAPI) server-side tracking setup</li>
                    <li><i class="fa-solid fa-check"></i> Advantage+ Shopping Campaigns (ASC) for hyper-scaling e-commerce</li>
                    <li><i class="fa-solid fa-check"></i> Granular Lookalike (LAL) audiences & high-intent custom retargeting</li>
                    <li><i class="fa-solid fa-check"></i> Daily bid monitoring & automated rule scaling to protect ROAS</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Meta CAPI</span>
                    <span class="card-tech-tag">Advantage+</span>
                    <span class="card-tech-tag">3.5x–6.8x ROAS</span>
                </div>
            </div>
            <div class="card-visual-col">
                <div class="card-visual-box">
                    <div class="card-visual-icon"><i class="fa-brands fa-meta"></i></div>
                    <div class="card-visual-stat">5.4x</div>
                    <div class="card-visual-sub">Average Client Return on Ad Spend</div>
                </div>
            </div>
        </section>

        <!-- 2. Google Ads -->
        <section id="google-ads" class="service-card-block">
            <div class="card-text-col">
                <span class="card-tag">HIGH-INTENT CAPTURE</span>
                <h2 class="card-h2">Google Search & Performance Max (PMax)</h2>
                <p class="card-p">
                    Capture customers at the exact moment they are ready to purchase. We architect high-intent Google Search campaigns, Google Shopping feed optimizations, and AI-powered Performance Max campaigns targeting highest-converting commercial queries.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-check"></i> Exact match search keyword pruning & negative keyword shields</li>
                    <li><i class="fa-solid fa-check"></i> Performance Max (PMax) asset group optimization with search theme signals</li>
                    <li><i class="fa-solid fa-check"></i> Enhanced Google Merchant Center feeds & product title SEO</li>
                    <li><i class="fa-solid fa-check"></i> Target CPA & Target ROAS smart bidding algorithms</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Google Search</span>
                    <span class="card-tech-tag">PMax AI</span>
                    <span class="card-tech-tag">Google Shopping</span>
                </div>
            </div>
            <div class="card-visual-col">
                <div class="card-visual-box">
                    <div class="card-visual-icon"><i class="fa-brands fa-google"></i></div>
                    <div class="card-visual-stat">-38%</div>
                    <div class="card-visual-sub">Reduction in Cost Per Acquisition</div>
                </div>
            </div>
        </section>

        <!-- 3. YouTube Ads -->
        <section id="youtube-ads" class="service-card-block">
            <div class="card-text-col">
                <span class="card-tag">VIDEO DOMINANCE</span>
                <h2 class="card-h2">YouTube Action & In-Stream Ads</h2>
                <p class="card-p">
                    Engage viewers on the world's second largest search engine. We create high-converting skippable and non-skippable YouTube Video Action Campaigns (VAC) that tell compelling brand narratives and drive direct website visits and app downloads.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-check"></i> 5-second hook engineering to ensure only engaged users view</li>
                    <li><i class="fa-solid fa-check"></i> Custom intent audience targeting built from Google search queries</li>
                    <li><i class="fa-solid fa-check"></i> Placement exclusions to eliminate wasted burn on low-quality channels</li>
                    <li><i class="fa-solid fa-check"></i> Interactive end-cards & clickable sitelink extensions</li>
                </ul>
                <div>
                    <span class="card-tech-tag">YouTube VAC</span>
                    <span class="card-tech-tag">In-Stream Video</span>
                    <span class="card-tech-tag">Custom Intent</span>
                </div>
            </div>
            <div class="card-visual-col">
                <div class="card-visual-box">
                    <div class="card-visual-icon"><i class="fa-brands fa-youtube"></i></div>
                    <div class="card-visual-stat">10M+</div>
                    <div class="card-visual-sub">High-Intent Video Impressions Delivered</div>
                </div>
            </div>
        </section>

        <!-- 4. Ad Creative Strategy -->
        <section id="creative-strategy" class="service-card-block">
            <div class="card-text-col">
                <span class="card-tag">CREATIVE AS A TARGETING LEVER</span>
                <h2 class="card-h2">Ad Creative Strategy & A/B Testing</h2>
                <p class="card-p">
                    In modern AI advertising, your creative is your targeting. We continuously concept, design, script, and test new angles (UGC style, problem-solution, unboxing, founder stories, comparison charts) to eliminate creative fatigue and unlock scalable ad spend.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-check"></i> Systematic weekly creative testing sandboxes before scaling budget</li>
                    <li><i class="fa-solid fa-check"></i> Hook rate (&gt;35%) and hold rate (&gt;15%) performance analysis</li>
                    <li><i class="fa-solid fa-check"></i> Static banners, multi-angle carousels, and motion video variations</li>
                    <li><i class="fa-solid fa-check"></i> Competitor creative tear-downs & gap opportunity reports</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Dynamic Creatives</span>
                    <span class="card-tech-tag">A/B Matrix</span>
                    <span class="card-tech-tag">Zero Fatigue</span>
                </div>
            </div>
            <div class="card-visual-col">
                <div class="card-visual-box">
                    <div class="card-visual-icon"><i class="fa-solid fa-flask"></i></div>
                    <div class="card-visual-stat">20+</div>
                    <div class="card-visual-sub">New Creative Variations Tested Monthly</div>
                </div>
            </div>
        </section>

        <!-- CTA BANNER -->
        
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

<div class="cta-banner">
            <h2>Ready to Scale Your Paid Advertising?</h2>
            <p>Get a complimentary audit of your Meta & Google ad accounts. We will pinpoint budget waste, tracking leaks, and high-growth opportunities.</p>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-banner">
                <i class="fa-solid fa-paper-plane"></i> Claim Your Free Ads Audit
            </a>
        </div>
    </main>

    <!-- ═══════════════════════ FOOTER ═══════════════════════ -->

<?php
get_footer();
