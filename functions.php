<?php /*
================================================================================
Theme Functions
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/



/**
 * Define a version for this theme, so that updates refresh stylesheets.
 *
 * @since 1.0
 */
define( 'THEBALL_VERSION', '2.4.4' );



if ( ! function_exists( 'theball_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override theball_setup() in a child theme, add your own theball_setup to your
 * child theme's functions.php file. To augment it, just define your own setup function.
 *
 * @since 1.0
 */
function theball_setup() {

	/*
	 * Make theme available for translation.
	 *
	 * Translations can be added to the /languages/ directory of the child theme.
	 */
	load_theme_textdomain(
		'theball',
		get_template_directory() . '/languages'
	);

	// Use Featured Images (also known as post thumbnails)
	add_theme_support( 'post-thumbnails' );

	/*
	 * Let WordPress manage the document title.
	 * This theme does not use a hard-coded <title> tag in the document head,
	 * WordPress will provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	// Let JetPack handle infinite scroll.
	add_theme_support( 'infinite-scroll', [
		//'type' => 'click',
		'type' => 'scroll',
		//'footer_widgets' => false,
		'container' => 'main_column_inner',
		'footer' => false,
		//'wrapper' => true,
		//'render' => false,
		//'posts_per_page' => false,
	] );
	*/

	// To use wp_nav_menu() we first need to register one.
	register_nav_menu( 'theball_menu', __( 'Table of Contents', 'theball' ) );

}

endif; // End theball_setup.

// Add an action for the above.
add_action( 'after_setup_theme', 'theball_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since 2.2.2
 *
 * @global int $content_width
 */
function theball_content_width() {

	// The annoying default content width.
	$GLOBALS['content_width'] = apply_filters( 'theball_content_width', 660 );

}

// Add an action for the above.
add_action( 'after_setup_theme', 'theball_content_width', 0 );



if ( ! function_exists( 'theball_enqueue_scripts_and_styles' ) ) :
/**
 * Add front-end screen styles.
 *
 * @since 1.0
 */
function theball_enqueue_scripts_and_styles() {

	// -------------------------------------------------------------------------
	// Stylesheets
	// -------------------------------------------------------------------------

	// Enqueue screen styles.
	wp_enqueue_style(
		'theball_screen_css',
		get_template_directory_uri() . '/assets/css/screen.css',
		[],
		THEBALL_VERSION, // Version.
		'all' // Media.
	);

	// On main site.
	if ( is_main_site() ) {

		// Add main site styles.
		wp_enqueue_style(
			'theball_main_css',
			get_template_directory_uri() . '/assets/css/main.css',
			[ 'theball_screen_css' ],
			THEBALL_VERSION, // Version.
			'all' // Media.
		);

		// On network home.
		if ( is_front_page() ) {

			// Add homepage styles.
			wp_enqueue_style(
				'theball_home_css',
				get_template_directory_uri() . '/assets/css/home.css',
				[ 'theball_main_css' ],
				THEBALL_VERSION, // Version.
				'all' // Media.
			);

		}

	}

	// -------------------------------------------------------------------------
	// Javascript
	// -------------------------------------------------------------------------

	// Navigation script.
	wp_enqueue_script(
		'theball_navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		[],
		THEBALL_VERSION,
		true
	);

	/*
	// Theme javascript.
	wp_enqueue_script(
		'theball_general',
		get_template_directory_uri() . '/assets/js/the-ball.js',
		[ 'jquery' ],
		THEBALL_VERSION
	);
	*/

	// Include on network home.
	if ( is_main_site() AND is_front_page() ) {

	}

	// Is it a post?
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
endif; // End theball_enqueue_scripts_and_styles.

// Add a filter for the above, very late so it (hopefully) is last in the queue.
add_action( 'wp_enqueue_scripts', 'theball_enqueue_scripts_and_styles', 100 );



if ( ! function_exists( 'theball_enqueue_print_styles' ) ):
/**
 * Add front-end print styles.
 *
 * @since 1.0
 */
function theball_enqueue_print_styles() {

	// Add print CSS.
	wp_enqueue_style(
		'theball_print_css',
		get_template_directory_uri() . '/assets/css/print.css',
		[ 'theball_screen_css' ], // Dependencies.
		THEBALL_VERSION, // Version.
		'print' // Media.
	);

}
endif; // End theball_enqueue_print_styles.

// Add a filter for the above, even later so it (hopefully) is last in the queue.
add_action( 'wp_enqueue_scripts', 'theball_enqueue_print_styles', 110 );



/**
 * Get admin stylesheet.
 *
 * @since 1.0
 */
function cmw_add_admin_style() {

	// Construct path to admin.css.
	$filepath = get_template_directory() . '/assets/css/admin.css';

	// Is our stylesheet present?
	if ( file_exists( $filepath ) ) {

		// Add admin style overrides.
		echo '<!-- custom admin styles -->
<link rel="stylesheet" type="text/css" media="screen" href="' . get_template_directory_uri() . '/assets/css/admin.css" />
' . "\n\n";

	}

}

// Modify admin styles.
//add_action( 'admin_head', 'cmw_add_admin_style' );



/**
 * Include login stylesheet,
 *
 * @since 1.0
 */
function cmw_add_login_style() {

	// Construct path to admin.css.
	$filepath = get_template_directory() . '/assets/css/login.css';

	// Is our stylesheet present?
	if ( file_exists( $filepath ) ) {

		// Add login style overrides.
		echo '<!-- custom login styles -->
<link rel="stylesheet" type="text/css" media="screen" href="' . get_template_directory_uri() . '/assets/css/login.css" />
' . "\n\n";

	}

}

// Modify login styles.
add_action( 'login_head', 'cmw_add_login_style' );



/**
 * Utility to get the ID of the body tag.
 *
 * @since 2.4
 *
 * @return string $body_id The ID of the body tag.
 */
function theball_body_id() {

	// Init.
	$body_id = '';

	// Set main blog id on the main site.
	if ( function_exists( 'is_main_site' ) ) {
		if ( is_main_site() ) {
			$body_id = ' id="main_blog" ';
		}
	}

	// --<
	return $body_id;

}



/**
 * Disable more link jump.
 *
 * @see http://codex.wordpress.org/Customizing_the_Read_More
 *
 * @since 1.0
 *
 * @param string $link The existing more jump link.
 * @return string $link The modified more jump link.
 */
function remove_more_jump_link( $link ) {

	$offset = strpos( $link, '#more-' );

	if ( $offset ) {
		$end = strpos( $link, '"',$offset );
	}

	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}

	// --<
	return $link;

}

// Add a filter for the above.
add_filter( 'the_content_more_link', 'remove_more_jump_link' );



/**
 * Wrap more link in a paragraph of its own.
 *
 * @since 1.0
 *
 * @param string $link The existing more link.
 * @return string $link The modified more link.
 */
function theball_more_link( $link ) {

	// Wrap in para tag.
	$link = '<p>' . $link . '</p>';

	// --<
	return $link;

}

// Add a filter for the above.
add_filter( 'the_content_more_link', 'theball_more_link', 20, 1 );



/**
 * Utility to add button css class to blog nav links.
 *
 * @since 1.0
 *
 * @param string $link The existing add jump link.
 * @return string $link The modified add jump link.
 */
function theball_add_link_css( $link ) {

	// Add CSS class.
	$link = str_replace( '<a ', '<a class="css_btn" ', $link );

	// --<
	return $link;

}

// Add filter for next/previous links.
//add_filter( 'previous_post_link', 'theball_add_link_css' );
//add_filter( 'next_post_link', 'theball_add_link_css' );



/**
 * Modify caption shortcode output.
 *
 * @since 1.0
 *
 * @param array $attr Attributes attributed to the shortcode.
 * @param string $content Optional. Shortcode content.
 * @return string $caption The customised caption.
 */
function theball_image_caption_shortcode( $empty = null, $attr, $content ) {

	// Get our shortcode vars.
	extract( shortcode_atts( [
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	], $attr) );

	if ( 1 > (int) $width || empty( $caption ) ) {
		return $content;
	}

	// Sanitise id.
	if ( $id ) {
		$id = 'id="' . esc_attr( $id ) . '" ';
	}

	// Add space prior to alignment.
	$_alignment = ' ' . esc_attr( $align );

	// Get width.
	$_width = ( 0 + (int) $width );

	// Construct.
	$caption = '<div class="captioned_image' . $_alignment . '" style="width: ' . $_width . 'px"><span ' . $id . ' class="wp-caption">'
	. do_shortcode( $content ) . '</span><small class="wp-caption-text">' . $caption . '</small></div>';

	// --<
	return $caption;

}

// Add a filter for the above.
add_filter( 'img_caption_shortcode', 'theball_image_caption_shortcode', 10, 3 );



/**
 * Utility to concatenate names.
 *
 * @since 1.0
 *
 * @param string $forename The forename.
 * @param string $surname The surname.
 * @return string $fullname The concatenated full name.
 */
function theball_get_full_name( $forename, $surname ) {

	// Init return.
	$fullname = '';

	// Add forename.
	if ( $forename != '' ) {
		$fullname .= $forename;
	}

	// Add surname.
	if ( $surname != '' ) {
		$fullname .= ' ' . $surname;
	}

	// Strip any whitespace.
	$fullname = trim( $fullname );

	// --<
	return $fullname;

}



/**
 * Custom comments display function.
 *
 * @since 1.0
 *
 * @param string $comment The comment.
 * @param array $args The comment arguments.
 * @param int $depth The comment depth.
 */
function theball_comments( $comment, $args, $depth ) {

	// Enable Wordpress API on comment.
	$GLOBALS['comment'] = $comment;

	// -------------------------------------------------------------------------
	// Comment HTML
	// -------------------------------------------------------------------------
	?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

		<div class="comment-wrapper">

		<div id="comment-<?php comment_ID(); ?>">

		<div class="comment-identifier clearfix">

		<?php echo get_avatar( $comment, $size='50' ); ?>

		<?php edit_comment_link( __( 'Edit comment', 'theball' ), '<span class="alignright">', '</span>' ); ?>

		<?php printf( __( '<cite class="fn">%s</cite>', 'theball' ), get_comment_author_link() ); ?>

		<a class="comment_permalink" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( __( '%1$s at %2$s', 'theball' ), get_comment_date(),  get_comment_time()) ?></a>

		</div><!-- /comment-identifier -->

		<div class="comment-content">

		<?php if ( $comment->comment_approved == '0' ) { ?>
		<p><em><?php _e( 'Your comment is awaiting moderation.', 'theball' ); ?></em></p>
		<?php } ?>

		<?php comment_text() ?>

		</div><!-- /comment-content -->

		<div class="reply">

		<?php

		// USe comment_reply_link.
		echo comment_reply_link(
			array_merge(
				$args,
				[
					'depth' => $depth,
					'max_depth' => $args['max_depth'],
				]
			)
		);

		?>

		</div><!-- /reply -->

		</div><!-- /comment-<?php comment_ID(); ?> -->

		</div><!-- /comment-wrapper -->

	<?php

} // End function.



if ( ! function_exists( 'theball_multipager' ) ):
/**
 * Adds some style to multipager elements.
 *
 * @since 1.0
 *
 * @return string $page_links The multipager page links.
 */
function theball_multipager() {

	// Set default behaviour.
	$defaults = [
		'before' => '<div class="multipager">',
		'after' => '</div>',
		'link_before' => '',
		'link_after' => '',
		'next_or_number' => 'next',
		'nextpagelink' => '<span class="alignright">' . __( 'Next page','theball' ) . ' &raquo;</span>',
		'previouspagelink' => '<span class="alignleft">&laquo; ' . __( 'Previous page','theball' ) . '</span>',
		'pagelink' => '%',
		'more_file' => '',
		'echo' => 0,
	];

	// Get page links.
	$page_links = wp_link_pages( $defaults );

	// Add separator when there are two links.
	$page_links = str_replace(
		'a><a',
		'a> <span class="multipager_sep">|</span> <a',
		$page_links
	);

	// Get page links.
	$page_links .= wp_link_pages( [
		'before' => '<div class="multipager multipager_all"><span>' . __( 'Pages: ','theball' ) . '</span>',
		'after' => '</div>',
		'pagelink' => '<span class="multipager_link">%</span>',
		'echo' => 0,
	] );

	// --<
	return $page_links;

}
endif; // End theball_multipager.



if ( ! function_exists( 'theball_widgets_init' ) ):
/**
 * Register our widgets.
 *
 * @since 1.0
 */
function theball_widgets_init() {

	// Define an area where a widget may be placed.
	register_sidebar( [
		'name' => __( 'SOF Homepage Top Main', 'theball' ),
		'id' => 'sof-home-top-main',
		'description' => __( 'A widget area at the top of the site home page', 'theball' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	] );

	// Define an area where a widget may be placed.
	register_sidebar( [
		'name' => __( 'SOF Homepage Top Right', 'theball' ),
		'id' => 'sof-home-top-right',
		'description' => __( 'A widget area at the top of the site home page', 'theball' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	] );

	// Define an area where a widget may be placed.
	register_sidebar( [
		'name' => __( 'SOF Homepage Top Sub', 'theball' ),
		'id' => 'sof-home-top-sub',
		'description' => __( 'A widget area at the top of the site home page', 'theball' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	] );

	// Define an area where a widget may be placed.
	register_sidebar( [
		'name' => __( 'SOF Homepage Social Column', 'theball' ),
		'id' => 'sof-home-middle',
		'description' => __( 'A widget area in the middle of the site home page', 'theball' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	] );

	// Define an area where a widget may be placed.
	register_sidebar( [
		'name' => __( 'SOF Homepage About Column', 'theball' ),
		'id' => 'sof-home-middle-right',
		'description' => __( 'A widget area in the middle right of the site home page', 'theball' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	] );

}
endif; // End theball_widgets_init.

// Add action for the above.
add_action( 'widgets_init', 'theball_widgets_init' );



if ( ! function_exists( 'theball_gallery_shortcode' ) ):
/**
 * Filter the gallery shortcode after Jetpack does.
 *
 * @since 1.0
 */
function theball_gallery_shortcode( $a, $b ) {

	// Stop Fancybox from triggering.
	return str_replace( '<a ', '<a class="nolightbox" ', $a );

}
endif;

// Add filter for the above.
add_filter( 'post_gallery', 'theball_gallery_shortcode', 1011, 2 );



if ( ! function_exists( 'theball_geomashup_map_link_get' ) ):
/**
 * Get a link to the map if the current post has a location set.
 *
 * @since 2.3.2
 */
function theball_geomashup_map_link_get() {

	// Disable.
	return;

	// Init.
	$map_link = '';

	// Do we have the plugin and some coordinates?
	if ( class_exists( 'GeoMashup' ) ) {
		if ( GeoMashup::current_location( null, 'post' ) ) {
			$map_link = ' <a href="#geomap">here</a>';
		}
	}

	// --<
	return $map_link;

}
endif;



if ( ! function_exists( 'theball_geomashup_map_get' ) ):
/**
 * Show the map for a post.
 *
 * @since 2.3.2
 */
function theball_geomashup_map_get() {

	// Do we have the plugin and some coordinates?
	if ( class_exists( 'GeoMashup' ) ) {
		if ( GeoMashup::current_location( null, 'post' ) ) {

			?>
			<!-- Start of Map Area -->
			<div id="geomap" class="wikitext">
				<?php echo GeoMashup::map(); ?>
			<!-- End of Map Area -->
			</div>
			<?php

		}
	}

}
endif;



if ( ! function_exists( 'theball_author_posts_link' ) ):
/**
 * Filter the author link to accommodate Co-Authors Plus.
 *
 * @since 2.3.2
 *
 * @param string $link HTML link.
 */
function theball_author_posts_link( $link ) {

	// Bail if no Co-Authors Plus.
	if ( ! function_exists( 'get_coauthors' ) ) {
		return $link;
	}

	// Get multiple authors.
	$authors = get_coauthors();

	// Bail if none.
	if ( empty( $authors ) ) {
		return $link;
	}

	// Construct in the form "name, name, name & name".
	$link = '';

	// Init counter.
	$n = 1;

	// Find out how many author we have.
	$author_count = count( $authors );

	// Loop.
	foreach( $authors AS $author ) {

		// Default to comma.
		$sep = ', ';

		// Use ampersand if we're on the penultimate.
		if ( $n == ( $author_count - 1 ) ) {
			$sep = ' &amp; ';
		}

		// If we're on the last, don't add.
		if ( $n == $author_count ) {
			$sep = '';
		}

		// Construct link.
		$link .= sprintf( '<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
			esc_url( get_author_posts_url( $author->ID, $author->user_nicename ) ),
			/* translators: %s: author's display name */
			esc_attr( sprintf( __( 'Posts by %s' ), $author->display_name ) ),
			esc_html( $author->display_name )
		);

		// And separator.
		$link .= $sep;

		// Increment.
		$n++;

	}

	// --<
	return $link;

}
endif;

// Add filter for the above.
add_filter( 'the_author_posts_link', 'theball_author_posts_link', 10, 1 );



if ( ! function_exists( 'theball_team_members' ) ):
/**
 * Get the team members as WordPress users.
 *
 * @since 2.4.1
 *
 * @return array $users_sorted The array of WordPress user objects for the team.
 */
function theball_team_members() {

	// Init with default set of team members.
	$default = [ 7, 2, 3, 5, 4 ];

	/**
	 * Filter the default set to customise team per journey.
	 *
	 * @since 2.4.1
	 *
	 * @param array $default The default set of team members.
	 * @return array $default The modified set of team members.
	 */
	$include_users = apply_filters( 'theball_team_members', $default );

	// Get the users by ID.
	$users = get_users( [
		'include' => $include_users,
		'orderby' => 'include',
	] );

	// --<
	return $users;

}
endif;



if ( ! function_exists( 'theball_site_icon_meta_tags' ) ):
/**
 * Filters the site icon meta tags.
 *
 * To make this work, upload both black *and* white logos and leave the white
 * logo in place. This function will replace the favicons with the black versions.
 *
 * @since 2.4.2
 *
 * @param array $meta_tags Existing Site Icon meta elements.
 * @return array $meta_tags Modified Site Icon meta elements.
 */
function theball_site_icon_meta_tags( $meta_tags ) {

	// Bail if none.
	if ( empty( $meta_tags ) ) return $meta_tags;

	// Loop through them.
	foreach( $meta_tags AS $key => $meta_tag ) {

		// Replace white with black icons.
		if ( false !== strpos( $meta_tag, 'rel="icon"' ) ) {
			$meta_tags[$key] = str_replace( 'white', 'black', $meta_tag );
		}

	}

	// --<
	return $meta_tags;

}
endif;

// Add filter for the above.
//add_filter( 'site_icon_meta_tags', 'theball_site_icon_meta_tags', 10, 1 );



