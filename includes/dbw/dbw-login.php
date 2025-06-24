<?php
/**
 * Custom Login Security
 * Versteckt Standard WordPress Login und erstellt /zentrale URL
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class CustomLoginSecurity {
    
    private static $instance = null;
    
    /**
     * Singleton Pattern
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Constructor
     */
    private function __construct() {
        add_action('init', array($this, 'setup_custom_login'), 1);
        add_action('wp_loaded', array($this, 'flush_login_rules'));
        add_filter('login_url', array($this, 'custom_login_url'), 10, 3);
        add_filter('lostpassword_url', array($this, 'custom_lostpassword_url'), 10, 2);
        add_filter('register_url', array($this, 'custom_register_url'));
        add_action('wp_logout', array($this, 'custom_logout_redirect'));
        add_action('init', array($this, 'setup_email_filters'));
        add_filter('site_url', array($this, 'fix_password_reset_url'), 10, 4);
    }
    
    /**
     * Setup custom login functionality
     */
    public function setup_custom_login() {
        // Verhindere direkte Zugriffe auf wp-login.php
        global $pagenow;
        
        if ($pagenow === 'wp-login.php' && !is_user_logged_in()) {
            // Erlaubte Aktionen für wp-login.php
            $allowed_actions = array('logout', 'lostpassword', 'rp', 'resetpass', 'register', 'postpass', 'confirmaction');
            $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'login';
            
            // Spezielle Behandlung für Reset-Password-Key
            $has_reset_key = isset($_GET['key']) || isset($_GET['rp_key']);
            
            // Prüfe ob zentrale_access gesetzt ist
            $has_zentrale_access = isset($_GET['zentrale_access']) || isset($_POST['zentrale_access']);
            
            // Erlaube POST-Requests für bestimmte Aktionen
            $is_allowed_post = !empty($_POST) && in_array($action, array('lostpassword', 'resetpass', 'register'));
            
            // Blockiere unerlaubte Zugriffe
            if (!$has_zentrale_access && !in_array($action, $allowed_actions) && !$has_reset_key && !$is_allowed_post) {
                if ($action === 'login' && empty($_POST)) {
                    wp_safe_redirect(home_url('/404'));
                    exit;
                }
            }
        }
        
        // Erstelle /zentrale Rewrite Rule
        add_rewrite_rule('^zentrale/?$', 'wp-login.php?zentrale_access=1', 'top');
        
        // Blockiere wp-admin für nicht-eingeloggte User
        if (is_admin() && !is_user_logged_in() && !wp_doing_ajax() && !isset($_GET['action'])) {
            $allowed_admin_paths = array('admin-ajax.php', 'admin-post.php');
            $current_script = basename($_SERVER['SCRIPT_NAME']);
            
            if (!in_array($current_script, $allowed_admin_paths)) {
                wp_safe_redirect(home_url('/404'));
                exit;
            }
        }
    }
    
    /**
     * Flush rewrite rules einmalig nach Theme-Aktivierung
     */
    public function flush_login_rules() {
        if (get_option('custom_login_rules_flushed') !== '2') {
            flush_rewrite_rules();
            update_option('custom_login_rules_flushed', '2');
        }
    }
    
    /**
     * Ändere Login-URL zu /zentrale
     */
    public function custom_login_url($login_url, $redirect, $force_reauth) {
        $custom_url = home_url('/zentrale/');
        
        if (!empty($redirect)) {
            $custom_url = add_query_arg('redirect_to', urlencode($redirect), $custom_url);
        }
        
        if ($force_reauth) {
            $custom_url = add_query_arg('reauth', '1', $custom_url);
        }
        
        return $custom_url;
    }
    
    /**
     * Ändere Passwort-Vergessen-URL
     */
    public function custom_lostpassword_url($lostpassword_url, $redirect) {
        $custom_url = add_query_arg(array(
            'action' => 'lostpassword',
            'zentrale_access' => '1'
        ), site_url('wp-login.php'));
        
        if (!empty($redirect)) {
            $custom_url = add_query_arg('redirect_to', urlencode($redirect), $custom_url);
        }
        
        return $custom_url;
    }
    
    /**
     * Ändere Registrierungs-URL
     */
    public function custom_register_url($register_url) {
        return add_query_arg(array(
            'action' => 'register',
            'zentrale_access' => '1'
        ), site_url('wp-login.php'));
    }
    
    /**
     * Logout Redirect zu /zentrale
     */
    public function custom_logout_redirect() {
        wp_safe_redirect(home_url('/zentrale/?loggedout=true'));
        exit;
    }
    
    /**
     * Modifiziere die Reset-Password-URL in der E-Mail
     */
    public function custom_password_reset_url($url, $user, $key) {
        $reset_url = add_query_arg(array(
            'action' => 'rp',
            'key' => $key,
            'login' => rawurlencode($user->user_login),
            'zentrale_access' => '1'
        ), site_url('wp-login.php'));
        
        return $reset_url;
    }
    
    /**
     * Filter für die Password-Reset-E-Mail
     */
    public function setup_email_filters() {
        add_filter('retrieve_password_message', array($this, 'modify_password_reset_email'), 10, 4);
        add_filter('retrieve_password_title', array($this, 'custom_password_reset_title'), 10, 3);
    }
    
    /**
     * Modifiziere die Password-Reset-E-Mail
     */
    public function modify_password_reset_email($message, $key, $user_login, $user_data) {
        // Ersetze alle möglichen URL-Varianten
        $patterns = array(
            '/wp-login\.php\?action=rp&key=[^&]+&login=[^\s]+/',
            '/wp-login\.php\?action=rp&amp;key=[^&]+&amp;login=[^\s]+/',
            network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login')
        );
        
        $new_url = $this->custom_password_reset_url('', $user_data, $key);
        
        foreach ($patterns as $pattern) {
            if (is_string($pattern) && strpos($message, $pattern) !== false) {
                $message = str_replace($pattern, $new_url, $message);
            } else {
                $message = preg_replace($pattern, $new_url, $message);
            }
        }
        
        return $message;
    }
    
    /**
     * Custom Password Reset E-Mail Titel
     */
    public function custom_password_reset_title($title, $user_login, $user_data) {
        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
        return sprintf('[%s] Passwort zurücksetzen', $blogname);
    }
    
    /**
     * Fix Password Reset URLs in allen Kontexten
     */
    public function fix_password_reset_url($url, $path, $scheme, $blog_id) {
        if (strpos($url, 'wp-login.php?action=rp') !== false && strpos($url, 'zentrale_access') === false) {
            $url = add_query_arg('zentrale_access', '1', $url);
        }
        return $url;
    }
    
    /**
     * Reset Rules bei Theme-Switch
     */
    public static function reset_login_rules() {
        delete_option('custom_login_rules_flushed');
        flush_rewrite_rules();
    }
}

// Initialisiere die Klasse mit Singleton Pattern
CustomLoginSecurity::get_instance();

// Hook für Theme-Aktivierung und Deaktivierung
add_action('after_switch_theme', array('CustomLoginSecurity', 'reset_login_rules'));
add_action('switch_theme', array('CustomLoginSecurity', 'reset_login_rules'));