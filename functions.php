<?php

if(!defined('ABSPATH')) {
    exit;
}

add_action('wp_enqueue_scripts', 'dynahub_enqueue_scripts');
add_action('admin_enqueue_scripts', 'dynahub_enqueue_scripts');
function dynahub_enqueue_scripts() {
    wp_enqueue_style('dynahub-style', get_template_directory_uri() . '/assets/css/style.css');
}