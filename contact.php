<?php
/**
 * Template Name: Contact
 *
 * @since 1.0.0
 *
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- contact.php -->

<div id="content_wrapper" class="clearfix">

<?php $site_banner = locate_template( 'assets/includes/site_banner.php' ); ?>
<?php if ( $site_banner ) : ?>
	<?php load_template( $site_banner ); ?>
<?php endif; ?>

<div class="main_column clearfix">

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<div class="main_column_inner" id="main_column_splash">

				<div class="post" id="post-<?php the_ID(); ?>">

					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( [ 'before' => __( 'Permanent Link to: ', 'theball' ), 'after' => '' ] ); ?>"><?php the_title(); ?></a></h2>

				</div><!-- /post -->

			</div><!-- /main_column_inner -->

			<div class="main_column_inner">

				<div class="post">

					<div class="entrytext">

						<div class="entry_content clearfix">

							<?php

							global $more;
							$more = false;
							the_content( '', true );

							?>

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

							<?php edit_post_link( __( 'Edit this entry', 'theball' ), '<p class="edit_link">', '</p>' ); ?>

						</div><!-- /entry_content -->

					</div><!-- /entrytext -->

				</div><!-- /post -->

			</div><!-- /main_column_inner -->

		<?php endwhile; ?>
	<?php else : ?>

		<div class="main_column_inner" id="main_column_splash">

			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><?php esc_html_e( 'Page Not Found', 'theball' ); ?></h2>
			</div><!-- /post -->

		</div><!-- /main_column_inner -->

		<div class="main_column_inner">

			<div class="post">

				<div class="entrytext">
					<p><?php esc_html_e( 'Sorry, but you are looking for something that isn’t here.', 'theball' ); ?></p>
					<?php $searchform = locate_template( 'searchform.php' ); ?>
					<?php if ( $searchform ) : ?>
						<?php load_template( $searchform ); ?>
					<?php endif; ?>
				</div><!-- /entrytext -->

			</div><!-- /post -->

	<?php endif; ?>

</div><!-- /main_column -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
