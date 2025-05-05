<?php

//------------------------------------------------
// # custom directory paths
// ------------------------------------------------
// Core Includes
require_once get_stylesheet_directory() . '/includes/shortcodes.php';
require_once get_stylesheet_directory() . '/includes/actions.php';
require_once get_stylesheet_directory() . '/includes/filter.php';
require_once get_stylesheet_directory() . '/includes/directories.php';

// dbw media  Specific Includes
require_once get_stylesheet_directory() . '/includes/dbw/dbw-login.php';
require_once get_stylesheet_directory() . '/includes/dbw/dbw-footer.php';
require_once get_stylesheet_directory() . '/includes/dbw/dbw-head.php';

// Font Awesome
require_once get_stylesheet_directory() . '/includes/fontawesome-enqueue.php';
 

//------------------------------------------------
// # returns meta and favicon
// ------------------------------------------------
function headers() {
    ob_start();
    echo '<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">';
    echo '<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">';
    echo '<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">';
    echo '<link rel="manifest" href="/site.webmanifest">';
    echo '<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#f2354e">';
    echo '<meta name="msapplication-TileColor" content="#333333">';
    echo '<meta name="theme-color" content="#ffffff">';
    $ret = ob_get_contents();
    ob_end_clean();
    return $ret;
}

//------------------------------------------------
// # include custom.js
// ------------------------------------------------
function customScriptJS() {
    wp_register_script('custom', get_stylesheet_directory_uri() . '/src/js/custom.js', array('jquery'), '1.0', true);
    wp_enqueue_script('custom');
}
add_action('wp_enqueue_scripts', 'customScriptJS');


//------------------------------------------------
// # CF7 
// ------------------------------------------------
function custom_math_captcha_validation($result, $tag) {
    $field_name = $tag->name;

    if ($field_name === 'math-captcha') { 
        $user_input = isset($_POST[$field_name]) ? sanitize_text_field($_POST[$field_name]) : '';
        
        // Debugging-Logik
        if ($user_input !== '7') { 
            $result->invalidate($tag, "Bitte geben Sie die richtige Antwort auf die Rechenaufgabe ein.");
        } else {
            error_log("Math-Captcha ist korrekt: " . $user_input);
        }
    }
    return $result;
}
add_filter('wpcf7_validate_text*', 'custom_math_captcha_validation', 20, 2);
