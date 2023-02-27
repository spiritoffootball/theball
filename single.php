<?php
/**
 * Default Single Template.
 *
 * @since 1.0.0
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- single.php -->

<div id="content_wrapper" class="clearfix">

<div id="cols" class="clearfix">
<div class="cols_inner">

<?php $page_list = locate_template( 'assets/includes/page_list.php' ); ?>
<?php if ( $page_list ) : ?>
	<?php load_template( $page_list ); ?>
<?php endif; ?>

<div class="main_column clearfix">

<?php if ( have_posts() ) : ?>

	<ul class="blog_navigation clearfix">
		<?php next_post_link( '<li class="alignright">%link +</li>' ); ?>
		<?php previous_post_link( '<li class="alignleft">- %link</li>' ); ?>
	</ul>

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<div class="main_column_inner">
			<div class="post">

			<?php

			// Do we have a feature image?
			$has_feature_image = false;
			$feature_image_class = '';
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

					<div class="post_header_text">

						<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( [ 'before' => __( 'Permanent Link to: ', 'theball' ), 'after' => '' ] ); ?>"><?php the_title(); ?></a></h2>

						<?php theball_geomashup_map_link_get(); ?>

					</div><!-- /post_header_text -->

				</div><!-- /post_header_inner -->

			</div><!-- /post_header -->

			<div class="entrytext">

				<div class="entry_content clearfix">

					<?php

					global $more;
					$more = true;
					the_content( '' );

					?>

					<p class="postname">Written by <?php the_author_posts_link(); ?> on <?php the_time( 'l, F jS, Y' ); ?></p>

				</div>

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

				<?php the_tags( '<div class="entry-meta"><p class="postmetadata">' . __( 'Tags: ', 'theball' ), '<span class="tag-divider">,</span> ', '</p></div>' ); ?>

				<div class="entry-category-meta clearfix">
					<p class="postmetadata"><?php esc_html_e( 'Categories:', 'theball' ); ?> <?php echo get_the_category_list( ', ' ); ?></p>
				</div>

				<?php theball_geomashup_map_get(); ?>

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
					$trackback_link = '<a href="' . esc_url( get_trackback_url() ) . '" rel="trackback">' . $trackback_text . '</a>';

					// Write out.
					printf( __( 'You can leave a comment, or %s from your own site.', 'theball' ), $trackback_link );

					// Add trailing space.
					echo ' ';

				} elseif ( ! ( 'open' == $post->comment_status ) && ( 'open' == $post->ping_status ) ) {

					// Only pings are open.

					// Define trackback text.
					$trackback_text = __( 'trackback', 'theball' );

					// Construct RSS link.
					$trackback_link = '<a href="' . esc_url( get_trackback_url() ) . '" rel="trackback">' . $trackback_text . '</a>';

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
				edit_post_link( __( 'Edit this entry', 'theball' ), '', '.' );

				?></p>

			</div><!-- /entrytext -->

		</div><!-- /post -->
		</div><!-- /main_column_inner -->

		<div class="main_column_inner">
			<?php comments_template(); ?>
		</div><!-- /main_column_inner -->

	<?php endwhile; ?>

	<ul class="blog_navigation clearfix">
		<?php next_post_link( '<li class="alignright">%link +</li>' ); ?>
		<?php previous_post_link( '<li class="alignleft">- %link</li>' ); ?>
	</ul>

<?php else : ?>

	<div class="main_column_inner">

		<div class="post">

			<h2><?php esc_html_e( 'Not Found', 'theball' ); ?></h2>

			<p><?php esc_html_e( 'Sorry, but you are looking for something that isn’t here.', 'theball' ); ?></p>

			<?php $searchform = locate_template( 'searchform.php' ); ?>
			<?php if ( $searchform ) : ?>
				<?php load_template( $searchform ); ?>
			<?php endif; ?>

		</div><!-- /post -->

	</div><!-- /main_column_inner -->

<?php endif; ?>

</div><!-- /main_column -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
