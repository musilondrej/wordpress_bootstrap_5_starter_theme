<?php

/* ************************************************* */
/* remove wp version param from any enqueued scripts */
/* ************************************************* */
function at_remove_wp_ver_css_js($src)
{
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}


/* ************************************* /*
/* remove unnecessary header information /*
/* ************************************* */
function remove_header_info()
{
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // for WordPress >= 3.0
}
add_action('init', 'remove_header_info');


/* *************************************************** */
/*Disable ping back scanner and complete xmlrpc class. */
/* *************************************************** */
add_filter('wp_xmlrpc_server_class', '__return_false');
add_filter('xmlrpc_enabled', '__return_false');


/* ************************ */
/* * Remove various feeds * */
/* ************************ */
function fb_disable_feed()
{
    wp_die(__('No feed available,please visit our <a href="' . get_bloginfo('url') . '">homepage</a>!'));
}


/* ************************************ */
/* Disable File Edit in WordPress admin */
/* ************************************ */
function disable_file_edit()
{
    define('DISALLOW_FILE_EDIT', TRUE);
}

add_action('init', 'disable_file_edit');

