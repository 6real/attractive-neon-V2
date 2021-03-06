@php
  $term = get_the_terms(get_the_ID(), 'product_cat')[0]->term_id;
    $content = get_field('product_banner', 'product_cat_'.$term);
@endphp
@if(!empty($content))

<div class="banner-product w-full mx-auto py-16 sm:py-24">
  <div class="relative rounded-lg overflow-hidden">
    <div class="absolute inset-0">
      <img src="{{$content['image']['url']}}" alt="{{$content['image']['alt']}}"
           class="w-full max-w-none h-full object-center object-cover">
    </div>
    <div class="relative bg-gray-900 bg-opacity-75 py-32 px-6 sm:py-40 sm:px-12 lg:px-16">
      <div class="relative max-w-3xl mx-auto flex flex-col items-center text-center">
        <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
          <span class="block sm:inline">{{$content['title']}}</span>
        </h2>
        <p class="mt-3 text-xl text-white">{{$content['description']}}</p>
        @if(!empty($content['link']['url']))
          <a href="{{$content['link']['url']}}"
             class="mt-8 w-full block bg-white border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100 sm:w-auto">
            {{$content['link']['title']}}
          </a>
        @endif
      </div>
    </div>
  </div>
</div>
@endif
