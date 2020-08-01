<?php
/***
	*
	* Add custom sections to WordPress Customizer
	*
	* Basic High
	*
***/

// add custom header and background support to theme customizer 
add_action( 'after_setup_theme', 'high_header' );
function high_header() {
	
	
	// add custom header
		$header = array(
					'default-image'          => get_template_directory_uri() . '/images/high-header.jpg',
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
		
		
}

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

// enqueue custom script for wordpress customizer
add_action( 'customize_preview_init', 'high_live_preview' );
function high_live_preview(){
	wp_enqueue_script('live-preview', get_template_directory_uri().'/assets/js/live-preview.js', array( 'jquery','customize-preview' ),	'', true	);
}

add_action( 'customize_register', 'high_theme_customize_register' );
function high_theme_customize_register( $wp_customize ) {
	
	
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	
	

};
