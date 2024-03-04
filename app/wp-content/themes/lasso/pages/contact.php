<?php

/*
Template Name: Contact
*/
get_header(); ?>
<div class="page-spacer"></div>
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();

    the_content();

endwhile; endif;
?>

<?php get_footer() ?>