<?php
/**
 * Template Name: Contact Us
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
            padding: 150px 24px 60px;
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
            margin: 0 auto 30px;
        }

        /* ── DIRECT CONTACT CARDS ── */
        .contact-cards-section {
            padding: 40px 24px 60px;
            max-width: 1240px;
            margin: 0 auto;
        }

        .contact-cards-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .contact-info-card {
            background: #ffffff;
            border: 1px solid var(--dev-border);
            border-radius: 20px;
            padding: 30px 24px;
            text-align: left;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .contact-info-card:hover {
            transform: translateY(-4px);
            border-color: rgba(255, 87, 34, 0.4);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
        }

        .card-icon-box {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: rgba(255, 87, 34, 0.08);
            border: 1px solid rgba(255, 87, 34, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dev-orange);
            font-size: 1.4rem;
            margin-bottom: 20px;
        }

        .contact-card-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.2rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .contact-card-text {
            color: #64748b;
            font-size: 0.92rem;
            line-height: 1.6;
            margin-bottom: 16px;
        }

        .contact-card-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #ff5722;
            font-weight: 700;
            font-size: 0.9rem;
            text-decoration: none;
            transition: transform 0.2s;
        }

        .contact-card-link:hover {
            transform: translateX(4px);
            color: #e64a19;
        }

        /* ── INTERACTIVE FORM + MAP SECTION ── */
        .connect-main-section {
            padding: 30px 24px 90px;
            max-width: 1240px;
            margin: 0 auto;
        }

        .connect-layout-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 40px;
            align-items: stretch;
        }

        /* Form Card */
        .form-card {
            background: #ffffff;
            border: 1px solid var(--dev-border);
            border-radius: 28px;
            padding: 45px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.03);
        }

        .form-card-header {
            margin-bottom: 30px;
        }

        .form-card-title {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .form-card-desc {
            color: var(--dev-muted);
            font-size: 0.98rem;
            line-height: 1.6;
        }

        .form-group-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.88rem;
            font-weight: 700;
            color: #334155;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.95rem;
            color: #1e293b;
            background: #f8fafc;
            transition: all 0.25s ease;
            box-sizing: border-box;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #ff5722;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(255, 87, 34, 0.12);
        }

        .service-chips-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-top: 8px;
            margin-bottom: 20px;
        }

        .chip-label {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 0.84rem;
            font-weight: 600;
            color: #475569;
            cursor: pointer;
            transition: all 0.2s;
            user-select: none;
        }

        .chip-label input {
            accent-color: #ff5722;
        }

        .chip-label:hover {
            border-color: #ff5722;
            background: rgba(255,87,34,0.04);
        }

        .btn-submit-inquiry {
            width: 100%;
            padding: 16px;
            background: #ff5722;
            color: #ffffff;
            border: none;
            border-radius: 50px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 8px 25px rgba(255, 87, 34, 0.35);
            transition: all 0.3s ease;
        }

        .btn-submit-inquiry:hover {
            background: #e64a19;
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(255, 87, 34, 0.45);
        }

        /* Map Box Container */
        .map-card {
            background: #ffffff;
            border: 1px solid var(--dev-border);
            border-radius: 28px;
            padding: 35px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.03);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .map-card-header {
            margin-bottom: 20px;
        }

        .map-card-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.8rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .map-card-address {
            color: var(--dev-muted);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .map-embed-wrapper {
            width: 100%;
            height: 380px;
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid rgba(255, 87, 34, 0.3);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
            margin-bottom: 24px;
        }

        .map-embed-wrapper iframe {
            width: 100%;
            height: 100%;
            border: 0;
            display: block;
        }

        .office-features-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .office-features-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.92rem;
            color: #334155;
            font-weight: 600;
        }

        .office-features-list li i {
            color: var(--dev-orange);
            font-size: 1rem;
        }

        @media (max-width: 1024px) {
            .contact-cards-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .connect-layout-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .contact-cards-grid {
                grid-template-columns: 1fr;
            }
            .form-group-row {
                grid-template-columns: 1fr;
            }
            .service-chips-grid {
                grid-template-columns: 1fr;
            }
            .form-card {
                padding: 30px 20px;
            }
            .map-card {
                padding: 24px 18px;
            }
        }
    </style>

<!-- ═══════════════════════ HERO ═══════════════════════ -->
    <header class="page-hero">
        <div class="badge-pill">
            <i class="fa-solid fa-paper-plane"></i> LET'S CONNECT & COLLABORATE
        </div>
        <h1 class="hero-title">
            Ready to Scale Your Brand? <span>Let's Connect</span>
        </h1>
        <p class="hero-desc">
            Whether you want to dominate Google Search, multiply your Meta Ads ROAS, build a high-performance web application, or launch WhatsApp API automation - our growth architects in Chennai are ready to deliver.
        </p>
    </header>

    <!-- ═══════════════════════ DIRECT CONTACT CARDS ═══════════════════════ -->
    <section class="contact-cards-section">
        <div class="contact-cards-grid">
            
            <!-- Card 1: Office Address -->
            <div class="contact-info-card">
                <div>
                    <div class="card-icon-box"><i class="fa-solid fa-location-dot"></i></div>
                    <h3 class="contact-card-title">Chennai HQ</h3>
                    <p class="contact-card-text">RC Enclave, Selvam Nagar Extn, Ponniammanmedu, Chennai 600110</p>
                </div>
                <a href="https://maps.google.com/maps?q=RC%20Enclave%2C%20Selvam%20Nagar%20Extn%2C%20Ponniammanmedu%2C%20Chennai%20600110" target="_blank" rel="noopener" class="contact-card-link">
                    Open in Maps <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>

            <!-- Card 2: Phone -->
            <div class="contact-info-card">
                <div>
                    <div class="card-icon-box"><i class="fa-solid fa-phone"></i></div>
                    <h3 class="contact-card-title">Direct Desk</h3>
                    <p class="contact-card-text">+91 96000 96973<br><span style="font-size:0.82rem; color:#94a3b8;">Mon - Sat: 9:30 AM - 7:30 PM IST</span></p>
                </div>
                <a href="tel:+919600096973" class="contact-card-link">
                    Call Directly <i class="fa-solid fa-phone-volume"></i>
                </a>
            </div>

            <!-- Card 3: Email -->
            <div class="contact-info-card">
                <div>
                    <div class="card-icon-box"><i class="fa-solid fa-envelope"></i></div>
                    <h3 class="contact-card-title">Official Inbox</h3>
                    <p class="contact-card-text">fusionxteams@gmail.com<br><span style="font-size:0.82rem; color:#94a3b8;">Average response time &lt; 2 hours</span></p>
                </div>
                <a href="mailto:fusionxteams@gmail.com" class="contact-card-link">
                    Send Email <i class="fa-solid fa-paper-plane"></i>
                </a>
            </div>

            <!-- Card 4: WhatsApp -->
            <div class="contact-info-card">
                <div>
                    <div class="card-icon-box"><i class="fa-brands fa-whatsapp"></i></div>
                    <h3 class="contact-card-title">WhatsApp Desk</h3>
                    <p class="contact-card-text">+91 96000 96973<br><span style="font-size:0.82rem; color:#94a3b8;">Instant messaging with founders</span></p>
                </div>
                <a href="https://wa.me/919600096973?text=Hi%20Fusion%20X,%20I'd%20like%20to%20discuss%20a%20project." target="_blank" rel="noopener" class="contact-card-link">
                    Chat Now <i class="fa-brands fa-whatsapp"></i>
                </a>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════ MAIN FORM & MAP SECTION ═══════════════════════ -->
    <main class="connect-main-section">
        <div class="connect-layout-grid">

            <!-- Left: Interactive Form -->
            <div class="form-card">
                <div class="form-card-header">
                    <h2 class="form-card-title">Start a Conversation</h2>
                    <p class="form-card-desc">Fill out your project details below and our team will get back to you within 2 business hours with an initial audit and proposal.</p>
                </div>

                <form id="contact-inquiry-form" onsubmit="event.preventDefault(); alert('Thank you! Your message has been received. Our team will contact you shortly.');">
                    <div class="form-group-row">
                        <div>
                            <label class="form-label">Full Name *</label>
                            <input type="text" class="form-input" placeholder="e.g. Arun Kumar" required>
                        </div>
                        <div>
                            <label class="form-label">Work Email *</label>
                            <input type="email" class="form-input" placeholder="arun@brand.com" required>
                        </div>
                    </div>

                    <div class="form-group-row">
                        <div>
                            <label class="form-label">Phone Number *</label>
                            <input type="tel" class="form-input" placeholder="+91 98765 43210" required>
                        </div>
                        <div>
                            <label class="form-label">Company / Website URL</label>
                            <input type="text" class="form-input" placeholder="https://yourbrand.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Services of Interest</label>
                        <div class="service-chips-grid">
                            <label class="chip-label"><input type="checkbox" name="services" value="meta-ads"> Meta Ads</label>
                            <label class="chip-label"><input type="checkbox" name="services" value="google-ads"> Google Ads</label>
                            <label class="chip-label"><input type="checkbox" name="services" value="web-dev"> Website Dev</label>
                            <label class="chip-label"><input type="checkbox" name="services" value="seo"> SEO Services</label>
                            <label class="chip-label"><input type="checkbox" name="services" value="whatsapp"> WhatsApp API</label>
                            <label class="chip-label"><input type="checkbox" name="services" value="brand"> Brand Strategy</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Estimated Monthly Ad Spend / Project Scope</label>
                        <select class="form-select">
                            <option value="under-1L">Under ₹1,00,000 / month</option>
                            <option value="1L-5L">₹1,00,000 – ₹5,00,000 / month</option>
                            <option value="5L-20L">₹5,00,000 – ₹20,00,000 / month</option>
                            <option value="20L-plus">₹20,00,000+ / month (Enterprise)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tell Us About Your Project & Goals</label>
                        <textarea class="form-textarea" rows="4" placeholder="Briefly describe your current bottlenecks, target audience, and revenue goals..."></textarea>
                    </div>

                    <button type="submit" class="btn-submit-inquiry">
                        Submit Project Inquiry <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </form>
            </div>

            <!-- Right: Interactive Map Card -->
            <div class="map-card">
                <div>
                    <div class="map-card-header">
                        <span class="badge-pill" style="margin-bottom: 12px; padding: 6px 18px; font-size: 0.76rem;">CHENNAI LOCATION</span>
                        <h2 class="map-card-title">Find Our Office</h2>
                        <p class="map-card-address">
                            <i class="fa-solid fa-map-pin" style="color: #ff5722; margin-right: 6px;"></i>
                            RC Enclave, Selvam Nagar Extn, Ponniammanmedu, Chennai 600110
                        </p>
                    </div>

                    <!-- Interactive Google Map Embed -->
                    <div class="map-embed-wrapper">
                        <iframe 
                            title="Fusion X Chennai Office Location"
                            src="https://maps.google.com/maps?q=RC%20Enclave%2C%20Selvam%20Nagar%20Extn%2C%20Ponniammanmedu%2C%20Chennai%20600110&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            allowfullscreen>
                        </iframe>
                    </div>

                    <ul class="office-features-list">
                        <li><i class="fa-solid fa-circle-check"></i> In-person strategy sessions & client consultations</li>
                        <li><i class="fa-solid fa-circle-check"></i> Mutual Non-Disclosure Agreement (NDA) guaranteed</li>
                        <li><i class="fa-solid fa-circle-check"></i> Dedicated account manager assigned on Day 1</li>
                        <li><i class="fa-solid fa-circle-check"></i> Real-time communication via dedicated Slack/WhatsApp group</li>
                    </ul>
                </div>

                <div style="margin-top: 30px;">
                    <a href="https://maps.google.com/maps?q=RC%20Enclave%2C%20Selvam%20Nagar%20Extn%2C%20Ponniammanmedu%2C%20Chennai%20600110" target="_blank" rel="noopener" class="btn-submit-inquiry" style="background:#080808; border:1px solid rgba(255,87,34,0.3); text-decoration:none;">
                        Get Directions in Google Maps <i class="fa-solid fa-diamond-turn-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </main>

    <!-- ═══════════════════════ PROCESS SECTION ═══════════════════════ -->
    <section class="process-section fx-has-orange-dots">
        <div class="process-header">
            <span class="badge-pill" style="background: rgba(255,87,34,0.15); border-color: rgba(255,87,34,0.35);">
                ONBOARDING ROADMAP
            </span>
            <h2>What Happens After You Connect?</h2>
            <p style="color: #94a3b8; font-size: 1.05rem;">From initial discovery to sprint launch, our onboarding timeline is engineered for speed, transparency, and rapid ROI.</p>
        </div>
        <div class="process-grid">
            <div class="process-card">
                <div class="step-num">01</div>
                <h3 class="step-title">Discovery Review</h3>
                <p class="step-desc">Within 2 hours, our technical team inspects your digital presence, competitors, and current analytics telemetry.</p>
            </div>
            <div class="process-card">
                <div class="step-num">02</div>
                <h3 class="step-title">Custom Growth Proposal</h3>
                <p class="step-desc">We deliver a clear, data-backed 90-day execution proposal with projected unit economics and milestone deliverables.</p>
            </div>
            <div class="process-card">
                <div class="step-num">03</div>
                <h3 class="step-title">Strategy Deep-Dive Call</h3>
                <p class="step-desc">Meet your dedicated project manager, paid media director, or lead engineer for an in-depth kickoff alignment.</p>
            </div>
            <div class="process-card">
                <div class="step-num">04</div>
                <h3 class="step-title">Sprint Execution</h3>
                <p class="step-desc">Campaigns launch within 5 business days with daily tracking telemetry and real-time private dashboard access.</p>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ FOOTER ═══════════════════════ -->

<?php
get_footer();
