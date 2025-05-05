<?php

//------------------------------------------------
// # REMOVE WP VERSION
// ------------------------------------------------
add_filter('the_generator', 'wpRemoveVersion');
function wpRemoveVersion() {
	return '';
}

//------------------------------------------------
// # SVG SUPPORT
// ------------------------------------------------
add_filter('upload_mimes', 'addMimeTypes');
function addMimeTypes($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}