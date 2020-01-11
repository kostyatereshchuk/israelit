<?php
get_header(); ?>

    <div class="container">
        <div class="row">
            <section class="site-content col-lg-8">

                <?php
                if ( have_posts() ) :

                    if ( is_home() && !is_front_page() ) : ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>

                    <?php
                    endif;

                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', get_post_format() );

                    endwhile;

                    the_posts_navigation();

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif; ?>

            </section>

            <?php get_sidebar(); ?>
        </div>
    </div>

<?php
get_footer();
