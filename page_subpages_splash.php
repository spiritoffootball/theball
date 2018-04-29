<?php /*
================================================================================
Template Name: Subpages with Splash
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

Although the functionality of this template and the more basic "Subpages" one is
the same, we need to use this template for pages that use a "splash_image" in
the content of the parent post so that responsiveness is *not* applied to every
instance of the parent post.

--------------------------------------------------------------------------------
*/

get_header();

?>

<!-- page_subpages_splash.php -->

<div id="content_wrapper" class="clearfix">

<?php include( get_stylesheet_directory() . '/assets/includes/site_banner.php' ); ?>

<div class="main_column clearfix">

	<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

		<?php
		$hidden_title = '';
		if ( get_post_meta( get_the_ID(), 'show_heading', true ) == '1' ) {
			$hidden_title = ' class="hidden"';
		}
		?>

		<div class="main_column_inner" id="main_column_splash">

			<?php

			// init
			$has_feature_image = false;
			$feature_image_class = '';

			// do we have a feature image?
			if ( has_post_thumbnail() ) {
				$has_feature_image = true;
				$feature_image_class = ' has_feature_image';
			}

			?>

			<div class="post_header<?php echo $feature_image_class; ?>">

				<div class="post_header_inner">

					<?php

					// show feature image when we have one
					if ( $has_feature_image ) {
						echo get_the_post_thumbnail( get_the_ID(), 'medium-640' );
					}

					?>

				</div><!-- /post_header_inner -->

			</div><!-- /post_header -->

			<div class="post clearfix">

				<h2 id="post-<?php the_ID(); ?>"<?php echo $hidden_title; ?>><?php the_title(); ?></h2>

				<?php the_content( '<p class="serif">' . __( 'Read the rest of this page &raquo;', 'theball' ) . '</p>' ); ?>

				<?php

				// set default behaviour
				$defaults = array(
					'before' => '<div class="multipager">',
					'after' => '</div>',
					'link_before' => '',
					'link_after' => '',
					'next_or_number' => 'next',
					'nextpagelink' => '<span class="alignright">'. __( 'Next page' ) . ' &raquo;</span>',
					'previouspagelink' => '<span class="alignleft">&laquo; ' . __( 'Previous page' ) . '</span>',
					'pagelink' => '%',
					'more_file' => '',
					'echo' => 1,
				);

				wp_link_pages( $defaults ); ?>

				<?php edit_post_link( __( 'Edit this entry' ), '<p>', '</p>' ); ?>

			</div><!-- /post -->

		</div><!-- /main_column_inner -->

	<?php endwhile; endif; ?>

	<?php

	// -----------------------------------------------------------------------------
	// Subpages
	// -----------------------------------------------------------------------------
	global $post;

	// set params
	$args = array(
		'order_by' => 'menu_order',
		'order' => 'ASC',
		'post_type' => 'page',
		'post_status' => 'publish',
		'post_parent' => $post->ID,
	);

	// do query
	$subpages = new WP_Query( $args );

	// THE LOOP
	if ( $subpages->have_posts() ) : ?>

		<?php while ( $subpages->have_posts() ) : $subpages->the_post(); ?>

			<div class="main_column_inner">

			<div class="post">

				<div class="entrytext">

					<h3 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h3>

					<?php the_content( '<p class="serif">' . __( 'Read the rest of this page &raquo;', 'theball' ) . '</p>' ); ?>

					<?php

					// NOTE: Comment permalinks are filtered if the comment is not on the first page
					// in a multipage post... see: cp_multipage_comment_link in functions.php

					// set default behaviour
					$defaults = array(
						'before' => '<div class="multipager">',
						'after' => '</div>',
						'link_before' => '',
						'link_after' => '',
						'next_or_number' => 'next',
						'nextpagelink' => '<span class="alignright">' . __( 'Next page' ) . ' &raquo;</span>',
						'previouspagelink' => '<span class="alignleft">&laquo; ' . __( 'Previous page' ) . '</span>',
						'pagelink' => '%',
						'more_file' => '',
						'echo' => 1,
					);

					wp_link_pages( $defaults ); ?>

					<?php edit_post_link( __( 'Edit this entry' ), '<p>', '</p>' ); ?>

				</div><!-- /entrytext -->

			</div><!-- /post -->

			</div><!-- /main_column_inner -->

		<?php endwhile;

		// prevent weirdness
		wp_reset_postdata();

		?>

	<?php endif; ?>

</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>