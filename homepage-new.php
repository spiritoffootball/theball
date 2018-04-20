<?php 
/*
Template Name: Homepage New
*/

get_header(); 

?>

<!-- homepage.php -->

<div id="content_wrapper" class="clearfix">

	
					
<?php include( get_stylesheet_directory() . '/assets/includes/site_banner.php' ); ?>



<div class="main_column clearfix">



<div class="about_widget">

<?php dynamic_sidebar( 'SOF Homepage About Column' ); ?>

</div>



<div class="social_widget">

<?php dynamic_sidebar( 'SOF Homepage Social Column' ); ?>

</div>



</div><!-- /main_column -->



<?php //get_sidebar(); ?>



<?php get_footer(); ?>