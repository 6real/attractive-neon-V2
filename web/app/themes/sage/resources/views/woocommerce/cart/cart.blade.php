@php
  /**
  * Cart Page
  *
  * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
  *
  * HOWEVER, on occasion WooCommerce will need to update template files and you
  * (the theme developer) will need to copy the new files to your theme to
  * maintain compatibility. We try to do this as little as possible, but it does
  * happen. When this occurs the version of the template file will be bumped and
  * the readme will list any important changes.
  *
  * @see     https://docs.woocommerce.com/document/template-structure/
  * @package WooCommerce\Templates
  * @version 3.8.0
  */
  defined('ABSPATH') || exit;
  do_action('woocommerce_before_cart');
@endphp
{{--<form class="woocommerce-cart-form" action="@php echo esc_url(wc_get_cart_url()); @endphp " method="post">--}}
@php do_action('woocommerce_before_cart_table'); @endphp


<div class="bg-transparent">
  <div class=" w-full mx-auto pt-16 pb-24 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">{!! get_the_title() !!}</h1>

    <form class="mt-12 lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16"
          action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
      <div class="hidden"
           data-pp-message
           data-pp-style-layout="flex"
           data-pp-style-ratio="20x1"
           data-pp-style-color="blue"
           data-pp-amount="ENTER_VALUE_HERE">
      </div>

      <section aria-labelledby="cart-heading" class="lg:col-span-7">
        <h2 id="cart-heading" class="sr-only">Produits dans le panier</h2>

        <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
          @php
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
              $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
              $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

              if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                  $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);

                  $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);


                   $product_quantity = woocommerce_quantity_input(
                        array(
                          'input_name' => "cart[{$cart_item_key}][qty]",
                          'input_value' => $cart_item['quantity'],
                          'max_value' => $_product->get_max_purchase_quantity(),
                          'min_value' => '0',
                          'product_name' => $_product->get_name(),
                        ),
                        $_product,
                        false
                      );
          @endphp

          <li class="flex py-6 sm:py-10">

            <div class="flex-shrink-0 w-40 h-40 ">
              <a class="w-24 h-24 rounded-md object-center object-cover sm:w-48 sm:h-48"
                 href="  {!! $product_permalink!!}"> {!! $thumbnail!!}</a>
            </div>

            <div class="ml-4 flex-1 flex flex-col justify-between sm:ml-6">
              <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                <div>
                  <div class="flex justify-between">
                    <h3 class="text-sm">
                      <a href="#" class="font-medium text-gray-700 hover:text-gray-800">
                        {!! $_product->get_title() !!}</a>
                    </h3>
                  </div>
                  <div class="mt-1 flex text-sm">
                    <p class="text-gray-500">{!! str_replace(',', '<br>', $_product->get_attribute_summary()) !!}</p>
                  </div>
                  <p
                    class="mt-2 text-sm font-medium text-gray-900">{!! apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key)!!}</p>
                </div>

                <div class="mt-4 sm:mt-0 sm:pr-9">
                  {!! apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item) !!}

                  <div class="absolute top-0 right-0">
                    <button type="button" class="-m-2 p-2 inline-flex text-gray-400 hover:text-gray-500 product-remove">
                      <span class="sr-only">Remove</span>
                      <!-- Heroicon name: solid/x -->
                      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                           aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>

              <p class="mt-4 flex text-sm text-gray-700 space-x-2">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                     fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd"/>
                </svg>
                <span>In stock</span>
              </p>
            </div>
          </li>

          @php
            }
        }

        do_action('woocommerce_cart_contents');

          @endphp
        </ul>

         <div class="flex gap-4 items-end	">
            <div class="coupon">
              <label for="coupon_code"
                     class="block text-sm font-medium text-gray-700"><?php esc_html_e('Coupon:', 'woocommerce'); ?></label>
              <div class="mt-1">
                <input type="text" name="coupon_code" id="coupon_code"
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                       placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>">
              </div>
            </div>

            <button type="submit" class="h-12 ml-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary-hover" name="apply_coupon"
                    value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>">

              <?php esc_attr_e('Apply coupon', 'woocommerce'); ?>
            </button>


            @php do_action('woocommerce_cart_coupon'); @endphp

            <button type="submit" class="h-12 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary-hover" name="update_cart"
                    value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>">
              <?php esc_html_e('Update cart', 'woocommerce'); ?>
            </button>
          </div>


          <?php do_action('woocommerce_cart_actions'); ?>

          <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>

      </section>

    <?php do_action('woocommerce_before_cart_collaterals'); ?>



    <?php do_action('woocommerce_after_cart'); ?>

    <!-- Order summary -->
      <section aria-labelledby="summary-heading"
               class="mt-16 bg-gray-50 rounded-lg px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-5">

        @php
          do_action('woocommerce_before_cart_collaterals');
          do_action('woocommerce_cart_collaterals');
          do_action('woocommerce_after_cart');
        @endphp

      </section>
    </form>
  </div>
</div>


@php do_action('woocommerce_after_cart_table'); @endphp

@php do_action('woocommerce_before_cart_collaterals'); @endphp


@php do_action('woocommerce_after_cart'); @endphp
