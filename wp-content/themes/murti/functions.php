<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if ( ! function_exists( 'murti_setup' ) ) {
	add_action( 'after_setup_theme', 'murti_setup' );
	// Sets up theme defaults and registers support for various WordPress features.
	function murti_setup() {
		
		add_editor_style( 'style.css' );
		
	}
}

// Overwrite parent theme background defaults and registers support for WordPress features.
add_action( 'after_setup_theme', 'martanda_background_setup' );
function martanda_background_setup() {
	add_theme_support( "custom-background",
		array(
			'default-color' 		 => '1c1c1c',
			'default-image'          => '',
			'default-repeat'         => 'repeat',
			'default-position-x'     => 'center',
			'default-position-y'     => 'top',
			'default-size'           => 'auto',
			'default-attachment'     => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		)
	);
}

// Replace default fonts from parent theme
function martanda_get_font_face_styles() {
	return "
	@font-face{
		font-family: 'Poppins';
		font-weight: 100;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Poppins-Thin.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Poppins';
		font-weight: 200;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Poppins-ExtraLight.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Poppins';
		font-weight: 300;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Poppins-Light.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Poppins';
		font-weight: 400;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Poppins-Regular.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Poppins';
		font-weight: 500;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Poppins-Medium.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Poppins';
		font-weight: 600;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Poppins-SemiBold.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Poppins';
		font-weight: 700;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Poppins-Bold.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Poppins';
		font-weight: 800;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Poppins-ExtraBold.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Poppins';
		font-weight: 900;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Poppins-Black.woff2') format('woff2');
	}
	";
}

function martanda_font_family_css() {
	// Get our settings
	$martanda_settings = wp_parse_args(
		get_option( 'martanda_settings', array() ),
		martanda_get_defaults()
	);

	// Initiate our class
	$css = new martanda_css;
	
	$og_defaults = martanda_get_defaults( false );
	
	$bodyclass = 'body';
	if ( is_admin() ) {
		$bodyclass = '.editor-styles-wrapper';
	}
	
	$bodyfont = $martanda_settings[ 'font_body' ];
	if ( $bodyfont == 'inherit' ) { $bodyfont = 'Poppins'; }
	
	$font_site_title = $martanda_settings[ 'font_site_title' ];
	if ( $font_site_title == 'inherit' ) { $font_site_title = 'Poppins'; }
	$font_navigation = $martanda_settings[ 'font_navigation' ];
	if ( $font_navigation == 'inherit' ) { $font_navigation = 'Poppins'; }
	$font_buttons = $martanda_settings[ 'font_buttons' ];
	if ( $font_buttons == 'inherit' ) { $font_buttons = 'Poppins'; }
	$font_heading_1 = $martanda_settings[ 'font_heading_1' ];
	if ( $font_heading_1 == 'inherit' ) { $font_heading_1 = 'Poppins'; }
	$font_heading_2 = $martanda_settings[ 'font_heading_2' ];
	if ( $font_heading_2 == 'inherit' ) { $font_heading_2 = 'Poppins'; }
	$font_heading_3 = $martanda_settings[ 'font_heading_3' ];
	if ( $font_heading_3 == 'inherit' ) { $font_heading_3 = 'Poppins'; }
	$font_heading_4 = $martanda_settings[ 'font_heading_4' ];
	if ( $font_heading_4 == 'inherit' ) { $font_heading_4 = 'Poppins'; }
	$font_heading_5 = $martanda_settings[ 'font_heading_5' ];
	if ( $font_heading_5 == 'inherit' ) { $font_heading_5 = 'Poppins'; }
	$font_heading_6 = $martanda_settings[ 'font_heading_6' ];
	if ( $font_heading_6 == 'inherit' ) { $font_heading_6 = 'Poppins'; }
	$font_footer = $martanda_settings[ 'font_footer' ];
	if ( $font_footer == 'inherit' ) { $font_footer = 'Poppins'; }
	$font_fixed_side = $martanda_settings[ 'font_fixed_side' ];
	if ( $font_fixed_side == 'inherit' ) { $font_fixed_side = 'Poppins'; }
	
	$css->set_selector( $bodyclass );
	$css->add_property( '--martanda--font-body', esc_attr( $bodyfont ) );
	$css->add_property( '--martanda--font-site-title', esc_attr( $font_site_title ) );
	$css->add_property( '--martanda--font-navigation', esc_attr( $font_navigation ) );
	$css->add_property( '--martanda--font-buttons', esc_attr( $font_buttons ) );
	$css->add_property( '--martanda--font-heading-1', esc_attr( $font_heading_1 ) );
	$css->add_property( '--martanda--font-heading-2', esc_attr( $font_heading_2 ) );
	$css->add_property( '--martanda--font-heading-3', esc_attr( $font_heading_3 ) );
	$css->add_property( '--martanda--font-heading-4', esc_attr( $font_heading_4 ) );
	$css->add_property( '--martanda--font-heading-5', esc_attr( $font_heading_5 ) );
	$css->add_property( '--martanda--font-heading-6', esc_attr( $font_heading_6 ) );
	$css->add_property( '--martanda--font-footer', esc_attr( $font_footer ) );
	$css->add_property( '--martanda--font-fixed-side', esc_attr( $font_fixed_side ) );
	
	$css->set_selector( '.editor-styles-wrapper .top-bar-socials button' );
	$css->add_property( 'background-color', 'inherit' );
	
	// Allow us to hook CSS into our output
	do_action( 'martanda_font_family_css', $css );

	return apply_filters( 'martanda_font_family_css_output', $css->css_output() );
}

// Overwrite theme URL
function martanda_theme_uri_link() {
	return 'https://wpkoi.com/murti-wpkoi-wordpress-theme/';
}

// Extra cutomizer functions
if ( ! function_exists( 'murti_customize_register' ) ) {
	add_action( 'customize_register', 'murti_customize_register' );
	function murti_customize_register( $wp_customize ) {
				
		// Add Murti customizer section
		$wp_customize->add_section(
			'murti_layout_effects',
			array(
				'title' => __( 'Navigation effect', 'murti' ),
				'priority' => 24,
			)
		);
		
		// Navigation effect
		$wp_customize->add_setting(
			'murti_settings[nav_underline]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'murti_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'murti_settings[nav_underline]',
			array(
				'type' => 'select',
				'label' => __( 'Navigation hover effect', 'murti' ),
				'choices' => array(
					'enable' => __( 'Enable', 'murti' ),
					'disable' => __( 'Disable', 'murti' )
				),
				'settings' => 'murti_settings[nav_underline]',
				'section' => 'murti_layout_effects',
				'priority' => 30
			)
		);
		
	}
}

//Sanitize choices.
if ( ! function_exists( 'murti_sanitize_choices' ) ) {
	function murti_sanitize_choices( $input, $setting ) {
		// Ensure input is a slug
		$input = sanitize_key( $input );

		// Get list of choices from the control
		// associated with the setting
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it;
		// otherwise, return the default
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}

//Adds custom classes to the array of body classes.
if ( ! function_exists( 'murti_body_classes' ) ) {
	add_filter( 'body_class', 'murti_body_classes' );
	function murti_body_classes( $classes ) {
		// Get Customizer settings
		$murti_settings = get_option( 'murti_settings' );
		
		$nav_underline     = 'enable';
		
		if ( isset( $murti_settings['nav_underline'] ) ) {
			$nav_underline = $murti_settings['nav_underline'];
		}
		
		// Navigation effect
		if ( $nav_underline != 'disable' ) {
			$classes[] = 'murti-nav-underline';
		}
		
		return $classes;
	}
}
