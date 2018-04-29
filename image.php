<?php get_header(); ?>

<!-- image.php -->

<div id="content_wrapper" class="clearfix">



<?php include( get_stylesheet_directory() . '/assets/includes/site_banner.php' ); ?>



<div class="main_column clearfix">



<div class="main_column_inner">



<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="post" id="post-<?php the_ID(); ?>">

		<h2><a href="<?php echo get_permalink( $post->post_parent ); ?>" rev="attachment"><?php echo get_the_title( $post->post_parent ); ?></a> &raquo; <?php the_title(); ?></h2>



		<div class="entry clearfix">



		<p><a href="<?php echo wp_get_attachment_url( $post->ID ); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>



		<?php

		// this is the "caption"
		if ( ! empty( $post->post_excerpt ) ) the_excerpt();

		?>

		<?php the_content( 'Read the rest of this entry &raquo;' ); ?>

		<p class="postmetadata" style="clear: left;">
			This entry was posted on <?php the_time( 'l, F jS, Y' ) ?> at <?php the_time() ?>
			and is filed under <?php the_category( ', ' ) ?>.
			<?php the_taxonomies(); ?>
			You can follow any responses to this entry through the <?php post_comments_feed_link( 'RSS 2.0' ); ?> feed.

			<?php if ( ( 'open' == $post->comment_status ) && ( 'open' == $post->ping_status ) ) {
				// Both Comments and Pings are open ?>
				You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

			<?php } elseif ( ! ( 'open' == $post->comment_status ) && ( 'open' == $post->ping_status ) ) {
				// Only Pings are Open ?>
				Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

			<?php } elseif ( ( 'open' == $post->comment_status ) && ! ( 'open' == $post->ping_status ) ) {
				// Comments are open, Pings are not ?>
				You can skip to the end and leave a response. Pinging is currently not allowed.

			<?php } elseif ( ! ( 'open' == $post->comment_status ) && ! ( 'open' == $post->ping_status ) ) {
				// Neither Comments, nor Pings are open ?>
				Both comments and pings are currently closed.

			<?php } edit_post_link( 'Edit this entry', '', '' ); ?>
		</p>



		<?php /* ?><ul class="image_link">
			<li class="alignright">
				<h4>Next Image &raquo;</h4>
				<?php next_image_link() ?>
			</li>
			<li class="alignleft">
				<h4>&laquo; Previous Image</h4>
				<?php previous_image_link() ?>
			</li>
		</ul><? */ ?>



		</div><!-- /entry -->



	</div><!-- /post -->



	<?php comments_template(); ?>

<?php endwhile; else: ?>



	<div class="post" id="post-<?php the_ID(); ?>">

	<h2><?php _e( 'Not found', 'theball' ); ?></h2>

	<div class="entry clearfix">

	<p><?php _e( 'Sorry, no images matched your criteria.', 'theball' ); ?></p>

	</div><!-- /entry -->

	</div><!-- /post -->



<?php endif; ?>



</div><!-- /main_column_inner -->
</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>
