<?php
/**
 *  Display main content
 */
?>


	<div class="container page-container">
		<div class="row">
			<div class="col-md-8">
	<?php if ( ! has_post_format() ) { ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						
						<div class="entry-meta">
							<span class="meta-prep meta-prep-author"><?php _e('By ', 'the-high'); ?></span>
							<span class="author vcard"><a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php printf( __( 'View all articles by %s', 'the-high' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
							<span class="meta-sep"> | </span>
							<span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'the-high'); ?></span>
							<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
							
							<?php edit_post_link( __( 'Edit', 'the-high' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
						</div>
						
					</header><!-- .entry-header -->

		<?php if ( is_search()): // Display Excerpts for Search ?>
				
					<div class="entry-summary">
						<?php 
								if(get_the_post_thumbnail($post_id) != '' ) {
									echo '<a href="' . the_permalink() . '" class="thumbnail-wrapper">' . the_post_thumbnail() . '</a>';
								} 
						?>
								
						<?php the_excerpt(); ?>
						
					</div><!-- .entry-summary -->
			
			<?php else : ?>
			
					<div class="entry-content">
						
						<?php the_post_thumbnail(); ?>
						
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'the-high' ) ); ?>
				
					</div><!-- .entry-content -->
		
			<?php endif;  //end the loop ?>

					<footer class="entry-meta">
			
						<div class="author-info">
							<div class="author-avatar">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'high_author_bio_avatar_size', 68 ) ); ?>
							</div><!-- .author-avatar -->
							
							<div class="author-description">
								<!-- get category list for individual post -->
								<p class="cat-links"><?php echo 'This article was posted in ' . get_the_category_list( _x( ', ', ' ', 'the-high' ) ) .' categories'; ?></p>
								<!-- get author and date for individual post -->
								<p><?php printf( __( ' by  %s', 'the-high' ), get_the_author() ); ?> on <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
									</p>
								<p><?php the_author_meta( 'description' ); ?></p>
								<div class="author-link">
									<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
										<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'the-high' ), get_the_author() ); ?>
									</a>
								</div><!-- .author-link	-->
							</div><!-- .author-description -->
						</div><!-- .author-info -->
				
							<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
								<div class="author-info">
									<div class="author-avatar">
										<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'high_author_bio_avatar_size', 68 ) ); ?>
									</div><!-- .author-avatar -->
									<div class="author-description">
										<h4><?php printf( __( 'About %s', 'the-high' ), get_the_author() ); ?></h4>
										<p><?php the_author_meta( 'description' ); ?></p>
										<div class="author-link">
											<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
												<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'the-high' ), get_the_author() ); ?>
											</a>
										</div><!-- .author-link	-->
									</div><!-- .author-description -->
								</div><!-- .author-info -->
							<?php endif; ?>
							<?php edit_post_link( __( 'Edit', 'the-high' ), '<span class="edit-link">', '</span>' ); ?>
							
					</footer><!-- .entry-meta -->
		 
				</article><!-- #post -->
				
	<?php } ?>
				
					 <?php high_post_nav(); ?>
			</div>
			
			 <?php wp_list_comments(); ?>
			 <?php next_comments_link(); ?>  <?php previous_comments_link(); ?>
			 <?php comment_form(); ?>
		</div>
	</div>