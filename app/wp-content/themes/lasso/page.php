<?php get_header(); ?>

<main id="main" class="site-main" role="main">
    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_content(); ?>
                <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lasso-child' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div><!-- .entry-content -->
            
            <?php if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif; ?>

        </article><!-- #post-<?php the_ID(); ?> -->

    <?php endwhile; // End of the loop. ?>
</main><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
