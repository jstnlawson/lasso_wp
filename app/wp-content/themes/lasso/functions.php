<?php

error_log('functions.php is loaded');

function gradient_enqueue_scripts()
{
    wp_enqueue_style('dashicons');
    
}
add_action('wp_enqueue_scripts', 'gradient_enqueue_scripts');

function gradient_add_js()
{
    wp_enqueue_script('gradient-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'gradient_add_js');

function gradient_add_styles()
{

    // register the style
    wp_register_style('gradient-main-css', get_template_directory_uri() . '/assets/css/main.css');

    // enqueue the style
    wp_enqueue_style('gradient-main-css');

    // Enqueue Dashicons for use in the front-end.
    wp_enqueue_style('dashicons');
}

add_action('wp_enqueue_scripts', 'gradient_add_styles');

function gradient_enqueue_swiper_assets() {
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);

    // Enqueue your custom script to initialize the swiper
    wp_enqueue_script('custom-swiper-init', get_template_directory_uri() . '/assets/js/custom-swiper-init.js', array('swiper-js'), null, true);
}
add_action('wp_enqueue_scripts', 'gradient_enqueue_swiper_assets');


// function gradient_theme_widgets_init()
// {
//     register_sidebar(array(
//         'name'          => esc_html__('gradient Carousel Section', 'gradient'),
//         'id'            => 'gradient-carousel-section',
//         'description'   => esc_html__('Add widgets here.', 'gradient'),
//         'before_widget' => '<section id="%1$s" class="widget %2$s">',
//         'after_widget'  => '</section>',
//         'before_title'  => '<h2 class="widget-title">',
//         'after_title'   => '</h2>',
//     ));
// }

// add_action('widgets_init', 'gradient_theme_widgets_init');


function gradient_customize_register($wp_customize)
{
    // Add Social Media Section
    $wp_customize->add_section('social_media_section', array(
        'title'    => __('Social Media Links', 'gradient'),
        'priority' => 120,
    ));

    // Register settings for each social media
    $social_sites = array('Facebook', 'Twitter', 'Instagram'); // Add more sites as needed
    foreach ($social_sites as $social_site) {
        $wp_customize->add_setting("social_media_{$social_site}", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("social_media_{$social_site}", array(
            'label'    => "{$social_site} URL",
            'section'  => 'social_media_section',
            'type'     => 'url',
            'priority' => 10,
            'description' => 'Please enter the full URL, including "http://" or "https://".',
        ));
    }
}

add_action('customize_register', 'gradient_customize_register');

function gradient_customize_register_carousel($wp_customize) {
    // Add a new section for the Carousel
    $wp_customize->add_section('gradient_carousel_settings', array(
        'title'    => __('Carousel Settings', 'gradient'),
        'priority' => 30,
    ));

    // Add settings for Carousel Images
    for ($i = 1; $i <= 5; $i++) { // Example for 5 images, adjust the number as needed
        $wp_customize->add_setting("carousel_image_{$i}", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "carousel_image_{$i}", array(
            'label'    => sprintf(__('Carousel Image %d', 'gradient'), $i),
            'section'  => 'gradient_carousel_settings',
            'settings' => "carousel_image_{$i}",
        )));
    }

    // Add settings for Carousel Text or other content as needed
    // Repeat the process similar to the image settings above for any additional content types
}

add_action('customize_register', 'gradient_customize_register_carousel');

