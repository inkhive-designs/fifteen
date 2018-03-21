<?php
function fifteen_customize_register_misc( $wp_customize ) {
    $wp_customize->add_section(
        'fifteen_sec_premsupport',
        array(
            'title'     => __('Fifteen - Important Links','fifteen'),
            'priority'  => 1,
        )
    );

    $wp_customize->add_setting(
        'fifteen_important_links',
        array( 'sanitize_callback' => 'fifteen_sanitize_text' )
    );

    $wp_customize->add_control(
        new Fifteen_WP_Customize_Upgrade_Control(
            $wp_customize,
            'fifteen_upgrade',
            array(
                'settings'		=> 'fifteen_important_links',
                'section'		=> 'fifteen_sec_premsupport',
                'description'	=> '<a class="fifteen-important-links" href="https://inkhive.com/product/fifteen-plus" target="_blank">'.__('Purchase Fifteen Plus', 'fifteen').'</a><br/>
                                    <a class="fifteen-important-links" href="#" target="_blank">'.__('InkHive Support Forum', 'fifteen').'</a><br/>
                                    <a class="fifteen-important-links" href="http://demo.inkhive.com/fifteen-plus/" target="_blank">'.__('Fifteen Live Demo', 'fifteen').'</a><br/>
                                    <a class="fifteen-important-links" href="#" target="_blank">'.__('Fifteen Documentation', 'fifteen').'</a><br/>
                                    <a class="fifteen-important-links" href="https://www.facebook.com/inkhive/" target="_blank">'.__('We Love Our Facebook Fans', 'fifteen').'</a><br/>
                                    <a class="fifteen-important-links" href="#" target="_blank">'.__('Want SEO?', 'fifteen').'</a><br/>
                                    <a class="fifteen-important-links" href="#" target="_blank">'.__('Review Us', 'fifteen').'</a>'

            )
        )
    );
}
add_action( 'customize_register', 'fifteen_customize_register_misc' );