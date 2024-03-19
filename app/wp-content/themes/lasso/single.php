<?php get_header(); ?>

<main id="main" class="site-main" role="main">
    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                <div class="entry-meta">
                    <?php
                    // Example meta information display
                    echo esc_html( get_the_date() );
                    echo esc_html__( ' by ', 'lasso-child' );
                    the_author_posts_link();
                    ?>
                </div><!-- .entry-meta -->
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

            <footer class="entry-footer">
                <?php
                // Example of displaying categories and tags
                the_category( ', ' );
                the_tags( '<ul><li>', '</li><li>', '</li></ul>' );
                ?>
            </footer><!-- .entry-footer -->

            <?php
            // Post navigation links for next and previous post
            the_post_navigation();

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>

        </article><!-- #post-<?php the_ID(); ?> -->

    <?php endwhile; // End of the loop. ?>
</main><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
