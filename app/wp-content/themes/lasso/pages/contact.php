<?php

/*
Template Name: Contact
*/
get_header(); ?>
<div class="page-spacer"></div>
<div class="contact">
    <div class="contact-banner">
        <h1 class="contact-banner__title">Contact Us</h1>
        <p class="contact-banner__text">We'd love to hear from you. Please fill out the form below and we'll get back to you as soon as possible.</p>
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