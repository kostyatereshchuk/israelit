<?php
get_header(); ?>

    <div class="container">
        <div class="row">
            <section class="site-content col-lg-8">

                <?php
                while (have_posts()) : the_post();

                    get_template_part('template-parts/content', 'page');

                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile;
                ?>

            </section>

            <?php get_sidebar(); ?>
        </div>
    </div>

<?php
get_footer();
