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
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/heade.css' ?>">


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
                    <div class="container-fluid d-flex align-items-center justify-content-between">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"">
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
                                'items_wrap' => '<ul id="%1$s" class="navbar-nav align-items-xsm-baseline align-items-sm-start gap-lg-5 gap-sm-2 mt-sm-4 mt-xsm-2 mt-lg-0 py-xsm-4">%3$s</ul>',
                                'depth' => 3,
                                'walker' => new bootstrap_5_wp_nav_menu_walker()
                            ));
                            ?>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <script>
            jQuery(document).ready(function() {

                jQuery('.nav-toggle').on('click', function() {
                    let navBarCol = jQuery(this).toggleClass('active');

                    if (navBarCol.hasClass('active')) {
                        // jQuery('.navbar-collapse').addClass('show fade-in-top');
                        // jQuery('.navbar-collapse').removeClass('fade-out-top');
                        jQuery('.navbar-collapse').fadeToggle();
                    } else {
                        jQuery('.navbar-collapse').fadeToggle();
                        // jQuery('.navbar-collapse').removeClass('show fade-in-top');
                    }
                });

                jQuery('#menu-header_menu li.dropdown a').addClass('d-flex align-items-center gap-2 pe-0')
                jQuery('.dropdown-menu').addClass('p-0 ps-3 py-lg-3 py-sm-0 py-md-0 pe-1 position-absolute border-0 width-300');
                jQuery('.dropdown-menu-end a').addClass('d-flex align-items-center justify-content-between ')
                jQuery('.dropdown-menu-end ul.sub-menu').addClass('sub-dropdown-menu');
                jQuery('.dropdown-menu-end').removeClass('p-0 ps-3 py-3 py-lg-3 dropdown-menu position-absolute width-300');

                jQuery('#menu-header_menu li.dropdown').mouseenter(
                    function() {
                        jQuery('.dropdown-menu-end').find('.dropdown-menu').addClass('hide');
                        jQuery(this).find('.dropdown-menu').addClass('show');
                    }).mouseleave(
                    function() {
                        jQuery(this).find('.dropdown-menu').removeClass('show');
                    });

                //for sub sub menu
                jQuery('li.dropdown-menu-end').mouseenter(
                    function() {
                        jQuery(this).addClass('active');
                        jQuery('.dropdown-menu-end').find('.dropdown-menu').removeClass('hide');
                        jQuery(this).find('ul .sub-menu').addClass('show');
                    }).mouseleave(
                    function() {
                        jQuery(this).removeClass('qwerty');
                        jQuery(this).find('ul .sub-menu').removeClass('show');
                        jQuery(this).find('a.dropdown-item').removeClass('active');
                        jQuery(this).find('a.dropdown-item').removeClass('bisc');
                    });
            });
        </script>
        <div id="content" class="site-content p-4">