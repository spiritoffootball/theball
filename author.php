<?php /*
================================================================================
Author Template
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

Default author template.

--------------------------------------------------------------------------------
*/

// get author info
if ( isset( $_GET['author_name'] ) ) {
	$my_author = get_userdatabylogin( $author_name );
} else {
	$my_author = get_userdata( intval( $author ) );
}

// do we have an URL for this user? (can be 'http://' -> doh!))
$authorURL = '';
if ( $my_author->user_url != '' AND $my_author->user_url != 'http://' ) {
	$authorURL = $my_author->user_url;
}

// use full name (or nickname if missing)
$full_name = theball_get_full_name( $my_author->first_name, $my_author->last_name );
if ( $full_name == '' ) {
	$full_name = $my_author->nickname;
}

?>

<?php get_header(); ?>

<!-- author.php -->

<div id="content_wrapper" class="clearfix">

<?php include( get_stylesheet_directory() . '/assets/includes/site_banner.php' ); ?>

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
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a> on <?php the_time( 'j F Y' ); ?></li>
						<?php endwhile; else: ?>
							<li><?php _e( 'No recent posts by this author.', 'theball' ); ?></li>
						<?php endif; ?>
					</ul>

				</div><!-- /entrytext -->

			</div><!-- /post -->

		</div><!-- /author_posts -->

	</div><!-- /main_column_inner -->

</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>
