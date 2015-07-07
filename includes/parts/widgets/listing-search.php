<?php
/*
Title: Listing Search Widget
Description: Search Within Listings Only
*/
echo $before_widget; ?>
 
<?php echo $before_title; ?>
 <?php echo $settings['search_widget_title'];?>
<?php echo $after_title; ?>
 <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php echo $settings['search_widget_text'] ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		
	</label>
	<input type="hidden" value="listing" name="post_type" id="post_type" />
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
<?php echo $after_widget; ?>