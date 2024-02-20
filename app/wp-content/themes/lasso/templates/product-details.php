<?php
/*
Template Name: Product Details
*/

get_header();

// Custom query to fetch products
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1 // Adjust as needed
);
$products = new WP_Query($args);

if ($products->have_posts()) :
    while ($products->have_posts()) : $products->the_post();

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

        the_title('<h2>', '</h2>');
        if (!empty($price)) {
            echo '$' . number_format($price, 2);
        }
        echo '<div>';
        the_content();
        echo '</div>';
        if (!empty($dimensions)) {
            echo '<p>Dimensions: ' . esc_html($dimensions) . '</p>';
        }
        if (!empty($specifications)) {
            echo '<p>Specifications: ' . wp_kses_post($specifications) . '</p>';
        }
        foreach ($images as $image) {
            if ($image) {
                echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
            }
        }

    endwhile;
endif;

get_footer();
