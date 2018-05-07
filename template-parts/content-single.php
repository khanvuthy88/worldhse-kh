<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cambodia_Worldhse
 */

?>

	<?php
	$images = get_field('worldhse-kh_gallery');
	$size = 'post-thumbnail-01'; // (thumbnail, medium, large, full or custom size)
	if( $images ): ?>
	<div class="flexslider">
		  <ul class="slides">
			<?php foreach( $images as $image ): ?>
				<li>
					<img src="<?php echo $image['sizes']['post-thumbnail-01']; ?>" alt="<?php echo get_the_title(); ?>" />
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; 
	?>
	<header class="entry-header">
		<?php	
		
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				worldhse_kh_posted_on();
				worldhse_kh_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->	

	<div class="entry-content">
		<?php 
			the_content();
		?>
		<?php
		
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'worldhse-kh' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer clear">
		<?php worldhse_kh_entry_footer(); ?>
	</footer><!-- .entry-footer -->

