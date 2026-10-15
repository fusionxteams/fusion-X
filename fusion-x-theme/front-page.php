<?php
/**
 * Front Page Template - Front Page
 *
 * @package Fusion_X
 */

get_header();
?>

<style>
        .elegant-reveal {
            opacity: 0;
            transform: translateY(60px) rotateX(-30deg);
            transition: all 1.2s cubic-bezier(0.25, 1, 0.5, 1);
            transform-origin: bottom center;
        }
        .elegant-reveal.is-visible {
            opacity: 1;
            transform: translateY(0) rotateX(0);
        }

        /* ─── SECTION 2 FLYING WORDS & STRICT BOUNDARY CONTAINMENT ─── */
        #impact {
            position: relative !important;
            overflow: hidden !important;
            z-index: 1 !important;
        }

        #services {
            position: relative !important;
            z-index: 5 !important;
            background-color: #070707 !important;
        }

        #impact > div:not(.scroll-flying-stream-wrapper) {
            position: relative !important;
            z-index: 2 !important;
        }

        #scroll-flying-stream-container.scroll-flying-stream-wrapper {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
            pointer-events: none !important;
            overflow: hidden !important;
            z-index: 1 !important;
        }

        .flying-headline-wrap {
            perspective: 1200px;
            display: inline-flex !important;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px 14px;
            position: relative;
            z-index: 2;
        }

        .flying-headline-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px 14px;
            width: 100%;
        }

        .flying-word-unit {
            display: inline-block;
            will-change: transform, opacity;
            transform-style: preserve-3d;
            transition: color 0.3s ease;
        }

        .flying-word-unit.highlight-orange {
            color: #ff5722 !important;
            text-shadow: 0 0 25px rgba(255, 87, 34, 0.4);
        }

        .flying-words-rail {
            position: absolute;
            width: 250%;
            left: -60%;
            white-space: nowrap;
            pointer-events: none;
            font-family: 'Outfit', sans-serif;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 4px;
            opacity: 0.16;
            font-size: clamp(2.4rem, 5vw, 4.6rem);
            -webkit-text-stroke: 1.5px rgba(255, 87, 34, 0.65);
            color: rgba(255, 87, 34, 0.08);
            user-select: none;
        }

        .rail-top {
            top: 6%;
            transform: rotate(-2deg);
        }

        .rail-mid {
            top: 48%;
            transform: rotate(1.5deg);
        }

        .rail-bottom {
            bottom: 6%;
            transform: rotate(-1.5deg);
        }

        .flying-words-inner {
            display: inline-block;
            will-change: transform;
        }

        .flying-words-inner span {
            margin-right: 48px;
            display: inline-block;
        }

        .flying-floating-word {
            position: absolute;
            font-family: 'Outfit', sans-serif;
            font-weight: 900;
            font-size: clamp(2rem, 5vw, 4.2rem);
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255, 87, 34, 0.14);
            -webkit-text-stroke: 1.5px rgba(255, 87, 34, 0.45);
            text-shadow: 0 0 25px rgba(255, 87, 34, 0.15);
            will-change: transform;
            pointer-events: none;
            z-index: 1;
            user-select: none;
        }

        .f-word-1 { top: 12%; left: 3%; }
        .f-word-2 { top: 30%; right: 4%; }
        .f-word-3 { top: 52%; left: 4%; }
        .f-word-4 { top: 72%; right: 5%; }
        .f-word-5 { top: 90%; left: 5%; }

        #impact h2 {
            font-size: clamp(1.8rem, 5.2vw, 2.8rem) !important;
        }

        @media (max-width: 768px) {
            #impact {
                padding: 50px 16px 60px 16px !important;
            }
            .flying-words-rail {
                font-size: clamp(1.8rem, 6.5vw, 2.8rem) !important;
                opacity: 0.25 !important;
                -webkit-text-stroke: 1.5px rgba(255, 87, 34, 0.8) !important;
                color: rgba(255, 87, 34, 0.14) !important;
                letter-spacing: 2.5px;
            }
            .flying-floating-word {
                font-size: clamp(2.2rem, 8.5vw, 3.4rem) !important;
                opacity: 0.9 !important;
                color: rgba(255, 87, 34, 0.2) !important;
                -webkit-text-stroke: 1.5px rgba(255, 87, 34, 0.6) !important;
            }
            .flying-headline-wrap {
                gap: 4px 6px;
            }
            .flying-headline-row {
                gap: 4px 6px;
            }
        }

        .flying-scroll-heading {
            perspective: 1000px;
        }

        .flying-sub-word {
            display: inline-block;
            will-change: transform, opacity;
            transform-style: preserve-3d;
        }

        .flying-sub-word-group {
            display: inline;
        }
    </style>

<header id="home" class="hero">
        <!-- AMBIENT DATA & HUD TELEMETRY BACKDROP (Pure Background Layer) -->
        <div class="hero-data-backdrop" aria-hidden="true">
            <!-- 1. Technical Coordinate HUD Markers -->
            <div class="hero-hud-coord top-left">
                <span class="hud-tag-line"><span class="hud-accent-dot"></span> LAT 13.0827° N / LON 80.2707° E</span>
                <span class="hud-sub-line">SYS_NODE: CHENNAI_HQ // AEO_CORE_ACTIVE</span>
            </div>
            <div class="hero-hud-coord top-right">
                <span class="hud-tag-line">TRAFFIC_STREAM: REAL-TIME <span class="hud-accent-dot live"></span></span>
                <span class="hud-sub-line">INDEX_SYNC: 99.98% // 2026_PROTOCOL</span>
            </div>

            <!-- 2. Faint Architectural Cyber Crosshairs -->
            <div class="hero-grid-crosshair ch-1">+</div>
            <div class="hero-grid-crosshair ch-2">+</div>
            <div class="hero-grid-crosshair ch-3">+</div>
            <div class="hero-grid-crosshair ch-4">+</div>

            <!-- 4. Subtle Ambient Data Stream Bar (Bottom Horizon Ticker) -->
            <div class="hero-data-ticker">
                <div class="ticker-content">
                    <span><i class="fa-solid fa-signal"></i> LIVE TELEMETRY</span>
                    <span class="t-sep">/</span>
                    <span>AI OVERVIEWS: RANK #1</span>
                    <span class="t-sep">•</span>
                    <span>ORGANIC CALLS: 900+ IN 90 DAYS</span>
                    <span class="t-sep">•</span>
                    <span>ANSWER ENGINE OPTIMIZATION (AEO): ACTIVE</span>
                    <span class="t-sep">•</span>
                    <span>TECHNICAL SEO ARCHITECTURE: 99+ SPEED</span>
                    <span class="t-sep">•</span>
                    <span>HIGH-INTENT LEAD CONVERSION: MAXIMIZED</span>
                    <span class="t-sep">/</span>
                    <span><i class="fa-solid fa-signal"></i> LIVE TELEMETRY</span>
                    <span class="t-sep">/</span>
                    <span>AI OVERVIEWS: RANK #1</span>
                    <span class="t-sep">•</span>
                    <span>ORGANIC CALLS: 900+ IN 90 DAYS</span>
                    <span class="t-sep">•</span>
                    <span>ANSWER ENGINE OPTIMIZATION (AEO): ACTIVE</span>
                    <span class="t-sep">•</span>
                    <span>TECHNICAL SEO ARCHITECTURE: 99+ SPEED</span>
                    <span class="t-sep">•</span>
                    <span>HIGH-INTENT LEAD CONVERSION: MAXIMIZED</span>
                </div>
            </div>

            <!-- 5. Ambient Glowing Orbs -->
            <div class="hero-ambient-pulse-orb orb-1"></div>
            <div class="hero-ambient-pulse-orb orb-2"></div>
        </div>

        <div class="hero-content">
            <div class="agency-tag"><span class="pulse-dot"></span> 2026 DIGITAL COMPANY</div>
            <h1>Best Digital Marketing <span>Company in India</span></h1>
            <p>Through <strong>Fusion X</strong>, make your brand worldwide visible. We build highly responsive, EEAT-driven, and AI-optimized digital ecosystems that conquer search engines and drive high-intent organic traffic.</p>
            <div class="hero-buttons">
                <a href="<?php echo esc_url( home_url( '/digital-marketing-services/' ) ); ?>" class="btn btn-primary">Our Services <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-secondary">Let's Work Together <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
            </div>
        </div>
        <div class="hero-image" id="globe-container">
            <!-- Three.js Canvas will be injected here -->
        </div>
    </header>

    <!-- IMPACT & STATS SECTION -->
    <section id="impact" style="padding: 100px 20px; background-color: #ffffff; color: #333; text-align: center; border-bottom: 2px solid #f0f0f0; overflow: hidden;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <h2 class="impact-main-heading" style="margin-bottom: 25px; font-weight: 800; line-height: 1.2; color: #111;">
                Boost Your <span style="color: #ff5722;">Digital Presence</span> Throughout All Digital Space
            </h2>
            <p style="font-size: 1.15rem; color: #555; max-width: 850px; margin: 0 auto 60px auto; line-height: 1.7;">
                As India's fastest-growing <strong>digital marketing agency</strong>, we don't just build websites - we engineer complete digital ecosystems optimized for AEO (Answer Engine Optimization) and GEO (Generative Engine Optimization). Through advanced <strong>search engine optimization (SEO)</strong>, technical web development, and strategic brand positioning, we ensure your brand dominates the digital space. We deliver EEAT-rich content that drives high-intent organic traffic, aggressive lead generation, and sustainable digital growth globally.
            </p>
            
            <div class="impact-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr)); gap: 30px;">
                <!-- Stat 1 -->
                <div class="impact-card" style="background: #fafafa; padding: 40px 30px; border-radius: 16px; border: 1px solid #eaeaea; box-shadow: 0 10px 30px rgba(0,0,0,0.02); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                    <i class="fas fa-project-diagram" style="font-size: 3rem; color: #ff5722; margin-bottom: 15px; opacity: 0.8;"></i>
                    <div style="font-size: 3.5rem; font-weight: 900; color: #111; margin-bottom: 10px; line-height: 1;">
                        <span class="count-up" data-target="100">0</span>+
                    </div>
                    <h3 style="font-size: 1.3rem; margin-bottom: 15px; font-weight: 700;">Projects Delivered</h3>
                    <p style="color: #666; font-size: 0.95rem; line-height: 1.5;">Delivering high-performance custom websites, full-funnel ad campaigns, and enterprise SEO architectures that drive measurable ROI.</p>
                </div>
                
                <!-- Stat 2 -->
                <div class="impact-card" style="background: #fafafa; padding: 40px 30px; border-radius: 16px; border: 1px solid #eaeaea; box-shadow: 0 10px 30px rgba(0,0,0,0.02); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); transition-delay: 0.1s;">
                    <i class="fas fa-phone-volume" style="font-size: 3rem; color: #ff5722; margin-bottom: 15px; opacity: 0.8;"></i>
                    <div style="font-size: 3.5rem; font-weight: 900; color: #111; margin-bottom: 10px; line-height: 1;">
                        <span class="count-up" data-target="900">0</span>+
                    </div>
                    <h3 style="font-size: 1.3rem; margin-bottom: 15px; font-weight: 700;">Inbound Calls Generated</h3>
                    <p style="color: #666; font-size: 0.95rem; line-height: 1.5;">Successfully drove over 900 qualified calls exclusively through AI search suggestions and advanced SEO for a single brand in just 3 months.</p>
                </div>

                <!-- Stat 3 -->
                <div class="impact-card" style="background: #fafafa; padding: 40px 30px; border-radius: 16px; border: 1px solid #eaeaea; box-shadow: 0 10px 30px rgba(0,0,0,0.02); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); transition-delay: 0.2s;">
                    <i class="fas fa-smile-beam" style="font-size: 3rem; color: #ff5722; margin-bottom: 15px; opacity: 0.8;"></i>
                    <div style="font-size: 3.5rem; font-weight: 900; color: #111; margin-bottom: 10px; line-height: 1;">
                        <span class="count-up" data-target="50">0</span>+
                    </div>
                    <h3 style="font-size: 1.3rem; margin-bottom: 15px; font-weight: 700;">Happy Customers</h3>
                    <p style="color: #666; font-size: 0.95rem; line-height: 1.5;">Empowering over 50+ growing businesses with bespoke digital solutions, maximizing their digital footprint and brand authority.</p>
                </div>

                <!-- Stat 4 -->
                <div class="impact-card" style="background: #fafafa; padding: 40px 30px; border-radius: 16px; border: 1px solid #eaeaea; box-shadow: 0 10px 30px rgba(0,0,0,0.02); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); transition-delay: 0.3s;">
                    <i class="fab fa-shopify" style="font-size: 3rem; color: #ff5722; margin-bottom: 15px; opacity: 0.8;"></i>
                    <h3 style="font-size: 1.5rem; margin-bottom: 15px; font-weight: 700; color: #111;">Fully Optimized Shopify</h3>
                    <p style="color: #666; font-size: 0.95rem; line-height: 1.5;">We build blazing fast, <strong>fully optimized Shopify</strong> storefronts designed to convert visitors into loyal buyers and skyrocket your eCommerce revenue.</p>
                </div>

                <!-- Stat 5 -->
                <div class="impact-card" style="background: #fafafa; padding: 40px 30px; border-radius: 16px; border: 1px solid #eaeaea; box-shadow: 0 10px 30px rgba(0,0,0,0.02); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); transition-delay: 0.4s;">
                    <i class="fas fa-file-code" style="font-size: 3rem; color: #ff5722; margin-bottom: 15px; opacity: 0.8;"></i>
                    <h3 style="font-size: 1.5rem; margin-bottom: 15px; font-weight: 700; color: #111;">Fully Customizable Code</h3>
                    <p style="color: #666; font-size: 0.95rem; line-height: 1.5;">Need something unique? We deliver <strong>fully customizable code</strong> and custom web applications tailored precisely to your complex business requirements.</p>
                </div>

                <!-- Stat 6 -->
                <div class="impact-card" style="background: #fafafa; padding: 40px 30px; border-radius: 16px; border: 1px solid #eaeaea; box-shadow: 0 10px 30px rgba(0,0,0,0.02); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); transition-delay: 0.5s;">
                    <i class="fab fa-wordpress" style="font-size: 3rem; color: #ff5722; margin-bottom: 15px; opacity: 0.8;"></i>
                    <h3 style="font-size: 1.5rem; margin-bottom: 15px; font-weight: 700; color: #111;">WordPress Development</h3>
                    <p style="color: #666; font-size: 0.95rem; line-height: 1.5;">Empower your content strategy with scalable, SEO-friendly <strong>WordPress development</strong>, combining beautiful UI with an intuitive backend experience.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="services-section dark-theme">
        <div class="section-title">
            <h2>Our Digital Web</h2>
            <p>Interactive 3D Ecosystem. Click any digital marketing icon to command the Google crawlers & digital robots.</p>
        </div>
        <div id="spider-container" style="width: 100%; height: 700px; position: relative; background: transparent;">
            <!-- 2D Canvas for bulletproof spider web background -->
            <canvas id="web-bg-canvas" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; pointer-events: none;"></canvas>
            
            <!-- Real HTML Logo in center for perfect clarity -->
            <img id="center-logo-html" src="<?php echo esc_url( get_template_directory_uri() ); ?>/logo_transparent.png" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 200px; z-index: 2; pointer-events: none;" alt="Fusion X">

            <!-- Three.js Spiders will be injected here (z-index 3 by default) -->
        </div>
    </section>

    <!-- ========================================================
         PROVEN AI SEARCH RANKINGS & GEO/AEO DOMINANCE
         Verified Proof of Client Brands in Google Gemini & AI Overviews
         (White Section Background with Black AI Result Container + Interactive Orange Dots)
    ======================================================== -->
    <section id="ai-search-proof" class="ai-search-proof-section" style="padding: 100px 24px 105px; background: #ffffff !important; color: #0f172a; position: relative; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
        
        <style>
            .ai-proof-black-box {
                background: radial-gradient(circle at 50% 20%, #151922 0%, #080a0f 85%) !important;
                border: 2px solid rgba(255, 87, 34, 0.4) !important;
                border-radius: 30px;
                padding: 48px 42px;
                position: relative;
                overflow: hidden;
                box-shadow: 0 25px 70px rgba(15, 23, 42, 0.16), 0 0 35px rgba(255, 87, 34, 0.12);
                color: #ffffff;
                margin-top: 45px;
            }

            .ai-proof-black-box .fx-orange-dots-canvas {
                position: absolute !important;
                top: 0 !important;
                left: 0 !important;
                width: 100% !important;
                height: 100% !important;
                pointer-events: none !important;
                z-index: 1 !important;
            }

            .ai-proof-inner-content {
                position: relative;
                z-index: 2;
            }

            .ai-proof-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(min(100%, 520px), 1fr));
                gap: 32px;
                margin-bottom: 42px;
            }

            .ai-proof-showcase-card {
                background: rgba(255, 255, 255, 0.04);
                border: 1.5px solid rgba(255, 87, 34, 0.3);
                border-radius: 22px;
                padding: 26px;
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
                box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                transition: transform 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease;
            }

            .ai-proof-showcase-card:hover {
                transform: translateY(-5px);
                border-color: #ff5722;
                box-shadow: 0 20px 45px rgba(255, 87, 34, 0.22);
            }

            .ai-proof-see-more-btn {
                display: inline-flex;
                align-items: center;
                gap: 12px;
                padding: 16px 38px;
                background: linear-gradient(135deg, #ff5722 0%, #e64a19 100%);
                color: #ffffff !important;
                font-family: 'Space Grotesk', sans-serif;
                font-weight: 800;
                font-size: 1rem;
                border-radius: 50px;
                text-decoration: none;
                box-shadow: 0 8px 25px rgba(255, 87, 34, 0.45);
                transition: all 0.3s ease;
                white-space: nowrap;
            }

            .ai-proof-see-more-btn:hover {
                transform: translateY(-3px) scale(1.02);
                box-shadow: 0 14px 35px rgba(255, 87, 34, 0.65);
            }

            @media (max-width: 900px) {
                .ai-search-proof-section {
                    padding: 60px 16px 70px !important;
                }
                .ai-proof-black-box {
                    padding: 24px 16px !important;
                    border-radius: 20px !important;
                    margin-top: 30px !important;
                }
                .ai-proof-grid {
                    grid-template-columns: 1fr !important;
                    gap: 22px !important;
                }
                .ai-proof-strategy-bar {
                    flex-direction: column !important;
                    align-items: flex-start !important;
                    padding: 22px 18px !important;
                }
                .ai-proof-see-more-btn {
                    width: 100% !important;
                    justify-content: center !important;
                }
            }

            /* ── MOBILE TOUCH-TO-ENLARGE LIGHTBOX MODAL ── */
            .ai-zoomable-img-wrap {
                cursor: zoom-in;
                position: relative;
                transition: transform 0.25s ease;
            }
            .ai-zoomable-img-wrap:hover {
                transform: scale(1.015);
            }
            .ai-zoom-hint-pill {
                position: absolute;
                top: 10px;
                right: 10px;
                background: rgba(15, 23, 42, 0.88);
                backdrop-filter: blur(8px);
                border: 1px solid rgba(255, 87, 34, 0.4);
                color: #ffffff;
                padding: 4px 10px;
                border-radius: 50px;
                font-size: 0.7rem;
                font-weight: 800;
                display: inline-flex;
                align-items: center;
                gap: 5px;
                z-index: 2;
                pointer-events: none;
                transition: all 0.3s ease;
            }
            .ai-zoom-hint-pill i {
                color: #ff5722;
            }
            .ai-zoomable-img-wrap:hover .ai-zoom-hint-pill {
                background: #ff5722;
                color: #ffffff;
            }
            .ai-zoomable-img-wrap:hover .ai-zoom-hint-pill i {
                color: #ffffff;
            }

            /* Lightbox Overlay */
            .ai-lightbox-modal {
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(5, 7, 12, 0.95);
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
                z-index: 99999999;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 18px;
                box-sizing: border-box;
                opacity: 0;
                pointer-events: none;
                transition: opacity 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            }
            .ai-lightbox-modal.active {
                opacity: 1;
                pointer-events: auto;
            }
            .ai-lightbox-close-btn {
                position: fixed;
                top: 20px;
                right: 20px;
                width: 48px;
                height: 48px;
                border-radius: 50%;
                background: linear-gradient(135deg, #ff5722 0%, #e64a19 100%);
                color: #ffffff;
                border: 2px solid rgba(255, 255, 255, 0.5);
                font-size: 2.2rem;
                line-height: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                box-shadow: 0 10px 30px rgba(255, 87, 34, 0.55), 0 4px 12px rgba(0,0,0,0.6);
                transition: transform 0.25s ease, background 0.25s ease;
                z-index: 100000000;
                padding: 0;
            }
            .ai-lightbox-close-btn:hover,
            .ai-lightbox-close-btn:active {
                transform: scale(1.1) rotate(90deg);
                background: #ff3d00;
            }
            .ai-lightbox-scroll-area {
                max-width: 96vw;
                max-height: 88vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                overflow: auto;
                -webkit-overflow-scrolling: touch;
            }
            .ai-lightbox-img-el {
                max-width: 100%;
                max-height: 80vh;
                width: auto;
                height: auto;
                object-fit: contain;
                border-radius: 16px;
                border: 2px solid rgba(255, 87, 34, 0.45);
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.9), 0 0 35px rgba(255, 87, 34, 0.25);
                transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
                cursor: zoom-in;
            }
            .ai-lightbox-img-el.is-zoomed {
                max-width: none;
                max-height: none;
                width: 160%;
                cursor: zoom-out;
            }
            .ai-lightbox-caption-text {
                margin-top: 14px;
                background: rgba(15, 23, 42, 0.92);
                border: 1px solid rgba(255, 87, 34, 0.35);
                padding: 8px 20px;
                border-radius: 50px;
                color: #ffffff;
                font-size: 0.88rem;
                font-weight: 700;
                text-align: center;
                max-width: 90vw;
            }
            .ai-lightbox-zoom-hint {
                margin-top: 6px;
                font-size: 0.72rem;
                color: #94a3b8;
                letter-spacing: 0.4px;
            }
            @media (max-width: 768px) {
                .ai-lightbox-close-btn {
                    top: 16px;
                    right: 16px;
                    width: 48px;
                    height: 48px;
                    font-size: 2rem;
                }
                .ai-lightbox-scroll-area {
                    padding-top: 64px;
                    max-height: 94vh;
                }
                .ai-lightbox-img-el {
                    max-height: 75vh;
                    width: 100%;
                    border-radius: 12px;
                }
                .ai-lightbox-img-el.is-zoomed {
                    width: 220%;
                    max-width: none;
                    max-height: none;
                }
                .ai-lightbox-caption-text {
                    font-size: 0.78rem;
                    padding: 6px 14px;
                }
            }
        </style>

        <div style="max-width: 1320px; margin: 0 auto; position: relative;">
            
            <!-- Section Header (On White Background) -->
            <div style="text-align: center; max-width: 960px; margin: 0 auto;">
                <div style="display: inline-flex; align-items: center; gap: 8px; padding: 8px 24px; background: rgba(255, 87, 34, 0.08); border: 1px solid rgba(255, 87, 34, 0.28); border-radius: 50px; font-size: 0.82rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; color: #ff5722; margin-bottom: 22px;">
                    <i class="fas fa-microchip"></i>
                    Verified Proof • Ranked in ChatGPT, Google Gemini &amp; AI Search
                </div>
                <h2 style="font-family: 'Outfit', sans-serif; font-size: clamp(2.4rem, 4.8vw, 3.8rem); font-weight: 900; line-height: 1.15; color: #0f172a; margin: 0 0 18px;">
                    We Rank Your Brand &amp; Blogs in <span style="background: linear-gradient(135deg, #ff5722 0%, #ff8a50 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">ChatGPT, Gemini &amp; AI Search</span>
                </h2>
                <p style="font-size: 1.15rem; color: #475569; line-height: 1.7; margin: 0;">
                    Search isn't just traditional Google anymore. High-intent buyers prompt <strong>OpenAI ChatGPT</strong> and <strong>Google Gemini</strong> for buying advice. By researching conversational prompt keywords, writing structured EEAT ranking blogs, and engineering entity authority, Fusion X ranks our client brands and blogs directly in ChatGPT, Gemini, and AI search engines.
                </p>
            </div>

            <!-- AI RESULT SHOWCASE DIV (Sleek Black Background + Interactive Orange Dots) -->
            <div class="ai-proof-black-box fx-has-orange-dots">
                <div class="ai-proof-inner-content">
                    
                    <!-- Top Proof Header Strip inside the Black Box -->
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; margin-bottom: 34px; padding-bottom: 20px; border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
                        <div style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/logo.webp" alt="Nilaro Logo" style="height: 38px; background: #fff; padding: 3px 8px; border-radius: 8px; object-fit: contain;">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani/logo.png" alt="Bhawani Logo" style="height: 38px; background: #fff; padding: 3px 8px; border-radius: 8px; object-fit: contain;">
                            </div>
                            <span style="background: rgba(255, 87, 34, 0.18); color: #ff8a50; border: 1px solid rgba(255, 87, 34, 0.4); padding: 5px 14px; border-radius: 50px; font-size: 0.78rem; font-weight: 800; letter-spacing: 1px; text-transform: uppercase;">
                                ★ LIVE AUDITED CHATGPT, GEMINI &amp; AI SEARCH CITATIONS
                            </span>
                        </div>
                        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                            <span style="background: rgba(16, 163, 127, 0.2); border: 1px solid rgba(16, 163, 127, 0.5); color: #10a37f; padding: 5px 14px; border-radius: 20px; font-size: 0.76rem; font-weight: 800;">
                                <i class="fas fa-robot"></i> ChatGPT Search #1
                            </span>
                            <span style="background: rgba(16, 185, 129, 0.18); border: 1px solid rgba(16, 185, 129, 0.45); color: #34d399; padding: 5px 14px; border-radius: 20px; font-size: 0.76rem; font-weight: 800;">
                                <i class="fas fa-sparkles"></i> Gemini AI #1
                            </span>
                            <span style="background: rgba(255, 87, 34, 0.18); border: 1px solid rgba(255, 87, 34, 0.45); color: #ff8a50; padding: 5px 14px; border-radius: 20px; font-size: 0.76rem; font-weight: 800;">
                                <i class="fas fa-fire"></i> 900+ Calls/Mo Record
                            </span>
                            <span style="background: rgba(255, 87, 34, 0.18); border: 1px solid rgba(255, 87, 34, 0.45); color: #ff8a50; padding: 5px 14px; border-radius: 20px; font-size: 0.76rem; font-weight: 800;">
                                <i class="fas fa-chart-line"></i> 4x Investment ROI
                            </span>
                        </div>
                    </div>

                    <!-- 3-Image Proof Showcase Grid: ChatGPT + Gemini + AI Overviews -->
                    <div class="ai-proof-grid" style="grid-template-columns: repeat(auto-fit, minmax(min(100%, 350px), 1fr));">
                        
                        <!-- Proof Card 1: Bhawani Corner in OpenAI ChatGPT Search -->
                        <div class="ai-proof-showcase-card">
                            <div>
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
                                    <div style="display: flex; align-items: center; gap: 12px;">
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani/logo.png" alt="Bhawani Corner Logo" style="width: 40px; height: 40px; border-radius: 10px; background: #fff; padding: 4px; object-fit: contain;">
                                        <div>
                                            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.25rem; font-weight: 800; margin: 0; color: #fff;">Bhawani Corner</h3>
                                            <span style="font-size: 0.76rem; color: #10a37f; font-weight: 700; text-transform: uppercase;"><i class="fas fa-robot"></i> OpenAI ChatGPT #1 Result</span>
                                        </div>
                                    </div>
                                    <span style="background: rgba(16, 163, 127, 0.18); border: 1px solid rgba(16, 163, 127, 0.5); color: #34d399; padding: 4px 12px; border-radius: 20px; font-size: 0.74rem; font-weight: 800;">
                                        #1 Crockery Shop
                                    </span>
                                </div>
                                <p style="font-size: 0.92rem; color: #cbd5e1; line-height: 1.6; margin-bottom: 18px;">
                                    When users prompt ChatGPT for <strong>"Best Crockery Shops in Chennai"</strong>, ChatGPT recommends <strong>1. Bhawani Corner Glassware Pvt Ltd</strong> first, highlighting dinnerware, glassware, and citing our blog data.
                                </p>
                            </div>

                            <div class="ai-zoomable-img-wrap" style="position: relative; border-radius: 16px; overflow: hidden; border: 1px solid rgba(16, 163, 127, 0.4); background: #000; box-shadow: 0 12px 30px rgba(0,0,0,0.6);">
                                <span class="ai-zoom-hint-pill"><i class="fas fa-search-plus"></i> Tap to view big</span>
                                <picture>
                                    <source srcset="ai-proof/fusion-x-bhawani-corner-chatgpt-search-ranking.webp" type="image/webp">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-chatgpt-search-ranking.png" alt="ChatGPT Search: Bhawani Corner Ranked #1 Best Crockery Shop in Chennai" style="width: 100%; height: auto; display: block; transition: transform 0.4s ease;" loading="lazy">
                                </picture>
                                <div style="position: absolute; bottom: 10px; left: 10px; background: rgba(15, 23, 42, 0.92); backdrop-filter: blur(8px); padding: 5px 12px; border-radius: 20px; border: 1px solid rgba(16, 163, 127, 0.45); font-size: 0.72rem; font-weight: 700; color: #34d399;">
                                    <i class="fas fa-robot"></i> ChatGPT: Bhawani Corner Ranked #1
                                </div>
                            </div>
                        </div>

                        <!-- Proof Card 2: Nilaro Coffee in Google Gemini AI -->
                        <div class="ai-proof-showcase-card">
                            <div>
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
                                    <div style="display: flex; align-items: center; gap: 12px;">
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/nilaro/logo.webp" alt="Nilaro Coffee Logo" style="width: 40px; height: 40px; border-radius: 10px; background: #fff; padding: 4px; object-fit: contain;">
                                        <div>
                                            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.25rem; font-weight: 800; margin: 0; color: #fff;">Nilaro Coffee</h3>
                                            <span style="font-size: 0.76rem; color: #ff7043; font-weight: 700; text-transform: uppercase;"><i class="fas fa-sparkles"></i> Google Gemini #1 AI</span>
                                        </div>
                                    </div>
                                    <span style="background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.4); color: #34d399; padding: 4px 12px; border-radius: 20px; font-size: 0.74rem; font-weight: 800;">
                                        #1 Best Chicory
                                    </span>
                                </div>
                                <p style="font-size: 0.92rem; color: #cbd5e1; line-height: 1.6; margin-bottom: 18px;">
                                    When users prompt Google Gemini for <strong>"Best Chicory Coffee"</strong>, Gemini officially names Nilaro Coffee as <em>#1 Best Overall Traditional Blend</em>, quoting our blog decoction ratios and linking to <code>nilaro.in</code>.
                                </p>
                            </div>

                            <div class="ai-zoomable-img-wrap" style="position: relative; border-radius: 16px; overflow: hidden; border: 1px solid rgba(255, 87, 34, 0.35); background: #000; box-shadow: 0 12px 30px rgba(0,0,0,0.6);">
                                <span class="ai-zoom-hint-pill"><i class="fas fa-search-plus"></i> Tap to view big</span>
                                <picture>
                                    <source srcset="ai-proof/fusion-x-nilaro-google-gemini-ai-ranking.webp" type="image/webp">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-nilaro-google-gemini-ai-ranking.png" alt="Google Gemini: Nilaro Coffee Recommending #1 Best Chicory Coffee Brand" style="width: 100%; height: auto; display: block; transition: transform 0.4s ease;" loading="lazy">
                                </picture>
                                <div style="position: absolute; bottom: 10px; left: 10px; background: rgba(15, 23, 42, 0.92); backdrop-filter: blur(8px); padding: 5px 12px; border-radius: 20px; border: 1px solid rgba(255, 87, 34, 0.4); font-size: 0.72rem; font-weight: 700; color: #ff7043;">
                                    <i class="fas fa-sparkles"></i> Google Gemini: Nilaro Ranked #1
                                </div>
                            </div>
                        </div>

                        <!-- Proof Card 3: Bhawani Corner in Google AI Overviews & Map Pack -->
                        <div class="ai-proof-showcase-card">
                            <div>
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
                                    <div style="display: flex; align-items: center; gap: 12px;">
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/brands/bhawani/logo.png" alt="Bhawani Corner Logo" style="width: 40px; height: 40px; border-radius: 10px; background: #fff; padding: 4px; object-fit: contain;">
                                        <div>
                                            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.25rem; font-weight: 800; margin: 0; color: #fff;">Bhawani Corner</h3>
                                            <span style="font-size: 0.76rem; color: #ff7043; font-weight: 700; text-transform: uppercase;"><i class="fas fa-trophy"></i> AI Overviews &bull; 900+ Calls</span>
                                        </div>
                                    </div>
                                    <span style="background: rgba(255, 87, 34, 0.15); border: 1px solid rgba(255, 87, 34, 0.4); color: #ff7043; padding: 4px 12px; border-radius: 20px; font-size: 0.74rem; font-weight: 800;">
                                        <i class="fas fa-fire"></i> 4x ROI Record
                                    </span>
                                </div>
                                <p style="font-size: 0.92rem; color: #cbd5e1; line-height: 1.6; margin-bottom: 18px;">
                                    Selected in Google AI Overviews and Google AI Mode with Map Pack. Over <strong>900 inbound phone calls in a single month record</strong> delivered <strong>4x the entire investment</strong> in a 3-month technical SEO sprint!
                                </p>
                            </div>

                            <div class="ai-zoomable-img-wrap" style="position: relative; border-radius: 16px; overflow: hidden; border: 1px solid rgba(255, 87, 34, 0.35); background: #000; box-shadow: 0 12px 30px rgba(0,0,0,0.6);">
                                <span class="ai-zoom-hint-pill"><i class="fas fa-search-plus"></i> Tap to view big</span>
                                <picture>
                                    <source srcset="ai-proof/fusion-x-bhawani-corner-google-ai-overview-ranking.webp" type="image/webp">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ai-proof/fusion-x-bhawani-corner-google-ai-overview-ranking.png" alt="Google AI Overviews Map Pack: Bhawani Corner Ranked #1 with 900+ Inbound Calls Record" style="width: 100%; height: auto; display: block; transition: transform 0.4s ease;" loading="lazy">
                                </picture>
                                <div style="position: absolute; bottom: 10px; left: 10px; background: rgba(15, 23, 42, 0.92); backdrop-filter: blur(8px); padding: 5px 12px; border-radius: 20px; border: 1px solid rgba(255, 87, 34, 0.4); font-size: 0.72rem; font-weight: 700; color: #ff7043;">
                                    <i class="fas fa-phone-volume"></i> 900+ Direct Phone Calls in 1 Month Record
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Strategy Banner & Connected "See More" Button inside Black Box -->
                    <div class="ai-proof-strategy-bar" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 22px; padding: 30px 36px; display: flex; align-items: center; justify-content: space-between; gap: 26px; flex-wrap: wrap;">
                        <div style="max-width: 780px;">
                            <h4 style="font-family: 'Outfit', sans-serif; font-size: 1.35rem; font-weight: 800; color: #fff; margin: 0 0 8px;">
                                How Do We Rank Blogs &amp; Brands in ChatGPT &amp; AI Search?
                            </h4>
                            <p style="font-size: 0.95rem; color: #cbd5e1; line-height: 1.65; margin: 0;">
                                We research the exact conversational prompts buyers ask ChatGPT and Gemini, write structured EEAT ranking blogs formatted for AI entity extraction, and build contextual authority backlinks. We do all possible ways to bring our client brands directly into generative AI search.
                            </p>
                        </div>
                        <div>
                            <a href="<?php echo esc_url( home_url( '/ai-search-results/' ) ); ?>" class="ai-proof-see-more-btn">
                                <span>See More AI &amp; ChatGPT Results</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Universal AI Proof Image Lightbox Modal with Cross Button -->
        <div id="ai-image-lightbox" class="ai-lightbox-modal" style="display: none;" aria-hidden="true">
            <button class="ai-lightbox-close-btn" aria-label="Close enlarged map" title="Close (Esc)">&times;</button>
            <div class="ai-lightbox-scroll-area">
                <img id="ai-lightbox-img" class="ai-lightbox-img-el" src="" alt="Enlarged Proof Map">
                <div id="ai-lightbox-caption" class="ai-lightbox-caption-text"></div>
                <div class="ai-lightbox-zoom-hint"><i class="fas fa-hand-pointer"></i> Tap map/image to toggle extra zoom</div>
            </div>
        </div>

        <script>
            (function initAILightbox() {
                const overlay = document.getElementById('ai-image-lightbox');
                if (!overlay) return;
                const lightboxImg = document.getElementById('ai-lightbox-img');
                const lightboxCaption = document.getElementById('ai-lightbox-caption');
                const closeBtn = overlay.querySelector('.ai-lightbox-close-btn');

                function openLightbox(src, caption) {
                    lightboxImg.src = src;
                    lightboxImg.classList.remove('is-zoomed');
                    lightboxCaption.textContent = caption || '';
                    overlay.style.display = 'flex';
                    // force reflow
                    overlay.offsetHeight;
                    overlay.classList.add('active');
                    overlay.setAttribute('aria-hidden', 'false');
                    document.body.style.overflow = 'hidden';
                }

                function closeLightbox() {
                    overlay.classList.remove('active');
                    overlay.setAttribute('aria-hidden', 'true');
                    document.body.style.overflow = '';
                    lightboxImg.classList.remove('is-zoomed');
                    setTimeout(() => {
                        if (!overlay.classList.contains('active')) {
                            overlay.style.display = 'none';
                            lightboxImg.src = '';
                        }
                    }, 300);
                }

                closeBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    closeLightbox();
                });

                // Tap image inside lightbox to toggle zoom
                lightboxImg.addEventListener('click', (e) => {
                    e.stopPropagation();
                    lightboxImg.classList.toggle('is-zoomed');
                });

                overlay.addEventListener('click', (e) => {
                    if (e.target === overlay || e.target.classList.contains('ai-lightbox-scroll-area')) {
                        closeLightbox();
                    }
                });

                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && overlay.classList.contains('active')) {
                        closeLightbox();
                    }
                });

                // Attach click listener to all zoomable proof image wrappers
                document.querySelectorAll('.ai-zoomable-img-wrap, .ai-proof-showcase-card picture').forEach(el => {
                    el.addEventListener('click', (e) => {
                        e.preventDefault();
                        const img = el.querySelector('img') || el;
                        if (img) {
                            const pictureSource = el.querySelector('source');
                            const src = (pictureSource && pictureSource.srcset) ? pictureSource.srcset : img.currentSrc || img.src;
                            const caption = img.getAttribute('alt') || 'AI Search Result Proof';
                            openLightbox(src, caption);
                        }
                    });
                });
            })();
        </script>
    </section>

    <!-- ========================================================
         FUSION X 3D LOGO & PROVEN ACHIEVEMENTS SHOWCASE
         Replaces legacy globe/flight banner with interactive 3D logo & verified metrics
    ======================================================== -->
    <section id="achievements-showcase" class="achievements-section" style="padding: 100px 20px 95px; background: radial-gradient(circle at 50% 45%, rgba(255, 87, 34, 0.12) 0%, rgba(255, 87, 34, 0.02) 45%, transparent 70%), #070707; color: #ffffff; position: relative; overflow: hidden;">
        <!-- Anchor for backward compatibility with existing links -->
        <div id="worldwide-delivery" style="position: absolute; top: 0; left: 0; width: 1px; height: 1px; opacity: 0; pointer-events: none;"></div>

        <!-- Background ambient glow aura -->
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 700px; height: 450px; background: radial-gradient(ellipse at center, rgba(255, 87, 34, 0.15) 0%, transparent 70%); filter: blur(50px); pointer-events: none; z-index: 1;"></div>

        <style>
            .achieve-cockpit-grid {
                display: grid;
                grid-template-columns: 1fr 1.35fr 1fr;
                gap: 28px;
                align-items: center;
                max-width: 1360px;
                margin: 0 auto;
            }

            .achieve-col {
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            .achievement-card-box {
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.08);
                border-radius: 18px;
                padding: 24px;
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
                transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
                position: relative;
                overflow: hidden;
            }

            .achievement-card-box:hover {
                transform: translateY(-5px);
                border-color: rgba(255, 87, 34, 0.55);
                background: rgba(255, 87, 34, 0.06);
                box-shadow: 0 16px 40px rgba(255, 87, 34, 0.18), 0 0 25px rgba(255, 87, 34, 0.1);
            }

            .card-icon-circle {
                width: 44px;
                height: 44px;
                border-radius: 12px;
                background: rgba(255, 87, 34, 0.12);
                border: 1px solid rgba(255, 87, 34, 0.3);
                color: #ff5722;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 1.15rem;
                margin-bottom: 14px;
                transition: all 0.3s ease;
            }

            .achievement-card-box:hover .card-icon-circle {
                background: #ff5722;
                color: #ffffff;
                box-shadow: 0 0 20px rgba(255, 87, 34, 0.6);
                transform: scale(1.08);
            }

            .card-stat-wrap {
                font-family: 'Outfit', sans-serif;
                font-size: 2.3rem;
                font-weight: 900;
                line-height: 1;
                color: #ffffff;
                display: flex;
                align-items: baseline;
                gap: 2px;
                margin-bottom: 8px;
            }

            .achieve-prefix, .achieve-suffix {
                color: #ff5722;
                font-weight: 800;
            }

            .card-title-text {
                font-family: 'Outfit', sans-serif;
                font-size: 1.05rem;
                font-weight: 700;
                color: #f5f5f5;
                margin: 0 0 8px;
                letter-spacing: -0.01em;
            }

            .card-desc-text {
                font-family: 'Space Grotesk', sans-serif;
                font-size: 0.86rem;
                line-height: 1.55;
                color: #9e9e9e;
                margin: 0;
            }

            /* Center Stage */
            .achieve-center-stage {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                position: relative;
            }

            .model-canvas-wrapper {
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                position: relative;
            }

            .fusion-3d-box {
                width: 100%;
                height: 480px;
                position: relative;
                cursor: grab;
                touch-action: pan-y;
                max-width: 100%;
            }

            .fusion-3d-box canvas {
                max-width: 100% !important;
                width: 100% !important;
                height: 100% !important;
                display: block !important;
            }

            .fusion-3d-box:active {
                cursor: grabbing;
            }

            .canvas-loader-overlay {
                position: absolute;
                inset: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 12px;
                background: rgba(10, 10, 10, 0.65);
                backdrop-filter: blur(8px);
                border-radius: 20px;
                transition: opacity 0.4s ease;
                z-index: 10;
            }

            .spinner-circle {
                width: 40px;
                height: 40px;
                border: 3px solid rgba(255, 87, 34, 0.2);
                border-top-color: #ff5722;
                border-radius: 50%;
                animation: spinLoader 0.8s linear infinite;
            }

            @keyframes spinLoader {
                to { transform: rotate(360deg); }
            }

            .interaction-hint-tag {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.12);
                border-radius: 30px;
                padding: 8px 18px;
                font-family: 'Space Grotesk', sans-serif;
                font-size: 0.82rem;
                color: #cccccc;
                margin-top: 10px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                pointer-events: none;
                max-width: 95%;
                box-sizing: border-box;
                text-align: center;
            }

            .hint-text-mobile {
                display: none;
            }

            .hint-pulse-dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: #ff5722;
                box-shadow: 0 0 10px #ff5722;
                animation: pulseHintDot 2s infinite ease-in-out;
            }

            @keyframes pulseHintDot {
                0%, 100% { opacity: 1; transform: scale(1); }
                50% { opacity: 0.4; transform: scale(0.85); }
            }

            /* Buttons */
            .achieve-cta-primary {
                background: linear-gradient(135deg, #ff5722 0%, #e64a19 100%);
                color: #ffffff;
                font-family: 'Outfit', sans-serif;
                font-size: 1.05rem;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 1px;
                padding: 16px 38px;
                border-radius: 50px;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 12px;
                box-shadow: 0 8px 25px rgba(255, 87, 34, 0.45);
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            }

            .achieve-cta-primary:hover {
                transform: translateY(-3px);
                box-shadow: 0 14px 35px rgba(255, 87, 34, 0.6);
            }

            .achieve-cta-secondary {
                background: rgba(255, 255, 255, 0.05);
                color: #ffffff;
                font-family: 'Outfit', sans-serif;
                font-size: 1.05rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 1px;
                padding: 16px 34px;
                border-radius: 50px;
                border: 1px solid rgba(255, 255, 255, 0.18);
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 10px;
                transition: all 0.3s ease;
            }

            .achieve-cta-secondary:hover {
                background: rgba(255, 255, 255, 0.12);
                border-color: #ff5722;
                transform: translateY(-3px);
            }

            /* Responsive Cockpit Layout */
            @media (max-width: 1100px) {
                .achieve-cockpit-grid {
                    grid-template-columns: minmax(0, 1fr) !important;
                    width: 100% !important;
                    gap: 32px !important;
                }
                .achieve-center-stage {
                    order: 1;
                    width: 100% !important;
                    max-width: 100% !important;
                    min-width: 0 !important;
                }
                .model-canvas-wrapper {
                    width: 100% !important;
                    max-width: 100% !important;
                }
                .fusion-3d-box {
                    height: 440px !important;
                    max-width: 100% !important;
                    width: 100% !important;
                }
                .achieve-col.left-col {
                    order: 2;
                    display: grid;
                    grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
                    gap: 16px;
                    width: 100% !important;
                    min-width: 0 !important;
                }
                .achieve-col.right-col {
                    order: 3;
                    display: grid;
                    grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
                    gap: 16px;
                    width: 100% !important;
                    min-width: 0 !important;
                }
            }

            @media (max-width: 860px) {
                .achieve-col.left-col,
                .achieve-col.right-col {
                    grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                }
                .fusion-3d-box {
                    height: 400px !important;
                }
            }

            @media (max-width: 600px) {
                .achieve-col.left-col,
                .achieve-col.right-col {
                    grid-template-columns: minmax(0, 1fr) !important;
                    width: 100% !important;
                }
                .achievement-card-box {
                    width: 100% !important;
                    max-width: 100% !important;
                    box-sizing: border-box !important;
                    padding: 22px 18px !important;
                }
                .card-desc-text {
                    word-break: normal !important;
                    overflow-wrap: break-word !important;
                }
                .fusion-3d-box {
                    height: 320px !important;
                    width: 100% !important;
                    max-width: 100% !important;
                }
                .achieve-cockpit-grid {
                    gap: 20px !important;
                    width: 100% !important;
                }
                .hint-text-full {
                    display: none !important;
                }
                .hint-text-mobile {
                    display: inline !important;
                }
                .interaction-hint-tag {
                    font-size: 0.74rem !important;
                    padding: 6px 14px !important;
                    gap: 6px !important;
                }
            }
        </style>

        <div class="achievements-container" style="max-width: 1380px; margin: 0 auto; position: relative; z-index: 2;">
            
            <!-- Section Header -->
            <div style="text-align: center; max-width: 900px; margin: 0 auto 55px;">
                <span class="achieve-eyebrow-tag" style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255, 87, 34, 0.12); border: 1px solid rgba(255, 87, 34, 0.35); color: #ff5722; font-size: 0.82rem; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; padding: 7px 18px; border-radius: 50px; margin-bottom: 22px;">
                    <i class="fas fa-award"></i> Proven Track Record &amp; Impact
                </span>
                <h2 style="font-family: 'Outfit', sans-serif; font-size: clamp(2.3rem, 5vw, 3.8rem); font-weight: 900; line-height: 1.15; color: #ffffff; margin: 0 0 18px;">
                    Delivering Brand Dominance <span style="background: linear-gradient(135deg, #ff5722 0%, #ff8a65 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Worldwide</span>
                </h2>
                <p style="font-family: 'Space Grotesk', sans-serif; font-size: 1.12rem; color: #aaaaaa; line-height: 1.6; margin: 0 auto; max-width: 760px;">
                    Explore our verified agency milestones. From local Google Maps 3-Pack rank acceleration to high-scale performance ad funnels, Fusion X architects sustainable digital market leadership.
                </p>
            </div>

            <!-- The Cockpit Layout: Left 3 Cards | Center 3D Logo | Right 3 Cards -->
            <div class="achieve-cockpit-grid">

                <!-- LEFT COLUMN: 3 Achievement Cards -->
                <div class="achieve-col left-col">
                    
                    <!-- Card 1: Happy Customers -->
                    <div class="achievement-card-box" data-side="left-top">
                        <div class="card-icon-circle"><i class="fas fa-crown"></i></div>
                        <div class="card-stat-wrap">
                            <span class="achieve-number" data-target="50">0</span><span class="achieve-suffix">+</span>
                        </div>
                        <h3 class="card-title-text">Happy Customers</h3>
                        <p class="card-desc-text">Empowering growing startups and enterprise brands with custom-coded platforms and revenue-generating digital funnels.</p>
                    </div>

                    <!-- Card 2: Inbound Calls -->
                    <div class="achievement-card-box" data-side="left-mid">
                        <div class="card-icon-circle"><i class="fas fa-phone-volume"></i></div>
                        <div class="card-stat-wrap">
                            <span class="achieve-number" data-target="900">0</span><span class="achieve-suffix">+</span>
                        </div>
                        <h3 class="card-title-text">Inbound Direct Phone Calls</h3>
                        <p class="card-desc-text">Generated in just 3 months for Bhawani Corner exclusively through high-intent local SEO and Google Maps dominance.</p>
                    </div>

                    <!-- Card 3: Visibility Surge -->
                    <div class="achievement-card-box" data-side="left-bot">
                        <div class="card-icon-circle"><i class="fas fa-chart-line"></i></div>
                        <div class="card-stat-wrap">
                            <span class="achieve-prefix">+</span><span class="achieve-number" data-target="280">0</span><span class="achieve-suffix">%</span>
                        </div>
                        <h3 class="card-title-text">Search Visibility Surge</h3>
                        <p class="card-desc-text">Explosive organic search footprint expansion using EEAT-structured data, entity linkages, and intent-focused silos.</p>
                    </div>

                </div>

                <!-- CENTER COLUMN: Interactive 3D Model Stage -->
                <div class="achieve-center-stage">
                    <div class="model-canvas-wrapper">
                        <!-- Canvas Container -->
                        <div id="fusion-3d-canvas-container" class="fusion-3d-box">
                            <!-- Loading Spinner Overlay -->
                            <div id="fusion-3d-loader" class="canvas-loader-overlay">
                                <div class="spinner-circle"></div>
                                <span class="spinner-text" style="color: #ff5722; font-family: 'Outfit', sans-serif; font-size: 0.95rem; font-weight: 700;">Loading 3D Logo...</span>
                            </div>
                        </div>

                        <!-- 3D Interactive Instruction Tag -->
                        <div class="interaction-hint-tag">
                            <span class="hint-pulse-dot"></span>
                            <i class="fas fa-compass" style="color:#ff5722;"></i>
                            <span class="hint-text-full">Interactive 3D Emblem • Move cursor or drag to tilt</span>
                            <span class="hint-text-mobile">Interactive 3D • Drag to tilt</span>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: 3 Achievement Cards -->
                <div class="achieve-col right-col">
                    
                    <!-- Card 4: In-House Specialists -->
                    <div class="achievement-card-box" data-side="right-top">
                        <div class="card-icon-circle"><i class="fas fa-users-cog"></i></div>
                        <div class="card-stat-wrap">
                            <span class="achieve-number" data-target="5">0</span>
                        </div>
                        <h3 class="card-title-text">In-House Dedicated Specialists</h3>
                        <p class="card-desc-text">Zero third-party freelancers. Hands-on IT engineering veterans across technical SEO, React, Angular, and Ads.</p>
                    </div>

                    <!-- Card 5: Projects Delivered -->
                    <div class="achievement-card-box" data-side="right-mid">
                        <div class="card-icon-circle"><i class="fas fa-award"></i></div>
                        <div class="card-stat-wrap">
                            <span class="achieve-number" data-target="100">0</span><span class="achieve-suffix">+</span>
                        </div>
                        <h3 class="card-title-text">Projects Successfully Delivered</h3>
                        <p class="card-desc-text">Specialized performance marketing, CRO funnels, custom web apps, and enterprise digital strategy.</p>
                    </div>

                    <!-- Card 6: 360 Full Coverage -->
                    <div class="achievement-card-box" data-side="right-bot">
                        <div class="card-icon-circle"><i class="fas fa-globe-americas"></i></div>
                        <div class="card-stat-wrap">
                            <span class="achieve-number" data-target="360">0</span><span class="achieve-suffix">°</span>
                        </div>
                        <h3 class="card-title-text">Full-Stack Digital Coverage</h3>
                        <p class="card-desc-text">Holistic coverage: Answer Engine Optimization (AEO), Generative Engine Optimization (GEO), and Custom Web Dev.</p>
                    </div>

                </div>

            </div>

            <!-- Bottom CTA Group -->
            <div style="margin-top: 55px; text-align: center; display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="achieve-cta-primary">
                    <span>Scale Your Brand Worldwide</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
                <a href="<?php echo esc_url( home_url( '/digital-marketing-services/' ) ); ?>" class="achieve-cta-secondary">
                    <i class="fas fa-layer-group"></i>
                    <span>Explore All Services</span>
                </a>
            </div>

        </div>
    </section>

    <!-- DIGITAL MARKETING SEO SECTION -->
    <section id="expertise" class="content-section" style="padding: 100px 20px; background-color: #080808; color: #fff; line-height: 1.6; position: relative; overflow: hidden;" class="dark-theme">
        <div style="max-width: 1200px; margin: 0 auto; position: relative; z-index: 2;">
            <div style="text-align: center; margin-bottom: 60px;">
                <h2 class="cta-h2" style=" margin-bottom: 20px; color: #fff;">Your Premier <span style="color: #ff5722;">Digital Marketing Agency Near Me</span></h2>
                <p style="font-size: 1.1rem; color: #ccc; max-width: 800px; margin: 0 auto; text-align: justify;">
                    In today's fast-paced digital world, building a strong online presence requires more than just a website. If you are searching for a <strong>digital marketing agency near me</strong>, we specialize in data-driven digital strategy that accelerates brand growth, drives lead generation, and maximizes your return on investment locally and globally.
                </p>
            </div>

            <div class="services-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
                <!-- Web Development -->
                <article class="seo-card" style="padding: 35px; border-radius: 12px; background: #ffffff; border-top: 4px solid #ff5722; box-shadow: 0 4px 15px rgba(0,0,0,0.03); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 15px; display: flex; align-items: center; gap: 12px; color: #222;">
                        <i class="fas fa-laptop-code" style="color: #ff5722; font-size: 1.5rem;"></i> Web Development
                    </h3>
                    <p style="color: #666; font-size: 0.95rem;">
                        Your website is your digital storefront. Our custom <strong>web development</strong> and web design solutions ensure your site is blazing fast, mobile-responsive, and optimized for seamless user experiences that convert visitors into loyal customers.
                    </p>
                </article>

                <!-- SEO -->
                <article class="seo-card" style="padding: 35px; border-radius: 12px; background: #ffffff; border-top: 4px solid #ff5722; box-shadow: 0 4px 15px rgba(0,0,0,0.03); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 15px; display: flex; align-items: center; gap: 12px; color: #222;">
                        <i class="fas fa-search" style="color: #ff5722; font-size: 1.5rem;"></i> SEO
                    </h3>
                    <p style="color: #666; font-size: 0.95rem;">
                        Climb the search rankings and dominate organic search results. Our advanced <strong>SEO</strong> strategies improve your visibility and technical structure, driving high-quality, high-intent organic traffic directly to your business.
                    </p>
                </article>

                <!-- Social Media Management -->
                <article class="seo-card" style="padding: 35px; border-radius: 12px; background: #ffffff; border-top: 4px solid #ff5722; box-shadow: 0 4px 15px rgba(0,0,0,0.03); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 15px; display: flex; align-items: center; gap: 12px; color: #222;">
                        <i class="fas fa-share-alt" style="color: #ff5722; font-size: 1.5rem;"></i> Social Media Management
                    </h3>
                    <p style="color: #666; font-size: 0.95rem;">
                        Engage your audience where they spend their time. Our proactive <strong>social media management</strong> builds vibrant communities, fosters brand loyalty, and amplifies your voice across all major social platforms.
                    </p>
                </article>

                <!-- Meta & Google Ads -->
                <article class="seo-card" style="padding: 35px; border-radius: 12px; background: #ffffff; border-top: 4px solid #ff5722; box-shadow: 0 4px 15px rgba(0,0,0,0.03); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 15px; display: flex; align-items: center; gap: 12px; color: #222;">
                        <i class="fas fa-bullhorn" style="color: #ff5722; font-size: 1.5rem;"></i> Digital Advertising
                    </h3>
                    <p style="color: #666; font-size: 0.95rem;">
                        Generate immediate leads with precision-targeted digital advertising campaigns. We design and manage highly profitable <strong>Meta Ads</strong> and <strong>Google Ads</strong> to ensure you reach the right audience at the perfect moment.
                    </p>
                </article>

                <!-- Email Marketing -->
                <article class="seo-card" style="padding: 35px; border-radius: 12px; background: #ffffff; border-top: 4px solid #ff5722; box-shadow: 0 4px 15px rgba(0,0,0,0.03); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 15px; display: flex; align-items: center; gap: 12px; color: #222;">
                        <i class="fas fa-envelope-open-text" style="color: #ff5722; font-size: 1.5rem;"></i> Email Marketing
                    </h3>
                    <p style="color: #666; font-size: 0.95rem;">
                        Nurture leads and drive repeat business with personalized <strong>email marketing</strong> automations. We craft compelling newsletters and targeted drip campaigns that keep your audience engaged and ready to buy.
                    </p>
                </article>

                <!-- Brand Consulting -->
                <article class="seo-card" style="padding: 35px; border-radius: 12px; background: #ffffff; border-top: 4px solid #ff5722; box-shadow: 0 4px 15px rgba(0,0,0,0.03); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 15px; display: flex; align-items: center; gap: 12px; color: #222;">
                        <i class="fas fa-lightbulb" style="color: #ff5722; font-size: 1.5rem;"></i> Brand Consulting
                    </h3>
                    <p style="color: #666; font-size: 0.95rem;">
                        Stand out in a crowded market. Our expert <strong>Brand consulting</strong> services help you define your unique value proposition, craft a cohesive corporate identity, and formulate a winning long-term strategy.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <!-- OUR TRUSTED BRANDS & PRODUCTS SHOWCASE -->
    <section id="brands" class="brands-section">
        <div class="brands-header-wrap">
            <span class="brands-pill-tag"><i class="fa-solid fa-gem"></i> Client Partnerships & Products</span>
            <h2 class="brands-main-title">Our Trusted <span class="brands-orange-gradient">Brands & Products</span></h2>
            <p class="brands-subtitle">Accelerating market leaders, high-growth startups & visionary product brands with proven ROI</p>
        </div>
        <div id="brands-3d-container"></div>
    </section>

    <!-- FAQ SECTION WITH SCHEMA -->

    <!-- NEW KINETIC SLAM ANIMATION SEQUENCE -->
    <section id="fusion-shatter" style="background: #080808; width: 100%; min-height: 60vh; padding: 20px 20px; display: flex; flex-direction: column; align-items: center; justify-content: center; overflow: hidden; position: relative;" class="dark-theme">
        
        <div id="shatter-canvas-container" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; pointer-events: none;"></div>
<style>
            .text-3d {
                text-shadow: 
                    1px 1px 0px #b03a15,
                    2px 2px 0px #b03a15,
                    3px 3px 0px #b03a15,
                    4px 4px 0px #b03a15,
                    5px 5px 0px #b03a15,
                    6px 6px 0px #b03a15,
                    7px 7px 0px #b03a15,
                    8px 8px 10px rgba(0,0,0,0.6);
            }
            .slam-letter {
                display: inline-block;
                opacity: 0;
                transform: scale(15) translateZ(0);
            }
            .is-slamming {
                animation: kineticSlam 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            }
            @keyframes kineticSlam {
                0% { transform: scale(15) translateY(-200px); opacity: 0; }
                50% { opacity: 1; }
                100% { transform: scale(1) translateY(0); opacity: 1; }
            }
            .screen-shake {
                animation: shake 0.3s cubic-bezier(.36,.07,.19,.97) both;
            }
            @keyframes shake {
                10%, 90% { transform: translate3d(-2px, 0, 0); }
                20%, 80% { transform: translate3d(3px, 0, 0); }
                30%, 50%, 70% { transform: translate3d(-6px, 0, 0); }
                40%, 60% { transform: translate3d(6px, 0, 0); }
            }
        
            .fusion-h1 { font-size: 8rem; }
            .x-h1 { font-size: 10rem; }
            .cta-h2 { font-size: 2.5rem; }
            
            @media (max-width: 768px) {
                .fusion-h1 { font-size: 3rem !important; }
                .x-h1 { font-size: 4.5rem !important; }
                .cta-h2 { font-size: 1.6rem !important; line-height: 1.3; padding: 0 10px; }
                #fusion-text-container { gap: 15px !important; flex-wrap: wrap; margin-bottom: 30px !important; }
                #fusion-shatter { padding: 50px 10px !important; min-height: auto !important; }
            }

        .elegant-reveal {
            opacity: 0;
            transform: translateY(60px) rotateX(-30deg);
            transition: all 1.2s cubic-bezier(0.25, 1, 0.5, 1);
            transform-origin: bottom center;
        }
        .elegant-reveal.is-visible {
            opacity: 1;
            transform: translateY(0) rotateX(0);
        }

        </style>

        <!-- FUSION X Side by Side -->
        <div id="fusion-text-container" style="display: flex; align-items: center; justify-content: center; gap: 40px; margin-bottom: 60px; perspective: 1000px; position: relative; z-index: 10;">
            <div class="text-3d fusion-h1 elegant-reveal" aria-hidden="true" style="font-weight: 900; color: #ff5722; margin: 0; text-transform: uppercase;">
                FUSION
            </div>
            <div class="text-3d x-h1 elegant-reveal" aria-hidden="true" style="font-weight: 900; color: #ff5722; margin: 0; position: relative; transition-delay: 0.2s;" id="x-letter">
                X
            </div>
        </div>
        
        <!-- Fused CTA Text -->
        <div id="cta-reveal-container" class="elegant-reveal" style="position: relative; z-index: 3; text-align: center; transition-delay: 0.4s;">
            <h2 class="cta-h2" style="color: #ff5722; font-weight: 800; margin-bottom: 30px;">
                Ready to Skyrocket Your Brand's Success?
            </h2>
            
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="display: inline-block; background: #ff5722; color: #fff; text-decoration: none; font-size: 1.2rem; font-weight: bold; padding: 15px 40px; border-radius: 50px; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 4px 15px rgba(255, 87, 34, 0.4); transition: transform 0.2s, box-shadow 0.2s;">Take Your Brand Worldwide</a>
        </div>
    </section>

    <section id="faq" style="padding: 100px 20px; background-color: #ffffff; border-top: 1px solid #eee;">
        <div style="max-width: 900px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 60px;">
                <h2 class="cta-h2" style=" color: #111; margin-bottom: 15px;">Frequently Asked Questions</h2>
                <p style="color: #666; font-size: 1.1rem;">Expert insights from your trusted <strong>digital marketing agency near me</strong>.</p>
            </div>
            
            <div class="faq-accordion">

                <div class="faq-item" style="background: #fff; margin-bottom: 15px; border-radius: 8px; border: 1px solid #eaeaea; box-shadow: 0 4px 10px rgba(0,0,0,0.02); overflow: hidden;">
                    <button class="faq-question" style="width: 100%; text-align: left; padding: 25px; font-size: 1.1rem; font-weight: 600; color: #222; background: none; border: none; cursor: pointer; display: flex; justify-content: space-between; align-items: center; outline: none; font-family: inherit;">
                        <span>How do I find the top digital marketing agencies near me?</span>
                        <i class="fas fa-chevron-down" style="color: #ff5722; transition: transform 0.3s ease; flex-shrink: 0; margin-left: 15px;"></i>
                    </button>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.175, 0.885, 0.32, 1);">
                        <p style="padding: 0 25px 25px 25px; margin: 0; color: #555; line-height: 1.7; font-size: 1rem;">
                            When searching for 'digital marketing near me,' look for an agency with a proven track record of driving local SEO results, transparent reporting, and verifiable client testimonials. As a premier agency, Fusion X leverages data-driven digital strategies and extensive local market expertise to ensure your business ranks at the top of Google and AI search results.
                        </p>
                    </div>
                </div>

                <div class="faq-item" style="background: #fff; margin-bottom: 15px; border-radius: 8px; border: 1px solid #eaeaea; box-shadow: 0 4px 10px rgba(0,0,0,0.02); overflow: hidden;">
                    <button class="faq-question" style="width: 100%; text-align: left; padding: 25px; font-size: 1.1rem; font-weight: 600; color: #222; background: none; border: none; cursor: pointer; display: flex; justify-content: space-between; align-items: center; outline: none; font-family: inherit;">
                        <span>What are the key components of a successful local digital marketing strategy?</span>
                        <i class="fas fa-chevron-down" style="color: #ff5722; transition: transform 0.3s ease; flex-shrink: 0; margin-left: 15px;"></i>
                    </button>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.175, 0.885, 0.32, 1);">
                        <p style="padding: 0 25px 25px 25px; margin: 0; color: #555; line-height: 1.7; font-size: 1rem;">
                            A robust local digital strategy requires comprehensive Google Business Profile optimization, targeted local SEO, hyper-localized Meta Ads, and strong brand consulting. By aligning these components with AEO (Answer Engine Optimization) and GEO (Generative Engine Optimization), we ensure your business captures high-intent local traffic effectively.
                        </p>
                    </div>
                </div>

                <div class="faq-item" style="background: #fff; margin-bottom: 15px; border-radius: 8px; border: 1px solid #eaeaea; box-shadow: 0 4px 10px rgba(0,0,0,0.02); overflow: hidden;">
                    <button class="faq-question" style="width: 100%; text-align: left; padding: 25px; font-size: 1.1rem; font-weight: 600; color: #222; background: none; border: none; cursor: pointer; display: flex; justify-content: space-between; align-items: center; outline: none; font-family: inherit;">
                        <span>What are the best digital marketing services available nearby?</span>
                        <i class="fas fa-chevron-down" style="color: #ff5722; transition: transform 0.3s ease; flex-shrink: 0; margin-left: 15px;"></i>
                    </button>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.175, 0.885, 0.32, 1);">
                        <p style="padding: 0 25px 25px 25px; margin: 0; color: #555; line-height: 1.7; font-size: 1rem;">
                            The most impactful services for local dominance include custom web development, advanced SEO, proactive social media management, and precision-targeted Google Ads. Our agency provides these full-suite digital marketing services near you, tailored specifically to convert local clicks into loyal customers.
                        </p>
                    </div>
                </div>

                <div class="faq-item" style="background: #fff; margin-bottom: 15px; border-radius: 8px; border: 1px solid #eaeaea; box-shadow: 0 4px 10px rgba(0,0,0,0.02); overflow: hidden;">
                    <button class="faq-question" style="width: 100%; text-align: left; padding: 25px; font-size: 1.1rem; font-weight: 600; color: #222; background: none; border: none; cursor: pointer; display: flex; justify-content: space-between; align-items: center; outline: none; font-family: inherit;">
                        <span>How much should a small business budget for digital marketing services?</span>
                        <i class="fas fa-chevron-down" style="color: #ff5722; transition: transform 0.3s ease; flex-shrink: 0; margin-left: 15px;"></i>
                    </button>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.175, 0.885, 0.32, 1);">
                        <p style="padding: 0 25px 25px 25px; margin: 0; color: #555; line-height: 1.7; font-size: 1rem;">
                            Small businesses should typically allocate 7-12% of their gross revenue toward marketing. When investing in digital marketing near me, look for scalable packages. We offer transparent, ROI-focused affordable digital marketing packages designed to deliver maximum value without compromising on quality or expertise.
                        </p>
                    </div>
                </div>

                <div class="faq-item" style="background: #fff; margin-bottom: 15px; border-radius: 8px; border: 1px solid #eaeaea; box-shadow: 0 4px 10px rgba(0,0,0,0.02); overflow: hidden;">
                    <button class="faq-question" style="width: 100%; text-align: left; padding: 25px; font-size: 1.1rem; font-weight: 600; color: #222; background: none; border: none; cursor: pointer; display: flex; justify-content: space-between; align-items: center; outline: none; font-family: inherit;">
                        <span>How do I compare local digital marketing companies for small businesses?</span>
                        <i class="fas fa-chevron-down" style="color: #ff5722; transition: transform 0.3s ease; flex-shrink: 0; margin-left: 15px;"></i>
                    </button>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.175, 0.885, 0.32, 1);">
                        <p style="padding: 0 25px 25px 25px; margin: 0; color: #555; line-height: 1.7; font-size: 1rem;">
                            Evaluate local digital marketing companies by reviewing their case studies, specific expertise in your niche, and their approach to modern SEO and AEO. A top-tier agency will offer customized strategies rather than one-size-fits-all solutions, demonstrating strong E-E-A-T (Experience, Expertise, Authoritativeness, Trustworthiness).
                        </p>
                    </div>
                </div>

                <div class="faq-item" style="background: #fff; margin-bottom: 15px; border-radius: 8px; border: 1px solid #eaeaea; box-shadow: 0 4px 10px rgba(0,0,0,0.02); overflow: hidden;">
                    <button class="faq-question" style="width: 100%; text-align: left; padding: 25px; font-size: 1.1rem; font-weight: 600; color: #222; background: none; border: none; cursor: pointer; display: flex; justify-content: space-between; align-items: center; outline: none; font-family: inherit;">
                        <span>Where can I find reputable digital marketing agencies specializing in local businesses?</span>
                        <i class="fas fa-chevron-down" style="color: #ff5722; transition: transform 0.3s ease; flex-shrink: 0; margin-left: 15px;"></i>
                    </button>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.175, 0.885, 0.32, 1);">
                        <p style="padding: 0 25px 25px 25px; margin: 0; color: #555; line-height: 1.7; font-size: 1rem;">
                            You can find reputable partners by checking trusted directories, reading verified Google reviews, and requesting local case studies. Fusion X specializes in empowering local businesses with bespoke digital solutions, boasting over 50+ happy customer partnerships and hundreds of generated inbound calls.
                        </p>
                    </div>
                </div>

                <div class="faq-item" style="background: #fff; margin-bottom: 15px; border-radius: 8px; border: 1px solid #eaeaea; box-shadow: 0 4px 10px rgba(0,0,0,0.02); overflow: hidden;">
                    <button class="faq-question" style="width: 100%; text-align: left; padding: 25px; font-size: 1.1rem; font-weight: 600; color: #222; background: none; border: none; cursor: pointer; display: flex; justify-content: space-between; align-items: center; outline: none; font-family: inherit;">
                        <span>Do you offer affordable digital marketing packages near me?</span>
                        <i class="fas fa-chevron-down" style="color: #ff5722; transition: transform 0.3s ease; flex-shrink: 0; margin-left: 15px;"></i>
                    </button>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.175, 0.885, 0.32, 1);">
                        <p style="padding: 0 25px 25px 25px; margin: 0; color: #555; line-height: 1.7; font-size: 1rem;">
                            Yes, we provide highly competitive and affordable digital marketing packages tailored to your specific growth stage. Whether you need an entry-level local SEO boost or a comprehensive omnichannel digital strategy, our pricing models are strictly designed around delivering measurable ROI for your business.
                        </p>
                    </div>
                </div>

                <div class="faq-item" style="background: #fff; margin-bottom: 15px; border-radius: 8px; border: 1px solid #eaeaea; box-shadow: 0 4px 10px rgba(0,0,0,0.02); overflow: hidden;">
                    <button class="faq-question" style="width: 100%; text-align: left; padding: 25px; font-size: 1.1rem; font-weight: 600; color: #222; background: none; border: none; cursor: pointer; display: flex; justify-content: space-between; align-items: center; outline: none; font-family: inherit;">
                        <span>How do I compare local SEO service providers and their package offerings?</span>
                        <i class="fas fa-chevron-down" style="color: #ff5722; transition: transform 0.3s ease; flex-shrink: 0; margin-left: 15px;"></i>
                    </button>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.175, 0.885, 0.32, 1);">
                        <p style="padding: 0 25px 25px 25px; margin: 0; color: #555; line-height: 1.7; font-size: 1rem;">
                            When comparing local SEO service providers, prioritize agencies that emphasize technical SEO, high-quality content creation, and authoritative local link building. Look closely at exactly what is included in their packages - such as ongoing technical audits and AI optimization (GEO) - rather than just the bottom-line price.
                        </p>
                    </div>
                </div>

                <div class="faq-item" style="background: #fff; margin-bottom: 15px; border-radius: 8px; border: 1px solid #eaeaea; box-shadow: 0 4px 10px rgba(0,0,0,0.02); overflow: hidden;">
                    <button class="faq-question" style="width: 100%; text-align: left; padding: 25px; font-size: 1.1rem; font-weight: 600; color: #222; background: none; border: none; cursor: pointer; display: flex; justify-content: space-between; align-items: center; outline: none; font-family: inherit;">
                        <span>Where to get expert digital marketing consultation close by?</span>
                        <i class="fas fa-chevron-down" style="color: #ff5722; transition: transform 0.3s ease; flex-shrink: 0; margin-left: 15px;"></i>
                    </button>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.175, 0.885, 0.32, 1);">
                        <p style="padding: 0 25px 25px 25px; margin: 0; color: #555; line-height: 1.7; font-size: 1rem;">
                            If you are looking for an expert digital marketing consultation close by, our team provides in-depth, no-obligation strategy sessions. We analyze your current digital presence, identify crucial gaps in your local SEO and AEO, and map out a clear, actionable blueprint to dominate your local market.
                        </p>
                    </div>
                </div>

                <div class="faq-item" style="background: #fff; margin-bottom: 15px; border-radius: 8px; border: 1px solid #eaeaea; box-shadow: 0 4px 10px rgba(0,0,0,0.02); overflow: hidden;">
                    <button class="faq-question" style="width: 100%; text-align: left; padding: 25px; font-size: 1.1rem; font-weight: 600; color: #222; background: none; border: none; cursor: pointer; display: flex; justify-content: space-between; align-items: center; outline: none; font-family: inherit;">
                        <span>What questions should I ask a potential digital marketing partner?</span>
                        <i class="fas fa-chevron-down" style="color: #ff5722; transition: transform 0.3s ease; flex-shrink: 0; margin-left: 15px;"></i>
                    </button>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.175, 0.885, 0.32, 1);">
                        <p style="padding: 0 25px 25px 25px; margin: 0; color: #555; line-height: 1.7; font-size: 1rem;">
                            Always ask: 'How do you measure ROI?', 'Can you show me local case studies?', and 'How do you adapt to AI search and AEO?' A reliable digital marketing agency near me will provide transparent answers, detailed reporting structures, and a clear methodology for scaling your specific business.
                        </p>
                    </div>
                </div>

                <div class="faq-item" style="background: #fff; margin-bottom: 15px; border-radius: 8px; border: 1px solid #eaeaea; box-shadow: 0 4px 10px rgba(0,0,0,0.02); overflow: hidden;">
                    <button class="faq-question" style="width: 100%; text-align: left; padding: 25px; font-size: 1.1rem; font-weight: 600; color: #222; background: none; border: none; cursor: pointer; display: flex; justify-content: space-between; align-items: center; outline: none; font-family: inherit;">
                        <span>How does AEO and GEO impact my local digital marketing strategy?</span>
                        <i class="fas fa-chevron-down" style="color: #ff5722; transition: transform 0.3s ease; flex-shrink: 0; margin-left: 15px;"></i>
                    </button>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.175, 0.885, 0.32, 1);">
                        <p style="padding: 0 25px 25px 25px; margin: 0; color: #555; line-height: 1.7; font-size: 1rem;">
                            Answer Engine Optimization (AEO) and Generative Engine Optimization (GEO) are critical for modern search visibility. While traditional SEO optimizes for search engines, AEO and GEO ensure your brand is directly recommended by AI tools like ChatGPT and Google's AI Overviews. As your premier digital marketing agency near me, we aggressively implement these futuristic semantic keywords and content structures so you capture the next generation of online traffic.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FAQ JSON-LD SCHEMA (HIDDEN FOR SEO) -->
    <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "How do I find the top digital marketing agencies near me?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "When searching for 'digital marketing near me,' look for an agency with a proven track record of driving local SEO results, transparent reporting, and verifiable client testimonials. As a premier agency, Fusion X leverages data-driven digital strategies and extensive local market expertise to ensure your business ranks at the top of Google and AI search results."
            }
        },
        {
            "@type": "Question",
            "name": "What are the key components of a successful local digital marketing strategy?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "A robust local digital strategy requires comprehensive Google Business Profile optimization, targeted local SEO, hyper-localized Meta Ads, and strong brand consulting. By aligning these components with AEO (Answer Engine Optimization) and GEO (Generative Engine Optimization), we ensure your business captures high-intent local traffic effectively."
            }
        },
        {
            "@type": "Question",
            "name": "What are the best digital marketing services available nearby?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "The most impactful services for local dominance include custom web development, advanced SEO, proactive social media management, and precision-targeted Google Ads. Our agency provides these full-suite digital marketing services near you, tailored specifically to convert local clicks into loyal customers."
            }
        },
        {
            "@type": "Question",
            "name": "How much should a small business budget for digital marketing services?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Small businesses should typically allocate 7-12% of their gross revenue toward marketing. When investing in digital marketing near me, look for scalable packages. We offer transparent, ROI-focused affordable digital marketing packages designed to deliver maximum value without compromising on quality or expertise."
            }
        },
        {
            "@type": "Question",
            "name": "How do I compare local digital marketing companies for small businesses?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Evaluate local digital marketing companies by reviewing their case studies, specific expertise in your niche, and their approach to modern SEO and AEO. A top-tier agency will offer customized strategies rather than one-size-fits-all solutions, demonstrating strong E-E-A-T (Experience, Expertise, Authoritativeness, Trustworthiness)."
            }
        },
        {
            "@type": "Question",
            "name": "Where can I find reputable digital marketing agencies specializing in local businesses?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "You can find reputable partners by checking trusted directories, reading verified Google reviews, and requesting local case studies. Fusion X specializes in empowering local businesses with bespoke digital solutions, boasting over 50+ happy customer partnerships and hundreds of generated inbound calls."
            }
        },
        {
            "@type": "Question",
            "name": "Do you offer affordable digital marketing packages near me?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, we provide highly competitive and affordable digital marketing packages tailored to your specific growth stage. Whether you need an entry-level local SEO boost or a comprehensive omnichannel digital strategy, our pricing models are strictly designed around delivering measurable ROI for your business."
            }
        },
        {
            "@type": "Question",
            "name": "How do I compare local SEO service providers and their package offerings?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "When comparing local SEO service providers, prioritize agencies that emphasize technical SEO, high-quality content creation, and authoritative local link building. Look closely at exactly what is included in their packages\u2014such as ongoing technical audits and AI optimization (GEO)\u2014rather than just the bottom-line price."
            }
        },
        {
            "@type": "Question",
            "name": "Where to get expert digital marketing consultation close by?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "If you are looking for an expert digital marketing consultation close by, our team provides in-depth, no-obligation strategy sessions. We analyze your current digital presence, identify crucial gaps in your local SEO and AEO, and map out a clear, actionable blueprint to dominate your local market."
            }
        },
        {
            "@type": "Question",
            "name": "What questions should I ask a potential digital marketing partner?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Always ask: 'How do you measure ROI?', 'Can you show me local case studies?', and 'How do you adapt to AI search and AEO?' A reliable digital marketing agency near me will provide transparent answers, detailed reporting structures, and a clear methodology for scaling your specific business."
            }
        },
        {
            "@type": "Question",
            "name": "How does AEO and GEO impact my local digital marketing strategy?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Answer Engine Optimization (AEO) and Generative Engine Optimization (GEO) are critical for modern search visibility. While traditional SEO optimizes for search engines, AEO and GEO ensure your brand is directly recommended by AI tools like ChatGPT and Google's AI Overviews. As your premier digital marketing agency near me, we aggressively implement these futuristic semantic keywords and content structures so you capture the next generation of online traffic."
            }
        }
    ]
}
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                const button = item.querySelector('.faq-question');
                const answer = item.querySelector('.faq-answer');
                const icon = item.querySelector('.fas');
                
                button.addEventListener('click', () => {
                    const isOpen = answer.style.maxHeight && answer.style.maxHeight !== '0px';
                    
                    // Close all others softly
                    document.querySelectorAll('.faq-answer').forEach(a => a.style.maxHeight = '0px');
                    document.querySelectorAll('.faq-item .fas').forEach(i => i.style.transform = 'rotate(0deg)');
                    
                    if (!isOpen) {
                        answer.style.maxHeight = answer.scrollHeight + "px";
                        icon.style.transform = 'rotate(180deg)';
                    }
                });
            });
        });
    </script>

    <!-- Scripts -->
    
    
    
    
    
    
    
    

<?php
get_footer();
