<?php

define('SEARCHANDFILTER_DIR', get_stylesheet_directory() . '/includes/search-filter');
define('GENESIS-BLOCKS_DIR', get_stylesheet_directory() . '/includes/genesis-custom-blocks/'); // todo: tbd

//------------------------------------------------
// # WEBPACK SCRIPTS
// Register Webpack compiled JS with theme
//------------------------------------------------
function enqueue_webpack_scripts(): void {
    wp_enqueue_script(
        'child-theme-scripts',
        get_stylesheet_directory_uri() . '/build/index.js',
        array(), // Falls keine Abhängigkeiten benötigt werden
        "1.0",
        true // Lädt das Skript im Footer für bessere Performance
    );
}
add_action('wp_enqueue_scripts', 'enqueue_webpack_scripts');
