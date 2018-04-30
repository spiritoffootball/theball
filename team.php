<?php /*
================================================================================
Template Name: Team
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

// get team members array
$team = theball_team_members();

get_header(); ?>

<!-- team.php -->

<div id="content_wrapper" class="clearfix">

<?php include( get_stylesheet_directory() . '/assets/includes/site_banner.php' ); ?>

<div class="main_column clearfix">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="main_column_inner" id="main_column_splash">

			<div class="post">

				<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>

				<div class="entrytext">

					<?php the_content( '<p class="serif">Read the rest of this page &raquo;</p>' ); ?>

					<?php echo theball_multipager(); ?>

					<?php edit_post_link( 'Edit this entry', '<p>', '</p>' ); ?>

				</div>

			</div><!-- /post -->

		</div><!-- /main_column_inner -->

	<?php endwhile; endif; ?>

	<?php if ( count( $team ) > 0 ) : ?>

		<?php foreach( $team AS $team_member ) : ?>

			<div class="main_column_inner">

				<div class="post">

					<div class="entrytext clearfix">

						<h3><a href="<?php echo get_author_posts_url( $team_member->ID ); ?>"><?php echo esc_html( $team_member->display_name ); ?></a></h3>

						<div id="author_avatar">
							<?php echo get_avatar( $team_member->user_email, $size='200' ); ?>
						</div>

						<div id="author_desc">
							<p><?php echo nl2br( $team_member->description ); ?></p>
							<p><a class="post-edit-link" href="<?php echo get_edit_user_link( $team_member->ID ) ?>">Edit this profile</a></p>
						</div>

					</div>

				</div><!-- /post -->

			</div><!-- /main_column_inner -->

		<?php endforeach; ?>

	<?php endif; ?>

</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>
