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
            <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="blog-filter-btn <?php echo empty( $current_cat ) ? 'active' : ''; ?>">All Topics</a>
            <?php
            $cats = get_categories( array( 'hide_empty' => false ) );
            foreach ( $cats as $c ) :
                if ( $c->slug === 'uncategorized' && $c->count == 0 ) continue;
                $is_active = ( $current_cat === $c->term_id ) ? 'active' : '';
                ?>
                <a href="<?php echo esc_url( add_query_arg( 'cat_id', $c->term_id, home_url( '/blog/' ) ) ); ?>" class="blog-filter-btn <?php echo $is_active; ?>">
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
                                <?php echo has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 30, '...' ); ?>
                            </p>
                            <div class="featured-meta">
                                <div class="featured-author">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/team/kamalesh-j-digital-marketing-expert.webp' ); ?>" alt="<?php the_author(); ?>">
                                    <span><?php the_author(); ?></span>
                                </div>
                                <span>•</span>
                                <span><?php echo get_the_date( 'F j, Y' ); ?></span>
                                <span>•</span>
                                <span><i class="fa-solid fa-clock"></i> 5 min read</span>
                            </div>
                            <div class="featured-cta-btn">
                                Read Full Article <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                        <div class="featured-visual-box" style="background-image: url('<?php echo esc_url( $thumb_url ); ?>'); background-size: cover; background-position: center;">
                            <div style="background: rgba(0,0,0,0.65); padding: 20px; border-radius: 12px; backdrop-filter: blur(4px);">
                                <i class="fa-solid fa-brain-circuit" style="font-size: 2rem; color: #ff5722; margin-bottom: 8px;"></i>
                                <h3 style="color: #ffffff; font-size: 1.25rem; font-weight: 700; margin: 0;"><?php the_title(); ?></h3>
                            </div>
                        </div>
                    </a>

                    <div class="blog-articles-grid" style="margin-top: 40px;">
                <?php
                else :
                    if ( $post_idx === 2 && $paged === 1 && empty( $current_cat ) ) {
                        // Already inside .blog-articles-grid
                    } elseif ( $post_idx === 1 ) {
                        echo '<div class="blog-articles-grid">';
                    }
                    ?>
                    <article class="blog-article-card">
                        <div class="article-badge-row">
                            <?php
                            $categories = get_the_category();
                            $cat_name = ! empty( $categories ) ? esc_html( $categories[0]->name ) : 'Digital Growth';
                            ?>
                            <span class="article-cat-badge"><?php echo $cat_name; ?></span>
                            <span class="article-read-time"><i class="fa-solid fa-clock"></i> 5 min read</span>
                        </div>
                        <h3 class="article-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="article-excerpt">
                            <?php echo has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 22, '...' ); ?>
                        </p>
                        <div class="article-footer">
                            <div class="article-author">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/team/saravana-sanjhay-m-seo-expert.webp' ); ?>" alt="<?php the_author(); ?>">
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
            <div class="no-posts" style="text-align: center; padding: 60px; background: rgba(18, 18, 20, 0.7); border-radius: 16px; border: 1px dashed rgba(255, 87, 34, 0.3);">
                <i class="fa-regular fa-newspaper" style="font-size: 3rem; color: #ff5722; margin-bottom: 20px; display: block;"></i>
                <h3 style="color: #fff; font-size: 1.5rem; margin-bottom: 10px;">No Insights Published In This Category</h3>
                <p style="color: #94a3b8;">Publish a post in WordPress Admin &gt; Posts &gt; Add New, and it will appear here immediately!</p>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php
get_footer();
