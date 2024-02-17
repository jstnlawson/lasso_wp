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
    <?php wp_footer(); ?>
</body>
</html>