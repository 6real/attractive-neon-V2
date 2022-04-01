{{--
  Title: Products Grid
  Description: Product Grid
  Category: attractive
  Icon: admin-comments
  Keywords: custom Products Grid
  Mode: auto
  Align: full
  PostTypes: page post
  SupportsMode: true
  SupportsMultiple: true
  --}}

{{--<section class="woocommerce-Tabs-panel wc-tabs wc_tabs-shipping {{ $block['classes'] }}">--}}

@php
  $title = get_field('title');
  $products = get_field('articles');
@endphp
<section class="bg-transparent {{ $block['classes'] }}">
  <div class="mx-auto">
    <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">{!! $title !!}</h2>

    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
      @foreach($products as $item)
        @php
          $product = wc_get_product($item['produit']->ID);
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
    @endforeach


    <!-- More products... -->
    </div>
  </div>
</section>
{{--</section>--}}

