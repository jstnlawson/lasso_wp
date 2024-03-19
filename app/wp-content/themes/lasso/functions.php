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
        'priority' => 1,
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

    // Contact Page Link
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
        'priority' => 3,
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

add_action('customize_register', function ($wp_customize) {
    // Check if the panel does not already exist to avoid conflicts
    if (!$wp_customize->get_panel('my_homepage_settings_panel')) {
        $wp_customize->add_panel('my_homepage_settings_panel', array(
            'title' => __('My Homepage Settings', 'lasso'),
            'description' => __('Customize the homepage settings for my theme.', 'lasso'),
            'priority' => 2, // Adjust priority to change the position in the Customizer
        ));
    }
});

function register_hero_carousel($wp_customize) {

    $wp_customize->add_section('lasso_hero_settings', array(
        'title'    => __('Homepage Hero', 'lasso'),
        'priority' => 1,
        'panel'    => 'my_homepage_settings_panel',
    ));

    $wp_customize->add_setting('hero_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('hero_title', array(
        'label'    => __('hero Title', 'lasso'),
        'section'  => 'lasso_hero_settings',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('hero_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('hero_text', array(
        'label'    => __('hero Text', 'lasso'),
        'section'  => 'lasso_hero_settings',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('hero_button_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('hero_button_text', array(
        'label'    => __('hero Button Text', 'lasso'),
        'section'  => 'lasso_hero_settings',
        'type'     => 'text',
    ));

    for ($i = 1; $i <= 5; $i++) { 
        $wp_customize->add_setting("hero_image_{$i}", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "carousel_image_{$i}", array(
            'label'    => sprintf(__('Hero Image %d', 'lasso'), $i),
            'section'  => 'lasso_hero_settings',
            'settings' => "hero_image_{$i}",
        )));
    }
}

add_action('customize_register', 'register_hero_carousel');



function register_review_carousel($wp_customize) {

    $wp_customize->add_section('lasso_review_settings', array(
        'title'    => __('Homepage Reviews', 'lasso'),
        'priority' => 2,
        'panel'    => 'my_homepage_settings_panel',
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
        'title'    => __('Homepage About Teaser', 'lasso'),
        'priority' => 3,
        'panel'    => 'my_homepage_settings_panel',
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
        'title'    => __('Homepage Product Teaser', 'lasso'),
        'priority' => 4,
        'panel'    => 'my_homepage_settings_panel',
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

function register_contact_teaser ($wp_customize) {

    $wp_customize->add_section('lasso_contact_teaser', array(
        'title'    => __('Homepage Contact Teaser', 'lasso'),
        'priority' => 5,
        'panel'    => 'my_homepage_settings_panel',
    ));

    $wp_customize->add_setting('contact_teaser_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('contact_teaser_title', array(
        'label'    => __('Contact Teaser Title', 'lasso'),
        'section'  => 'lasso_contact_teaser',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('contact_teaser_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('contact_teaser_text', array(
        'label'    => __('Contact Teaser Text', 'lasso'),
        'section'  => 'lasso_contact_teaser',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('contact_teaser_button_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('contact_teaser_button_text', array(
        'label'    => __('Contact Teaser Button Text', 'lasso'),
        'section'  => 'lasso_contact_teaser',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('contact_teaser_photo_one', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'contact_teaser_photo_one', array(
        'label'    => __('Contact Teaser Photo One', 'lasso'),
        'section'  => 'lasso_contact_teaser',
        'settings' => 'contact_teaser_photo_one',
    )));

    $wp_customize->add_setting('contact_teaser_photo_two', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'contact_teaser_photo_two', array(
        'label'    => __('Contact Teaser Photo Two', 'lasso'),
        'section'  => 'lasso_contact_teaser',
        'settings' => 'contact_teaser_photo_two',
    )));
}

add_action('customize_register', 'register_contact_teaser');


function register_about_page ($wp_customize) {

    $wp_customize->add_section('lasso_about_page', array(
        'title'    => __('About Page Settings', 'lasso'),
        'priority' => 4,
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

function register_contact_page ($wp_customize) {
    
        $wp_customize->add_section('lasso_contact_page', array(
            'title'    => __('Contact Page Settings', 'lasso'),
            'priority' => 5,
        ));
    
        $wp_customize->add_setting('contact_main_photo', array(
            'default'   => '',
            'transport' => 'refresh',
        ));
    
    
        $wp_customize->add_setting('contact_main_title', array(
            'default'   => '',
            'transport' => 'refresh',
        ));
    
        $wp_customize->add_control('contact_main_title', array(
            'label'    => __('Contact Main Title', 'lasso'),
            'section'  => 'lasso_contact_page',
            'settings' => 'contact_main_title',
            'type'     => 'text',
        ));
    
        $wp_customize->add_setting('contact_main_text', array(
            'default'   => '',
            'transport' => 'refresh',
        ));
    
        $wp_customize->add_control('contact_main_text', array(
            'label'    => __('Contact Main Text', 'lasso'),
            'section'  => 'lasso_contact_page',
            'settings' => 'contact_main_text',
            'type'     => 'textarea',
        ));
    
}

add_action('customize_register', 'register_contact_page');

function woocommerce_support() {
    if (class_exists('WooCommerce')) {
        add_filter('woocommerce_enqueue_styles', '__return_empty_array');
    }
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'woocommerce_support');

function custom_toast_script() {
    // Enqueue custom script with jQuery as a dependency
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/assets/js/toast.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'custom_toast_script');


// add_filter('use_block_editor_for_post', '__return_false', 10);
