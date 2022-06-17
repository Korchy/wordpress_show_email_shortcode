<?php
/*
Plugin Name:	Simple Spoiler Shortcode
Plugin URI:		
Version:		1.0.0
Author:			Nikita Akimov
Author URI:		https://progr.interplanety.org/
License:		GPL-3.0-or-later
Description:	Show hiden text by clicking on visible text
*/

//	not run directly
if(!defined('ABSPATH')) {
	exit;
}

function simple_spoiler_shortcode($atts) {
	// content to show on the shortcode place
	// array(2) { ["title"] => string(10) "Show Email" ["text"] => string(13) "mail@mail.org"}
	$content = '<span>';	// base containder to prevent external formatting
		$shortcode_id = 'simple_spoiler_' . rand();
		$text = strrev(base64_encode($atts['text']));	// encode text to base64 and reverse to hide from bots and web-spiders
		$content .= '<span id = "' . $shortcode_id . '">';	// container to wrap onClick function
			$content .= '<a href="#"';
			$content .= 'onclick = "javascript: 
				document.getElementById(\'' . $shortcode_id . '\').innerHTML = 
					decodeURIComponent(escape(atob(\'' . $text . '\'.split(\'\').reverse().join(\'\'))));
				return false;"';
			$content .= '>' . $atts['title'] . '</a>';
		$content .= '</span>';	// onClick container
	$content .= '</span>';	// base container
    return $content;
}

function simple_spoiler_shortcode_on_register() {
	// register new shortcode
	add_shortcode('simple_spoiler', 'simple_spoiler_shortcode');
}
add_action('init', 'simple_spoiler_shortcode_on_register');

?>
