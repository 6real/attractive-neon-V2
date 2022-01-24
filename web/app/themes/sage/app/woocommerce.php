<?php

namespace App;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

add_filter('wc_order_statuses',
    function ($order_statuses) {
        $new_order_statuses = array();
        // add new order status after Completed
        foreach ($order_statuses as $key => $status) {
            $new_order_statuses[$key] = $status;
            if ('wc-completed' === $key) {
                $new_order_statuses['wc-shipped'] = __('Envoyé', 'attractive');
                $new_order_statuses['wc-transit'] = __('En transit', 'attractive');
            }
        }
        return $new_order_statuses;
    }
);
/* Adds new Order status - Shipped in Order statuses*/

/**
 * Add a custom product data tab
 */
add_filter('woocommerce_product_tabs', function ($tabs) {

    unset( $tabs['additional_information'] );  	// Remove the additional information tab
    unset( $tabs['reviews'] );  	// Remove the additional information tab

    // Adds the new tab

    $tabs['shipping_tab'] = [
        'title' => __('Le produit', 'woocommerce'),
        'priority' => 50,
        'callback' => function () {
            echo product_description_markup();
        }
    ];

    $tabs['creation_tab'] = [
        'title' => __('La livraison', 'woocommerce'),
        'priority' => 50,
        'callback' => function () {
            echo shipping_markup();
        }
    ];

    $tabs['instal_tab'] = [
        'title' => __('L\'installation', 'woocommerce'),
        'priority' => 50,
        'callback' => function () {
            echo instalation_markup();
        }
    ];

    return $tabs;
});

add_filter('render_block', function ($block_content, $block) {
    if ('woocommerce/product-categories' !== $block['blockName']) {
        return $block_content;
    }
    $return = '<div data-module-product-categories>';
    $return .= $block_content;
    $return .= '</div>';

    return $return;
}, 10, 2);


