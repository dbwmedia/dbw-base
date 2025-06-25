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
            --gradient-start: #6366f1;
            --gradient-end: #a855f7;
        }
        
        body.light-mode {
            --font-color: #1d1d1f;
            --bg-color: #f5f5f7;
            --bg-secondary: #ffffff;
            --card-bg: #ffffff;
            --input-bg: #ffffff;
            --border-color: #d2d2d7;
            --text-muted: #86868b;
            --glass-bg: rgba(255, 255, 255, 0.85);
        }
        
        /* Animierter Hintergrund */
        @keyframes gradient-shift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        /* Einheitliches Layout für alle Bildschirmgrößen */
        body {
            background: linear-gradient(-45deg, #000000, #1d1d1f, #2c2c2e, #1d1d1f) !important;
            background-size: 400% 400% !important;
            animation: gradient-shift 15s ease infinite !important;
            color: var(--font-color) !important;
            font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important;
            min-height: 70vh !important;
            -webkit-font-smoothing: antialiased !important;
            -moz-osx-font-smoothing: grayscale !important;
            position: relative !important;
            overflow-x: hidden !important;
            padding: 20px !important;
        }
        
        body.light-mode {
            background: linear-gradient(-45deg, #f5f5f7, #ffffff, #e5e5e7, #ffffff) !important;
            background-size: 400% 400% !important;
            animation: gradient-shift 15s ease infinite !important;
        }
        
        /* Floating Elements für Premium-Look */
        body::before {
            content: "" !important;
            position: fixed !important;
            width: 400px !important;
            height: 400px !important;
            left: -200px !important;
            top: -200px !important;
            background: radial-gradient(circle, var(--gradient-start) 0%, transparent 70%) !important;
            filter: blur(100px) !important;
            opacity: 0.3 !important;
            animation: float 8s ease-in-out infinite !important;
            z-index: 1 !important;
        }
        
        body::after {
            content: "" !important;
            position: fixed !important;
            width: 600px !important;
            height: 600px !important;
            right: -300px !important;
            bottom: -300px !important;
            background: radial-gradient(circle, var(--gradient-end) 0%, transparent 70%) !important;
            filter: blur(120px) !important;
            opacity: 0.2 !important;
            animation: float 10s ease-in-out infinite !important;
            z-index: 1 !important;
        }
        
        #login {
            margin: auto !important;
            max-width: 450px !important;
            width: 100% !important;
            position: relative !important;
            z-index: 10 !important;
            padding: 0 !important;
        }
        
        /* Desktop spezifische Anpassungen */
        @media (min-width: 1024px) {
            body {
                padding: 40px !important;
            }
            
            #login {
                max-width: 500px !important;
            }
        }
        
        /* Mobile spezifische Anpassungen */
        @media (max-width: 768px) {
            body {
                padding: 15px !important;
                align-items: center !important;
            }
            
            #login {
                max-width: 400px !important;
            }
        }
        
        h1 {
            animation: fadeInDown 0.8s ease-out !important;
            text-align: center !important;
            margin-bottom: 30px !important;
        }

        #login{
            display: flex;
            flex-direction: column;
            min-height: 70vh;
            justify-content: center;
        }
        
        #loginform, #lostpasswordform, #registerform {
            background: var(--glass-bg) !important;
            border: 1px solid var(--border-color) !important;
            border-radius: 20px !important;
            box-shadow: 
                0 32px 64px -12px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.1) !important;
            padding: 35px !important;
            margin-top: 20px !important;
            backdrop-filter: blur(20px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(20px) saturate(180%) !important;
            animation: fadeInUp 0.8s ease-out 0.2s both !important;
            position: relative !important;
            overflow: hidden !important;
        }
        
        @media (min-width: 1024px) {
            #loginform, #lostpasswordform, #registerform {
                padding: 40px !important;
            }
        }
        
        #loginform::before,
        #lostpasswordform::before,
        #registerform::before {
            content: "" !important;
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            height: 1px !important;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.5), 
                transparent) !important;
        }
        
        body.light-mode #loginform,
        body.light-mode #lostpasswordform,
        body.light-mode #registerform {
            box-shadow: 
                0 32px 64px -12px rgba(0, 0, 0, 0.08), 
                0 0 0 1px rgba(255, 255, 255, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.9) !important;
            border: 1px solid rgba(0, 0, 0, 0.04) !important;
        }
        
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Verbesserte Eingabefelder - breiter und weniger eingequetscht */
        input[type="text"], 
        input[type="password"], 
        input[type="email"] {
            background-color: var(--input-bg) !important;
            border: 2px solid transparent !important;
            border-radius: 12px !important;
            color: var(--font-color) !important;
            font-size: 16px !important;
            padding: 16px 20px !important;
            width: 100% !important;
            min-width: 300px !important;
            box-sizing: border-box !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            background-clip: padding-box !important;
            position: relative !important;
        }
        
        @media (max-width: 480px) {
            input[type="text"], 
            input[type="password"], 
            input[type="email"] {
                min-width: 100% !important;
            }
        }
        
        input[type="text"]:hover,
        input[type="password"]:hover,
        input[type="email"]:hover {
            background-color: rgba(99, 102, 241, 0.05) !important;
            border-color: rgba(99, 102, 241, 0.2) !important;
        }
        
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            border-color: var(--primary-color) !important;
            box-shadow: 
                0 0 0 3px rgba(99, 102, 241, 0.1),
                0 4px 12px rgba(99, 102, 241, 0.15) !important;
            outline: none !important;
            transform: translateY(-1px) !important;
        }
        
        /* Labels */
        label {
            color: var(--font-color) !important;
            font-weight: 500 !important;
            margin-bottom: 8px !important;
            display: block !important;
            font-size: 14px !important;
        }
        
        /* Dezenterer Button - weniger aufdringlich */
        .button-primary {
            background: var(--primary-color) !important;
            border: none !important;
            border-radius: 10px !important;
            color: white !important;
            font-size: 15px !important;
            font-weight: 500 !important;
            padding: 12px 24px !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            cursor: pointer !important;
            width: 100% !important;
            position: relative !important;
            overflow: hidden !important;
            letter-spacing: 0.3px !important;
            opacity: 0.95 !important;
        }
        
        .button-primary::before {
            content: "" !important;
            position: absolute !important;
            top: 0 !important;
            left: -100% !important;
            width: 100% !important;
            height: 100% !important;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent) !important;
            transition: left 0.6s ease !important;
        }
        
        .button-primary:hover::before {
            left: 100% !important;
        }
        
        .button-primary:hover {
            transform: translateY(-1px) !important;
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.3) !important;
            opacity: 1 !important;
        }
        
        .button-primary:active {
            transform: translateY(0) !important;
        }
        
        /* Loading Animation für Button */
        .button-primary.loading::after {
            content: "" !important;
            position: absolute !important;
            width: 18px !important;
            height: 18px !important;
            margin: auto !important;
            border: 2px solid transparent !important;
            border-radius: 50% !important;
            border-top-color: white !important;
            animation: spinner 0.6s linear infinite !important;
        }
        
        @keyframes spinner {
            to { transform: rotate(360deg); }
        }
        
        /* Verbesserte Nachrichten-Styling */
        .message, #login_error, .login .message {
            display: flex;
            border-radius: 10px !important;
            padding: 14px 18px !important;
            margin: 16px 0 !important;
            border: none !important;
            position: relative !important;
            overflow: hidden !important;
            animation: slideInLeft 0.5s ease-out !important;
            font-size: 14px !important;
        }
        
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        #login_error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(239, 68, 68, 0.05)) !important;
            color: var(--font-color) !important;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.1) !important;
        }
        
        #login_error::before {
            content: "⚠️" !important;
            margin-right: 8px !important;
        }
        
        .message {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05)) !important;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.1) !important;
        }
        
        .message::before {
            content: "✓" !important;
            margin-right: 8px !important;
            color: var(--success-color) !important;
        }
        
        /* WordPress Standard-Links Styling */
        #nav, #backtoblog {
            text-align: center !important;
            margin-top: 24px !important;
        }
        
        #nav a, #backtoblog a {
            color: var(--text-muted) !important;
            font-size: 13px !important;
            transition: color 0.3s ease !important;
            text-decoration: none !important;
        }
        
        #nav a:hover, #backtoblog a:hover {
            color: var(--primary-color) !important;
        }
        
        /* Language Switcher in Ecke verschieben */
        .language-switcher {
            position: fixed !important;
            bottom: 20px !important;
            left: 20px !important;
            z-index: 1000 !important;
            display: flex !important;
            align-items: center !important;
            gap: 8px !important;
            padding: 8px 12px !important;
            background: var(--glass-bg) !important;
            border-radius: 8px !important;
            border: 1px solid var(--border-color) !important;
            backdrop-filter: blur(10px) !important;
            -webkit-backdrop-filter: blur(10px) !important;
        }
        
        .language-switcher label {
            color: var(--text-muted) !important;
            font-size: 12px !important;
            margin: 0 !important;
        }
        
        .language-switcher select {
            background-color: transparent !important;
            border: none !important;
            color: var(--font-color) !important;
            font-size: 12px !important;
            padding: 4px 8px !important;
            min-height: auto !important;
            cursor: pointer !important;
        }
        
        .language-switcher input[type="submit"] {
            background: var(--primary-color) !important;
            border: none !important;
            border-radius: 4px !important;
            color: white !important;
            padding: 4px 8px !important;
            font-size: 12px !important;
            min-height: auto !important;
            cursor: pointer !important;
        }
        
        /* Checkbox Styling */
        input[type="checkbox"] {
            accent-color: var(--primary-color) !important;
            transform: scale(1.1) !important;
        }
        
        .forgetmenot {
            margin: 16px 0 !important;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .forgetmenot label {
            display: flex !important;
            align-items: center !important;
            gap: 6px !important;
            font-size: 13px !important;
            color: var(--text-muted) !important;
            margin: 0 !important;
        }
        
        /* iOS 26 Style Theme Switch */
        .theme-switch-wrapper {
            position: fixed !important;
            top: 20px !important;
            right: 20px !important;
            z-index: 1000 !important;
            display: flex !important;
            align-items: center !important;
            gap: 8px !important;
            animation: fadeIn 0.5s ease-out !important;
        }
        
        .theme-switch {
            position: relative !important;
            width: 48px !important;
            height: 28px !important;
        }
        
        .theme-switch input {
            opacity: 0 !important;
            width: 0 !important;
            height: 0 !important;
        }
        
        .slider {
            position: absolute !important;
            cursor: pointer !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            background-color: rgba(120, 120, 128, 0.16) !important;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1) !important;
            border-radius: 28px !important;
        }
        
        .slider:before {
            position: absolute !important;
            content: "" !important;
            height: 24px !important;
            width: 24px !important;
            left: 2px !important;
            bottom: 2px !important;
            background-color: white !important;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1) !important;
            border-radius: 50% !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15) !important;
        }
        
        input:checked + .slider {
            background-color: #34c759 !important;
        }
        
        input:checked + .slider:before {
            transform: translateX(20px) !important;
        }
        
        .mode-icon {
            font-size: 18px !important;
            transition: opacity 0.3s ease !important;
        }
        
        body.dark-mode .mode-icon.sun {
            opacity: 0.4 !important;
        }
        
        body.light-mode .mode-icon.moon {
            opacity: 0.4 !important;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        /* Password Reset Form Styling */
        #resetpassform {
            background: var(--glass-bg) !important;
            border: 1px solid var(--border-color) !important;
            border-radius: 20px !important;
            box-shadow: 
                0 32px 64px -12px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.1) !important;
            padding: 35px !important;
            margin-top: 20px !important;
            backdrop-filter: blur(20px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(20px) saturate(180%) !important;
            animation: fadeInUp 0.8s ease-out 0.2s both !important;
            position: relative !important;
            overflow: hidden !important;
        }
        
        #resetpassform::before {
            content: "" !important;
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            height: 1px !important;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.5), 
                transparent) !important;
        }
        
        .reset-pass-submit {
            display: flex !important;
            gap: 12px !important;
            margin-top: 24px !important;
        }
        
        .wp-pwd {
            position: relative !important;
        }
        
        .wp-generate-pw {
            background: transparent !important;
            border: 2px solid var(--border-color) !important;
            color: var(--font-color) !important;
            border-radius: 10px !important;
            padding: 12px 24px !important;
            font-size: 15px !important;
            font-weight: 500 !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            cursor: pointer !important;
        }
        
        .wp-generate-pw:hover {
            border-color: var(--primary-color) !important;
            background: var(--primary-color) !important;
            color: white !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.3) !important;
        }
        
        #pass-strength-result {
            margin-top: 8px !important;
            padding: 8px !important;
            border-radius: 6px !important;
            text-align: center !important;
            font-size: 13px !important;
        }
        
        #pass-strength-result.strong {
            background: rgba(16, 185, 129, 0.1) !important;
            color: var(--success-color) !important;
            border: 1px solid var(--success-color) !important;
        }
        
        #pass-strength-result.good {
            background: rgba(132, 204, 22, 0.1) !important;
            color: #84cc16 !important;
            border: 1px solid #84cc16 !important;
        }
        
        #pass-strength-result.bad {
            background: rgba(239, 68, 68, 0.1) !important;
            color: var(--error-color) !important;
            border: 1px solid var(--error-color) !important;
        }
        
        #pass-strength-result.short {
            background: rgba(245, 158, 11, 0.1) !important;
            color: var(--warning-color) !important;
            border: 1px solid var(--warning-color) !important;
        }
        
        .indicator-hint {
            font-size: 12px !important;
            line-height: 1.5 !important;
            color: var(--text-muted) !important;
            margin-top: 12px !important;
            padding: 12px !important;
            background: rgba(99, 102, 241, 0.05) !important;
            border-radius: 8px !important;
            border: 1px solid rgba(99, 102, 241, 0.1) !important;
        }
        
        .pw-weak {
            margin-top: 12px !important;
            padding: 12px !important;
            background: rgba(239, 68, 68, 0.05) !important;
            border-radius: 8px !important;
            border: 1px solid rgba(239, 68, 68, 0.2) !important;
        }
        
        .pw-weak label {
            color: var(--error-color) !important;
            font-weight: 500 !important;
            cursor: pointer !important;
        }
        
        /* Notice Messages auf Reset-Seite */
        .notice.reset-pass {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(99, 102, 241, 0.05)) !important;
            border-radius: 10px !important;
            padding: 14px 18px !important;
            margin: 16px 0 !important;
            border: none !important;
            color: var(--font-color) !important;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.1) !important;
            font-size: 14px !important;
        }
        
        .notice.reset-pass::before {
            content: "ℹ️" !important;
            margin-right: 8px !important;
        }
        
        /* Buttons im Reset-Form konsistent stylen */
        #resetpassform .button-secondary {
            background: var(--input-bg) !important;
            border: 2px solid var(--border-color) !important;
            color: var(--font-color) !important;
            transition: all 0.3s ease !important;
            border-radius: 10px !important;
            padding: 12px 24px !important;
            font-size: 15px !important;
            font-weight: 500 !important;
        }
        
        #resetpassform .button-secondary:hover {
            border-color: var(--primary-color) !important;
            color: var(--primary-color) !important;
        }
        
        .login-footer {
            text-align: center !important;
            margin-top: 40px !important;
            padding: 20px !important;
            animation: fadeIn 1s ease-out 0.5s both !important;
        }
        
        .login-footer p {
            color: var(--text-muted) !important;
            font-size: 12px !important;
            margin: 0 !important;
            letter-spacing: 0.3px !important;
        }
        
        .login-footer a {
            color: var(--primary-color) !important;
            font-weight: 500 !important;
            text-decoration: none !important;
            position: relative !important;
        }
        
        .login-footer a::after {
            content: "" !important;
            position: absolute !important;
            bottom: -2px !important;
            left: 0 !important;
            width: 0 !important;
            height: 1px !important;
            background: var(--primary-color) !important;
            transition: width 0.3s ease !important;
        }
        
        .login-footer a:hover::after {
            width: 100% !important;
        }
        
        /* Desktop Spezifische Anpassungen - entfernt */
        @media (min-width: 1024px) {
            .login-footer {
                margin-top: 40px !important;
            }
            
            .language-switcher {
                bottom: 20px !important;
                left: 20px !important;
            }
            
            .theme-switch-wrapper {
                top: 20px !important;
                right: 20px !important;
            }
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            #login {
                padding: 5% 15px 0 !important;
            }
            
            #loginform, #lostpasswordform, #registerform {
                padding: 25px 20px !important;
            }
            
            .theme-switch-wrapper {
                top: 15px !important;
                right: 15px !important;
                transform: scale(0.9) !important;
            }
            
            body .language-switcher {
            display: none !important

            }
            
            input[type="text"], 
            input[type="password"], 
            input[type="email"] {
                padding: 14px 16px !important;
                font-size: 16px !important;
            }
        }
        
        @media (max-width: 480px) {
            #login {
                padding: 3% 10px 0 !important;
            }
            
            #loginform, #lostpasswordform, #registerform {
                padding: 20px 15px !important;
                border-radius: 16px !important;
            }
            
            h1 a {
                width: 160px !important;
                height: 64px !important;
            }
        }
        
        /* Accessibility Improvements */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
            
            body::before, body::after {
                animation: none !important;
            }
        }
        
        /* Focus Visible für Barrierefreiheit */
        *:focus-visible {
            outline: 2px solid var(--primary-color) !important;
            outline-offset: 2px !important;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px !important;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--bg-secondary) !important;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary-color) !important;
            border-radius: 4px !important;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-hover) !important;
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
            opacity: 0.7 !important;
        }
        
        /* Password toggle button fix */
        .login .button.wp-hide-pw {
            min-height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px !important;
        }
        
        .login .button.wp-hide-pw .dashicons {
            top: auto;
        }
        
        /* Desktop Branding Styles entfernt */
    </style>';
}
add_action('login_head', 'custom_dark_mode_login_page');

// Erweiterte Theme-Switch Funktionalität mit iOS 26 Style
function add_dark_light_mode_switcher() {
    echo '<div class="theme-switch-wrapper">
            <span class="mode-icon moon">🌙</span>
            <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox" />
                <div class="slider"></div>
            </label>
            <span class="mode-icon sun">☀️</span>
          </div>';
    
    echo '<div class="login-footer">
            <p>Gemacht mit ❤️ und viel ☕️ von <a href="https://dbw-media.de" target="_blank">dbw media</a></p>
          </div>';
    
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                const themeSwitch = document.querySelector("#checkbox");
                const body = document.body;
                
                // Erweiterte Theme-Präferenz-Logik
                const getThemePreference = () => {
                    const saved = localStorage.getItem("dbw-login-theme");
                    if (saved) return saved;
                    
                    const hour = new Date().getHours();
                    const isNightTime = hour < 6 || hour >= 20;
                    const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
                    
                    return (isNightTime || prefersDark) ? "dark" : "light";
                };
                
                const theme = getThemePreference();
                if (theme === "light") {
                    body.classList.add("light-mode");
                    themeSwitch.checked = true;
                } else {
                    body.classList.add("dark-mode");
                    themeSwitch.checked = false;
                }
                
                // Theme Switch Handler
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
                
                // Premium Form Validation
                const form = document.getElementById("loginform");
                const submitButton = document.getElementById("wp-submit");
                
                if (form && submitButton) {
                    form.addEventListener("submit", function(e) {
                        submitButton.classList.add("loading");
                        submitButton.disabled = true;
                    });
                }
                
                // Enhanced Input Animations
                const inputs = document.querySelectorAll("input[type=text], input[type=password], input[type=email]");
                inputs.forEach((input, index) => {
                    input.style.animationDelay = `${0.1 * index}s`;
                    
                    // Real-time validation
                    input.addEventListener("input", function() {
                        if (this.type === "email") {
                            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (emailRegex.test(this.value)) {
                                this.style.borderColor = "var(--success-color)";
                            } else if (this.value.length > 0) {
                                this.style.borderColor = "var(--warning-color)";
                            }
                        }
                    });
                    
                    // Premium focus effects
                    input.addEventListener("focus", function() {
                        this.parentElement.style.transform = "scale(1.01)";
                    });
                    
                    input.addEventListener("blur", function() {
                        this.parentElement.style.transform = "scale(1)";
                    });
                });
                
                // Password strength indicator nur für Reset-Seiten
                const currentAction = new URLSearchParams(window.location.search).get("action");
                if (currentAction === "rp" || currentAction === "resetpass") {
                    const passwordInput = document.getElementById("pass1");
                    if (passwordInput) {
                        const strengthIndicator = document.createElement("div");
                        strengthIndicator.className = "password-strength";
                        passwordInput.parentElement.appendChild(strengthIndicator);
                        
                        passwordInput.addEventListener("input", function() {
                            const strength = checkPasswordStrength(this.value);
                            updateStrengthIndicator(strengthIndicator, strength);
                        });
                    }
                }
                
                function checkPasswordStrength(password) {
                    let strength = 0;
                    if (password.length >= 8) strength++;
                    if (password.length >= 12) strength++;
                    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
                    if (/\d/.test(password)) strength++;
                    if (/[^a-zA-Z\d]/.test(password)) strength++;
                    return strength;
                }
                
                function updateStrengthIndicator(indicator, strength) {
                    const messages = ["", "Schwach", "Mittel", "Gut", "Stark", "Sehr stark"];
                    const colors = ["", "#ef4444", "#f59e0b", "#eab308", "#84cc16", "#10b981"];
                    
                    indicator.textContent = messages[strength];
                    indicator.style.color = colors[strength];
                    indicator.style.fontSize = "12px";
                    indicator.style.marginTop = "4px";
                }
                
                // Smooth page transitions
                setTimeout(() => {
                    document.body.style.transition = "all 0.3s cubic-bezier(0.4, 0, 0.2, 1)";
                }, 100);
            });
        </script>';
}
add_action('login_footer', 'add_dark_light_mode_switcher');

// Entferne WordPress-Generator und andere Meta-Infos auf Login-Seite
function remove_login_wp_generator() {
    remove_action('login_head', 'wp_generator');
}
add_action('login_head', 'remove_login_wp_generator');

// Sicherheits-Features
function add_login_security_headers() {
    if (strpos($_SERVER['REQUEST_URI'], 'wp-login.php') !== false) {
        header('X-Frame-Options: DENY');
        header('X-Content-Type-Options: nosniff');
        header('Referrer-Policy: strict-origin-when-cross-origin');
        header('X-XSS-Protection: 1; mode=block');
        header('Permissions-Policy: geolocation=(), microphone=(), camera=()');
        header('Content-Security-Policy: frame-ancestors \'none\'');
    }
}
add_action('init', 'add_login_security_headers');

// Benutzerdefinierte Login-Fehlerbehandlung
function custom_login_errors($error) {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    
    $messages = [
        'de' => [
            'invalid' => '<strong>Anmeldung fehlgeschlagen:</strong> Die eingegebenen Anmeldedaten sind nicht korrekt.',
            'empty' => '<strong>Fehler:</strong> Bitte geben Sie Benutzername und Passwort ein.',
            'rate_limit' => '<strong>Sicherheitshinweis:</strong> Zu viele Anmeldeversuche. Bitte warten Sie einen Moment.'
        ],
        'en' => [
            'invalid' => '<strong>Login failed:</strong> The credentials provided are incorrect.',
            'empty' => '<strong>Error:</strong> Please enter username and password.',
            'rate_limit' => '<strong>Security notice:</strong> Too many login attempts. Please wait a moment.'
        ]
    ];
    
    $userLang = isset($messages[$lang]) ? $lang : 'en';
    
    if (strpos($error, 'incorrect') !== false || strpos($error, 'Invalid') !== false) {
        return $messages[$userLang]['invalid'];
    } elseif (strpos($error, 'empty') !== false) {
        return $messages[$userLang]['empty'];
    }
    
    return $error;
}
add_filter('login_errors', 'custom_login_errors');

// Rate Limiting für Login-Versuche
function check_login_attempts() {
    $ip = $_SERVER['REMOTE_ADDR'];
    $transient_key = 'login_attempts_' . md5($ip);
    $attempts = get_transient($transient_key);
    
    if ($attempts === false) {
        set_transient($transient_key, 1, 300); // 5 Minuten
    } else {
        if ($attempts >= 5) {
            wp_die('Zu viele Anmeldeversuche. Bitte versuchen Sie es in 5 Minuten erneut.');
        }
        set_transient($transient_key, $attempts + 1, 300);
    }
}
add_action('wp_login_failed', 'check_login_attempts');

// WordPress Standard-Funktionalität erhalten
function preserve_wordpress_defaults() {
    // Erlaube Passwort-Reset
    add_filter('allow_password_reset', '__return_true');
    
    // Zeige alle Standard-Links
    add_filter('login_link_separator', function() {
        return ' | ';
    });
}
add_action('init', 'preserve_wordpress_defaults');

// Stelle sicher, dass WordPress-Standard-Features sichtbar sind
function restore_wordpress_features() {
    echo '<style>
        #backtoblog { display: block !important; }
        .language-switcher { display: flex !important; }
        #nav { display: block !important; }
        .privacy-policy-page-link { display: block !important; opacity: 0.7; }
    </style>';
}
add_action('login_head', 'restore_wordpress_features');

// Admin-Benachrichtigung bei erfolgreicher Anmeldung
function notify_admin_on_login($user_login, $user) {
    if (in_array('administrator', $user->roles)) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $time = current_time('mysql');
        
        // Login-Log in Datenbank speichern
        update_user_meta($user->ID, 'last_login', $time);
        update_user_meta($user->ID, 'last_login_ip', $ip);
    }
}
add_action('wp_login', 'notify_admin_on_login', 10, 2);

// Custom Login Redirect basierend auf Benutzerrolle
function custom_login_redirect($redirect_to, $request, $user) {
    if (isset($user->roles) && is_array($user->roles)) {
        if (in_array('administrator', $user->roles)) {
            return admin_url();
        } elseif (in_array('editor', $user->roles)) {
            return admin_url('edit.php');
        } else {
            return home_url();
        }
    }
    return $redirect_to;
}
add_filter('login_redirect', 'custom_login_redirect', 10, 3);

// Device Detection und Responsive Anpassungen
function add_device_detection() {
    ?>
    <script>
    // Device Detection
    (function() {
        const ua = navigator.userAgent;
        const body = document.body;
        
        // Mobile Detection
        if (/Mobile|Android|iPhone|iPad/i.test(ua)) {
            body.classList.add('is-mobile');
        }
        
        // iOS Detection für spezielle Styles
        if (/iPhone|iPad|iPod/i.test(ua)) {
            body.classList.add('is-ios');
        }
        
        // Touch Device Detection
        if ('ontouchstart' in window) {
            body.classList.add('touch-device');
        }
    })();
    </script>
    
    <style>
    /* Mobile-spezifische Anpassungen */
    .is-mobile #login {
        width: 100% !important;
        padding: 5% 15px !important;
    }
    
    .is-mobile .theme-switch-wrapper {
        transform: scale(0.9);
    }
    
    /* iOS-spezifische Fixes */
    .is-ios input {
        -webkit-appearance: none !important;
        font-size: 16px !important; /* Verhindert Zoom beim Focus */
    }
    
    /* Touch-optimierte Buttons */
    .touch-device .button-primary {
        min-height: 48px !important;
        font-size: 16px !important;
    }
    
    .touch-device input[type="checkbox"] {
        width: 18px !important;
        height: 18px !important;
    }
    </style>
    <?php
}
add_action('login_head', 'add_device_detection');

// Login Session Security
function enhance_login_session_security() {
    // Regenerate session ID bei Login
    add_action('wp_login', function() {
        if (!session_id()) {
            session_start();
        }
        session_regenerate_id(true);
    });
    
    // Set secure cookie parameters
    add_filter('auth_cookie', function($cookie, $user_id, $expiration, $scheme) {
        if (is_ssl()) {
            // Ensure cookies are secure on HTTPS
            @ini_set('session.cookie_secure', true);
            @ini_set('session.cookie_httponly', true);
            @ini_set('session.cookie_samesite', 'Strict');
        }
        return $cookie;
    }, 10, 4);
}
add_action('init', 'enhance_login_session_security');

// Accessibility Enhancements
function add_accessibility_features() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Skip to form link for screen readers
        const skipLink = document.createElement('a');
        skipLink.href = '#loginform';
        skipLink.className = 'screen-reader-text';
        skipLink.textContent = 'Skip to login form';
        document.body.insertBefore(skipLink, document.body.firstChild);
        
        // ARIA labels
        const form = document.getElementById('loginform');
        if (form) {
            form.setAttribute('aria-label', 'Login Form');
            
            const userLogin = document.getElementById('user_login');
            const userPass = document.getElementById('user_pass');
            
            if (userLogin) userLogin.setAttribute('aria-required', 'true');
            if (userPass) userPass.setAttribute('aria-required', 'true');
        }
        
        // Announce errors to screen readers
        const errors = document.getElementById('login_error');
        if (errors) {
            errors.setAttribute('role', 'alert');
            errors.setAttribute('aria-live', 'assertive');
        }
    });
    </script>
    
    <style>
    /* Screen reader only text */
    .screen-reader-text {
        position: absolute !important;
        clip: rect(1px, 1px, 1px, 1px) !important;
        padding: 0 !important;
        border: 0 !important;
        height: 1px !important;
        width: 1px !important;
        overflow: hidden !important;
    }
    
    /* High contrast mode support */
    @media (prefers-contrast: high) {
        #loginform {
            border: 3px solid var(--font-color) !important;
        }
        
        .button-primary {
            border: 2px solid white !important;
        }
        
        input:focus {
            outline: 3px solid var(--primary-color) !important;
            outline-offset: 2px !important;
        }
    }
    </style>
    <?php
}
add_action('login_footer', 'add_accessibility_features');

// Performance Monitoring
function add_performance_tracking() {
    ?>
    <script>
    // Performance tracking
    window.addEventListener('load', function() {
        if ('performance' in window) {
            const perfData = window.performance.timing;
            const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
            console.log('DBW Login Page Load Time:', pageLoadTime + 'ms');
        }
    });
    </script>
    <?php
}
add_action('login_footer', 'add_performance_tracking');

// Browser Compatibility Warnings
function add_browser_compatibility_check() {
    ?>
    <script>
    // Browser compatibility check
    (function() {
        const isIE = /MSIE|Trident/.test(navigator.userAgent);
        const isOldEdge = /Edge\/\d+/.test(navigator.userAgent) && !/Edg\//.test(navigator.userAgent);
        
        if (isIE || isOldEdge) {
            const warning = document.createElement('div');
            warning.style.cssText = 'background: #f59e0b; color: #000; padding: 10px; text-align: center; position: fixed; top: 0; left: 0; right: 0; z-index: 9999;';
            warning.innerHTML = 'Sie verwenden einen veralteten Browser. Für die beste Erfahrung empfehlen wir ein Update auf einen modernen Browser.';
            document.body.appendChild(warning);
        }
    })();
    </script>
    <?php
}
add_action('login_footer', 'add_browser_compatibility_check');

// Custom Login Page Title
function custom_login_title($title) {
    return get_bloginfo('name') . ' - Secure Login | Powered by DBW Media';
}
add_filter('login_title', 'custom_login_title');

// Preload wichtige Ressourcen
function add_resource_hints() {
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="//dbw-media.de">
    <meta name="theme-color" content="#6366f1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <?php
}
add_action('login_head', 'add_resource_hints', 1);

// Custom Maintenance Mode für Login
function check_maintenance_mode() {
    $maintenance_mode = get_option('dbw_maintenance_mode', false);
    
    if ($maintenance_mode && !current_user_can('administrator')) {
        wp_die(
            '<div style="text-align: center; padding: 50px; font-family: -apple-system, BlinkMacSystemFont, sans-serif;">
                <h1 style="color: #6366f1;">Wartungsmodus</h1>
                <p>Wir führen gerade Wartungsarbeiten durch. Bitte versuchen Sie es später erneut.</p>
                <p style="margin-top: 30px;"><small>DBW Media - Ihre Digitalagentur</small></p>
            </div>',
            'Wartungsmodus',
            array('response' => 503)
        );
    }
}
add_action('login_init', 'check_maintenance_mode');

// Two-Factor Authentication Vorbereitung
function prepare_two_factor_auth() {
    ?>
    <script>
    // Placeholder für 2FA Integration
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('loginform');
        if (loginForm) {
            // Hier könnte 2FA-Code-Feld dynamisch eingefügt werden
            const has2FA = false; // Würde aus User-Meta geladen
            
            if (has2FA) {
                const twoFactorField = document.createElement('p');
                twoFactorField.innerHTML = `
                    <label for="2fa_code">Zwei-Faktor-Code<br>
                    <input type="text" name="2fa_code" id="2fa_code" class="input" size="20" autocomplete="one-time-code" /></label>
                `;
                loginForm.insertBefore(twoFactorField, loginForm.querySelector('.submit'));
            }
        }
    });
    </script>
    <?php
}
add_action('login_footer', 'prepare_two_factor_auth');

// Analytics und Tracking (DSGVO-konform)
function add_privacy_compliant_analytics() {
    ?>
    <script>
    // Anonymisierte Analytics ohne Cookies
    (function() {
        // Nur wenn User zugestimmt hat (würde aus Cookie/LocalStorage gelesen)
        const hasConsent = false; // Placeholder
        
        if (hasConsent && typeof gtag !== 'undefined') {
            // Event tracking
            const trackEvent = (category, action, label) => {
                gtag('event', action, {
                    'event_category': category,
                    'event_label': label,
                    'anonymize_ip': true
                });
            };
            
            // Track login form interactions
            document.getElementById('user_login').addEventListener('focus', () => {
                trackEvent('Login', 'input_focus', 'username');
            });
            
            document.getElementById('wp-submit').addEventListener('click', () => {
                trackEvent('Login', 'submit_attempt', 'login_form');
            });
        }
    })();
    </script>
    <?php
}
add_action('login_footer', 'add_privacy_compliant_analytics');

// Ende der Funktionen
?>