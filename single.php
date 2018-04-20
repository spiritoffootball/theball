<?php get_header(); ?>

<!-- single.php -->

<div id="content_wrapper" class="clearfix">



<?php

//include( get_stylesheet_directory() . '/assets/includes/site_banner.php' );

?>



<div id="cols" class="clearfix">



<?php

// get page list, blank by default
$pagelist = apply_filters( 'theball_pagelist', '' );

// did we get a page list?
if ( $pagelist != '' ) {

	// include it
	include( $pagelist );

}

?>



<div class="main_column clearfix">



<?php if (have_posts()) : ?>

<ul class="blog_navigation clearfix">
	<?php next_post_link('<li class="alignright">%link +</li>'); ?>
	<?php previous_post_link('<li class="alignleft">- %link</li>'); ?>
</ul>



<?php while (have_posts()) : the_post(); ?>



<div class="main_column_inner">

<div class="post">

<?php

// init
$has_feature_image = false;
$feature_image_class = '';

// do we have a feature image?
if ( has_post_thumbnail() ) {
	$has_feature_image = true;
	$feature_image_class = ' has_feature_image';
}

?><div class="post_header<?php echo $feature_image_class; ?>">

<div class="post_header_inner">

<?php

// show feature image when we have one
if ( $has_feature_image ) {
	echo get_the_post_thumbnail( $post->ID, 'medium-640' );
}

?>

<div class="post_header_text">

	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>

	<?php theball_geomashup_map_link_get(); ?>

</div><!-- /post_header_text -->

</div><!-- /post_header_inner -->

</div><!-- /post_header -->



<div class="entrytext">

<div class="entry_content clearfix">

<?php global $more; $more = true; the_content(''); ?>

<p class="postname">Written by <?php the_author_posts_link(); ?> on <?php the_time('l, F jS, Y') ?></p>

</div>



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



<?php theball_geomashup_map_get(); ?>



<p class="postmetadata">This post is filed under <?php the_category(', ') ?><?php the_tags( ' and tagged with ', ', ', ''); ?>. You can follow any responses to this post through the <?php post_comments_feed_link('RSS 2.0'); ?> feed. <?php

if (('open' == $post->comment_status) && ('open' == $post->ping_status)) {

	// Both Comments and Pings are open
	?>You can leave a response, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site. <?php

} elseif (!('open' == $post->comment_status) && ('open' == $post->ping_status)) {

	// Only Pings are Open
	?>Comments are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site. <?php

} elseif (('open' == $post->comment_status) && !('open' == $post->ping_status)) {

	// Comments are open, Pings are not
	?>You can leave a comment. Pinging is currently not allowed. <?php

} elseif (!('open' == $post->comment_status) && !('open' == $post->ping_status)) {

	// Neither Comments, nor Pings are open
	?>Both comments and pings are currently closed. <?php

}

// ShareThis
if (function_exists('sharethis_button')) {
	//echo '<br/>';
	sharethis_button();
}

?></p>

</div><!-- /entrytext -->



</div><!-- /post -->

</div><!-- /main_column_inner -->



<div class="main_column_inner">

<?php comments_template(); ?>

</div><!-- /main_column_inner -->



<ul class="blog_navigation clearfix">
	<?php next_post_link('<li class="alignright">%link +</li>'); ?>
	<?php previous_post_link('<li class="alignleft">- %link</li>'); ?>
</ul>



<?php endwhile; else: ?>



<div class="main_column_inner">

<div class="post">

<h2>Not Found</h2>

<p>Sorry, but you are looking for something that isn't here.</p>

<?php include ( get_template_directory() . '/searchform.php' ); ?>

</div><!-- /post -->

</div><!-- /main_column_inner -->



<?php endif; ?>



</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>