<?php /*
================================================================================
Template Name: Subpages (Main)
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

get_header();

?><!-- page_subpages_main.php -->

<div id="content_wrapper" class="clearfix">

<?php include get_stylesheet_directory() . '/assets/includes/site_banner.php'; ?>

<div class="main_column clearfix">

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
	if ( $subpages->have_posts() ) : ?>

		<?php while ( $subpages->have_posts() ) : $subpages->the_post(); ?>

			<div class="main_column_inner">

			<div class="post post-<?php the_ID(); ?>">

				<div class="entrytext">

					<h3 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h3>

					<?php the_content( '<p class="serif">Read the rest of this page &raquo;</p>' ); ?>

					<?php

					// NOTE: Comment permalinks are filtered if the comment is not on the first page
					// In a multipage post... see: cp_multipage_comment_link in functions.php

					// Set default behaviour.
					$defaults = [
						'before' => '<div class="multipager">',
						'after' => '</div>',
						'link_before' => '',
						'link_after' => '',
						'next_or_number' => 'next',
						'nextpagelink' => '<span class="alignright">' . __( 'Next page' ) . ' &raquo;</span>',
						'previouspagelink' => '<span class="alignleft">&laquo; ' . __( 'Previous page' ).'</span>',
						'pagelink' => '%',
						'more_file' => '',
						'echo' => 1,
					];

					wp_link_pages( $defaults ); ?>

					<?php edit_post_link( 'Edit this entry', '<p>', '</p>' ); ?>

				</div><!-- /entrytext -->

			</div><!-- /post -->

			</div><!-- /main_column_inner -->

		<?php endwhile;

		// Prevent weirdness.
		wp_reset_postdata();

		?>

	<?php endif; ?>

</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>
