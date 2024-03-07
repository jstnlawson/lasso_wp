<?php
$contact_teaser_title       = get_theme_mod('contact_teaser_title');
$contact_teaser_text        = get_theme_mod('contact_teaser_text');
$contact_teaser_button_text = get_theme_mod('contact_teaser_button_text');
$contact_teaser_photo_one   = get_theme_mod('contact_teaser_photo_one');
$contact_teaser_photo_two   = get_theme_mod('contact_teaser_photo_two');
if ($contact_teaser_title && $contact_teaser_text && $contact_teaser_button_text && $contact_teaser_photo_one && $contact_teaser_photo_two) : ?>
    <div class="lasso-contact__teaser">
        <div class="lasso-contact__photo-container--one">
            <div class="photo-cover--pink"></div>
            <img class="lasso-contact__photo--one" src="<?php echo esc_url($contact_teaser_photo_one); ?>" alt="contact photo">
        </div>
        <div class="lasso-contact__info">
            <div class="lasso-contact__teaser--text-container">
                <h1 class="section__title lasso-contact__teaser--title"><?php echo esc_html($contact_teaser_title); ?></h1>

                <div class="section__sub-title lasso-contact__teaser--text">
                    <p><?php echo esc_html($contact_teaser_text); ?></p>
                </div>

                <button class="btn contact-btn"><?php echo esc_html($contact_teaser_button_text); ?></button>
            </div>
        </div>
        <div class="lasso-contact__photo-container--two">
            <div class="photo-cover--yellow"></div>
            <img class="lasso-contact__photo--two" src="<?php echo esc_url($contact_teaser_photo_two); ?>" alt="contact photo">
        </div>
    </div>
<?php endif; ?>
</div>