<?php

/**
 * Remove Admin Bar When Logged In
 */

add_filter('show_admin_bar', '__return_false');

/**
 * Add Theme Support Items
 */

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

/**
 * Get Attached Images Plugin
 */

function get_attached_images( $args=null )
{
	
	/**
	 * Define the array of defaults
	 */
	
	$defaults = array(
		'pageID' => false,
		'size' => 'thumbnail',
		'single' => false,
		'prepend' => '<figure>',
		'append' => '</figure>',
		'orderby' => 'date',
		'order' => 'DESC',
		'echo' => true
	);
	
	$args = wp_parse_args( $args, $defaults );
	
	extract( $args, EXTR_SKIP );
	
	$output = "";

	// first check if we've passed in a specific page ID
	if ($pageID != FALSE) {
		$id = $pageID;
	} else {
		global $post;
		$id = $post->ID;
	}
	
	// now, retrieve all the images
	$images = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ));

	// set a counter
	$i = 0;
	
	// var_dump($images);

	if ($images) {
		if ($echo) {
			foreach ($images as $image) {
				$i++;

				if ($image->post_excerpt) {
					$caption = '<figcaption>' . $image->post_excerpt . '</figcaption>'; 
				} else {
					$caption = '';
				}
			
				$output .= $prepend . wp_get_attachment_image($image->ID, $size) . $caption . $append;
			
				if ($single == TRUE && $i == 1)  break;
			}

			return $output;
		} else {
			return $images;
		}
	} else {
		return false;
	}
}

?>