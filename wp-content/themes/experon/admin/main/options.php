<?php
/**
 * Setup theme options used in customizer.
 *
 * @package ThinkUpThemes
 */

function thinkup_customizer_theme_options( $wp_customize ) {

	// ==========================================================================================
	// 1. ADD PANELS / SECTIONS
	// ==========================================================================================

	// Add Upgrade Section
	$wp_customize->add_section(
		new thinkup_customizer_customswitch_button_link(
			$wp_customize,
			'thinkup_customizer_section_upgrade_top',
			array(
				'title'        => __( 'Experon Pro', 'experon' ),
				'priority'     => 1,
				'button_text' => __( 'Upgrade Now', 'experon' ),
				'button_url'  => 'https://www.thinkupthemes.com/themes/experon/',
				'button_class' => 'button-primary',
			)
		)
	);

	// Add Documentation Section
	$wp_customize->add_section(
		new thinkup_customizer_customswitch_button_link(
			$wp_customize,
			'thinkup_customizer_section_hire',
			array(
				'title'        => __( 'Need help?', 'experon' ),
				'priority'     => 1,
				'button_text'  => __( 'Hire a Developer', 'experon' ),
				'button_url'   => 'https://www.thinkupthemes.com/hire/',
				'button_class' => 'button-secondary',
			)
		)
	);

	// Add Documentation Section
	$wp_customize->add_section(
		new thinkup_customizer_customswitch_button_link(
			$wp_customize,
			'thinkup_customizer_section_docs',
			array(
				'title'        => __( 'Documentation', 'experon' ),
				'priority'     => 1,
				'button_text' => __( 'View Docs', 'experon' ),
				'button_url'  => admin_url( 'themes.php?page=thinkup-setup&tab=page_docs' ),
				'button_class' => 'button-text',
			)
		)
	);

	// Add Theme Options Panel
	$wp_customize->add_panel(
		'thinkup_customizer_section_themeoptions',
		array(
			'title'       => 'Theme Options',
			'description' => __( 'Use the options below to customize your theme!', 'experon' ),
			'priority'    => 2,
		)
	);

	// Add General Settings Section
	$wp_customize->add_section(
		'thinkup_customizer_section_generalsettings',
		array(
			'title'    => 'General Settings',
			'priority' => 10,
			'panel'    => 'thinkup_customizer_section_themeoptions',
		)
	);

	// Add Homepage Section
	$wp_customize->add_section(
		'thinkup_customizer_section_homepage',
		array(
			'title'    => 'Homepage',
			'priority' => 20,
			'panel'    => 'thinkup_customizer_section_themeoptions',
		)
	);

	// Add Homepage (Featured) Section
	$wp_customize->add_section(
		'thinkup_customizer_section_homepagefeatured',
		array(
			'title'    => 'Homepage (Featured)',
			'priority' => 30,
			'panel'    => 'thinkup_customizer_section_themeoptions',
		)
	);

	// Add Header Section
	$wp_customize->add_section(
		'thinkup_customizer_section_header',
		array(
			'title'    => 'Header',
			'priority' => 40,
			'panel'    => 'thinkup_customizer_section_themeoptions',
		)
	);

	// Add Footer Section
	$wp_customize->add_section(
		'thinkup_customizer_section_footer',
		array(
			'title'    => 'Footer',
			'priority' => 50,
			'panel'    => 'thinkup_customizer_section_themeoptions',
		)
	);

	// Add Social Media Section
	$wp_customize->add_section(
		'thinkup_customizer_section_socialmedia',
		array(
			'title'    => 'Social Media',
			'priority' => 60,
			'panel'    => 'thinkup_customizer_section_themeoptions',
		)
	);

	// Add Blog Section
	$wp_customize->add_section(
		'thinkup_customizer_section_blog',
		array(
			'title'    => 'Blog',
			'priority' => 70,
			'panel'    => 'thinkup_customizer_section_themeoptions',
		)
	);

	// Add Upgrade (10% off) Section
	$wp_customize->add_section(
		'thinkup_customizer_section_upgrade',
		array(
			'title'    => 'Upgrade (10% off)',
			'priority' => 80,
			'panel'    => 'thinkup_customizer_section_themeoptions',
		)
	);


	// ==========================================================================================
	// 2. ADD CONTROLS
	// ==========================================================================================

	//----------------------------------------------------
	// 2.1. Add General Settings Controls
	//----------------------------------------------------

	// Add Logo Heading
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_section_general_heading]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_section(
			$wp_customize,
			'thinkup_section_general_heading',
			array(
				'label'           => __( 'Logo Settings', 'experon' ),
				'section'         => 'thinkup_customizer_section_generalsettings',
				'settings'        => 'thinkup_redux_variables[thinkup_section_general_heading]',
				'active_callback' => '',
			)
		)
	);

	// Add Logo Info Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_general_logosetting]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_raw(
			$wp_customize,
			'thinkup_general_logosetting',
			array(
				'label'           => __( 'Since WordPress v4.5 you can now add a site logo using the native WordPress options. To add a site logo go the "Site Identitiy" settings on the main customizer screen.', 'experon' ),
				'section'         => 'thinkup_customizer_section_generalsettings',
				'settings'        => 'thinkup_redux_variables[thinkup_general_logosetting]',
				'active_callback' => '',
			)
		)
	);

	// Add General Page Heading
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_section_general_page]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_section(
			$wp_customize,
			'thinkup_section_general_page',
			array(
				'label'           => __( 'Page Structure', 'experon' ),
				'section'         => 'thinkup_customizer_section_generalsettings',
				'settings'        => 'thinkup_redux_variables[thinkup_section_general_page]',
				'active_callback' => '',
			)
		)
	);

	// Add Page Layout Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_general_layout]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_radio_image(
			$wp_customize,
			'thinkup_general_layout',
			array(
				'settings'		  => 'thinkup_redux_variables[thinkup_general_layout]',
				'section'		  => 'thinkup_customizer_section_generalsettings',
				'label'			  => __( 'Page Layout', 'experon' ),
				'description'	  => __( 'Select page layout. This will only be applied to published Pages.', 'experon' ),
				'choices'		  => array(
					'option1' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option01.png',
					'option2' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option02.png',
					'option3' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option03.png',
				),
				'active_callback' => '',
			)
		)
	);

	// Add General Sidebar Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_general_sidebars]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_select_sidebar',
		)
	);
	$wp_customize->add_control(
		'thinkup_general_sidebars',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_general_sidebars]',
			'section'		  => 'thinkup_customizer_section_generalsettings',
			'type'			  => 'select',
			'label'			  => __( 'Select a Sidebar', 'experon' ),
			'description'	  => __( 'Choose a sidebar to use with the page layout.', 'experon' ),
			'choices'		  => thinkup_customizer_select_array_sidebar(),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Enable Fixed Layout Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_general_fixedlayoutswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_general_fixedlayoutswitch',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_general_fixedlayoutswitch]',
				'section'         => 'thinkup_customizer_section_generalsettings',
				'label'           => __( 'Enable Fixed Layout', 'experon' ),
				'description'	  => __( '(i.e. Disable responsive layout)', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Add Enable Breadcrumbs Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_general_breadcrumbswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_general_breadcrumbswitch',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_general_breadcrumbswitch]',
				'section'         => 'thinkup_customizer_section_generalsettings',
				'label'           => __( 'Enable Breadcrumbs', 'experon' ),
				'description'	  => __( 'Switch on to enable breadcrumbs.', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Add Breadcrumb Delimiter Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_general_breadcrumbdelimeter]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_general_breadcrumbdelimeter',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_general_breadcrumbdelimeter]',
			'section'		  => 'thinkup_customizer_section_generalsettings',
			'type'			  => 'text',
			'label'			  => __( 'Breadcrumb Delimiter', 'experon' ),
			'description'	  => __( 'Specify a custom delimiter to use instead of the default &#40; / &#41;.', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Custom Code Heading
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_section_general_code]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_section(
			$wp_customize,
			'thinkup_section_general_code',
			array(
				'label'           => __( 'Custom Code', 'experon' ),
				'section'         => 'thinkup_customizer_section_generalsettings',
				'settings'        => 'thinkup_redux_variables[thinkup_section_general_code]',
				'active_callback' => '',
			)
		)
	);


	//----------------------------------------------------
	// 2.2. Homepage
	//----------------------------------------------------

	// Add Homepage Heading
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_section_homepage_heading]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_section(
			$wp_customize,
			'thinkup_section_homepage_heading',
			array(
				'label'           => __( 'Control Homepage Layout', 'experon' ),
				'section'         => 'thinkup_customizer_section_homepage',
				'settings'        => 'thinkup_redux_variables[thinkup_section_homepage_heading]',
				'active_callback' => '',
			)
		)
	);

	// Add Homepage Layout Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_layout]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_radio_image(
			$wp_customize,
			'thinkup_homepage_layout',
			array(
				'settings'		  => 'thinkup_redux_variables[thinkup_homepage_layout]',
				'section'		  => 'thinkup_customizer_section_homepage',
				'label'			  => __( 'Homepage Layout', 'experon' ),
				'description'	  => __( 'Select page layout. This will only be applied to static homepages (front page) and not to homepage blogs.', 'experon' ),
				'choices'		  => array(
					'option1' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option01.png',
					'option2' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option02.png',
					'option3' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option03.png',
				),
				'active_callback' => '',
			)
		)
	);

	// Add Homepage Select a Sidebar Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sidebars]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_select_sidebar',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_sidebars',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_sidebars]',
			'section'		  => 'thinkup_customizer_section_homepage',
			'type'			  => 'select',
			'label'			  => __( 'Select a Sidebar', 'experon' ),
			'description'	  => __( 'Choose a sidebar to use with the layout.', 'experon' ),
			'choices'		  => thinkup_customizer_select_array_sidebar(),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Homepage Slider Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_section_homepage_slider]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_section(
			$wp_customize,
			'thinkup_section_homepage_slider',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_section_homepage_slider]',
				'section'         => 'thinkup_customizer_section_homepage',
				'label'           => __( 'Homepage Slider', 'experon' ),
				'active_callback' => '',
			)
		)
	);

	// Add Choose Homepage Slider Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_sliderswitch',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_sliderswitch]',
			'section'		  => 'thinkup_customizer_section_homepage',
			'type'			  => 'radio',
			'label'			  => __( 'Choose Homepage Slider', 'experon' ),
			'description'	  => __( 'Switch on to enable home page slider.', 'experon' ),
			'choices'		  => array(
				'option4' => 'Image Slider',
				'option3' => 'Disable'
			),
			'active_callback' => '',
		)
	);

	// Add Image Slide 1 - Info
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderimage1_info]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_raw(
			$wp_customize,
			'thinkup_homepage_sliderimage1_info',
			array(
				'label'           => __( 'Slide 1', 'experon' ),
				'section'         => 'thinkup_customizer_section_homepage',
				'settings'        => 'thinkup_redux_variables[thinkup_homepage_sliderimage1_info]',
				'active_callback' => 'thinkup_customizer_callback_active_global',
			)
		)
	);

	// Add Image Slide 1 - Image
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderimage1_image][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'thinkup_homepage_sliderimage1_image',
			array(
				'section'         => 'thinkup_customizer_section_homepage',
				'settings'        => 'thinkup_redux_variables[thinkup_homepage_sliderimage1_image][url]',
				'label'	          => __( '', 'experon' ),
				'description'	  => __( 'Image', 'experon' ),
				'active_callback' => 'thinkup_customizer_callback_active_global',
			)
		)
	);

	// Add Image Slide 1 - Title
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderimage1_title]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_sliderimage1_title',
		array(
			'section'		  => 'thinkup_customizer_section_homepage',
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_sliderimage1_title]',
			'type'			  => 'text',
			'label'			  => __( '', 'experon' ),
			'description'	  => __( 'Title', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Image Slide 1 - Description
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderimage1_desc]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_sliderimage1_desc',
		array(
			'section'		  => 'thinkup_customizer_section_homepage',
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_sliderimage1_desc]',
			'type'			  => 'text',
			'label'			  => __( '', 'experon' ),
			'description'	  => __( 'Description', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Slide 1 - Page Link
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderimage1_link]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_sliderimage1_link',
		array(
			'section'		  => 'thinkup_customizer_section_homepage',
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_sliderimage1_link]',
			'type'			  => 'dropdown-pages',
			'label'			  => __( '', 'experon' ),
			'description'	  => __( 'URL', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Image Slide 2 - Info
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderimage2_info]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_raw(
			$wp_customize,
			'thinkup_homepage_sliderimage2_info',
			array(
				'label'           => __( 'Slide 2', 'experon' ),
				'section'         => 'thinkup_customizer_section_homepage',
				'settings'        => 'thinkup_redux_variables[thinkup_homepage_sliderimage2_info]',
				'active_callback' => 'thinkup_customizer_callback_active_global',
			)
		)
	);

	// Add Image Slide 2 - Image
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderimage2_image][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'thinkup_homepage_sliderimage2_image',
			array(
				'section'         => 'thinkup_customizer_section_homepage',
				'settings'        => 'thinkup_redux_variables[thinkup_homepage_sliderimage2_image][url]',
				'label'	          => __( '', 'experon' ),
				'description'	  => __( 'Image', 'experon' ),
				'active_callback' => 'thinkup_customizer_callback_active_global',
			)
		)
	);

	// Add Image Slide 2 - Title
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderimage2_title]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_sliderimage2_title',
		array(
			'section'		  => 'thinkup_customizer_section_homepage',
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_sliderimage2_title]',
			'type'			  => 'text',
			'label'			  => __( '', 'experon' ),
			'description'	  => __( 'Title', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Image Slide 2 - Description
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderimage2_desc]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_sliderimage2_desc',
		array(
			'section'		  => 'thinkup_customizer_section_homepage',
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_sliderimage2_desc]',
			'type'			  => 'text',
			'label'			  => __( '', 'experon' ),
			'description'	  => __( 'Description', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Slide 2 - Page Link
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderimage2_link]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_sliderimage2_link',
		array(
			'section'		  => 'thinkup_customizer_section_homepage',
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_sliderimage2_link]',
			'type'			  => 'dropdown-pages',
			'label'			  => __( '', 'experon' ),
			'description'	  => __( 'URL', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Image Slide 3 - Info
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderimage3_info]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_raw(
			$wp_customize,
			'thinkup_homepage_sliderimage3_info',
			array(
				'label'           => __( 'Slide 3', 'experon' ),
				'section'         => 'thinkup_customizer_section_homepage',
				'settings'        => 'thinkup_redux_variables[thinkup_homepage_sliderimage3_info]',
				'active_callback' => 'thinkup_customizer_callback_active_global',
			)
		)
	);

	// Add Image Slide 3 - Image
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderimage3_image][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'thinkup_homepage_sliderimage3_image',
			array(
				'section'         => 'thinkup_customizer_section_homepage',
				'settings'        => 'thinkup_redux_variables[thinkup_homepage_sliderimage3_image][url]',
				'label'	          => __( '', 'experon' ),
				'description'	  => __( 'Image', 'experon' ),
				'active_callback' => 'thinkup_customizer_callback_active_global',
			)
		)
	);

	// Add Image Slide 3 - Title
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderimage3_title]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_sliderimage3_title',
		array(
			'section'		  => 'thinkup_customizer_section_homepage',
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_sliderimage3_title]',
			'type'			  => 'text',
			'label'			  => __( '', 'experon' ),
			'description'	  => __( 'Title', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Image Slide 3 - Description
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderimage3_desc]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_sliderimage3_desc',
		array(
			'section'		  => 'thinkup_customizer_section_homepage',
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_sliderimage3_desc]',
			'type'			  => 'text',
			'label'			  => __( '', 'experon' ),
			'description'	  => __( 'Description', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Slide 3 - Page Link
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderimage3_link]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_sliderimage3_link',
		array(
			'section'		  => 'thinkup_customizer_section_homepage',
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_sliderimage3_link]',
			'type'			  => 'dropdown-pages',
			'label'			  => __( '', 'experon' ),
			'description'	  => __( 'URL', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Slider Height (Max) Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderpresetheight]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '350',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'absint',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_sliderpresetheight',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_sliderpresetheight]',
			'section'		  => 'thinkup_customizer_section_homepage',
			'type'			  => 'text',
			'label'			  => __( 'Slider Height (Max)', 'experon' ),
			'description'	  => __( 'Specify the maximum slider height (px).', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Enable Full-Width Slider Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sliderpresetwidth]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_homepage_sliderpresetwidth',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_homepage_sliderpresetwidth]',
				'section'         => 'thinkup_customizer_section_homepage',
				'label'           => __( 'Enable Full-Width Slider', 'experon' ),
				'description'	  => __( 'Switch on to enable full-width slider.', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => 'thinkup_customizer_callback_active_global',
			)
		)
	);

	// Add Call To Action - Intro Section Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_section_homepage_ctaintro]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_section(
			$wp_customize,
			'thinkup_section_homepage_ctaintro',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_section_homepage_ctaintro]',
				'section'         => 'thinkup_customizer_section_homepage',
				'label'           => __( 'Call To Action - Intro', 'experon' ),
				'active_callback' => '',
			)
		)
	);

	// Add Homepage - Intro Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_introswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_introswitch',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_introswitch]',
			'section'		  => 'thinkup_customizer_section_homepage',
			'type'			  => 'checkbox',
			'label'			  => __( 'Message', 'experon' ),
			'description'	  => __( 'Check to enable intro on home page.', 'experon' ),
			'active_callback' => '',
		)
	);

	// Add Homepage - Intro Title Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_introaction]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_introaction',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_introaction]',
			'section'		  => 'thinkup_customizer_section_homepage',
			'type'			  => 'text',
			'description'	  => __( 'Enter a <strong>title</strong> message.<br /><br />This will be one of the first messages your visitors see. Use this to get their attention.', 'experon' ),
			'active_callback' => '',
		)
	);

	// Add Call To Action Style Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_introstyle]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_introstyle',
		array(
			'settings'		=> 'thinkup_redux_variables[thinkup_homepage_introstyle]',
			'section'		=> 'thinkup_customizer_section_homepage',
			'type'			=> 'radio',
			'label'			=> __( '', 'experon' ),
			'description'	=> __( 'Select a call to action style.', 'experon' ),
			'choices'		=> array(
				'option1' => 'Style 1',
				'option2' => 'Style 2'
			)
		)
	);

	// Add Homepage - Intro Teaser Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_introactionteaser]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_introactionteaser',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_introactionteaser]',
			'section'		  => 'thinkup_customizer_section_homepage',
			'type'			  => 'text',
			'description'	  => __( 'Enter a <strong>teaser</strong> message.<br /><br />Use this to provide more details about what you offer.', 'experon' ),
			'active_callback' => '',
		)
	);

	// Add Homepage - Intro Button Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_introactiontext1]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_introactiontext1',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_introactiontext1]',
			'section'		  => 'thinkup_customizer_section_homepage',
			'type'			  => 'text',
			'label'			  => __( 'Button - Text', 'experon' ),
			'description'	  => __( 'Specify a text for button 1.', 'experon' ),
			'active_callback' => '',
		)
	);

	// Add Homepage - Intro Link Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_introactionlink1]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_introactionlink1',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_introactionlink1]',
			'section'		  => 'thinkup_customizer_section_homepage',
			'type'			  => 'radio',
			'label'			  => __( 'Button - Link', 'experon' ),
			'description'	  => __( 'Specify whether the action button should link to a page on your site, out to external webpage or disable the link altogether.', 'experon' ),
			'choices'		  => array(
				'option1' => __( 'Link to a Page', 'experon' ),
				'option2' => __( 'Specify Custom link', 'experon' ),
				'option3' => __( 'Disable Link', 'experon' ),
			),
			'active_callback' => '',
		)
	);

	// Add Homepage - Intro Page Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_introactionpage1]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_introactionpage1',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_introactionpage1]',
			'section'		  => 'thinkup_customizer_section_homepage',
			'type'			  => 'dropdown-pages',
			'label'			  => __( 'Button - Link to a page', 'experon' ),
			'description'	  => __( 'Select a target page for action button link.', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Homepage - Intro Custom Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_introactioncustom1]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_introactioncustom1',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_introactioncustom1]',
			'section'		  => 'thinkup_customizer_section_homepage',
			'type'			  => 'text',
			'label'			  => __( 'Button - Custom link', 'experon' ),
			'description'	  => __( 'Input a custom url for the action button link.<br>Add http:// if linking to an external webpage.', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);


	//----------------------------------------------------
	// 2.3. Homepage (Featured)
	//----------------------------------------------------

	// Add Homepage (Featured) Heading
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_section_homepagefeatured_heading]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_section(
			$wp_customize,
			'thinkup_section_homepagefeatured_heading',
			array(
				'label'           => __( 'Display Pre-Designed Homepage Layout', 'experon' ),
				'section'         => 'thinkup_customizer_section_homepagefeatured',
				'settings'        => 'thinkup_redux_variables[thinkup_section_homepagefeatured_heading]',
				'active_callback' => '',
			)
		)
	);

	// Add Enable Pre-Made Homepage Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_sectionswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_homepage_sectionswitch',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_homepage_sectionswitch]',
				'section'         => 'thinkup_customizer_section_homepagefeatured',
				'label'           => __( 'Enable Pre-Made Homepage', 'experon' ),
				'description'	  => __( 'switch on to enable pre-designed homepage layout.', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Add Content Area 1 Icon Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_section1_icon]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_select_faicons',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_section1_icon',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_section1_icon]',
			'section'		  => 'thinkup_customizer_section_homepagefeatured',
			'type'			  => 'select',
			'label'			  => __( 'Content Area 1', 'experon' ),
			'description'	  => __( 'Choose an icon for the section background.', 'experon' ),
			'choices'		  => thinkup_customizer_select_array_faicons(),
			'active_callback' => '',
		)
	);

	// Add Content Area 1 Title Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_section1_title]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_section1_title',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_section1_title]',
			'section'		  => 'thinkup_customizer_section_homepagefeatured',
			'type'			  => 'text',
			'description'	  => __( 'Add a title to the section.', 'experon' ),
			'active_callback' => '',
		)
	);

	// Add Content Area 1 Description Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_section1_desc]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_section1_desc',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_section1_desc]',
			'section'		  => 'thinkup_customizer_section_homepagefeatured',
			'type'			  => 'text',
			'description'	  => __( 'Add some text to featured section 1.', 'experon' ),
			'active_callback' => '',
		)
	);

	// Add Content Area 1 Link Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_section1_link]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_section1_link',
		array(
			'settings'		=> 'thinkup_redux_variables[thinkup_homepage_section1_link]',
			'section'		=> 'thinkup_customizer_section_homepagefeatured',
			'type'			=> 'dropdown-pages',
			'label'			=> __( 'Link to a page', 'experon' ),
		)
	);

	// Add Content Area 2 Icon Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_section2_icon]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_select_faicons',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_section2_icon',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_section2_icon]',
			'section'		  => 'thinkup_customizer_section_homepagefeatured',
			'type'			  => 'select',
			'label'			  => __( 'Content Area 2', 'experon' ),
			'description'	  => __( 'Choose an icon for the section background.', 'experon' ),
			'choices'		  => thinkup_customizer_select_array_faicons(),
			'active_callback' => '',
		)
	);

	// Add Content Area 2 Title Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_section2_title]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_section2_title',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_section2_title]',
			'section'		  => 'thinkup_customizer_section_homepagefeatured',
			'type'			  => 'text',
			'description'	  => __( 'Add a title to the section.', 'experon' ),
			'active_callback' => '',
		)
	);

	// Add Content Area 2 Description Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_section2_desc]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_section2_desc',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_section2_desc]',
			'section'		  => 'thinkup_customizer_section_homepagefeatured',
			'type'			  => 'text',
			'description'	  => __( 'Add some text to featured section 2.', 'experon' ),
			'active_callback' => '',
		)
	);

	// Add Content Area 2 Link Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_section2_link]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_section2_link',
		array(
			'settings'		=> 'thinkup_redux_variables[thinkup_homepage_section2_link]',
			'section'		=> 'thinkup_customizer_section_homepagefeatured',
			'type'			=> 'dropdown-pages',
			'label'			=> __( 'Link to a page', 'experon' ),
		)
	);

	// Add Content Area 3 Icon Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_section3_icon]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_select_faicons',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_section3_icon',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_section3_icon]',
			'section'		  => 'thinkup_customizer_section_homepagefeatured',
			'type'			  => 'select',
			'label'			  => __( 'Content Area 3', 'experon' ),
			'description'	  => __( 'Choose an icon for the section background.', 'experon' ),
			'choices'		  => thinkup_customizer_select_array_faicons(),
			'active_callback' => '',
		)
	);

	// Add Content Area 3 Title Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_section3_title]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_section3_title',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_section3_title]',
			'section'		  => 'thinkup_customizer_section_homepagefeatured',
			'type'			  => 'text',
			'description'	  => __( 'Add a title to the section.', 'experon' ),
			'active_callback' => '',
		)
	);

	// Add Content Area 3 Description Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_section3_desc]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_section3_desc',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_homepage_section3_desc]',
			'section'		  => 'thinkup_customizer_section_homepagefeatured',
			'type'			  => 'text',
			'description'	  => __( 'Add some text to featured section 3.', 'experon' ),
			'active_callback' => '',
		)
	);

	// Add Content Area 3 Link Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_homepage_section3_link]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'thinkup_homepage_section3_link',
		array(
			'settings'		=> 'thinkup_redux_variables[thinkup_homepage_section3_link]',
			'section'		=> 'thinkup_customizer_section_homepagefeatured',
			'type'			=> 'dropdown-pages',
			'label'			=> __( 'Link to a page', 'experon' ),
		)
	);

	//----------------------------------------------------
	// 2.4. Header
	//----------------------------------------------------

	// Add Header Heading
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_section_header_heading]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_section(
			$wp_customize,
			'thinkup_section_header_heading',
			array(
				'label'           => __( 'Header Style', 'experon' ),
				'section'         => 'thinkup_customizer_section_header',
				'settings'        => 'thinkup_redux_variables[thinkup_section_header_heading]',
				'active_callback' => '',
			)
		)
	);

	// Add Enable Fancy Dropdown Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_fancydrop]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_header_fancydrop',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_header_fancydrop]',
				'section'         => 'thinkup_customizer_section_header',
				'label'           => __( 'Enable Fancy Dropdown', 'experon' ),
				'description'	  => __( 'Switch on to enable fancy dropdown menu styling.', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Add Control Header Content Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_section_header_content]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_section(
			$wp_customize,
			'thinkup_section_header_content',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_section_header_content]',
				'section'         => 'thinkup_customizer_section_header',
				'label'           => __( 'Control Header Content', 'experon' ),
				'active_callback' => '',
			)
		)
	);

	// Add Enable Search (Main Header) Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_searchswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_header_searchswitch',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_header_searchswitch]',
				'section'         => 'thinkup_customizer_section_header',
				'label'           => __( 'Enable Search (Main Header)', 'experon' ),
				'description'	  => __( 'Switch on to enable header search.', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => '',
			)
		)
	);


	//----------------------------------------------------
	// 2.5. Footer
	//----------------------------------------------------

	// Add Footer Heading
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_section_footer_heading]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_section(
			$wp_customize,
			'thinkup_section_footer_heading',
			array(
				'label'           => __( 'Control Footer Content', 'experon' ),
				'section'         => 'thinkup_customizer_section_footer',
				'settings'        => 'thinkup_redux_variables[thinkup_section_footer_heading]',
				'active_callback' => '',
			)
		)
	);

	// Add Footer Widgets Layout Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_footer_layout]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_radio_image(
			$wp_customize,
			'thinkup_footer_layout',
			array(
				'settings'		  => 'thinkup_redux_variables[thinkup_footer_layout]',
				'section'		  => 'thinkup_customizer_section_footer',
				'label'			  => __( 'Footer Widgets Layout', 'experon' ),
				'description'	  => __( 'Select footer layout. Take complete control of the footer content by adding widgets.', 'experon' ),
				'choices'		  => array(
					'option1'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option01.png',
					'option2'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option02.png',
					'option3'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option03.png',
					'option4'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option04.png',
					'option5'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option05.png',
					'option6'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option06.png',
					'option7'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option07.png',
					'option8'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option08.png',
					'option9'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option09.png',
					'option10' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option10.png',
					'option11' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option11.png',
					'option12' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option12.png',
					'option13' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option13.png',
					'option14' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option14.png',
					'option15' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option15.png',
					'option16' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option16.png',
					'option17' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option17.png',
					'option18' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option18.png',
				),
				'active_callback' => '',
			)
		)
	);

	// Add Disable Footer Widgets Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_footer_widgetswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'thinkup_footer_widgetswitch',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_footer_widgetswitch]',
			'section'		  => 'thinkup_customizer_section_footer',
			'type'			  => 'checkbox',
			'label'			  => __( 'Disable Footer Widgets', 'experon' ),
			'description'	  => __( 'Check to disable footer widgets.', 'experon' ),
			'active_callback' => '',
		)
	);

	// Add Enable Scroll To Top Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_footer_scroll]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_footer_scroll',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_footer_scroll]',
				'section'         => 'thinkup_customizer_section_footer',
				'label'           => __( 'Enable Scroll To Top', 'experon' ),
				'description'	  => __( 'Check to enable scroll to top.', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => '',
			)
		)
	);


	//----------------------------------------------------
	// 2.6. Social Media
	//----------------------------------------------------

	// Add Social Media Heading
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_section_socialmedia_heading]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_section(
			$wp_customize,
			'thinkup_section_socialmedia_heading',
			array(
				'label'           => __( 'Social Media Control', 'experon' ),
				'section'         => 'thinkup_customizer_section_socialmedia',
				'settings'        => 'thinkup_redux_variables[thinkup_section_socialmedia_heading]',
				'active_callback' => '',
			)
		)
	);

	// Add Enable Social Media Links (Header) Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_socialswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_header_socialswitch',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_header_socialswitch]',
				'section'         => 'thinkup_customizer_section_socialmedia',
				'label'           => __( 'Enable Social Media Links (header)', 'experon' ),
				'description'	  => __( 'Switch on to enable links to social media pages.', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Add Enable Social Media Links (footer) Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_socialswitchfooter]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_header_socialswitchfooter',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_header_socialswitchfooter]',
				'section'         => 'thinkup_customizer_section_socialmedia',
				'label'           => __( 'Enable Social Media Links (footer)', 'experon' ),
				'description'	  => __( 'Switch on to enable links to social media pages.', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Add Social Media Content Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_section_header_social]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_section(
			$wp_customize,
			'thinkup_section_header_social',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_section_header_social]',
				'section'         => 'thinkup_customizer_section_socialmedia',
				'label'           => __( 'Social Media Content', 'experon' ),
				'active_callback' => '',
			)
		)
	);

	// Add Display Message Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_socialmessage]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'thinkup_header_socialmessage',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_header_socialmessage]',
			'section'		  => 'thinkup_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'			  => __( 'Display Message', 'experon' ),
			'description'	  => __( 'Add a message here. E.g. &#34;Follow Us&#34;.<br />(Only shown in header)', 'experon' ),
			'active_callback' => '',
		)
	);

	// Facebook social settings
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_facebookswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_header_facebookswitch',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_header_facebookswitch]',
				'section'         => 'thinkup_customizer_section_socialmedia',
				'label'           => __( 'Facebook', 'experon' ),
				'description'	  => __( 'Enable link to Facebook profile.', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_facebooklink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'thinkup_header_facebooklink',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_header_facebooklink]',
			'section'		  => 'thinkup_customizer_section_socialmedia',
			'type'			  => 'text',
			'description'	  => __( 'Input the url to your Facebook page.', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_facebookiconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'thinkup_header_facebookiconswitch',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_header_facebookiconswitch]',
			'section'		  => 'thinkup_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Custom Icon', 'experon' ),
			'description'	  => __( 'Check to use custom Facebook icon', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_facebookcustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'thinkup_header_facebookcustomicon',
			array(
				'settings'		  => 'thinkup_redux_variables[thinkup_header_facebookcustomicon][url]',
				'section'		  => 'thinkup_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'experon' ),
				'active_callback' => 'thinkup_customizer_callback_active_global',
			)
		)
	);

	// Twitter social settings
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_twitterswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_header_twitterswitch',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_header_twitterswitch]',
				'section'         => 'thinkup_customizer_section_socialmedia',
				'label'           => __( 'Twitter', 'experon' ),
				'description'	  => __( 'Enable link to Twitter profile.', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_twitterlink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'thinkup_header_twitterlink',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_header_twitterlink]',
			'section'		  => 'thinkup_customizer_section_socialmedia',
			'type'			  => 'text',
			'description'	  => __( 'Input the url to your Twitter page.', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_twittericonswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'thinkup_header_twittericonswitch',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_header_twittericonswitch]',
			'section'		  => 'thinkup_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Custom Icon', 'experon' ),
			'description'	  => __( 'Check to use custom Twitter icon', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_twittercustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'thinkup_header_twittercustomicon',
			array(
				'settings'		  => 'thinkup_redux_variables[thinkup_header_twittercustomicon][url]',
				'section'		  => 'thinkup_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'experon' ),
				'active_callback' => 'thinkup_customizer_callback_active_global',
			)
		)
	);

	// Google+ social settings
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_googleswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_header_googleswitch',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_header_googleswitch]',
				'section'         => 'thinkup_customizer_section_socialmedia',
				'label'           => __( 'Google+', 'experon' ),
				'description'	  => __( 'Enable link to Google+ profile.', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_googlelink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'thinkup_header_googlelink',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_header_googlelink]',
			'section'		  => 'thinkup_customizer_section_socialmedia',
			'type'			  => 'text',
			'description'	  => __( 'Input the url to your Google+ page.', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_googleiconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'thinkup_header_googleiconswitch',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_header_googleiconswitch]',
			'section'		  => 'thinkup_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Custom Icon', 'experon' ),
			'description'	  => __( 'Check to use custom Google+ icon', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_googlecustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'thinkup_header_googlecustomicon',
			array(
				'settings'		  => 'thinkup_redux_variables[thinkup_header_googlecustomicon][url]',
				'section'		  => 'thinkup_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'experon' ),
				'active_callback' => 'thinkup_customizer_callback_active_global',
			)
		)
	);

	// LinkedIn social settings
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_linkedinswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_header_linkedinswitch',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_header_linkedinswitch]',
				'section'         => 'thinkup_customizer_section_socialmedia',
				'label'           => __( 'LinkedIn', 'experon' ),
				'description'	  => __( 'Enable link to LinkedIn profile.', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_linkedinlink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'thinkup_header_linkedinlink',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_header_linkedinlink]',
			'section'		  => 'thinkup_customizer_section_socialmedia',
			'type'			  => 'text',
			'description'	  => __( 'Input the url to your LinkedIn page.', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_linkediniconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'thinkup_header_linkediniconswitch',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_header_linkediniconswitch]',
			'section'		  => 'thinkup_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Custom Icon', 'experon' ),
			'description'	  => __( 'Check to use custom LinkedIn icon', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_linkedincustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'thinkup_header_linkedincustomicon',
			array(
				'settings'		  => 'thinkup_redux_variables[thinkup_header_linkedincustomicon][url]',
				'section'		  => 'thinkup_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'experon' ),
				'active_callback' => 'thinkup_customizer_callback_active_global',
			)
		)
	);

	// Flickr social settings
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_flickrswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_header_flickrswitch',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_header_flickrswitch]',
				'section'         => 'thinkup_customizer_section_socialmedia',
				'label'           => __( 'Flickr', 'experon' ),
				'description'	  => __( 'Enable link to Flickr profile.', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_flickrlink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'thinkup_header_flickrlink',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_header_flickrlink]',
			'section'		  => 'thinkup_customizer_section_socialmedia',
			'type'			  => 'text',
			'description'	  => __( 'Input the url to your Flickr page.', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_flickriconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'thinkup_header_flickriconswitch',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_header_flickriconswitch]',
			'section'		  => 'thinkup_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Custom Icon', 'experon' ),
			'description'	  => __( 'Check to use custom Flickr icon', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_flickrcustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'thinkup_header_flickrcustomicon',
			array(
				'settings'		=> 'thinkup_redux_variables[thinkup_header_flickrcustomicon][url]',
				'section'		=> 'thinkup_customizer_section_socialmedia',
				'description'	=> __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'experon' ),
				'active_callback' => 'thinkup_customizer_callback_active_global',
			)
		)
	);

	// YouTube social settings
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_youtubeswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_header_youtubeswitch',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_header_youtubeswitch]',
				'section'         => 'thinkup_customizer_section_socialmedia',
				'label'           => __( 'YouTube', 'experon' ),
				'description'	  => __( 'Enable link to YouTube profile.', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_youtubelink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'thinkup_header_youtubelink',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_header_youtubelink]',
			'section'		  => 'thinkup_customizer_section_socialmedia',
			'type'			  => 'text',
			'description'     => __( 'Input the url to your YouTube page.', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_youtubeiconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'thinkup_header_youtubeiconswitch',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_header_youtubeiconswitch]',
			'section'		  => 'thinkup_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Custom Icon', 'experon' ),
			'description'	  => __( 'Check to use custom YouTube icon', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_youtubecustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'thinkup_header_youtubecustomicon',
			array(
				'settings'		  => 'thinkup_redux_variables[thinkup_header_youtubecustomicon][url]',
				'section'		  => 'thinkup_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'experon' ),
				'active_callback' => 'thinkup_customizer_callback_active_global',
			)
		)
	);

	// RSS social settings
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_rssswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_switch(
			$wp_customize,
			'thinkup_header_rssswitch',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_header_rssswitch]',
				'section'         => 'thinkup_customizer_section_socialmedia',
				'label'           => __( 'RSS', 'experon' ),
				'description'	  => __( 'Enable link to RSS profile.', 'experon' ),
				'choices'		  => array(
					'1'      => __( 'On', 'experon' ),
					'off'    => __( 'Off', 'experon' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_rsslink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'thinkup_header_rsslink',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_header_rsslink]',
			'section'		  => 'thinkup_customizer_section_socialmedia',
			'type'			  => 'text',
			'description'     => __( 'Input the url to your RSS page.', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_rssiconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'thinkup_header_rssiconswitch',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_header_rssiconswitch]',
			'section'		  => 'thinkup_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Custom Icon', 'experon' ),
			'description'	  => __( 'Check to use custom RSS icon', 'experon' ),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_header_rsscustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'thinkup_header_rsscustomicon',
			array(
				'settings'		  => 'thinkup_redux_variables[thinkup_header_rsscustomicon][url]',
				'section'		  => 'thinkup_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'experon' ),
				'active_callback' => 'thinkup_customizer_callback_active_global',
			)
		)
	);


	//----------------------------------------------------
	// 2.7. Blog
	//----------------------------------------------------

	// Add Blog Heading
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_section_blog_heading]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_section(
			$wp_customize,
			'thinkup_section_blog_heading',
			array(
				'label'           => __( 'Control Blog (Archive) Pages', 'experon' ),
				'section'         => 'thinkup_customizer_section_blog',
				'settings'        => 'thinkup_redux_variables[thinkup_section_blog_heading]',
				'active_callback' => '',
			)
		)
	);

	// Add Blog Layout Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_blog_layout]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_radio_image(
			$wp_customize,
			'thinkup_blog_layout',
			array(
				'settings'		  => 'thinkup_redux_variables[thinkup_blog_layout]',
				'section'		  => 'thinkup_customizer_section_blog',
				'label'			  => __( 'Blog Layout', 'experon' ),
				'description'	  => __( 'Select blog page layout. Only applied to the main blog page and not individual posts.', 'experon' ),
				'choices'		  => array(
					'option1' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option01.png',
					'option2' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option02.png',
					'option3' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option03.png',
				),
				'active_callback' => '',
			)
		)
	);

	// Add Blog Select a Sidebar Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_blog_sidebars]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_select_sidebar',
		)
	);
	$wp_customize->add_control(
		'thinkup_blog_sidebars',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_blog_sidebars]',
			'section'		  => 'thinkup_customizer_section_blog',
			'type'			  => 'select',
			'label'			  => __( 'Select a Sidebar', 'experon' ),
			'description'	  => __( 'Note: Sidebars will not be applied to homepage Blog. Control sidebars on the homepage from the &#39;Home Settings&#39; option.', 'experon' ),
			'choices'		  => thinkup_customizer_select_array_sidebar(),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Post Content Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_blog_postswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		'thinkup_blog_postswitch',
		array(
			'settings'		=> 'thinkup_redux_variables[thinkup_blog_postswitch]',
			'section'		=> 'thinkup_customizer_section_blog',
			'type'			=> 'radio',
			'label'			=> __( 'Post Content', 'experon' ),
			'description'	=> __( 'Control how much content you want to show from each post on the main blog page. Remember to control the full article content by using the Wordpress <a href="http://en.support.wordpress.com/splitting-content/more-tag/">more</a> tag in your post.', 'experon' ),
			'choices'		=> array(
				'option1' => __( 'Show excerpt', 'experon' ),
				'option2' => __( 'Show full article', 'experon' ),
				'option3' => __( 'Hide article', 'experon' ),
			)
		)
	);

	// Add Control Single Post Page Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_section_post_layout]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_section(
			$wp_customize,
			'thinkup_section_post_layout',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_section_post_layout]',
				'section'         => 'thinkup_customizer_section_blog',
				'label'           => __( 'Control Single Post Page', 'experon' ),
				'active_callback' => '',
			)
		)
	);

	// Add Post Layout Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_post_layout]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_radio_image(
			$wp_customize,
			'thinkup_post_layout',
			array(
				'settings'		  => 'thinkup_redux_variables[thinkup_post_layout]',
				'section'		  => 'thinkup_customizer_section_blog',
				'label'			  => __( 'Post Layout', 'experon' ),
				'description'	  => __( 'Select blog page layout. This will only be applied to individual posts and not the main blog page.', 'experon' ),
				'choices'		  => array(
					'option1' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option01.png',
					'option2' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option02.png',
					'option3' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option03.png',
				),
				'active_callback' => '',
			)
		)
	);

	// Add Post Select a Sidebar Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_post_sidebars]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'thinkup_customizer_callback_sanitize_select_sidebar',
		)
	);
	$wp_customize->add_control(
		'thinkup_post_sidebars',
		array(
			'settings'		  => 'thinkup_redux_variables[thinkup_post_sidebars]',
			'section'		  => 'thinkup_customizer_section_blog',
			'type'			  => 'select',
			'label'			  => __( 'Select a Sidebar', 'experon' ),
			'description'	  => __( 'Choose a sidebar to use with the layout.', 'experon' ),
			'choices'		  => thinkup_customizer_select_array_sidebar(),
			'active_callback' => 'thinkup_customizer_callback_active_global',
		)
	);

	// Add Comment Style Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_post_commentstyle]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		'thinkup_post_commentstyle',
		array(
			'settings'		=> 'thinkup_redux_variables[thinkup_post_commentstyle]',
			'section'		=> 'thinkup_customizer_section_homepage',
			'type'			=> 'radio',
			'label'			=> __( 'Comment Style', 'experon' ),
			'description'	=> __( 'Select a style for the comments section.', 'experon' ),
			'choices'		=> array(
				'option1' => 'Style 1',
				'option2' => 'Style 2'
			)
		)
	);

	//----------------------------------------------------
	// 2.8. Upgrade Section (10% off)
	//----------------------------------------------------

	// Add Upgrade Control
	$wp_customize->add_setting(
		'thinkup_redux_variables[thinkup_upgrade_content]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'wp_filter_post_kses',
		)
	);
	$wp_customize->add_control(
		new thinkup_customizer_customcontrol_upgrade(
			$wp_customize,
			'thinkup_upgrade_content',
			array(
				'settings'        => 'thinkup_redux_variables[thinkup_upgrade_content]',
				'section'         => 'thinkup_customizer_section_upgrade',
				'upgrade_url'     => 'https://www.thinkupthemes.com/themes/experon/',
				'price_discount'  => __( 'Upgrade Now (10% off)', 'experon' ),
				'price_normal'	  => __( 'Use coupon at checkout for 10% off.', 'experon' ),
				'coupon'	      => __( 'thinkup10', 'experon' ),
				'button'	      => __( 'Upgrade Now', 'experon' ),
				'title_main'	  => __( 'So&hellip; Why upgrade?', 'experon' ),
				'title_secondary' => __( 'We&#39;re glad you asked! Here&#39;s just some of the amazing features you&#39;ll get when you upgrade&hellip;', 'experon' ),
				'images'		  => array(
					'%s/admin/main/inc/controls/upgrade/img/1_trusted_team.png',
					'%s/admin/main/inc/controls/upgrade/img/2_page_builder.png',
					'%s/admin/main/inc/controls/upgrade/img/3_premium_support.png',
					'%s/admin/main/inc/controls/upgrade/img/4_theme_options.png',
					'%s/admin/main/inc/controls/upgrade/img/5_shortcodes.png',
					'%s/admin/main/inc/controls/upgrade/img/6_unlimited_colors.png',
					'%s/admin/main/inc/controls/upgrade/img/7_parallax_pages.png',
					'%s/admin/main/inc/controls/upgrade/img/8_typography.png',
					'%s/admin/main/inc/controls/upgrade/img/9_backgrounds.png',
					'%s/admin/main/inc/controls/upgrade/img/10_responsive.png',
					'%s/admin/main/inc/controls/upgrade/img/11_retina_ready.png',
					'%s/admin/main/inc/controls/upgrade/img/12_site_layout.png',
					'%s/admin/main/inc/controls/upgrade/img/13_translation_ready.png',
					'%s/admin/main/inc/controls/upgrade/img/14_rtl_support.png',
					'%s/admin/main/inc/controls/upgrade/img/15_infinite_sidebars.png',
					'%s/admin/main/inc/controls/upgrade/img/16_portfolios.png',
					'%s/admin/main/inc/controls/upgrade/img/17_seo_optimized.png',
					'%s/admin/main/inc/controls/upgrade/img/18_demo_content.png',
				),
				'active_callback' => '',
			)
		)
	);

}
add_action( 'customize_register' , 'thinkup_customizer_theme_options' );