<?php
get_header(); ?>

    <div class="container">
        <section class="site-content">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', get_post_format() );

                    the_post_navigation();

                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile;
            ?>

        </section>
    </div>

<?php
get_footer();
