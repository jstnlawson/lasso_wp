<?php
$custom_teaser_title       = get_theme_mod('custom_teaser_title');
$custom_teaser_text        = get_theme_mod('custom_teaser_text');
$custom_teaser_button_text = get_theme_mod('custom_teaser_button_text');
$custom_teaser_photo_one   = get_theme_mod('custom_teaser_photo_one');
$custom_teaser_photo_two   = get_theme_mod('custom_teaser_photo_two');
if ($custom_teaser_title && $custom_teaser_text && $custom_teaser_button_text && $custom_teaser_photo_one && $custom_teaser_photo_two) : ?>
    <div class="lasso-custom__teaser">
        <div class="lasso-custom__photo-container--one">
            <div class="photo-cover--pink"></div>
            <img class="lasso-custom__photo--one" src="<?php echo esc_url($custom_teaser_photo_one); ?>" alt="custom photo">
        </div>
        <div class="lasso-custom__info">
            <div class="lasso-custom__teaser--text-container">
                <h1 class="section__title lasso-custom__teaser--title"><?php echo esc_html($custom_teaser_title); ?></h1>

                <div class="section__sub-title lasso-custom__teaser--text">
                    <p><?php echo esc_html($custom_teaser_text); ?></p>
                </div>

                <button class="btn custom-btn"><?php echo esc_html($custom_teaser_button_text); ?></button>
            </div>
        </div>
        <div class="lasso-custom__photo-container--two">
            <div class="photo-cover--yellow"></div>
            <img class="lasso-custom__photo--two" src="<?php echo esc_url($custom_teaser_photo_two); ?>" alt="custom photo">
        </div>
    </div>
<?php endif; ?>
</div>