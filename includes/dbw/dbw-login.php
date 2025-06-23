<?php
/**
 * Custom Login Security
 * Versteckt Standard WordPress Login und erstellt /zentrale URL
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class CustomLoginSecurity {
    
    public function __construct() {
        add_action('init', array($this, 'setup_custom_login'));
        add_action('wp_loaded', array($this, 'flush_login_rules'));
        add_filter('login_url', array($this, 'custom_login_url'), 10, 3);
        add_action('wp_logout', array($this, 'custom_logout_redirect'));
    }
    
    /**
     * Setup custom login functionality
     */
    public function setup_custom_login() {
        // Verstecke Standard wp-login.php
        global $pagenow;
        if ($pagenow == 'wp-login.php' && !isset($_GET['zentrale_access'])) {
            wp_redirect(home_url('/404'));
            exit;
        }
        
        // Erstelle /zentrale Rewrite Rule
        add_rewrite_rule('^zentrale/?$', 'wp-login.php?zentrale_access=1', 'top');
        
        // Blockiere wp-admin für nicht-eingeloggte User
        if (is_admin() && !is_user_logged_in() && !wp_doing_ajax()) {
            wp_redirect(home_url('/404'));
            exit;
        }
    }
    
    /**
     * Flush rewrite rules einmalig nach Theme-Aktivierung
     */
    public function flush_login_rules() {
        if (get_option('custom_login_rules_flushed') != '1') {
            $this->setup_custom_login();
            flush_rewrite_rules();
            update_option('custom_login_rules_flushed', '1');
        }
    }
    
    /**
     * Ändere Login-URL zu /zentrale
     */
    public function custom_login_url($login_url, $redirect, $force_reauth) {
        $custom_url = home_url('/zentrale/');
        
        if ($redirect) {
            $custom_url = add_query_arg('redirect_to', urlencode($redirect), $custom_url);
        }
        
        if ($force_reauth) {
            $custom_url = add_query_arg('reauth', '1', $custom_url);
        }
        
        return $custom_url;
    }
    
    /**
     * Logout Redirect zu /zentrale
     */
    public function custom_logout_redirect() {
        wp_redirect(home_url('/zentrale/?loggedout=true'));
        exit;
    }
    
    /**
     * Reset Rules bei Theme-Switch
     */
    public static function reset_login_rules() {
        delete_option('custom_login_rules_flushed');
    }
}

// Initialisiere die Klasse
new CustomLoginSecurity();

// Hook für Theme-Aktivierung
add_action('after_switch_theme', array('CustomLoginSecurity', 'reset_login_rules'));