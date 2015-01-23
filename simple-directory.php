<?php
/**
 * Plugin Name: Simple Directory Plugin
 * Plugin URI: http://lautman.ca
 * Description: Creates a very simple business listing post type.
 * Version:0.6.1
 * Author: michaellautman
 * Author URI: http://lautman.ca
 * Plugin Type: Piklist
 *

 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume 
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *

 * @license http://www.gnu.org/licenses/old-licenses/gpl-3.0.html
 */

/* Launch the plugin. */



/*Include the Piklist Checker*/
add_action('init', 'simple_dir_check_for_piklist');
function simple_dir_check_for_piklist()
{
  if(is_admin())
  {
   include_once('class-piklist-checker.php');
 
   if (!piklist_checker::check(__FILE__))
   {
     return;
   }
  }
}

/*Create The Listing Post Type*/
add_filter('piklist_post_types', 'listing_post_type');
 function listing_post_type($post_types)
 {
  $post_types['listing'] = array(
    'labels' => piklist('post_type_labels', 'Listings')
    ,'title' => __('Simple Business Listings')
    ,'public' => true
	  ,'has_archive' => 'true'
	  ,'capability_type' => 'page'
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
    ,'hide_meta_box' => array(
      'slug'
      ,'author'
      ,'revisions'
      ,'comments'
      ,'commentstatus'
    )
	 ,'status' => array(
	 	'draft' => array(
			'label' => 'Draft')
	 
	 	,'premium' => array(
			'label' => 'Premium Listing')
		 
		 ,'basic' => array(
		 	'label' => 'Basic Listing')
	 ) 
  );
return $post_types;
}

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

foreach ( array( 'pre_term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_filter_kses' );
}
 
foreach ( array( 'term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_kses_data' );
}
/*Load the Appropriate Templates*/
add_filter( 'template_include', 'insert_my_template' );

function insert_my_template( $template )
{
    if ( 'listing' === get_post_type() && is_single() )
        return dirname( __FILE__ ) . '/templates/single-listing.php';
	if ( 'listing' === get_post_type() && is_archive())
		return dirname(__FILE__) . '/templates/archive-listing.php';
		
    return $template;
}
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} // end if

require_once( plugin_dir_path( __FILE__ ) . 'class-page-template.php' );
add_action( 'plugins_loaded', array( 'Page_Template_Plugin', 'get_instance' ) );
/*Get The CSS*/
// Register Style
function simple_directory_styles() {

	wp_register_style( 'simple-directory-foundation', plugins_url('simple-directory/foundation.css', dirname(__FILE__)), false, false );
	wp_enqueue_style( 'simple-directory-foundation' );
	wp_register_style('simple-directory-ficons', plugins_url('simple-directory/foundation-icons/foundation-icons.css', dirname(__FILE__)),false, false);
	wp_enqueue_style ('simple-directory-ficons');
	wp_register_style('simple-directory-style', plugins_url('simple-directory/style.css', dirname(__FILE__)),false, false);
	wp_enqueue_style('simple-directory-style');

}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'simple_directory_styles');

/*Get Required/Recommended Plugins*/
require_once   'class-tgm-plugin-activation.php';



add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(



        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'Categories Images',
            'slug'      => 'categories-images',
            'required'  => false,
        ),
		array(
			'name'	=> 'Allow HTML in Category Descriptions',
			'slug' =>	'allow-html-in-category-descriptions',
			'required' => false,
			),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}

