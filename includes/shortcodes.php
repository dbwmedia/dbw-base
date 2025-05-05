<?php

//------------------------------------------------
// # SHORTCODES FOR MENUES
// ------------------------------------------------
function print_menu_shortcode($atts, $content = null)
{
	extract(shortcode_atts(array('name' => null, 'class' => null), $atts));

	return wp_nav_menu(array('menu' => $name, 'menu_class' => $class, 'echo' => false));
}

add_shortcode('menu', 'print_menu_shortcode');


//------------------------------------------------
// # STICKY NAV
// ------------------------------------------------
function sticky_nav($atts, $content = null)
{
	extract(shortcode_atts(array('name' => null, 'class' => null), $atts));
	$output = "<div class='sticky-nav'> <div class='sticky-nav'>";
	return $output;
}

add_shortcode('stickyNav', 'sticky_nav');

//------------------------------------------------
// # Dynamic Hero Title
// todo: tbc
// ------------------------------------------------
function heroTitle()
{
	ob_start();

	$customTitle = get_field('hero_title', $post->ID);
	$pageTitle = get_the_title($post->ID);
	if ($customTitle) {
		return $customTitle;
	}
	else {
		return $pageTitle;
	}
}

add_shortcode('hero_title', 'heroTitle');