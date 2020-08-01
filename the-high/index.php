<?php
/*
 *
 *
 * Main Index for Basic theme
 *
 *
*/
?>

<?php get_header(); ?>

	<main id="<?php echo 'page-' . $post->ID; ?>">

		<?php 
		
			if(is_home()):
				get_template_part( 'templates/content', 'blog' );  // if is the blog page
			else :
				get_template_part( 'templates/content' ); // any other page 
			endif; 
			
		?>
		
	</main>
	
<?php get_footer(); ?>