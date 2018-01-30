<?php 

// ADD NEW COLUMN
function custom_testimonial_columns_head($defaults) {
	$new_columns['cb'] = '';
	$new_columns['featured_image'] = 'Image';
    return array_merge( $new_columns, $defaults );
}
 
// SHOW THE FEATURED IMAGE
function custom_testimonial_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = get_field('image', $post_ID);
        if ($post_featured_image) {
            echo '<img src="' . $post_featured_image['url'] . '" />';
        }
    }
}

add_filter('manage_testimonial_posts_columns', 'custom_testimonial_columns_head');
add_action('manage_testimonial_posts_custom_column', 'custom_testimonial_columns_content', 10, 2);

add_action('admin_head', 'my_admin_head_function');
function my_admin_head_function() {
	echo '<style>
	.column-featured_image{ width: 150px }
	.column-featured_image img {width: 100%}
	</style>';
}
