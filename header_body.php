<?php /*
================================================================================
Header Body Template
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

The "left-open elements" here are closed in footer.php

--------------------------------------------------------------------------------
*/

?><a href="#cols" class="screen-reader-shortcut"><?php _e( 'Skip to Content', 'theball' ); ?></a>

<div id="container">



<div id="header">

	<div id="header_inner">

		<div id="header_top" class="clearfix">

			<?php

			// Default image.
			$default_ball_image = '<a href="' . get_home_url( null, '/' ) . '" title="Home" class="ball_image"><img src="' . get_template_directory_uri() . '/assets/images/interface/the-ball-logo-200-white.png" alt="The Ball logo" title="' . __( 'The Ball logo', 'theball' ) . '" style="width: 100px; height: 100px;" id="the_ball_header" /></a>';

			/**
			 * Filter the image of The Ball for this site.
			 *
			 * @since 1.0
			 *
			 * @param string $default_ball_image The default image markup.
			 * @return string $default_ball_image The modified image markup.
			 */
			echo apply_filters( 'theball_image', $default_ball_image );

			?>

			<div id="titlewrap">
			<div id="title"><h1><a href="<?php home_url( '/' ); ?>" title="<?php esc_attr_e( 'Home', 'theball' ); ?>"><?php bloginfo( 'title' ); ?></a></h1></div>
			<div id="tagline"><?php bloginfo( 'description' ); ?></div>
			</div><!-- /titlewrap -->

			<?php include get_template_directory() . '/assets/includes/join_in.php'; ?>

		</div><!-- /header_top -->

	</div><!-- /header_inner -->

</div><!-- /header -->



<div id="topnav">
	<div id="topnav_inner" class="clearfix">
		<?php include get_template_directory() . '/assets/includes/menu.php'; ?>
	</div><!-- /topnav_inner -->
</div><!-- /topnav -->



<?php if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) AND 'wp-signup.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) { ?>
	<!-- signup.php -->

	<div id="content_wrapper" class="clearfix">

	<?php include get_stylesheet_directory() . '/assets/includes/site_banner.php'; ?>

	<div class="main_column clearfix">

	<div class="main_column_inner" id="main_column_splash">

	<div class="post">

<?php } ?>



