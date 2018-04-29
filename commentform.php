<?php /*
===============================================================
Theme Comment Form
===============================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
---------------------------------------------------------------
NOTES

---------------------------------------------------------------
*/



// Do not delete these lines
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) AND 'commentform.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die( 'Please do not load this page directly. Thanks!' );
}



?><!-- commentform.php -->

<?php



// access post
global $post;

// test post comment status
if ( 'open' == $post->comment_status ) : ?>

	<div id="respond_wrapper">

	<div id="respond">

	<div class="cancel-comment-reply">
		<p><?php cancel_comment_reply_link( 'Click here to cancel' ); ?></p>
	</div>

	<h3>Leave a Reply</h3>

	<?php if ( get_option( 'comment_registration' ) && ! $user_ID ) : ?>

		<p>You must be <a href="<?php echo get_option( 'siteurl' ); ?>/wp-login.php?redirect_to=<?php echo urlencode( get_permalink() ); ?>">logged in</a> to post a comment.</p>

	<?php else : ?>

		<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="commentform">

			<fieldset id="author_details">

				<legend class="assistive-text">Your details</legend>

				<?php if ( $user_ID ) : ?>

					<p class="author_is_logged_in">Logged in as <a href="<?php echo get_option( 'siteurl' ); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> &rarr; <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Log out of this account">Log out</a></p>

				<?php else : ?>

					<p><label for="author"><small>Name<?php if ( $req ) echo ' <span class="req">(required)</span>'; ?></small></label><br />
					<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="30"<?php if ( $req ) echo ' aria-required="true"'; ?> /></p>

					<p><label for="email"><small>Mail (will not be published)<?php if ( $req ) echo ' <span class="req">(required)</span>'; ?></small></label><br />
					<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="30"<?php if ( $req ) { echo ' aria-required="true"'; } ?> /></p>

					<p class="author_not_logged_in"><label for="url"><small>Website</small></label><br />
					<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="30" /></p>

				<?php endif; ?>

				<?php

				// plugins
				if ( function_exists( 'twit_connect' ) ) { twit_connect(); }
				do_action( 'fbc_display_login_button' );

				?>

			</fieldset>

			<fieldset id="comment_details">

				<legend class="assistive-text">Your comment</legend>

				<label for="comment" class="assistive-text">Comment</label>
				<?php

				// in functions.php
				//if ( false === commentpress_add_wp_editor() ) {

					?>
					<textarea name="comment" class="comment" id="comment" cols="100%" rows="15"></textarea>
					<?php

				//}

				?>

				<p class="comment_tags">You can use these tags:<br />
				<code><?php echo allowed_tags(); ?></code></p>

			</fieldset>

			<?php

			// add default wp fields
			comment_id_fields();

			// compatibility with Subscribe to Comments Reloaded
			if ( function_exists( 'subscribe_reloaded_show' ) ) { ?>
				<div class="subscribe_reloaded_insert">
				<?php subscribe_reloaded_show(); ?>
				</div>
			<?php }

			?>

			<p id="respond_button"><input name="submit" type="submit" id="submit" value="Post Comment" /></p>

			<?php do_action( 'comment_form', $post->ID ); ?>

		</form>

	<?php

	// end if registration required and not logged in
	endif;

	?>

	</div><!-- /respond -->

	</div><!-- /respond_wrapper -->

<?php

// end open check
endif;

?>



