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
        get_field('image_four')
    );
?>
    <div class="single-product">
        <div class="single-product__head">
            <?php if (!empty($images)) : ?>
                <div class="single-product__carousel">
                    <div class="swiper singleProductSwiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($images as $image) : ?>
                                <?php if ($image) : ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="single-product__quick-details">
                <h2><?php the_title(); ?></h2>
                <?php if (!empty($price)) : ?>
                    <span>$ <?php echo number_format($price, 2) ?></span>
                <?php endif; ?>
                <button class="btn">Add to cart</button>
            </div>

        </div>

        <div class="single-product__dropdown__container">
            <div class="single-product__dropdown">
                <div class="single-product__dropdown--title">
                    <h3>Description</h3>
                    <button class="single-product__dropdown--icon">↓</button>
                </div>
                <div class="single-product__dropdown--content">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="single-product__dropdown">
                <div class="single-product__dropdown--title">
                    <h3>Dimensions</h3>
                    <button class="single-product__dropdown--icon">↓</button>
                </div>
                <div class="single-product__dropdown--content">
                    <?php if (!empty($dimensions)) : ?>
                        <p><?php echo esc_html($dimensions) ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="single-product__dropdown">
                <div class="single-product__dropdown--title">
                    <h3>Specifications</h3>
                    <button class="single-product__dropdown--icon">↓</button>
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