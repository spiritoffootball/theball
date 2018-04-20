<?php get_header(); ?>

<!-- attachment.php -->

<div id="content_wrapper" class="clearfix">



<?php include( get_stylesheet_directory().'/assets/includes/site_banner.php' ); ?>



<div class="main_column clearfix">



<div class="main_column_inner">







<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



<?php 

// This also populates the iconsize for the next line
$attachment_link = get_the_attachment_link($post->ID, true, array(450, 800));

// This lets us style narrow icons specially
$post_tmp = &get_post($post->ID); 
$classname = ($post_tmp->iconsize[0] <= 128 ? 'small' : '') . 'attachment';

?>

<div class="post" id="post-<?php the_ID(); ?>">

<h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

<div class="entry clearfix">

<p class="<?php echo $classname; ?>"><?php echo $attachment_link; ?><br /><?php echo basename($post->guid); ?></p>

<?php the_content('Read the rest of this entry &raquo;'); ?>

<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

<p class="postmetadata">This entry is filed under <?php the_category(', ') ?>. You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed. <?php 
	
if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
	
	// Both Comments and Pings are open 
	?>You can leave a response, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site. <?php 
	
} elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {

	// Only Pings are Open 
	?>Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site. <?php 
	
} elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {

	// Comments are open, Pings are not 
	?>You can leave a response. Pinging is currently not allowed. <?php 
	
} elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
	
	// Neither Comments, nor Pings are open 
	?>Both comments and pings are currently closed. <?php 
	
} edit_post_link('Edit this entry','','.'); 

?></p>

</div><!-- /entry -->

</div><!-- /post -->

<?php comments_template(); ?>



<?php endwhile; else: ?>



<div class="post" id="post-<?php the_ID(); ?>">

<h2>Not found</h2>

<div class="entry clearfix">

<p>Sorry, no attachments matched your criteria.</p>

</div><!-- /entry -->

</div><!-- /post -->



<?php endif; ?>





</div><!-- /main_column_inner -->
</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>