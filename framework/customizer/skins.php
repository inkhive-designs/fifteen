<?php
function fifteen_customize_register_skins( $wp_customize ) {
	
	$wp_customize->get_section('colors')->panel = "fifteen_design_panel";
	$wp_customize->get_section('background_image')->panel = "fifteen_design_panel";
	$wp_customize->get_section('custom_css')->panel = "fifteen_design_panel";
	//Replace Header Text Color with, separate colors for Title and Description
	$wp_customize->get_control('header_textcolor')->label = __('Site Title Color','fifteen');
	$wp_customize->add_setting('fifteen_header_desccolor', array(
	    'default'     => '#000',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'fifteen_header_desccolor', array(
			'label' => __('Site Tagline Color','fifteen'),
			'section' => 'colors',
			'settings' => 'fifteen_header_desccolor',
			'type' => 'color'
		) ) 
	);
}
add_action( 'customize_register', 'fifteen_customize_register_skins' );