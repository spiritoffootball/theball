<?php /*
================================================================================
Template Name: Archives
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

get_header();

?><!-- archives.php -->

<div id="content_wrapper" class="clearfix">

<?php $site_banner = locate_template( 'assets/includes/site_banner.php' ); ?>
<?php if ( $site_banner ) : ?>
	<?php load_template( $site_banner ); ?>
<?php endif; ?>

<div class="main_column clearfix">

	<div class="main_column_inner" id="main_column_splash">

		<?php

		// Init.
		$has_feature_image = false;
		$feature_image_class = '';

		// Do we have a feature image?
		if ( has_post_thumbnail() ) {
			$has_feature_image = true;
			$feature_image_class = ' has_feature_image';
		}

		?>

		<div class="post_header<?php echo $feature_image_class; ?>">

			<div class="post_header_inner">

				<?php

				// Show feature image when we have one.
				if ( $has_feature_image ) {
					echo get_the_post_thumbnail( get_the_ID(), 'medium-640' );
				}

				?>

			</div><!-- /post_header_inner -->

		</div><!-- /post_header -->

		<div class="post">
			<h2><?php printf( __( '%s Archives', 'theball' ), get_bloginfo( 'title', 'display' ) ); ?></h2>
		</div><!-- /post -->

	</div><!-- /main_column_inner -->

	<div class="main_column_inner">

		<div class="post">

			<div class="archive_wrapper">

				<h3><?php

				/**
				 * Filter the title of the "Topics" section.
				 *
				 * @since 1.0.0
				 *
				 * @param string The default title.
				 * @return string The modified title.
				 */
				echo apply_filters( 'theball_topics_title', __( 'Topics', 'theball' ) );

				?></h3>

				<?php

				// Configure categories.
				$defaults = [
					'show_option_all' => '',
					'orderby' => 'name',
					'order' => 'ASC',
					'show_last_update' => 0,
					'style' => 'list',
					'show_count' => 0,
					'hide_empty' => 1,
					'use_desc_for_title' => 1,
					'child_of' => 0,
					'feed' => '',
					'feed_type' => '',
					'feed_image' => '',
					'exclude' => '',
					'exclude_tree' => '',
					'current_category' => 0,
					'hierarchical' => true,
					'title_li' => '',
					'echo' => 1,
					'depth' => 0,
				];

				?>
				<ul>
					<?php wp_list_categories( $defaults ); ?>
				</ul>

			</div><!-- /archive_wrapper -->

		</div><!-- /post -->

	</div><!-- /main_column_inner -->

	<div class="main_column_inner">

		<div class="post">

			<div class="archive_wrapper">

				<h3><?php _e( 'Archives by Month', 'theball' ); ?></h3>

				<?php

				// Configure archives.
				$defaults = [
					'type' => 'monthly',
					'limit' => '',
					'format' => 'html',
					'before' => '',
					'after' => '',
					'show_post_count' => false,
					'echo' => 1,
				];

				?>
				<ul>
					<?php wp_get_archives( $defaults ); ?>
				</ul>

			</div><!-- /archive_wrapper -->

		</div><!-- /post -->

	</div><!-- /main_column_inner -->

</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>
