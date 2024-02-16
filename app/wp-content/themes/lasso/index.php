<!DOCTYPE html>
<html lang="en">


<head>
    <title>gradient</title>
    <?php wp_head(); ?>
</head>

<body>
    <div id="wpgt" class="wpgt">
        <div class="gradient-header">
            <header>
                <div class="gradient-header__title">
                    <h1>lasso</h1>
                </div>
                <div class='gradient-nav'>
                    <nav>
                        <ul>
                            <li><a href="#">products</a></li>
                            <li><a href="#">in stock</a></li>
                            <li><a href="#">custom</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
        </div>
        <div class="gradient-header__spacer"></div>
        <div class="gradient-gradient">

            <div class="gradient-splash">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide__action-call">
                            <h1 class="swiper-slide__action-call--title section__title">hand crafted furniture made by hand and built to last</h1>
                            <span class="swiper-slide__action-call--sub-title section__sub-title">ready to order?</span>
                            <button class="btn swiper-btn">let's get started</button>
                        </div>
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <?php $image_url = get_theme_mod("carousel_image_{$i}"); ?>
                            <?php if ($image_url) : ?>
                                <div class="swiper-slide">
                                    <img class="swiper-slide__image" src="<?php echo esc_url($image_url); ?>" alt="Carousel Image <?php echo $i; ?>">
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>

            <div class="gradient-reviews">
                <div class="swiper reviewSwiper">
                    <div class="swiper-wrapper">

                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <?php $review_text = get_theme_mod("review_text_{$i}"); ?>
                            <?php $review_author = get_theme_mod("review_author_{$i}"); ?>
                            <?php if ($review_text && $review_author) : ?>
                                <div class="swiper-slide">
                                    <div class="gradient-reviews__display">
                                        <div class="gradient-reviews__display--text">
                                            <p>
                                                "<?php echo esc_html($review_text); ?>"
                                            </p>
                                        </div>
                                        <div class="gradient-reviews__display--author">
                                            <p>
                                                - <?php echo esc_html($review_author); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>

                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <!-- <div class="swiper-scrollbar"></div> -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="gradient-about__teaser">
                <?php $about_teaser_photo = get_theme_mod('about_teaser_photo'); ?>
                <?php $about_teaser_photo_alt = get_theme_mod('about_teaser_photo_alt'); ?>
                <?php $about_teaser_title = get_theme_mod('about_teaser_title'); ?>
                <?php $about_teaser_text = get_theme_mod('about_teaser_text'); ?>
                <?php $about_teaser_button_text = get_theme_mod('about_teaser_button_text'); ?>
                <?php if ($about_teaser_photo && $about_teaser_title && $about_teaser_text && $about_teaser_button_text) : ?>
                    <div class="gradient-about__teaser--photo-container">
                        <img class="gradient-about__teaser--photo" src="<?php echo esc_url($about_teaser_photo); ?>" alt="<?php esc_html($about_teaser_photo_alt); ?> ">
                    </div>
                    <div class="gradient-about__teaser--info">
                        <h1 class="section__title gradient-about__teaser--title"><?php echo esc_html($about_teaser_title); ?></h1>
                        <div class="section__sub-title gradient-about__teaser--text">
                            <p>
                                <?php echo esc_html($about_teaser_text); ?>
                            </p>
                        </div>

                        <div class="gradient-about__teaser--foot">
                            <button class="btn about-btn"><?php echo esc_html($about_teaser_button_text) ?></button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

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

            <div class="gradient-custom__teaser">
                <div class="gradient-custom__photo-container--one">
                    <div class="photo-cover--pink"></div>
                    <img class="gradient-custom__photo--one" src="data:image/jpeg;base64,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" alt="custom furniture">
                </div>
                <div class="gradient-custom__info">
                    <h1 class="section__title gradient-custom__teaser--title">custom furniture</h1>
                    <div class="section__sub-title gradient-custom__teaser--text">
                        <p>looking for something unique? we can help you design and build custom furniture to fit your space and style.</p>
                    </div>
                    <button class="btn custom-btn">let's get started</button>
                </div>
                <div class="gradient-custom__photo-container--two">
                    <div class="photo-cover--yellow"></div>
                    <img class="gradient-custom__photo--two" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBQSFRgVEhUZGRgZGBoYGBoYGhgYGBwYGBkcGhkYGhocIS4lHB4rIRgYJjgmKy8xNTU1GiQ7QDs0Py40NTEBDAwMEA8QHhISHjQhISs0NTQ0NDQ0NDQ0NDQxNDQ0NDQ0NDQ0MTQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NP/AABEIARMAtwMBIgACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAAAAQIDBAUGB//EAEQQAAEDAQQHBAYIBAYCAwAAAAEAAhEDBBIhMUFRYXGBkcEFMqGxBhMiQnLRFDNSgpKz4fAVU2KyI0NzosLxFtIkVGP/xAAZAQEBAQEBAQAAAAAAAAAAAAAAAQIDBAX/xAAkEQEBAAICAgICAgMAAAAAAAAAAQIREjEhUQNBgZEEsRMUYf/aAAwDAQACEQMRAD8A+sBNRhCimkiEigEIac0mCQd6ASKRSgoBCUFKCgaEoKIKBoShEIJIUSnTMg7+iCQTUKQku4KUIGmo3U7qBpqN1MNQSQlB1oQMSnigJoImUmmQUyhmR3oIs0oZkd/RDNKKeR39EEW4zsQZTpe9w6oKCOKWKkhBHFGKaEEcUGVJJyBNMtnenR7p39Aos7nNSo907+gWQ6GbuCGYkjZ1RQzdwRR7zt3VBKCiCmhaBBRB1poCAg60JoQMJpIQIoZkd6CosyO9ANyKKeR39EU8jwRTyO/ogVL3uHVBRS97h1WerbabDdc+CMSIJicpgYLIvKFjd2lRGbwN8jooDtiznKqw7ig3IWEdrWcmBVZOqceSk3tOicqjfFXY2JOWYdo0vtt8VZTtDKgNxwdGcbVBNnc5qVHunf0Cizuc06XdO/oEEqGbuCKPedu6os+buCKHedu6oJppJrQEIQgaEBCBoQhAiosyO9SKizI70BTyPBFPI7+iGZHh1RTyO/ogVL3uHVeQ7afdtLhIEhpMmBGXHML19L3uHVeY7SsrKlpeHtB9gETvhSrJtloWaTOYjI+asfZgxpu4TidZGpaqbA0BoEACBuCptbw1pnw8tq3jaxljJHnbZXa14cw4k4nLDWt1ktTZ7wgRPyxzK5Fvovc72cgMYnAYCcs8QoWazF2EmIwAGM7+K62Ob0Ne3gMcZjUNMaSul6JWv1rKhxwLBjucvIdo9l1mEBsvF0EkDfv1L03oPRcxtUP/APzIz0h5jesZa14bxnl6hnc5p0e6d/QJM7nNSpd07+gXFs7Nm7gnQ7zvh6hKz5u4J0O874eoWhNCCVT9Kp5X2fiCm5DS5MJApqhoQhAIQhAiosyO9SKVPI70CZkeHVKnkd/ROnkeHVKlkd/RAUve4dVwK8/SnwP8sTuvLv0fe4dVw6xi1P8A9If3BStY9h1ODJkyFXUDdGYVtQkSScuCqcI/eWzanLTVx25NosJeYGEgnlGqNarsFAtfdcBAnHLRguw4AHH9/Jef7ZtTw8BgiCMZ0nQV0xyuThlJi9DTqAj5LZ2X78CMG6I0vXmOyXvcSG4446s9Y3ZL03ZFC4HAkkkCSdcu0aM0zmoY3bo0+5zUqPdO/oFGl3OalR7p39AuTZ2bN3BRFQMLnHIN4nEQBtJwUrNm7gqDjUaN7jtuiB4uB4BW9LE20L2NTE/Zza3ZGk7T4K8NGUJyhSSCh1nu404adWTHbCBkf6hjvyVtGoHiQCNBBzBGBB2gqQcDIBGGezTjqVVPB7xrax3E3mk8mN5J0dr0IQtIEkykgCo08jvTKVLI70Cp5Hh1RSyO/onTyPDqlRyO/ogKPvcPIrztvfdtRMT/AIQ/vC9DQ97h1Xne1Y+k46aX/ILKxKq0kiIOPAfvFI02l99xxblHEccCrHkAAzCdFgiRmeOnJLJ23KiabjF3Amc846ZjasVo7OaGy4hxnARIzkRt3rril72kqbGA8NO1amWmcsZWWz0SGgDVsw2ZLXYWkFwOqRzOaiXEd1s7cPJSsk33Sfd15CdiW7Z46bKXc5qdDunf0ChS7nNSod07+gWQ7Nm7gqPUNfU9todDXYEAjEtOR+EK+zZv4KFPv/dPRL5B9Cpfy2fhb8kfQ6f2GfhCvTTU9LuuZYrKy/XFxsB7IECBNGnMLbSoNY8loAloBjAYE/NU2L6yv8bPymLWO9wHmVJIW0yhCFtDKSZSQIpUsjvTKVHJ29AqeTuHVFHJ2/oilk7h1RRydv6IFZ/f4dV5vtt7m2lpbA/wzJOQAOK9JZ/f4dVwu07M2paQ1+Xqjs99qzelnbl2hr3Oa+mTDRAwPta8IxyjqutY6hui9g6MtunFaqVNjWBt5v4upKjaH02CQ5uE4Xhp4rMx19rvapjzMyANZOiDlOmYXQptF0c1zqFoYCL7mkPIgS32Y2ztWy0WxjGyHNOwOarPHa1G0V2MaScABq8AsPYnabLQ990EXW6dIJw8jgsvaVZrx7LvZIN4AgHGIF7QDsCs9HKDWOeQ6S5mOXukDLPStSzTOUrv0u5xKnQ7p39AoUu5xKnQ7p39Aogs2b+C5dj7as77S6gx8vaCHC64AHDCSI15akdrWioxjhRAvugAkgQMSTOvIcV5vsTsW1ioH1XMPtAmHuJ8WrGWWU6m28cZe7p7xpnEJpluRAMEY5Z/qktsMdj+sr/Gz8pq1jvcOqzWT6yt8VP8tq0jvcOqmPS3tJCaFtCKSMUYoAqNLJ29PHYlegHnpQKlk7h1RQydv6FFHJ3DqizjB2/oVkRsub+HVU2qwU6hBqMDiMpVzWlswc+n/acnYtDD/B7P/KbyR/CKH8tvJbsdiUnYpqG2P+FUP5beSf8AC6P8tvJa8diMdiaNsv8ADKP8tvIKynZWU5uMDZzgQrsdiMdnJQRo9ziU6HdPxdAnk2N5Ss/dPxdAgw2yzGo1xbm2DGsHPosdirkGCu3ZM38OqBSF4ugTtEoqym+WhNKTs5fqnjrHJWoy2X6ytvp/2Bafe4dVksZPrK3xs/LatQm9mMuqmPS1YhLHYhaRGSiSmhBF7jGEZjzWdjyBJzMnHZjHmr7RN0xno5oc0YDidw/YQVgnExnvMxJG79FYwFs7TKTASZIEYQNI1z4KaCMlKSpIQRkpSVJCCMlEnYpJFApOxEnYi8i8geOxNggEazKV5F5AqbC0mIxjwU/a2eKYKECx2eKYnYmmgwWIn1tfLvs/KYtYJvaMh5lZbD9baPjZ+UxbB3uA8yszpb2cnYhSQtIhJReKLx1IvHUgjVJjLKDyIPRQDrzjlAgbznHl4KNqtQpgXhgZGzBpcZ2QCsnZTwxgaWgEnGIwJxukbMlkdFj5nYOqVNxde2R4qmz12l72DvNaCeJw81dZji/h1VlWzR3jqCRcdQSY8kkRkJTvbFUK8dQ8UXjqHii/sVb60aEDdUI0DxWW0Wy6JMeKptNsgHDxXCt9vgF50d0dd6zllprHHdabb2pUvC64MB0aefBVG31oBa8mctMrxdm7TdXrPJODAGje4k/8SuxRqOaCJw1L5vz/AMrLDLUe34/gxyx27Lu0a+t3L9FnPa1pGl34f0WFtoKvovlcr/Oy9N/62LoUe17QMXGBtDV6Dsu3uqDGDtjUvD9t231dxgzcL7t0wP8AkvReidqvMZvI4iV7v43y5Z4zLJ5vmwxx8R6e8dQReOoIvHUneOpet5mCwuPrbRh77PymLaHG9kMh5lYrC4+ttGHvs/KYtt43stA07SsY9ftcu0rx1BCLx1eKFtAUJPJgxnGG/QsRtb5LSxwcACQGh2BmDgThgeSA7TaDcB+0TxAWCg+CHNE+2CBpMMIOJ2glW29zaj2AvLS284Atxgi7MEZYkcVjNilwJqhwBJLTkZa4Q4TrIPBZvbUWWG1//JrENJJbTFycpLsZIjG6NOtdyz5v4ea8xY+ynNqOc51EtdADIdhdkmCX4nMmZyXoWVWtl14REuOJw0HBTGX7X5LN+Ftm77vh6qTnLOyqA90GfZx5hYu0rW5rHlneDHFvxBpu+MLbDbWtAGlc2vawdK4/YFr9bRY8mSWiScyVuqLnydODJb3OdH2dPzXnPSG1XWO2BeitTvZK+celttgXBmcIXPLzXTHxF3oxTPq3VD77iRrhpLfOfBd4GAsViaKbGM+y0N5DE85Wl1QL5Hy3l8lr6GE44yNFM4roWdsbs1yW1At9ltbA5jXi9OgGMNZOa54/HlnlqLllMZuvM9uW2/bntJwa1jRuuNf5uK9n6FCpDSWkNv3gSCARGhdehZLOxxeykxr3YucGi8TGl2ZyV9O0uZJdiBJgYuw0DXuX2vjwmOMnqPnZ5ctu+mkmvS87BYPrbR8bPymLb733R5lYbB9dafjZ+Uxbh3vujzKxj1+a1l3+v6MoQULbKJKy2l1wtqfZ9l/wOiT90w7cHa1ocqngEEHI4GcoOalFBbee9w7zS1rfutkjjfc1X2WpN8jTHVY+zCbl0zIJJnEkO9tpJ3OHEHUol/tOpjC/iTjg0TeA1F2j7x0Kf9VbZX33PfoiGfDexd94jkBrKxUXy4M0NDS77joaPxCfuFa2uguA1dVzOznyXu+0ZHwmLvgZ3kppWllT23fD1Cz1HoY723fD1CpeVpl5/wBEHFjXUv5b3s/A4tHgF6VwleOr2p1lr2lwbeloqsblN5sH/c1y49L0ufUx+kBp0tgNjZBXDrbv3p7600yQcDyK+f8Aano3aq1pa9tM3GuDiSWjumYgmcYA4qz/AMgqf/YPMfNaaHpFXGVad+KztrS89l2kf5RO5zP/AGVT7JaRnQfwLD5OW2j6TV9LmO3hah6THKowb2kHwXD/AAfG6/5c3mbRVqsMOpvbOEljro2kxAC7HYjfWVAdAyn7I1rD2x2marnU2nDCSNUTHlzXb7FshbSawd6p3tYYM+eXEnQtY/Hjj0zlncu3Zo2p9RpNK6AXQ1zgSLoHeABEzoxiIznBCyvfUp03Pe4vfBiGNDALzzDY0YTrIWxjA0BoGQWnsBl+0PcR3GXR8TyC7wu8131vw5b1uvQJohOF3cHM7O+utP8AqU/ymLeO8fhHmVz+y/r7V/qM/JYugB7R+EeZWMevzWsu/wBf0kUKUIW2VDmnWfBUWlpunE4+zozcbo81oIOseCoqAlzRIzLjloHzIUoz2kCmQ8mGxcfsb7juBw++dSlRoEtc50hz4Jylsdxv3eUl2tFpp+tcaZd7IEvIgG8e40HWO9wZrVtmqOcwXiLwlr8ovNMGNhiRsIU+1+nMtDyQ5uTn+wdkkl5G5ocRwVFEw94/pb4O/ULRaR/il2ENaGE/1Px16Bcx1P2LLVYWuBBzlujVP/FBF4xkKp061J4OseCgWu1jwWkee9J7I9xpvpYvvFlwwL7XAu04ezdnHQSuQbDaAIqWMO3Npv8ABpK9Q0GpaDjhSZGjv1MTyaB+JdFrHax4fNc+PK7bmdxmnzmrY2T7dhI2+pe3xDVldYrF71G6dhqNPmvrFOm7WPD5qi20XOfQYYPtuecsmU358XNUuNn21M5fp8xbY7F7rqjPhqu6yoV7HSI9i1VAdF4scPKV9iHZVJ/fpUnfFTYfNRf6L2N/es1Hg0N/tITjfZznp8f9HLNLoc72W4vccZM+Mk5cF9Cs1qawXg0kkANa0F11oyBIwGk7yda6L/ReyUalJ7aTQC8sIvPLbzmkscQXHS2798L0lCixk3WtE6gBks8batzknh5ehStFQyykRhJvEAxs0Hmu72FZQyk1wdJeC9xGXt4xjqwHBbWMukkEY55LFZSadR9ORdfNVmWk/wCI0Y6HEO+/sWpjxsrFy5Sx04Os+CV06z4KF46x4fNO8dY8PmurDm9lA+vtWP8Ams1fyaa2trA1XMve0GNcRhkXOA/tK53ZTz6+1Yj61mr+TTQx5+nPxGNnp6vt1Fxxup+a6ZTd/DsXTrPghRvn7Q8ELs5vFH01qzHqWcXPSf6Y1Gw80WYgiA5xAAOfEyPury96DiPkraxxAjBoA45u8SV57lk9HDH07zPTCpTECmxxJJcS54JccSYP7AAGhVf+b1GOLjRYL4BIvOi80QTO1t38C4FbHQFjtFEER4Tgkyvs4Y+no2emr7pDqDCXFznCXe9jB3CG7ghvpbUddHqW7y503m6Dvwx/qXmzOiPBKkXAycsDjrGIP70Eq8qcMfT0Z9LXaaTB95yR9LddNvAuXlrRTDHOE4BxHIrHarQ0QJ7zgPAk47gnLL2nHH09Z2d6QGmxxLGlz3uqOJJzecBhqaGt4LbS9KyT9Wz8Tl4h9qwENnYIPPQEMfUObrg1NEu5kQOAlJlTjPT6A30uDe+xgnKXOk7gMTwBWmh28Kj21LgBaxzGtJIEPLS5283GjGI1YlfPrJTa0kwZ0ucS5x2kkyVvo1TeEEbYwS5X2sxx9PojO33fy28HEq5vb5+w3iSF4NtZw0u810rPWdlek+HinLL2vDH09L2l2k+pSeGsbeAD2QT32EPZ/uaFqp9t32h7WtLXAOaZOIIkHkVw6RywUeyjDXMDouPLPumHs5Nc0cCpyu+zjj6eib2u4+43mVm7Qtz3Na9rBepuvtg5gAh7M/eaXCNcallDDq5fqs1esWd28XaB1MTA2+aXK680mOO/Ed5nat4BzQCCARiciJCf8RccmDmV521U6pohtFwDmtaADkbsQMjAw2rkjtK2UwfW2YOygsMTrOBPkE567rPDfUej7L7QIq2o3QSarJEnCKFL5qf0p/0g1rog0wyJPuve6f8Ad4LzvZnab5cXWZ4vvBPfMey1pJN3HLlhoXYtr3BgNFpvEib4c1rQczJABWZlNdtXG76dM9sP0sbzchZHNxwxSV5Ze04Y+nmoa7BwB2/qotsjQAG4DR/2Fe6m3LLa3LkUqc6IO6Qf14LNrcc+uA0wSDwIP6qhrJ7rCd+AXTqVhpHNRaHHutw1xHiU2ac36K85AN8fFVv7Onvun98V1TR+08bu9+ijdZtJ/egJtXLbYmNwgYbPmq69ia4D2JE6QAPFdmHe60AcvmqajBm5372HElTY5RsgA91o2fuEhSbGF4+X74roGoz3Gl558yVGKj8hG7HxyCcjixNpOziAtFGzsccRywPFWiyz3jJ3k+IWttG77k8ZTkukqNi+y/gcVrZRc3NoO7BUMa05PAOo/qtTHv2EbFN0aGWiMyRscFUawZWBkRUZdzwv05cOJa934FNtVpwM8QFVabDSqAAkyHBwIJaQRkREGeKbRsdaHTdbM6c4b8W3+nnGRvo0w3uuMnEk4knasdOy3MGPIA0HHzVzS8Zw797VqDeHuUXvGZE7/kqBaNDgQrGVWHSOPzV7Z6SZedkIGgnoFpbSnMyqhV1ILydvlyUmJcmtoAyQssyhb0y8wx7dBhKpVDcYJnkVRXa0YuMbv1VX0oDugn98litxf9IccgBuEoc9/vO5rK6rVdg2B4+SgKH23kn96BiorS+swZmT+9afrXHut5qi+G91p3x1Q17yJgjZkU0m2h1Nx7zv3xUPVsGbpPPzw8FBtFzsXyBqMAeB6K4ljBmB584lFK+fdZhrdj+ikBPfcTsGAWZ1qHuNLjrOSrc97u8Y2N+azpWx9RgOPs7iSfNOC7Fj53EeIOPisbLPpJAGs4k9Fa2iRiG3hvx/e5SxWoPcMHgHmD45pgs2tOoqsWlwwg7QVqaQ4ZfhIMb2pCkb41EazPKU2WqDi0+BSbQb7h5GPAqTmkZtnwKsZamVwTGPIwrQNIPJYQxp2b/mtFNxGWK3ErWx5yPIhMsYdHIwqxWwxCg57dB6fotaZaaTADnO9aWhc9roV7HbZ8EiVsDhrQs4fCFrTO3nHvaB7UbtHisr3z3W8/1WkUxqg7ZlVvDAMSd0rDqpBJ7x3AK5lMZweOHlms4tH2G4blIMe7MwsjSXtbq3AKn6RoaMeaGsa3PHf8lK+dAgbMFdKqffOJw3nFIUwM8d/wAtKtY2dOZVlOmT7uO7zTSbZzOj98EnU3H/AK6Loii0d88AoOrBuDGxtKisgspOJHFyuADM5O7JU1XuOZ55cArqDHaDO/JKRIVTkWhw2HEc8UeqYcpYduClcGluOtpw+aneIyM71lULlRumRz81ay1ObgcB4clBtTV7O49FYHzmAd2DuS1GauZWa7QN7fkVK6Di09FnNFrsvkohrmnTxghakStUluY5fuExU2T4eIWenVLcZMaokLU2oDq1HQVUALdBI8R4K6nsg7ioupA7N/zCi6mRonx8RikqNbXShZmvOieGKFraacty5dreZTQsRtKyrU5CFL2v0qGaudkkhVFlDLl/atrO4UIQY/eVT8zwQhZWHS761WrIb00JCsY0LYcQhCKgNKg3ByEINwyUm6UIViU61MYYKmzDMbEIW2Gmxmb044aVbl4eSaEolQ9qZxQhCg//2Q==" alt="custom furniture">
                    
                </div>
            </div>



            <footer class="gradient-footer">
                <div class="gradient-footer__company">
                    <span class="gradient-footer__company--logo">l</span>
                    <p class="gradient-footer__company--est">&copy; 2024 lasso inc</p>
                </div>
                <div class="gradient-footer__contact">
                    <h4 class="gradient-footer__title">contact</h4>
                    <ul>
                        <li>lasso@lasso.com</li>
                    </ul>
                </div>
                <div class="gradient-footer__social">
                    <h4 class="gradient-footer__title">follow us</h4>
                    <ul class="gradient-footer__social-icons__container">
                        <?php
                        $social_sites = array('Facebook' => 'facebook', 'Twitter' => 'twitter', 'Instagram' => 'instagram'); // Map human-readable names to Dashicon slugs
                        foreach ($social_sites as $site_name => $dashicon_slug) {
                            $url = get_theme_mod("social_media_{$site_name}");
                            if ($url) {
                                echo '<li class="gradient-footer__social-icons">';
                                echo "<a href='{$url}' target='_blank'><span class='dashicons dashicons-{$dashicon_slug}'></span></a>";
                                echo '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </footer>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>