<?php
// SVG Upload in WordPress erlauben (inkl. einfacher Sicherheitsprüfung)
function dbw_allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'dbw_allow_svg_uploads');

// MIME-Typ-Korrektur für SVGs (WordPress 5.1+ Bugfix)
function dbw_fix_svg_mime_type($data, $file, $filename, $mimes) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if ($ext === 'svg') {
        $data['type'] = 'image/svg+xml';
        $data['ext']  = 'svg';
    }
    return $data;
}
add_filter('wp_check_filetype_and_ext', 'dbw_fix_svg_mime_type', 10, 4);

// Optional: SVGs nur für Admins erlauben (Sicherheitsmaßnahme)
function dbw_restrict_svg_to_admins($file) {
    if (strpos($file['type'], 'svg') !== false && !current_user_can('manage_options')) {
        $file['error'] = 'SVG-Uploads sind nur für Administratoren erlaubt.';
    }
    return $file;
}
add_filter('wp_handle_upload_prefilter', 'dbw_restrict_svg_to_admins');
