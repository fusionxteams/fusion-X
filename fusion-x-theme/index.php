<?php
/**
 * The main template file / Blog Archive
 *
 * @package Fusion_X
 */

get_header();
?>

<main id="primary" class="site-main blog-archive-wrapper" style="min-height: 70vh; padding: 140px 24px 80px; max-width: 1200px; margin: 0 auto; position: relative; z-index: 2;">
    <header class="page-header" style="text-align: center; margin-bottom: 60px;">
        <span class="sub-heading" style="color: #ff5722; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.95rem;">
            THOUGHT LEADERSHIP & DIGITAL INTELLIGENCE
        </span>
        <h1 class="page-title" style="font-size: clamp(2.4rem, 5vw, 3.8rem); font-weight: 900; color: #fff; margin-top: 10px;">
            Fusion X <span style="background: linear-gradient(135deg, #ff5722, #ff8a50); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Insights & Blog</span>
        </h1>
        <p style="color: #94a3b8; max-width: 650px; margin: 15px auto 0; font-size: 1.1rem;">
            Battle-tested strategies on AI Search (AEO/GEO), high-ROAS paid media funnels, technical SEO, and conversion rate optimization.
        </p>
    </header>

    <div class="blog-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 30px;">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card glass-card' ); ?> style="background: rgba(18, 18, 18, 0.75); border: 1px solid rgba(255, 87, 34, 0.2); border-radius: 16px; overflow: hidden; display: flex; flex-direction: column; transition: transform 0.3s ease, border-color 0.3s ease;">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="card-thumb" style="height: 220px; overflow: hidden;">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'medium_large', array( 'style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;' ) ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="card-body" style="padding: 25px; display: flex; flex-direction: column; flex-grow: 1;">
                        <div class="card-meta" style="color: #ff5722; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin-bottom: 12px; display: flex; gap: 10px;">
                            <span><?php echo get_the_date(); ?></span>
                            <span>•</span>
                            <span><?php the_author(); ?></span>
                        </div>

                        <h2 class="card-title" style="font-size: 1.35rem; font-weight: 700; color: #fff; margin-bottom: 15px; line-height: 1.35;">
                            <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <div class="card-excerpt" style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6; margin-bottom: 20px; flex-grow: 1;">
                            <?php the_excerpt(); ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="card-read-more" style="color: #ff5722; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                            Read Full Article <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
                <?php
            endwhile;

            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => '<i class="fa-solid fa-chevron-left"></i> Previous',
                'next_text' => 'Next <i class="fa-solid fa-chevron-right"></i>',
            ) );

        else :
            ?>
            <div class="no-posts" style="grid-column: 1 / -1; text-align: center; padding: 60px; background: rgba(18, 18, 18, 0.5); border-radius: 16px; border: 1px dashed rgba(255, 87, 34, 0.3);">
                <i class="fa-regular fa-newspaper" style="font-size: 3rem; color: #ff5722; margin-bottom: 20px; display: block;"></i>
                <h3 style="color: #fff; font-size: 1.5rem; margin-bottom: 10px;">No Articles Published Yet</h3>
                <p style="color: #94a3b8;">Check back soon for new case studies, tactical marketing guides, and search engine insights.</p>
            </div>
            <?php
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
