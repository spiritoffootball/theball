<?php 
/*
Template Name: RSS
*/

get_header(); 

?>

<!-- rss.php -->

<div id="content_wrapper" class="clearfix">

	
					
<!-- site_banner.php -->

<div id="site_banner" class="clearfix">
<div id="site_banner_inner">


	
<?php include( get_template_directory() . '/assets/includes/join_in.php' ); ?>



<div id="splash">

<a href="/files/2009/11/the_ball_hands_blue_640.jpg"><img src="/files/2009/11/the_ball_hands_blue_640-200x150.jpg" alt="The Ball logo" title="The Ball logo" width="200" height="150" class="alignleft size-thumbnail wp-image-84" /></a>

</div><!-- /splash -->



<div id="banner_copy">

<h2>Connect with The Ball</h2>

<p>There a number of ways that you can stay connected to The Ball during its journey to World Cup. You could, of course, just keep visiting this site (and you'd be very welcome here) but there are other options which allow you to get more involved. Find out more about them below.</p>

</div><!-- /banner_copy -->



</div><!-- /site_banner_inner -->
</div><!-- /site_banner -->
	
	
	
<div id="cols" class="clearfix">
					


<div class="main_column clearfix">

<?php 

// -----------------------------------------------------------------------------
// Partners
// -----------------------------------------------------------------------------
global $post;

// set params
$args = array(
	'order_by' => 'menu_order',
	'order' => 'ASC',
	'post_type' => 'page',
	'post_status' => 'publish',
	'post_parent' => $post->ID
);

// do query
query_posts($args);



// THE LOOP
if (have_posts()) :

$tmp = 0;

while (have_posts()) : the_post(); ?>


<div class="main_column_inner"<?php if($tmp == 0) { echo ' id="main_column_splash"'; } ?>>

<div class="post">

<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>

	<div class="entrytext">
	
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

		<?php
		
		// NOTE: Comment permalinks are filtered if the comment is not on the first page 
		// in a multipage post... see: cp_multipage_comment_link in functions.php
		
		// set default behaviour
		$defaults = array(
			
			'before' => '<div class="multipager">', // . __('Pages: '), 
			'after' => '</div>',
			'link_before' => '', 
			'link_after' => '',
			'next_or_number' => 'next', 
			'nextpagelink' => '<span class="alignright">'.__('Next page').' &raquo;</span>', // <li class="alignright"></li>
			'previouspagelink' => '<span class="alignleft">&laquo; '.__('Previous page').'</span>', // <li class="alignleft"></li>
			'pagelink' => '%',
			'more_file' => '', 
			'echo' => 1
			
		);
		
		wp_link_pages( $defaults ); ?>
		
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

	</div>
	
</div><!-- /post -->

</div><!-- /main_column_inner -->

<?php $tmp++; endwhile; endif; ?>
	


</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>