<?php
/**
 * The template for displaying the blog posts index (Posts Page)
 *
 * @package Fusion_X
 */

get_header();
?>

<canvas id="dots-canvas" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 0;"></canvas>

<!-- Blog Hero Section -->
<header class="blog-hub-hero">
    <div class="blog-container" style="position: relative; z-index: 2;">
        <span class="blog-hero-badge"><i class="fa-solid fa-bolt"></i> Growth Engine &amp; Strategies</span>
        <h1 class="blog-hero-title">Digital Marketing &amp; SEO Insights Blog</h1>
        <p class="blog-hero-subtitle">
            Actionable playbooks on Generative Engine Optimization (GEO), technical SEO domination, high-ROAS paid media funnels, and modern web engineering.
        </p>

        <!-- Dynamic Category Filter Pills -->
        <div class="blog-filter-bar">
            <?php
            $current_cat = isset( $_GET['cat_id'] ) ? absint( $_GET['cat_id'] ) : 0;
            ?>
            <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>" class="blog-filter-btn <?php echo empty( $current_cat ) ? 'active' : ''; ?>">All Topics</a>
            <?php
            $cats = get_categories( array( 'hide_empty' => false ) );
            foreach ( $cats as $c ) :
                if ( $c->slug === 'uncategorized' && $c->count == 0 ) continue;
                $is_active = ( $current_cat === $c->term_id ) ? 'active' : '';
                ?>
                <a href="<?php echo esc_url( add_query_arg( 'cat_id', $c->term_id, get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ) ); ?>" class="blog-filter-btn <?php echo $is_active; ?>">
                    <?php echo esc_html( $c->name ); ?> (<?php echo $c->count; ?>)
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</header>

<!-- Main Content Section -->
<main class="blog-content-section">
    <div class="blog-container" style="position: relative; z-index: 2;">
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );
        $args = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => 9,
            'paged'          => $paged,
        );
        if ( ! empty( $current_cat ) ) {
            $args['cat'] = $current_cat;
        }
        $blog_posts = new WP_Query( $args );

        if ( $blog_posts->have_posts() ) :
            $post_idx = 0;
            while ( $blog_posts->have_posts() ) :
                $blog_posts->the_post();
                $post_idx++;

                // If first post and on page 1 and no specific category filter, show as Featured Card
                if ( $post_idx === 1 && $paged === 1 && empty( $current_cat ) ) :
                    $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : get_template_directory_uri() . '/logo_transparent.png';
                    ?>
                    <!-- FEATURED HERO POST -->
                    <a href="<?php the_permalink(); ?>" class="blog-featured-card">
                        <div>
                            <span class="featured-pill"><i class="fa-solid fa-star"></i> Featured Guide</span>
                            <h2 class="featured-title"><?php the_title(); ?></h2>
                            <p class="featured-excerpt">
                                <?php echo wp_trim_words( get_the_excerpt(), 28, '...' ); ?>
                            </p>
                            <div class="featured-meta">
                                <div class="featured-author">
                                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 28 ); ?>
                                    <span><?php the_author(); ?></span>
                                </div>
                                <span>•</span>
                                <span><?php echo get_the_date(); ?></span>
                                <span>•</span>
                                <span><i class="fa-solid fa-clock"></i> 7 min read</span>
                            </div>
                            <div class="featured-cta-btn">
                                Read Full Article <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                        <div class="featured-visual-box" style="background-image: url('<?php echo esc_url( $thumb_url ); ?>'); background-size: cover; background-position: center;">
                            <div style="background: rgba(0,0,0,0.65); width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 20px; border-radius: 12px;">
                                <i class="fa-solid fa-brain-circuit" style="font-size: 2.2rem; color: #ff5722; margin-bottom: 12px;"></i>
                                <h3 style="color: #ffffff; font-size: 1.15rem; font-weight: 700; margin: 0 0 6px 0; text-align: center;"><?php the_title(); ?></h3>
                                <p style="color: #94a3b8; font-size: 0.85rem; margin: 0; text-align: center;">Verified Growth Playbook</p>
                            </div>
                        </div>
                    </a>

                    <div class="blog-articles-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(330px, 1fr)); gap: 30px; margin-top: 50px;">
                <?php else : ?>
                    <?php if ( $post_idx === 1 ) : ?>
                        <div class="blog-articles-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(330px, 1fr)); gap: 30px;">
                    <?php endif; ?>

                    <!-- Standard Post Card -->
                    <article class="blog-article-card">
                        <div class="article-thumb-wrap">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'medium_large', array( 'class' => 'article-thumb-img' ) ); ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>" style="display: flex; height: 100%; align-items: center; justify-content: center; background: #121826;">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/logo_transparent.png' ); ?>" alt="Fusion X" style="max-height: 80px; opacity: 0.8;">
                                </a>
                            <?php endif; ?>

                            <?php
                            $post_cats = get_the_category();
                            if ( ! empty( $post_cats ) ) :
                                ?>
                                <span class="article-card-badge"><?php echo esc_html( $post_cats[0]->name ); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="article-body">
                            <h3 class="article-card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="article-card-excerpt">
                                <?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?>
                            </p>
                        </div>

                        <div class="article-footer">
                            <div class="article-author">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 32, '', '', array( 'style' => 'border-radius: 50%; border: 1px solid #ff5722;' ) ); ?>
                                <div>
                                    <div class="article-author-name"><?php the_author(); ?></div>
                                    <div class="article-date"><?php echo get_the_date( 'M j, Y' ); ?></div>
                                </div>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="article-read-btn" aria-label="Read <?php the_title_attribute(); ?>">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                    <?php
                endif;
            endwhile;

            echo '</div>'; // End .blog-articles-grid

            // Pagination
            $total_pages = $blog_posts->max_num_pages;
            if ( $total_pages > 1 ) :
                ?>
                <div class="blog-pagination" style="display:flex; justify-content:center; gap:10px; margin-top:50px;">
                    <?php
                    echo paginate_links( array(
                        'base'      => get_pagenum_link( 1 ) . '%_%',
                        'format'    => 'page/%#%/',
                        'current'   => max( 1, $paged ),
                        'total'     => $total_pages,
                        'prev_text' => '<i class="fa-solid fa-chevron-left"></i> Previous',
                        'next_text' => 'Next <i class="fa-solid fa-chevron-right"></i>',
                    ) );
                    ?>
                </div>
                <?php
            endif;
            wp_reset_postdata();

        else :
            ?>
            <!-- Default Flagship Showcase when no WP posts created yet -->
            <a href="<?php echo esc_url( home_url( '/blog-post/' ) ); ?>" class="blog-featured-card">
                <div>
                    <span class="featured-pill"><i class="fa-solid fa-star"></i> Featured Guide</span>
                    <h2 class="featured-title">The 2026 Blueprint for AI Engine Optimization (GEO): Dominating ChatGPT, Perplexity & Google SGE</h2>
                    <p class="featured-excerpt">
                        Traditional 10-blue-link search is transforming rapidly. Discover how enterprise brands are re-architecting content and entity authority to win direct citations in AI-powered conversational search engines.
                    </p>
                    <div class="featured-meta">
                        <div class="featured-author">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/team/kamalesh-j-digital-marketing-expert.webp' ); ?>" alt="Kamalesh J">
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
                    <i class="fa-solid fa-brain-circuit" style="font-size: 2.5rem; color: #ff5722; margin-bottom: 15px;"></i>
                    <h3 style="color: #ffffff; font-size: 1.25rem; font-weight: 700; margin: 0 0 8px 0;">GEO Framework 2026</h3>
                    <p style="color: #94a3b8; font-size: 0.88rem; margin: 0;">Multi-Modal Retrieval & Citations</p>
                </div>
            </a>

            <div class="blog-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(330px, 1fr)); gap: 30px; margin-top: 40px;">
                <!-- Card 1 -->
                <a href="<?php echo esc_url( home_url( '/blog-post/' ) ); ?>" class="blog-card" style="text-decoration: none;">
                    <div class="blog-card-thumb" style="background: rgba(255, 87, 34, 0.1); display: flex; align-items: center; justify-content: center; height: 180px; position: relative;">
                        <span class="blog-card-category">Paid Advertising</span>
                        <i class="fa-solid fa-bullseye" style="font-size: 3rem; color: #ff5722;"></i>
                    </div>
                    <div class="blog-card-body" style="padding: 24px;">
                        <h3 class="blog-card-title" style="color: #fff; margin-bottom: 12px; font-size: 1.2rem;">Scaling Meta & Google Ads: How We Achieved 8.4x Blended ROAS</h3>
                        <p class="blog-card-desc" style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6;">
                            A deep dive into cross-platform attribution, Advantage+ shopping campaigns, and ruthless creative iteration cycles that maximize enterprise revenue.
                        </p>
                        <div class="blog-card-footer" style="display: flex; justify-content: space-between; margin-top: 15px; color: #64748b; font-size: 0.85rem;">
                            <span>5 min read</span>
                            <span class="blog-read-more" style="color: #ff5722; font-weight: 600;">Read Article <i class="fa-solid fa-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

                <!-- Card 2 -->
                <a href="<?php echo esc_url( home_url( '/blog-post/' ) ); ?>" class="blog-card" style="text-decoration: none;">
                    <div class="blog-card-thumb" style="background: rgba(255, 87, 34, 0.1); display: flex; align-items: center; justify-content: center; height: 180px; position: relative;">
                        <span class="blog-card-category">Technical SEO</span>
                        <i class="fa-solid fa-gauge-high" style="font-size: 3rem; color: #ff5722;"></i>
                    </div>
                    <div class="blog-card-body" style="padding: 24px;">
                        <h3 class="blog-card-title" style="color: #fff; margin-bottom: 12px; font-size: 1.2rem;">Core Web Vitals & Hydration: Why Site Speed Decides Your Rankings</h3>
                        <p class="blog-card-desc" style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6;">
                            Learn how optimizing Interaction to Next Paint (INP), DOM depth, and server-side caching directly correlates to first-page ranking dominance.
                        </p>
                        <div class="blog-card-footer" style="display: flex; justify-content: space-between; margin-top: 15px; color: #64748b; font-size: 0.85rem;">
                            <span>6 min read</span>
                            <span class="blog-read-more" style="color: #ff5722; font-weight: 600;">Read Article <i class="fa-solid fa-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

                <!-- Card 3 -->
                <a href="<?php echo esc_url( home_url( '/blog-post/' ) ); ?>" class="blog-card" style="text-decoration: none;">
                    <div class="blog-card-thumb" style="background: rgba(255, 87, 34, 0.1); display: flex; align-items: center; justify-content: center; height: 180px; position: relative;">
                        <span class="blog-card-category">Brand Strategy</span>
                        <i class="fa-solid fa-chess-knight" style="font-size: 3rem; color: #ff5722;"></i>
                    </div>
                    <div class="blog-card-body" style="padding: 24px;">
                        <h3 class="blog-card-title" style="color: #fff; margin-bottom: 12px; font-size: 1.2rem;">Building an Unshakable Brand Moat in an Era of Commodity AI</h3>
                        <p class="blog-card-desc" style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6;">
                            When anyone can generate copy in seconds, unique perspective and high-EEAT authority become your company's greatest competitive moat.
                        </p>
                        <div class="blog-card-footer" style="display: flex; justify-content: space-between; margin-top: 15px; color: #64748b; font-size: 0.85rem;">
                            <span>4 min read</span>
                            <span class="blog-read-more" style="color: #ff5722; font-weight: 600;">Read Article <i class="fa-solid fa-arrow-right"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php
get_footer();
