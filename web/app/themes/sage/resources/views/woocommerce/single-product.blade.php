@extends('layouts.app')

@section('content')

  @if ( ! defined( 'ABSPATH' ) )
    @php exit() @endphp
  @endif

  @while (have_posts())
    @php the_post(); @endphp
    @php wc_get_template_part('content', 'single-product'); @endphp
  @endwhile

  @php
    do_action('woocommerce_after_main_content');
  @endphp
@endsection
