<?php

/**
 * Main Class for customizer
 */
class JetBlack_Intro_Customizer {
	public function __construct() {
		// Register Custozier Options.
		add_action( 'customize_register', array( $this, 'register_options' ), 100 );

		// Add default options.
		add_filter( 'jetblack_customizer_defaults', array( $this, 'add_defaults' ) );
	}

	/**
	 * Add options to defaults
	 */
	public function add_defaults( $default_options ) {
		$defaults = array(
			'jetblack_featured_content_style' => 'style-one',
			'jetblack_wwd_style'              => 'style-three',
			'jetblack_portfolio_style'        => 'style-one',
		);

		$updated_defaults = wp_parse_args( $defaults, $default_options );

		return $updated_defaults;
	}

	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 * Other basic stuff for customizer initialization.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function register_options( $wp_customize ) {
		JetBlack_Customizer_Utilities::register_option(
			array(
				'settings'          => 'jetblack_featured_content_style',
				'type'              => 'select',
				'sanitize_callback' => 'jetblack_sanitize_select',
				'label'             => esc_html__( 'Style', 'jetblack-intro' ),
				'section'           => 'jetblack_ss_featured_content',
				'choices'           => array(
					'style-one' => esc_html__( 'Style One', 'jetblack-intro' ),
					'style-two' => esc_html__( 'Style Two', 'jetblack-intro' ),
				),
				'active_callback'   => array( $this, 'is_featured_content_visible' ),
			)
		);

		JetBlack_Customizer_Utilities::register_option(
			array(
				'settings'          => 'jetblack_wwd_style',
				'type'              => 'select',
				'sanitize_callback' => 'jetblack_sanitize_select',
				'label'             => esc_html__( 'Style', 'jetblack-intro' ),
				'section'           => 'jetblack_ss_wwd',
				'choices'           => array(
					'style-one' => esc_html__( 'Style One', 'jetblack-intro' ),
					'style-two' => esc_html__( 'Style Two', 'jetblack-intro' ),
					'style-three' => esc_html__( 'Style Three', 'jetblack-intro' )
				),
				'active_callback'   => array( $this, 'is_wwd_visible' ),
			)
		);

		JetBlack_Customizer_Utilities::register_option(
			array(
				'settings'          => 'jetblack_portfolio_style',
				'type'              => 'select',
				'sanitize_callback' => 'jetblack_sanitize_select',
				'label'             => esc_html__( 'Style', 'jetblack-intro' ),
				'section'           => 'jetblack_ss_portfolio',
				'choices'           => array(
					'style-one' => esc_html__( 'Style One', 'jetblack-intro' ),
					'style-two' => esc_html__( 'Style Two', 'jetblack-intro' ),
				),
				'active_callback'   => array( $this, 'is_portfolio_visible' ),
			)
		);
	}

	/**
	 * Featured Content visibility active callback.
	 */
	public function is_featured_content_visible( $control ) {
		return ( jetblack_display_section( $control->manager->get_setting( 'jetblack_featured_content_visibility' )->value() ) );
	}

	/**
	 * Featured Content visibility active callback.
	 */
	public function is_wwd_visible( $control ) {
		return ( jetblack_display_section( $control->manager->get_setting( 'jetblack_wwd_visibility' )->value() ) );
	}

	/**
	 * Featured Content visibility active callback.
	 */
	public function is_portfolio_visible( $control ) {
		return ( jetblack_display_section( $control->manager->get_setting( 'jetblack_portfolio_visibility' )->value() ) );
	}
}

/**
 * Initialize customizer class.
 */
$jetblack_customizer = new JetBlack_Intro_Customizer();

/**
 * Promotion Headline
 */
require get_theme_file_path( '/inc/promotional-headline.php' );