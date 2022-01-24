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
@endif
