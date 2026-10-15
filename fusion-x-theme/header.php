<?php
/**
 * Fusion X Theme Header
 *
 * @package Fusion_X
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$current_slug = '';
if ( is_front_page() ) {
    $current_slug = 'home';
} elseif ( is_page( 'about-us' ) ) {
    $current_slug = 'about-us';
} elseif ( is_page( 'brands' ) ) {
    $current_slug = 'brands';
} elseif ( is_page( array( 'digital-marketing-services', 'services' ) ) || is_page_template( 'page-digital-marketing-services.php' ) ) {
    $current_slug = 'services';
} elseif ( is_page( 'our-team' ) || is_page_template( 'page-our-team.php' ) ) {
    $current_slug = 'our-team';
} elseif ( is_page( 'portfolio' ) || is_page_template( 'page-portfolio.php' ) ) {
    $current_slug = 'portfolio';
} elseif ( is_page( 'blog' ) || is_home() || is_archive() || is_singular( 'post' ) ) {
    $current_slug = 'blog';
} elseif ( is_page( 'careers' ) || is_page_template( 'page-careers.php' ) ) {
    $current_slug = 'careers';
} elseif ( is_page( 'contact' ) || is_page_template( 'page-contact.php' ) ) {
    $current_slug = 'contact';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() . '/logo_transparent.png' ); ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() . '/logo_transparent.png' ); ?>">
    <link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() . '/logo_transparent.png' ); ?>">
    <script>
        window.FUSION_X_THEME_URI = '<?php echo esc_js( get_template_directory_uri() ); ?>';
        window.FUSION_X_HOME_URL = '<?php echo esc_js( home_url( '/' ) ); ?>';
    </script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <canvas id="bg-canvas"></canvas>

    <nav class="navbar" id="navbar">
        <div class="logo-container">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/logo_transparent.png' ); ?>" alt="<?php bloginfo( 'name' ); ?> - Best Digital Marketing Company India" class="logo">
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php echo $current_slug === 'home' ? 'active' : ''; ?>">HOME</a></li>
            <li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="<?php echo $current_slug === 'about-us' ? 'active' : ''; ?>">ABOUT US</a></li>
            <li><a href="<?php echo esc_url( home_url( '/brands/' ) ); ?>" class="<?php echo $current_slug === 'brands' ? 'active' : ''; ?>">BRANDS WE WORKED</a></li>
            <li class="nav-item-services">
                <a href="<?php echo esc_url( home_url( '/digital-marketing-services/' ) ); ?>" class="<?php echo $current_slug === 'services' ? 'active' : ''; ?>">SERVICES <i class="fa-solid fa-chevron-down nav-chevron"></i></a>
                <div class="services-mega-menu">
                    <div class="mega-menu-inner">
                        <div class="mega-column">
                            <div class="mega-cat-header"><i class="fa-solid fa-code"></i><span>WEBSITE</span></div>
                            <ul class="mega-links">
                                <li><a href="<?php echo esc_url( home_url( '/portfolio-website/' ) ); ?>"><span class="link-title">Portfolio Website</span><span class="link-sub">WordPress Custom Page</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/basic-website/' ) ); ?>"><span class="link-title">Basic Website</span><span class="link-sub">WordPress Business Site</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/ecommerce-website/' ) ); ?>"><span class="link-title">E-Commerce Website</span><span class="link-sub">Shopify & WooCommerce</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/landing-page/' ) ); ?>"><span class="link-title">Landing Page</span><span class="link-sub">High-Converting Funnels</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/wedding-invitation/' ) ); ?>"><span class="link-title">Wedding Digital Invitation</span><span class="link-sub">Bespoke Interactive E-Invites</span></a></li>
                            </ul>
                        </div>
                        <div class="mega-column">
                            <div class="mega-cat-header"><i class="fa-solid fa-magnifying-glass-chart"></i><span>SEO</span></div>
                            <ul class="mega-links">
                                <li><a href="<?php echo esc_url( home_url( '/seo-services/' ) ); ?>"><span class="link-title">SEO for Website</span><span class="link-sub">On-Page & Off-Page SEO</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/site-reworking/' ) ); ?>"><span class="link-title">Site Reworking</span><span class="link-sub">Speed & Architecture Fixes</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/content-blogs/' ) ); ?>"><span class="link-title">Content & Blogs</span><span class="link-sub">Ranking Blog Production</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/backlinks-guest-blogs/' ) ); ?>"><span class="link-title">Backlinks & Guest Blogs</span><span class="link-sub">Authority Link Building</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/local-seo/' ) ); ?>"><span class="link-title">Local SEO for GMB</span><span class="link-sub">Google My Business Maps</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/social-video-seo/' ) ); ?>"><span class="link-title">YouTube & Instagram SEO</span><span class="link-sub">Algorithm & Search Reach</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/brand-analysis/' ) ); ?>"><span class="link-title">Brand Analyses</span><span class="link-sub">Competitor & EEAT Audit</span></a></li>
                            </ul>
                        </div>
                        <div class="mega-column">
                            <div class="mega-cat-header"><i class="fa-solid fa-share-nodes"></i><span>SOCIAL MEDIA MANAGEMENT</span></div>
                            <ul class="mega-links">
                                <li><a href="<?php echo esc_url( home_url( '/content-writing/' ) ); ?>"><span class="link-title">Content Writing</span><span class="link-sub">Captions & Copywriting</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/video-editing/' ) ); ?>"><span class="link-title">Video Editing</span><span class="link-sub">Reels &amp; Shorts Only</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/content-creation/' ) ); ?>"><span class="link-title">Content Creation</span><span class="link-sub">Visuals, Graphics & Feeds</span></a></li>
                            </ul>
                        </div>
                        <div class="mega-column">
                            <div class="mega-cat-header"><i class="fa-solid fa-bullseye"></i><span>META & GOOGLE ADS</span></div>
                            <ul class="mega-links">
                                <li><a href="<?php echo esc_url( home_url( '/meta-ads/' ) ); ?>"><span class="link-title">Meta Ads</span><span class="link-sub">Facebook & Instagram Scale</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/google-ads/' ) ); ?>"><span class="link-title">Google Ads</span><span class="link-sub">Search, Display & PMax</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/youtube-ads/' ) ); ?>"><span class="link-title">YouTube Ads</span><span class="link-sub">Video Campaigns & Retargeting</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/ad-creative-strategy/' ) ); ?>"><span class="link-title">Ad Creative Strategy</span><span class="link-sub">A/B Testing & High ROAS</span></a></li>
                            </ul>
                        </div>
                        <div class="mega-column">
                            <div class="mega-cat-header"><i class="fa-solid fa-chart-line"></i><span>MARKETING</span></div>
                            <ul class="mega-links">
                                <li><a href="<?php echo esc_url( home_url( '/marketing-consultation/' ) ); ?>"><span class="link-title">Marketing Consultation</span><span class="link-sub">Strategy by Kamalesh J</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/marketing-brand-consultation/' ) ); ?>"><span class="link-title">Marketing Brand Consultation</span><span class="link-sub">Brand Moat by Kamalesh J</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/email-marketing/' ) ); ?>"><span class="link-title">Email Marketing</span><span class="link-sub">Automations & Drip Flows</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/whatsapp-marketing/' ) ); ?>"><span class="link-title">WhatsApp Marketing</span><span class="link-sub">Official API Broadcasts & Bots</span></a></li>
                            </ul>
                        </div>
                        <div class="mega-column">
                            <div class="mega-cat-header"><i class="fa-solid fa-lightbulb"></i><span>BRAND STRATEGIES</span></div>
                            <ul class="mega-links">
                                <li><a href="<?php echo esc_url( home_url( '/brand-strategy/' ) ); ?>"><span class="link-title">Brand Strategy</span><span class="link-sub">Identity & Market Moat</span></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/competitor-analysis/' ) ); ?>"><span class="link-title">Competitor Analyses</span><span class="link-sub">Intel & Market Share Audit</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-menu-footer">
                        <span>Looking for customized agency scope?</span>
                        <a href="<?php echo esc_url( home_url( '/digital-marketing-services/' ) ); ?>" class="mega-footer-cta">View All Services <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </li>
            <li><a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>" class="<?php echo $current_slug === 'our-team' ? 'active' : ''; ?>">OUR TEAM</a></li>
            <li><a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="<?php echo $current_slug === 'portfolio' ? 'active' : ''; ?>">PORTFOLIO</a></li>
            <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="<?php echo $current_slug === 'blog' ? 'active' : ''; ?>">BLOG</a></li>
            <li><a href="<?php echo esc_url( home_url( '/careers/' ) ); ?>" class="<?php echo $current_slug === 'careers' ? 'active' : ''; ?>">CAREERS</a></li>
            <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="<?php echo $current_slug === 'contact' ? 'active' : ''; ?>">CONTACT</a></li>
        </ul>
        <div class="nav-actions">
            <div class="dangling-container">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nav-cta-btn">LET'S CONNECT</a>
                <div class="charm-string">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/logo_transparent.png' ); ?>" class="charm-object" alt="Fusion X Charm" draggable="false">
                </div>
            </div>
            <div class="hamburger">
                <svg viewBox="0 0 100 80" width="30" height="30">
                    <rect width="100" height="15" rx="8" fill="#ff5722"></rect>
                    <rect y="30" width="100" height="15" rx="8" fill="#ff5722"></rect>
                    <rect y="60" width="100" height="15" rx="8" fill="#ff5722"></rect>
                </svg>
            </div>
        </div>
    </nav>
