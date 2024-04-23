<div class="home-page">
<?php
$hasImages = false;
$hero_title       = get_theme_mod('hero_title');
$hero_text        = get_theme_mod('hero_text');
$hero_button_text = get_theme_mod('hero_button_text');
for ($i = 1; $i <= 5; $i++) {
    if (get_theme_mod("hero_image_{$i}")) {
        $hasImages = true;
        break;
    }
}
if ($hasImages && $hero_title && $hero_text && $hero_button_text) : ?>
    <div class="lasso-hero">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="opaque-box swiper-slide__action-call">
                    <h1 class="swiper-slide__action-call--title section__title"><?php echo esc_html($hero_title) ?></h1>
                    <span class="swiper-slide__action-call--sub-title section__sub-title"><?php echo esc_html($hero_text) ?></span>
                    <button class="btn swiper-btn"><?php echo esc_html($hero_button_text) ?></button>
                </div>
                <?php for ($i = 1; $i <= 5; $i++) : ?>
                    <?php $image_url = get_theme_mod("hero_image_{$i}"); ?>
                    <?php if ($image_url) : ?>
                        <div class="swiper-slide">
                            <img class="swiper-slide__image" src="<?php echo esc_url($image_url); ?>" alt="Hero Image <?php echo $i; ?>">
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
    </div>
<?php endif; ?>


