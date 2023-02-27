<?php
/**
 * Search Template.
 *
 * @since 1.0.0
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- search.php -->

<div id="content_wrapper" class="clearfix">

<?php $site_banner = locate_template( 'assets/includes/site_banner.php' ); ?>
<?php if ( $site_banner ) : ?>
	<?php load_template( $site_banner ); ?>
<?php endif; ?>

<div class="main_column clearfix">

	<?php if ( have_posts() ) : ?>

		<?php

		// Search Nav.
		$nl = get_next_posts_link( 'Next &raquo;' );
		$pl = get_previous_posts_link( '&laquo; Previous' );

		?>

		<?php if ( $nl != '' || $pl != '' ) : ?>
			<ul class="blog_navigation clearfix">
				<?php if ( $nl != '' ) : ?>
					<li class="alignright"><?php echo $nl; ?></li>
				<?php endif; ?>
				<?php if ( $pl != '' ) : ?>
					<li class="alignleft"><?php echo $pl; ?></li>
				<?php endif; ?>
			</ul>
		<?php endif; ?>

		<div class="main_column_inner" id="main_column_splash">

			<div class="post">

				<h2 id="search_title">You searched for &#8216;<?php the_search_query(); ?>&#8217;</h2>
				<p>Here are the results in order of relevance</p>

			</div><!-- /post -->

		</div><!-- /main_column_inner -->

		<div class="main_column_inner">

			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>

				<?php

				if ( function_exists( 'wpSearch_Query' ) ) {
					switch_to_blog( $post->blog_id );
				}

				?>

				<div class="post search_result">

					<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( [ 'before' => __( 'Permanent Link to: ', 'theball' ), 'after' => '' ] ); ?>"><?php the_title(); ?></a></h3>

					<div class="search_meta">

						<?php if ( function_exists( 'wpSearch_Query' ) ) : ?>
							<p class="search_blogname"><?php echo bloginfo( 'name' ); ?></p>
						<?php endif; ?>

						<p><?php the_time( 'l, F jS, Y' ); ?></p>

						<p><?php the_tags( 'Tags: ', ', ', '<br />' ); ?> Posted in <?php the_category( ', ' ); ?> | <?php edit_post_link( 'Edit', '', ' | ' ); ?>  <?php comments_popup_link( 'No Comments &#187;', '1 Comment &#187;', '% Comments &#187;' ); ?></p>

					</div><!-- /search_meta -->

					<?php

					if ( function_exists( 'wpSearch_Query' ) ) {
						restore_current_blog();
					}

					?>

				</div><!-- /post -->

			<?php endwhile; ?>

		</div><!-- /main_column_inner -->

		<?php if ( $nl != '' || $pl != '' ) : ?>
			<ul class="blog_navigation clearfix">
				<?php if ( $nl != '' ) : ?>
					<li class="alignright"><?php echo $nl; ?></li>
				<?php endif; ?>
				<?php if ( $pl != '' ) : ?>
					<li class="alignleft"><?php echo $pl; ?></li>
				<?php endif; ?>
			</ul>
		<?php endif; ?>

	<?php else : ?>

		<div class="main_column_inner">

			<div class="post search_result">

				<h2>Nothing found for &#8216;<?php the_search_query(); ?>&#8217;</h2>

				<p><?php esc_html_e( 'Try a different search?', 'theball' ); ?></p>

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
