<?php
            $products_teaser_title       = get_theme_mod('products_teaser_title');
            $products_teaser_text        = get_theme_mod('products_teaser_text');
            $products_teaser_photo_one   = get_theme_mod('products_teaser_photo_one');
            $products_teaser_photo_two   = get_theme_mod('products_teaser_photo_two');
            $products_teaser_photo_three = get_theme_mod('products_teaser_photo_three');
            $products_teaser_button_text = get_theme_mod('products_teaser_button_text');
            if ($products_teaser_title && $products_teaser_text && $products_teaser_photo_one && $products_teaser_photo_two && $products_teaser_photo_three && $products_teaser_button_text) : ?>
                <div class="gradient-products__teaser">
                    <div class="gradient-products__teaser-head">
                        <div class="gradient-products__teaser-info">
                            <h1 class="section__title gradient-products__teaser--title"><?php echo esc_html($products_teaser_title); ?></h1>
                            <div class="section__sub-title gradient-products__teaser--text">
                                <p><?php echo esc_html($products_teaser_text); ?></p>
                            </div>
                            <button class="btn products-btn"><?php echo esc_html($products_teaser_button_text); ?></button>
                        </div>
                        <div class="gradient-products__teaser-image--container">
                            <img class="gradient-products__teaser-image" src="<?php echo esc_url($products_teaser_photo_one); ?>" alt="shelf">
                        </div>
                    </div>
                    <div class="gradient-products__teaser-foot">
                        <div class="gradient-products__teaser-image--container">
                            <img class="gradient-products__teaser-image" src="<?php echo esc_url($products_teaser_photo_two); ?>" alt="shelf">
                        </div>
                        <div class="gradient-products__teaser-image--container">
                            <img class="gradient-products__teaser-image" src="<?php echo esc_url($products_teaser_photo_three); ?>" alt="shelf">
                        </div>
                    </div>
                </div>
            <?php endif; ?>