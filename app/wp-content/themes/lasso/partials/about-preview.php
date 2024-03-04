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
            <img class="gradient-about__teaser--photo" src="<?php echo esc_url($about_teaser_photo); ?>" alt="<?php esc_attr($about_teaser_photo_alt); ?> ">
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