<?php 
/*
*
*
* Get sidebar based on template 
*
*
*/
?>



	<?php if ( is_page_template( 'template-left-content.php' ) ) : // if uses left sidebar template get left sidebar ?>

			<aside id="left-sidebar" class="sidebar-content">

					<?php dynamic_sidebar('left_sidebar'); ?>
					
			</aside>
			
	<?php else : ?>
	
			<aside id="right-sidebar" class="sidebar-content">

					<?php dynamic_sidebar('right_sidebar'); // else if uses right sidebar template get the rght sidebar ?>
					
			</aside>
	
	<?php endif; ?>