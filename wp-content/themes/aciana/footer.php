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

<footer id="colophon" class="site-footer py-sm-5 background-Blue" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h5 class="text-white mb-4">Products</h5>
                <?php
                wp_nav_menu(array(
                    'menu' => 'products-menu',
                    'walker' => new HeaderMenuWalker(),
                ));
                ?>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-sm-4 mt-lg-0">
                <h5 class="text-white mb-4">Solutions</h5>
                <?php
                wp_nav_menu(array(
                    'menu' => 'solutions-menu',
                    'walker' => new HeaderMenuWalker(),
                ));
                ?>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 mt-sm-4 mt-lg-0">
                <h5 class="text-white mb-4">Other Links</h5>
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
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-sm-start justify-content-lg-end mt-sm-4 mt-lg-0">
                <img class=" img-responsive img-fluid footerlogo" src="<?php echo get_template_directory_uri() . '/images/footerlogo.png' ?>" alt="">
            </div>
        </div>
        <div class="row mt-4 mt-sm-5">
            <div class="col-12 d-flex align-items-center align-items-md- justify-content-between flex-sm-column flex-md-row">
                <div class="d-flex gap-2 col-sm-12  col-md-6">
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
                <div class="copyright d-flex align-items-center align-items-sm-center justify-content-md-end mt-sm-3 mt-md-0 col-sm-12 col-md-6">
                    <?php printmeta('footer_message', '<p class="text-white m-0 p-0">%s</p>', '', 'option');
                    ?>

                </div>
            </div>
        </div>
    </div>
</footer>
</div>


<?php wp_footer(); ?>

</body>

</html>