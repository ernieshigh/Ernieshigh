<?php
/*
 *
 *
 * Category Page Loop
 *
 *
*/
?>
<?php 
	
	$category = get_queried_object();
	
	$cat_title = $category->name;
?>

	<div class="container page-container">
		<div class="row row-loop">
		<?php  echo '<h1 class="cat-title">' . $cat_title . '</h1>'; ?>
		
		<?php

			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args = array(
			  'posts_per_page' => 5,
			  'paged'          => $paged
			);
			
			$cat_query = new WP_Query($args);

			while ( $cat_query->have_posts() ): $cat_query->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('post-content col-md-4 col-sm-6 col-sm-12  '); ?>>
					<head class="post-header">
						
						<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<span class="post-meta">By: <?php the_author_posts_link(); ?></span>
						<span class="post-meta"> on <?php the_time('F jS, Y'); ?></span>
						
					</head>
					<div class="entry">
					
						<?php the_post_thumbnail();?>
						<?php the_excerpt(); ?>
						
					</div>
					
				</article>
			
			<?php endwhile; ?>
			
			<div class="page-nav" role-="nav">
			
				<?php previous_posts_link(); ?>
				<?php next_posts_link(); ?>
			</div>

		</div>

	</div>