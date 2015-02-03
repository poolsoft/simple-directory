<?php

//Search Box Shortcode
function simple_dir_search_shortcode( $form ) {

    $form =' <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label class="screen-reader-text hidden-for-large" for="s">'. _x( 'Search for:', 'label' ). '</label>
		<input type="search" class="search-field" placeholder="'.__( 'Search', 'placeholder' ) .'" value="' .get_search_query().'" name="s" title=" '.__( 'Search for:', 'label' ) .'" />
		
	<input type="hidden" value="listing" name="post_type" id="post_type" />
	<input type="submit" class="search-submit" value="'.esc_attr__( 'Search', 'submit button' ).'" />
</form>';

    return $form;
}

add_shortcode('listing_search', 'simple_dir_search_shortcode');