<?php
$showControls = false;
$reviewsExist = false;
for ($i = 1; $i <= 5; $i++) {
    $review_text   = get_theme_mod("review_text_{$i}");
    $review_author = get_theme_mod("review_author_{$i}");
    if ($review_text && $review_author) {
        $reviewsExist = true;
        break;
    }
}
if ($reviewsExist) : ?>
    <div class="lasso-reviews">
        <div class="swiper reviewSwiper">
            <div class="swiper-wrapper">
                <?php for ($i = 1; $i <= 5; $i++) : ?>
                    <?php
                    $review_text = get_theme_mod("review_text_{$i}");
                    $review_author = get_theme_mod("review_author_{$i}");
                    if ($review_text && $review_author) :
                        $showControls = true;
                    ?>
                        <div class="swiper-slide">
                            <div class="lasso-reviews__display">
                                <div class="lasso-reviews__display--text">
                                    <p>
                                        "<?php echo esc_html($review_text); ?>"
                                    </p>
                                </div>
                                <div class="lasso-reviews__display--author">
                                    <p>
                                        - <?php echo esc_html($review_author); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <?php if ($showControls) : ?>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <!-- <div class="swiper-scrollbar"></div> -->
                <div class="swiper-pagination"></div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>