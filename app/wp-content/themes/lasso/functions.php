<?php

error_log('functions.php is loaded');

function gradient_add_css() {

    // register the style
    wp_register_style( 'gradient-main-css', get_template_directory_uri() . '/assets/css/main.css');

    // enqueue the style
    wp_enqueue_style( 'gradient-main-css' );

    // enqueue the style conditionally
    // if ( is_front_page() ) {
        
    //     wp_enqueue_style( 'gradient-main-css' );
        
    // }
}

add_action( 'wp_enqueue_scripts', 'gradient_add_css' );

function gradient_theme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'gradient Carousel Section', 'gradient' ),
        'id'            => 'gradient-carousel-section',
        'description'   => esc_html__( 'Add widgets here.', 'gradient' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'gradient_theme_widgets_init' );
