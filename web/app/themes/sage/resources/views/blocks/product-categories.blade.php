{{--
  Title: Product Categories
  Description: Display product categories in bloc view
  Category: attractive
  Icon: grid-view
  Keywords: product categories
  Mode: auto
  PostTypes: page post
  SupportsMode: true
  SupportsMultiple: false
  --}}
@php
  $product_categories = get_field('product_categories');
  $categories = $product_categories['categories'];

@endphp

<section class="{{ $block['classes'] }}">

  <div class="max-w-7xl mx-auto">
    <div class="sm:flex sm:items-baseline sm:justify-between">
      <h2 class="is-style-classic">{!! $product_categories['title'] !!}</h2>
      <a href="#" class="hidden text-sm font-semibold text-primary hover:text-primary-500 sm:block">Voir tout les néons
        <span aria-hidden="true"> &rarr;</span></a>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:grid-rows-2 sm:gap-x-6 lg:gap-8">

      @foreach($categories as $category)
        @if ($loop->first)

          <div class="group aspect-w-3 aspect-h-2 md:aspect-w-2 md:aspect-h-1 rounded-lg overflow-hidden sm:aspect-h-1 sm:aspect-w-1 sm:row-span-2">
            <img src="{!! $category['image'] !!}"
                 alt="Two models wearing women's black cotton crewneck tee and off-white cotton crewneck tee."
                 class="object-center object-cover group-hover:opacity-75">
            <div aria-hidden="true" class="bg-gradient-to-b from-transparent to-black opacity-50"></div>
            <div class="p-6 flex items-end">
              <div>
                <h3>
                  <a href="{!! get_term_link( $category['category'], 'product_cat' ) !!}"
                     class="font-Montserrat text-lg font-bold text-white">
                    <span class="absolute inset-0"></span>
                    {!! $category['title'] !!}
                  </a>
                </h3>
                <p aria-hidden="true" class="mt-1 text-sm text-white">
                  {!! $category['description'] !!}
                </p>
              </div>
            </div>
          </div>
        @else


        <div class="group aspect-w-3 aspect-h-2 md:aspect-w-2 md:aspect-h-1 rounded-lg overflow-hidden sm:relative sm:aspect-none sm:h-full">
          <img src="{!! $category['image'] !!}"
               alt="Wooden shelf with gray and olive drab green baseball caps, next to wooden clothes hanger with sweaters."
               class="object-center object-cover group-hover:opacity-75 sm:absolute sm:inset-0 sm:w-full sm:h-full">
          <div aria-hidden="true"
               class="bg-gradient-to-b from-transparent to-black opacity-50 sm:absolute sm:inset-0"></div>
          <div class="p-6 flex items-end sm:absolute sm:inset-0">
            <div>
              <h3>
                <a href="{!! get_term_link( $category['category'], 'product_cat' ) !!}"
                   class="font-Montserrat text-lg font-bold text-white">

                  <span class="absolute inset-0"></span>
                  {!! $category['title'] !!}

                </a>
              </h3>
              <p aria-hidden="true" class="mt-1 text-sm text-white">
                {!! $category['description'] !!}
              </p>
            </div>
          </div>
        </div>
      @endif
      @endforeach
    </div>
  </div>
</section>
