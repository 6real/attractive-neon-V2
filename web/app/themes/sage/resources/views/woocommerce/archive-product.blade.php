@extends('layouts.app')

@section('content')

  <header class="woocommerce-products-header">
    @if ( apply_filters( 'woocommerce_show_page_title', true ) )
      <h1 class="woocommerce-products-header__title page-title is-style-main"><?php woocommerce_page_title(); ?></h1>
    @endif

    @php
      do_action('woocommerce_archive_description');
      do_action( 'woocommerce_before_main_content' );
    @endphp

  </header>


  @if (woocommerce_product_loop())

    <div class="archive-header">
      @include('partials.categoriesList')
      @include('partials.archive-header-marketing')
    </div>
    @include('partials.paypalBanner')
    @php
      do_action('woocommerce_before_shop_loop');
      woocommerce_product_loop_start();
    @endphp
    <div class="-mx-px border-l border-t border-gray-600 grid grid-cols-2 sm:mx-0 md:grid-cols-3 lg:grid-cols-4">
      @if (wc_get_loop_prop('total'))
        @while (have_posts())
          @php the_post(); @endphp
          @php
            do_action('woocommerce_shop_loop');
            wc_get_template_part('content', 'product');
          @endphp
        @endwhile
      @endif
    </div>

    @php woocommerce_product_loop_end();
        do_action('woocommerce_after_shop_loop');
    @endphp

  @else
    @php do_action('woocommerce_no_products_found'); @endphp
  @endif

  @php do_action('woocommerce_after_main_content'); @endphp

  @include('woocommerce.blocks.banner-archive')
  @include('partials.block-marketing-archive')


@endsection
