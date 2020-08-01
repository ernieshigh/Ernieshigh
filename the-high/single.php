<?php
/**
	*
	* Template for standard single post 
	*
	*
**/

?>

<?php get_header(); ?>
	
	<main  id="post-<?php echo $post->ID; ?>">
	
		<?php 
		
			while ( have_posts() ) : the_post(); 
			
				get_template_part( 'templates/content', 'single' );
					
				comments_template( '', true );
				
			endwhile;
			
		?>
				
	</main>
		
		
<?php get_footer(); ?>