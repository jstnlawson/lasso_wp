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
</div>