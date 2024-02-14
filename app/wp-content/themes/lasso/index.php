<!DOCTYPE html>
<html lang="en">


<head>
    <title>gradient</title>
    <?php wp_head(); ?>
</head>

<body>
    <div id="wpgt" class="wpgt">
        <div class="gradient-header">
            <header>
                <div class="gradient-header__title">
                    <h1>lasso</h1>
                </div>
                <div class='gradient-nav'>
                    <nav>
                        <ul>
                            <li><a href="#">products</a></li>
                            <li><a href="#">in stock</a></li>
                            <li><a href="#">custom</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
        </div>
        <div class="gradient-header__spacer"></div>
        <div class="gradient-gradient">

            <div class="gradient-splash">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide__action-call">
                            <h1 class="swiper-slide__action-call--title">hand crafted furniture made by hand and built to last</h1>
                            <span class="swiper-slide__action-call--sub-title">ready to order?</span>
                            <button class="btn swiper-btn">let's get started</button>
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

            <div class="gradient-reviews">
                <div class="swiper reviewSwiper">
                    <div class="swiper-wrapper">

                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <?php $review_text = get_theme_mod("review_text_{$i}"); ?>
                            <?php $review_author = get_theme_mod("review_author_{$i}"); ?>
                            <?php if ($review_text && $review_author) : ?>
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
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <!-- <div class="swiper-scrollbar"></div> -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="gradient-about__teaser">
                <div class="gradient-about__teaser--head">
                    <div class="gradient-about__teaser--photo-container">
                        <img class="gradient-about__teaser--photo" src="<?php echo get_template_directory_uri(); ?>/assets/images/shelf.jpeg" alt="Teaser Photo">
                    </div>

                    <div class="gradient-about__teaser--info">
                        <h1 class="gradient-about__teaser--title">this is what we're about</h1>
                        <div class="gradient-about__teaser--text">
                            <p>
                                At Lasso, we believe in the power of hand-crafted furniture.
                                Our pieces are made by hand and built to last. We are proud to
                                offer a wide range of products that are ready to order, and we
                                also offer custom furniture design services.
                            </p>
                        </div>
                        <div class="gradient-about__teaser--foot">
                            <button class="btn about-btn">learn more</button>
                        </div>
                    </div>
                    
                </div>

            </div>


            <footer class="gradient-footer">
                <div class="gradient-footer__company">
                    <span class="gradient-footer__company--logo">l</span>
                    <p class="gradient-footer__company--est">&copy; 2024 lasso inc</p>
                </div>
                <div class="gradient-footer__contact">
                    <h4 class="gradient-footer__title">contact</h4>
                    <ul>
                        <li>lasso@lasso.com</li>
                    </ul>
                </div>
                <div class="gradient-footer__social">
                    <h4 class="gradient-footer__title">follow us</h4>
                    <ul class="gradient-footer__social-icons__container">
                        <?php
                        $social_sites = array('Facebook' => 'facebook', 'Twitter' => 'twitter', 'Instagram' => 'instagram'); // Map human-readable names to Dashicon slugs
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