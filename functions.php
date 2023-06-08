<?php

require_once get_template_directory() . '/helpers/index.php';

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('customfont', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('customicon', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('normalizecss', get_theme_file_uri('assets/css/normalize.css'));
    wp_enqueue_style('maincss', get_theme_file_uri('assets/css/main.css'));

    wp_enqueue_script('mainjs', get_theme_file_uri('assets/js/main.js'), [], false, true);
});
