<?php /*
===============================================================
Header HTML
===============================================================


---------------------------------------------------------------
*/

?><a href="#cols" class="skip"><?php __( 'Skip to Content', 'theball' ); ?></a>

<div id="container">



<div id="header">
<div id="header_inner">



<div id="header_top" class="clearfix">

<?php

// default image
$default_ball_image = '<a href="' . get_option( 'home' ) . '" title="Home" class="ball_image"><img src="' . get_template_directory_uri() . '/assets/images/interface/the_ball_logo.png" alt="The Ball logo" title="The Ball logo" style="width: 100px; height: 100px;" id="the_ball_header" /></a>';

// image of The Ball for this site
echo apply_filters( 'theball_image', $default_ball_image );

?>

<div id="titlewrap">
<div id="title"><h1><a href="<?php echo get_option( 'home' ); ?>" title="Home"><?php bloginfo( 'title' ); ?></a></h1></div>
<div id="tagline"><?php bloginfo( 'description' ); ?></div>
</div><!-- /titlewrap -->

<?php include( get_template_directory() . '/assets/includes/join_in.php' ); ?>

<?php

/*
--------------------------------------------------------------------------------
Search
--------------------------------------------------------------------------------
*/

// do not display on failed searches or 404
if ( ( get_search_query() AND ! have_posts() ) OR is_404() ) {

} else {

/*
?>
<div class="search_form">
<?php get_search_form(); ?>
</div><!-- /search_form -->
<?php
*/

} // end search query test

?>

</div><!-- /header_top -->



</div><!-- /header_inner -->
</div><!-- /header -->



<div id="topnav">
<div id="topnav_inner" class="clearfix">
<?php include( get_template_directory() . '/assets/includes/menu.php' ); ?>
</div><!-- /topnav_inner -->
</div><!-- /topnav -->



<?php

// if this is signup...
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) AND 'wp-signup.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {

?>
<!-- signup.php -->

<div id="content_wrapper" class="clearfix">



<?php include( get_stylesheet_directory() . '/assets/includes/site_banner.php' ); ?>



<div class="main_column clearfix">



<div class="main_column_inner" id="main_column_splash">



<div class="post">
<?php

} // end signup check

?>



