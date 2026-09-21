<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fusion X is the best digital marketing agency near me. We provide brand consulting, web development, SEO, AEO, EEAT optimized content, and AI visible websites to pull organic traffic globally.">
    <meta name="keywords" content="digital marketing agency in chennai, digital marketing near me, best digital marketing agency, web development, brand consulting, SEO, AEO, GEO, EEAT, AI visible websites, organic traffic">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <nav class="navbar">
        <div class="logo-container">
            <!-- Dynamically load the logo from the theme folder -->
            <img src="<?php echo esc_url( get_template_directory_uri() . '/logo.png' ); ?>" alt="Fusion X Logo - Best Digital Marketing Agency" class="logo">
        </div>
        
        <?php
        // Primary Navigation Menu
        wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
            'container'      => false,
            'menu_class'     => 'nav-links',
            'fallback_cb'    => false, // Fallback is hardcoded below if no menu exists
        ) );
        ?>

        <!-- Fallback menu if no WP menu is set -->
        <?php if ( ! has_nav_menu( 'menu-1' ) ) : ?>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About us</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#team">Our team</a></li>
                <li><a href="#works">Our works</a></li>
                <li><a href="#contact">Contact us</a></li>
            </ul>
        <?php endif; ?>

        <div class="hamburger">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
