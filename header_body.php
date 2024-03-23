<?php
/**
 * The Ball Header Body Template.
 *
 * The "left-open elements" here are closed in footer.php
 *
 * @since 1.0.0
 *
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<a href="#cols" class="screen-reader-shortcut"><?php esc_html_e( 'Skip to Content', 'theball' ); ?></a>

<div id="container">

	<div id="header">

		<div id="header_inner">

			<div id="header_top" class="clearfix">

				<?php

				// Default image.
				$default_ball_image = '<a href="' . get_home_url( null, '/' ) . '" title="' . esc_attr__( 'Home', 'theball' ) . '" class="ball_image"><img src="' . get_template_directory_uri() . '/assets/images/interface/the-ball-logo-200-white.png" alt="' . esc_attr__( 'The Ball logo', 'theball' ) . '" title="' . esc_attr__( 'The Ball logo', 'theball' ) . '" style="width: 100px; height: 100px;" id="the_ball_header" /></a>';

				/**
				 * Filter the image of The Ball for this site.
				 *
				 * @since 1.0.0
				 *
				 * @param string $default_ball_image The default image markup.
				 * @return string $default_ball_image The modified image markup.
				 */
				echo apply_filters( 'theball_image', $default_ball_image );

				?>

				<div id="titlewrap">
					<div id="title"><h1><a href="<?php echo home_url( '/' ); ?>" title="<?php esc_attr_e( 'Home', 'theball' ); ?>"><?php bloginfo( 'title' ); ?></a></h1></div>
					<div id="tagline"><?php bloginfo( 'description' ); ?></div>
				</div><!-- /titlewrap -->

				<?php $paypal = locate_template( 'assets/includes/paypal.php' ); ?>
				<?php if ( $paypal ) : ?>
					<?php load_template( $paypal ); ?>
				<?php endif; ?>

			</div><!-- /header_top -->

		</div><!-- /header_inner -->

	</div><!-- /header -->

	<div id="topnav">
		<div id="topnav_inner" class="clearfix">
			<?php $network_menu = locate_template( 'assets/includes/menu.php' ); ?>
			<?php if ( $network_menu ) : ?>
				<?php load_template( $network_menu ); ?>
			<?php endif; ?>
		</div><!-- /topnav_inner -->
	</div><!-- /topnav -->
