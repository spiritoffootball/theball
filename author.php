<?php
/**
 * Author Template.
 *
 * Default author template.
 *
 * @since 1.0.0
 * @package The_Ball
 */

// Let's try to get the User from the $author global.
if ( ! empty( $author ) && is_numeric( $author ) ) {
	$my_author = get_userdata( (int) $author );
} else {
	// Try to get author info from input vars.
	$author_name = empty( $_GET['author_name'] ) ? '' : wp_unslash( $_GET['author_name'] );
	if ( ! empty( $author_name ) ) {
		$my_author = get_user_by( 'login', $author_name );
	}
}

// Get URL for this user - exclude 'http://' or 'https://'.
$authorURL = '';
if ( ! empty( $my_author->user_url ) && $my_author->user_url != 'http://' && $my_author->user_url != 'https://' ) {
	$authorURL = $my_author->user_url;
}

// Use full name - or nickname if missing.
$full_name = theball_get_full_name( $my_author->first_name, $my_author->last_name );
if ( $full_name == '' ) {
	$full_name = $my_author->nickname;
}

get_header();

?><!-- author.php -->

<div id="content_wrapper" class="clearfix">

<?php $site_banner = locate_template( 'assets/includes/site_banner.php' ); ?>
<?php if ( $site_banner ) : ?>
	<?php load_template( $site_banner ); ?>
<?php endif; ?>

<div class="main_column clearfix">

	<div class="main_column_inner" id="main_column_splash">

		<div id="author_profile">

		<div class="post clearfix">

			<div id="author_avatar">
				<?php echo get_avatar( $my_author->user_email, '200' ); ?>
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
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : ?>
								<?php the_post(); ?>
								<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( [ 'before' => __( 'Permanent Link to: ', 'theball' ), 'after' => '' ] ); ?>"><?php the_title(); ?></a> on <?php the_time( 'j F Y' ); ?></li>
							<?php endwhile; ?>
						<?php else : ?>
							<li><?php esc_html_e( 'No recent posts by this author.', 'theball' ); ?></li>
						<?php endif; ?>
					</ul>

				</div><!-- /entrytext -->

			</div><!-- /post -->

		</div><!-- /author_posts -->

	</div><!-- /main_column_inner -->

</div><!-- /main_column -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
