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
            $image_one_url = get_field('image_one');

    ?>
            <?php var_dump($image_one_url); ?>



            <div class="products-card">
                <div class="products-card__description">
                    <h2 class="products-card__title"><?php the_title(); ?></h2>
                    <span class="products-card__price"><?php echo esc_html($price); ?></span>
                    <p class="products-card__text"><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>">Full Details</a>

                    <button class="btn products-btn">add to cart</button>
                </div>
                <div class="swiper cubeSwiper">
                    <div class="swiper-wrapper">
                        <?php if ($image_one_url) :  ?>

                            <div class="swiper-slide">
                                <img class="products-card__image" src="<?php echo esc_url($image_one_url['url']); ?>">
                            </div>
                        <?php endif; ?>
                        <div class="swiper-slide">
                            <img class="products-card__image" src="https://swiperjs.com/demos/images/nature-2.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img class="products-card__image" src="https://swiperjs.com/demos/images/nature-3.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img class="products-card__image" src="https://swiperjs.com/demos/images/nature-4.jpg" />
                        </div>
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

<!-- <div class="page-spacer"></div>
<div class="products">
    <div class="products-card">
        <div class="products-card__description">
            <h2 class="products-card__title" >Product 1</h2>
            <span class="products-card__price">$100</span>
            <p class="products-card__text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut 
                labore et dolore magna aliqua.
            </p>
            <button class="btn products-btn">add to cart</button>
        </div>
        <div class="swiper cubeSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="products-card__image"  src="https://swiperjs.com/demos/images/nature-1.jpg" />
                </div>
                <div class="swiper-slide">
                    <img class="products-card__image"  src="https://swiperjs.com/demos/images/nature-2.jpg" />
                </div>
                <div class="swiper-slide">
                    <img class="products-card__image"  src="https://swiperjs.com/demos/images/nature-3.jpg" />
                </div>
                <div class="swiper-slide">
                    <img class="products-card__image"  src="https://swiperjs.com/demos/images/nature-4.jpg" />
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>    
    </div>
</div> -->

<?php get_footer() ?>