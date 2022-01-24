<?php

namespace App;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/* **************************************************************** */
/* Toute la conf pour ititialiser les customs post types */
/* **************************************************************** */


add_action('init', function () {


    // ----------------------------------------------------------------------------------------- Inscription NEWSLETTER
    $labels = [
        'name' => __('Newsletter', 'attractive'),
        'singular_name' => __('Newsletter', 'attractive'),
        'add_new' => __('Ajouter une entrée', 'attractive'),
        'add_new_item' => __('Ajouter un item', 'attractive'),
        'edit_item' => __('Editer un item', 'attractive'),
        'new_item' => __('Ajouter un item', 'attractive'),
        'view_item' => __('Voir', 'attractive'),
        'search_items' => __('Chercher un item', 'attractive'),
        'not_found' => __('Aucune newsletter trouvée', 'attractive'),
        'not_found_in_trash' => __('Aucune newsletter trouvée', 'attractive')
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'supports' => ['title'],
        'taxonomies' => [''],
        'capability_type' => 'post',
        'rewrite' => [
            "slug" => 'newsletter',
            'with_front' => false
        ],
        'publicly_queryable' => true,
        'query_var' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-welcome-widgets-menus',
    ];
    register_post_type('newsletter', $args);

});
