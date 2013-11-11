<?php

//=========================
// Theme support
//=========================
add_theme_support('post-thumbnails');
register_sidebar(array('name'=>'Side'));
add_theme_support('post-formats', array('image'));

//Add support for the bottom widget area
register_sidebar(array(
  'name' => __('Bottom'),
  'id' => 'bottom',
  'description' => __('Widgets in this area will be shown on the bottom of the page.'),
  'before_widget' => '<div class="grid-25">',
  'after_widget' => '</div>'
));

//=========================
// Functions
//=========================
function the_post_thumbnail_caption() {
	//Kudos to bit.ly/18UNmaG
	global $post;
  	$thumbnail_id    = get_post_thumbnail_id($post->ID);
  	$thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
  	if ($thumbnail_image && isset($thumbnail_image[0])) {
    	echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
  	}
}
?>