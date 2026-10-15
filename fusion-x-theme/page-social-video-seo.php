<?php
/**
 * Template Name: Social & Video SEO
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
            <i class="fa-solid fa-video"></i> YOUTUBE & INSTAGRAM ALGORITHMIC SEARCH
        </div>
        <h1 class="hero-title">
            Unlock Explosive Video Reach Across <span>YouTube & Instagram Search</span>
        </h1>
        <p class="hero-desc">
            Video is the world's most dominant communication medium. We optimize your YouTube channels and Instagram Reels for organic search intent, recommendation algorithms, and Google Video SERP carousels to deliver compounding, evergreen viewership.
        </p>
        <div class="tech-chips">
            <div class="tech-chip"><i class="fa-brands fa-youtube"></i> YouTube Search #1 Rankings</div>
            <div class="tech-chip"><i class="fa-brands fa-instagram"></i> Instagram Explore & Search SEO</div>
            <div class="tech-chip"><i class="fa-solid fa-clapperboard"></i> Google Video Carousel Schema</div>
            <div class="tech-chip"><i class="fa-solid fa-eye"></i> 12%+ Click-Through Rate (CTR)</div>
            <div class="tech-chip"><i class="fa-solid fa-hourglass-half"></i> Session Watch-Time Maximization</div>
        </div>
        <div class="hero-ctas">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero">Request Channel Video Audit <i class="fa-solid fa-arrow-right"></i></a>
            <a href="#youtube-algorithm" class="btn-secondary-hero">Explore Video SEO Vectors</a>
        </div>
    </header>

    <!-- ═══════════════════════ SERVICES BREAKDOWN ═══════════════════════ -->
    <main class="content-section">

        <!-- Card 1: YouTube Search & Recommendation Engine Optimization -->
        <div class="service-card-block" id="youtube-algorithm">
            <div class="card-text-col">
                <span class="card-tag"><i class="fa-brands fa-youtube"></i> YouTube Engine</span>
                <h2 class="card-title">YouTube Search & Recommendation Optimization</h2>
                <p class="card-desc">
                    YouTube is the world's 2nd largest search engine. We optimize video titles, write comprehensive multi-paragraph descriptions packed with semantic keywords, structure timestamped chapters, and configure strategic end-screen playlists to maximize viewer session watch time.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> High-intent keyword research reverse-engineering competitor video views</li>
                    <li><i class="fa-solid fa-circle-check"></i> Keyword-rich video descriptions with linked resources and chapter markers</li>
                    <li><i class="fa-solid fa-circle-check"></i> Strategic tag clusters aligning with YouTube's topic classification system</li>
                    <li><i class="fa-solid fa-circle-check"></i> Playlist architecture designed to trigger algorithmic Suggested Video feeds</li>
                </ul>
                <div class="card-tech-tags">
                    <span class="card-tech-tag">YouTube Search</span>
                    <span class="card-tech-tag">Suggested Videos</span>
                    <span class="card-tech-tag">Chapter Markers</span>
                    <span class="card-tech-tag">Session Watch Time</span>
                </div>
            </div>
            <div class="card-visual-box">
                <i class="fa-brands fa-youtube card-visual-icon" style="color: #ff0000;"></i>
                <div class="card-visual-stat">+340%</div>
                <div class="card-visual-sub">Organic YouTube Search Views</div>
            </div>
        </div>

        <!-- Card 2: Instagram Search & Explore Feed SEO -->
        <div class="service-card-block" id="instagram-seo">
            <div class="card-text-col">
                <span class="card-tag"><i class="fa-brands fa-instagram"></i> Instagram Discovery</span>
                <h2 class="card-title">Instagram Search & Reels Algorithmic Discovery</h2>
                <p class="card-desc">
                    Instagram now functions like a search engine. We optimize profile display names, bios, video audio tracks, and reel captions with searchable topic keywords to get your content surfaced in Instagram Search, hashtag results, and the viral Explore feed.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Profile name & bio optimization matching high-volume search queries</li>
                    <li><i class="fa-solid fa-circle-check"></i> Reel caption copywriting with localized and industry semantic keywords</li>
                    <li><i class="fa-solid fa-circle-check"></i> Audio track and spoken-word indexing optimization for automatic captions</li>
                    <li><i class="fa-solid fa-circle-check"></i> Targeted topic tag classification feeding Instagram's recommendation graph</li>
                </ul>
                <div class="card-tech-tags">
                    <span class="card-tech-tag">Explore Feed</span>
                    <span class="card-tech-tag">Reels Algorithm</span>
                    <span class="card-tech-tag">Searchable Bios</span>
                    <span class="card-tech-tag">Audio Transcription</span>
                </div>
            </div>
            <div class="card-visual-box">
                <i class="fa-brands fa-instagram card-visual-icon" style="color: #e1306c;"></i>
                <div class="card-visual-stat">4.2x</div>
                <div class="card-visual-sub">Non-Follower Reach Growth</div>
            </div>
        </div>

        <!-- Card 3: Google Search VideoObject Schema & Key Moments -->
        <div class="service-card-block" id="video-schema">
            <div class="card-text-col">
                <span class="card-tag"><i class="fa-solid fa-code"></i> SERP Carousels</span>
                <h2 class="card-title">Google Video Carousel & Schema Key Moments</h2>
                <p class="card-desc">
                    Get your video content ranked directly on Google's primary search results page. We implement VideoObject JSON-LD schema markup with timestamped 'Key Moments', allowing searchers to click straight into specific answers inside your video from Google SERPs.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> VideoObject structured data schema markup configuration</li>
                    <li><i class="fa-solid fa-circle-check"></i> Timestamped Key Moments enabling interactive chapter navigation in Google</li>
                    <li><i class="fa-solid fa-circle-check"></i> Video thumbnail markup formatted for high-definition SERP snippets</li>
                    <li><i class="fa-solid fa-circle-check"></i> Video sitemap generation for rapid Google indexing and discovery</li>
                </ul>
                <div class="card-tech-tags">
                    <span class="card-tech-tag">VideoObject Schema</span>
                    <span class="card-tech-tag">Google Key Moments</span>
                    <span class="card-tech-tag">Video Sitemaps</span>
                    <span class="card-tech-tag">SERP Carousels</span>
                </div>
            </div>
            <div class="card-visual-box">
                <i class="fa-solid fa-photo-film card-visual-icon"></i>
                <div class="card-visual-stat">#1 SERP</div>
                <div class="card-visual-sub">Google Video Carousel Placement</div>
            </div>
        </div>

        <!-- Card 4: High CTR Thumbnail Engineering & Hook Science -->
        <div class="service-card-block" id="thumbnail-psychology">
            <div class="card-text-col">
                <span class="card-tag"><i class="fa-solid fa-wand-magic-sparkles"></i> CTR Science</span>
                <h2 class="card-title">Thumbnail Psychology & First-3-Seconds Hook Optimization</h2>
                <p class="card-desc">
                    If nobody clicks, nobody watches. We engineer custom thumbnails based on visual color contrast, facial emotion psychology, and curiosity gaps, paired with script-level retention hooks that retain 70%+ of viewers past the crucial 30-second mark.
                </p>
                <ul class="card-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Eye-tracking visual hierarchy and high-contrast color grading</li>
                    <li><i class="fa-solid fa-circle-check"></i> Thumbnail A/B multi-variant split testing using YouTube's native tools</li>
                    <li><i class="fa-solid fa-circle-check"></i> First-3-seconds verbal and visual hook scripting to prevent drop-offs</li>
                    <li><i class="fa-solid fa-circle-check"></i> Optimized mobile thumbnail readability designed for small smartphone screens</li>
                </ul>
                <div class="card-tech-tags">
                    <span class="card-tech-tag">A/B Testing</span>
                    <span class="card-tech-tag">12%+ CTR</span>
                    <span class="card-tech-tag">Retention Hooks</span>
                    <span class="card-tech-tag">Eye Tracking</span>
                </div>
            </div>
            <div class="card-visual-box">
                <i class="fa-solid fa-arrow-pointer card-visual-icon"></i>
                <div class="card-visual-stat">12.4%</div>
                <div class="card-visual-sub">Average Thumbnail CTR Achieved</div>
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
                    Recognized among the <strong>top 10 seo ai experts</strong> in India, Saravana Sanjhay M leads Fusion X with deep mastery of <strong>technical seo vs on page seo</strong>. His proprietary systems are engineered to <strong>bring your brand in google search</strong> and sustainably <strong>bring organic traffic</strong> that accelerates client revenue. When ambitious brands choose to <strong>hire seo expert in india</strong>, Saravana ensures cutting-edge <strong>ai seo done to bring in ai search</strong> (ChatGPT Search, Perplexity AI, Google Gemini, and AI Overviews), alongside collaborating with our video team where <strong>best video editor is jabakumar</strong> to engineer high-retention cuts that maximize YouTube and Instagram algorithmic watch time for high-converting stores.
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
            <h2>Our 4-Step Video Ranking Protocol</h2>
            <p style="color: #94a3b8; font-size: 1.05rem;">From search query reverse-engineering to algorithmic velocity and audience scale.</p>
        </div>
        <div class="process-grid">
            <div class="process-card">
                <div class="step-num">01</div>
                <h3 class="step-title">Query Research</h3>
                <p class="step-desc">Analyze viewer search volume on YouTube and Instagram to identify high-intent topics with low video competition.</p>
            </div>
            <div class="process-card">
                <div class="step-num">02</div>
                <h3 class="step-title">Thumbnail & Hook Design</h3>
                <p class="step-desc">Design high-contrast, curiosity-inducing thumbnails and script the first 3 seconds to guarantee peak retention.</p>
            </div>
            <div class="process-card">
                <div class="step-num">03</div>
                <h3 class="step-title">Metadata & Schema</h3>
                <p class="step-desc">Inject semantic descriptions, chapter timestamps, VideoObject schema, and topic tags across all platforms.</p>
            </div>
            <div class="process-card">
                <div class="step-num">04</div>
                <h3 class="step-title">Velocity Amplification</h3>
                <p class="step-desc">Leverage playlist funnels and initial subscriber momentum to trigger YouTube Suggested and Instagram Explore feeds.</p>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════ CTA BANNER ═══════════════════════ -->
    <div class="content-section" style="padding-top: 0; padding-bottom: 0;">
        <div class="cta-banner">
            <h2>Ready to Scale Your Video Channels into Traffic Machines?</h2>
            <p>Schedule a channel growth audit with Fusion X's senior video SEO and algorithmic growth team.</p>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary-hero" style="background: #ff5722;">Request Channel Growth Audit <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>

    <!-- ═══════════════════════ FOOTER ═══════════════════════ -->

<?php
get_footer();
