<?php /**
* The template for displaying single listings
*
**/

get_header(); ?>
<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
<div class="row">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php $dir_meta = get_post_meta($post->ID);				?>
		<div class="small-12 columns">
			
			
		<div itemscope itemtype="http://schema.org/LocalBusiness">
		<div class="row">
			
			
			<div class="medium-5 columns">
		
		<?php the_title( '<span itemprop="name"><h1 class="entry-title">', '</h1><span>' ); ?>
			</div>
				<div class="medium-3 columns end">
					
				
				<?php echo get_the_post_thumbnail(); ?>
					</div>
			</div>			
			<div class="row">
				
			
			<div class="medium-8 columns">
				
			
						<?php if($dir_meta['listing_street_address'][0] !='') {?>
				<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<span itemprop="streetAddress"><?php echo $dir_meta['listing_street_address'][0]; ?></span>, 
				<span itemprop="addressLocality"><?php echo $dir_meta['listing_city'][0];?></span>,
				<span itemprop="addressRegion"><?php echo $dir_meta['listing_state'][0];?></span>
				<span itemprop="postalCode"><?php echo $dir_meta['listing_postalcode'][0];?></span>
					</div> <!--END POSTAL ADDRESS-->
				<?php } ?>
				<div class="row"><!--START LISTING-PHONE-DIRECTIONS-->
			<div class="medium-4 small-12 columns">
			<?php if($dir_meta['listing_phone_1'][0] !='') {?>	
			<i class="fi-telephone single-listing-icon"></i> <a class="single-listing-meta" href="tel:+1<?php echo $dir_meta['listing_phone_1'][0];?>">
						<?php echo $dir_meta['listing_phone_1'][0];?></a>
				<?php }?>
			</div>
			<div class="medium-4 small-12 columns">
				<?php if ($dir_meta['listing_website_url'][0] !='') {?>
			<i class="fi-laptop single-listing-icon"></i> <a class="single-listing-meta" href="http://<?php echo $dir_meta['listing_website_url'][0];?>?source=mywestisland" target="_blank" rel="nofollow">
			<?php echo $dir_meta['listing_website_url'][0];?></a>
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
																 >Get Directions</a> <?php }?>
			</div>
				</div>
				<div class="row">
				<div class="small-12 columns" id="single-social-block">
												<div class="small-12 columns">
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
					</div>
			<?php echo get_the_term_list($post->ID,'listing_category','Listed Under:','&nbsp;','');?>
			</div><!--END ROW-->
			</div><!--END COLUMN-->
		
			<div class="medium-4 columns">
		
			<?php if ($dir_meta['listing_street_address'][0] !='') {?>
			<iframe src="https://www.google.com/maps/embed/v1/search?key=AIzaSyAMFTG0wknrUxibhscMgOXWtcLCUi1tgmM&q=<?php echo $_SESSION['mapStreet']; ?>+<?php echo $_SESSION['mapCity']; ?>+<?php echo $_SESSION['mapPostcode']; ?>" 
			width="350" height="150" frameborder="0" style="border:0"></iframe> <?php }?>
			</div><!--END COLUMN-->
		
			
			<div class="row">
			<div class="small-8 columns">
			<span itemprop="description"><?php the_content(); ?></span>
			</div>
			</div>
		</div><!--END LOCAL BUSINESS-->
			</div>
		</article> <!--END ARTICLE-->
</div><!--END ROW-->
	</div><!--END SITE-CONTENT-->
			
</div><!--END CONTENT AREA-->

<?php 
$directory_settings = get_option('simple_directory_settings');
	$show_sidebar = $directory_settings['single_listing_show_sidebar'];
	if ($show_sidebar == 'yes')
	echo get_sidebar();
	?>
	
<?php get_footer();?>