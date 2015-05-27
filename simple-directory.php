<?php
/**
 * Plugin Name: Simple Directory Plugin
 * Plugin URI: http://lautman.ca/simple-directory/
 * Description: Creates a very simple business listing post type.
 * Version:1.4.1
 * Author: michaellautman
 * Author URI: http://lautman.ca
 * Plugin Type: Piklist
 * Donate Link: http://lautman.ca/simple-directory/
 * Text Domain: simple-dir
 * Domain Path: /languages

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


// Launch the plugin. 
//Include the Piklist Checker

add_action('init', 'simple_dir_check_piklist');
function simple_dir_check_piklist()
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
add_action( 'plugins_loaded', 'simple_dir_load_textdomain' );
/**
 * Load plugin textdomain. 
 *
 * @since 1.0.0
 */
function simple_dir_load_textdomain() {
  load_plugin_textdomain( 'simple-dir', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
 //Create The Listing
include_once ('includes/create-listing.php');
//Edit The List Post Page
//include_once ('includes/custom-admin.php');
//Activate Sitelinks Search Box
include_once ('includes/sitelinks-searchbox-markup.php');
//Get The Shortcodes
include_once ('includes/shortcodes.php');
//Load The Templates
//include_once('includes/load-templates.php');
add_filter( 'template_include', 'simple_dir_load_templates' );
function simple_dir_load_templates( $template )
{
 if ( 'listing' === get_post_type() && is_single() )
 return dirname( __FILE__ ) . 'templates/single-listing.php';
	if ( 'listing' === get_post_type() && is_archive())
		return dirname(__FILE__) . 'templates/archive-listing.php';
		
 return $template;
}

//Customize the Query
include_once ('includes/query.php');
//Create The Settings Page
//include_once('includes/settings.php');
  add_filter('piklist_admin_pages', 'simple_directory_setting_pages');
  function simple_directory_setting_pages($pages)
  {
     $pages[] = array(
      'page_title' => __('Custom Settings')
      ,'menu_title' => __('Settings', 'piklist')
      ,'sub_menu' => 'edit.php?post_type=listing' 
      ,'capability' => 'manage_options'
      ,'menu_slug' => 'custom_settings'
      ,'setting' => 'simple_directory_settings'
      ,'menu_icon' => plugins_url('piklist/parts/img/piklist-icon.png')
      ,'page_icon' => plugins_url('piklist/parts/img/piklist-page-icon-32.png')
      ,'single_line' => true
      ,'default_tab' => 'Basic'
      ,'save_text' => 'Save  Settings'
    );
		return $pages;
  }

 add_filter('piklist_admin_pages','simple_directory_guide_page');
  function simple_directory_guide_page($pages){
 

    $pages[] = array(
      'page_title' => __('Welcome To Simple Directory', 'simple-dir')
      ,'menu_title' => 'About'
		,'sub_menu' => 'edit.php?post_type=listing'
      ,'capability' => 'manage_options'
      ,'menu_slug' => 'simple-directory-guide'
      ,'single_line' => false
      ,'menu_icon' => piklist_admin::responsive_admin() == true ? plugins_url('piklist/parts/img/piklist-menu-icon.svg') : plugins_url('piklist/parts/img/piklist-icon.png')
      ,'page_icon' => plugins_url('piklist/parts/img/piklist-page-icon-32.png')
    );
	return $pages;
	}
//Output the Settings
include_once('includes/settings-output.php');
	
//Load Geolocation
//include_once('includes/geo/geo.php');
/*function simple_dir_geo(){
	wp_register_script ('geo', plugins_url('simple-directory/includes/geo/geo.js'),false, false, true);
	wp_enqueue_script('geo');
}
add_action ('wp_enqueue_scripts','simple_dir_geo');
*/

// Register Style
function simple_directory_styles() {

	wp_register_style ('simple-directory-normalize', plugins_url('simple-directory/css/normalize.css', dirname(__FILE__)), false, false);
	wp_enqueue_style ('simple-directory-normalize');
	$directory_settings = get_option('simple_directory_settings');
	$use_foundation = $directory_settings['simple_directory_disable_foundation'] == 'no';
  if ($use_foundation) {
	wp_register_style( 'simple-directory-foundation', plugins_url('simple-directory/css/foundation.css', dirname(__FILE__)), false, false );
		wp_enqueue_style( 'simple-directory-foundation' );
  }
	wp_register_style('simple-directory-ficons', plugins_url('simple-directory/foundation-icons/foundation-icons.css', dirname(__FILE__)),false, false);
	wp_enqueue_style ('simple-directory-ficons');
	wp_register_style('simple-directory-style', plugins_url('simple-directory/style.css', dirname(__FILE__)),false, false);
	wp_enqueue_style('simple-directory-style');
}

add_action( 'wp_enqueue_scripts', 'simple_directory_styles');


/*Get Required/Recommended Plugins*/
require_once 'class-simple-dir-plugin-activation.php';



add_action( 'tgmpa_register', 'simple_directory_register_required_plugins' );
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
function simple_directory_register_required_plugins() {


$plugins = array(




 array(
 'name' => 'Categories Images',
 'slug' => 'categories-images',
 'required'  => false,
),
array(
	'name' =>'Allow HTML In Category Descriptions',
	'slug' =>'allow-html-in-category-descriptions',
	'required' => false,
	),

 );


 $config = array(
 'default_path' => '', // Default absolute path to pre-packaged plugins.
 'menu' => 'tgmpa-install-plugins', // Menu slug.
 'has_notices'  => true,// Show admin notices or not.
 'dismissable'  => true, // If false, a user cannot dismiss the nag message.
'dismiss_msg'  => '', // If 'dismissable' is false, this message will be output at top of nag.
'is_automatic' => false, // Automatically activate plugins after installation or not.
'message' => '',// Message to output right before the plugins table.
'strings' => array(
 'page_title' => __( 'Install Required Plugins', 'simple-dir' ),
 'menu_title' => __( 'Install Plugins', 'simple-dir' ),
 'installing' => __( 'Installing Plugin: %s', 'simple-dir' ), // %s = plugin name.
 'oops' => __( 'Something went wrong with the plugin API.', 'simple-dir' ),
 'notice_can_install_required' => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
 'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
 'notice_cannot_install' => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
 'notice_can_activate_required' => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
 'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
 'notice_cannot_activate' => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
 'notice_ask_to_update' => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
 'notice_cannot_update' => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
 'install_link' => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
 'activate_link' => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
 'return' => __( 'Return to Required Plugins Installer', 'simple-dir' ),
 'plugin_activated' => __( 'Plugin activated successfully.', 'simple-dir' ),
 'complete' => __( 'All plugins installed and activated successfully. %s', 'simple-dir' ), // %s = dashboard link.
 'nag_type'=> 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
 )
);

 tgmpa( $plugins, $config );

}



