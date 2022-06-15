<?php
/*
Plugin Name:	Show Email Shortcode
Plugin URI:		
Version:		1.0.0
Author:			Nikita Akimov
Author URI:		https://progr.interplanety.org/
License:		GPL-3.0-or-later
Description:	Show specified Email by clicking on text
*/

//	not run directly
if(!defined('ABSPATH')) {
	exit;
}

function show_email_shortcode($atts) {
	// content to show on the shortcode place
	// array(2) { ["text"] => string(10) "Show Email" ["email"] => string(13) "mail@mail.org"}
	$content = '<span>';	// base containder to prevent external formatting
		$shortcode_id = 'show_email_' . rand();
		$email = preg_split('#[.@]#', $atts['email']);	// split email on 3 parts
		$content .= '<span id = "' . $shortcode_id . '">';	// container to wrap onClick function
			$content .= '<a href="#"';
			$content .= 'onclick = "javascript: 
				document.getElementById(\'' . $shortcode_id . '\').innerHTML = 
					\'' . $email[0] . '\' + \'@\' + \'' . $email[1] . '\' + \'.\' + \'' . $email[2] . '\'; 
				return false;"';
			$content .= '>' . $atts['text'] . '</a>';
		$content .= '</span>';	// onClick container
	$content .= '</span>';	// base container
    return $content;
}

function show_email_shortcode_on_register() {
	// register new shortcode
	add_shortcode('show_email', 'show_email_shortcode');
}
add_action('init', 'show_email_shortcode_on_register');

?>
