<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aciana
 */

?>

</div><!-- #content -->

<footer class="site-footer py-sm-5 background-Blue background-fluid" role="contentinfo">
    <div class="container pt-lg-5 pt-5 px-4 px-sm-2">
        <div class="row p-0">
            <div class="col-lg-3 col-md-4 col-6 mt-sm-4 mt-lg-0 mb-md-4 mb-lg-0 mb-4">
                <h5 class="text-white mb-4 mb-sm-3 mb-md-4">Products</h5>
                <?php
                wp_nav_menu(array(
                    'menu' => 'products-menu',
                    'walker' => new HeaderMenuWalker(),
                ));
                ?>
            </div>
            <div class="col-lg-3 col-md-4 col-6 mt-sm-4 mt-lg-0  mb-4">
                <h5 class="text-white mb-4  mb-4 mb-sm-3 mb-md-4">Solutions</h5>
                <?php
                wp_nav_menu(array(
                    'menu' => 'solutions-menu',
                    'walker' => new HeaderMenuWalker(),
                ));
                ?>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mt-sm-4 mt-lg-0  mb-4">
                <h5 class="text-white mb-4  mb-4 mb-sm-3 mb-md-4">Other Links</h5>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => '',
                    'fallback_cb' => '__return_false',
                    'items_wrap' => '<ul id="%1$s" class="navbar-nav align-items-xsm-baseline align-items-sm-start gap-lg-5 gap-sm-2 mt-sm-4 mt-xsm-2 mt-lg-0 py-xsm-4">%3$s</ul>',
                    'depth' => 3,
                    'walker' => new Custom_Bootstrap_5_Walker()
                ));
                ?>

            </div>
            <div class="col-lg-4 col-md-4 col-6 d-flex justify-content-sm-start justify-content-lg-end mt-sm-4 mt-lg-0  mb-4">
                <img class=" img-responsive img-fluid footerlogo" src="<?php echo get_template_directory_uri() . '/images/footerlogo.png' ?>" alt="">
            </div>
        </div>
        <div class="row mt-4 mt-sm-5">
            <div class="col-lg-6 col-md-3 d-flex align-items-start align-items-md-start justify-content-start gap-2 flex-md-row mb-3 mb-sm-0">
                <?php
                $icons = get_field('social_media_icons', 'option');
                if ($icons) :
                    foreach ($icons as $icon) {
                        $image = $icon['social_icon_image'];
                        $link = $icon['link'];
                ?>
                        <a href="<?php echo esc_url($link); ?>">
                            <img src="<?php echo esc_url($image); ?>" alt="">
                        </a>
                <?php
                    }
                endif;
                ?>
            </div>
            <div class="col-lg-6 col-md-9  d-flex align-items-center align-items-sm-center justify-content-md-end mt-sm-3 mt-md-0 copyright ">
                <?php printmeta('footer_message', '<p class="text-white m-0 p-0">%s</p>', '', 'option');
                ?>
            </div>
        </div>
    </div>
</footer>
</div>


<?php wp_footer(); ?>

<script>
    jQuery(document).ready(function() {

        jQuery('.nav-toggle').on('click', function() {
            let navBarCol = jQuery(this).toggleClass('active');

            if (navBarCol.hasClass('active')) {

                jQuery('.navbar-collapse').fadeToggle();
            } else {
                jQuery('.navbar-collapse').fadeToggle();
            }
        });

        jQuery('#menu-header_menu li.dropdown a').addClass('d-flex align-items-center gap-2 pe-0')
        jQuery('.dropdown-menu').addClass('p-0 ps-3 py-lg-3 py-sm-0 py-md-0 pe-1 position-absolute border-0 width-300 mt-xsm-2');
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
</body>

</html>