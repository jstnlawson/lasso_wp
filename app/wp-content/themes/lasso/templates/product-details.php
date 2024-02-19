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

$price = get_post_meta(get_the_ID(), 'price', true);
$description = get_post_meta(get_the_ID(), 'description', true);
$dimensions = get_post_meta(get_the_ID(), 'dimensions', true);
$specifications = get_post_meta(get_the_ID(), 'specifications', true);

if ($products->have_posts()) : while ($products->have_posts()) : $products->the_post();
    // Display each product details here
    the_title(); 
    the_content();
    echo $price;
    echo $description;
    echo $dimensions;
    echo $specifications;

endwhile; endif;

get_footer();
