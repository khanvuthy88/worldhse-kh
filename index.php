<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cambodia_Worldhse
 */

get_header();
?>
<div class="flexslider">
  <ul class="slides">
    <li>
		<img alt="Hello wrold" src="<?php echo get_template_directory_uri().'/image/slide/bg_home_image_lowres.jpg'; ?>"/>
    </li>
	<li>
		<img alt="Hello wrold" src="<?php echo get_template_directory_uri().'/image/slide/bg_home_image_lowres.jpg'; ?>"/>
    </li>
  </ul>
</div>

	<div class="container clear">
		<div id="primary" class="content-area">
			<div id="content-add">
				<img alt="Hello wrold" src="<?php echo get_template_directory_uri().'/image/adds/Seagate_Banner_update.jpg'; ?>"/>
			</div>
			<main id="main" class="site-main clear">

			<?php
			if ( have_posts() ) :
				$i=0;
				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					$i+=1;
					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/

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
						<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
					</article><!-- #post-<?php the_ID(); ?> -->
					<?php 
					
					if($i%3===0){
						echo '<div class="clear"></div>';
					}
				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
<?php
get_footer();
