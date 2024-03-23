<?php
/**
 * The Ball Header Template.
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="https://gmpg.org/xfn/11">

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<?php wp_head(); ?>

</head>

<body<?php echo theball_body_id(); ?> <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<?php $header_body = locate_template( 'header_body.php' ); ?>
	<?php if ( $header_body ) : ?>
		<?php load_template( $header_body ); ?>
	<?php endif; ?>
