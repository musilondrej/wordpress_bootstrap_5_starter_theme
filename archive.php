<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bitspecter
 */

get_header();
?>

<main id="primary" class="site-main">

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
				<div class="col-md-4">
					<?php
					the_post();
					get_template_part('template-parts/content', get_post_type());
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

</main>

<?php
get_sidebar();
get_footer();
