<?php
get_header();

while (have_posts()) : the_post();
    $price = get_field('price');
    $dimensions = get_field('dimensions');
    $specifications = get_field('specifications');
    $images = array(
        get_field('image_one'),
        get_field('image_two'),
        get_field('image_three'),
        get_field('image_four'),
        get_field('image_five'),
        get_field('image_six'),
        get_field('image_seven'),
        get_field('image_eight'),
        get_field('image_nine'),
        get_field('image_ten')
    );
?>
    <div class="single-product">
        <div class="single-product__head">
        <?php if (!empty($images)) : ?>
        <div class="thumbnail">
            <div class="swiper thumbSwiper2">
                <div class="swiper-wrapper">
                    <?php foreach ($images as $image) : ?>
                        <?php if ($image) : ?>
                            <div class="swiper-slide">
                                <img class="thumbSwiper-img--main" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div thumbsSlider="" class="swiper thumbSwiper">
                <div class="swiper-wrapper">
                    <?php foreach ($images as $image) : ?>
                        <?php if ($image) : ?>
                            <div class="swiper-slide">
                                <img class="thumbSwiper-img--thumb" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
           

            <div class="single-product__quick-details">
                <h1 class="single-product__title"><?php the_title(); ?></h1>
                <?php if (!empty($price)) : ?>
                    <span class="products-card__price">$ <?php echo number_format($price, 2) ?></span>
                <?php endif; ?>
                <button class="btn products-btn">Add to cart</button>
            </div>

        </div>

        <div class="single-product__dropdown__container">
            <div class="single-product__dropdown">
                <div class="single-product__dropdown--head">
                    <h2 class="single-product__dropdown--title">Description</h2>
                    <button class="single-product__dropdown--icon">▿</button>
                </div>
                <div class="single-product__dropdown--content">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="single-product__dropdown">
                <div class="single-product__dropdown--head">
                    <h2 class="single-product__dropdown--title">Dimensions</h2>
                    <button class="single-product__dropdown--icon">▿</button>
                </div>
                <div class="single-product__dropdown--content">
                    <?php if (!empty($dimensions)) : ?>
                        <p><?php echo esc_html($dimensions) ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="single-product__dropdown">
                <div class="single-product__dropdown--head">
                    <h2 class="single-product__dropdown--title">Specifications</h2>
                    <button class="single-product__dropdown--icon">▿</button>
                </div>
                <div class="single-product__dropdown--content">
                    <?php if (!empty($specifications)) : ?>
                        <p><?php echo wp_kses_post($specifications) ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- <a href="<?php echo get_permalink(get_page_by_title('Products')); ?>" class="btn">Back to products</a> -->

    <?php endwhile; ?>
    </div>

    <?php get_footer(); ?>