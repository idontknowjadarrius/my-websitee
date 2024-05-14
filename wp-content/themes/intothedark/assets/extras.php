<?php 



/*  -----------------------------------------------------------------------------------------------
  Customizer
--------------------------------------------------------------------------------------------------- */
function intothedark_add_customizer_settings($wp_customize) {
    $wp_customize->add_section('intothedark_button_section', array(
        'title'    => __('Button settings', 'intothedark'),
        'priority' => 30,
    ));
//button Settings
   
    $wp_customize->add_setting('intothedark_button_text', array(
        'default'   => __('Discover more', 'intothedark'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('intothedark_text_button_control', array(
        'label'    => __('Button text', 'intothedark'),
        'section'  => 'intothedark_button_section',
        'settings' => 'intothedark_button_text',
    ));

    $wp_customize->add_setting('intothedark_arrow', array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('intothedark_arrow_control', array(
        'label'    => __('Arrow', 'intothedark'),
        'section'  => 'intothedark_button_section',
        'settings' => 'intothedark_arrow',
        'type'     => 'checkbox',
    ));

 //scroll top
 $wp_customize->add_section('intothedark_scroll_to_top_section', array(
    'title'    => __('Scroll to Top', 'intothedark'),
    'priority' => 35, 
 ));

    $wp_customize->add_setting('intothedark_show_scroll_to_top', array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('intothedark_show_scroll_to_top_control', array(
        'label'    => __('Show Scroll to Top', 'intothedark'),
        'section'  => 'intothedark_scroll_to_top_section',
        'settings' => 'intothedark_show_scroll_to_top',
        'type'     => 'checkbox',
    ));
}
add_action('customize_register', 'intothedark_add_customizer_settings');











?>