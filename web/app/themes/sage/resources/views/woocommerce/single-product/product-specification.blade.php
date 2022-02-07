@php
  $content = get_field('technical_specification', 'option');
@endphp

<section aria-labelledby="features-heading" class="max-w-7xl mx-auto sm:px-2">
  <div
    x-cloak
    x-data="{ num : 0 }"
    class="max-w-2xl mx-auto px-4 lg:px-0 lg:max-w-none">
    <div class="max-w-3xl">
      <h2 id="features-heading"
          class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">{!! $content['title'] !!}</h2>
      <p class="mt-4 text-gray-500"> {!! $content['description'] !!} </div>

    <div class="mt-4">
      <div class="-mx-4 flex sm:mx-0">
        <div class="flex-auto px-4 sm:px-0">
          <div class="-mb-px flex space-x-5" aria-orientation="horizontal" role="tablist">
            @foreach($content['items'] as $index => $item)
              <button @click="num = {!! $index !!}"
                      :class="num == {!! $index !!} ? 'bg-primary' : 'bg-gray-400'"
                      class="border-transparent px-3 lg:px-6 text-white whitespace-nowrap py-2 lg:py-3 font-medium text-md"
                      role="tab" type="button">
                {!! $item['menu_name'] !!}
              </button>
            @endforeach
          </div>
        </div>
      </div>

      @foreach($content['items'] as $index => $item)
        <div x-show="num === {!! $index !!}" class="space-y-16 pt-10 lg:pt-16"
             role="tabpanel"
             tabindex="0">
          <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8">
            <div class="mt-6 lg:mt-0 lg:col-span-5">
              <h3 class="text-lg font-medium text-gray-900">{!! $item['title'] !!}</h3>
              <p class="mt-2 text-sm text-gray-500">{!! $item['description'] !!}</p>
            </div>
            <div class="lg:col-span-7">
              <div class="aspect-w-2 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden sm:aspect-w-5 sm:aspect-h-2">
                <img src="{!! $item['image']['url'] !!}"
                     alt="{!! $item['image']['alt'] !!}"
                     class="object-center object-cover">
              </div>
            </div>
          </div>
        </div>
      @endforeach


    </div>
  </div>
</section>
