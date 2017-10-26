<?php
/*
*
* Dynamically Design the theme using Less Compiler for PHP
* Compiler Runs only when Customizer is Loaded, not for users. So no effect on site performance.
*
*/	

//Compatibility with plugins using the Less Compile
if (!class_exists('lessc')) : 
require get_template_directory() ."/framework/designer/lessc.inc.php";
endif; 

function fifteen_exec_less() {
	$less = new lessc;
	$inputFile = get_template_directory() ."/assets/theme-styles/skins/custom.less";
	$outputFile = get_template_directory() ."/assets/theme-styles/css/custom.css";

	$less->setVariables(array(
		"accent" => get_theme_mod('fifteen_skin_var_accent','darkgreen'),
		"background" => get_theme_mod('fifteen_skin_var_background','#9c9c9c'),
		"onaccent" => get_theme_mod('fifteen_skin_var_onaccent','#FFFFFF'),
		"content" => get_theme_mod('fifteen_skin_var_content','#222'),
	));
	
	
	if ( is_customize_preview() )  {
		try {
			$less->compileFile( $inputFile, $outputFile ); 
		} catch(exception $e) {
			echo "fatal error: " . $e->getMessage();
		}
		
	} 
	else {
		$less->checkedCompile( $inputFile, $outputFile );
	}

}	
add_action('wp_head','fifteen_exec_less', 1);