@php
  /**
   * @see     https://docs.woocommerce.com/document/template-structure/
   * @package WooCommerce\Templates
   * @version 3.6.0
   */

  defined( 'ABSPATH' ) || exit;

  global $product;

  // Ensure visibility.
  if ( empty( $product ) || ! $product->is_visible() ) {
    return;
  }

 // $postDate = get_the_date();
  //$today_date      = new DateTime( date( 'Y-m-d', strtotime( 'today' ) ) );
  //$registered = new DateTime(strtotime( $postDate ) );
  //$interval_date   = $today_date->diff( $registered );

@endphp



{{--@php--}}
{{--  $postDate = get_the_date();--}}
{{--  $today_date      = new DateTime( date( 'Y-m-d', strtotime( 'today' ) ) );--}}
{{--  $registered = new DateTime(strtotime( $postDate ) );--}}
{{--  $interval_date   = $today_date->diff( $registered );--}}
{{--@endphp--}}

<div class="group relative p-4 border-r border-b border-gray-600 sm:p-6">


  <a href="{{$product->get_permalink()}}">
    <div class="rounded-lg overflow-hidden bg-gray-200 aspect-w-1 aspect-h-1 group-hover:opacity-75">

      @php
        do_action( 'woocommerce_before_shop_loop_item_title' );
      @endphp

    </div>
  </a>
  <a href="{{$product->get_permalink()}}" class="pt-10 pb-4 text-center">
    <h3 class="text-dark mt-4 p">
      {{$product->get_title()}}
    </h3>

    <p class="mt-4 text-primary font-medium text-dark">
      {{__('À partir de','attractive' )}} <span class="text-primary">{{$product->get_price()}} €</span>
    </p>
  </a>
</div>
