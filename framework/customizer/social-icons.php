<?php
function fifteen_customize_register_social( $wp_customize ) {
		// Social Icons
	$wp_customize->add_section('fifteen_social_section', array(
			'title' => __('Social Icons','fifteen'),
			'priority' => 44 ,
			'panel' => 'fifteen_header_panel'
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','fifteen'),
					'facebook' => __('Facebook','fifteen'),
					'twitter' => __('Twitter','fifteen'),
					'google-plus' => __('Google Plus','fifteen'),
					'instagram' => __('Instagram','fifteen'),
					'rss' => __('RSS Feeds','fifteen'),
					'vine' => __('Vine','fifteen'),
					'vimeo-square' => __('Vimeo','fifteen'),
					'youtube' => __('Youtube','fifteen'),
					'flickr' => __('Flickr','fifteen'),
				);
				
	$social_count = count($social_networks);
				
	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :
			
		$wp_customize->add_setting(
			'fifteen_social_'.$x, array(
				'sanitize_callback' => 'fifteen_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'fifteen_social_'.$x, array(
					'settings' => 'fifteen_social_'.$x,
					'label' => __('Icon ','fifteen').$x,
					'section' => 'fifteen_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'fifteen_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'fifteen_social_url'.$x, array(
					'settings' => 'fifteen_social_url'.$x,
					'description' => __('Icon ','fifteen').$x.__(' Url','fifteen'),
					'section' => 'fifteen_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function fifteen_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google-plus',
					'instagram',
					'rss',
					'vine',
					'vimeo-square',
					'youtube',
					'flickr'
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return 'fifteen';	
	}
}
add_action( 'customize_register', 'fifteen_customize_register_social' );