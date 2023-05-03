<?php
/**
 * The Ball Default Blog Archive Template.
 *
 * @since 1.0.0
 *
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- index.php -->

<div id="content_wrapper" class="clearfix">

<?php $site_banner = locate_template( 'assets/includes/site_banner.php' ); ?>
<?php if ( $site_banner ) : ?>
	<?php load_template( $site_banner ); ?>
<?php endif; ?>

<div class="main_column clearfix">

	<?php if ( have_posts() ) : ?>

		<?php

		// Search Nav.
		$pl = get_next_posts_link( __( '&laquo; Older Posts', 'theball' ) );
		$nl = get_previous_posts_link( __( 'Newer Posts &raquo;', 'theball' ) );

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

		<div id="main_column_inner" class="main_column_inner">

			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>

				<div class="post" id="post-<?php the_ID(); ?>">

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

							<div class="post_header_text">

								<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( [ 'before' => __( 'Permanent Link to: ', 'theball' ), 'after' => '' ] ); ?>"><?php the_title(); ?></a></h2>

							</div><!-- /post_header_text -->

						</div><!-- /post_header_inner -->

					</div><!-- /post_header -->

					<div class="entry clearfix">
						<?php the_content( __( 'Read the rest of this entry &raquo;', 'theball' ) ); ?>
					</div>

					<p class="postmetadata"><?php the_tags( __( 'Tags: ', 'theball' ), ', ', '<br />' ); ?> <?php esc_html_e( 'Posted in ', 'theball' ) . the_category( ', ' ); ?> | <?php comments_popup_link( __( 'No Comments &#187;', 'theball' ), __( '1 Comment &#187;', 'theball' ), __( '% Comments &#187;', 'theball' ) ); ?></p>

				</div>

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

			<div class="post">

				<h2><?php esc_html_e( 'Page not found', 'theball' ); ?></h2>

				<p><?php esc_html_e( 'Sorry, but you are looking for something that isn’t here. Try a search?', 'theball' ); ?></p>

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
