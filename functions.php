<?php
/**
 * Fusion X Digital functions and definitions
 *
 * @package Fusion_X_Digital
 */

if ( ! function_exists( 'fusionxdigital_setup' ) ) :
	function fusionxdigital_setup() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Register Navigation Menu
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'fusionxdigital' ),
			)
		);

		// HTML5 markup support
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'fusionxdigital_setup' );

/**
 * Enqueue scripts and styles.
 */
function fusionxdigital_scripts() {
	// Enqueue main stylesheet
	wp_enqueue_style( 'fusionxdigital-style', get_stylesheet_uri(), array(), '1.0.0' );

	// Enqueue FontAwesome
	wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

	// Enqueue Three.js
	wp_enqueue_script( 'threejs', 'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js', array(), '128', true );

	// Enqueue main custom script
	wp_enqueue_script( 'fusionxdigital-main', get_template_directory_uri() . '/main.js', array('threejs'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'fusionxdigital_scripts' );
