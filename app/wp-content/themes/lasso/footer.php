                <footer class="gradient-footer">
                    <?php
                    $company_logo = get_theme_mod('company_logo');
                    $company_name = get_theme_mod('company_name');
                    ?>
                    <div class="gradient-footer__company">
                    <?php if (!empty($company_logo)) : ?>
                        <span>
                            <img src="<?php echo esc_url($company_logo); ?>" alt="company logo">
                        </span>
                    <?php endif; ?>
                    <?php if (!empty($company_name)) : ?>
                        <p class="gradient-footer__company--logo">
                            <?php echo esc_html($company_name); ?>
                        </p>
                    <?php endif; ?>
                    </div>
                    <?php
                    $company_email   = get_theme_mod('company_email');
                    $company_street_address = get_theme_mod('company_street_address');
                    $company_city   = get_theme_mod('company_city');
                    $company_state  = get_theme_mod('company_state');
                    $company_zip    = get_theme_mod('company_zip');
                    $company_phone   = get_theme_mod('company_phone');
                    ?>
                    <div class="gradient-footer__contact">
                        <h4 class="gradient-footer__title">contact</h4>
                        <ul>
                            <?php if (!empty($company_email)) : ?>
                            <li><?php echo esc_html($company_email) ?></li>
                            <?php endif; ?>
                            <?php if (!empty($company_street_address)) : ?>
                            <li><?php echo esc_html($company_street_address) ?></li>
                            <?php endif; ?>
                            <?php if ($company_city || $company_state || $company_zip) : ?>
                            <li><?php echo esc_html($company_city) ?>, <?php echo esc_html($company_state) ?> <?php echo esc_html($company_zip) ?></li>
                            <?php endif; ?>
                            <?php if (!empty($company_phone)) : ?>
                            <li><?php echo esc_html($company_phone) ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
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
    <?php wp_footer(); ?>
</body>
</html>