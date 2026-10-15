<?php
/**
 * Fusion X Theme Functions and Definitions
 *
 * @package Fusion_X
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if ( ! function_exists( 'fusion_x_setup' ) ) :
    function fusion_x_setup() {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'custom-logo', array(
            'height'      => 60,
            'width'       => 200,
            'flex-height' => true,
            'flex-width'  => true,
        ) );

        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ) );

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Navigation Menu', 'fusion-x' ),
            'footer'  => esc_html__( 'Footer Quick Links Menu', 'fusion-x' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'fusion_x_setup' );

/**
 * Enqueue scripts and styles.
 */
function fusion_x_scripts() {
    $theme_version = wp_get_theme()->get( 'Version' );
    $uri = get_template_directory_uri();

    // Google Fonts
    wp_enqueue_style( 'fusion-x-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@400;500;600&display=swap', array(), null );

    // Font Awesome 6
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1' );

    // Theme Main Stylesheet
    wp_enqueue_style( 'fusion-x-style', get_stylesheet_uri(), array(), $theme_version );

    // Three.js and libraries
    wp_enqueue_script( 'three-js', 'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js', array(), 'r128', true );
    wp_enqueue_script( 'three-orbit-controls', 'https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js', array( 'three-js' ), '0.128.0', true );
    wp_enqueue_script( 'three-gltf-loader', 'https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js', array( 'three-js' ), '0.128.0', true );

    // GSAP
    wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', true );
    wp_enqueue_script( 'gsap-scroll-trigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array( 'gsap' ), '3.12.2', true );

    // Custom Interactive Core Scripts
    wp_enqueue_script( 'fusion-x-logo-b64', $uri . '/logo_b64.js', array(), $theme_version, true );
    wp_enqueue_script( 'fusion-x-brands-b64', $uri . '/brands_b64.js', array(), $theme_version, true );
    wp_enqueue_script( 'fusion-x-orange-dots', $uri . '/orange-dots.js', array(), '3.0', true );
    wp_enqueue_script( 'fusion-x-easter-egg', $uri . '/easter-egg.js', array(), '18.0', true );
    wp_enqueue_script( 'fusion-x-scroll-flying', $uri . '/scroll-flying-words.js', array( 'gsap' ), '7.0', true );
    wp_enqueue_script( 'fusion-x-brands', $uri . '/brands.js', array(), '103.0', true );
    wp_enqueue_script( 'fusion-x-spider', $uri . '/spider.js', array(), '2.0', true );
    wp_enqueue_script( 'fusion-x-seo-cards', $uri . '/seo-cards.js', array(), $theme_version, true );
    wp_enqueue_script( 'fusion-x-impact-anim', $uri . '/impact-animation.js', array( 'gsap' ), '2.0', true );
    wp_enqueue_script( 'fusion-x-3d-logo', $uri . '/fusion-3d-logo.js', array( 'three-js' ), $theme_version, true );
    wp_enqueue_script( 'fusion-x-shatter', $uri . '/shatter-animation.js', array( 'gsap' ), $theme_version, true );
    wp_enqueue_script( 'fusion-x-main', $uri . '/main.js', array( 'three-js' ), $theme_version, true );

    // Pass data to frontend JS
    wp_localize_script( 'fusion-x-orange-dots', 'fusionXData', array(
        'themeUri' => $uri,
        'homeUrl'  => home_url( '/' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'fusion_x_scripts' );

/**
 * Filter document title separator.
 */
function fusion_x_document_title_separator( $sep ) {
    return '|';
}
add_filter( 'document_title_separator', 'fusion_x_document_title_separator' );

/**
 * Helper to resolve theme asset paths.
 */
function fusion_x_asset( $path ) {
    return esc_url( get_template_directory_uri() . '/' . ltrim( $path, '/' ) );
}
