<?php
//add_filter('manage_listing_posts_columns', 'simple_dir_list_columns');
//function simple_dir_list_columns($defaults ) {
//  $defaults['listing_category']  = 'Category';
//
//  return $defaults;
//}

//add_action( 'manage_listing_posts_custom_column', 'simple_dir_list_columns_content', 10, 2 );

//function simple_dir_list_columns_content( $column_name, $post_id ) {
//  if ($column_name == 'listing_category') {
//  $categories = get_the_category($post->ID);
//    var_dump($categories);
//
// }