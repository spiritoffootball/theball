<?php get_header(); ?>

<!-- archive.php -->

<div id="content_wrapper" class="clearfix">



<?php include( get_stylesheet_directory().'/assets/includes/site_banner.php' ); ?>



<div class="main_column clearfix">



<?php if (have_posts()) : ?>



	<?php
	
	// Search Nav
	$pl = get_next_posts_link('&laquo; Older Posts');
	$nl = get_previous_posts_link('Newer Posts &raquo;');
	
	?>
	
	<?php if ( $nl != '' OR $pl != '' ) { ?>
	
	<ul class="blog_navigation clearfix">
		<?php if ( $nl != '' ) { ?><li class="alignright"><?php echo $nl; ?></li><?php } ?>
		<?php if ( $pl != '' ) { ?><li class="alignleft"><?php echo $pl; ?></li><?php } ?>
	</ul>
	
	<?php } ?>
	
	
	
	<div class="main_column_inner">
	
		<div class="post">
		<div class="post_header archive_header">
			
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Archive for &#8216;<?php single_cat_title(); ?>&#8217;</h2>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Posts tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author archive</h2>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog archives</h2>
		<?php } ?>
		
		</div>
		</div>
		
	</div><!-- /main_column_inner -->
	
	
	
	<div class="main_column_inner">
	
		<?php while (have_posts()) : the_post(); ?>

		<div class="post">

			<div class="post_header">
			<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			<p class="postname"><?php the_time('F jS, Y') ?>  by <?php the_author_posts_link(); ?></p>
			</div><!-- /post_header -->
	
			<div class="entry clearfix">
				<?php the_content('Read the rest of this entry &raquo;'); ?>
			</div>

			<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

		</div>

		<?php endwhile; ?>

	</div><!-- /main_column_inner -->



	<?php if ( $nl != '' OR $pl != '' ) { ?>
	
	<ul class="blog_navigation clearfix">
		<?php if ( $nl != '' ) { ?><li class="alignright"><?php echo $nl; ?></li><?php } ?>
		<?php if ( $pl != '' ) { ?><li class="alignleft"><?php echo $pl; ?></li><?php } ?>
	</ul>
	
	<?php } ?>
	
	
	
<?php else : ?>



	<div class="main_column_inner" id="main_column_splash">
	
		<div class="post">
		<div class="post_header archive_header">
			
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Nothing found for &#8216;<?php single_cat_title(); ?>&#8217;</h2>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Nothing found tagged with &#8216;<?php single_tag_title(); ?>&#8217;</h2>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Nothing found in the Archive for <?php the_time('F jS, Y'); ?></h2>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Nothing found in the Archive for <?php the_time('F, Y'); ?></h2>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Nothing found in the Archive for <?php the_time('Y'); ?></h2>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Nothing found in the Author Archive</h2>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Nothing found in the Blog Archives</h2>
		<?php } ?>
	
		</div>
		</div>
		
	</div><!-- /main_column_inner -->



	<div class="main_column_inner">
	
		<div class="post">
	
		<div class="entrytext clearfix">
			
			<p>Try searching for something?</p>

			<?php include ( get_template_directory() . '/searchform.php' ); ?>
	
		</div><!-- /entrytext -->
		
		</div><!-- /post -->
	
	</div><!-- /main_column_inner -->

	
	
<?php endif; ?>



</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>