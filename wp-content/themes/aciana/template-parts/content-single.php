<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aciana
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header animate-it">
		<a href="<?php echo get_permalink(13);?>" class="go-back"><i class="icon-angle-left"></i>Back to blog</a>
		<?php 
			the_title( '<h1 class="page-title">', '</h1>' ); 
			$author_image = get_field('author_image');
			$author_name = get_field('author_name');
			$author_designation = get_field('author_designation');
			if($author_image || $author_name || $author_designation){
		?>
			<div class="insight-author">
				<?php if($author_image){ echo '<img src="'.$author_image['url'].'" alt="'.$author_name.'"/>';}?>
				<div class="insight-author-in">
					<?php 
						printmeta('author_name', '<p><span>%s</span></p>');
						printmeta('author_designation', '<p>%s</p>')
					?>
				</div>
			</div><!-- .insight-author -->
		<?php }?>
		<?php the_post_thumbnail('full');?>
	</header><!-- .entry-header -->
	<div class="entry-content-main">
		<div class="col-max-7">
			<div class="entry-content animate-it">
				<?php the_content(); ?>
				
			</div><!-- .entry-content -->
		</div>
		<div class="social-share animate-it">
			<span class="font-exo">Share</span>
			<ul class="list-unstyled">
				<li>
					<a class="share-popup fb" target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink($post->ID);?>&t=<?php echo get_the_title($post->ID);?>"><i class="icon-facebook"></i></a>

				</li>
				<li>
					<a class="share-popup in" target="_blank" href="http://linkedin.com/shareArticle?mini=true&title=<?php echo get_the_title($post->ID);?>&url=<?php echo get_permalink($post->ID);?>"><i class="icon-linkedin-sq"></i></a>
				</li>
				<li>
					<a class="share-popup tw" target="_blank" href="https://twitter.com/share?text=<?php echo get_the_title($post->ID);?>&url=<?php echo get_permalink($post->ID);?>"><i class="icon-twitter"></i></a>
				</li>
			</ul>
		</div>
	</div>

	<footer class="entry-footer">
		<div class="flex-row post-nav-items">
			<?php 
				$prevPost = get_previous_post();
				if($prevPost){
			?>
				<div class="col-xs-12 col-sm-6 flex-item">
					<a class="post-navitem flex-inner animate-it" href="<?php echo get_permalink( $prevPost->ID );?>">
						<div class="post-navitem-in">
							<?php echo get_the_post_thumbnail( $prevPost->ID, 'thumbnail' );?>
							<div class="post-navitem-inner">
								<span class="fonnt-exo">Previous article</span>
								<h3><?php echo $prevPost->post_title;?></h3>
							</div><!-- .post-navitem-inner -->
						</div><!-- .post-navitem-in -->
					</a><!-- .post-navitem -->
				</div><!-- .col -->
			<?php } ?>
			<?php 
				$nextPost = get_next_post();
				if($nextPost){
			?>
				<div class="col-xs-12 col-sm-6 flex-item">
					<a class="post-navitem flex-inner animate-it" href="<?php echo get_permalink( $nextPost->ID );?>">
						<div class="post-navitem-in">
							<?php echo get_the_post_thumbnail( $nextPost->ID, 'thumbnail' );?>
							<div class="post-navitem-inner">
								<span class="fonnt-exo">Next article</span>
								<h3><?php echo $nextPost->post_title;?></h3>
							</div><!-- .post-navitem-inner -->
						</div><!-- .post-navitem-in -->
					</a><!-- .post-navitem -->
				</div><!-- .col -->
			<?php }?>
		</div><!-- .row -->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

