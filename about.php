<?php
/**
 * Template Name: About
 *
 * @since 1.0.0
 *
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- about.php -->

<div id="content_wrapper" class="clearfix">

<?php $site_banner = locate_template( 'assets/includes/site_banner.php' ); ?>
<?php if ( $site_banner ) : ?>
	<?php load_template( $site_banner ); ?>
<?php endif; ?>

<div class="main_column clearfix">

	<?php

	// -----------------------------------------------------------------------------
	// Content
	// -----------------------------------------------------------------------------
	global $post;

	// Set params.
	$args = [
		'order_by'    => 'menu_order',
		'order'       => 'ASC',
		'post_type'   => 'page',
		'post_status' => 'publish',
		'post_parent' => $post->ID,
	];

	// Do query.
	$parent_page = new WP_Query( $args );

	// THE LOOP.
	if ( $parent_page->have_posts() ) :

		$tmp = 0;

		while ( $parent_page->have_posts() ) :
			$parent_page->the_post();

			?>

			<div class="main_column_inner"<?php echo ( $tmp == 0 ) ? ' id="main_column_splash"' : ''; ?>>

				<div class="post">

					<div class="entrytext">

						<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>

						<?php the_content( '<p class="serif">' . __( 'Read the rest of this page &raquo;', 'theball' ) . '</p>' ); ?>

						<?php

						// Set default behaviour.
						$defaults = [
							'before'           => '<div class="multipager">',
							'after'            => '</div>',
							'link_before'      => '',
							'link_after'       => '',
							'next_or_number'   => 'next',
							'nextpagelink'     => '<span class="alignright">' . __( 'Next page', 'theball' ) . ' &raquo;</span>',
							'previouspagelink' => '<span class="alignleft">&laquo; ' . __( 'Previous page', 'theball' ) . '</span>',
							'pagelink'         => '%',
							'more_file'        => '',
							'echo'             => 1,
						];

						wp_link_pages( $defaults );

						?>

						<?php edit_post_link( __( 'Edit this entry', 'theball' ), '<p>', '</p>' ); ?>

					</div>

				</div><!-- /post -->

			</div><!-- /main_column_inner -->

			<?php

			$tmp++;

		endwhile;

		?>

	<?php endif; ?>

</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>
