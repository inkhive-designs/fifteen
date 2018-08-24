<?php
/**
 * fifteen Theme Customizer
 *
 * @package fifteen
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fifteen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    $wp_customize->remove_control('rtslider_enable_posts');
    $wp_customize->remove_control('rtslider_enable_front');
    $wp_customize->remove_control('rtslider_enable_pages');

}
add_action( 'customize_register', 'fifteen_customize_register' );

//Load All Individual Settings Based on Sections/Panels.
require_once get_template_directory().'/framework/customizer/_customizer_controls.php';
require_once get_template_directory().'/framework/customizer/_googlefonts.php';
require_once get_template_directory().'/framework/customizer/post_celsius.php';
require_once get_template_directory().'/framework/customizer/post_degree.php';
require_once get_template_directory().'/framework/customizer/_layouts.php';
require_once get_template_directory().'/framework/customizer/_sanitization.php';
require_once get_template_directory().'/framework/customizer/header.php';
require_once get_template_directory().'/framework/customizer/mail_phone.php';
require_once get_template_directory().'/framework/customizer/skins.php';
require_once get_template_directory().'/framework/customizer/social-icons.php';
require_once get_template_directory().'/framework/customizer/misc-scripts.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fifteen_customize_preview_js() {
		wp_enqueue_script( 'fifteen_customizer-js', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'fifteen_customize_preview_js' );



function fifteen_customize_control_js() {
		wp_enqueue_script( 'fifteen_customize_control', get_template_directory_uri() . '/assets/js/customize-control.js', array(), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'fifteen_customize_control_js' );