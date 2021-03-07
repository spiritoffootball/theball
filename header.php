<?php /*
================================================================================
Header Template
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

The "left-open elements" here are closed in footer.php

--------------------------------------------------------------------------------
*/

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="https://gmpg.org/xfn/11">

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Add Google fonts prior to enqueued styles -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,700,300" rel="stylesheet" type="text/css">

	<?php wp_head(); ?>

	<?php if ( is_multisite() ) { if ( 'wp-signup.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) { ?>
		<!-- signup css -->
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/signup.css" media="screen" />
	<?php }} ?>
	<?php if ( is_multisite() ) { if ( 'wp-activate.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) { ?>
		<!-- activate css -->
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/activate.css" media="screen" />
	<?php }} ?>

</head>



<body<?php echo theball_body_id(); ?> <?php body_class(); ?>>
<?php wp_body_open(); ?>



<?php $header_body = locate_template( 'header_body.php' ); ?>
<?php if ( $header_body ) : ?>
	<?php load_template( $header_body ); ?>
<?php endif; ?>



