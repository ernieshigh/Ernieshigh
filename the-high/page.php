<?php
/**
*
*
* Basic page for non-posts
*
*
*/

global $post;

?>

<?php get_header(); ?>
	
	<main id="page-<?php echo $post->ID; ?>">
	
		<?php get_template_part( 'templates/content', 'content'); ?>
		
	</main>
	
<?php get_footer(); ?>