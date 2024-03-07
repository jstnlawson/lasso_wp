<?php

error_log('functions.php is loaded');

function lasso_enqueue_scripts_styles() {
    // Enqueue Styles
    wp_enqueue_style('dashicons');
    wp_register_style('lasso-main-css', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('lasso-main-css');
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');

    // Enqueue Scripts
    wp_enqueue_script('lasso-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('custom-swiper-init', get_template_directory_uri() . '/assets/js/custom-swiper-init.js', array('swiper-js'), null, true);
}

// Only add the action if we're not in the admin area
if (!is_admin()) {
    add_action('wp_enqueue_scripts', 'lasso_enqueue_scripts_styles');
}


function register_header($wp_customize)
{

    $wp_customize->add_section('lasso_header', array(
        'title'    => __('Header Settings', 'lasso'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('header_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('header_title', array(
        'label'    => __('Header Title', 'lasso'),
        'section'  => 'lasso_header',
        'type'     => 'text',
    ));

     // About Page Link
     $wp_customize->add_setting('about_page_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('about_page_link', array(
        'label'    => __('About Page Link', 'lasso'),
        'section'  => 'lasso_header',
        'type'     => 'dropdown-pages',
    ));

    // Products Page Link
    $wp_customize->add_setting('products_page_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('products_page_link', array(
        'label'    => __('Products Page Link', 'lasso'),
        'section'  => 'lasso_header',
        'type'     => 'dropdown-pages',
    ));

    // Custom Page Link
    $wp_customize->add_setting('contact_page_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contact_page_link', array(
        'label'    => __('Contact Page Link', 'lasso'),
        'section'  => 'lasso_header',
        'type'     => 'dropdown-pages',
    ));

    // Cart Page Link
    $wp_customize->add_setting('cart_page_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('cart_page_link', array(
        'label'    => __('Cart Page Link', 'lasso'),
        'section'  => 'lasso_header',
        'type'     => 'dropdown-pages',
    ));

}

add_action('customize_register', 'register_header');



function footer_customize_register($wp_customize)
{
    // Add Footer Section
    $wp_customize->add_section('footer-settings-section', array(
        'title'    => __('Footer Settings', 'lasso'),
        'priority' => 120,
    ));

    //Company Name and Logo

    $wp_customize->add_setting('company_logo', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'company_logo', array(
        'label'    => __('Company Logo', 'lasso'),
        'section'  => 'footer-settings-section',
        'settings' => 'company_logo',
    )));

    $wp_customize->add_setting('company_name', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('company_name', array(
        'label'    => __('Company Name', 'lasso'),
        'section'  => 'footer-settings-section',
        'type'     => 'text',
    ));

    // Company Contact Information

    $wp_customize->add_setting('company_email', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('company_email', array(
        'label'    => __('Company Email', 'lasso'),
        'section'  => 'footer-settings-section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('company_street_address', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('company_street_address', array(
        'label'    => __('Company Street Address', 'lasso'),
        'section'  => 'footer-settings-section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('company_city', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('company_city', array(
        'label'    => __('Company City', 'lasso'),
        'section'  => 'footer-settings-section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('company_state', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('company_state', array(
        'label'    => __('Company State', 'lasso'),
        'section'  => 'footer-settings-section',
        'type'     => 'text',
        'description' => 'Please use the two-letter abbreviation to save space.',
    ));

    $wp_customize->add_setting('company_zip', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('company_zip', array(
        'label'    => __('Company Zip', 'lasso'),
        'section'  => 'footer-settings-section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('company_phone', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('company_phone', array(
        'label'    => __('Company Phone', 'lasso'),
        'section'  => 'footer-settings-section',
        'type'     => 'text',
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
            'section'  => 'footer-settings-section',
            'type'     => 'url',
            'priority' => 10,
            'description' => 'Please enter the full URL, including "http://" or "https://".',
        ));
    }
}

add_action('customize_register', 'footer_customize_register');



function register_splash_carousel($wp_customize) {
    $splash_title       = get_theme_mod('splash_title');
            $splash_text        = get_theme_mod('splash_text');
            $splash_button_text = get_theme_mod('splash_button_text');

    $wp_customize->add_section('lasso_carousel_settings', array(
        'title'    => __('Carousel Settings', 'lasso'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('splash_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('splash_title', array(
        'label'    => __('Splash Title', 'lasso'),
        'section'  => 'lasso_carousel_settings',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('splash_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('splash_text', array(
        'label'    => __('Splash Text', 'lasso'),
        'section'  => 'lasso_carousel_settings',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('splash_button_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('splash_button_text', array(
        'label'    => __('Splash Button Text', 'lasso'),
        'section'  => 'lasso_carousel_settings',
        'type'     => 'text',
    ));

    for ($i = 1; $i <= 5; $i++) { 
        $wp_customize->add_setting("carousel_image_{$i}", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "carousel_image_{$i}", array(
            'label'    => sprintf(__('Carousel Image %d', 'lasso'), $i),
            'section'  => 'lasso_carousel_settings',
            'settings' => "carousel_image_{$i}",
        )));
    }
}

add_action('customize_register', 'register_splash_carousel');



function register_review_carousel($wp_customize) {

    $wp_customize->add_section('lasso_review_settings', array(
        'title'    => __('Review Settings', 'lasso'),
        'priority' => 30,
    ));

    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting("review_text_{$i}", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("review_text_{$i}", array(
            'label'    => sprintf(__('Review Text %d', 'lasso'), $i),
            'section'  => 'lasso_review_settings',
            'type'     => 'textarea',
        ));

        $wp_customize->add_setting("review_author_{$i}", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("review_author_{$i}", array(
            'label'    => sprintf(__('Review Author %d', 'lasso'), $i),
            'section'  => 'lasso_review_settings',
            'type'     => 'text',
        ));
    }
}

add_action('customize_register', 'register_review_carousel');

function register_about_teaser ($wp_customize) {

    $wp_customize->add_section('lasso_about_teaser', array(
        'title'    => __('About Teaser Settings', 'lasso'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('about_teaser_photo', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_teaser_photo', array(
        'label'    => __('About Teaser Photo', 'lasso'),
        'section'  => 'lasso_about_teaser',
        'settings' => 'about_teaser_photo',
    )));

    $wp_customize->add_setting('about_teaser_photo_alt', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_teaser_photo_alt', array(
        'label'    => __('About Teaser Photo Alt Text', 'lasso'),
        'section'  => 'lasso_about_teaser',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('about_teaser_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_teaser_title', array(
        'label'    => __('About Teaser Title', 'lasso'),
        'section'  => 'lasso_about_teaser',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('about_teaser_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_teaser_text', array(
        'label'    => __('About Teaser Text', 'lasso'),
        'section'  => 'lasso_about_teaser',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('about_teaser_button_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_teaser_button_text', array(
        'label'    => __('About Teaser Button Text', 'lasso'),
        'section'  => 'lasso_about_teaser',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'register_about_teaser');

function register_product_teaser ($wp_customize) {

    $wp_customize->add_section('lasso_product_teaser', array(
        'title'    => __('Product Teaser Settings', 'lasso'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('products_teaser_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('products_teaser_title', array(
        'label'    => __('Product Teaser Title', 'lasso'),
        'section'  => 'lasso_product_teaser',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('products_teaser_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('products_teaser_text', array(
        'label'    => __('Product Teaser Text', 'lasso'),
        'section'  => 'lasso_product_teaser',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('products_teaser_photo_one', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'products_teaser_photo_one', array(
        'label'    => __('Product Teaser Photo One', 'lasso'),
        'section'  => 'lasso_product_teaser',
        'settings' => 'products_teaser_photo_one',
    )));

    $wp_customize->add_setting('products_teaser_photo_two', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'products_teaser_photo_two', array(
        'label'    => __('Product Teaser Photo Two', 'lasso'),
        'section'  => 'lasso_product_teaser',
        'settings' => 'products_teaser_photo_two',
    )));

    $wp_customize->add_setting('products_teaser_photo_three', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'products_teaser_photo_three', array(
        'label'    => __('Product Teaser Photo Three', 'lasso'),
        'section'  => 'lasso_product_teaser',
        'settings' => 'products_teaser_photo_three',
    )));

    $wp_customize->add_setting('products_teaser_button_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('products_teaser_button_text', array(
        'label'    => __('Product Teaser Button Text', 'lasso'),
        'section'  => 'lasso_product_teaser',
        'type'     => 'text',
    ));

}

add_action('customize_register', 'register_product_teaser');

function register_custom_teaser ($wp_customize) {

    $wp_customize->add_section('lasso_custom_teaser', array(
        'title'    => __('custom Teaser Settings', 'lasso'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('custom_teaser_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('custom_teaser_title', array(
        'label'    => __('custom Teaser Title', 'lasso'),
        'section'  => 'lasso_custom_teaser',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('custom_teaser_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('custom_teaser_text', array(
        'label'    => __('custom Teaser Text', 'lasso'),
        'section'  => 'lasso_custom_teaser',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('custom_teaser_button_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('custom_teaser_button_text', array(
        'label'    => __('custom Teaser Button Text', 'lasso'),
        'section'  => 'lasso_custom_teaser',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('custom_teaser_photo_one', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_teaser_photo_one', array(
        'label'    => __('custom Teaser Photo One', 'lasso'),
        'section'  => 'lasso_custom_teaser',
        'settings' => 'custom_teaser_photo_one',
    )));

    $wp_customize->add_setting('custom_teaser_photo_two', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_teaser_photo_two', array(
        'label'    => __('custom Teaser Photo Two', 'lasso'),
        'section'  => 'lasso_custom_teaser',
        'settings' => 'custom_teaser_photo_two',
    )));
}

add_action('customize_register', 'register_custom_teaser');


function register_about_page ($wp_customize) {

    $wp_customize->add_section('lasso_about_page', array(
        'title'    => __('About Page Settings', 'lasso'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('about_main_photo', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Add control for the About Main Photo
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_main_photo', array(
        'label'    => __('About Main Photo', 'lasso'),
        'section'  => 'lasso_about_page',
        'settings' => 'about_main_photo',
    )));

    // Add setting for About Main Photo Alt Text
    $wp_customize->add_setting('about_main_photo_alt', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Add control for the About Main Photo Alt Text
    $wp_customize->add_control('about_main_photo_alt', array(
        'label'    => __('About Main Photo Alt Text', 'lasso'),
        'section'  => 'lasso_about_page',
        'settings' => 'about_main_photo_alt',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('about_main_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_main_title', array(
        'label'    => __('About Main Title', 'lasso'),
        'section'  => 'lasso_about_page',
        'settings' => 'about_main_title',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('about_main_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_main_text', array(
        'label'    => __('About Main Text', 'lasso'),
        'section'  => 'lasso_about_page',
        'settings' => 'about_main_text',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('about_team_photo', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_team_photo', array(
        'label'    => __('About Team Photo', 'lasso'),
        'section'  => 'lasso_about_page',
        'settings' => 'about_team_photo',
    )));

    $wp_customize->add_setting('about_team_photo_alt', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_team_photo_alt', array(
        'label'    => __('About Team Photo Alt Text', 'lasso'),
        'section'  => 'lasso_about_page',
        'settings' => 'about_team_photo_alt',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('about_team_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_team_title', array(
        'label'    => __('About Team Title', 'lasso'),
        'section'  => 'lasso_about_page',
        'settings' => 'about_team_title',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('about_team_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_team_text', array(
        'label'    => __('About Team Text', 'lasso'),
        'section'  => 'lasso_about_page',
        'settings' => 'about_team_text',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('about_mission_photo', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_mission_photo', array(
        'label'    => __('About Mission Photo', 'lasso'),
        'section'  => 'lasso_about_page',
        'settings' => 'about_mission_photo',
    )));

    $wp_customize->add_setting('about_mission_photo_alt', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_mission_photo_alt', array(
        'label'    => __('About Mission Photo Alt Text', 'lasso'),
        'section'  => 'lasso_about_page',
        'settings' => 'about_mission_photo_alt',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('about_mission_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_mission_title', array(
        'label'    => __('About Mission Title', 'lasso'),
        'section'  => 'lasso_about_page',
        'settings' => 'about_mission_title',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('about_mission_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_mission_text', array(
        'label'    => __('About Mission Text', 'lasso'),
        'section'  => 'lasso_about_page',
        'settings' => 'about_mission_text',
        'type'     => 'textarea',
    ));
    
}

add_action('customize_register', 'register_about_page');