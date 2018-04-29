<?php /*
================================================================================
SOF Video CPT Archive Template
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

get_header(); ?>

<!-- archive-sofvm_video.php -->

<div id="content_wrapper" class="clearfix">

<?php include( get_stylesheet_directory() . '/assets/includes/site_banner.php' ); ?>

<div class="main_column clearfix">

	<?php if ( have_posts() ) : ?>

		<?php

		// Search Nav
		$pl = get_next_posts_link( __( '&laquo; Older Posts', 'theball' ) );
		$nl = get_previous_posts_link( __( 'Newer Posts &raquo;', 'theball' ) );

		?>

		<?php if ( $nl != '' OR $pl != '' ) { ?>

		<ul class="blog_navigation clearfix">
			<?php if ( $nl != '' ) { ?><li class="alignright"><?php echo $nl; ?></li><?php } ?>
			<?php if ( $pl != '' ) { ?><li class="alignleft"><?php echo $pl; ?></li><?php } ?>
		</ul>

		<?php } ?>

		<div class="main_column_inner">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="post">

				<div class="post_header">
					<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					<p class="postname"><?php the_time( 'F jS, Y' ) ?>  by <?php the_author_posts_link(); ?></p>
				</div><!-- /post_header -->

				<div class="entry clearfix">

					<?php the_content() ?>

					<?php edit_post_link( __( 'Edit this entry' ), '<p class="edit_link">', '</p>' ); ?>

				</div>

				<p class="postmetadata"><?php the_tags( 'Tags: ', ', ', '<br />' ); ?> Posted in <?php the_category( ', ' ) ?> | <?php comments_popup_link( 'No Comments &#187;', '1 Comment &#187;', '% Comments &#187;' ); ?></p>

			</div>

		<?php endwhile; ?>

		<?php if ( $nl != '' OR $pl != '' ) { ?>

		<ul class="blog_navigation clearfix">
			<?php if ( $nl != '' ) { ?><li class="alignright"><?php echo $nl; ?></li><?php } ?>
			<?php if ( $pl != '' ) { ?><li class="alignleft"><?php echo $pl; ?></li><?php } ?>
		</ul>

		<?php } ?>

		</div><!-- /main_column_inner -->

	<?php else : ?>

		<div class="main_column_inner" id="main_column_splash">

		</div><!-- /main_column_inner -->

		<div class="post">

			<div class="post_header">
				<h3><?php _e( 'No videos found', 'theball' ); ?></h3>
			</div><!-- /post_header -->

			<div class="entry clearfix">
				<p><?php _e( 'Why not search for something?', 'theball' ); ?></p>
				<?php include( get_template_directory() . '/searchform.php' ); ?>
			</div>

		</div><!-- /post -->

	<?php endif; ?>

</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>
