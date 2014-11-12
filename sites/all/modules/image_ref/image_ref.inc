<?php
//Returns an associative array 'value=>label'() with the existing image size presets
function ir_get_image_presets() {
	$options = array();
	
	//Get Image presets
	foreach (image_get_sizes() as $key => $size) {
		$options[$key] = $size['label'];
	}

	//Get ImageCache presets
	if (module_exists('imagecache')) {
		foreach (imagecache_presets() as $preset) {
			$options[$preset['presetid']] = $preset['presetname'];
		}
	}
	return $options;
}
?>