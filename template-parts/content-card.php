<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bitspecter
 */

?>

<article itemscope itemtype="https://schema.org/NewsArticle" id="post-<?php the_ID(); ?>" <?php post_class(['h-100']); ?>>
	<div class="card h-100">
		<?php if (has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail('large', ['class' => 'img-fluid card-img-top', 'title' => get_the_title(), 'alt' => get_the_title(), 'itemprop' => 'image']); ?>
			</a>
		<?php endif; ?>


		<div class="card-body">
			<header class="entry-header">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php b_title('h2'); ?>
				</a>

				<div class="entry-meta d-flex justify-content-between py-3 border-bottom mb-4">
					<?php b_posted_on(); ?>
					<?php b_posted_by(); ?>
				</div>
			</header>

			<?php b_excerpt(); ?>
		</div>
	</div>
</article>