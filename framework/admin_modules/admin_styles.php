<?php
/**
 * Enqueue Scripts for Admin
 */
function fifteen_custom_wp_admin_style() {
        wp_enqueue_style( 'fifteen-admin_css', get_template_directory_uri() . '/assets/css/admin.css', array(), false, 'all' );
}
add_action( 'customize_controls_print_styles', 'fifteen_custom_wp_admin_style' );