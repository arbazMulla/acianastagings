<?php

/**
 * Template Name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aciana
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <div class="container">
        <?php
        $args = array(
            'post_type'      => 'page',
            'posts_per_page' => -1,
            'post_parent'  => 44,
            'post__not_in' => array(46, 64, 67, 96, 179, 446, 448, 450, 452, 454, 1315, 1814, 1838, 1841, 1843),
            'orderby'   => 'menu_order',
            'order'  => 'ASC'
        );
        $products = new WP_Query($args);
        if ($products->have_posts()) :
        ?>
            <div class="home-product-items col-max-10 col-center">
                <?php while ($products->have_posts()) : $products->the_post(); ?>
                    <div class="home-product-item">
                        <div class="flex-row flex-center">
                            <div class="col-xs-12 col-md-6 flex-item">
                                <div class="home-product-image animate-it">
                                    <?php the_post_thumbnail('full'); ?>
                                </div>
                            </div><!-- .col -->
                            <div class="col-xs-12 col-md-6 flex-item animate-it">
                                <?php
                                the_title('<h2 class="font-exo">', '</h2>');
                                the_content();
                                ?>
                                <p class="animate-it">
                                    <a href="<?php the_permalink(); ?>" class="read-more">Learn more<i class="icon-arrow-right"></i>
                                    </a>
                                </p>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .home-product-item -->
                <?php endwhile; ?>
            </div><!-- .home-product-items -->
        <?php endif;
        wp_reset_postdata(); ?>
        <?php the_content(); ?>
        <?php
        $args = array(
            'post_type'      => 'page',
            'posts_per_page' => -1,
            'post_parent'  => 77,

            'orderby'   => 'menu_order',
            'order'  => 'ASC'
        );
        $solutions = new WP_Query($args);
        if ($solutions->have_posts()) :
        ?>
            <div class="home-solution-items">
                <div class="section-head ">
                    <h2 class="section-title animate-it">Our Healthcare Solutions</h2>
                </div>
                <div aria-label="Solution Items" class="solution-carousel carousel-flex">
                    <?php while ($solutions->have_posts()) : $solutions->the_post(); ?>
                        <div class="solution-carousel-item flex-inner">
                            <a aria-label="Home Solution Items" class="home-solution-item flex-inner" href="<?php the_permalink(); ?>">
                                <span class="home-solution-thumb"><?php the_post_thumbnail(); ?></span>
                                <?php the_title('<h3>', '</h3>'); ?>
                            </a>
                        </div><!-- .solution-carousel-item -->
                    <?php endwhile; ?>
                </div><!-- .solution-carousel -->
            </div><!-- .home-solution-items -->
        <?php endif;
        wp_reset_postdata(); ?>
    </div><!-- .container -->

<?php endwhile; // End of the loop. 
?>
<?php get_footer(); ?>