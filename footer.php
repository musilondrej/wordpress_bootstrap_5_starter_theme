<footer class="pt-4 my-md-5 pt-md-5 border-top">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md">
				<?php the_custom_logo(); ?>

				<p class="mt-4">
					<?= bloginfo('description'); ?>
				</p>

				<small class="d-block mb-3 text-muted">
					© <?= date("Y"); ?> - <?= get_bloginfo('name'); ?>, <?php esc_html_e('All rights reserved.', 'bitspecter'); ?>
				</small>
			</div>
			<div class="col-6 col-md">
				<h3 class="h5 mb-4">
					<?= wp_get_nav_menu_name('footer') ?>
				</h3>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer-menu',
						'menu_class' => 'nav flex-column',
						'container' => 'ul',
						'add_li_class'  => 'nav-item',
						'link_class'   => 'nav-link text-nowrap ps-0',
					)
				);
				?>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>

</html>