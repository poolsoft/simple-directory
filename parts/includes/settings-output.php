<?php
//Inject Custom CSS
if ('listing' === get_post_type()){
add_action( 'wp_head', 'simple_directory_custom_styles' );
}
function simple_directory_custom_styles() { 

  echo '<style type="text/css" id="sdir-custom-css">' . "\n";
 $directory_settings = get_option('simple_directory_settings');
	$custom_css = $directory_settings['listing_custom_css'];
	echo $custom_css;
  echo '</style>' . "\n";

}
//Footer Credit Link
function simple_directory_credit_link(){
	echo '<p>Simple Directory Plugin by <a href="http://mywestisland.info" target="_blank" title="West Island Business Directory">MyWestIsland.INFO: The West Island Business Directory</a>.</p>';
}
$directory_settings = get_option('simple_directory_settings');
$credit_link = $directory_settings['show_credit_link'];
if ($credit_link =='yes'){
	add_action('wp_footer','simple_directory_credit_link');
}