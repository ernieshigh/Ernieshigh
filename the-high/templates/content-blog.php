<?php 
/**
 *
 * Full width blog page no sidebar
 *
* */

global $post;

 ?>
	<div class="container blog-container">
		<?php  $titled = get_the_title(get_the_ID()); ?>
		
		
		<div class="row ">
			<aside class="col-md-4">
				
			</aside>
			<div class="post-body col-md-8">
		<?php
				$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				$sticky = get_option( 'sticky_posts' );
				
				$args = array(
						'ignore_sticky_posts' => 1,
						'post__not_in' => $sticky,
						'paged' => $paged
				);
				
				$query = new WP_Query( $args );
			
				if( $query->have_posts() ) :  while ($query->have_posts()) : $query->the_post(); ?>
       			
				<article  <?php post_class('post-content col-md-4 '); ?>>
					<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					
					<?php the_post_thumbnail();?>
					<div class="post-entry">
						<?php  the_excerpt('high_excerpt_length', 'high_excerpt_more'); ?>
					</div>
					
					<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
				
					<footer class="entry-meta">
						<span class="tag-links"> This post is tagged as <?php echo get_the_tag_list('',', ',''); ?> . </span>
							
						<?php
							$categories_list = get_the_category_list( __( ', ', 'the-high' ) );
							if ( $categories_list ):
						?>
							<span class="cat-links">
								<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'the-high' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );$show_sep = true; ?>
							</span>
							
						<?php endif; // End if categories ?>
						
					</footer>
				</article>		   					

			<?php endwhile; ?>
		<?php endif; ?>
			</div>
		</div>
		<?php high_pagination(); ?>
	</div> <!-- this is the blog -->