<?php
/**
 * Template Name: Website Development
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
            color: var(--dev-orange);
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
            color: var(--dev-muted);
            max-width: 800px;
            margin: 0 auto 40px;
        }

        /* ── TECH CHIPS ROW ── */
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

        /* ── SERVICES DETAIL CONTAINER ── */
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
            color: var(--dev-orange);
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
            font-size: 4rem;
            color: var(--dev-orange);
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
            color: var(--dev-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
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

        .btn-banner {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 36px;
            background: var(--dev-orange);
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
            background: var(--dev-orange-dark);
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
            .card-visual-box {
                padding: 30px 20px;
            }
        }
    </style>

<!-- ═══════════════════════ HERO ═══════════════════════ -->
    <section class="page-hero">
        <div class="badge-pill">
            <i class="fa-solid fa-layer-group"></i> WEBSITE ENGINEERING & DESIGN
        </div>
        <h1 class="hero-title">
            High-Performance Websites Engineered for <span>Maximum Conversions</span>
        </h1>
        <p class="hero-desc">
            From bespoke WordPress portfolios and high-velocity Shopify stores to lightning-fast landing pages and luxury digital invitations. We build digital real estate that captivates and converts.
        </p>

        <div class="tech-chips">
            <span class="tech-chip"><i class="fa-brands fa-wordpress"></i> WordPress Specialist</span>
            <span class="tech-chip"><i class="fa-brands fa-shopify"></i> Certified Shopify Partner</span>
            <span class="tech-chip"><i class="fa-solid fa-bolt"></i> 99+ PageSpeed Score</span>
            <span class="tech-chip"><i class="fa-solid fa-mobile-screen"></i> 100% Mobile Responsive</span>
        </div>
    </section>

    <!-- ═══════════════════════ DETAILED SERVICES LIST ═══════════════════════ -->
    <main class="content-section">
        
        <!-- 1. Portfolio Website -->
        <section id="portfolio-website" class="service-card-block">
            <div class="card-text-col">
                <span class="card-tag">CREATIVE SHOWCASE</span>
                <h2 class="card-h2">Portfolio Website with Custom Pages</h2>
                <p class="card-p">
                    Built natively on <strong>WordPress</strong> for creators, architects, photographers, consultants, and executive leaders. We craft personalized narrative layouts, interactive case study showcases, smooth animations, and high-resolution galleries that elevate your personal authority.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-check"></i> Bespoke multi-page layout with custom project filtering</li>
                    <li><i class="fa-solid fa-check"></i> WordPress CMS with effortless self-editing client backend</li>
                    <li><i class="fa-solid fa-check"></i> Integrated personal blog, testimonial sliders & lead inquiries</li>
                    <li><i class="fa-solid fa-check"></i> Fast CDN media caching for crisp retina image loading</li>
                </ul>
                <div>
                    <span class="card-tech-tag">WordPress Custom</span>
                    <span class="card-tech-tag">GSAP Animations</span>
                    <span class="card-tech-tag">SEO Ready</span>
                </div>
            </div>
            <div class="card-visual-col">
                <div class="card-visual-box">
                    <div class="card-visual-icon"><i class="fa-solid fa-user-astronaut"></i></div>
                    <div class="card-visual-stat">100%</div>
                    <div class="card-visual-sub">Custom Coded Authority Showcase</div>
                </div>
            </div>
        </section>

        <!-- 2. Basic Website -->
        <section id="basic-website" class="service-card-block">
            <div class="card-text-col">
                <span class="card-tag">BUSINESS ESSENTIAL</span>
                <h2 class="card-h2">Basic Business Website</h2>
                <p class="card-p">
                    The ideal online storefront for local enterprises, clinics, manufacturers, and professional service firms. Powered by <strong>WordPress</strong>, our basic business websites give you an authoritative 5–8 page digital headquarters with instant lead generation.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-check"></i> Home, About Us, Services, FAQ, and Contact with Google Maps</li>
                    <li><i class="fa-solid fa-check"></i> WhatsApp Click-to-Chat & instant click-to-call integration</li>
                    <li><i class="fa-solid fa-check"></i> On-page schema markup for local Google ranking</li>
                    <li><i class="fa-solid fa-check"></i> SSL security, anti-spam contact forms & daily backups</li>
                </ul>
                <div>
                    <span class="card-tech-tag">WordPress Core</span>
                    <span class="card-tech-tag">Fast Turnaround</span>
                    <span class="card-tech-tag">Mobile First</span>
                </div>
            </div>
            <div class="card-visual-col">
                <div class="card-visual-box">
                    <div class="card-visual-icon"><i class="fa-solid fa-building-circle-check"></i></div>
                    <div class="card-visual-stat">5–7 Days</div>
                    <div class="card-visual-sub">Rapid Deployment to Live Domain</div>
                </div>
            </div>
        </section>

        <!-- 3. E-Commerce Website -->
        <section id="ecommerce-website" class="service-card-block">
            <div class="card-text-col">
                <span class="card-tag">REVENUE ENGINE</span>
                <h2 class="card-h2">E-Commerce Website (Shopify & WordPress)</h2>
                <p class="card-p">
                    Scalable online stores engineered to maximize Average Order Value (AOV) and reduce cart abandonment. We develop enterprise stores using <strong>Shopify</strong> for seamless app ecosystems, as well as <strong>WordPress WooCommerce</strong> for ultimate design flexibility and zero monthly platform fees.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-check"></i> Shopify & WooCommerce payment integrations (Razorpay, Stripe, Cashfree, UPI)</li>
                    <li><i class="fa-solid fa-check"></i> High-converting product pages with variant swatches & video galleries</li>
                    <li><i class="fa-solid fa-check"></i> Automated abandoned cart email sequences & WhatsApp notifications</li>
                    <li><i class="fa-solid fa-check"></i> Inventory management, courier tracking API & multi-currency support</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Shopify Liquid</span>
                    <span class="card-tech-tag">WordPress WooCommerce</span>
                    <span class="card-tech-tag">Razorpay / UPI</span>
                </div>
            </div>
            <div class="card-visual-col">
                <div class="card-visual-box">
                    <div class="card-visual-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                    <div class="card-visual-stat">3.8x</div>
                    <div class="card-visual-sub">Higher Mobile Checkout Completion</div>
                </div>
            </div>
        </section>

        <!-- 4. Landing Page -->
        <section id="landing-page" class="service-card-block">
            <div class="card-text-col">
                <span class="card-tag">PAID ADS CONVERSION</span>
                <h2 class="card-h2">High-Converting Landing Pages</h2>
                <p class="card-p">
                    Built specifically to convert traffic from Meta Ads, Google PPC, and LinkedIn campaigns into paying customers. Every headline, visual hierarchy, CTA placement, and trust badge is calibrated using direct-response psychological principles.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-check"></i> Sub-second loading speed with zero layout shifts (CLS &lt; 0.05)</li>
                    <li><i class="fa-solid fa-check"></i> Heatmap analytics & Meta Pixel / Google GTM conversion tracking</li>
                    <li><i class="fa-solid fa-check"></i> Dynamic text replacement for targeted Google keyword match</li>
                    <li><i class="fa-solid fa-check"></i> Multi-step interactive lead quiz forms with SMS/WhatsApp alerts</li>
                </ul>
                <div>
                    <span class="card-tech-tag">PPC Dedicated</span>
                    <span class="card-tech-tag">High ROAS</span>
                    <span class="card-tech-tag">A/B Ready</span>
                </div>
            </div>
            <div class="card-visual-col">
                <div class="card-visual-box">
                    <div class="card-visual-icon"><i class="fa-solid fa-bullseye"></i></div>
                    <div class="card-visual-stat">+42%</div>
                    <div class="card-visual-sub">Average Conversion Rate Uplift</div>
                </div>
            </div>
        </section>

        <!-- 5. Wedding Digital Invitation -->
        <section id="wedding-invitation" class="service-card-block">
            <div class="card-text-col">
                <span class="card-tag">BESPOKE CELEBRATION</span>
                <h2 class="card-h2">Wedding Digital Invitation & E-Invites</h2>
                <p class="card-p">
                    Replace traditional paper cards with a breathtaking, interactive digital wedding invitation website. Featuring personalized animated timelines, Google Maps venue navigation, digital RSVP tracking, photo galleries, and music playback that enchants your guests on every smartphone.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-check"></i> Interactive music player, animated couple story & event schedule</li>
                    <li><i class="fa-solid fa-check"></i> 1-click Google Maps location directions for wedding & reception venues</li>
                    <li><i class="fa-solid fa-check"></i> Real-time digital RSVP form syncing with Google Sheets</li>
                    <li><i class="fa-solid fa-check"></i> Custom couple domain (e.g. rahulwedsananya.com) with WhatsApp share card</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Bespoke Design</span>
                    <span class="card-tech-tag">Mobile Responsive</span>
                    <span class="card-tech-tag">WhatsApp Share Ready</span>
                </div>
            </div>
            <div class="card-visual-col">
                <div class="card-visual-box">
                    <div class="card-visual-icon"><i class="fa-solid fa-heart"></i></div>
                    <div class="card-visual-stat">100%</div>
                    <div class="card-visual-sub">Bespoke Interactive Love Story</div>
                </div>
            </div>
        </section>

        <!-- CTA BANNER -->
        <div class="cta-banner">
            <h2>Ready to Build Your New Website?</h2>
            <p>Tell us your vision, brand objectives, or reference links. Our senior web engineers will provide an exact plan, timeline, and quote within 24 hours.</p>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-banner">
                <i class="fa-solid fa-paper-plane"></i> Get Your Free Proposal
            </a>
        </div>
    </main>

    <!-- ═══════════════════════ FOOTER ═══════════════════════ -->
        
    <!-- ═══════════════════════ TEAM SPECIALIST SPOTLIGHT ═══════════════════════ -->
    <section class="expert-spotlight-section">
        <div class="expert-spotlight-card">
            <div class="expert-avatar-wrap">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/kannan-s-web-developer.webp" alt="Kannan S - Best Web Developer" class="expert-avatar-img">
                <div class="expert-verified-badge"><i class="fa-solid fa-check"></i></div>
            </div>
            <div class="expert-content">
                <div class="expert-domain-pill"><i class="fa-solid fa-code"></i> Lead Web Architect & Engineer</div>
                <h3 class="expert-name">Kannan S</h3>
                <div class="expert-headline">
                    <i class="fa-solid fa-award" style="color: #ff5722;"></i>
                    <strong><strong>best webdeveloper for you buisneas Kannan S</strong></strong>
                </div>
                <p class="expert-bio">
                    As Chief Web Architect, Kannan S ensures Fusion X remains the <strong><strong>best web development company in india</strong></strong>. Bypassing slow, bloated templates, Kannan writes bespoke, lightweight code tailored directly to your revenue goals. Whether engineering high-converting landing pages, custom Shopify flagships, or interactive portfolio hubs, every deployment is engineered for <strong>sub second Core Web Vitals</strong>, 95+ PageSpeed scores, and frictionless user journeys.
                </p>
                <div class="expert-stats-row">
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">98/100</span>
                        <span class="expert-stat-lbl">PageSpeed Mobile</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">&lt; 0.8s</span>
                        <span class="expert-stat-lbl">Core Web Vitals</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">100%</span>
                        <span class="expert-stat-lbl">Bespoke Clean Code</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
