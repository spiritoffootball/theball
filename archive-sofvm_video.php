<?php /*
================================================================================
SOF Video CPT Archive Template
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

get_header();

?><!-- archive-sofvm_video.php -->

<div id="content_wrapper" class="clearfix">

<?php $site_banner = locate_template( 'assets/includes/site_banner.php' ); ?>
<?php if ( $site_banner ) : ?>
	<?php load_template( $site_banner ); ?>
<?php endif; ?>

<div class="main_column clearfix">

	<?php if ( have_posts() ) : ?>

		<?php

		// Search Nav.
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
					<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute( [ 'before' => __( 'Permanent Link to: ', 'theball' ), 'after'  => '' ] ); ?>"><?php the_title(); ?></a></h3>
					<p class="postname"><?php printf( __( '%1$s by %2$s', 'theball' ), get_the_time( 'F jS, Y' ), get_the_author_posts_link() ); ?></p>
				</div><!-- /post_header -->

				<div class="entry clearfix">

					<?php the_content() ?>

					<?php edit_post_link( __( 'Edit this entry', 'theball' ), '<p class="edit_link">', '</p>' ); ?>

				</div>

				<p class="postmetadata"><?php the_tags( __( 'Tags: ', 'theball' ), ', ', '<br />' ); ?> <?php _e( 'Posted in ', 'theball' ) . the_category( ', ' ) ?> | <?php comments_popup_link( __( 'No Comments &#187;', 'theball' ), __( '1 Comment &#187;', 'theball' ), __( '% Comments &#187;', 'theball' ) ); ?></p>

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
				<?php $searchform = locate_template( 'searchform.php' ); ?>
				<?php if ( $searchform ) : ?>
					<?php load_template( $searchform ); ?>
				<?php endif; ?>
			</div>

		</div><!-- /post -->

	<?php endif; ?>

</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>
