<?php

if (post_password_required()) {
	return;
}
?>

<div id="comments" class="comments-area">
	<h2>
		<?= esc_html__('Comments', 'musilondrej'); ?> (<?= get_comments_number(); ?>)
	</h2>

	<?php
	if (have_comments()) :
	?>
		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if (!comments_open()) :
		?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'musilondrej'); ?></p>
	<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div>
