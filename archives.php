<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<!-- archive.php -->

<div id="content_wrapper" class="clearfix">



<?php include( get_stylesheet_directory() . '/assets/includes/site_banner.php' ); ?>



<div class="main_column clearfix">



<div class="main_column_inner" id="main_column_splash">

<?php

// init
$has_feature_image = false;
$feature_image_class = '';

// do we have a feature image?
if ( has_post_thumbnail() ) {
	$has_feature_image = true;
	$feature_image_class = ' has_feature_image';
}

?>

<div class="post_header<?php echo $feature_image_class; ?>">

	<div class="post_header_inner">

		<?php

		// show feature image when we have one
		if ( $has_feature_image ) {
			echo get_the_post_thumbnail( get_the_ID(), 'medium-640' );
		}

		?>

	</div><!-- /post_header_inner -->

</div><!-- /post_header -->

<div class="post">
	<h2><?php bloginfo( 'title' ); ?> Archives</h2>
</div><!-- /post -->

</div><!-- /main_column_inner -->



<div class="main_column_inner">
<div class="post">
<div class="archive_wrapper">

<h3><?php echo apply_filters( 'theball_topics_title', __( 'Topics' ) ); ?></h3>

<ul>
<?php

// configure
$defaults = array(
	'show_option_all' => '',
	'orderby' => 'name',
	'order' => 'ASC',
	'show_last_update' => 0,
	'style' => 'list',
	'show_count' => 0,
	'hide_empty' => 1,
	'use_desc_for_title' => 1,
	'child_of' => 0,
	'feed' => '',
	'feed_type' => '',
	'feed_image' => '',
	'exclude' => '',
	'exclude_tree' => '',
	'current_category' => 0,
	'hierarchical' => true,
	'title_li' => '',
	'echo' => 1,
	'depth' => 0,
);

// show them
wp_list_categories( $defaults );

?>
</ul>

</div><!-- /archive_wrapper -->
</div><!-- /post -->
</div><!-- /main_column_inner -->



<div class="main_column_inner">
<div class="post">
<div class="archive_wrapper">

<h3><?php _e( 'Archives by Month', 'theball' ); ?></h3>

<ul>
<?php

// configure
$defaults = array(
	'type' => 'monthly',
	'limit' => '',
	'format' => 'html',
	'before' => '',
	'after' => '',
	'show_post_count' => false,
	'echo' => 1,
);

// show them
wp_get_archives( $defaults );

?>
</ul>

</div><!-- /archive_wrapper -->
</div><!-- /post -->
</div><!-- /main_column_inner -->



</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>
