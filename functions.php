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
require_once get_stylesheet_directory() . '/includes/dbw/dbw-login-style.php';
require_once get_stylesheet_directory() . '/includes/dbw/dbw-footer.php';
require_once get_stylesheet_directory() . '/includes/dbw/dbw-head.php';

// Font Awesome
require_once get_stylesheet_directory() . '/includes/fontawesome-enqueue.php';
 
// SVG Support
require_once get_stylesheet_directory() . '/includes/svg-support.php';

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




