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

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

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

			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();{?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php $dir_meta = get_post_meta($post->ID);				?>
		<div class="row" >
			<div class="small-8 columns">
		<?php the_title( '<span itemprop="name"><h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1><span>' ); ?>
			<?php if($dir_meta['listing_street_address'][0] !='') {?>
				<?php echo $dir_meta['listing_street_address'][0];?>, <?php echo $dir_meta['listing_city'][0];?>, <?php echo $dir_meta['listing_postalcode'][0];?><br/><?php }?>
				<a href="<?php get_permalink();?>">VIEW LISTING</a>
					</div>
			<div class="small-4 columns">
												
				<?php if($dir_meta['listing_phone_1'][0] !='') {?><i class="fi-telephone"></i> <?php echo $dir_meta['listing_phone_1'][0];?><?php }?>
		
				<div class="show-for-small">
					<?php if($dir_meta['listing_phone_1'][0] !='') {?><a href="tel:+1<?php echo $dir_meta['listing_phone_1'][0];?>" class="button">CALL NOW</a><?php }?>
				</div>
				</div>
					</div>
					</article>
					<?php }

					

					endwhile;
					// Previous/next page navigation.
					twentyfourteen_paging_nav();

				else :
				
				endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
