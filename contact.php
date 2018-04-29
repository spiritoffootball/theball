<?php /*
================================================================================
Template Name: Contact
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

get_header(); ?>

<!-- contact.php -->

<div id="content_wrapper" class="clearfix">

<?php include( get_stylesheet_directory() . '/assets/includes/site_banner.php' ); ?>

<div class="main_column clearfix">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="main_column_inner" id="main_column_splash">

			<div class="post" id="post-<?php the_ID(); ?>">

				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

			</div><!-- /post -->

		</div><!-- /main_column_inner -->

		<div class="main_column_inner">

			<div class="post">

				<div class="entrytext">

					<div class="entry_content clearfix">

						<?php global $more; $more = false; the_content( '', true ); ?>

						<?php

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

						wp_link_pages( $defaults );

						?>

						<?php edit_post_link( 'Edit this entry', '<p class="edit_link">', '</p>' ); ?>

					</div><!-- /entry_content -->

				</div><!-- /entrytext -->

			</div><!-- /post -->

		</div><!-- /main_column_inner -->

	<?php endwhile; else: ?>

		<div class="main_column_inner" id="main_column_splash">

			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><?php _e( 'Page Not Found', 'theball' ); ?></h2>
			</div><!-- /post -->

		</div><!-- /main_column_inner -->

		<div class="main_column_inner">

			<div class="post">

				<div class="entrytext">

					<p><?php _e( 'Sorry, but you are looking for something that isn’t here.', 'theball' ); ?></p>

					<?php include( get_template_directory() . '/searchform.php' ); ?>

				</div><!-- /entrytext -->

			</div><!-- /post -->

	<?php endif; ?>

</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>
