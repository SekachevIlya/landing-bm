<?php
/**
 * Enqueue scripts and styles.
 */
function bitmelech_scripts() {
	wp_enqueue_style( 'bitmelech-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'bitmelech-style', 'rtl', 'replace' );

	// Main Style
	wp_enqueue_style( 'main-style', get_template_directory_uri().'/assets/css/main.css', array(), '1.0' );

    // Swiper Slider
    wp_register_script('swiper-slider', get_template_directory_uri().'/assets/js/swiper.min.js', array(), '1.0', true);

    // Chart
    wp_register_script('chart', get_template_directory_uri().'/assets/js/chart.min.js', array(), '1.0', true);

    wp_enqueue_script('chart');

    wp_enqueue_script('swiper-slider');
    // Main Script
    wp_enqueue_script( 'main-script', get_template_directory_uri().'/assets/js/main.js', array(), '1.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'bitmelech_scripts' );