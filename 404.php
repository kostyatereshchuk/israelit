<?php
get_header(); ?>

    <div class="container">
        <div class="row">
            <section class="site-content error-404 not-found col-lg-8">

                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'israelit'); ?></h1>
                </header>

                <div class="page-content">
                    <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'israelit'); ?></p>

                    <?php
                    get_search_form();
                    ?>

                </div>

            </section>

            <?php get_sidebar(); ?>
        </div>
    </div>

<?php
get_footer();
