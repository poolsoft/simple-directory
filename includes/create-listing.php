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
 ,'has_archive' => 'true'
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
//Create the Settings Page
 /*add_filter('piklist_admin_pages', 'simple_directory_setting_pages');
 function simple_directory_setting_pages($settings_pages)
 {
 global $settings_pages;
 $settings_pages[] = array(
 'page_title' => __('Simple Directory Settings')
 ,'menu_title' => __('Settings', 'piklist')
 ,'sub_menu' => 'edit.php?post_type=listing' //Under 'Listings' menu
 ,'capability' => 'manage_options'
 ,'menu_slug' => 'directory_settings'
 ,'setting' => 'simple_directory_settings'
 ,'menu_icon' => plugins_url('piklist/parts/img/piklist-icon.png')
 ,'page_icon' => plugins_url('piklist/parts/img/piklist-page-icon-32.png')
 ,'single_line' => true
 //,'default_tab' => 'Basic'
 ,'save_text' => 'Save Settings'
 );
  
 return $settings_pages; 

 }
 */
/*add_filter('piklist_admin_pages', array('piklist_setting', 'admin_pages'));
function admin_pages($pages) 
  {
    $pages[] = array(
      'page_title' => __('About', 'simple-dir')
      ,'menu_title' => 'Guide'
		,'sub_menu' => 'edit.php?post_type=listing'
      ,'capability' => 'manage_options'
      ,'menu_slug' => 'directory_guide'
      ,'single_line' => false
      ,'menu_icon' => piklist_admin::responsive_admin() == true ? plugins_url('piklist/parts/img/piklist-menu-icon.svg') : plugins_url('piklist/parts/img/piklist-icon.png')
      ,'page_icon' => plugins_url('piklist/parts/img/piklist-page-icon-32.png')
    );
	return $pages;
	}
	*/
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