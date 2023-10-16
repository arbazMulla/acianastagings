<?php

/**
 * 
 * Template Name: Test Header
 * 
 * The test-header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aciana
 */

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLR8rMhIWhMKl6WzyKRb8sAg5B8W4F5c5F5F5F5F5F5F" crossorigin="anonymous">


    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@400;500&family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/heade.css' ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header id="masthead" class="shadow-sm bg-white d-flex justify-content-between align-items-center min-vh-84" role="banner">
        <div class="container">
            <nav class="navbar navbar-expand-lg p-0 m-0">
                <div class="container-fluid d-flex align-items-center justify-content-between">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"">
                        <img src=" <?php echo get_template_directory_uri(); ?>/images/logo.png" alt="" />
                    </a>
                    <button class="nav-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- <span class="nav-toggle "> -->
                        <span></span>
                        <span></span>
                        <span></span>
                        <!-- </span> -->

                    </button>
                    <!-- <span class="nav-toggle ">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span> -->

                    <div class="collapse navbar-collapse" id="main-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container' => false,
                            'menu_class' => '',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class="navbar-nav align-items-center align-items-sm-start gap-lg-5 gap-sm-2 mt-sm-4 mt-lg-0">%3$s</ul>',
                            'depth' => 3,
                            'walker' => new bootstrap_5_wp_nav_menu_walker()
                        ));
                        ?>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


    <script>
        // jQuery(document).on("click", ".nav-toggle", function(e) {
        //     jQuery(this).toggleClass("open");
        //     jQuery("html").toggleClass("nav-open");
        // });

        jQuery(document).ready(function() {

            jQuery('.nav-toggle').on('click', function() {
                jQuery('.navbar-collapse').addClass('fade-in-top');
            })


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
        // jQuery('#menu-header_menu li.dropdown:first-child ul.dropdown-menu').addClass('show');
    </script>