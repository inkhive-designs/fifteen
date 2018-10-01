<?php

function fifteen_customize_register_misc( $wp_customize ) {
    //Upgrade to Pro
    $wp_customize->add_section(
        'fifteen_sec_pro',
        array(
            'title'     => __('Important Links','fifteen'),
            'priority'  => 0,
        )
    );

    $wp_customize->add_setting(
        'fifteen_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new Fifteen_WP_Customize_Upgrade_Control(
            $wp_customize,
            'fifteen_pro',
            array(
                'description'	=> '<a class="fifteen-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'fifteen').'</a>
                                    <a class="fifteen-important-links" href="http://demo.inkhive.com/fifteen-plus/" target="_blank">'.__('Fifteen Plus Live Demo', 'fifteen').'</a>
                                    <a class="fifteen-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'fifteen').'</a>
                                    <a class="fifteen-important-links" href="https://wordpress.org/support/theme/fifteen/reviews" target="_blank">'.__('Review Fifteen on WordPress', 'fifteen').'</a>
                                    <a class="fifteen-important-links" href="https://inkhive.com/documentation/fifteen" target="_blank">'.__('Fifteen Documentation', 'fifteen').'</a>',
                'section' => 'fifteen_sec_pro',
                'settings' => 'fifteen_pro',
            )
        )
    );
}
add_action('customize_register', 'fifteen_customize_register_misc');