<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bitspecter
 */

?>

<article itemscope itemtype="https://schema.org/NewsArticle" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php b_title(); ?>
		</a>

		<div class="entry-meta d-flex justify-content-between py-3 border-bottom mb-4">
			<?php b_posted_on(); ?>
			<?php b_posted_by(); ?>
		</div>
	</header>

	<?php if (has_post_thumbnail()) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<div class="post-thumbnail mb-4">
				<?php the_post_thumbnail('large', ['class' => 'img-fluid w-100', 'title' => get_the_title(), 'alt' => get_the_title(), 'itemprop' => 'image']); ?>
			</div>
		</a>
	<?php endif; ?>


	<div class="entry-content">
		<?php if (is_single()) : ?>
			<?php the_content(); ?>
		<?php else : ?>
			<?php b_excerpt(); ?>
		<?php endif; ?>
	</div>

</article>