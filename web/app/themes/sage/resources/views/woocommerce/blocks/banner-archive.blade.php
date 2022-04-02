@if(is_product_category())
  @php
    $current_category = get_queried_object();
    $category_id = $current_category->term_id;
    $taxonomy = $current_category->taxonomy;
    $content = get_field('before_footer', $taxonomy . '_' .$category_id);
    $category_name = $current_category->name;
       $args = array(
          'post_type'             => 'product',
          'post_status'           => 'publish',
          'ignore_sticky_posts'   => 1,
          'posts_per_page'        => '9',
          'tax_query'             => array(
              array(
                  'taxonomy'      => 'product_cat',
                  'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                  'terms'         => $category_id,
                  'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
              )
          )
      );
      $products = new WP_Query($args);
  @endphp
@endif

@if(!empty($content))

  <div class="w-full flex flex-col lg:flex-row items-center my-12 p-8 overflow-hidden rounded-xl bg-gradient-to-r from-primary to-dark shadow-xl">
    <div class="relative z-10 w-full px-6 mb-40 lg:mb-0">
      <h3 class="text-white font-medium text-2xl">{{$content['title']}}</h3>
      <p class="text-white mt-2">{{$content['description']}}</p>
      @if(!empty($content['link']['url']))
        <a class="inline-block mt-6 py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-medium hover:bg-primary-light hover:text-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
           href="{{$content['link']['url']}}">{{$content['link']['title']}}
        </a>
      @endif
    </div>


    <div
      class="w-1/2 grid grid-cols-3 gap-1 lg:gap-4 px-6 transform origin-center -rotate-6 translate-x-5 lg:translate-x-10 scale-400 md:scale-125 relative z-0">
      @foreach($products->posts as $index => $product)
        @php
          $product_wc   = wc_get_product( $product->ID );
          $image_id  = $product_wc->get_image_id();
          $image_url = wp_get_attachment_image_url( $image_id, 'thumbnail' );

        @endphp
        <img class="block w-32 md:w-24 rounded" src="{{$image_url}}"
             alt="{!! $category_name.'-'.$index !!}">
      @endforeach
    </div>
  </div>

@endif
