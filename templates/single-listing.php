<?php /**
* The template for displaying single listings
*
**/

get_header(); ?>
<div id="primary" class="content-area"><!--PRIMARY-->
		<div id="content" class="site-content" role="main"><!--CONTENT-->
		<?php while ( have_posts() ) : the_post(); ?>
<div class="row"><!--START CONTENT WRAP ROW-->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <!--ARTICLE-->
	<?php $dir_meta = get_post_meta($post->ID);				?>
		<div class="small-12 columns"><!--START CONTENT WRAP COLUMN-->
		<div itemscope itemtype="http://schema.org/LocalBusiness"><!--START LOCAL BUSINESS INFO-->
			<div class="row"><!--START HEADER AREA-->
			<div class="medium-8  columns"><!--TITLE-LOGO-CONTACT-->
			<div class="row"><!--TITLE-LOGO ROW-->
		<div class="medium-8 columns">
		
		<?php the_title( '<span itemprop="name"><h1 class="single-listing-title">', '</h1><span>' ); ?>
			</div>
				<div class="medium-4 columns single-logo" >
							
				<?php echo get_the_post_thumbnail(); ?>
					</div>
					</div><!--END TITLE-LOGO ROW-->
			<div class="row"><!--ADDRESS ROW-->
			<div class="small-12 columns">
			<?php if($dir_meta['listing_street_address'][0] !='') {?>
				<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<span itemprop="streetAddress"><?php echo $dir_meta['listing_street_address'][0]; ?></span>, 
				<span itemprop="addressLocality"><?php echo $dir_meta['listing_city'][0];?></span>,
				<span itemprop="addressRegion"><?php echo $dir_meta['listing_state'][0];?></span>
				<span itemprop="postalCode"><?php echo $dir_meta['listing_postalcode'][0];?></span>
					</div> <!--END POSTAL ADDRESS--><?php } ?>
			</div>
			</div><!--END ADRESS ROW-->
			<div class="row"><!--START LISTING-PHONE-DIRECTIONS-->
			<div class="medium-4 small-12 columns">
			<?php if($dir_meta['listing_phone_1'][0] !='') {?>	
			<i class="fi-telephone single-listing-icon"></i> <a class="single-listing-meta" href="tel:+1<?php echo $dir_meta['listing_phone_1'][0];?>">
						<?php echo $dir_meta['listing_phone_1'][0];?></a>
				<?php }?>
			</div>
			<div class="medium-4 small-12 columns">
				<?php if ($dir_meta['listing_website_url'][0] !='') {?>
			<i class="fi-laptop single-listing-icon"></i> <a class="single-listing-meta" href="http://<?php echo $dir_meta['listing_website_url'][0];?>" target="_blank" rel="nofollow"><?php _e('Website','simple-dir');?></a>
				<?php }?>
			</div>
			<div class="medium-4 small-12 columns">
				
				<?php if($dir_meta['listing_street_address'][0] !='') {?>
				<?php   $mapStreet = get_post_meta($post->ID,'listing_street_address', true);
    	 $mapStreet = preg_replace('/\s+/', '+', $mapStreet);
				  $_SESSION['mapStreet'] = $mapStreet;
				$mapCity = get_post_meta($post->ID,'listing_city',true);
				$mapCity = preg_replace('/\s+/','+',$mapCity);
					$_SESSION['mapCity'] = $mapCity;
				$mapPostcode = get_post_meta($post->ID,'listing_postalcode',true);
				$mapPostcode = preg_replace('/\s+/','+',$mapPostcode);
				$_SESSION['mapPostcode'] = $mapPostcode;
				?>
				<i class="fi-marker single-listing-icon"></i> <a class="single-listing-meta" href="https://www.google.com/maps/dir/Current+Location/<?php echo $_SESSION['mapStreet']; ?>+<?php echo $_SESSION['mapCity']; ?>+<?php echo $_SESSION['mapPostcode']; ?>" target="_blank"
																 ><?php _e('Get Directions','simple-dir');?></a> <?php }?>
			</div>
			</div><!--END PHONE-DIRECTIONS-WEBSITE ROW-->
				
			<div class="row"><!--START SOCIAL ROW-->
			</div><!--END SOCIAL ROW-->
				
			<div class="small-12 columns hide-for-small" id="single-social-block">
			<?php if($dir_meta['listing_status'][0] =='premium') {?>										
	<?php if($dir_meta['listing_facebook'][0] !=''){ ?><a href="<?php echo $dir_meta['listing_facebook'][0];?>" target="_blank" rel="nofollow"> <i class="fi-social-facebook icon-medium"></i></a>&nbsp;<?php }?>					
	<?php if($dir_meta['listing_twitter'][0] !='') {?><a href="http://twitter.com/<?php echo $dir_meta['listing_twitter'][0];?>" rel="nofollow" target="_blank"><i class="fi-social-twitter icon-medium"></i></a>&nbsp;<?php }?>
	<?php if($dir_meta['listing_gplus'][0] !='') {?><a href="<?php echo $dir_meta['listing_gplus'][0];?>" rel="nofollow" target="_blank"><i class="fi-social-google-plus icon-medium"></i></a>&nbsp;<?php }?>											
	<?php if($dir_meta['listing_linkedin'][0] !='') {?><a href="<?php echo $dir_meta['listing_linkedin'][0];?>" rel="nofollow" target="_blank"><i class="fi-social-linkedin icon-medium"></i></a>&nbsp;<?php }?>
	<?php if($dir_meta['listing_youtube'][0] !='') {?><a href="<?php echo $dir_meta['listing_youtube'][0];?>" rel="nofollow" target="_blank"><i class="fi-social-youtube "></i></a>&nbsp;<?php }?>
	<?php if($dir_meta['listing_instagram'][0] !='') {?><a href="http://instagram.com/<?php echo $dir_meta['listing_instagram'][0];?>" rel="nofollow" target="_blank"><i class="fi-social-instagram"></i></a>&nbsp;<?php }?>
	<?php if($dir_meta['listing_pinterest'][0] !='') {?><a href="<?php echo $dir_meta['listing_pinterest'][0];?>" rel="nofollow" target="_blank"?><i class="fi-social-pinterest"></i></a>&nbsp;<?php }?>
	<?php if($dir_meta['listing_rss'][0] !='') {?><a href="<?php echo $dir_meta['listing_rss'][0];?>" rel="nofollow" target="_blank"><i class="fi-rss"></i></a>&nbsp;<?php }?>
													<?php }?>			
			</div>
		</div><!--END TITLE-LOGO-CONTACT-->
		<div class="medium-4 columns hide-for-small"><!--MAP-->
		
			<?php if ($dir_meta['listing_street_address'][0] !='') {?>
			<iframe src="https://www.google.com/maps/embed/v1/search?key=AIzaSyAMFTG0wknrUxibhscMgOXWtcLCUi1tgmM&q=<?php echo $_SESSION['mapStreet']; ?>+<?php echo $_SESSION['mapCity']; ?>+<?php echo $_SESSION['mapPostcode']; ?>" 
			width="350" height="150" frameborder="0" style="border:0"></iframe> <?php }?>
			</div><!-- END MAP-->
		</div><!--END HEADER AREA-->
<div class="row row-padded"><!--CONTENT ROW-->
			<div class="small-12 columns"><!--LISTING DESCRIPTION-->
			<span itemprop="description"><?php the_content(); ?></span>
	
		
		<!--<div class="gallery js-flickity" data-flickity-options='{ "cellAlign": "left", "contain": true, "pageDots":false,"setGallerySize":false}'> -->
					
				<?php	//$image_ids = get_post_meta($post->ID, 'simple_dir_slider_upload'); 
//foreach ($image_ids as $image)
//{
  //$myupload = wp_get_attachment_image_src($image, 'medium');				
//echo '<div class="gallery-cell"><img src="';
//echo $myupload[0];
//echo '"/></div>';
 
   // Displays all data
//}
?><!--</div> -->
			</div><!--END LISTING DESCRIPTION-->
		
		
			</div><!--END CONTENT ROW-->
		</div> <!--END LOCAL BUSINESS INFO-->
		
		
		
</div><!--END CONTENT WRAP COLUMN-->
</article><!--END ARTICLE-->

	<?php endwhile; ?>
<?php 
$directory_settings = get_option('simple_directory_settings');
	$show_sidebar = $directory_settings['single_listing_show_sidebar'];
	if ($show_sidebar == 'yes')
	echo get_sidebar();
	?>

</div> <!--END CONTENT WRAP ROW-->
</div><!--END CONTENT-->
</div><!--END PRIMARY-->

<?php get_footer();?>