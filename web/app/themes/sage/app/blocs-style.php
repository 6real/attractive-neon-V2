<?php

namespace App;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_action('init', function() {

    register_block_style('core/heading',
        [
            'name' => 'main',
            'label' => __('Titre Principal Bold', 'attractive'),
        ]
    );
    register_block_style('core/heading',
        [
            'name' => 'classic',
            'label' => __('Titre h1', 'attractive'),
        ]
    );
    register_block_style('core/gallery',
        [
            'name' => 'slider',
            'label' => __('Slider', 'attractive'),
        ]
    );
    register_block_style('wpforms/form-selector',
        [
            'name' => 'attractive',
            'label' => __('Attractive Style', 'attractive'),
        ]
    );

});
