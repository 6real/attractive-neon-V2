@php
  $isTransparent = is_front_page() ? 'transparent' : '';
  $colorFont = is_front_page() ? '#FFF' : '#32374C';
@endphp

<header class="banner {{$isTransparent}}" data-module-header>
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}"><img
        src="@php esc_attr_e(get_field('logo_full', 'option')['url']);  @endphp"
        alt="@php esc_attr_e(get_field('logo_full', 'option')['alt']); @endphp"></a>

    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif

      <a class="woocommerce-link" href="{{wc_get_cart_url()}}">
        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M17.419 15.5811C15.9064 15.5811 14.6759 16.8117 14.6759 18.3242C14.6759 19.8368 15.9065 21.0674 17.419 21.0674C18.9316 21.0674 20.1622 19.8368 20.1622 18.3242C20.1622 16.8117 18.9316 15.5811 17.419 15.5811ZM17.419 19.4215C16.8139 19.4215 16.3218 18.9294 16.3218 18.3242C16.3218 17.7191 16.8139 17.227 17.419 17.227C18.0242 17.227 18.5163 17.7191 18.5163 18.3242C18.5163 18.9294 18.0242 19.4215 17.419 19.4215Z"
            fill="{{$colorFont}}"/>
          <path
            d="M21.8251 4.97901C21.6693 4.77959 21.4304 4.66327 21.1772 4.66327H5.0798L4.33914 1.56435C4.25054 1.19404 3.91942 0.932617 3.53867 0.932617H0.822942C0.368416 0.932574 0 1.30099 0 1.75552C0 2.21004 0.368416 2.57846 0.822942 2.57846H2.88911L5.56367 13.7694C5.65227 14.14 5.98339 14.4012 6.36414 14.4012H19.1747C19.553 14.4012 19.8827 14.1433 19.9735 13.7763L21.976 5.68396C22.0366 5.43822 21.9809 5.17843 21.8251 4.97901ZM18.5309 12.7553H7.0137L5.47313 6.30916H20.1257L18.5309 12.7553Z"
            fill="{{$colorFont}}"/>
          <path
            d="M7.4614 15.5811C5.94881 15.5811 4.71826 16.8117 4.71826 18.3242C4.71826 19.8368 5.94885 21.0674 7.4614 21.0674C8.97395 21.0674 10.2045 19.8368 10.2045 18.3242C10.2045 16.8117 8.97395 15.5811 7.4614 15.5811ZM7.4614 19.4215C6.85627 19.4215 6.36415 18.9294 6.36415 18.3242C6.36415 17.7191 6.85627 17.227 7.4614 17.227C8.06654 17.227 8.55866 17.7191 8.55866 18.3242C8.55866 18.9294 8.06654 19.4215 7.4614 19.4215Z"
            fill="{{$colorFont}}"/>
        </svg>
      </a>

      <a class="woocommerce-link" href="{{get_permalink(get_option('woocommerce_myaccount_page_id'))}}">
        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="10.8889" cy="5.55556" r="4.55556" stroke="{{$colorFont}}" stroke-width="2"/>
          <mask id="path-2-inside-1" fill="white">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M6.10352e-05 20H21.7778C20.7483 14.9284 16.2644 11.1111 10.8889 11.1111C5.51345 11.1111 1.02955 14.9284 6.10352e-05 20Z"/>
          </mask>
          <path
            d="M6.10352e-05 20L-1.95997 19.6021L-2.44671 22H6.10352e-05V20ZM21.7778 20V22H24.2245L23.7378 19.6021L21.7778 20ZM6.10352e-05 22H21.7778V18H6.10352e-05V22ZM10.8889 13.1111C15.2945 13.1111 18.9737 16.24 19.8177 20.3979L23.7378 19.6021C22.5228 13.6168 17.2343 9.11111 10.8889 9.11111V13.1111ZM1.96009 20.3979C2.8041 16.24 6.48336 13.1111 10.8889 13.1111V9.11111C4.54354 9.11111 -0.744997 13.6168 -1.95997 19.6021L1.96009 20.3979Z"
            fill="{{$colorFont}}" mask="url(#path-2-inside-1)"/>
        </svg>
      </a>
      <button class="banner-mobile">
        <svg width="25" height="17" viewBox="0 0 25 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect width="25" height="3" fill="#F91FFF"/>
          <path d="M3 8C3 7.44772 3.44772 7 4 7H25V10H4C3.44772 10 3 9.55228 3 9V8Z" fill="#F91FFF"/>
          <path d="M7 15C7 14.4477 7.44772 14 8 14H25V17H8C7.44772 17 7 16.5523 7 16V15Z" fill="#F91FFF"/>
        </svg>
      </button>
    </nav>
  </div>
</header>

<div class="topBar">
  @foreach(get_field('items', 'option') as $item)
    <div class="topBar-item">
      <img src="{{$item['icon']['url']}}" alt="{{$item['icon']['alt']}}">
      <p>{{$item['text']}}</p>
    </div>
  @endforeach
</div>
