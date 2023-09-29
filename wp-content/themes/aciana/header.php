<?php

/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aciana
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@400;500&family=Poppins:wght@500;600;700&family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TM8WRHP');
    </script>
    <!-- End Google Tag Manager -->
    <meta name="google-site-verification" content="24y4t9otSltZ-JcY8agnQsWY888-DhZh5EgT0yL_Vy8" />


    <?php wp_head(); ?>



</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TM8WRHP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="page" class="hfeed site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'aciana'); ?></a>

        <header id="masthead" class="site-header" role="banner">
            <div class="container-fluid ">
                <div class="site-branding">
                    <?php if (is_front_page() || is_home()) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php endif; ?>
                </div><!-- .site-branding -->
                <span class="menuToggle nav-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
                </nav><!-- #site-navigation -->
            </div><!-- .container-fluid -->
        </header><!-- #masthead -->

        <div id="content" class="site-content">