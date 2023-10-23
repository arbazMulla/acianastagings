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


        <?php the_content(); ?>

    </div><!-- .container -->

<?php endwhile; // End of the loop. 
?>
<?php get_footer(); ?>