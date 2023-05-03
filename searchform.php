<?php
/**
 * Search Form Template.
 *
 * @since 1.0.0
 *
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- searchform.php -->

<form method="get" id="searchform" action="<?php bloginfo( 'url' ); ?>/">

	<label for="s" class="assistive-text"><?php esc_html_e( 'Search', 'theball' ); ?></label>
	<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'theball' ); ?>">
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'theball' ); ?>">

</form>
