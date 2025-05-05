<?php
//------------------------------------------------
// # CUSTOM LOGIN STYLES
// ------------------------------------------------
function customStyle_login()
{
	$template_url = get_stylesheet_directory();
	wp_enqueue_style( 'login-styles', get_stylesheet_directory_uri() . '/build/index.css' );
}
add_action('login_enqueue_scripts', 'customStyle_login');

add_filter( 'login_headerurl', 'loginURL' );
function loginURL() {
	return home_url();
}