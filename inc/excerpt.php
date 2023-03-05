<?php

function new_excerpt_more($more)
{
    return '...';
}

add_filter('excerpt_more', 'new_excerpt_more');



function limit_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'limit_excerpt_length');
