<?php
/**
 * The template for displaying the blog posts index (Posts Page)
 *
 * @package Fusion_X
 */

get_header();
?>

<style>
/* ─── BLOG HUB: PREMIUM DARK ORANGE REDESIGN ─── */
.bx-hero {
    position: relative;
    min-height: 72vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 160px 24px 90px;
    overflow: hidden;
    background: #080808;
}
.bx-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 80% 60% at 50% 0%, rgba(255,87,34,0.16) 0%, transparent 65%),
        radial-gradient(ellipse 60% 40% at 20% 100%, rgba(255,87,34,0.07) 0%, transparent 60%);
    pointer-events: none;
}
/* Animated grid */
.bx-hero-grid {
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(255,87,34,0.05) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,87,34,0.05) 1px, transparent 1px);
    background-size: 60px 60px;
    animation: gridShift 20s linear infinite;
    pointer-events: none;
}
@keyframes gridShift {
    from { transform: translateY(0); }
    to { transform: translateY(60px); }
}
.bx-hero-inner { position: relative; z-index: 2; max-width: 800px; margin: 0 auto; }
.bx-hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 18px;
    border-radius: 50px;
    background: rgba(255,87,34,0.12);
    border: 1px solid rgba(255,87,34,0.35);
    color: #ff5722;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 28px;
}
.bx-hero-title {
    font-family: 'Outfit', sans-serif;
    font-size: clamp(2.4rem, 5.5vw, 4rem);
    font-weight: 900;
    color: #ffffff;
    line-height: 1.18;
    margin-bottom: 22px;
    letter-spacing: -0.02em;
}
.bx-hero-title span { color: #ff5722; }
.bx-hero-sub {
    font-size: 1.1rem;
    color: #94a3b8;
    line-height: 1.7;
    max-width: 620px;
    margin: 0 auto 40px;
}
.bx-stats-row {
    display: flex;
    justify-content: center;
    gap: 40px;
    flex-wrap: wrap;
    margin-top: 10px;
}
.bx-stat-item { text-align: center; }
.bx-stat-num { font-family: 'Outfit', sans-serif; font-size: 1.8rem; font-weight: 900; color: #ff5722; }
.bx-stat-label { font-size: 0.78rem; color: #64748b; text-transform: uppercase; letter-spacing: 1px; margin-top: 2px; }

/* Filter bar */
.bx-filter-bar {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
    padding: 30px 24px 10px;
    position: relative;
    z-index: 2;
}
.bx-filter-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 9px 22px;
    border-radius: 50px;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.1);
    color: #94a3b8;
    font-size: 0.85rem;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.25s ease;
    letter-spacing: 0.3px;
}
.bx-filter-btn:hover,
.bx-filter-btn.active {
    background: #ff5722;
    border-color: #ff5722;
    color: #fff;
    box-shadow: 0 4px 20px rgba(255,87,34,0.35);
    transform: translateY(-1px);
}

/* Content area */
.bx-content {
    background: #080808;
    padding: 50px 24px 100px;
    position: relative;
    z-index: 2;
}
.bx-wrap { max-width: 1200px; margin: 0 auto; }

/* Featured card */
.bx-featured {
    display: grid;
    grid-template-columns: 1.25fr 0.75fr;
    gap: 0;
    border-radius: 28px;
    overflow: hidden;
    margin-bottom: 70px;
    border: 1px solid rgba(255,87,34,0.25);
    background: linear-gradient(145deg, #111113, #18181b);
    box-shadow: 0 25px 70px rgba(0,0,0,0.6), 0 0 0 1px rgba(255,87,34,0.1) inset;
    text-decoration: none;
    color: inherit;
    transition: transform 0.35s ease, box-shadow 0.35s ease;
    position: relative;
}
.bx-featured::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 3px;
    background: linear-gradient(90deg, #ff5722, #ff8a50, #ff5722);
    background-size: 200% 100%;
    animation: shimmer 2.5s ease infinite;
}
@keyframes shimmer { 0%{background-position:0% 0%} 50%{background-position:100% 0%} 100%{background-position:0% 0%} }
.bx-featured:hover { transform: translateY(-6px); box-shadow: 0 35px 90px rgba(0,0,0,0.7), 0 0 50px rgba(255,87,34,0.12); }
.bx-feat-body { padding: 52px 48px; display: flex; flex-direction: column; justify-content: center; }
.bx-feat-pill {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 5px 14px;
    border-radius: 50px;
    background: rgba(255,87,34,0.15);
    border: 1px solid rgba(255,87,34,0.3);
    color: #ff5722;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    margin-bottom: 22px;
    width: fit-content;
}
.bx-feat-title {
    font-family: 'Outfit', sans-serif;
    font-size: clamp(1.5rem, 2.8vw, 2.2rem);
    font-weight: 900;
    color: #fff;
    line-height: 1.28;
    margin-bottom: 18px;
}
.bx-feat-excerpt { color: #94a3b8; font-size: 1rem; line-height: 1.7; margin-bottom: 28px; }
.bx-feat-meta { display: flex; align-items: center; gap: 14px; font-size: 0.82rem; color: #64748b; margin-bottom: 28px; }
.bx-feat-meta img, .bx-feat-meta .bx-avatar { width: 28px; height: 28px; border-radius: 50%; border: 1px solid rgba(255,87,34,0.4); }
.bx-feat-author { display: flex; align-items: center; gap: 8px; }
.bx-feat-cta {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 13px 28px;
    background: #ff5722;
    color: #fff;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.9rem;
    width: fit-content;
    transition: all 0.25s ease;
    box-shadow: 0 8px 25px rgba(255,87,34,0.3);
}
.bx-featured:hover .bx-feat-cta { background: #e64a19; gap: 14px; }
.bx-feat-visual {
    position: relative;
    overflow: hidden;
    min-height: 380px;
    background: linear-gradient(135deg, rgba(255,87,34,0.08) 0%, #0d0d0e 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 14px;
    padding: 40px;
}
.bx-feat-visual::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to right, rgba(17,17,19,0.85), transparent);
}
.bx-feat-visual-icon { font-size: 3.5rem; color: #ff5722; filter: drop-shadow(0 0 25px rgba(255,87,34,0.5)); position: relative; z-index: 1; }
.bx-feat-visual-label { font-size: 0.85rem; color: #64748b; text-align: center; position: relative; z-index: 1; text-transform: uppercase; letter-spacing: 1px; }

/* Articles grid */
.bx-section-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 36px;
}
.bx-section-title {
    font-family: 'Outfit', sans-serif;
    font-size: 1.4rem;
    font-weight: 800;
    color: #fff;
}
.bx-section-title span { color: #ff5722; }
.bx-section-line { flex: 1; height: 1px; background: rgba(255,255,255,0.07); margin-left: 20px; }

.bx-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
    gap: 28px;
}
.bx-card {
    background: #0f0f11;
    border: 1px solid rgba(255,255,255,0.07);
    border-radius: 20px;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    position: relative;
}
.bx-card:hover {
    transform: translateY(-7px);
    border-color: rgba(255,87,34,0.35);
    box-shadow: 0 20px 55px rgba(0,0,0,0.5), 0 0 0 1px rgba(255,87,34,0.15) inset;
}
.bx-card-thumb {
    position: relative;
    height: 210px;
    overflow: hidden;
    background: linear-gradient(135deg, rgba(255,87,34,0.1) 0%, #0d0d0e 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}
.bx-card-thumb img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease; }
.bx-card:hover .bx-card-thumb img { transform: scale(1.06); }
.bx-card-thumb-icon { font-size: 2.8rem; color: rgba(255,87,34,0.6); }
.bx-card-cat {
    position: absolute;
    top: 14px; left: 14px;
    background: rgba(255,87,34,0.9);
    color: #fff;
    font-size: 0.7rem;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 50px;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    backdrop-filter: blur(6px);
}
.bx-card-read-time {
    position: absolute;
    top: 14px; right: 14px;
    background: rgba(0,0,0,0.75);
    color: #94a3b8;
    font-size: 0.7rem;
    padding: 4px 12px;
    border-radius: 50px;
    backdrop-filter: blur(6px);
    display: flex;
    align-items: center;
    gap: 5px;
}
.bx-card-body { padding: 26px 26px 18px; flex: 1; display: flex; flex-direction: column; }
.bx-card-title {
    font-family: 'Outfit', sans-serif;
    font-size: 1.12rem;
    font-weight: 800;
    color: #fff;
    line-height: 1.4;
    margin-bottom: 12px;
    transition: color 0.2s;
}
.bx-card:hover .bx-card-title { color: #ff5722; }
.bx-card-excerpt { color: #64748b; font-size: 0.88rem; line-height: 1.6; flex: 1; margin-bottom: 20px; }
.bx-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 16px;
    border-top: 1px solid rgba(255,255,255,0.06);
}
.bx-card-author { display: flex; align-items: center; gap: 8px; }
.bx-card-author img, .bx-card-author .bx-avatar { width: 26px; height: 26px; border-radius: 50%; border: 1px solid rgba(255,87,34,0.3); }
.bx-card-author-name { font-size: 0.8rem; color: #94a3b8; font-weight: 600; }
.bx-card-date { font-size: 0.75rem; color: #475569; }
.bx-card-arrow {
    width: 32px; height: 32px;
    border-radius: 50%;
    background: rgba(255,87,34,0.1);
    border: 1px solid rgba(255,87,34,0.25);
    display: flex; align-items: center; justify-content: center;
    color: #ff5722;
    font-size: 0.8rem;
    transition: all 0.25s ease;
}
.bx-card:hover .bx-card-arrow { background: #ff5722; color: #fff; transform: rotate(-45deg); }

/* Pagination */
.bx-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin-top: 70px;
    flex-wrap: wrap;
}
.bx-pagination .page-numbers {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 42px; height: 42px;
    border-radius: 50%;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    color: #94a3b8;
    text-decoration: none;
    font-size: 0.88rem;
    font-weight: 600;
    transition: all 0.25s ease;
}
.bx-pagination .page-numbers.current,
.bx-pagination .page-numbers:hover {
    background: #ff5722;
    border-color: #ff5722;
    color: #fff;
    box-shadow: 0 4px 15px rgba(255,87,34,0.3);
}

/* Newsletter CTA */
.bx-newsletter {
    background: linear-gradient(135deg, #111113, #18181b);
    border: 1px solid rgba(255,87,34,0.2);
    border-radius: 24px;
    padding: 60px 48px;
    text-align: center;
    margin-top: 80px;
    position: relative;
    overflow: hidden;
}
.bx-newsletter::before {
    content: '';
    position: absolute;
    top: -60px; left: 50%; transform: translateX(-50%);
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(255,87,34,0.12) 0%, transparent 70%);
    pointer-events: none;
}
.bx-newsletter h3 { font-family: 'Outfit', sans-serif; font-size: 2rem; font-weight: 900; color: #fff; margin-bottom: 12px; }
.bx-newsletter h3 span { color: #ff5722; }
.bx-newsletter p { color: #94a3b8; font-size: 1rem; max-width: 500px; margin: 0 auto 32px; line-height: 1.6; }
.bx-newsletter-form { display: flex; gap: 12px; max-width: 480px; margin: 0 auto; flex-wrap: wrap; justify-content: center; }
.bx-newsletter-input {
    flex: 1;
    min-width: 220px;
    padding: 14px 20px;
    border-radius: 50px;
    border: 1px solid rgba(255,255,255,0.12);
    background: rgba(255,255,255,0.05);
    color: #fff;
    font-size: 0.95rem;
    outline: none;
    transition: border-color 0.25s ease;
}
.bx-newsletter-input:focus { border-color: #ff5722; }
.bx-newsletter-input::placeholder { color: #475569; }
.bx-newsletter-btn {
    padding: 14px 28px;
    border: none;
    border-radius: 50px;
    background: #ff5722;
    color: #fff;
    font-weight: 700;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.25s ease;
    box-shadow: 0 6px 20px rgba(255,87,34,0.3);
}
.bx-newsletter-btn:hover { background: #e64a19; transform: translateY(-2px); }

/* Responsive */
@media (max-width: 900px) {
    .bx-featured { grid-template-columns: 1fr; }
    .bx-feat-visual { min-height: 220px; }
    .bx-feat-body { padding: 36px 28px; }
}
@media (max-width: 600px) {
    .bx-grid { grid-template-columns: 1fr; }
    .bx-feat-title { font-size: 1.4rem; }
    .bx-newsletter { padding: 40px 24px; }
    .bx-stats-row { gap: 24px; }
}
</style>

<!-- Blog Hero -->
<section class="bx-hero">
    <div class="bx-hero-grid"></div>
    <div class="bx-hero-inner">
        <div class="bx-hero-badge"><i class="fa-solid fa-brain-circuit"></i> Growth Engine & Strategies</div>
        <h1 class="bx-hero-title">Digital Marketing &amp; SEO<br><span>Insights Blog</span></h1>
        <p class="bx-hero-sub">Actionable playbooks on AI search optimization, technical SEO domination, high-ROAS paid media funnels, and modern brand strategy — straight from our client trenches.</p>
        <div class="bx-stats-row">
            <div class="bx-stat-item"><div class="bx-stat-num">900+</div><div class="bx-stat-label">AI Search Calls/mo</div></div>
            <div class="bx-stat-item"><div class="bx-stat-num">480+</div><div class="bx-stat-label">Keywords Ranked #1</div></div>
            <div class="bx-stat-item"><div class="bx-stat-num">4x</div><div class="bx-stat-label">Avg. ROI Delivered</div></div>
        </div>
    </div>
</section>

<!-- Filter Bar -->
<div class="bx-filter-bar">
    <?php
    $current_cat = isset( $_GET['cat_id'] ) ? absint( $_GET['cat_id'] ) : 0;
    ?>
    <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>"
       class="bx-filter-btn <?php echo empty( $current_cat ) ? 'active' : ''; ?>">
        <i class="fa-solid fa-border-all"></i> All Topics
    </a>
    <?php
    $cats = get_categories( array( 'hide_empty' => false ) );
    foreach ( $cats as $c ) :
        if ( $c->slug === 'uncategorized' && $c->count == 0 ) continue;
        $is_active = ( $current_cat === $c->term_id ) ? 'active' : '';
        ?>
        <a href="<?php echo esc_url( add_query_arg( 'cat_id', $c->term_id, get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ) ); ?>"
           class="bx-filter-btn <?php echo $is_active; ?>">
            <?php echo esc_html( $c->name ); ?>
            <span style="font-size:0.72rem;opacity:0.7;"><?php echo $c->count; ?></span>
        </a>
    <?php endforeach; ?>
</div>

<!-- Main Content -->
<main class="bx-content">
    <div class="bx-wrap">
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
                $post_cats = get_the_category();
                $cat_name = ! empty( $post_cats ) ? $post_cats[0]->name : 'Insights';
                $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : '';
                $content = get_post_field( 'post_content', get_the_ID() );
                $word_count = str_word_count( strip_tags( $content ) );
                $read_time = max( 1, ceil( $word_count / 200 ) );

                // First post on page 1 = featured card
                if ( $post_idx === 1 && $paged === 1 && empty( $current_cat ) ) :
                    ?>
                    <a href="<?php the_permalink(); ?>" class="bx-featured">
                        <div class="bx-feat-body">
                            <div class="bx-feat-pill"><i class="fa-solid fa-star"></i> Featured Guide</div>
                            <h2 class="bx-feat-title"><?php the_title(); ?></h2>
                            <p class="bx-feat-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 30, '…' ); ?></p>
                            <div class="bx-feat-meta">
                                <div class="bx-feat-author">
                                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 28, '', '', array( 'class' => 'bx-avatar' ) ); ?>
                                    <span><?php the_author(); ?></span>
                                </div>
                                <span>•</span>
                                <span><?php echo get_the_date( 'M j, Y' ); ?></span>
                                <span>•</span>
                                <span><i class="fa-solid fa-clock"></i> <?php echo $read_time; ?> min read</span>
                            </div>
                            <div class="bx-feat-cta">
                                Read Full Article <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                        <div class="bx-feat-visual" <?php if ( $thumb_url ) echo 'style="background: url(\'' . esc_url( $thumb_url ) . '\') center/cover no-repeat;"'; ?>>
                            <?php if ( ! $thumb_url ) : ?>
                                <i class="fa-solid fa-brain-circuit bx-feat-visual-icon"></i>
                                <div class="bx-feat-visual-label">Verified Growth Playbook</div>
                            <?php endif; ?>
                        </div>
                    </a>

                    <!-- Section header for remaining posts -->
                    <div class="bx-section-head">
                        <h3 class="bx-section-title">More <span>Insights</span></h3>
                        <div class="bx-section-line"></div>
                    </div>
                    <div class="bx-grid">
                    <?php
                else :
                    if ( $post_idx === 1 ) :
                        echo '<div class="bx-grid">';
                    endif;
                    // Icon map by category
                    $icon_map = array(
                        'seo' => 'fa-magnifying-glass-chart',
                        'paid' => 'fa-bullseye',
                        'social' => 'fa-share-nodes',
                        'brand' => 'fa-chess-knight',
                        'content' => 'fa-pen-nib',
                        'ai' => 'fa-microchip',
                        'default' => 'fa-chart-line'
                    );
                    $cat_lower = strtolower( $cat_name );
                    $icon = 'fa-chart-line';
                    foreach ( $icon_map as $k => $v ) { if ( strpos( $cat_lower, $k ) !== false ) { $icon = $v; break; } }
                    ?>
                    <a href="<?php the_permalink(); ?>" class="bx-card">
                        <div class="bx-card-thumb">
                            <?php if ( $thumb_url ) : ?>
                                <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php else : ?>
                                <i class="fa-solid <?php echo esc_attr( $icon ); ?> bx-card-thumb-icon"></i>
                            <?php endif; ?>
                            <span class="bx-card-cat"><?php echo esc_html( $cat_name ); ?></span>
                            <span class="bx-card-read-time"><i class="fa-solid fa-clock"></i> <?php echo $read_time; ?> min</span>
                        </div>
                        <div class="bx-card-body">
                            <h3 class="bx-card-title"><?php the_title(); ?></h3>
                            <p class="bx-card-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 18, '…' ); ?></p>
                            <div class="bx-card-footer">
                                <div class="bx-card-author">
                                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 26, '', '', array( 'class' => 'bx-avatar' ) ); ?>
                                    <div>
                                        <div class="bx-card-author-name"><?php the_author(); ?></div>
                                        <div class="bx-card-date"><?php echo get_the_date( 'M j, Y' ); ?></div>
                                    </div>
                                </div>
                                <div class="bx-card-arrow"><i class="fa-solid fa-arrow-right"></i></div>
                            </div>
                        </div>
                    </a>
                    <?php
                endif;
            endwhile;

            echo '</div>'; // End .bx-grid

            // Pagination
            $total_pages = $blog_posts->max_num_pages;
            if ( $total_pages > 1 ) :
                ?>
                <div class="bx-pagination">
                    <?php
                    echo paginate_links( array(
                        'base'      => get_pagenum_link( 1 ) . '%_%',
                        'format'    => 'page/%#%/',
                        'current'   => max( 1, $paged ),
                        'total'     => $total_pages,
                        'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
                        'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
                    ) );
                    ?>
                </div>
                <?php
            endif;
            wp_reset_postdata();

        else :
            // No posts yet — show static showcase
            ?>
            <a href="<?php echo esc_url( home_url( '/blog-post/' ) ); ?>" class="bx-featured">
                <div class="bx-feat-body">
                    <div class="bx-feat-pill"><i class="fa-solid fa-star"></i> Featured Guide</div>
                    <h2 class="bx-feat-title">The 2026 Blueprint for AI Engine Optimization (GEO): Dominating ChatGPT, Perplexity &amp; Google SGE</h2>
                    <p class="bx-feat-excerpt">Traditional 10-blue-link search is transforming rapidly. Discover how enterprise brands are re-architecting content and entity authority to win direct citations in AI-powered conversational search engines.</p>
                    <div class="bx-feat-meta">
                        <div class="bx-feat-author">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/team/kamalesh-j-digital-marketing-expert.webp' ); ?>" alt="Kamalesh J" class="bx-avatar">
                            <span>Kamalesh J</span>
                        </div>
                        <span>•</span>
                        <span>Oct 7, 2026</span>
                        <span>•</span>
                        <span><i class="fa-solid fa-clock"></i> 7 min read</span>
                    </div>
                    <div class="bx-feat-cta">Read Full Article <i class="fa-solid fa-arrow-right"></i></div>
                </div>
                <div class="bx-feat-visual">
                    <i class="fa-solid fa-brain-circuit bx-feat-visual-icon"></i>
                    <div class="bx-feat-visual-label">AI Search & GEO Framework 2026</div>
                </div>
            </a>

            <div class="bx-section-head">
                <h3 class="bx-section-title">More <span>Insights</span></h3>
                <div class="bx-section-line"></div>
            </div>

            <div class="bx-grid">
                <?php
                $static_cards = array(
                    array( 'icon' => 'fa-bullseye', 'cat' => 'Paid Advertising', 'title' => 'Scaling Meta & Google Ads: How We Achieved 8.4x Blended ROAS', 'desc' => 'A deep dive into cross-platform attribution, Advantage+ shopping campaigns, and ruthless creative iteration cycles.', 'time' => '5' ),
                    array( 'icon' => 'fa-gauge-high', 'cat' => 'Technical SEO', 'title' => 'Core Web Vitals & Hydration: Why Site Speed Decides Your Rankings', 'desc' => 'Learn how optimizing INP, DOM depth, and server-side caching directly correlates to first-page ranking dominance.', 'time' => '6' ),
                    array( 'icon' => 'fa-chess-knight', 'cat' => 'Brand Strategy', 'title' => 'Building an Unshakable Brand Moat in an Era of Commodity AI', 'desc' => 'When anyone can generate copy in seconds, unique perspective and high-EEAT authority become your competitive moat.', 'time' => '4' ),
                    array( 'icon' => 'fa-magnifying-glass-chart', 'cat' => 'AI SEO', 'title' => 'Ranking in Perplexity, ChatGPT & Google AI Overviews Simultaneously', 'desc' => 'How Fusion X helped Bhawani Corner rank in all major AI engines and get 900+ calls in a single month.', 'time' => '8' ),
                    array( 'icon' => 'fa-share-nodes', 'cat' => 'Social Media', 'title' => 'Viral Reels Strategy: The Framework That Got Our Client 12M Organic Reach', 'desc' => 'Hook science, pattern interrupts, and content velocity — the exact framework we use for D2C brand virality.', 'time' => '5' ),
                    array( 'icon' => 'fa-pen-nib', 'cat' => 'Content Strategy', 'title' => 'How Blog Content & Backlinks Got Nilaro Ranked on AI Search Results', 'desc' => 'Keyword research, EEAT-compliant blog writing, and strategic backlink placement that made Nilaro AI-visible.', 'time' => '7' ),
                );
                foreach ( $static_cards as $sc ) :
                    ?>
                    <a href="<?php echo esc_url( home_url( '/blog-post/' ) ); ?>" class="bx-card">
                        <div class="bx-card-thumb">
                            <i class="fa-solid <?php echo esc_attr( $sc['icon'] ); ?> bx-card-thumb-icon"></i>
                            <span class="bx-card-cat"><?php echo esc_html( $sc['cat'] ); ?></span>
                            <span class="bx-card-read-time"><i class="fa-solid fa-clock"></i> <?php echo $sc['time']; ?> min</span>
                        </div>
                        <div class="bx-card-body">
                            <h3 class="bx-card-title"><?php echo esc_html( $sc['title'] ); ?></h3>
                            <p class="bx-card-excerpt"><?php echo esc_html( $sc['desc'] ); ?></p>
                            <div class="bx-card-footer">
                                <div class="bx-card-author">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/team/kamalesh-j-digital-marketing-expert.webp' ); ?>" alt="Fusion X" class="bx-avatar">
                                    <div>
                                        <div class="bx-card-author-name">Fusion X Team</div>
                                        <div class="bx-card-date">Oct 2026</div>
                                    </div>
                                </div>
                                <div class="bx-card-arrow"><i class="fa-solid fa-arrow-right"></i></div>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Newsletter / CTA -->
        <div class="bx-newsletter">
            <h3>Get <span>Growth Playbooks</span> Delivered</h3>
            <p>Join 2,000+ founders and marketers who get our deep-dive strategies on AI search, ROAS scaling, and brand dominance every week.</p>
            <form class="bx-newsletter-form" onsubmit="return false;">
                <input type="email" class="bx-newsletter-input" placeholder="Enter your business email">
                <button type="submit" class="bx-newsletter-btn"><i class="fa-solid fa-paper-plane"></i> Subscribe</button>
            </form>
        </div>
    </div>
</main>

<?php
get_footer();
?>
