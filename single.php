<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cambodia_Worldhse
 */

get_header();
?>
<div class="container clear single">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
				get_template_part( 'template-parts/content','single' );

				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;
			?>
			</article><!-- #post-<?php the_ID(); ?> -->
			<?php 
		endwhile; // End of the loop.
		?>
		<?php
		$post_categories = wp_get_post_categories( $post->ID );
		$cats = array();
			 
		foreach($post_categories as $c){
			$cat = get_category( $c );
			$cats[] = $cat->term_id;
		}
		$args=array(
			'category__in' => $cats,
			'post__not_in' => array($post->ID),
			'showposts'=>3,  // Number of related posts that will be shown.
			'caller_get_posts'=>1
		);
		$my_query = new wp_query($args);
		if( $my_query->have_posts() ) {
			$i=0;
			echo '<div id="relatedposts"><h3>相关文章</h3>';
			while ($my_query->have_posts()) {
				$i+=1;
				$my_query->the_post();
				?>
				
				<article id="post-<?php the_ID(); ?>" 
					<?php 
						if(($i+2)%3===0){
							echo 'class="first"';
						}
					?>
					<?php 
						if($i%3===0){
							echo 'class="last"';
							$i=0;
						}
					?>
					
					>
						<?php get_template_part( 'template-parts/content', 'related' ); ?>
				</article><!-- #post-<?php the_ID(); ?> -->
				<?php 
				
				if($i%3===0){
					echo '<div class="clear"></div>';
				}
			}
			echo '</div>';
		}
		?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div>
<?php

get_footer();
