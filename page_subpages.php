<?php
/**
 * Template Name: Subpages
 *
 * @since 1.0.0
 * @package The_Ball
 */

get_header();

?><!-- page_subpages.php -->

<div id="content_wrapper" class="clearfix">

<?php $site_banner = locate_template( 'assets/includes/site_banner.php' ); ?>
<?php if ( $site_banner ) : ?>
	<?php load_template( $site_banner ); ?>
<?php endif; ?>

<div class="main_column clearfix">

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php

			$hidden_title = '';
			if ( get_post_meta( get_the_ID(), 'show_heading', true ) == '1' ) {
				$hidden_title = ' class="hidden"';
			}

			?>

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

				<div class="post clearfix">

					<h2 id="post-<?php the_ID(); ?>"<?php echo $hidden_title; ?>><?php the_title(); ?></h2>

					<?php the_content( '<p class="serif">' . __( 'Read the rest of this page &raquo;', 'theball' ) . '</p>' ); ?>

					<?php

					// Set default behaviour.
					$defaults = [
						'before' => '<div class="multipager">',
						'after' => '</div>',
						'link_before' => '',
						'link_after' => '',
						'next_or_number' => 'next',
						'nextpagelink' => '<span class="alignright">' . __( 'Next page', 'theball' ) . ' &raquo;</span>',
						'previouspagelink' => '<span class="alignleft">&laquo; ' . __( 'Previous page', 'theball' ) . '</span>',
						'pagelink' => '%',
						'more_file' => '',
						'echo' => 1,
					];

					wp_link_pages( $defaults );

					?>

					<?php edit_post_link( __( 'Edit this entry', 'theball' ), '<p>', '</p>' ); ?>

				</div><!-- /post -->

			</div><!-- /main_column_inner -->

		<?php endwhile; ?>
	<?php endif; ?>

	<?php

	// -----------------------------------------------------------------------------
	// Subpages
	// -----------------------------------------------------------------------------
	global $post;

	// Set params.
	$args = [
		'order_by' => 'menu_order',
		'order' => 'ASC',
		'post_type' => 'page',
		'post_status' => 'publish',
		'post_parent' => $post->ID,
	];

	// Do query.
	$subpages = new WP_Query( $args );

	// THE LOOP.
	if ( $subpages->have_posts() ) :

		?>

		<?php while ( $subpages->have_posts() ) : ?>
			<?php $subpages->the_post(); ?>

			<div class="main_column_inner">

			<div class="post">

				<div class="entrytext">

					<?php
					$hidden_title = '';
					if ( get_post_meta( get_the_ID(), 'show_heading', true ) == '1' ) {
						$hidden_title = ' class="hidden"';
					}
					?>

					<h3 id="post-<?php the_ID(); ?>"<?php echo $hidden_title; ?>><?php the_title(); ?></h3>

					<?php the_content( '<p class="serif">' . __( 'Read the rest of this page &raquo;', 'theball' ) . '</p>' ); ?>

					<?php

					/*
					 * NOTE: Comment permalinks are filtered if the comment is not on the first page
					 * In a multipage post... see: cp_multipage_comment_link in functions.php
					 */

					// Set default behaviour.
					$defaults = [
						'before' => '<div class="multipager">',
						'after' => '</div>',
						'link_before' => '',
						'link_after' => '',
						'next_or_number' => 'next',
						'nextpagelink' => '<span class="alignright">' . __( 'Next page', 'theball' ) . ' &raquo;</span>',
						'previouspagelink' => '<span class="alignleft">&laquo; ' . __( 'Previous page', 'theball' ) . '</span>',
						'pagelink' => '%',
						'more_file' => '',
						'echo' => 1,
					];

					wp_link_pages( $defaults );

					?>

					<?php edit_post_link( __( 'Edit this entry', 'theball' ), '<p>', '</p>' ); ?>

				</div><!-- /entrytext -->

			</div><!-- /post -->

			</div><!-- /main_column_inner -->

		<?php endwhile; ?>

		<?php

		// Prevent weirdness.
		wp_reset_postdata();

		?>

	<?php endif; ?>

</div><!-- /main_column -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
