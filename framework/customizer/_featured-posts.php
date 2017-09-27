<?php
function fifteen_customize_register_fp( $wp_customize ) {
	//FEATURED POSTS	
	$wp_customize->add_section(
	    'fifteen_featposts',
	    array(
	        'title'     => __('Featured Posts','fifteen'),
	        'priority'  => 35,
	    )
	);
	
	$wp_customize->add_setting(
		'fifteen_featposts_enable',
		array( 'sanitize_callback' => 'fifteen_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'fifteen_featposts_enable', array(
		    'settings' => 'fifteen_featposts_enable',
		    'label'    => __( 'Enable', 'fifteen' ),
		    'section'  => 'fifteen_featposts',
		    'type'     => 'checkbox',
		)
	);	
	
	$wp_customize->add_setting(
		    'fifteen_featposts_cat',
		    array( 'sanitize_callback' => 'fifteen_sanitize_category' )
		);
	
		
	$wp_customize->add_control(
	    new Hanne_WP_Customize_Category_Control(
	        $wp_customize,
	        'fifteen_featposts_cat',
	        array(
	            'label'    => __('Category For Featured Posts','fifteen'),
	            'settings' => 'fifteen_featposts_cat',
	            'section'  => 'fifteen_featposts'
	        )
	    )
	);
}
add_action( 'customize_register', 'fifteen_customize_register_fp' );