<?php
function fifteen_customize_register_fonts( $wp_customize ) {
		$wp_customize->add_section(
	    'fifteen_typo_options',
	    array(
	        'title'     => __('Google Web Fonts','fifteen'),
	        'panel' => 'fifteen_design_panel',
	        'priority'  => 41,
	    )
	);
	
	$font_array = array('HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans');
	$fonts = array_combine($font_array, $font_array);
	
	$wp_customize->add_setting(
		'fifteen_title_font',
		array(
			'default'=> 'HIND',
			'sanitize_callback' => 'fifteen_sanitize_gfont' 
			)
	);
	
	function fifteen_sanitize_gfont( $input ) {
		if ( in_array($input, array('HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans') ) )
			return $input;
		else
			return 'fifteen';	
	}
	
	$wp_customize->add_control(
		'fifteen_title_font',array(
				'label' => __('Title','fifteen'),
				'settings' => 'fifteen_title_font',
				'section'  => 'fifteen_typo_options',
				'type' => 'select',
				'choices' => $fonts,
			)
	);
	
	$wp_customize->add_setting(
		'fifteen_body_font',
			array(	'default'=> 'Open Sans',
					'sanitize_callback' => 'fifteen_sanitize_gfont' )
	);
	
	$wp_customize->add_control(
		'fifteen_body_font',array(
				'label' => __('Body','fifteen'),
				'settings' => 'fifteen_body_font',
				'section'  => 'fifteen_typo_options',
				'type' => 'select',
				'choices' => $fonts
			)
	);

}
add_action( 'customize_register', 'fifteen_customize_register_fonts' );