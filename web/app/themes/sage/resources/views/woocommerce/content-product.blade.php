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

<li {{wc_product_class( 'cardProduct', $product )}}>
{{--  @if($interval_date->days < 20)--}}
{{--    <span class="product-tags">{{__('Nouveauté', 'attractive')}}</span>--}}
{{--  @endif--}}
  @php
    do_action( 'woocommerce_before_shop_loop_item' );
    do_action( 'woocommerce_before_shop_loop_item_title' );
    do_action( 'woocommerce_shop_loop_item_title' );
    // do_action( 'woocommerce_after_shop_loop_item_title' );
  @endphp

  <span class="price">
      <span class="woocommerce-Price-amount amount">
        {{__('À partir de','attractive' )}}
        <bdi>{{$product->get_price()}}
          <span class="woocommerce-Price-currencySymbol">€</span>
        </bdi>
      </span>
  </span>
  <a class="product_link" href="{{get_permalink()}}">{{__('Voir le produit','attractive' )}}</a>
</li>
