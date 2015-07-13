<?php
//Address Output
function simple_dir_address_output(){
	global $wp_query;
	$postid = $wp_query->post->ID;
	$dir_meta = get_post_meta($postid);
	if($dir_meta['listing_street_address'][0] !='') {
				echo '<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';
				echo '<span itemprop="streetAddress">' . $dir_meta['listing_street_address'][0] .'</span>,'; 
				echo '<span itemprop="addressLocality">' . $dir_meta['listing_city'][0] . '</span>,';
				echo '<span itemprop="addressRegion">'. $dir_meta['listing_state'][0] .'</span>&nbsp;';
				echo '<span itemprop="postalCode">'. $dir_meta['listing_postalcode'][0] .'</span></div>';}
						else {
						echo '';}
}

function simple_dir_social_block(){
	
	global $wp_query;
	$postid = $wp_query->post->ID;
	$dir_meta = get_post_meta($postid);
 if(isset($dir_meta['listing_facebook'][0]) && $dir_meta['listing_facebook'][0] != '') {
 echo '<a href="'. $dir_meta['listing_facebook'][0] .'" target="_blank" rel="nofollow"> <i class="fi-social-facebook icon-medium"></i></a>&nbsp;'; }					
 if(isset($dir_meta['listing_twitter'][0]) && $dir_meta['listing_twitter'][0] !=''){ 
 echo '<a href="http://twitter.com/'.$dir_meta['listing_twitter'][0].'" rel="nofollow" target="_blank"><i class="fi-social-twitter icon-medium"></i></a>&nbsp;'; }
if(isset($dir_meta['listing_gplus'][0])&& $dir_meta['listing_gplus'][0] != '') {
	echo '<a href="' . $dir_meta['listing_gplus'][0] .'" rel="nofollow" target="_blank"><i class="fi-social-google-plus icon-medium"></i></a>&nbsp;'; }											
if(isset($dir_meta['listing_linkedin'][0]) && $dir_meta['listing_linkedin'][0] !='') { 
echo '<a href="'. $dir_meta['listing_linkedin'][0] . '" rel="nofollow" target="_blank"><i class="fi-social-linkedin icon-medium"></i></a>&nbsp;'; }
if(isset($dir_meta['listing_youtube'][0]) && $dir_meta['listing_youtube'][0] !='') {
	echo '<a href="'. $dir_meta['listing_youtube'][0] .'" rel="nofollow" target="_blank"><i class="fi-social-youtube icon-medium"></i></a>&nbsp;'; }
if(isset($dir_meta['listing_instagram'][0]) && $dir_meta['listing_instagram'][0] !='') {
	echo '<a href="http://instagram.com/'. $dir_meta['listing_instagram'][0] .'" rel="nofollow" target="_blank"><i class="fi-social-instagram icon-medium"></i></a>&nbsp;'; }
if(isset($dir_meta['listing_pinterest'][0])&& $dir_meta['listing_pinterest'][0] !='') { echo '<a href="' . $dir_meta['listing_pinterest'][0] .'" rel="nofollow" target="_blank"><i class="fi-social-pinterest icon-medium"></i></a>&nbsp;'; }
 if(isset($dir_meta['listing_rss'][0]) && $dir_meta['listing_rss'][0] !='') { echo '<a href="' . $dir_meta['listing_rss'][0] .'" rel="nofollow" target="_blank"><i class="fi-rss icon-medium"></i></a>&nbsp;'; }
	
}