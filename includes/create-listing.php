<?php
/*Create The Listing Post Type*/
add_filter('piklist_post_types', 'listing_post_type');
 function listing_post_type($post_types){ 
 $post_types['listing'] = array(
	  'labels' =>piklist('post_type_labels','Listings')
     ,'title' => __('Simple Business Listings')
 	 ,'public' => true
	 ,'admin_body_class' => array (
        'listing-admin'
             )
 	 ,'has_archive' => 'listings'
	 ,'capability_type' => 'post'
	 ,'taxonomies' =>array('post_tag')
	 ,'rewrite' => array(
		 'slug' => 'listing'
				 )
 	,'supports' => array(
 		'title',
		'author'
		,'revisions'
		,'editor'
		, 'excerpt'
		,'thumbnail'
		, 'comments'
		 		)
  );
return $post_types;
}

function my_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    listing_post_type();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );
 /*Register The Taxonomy*/
add_filter('piklist_taxonomies', 'simple_directory_tax');
 function simple_directory_tax($taxonomies)
 {
$taxonomies[] = array(
 'post_type' => 'listing'
 ,'name' => 'listing_category'
 ,'show_admin_column' => true
 ,'hide_meta_box' => true
 ,'configuration' => array(
 'hierarchical' => true
 ,'labels' => piklist('taxonomy_labels', 'Category')
 ,'show_ui' => true
 ,'query_var' => true
 ,'rewrite' => array( 
 'slug' => 'listing-category' 
 )  
 )
 );
return $taxonomies;
}

add_filter('piklist_taxonomies','simple_dir_tags');
function simple_dir_tags($listing_tags)
	{
	$listing_tags[] = array(
	'post_type' =>'lisiting'
	,'name' => 'listing-tags'
	,'show_admin_column' =>true
		,'hide_meta_box' => true
	,'configuration' => array (
		'hierarchichal' =>false
		,'labels' => piklist('taxonomy_labels', 'Tag')
		,'show_ui' =>true
		,'query_var' =>true
		,'rewrite' =>array(
		'slug' =>'listing-tags'
		)
	) );
	return $listing_tags;
}

foreach ( array( 'pre_term_description' ) as $filter ) {
 remove_filter( $filter, 'wp_filter_kses' );
}
 
foreach ( array( 'term_description' ) as $filter ) {
remove_filter( $filter, 'wp_kses_data' );
}