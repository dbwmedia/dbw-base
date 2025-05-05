<?php
if (!defined('ABSPATH')) exit; // Sicherheitsprüfung

// Font Awesome lokal einbinden
function enqueue_local_font_awesome() {
    // Font Awesome CSS laden
    wp_enqueue_style(
        'font-awesome',
        get_stylesheet_directory_uri() . '/assets/fontawesome/css/all.min.css',
        array(),
        '6.7.1'
    );
}
add_action('wp_enqueue_scripts', 'enqueue_local_font_awesome');
