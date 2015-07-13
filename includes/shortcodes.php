<?php

//Search Box Shortcode
function simple_dir_search_shortcode( $form ) {

     $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="assistive-text" for="s">' . __('Search for:') . '</label>
    <input type="search" placeholder="'.__("Enter term...").'" value="' . get_search_query() . '" name="s" id="s" />
	<input type="hidden" name="post_type" value="listings" />
    <input type="submit" id="searchsubmit" value="Search" />
    </form>';

    return $form;
}

add_shortcode('listing_search', 'simple_dir_search_shortcode');