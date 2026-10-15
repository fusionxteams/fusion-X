<?php
/**
 * Template Name: WhatsApp Marketing
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
            <i class="fa-solid fa-brands fa-whatsapp"></i> Meta Official Cloud API
        </div>
        <h1 class="hero-title">High-Open Rate WhatsApp Marketing <span>With Official Meta Cloud API</span></h1>
        <p class="hero-desc">Harness the power of 98% open rates and instant engagement. We build official Meta WhatsApp Business API workflows, interactive chatbots, and high-converting broadcast funnels with zero ban risk.</p>
        
        <div class="tech-chips">
            <div class="tech-chip"><i class="fa-brands fa-whatsapp"></i> Official Meta Cloud API</div>
            <div class="tech-chip"><i class="fa-solid fa-circle-check"></i> Green Tick Verification</div>
            <div class="tech-chip"><i class="fa-solid fa-robot"></i> 24/7 AI-Powered Chatbots</div>
            <div class="tech-chip"><i class="fa-solid fa-bullhorn"></i> High-Conversion Broadcasts</div>
            <div class="tech-chip"><i class="fa-solid fa-shield-halved"></i> Zero Account Ban Guarantee</div>
        </div>

        <div class="hero-ctas">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero">Request Proposal <i class="fa-solid fa-arrow-right"></i></a>
            <a href="<?php echo esc_url( home_url( '/digital-marketing-services/' ) ); ?>" class="btn-secondary-hero">Explore All Services</a>
        </div>
    </header>

    <!-- ═══════════════════════ DELIVERABLES / CORE ARCHITECTURE ═══════════════════════ -->
    <main class="content-section">
        <div class="section-header">
            <h2>WhatsApp Conversational Commerce</h2>
            <p>Engage customers where they spend their day, with instant responses, rich media, and 1-tap checkout links.</p>
        </div>

        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">OFFICIAL META API</span>
                <h3 class="card-title">Official Green Tick & Enterprise Verification</h3>
                <p class="card-desc">Avoid risky unofficial scraping tools that get your business number banned. We provision the official Meta WhatsApp Business Cloud API with enterprise rate limits and Green Tick credibility.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Official Meta Business Manager Account Integration</li>
                    <li><i class="fa-solid fa-circle-check"></i> Green Tick Verified Business Badge Assistance</li>
                    <li><i class="fa-solid fa-circle-check"></i> Zero Ban Risk with Multi-Agent Customer Inbox</li>
                    <li><i class="fa-solid fa-circle-check"></i> High Throughput Enterprise Messaging Speeds</li>
                </ul>
                <div style="margin-top: 20px;">
                    <span class="card-tech-tag">Official Meta API</span><span class="card-tech-tag">Green Tick</span><span class="card-tech-tag">Zero Ban Risk</span><span class="card-tech-tag">Multi-Agent Support</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-certificate"></i></div>
                <div class="card-visual-stat">98%</div>
                <div class="card-visual-sub">Open Rate Within 10 Minutes</div>
            </div>
        </div>
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">AUTOMATED CHATBOTS</span>
                <h3 class="card-title">Interactive Lead & Support Chatbot Flows</h3>
                <p class="card-desc">Automate routine customer interactions 24/7. Our chatbots answer FAQs, provide instant order tracking, qualify leads, and collect payments without human intervention.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Instant Interactive Button & List Menu Responses</li>
                    <li><i class="fa-solid fa-circle-check"></i> Automated Order Tracking & Courier Status Lookup</li>
                    <li><i class="fa-solid fa-circle-check"></i> Lead Qualification & Automated Meeting Booking</li>
                    <li><i class="fa-solid fa-circle-check"></i> Smart Human Agent Routing & Escalation</li>
                </ul>
                <div style="margin-top: 20px;">
                    <span class="card-tech-tag">Chatbots</span><span class="card-tech-tag">Automated FAQ</span><span class="card-tech-tag">Order Status</span><span class="card-tech-tag">Lead Qualification</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-robot"></i></div>
                <div class="card-visual-stat"><3s</div>
                <div class="card-visual-sub">Instant Customer Response Time</div>
            </div>
        </div>
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">BROADCAST CAMPAIGNS</span>
                <h3 class="card-title">Segmented Promotional Broadcasts & Cart Drips</h3>
                <p class="card-desc">Send rich media broadcasts with clickable buttons, video previews, and personalized offers that drive immediate sales. Recover abandoned carts directly through WhatsApp.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Rich Media Cards with 1-Tap CTA Buttons</li>
                    <li><i class="fa-solid fa-circle-check"></i> Automated Abandoned Cart WhatsApp Drips</li>
                    <li><i class="fa-solid fa-circle-check"></i> Personalized Name & Product Recommendation Merge Tags</li>
                    <li><i class="fa-solid fa-circle-check"></i> Live Delivery, Read & Click-Through Telemetry</li>
                </ul>
                <div style="margin-top: 20px;">
                    <span class="card-tech-tag">Broadcasts</span><span class="card-tech-tag">Cart Recovery</span><span class="card-tech-tag">CTA Buttons</span><span class="card-tech-tag">Real-Time Telemetry</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-comments-dollar"></i></div>
                <div class="card-visual-stat">42%</div>
                <div class="card-visual-sub">Average Click-Through Rate</div>
            </div>
        </div>
        <div class="service-card-block">
            <div class="card-content-box">
                <span class="card-tag">ADS TO CONVERSATIONS</span>
                <h3 class="card-title">Click-to-WhatsApp Ads & CRM Lead Routing</h3>
                <p class="card-desc">Bridge Meta Ads directly to WhatsApp chats. Prospects clicking your Facebook or Instagram ad are guided straight into a pre-filled WhatsApp conversation, pre-qualified instantly, and synced into your CRM.</p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Direct Facebook & Instagram Click-to-WhatsApp (CTWA) ad campaigns</li>
                    <li><i class="fa-solid fa-circle-check"></i> Instant lead qualification and real-time CRM routing (HubSpot, Zoho, Salesforce)</li>
                    <li><i class="fa-solid fa-circle-check"></i> Zero drop-off lead capture compared to traditional static landing pages</li>
                    <li><i class="fa-solid fa-circle-check"></i> Automated instant agent dispatch and WhatsApp appointment booking</li>
                </ul>
                <div style="margin-top: 20px;">
                    <span class="card-tech-tag">CTWA Ads</span><span class="card-tech-tag">CRM Sync</span><span class="card-tech-tag">Lead Routing</span><span class="card-tech-tag">Zero Drop-Off</span>
                </div>
            </div>
            <div class="card-visual-box">
                <div class="card-visual-icon"><i class="fa-solid fa-bolt"></i></div>
                <div class="card-visual-stat">+68%</div>
                <div class="card-visual-sub">Lead-To-Contact Conversion Lift</div>
            </div>
        </div>
    </main>

    <!-- ═══════════════════════ PROCESS SECTION ═══════════════════════ -->
    <section class="process-section fx-has-orange-dots">
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
                <h3 class="step-title">API Setup & Verification</h3>
                <p class="step-desc">We verify your Meta Business Manager and register your dedicated WhatsApp Business phone number.</p>
            </div>
            <div class="process-card">
                <div class="step-num">02</div>
                <h3 class="step-title">Template Design & Approval</h3>
                <p class="step-desc">We draft compliant, high-converting broadcast templates and secure official Meta approval.</p>
            </div>
            <div class="process-card">
                <div class="step-num">03</div>
                <h3 class="step-title">Chatbot Flow Build</h3>
                <p class="step-desc">We configure interactive conversation paths, FAQ trees, and integrate with your CRM / Shopify store.</p>
            </div>
            <div class="process-card">
                <div class="step-num">04</div>
                <h3 class="step-title">Campaign Launch & Scale</h3>
                <p class="step-desc">We launch segmented broadcasts, track revenue attribution, and optimize conversation funnels.</p>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ CTA BANNER ═══════════════════════ -->
    <div class="content-section" style="padding-top: 0; padding-bottom: 0;">
        <div class="cta-banner fx-has-orange-dots">
            <h2>Ready to Reach Customers on WhatsApp?</h2>
            <p>Unlock 98% open rates and frictionless customer conversions with official Meta WhatsApp Business marketing.</p>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero" style="background: #ff5722; color: #fff;">Launch WhatsApp API Today <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>

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
