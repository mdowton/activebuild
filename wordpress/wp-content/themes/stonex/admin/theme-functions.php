<?php

/* These are functions specific to the included option settings and this theme */

/*-----------------------------------------------------------------------------------*/
/* Output CSS from standarized options */
/*-----------------------------------------------------------------------------------*/

function of_head_css() {

		$output = '';
		
		global $data;

		$custom_css = $data['custom_css'];
		
		if ($custom_css <> '') {
			$output .= $custom_css . "\n";
		}
		
		// Output styles
		if ($output <> '') {
			$output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
			echo $output;
		}
	
}
add_action('wp_head', 'of_head_css');
//Add custom styles css
function themename_enqueue_css() {
wp_register_style('custom_options', get_template_directory_uri() . '/styles/custom_options.css', 'style');
wp_enqueue_style( 'custom_options');
wp_register_style('responsive', get_template_directory_uri() . '/styles/responsive.css', 'style');
wp_enqueue_style( 'responsive');
}
add_action('wp_print_styles', 'themename_enqueue_css');
/*-----------------------------------------------------------------------------------*/
/* Add Body Classes for Layout
/*-----------------------------------------------------------------------------------*/

// This used to be done through an additional stylesheet call, but it seemed like
// a lot of extra files for something so simple. Adds a body class to indicate sidebar position.

function layout_css() {
		global $data;
// Layouts
	$layout = $data['layout'];
	if ($layout == '') {
		 	$layout = 'layout-2cr';
	}
wp_register_style('layout', OF_DIRECTORY. "/layouts/".$layout .".css" );
wp_enqueue_style('layout');
}
add_action('wp_print_styles', 'layout_css');

/*-----------------------------------------------------------------------------------*/
/* Add Favicon
/*-----------------------------------------------------------------------------------*/

function childtheme_favicon() {
		global $data;
		if ($data['custom_favicon'] != '') {
	        echo '<link rel="shortcut icon" href="'.  $data['custom_favicon']  .'"/>'."\n";
	    }
		else { ?>
			<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/admin/images/favicon.ico" />
<?php }
}

add_action('wp_head', 'childtheme_favicon');

/*-----------------------------------------------------------------------------------*/
/* Show analytics code in footer */
/*-----------------------------------------------------------------------------------*/

function childtheme_analytics(){
	global $data;
	$output = $data['google_analytics'];
	if ( $output <> "" ) 
		echo stripslashes($output) . "\n";
}
add_action('wp_footer','childtheme_analytics');

?>
