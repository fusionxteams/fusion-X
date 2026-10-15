<?php
/**
 * Template Name: Marketing Services
 *
 * @package Fusion_X
 */

get_header();
?>

<style>
        :root {
            --mkt-orange: #ff5722;
            --mkt-orange-dark: #e64a19;
            --mkt-dark: #0f172a;
            --mkt-muted: #64748b;
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
            color: var(--mkt-orange);
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
            color: var(--mkt-muted);
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
            color: var(--mkt-orange);
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
            color: var(--mkt-orange);
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
            color: var(--mkt-orange);
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
            color: var(--mkt-orange);
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
            color: var(--mkt-muted);
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
            background: var(--mkt-orange);
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
            background: var(--mkt-orange-dark);
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
            <i class="fa-solid fa-bullhorn"></i> RETENTION & CONVERSION MARKETING
        </div>
        <h1 class="hero-title">
            Turn Existing Contacts into <span>Repeat Revenue</span>
        </h1>
        <p class="hero-desc">
            Direct-to-consumer email automations and official WhatsApp Business API funnels. Unearth hidden revenue from your existing customer database with industry-shattering open rates.
        </p>

        <div class="tech-chips">
            <span class="tech-chip"><i class="fa-solid fa-envelope-open-text"></i> Email Automations</span>
            <span class="tech-chip"><i class="fa-brands fa-whatsapp"></i> Official WhatsApp API</span>
            <span class="tech-chip"><i class="fa-solid fa-bolt"></i> 98% WhatsApp Read Rate</span>
            <span class="tech-chip"><i class="fa-solid fa-robot"></i> Automated Sales Chatbots</span>
        </div>
    </section>

    <!-- ═══════════════════════ DETAILED SERVICES ═══════════════════════ -->
    <main class="content-section">
        
        <!-- 1. Email Marketing -->
        <section id="email-marketing" class="service-card-block">
            <div class="card-text-col">
                <span class="card-tag">LIFETIME VALUE EXPANSION</span>
                <h2 class="card-h2">Email Marketing & Automated Drip Funnels</h2>
                <p class="card-p">
                    Turn your email list into your most profitable revenue channel. We build custom automated lifecycle flows on Klaviyo, Mailchimp, and ActiveCampaign - including multi-touch Welcome series, Browse Abandonment triggers, Abandoned Cart recovery, VIP loyalty ladders, and weekly revenue newsletters.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-check"></i> High-converting HTML responsive email templates designed in Figma</li>
                    <li><i class="fa-solid fa-check"></i> Behavioral trigger flows (Welcome, Cart Abandon, Post-Purchase Upsell)</li>
                    <li><i class="fa-solid fa-check"></i> Inbox deliverability audits, SPF/DKIM/DMARC authentication & list cleaning</li>
                    <li><i class="fa-solid fa-check"></i> Dynamic segmentation by customer lifetime value (LTV) and purchase frequency</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Klaviyo & Mailchimp</span>
                    <span class="card-tech-tag">Deliverability First</span>
                    <span class="card-tech-tag">Zero Spam</span>
                </div>
            </div>
            <div class="card-visual-col">
                <div class="card-visual-box">
                    <div class="card-visual-icon"><i class="fa-solid fa-envelope-circle-check"></i></div>
                    <div class="card-visual-stat">42.5%</div>
                    <div class="card-visual-sub">Average Open Rate Across Client Campaigns</div>
                </div>
            </div>
        </section>

        <!-- 2. WhatsApp Marketing -->
        <section id="whatsapp-marketing" class="service-card-block">
            <div class="card-text-col">
                <span class="card-tag">INSTANT CONVERSATIONAL COMMERCE</span>
                <h2 class="card-h2">WhatsApp Marketing & Official API Funnels</h2>
                <p class="card-p">
                    Engage customers on the app they open 30 times a day. We set up official Meta Green Tick WhatsApp Business API solutions, broadcast marketing campaigns, interactive catalog order booking, automated customer support chatbots, and abandoned cart WhatsApp notifications.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-check"></i> Official WhatsApp Business API setup & Green Tick verification assistance</li>
                    <li><i class="fa-solid fa-check"></i> Automated instant lead responses, booking appointments & FAQs</li>
                    <li><i class="fa-solid fa-check"></i> Interactive quick-reply buttons and clickable catalog product links</li>
                    <li><i class="fa-solid fa-check"></i> Full CRM and Shopify / WooCommerce webhook sync for automated triggers</li>
                </ul>
                <div>
                    <span class="card-tech-tag">Meta WhatsApp API</span>
                    <span class="card-tech-tag">Green Tick</span>
                    <span class="card-tech-tag">98% Open Rate</span>
                </div>
            </div>
            <div class="card-visual-col">
                <div class="card-visual-box">
                    <div class="card-visual-icon"><i class="fa-brands fa-whatsapp"></i></div>
                    <div class="card-visual-stat">98%</div>
                    <div class="card-visual-sub">Message Read Rate Within 3 Minutes</div>
                </div>
            </div>
        </section>

        <!-- CTA BANNER -->
        <div class="cta-banner">
            <h2>Ready to Multiply Your Customer Retention?</h2>
            <p>Let our marketing strategists engineer your automated email and WhatsApp retention architecture. Generate predictable recurring revenue every single week.</p>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-banner">
                <i class="fa-solid fa-paper-plane"></i> Talk to Our Retention Specialists
            </a>
        </div>
    </main>

    <!-- ═══════════════════════ FOOTER ═══════════════════════ -->
        
    <!-- ═══════════════════════ TEAM SPECIALIST SPOTLIGHT ═══════════════════════ -->
    <section class="expert-spotlight-section">
        <div class="expert-spotlight-card">
            <div class="expert-avatar-wrap">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/kamalesh-j-digital-marketing-expert.webp" alt="Kamalesh J - Digital Marketing Expert" class="expert-avatar-img">
                <div class="expert-verified-badge"><i class="fa-solid fa-check"></i></div>
            </div>
            <div class="expert-content">
                <div class="expert-domain-pill"><i class="fa-solid fa-chart-line"></i> Full-Funnel Marketing & Automation Lead</div>
                <h3 class="expert-name">Mr. Kamalesh J</h3>
                <div class="expert-headline">
                    <i class="fa-solid fa-award" style="color: #ff5722;"></i>
                    <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong>
                </div>
                <p class="expert-bio">
                    Powering customer retention and automated revenue, the <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong>. Kamalesh deploys enterprise <strong>b2b digital marketing services</strong> integrating automated email drip journeys and official WhatsApp API broadcasts. For brands seeking elite <strong>digital marketing services near me</strong>, Kamalesh engineers 24/7 lead response funnels that convert prospects into high-LTV customers.
                </p>
                <div class="expert-stats-row">
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">34%+</span>
                        <span class="expert-stat-lbl">Revenue from Automations</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">&gt;98%</span>
                        <span class="expert-stat-lbl">WhatsApp Open Rate</span>
                    </div>
                    <div class="expert-stat-item">
                        <span class="expert-stat-val">24/7</span>
                        <span class="expert-stat-lbl">Automated Lead Nurturing</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
