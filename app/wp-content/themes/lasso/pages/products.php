<?php

/*
Template Name: Products
*/
get_header(); ?>

<div class="page-spacer"></div>
<div class="products">

    <?php
    $args = array(
        'post_type' => 'product', // Ensure this matches your CPT key
        'posts_per_page' => -1 // Adjust as needed
    );
    $products_query = new WP_Query($args);

    if ($products_query->have_posts()) :
        while ($products_query->have_posts()) : $products_query->the_post();
            $price = get_field('price'); // Assuming you're using ACF to add a price field
            // Fetch images if using ACF fields, or use get_the_post_thumbnail() for featured image
            $image_one = get_field('image_one');
            $image_two = get_field('image_two');
            $image_three = get_field('image_three');
            $image_four = get_field('image_four');
    ?>
            <div class="products-card">
                <div class="products-card__description">
                    <h2 class="products-card__title"><?php the_title(); ?></h2>
                    <span class="products-card__price">$ <?php echo number_format($price, 2) ?></span>
                    <p class="products-card__text"><?php the_excerpt(); ?></p>
                    <div class="products-card__single-link--container">
                        <a href="<?php the_permalink(); ?>" class="products-card__single-link">full details</a>
                    </div>
                    <button class="btn products-btn">add to cart</button>
                </div>
                <div class="swiper cubeSwiper">
                    <div class="swiper-wrapper">
                        <?php if ($image_one) :  ?>
                            <div class="swiper-slide">
                                <img class="products-card__image" src="<?php echo esc_url($image_one['url']); ?>">
                            </div>
                        <?php endif; ?>
                        <?php if ($image_two) :  ?>
                            <div class="swiper-slide">
                                <img class="products-card__image" src="<?php echo esc_url($image_two['url']); ?>">
                            </div>
                        <?php endif; ?>
                        <?php if ($image_three) :  ?>
                            <div class="swiper-slide">
                                <img class="products-card__image" src="<?php echo esc_url($image_three['url']); ?>">
                            </div>
                        <?php endif; ?>
                        <?php if ($image_four) :  ?>
                            <div class="swiper-slide">
                                <img class="products-card__image" src="<?php echo esc_url($image_four['url']); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
    <?php
        endwhile;
        wp_reset_postdata(); // Reset the global post object
    endif;
    ?>
</div>

<?php get_footer() ?>