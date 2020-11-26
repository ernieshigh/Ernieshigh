<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="profile" href="http://gmpg.org/xfn/11">
		 
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
		
		<?php wp_head(); ?>
		
	</head>
	
	<body <?php body_class(); ?>>
		 <?php wp_body_open(); ?>
		<header class="main-head">
			<div class="container head-container">
				
				<div class="site-branding">
				<?php  do_action( 'high_add_logo', 10, 2 );?>
				
				<?php	if(is_front_page()): ?>
				
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				
				<?php else: ?>
					
					<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
				
				<?php	endif; ?>
				
				<?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) :
					
						echo '<p class="site-description">' . $description . '</p>';
					
					endif; 
				?>
						
				</div>
								
				<nav class="navbar" role="navigation">
				  <div class="container nav-container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<button class="navbar-toggler" onclick="menuToggle()">
						<span class="navbar-toggler-icon"><?php  echo high_display_svg(); ?></span>
					</button>
 
						<?php  
							wp_nav_menu( array(
								'theme_location'  => 'primary_menu',
								'depth'	          => 2,
								'container'       => 'div',
								'container_class' => 'collapse navbar-collapse',
								'menu_class'      => 'nav-menu',
								'fallback_cb'    => true
							) );
						 ?>
					</div>
				</nav><!-- Navigation -->
				
		
			</div>
		</header>
		