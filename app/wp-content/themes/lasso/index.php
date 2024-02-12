<!DOCTYPE html>
<html lang="en">


<head>
    <title>gradient</title>
    <?php wp_head(); ?>
</head>

<body>
    <div id="wpgt">
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
            <div class="gradient-section">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <?php $image_url = get_theme_mod("carousel_image_{$i}"); ?>
                            <?php if ($image_url) : ?>
                                <div class="swiper-slide">
                                    <img class="swiper-image" src="<?php echo esc_url($image_url); ?>" alt="Carousel Image <?php echo $i; ?>">
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