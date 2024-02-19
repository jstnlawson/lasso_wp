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
    <h2><?php the_title(); ?> details</h2>

    <div class="product-details__description">
        <?php the_content(); ?>
    </div>

    <?php if (!empty($dimensions)) : ?>
        <p>Dimensions: <?php echo esc_html($dimensions) ?></p>
    <?php endif; ?>

    <?php if (!empty($specifications)) : ?>
        <p>Specifications: <?php echo wp_kses_post($specifications) ?></p>
    <?php endif; ?>
    <?php if (!empty($price)) : ?>
        <span>$ <?php echo number_format($price, 2) ?></span>
    <?php endif; ?>


    <button class="btn">Add to cart</button>

    <a href="<?php echo get_permalink(get_page_by_title('Products')); ?>">Back to products</a>

<?php endwhile; ?>

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

<?php get_footer(); ?>