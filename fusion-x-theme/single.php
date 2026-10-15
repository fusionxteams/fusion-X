<?php
/**
 * The template for displaying all single blog posts with dynamic Table of Contents (TOC)
 *
 * @package Fusion_X
 */

get_header();
?>

<!-- Reading Progress Bar -->
<div id="reading-progress-bar" style="position: fixed; top: 0; left: 0; height: 3px; background: linear-gradient(90deg, #ff5722, #ff8a50); width: 0%; z-index: 9999; transition: width 0.1s ease;"></div>

<main id="primary" class="site-main single-post-main" style="min-height: 80vh; padding: 120px 20px 80px; position: relative; z-index: 2;">
    <?php
    while ( have_posts() ) :
        the_post();

        // Calculate estimated reading time
        $content = get_post_field( 'post_content', get_the_ID() );
        $word_count = str_word_count( strip_tags( $content ) );
        $reading_time = max( 1, ceil( $word_count / 200 ) );

        // Post category
        $categories = get_the_category();
        $primary_cat = ! empty( $categories ) ? $categories[0]->name : 'Digital Intelligence';
        ?>

        <!-- ARTICLE HERO SECTION -->
        <header class="article-hero-section" style="max-width: 1100px; margin: 0 auto 50px; text-align: left;">
            <div class="article-hero-wrap">
                <!-- Breadcrumbs -->
                <div class="article-breadcrumbs" style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #94a3b8; margin-bottom: 20px;">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #cbd5e1; text-decoration: none;">Home</a>
                    <span>/</span>
                    <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" style="color: #cbd5e1; text-decoration: none;">Insights Blog</a>
                    <span>/</span>
                    <span style="color: #ff5722;"><?php echo esc_html( wp_trim_words( get_the_title(), 5 ) ); ?></span>
                </div>

                <!-- Category Badge -->
                <div class="article-cat-badge" style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255, 87, 34, 0.12); color: #ff5722; border: 1px solid rgba(255, 87, 34, 0.35); padding: 6px 16px; border-radius: 50px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px;">
                    <i class="fa-solid fa-microchip"></i> <?php echo esc_html( $primary_cat ); ?>
                </div>

                <!-- Main Post Title -->
                <h1 class="article-main-title" style="font-size: clamp(2.2rem, 4.5vw, 3.6rem); font-weight: 900; color: #ffffff; line-height: 1.25; margin-bottom: 20px; font-family: 'Outfit', sans-serif;">
                    <?php the_title(); ?>
                </h1>

                <!-- Post Subtitle / Excerpt if available -->
                <?php if ( has_excerpt() ) : ?>
                    <p class="article-main-sub" style="font-size: 1.18rem; color: #94a3b8; line-height: 1.65; max-width: 850px; margin-bottom: 25px;">
                        <?php echo esc_html( get_the_excerpt() ); ?>
                    </p>
                <?php endif; ?>

                <!-- Metadata Bar -->
                <div class="article-meta-bar" style="display: flex; flex-wrap: wrap; align-items: center; gap: 20px; padding: 15px 0; border-top: 1px solid rgba(255, 255, 255, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.1); color: #94a3b8; font-size: 0.9rem;">
                    <div class="article-meta-item" style="display: flex; align-items: center; gap: 10px;">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 36, '', '', array( 'style' => 'border-radius: 50%; border: 1px solid #ff5722;' ) ); ?>
                        <span><strong style="color: #ffffff;"><?php the_author(); ?></strong> · Fusion X Specialist</span>
                    </div>
                    <div class="article-meta-item" style="display: flex; align-items: center; gap: 6px;">
                        <i class="fa-regular fa-calendar" style="color: #ff5722;"></i>
                        <span><?php echo get_the_date( 'F j, Y' ); ?></span>
                    </div>
                    <div class="article-meta-item" style="display: flex; align-items: center; gap: 6px;">
                        <i class="fa-regular fa-clock" style="color: #ff5722;"></i>
                        <span><?php echo esc_html( $reading_time ); ?> Min Read</span>
                    </div>
                </div>

                <!-- Featured Post Image -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="article-hero-banner" style="margin-top: 35px; border-radius: 18px; overflow: hidden; border: 1px solid rgba(255, 255, 255, 0.12); box-shadow: 0 15px 35px rgba(0,0,0,0.5);">
                        <?php the_post_thumbnail( 'full', array( 'style' => 'width: 100%; height: auto; display: block;' ) ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <!-- ARTICLE BODY & DYNAMIC TABLE OF CONTENTS LAYOUT -->
        <section class="article-body-section" style="max-width: 1200px; margin: 0 auto;">
            <div class="article-layout" style="display: grid; grid-template-columns: 310px 1fr; gap: 50px; align-items: start;">
                
                <!-- STICKY SIDEBAR: TABLE OF CONTENTS -->
                <aside class="article-sidebar" style="position: sticky; top: 100px;">
                    <div class="article-toc-card" style="background: rgba(18, 24, 38, 0.85); border: 1px solid rgba(255, 87, 34, 0.3); border-radius: 16px; padding: 24px; backdrop-filter: blur(12px); box-shadow: 0 10px 30px rgba(0,0,0,0.4);">
                        <div class="toc-header" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; padding-bottom: 12px; border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
                            <div class="toc-title" style="color: #ffffff; font-weight: 700; font-size: 1rem; display: flex; align-items: center; gap: 10px; font-family: 'Space Grotesk', sans-serif;">
                                <i class="fa-solid fa-list-ul" style="color: #ff5722;"></i> Table of Contents
                            </div>
                            <span id="toc-count-badge" style="font-size: 0.72rem; color: #ff5722; background: rgba(255, 87, 34, 0.15); padding: 2px 8px; border-radius: 10px; font-weight: 700;"></span>
                        </div>
                        
                        <!-- Nav List for Generated Headings -->
                        <ul class="toc-nav-list" id="dynamic-toc-nav" style="list-style: none; margin: 0; padding: 0; max-height: 480px; overflow-y: auto; display: flex; flex-direction: column; gap: 10px;">
                            <!-- Populated automatically via JavaScript -->
                        </ul>
                    </div>

                    <!-- Social Share Widget -->
                    <div class="sidebar-share-box" style="margin-top: 25px; background: rgba(18, 24, 38, 0.65); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 14px; padding: 18px; text-align: center;">
                        <div class="sidebar-share-title" style="color: #94a3b8; font-size: 0.82rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 12px;">Share Article</div>
                        <div class="sidebar-share-buttons" style="display: flex; justify-content: center; gap: 10px;">
                            <?php
                            $share_url = urlencode( get_permalink() );
                            $share_title = urlencode( get_the_title() );
                            ?>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer" class="share-btn" style="width: 38px; height: 38px; border-radius: 50%; background: rgba(255, 255, 255, 0.06); display: flex; align-items: center; justify-content: center; color: #cbd5e1; text-decoration: none; transition: all 0.3s ease;" title="Share on LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank" rel="noopener noreferrer" class="share-btn" style="width: 38px; height: 38px; border-radius: 50%; background: rgba(255, 255, 255, 0.06); display: flex; align-items: center; justify-content: center; color: #cbd5e1; text-decoration: none; transition: all 0.3s ease;" title="Share on Twitter / X"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="https://api.whatsapp.com/send?text=<?php echo $share_title . '%20' . $share_url; ?>" target="_blank" rel="noopener noreferrer" class="share-btn" style="width: 38px; height: 38px; border-radius: 50%; background: rgba(255, 255, 255, 0.06); display: flex; align-items: center; justify-content: center; color: #cbd5e1; text-decoration: none; transition: all 0.3s ease;" title="Share on WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                            <button type="button" onclick="navigator.clipboard.writeText(window.location.href); alert('Article link copied to clipboard!');" class="share-btn" style="width: 38px; height: 38px; border-radius: 50%; background: rgba(255, 255, 255, 0.06); border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; color: #cbd5e1; transition: all 0.3s ease;" title="Copy Link"><i class="fa-solid fa-link"></i></button>
                        </div>
                    </div>
                </aside>

                <!-- MAIN ARTICLE CONTENT -->
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'article-main-content' ); ?> style="background: rgba(18, 24, 38, 0.65); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 20px; padding: 45px; backdrop-filter: blur(10px);">
                    
                    <div class="entry-content article-prose" id="article-prose-content" style="color: #cbd5e1; line-height: 1.85; font-size: 1.12rem;">
                        <?php the_content(); ?>
                    </div>

                    <!-- Article Footer / Author Bio -->
                    <footer class="article-end-footer" style="margin-top: 50px; padding-top: 35px; border-top: 1px solid rgba(255, 255, 255, 0.1);">
                        
                        <!-- Tags -->
                        <?php if ( has_tag() ) : ?>
                            <div class="article-tags" style="margin-bottom: 30px; display: flex; flex-wrap: wrap; gap: 8px; align-items: center;">
                                <span style="color: #ff5722; font-weight: 700; font-size: 0.85rem;"><i class="fa-solid fa-tags"></i> TOPICS:</span>
                                <?php the_tags( '', ' ', '' ); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Author Bio Box -->
                        <div class="author-bio-card" style="display: flex; gap: 20px; align-items: center; background: rgba(12, 16, 26, 0.8); border: 1px solid rgba(255, 87, 34, 0.25); border-radius: 14px; padding: 24px; margin-bottom: 35px;">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 64, '', '', array( 'style' => 'border-radius: 50%; border: 2px solid #ff5722; flex-shrink: 0;' ) ); ?>
                            <div>
                                <h4 style="color: #ffffff; margin: 0 0 6px 0; font-size: 1.15rem;"><?php the_author(); ?></h4>
                                <p style="color: #94a3b8; font-size: 0.92rem; margin: 0; line-height: 1.5;">
                                    <?php
                                    $bio = get_the_author_meta( 'description' );
                                    echo ! empty( $bio ) ? esc_html( $bio ) : "Lead digital strategist at Fusion X engineering high-growth SEO, AI Search rankings, and full-funnel paid media campaigns.";
                                    ?>
                                </p>
                            </div>
                        </div>

                        <!-- Back to Blog Button -->
                        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
                            <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="back-blog-link" style="display: inline-flex; align-items: center; gap: 10px; color: #ff5722; font-weight: 700; text-decoration: none; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.5px;">
                                <i class="fa-solid fa-arrow-left"></i> Return to All Articles
                            </a>
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="scale-audit-link" style="display: inline-flex; align-items: center; gap: 8px; background: #ff5722; color: #ffffff; padding: 10px 22px; border-radius: 8px; font-weight: 700; text-decoration: none; font-size: 0.9rem;">
                                Request Growth Audit <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </footer>
                </article>

            </div>
        </section>

        <?php
        if ( comments_open() || get_comments_number() ) :
            ?>
            <section class="article-comments-wrap" style="max-width: 900px; margin: 60px auto 0; padding: 0 20px;">
                <?php comments_template(); ?>
            </section>
            <?php
        endif;

    endwhile;
    ?>
</main>

<style>
/* Table of Contents Styling */
.toc-link {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #94a3b8;
    text-decoration: none;
    font-size: 0.88rem;
    line-height: 1.45;
    padding: 6px 10px;
    border-radius: 6px;
    transition: all 0.25s ease;
    border-left: 2px solid transparent;
}
.toc-link:hover {
    color: #ff5722;
    background: rgba(255, 87, 34, 0.08);
    transform: translateX(4px);
}
.toc-link.active {
    color: #ffffff;
    font-weight: 700;
    border-left-color: #ff5722;
    background: rgba(255, 87, 34, 0.15);
}
.article-prose h2, .article-prose h3 {
    color: #ffffff;
    font-family: 'Outfit', sans-serif;
    scroll-margin-top: 100px;
    margin-top: 40px;
    margin-bottom: 18px;
}
.article-prose h2 {
    font-size: 1.85rem;
    border-left: 4px solid #ff5722;
    padding-left: 14px;
}
.article-prose h3 {
    font-size: 1.45rem;
}
.article-prose p {
    margin-bottom: 22px;
}
.article-prose ul, .article-prose ol {
    margin: 20px 0 25px 25px;
}
.article-prose li {
    margin-bottom: 10px;
}
.article-prose blockquote {
    border-left: 4px solid #ff5722;
    background: rgba(255, 87, 34, 0.06);
    padding: 20px 25px;
    border-radius: 0 12px 12px 0;
    margin: 30px 0;
    font-style: italic;
    color: #e2e8f0;
}
.article-tags a {
    color: #cbd5e1;
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    text-decoration: none;
    transition: all 0.25s ease;
}
.article-tags a:hover {
    background: #ff5722;
    color: #fff;
    border-color: #ff5722;
}
@media (max-width: 991px) {
    .article-layout {
        grid-template-columns: 1fr !important;
    }
    .article-sidebar {
        position: relative !important;
        top: 0 !important;
        margin-bottom: 30px;
    }
}
</style>

<!-- DYNAMIC TABLE OF CONTENTS JAVASCRIPT ENGINE -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Reading Progress Bar
    const progressBar = document.getElementById('reading-progress-bar');
    window.addEventListener('scroll', function() {
        const docElem = document.documentElement;
        const totalHeight = docElem.scrollHeight - docElem.clientHeight;
        if (totalHeight > 0) {
            const progress = (docElem.scrollTop / totalHeight) * 100;
            if (progressBar) progressBar.style.width = Math.min(100, Math.max(0, progress)) + '%';
        }
    }, { passive: true });

    // 2. Dynamic Table of Contents Generation
    const article = document.getElementById('article-prose-content');
    const tocList = document.getElementById('dynamic-toc-nav');
    const tocBadge = document.getElementById('toc-count-badge');
    if (!article || !tocList) return;

    const headings = article.querySelectorAll('h2, h3');
    if (headings.length === 0) {
        // Fallback: If no h2/h3 exist, create default outline
        const fallbackItems = [
            { id: 'intro', text: 'Executive Overview' },
            { id: 'insights', text: 'Key Strategic Takeaways' },
            { id: 'execution', text: 'Actionable Implementation' }
        ];
        fallbackItems.forEach(item => {
            const li = document.createElement('li');
            li.innerHTML = `<a href="#${item.id}" class="toc-link"><i class="fa-solid fa-chevron-right" style="font-size: 0.65rem;"></i> ${item.text}</a>`;
            tocList.appendChild(li);
        });
        if (tocBadge) tocBadge.textContent = '3 Sections';
        return;
    }

    if (tocBadge) tocBadge.textContent = headings.length + ' Sections';

    headings.forEach((heading, idx) => {
        // Ensure heading has an ID
        let id = heading.id;
        if (!id) {
            id = 'section-' + (idx + 1) + '-' + heading.textContent.trim().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
            heading.id = id;
        }

        const li = document.createElement('li');
        const link = document.createElement('a');
        link.href = '#' + id;
        link.className = 'toc-link' + (idx === 0 ? ' active' : '');
        if (heading.tagName.toLowerCase() === 'h3') {
            link.style.paddingLeft = '20px';
            link.style.fontSize = '0.82rem';
        }
        link.innerHTML = `<i class="fa-solid fa-chevron-right" style="font-size: 0.65rem; color: #ff5722;"></i> <span>${heading.textContent.trim()}</span>`;
        
        // Smooth scroll
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetEl = document.getElementById(id);
            if (targetEl) {
                targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                document.querySelectorAll('.toc-link').forEach(l => l.classList.remove('active'));
                link.classList.add('active');
            }
        });

        li.appendChild(link);
        tocList.appendChild(li);
    });

    // 3. Active TOC Link Highlighting on Scroll
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.id;
                document.querySelectorAll('.toc-link').forEach(link => {
                    if (link.getAttribute('href') === '#' + id) {
                        link.classList.add('active');
                    } else {
                        link.classList.remove('active');
                    }
                });
            }
        });
    }, { rootMargin: '0px 0px -70% 0px', threshold: 0 });

    headings.forEach(h => observer.observe(h));
});
</script>

<?php
get_footer();
