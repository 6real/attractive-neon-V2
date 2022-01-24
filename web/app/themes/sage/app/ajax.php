<?php

namespace App;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


function ajax_check_user_logged_in() {
    echo is_user_logged_in();
    die();
}

add_action('wp_ajax_nopriv_ajax_create_newsletter_post', 'App\Controllers\Newsletter::ajax_create_newsletter_post');
add_action('wp_ajax_ajax_create_newsletter_post', 'App\Controllers\Newsletter::ajax_create_newsletter_post');

add_action('wp_ajax_nopriv_ajax_create_product', 'App\Controllers\Form::ajax_create_product');
add_action('wp_ajax_ajax_create_product', 'App\Controllers\Form::ajax_create_product');
