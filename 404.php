<?php /*
================================================================================
404 Template
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

get_header(); ?>

<!-- 404.php -->

<div id="content_wrapper" class="clearfix">

<?php include( get_stylesheet_directory() . '/assets/includes/site_banner.php' ); ?>

<div class="main_column clearfix">

	<div class="main_column_inner" id="main_column_splash">

		<div class="post">

			<div class="entrytext clearfix">

				<h2><?php _e( 'Offside!', 'theball' ); ?></h2>

				<img style="width: 200px; height: 150px; float: left;" class="padded_br" src="<?php echo get_template_directory_uri(); ?>/assets/images/interface/offside_200.jpg" alt="an offside whistle" />

				<p><?php _e( 'The page you requested has not been found on this server. Perhaps you could use the search form below to look for it?', 'theball' ); ?></p>

				<p><?php _e( 'If we have got a broken link on this site, or you’re really really sure the page should be there, then mailing the details to the <a href="mailto:webmaster@theball.tv">webmaster</a> would be appreciated.', 'theball' ); ?></p>

			</div><!-- /entrytext -->

		</div><!-- /post -->

	</div><!-- /main_column_inner -->


	<div class="main_column_inner">

		<div class="post">

			<div class="entrytext clearfix">

				<?php include( get_template_directory() . '/searchform.php' ); ?>

			</div><!-- /entrytext -->

		</div><!-- /post -->

	</div><!-- /main_column_inner -->

</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>
