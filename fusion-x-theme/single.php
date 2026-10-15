<?php
/**
 * The template for displaying single blog posts
 *
 * @package Fusion_X
 */

get_header();
?>

<main id="primary" class="site-main single-post-wrapper" style="min-height: 70vh; padding: 140px 24px 80px; max-width: 900px; margin: 0 auto; position: relative; z-index: 2;">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article glass-card' ); ?> style="padding: 40px; border-radius: 20px; background: rgba(18, 18, 18, 0.7); border: 1px solid rgba(255, 87, 34, 0.2); backdrop-filter: blur(12px);">
            <div class="post-meta-top" style="display: flex; gap: 15px; align-items: center; color: #ff5722; font-size: 0.9rem; font-weight: 600; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px;">
                <span><i class="fa-regular fa-calendar"></i> <?php echo get_the_date(); ?></span>
                <span>•</span>
                <span><i class="fa-regular fa-user"></i> <?php the_author(); ?></span>
                <?php if ( has_category() ) : ?>
                    <span>•</span>
                    <span><i class="fa-solid fa-tag"></i> <?php the_category( ', ' ); ?></span>
                <?php endif; ?>
            </div>

            <header class="entry-header" style="margin-bottom: 25px;">
                <h1 class="entry-title" style="font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 800; color: #fff; line-height: 1.25;">
                    <?php the_title(); ?>
                </h1>
                <div class="accent-bar" style="width: 70px; height: 4px; background: linear-gradient(90deg, #ff5722, #ff8a50); border-radius: 2px; margin-top: 20px;"></div>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumbnail" style="margin: 30px 0; border-radius: 14px; overflow: hidden; border: 1px solid rgba(255, 255, 255, 0.1);">
                    <?php the_post_thumbnail( 'full', array( 'style' => 'width: 100%; height: auto; display: block;' ) ); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content" style="color: #cbd5e1; line-height: 1.85; font-size: 1.1rem;">
                <?php the_content(); ?>
            </div>

            <footer class="entry-footer" style="margin-top: 40px; padding-top: 25px; border-top: 1px solid rgba(255, 255, 255, 0.1); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
                <div class="post-tags" style="color: #94a3b8;">
                    <?php the_tags( '<span class="tags-title"><i class="fa-solid fa-tags"></i> Tags: </span>', ', ' ); ?>
                </div>
                <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="back-to-blog-btn" style="display: inline-flex; align-items: center; gap: 8px; color: #ff5722; font-weight: 600; text-decoration: none;">
                    <i class="fa-solid fa-arrow-left"></i> Back to Insights Blog
                </a>
            </footer>
        </article>

        <?php
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile;
    ?>
</main>

<?php
get_footer();
