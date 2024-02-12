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
                <?php if (is_active_sidebar('gradient-carousel-section')) : ?>
                    <?php dynamic_sidebar('gradient-carousel-section'); ?>
                <?php endif; ?>
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
                        <li class="gradient-footer__social-icons">
                            <?php echo file_get_contents(plugin_dir_path(__DIR__) . 'lasso/assets/images/social/facebook.svg'); ?>
                        </li>
                        <li class="gradient-footer__social-icons">
                            <?php echo file_get_contents(plugin_dir_path(__DIR__) . 'lasso/assets/images/social/instagram.svg'); ?>
                        </li>
                        <li class="gradient-footer__social-icons">
                            <?php echo file_get_contents(plugin_dir_path(__DIR__) . 'lasso/assets/images/social/threads.svg'); ?>
                        </li>
                        <li class="gradient-footer__social-icons">
                            <?php echo file_get_contents(plugin_dir_path(__DIR__) . 'lasso/assets/images/social/x.svg'); ?>
                        </li>
                        <li class="gradient-footer__social-icons">
                            <?php echo file_get_contents(plugin_dir_path(__DIR__) . 'lasso/assets/images/social/linkedin.svg'); ?>
                        </li>
                        <li class="gradient-footer__social-icons">
                            <?php echo file_get_contents(plugin_dir_path(__DIR__) . 'lasso/assets/images/social/twitter.svg'); ?>
                        </li>
                        <li class="gradient-footer__social-icons">
                            <?php echo file_get_contents(plugin_dir_path(__DIR__) . 'lasso/assets/images/social/youtube.svg'); ?>
                        </li>
                        
                    </ul>
                </div>

            </footer>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>