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
	</div>
			</header><!-- .archive-header -->

<div>
	<?php while ( have_posts() ) : the_post();{?>
<?php $dir_meta = get_post_meta($post->ID);	
											   if (isset($dir_meta['listing_status'][0]) && $dir_meta['listing_status'][0] == 'premium') {?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<?php if(has_post_thumbnail()){?>
		<div class="medium-2 columns hide-for-small">
		<?php the_post_thumbnail(); ?>
		</div><?php }?>
<div class="small-7 columns">
				
<?php the_title( '<span itemprop="name"><h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a> &nbsp;<i class="fi-star"></i></h3><span>' ); ?>
<?php if($dir_meta['listing_street_address'][0] !='') {?>
				<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<span itemprop="streetAddress"><?php echo $dir_meta['listing_street_address'][0]; ?></span>, 
				<span itemprop="addressLocality"><?php echo $dir_meta['listing_city'][0];?></span>,
				<span itemprop="addressRegion"><?php echo $dir_meta['listing_state'][0];?></span>
				<span itemprop="postalCode"><?php echo $dir_meta['listing_postalcode'][0];?></span>
					</div> <!--END POSTAL ADDRESS--><?php } ?>	

	</div>

	<div class="small-4 medium-3 columns">
		<div class="row">
			<a href="<?php echo esc_url(get_permalink());?>" class="single-listing-meta"><i class="fi-list-thumbnails"></i> <?php _e('DETAILS','simple-dir');?></a>
		</div>
		<div class="row hide-for-small-only">
		
		<?php if($dir_meta['listing_phone_1'][0] !='') {?>	
			<i class="fi-telephone single-listing-icon"></i> <a class="single-listing-meta" href="tel:+1<?php echo $dir_meta['listing_phone_1'][0];?>">
						<?php echo $dir_meta['listing_phone_1'][0];?></a>
				<?php }?>
		</div>
		<div class="row show-for-small-only">
			<?php if($dir_meta['listing_phone_1'][0] !='') {?>	
			 <a class=" button small" href="tel:<?php echo $dir_meta['listing_phone_1'][0];?>">
						<i class="fi-telephone "></i> <?php _e('CALL NOW','simple-dir');?></a>
				<?php }?>
		</div>
		</div>
	</div> 	
		</article>
	<hr class="simple-break">
<?php }
					
											
	 if (isset($dir_meta['listing_status'][0]) && $dir_meta['listing_status'][0] == 'basic') {?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="row">
		<div class="small-8 medium-9 columns">
			
	
<?php the_title( '<span itemprop="name"><h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3><span>' ); ?>
	<?php if($dir_meta['listing_street_address'][0] !='') {?>
				<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<span itemprop="streetAddress"><?php echo $dir_meta['listing_street_address'][0]; ?></span>, 
				<span itemprop="addressLocality"><?php echo $dir_meta['listing_city'][0];?></span>,
				<span itemprop="addressRegion"><?php echo $dir_meta['listing_state'][0];?></span>
				<span itemprop="postalCode"><?php echo $dir_meta['listing_postalcode'][0];?></span>
					</div> <!--END POSTAL ADDRESS--><?php } ?>	

	</div>
		
		<div class="small-4 medium-3 columns">
			<div class="row">
			<a href="<?php echo esc_url(get_permalink());?>" class="single-listing-meta"><i class="fi-list-thumbnails"></i> <?php _e('DETAILS','simple-dir');?></a>
		</div>
		</div>
	</div></article>
	<hr>
		<?php ?>
<?php }?>
											   <?php } 
	endwhile;
					// Previous/next page navigation.
					next_posts_link('Previous Listings');
					previous_posts_link('Next Listings');

				else :
				
				endif;?>
				
			</div>
 </div>
 </section>
 </div>
 <?php

get_footer();