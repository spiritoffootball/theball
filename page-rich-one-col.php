<?php /*
================================================================================
Template Name: Page Rich One Column
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

get_header(); ?><!-- page-rich-one-col.php -->

<div id="content_wrapper" class="clearfix">

	<?php /* $page_list = locate_template( 'assets/includes/page_list.php' ); ?>
	<?php if ( $page_list ) : ?>
		<?php load_template( $page_list ); ?>
	<?php endif; */ ?>


	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>



			<div id="site_banner" class="site_banner_rich clearfix">

				<div id="site_banner_inner" class="clearfix">

					<div class="splash_widget_col">

						<div class="splash_main_widget">

							<div class="widget widget_featured_page">

								<?php

								// Get the Featured Video.
								$header_video = get_field( 'header_video' );

								// Don't show Feature Image if we have a Video.
								if ( $header_video ) {
									$feature_image_class = ' has_feature_video';
								} else {

									// Do we have a Feature Image?
									if (  $image_size != 'no-thumbnail' AND has_post_thumbnail() ) {
										$has_feature_image = true;
										$feature_image_class = ' has_feature_image';
									}

								}

								$hidden_title = '';
								if ( get_post_meta( get_the_ID(), 'show_heading', true ) == '1' ) {
									$hidden_title = ' class="hidden"';
								}

								?>

								<div class="post_inner<?php echo $feature_image_class; ?>">

									<div class="post_header">

										<?php if ( $has_feature_image ) : ?>
											<?php the_post_thumbnail( get_the_ID(), 'medium-640' ); ?>
										<?php endif; ?>

										<div class="post_title">
											<h2<?php echo $hidden_title; ?>><?php the_title(); ?> <?php edit_post_link( 'Edit this entry', '<span>', '</span>' ); ?></h2>
										</div><!-- /post_title -->

										<?php if ( $header_video ) : ?>
											<div class="post_video">
												<?php the_field( 'header_video' ); ?>
											</div><!-- /post_video -->
										<?php endif; ?>

									</div><!-- /post_header -->

									<div class="post_excerpt">
										<?php if ( get_field( 'header_content' ) ) : ?>
											<?php the_field( 'header_content' ); ?>
										<?php endif; ?>
									</div><!-- /post_excerpt -->

								</div>

							</div>

						</div>

						<div class="splash_sub_widget">
							<?php ?>
						</div>

					</div>

					<div class="splash_right_widget">
						<?php dynamic_sidebar( 'sof-top-right-page' ); ?>
					</div>

				</div><!-- /site_banner_inner -->

			</div><!-- /site_banner -->



			<div id="cols" class="one-col clearfix">
			<div class="cols_inner">

				<div class="main_column clearfix">

					<div class="post page_content">
						<?php the_content(); ?>
					</div>

					<?php $subpages_template = locate_template( 'assets/includes/subpages.php' ); ?>
					<?php if ( $subpages_template ) : ?>
						<?php load_template( $subpages_template ); ?>
					<?php endif; ?>

				</div><!-- /main_column -->

			</div><!-- /.cols_inner -->
			</div><!-- /#cols -->



		<?php endwhile; ?>
	<?php endif; ?>


</div><!-- /#content_wrapper -->





<?php get_footer( 'page-rich' ); ?>