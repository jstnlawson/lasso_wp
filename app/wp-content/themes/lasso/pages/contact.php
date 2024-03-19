<?php
/*
Template Name: Contact
*/
$contact_main_title = get_theme_mod('contact_main_title');
$contact_main_text  = get_theme_mod('contact_main_text');
get_header(); ?>
<div class="page-spacer"></div>
<div class="contact">
    <div class="contact-banner">
        <h1 class="contact-banner__title"><?php echo esc_html($contact_main_title); ?></h1>
        <p class="contact-banner__text"><?php echo esc_html($contact_main_text); ?></p>
    </div>
    <div class="form-container">
        <?php
        if (have_posts()) : while (have_posts()) : the_post();

                the_content();

            endwhile;
        endif;
        ?>
    </div>
</div>
<?php get_footer() ?>