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

the_title('<h2>', '</h2>');
if (!empty($price)) {
    echo '$' . number_format($price, 2);
}
echo '<div class="product-details__description">';
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

get_footer();