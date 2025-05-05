<?php

//------------------------------------------------
// # Set 'hero_image' as thumbnail
// # Rückgabewert von 'hero_image' -> Bild-ID
// ------------------------------------------------
add_action('acf/save_post', function ($post_id) {
	$value = get_field('hero_image', $post_id);
	if ($value) {
		if (!is_numeric($value)) {
			$value = $value['ID'];
		}
		update_post_meta($post_id, '_thumbnail_id', $value);
	} elseif($value === false) {
		delete_post_meta($post_id, '_thumbnail_id');
	}
}, 11);