<?php
/**
 * Promotional Headline Options
 *
 * @package JetBlack
 */

class JetBlack_Promotional_Headline_Options {
	public function __construct() {
		// Register Promotion Headline Options.
		add_action( 'customize_register', array( $this, 'register_options' ), 99 );

		// Add default options.
		add_filter( 'jetblack_customizer_defaults', array( $this, 'add_defaults' ) );
	}

	/**
	 * Add options to defaults
	 */
	public function add_defaults( $default_options ) {
		$defaults = array(
			'jetblack_promotional_headline_visibility' => 'disabled',
		);

		$updated_defaults = wp_parse_args( $defaults, $default_options );

		return $updated_defaults;
	}

	/**
	 * Add layouts section and its controls
	 */
	public function register_options( $wp_customize ) {
		$wp_customize->add_section( 'jetblack_ss_promotional_headline',
			array(
				'title' => esc_html__( 'Promotional Headline', 'jetblack-intro' ),
				'panel' => 'jetblack_sp_sortable'
			)
		);

		JetBlack_Customizer_Utilities::register_option(
			array(
				'settings'          => 'jetblack_promotional_headline_visibility',
				'type'              => 'select',
				'sanitize_callback' => 'jetblack_sanitize_select',
				'label'             => esc_html__( 'Visible On', 'jetblack-intro' ),
				'section'           => 'jetblack_ss_promotional_headline',
				'choices'           => JetBlack_Customizer_Utilities::section_visibility(),
			)
		);

		JetBlack_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'JetBlack_Dropdown_Posts_Custom_Control',
				'sanitize_callback' => 'absint',
				'settings'          => 'jetblack_promotional_headline_page',
				'label'             => esc_html__( 'Select Page', 'jetblack-intro' ),
				'section'           => 'jetblack_ss_promotional_headline',
				'active_callback'   => array( $this, 'is_promotional_headline_visible' ),
				'input_attrs' => array(
					'post_type'      => 'page',
					'posts_per_page' => -1,
					'orderby'        => 'name',
					'order'          => 'ASC',
				),
			)
		);
	}

	/**
	 * Promotion Headline visibility active callback.
	 */
	public function is_promotional_headline_visible( $control ) {
		return ( jetblack_display_section( $control->manager->get_setting( 'jetblack_promotional_headline_visibility' )->value() ) );
	}
}

/**
 * Initialize class
 */
$jetblack_ss_promotional_headline = new JetBlack_Promotional_Headline_Options();
