<?php
/**
 * Template Name: Page Rich Two Columns
 *
 * @since 1.0.0
 *
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- page-rich-two-cols.php -->

<div id="content_wrapper" class="clearfix">

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<div id="site_banner" class="site_banner_rich clearfix">

				<div id="site_banner_inner" class="clearfix">

					<div class="splash_widget_col">

						<div class="splash_main_widget">

							<div class="widget widget_featured_page">

								<?php

								// Init.
								$has_feature_image   = false;
								$feature_image_class = '';

								// Do we have a Feature Image?
								if ( has_post_thumbnail() ) {
									$has_feature_image   = true;
									$feature_image_class = ' has_feature_image';
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
											<?php if ( get_field( 'header_title' ) ) : ?>
												<h2<?php echo $hidden_title; ?>><?php the_field( 'header_title' ); ?> <?php edit_post_link( __( 'Edit this entry', 'theball' ), '<span>', '</span>' ); ?></h2>
											<?php else : ?>
												<h2<?php echo $hidden_title; ?>><?php the_title(); ?> <?php edit_post_link( __( 'Edit this entry', 'theball' ), '<span>', '</span>' ); ?></h2>
											<?php endif; ?>
										</div><!-- /post_title -->

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
						</div>

					</div>

					<div class="splash_right_widget">
						<div id="splash_right">
							<?php dynamic_sidebar( 'sof-top-right-page' ); ?>
						</div>
					</div>

				</div><!-- /site_banner_inner -->

			</div><!-- /site_banner -->

			<div id="cols" class="two-cols clearfix">
			<div class="cols_inner">

				<div class="main_column clearfix">

					<div class="main_column_inner">
						<div class="post page_content">
							<?php the_content(); ?>
						</div>
					</div>

				</div><!-- /main_column -->

				<?php get_sidebar(); ?>

			</div><!-- /.cols_inner -->
			</div><!-- /#cols -->

		<?php endwhile; ?>
	<?php endif; ?>

</div><!-- /#content_wrapper -->

<?php get_footer( 'page-rich' ); ?>
