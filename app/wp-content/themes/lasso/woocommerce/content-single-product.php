<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */



global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>

<div class="single-product">
    <div class="single-product__head">


        <div class="thumbnail">
            <div class="swiper thumbSwiper2">
                <div class="swiper-wrapper">
                    <?php
                    // Get main product image ID
                    $main_image_id = $product->get_image_id();
                    // Get gallery image IDs
                    $attachment_ids = $product->get_gallery_image_ids();

                    // Combine main image ID with gallery IDs, ensuring the main image is at the start
                    $all_image_ids = array_filter(array_merge(array($main_image_id), $attachment_ids));

                    foreach ($all_image_ids as $attachment_id) {
                        // Get image URL
                        $image_url = wp_get_attachment_url($attachment_id);
                        if ($image_url) { // Check if URL is valid
                            echo '<div class="swiper-slide"><img class="thumbSwiper-img--main" src="' . $image_url . '"></div>';
                        }
                    }
                    ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div thumbsSlider="" class="swiper thumbSwiper">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($all_image_ids as $attachment_id) {
                        // Get image URL
                        $image_url = wp_get_attachment_url($attachment_id);
                        if ($image_url) { // Check if URL is valid
                            echo '<div class="swiper-slide"><img class="thumbSwiper-img--thumb" src="' . $image_url . '"></div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="single-product__quick-details">
            <h1 class="single-product__title"><?php the_title(); ?></h1>
            <span class="products-card__price"><?php echo $product->get_price_html(); ?></span>
            <?php woocommerce_template_single_add_to_cart(); ?>
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

        <?php
        $attributes = $product->get_attributes();
        if ($attributes) {
            foreach ($attributes as $attribute) {
                // Ensure visibility
                if (!$attribute->get_visible()) {
                    continue;
                }

                // Get attribute data
                $attribute_name = wc_attribute_label($attribute->get_name());
                $values = array();

                // Check if the attribute is a taxonomy
                if ($attribute->is_taxonomy()) {
                    $attribute_terms = wc_get_product_terms($product->get_id(), $attribute->get_name(), array('fields' => 'all'));
                    foreach ($attribute_terms as $attribute_term) {
                        $values[] = esc_html($attribute_term->name);
                    }
                } else {
                    // For custom attributes
                    $values = $attribute->get_options();
                    foreach ($values as &$value) {
                        $value = esc_html($value);
                    }
                }
            }
        }
        ?>
        <div class="single-product__dropdown">
            <div class="single-product__dropdown--head">
                <h2 class="single-product__dropdown--title"><?php echo $attribute_name; ?></h2>
                <button class="single-product__dropdown--icon">▿</button>
            </div>
            <div class="single-product__dropdown--content">
                <?php foreach ($values as $value) : ?>
                    <p><?php echo $value; ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php do_action('woocommerce_after_single_product'); ?>