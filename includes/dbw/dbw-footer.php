<?php

function dbw_custom_footer() {
    // Basistext für den Footer
    $base_footer_text = '© ' . date('Y') . ' ' . get_bloginfo('name');

    // Start des Footers
    echo '<div class="custom-site-footer" style="text-align: center; padding: 20px 0; font-size: 16px;">';
    echo '<footer class="site-info" aria-label="Footer" style="font-size: 14px;">';

    // Die ID der Seite, die als Footer angezeigt werden soll
    $page_id = 11; 
    $page = get_post($page_id);


    // Prüfe, ob die aktuelle Seite die Startseite ist
    if (is_front_page()) {
        // Spezieller Footer-Text nur für die Startseite
    echo $base_footer_text . ' • Gemacht mit ❤️ und viel ☕️ von<wbr> <a href="https://dbw-media.de" target="_blank" style="text-decoration: underline; color: #000000; font-size: 14px">dbw media</a>';
    } else {
        // Nur Copyright-Verweis für andere Seiten
        echo $base_footer_text;
    }

    // Ende des Footers
    echo '</footer>';
    echo '</div>';
}

add_action('wp_footer', 'dbw_custom_footer');
