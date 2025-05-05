<?php
//------------------------------------------------
// # SNIPPETS LIBRARY
// ------------------------------------------------


//------------------------------------------------
// # Check if frontend or backend
// ------------------------------------------------
function check_frontend_or_backend() {
	if ( is_admin() ) {
		// Wir befinden uns im Backend
		add_filter('body_class', function($classes) {
			$classes[] = 'backend';
			return $classes;
		});
	} else {
		// Wir befinden uns im Frontend
		add_filter('body_class', function($classes) {
			$classes[] = 'frontend';
			return $classes;
		});
	}
}

add_action('wp_body_open', 'check_frontend_or_backend');

//------------------------------------------------
// # Render genesis custom blocks in backend
// ------------------------------------------------
function custom_block_render_callback($content, $block) {
	if ($block['blockName'] === 'genesis-custom-blocks/slider' && !in_array("frontend", get_body_class())) {
		return '<div style="background-color: rgba(139,139,150,.1); padding: 10px"><strong>Slider für Beitragstypen</strong> <br> '.ucfirst(block_value('slider_type')).'</div>';
	}
	return $content;
}

add_filter('render_block', 'custom_block_render_callback', 10, 2);

//------------------------------------------------
// # GUTENBERG BLOCKS
// ------------------------------------------------
define('GB-BLOCKS_DIR', get_stylesheet_directory() . '/includes/gutenberg-blocks/blocks');
function enqueue_custom_gutenberg_blocks()
{
	$blocks_directory = get_stylesheet_directory() . '/includes/gutenberg-blocks/blocks';
	$block_files = scandir($blocks_directory);

	foreach ($block_files as $file) {
		if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
			include_once $blocks_directory . '/' . $file;
			do_action('custom_gutenberg_block_loaded');
		}
	}
}