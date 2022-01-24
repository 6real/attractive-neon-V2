<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WC_Cart;
use WC_Product_Variation;

class Form extends Controller
{

    /**
     * Ajax function for create the customized product
     * @throws \Exception
     */

    public static function ajax_create_product()
    {

        $nonce = $_POST['_ajax_nonce'];
        $nonceResponse = wp_verify_nonce($nonce, 'my_nonce');

        if ($nonceResponse !== 1) {
            wp_send_json_error('SECURITY CHECK : Invalid nonce');
        } else {

            $post_information = [
                'post_title' => 'Votre Neon Personnalisé ' . rand(200, 5000),
                'post_type' => 'product',
                'post_status' => 'publish',
                'post_visibility' => 'hidden',
            ];



            $postID = wp_insert_post($post_information);

            if (!$postID) {
                return false;
            }

            $img = Form::save_image($_POST['img'], 'Perso');
            wp_set_object_terms($postID, 'variable', 'product_type');

            $terms = array( 'exclude-from-catalog', 'exclude-from-search' );
            wp_set_object_terms( $postID, $terms, 'product_visibility' );


            $attributes = [
                'pa_taille' => [
                    'name' => 'pa_taille',
                    'is_visible' => '1',
                    'is_variation' => '1',
                    'is_taxonomy' => '1'
                ],

                'pa_couleur' => [
                    'name' => 'pa_couleur',
                    'is_visible' => '1',
                    'is_variation' => '1',
                    'is_taxonomy' => '1'
                ],
                'pa_police' => [
                    'name' => 'pa_police',
                    'is_visible' => '1',
                    'is_variation' => '1',
                    'is_taxonomy' => '1'
                ],
                'pa_type' => [
                    'name' => 'pa_type',
                    'is_visible' => '1',
                    'is_variation' => '1',
                    'is_taxonomy' => '1'
                ],
                'pa_support-type' => [
                    'name' => 'pa_support-type',
                    'is_visible' => '1',
                    'is_variation' => '1',
                    'is_taxonomy' => '1'
                ],
                'pa_support-color' => [
                    'name' => 'pa_support-color',
                    'is_visible' => '1',
                    'is_variation' => '1',
                    'is_taxonomy' => '1'
                ],
                'pa_fixation' => [
                    'name' => 'pa_fixation',
                    'is_visible' => '1',
                    'is_variation' => '1',
                    'is_taxonomy' => '1'
                ],
                'pa_tube-color' => [
                    'name' => 'pa_tube-color',
                    'is_visible' => '1',
                    'is_variation' => '1',
                    'is_taxonomy' => '1'
                ],
                'pa_shipping-delay' => [
                    'name' => 'pa_shipping-delay',
                    'is_visible' => '1',
                    'is_variation' => '1',
                    'is_taxonomy' => '1'
                ]
            ];

            update_post_meta($postID, '_product_attributes', $attributes);


            wp_set_object_terms($postID, $_POST['sizes'], 'pa_taille');
            wp_set_object_terms($postID, $_POST['color'], 'pa_couleur');

            update_post_meta($postID, '_visibility', 'hidden');
            update_post_meta($postID, '_stock_status', 'instock');
            update_post_meta($postID, '_regular_price', $_POST['price']);
            update_post_meta($postID, '_price', $_POST['price']);
            update_post_meta($postID, '_length', $_POST['sizes']);
            update_post_meta($postID, '_thumbnail_id', $img);


            $variation_data = array(
                'attributes' => array(
                    'taille' => $_POST['sizes'],
                    'couleur' => $_POST['color'],
                    "police" => $_POST['font'],
                    "type" => $_POST['type'],
                    "fixation" => $_POST['fixation'],
                    "support-type" => $_POST['shape_support'],
                    "support-color" => $_POST['color_support'],
                    "tube-color" => $_POST['color_tube'],
                    "shipping-delay" => $_POST['shipping_delay'],
                ),
                'sku' => '',
                'regular_price' => $_POST['price'],
                'sale_price' => '',
                'stock_qty' => 1,
            );
            Form::create_product_variation($postID, $variation_data);

            $default = [
                "variations_default_attributes" => [
                    'taille' => $_POST['sizes'],
                    'couleur' => $_POST['color'],
                    "police" => $_POST['font'],
                    "type" => $_POST['type'],
                    "fixation" => $_POST['fixation'],
                    "support-type" => $_POST['shape_support'],
                    "support-color" => $_POST['color_support'],
                    "tube-color" => $_POST['color_tube'],
                    "shipping-delay" => $_POST['shipping_delay'],
                ]
            ];

            Form::insert_variations_default_attributes($postID, $default['variations_default_attributes']);


            $Add2Cart = WC()->cart->add_to_cart($postID, 1, $postID + 2);

            $url = WP_ENV === 'development' ? 'https://localhost:3000/cart' : wc_get_cart_url();

            if ($Add2Cart != false) {
                wp_send_json_success(
                    [
                        "ID" => $postID,
                        "variationsID" => $postID + 2,
                        "resultHash" => $Add2Cart,
                        "redirectUrl" => $url
                    ], 200);
            } else wp_send_json_error(['error' => 'Product have not set in the cart, please contact the administrator']);
        }

        wp_die();
    }

    /**
     * Create a product variation for a defined variable product ID.
     */
    public static function create_product_variation($product_id, $variation_data)
    {
        // Get the Variable product object (parent)
        $product = wc_get_product($product_id);

        $variation_post = array(
            'post_title' => $product->get_name(),
            'post_name' => 'product-' . $product_id . '-variation',
            'post_status' => 'publish',
            'post_parent' => $product_id,
            'post_type' => 'product_variation',
            'guid' => $product->get_permalink()
        );

        // Creating the product variation
        $variation_id = wp_insert_post($variation_post);

        // Get an instance of the WC_Product_Variation object
        $variation = new WC_Product_Variation($variation_id);

        // Iterating through the variations attributes
        foreach ($variation_data['attributes'] as $attribute => $term_name) {
            $taxonomy = 'pa_' . $attribute; // The attribute taxonomy

            // If taxonomy doesn't exists we create it
            if (!taxonomy_exists($taxonomy)) {
                register_taxonomy(
                    $taxonomy,
                    'product_variation',
                    [
                        'hierarchical' => false,
                        'label' => ucfirst($attribute),
                        'query_var' => true,
                        'rewrite' => ['slug' => sanitize_title($attribute)] // The base slug
                    ],
                );
            }

            // Check if the Term name exist and if not we create it.
            if (!term_exists($term_name, $taxonomy))
                wp_insert_term($term_name, $taxonomy); // Create the term

            $term_slug = get_term_by('name', $term_name, $taxonomy)->slug; // Get the term slug

            // Get the post Terms names from the parent variable product.
            $post_term_names = wp_get_post_terms($product_id, $taxonomy, ['fields' => 'names']);

            // Check if the post term exist and if not we set it in the parent variable product.
            if (!in_array($term_name, $post_term_names))
                wp_set_post_terms($product_id, $term_name, $taxonomy, true);

            // Set/save the attribute data in the product variation
            update_post_meta($variation_id, 'attribute_' . $taxonomy, $term_slug);
        }

        ## Set/save all other data

        // SKU
        if (!empty($variation_data['sku']))
            $variation->set_sku($variation_data['sku']);

        // Prices
        if (empty($variation_data['sale_price'])) {
            $variation->set_price($variation_data['regular_price']);
        } else {
            $variation->set_price($variation_data['sale_price']);
            $variation->set_sale_price($variation_data['sale_price']);
        }
        $variation->set_regular_price($variation_data['regular_price']);

        // Stock
        if (!empty($variation_data['stock_qty'])) {
            $variation->set_stock_quantity($variation_data['stock_qty']);
            $variation->set_manage_stock(true);
            $variation->set_stock_status('');
        } else {
            $variation->set_manage_stock(false);
        }

        $variation->set_weight(''); // weight (reseting)

        $variation->save(); // Save the data
    }

    /**
     * Insert the product variation default for a defined product.
     *
     * @param int $post_id | Post ID of the product.
     * @param array $products_data | The default product data.
     */

    public static function insert_variations_default_attributes($post_id, $products_data)
    {
        foreach ($products_data as $attribute => $value)
            $variations_default_attributes['pa_' . $attribute] = get_term_by('name', $value, 'pa_' . $attribute)->slug;
        // Save the variation default attributes to variable product meta data
        update_post_meta($post_id, '_default_attributes', $variations_default_attributes);
    }

    /**
     * Save in media a base64 img
     *
     * @param string $base64_img | Post ID of the product.
     * @param string $title | The default product data.
     */

    public static function save_image($base64_img, $title)
    {

        // Upload dir.
        $upload_dir = wp_upload_dir();
        $upload_path = str_replace('/', DIRECTORY_SEPARATOR, $upload_dir['path']) . DIRECTORY_SEPARATOR;

        $img = str_replace('data:image/jpeg;base64,', '', $base64_img);
        $img = str_replace(' ', '+', $img);
        $decoded = base64_decode($img);
        $filename = $title . '.jpeg';
        $file_type = 'image/jpeg';
        $hashed_filename = md5($filename . microtime()) . '_' . $filename;

        // Save the image in the uploads directory.
        $upload_file = file_put_contents($upload_path . $hashed_filename, $decoded);

        $attachment = array(
            'post_mime_type' => $file_type,
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($hashed_filename)),
            'post_content' => '',
            'post_status' => 'inherit',
            'guid' => $upload_dir['url'] . '/' . basename($hashed_filename)
        );

        $attach_id = wp_insert_attachment($attachment, $upload_dir['path'] . '/' . $hashed_filename);
        return $attach_id;
    }


}
