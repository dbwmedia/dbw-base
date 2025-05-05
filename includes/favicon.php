<?php
function add_favicon_and_meta_tags() {
    $theme_directory = get_stylesheet_directory_uri();
    echo '<link rel="apple-touch-icon" sizes="180x180" href="' . $theme_directory . '/assets/favicon/apple-touch-icon.png">';
    echo '<link rel="icon" type="image/png" sizes="32x32" href="' . $theme_directory . '/assets/favicon/favicon-32x32.png">';
    echo '<link rel="icon" type="image/png" sizes="16x16" href="' . $theme_directory . '/assets/favicon/favicon-16x16.png">';
    echo '<link rel="manifest" href="' . $theme_directory . '/assets/favicon/site.webmanifest">';
    echo '<link rel="mask-icon" href="' . $theme_directory . '/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">';
    echo '<meta name="msapplication-TileColor" content="#00aba9">';
    echo '<meta name="theme-color" content="#ffffff">';
}
