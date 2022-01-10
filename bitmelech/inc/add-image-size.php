<?php

function add_custom_image_size() {
	add_image_size( 'tool_img_slide_thumb', 655, 651, true );
}

add_action( 'after_setup_theme', 'add_custom_image_size' );