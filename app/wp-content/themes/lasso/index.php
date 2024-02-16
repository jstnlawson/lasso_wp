<!DOCTYPE html>
<html lang="en">


<head>
    <title>gradient</title>
    <?php wp_head(); ?>
</head>

<body>

    <div id="wpgt" class="wpgt">
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

            <?php
            $hasImages = false;
            $splash_title       = get_theme_mod('splash_title');
            $splash_text        = get_theme_mod('splash_text');
            $splash_button_text = get_theme_mod('splash_button_text');
            for ($i = 1; $i <= 5; $i++) {
                if (get_theme_mod("carousel_image_{$i}")) {
                    $hasImages = true;
                    break;
                }
            }
            if ($hasImages && $splash_title && $splash_text && $splash_button_text) : ?>
                <div class="gradient-splash">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide__action-call">
                                <h1 class="swiper-slide__action-call--title section__title"><?php echo esc_html($splash_title) ?></h1>
                                <span class="swiper-slide__action-call--sub-title section__sub-title"><?php echo esc_html($splash_text) ?></span>
                                <button class="btn swiper-btn"><?php echo esc_html($splash_button_text) ?></button>
                            </div>
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <?php $image_url = get_theme_mod("carousel_image_{$i}"); ?>
                                <?php if ($image_url) : ?>
                                    <div class="swiper-slide">
                                        <img class="swiper-slide__image" src="<?php echo esc_url($image_url); ?>" alt="Carousel Image <?php echo $i; ?>">
                                    </div>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


            <?php
            $showControls = false;
            $reviewsExist = false;
            for ($i = 1; $i <= 5; $i++) {
                $review_text   = get_theme_mod("review_text_{$i}");
                $review_author = get_theme_mod("review_author_{$i}");
                if ($review_text && $review_author) {
                    $reviewsExist = true;
                    break;
                }
            }
            if ($reviewsExist) : ?>
                <div class="gradient-reviews">
                    <div class="swiper reviewSwiper">
                        <div class="swiper-wrapper">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <?php
                                $review_text = get_theme_mod("review_text_{$i}");
                                $review_author = get_theme_mod("review_author_{$i}");
                                if ($review_text && $review_author) :
                                    $showControls = true;
                                ?>
                                    <div class="swiper-slide">
                                        <div class="gradient-reviews__display">
                                            <div class="gradient-reviews__display--text">
                                                <p>
                                                    "<?php echo esc_html($review_text); ?>"
                                                </p>
                                            </div>
                                            <div class="gradient-reviews__display--author">
                                                <p>
                                                    - <?php echo esc_html($review_author); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                        <?php if ($showControls) : ?>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                            <!-- <div class="swiper-scrollbar"></div> -->
                            <div class="swiper-pagination"></div>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>

            <?php
            $about_teaser_photo       = get_theme_mod('about_teaser_photo');
            $about_teaser_photo_alt   = get_theme_mod('about_teaser_photo_alt');
            $about_teaser_title       = get_theme_mod('about_teaser_title');
            $about_teaser_text        = get_theme_mod('about_teaser_text');
            $about_teaser_button_text = get_theme_mod('about_teaser_button_text');
            if ($about_teaser_photo && $about_teaser_title && $about_teaser_text && $about_teaser_button_text) :
            ?>
                <div class="gradient-about__teaser">
                    <div class="gradient-about__teaser--photo-container">
                        <img class="gradient-about__teaser--photo" src="<?php echo esc_url($about_teaser_photo); ?>" alt="<?php esc_html($about_teaser_photo_alt); ?> ">
                    </div>
                    <div class="gradient-about__teaser--info">
                        <h1 class="section__title gradient-about__teaser--title"><?php echo esc_html($about_teaser_title); ?></h1>
                        <div class="section__sub-title gradient-about__teaser--text">
                            <p>
                                <?php echo esc_html($about_teaser_text); ?>
                            </p>
                        </div>

                        <div class="gradient-about__teaser--foot">
                            <button class="btn about-btn"><?php echo esc_html($about_teaser_button_text) ?></button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            $products_teaser_title       = get_theme_mod('products_teaser_title');
            $products_teaser_text        = get_theme_mod('products_teaser_text');
            $products_teaser_photo_one   = get_theme_mod('products_teaser_photo_one');
            $products_teaser_photo_two   = get_theme_mod('products_teaser_photo_two');
            $products_teaser_photo_three = get_theme_mod('products_teaser_photo_three');
            $products_teaser_button_text = get_theme_mod('products_teaser_button_text');
            if ($products_teaser_title && $products_teaser_text && $products_teaser_photo_one && $products_teaser_photo_two && $products_teaser_photo_three && $products_teaser_button_text) : ?>
                <div class="gradient-products__teaser">
                    <div class="gradient-products__teaser-head">
                        <div class="gradient-products__teaser-info">
                            <h1 class="section__title gradient-products__teaser--title"><?php echo esc_html($products_teaser_title); ?></h1>
                            <div class="section__sub-title gradient-products__teaser--text">
                                <p><?php echo esc_html($products_teaser_text); ?></p>
                            </div>
                            <button class="btn products-btn"><?php echo esc_html($products_teaser_button_text); ?></button>
                        </div>
                        <div class="gradient-products__teaser-image--container">
                            <img class="gradient-products__teaser-image" src="<?php echo esc_url($products_teaser_photo_one); ?>" alt="shelf">
                        </div>
                    </div>
                    <div class="gradient-products__teaser-foot">
                        <div class="gradient-products__teaser-image--container">
                            <img class="gradient-products__teaser-image" src="<?php echo esc_url($products_teaser_photo_two); ?>" alt="shelf">
                        </div>
                        <div class="gradient-products__teaser-image--container">
                            <img class="gradient-products__teaser-image" src="<?php echo esc_url($products_teaser_photo_three); ?>" alt="shelf">
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            $custom_teaser_title       = get_theme_mod('custom_teaser_title');
            $custom_teaser_text        = get_theme_mod('custom_teaser_text');
            $custom_teaser_button_text = get_theme_mod('custom_teaser_button_text');
            $custom_teaser_photo_one   = get_theme_mod('custom_teaser_photo_one');
            $custom_teaser_photo_two   = get_theme_mod('custom_teaser_photo_two');
            if ($custom_teaser_title && $custom_teaser_text && $custom_teaser_button_text && $custom_teaser_photo_one && $custom_teaser_photo_two) : ?>
                <div class="gradient-custom__teaser">
                    <div class="gradient-custom__photo-container--one">
                        <div class="photo-cover--pink"></div>
                        <img class="gradient-custom__photo--one" src="<?php echo esc_url($custom_teaser_photo_one); ?>" alt="custom photo">
                    </div>
                    <div class="gradient-custom__info">
                        <div class="gradient-custom__teaser--text-container">
                            <h1 class="section__title gradient-custom__teaser--title"><?php echo esc_html($custom_teaser_title); ?></h1>

                            <div class="section__sub-title gradient-custom__teaser--text">
                                <p><?php echo esc_html($custom_teaser_text); ?></p>
                            </div>

                            <button class="btn custom-btn"><?php echo esc_html($custom_teaser_button_text); ?></button>
                        </div>
                    </div>
                    <div class="gradient-custom__photo-container--two">
                        <div class="photo-cover--yellow"></div>
                        <img class="gradient-custom__photo--two" src="<?php echo esc_url($custom_teaser_photo_two); ?>" alt="custom photo">
                    </div>
                </div>
            <?php endif; ?>

            <footer class="gradient-footer">
                <?php
                $company_logo = get_theme_mod('company_logo');
                $company_name = get_theme_mod('company_name');
                if ($company_logo || $company_name) : ?>
                <div class="gradient-footer__company">
                    <span class="gradient-footer__company--logo">
                        <img src="<?php echo esc_url($company_logo); ?>" alt="company logo">
                    </span>
                    <p class="gradient-footer__company--est">
                        <?php echo esc_html($company_name); ?>
                    </p>
                </div>
                <?php endif; ?>
                <?php
                $company_email   = get_theme_mod('company_email');
                $company_address = get_theme_mod('company_address');
                $company_phone   = get_theme_mod('company_phone');
                if ($company_email || $company_address || $company_phone) : ?>
                <div class="gradient-footer__contact">
                    <h4 class="gradient-footer__title">contact</h4>
                    <ul>
                        <li><?php echo esc_html($company_email) ?></li>
                        <li><?php echo esc_html($company_address) ?></li>
                        <li><?php echo esc_html($company_phone) ?></li>
                    </ul>
                </div>
                <?php endif; ?>
                <div class="gradient-footer__social">
                    <h4 class="gradient-footer__title">follow us</h4>
                    <ul class="gradient-footer__social-icons__container">
                        <?php
                        $social_sites = array('Facebook' => 'facebook', 'Twitter' => 'twitter', 'Instagram' => 'instagram');
                        foreach ($social_sites as $site_name => $dashicon_slug) {
                            $url = get_theme_mod("social_media_{$site_name}");
                            if ($url) {
                                echo '<li class="gradient-footer__social-icons">';
                                echo "<a href='{$url}' target='_blank'><span class='dashicons dashicons-{$dashicon_slug}'></span></a>";
                                echo '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </footer>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>