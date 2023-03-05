<?php

if (!function_exists('b_title')) {
    function b_title(string $tag = 'h1')
    {
        $title = get_the_title();

        echo '<' . $tag . ' itemprop="headline" class="title">' . $title . '</' . $tag . '>';
    }
}

if (!function_exists('b_excerpt')) {
    function b_excerpt()
    {
        $excerpt = get_the_excerpt();
        echo '<p itemprop="description" class="excerpt">' . $excerpt . '</p>';
    }
}


if (!function_exists('b_posted_on')) {
    function b_posted_on()
    {
        $iso8601 = get_the_date('c');
        $human = get_the_date();

        echo '<time class="entry-date published" content="' . $iso8601 . '" itemprop="datePublished">' . $human . '</time>';
    }
}


if (!function_exists('b_posted_by')) {
    function b_posted_by()
    {
        $byline = sprintf(
            esc_html_x('by %s', 'post author', '_s'),
            '<span class="entry-author" itemprop="author" itemscope itemtype="https://schema.org/Person"><a itemprop="url" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '"><span itemprop="name">' . esc_html(get_the_author()) . '</span></a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
    }
}
