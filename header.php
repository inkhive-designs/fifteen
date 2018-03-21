<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package 
 */
 
get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	
	<?php get_template_part('modules/header/jumbosearch'); ?>
	<?php get_template_part('modules/header/top-bar'); ?>		
	<?php get_template_part('modules/header/masthead'); ?>	

	
	<?php do_action('fifteen-after-header'); ?>

	<div class="mega-container">

        <?php if( class_exists('rt_slider') ) {
            rt_slider::render('framework/featured-components/slider', 'nivo' );
        } ?>



        <?php get_template_part('framework/featured-components/post','celsius'); ?>
        <?php get_template_part('framework/featured-components/post','degree'); ?>


		<div id="content" class="site-content container">

            <header class="entry-header">