@php
  $group = get_field('product_advantages', 'option');
@endphp

<div class="px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
  <!-- Details section -->
  <section aria-labelledby="details-heading">
    <div class="flex flex-col items-center text-center">
      <h2 id="details-heading" class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
        {!! $group['title'] !!}
      </h2>
      <p class="mt-3 max-w-3xl text-lg text-gray-600">
        {!! $group['description'] !!}
      </p>
    </div>

    <div class="mt-16 grid grid-cols-1 gap-y-16 lg:grid-cols-2 lg:gap-x-8">
      @foreach($group['avantages'] as $avantage)
        <div>
          <div class="w-full aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
            <img src="{!! $avantage['image']['url'] !!}"
                 alt="{!! $avantage['image']['alt'] !!}"
                 class="w-full h-full object-center object-cover">
          </div>
          <p class="mt-8 text-base text-gray-500">
            {!! $avantage['description'] !!}
          </p>
        </div>
      @endforeach
    </div>
  </section>

  <!-- Policies section -->
  <section aria-labelledby="policy-heading" class="mt-16 p-4 lg:mt-24 bg-white rounded-lg">

    <div class="grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 lg:gap-x-8">
      @foreach( $group['banner'] as $item)
      <div class="flex flex-col align-center px-4 lg:px-0">
        <img class="mx-auto w-24" src="{!! $item['icon']['url'] !!}" alt="{!! $item['icon']['alt'] !!}" class="h-24 w-auto">
        <h3 class="text-center mt-6 text-base font-medium text-gray-900">
          {!! $item['title'] !!}
        </h3>
        <p class="text-center mt-3 text-sm text-gray-500">
          {!! $item['description'] !!}
        </p>
      </div>
      @endforeach
    </div>
  </section>
</div>
