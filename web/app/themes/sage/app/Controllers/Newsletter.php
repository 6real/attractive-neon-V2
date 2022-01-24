<?php

namespace App\Controllers;

use Sober\Controller\Controller;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Newsletter extends Controller
{

    public static function ajax_create_newsletter_post()
    {

        $nonce = $_POST['_ajax_nonce'];
        $nonceResponse = wp_verify_nonce($nonce, 'my_nonce');

        if ($nonceResponse !== 1) {
            wp_send_json_error('SECURITY CHECK : Invalid nonce');
        } else if ($_POST['mail']) {

            $post_information = [
                'post_title' => $_POST['mail'],
                'post_type' => 'newsletter',
                'post_status' => 'publish',
            ];

            $postID = wp_insert_post($post_information);
            update_field('mail', $_POST['mail'], $postID);
            update_field('checkbox', $_POST['newsletter'], $postID);
            wp_send_json_success($postID, 200);

        }

        wp_die();
    }

}
