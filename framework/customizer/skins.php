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

//Select the Default Theme Skin
        $wp_customize->add_section(
            'fifteen_skin_options',
            array(
                'title'     => __('Choose Skin','fifteen'),
                'priority'  => 39,
                'panel'    => 'fifteen_design_panel'
                )
        );

        $wp_customize->add_setting(
            'fifteen_skin',
            array(
                'default'=> 'default',
                'sanitize_callback' => 'fifteen_sanitize_skin'
            )
        );

        $skins = array( 'default' => __('Default(Gray)','fifteen'),
            'orange' =>  __('Dark Orange','fifteen'),
            'pink' => __('Pink','fifteen'),
            'slick' => __('Slick','fifteen'),
            'custom' => __('BUILD CUSTOM SKIN','fifteen'),

        );

        $wp_customize->add_control(
            'fifteen_skin',array(
                'settings' => 'fifteen_skin',
                'section'  => 'fifteen_skin_options',
                'type' => 'select',
                'choices' => $skins,
            )
        );

        function fifteen_sanitize_skin( $input ) {
            if ( in_array($input, array('default','orange','slick','pink','custom') ) )
                return $input;
            else
                return '';
        }

    //CUSTOM SKIN BUILDER

    $wp_customize->add_setting('fifteen_skin_var_background', array(
        'default'     => '#9c9c9c',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'fifteen_skin_var_background', array(
            'label' => __('Primary Background','fifteen'),
            'section' => 'colors',
            'settings' => 'fifteen_skin_var_background',
            'active_callback' => 'fifteen_skin_custom',
            'type' => 'color'
        ) )
    );


    $wp_customize->add_setting('fifteen_skin_var_accent', array(
        'default'     => 'darkgreen',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'fifteen_skin_var_accent', array(
            'label' => __('Primary Accent','fifteen'),
            'section' => 'colors',
            'settings' => 'fifteen_skin_var_accent',
            'type' => 'color',
            'active_callback' => 'fifteen_skin_custom',
        ) )
    );

    $wp_customize->add_setting('fifteen_skin_var_onaccent', array(
        'default'     => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'fifteen_skin_var_onaccent', array(
            'label' => __('Primary Onaccent','fifteen'),
            'section' => 'colors',
            'settings' => 'fifteen_skin_var_onaccent',
            'type' => 'color',
            'active_callback' => 'fifteen_skin_custom',
        ) )
    );

    $wp_customize->add_setting('fifteen_skin_var_content', array(
        'default'     => '#222',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'fifteen_skin_var_content', array(
            'label' => __('Content Color','fifteen'),
            'description' => __('Must be Dark, like Black or Dark grey. Any darker color is acceptable.','fifteen'),
            'section' => 'colors',
            'settings' => 'fifteen_skin_var_content',
            'active_callback' => 'fifteen_skin_custom',
            'type' => 'color'
        ) )
    );

    function fifteen_skin_custom( $control ) {
        $option = $control->manager->get_setting('fifteen_skin');
        return $option->value() == 'custom' ;
    }


}
add_action( 'customize_register', 'fifteen_customize_register_skins' );