<?php

namespace App;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery', 'wp-api'], null, true);
    wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/4274cb93ab.js', '', null, true);
    wp_enqueue_script('paypal', 'https://www.paypal.com/sdk/js?client-id=AdST1BYGjh0mVzAfIy1M4OlW_6U3ef5YUjHK3nGejjXvMZGqIcz7GirBk22y7XuVYNLmnxwxLHKsrUMM&currency=EUR&components=messages', '', null, false);
    wp_enqueue_script('alpinejs', 'https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js', '', null, true);

    add_filter('script_loader_tag', function ($tag, $handle) {
        if ('paypal' !== $handle)
            return $tag;

        return str_replace(' src', ' data-namespace="PayPalSDK" src', $tag);
    }, 10, 2);

    $ajax_params = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'ajax_nonce' => wp_create_nonce('my_nonce'),
        'root' => esc_url_raw(rest_url())
    );

    wp_localize_script('sage/main.js', 'ajax_object', $ajax_params);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

add_filter('script_loader_tag', function ($tag, $handle) {
    if ('alpinejs' !== $handle)
        return $tag;
    return str_replace(' src', ' defer="defer" src', $tag);
}, 10, 2);


add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);
});

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {

    add_theme_support('align-wide');
    add_theme_support('align-full');
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ];
    register_sidebar([
            'name' => __('Primary', 'sage'),
            'id' => 'sidebar-primary'
        ] + $config);
    register_sidebar([
            'name' => __('Footer', 'sage'),
            'id' => 'sidebar-footer'
        ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});


/**
 * Create palette color for the theme
 */
add_action('after_setup_theme', function () {
    add_theme_support('editor-color-palette',
        array(
            array('name' => 'grey-dark', 'slug' => 'grey-dark', 'color' => '#1D202C'),
            array('name' => 'pink', 'slug' => 'pink', 'color' => '#F91FFF'),
            array('name' => 'grey-bk', 'slug' => 'grey-bk', 'color' => '#EAEBEF'),
            array('name' => 'white', 'slug' => 'white', 'color' => '#FFFFFF'),
            array('name' => 'grey-light', 'slug' => 'grey-light', 'color' => '#F4F5F7'),
        )
    );
});


add_filter('block_categories_all', function ($categories, $post) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'attractive',
                'title' => __('Attractive Blocks', 'attractive-blocks'),
            ),
        )
    );
}, 10, 2);
