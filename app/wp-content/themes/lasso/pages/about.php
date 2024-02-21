<?php
/*
Template Name: About
*/
get_header(); ?>
<?php
$about_main_photo       = get_theme_mod('about_main_photo');
$about_main_photo_alt   = get_theme_mod('about_main_photo_alt');
 
?>
<div class="about">
    <div class="about-owner">
        <?php if ($about_main_photo) : ?>
            <img class="about-owner__image" src="<?php echo $about_main_photo; ?>" alt="<?php echo $about_main_photo_alt; ?>">
        <?php endif; ?>
        <div class="opaque-box about-owner__blurb">
            <h1 class="section__title">meet your maker</h1>
            <div class="section__sub-title">
                <p>
                    i'm a passionate individual who loves to create. i believe 
                    that the best products are made with love and care.
                </p>
            </div>
        </div>
    </div>
    <div class="about-team">
        <h1 class="section__title">our team</h1>
        <div class="section__sub-title">
            <p>
                we are a small team of passionate individuals who love to create. 
                we believe that the best products are made with love and care.
            </p>
        </div>  
    </div>
    <div class="about-mission">
        <h1 class="section__title">our mission</h1>
        <div class="section__sub-title">
            <p>
                we believe that the best products are made with love and care. 
                we strive to create the best products for our customers.
            </p>
        </div>
    </div>
</div>

<?php get_footer() ?>