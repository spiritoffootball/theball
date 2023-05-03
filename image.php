<?php
/**
 * Image Template.
 *
 * @since 1.0.0
 *
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- image.php -->

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
					<h2><a href="<?php echo get_permalink( $post->post_parent ); ?>" rev="attachment"><?php echo get_the_title( $post->post_parent ); ?></a> &raquo; <a href="<?php echo get_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( [ 'before' => __( 'Permanent Link to: ', 'theball' ), 'after' => '' ] ); ?>"><?php the_title(); ?></a></h2>
				</div><!-- /post -->

			</div><!-- /main_column_inner -->

			<div class="main_column_inner">

				<div class="post">

					<div class="entrytext clearfix">

						<p><a href="<?php echo wp_get_attachment_url( get_the_ID() ); ?>"><?php echo wp_get_attachment_image( get_the_ID(), 'medium' ); ?></a></p>

						<?php

						// This is the "caption".
						if ( ! empty( $post->post_excerpt ) ) {
							the_excerpt();
						}

						?>

						<?php the_content( __( 'Read the rest of this entry &raquo;', 'theball' ) ); ?>

						<p class="postmetadata"><?php

						// Define RSS text.
						$rss_text = __( 'RSS 2.0', 'theball' );

						// Construct RSS link.
						$rss_link = '<a href="' . esc_url( get_post_comments_feed_link() ) . '">' . $rss_text . '</a>';

						// Show text.
						printf( __( 'You can follow any comments on this entry through the %s feed.', 'theball' ), $rss_link );

						// Add trailing space.
						echo ' ';

						if ( ( 'open' == $post->comment_status ) && ( 'open' == $post->ping_status ) ) {

							// Both comments and pings are open.

							// Define trackback text.
							$trackback_text = __( 'trackback', 'theball' );

							// Construct RSS link.
							$trackback_link = '<a href="' . esc_url( get_trackback_url() ) . '"rel="trackback">' . $trackback_text . '</a>';

							// Write out.
							printf( __( 'You can leave a comment, or %s from your own site.', 'theball' ), $trackback_link );

							// Add trailing space.
							echo ' ';

						} elseif ( ! ( 'open' == $post->comment_status ) && ( 'open' == $post->ping_status ) ) {

							// Only pings are open.

							// Define trackback text.
							$trackback_text = __( 'trackback', 'theball' );

							// Construct RSS link.
							$trackback_link = '<a href="' . esc_url( get_trackback_url() ) . '"rel="trackback">' . $trackback_text . '</a>';

							// Write out.
							printf( __( 'Comments are currently closed, but you can %s from your own site.', 'theball' ), $trackback_link );

							// Add trailing space.
							echo ' ';

						} elseif ( ( 'open' == $post->comment_status ) && ! ( 'open' == $post->ping_status ) ) {

							// Comments are open, pings are not.
							esc_html_e( 'You can leave a comment. Pinging is currently not allowed.', 'theball' );

							// Add trailing space.
							echo ' ';

						} elseif ( ! ( 'open' == $post->comment_status ) && ! ( 'open' == $post->ping_status ) ) {

							// Neither comments nor pings are open.
							esc_html_e( 'Both comments and pings are currently closed.', 'theball' );

							// Add trailing space.
							echo ' ';

						}

						// Show edit link.
						edit_post_link( __( 'Edit this entry', 'theball' ), '', '' );

						?></p>
					</div><!-- /entrytext -->

				</div><!-- /post -->

			</div><!-- /main_column_inner -->

			<div class="main_column_inner">
				<?php comments_template(); ?>
			</div><!-- /main_column_inner -->

		<?php endwhile; ?>

	<?php else : ?>

		<div class="main_column_inner">

			<div class="post">

				<h2><?php esc_html_e( 'Not found', 'theball' ); ?></h2>

				<p><?php esc_html_e( 'Sorry, no images matched your criteria.', 'theball' ); ?></p>

			</div><!-- /post -->

		</div><!-- /main_column_inner -->

	<?php endif; ?>

</div><!-- /main_column -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
