<!-- sidebar.php -->

<div class="right_column clearfix">
<div class="right_column_inner">



<?php

/*
// show Facebook Info, if connected...
if ( function_exists('fbc_render_login_state') ) {
	echo '
		<div id="wp-facebook-info">
			<div class="fbc_loginstate_top">'.fbc_render_login_state() .'</div>
		</div>';
}
*/

?>



<?php

/*
--------------------------------------------------------------------------------
2014 Teaser
--------------------------------------------------------------------------------
*/

?><div class="post ball_teaser ball_teaser_row_start">

<div class="route_map">

<a href="/2014/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/interface/2014_route-320x237.jpg" alt="The 2014 route" title="The 2014 route" width="320" height="237" class="alignnone size-thumbnail" /></a>

<div class="route_map_text">

<h2><a href="/2014/" style="text-shadow: none">The Ball 2014</a></h2>

</div>

</div>

<div class="ball_teaser_text">

<p><em>The Ball 2014</em> left England on 9th Jan 2014 and headed to the World Cup in Sao Paulo, Brazil.</p>

<ul class="actionlist">
<li><a href="/2014/">More about 2014...</a></li>
<li><a href="/2014/blog/">Go to the 2014 blog</a></li>
</ul>

</div>

</div><!-- /post ball_teaser -->




<?php

/*
--------------------------------------------------------------------------------
2010 Teaser
--------------------------------------------------------------------------------
*/

?><div class="post ball_teaser">

<div class="route_map">

<a href="/2010/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/interface/2010_route-320x238.jpg" alt="The 2010 route" title="The 2010 route" width="320" height="238" class="alignnone size-thumbnail" /></a>

<div class="route_map_text">

<h2><a href="/2010/" style="text-shadow: none">The Ball 2010</a></h2>

</div>

</div>

<div class="ball_teaser_text">

<p><em>The Ball 2010</em> left England on 24th Jan 2010 headed to the Opening Ceremony in Johannesburg, South Africa.</p>

<ul class="actionlist">
<li><a href="/2010/">More about 2010...</a></li>
<li><a href="/2010/blog/">Go to the 2010 blog</a></li>
<li><a href="/2010/blog/2010/01/12/the-ball-2010-kickoff/">Start reading from the kickoff</a></li>
</ul>

</div>

</div><!-- /post ball_teaser -->




<?php

/*
--------------------------------------------------------------------------------
2006 Teaser
--------------------------------------------------------------------------------
*/

?><div class="post ball_teaser ball_teaser_row_start">

<div class="route_map">

<a href="/2006/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/interface/2006_route-320x240.jpg" alt="The 2006 Route" title="The 2006 Route" width="320" height="240" class="alignnone size-thumbnail" /></a>

<div class="route_map_text">

<h2><a href="/2006/" style="text-shadow: none">The Ball 2006</a></h2>

</div>

</div>

<div class="ball_teaser_text">

<p><em>The Ball 2006</em> travelled from London to the Opening Ceremony in Munich, Germany.</p>

<ul class="actionlist">
<li><a href="/2006/">More about 2006...</a></li>
<li><a href="/2006/blog/2006/05/30/the-ball-is-underway">Start reading from the beginning</a></li>
<li><a href="/2006/blog/2006/06/06/we-make-it-to-ypres-and-reach-back-in-time">The Ball reaches Ypres</a></li>
</ul>

</div>

</div><!-- /post ball_teaser -->





<?php

/*
--------------------------------------------------------------------------------
2002 Teaser
--------------------------------------------------------------------------------
*/

?><div class="post ball_teaser ball_teaser_2002">

<div class="route_map">

<a href="/2002/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/interface/2002_route-320x240.jpg" alt="The 2002 Route" title="The 2002 Route" width="320" height="240" class="alignnone size-thumbnail" /></a>

<div class="route_map_text">

<h2><a href="/2002/" style="text-shadow: none">The Ball 2002</a></h2>

</div>

</div>

<div class="ball_teaser_text">

<p><em>The Ball 2002</em> was carried 7000 miles across Europe and Asia to the World Cup finals in Korea &amp; Japan.</p>

<ul class="actionlist">
<li><a href="/2002/">More about 2002...</a></li>
<li><a href="/2002/blog/2002/02/23/from-the-other-side-of-the-room">Start reading from the beginning</a></li>
<li><a href="/2002/videos">Watch short videos of the journey</a></li>
</ul>

</div>

</div><!-- /post ball_teaser -->





<?php

/*
--------------------------------------------------------------------------------
Donate
--------------------------------------------------------------------------------
*/

/*
?><div class="right_column_inner padded_b">

<div class="post">

<h2><a href="http://www.aliveandkicking.org.uk/Donate.html" style="text-shadow: none">Donate a ball!</a></h2>

<div class="vimeo">
<a href="http://www.aliveandkicking.org.uk/Donate.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/interface/donate_a_ball.jpg" alt="Donate a ball!" title="Donate a ball!" width="240" height="180" /></a>
</div>

<p><em>Pass the ball on!</em> All footballs donated via <a href="http://www.aliveandkicking.org.uk/Donate.html">Alive &amp; Kicking's website</a> before the 2010 World Cup went to Special Olympics programmes in sub-Saharan Africa. But you can still donate a ball to a good cause...</p>

<p><a href="http://www.aliveandkicking.org.uk/Donate.html" style="text-transform: uppercase;">Donate now!</a></p>

</div><!-- /post -->

</div><!-- /right_column_inner -->

<?php

*/






/*
--------------------------------------------------------------------------------
Recent Posts
--------------------------------------------------------------------------------
*/

/*

// display recent posts only on homepage
if ( $_is_homepage ) {

?>

<?php switch_to_blog( 4 ); // switch to 2010 blog ?>

<div class="right_column_inner padded_b">

<div class="archive_wrapper">

<h2>Most recent posts</h2>

<ul>

<?php

// get latest post
$latest = get_posts('numberposts=12');

foreach($latest as $post) {

	// set up data
	setup_postdata($post);

	?><li>
	<h4><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a></h4>
	<p>Published on <?php the_time('F jS, Y') ?></p>
	</li>

	<?php

} // end foreach

?>

</ul>

</div><!-- /archive_wrapper -->

</div><!-- /right_column_inner -->

<?php */






/*
--------------------------------------------------------------------------------
Recent Posts
--------------------------------------------------------------------------------
*/

/*
if (function_exists('get_recent_comments')) { ?>
<div class="right_column_inner padded_b">

<div class="archive_wrapper">

<h2><?php _e('Most recent comments'); ?></h2>

<ul>
<?php get_recent_comments(); ?>
</ul>

</div><!-- /archive_wrapper -->

</div><!-- /right_column_inner -->
<?php }

*/

?>



<?php

/*

if (function_exists('get_recent_trackbacks')) { ?>
<div class="right_column_inner padded_b">

<div class="archive_wrapper">

<h2><?php _e('Recent Trackbacks:'); ?></h2>

<ul>
<?php get_recent_trackbacks(); ?>
</ul>

</div><!-- /archive_wrapper -->

</div><!-- /right_column_inner -->
<?php }

?>



<?php restore_current_blog(); ?>

<?php

} // end display choice

*/

?>





<?php

/*
--------------------------------------------------------------------------------
Archives
--------------------------------------------------------------------------------
*/

/*
// display archives only on blog home
if ( $_side == 'is_home' ) {

?>
<div class="right_column_inner padded_b">

<div class="archive_wrapper">

<h2>Monthly Archives</h2>

<ul>
<?php switch_to_blog( 4 ); // switch to 2010 blog ?>
<?php wp_get_archives('type=monthly'); ?>
<?php restore_current_blog(); ?>
</ul>

</div><!-- /archive_wrapper -->

</div><!-- /right_column_inner -->
<?php

} // end display choice
*/

?>



</div><!-- /.right_column_inner -->
</div><!-- /.right_column -->






