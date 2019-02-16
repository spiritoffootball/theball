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

	<!-- Meta -->
	<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ) ?>; charset=<?php bloginfo( 'charset' ) ?>" />
	<meta name="description" content="<?php bloginfo( 'description' ) ?>" />
	<meta name="MSSmartTagsPreventParsing" content="true" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php if ( is_search() ) { ?><meta name="robots" content="noindex, nofollow" /><?php } ?>

	<!-- Title -->
	<title><?php

	global $post;

	if ( is_home() ) {
		echo 'The Blog &laquo; ';
	} elseif ( is_404() ) {
		echo 'Not Found &laquo; ';
	} elseif ( is_category() ) {
		echo 'Category: '; wp_title( '' ); echo ' &laquo; ';
	} elseif ( is_search() ) {
		echo 'Search Results &laquo; ';
	} elseif ( is_day() || is_month() || is_year() ) {
		echo 'Archives: '; wp_title( '' ); echo ' &laquo; ';
	} elseif ( is_single() ) {
		wp_title( '&laquo;', true, 'right' );
	} elseif ( is_page() ) {
		wp_title( '&laquo;', true, 'right' );
	} else {
		wp_title( '&laquo;', true, 'right' );
	}

	echo bloginfo( 'name' );

	?></title>

	<!-- Syndication -->
	<?php

	// switch to 2014
	//switch_to_blog(5);

	?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> Comments RSS Feed" href="<?php bloginfo( 'comments_rss2_url' ); ?>" />
	<?php

	// switch back
	//restore_current_blog();

	?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- add Google webfonts prior to enqueued styles -->
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



<?php include( get_template_directory() . '/header_body.php' ); ?>



