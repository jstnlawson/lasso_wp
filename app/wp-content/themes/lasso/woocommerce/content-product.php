<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<li <?php wc_product_class('', $product); ?>>

    <div class="page-spacer"></div>
    <div class="products">
        <div class="products-card">
            <div class="products-card__description">
                <h2 class="products-card__title"><?php the_title(); ?></h2>
                <span class="products-card__price"><?php echo $product->get_price_html(); ?></span>
                <?php
                if (!empty($product->get_short_description())) {
                    echo '<p class="products-card__text">' . apply_filters('woocommerce_short_description', $product->get_short_description()) . '</p>';
                }
                ?>
                <div class="products-card__single-link--container">
                    <a href="<?php the_permalink(); ?>" class="btn products-card__single-link">full details</a>
                </div>
            </div>
            <!-- Swiper code will go here -->
            <div class="swiper cubeSwiper">
                <div class="swiper-wrapper">
                    <?php
                    // Get main product image ID
                    $main_image_id = $product->get_image_id();

                    // Output the main product image first
                    if ($main_image_id) {
                        $main_image_url = wp_get_attachment_url($main_image_id);
                        echo '<div class="swiper-slide"><img src="' . $main_image_url . '" /></div>';
                    }

                    // Get gallery image IDs and output them
                    $attachment_ids = $product->get_gallery_image_ids();
                    foreach ($attachment_ids as $attachment_id) {
                        $image_url = wp_get_attachment_url($attachment_id);
                        echo '<div class="swiper-slide"><img src="' . $image_url . '" /></div>';
                    }
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </div>
</li>