<?php
/**
 * 404 Template.
 *
 * @since 1.0.0
 * @package The_Ball
 */

get_header();

?><!-- 404.php -->

<div id="content_wrapper" class="clearfix">

<?php $site_banner = locate_template( 'assets/includes/site_banner.php' ); ?>
<?php if ( $site_banner ) : ?>
	<?php load_template( $site_banner ); ?>
<?php endif; ?>

<div class="main_column clearfix">

	<div class="main_column_inner" id="main_column_splash">

		<div class="post">

			<div class="entrytext clearfix">

				<h2><?php esc_html_e( 'Offside!', 'theball' ); ?></h2>

				<img style="width: 200px; height: 150px; float: left;" class="padded_br" src="<?php echo get_template_directory_uri(); ?>/assets/images/interface/offside_200.jpg" alt="<?php esc_attr_e( 'A whistle for offside', 'theball' ); ?>" />

				<p><?php esc_html_e( 'The page you requested has not been found on this server. Perhaps you could use the search form below to look for it?', 'theball' ); ?></p>

				<?php

				$broken = sprintf(
					/* translators: 1: Opening anchor tag, 2: Closing anchor tag. */
					__( 'If we have got a broken link on this site, or you’re really really sure the page should be there, then mailing the details to the %1$swebmaster%2$s would be appreciated.', 'theball' ),
					'<a href="mailto:webmaster@theball.tv">',
					'</a>'
				);

				?>

				<p><?php echo $broken; ?></p>

			</div><!-- /entrytext -->

		</div><!-- /post -->

	</div><!-- /main_column_inner -->


	<div class="main_column_inner">

		<div class="post">

			<div class="entrytext clearfix">
				<?php $searchform = locate_template( 'searchform.php' ); ?>
				<?php if ( $searchform ) : ?>
					<?php load_template( $searchform ); ?>
				<?php endif; ?>
			</div><!-- /entrytext -->

		</div><!-- /post -->

	</div><!-- /main_column_inner -->

</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>
