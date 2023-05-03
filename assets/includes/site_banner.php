<?php
/**
 * Site Banner Template.
 *
 * @since 1.0.0
 *
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- assets/includes/site_banner.php -->

<div id="site_banner" class="clearfix">

	<div id="site_banner_inner" class="clearfix">

		<?php if ( is_front_page() ) : ?>

			<div class="splash_widget_col">

				<div class="splash_main_widget">
					<?php dynamic_sidebar( 'sof-top-left' ); ?>
				</div>

				<div class="splash_sub_widget">
					<?php dynamic_sidebar( 'sof-top-sub' ); ?>
				</div>

			</div>

			<div class="splash_right_widget">
				<?php dynamic_sidebar( 'sof-top-right' ); ?>
			</div>

		<?php elseif ( is_page() && empty( $post->post_parent ) ) : ?>

			<div class="splash_widget_col">

				<div class="splash_main_widget">

					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : ?>
							<?php the_post(); ?>

							<?php

							$hidden_title = '';
							if ( get_post_meta( get_the_ID(), 'show_heading', true ) == '1' ) {
								$hidden_title = ' class="hidden"';
							}

							?>

							<div class="post clearfix">

								<h2 id="post-<?php the_ID(); ?>"<?php echo $hidden_title; ?>><?php the_title(); ?> <?php edit_post_link( __( 'Edit this entry', 'theball' ), '<span>', '</span>' ); ?></h2>

								<?php the_content( '<p class="serif">Read the rest of this page &raquo;</p>' ); ?>

							</div><!-- /post -->

						<?php endwhile; ?>
					<?php endif; ?>

				</div>

				<div class="splash_sub_widget">
				</div>

			</div>

			<div class="splash_right_widget">
				<?php dynamic_sidebar( 'sof-top-right' ); ?>
			</div>

		<?php else : ?>

			<div class="splash_widget_col">

				<div class="splash_main_widget">
					<?php dynamic_sidebar( 'sof-top-left' ); ?>
				</div>

				<div class="splash_sub_widget">
					<?php dynamic_sidebar( 'sof-top-sub' ); ?>
				</div>

			</div>

			<div class="splash_right_widget">
				<?php dynamic_sidebar( 'sof-top-right' ); ?>
			</div>

		<?php endif; ?>

	</div><!-- /site_banner_inner -->

</div><!-- /site_banner -->

<div id="cols" class="clearfix">
<div class="cols_inner">
