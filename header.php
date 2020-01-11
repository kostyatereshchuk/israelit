<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="site-header" role="banner">
        <nav class="container">
            <a class="site-logo brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo get_bloginfo( 'name' ); ?>">
                <?php if ( $site_logo = get_theme_mod( 'site_logo' ) ): ?>
                    <img src="<?php echo $site_logo; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                <?php else: ?>
                    <?php echo get_bloginfo( 'name' ); ?>
                <?php endif; ?>
            </a>

            <button class="navbar-toggle" aria-label="Navigation Menu">
                <i class="fa fa-bars"></i>
            </button>

            <div class="navbar-nav" role="navigation">
                <?php

                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'depth' => 3,
                ) );

                ?>
            </div>
        </nav>
	</header>

    <main class="site-main" role="main">

