<?php
get_header(); ?>

    <div class="container">
        <div class="row">
            <section class="site-content col-lg-8">

                <?php woocommerce_content(); ?>

            </section>

            <?php get_sidebar(); ?>
        </div>
    </div>

<?php
get_footer();
