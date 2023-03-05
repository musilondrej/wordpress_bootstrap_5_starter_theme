<?php

define("REMOVE_EDITOR", true);
define("REMOVE_EMOJIS", true);
define("REMOVE_COMMENTS", false);

include_once('inc/hardening.php');
include_once('inc/helpers.php');
include_once('inc/excerpt.php');
include_once('inc/emoji.php');
include_once('inc/comments.php');

function custom_assets()
{
	wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/main.css', false, 1, 'all');
	wp_enqueue_script('app', get_template_directory_uri() . '/assets/js/app.js', 1, true);
}

add_action('wp_enqueue_scripts', 'custom_assets');



function add_link_to_admin_bar($admin_bar)
{
	$admin_bar->add_node([
		'id' => 'bitspecter',
		'title' => 'Bitspecter',
		'href'  => 'https://bitspecter.com',
		'meta' => [
			'target' => '_blank',
		]
	]);

	$admin_bar->add_node([
		'id' => 'bitspecter-support',
		'parent' => 'bitspecter',
		'title' => 'Support',
		'href'  => 'https://bitspecter.com/kontakt',
		'meta' => [
			'target' => '_blank',
		]
	]);
}

add_action('admin_bar_menu', 'add_link_to_admin_bar', 999);


// Add custom classes to wp_nav_menu
function add_additional_class_on_li($classes, $item, $args)
{
	if (isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}

add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menu_link_class($atts, $item, $args)
{
	if (property_exists($args, 'link_class')) {
		$atts['class'] = $args->link_class;
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class($classes, $item)
{
	if (in_array('current-menu-item', $classes)) {
		$classes[] = 'active ';
	}
	return $classes;
}

function setup()
{
	$theme_supports = array(
		'custom-logo',
		'custom-header',
		'custom-background',
		'post-thumbnails',
		'automatic-feed-links',
		'title-tag',
	);

	foreach ($theme_supports as $theme_support) {
		add_theme_support($theme_support);
	}

	load_theme_textdomain('bitspecter', get_template_directory() . '/languages');

	register_nav_menus(
		array(
			'primary' => esc_html__('Primary', 'bitspecter'),
			'footer' => esc_html__('Footer', 'bitspecter'),
			'sidebar' => esc_html__('Sidebar', 'bitspecter'),
		)
	);
}

add_action('after_setup_theme', 'setup');


function change_logo_class($html)
{
	
	$html = str_replace('custom-logo', 'navbar-logo', $html);
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	
	return $html;
}
add_filter('get_custom_logo', 'change_logo_class');