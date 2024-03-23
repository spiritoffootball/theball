<?php
/**
 * The Ball Theme Functions.
 *
 * This file will get loaded AFTER the child theme's "functions.php" file so that
 * the child theme can override any global scope functions define here - as long as
 * they are wrapped in "function_exists" checks. I don't like that much and prefer
 * to offer actions and filters instead.
 *
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Define a version for this theme, so that updates refresh stylesheets.
 *
 * @since 1.0.0
 */
define( 'THEBALL_VERSION', '3.0.7a' );

/**
 * Load theme class if not yet loaded and return instance.
 *
 * @since 2.4.4
 *
 * @return SOF_The_Ball_Theme $theme The theme instance.
 */
function sof_the_ball_theme() {

	// Maybe instantiate theme class.
	static $theme;
	if ( ! isset( $theme ) ) {
		include get_template_directory() . '/includes/class-theme.php';
		$theme = new SOF_The_Ball_Theme();
	}

	// --<
	return $theme;

}

// Init immediately.
sof_the_ball_theme();
