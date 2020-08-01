<?php


// include needed files  dropdown menu, customizer ...
include( get_stylesheet_directory() . '/inc/high-customizer.php' );


// add custom walker for dropdown menu 
include( get_stylesheet_directory() . '/inc/class-high-nav-walker.php' );
// add fields in menu editor
include( get_stylesheet_directory() . '/inc/high-mega-field.php' );

include_once (get_stylesheet_directory() . '/inc/high-edit-custom-walker.php' );

// Setup basic-high Theme
add_action( 'after_setup_theme', 'high_name_setup' );
function high_name_setup() {
	// theme text domain
		load_theme_textdomain('pure-tech', get_template_directory() . '/languages');
		
	//add post format
		add_theme_support( 'post-formats');
		
	//adds title in head
		add_theme_support( "title-tag" );
	
	// add feed
		add_theme_support( 'automatic-feed-links' );
		
	// add thumbnail
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'feature-thumb', 300, 9999 );
		
	add_theme_support( 'html5', array( 'search-form' ) );
		
	//register  menu option
		add_action( 'init', 'basic_high_register_menus' );
		
	//add logo 
		add_theme_support( 'custom-logo', array(
			'height'      => 150,
			'width'       => 400,
			'flex-width' => true,
			'flex-height' => true,
		) );
		
	// add editor styles 
		add_editor_style();
		
	// set content width
	if ( ! isset( $content_width ) ) $content_width = 1280;
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );// add custom header
	$header = array(
				'random-default'         => false,
				'height'                 => 350,
				'flex-height'            => true,
				'flex-width'             => true,
				'default-text-color'     => '#fff',
				'header-text'            => true,
				'uploads'                => true,
				'wp-head-callback'       => 'high_header_style',
			);
	add_theme_support( "custom-header", $header );
	
	// add custom background
	$background = array(
				'default-color'          => '#fff',
				'default-image'          => '',
				'wp-head-callback'       => '_custom_background_cb',
				'admin-head-callback'    => '',
				'admin-preview-callback' => ''
			);
	add_theme_support( "custom-background", $background );
	
	// set header defaults
	if (! function_exists('high_header_style')) {
		function high_header_style(){
		$header_text_color = get_header_textcolor();
		$header_image = get_header_image();

			if ( $header_image ) : ?>
				<style type="text/css">
					header{
						background-image: url( <?php echo esc_url( $header_image ); ?>);
					}
				</style>
			<?php
			endif;
		}
	}
	
	/// add full width to gutenberg
	add_theme_support( 'align-wide' );
		
}

// body classes
add_filter( 'body_class', 'theme_body_classes' );
function theme_body_classes( $classes ) {
	if ( is_singular() && ! is_home()  )
		$classes[] = 'single';
	return $classes;
}

	
// display logo 
add_action( 'high_add_logo', 'high_display_logo' );
function high_display_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
	$title = get_bloginfo( 'name' ); 
		if($image){
			echo '<div id="highLogo">';
			echo '<a href="' . esc_url(home_url()) . '" rel="home">';
			echo '<img class="high-logo" src="' . $image[0] . '" alt="' . $image_alt . '" title="' . $title . '">';
			echo '</a></div>';
		}

}

 function basic_high_register_menus(){
        register_nav_menus( array(
            'primary_menu' => __( 'Primary Menu', 'the-high' ),
            'footer_menu'  => __( 'Footer Menu', 'the-high' ),
        ) );
    }
    add_action( 'after_setup_theme', 'basic_high_register_menus', 0 );
// enqueue add custom scripts and styles if needed
add_action('wp_enqueue_scripts', 'high_scripts');
function high_scripts() {
	// styles
	wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/assets/css/all.min.css');
	wp_enqueue_style( 'high-style', get_stylesheet_uri() );
		
	
}

	
// add sidebar and widget areas
add_action('widgets_init','high_sidebar');
function high_sidebar(){

		register_sidebar( array	(	
				'name'         => __( 'The Sidebar','the-high' ),		
				'id'           => 'right_sidebar',		
				'description'  => __( 'This sidebar uses the right sidebar template.' ,'the-high'),		
				'before_widget' => '<div id="%1$s" class="widget %2$s">',		
				'after_widget'  => '</div>',		
				'before_title' => '<h3>',		
				'after_title'  => '</h3>',	
				)) ;
				
		register_sidebar( array	(	
				'name'         => __( 'The Other Sidebar','the-high' ),		
				'id'           => 'left_sidebar',		
				'description'  => __( 'This sidebar uses the left sidebar template.' ,'the-high'),		
				'before_widget' => '<div id="%1$s" class="widget %2$s">',		
				'after_widget'  => '</div>',		
				'before_title' => '<h3>',		
				'after_title'  => '</h3>',	
				)) ;
}

// high excerpts
add_filter( 'excerpt_more', 'high_read_more' );
function high_read_more( $more ) {
	global $post;
	
    return '<a class="read-more" href="'.get_the_permalink().'" rel="nofollow">Read More About ' . $post->post_title . '...</a>';
}

add_filter( 'excerpt_length', 'high_excerpt_length', 999 );
function high_excerpt_length( $length ) {
    return 35;
}


// next-previous post links
function high_post_nav(){
	global $post;
	
    ob_start();  
	
	?>
	
		<nav class="post-navigation container center-content">
			<div class="post-nav alignleft"><?php previous_post_link(); ?></div>
			<div class="post-nav alignright"><?php next_post_link(); ?></div>
		</nav>
	
	<?php
	
	$out = ob_get_contents();
    ob_end_clean();
	return $out;
}


// add pagination to blog pages
function high_pagination() {
    
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="page-navigation"><ul class="">' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>&hellip;</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>&hellip;</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
}
