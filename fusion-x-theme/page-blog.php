<?php
/**
 * Template Name: Blog Insights
 *
 * @package Fusion_X
 */

get_header();
?>

<!-- Blog Hero Section -->
    <header class="blog-hub-hero">
        <div class="blog-container" style="position: relative; z-index: 2;">
            <span class="blog-hero-badge"><i class="fa-solid fa-bolt"></i> Growth Engine & Strategies</span>
            <h1 class="blog-hero-title">Digital Marketing &amp; SEO Insights Blog</h1>
            <p class="blog-hero-subtitle">
                Actionable playbooks on Generative Engine Optimization (GEO), technical SEO domination, high-ROAS paid media funnels, and modern web engineering.
            </p>

            <!-- Filter Pills -->
            <div class="blog-filter-bar">
                <button class="blog-filter-btn active">All Topics</button>
                <button class="blog-filter-btn">AI & GEO Search</button>
                <button class="blog-filter-btn">Meta & Google Ads</button>
                <button class="blog-filter-btn">Technical SEO</button>
                <button class="blog-filter-btn">Web Engineering</button>
                <button class="blog-filter-btn">Brand Strategy</button>
            </div>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="blog-content-section">
        <div class="blog-container" style="position: relative; z-index: 2;">
            
            <!-- FEATURED HERO POST (Click goes to blog-post.html) -->
            <a href="<?php echo esc_url( home_url( '/blog-post/' ) ); ?>" class="blog-featured-card">
                <div>
                    <span class="featured-pill"><i class="fa-solid fa-star"></i> Featured Guide</span>
                    <h2 class="featured-title">The 2026 Blueprint for AI Engine Optimization (GEO): Dominating ChatGPT, Perplexity & Google SGE</h2>
                    <p class="featured-excerpt">
                        Traditional 10-blue-link search is transforming rapidly. Discover how enterprise brands are re-architecting content and entity authority to win direct citations in AI-powered conversational search engines.
                    </p>
                    <div class="featured-meta">
                        <div class="featured-author">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/team/kamalesh-j-digital-marketing-expert.webp" alt="Kamalesh J">
                            <span>Kamalesh J</span>
                        </div>
                        <span>•</span>
                        <span>October 7, 2026</span>
                        <span>•</span>
                        <span><i class="fa-solid fa-clock"></i> 7 min read</span>
                    </div>
                    <div class="featured-cta-btn">
                        Read Full Article <i class="fa-solid fa-arrow-right"></i>
                    </div>
                </div>
                <div class="featured-visual-box">
                    <i class="fa-solid fa-brain-circuit"></i>
                    <h3 style="color: #ffffff; font-size: 1.25rem; font-weight: 700; margin: 0 0 8px 0;">GEO Framework 2026</h3>
                    <p style="color: #94a3b8; font-size: 0.88rem; margin: 0;">Multi-Modal Retrieval & Citations</p>
                </div>
            </a>

            <!-- BLOG CARDS GRID -->
            <div class="blog-grid">
                
                <!-- Card 1 -->
                <a href="<?php echo esc_url( home_url( '/blog-post/' ) ); ?>" class="blog-card">
                    <div class="blog-card-thumb">
                        <span class="blog-card-category">Paid Advertising</span>
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <div class="blog-card-body">
                        <h3 class="blog-card-title">Scaling Meta & Google Ads: How We Achieved 8.4x Blended ROAS</h3>
                        <p class="blog-card-desc">
                            A deep dive into cross-platform attribution, Advantage+ shopping campaigns, and ruthless creative iteration cycles that maximize enterprise revenue.
                        </p>
                        <div class="blog-card-footer">
                            <span>5 min read</span>
                            <span class="blog-read-more">Read Article <i class="fa-solid fa-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

                <!-- Card 2 -->
                <a href="<?php echo esc_url( home_url( '/blog-post/' ) ); ?>" class="blog-card">
                    <div class="blog-card-thumb">
                        <span class="blog-card-category">Technical SEO</span>
                        <i class="fa-solid fa-gauge-high"></i>
                    </div>
                    <div class="blog-card-body">
                        <h3 class="blog-card-title">Core Web Vitals & Hydration: Why Site Speed Decides Your Rankings</h3>
                        <p class="blog-card-desc">
                            Learn how optimizing Interaction to Next Paint (INP), DOM depth, and server-side caching directly correlates to first-page ranking dominance.
                        </p>
                        <div class="blog-card-footer">
                            <span>6 min read</span>
                            <span class="blog-read-more">Read Article <i class="fa-solid fa-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

                <!-- Card 3 -->
                <a href="<?php echo esc_url( home_url( '/blog-post/' ) ); ?>" class="blog-card">
                    <div class="blog-card-thumb">
                        <span class="blog-card-category">Brand Strategy</span>
                        <i class="fa-solid fa-chess-knight"></i>
                    </div>
                    <div class="blog-card-body">
                        <h3 class="blog-card-title">Building an Unshakable Brand Moat in an Era of Commodity AI</h3>
                        <p class="blog-card-desc">
                            When anyone can generate copy in seconds, unique perspective and high-EEAT authority become your company's greatest competitive moat.
                        </p>
                        <div class="blog-card-footer">
                            <span>4 min read</span>
                            <span class="blog-read-more">Read Article <i class="fa-solid fa-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

                <!-- Card 4 -->
                <a href="<?php echo esc_url( home_url( '/blog-post/' ) ); ?>" class="blog-card">
                    <div class="blog-card-thumb">
                        <span class="blog-card-category">WhatsApp Marketing</span>
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <div class="blog-card-body">
                        <h3 class="blog-card-title">Official WhatsApp API: Converting Abandoned Carts at 42% Rates</h3>
                        <p class="blog-card-desc">
                            Automated broadcast messaging, conversational chatbot sequences, and verified green-tick authority that transform customer retention.
                        </p>
                        <div class="blog-card-footer">
                            <span>5 min read</span>
                            <span class="blog-read-more">Read Article <i class="fa-solid fa-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

                <!-- Card 5 -->
                <a href="<?php echo esc_url( home_url( '/blog-post/' ) ); ?>" class="blog-card">
                    <div class="blog-card-thumb">
                        <span class="blog-card-category">Web Engineering</span>
                        <i class="fa-solid fa-code"></i>
                    </div>
                    <div class="blog-card-body">
                        <h3 class="blog-card-title">Headless Web Architecture: React & Node vs Traditional Monoliths</h3>
                        <p class="blog-card-desc">
                            Why modern brands are leaving slow monolithic themes behind in favor of lightning-fast decoupled frameworks with 100/100 Lighthouse scores.
                        </p>
                        <div class="blog-card-footer">
                            <span>6 min read</span>
                            <span class="blog-read-more">Read Article <i class="fa-solid fa-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

                <!-- Card 6 -->
                <a href="<?php echo esc_url( home_url( '/blog-post/' ) ); ?>" class="blog-card">
                    <div class="blog-card-thumb">
                        <span class="blog-card-category">Local SEO</span>
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                    <div class="blog-card-body">
                        <h3 class="blog-card-title">Dominating Google Maps 3-Pack: Geo-Fencing & Citation Velocity</h3>
                        <p class="blog-card-desc">
                            Step-by-step framework to rank #1 across Chennai and target metros using localized schema markup and high-reputation citation building.
                        </p>
                        <div class="blog-card-footer">
                            <span>5 min read</span>
                            <span class="blog-read-more">Read Article <i class="fa-solid fa-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

            </div>

            <!-- NEWSLETTER SUBSCRIPTION BOX -->
            <div class="article-cta-box" style="margin-top: 20px;">
                <h3 class="article-cta-title">Stay Ahead of the Algorithm</h3>
                <p class="article-cta-desc">
                    Get proprietary digital marketing playbooks, AI search updates, and conversion rate optimizations delivered straight to your inbox monthly. No spam. Ever.
                </p>
                <form onsubmit="event.preventDefault(); alert('Thank you for subscribing to Fusion X Insights!');" style="display: flex; justify-content: center; gap: 12px; max-width: 500px; margin: 0 auto; flex-wrap: wrap;">
                    <input type="email" placeholder="Enter your business email" required style="padding: 14px 20px; border-radius: 50px; border: 1px solid rgba(255,255,255,0.15); background: #1a1a1e; color: #fff; flex: 1; min-width: 240px; font-size: 0.95rem; outline: none;">
                    <button type="submit" class="article-cta-btn" style="border: none; cursor: pointer;">Subscribe</button>
                </form>
            </div>

        </div>
    </main>

    <!-- Main Footer -->

<?php
get_footer();
