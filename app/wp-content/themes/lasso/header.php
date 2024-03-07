<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <title>lasso</title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php
    $header_title = get_theme_mod('header_title');
    $about_page_link     = get_theme_mod('about_page_link');
    $products_page_link  = get_theme_mod('products_page_link');
    $contact_page_link   = get_theme_mod('contact_page_link');
    $cart_page_link      = get_theme_mod('cart_page_link');
	$cart_count          = function_exists('WC') ? WC()->cart->get_cart_contents_count() : 0;

    // Determine if we should show the navigation based on whether any page links are set
    $hasPageLinks = $about_page_link || $products_page_link || $contact_page_link || $cart_page_link;

    if ($header_title && $hasPageLinks) : ?>
        <div class="lasso-header">
            <header>
                <div class="lasso-header__title">
                    <a class="home-link" href="<?php echo esc_url(home_url('/')); ?>">
                        <h1><?php echo esc_html($header_title); ?></h1>
                    </a>
                </div>
                <div class='lasso-nav'>
                    <nav>
                        <ul>
                            <?php if ($products_page_link) : ?>
                                <li>
                                    <a href="<?php echo esc_url(get_permalink($products_page_link)); ?>">
                                        <?php echo esc_html(get_the_title($products_page_link)); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ($about_page_link) : ?>
                                <li>
                                    <a href="<?php echo esc_url(get_permalink($about_page_link)); ?>">
                                        <?php echo esc_html(get_the_title($about_page_link)); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ($contact_page_link) : ?>
                                <li>
                                    <a href="<?php echo esc_url(get_permalink($contact_page_link)); ?>">
                                        <?php echo esc_html(get_the_title($contact_page_link)); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (function_exists('WC') && $cart_page_link && !is_cart()) : ?>
                                <?php if (!WC()->cart->is_empty()) : ?>
                                    <li >
                                        <a class="cart-image" href="<?php echo esc_url(get_permalink($cart_page_link)); ?>">
                                            <img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/images/commerce/cart.svg'; ?>" alt="cart">
                                            <!-- Display the number of items in the cart -->
                                            <span><?php echo $cart_count; ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </header>
        </div>
    <?php endif; ?>
    <div class="lasso-header__spacer"></div>
    <div class="lasso-lasso">