<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div class="row row-padded">
	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php 
				if ( have_posts() ) :
				
				?>
				
			<header class="listing-archive-header row">
				
	<div class="medium-3 columns">
	<img src="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>"></div>
			<div class="medium-9 columns">
				<h1 class="archive-title"><?php echo single_cat_title('',false);?></h1>
		<?php
					
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
	
			</header><!-- .archive-header -->
<!--START THE TEST PREMIUM LOOP -->
	
			<?php 
				
					// Start the Loop.
					while ( have_posts() ) : the_post();{?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php $dir_meta = get_post_meta($post->ID);				?>
		<div class="row" >
			<div class="small-8 columns">
		<?php the_title( '<span itemprop="name"><h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1><span>' ); ?>
			<?php if($dir_meta['listing_status'][0]=='premium'){?><i class="fi-star"></i>PREMIUM LISTING<br/><?php }?>
				<?php if($dir_meta['listing_street_address'][0] !='') {?>
				<?php echo $dir_meta['listing_street_address'][0];?>, <?php echo $dir_meta['listing_city'][0];?>, <?php echo $dir_meta['listing_postalcode'][0];?><br/>
				<?php echo get_the_term_list($post->ID,'listing_category','<strong>Listed Under:</strong>','&nbsp;','');?>
				<?php }?>
				
					</div>
			<div class="small-4 columns">
												
				<?php if($dir_meta['listing_phone_1'][0] !='') {?><i class="fi-telephone"></i> <?php echo $dir_meta['listing_phone_1'][0];?><?php }?>
		
				<div class="show-for-small">
					<?php if($dir_meta['listing_phone_1'][0] !='') {?><a href="tel:+1<?php echo $dir_meta['listing_phone_1'][0];?>" class="button">CALL NOW</a><?php }?>
				</div>
				</div>
					</div>
					</article>
					<div class="row row-padded">
					</div>
					<?php }

					

					endwhile;
					// Previous/next page navigation.
					next_posts_link('Previous Listings');
					previous_posts_link('Next Listings');

				else :
				
				endif;
				wp_reset_postdata();
			?>
		</div><!-- #content -->
		<?php rewind_posts(); ?>
		
	</section><!-- #primary -->

<?php
$directory_settings = get_option('simple_directory_settings');
 $show_sidebar = $directory_settings['archive_listings_show_sidebar'];
 if ($show_sidebar == 'yes')
 echo get_sidebar();
 ?>
 </div>
 <?php

get_footer();
