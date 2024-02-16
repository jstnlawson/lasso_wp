<!DOCTYPE html>
<html lang="en">

<head>
    <title>gradient</title>
    <?php wp_head(); ?>
</head>

<body>
        <?php
        $header_title = get_theme_mod('header_title');
        // Check if any of the specific page links have been set
        $about_page_link    = get_theme_mod('about_page_link');
        $products_page_link = get_theme_mod('products_page_link');
        $custom_page_link   = get_theme_mod('custom_page_link');

        // Determine if we should show the navigation based on whether any page links are set
        $hasPageLinks = $about_page_link || $products_page_link || $custom_page_link;

        if ($header_title && $hasPageLinks) : ?>
            <div class="gradient-header">
                <header>
                    <div class="gradient-header__title">
                        <h1><?php echo esc_html($header_title); ?></h1>
                    </div>
                    <div class='gradient-nav'>
                        <nav>
                            <ul>
                                <?php if ($about_page_link) : ?>
                                    <li>
                                        <a href="<?php echo esc_url(get_permalink($about_page_link)); ?>">
                                            <?php echo esc_html(get_the_title($about_page_link)); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if ($products_page_link) : ?>
                                    <li>
                                        <a href="<?php echo esc_url(get_permalink($products_page_link)); ?>">
                                            <?php echo esc_html(get_the_title($products_page_link)); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if ($custom_page_link) : ?>
                                    <li>
                                        <a href="<?php echo esc_url(get_permalink($custom_page_link)); ?>">
                                            <?php echo esc_html(get_the_title($custom_page_link)); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </header>
            </div>
        <?php endif; ?>
        <div class="gradient-header__spacer"></div>
        <div class="gradient-gradient">