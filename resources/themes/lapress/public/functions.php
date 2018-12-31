<?php

use Spatie\ResponseCache\Facades\ResponseCache;

require_once __DIR__.'/inc/setup.php';
require_once __DIR__.'/inc/pages.php';
require_once __DIR__.'/inc/postTypes.php';
require_once __DIR__.'/inc/metaboxes.php';


if (!function_exists('lapress_save_post_hook')) {
    function lapress_save_post_hook($postId)
    {
        if (wp_is_post_revision($postId)) {
            return;
        }

        ResponseCache::clear();
    }

    add_action('save_post', 'lapress_save_post_hook');
}
