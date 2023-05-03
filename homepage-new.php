<?php
/**
 * Template Name: Main Site Homepage
 *
 * @since 1.0.0
 *
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- homepage-new.php -->

<div id="content_wrapper" class="clearfix">

<?php $site_banner = locate_template( 'assets/includes/site_banner.php' ); ?>
<?php if ( $site_banner ) : ?>
	<?php load_template( $site_banner ); ?>
<?php endif; ?>

<div class="main_column clearfix">

	<div class="about_widget">
		<?php dynamic_sidebar( 'sof-middle-right' ); ?>
	</div>

	<div class="social_widget">
		<?php dynamic_sidebar( 'sof-middle-left' ); ?>
	</div>

</div><!-- /main_column -->

<?php get_footer(); ?>
