<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bitspecter
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<?php if (have_posts()) : ?>

			<header class="page-header">
				<?php
				the_archive_title('<h1 class="page-title">', '</h1>');
				the_archive_description('<div class="taxonomy-description">', '</div>');
				?>
			</header>

			<div class="row">
				<?php
				while (have_posts()) : ?>
					<div class="col-md-4 mb-4">
						<?php
						the_post();
						get_template_part('template-parts/content', 'card');
						?>
					</div>
				<?php endwhile;
				the_posts_navigation();
				?>
			</div>
		<?php
		else :
			get_template_part('template-parts/content', 'none');
		endif;
		?>
	</div>
</main>

<?php
get_sidebar();
get_footer();
