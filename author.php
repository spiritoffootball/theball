<?php

// get author info
if ( isset( $_GET['author_name'] ) ) {
	$my_author = get_userdatabylogin( $author_name );
} else {
	$my_author = get_userdata(intval($author));
}



// init url (because it can be 'http://' -> doh!)
$authorURL = '';

// do we have an URL for this user?
if ( $my_author->user_url != '' AND $my_author->user_url != 'http://' ) {
	
	// set url
	$authorURL = $my_author->user_url;

}



// get full name
$full_name = theball_get_full_name( $my_author->first_name, $my_author->last_name );

if ( $full_name == '' ) { 

	// use nickname
	$full_name = $my_author->nickname;
}

?>

<?php get_header(); ?>



<!-- author.php -->

<div id="content_wrapper" class="clearfix">



<?php include( get_stylesheet_directory().'/assets/includes/site_banner.php' ); ?>



<div class="main_column clearfix">



<div class="main_column_inner" id="main_column_splash">

<div id="author_profile">

<div class="post clearfix">

<div id="author_avatar">
<?php echo get_avatar( $my_author->user_email, $size='200' ); ?>
</div>

<div id="author_desc">

<h2><?php echo $full_name; ?></h2>

<?php if ( $my_author->description != '' ) { ?>
<p><?php echo nl2br( $my_author->description ); ?></p>
<?php } ?>

<?php 
/*
// disabled email publishing
if ( $my_author->user_email != '' ) { ?>
<p id="author_email"><a href="mailto:<?php echo $my_author->user_email; ?>"><?php echo $my_author->user_email; ?></a></p>
<?php } 
*/
?>

</div><!-- /author_desc -->

</div><!-- /author_profile -->

</div><!-- /post -->

</div><!-- /main_column_inner -->



<div class="main_column_inner">

<div id="author_posts">

<div class="post clearfix">

<div class="entrytext">

<h3>Most recent posts by <?php echo $full_name; ?></h3>

<ul>

<!-- The Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<li>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a> on <?php the_time('j F Y'); ?>
</li>

<?php endwhile; else: ?>

<li><?php _e('No recent posts by this author.'); ?></li>

<?php endif; ?>
<!-- End Loop -->

</ul>

</div><!-- /entrytext -->

</div><!-- /post -->

</div><!-- /author_posts -->

</div><!-- /main_column_inner -->



</div><!-- /main_column -->



<?php get_sidebar(); ?>



</div><!-- /cols -->



</div><!-- /content_wrapper -->



<?php get_footer(); ?>
