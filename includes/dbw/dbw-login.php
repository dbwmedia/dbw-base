<?php
// WordPress-Login-Logo anpassen
function custom_login_logo() {
    echo '<style type="text/css">
        h1 a {
            background-image: url(' . get_stylesheet_directory_uri() . '/assets/img/dbwmedialogoweiß.png) !important;
            background-size: cover !important;
            width: 168px !important;
            height: 168px !important;
        }
        body.light-mode h1 a {
            background-image: url(' . get_stylesheet_directory_uri() . '/assets/img/dbwmedialogo.png) !important;
        }
    </style>';
}

add_action('login_head', 'custom_login_logo');

// Logo-Link beim Login anpassen
function custom_login_logo_url() {
    return home_url();
}

add_filter('login_headerurl', 'custom_login_logo_url');

// Logo-Link-Titel beim Login ändern
function custom_login_logo_url_title() {
    return get_bloginfo('name');
}

add_filter('login_headertext', 'custom_login_logo_url_title');

// Dunkelmodus für die Login-Seite
function custom_dark_mode_login_page() {
    echo '<style type="text/css">
         body.dark-mode {
            background-color: #121212;
            color: #e0e0e0;
        }

        body.dark-mode a {
            color: #e0e0e0;
        }

        body.dark-mode a:hover {
            color: #3f51b5;
        }

        body.dark-mode #login h1 a {
            background-color: transparent;
            color: #e0e0e0;
            text-decoration: none;
        }

        body.dark-mode .message, body.dark-mode #login_error {
            border-left: 4px solid #f44336;
            background-color: #212121;
            color: #e0e0e0;
        }

        body.dark-mode .button-primary {
            background-color: #3f51b5;
            border-color: #303f9f;
            color: #e0e0e0;
        }

        body.dark-mode .button-primary:hover {
            background-color: #303f9f;
        }

        body.dark-mode label {
            color: #e0e0e0;
        }

        body.dark-mode input[type="text"], body.dark-mode input[type="password"], body.dark-mode input[type="checkbox"] {
            background-color: #212121;
            border-color: #424242;
            color: #e0e0e0;
        }

        body.dark-mode input[type="text"]:focus, body.dark-mode input[type="password"]:focus {
            border-color: #3f51b5;
            box-shadow: none;
        }

        body.dark-mode .forgetmenot label {
            color: #e0e0e0;
        }

        body.dark-mode #nav a, body.dark-mode #backtoblog a {
            color: #e0e0e0;
        }

        body.dark-mode #nav a:hover, body.dark-mode #backtoblog a:hover {
            color: #3f51b5;
        }

        body.dark-mode .dashicons-visibility {
            color: #e0e0e0;
        }

        body.dark-mode #loginform {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        body.dark-mode ::placeholder {
            color: #bdbdbd;
        }

        body.dark-mode .button-secondary {
            background-color: #333;
            color: #e0e0e0;
            border: none;
        }

        body.dark-mode .button-secondary:hover {
            background-color: #444;
            color: #fff;
        }

        body.dark-mode .dashicons-visibility {
            color: #e0e0e0;
        }

        :root {
            --primary-color: #302AE6;
            --font-color: #e0e0e0;
            --bg-color: #121212;
            --heading-color: #292922;
        }

        body.light-mode {
            --font-color: #424242;
            --bg-color: #fff;
        }

        .theme-switch-wrapper {
            display: flex;
            align-items: center;
        }
        .theme-switch {
            display: inline-block;
            height: 34px;
            position: relative;
            width: 60px;
        }

        .theme-switch input {
            display:none;
        }

        .slider {
            background-color: #ccc;
            bottom: 0;
            cursor: pointer;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            transition: .4s;
        }

        .slider:before {
            background-color: #fff;
            bottom: 4px;
            content: "";
            height: 26px;
            left: 4px;
            position: absolute;
            transition: .4s;
            width: 26px;
        }

        input:checked + .slider {
            background-color: #66bb6a;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .theme-switch-wrapper {
            position: absolute;
            top: 10px;   
            left: 10px;  
            z-index: 10; 
        }

        .theme-switch + em {
            margin-left: 10px; 
        }
    </style>';
}

add_action('login_head', 'custom_dark_mode_login_page');

// Umschalter für Dunkel-/Hellmodus hinzufügen
function add_dark_light_mode_switcher() {
      echo '<nav>
            <div class="theme-switch-wrapper">
                <label class="theme-switch" for="checkbox">
                    <input type="checkbox" id="checkbox" checked /> 
                    <div class="slider round"></div>
                </label>
                <em>Enable Light Mode</em> 
            </div>
          </nav>';

    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                const themeSwitch = document.querySelector("#checkbox");
                const body = document.body;
                const modeLabel = document.querySelector(".theme-switch-wrapper em");

                // Initialisiere die Seite mit aktiviertem Dark Mode
                body.classList.add("dark-mode");

                themeSwitch.addEventListener("change", function(event) {
                    if (themeSwitch.checked) {
                        body.classList.add("dark-mode");
                        body.classList.remove("light-mode");
                        modeLabel.textContent = "Enable Light Mode";
                    } else {
                        body.classList.remove("dark-mode");
                        body.classList.add("light-mode");
                        modeLabel.textContent = "Enable Dark Mode";
                    }
                });
            });
        </script>';
}

add_action('login_footer', 'add_dark_light_mode_switcher');
