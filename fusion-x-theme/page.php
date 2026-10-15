<?php
/**
 * The template for displaying all pages
 *
 * @package Fusion_X
 */

get_header();
?>

<main id="primary" class="site-main page-content-wrapper" style="min-height: 70vh; padding: 140px 24px 80px; max-width: 1200px; margin: 0 auto; position: relative; z-index: 2;">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'glass-card' ); ?> style="padding: 40px; border-radius: 20px; background: rgba(18, 18, 18, 0.7); border: 1px solid rgba(255, 87, 34, 0.2); backdrop-filter: blur(12px);">
            <header class="entry-header" style="margin-bottom: 30px;">
                <h1 class="entry-title" style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 800; color: #fff; line-height: 1.2;">
                    <?php the_title(); ?>
                </h1>
                <div class="accent-bar" style="width: 60px; height: 4px; background: linear-gradient(90deg, #ff5722, #ff8a50); border-radius: 2px; margin-top: 15px;"></div>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumbnail" style="margin-bottom: 30px; border-radius: 12px; overflow: hidden;">
                    <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: auto; display: block;' ) ); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content" style="color: #cbd5e1; line-height: 1.8; font-size: 1.05rem;">
                <?php
                the_content();

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fusion-x' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div>
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
