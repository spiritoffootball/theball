<?php
/**
 * Geo Mashup Info Window Template.
 *
 * This is the default template for the info window in Geo Mashup maps.
 * See "info-window.php" in the Geo Mashup Custom plugin directory.
 * For styling of the info window, see map-style-default.css.
 *
 * @since 1.0.0
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// A potentially heavy-handed way to remove shortcode-like content.
add_filter( 'the_excerpt', [ 'GeoMashupQuery', 'strip_brackets' ] );

?>
<!-- geo-mashup-info-window.php -->

<div class="locationinfo post-location-info">

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php

			$multiple_items_class = '';
			if ( $wp_query->post_count > 1 ) {
				$multiple_items_class = ' multiple_items';
			}

			?>

			<div class="location-post<?php echo $multiple_items_class; ?>">

				<?php

				// Init feature image vars.
				$has_feature_image = false;
				$feature_image_class = '';
				if ( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail() ) {
					$has_feature_image = true;
					$feature_image_class = ' has_feature_image';
				}

				?>

				<div class="post_header<?php echo $feature_image_class; ?>">

					<?php if ( $has_feature_image ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( [ 'before' => __( 'Permanent Link to: ', 'theball' ), 'after' => '' ] ); ?>" class="feature-link"><?php the_post_thumbnail( 'medium' ); ?></a>
					<?php endif; ?>

					<div class="post_header_text">

						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( [ 'before' => __( 'Permanent Link to: ', 'theball' ), 'after' => '' ] ); ?>"><?php the_title(); ?></a></h2>
						<p class="postname">Written by <?php the_author_posts_link(); ?> on <?php the_time( 'l, F jS, Y' ); ?></p>

					</div><!-- /.post_header_text -->

				</div><!-- /.post_header -->

				<?php if ( $wp_query->post_count == 1 ) : ?>
					<div class="storycontent">
						<p><?php echo wp_strip_all_tags( get_the_excerpt() ); ?></p>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( [ 'before' => __( 'Permanent Link to: ', 'theball' ), 'after' => '' ] ); ?>" class="more-link"><?php esc_html_e( 'Read full story...', 'theball' ); ?></a>
					</div>
				<?php else : ?>
					<?php if ( ! $has_feature_image ) : ?>
					<div class="storycontent">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( [ 'before' => __( 'Permanent Link to: ', 'theball' ), 'after' => '' ] ); ?>" class="more-link"><?php esc_html_e( 'Read full story...', 'theball' ); ?></a>
					</div>
					<?php endif; ?>
				<?php endif; ?>

			</div><!-- /.location-post -->

		<?php endwhile; ?>

	<?php else : ?>

		<h2 class="center"><?php esc_html_e( 'Not Found', 'theball' ); ?></h2>
		<p class="center"><?php esc_html_e( 'Sorry, but you are looking for something that isn’t here.', 'theball' ); ?></p>

	<?php endif; ?>

</div>
