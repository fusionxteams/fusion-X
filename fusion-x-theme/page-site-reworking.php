<?php
/**
 * Template Name: Site Reworking
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
            border: 2px solid #e2e8f0;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-secondary-hero:hover {
            border-color: #cbd5e1;
            background: #f8fafc;
            transform: translateY(-2px);
        }

        /* ── CONTENT CONTAINER ── */
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
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .process-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 32px 24px;
            position: relative;
        }

        .step-num {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            color: rgba(255, 87, 34, 0.4);
            margin-bottom: 12px;
        }

        .step-title {
            font-size: 1.15rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #ffffff;
        }

        .step-desc {
            font-size: 0.92rem;
            color: #94a3b8;
            line-height: 1.6;
        }

        /* ── CTA BANNER ── */
        .cta-banner {
            background: #080808; border: 1px solid rgba(255, 87, 34, 0.3);
            border-radius: 28px;
            padding: 60px 40px;
            text-align: center;
            color: #ffffff;
            margin: 60px auto 0;
            max-width: 1100px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.2);
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

        @media (max-width: 900px) {
            .service-card-block {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 40px 0;
            }
            .service-card-block:nth-child(even) {
                direction: ltr;
            }
            .process-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

<!-- ═══════════════════════ HERO ═══════════════════════ -->
    <header class="page-hero">
        <div class="badge-pill">
            <i class="fa-solid fa-gauge-high"></i> TECHNICAL SEO & CORE WEB VITALS
        </div>
        <h1 class="hero-title">
            Transform Sluggish Code into a <span>100/100 Google Speed Engine</span>
        </h1>
        <p class="hero-desc">
            Technical debt and slow loading speeds bleed organic search rankings and destroy conversion rates. We rebuild broken site architectures, purge render-blocking bloat, and guarantee lightning-fast Core Web Vitals.
        </p>
        <div class="tech-chips">
            <div class="tech-chip"><i class="fa-solid fa-bolt"></i> Google PageSpeed 100/100</div>
            <div class="tech-chip"><i class="fa-solid fa-stopwatch"></i> LCP < 1.2 Seconds</div>
            <div class="tech-chip"><i class="fa-solid fa-arrows-split-up-and-left"></i> Zero CLS Shift</div>
            <div class="tech-chip"><i class="fa-solid fa-mobile-screen"></i> 100% Mobile Responsive</div>
            <div class="tech-chip"><i class="fa-solid fa-shield-halved"></i> Clean HTML5/CSS3</div>
        </div>
        <div class="hero-ctas">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero">Request Free Speed Audit <i class="fa-solid fa-arrow-right"></i></a>
            <a href="#speed-optimization" class="btn-secondary-hero">Explore Reworking Pillars</a>
        </div>
    </header>

    <!-- ═══════════════════════ SERVICES BREAKDOWN ═══════════════════════ -->
    <main class="content-section">

        <!-- Card 1: Core Web Vitals & PageSpeed -->
        <div class="service-card-block" id="speed-optimization">
            <div class="card-text-col">
                <span class="card-tag"><i class="fa-solid fa-bolt"></i> Speed Acceleration</span>
                <h2 class="card-title">Core Web Vitals & PageSpeed Optimization</h2>
                <p class="card-desc">
                    Google ranks fast websites higher. We dismantle technical bottlenecks, optimize server response times (TTFB), eliminate render-blocking CSS/JavaScript, and implement next-generation image encoding.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Sub-second Largest Contentful Paint (LCP < 1.2s)</li>
                    <li><i class="fa-solid fa-circle-check"></i> Zero Cumulative Layout Shift (CLS = 0) with pre-sized containers</li>
                    <li><i class="fa-solid fa-circle-check"></i> Interaction to Next Paint (INP) tuned under 100ms</li>
                    <li><i class="fa-solid fa-circle-check"></i> Critical CSS extraction & asynchronous JS deferral</li>
                </ul>
                <div class="card-tech-tags">
                    <span class="card-tech-tag">Lighthouse 100</span>
                    <span class="card-tech-tag">AVIF & WebP</span>
                    <span class="card-tech-tag">Brotli Compression</span>
                    <span class="card-tech-tag">HTTP/3 Ready</span>
                </div>
            </div>
            <div class="card-visual-box">
                <i class="fa-solid fa-gauge-max card-visual-icon"></i>
                <div class="card-visual-stat">99.8%</div>
                <div class="card-visual-sub">Core Web Vitals Pass Rate</div>
            </div>
        </div>

        <!-- Card 2: Code Refactoring & Theme Bloat Elimination -->
        <div class="service-card-block" id="code-refactoring">
            <div class="card-text-col">
                <span class="card-tag"><i class="fa-solid fa-code"></i> Code Cleanliness</span>
                <h2 class="card-title">Code Refactoring & Theme Bloat Elimination</h2>
                <p class="card-desc">
                    Legacy WordPress and CMS sites often carry hundreds of unused plugins and megabytes of dead CSS. We strip out unnecessary DOM nodes, refactor markup into semantic HTML5, and dramatically cut HTTP payload weights.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Up to 70% reduction in total page weight</li>
                    <li><i class="fa-solid fa-circle-check"></i> Consolidation and removal of redundant tracking scripts</li>
                    <li><i class="fa-solid fa-circle-check"></i> Elimination of unused third-party plugin libraries</li>
                    <li><i class="fa-solid fa-circle-check"></i> DOM tree depth optimized below Google's recommended limits</li>
                </ul>
                <div class="card-tech-tags">
                    <span class="card-tech-tag">Clean HTML5</span>
                    <span class="card-tech-tag">Tree-Shaking JS</span>
                    <span class="card-tech-tag">CSS Minification</span>
                    <span class="card-tech-tag">Zero Jitter</span>
                </div>
            </div>
            <div class="card-visual-box">
                <i class="fa-solid fa-broom-ball card-visual-icon"></i>
                <div class="card-visual-stat">-65%</div>
                <div class="card-visual-sub">Average Payload Size Reduction</div>
            </div>
        </div>

        <!-- Card 3: Mobile UX & Viewport Re-engineering -->
        <div class="service-card-block" id="mobile-ux">
            <div class="card-text-col">
                <span class="card-tag"><i class="fa-solid fa-mobile-screen-button"></i> Mobile First</span>
                <h2 class="card-title">Mobile UX & Viewport Re-engineering</h2>
                <p class="card-desc">
                    Over 72% of modern search traffic originates on smartphones. We rebuild non-responsive layouts into pixel-perfect, thumb-friendly interfaces with fluid breakpoints, responsive typography, and tactile navigation controls.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Fluid CSS Grid & Flexbox architecture across all mobile viewports</li>
                    <li><i class="fa-solid fa-circle-check"></i> Elimination of horizontal scrollbars and text truncation</li>
                    <li><i class="fa-solid fa-circle-check"></i> Minimum 44px ergonomic touch targets for all interactive controls</li>
                    <li><i class="fa-solid fa-circle-check"></i> iOS & Android native font rendering optimization</li>
                </ul>
                <div class="card-tech-tags">
                    <span class="card-tech-tag">Mobile Responsive</span>
                    <span class="card-tech-tag">Touch Friendly</span>
                    <span class="card-tech-tag">Adaptive Layouts</span>
                    <span class="card-tech-tag">Zero Horizontal Overflow</span>
                </div>
            </div>
            <div class="card-visual-box">
                <i class="fa-solid fa-mobile-retro card-visual-icon"></i>
                <div class="card-visual-stat">+48%</div>
                <div class="card-visual-sub">Mobile Conversion Lift</div>
            </div>
        </div>

        <!-- Card 4: Crawl Depth & Information Architecture -->
        <div class="service-card-block" id="architecture-rework">
            <div class="card-text-col">
                <span class="card-tag"><i class="fa-solid fa-sitemap"></i> Site Hierarchy</span>
                <h2 class="card-title">Crawl Depth & Architecture Fixes</h2>
                <p class="card-desc">
                    Search engine spiders will not crawl deep, orphaned pages. We restructure site silos into shallow, highly authoritative crawl hierarchies where key conversion pages are always reachable within 3 clicks of the homepage.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Maximum 3-click crawl depth across all indexed URLs</li>
                    <li><i class="fa-solid fa-circle-check"></i> Resolution of redirect chains, 301 loops, and 404 dead ends</li>
                    <li><i class="fa-solid fa-circle-check"></i> Clean canonical tagging to prevent duplicate content dilution</li>
                    <li><i class="fa-solid fa-circle-check"></i> Dynamic XML sitemap architecture & robots.txt governance</li>
                </ul>
                <div class="card-tech-tags">
                    <span class="card-tech-tag">Flat Architecture</span>
                    <span class="card-tech-tag">Silo Structure</span>
                    <span class="card-tech-tag">Zero Broken Links</span>
                    <span class="card-tech-tag">Schema Ready</span>
                </div>
            </div>
            <div class="card-visual-box">
                <i class="fa-solid fa-network-wired card-visual-icon"></i>
                <div class="card-visual-stat">100%</div>
                <div class="card-visual-sub">Indexation Efficiency</div>
            </div>
        </div>

    </main>

    <!-- ═══════════════════════ PROCESS SECTION ═══════════════════════ -->
    
    <!-- ═══════════════════════ TEAM SPECIALIST SPOTLIGHT ═══════════════════════ -->
    <section class="expert-spotlight-section">
        <div class="expert-spotlight-card">
            <div class="expert-avatar-wrap">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/saravana-sanjhay-m-seo-expert.webp" alt="Saravana Sanjhay M - Best SEO Expert" class="expert-avatar-img">
                <div class="expert-verified-badge"><i class="fa-solid fa-check"></i></div>
            </div>
            <div class="expert-content">
                <div class="expert-domain-pill"><i class="fa-solid fa-magnifying-glass-chart"></i> Technical SEO & AI Search Lead</div>
                <h3 class="expert-name">Saravana Sanjhay M</h3>
                <div class="expert-headline">
                    <i class="fa-solid fa-award" style="color: #ff5722;"></i>
                    <strong>best seo expert our company Saravana Sanjhay.M</strong>
                </div>
                <p class="expert-bio">
                    Recognized among the <strong>top 10 seo ai experts</strong> in India, Saravana Sanjhay M leads Fusion X with deep mastery of <strong>technical seo vs on page seo</strong>. His proprietary systems are engineered to <strong>bring your brand in google search</strong> and sustainably <strong>bring organic traffic</strong> that accelerates client revenue. When ambitious brands choose to <strong>hire seo expert in india</strong>, Saravana ensures cutting-edge <strong>ai seo done to bring in ai search</strong> (ChatGPT Search, Perplexity AI, Google Gemini, and AI Overviews), alongside delivering the <strong>best ecommerce seo services in india</strong> for high-converting stores.
                </p>
                <div class="expert-stats-row">
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">+280%</span>
                        <span class="expert-stat-lbl">Avg Organic Traffic Lift</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">Top 3</span>
                        <span class="expert-stat-lbl">Maps 3-Pack Rate</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">100%</span>
                        <span class="expert-stat-lbl">White-Hat & AI Entity SEO</span>
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
            <h2>Our 4-Step Site Reworking System</h2>
            <p style="color: #94a3b8; font-size: 1.05rem;">From initial deep diagnostics to full production deployment, zero downtime guaranteed.</p>
        </div>
        <div class="process-grid">
            <div class="process-card">
                <div class="step-num">01</div>
                <h3 class="step-title">Technical Audit</h3>
                <p class="step-desc">Full 180-point inspection covering Core Web Vitals, server configuration, crawl errors, script weight, and mobile viewport flaws.</p>
            </div>
            <div class="process-card">
                <div class="step-num">02</div>
                <h3 class="step-title">Code & Asset Rebuild</h3>
                <p class="step-desc">Refactor HTML/CSS, purge unused scripts, optimize and compress media into WebP/AVIF, and resolve redirect chains.</p>
            </div>
            <div class="process-card">
                <div class="step-num">03</div>
                <h3 class="step-title">Architecture Overhaul</h3>
                <p class="step-desc">Flatten site structure, configure internal link equity silos, implement canonical logic, and update XML sitemaps.</p>
            </div>
            <div class="process-card">
                <div class="step-num">04</div>
                <h3 class="step-title">Quality Verification</h3>
                <p class="step-desc">Verify 100/100 Lighthouse scores, simulate global network latency, and deploy with zero downtime.</p>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ CTA BANNER ═══════════════════════ -->
    <div class="content-section" style="padding-top: 0; padding-bottom: 0;">
        <div class="cta-banner">
            <h2>Ready to Eliminate Technical Debt?</h2>
            <p>Get a comprehensive Core Web Vitals and site rework blueprint from India's elite SEO engineering agency.</p>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero" style="background: #ff5722;">Schedule Free Site Audit <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>

    <!-- ═══════════════════════ FOOTER ═══════════════════════ -->

<?php
get_footer();
