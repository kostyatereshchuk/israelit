<?php
get_header(); ?>

    <div class="container">
        <section class="site-content error-404 not-found">

            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'israelit'); ?></h1>
            </header>

            <div class="page-content">
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'israelit' ); ?></p>

                <?php
                get_search_form();
                ?>

            </div>

        </section>
    </div>

<?php
get_footer();
