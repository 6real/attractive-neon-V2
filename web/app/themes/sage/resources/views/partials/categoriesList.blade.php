@php
  $orderby = 'name';
  $order = 'asc';

  $cat_args = array(
      'orderby'    => $orderby,
      'order'      => $order,
      'hide_empty' => true,
      'parent' => get_queried_object_id()
  );

  $product_categories = get_terms( 'product_cat', $cat_args );
@endphp

@if($product_categories)
  <ul class="categoriesList">
    @if(!is_shop())
      <h3>{!! get_queried_object()->name !!}</h3>
    @else
      <h3>{!! 'TOUS NOS NÉONS MURAUX' !!}</h3>
    @endif
    @foreach($product_categories as $category)
      @if($category->slug != 'uncategorized')

        <li class="categoriesList-item">
          <a class="categoriesList-item-link" href="{{get_term_link($category->term_id)}}">
            {!! $category->name !!}
          </a>
          <span class="categoriesList-item-count">({{$category->count}})</span>
        </li>
      @endif

    @endforeach
  </ul>
@else
  @php $contact = get_field('contact', 'option');@endphp
  @if(!empty($contact))

    <div class="bg-dark rounded flex flex-col justify-center mr-auto">

      <div class="px-4 py-5 sm:p-6">
        <h3 class="text-lg leading-6 font-medium text-white">{{$contact['title']}}</h3>
        <div class="mt-2 max-w-xl text-sm">
          <p class="text-white">{{$contact['content']}}</p>
        </div>
        <div class="mt-5">
          <a href="{{$contact['link']['url']}}"
             class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm font-medium rounded-md text-white bg-primary hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">{{$contact['link']['title']}}</a>
        </div>
      </div>
    </div>

  @endif
@endif
