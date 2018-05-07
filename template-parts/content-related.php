<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cambodia_Worldhse
 */

?>

	<?php worldhse_kh_post_thumbnail(); ?>
	<header class="entry-header">
		<?php

			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );


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
			the_excerpt();
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