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
    <div class="about-head">
        <?php if ($about_main_photo) : ?>
            <img class="about-head__image" src="<?php echo $about_main_photo; ?>" alt="<?php echo $about_main_photo_alt; ?>">
        <?php endif; ?>
        <div class="about-head__blurb">
            <h1 class="section__title">meet your maker</h1>
            <div class="section__sub-title">
                <p>
                    i'm a passionate individual who loves to create. i believe 
                    that the best products are made with love and care.
                </p>
            </div>
        </div>
    </div>
    <div class="about-content">

    </div>
</div>

<?php get_footer() ?>