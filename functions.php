<?php

/**
 * Udemy University (uu) Function's.
 */

require_once get_template_directory() . '/classes/index.php';
require_once get_template_directory() . '/inc/index.php';

if (!function_exists('uu_setting_theme_supports')) {
    function uu_setting_theme_supports()
    {
        add_theme_support('title-tag');
    }
}
add_action('after_setup_theme', 'uu_setting_theme_supports');

if (!function_exists('uu_register_scripts')) {
    function uu_register_scripts()
    {
        wp_enqueue_style('customfont', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        wp_enqueue_style('customicon', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('normalizecss', get_theme_file_uri('assets/css/normalize.css'));
        wp_enqueue_style('maincss', get_theme_file_uri('assets/css/main.css'));

        wp_enqueue_script('mainjs', get_theme_file_uri('assets/js/main.js'), ['jquery'], false, true);
    }
}
add_action('wp_enqueue_scripts', 'uu_register_scripts');

if (!function_exists('uu_custom_queries')) {
    function uu_custom_queries($query)
    {
        if (is_admin() && !$query->is_main_query()) return;

        if (is_post_type_archive('event')) {
            $eventPostType = new EventPostType();

            foreach ($eventPostType->get_active_events_args() as $key => $value) {
                $query->set($key, $value);
            }
        }
    }
}
add_action('pre_get_posts', 'uu_custom_queries');
