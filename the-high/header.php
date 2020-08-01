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
						<span class="navbar-toggler-icon"><?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/images/responsive-menu.svg' ); ?></span>
					</button>
 
						<?php  
							wp_nav_menu( array(
								'theme_location'  => 'primary_menu',
								'depth'	          => 2,
								'container'       => 'div',
								'container_class' => 'collapse navbar-collapse',
								'menu_class'      => 'nav-menu',
								'walker' 		  =>  new High_Nav_Walker(),
								'fallback_cb'    => true
							) );
						 ?>
					</div>
				</nav><!-- Navigation -->
				
			</div>
		</header>
		