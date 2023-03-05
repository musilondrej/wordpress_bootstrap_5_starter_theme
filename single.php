<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bitspecter
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<?php
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', get_post_type());

			the_post_navigation(array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'bitspecter') . '</span> ' .
					'<span class="screen-reader-text">' . __('Next post:', 'bitspecter') . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'bitspecter') . '</span> ' .
					'<span class="screen-reader-text">' . __('Previous post:', 'bitspecter') . '</span> ' .
					'<span class="post-title">%title</span>',
			));

			if (comments_open() || get_comments_number()) {
				comments_template();
			}
		endwhile;
		?>
	</div>
</main>

<?php
get_sidebar();
get_footer();
