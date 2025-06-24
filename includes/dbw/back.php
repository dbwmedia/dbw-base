<?php
// WordPress-Login-Logo anpassen
function custom_login_logo() {
    echo '<style type="text/css">
        h1 a {
            background-image: url("https://dbw-media.de/wp-content/uploads/dbwmedialogo/dbwmedia_logo_white_cropped.png") !important;
            background-size: contain !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            width: 200px !important;
            height: 80px !important;
            margin-bottom: 25px !important;
        }
        body.light-mode h1 a {
            background-image: url("https://dbw-media.de/wp-content/uploads/dbwmedialogo/dbwmedia_logo_black_cropped.png") !important;
        }
    </style>';
}

add_action('login_head', 'custom_login_logo');

// Logo-Link beim Login anpassen
function custom_login_logo_url() {
    return 'https://dbw-media.de';
}

add_filter('login_headerurl', 'custom_login_logo_url');

// Logo-Link-Titel beim Login ändern
function custom_login_logo_url_title() {
    return 'DBW Media - Ihre Digitalagentur';
}

add_filter('login_headertext', 'custom_login_logo_url_title');

// Erweiterte Styles für alle Login-Szenarien
function custom_dark_mode_login_page() {
    echo '<style type="text/css">
        /* Basis-Variablen */
        :root {
            --primary-color: #6366f1;
            --primary-hover: #4f46e5;
            --success-color: #10b981;
            --error-color: #ef4444;
            --warning-color: #f59e0b;
            --font-color: #f5f5f7;
            --bg-color: #000000;
            --bg-secondary: #1d1d1f;
            --card-bg: #1d1d1f;
            --input-bg: #2c2c2e;
            --border-color: #38383a;
            --text-muted: #a1a1a6;
            --glass-bg: rgba(29, 29, 31, 0.8);
        }

        body.light-mode {
            --font-color: #1d1d1f;
            --bg-color: #f5f5f7;
            --bg-secondary: #ffffff;
            --card-bg: #ffffff;
            --input-bg: #ffffff;
            --border-color: #d2d2d7;
            --text-muted: #86868b;
            --glass-bg: rgba(255, 255, 255, 0.8);
        }

        /* Grundlegende Body-Styles */
        body {
            background: radial-gradient(ellipse at center, var(--bg-secondary) 0%, var(--bg-color) 70%) !important;
            color: var(--font-color) !important;
            font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important;
            min-height: 100vh !important;
            -webkit-font-smoothing: antialiased !important;
            -moz-osx-font-smoothing: grayscale !important;
        }

        body.light-mode {
            background: radial-gradient(ellipse at center, #ffffff 0%, var(--bg-color) 70%) !important;
        }

        /* Login-Container */
        #login {
            padding: 8% 0 0 !important;
            margin: auto !important;
            max-width: 400px !important;
        }

        #loginform, #lostpasswordform, #registerform {
            background: var(--glass-bg) !important;
            border: 1px solid var(--border-color) !important;
            border-radius: 16px !important;
            box-shadow: 0 32px 64px -12px rgba(0, 0, 0, 0.4) !important;
            padding: 32px !important;
            margin-top: 20px !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
        }

        body.light-mode #loginform,
        body.light-mode #lostpasswordform,
        body.light-mode #registerform {
            box-shadow: 0 32px 64px -12px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(0, 0, 0, 0.04) !important;
        }

        /* Eingabefelder */
        input[type="text"], input[type="password"], input[type="email"] {
            background-color: var(--input-bg) !important;
            border: 2px solid var(--border-color) !important;
            border-radius: 8px !important;
            color: var(--font-color) !important;
            font-size: 16px !important;
            padding: 12px 16px !important;
            width: 100% !important;
            box-sizing: border-box !important;
            transition: all 0.3s ease !important;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            border-color: var(--primary-color) !important;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1) !important;
            outline: none !important;
        }

        /* Labels */
        label {
            color: var(--font-color) !important;
            font-weight: 500 !important;
            margin-bottom: 8px !important;
            display: block !important;
        }

        /* Buttons */
        .button-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-hover)) !important;
            border: none !important;
            border-radius: 8px !important;
            color: white !important;
            font-size: 16px !important;
            font-weight: 600 !important;
            padding: 12px 24px !important;
            transition: all 0.3s ease !important;
            cursor: pointer !important;
            width: 100% !important;
        }

        .button-primary:hover {
            transform: translateY(-1px) !important;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3) !important;
        }

        .button-secondary {
            background-color: transparent !important;
            border: 2px solid var(--border-color) !important;
            border-radius: 8px !important;
            color: var(--font-color) !important;
            padding: 10px 20px !important;
            transition: all 0.3s ease !important;
        }

        .button-secondary:hover {
            border-color: var(--primary-color) !important;
            background-color: var(--primary-color) !important;
            color: white !important;
        }

        /* Nachrichten und Fehler */
        .message, #login_error, .login .message {
            border-radius: 8px !important;
            padding: 16px !important;
            margin: 16px 0 !important;
            border-left: 4px solid var(--error-color) !important;
            background-color: rgba(239, 68, 68, 0.1) !important;
            color: var(--font-color) !important;
        }

        .message {
            border-left-color: var(--success-color) !important;
            background-color: rgba(16, 185, 129, 0.1) !important;
        }

        /* Links */
        a {
            color: var(--primary-color) !important;
            text-decoration: none !important;
            transition: color 0.3s ease !important;
        }

        a:hover {
            color: var(--primary-hover) !important;
            text-decoration: underline !important;
        }

        #nav, #backtoblog {
            text-align: center !important;
            margin-top: 24px !important;
        }

        #nav a, #backtoblog a {
            color: var(--text-muted) !important;
            font-size: 14px !important;
        }

        /* Checkbox Styling */
        input[type="checkbox"] {
            accent-color: var(--primary-color) !important;
            transform: scale(1.2) !important;
        }

        .forgetmenot {
            margin: 16px 0 !important;
        }

        .forgetmenot label {
            display: flex !important;
            align-items: center !important;
            gap: 8px !important;
            font-size: 14px !important;
            color: var(--text-muted) !important;
        }

        /* Theme Switch */
        .theme-switch-wrapper {
            position: fixed !important;
            top: 20px !important;
            right: 20px !important;
            z-index: 1000 !important;
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            background: var(--glass-bg) !important;
            padding: 12px 16px !important;
            border-radius: 50px !important;
            border: 1px solid var(--border-color) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
        }

        .theme-switch {
            position: relative !important;
            width: 50px !important;
            height: 26px !important;
            margin-bottom: 0px !important;

        }

        .theme-switch input {
            opacity: 0 !important;
            width: 0 !important;
            height: 0 !important;
        }

        .login .button.wp-hide-pw{
            min-height: 49px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login .button.wp-hide-pw .dashicons {
            top: auto;
        }

        .slider {
            position: absolute !important;
            cursor: pointer !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            background-color: var(--border-color) !important;
            transition: 0.4s !important;
            border-radius: 26px !important;
        }

        .slider:before {
            position: absolute !important;
            content: "" !important;
            height: 20px !important;
            width: 20px !important;
            left: 3px !important;
            bottom: 3px !important;
            background-color: white !important;
            transition: 0.4s !important;
            border-radius: 50% !important;
        }

        input:checked + .slider {
            background-color: var(--primary-color) !important;
        }

        input:checked + .slider:before {
            transform: translateX(24px) !important;
        }

        .mode-label {
            font-size: 14px !important;
            color: var(--font-color) !important;
            font-weight: 500 !important;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            #login {
                padding: 5% 20px 0 !important;
            }
            
            #loginform, #lostpasswordform, #registerform {
                padding: 20px !important;
            }
            
            .theme-switch-wrapper {
                top: 10px !important;
                right: 10px !important;
                padding: 8px 12px !important;
            }
        }

        /* Password visibility toggle */
        .dashicons-visibility, .dashicons-hidden {
            color: var(--text-muted) !important;
            cursor: pointer !important;
            transition: color 0.3s ease !important;
        }

        .dashicons-visibility:hover, .dashicons-hidden:hover {
            color: var(--primary-color) !important;
        }

        /* Loading states */
        .button-primary:disabled {
            opacity: 0.6 !important;
            cursor: not-allowed !important;
            transform: none !important;
        }

        /* Placeholder styling */
        ::placeholder {
            color: var(--text-muted) !important;
            opacity: 1 !important;
        }

        /* Footer branding */
        .login-footer {
            text-align: center !important;
            margin-top: 40px !important;
            padding: 20px !important;
        }

        .login-footer p {
            color: var(--text-muted) !important;
            font-size: 12px !important;
            margin: 0 !important;
        }

        .login-footer a {
            color: var(--primary-color) !important;
            font-weight: 500 !important;
        }
    </style>';
}

add_action('login_head', 'custom_dark_mode_login_page');

// Erweiterte Theme-Switch Funktionalität
function add_dark_light_mode_switcher() {
    echo '<div class="theme-switch-wrapper">
            <span class="mode-label">🌙</span>
            <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox" />
                <div class="slider"></div>
            </label>
            <span class="mode-label">☀️</span>
          </div>';

    echo '<div class="login-footer">
            <p>Crafted with ❤️ by <a href="https://dbw-media.de" target="_blank">dbw media</a></p>
          </div>';

    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                const themeSwitch = document.querySelector("#checkbox");
                const body = document.body;
                
                // Prüfe gespeicherte Präferenz oder verwende Dark Mode als Standard
                const savedTheme = localStorage.getItem("dbw-login-theme");
                const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
                
                if (savedTheme === "light" || (!savedTheme && !prefersDark)) {
                    body.classList.add("light-mode");
                    themeSwitch.checked = true;
                } else {
                    body.classList.add("dark-mode");
                    themeSwitch.checked = false;
                }

                themeSwitch.addEventListener("change", function() {
                    if (themeSwitch.checked) {
                        body.classList.remove("dark-mode");
                        body.classList.add("light-mode");
                        localStorage.setItem("dbw-login-theme", "light");
                    } else {
                        body.classList.remove("light-mode");
                        body.classList.add("dark-mode");
                        localStorage.setItem("dbw-login-theme", "dark");
                    }
                });

                // Smooth transitions after page load
                setTimeout(() => {
                    document.body.style.transition = "all 0.3s ease";
                }, 100);

                // Enhanced form validation feedback
                const inputs = document.querySelectorAll("input[type=text], input[type=password], input[type=email]");
                inputs.forEach(input => {
                    input.addEventListener("blur", function() {
                        if (this.value.trim() === "") {
                            this.style.borderColor = "var(--error-color)";
                        } else {
                            this.style.borderColor = "var(--success-color)";
                        }
                    });
                    
                    input.addEventListener("focus", function() {
                        this.style.borderColor = "var(--primary-color)";
                    });
                });
            });
        </script>';
}

add_action('login_footer', 'add_dark_light_mode_switcher');

// Entferne WordPress-Generator und andere Meta-Infos auf Login-Seite
function remove_login_wp_generator() {
    remove_action('login_head', 'wp_generator');
}
add_action('login_head', 'remove_login_wp_generator');

// Erweiterte Sicherheits-Headers für Login-Seite
function add_login_security_headers() {
    if (strpos($_SERVER['REQUEST_URI'], 'wp-login.php') !== false) {
        header('X-Frame-Options: DENY');
        header('X-Content-Type-Options: nosniff');
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }
}
add_action('init', 'add_login_security_headers');

// Benutzerdefinierte Login-Fehlerbehandlung
function custom_login_errors($error) {
    if (strpos($error, 'incorrect') !== false) {
        $error = '<strong>Anmeldung fehlgeschlagen:</strong> Die eingegebenen Anmeldedaten sind nicht korrekt.';
    }
    return $error;
}
add_filter('login_errors', 'custom_login_errors');

// Entferne "Powered by WordPress" aus dem Login
function remove_login_wordpress_branding() {
    echo '<style>
        .privacy-policy-page-link { display: none !important; }
        .privacy-policy-tutorial { display: none !important; }
    </style>';
}
add_action('login_head', 'remove_login_wordpress_branding');