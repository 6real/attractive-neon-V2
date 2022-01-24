{{--<article @php post_class() @endphp>--}}
{{--  <header>--}}
{{--    <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>--}}
{{--    @if (get_post_type() === 'post')--}}
{{--      @include('partials/entry-meta')--}}
{{--    @endif--}}
{{--  </header>--}}
{{--  <div class="entry-summary">--}}
{{--    @php the_excerpt() @endphp--}}
{{--  </div>--}}
{{--</article>--}}

  @php
    $product = wc_get_product(get_the_ID());

    $data = $product->get_data();
    $term =  get_the_terms( $product->get_id(), 'product_cat' )[0];
  @endphp

  <div class="group relative">
    <a href="{{get_the_permalink($item['produit']->ID)}}">

      <div
        class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
        <img src="{{wp_get_attachment_url($product->get_image_id())}}"
             alt="Front of men&#039;s Basic Tee in black."
             class="w-full h-full object-center object-cover lg:w-full lg:h-full">
      </div>
    </a>
    <div class="mt-4 flex justify-between">
      <div>
        <a href="{{get_the_permalink($item['produit']->ID)}}">
          <h3 class="text-sm text-gray-700">
            {!!  $data['name'] !!}
          </h3>
        </a>

        <a class="text-gray-600 hover:text-primary" href="{!! get_term_link($term->term_id)!!}">
          <p class="mt-1 text-sm ">{!!$term->name !!}</p>
        </a>

      </div>
      <p class="text-sm font-medium text-primary">{!! $data['price'] !!} €</p>
    </div>
  </div>
