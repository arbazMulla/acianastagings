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

        <header id="masthead" class="shadow-sm bg-white d-flex justify-content-between align-items-center min-vh-84" role="banner">
            <div class="container">
                <nav class="navbar navbar-expand-lg p-0 m-0">
                    <div class="container-fluid p-0">
                        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home"">
                        <img src=" <?php echo get_template_directory_uri(); ?>/images/logo.png" alt="" />
                        </a>
                        <div class="nav-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation" data-bs-no-animation="true">
                            <span class="nav-toggle">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>
                        <div class="collapse navbar-collapse" id="main-menu">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container' => false,
                                'menu_class' => '',
                                'fallback_cb' => '__return_false',
                                'items_wrap' => '<ul id="%1$s" class="navbar-nav align-items-xsm-baseline align-items-sm-start gap-lg-5 gap-sm-2 mt-lg-0 py-xsm-4">%3$s</ul>',
                                'depth' => 3,
                                'walker' => new bootstrap_5_wp_nav_menu_walker()
                            ));
                            ?>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <div id="content" class="px-3 site-content">