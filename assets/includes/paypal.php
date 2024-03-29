<?php
/**
 * PayPal Template.
 *
 * @since 1.0.0
 *
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!--assets/includes/paypal.php -->

<div class="paypal_donate clearfix">

	<h3><?php esc_html_e( 'Give The Ball a Kick!', 'theball' ); ?></h3>

	<form class="paypal_donate" action="https://www.paypal.com/cgi-bin/webscr" method="post" style="width: 93px; height: 32px;">
		<input type="hidden" name="cmd" value="_s-xclick" />
		<input type="hidden" name="hosted_button_id" value="9611686" />
		<input type="image" src="<?php echo get_template_directory_uri(); ?>/assets/images/interface/donate-button.gif" border="0" name="submit" alt="Donate to Spirit of Football via PayPal" />
	</form>

</div><!-- /paypal_donate -->
