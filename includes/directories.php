<?php
// Pfaddefinitionen
define('SEARCHANDFILTER_DIR', get_stylesheet_directory() . '/includes/search-filter');
define('GENESIS-BLOCKS_DIR', get_stylesheet_directory() . '/includes/genesis-custom-blocks/');

/**
 * Robuste Einbindung von Webpack-kompilierten Scripts
 * mit Optimierungen für Safari und Instagram Browser
 */
function enqueue_webpack_scripts(): void {
    // Basis-Skript-URL
    $script_url = get_stylesheet_directory_uri() . '/build/index.js';
    
    // Version für Cache-Kontrolle
    $version = (defined('WP_DEBUG') && WP_DEBUG) ? time() : '1.0.1';
    
    // Hauptscript einbinden mit jQuery als Abhängigkeit
    wp_enqueue_script(
        'child-theme-scripts',
        $script_url,
        array('jquery'),
        $version,
        true // Im Footer laden für bessere Performance
    );
    
    // Script-Tag modifizieren - defer statt async verwenden für bessere Kompatibilität
    add_filter('script_loader_tag', function($tag, $handle, $src) {
        if ('child-theme-scripts' === $handle) {
            // Entferne async falls vorhanden und füge defer hinzu
            $tag = str_replace(' async', '', $tag);
            return str_replace(' src', ' defer src', $tag);
        }
        return $tag;
    }, 10, 3);
}
add_action('wp_enqueue_scripts', 'enqueue_webpack_scripts');

/**
 * Zusätzliche Header für bessere Browser-Kompatibilität
 */
function add_compatibility_headers() {
    // Content-Security-Policy anpassen
    header("Content-Security-Policy: upgrade-insecure-requests;");
}
add_action('send_headers', 'add_compatibility_headers');