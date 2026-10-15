<?php
/**
 * Template Name: Our Team
 *
 * @package Fusion_X
 */

get_header();
?>

<style>
        body {
            background-color: #050505;
            color: #ffffff;
            overflow-x: hidden;
            transition: background-color 0.8s ease;
            margin: 0;
        }

        /* Universal styling inherited from style.css */

        .team-typography {
            font-family: 'Space Grotesk', sans-serif;
        }

        #webgl-canvas {
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            z-index: 0;
            pointer-events: none;
        }

        .team-container {
            position: relative;
            z-index: 10;
        }

        /* Intro Section */
        .team-intro {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-family: 'Space Grotesk', sans-serif;
            position: relative;
            padding: 0 20px;
        }
        
        .team-intro h1 {
            font-size: clamp(3.5rem, 7.5vw, 6.5rem);
            font-weight: 900;
            margin: 0 0 24px 0;
            text-transform: uppercase;
            letter-spacing: -0.04em;
            background: linear-gradient(135deg, #ffffff 40%, #ff7a45 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 4px 30px rgba(255, 87, 34, 0.25));
        }

        .team-intro p {
            color: #ff5722;
            letter-spacing: 5px;
            font-weight: 700;
            font-size: 0.85rem;
            margin: 0;
            padding: 8px 24px;
            background: rgba(255, 87, 34, 0.08);
            border: 1px solid rgba(255, 87, 34, 0.25);
            border-radius: 100px;
            backdrop-filter: blur(8px);
            animation: floatBob 2.2s ease-in-out infinite;
        }

        @keyframes floatBob {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(6px); }
        }

        /* Member Sections & Cards */
        .member-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 120px 7% 70px;
            box-sizing: border-box;
            position: relative;
        }

        .member-content {
            max-width: 620px;
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, rgba(22, 22, 26, 0.80) 0%, rgba(12, 12, 16, 0.90) 100%);
            padding: 34px 38px;
            border-radius: 24px;
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 87, 34, 0.22);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.6), 0 0 35px rgba(255, 87, 34, 0.08);
            position: relative;
            overflow: hidden;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s ease, border-color 0.4s ease;
        }

        .member-content:hover {
            transform: translateY(-4px);
            border-color: rgba(255, 87, 34, 0.45);
            box-shadow: 0 30px 70px rgba(0, 0, 0, 0.7), 0 0 45px rgba(255, 87, 34, 0.15);
        }

        .member-content::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #ff5722, transparent);
            opacity: 0.8;
        }

        .member-section.right-align .member-content {
            margin-left: auto;
        }

        .member-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .member-image {
            width: 74px;
            height: 74px;
            border-radius: 20px;
            object-fit: cover;
            flex-shrink: 0;
            margin-bottom: 0;
            border: 2px solid #ff5722;
            box-shadow: 0 8px 24px rgba(255, 87, 34, 0.35);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
        }

        .member-content:hover .member-image {
            transform: scale(1.05);
            box-shadow: 0 10px 28px rgba(255, 87, 34, 0.5);
        }

        .member-meta {
            display: flex;
            flex-direction: column;
        }

        .member-name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(1.8rem, 2.3vw, 2.3rem);
            font-weight: 800;
            margin: 0;
            line-height: 1.15;
            letter-spacing: -0.02em;
            color: #ffffff;
        }

        .member-role {
            font-size: 0.85rem;
            color: #ff5722;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-top: 4px;
            margin-bottom: 0;
        }

        .member-desc {
            font-size: 0.98rem;
            line-height: 1.7;
            margin-bottom: 24px;
            color: #cbd5e1;
            font-weight: 400;
        }

        .member-desc strong {
            color: #ffffff;
            font-weight: 600;
        }

        .highlights {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .highlight-tag {
            background: rgba(255, 87, 34, 0.08);
            border: 1px solid rgba(255, 87, 34, 0.25);
            color: #ff5722;
            padding: 6px 14px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.78rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            box-shadow: 0 2px 10px rgba(255, 87, 34, 0.06);
            transition: all 0.25s ease;
            cursor: default;
        }

        .highlight-tag:hover {
            background: rgba(255, 87, 34, 0.18);
            border-color: #ff5722;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 87, 34, 0.2);
        }

        /* Light Theme Overrides */
        body.light-theme {
            background-color: #f8fafc;
            color: #0f172a;
        }

        body.light-theme .member-content {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.92) 0%, rgba(248, 250, 252, 0.96) 100%);
            border: 1px solid rgba(255, 87, 34, 0.25);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.07), 0 0 35px rgba(255, 87, 34, 0.06);
        }

        body.light-theme .member-name {
            color: #0f172a;
        }

        body.light-theme .member-desc {
            color: #475569;
        }

        body.light-theme .member-desc strong {
            color: #0f172a;
        }

        body.light-theme .highlight-tag {
            background: rgba(255, 87, 34, 0.08);
            border: 1px solid rgba(255, 87, 34, 0.3);
            color: #e64a19;
        }

        .gsap-reveal {
            opacity: 0;
            transform: translateY(30px);
        }

        @media (max-width: 992px) {
            .member-section {
                padding: 110px 20px 60px;
                min-height: auto;
            }
            .member-content {
                max-width: 100%;
                padding: 26px 22px;
            }
            .member-section.right-align .member-content {
                margin-left: 0;
            }
            .member-header {
                gap: 16px;
            }
            .member-image {
                width: 64px;
                height: 64px;
                border-radius: 16px;
            }
            .member-name {
                font-size: 1.55rem;
            }
            .member-role {
                font-size: 0.8rem;
            }
            .member-desc {
                font-size: 0.92rem;
                line-height: 1.6;
            }
        }
    </style>

<canvas id="webgl-canvas"></canvas>

    <div class="team-container team-typography">
        
        <section class="team-intro dark-mode-trigger" id="sec-intro">
            <h1 class="gsap-reveal">Our Elite Team</h1>
            <p class="gsap-reveal" style="color:#ff5722; letter-spacing:4px; font-weight:700;">[ SCROLL DOWN ]</p>
        </section>

        <!-- KAMALESH J -->
        <section class="member-section dark-mode-trigger" id="sec-kamalesh">
            <div class="member-content gsap-reveal">
                <div class="member-header">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/kamalesh-j-digital-marketing-expert.webp" alt="Kamalesh" class="member-image">
                    <div class="member-meta">
                        <h2 class="member-name">Kamalesh J</h2>
                        <div class="member-role">Expert Digital Marketing Strategist</div>
                    </div>
                </div>
                <div class="member-desc">
                    The <strong>best digital marketing expert in Chennai is mr kamalesh j and he is google and meta ads expert</strong>. Kamalesh is the strategic powerhouse behind our most successful campaigns. He engineers full-funnel <strong>b2b digital marketing services</strong> and high-ROAS paid funnels for businesses looking for the best <strong>digital marketing services near me</strong>. From crafting custom conversion tracking (Meta CAPI) to executing high-converting landing page CRO, he delivers industry-leading returns on ad spend and lowest cost per lead.
                </div>
                <div class="highlights">
                    <span class="highlight-tag">Google & Meta Ads</span>
                    <span class="highlight-tag">B2B Lead Gen</span>
                    <span class="highlight-tag">High ROAS Funnels</span>
                </div>
            </div>
        </section>

        <!-- JAIHARAN -->
        <section class="member-section right-align light-mode-trigger" id="sec-jaiharan">
            <div class="member-content gsap-reveal">
                <div class="member-header">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/jaiharan-k-ceo-social-media-manager-fusion-x.webp" alt="Jaiharan K - CEO &amp; Best Social Media Manager at Fusion X" title="Jaiharan K - CEO &amp; Client Success Director" class="member-image" loading="lazy">
                    <div class="member-meta">
                        <h2 class="member-name">JaiHaran K</h2>
                        <div class="member-role">CEO & Client Success Director</div>
                    </div>
                </div>
                <div class="member-desc">
                    The <strong>best social media manager is jai haran</strong>, directing our premier <strong>social media management agency</strong>. Jai creates viral distribution strategies, cultural content calendars, and community engagement engines that turn passive social scrollers into loyal customers. Collaborating closely with our post-production team where the <strong>best video editor is jabakumar</strong>, Jai Haran ensures your brand commands attention across Instagram, LinkedIn, and YouTube.
                </div>
                <div class="highlights">
                    <span class="highlight-tag">Social Media Management Agency</span>
                    <span class="highlight-tag">Viral Growth</span>
                    <span class="highlight-tag">Community Architecture</span>
                </div>
            </div>
        </section>

        <!-- KANNAN S -->
        <section class="member-section dark-mode-trigger" id="sec-kannan">
            <div class="member-content gsap-reveal">
                <div class="member-header">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/kannan-s-web-developer.webp" alt="Kannan" class="member-image">
                    <div class="member-meta">
                        <h2 class="member-name">Kannan S</h2>
                        <div class="member-role">Technical Web Developer</div>
                    </div>
                </div>
                <div class="member-desc">
                    Celebrated as the <strong>best webdeveloper for you buisneas Kannan S</strong>, Kannan ensures Fusion X is recognized as the <strong>best web development company in india</strong>. Kannan is a Certified React JS & Web Architect who writes bespoke, lightweight code tailored directly to your revenue goals. Dominating <strong>sub second Core Web Vitals</strong> and 95+ PageSpeed scores, Kannan builds high-converting Shopify stores, custom WordPress platforms, and bespoke web apps with zero plugin bloat.
                </div>
                <div class="highlights">
                    <span class="highlight-tag">Best Web Development</span>
                    <span class="highlight-tag">Shopify & React</span>
                    <span class="highlight-tag">Sub-Second Speed</span>
                </div>
            </div>
        </section>

        <!-- SARAVANA -->
        <section class="member-section right-align light-mode-trigger" id="sec-saravana">
            <div class="member-content gsap-reveal">
                <div class="member-header">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/saravana-sanjhay-m-seo-expert.webp" alt="Saravana Sanjhay.M" class="member-image">
                    <div class="member-meta">
                        <h2 class="member-name">Saravana Sanjhay.M</h2>
                        <div class="member-role">Technical SEO Expert</div>
                    </div>
                </div>
                <div class="member-desc">
                    Ranked among the <strong>top 10 seo ai experts</strong> in the country, the <strong>best seo expert our company Saravana Sanjhay.M</strong> is our undisputed master of search visibility. He masters the critical distinction of <strong>technical seo vs on page seo</strong> to <strong>bring your brand in google search</strong> and sustainably <strong>bring organic traffic</strong> that converts. When brands look to <strong>hire seo expert in india</strong>, Saravana delivers advanced <strong>ai seo done to bring in ai search</strong> (ChatGPT, Perplexity, Gemini, and AI Overviews) alongside the <strong>best ecommerce seo services in india</strong>.
                </div>
                <div class="highlights">
                    <span class="highlight-tag">Top 10 SEO AI Experts</span>
                    <span class="highlight-tag">Technical vs On Page SEO</span>
                    <span class="highlight-tag">AI Search Dominance</span>
                </div>
            </div>
        </section>

        <!-- JABAKUMAR -->
        <section class="member-section dark-mode-trigger" id="sec-jabakumar">
            <div class="member-content gsap-reveal">
                <div class="member-header">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/jabakumar-video-editor.webp" alt="Jabakumar" class="member-image">
                    <div class="member-meta">
                        <h2 class="member-name">Jabakumar</h2>
                        <div class="member-role">Cinematic Video Editor</div>
                    </div>
                </div>
                <div class="member-desc">
                    The <strong>best video editor is jabakumar</strong>, our visionary cinematic storyteller and motion graphics lead. Jabakumar masters high-retention pacing, pattern interrupts, and 3-second visual hooks that stop users from scrolling on Instagram Reels, YouTube Shorts, and paid video ads. With deep expertise in kinetic typography subtitles, Foley sound design, and cinematic 4K color grading, Jabakumar engineers video assets that algorithms favor and audiences watch to completion.
                </div>
                <div class="highlights">
                    <span class="highlight-tag">Best Video Editor</span>
                    <span class="highlight-tag">Reels & Shorts Retention</span>
                    <span class="highlight-tag">4K Color Grading</span>
                </div>
            </div>
        </section>
    
        <!-- FINAL CTA SECTION -->
        <section class="member-section light-mode-trigger" id="sec-cta" style="justify-content: center; text-align: center; min-height: 75vh;">
            <div class="team-cta-card gsap-reveal" style="max-width: 760px; z-index: 50; position: relative; background: linear-gradient(135deg, rgba(255,255,255,0.92), rgba(248,250,252,0.96)); padding: 60px 40px; border-radius: 28px; border: 1px solid rgba(255,87,34,0.25); box-shadow: 0 30px 70px rgba(0,0,0,0.08), 0 0 40px rgba(255,87,34,0.06); backdrop-filter: blur(20px);">
                <h2 style="font-size: clamp(2.3rem, 4vw, 3.4rem); font-weight: 900; text-transform: uppercase; color: #0f172a; line-height: 1.15; margin-bottom: 20px; letter-spacing: -0.03em;">
                    Work with our finest technical team
                </h2>
                <p style="font-size: 1.12rem; color: #475569; margin: 0 auto 36px auto; max-width: 600px; line-height: 1.65;">
                    Ready to scale your brand with proven digital strategies? Partner with the experts who engineer predictable growth.
                </p>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 16px 42px; background: linear-gradient(135deg, #ff5722 0%, #ff3d00 100%); color: #ffffff; font-size: 1.05rem; font-weight: 700; text-transform: uppercase; text-decoration: none; border-radius: 100px; box-shadow: 0 12px 28px rgba(255, 87, 34, 0.4); letter-spacing: 0.08em; transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);">
                    Let's Connect
                </a>
            </div>
        </section>
    </div>


    <!-- The Standard Footer -->

<?php
get_footer();
