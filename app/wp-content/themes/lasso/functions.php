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



function register_splash_carousel($wp_customize) {
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
}

add_action('customize_register', 'register_splash_carousel');



function register_review_carousel($wp_customize) {

    $wp_customize->add_section('gradient_review_settings', array(
        'title'    => __('Review Settings', 'gradient'),
        'priority' => 30,
    ));

    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting("review_text_{$i}", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("review_text_{$i}", array(
            'label'    => sprintf(__('Review Text %d', 'gradient'), $i),
            'section'  => 'gradient_review_settings',
            'type'     => 'textarea',
        ));

        $wp_customize->add_setting("review_author_{$i}", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("review_author_{$i}", array(
            'label'    => sprintf(__('Review Author %d', 'gradient'), $i),
            'section'  => 'gradient_review_settings',
            'type'     => 'text',
        ));
    }
}

add_action('customize_register', 'register_review_carousel');

function register_about_teaser ($wp_customize) {

    $wp_customize->add_section('gradient_about_teaser', array(
        'title'    => __('About Teaser Settings', 'gradient'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('about_teaser_photo', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_teaser_photo', array(
        'label'    => __('About Teaser Photo', 'gradient'),
        'section'  => 'gradient_about_teaser',
        'settings' => 'about_teaser_photo',
    )));

    $wp_customize->add_setting('about_teaser_photo_alt', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_teaser_photo_alt', array(
        'label'    => __('About Teaser Photo Alt Text', 'gradient'),
        'section'  => 'gradient_about_teaser',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('about_teaser_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_teaser_title', array(
        'label'    => __('About Teaser Title', 'gradient'),
        'section'  => 'gradient_about_teaser',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('about_teaser_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_teaser_text', array(
        'label'    => __('About Teaser Text', 'gradient'),
        'section'  => 'gradient_about_teaser',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('about_teaser_button_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_teaser_button_text', array(
        'label'    => __('About Teaser Button Text', 'gradient'),
        'section'  => 'gradient_about_teaser',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'register_about_teaser');

function register_product_teaser ($wp_customize) {

    $wp_customize->add_section('gradient_product_teaser', array(
        'title'    => __('Product Teaser Settings', 'gradient'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('products_teaser_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('products_teaser_title', array(
        'label'    => __('Product Teaser Title', 'gradient'),
        'section'  => 'gradient_product_teaser',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('products_teaser_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('products_teaser_text', array(
        'label'    => __('Product Teaser Text', 'gradient'),
        'section'  => 'gradient_product_teaser',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('products_teaser_photo_one', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'products_teaser_photo_one', array(
        'label'    => __('Product Teaser Photo One', 'gradient'),
        'section'  => 'gradient_product_teaser',
        'settings' => 'products_teaser_photo_one',
    )));

    $wp_customize->add_setting('products_teaser_photo_two', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'products_teaser_photo_two', array(
        'label'    => __('Product Teaser Photo Two', 'gradient'),
        'section'  => 'gradient_product_teaser',
        'settings' => 'products_teaser_photo_two',
    )));

    $wp_customize->add_setting('products_teaser_photo_three', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'products_teaser_photo_three', array(
        'label'    => __('Product Teaser Photo Three', 'gradient'),
        'section'  => 'gradient_product_teaser',
        'settings' => 'products_teaser_photo_three',
    )));

    $wp_customize->add_setting('products_teaser_button_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('products_teaser_button_text', array(
        'label'    => __('Product Teaser Button Text', 'gradient'),
        'section'  => 'gradient_product_teaser',
        'type'     => 'text',
    ));

}

add_action('customize_register', 'register_product_teaser');

function register_custom_teaser ($wp_customize) {

    $wp_customize->add_section('gradient_custom_teaser', array(
        'title'    => __('custom Teaser Settings', 'gradient'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('custom_teaser_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('custom_teaser_title', array(
        'label'    => __('custom Teaser Title', 'gradient'),
        'section'  => 'gradient_custom_teaser',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('custom_teaser_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('custom_teaser_text', array(
        'label'    => __('custom Teaser Text', 'gradient'),
        'section'  => 'gradient_custom_teaser',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('custom_teaser_button_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('custom_teaser_button_text', array(
        'label'    => __('custom Teaser Button Text', 'gradient'),
        'section'  => 'gradient_custom_teaser',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('custom_teaser_photo_one', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_teaser_photo_one', array(
        'label'    => __('custom Teaser Photo One', 'gradient'),
        'section'  => 'gradient_custom_teaser',
        'settings' => 'custom_teaser_photo_one',
    )));

    $wp_customize->add_setting('custom_teaser_photo_two', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_teaser_photo_two', array(
        'label'    => __('custom Teaser Photo Two', 'gradient'),
        'section'  => 'gradient_custom_teaser',
        'settings' => 'custom_teaser_photo_two',
    )));
}

add_action('customize_register', 'register_custom_teaser');