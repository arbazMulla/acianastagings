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

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container-fluid">
		<div class="site-info">
			<div class="row">
				<div class="col-xs-8 footer-col">
					<?php #printmeta('footer_message', '<p>%s</p>', '', 'option'); 
					?>
					<ul class="list-inline social-links">
						<?php
						#printmeta('instagram', '<li class="ln"><a href="%s" title="Linkedin" target="_blank"><i class="icon-linkedin-sq"></i></a></li>', '', 'option');
						#printmeta('facebook', '<li class="fb"><a href="%s" title="Facebook" target="_blank"><i class="icon-facebook"></i></a></li>', '', 'option');
						#printmeta('twitter', '<li class="fb"><a href="%s" title="Twitter" target="_blank"><i class="icon-twitter"></i></a></li>', '', 'option');
						?>
					</ul>
				</div><!-- .col -->
				<div class="col-xs-4 footer-col">
					<img width="50" height="51" src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-logo.svg" alt="<?php bloginfo('name'); ?>">
				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .site-info -->
	</div><!-- .container-fluid -->
</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>

</body>

</html>