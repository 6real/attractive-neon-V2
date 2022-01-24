<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

global $product;

?>
<p class=" {{esc_attr(apply_filters('woocommerce_product_price_class', 'price'))}}">{{__('À partir de ', 'attractive')}} {{$product->get_price()}} {!! get_woocommerce_currency_symbol(); !!}</p>

<div
  data-pp-message
  data-pp-style-layout="text"
  data-pp-style-logo-type="primary"
  data-pp-style-text-color="black"
  data-pp-amount={{$product->get_price()}}>
</div>

