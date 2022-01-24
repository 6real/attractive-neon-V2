<?php

namespace App;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

add_action('acf/init', function () {
    if (function_exists('acf_add_options_page')) {
        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title' => __('Theme General Settings'),
            'menu_title' => __('Theme Settings'),
            'redirect' => false,
            'position' => 2,
            'icon_url' => 'dashicons-share-alt'
        ));

        acf_add_options_sub_page(array(
            'page_title' => __('Generator Settings'),
            'menu_title' => __('Generator'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
});

// ADMIN BAR

add_action('get_header', function () {
    remove_action('wp_head', '_admin_bar_bump_cb');
});

add_action('init', function () {
    if (is_admin()) return;

    if (wp_get_current_user()) {
        // Remove extra conditions after $user from above to apply for everyone
        add_action('wp_head', function () {
            ?>
            <style>
                div#wpadminbar {
                    top: auto;
                    bottom: 0;
                    position: fixed;
                }

                .ab-sub-wrapper {
                    bottom: 32px;
                }

                @media screen and (max-width: 782px) {
                    .ab-sub-wrapper {
                        bottom: 46px;
                    }
                }
            </style>
            <?php
        }, 100);
    }
});
