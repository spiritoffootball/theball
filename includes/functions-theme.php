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
	if ( function_exists( 'is_main_site' ) AND  is_main_site() ) {
		$body_id = ' id="main_blog" ';
	}

	// --<
	return $body_id;

}



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



/**
 * Utility to concatenate names.
 *
 * @since 1.0.0
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



if ( ! function_exists( 'theball_multipager' ) ) :
/**
 * Adds some style to multipager elements.
 *
 * @since 1.0.0
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
		'nextpagelink' => '<span class="alignright">' . __( 'Next page', 'theball' ) . ' &raquo;</span>',
		'previouspagelink' => '<span class="alignleft">&laquo; ' . __( 'Previous page', 'theball' ) . '</span>',
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
		'before' => '<div class="multipager multipager_all"><span>' . __( 'Pages: ', 'theball' ) . '</span>',
		'after' => '</div>',
		'pagelink' => '<span class="multipager_link">%</span>',
		'echo' => 0,
	] );

	// --<
	return $page_links;

}
endif; // End theball_multipager.



