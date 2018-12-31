<?php
/**
 * laPress theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lapress
 */
if (!function_exists('lapress_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function lapress_setup()
    {
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        $menus = collect(config('wordpress.menus'))->mapWithKeys(function ($menu, $key) {
            return [
                $menu => trans('labels.menus.'.$menu)
            ];
        });

        register_nav_menus($menus->toArray());

        foreach (config('wordpress.images.sizes') as $name => $size) {
            add_image_size($name,
                $size['width'], $size['height'],
                !empty($size['crop']) ? $size['crop'] : true
            );
        }
    }

    add_action('after_setup_theme', 'lapress_setup');
}

if (! function_exists('lapress_remove_admin_menu_links')) {
    function lapress_remove_admin_menu_links()
    {
        remove_submenu_page('themes.php', 'themes.php');
    }
    add_action('admin_menu', 'lapress_remove_admin_menu_links');
}

/**
 * Hook into category to update indexes
 */
if(! function_exists('edit_category_hook') )
{
    /**
     * @param int $termId
     */
    function edit_category_hook($termId)
    {
        \App\Category::whereTermId($termId)->first()->update();
    }
    add_action('edited_category', 'edit_category_hook', 10, 2);
}

