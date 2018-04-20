<?php 
/*
Template Name: Homepage
*/

get_header(); 

?>

<!-- homepage.php -->

<div id="content_wrapper" class="clearfix">

	
					
<?php include( get_stylesheet_directory() . '/assets/includes/site_banner.php' ); ?>



<div class="main_column clearfix">



<div id="teasers">
<div id="shop_teaser" class="teaser_home"><a href="/shop/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/interface/shop_teaser.jpg" /></a></div>
<div id="video_teaser" class="teaser_home"><a href="/2010/videos/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/interface/video_teaser.jpg" /></a></div>
</div>



<div id="main_column_splash" class="main_column_inner">

<div class="post">

<div class="alignleft">
<a href="<?php echo get_template_directory_uri(); ?>/assets/images/interface/julio_cesar_header.jpg"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/interface/julio_cesar_header-320x240.jpg" alt="Brazil keeper Julio Cesar heads The Ball" title="Brazil keeper Julio Cesar heads The Ball" width="320" height="240" class="alignnone size-medium wp-image-96" /></a>
</div>

<div class="splash_copy">

<p><em>The fourth epic journey will kick off on January 9th, 2014, from Battersea Park, London, exactly 150 years to the day after the very first official game of football to FA rules was played in that very same field.</em></p>

<p>What better way could there be to celebrate this momentous event than by kicking off The Ball’s pilgrimage to the 2014 FIFA World Cup in Brazil, the country that has taken to football like no other?</p>

<p class="last_para"><a href="/2014/">Find out more &rarr;</a></p>

</div><!-- /splash_copy -->

</div><!-- /post -->

</div><!-- /main_column_inner -->



<div class="main_column_inner" id="watch_2010_trailer">

<div class="post">

<div class="entrytext">

<h2>Latest News</h2>

<p>FC Barcelona and Spirit of Football announced a joint social initiative on 23<sup>rd</sup> January 2013. To kick it off, the first-team players all signed a ball called "The Spirit of Barça" — a replica of The Ball 2014. This special ball will visit more than 100 schools across Brazil, including schools in a number of favelas.</p>

<div style="width: 638px; padding: 10px 10px 10px 10px; background: #f6f6f6; border: 1px solid #eee; margin-bottom: 1em"><iframe width="640" height="360" src="http://www.youtube.com/embed/fAIpLmF10pc" frameborder="0" allowfullscreen></iframe></div>

<img src="/wp-content/themes/theball/assets/images/partners/fc_barcelona_logo_large.png" class="alignright padded_bl" />

<p>To find out more, visit:<p/>

<ul>
	<li><a title="Spirit of Football Brazil" href="http://sof2014.com.br/">Spirit of Football Brazil website</a></li>
	<li><a href="http://www.facebook.com/SOF2014" title="SOF Brazil on Facebook">Spirit of Football Brazil on Facebook</a></li>
	<li><a href="https://twitter.com/sof2014" title="SOF Brazil on Twitter">Spirit of Football Brazil on Twitter</a></li>
	<li><a href="http://spiritoffootball.com/wp-content/uploads/2013/01/FCBarcelonaPressReleaseEnglish.pdf" title="FC Barcelona Press Release">FC Barcelona Press Release</a></li>
</ul>


</div><!-- /entrytext -->

</div><!-- /post -->

</div><!-- /main_column_inner -->



<div class="main_column_inner" id="watch_2010_trailer">

<div class="post">

<div class="entrytext">

<h2>The Ball 2010</h2>

<p>The short film below is an overview of the journey of The Ball 2010, which travelled from England to South Africa, supporting the work of Special Olympics and Alive &amp; Kicking.</p>

<div style="width: 638px; padding: 10px 10px 10px 10px; background: #f6f6f6; border: 1px solid #eee;"><iframe width="640" height="360" src="http://www.youtube.com/embed/1a8l4843Iro?rel=0" frameborder="0" allowfullscreen></iframe></div>

</div><!-- /entrytext -->

</div><!-- /post -->

</div><!-- /main_column_inner -->




<div class="main_column_inner">

<div class="post">

<div class="entrytext">

<h2>The final stories from 2010</h2>

<?php

// switch to 2010 blog 
switch_to_blog( 9 ); 

// new query
$homepage = new WP_Query( 'posts_per_page=6' );

$n = 0;

if ( $homepage->have_posts() ) : while ( $homepage->have_posts() ) : $homepage->the_post();

$even = '';
if ( $n % 2 == 1 ) { $even = ' even_post'; } else { $even = ' odd_post'; }

?><div class="mini_post<?php echo $even; ?>">

<?php

if ( has_post_thumbnail() ) {

	// USE FEATURED IMAGE

	?><a href="<?php the_permalink(); ?>"><?php
	echo get_the_post_thumbnail( get_the_ID(), 'medium-320' );
	?></a><?php
	
} else {

	// USE FIRST ATTACHMENT

	// set params to get first attachment (our image)
	$args = array(
	
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_status' => null,
		'post_parent' => $post->ID
		
	); 
	
	// get them...
	$attachments = get_posts( $args );
	
	// well?
	if ( $attachments ) {
	
		// we only want the first
		$_attachment = $attachments[0];
	
		?><a href="<?php the_permalink(); ?>"><?php
		
		echo wp_get_attachment_image( $_attachment->ID, 'medium' );
		
		?></a><?php
	
	}
	
}

?>

<div class="post_header_inner">

<h4><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a></h4>

</div>

</div><!-- /mini_post -->

<?php 

$n++;

endwhile; endif; ?>

<ul id="actionlist">
<li><a href="/2010/blog/">Read the 2010 blog</a></li>
<li><a href="/2010/blog/2010/01/12/join-us-to-kick-off-the-ball-2010/">Start reading from the kickoff</a></li>
<!--<li><a href="/2010/blog/2007/02/06/hello-world-2/">Start from the very beginning</a></li>-->
</ul>

</div><!-- /entrytext -->

</div><!-- /post -->

</div><!-- /main_column_inner -->



<?php

restore_current_blog(); 

?>



</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>