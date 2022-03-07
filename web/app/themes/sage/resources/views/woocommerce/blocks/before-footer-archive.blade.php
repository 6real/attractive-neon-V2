@php
  $content = get_field('before_footer', 'option');

@endphp
@if(!empty($content))

  <div class="container bg-transparent">
    <!-- Header -->
    <div class="relative pb-32">
      <div class="absolute inset-0 overflow-hidden">
      </div>
      @if(!empty($content['title']))
        <div class="relative max-w-7xl mx-auto pb-24 pt-16 px-4 sm:px-6 lg:px-8">

          <h2
            class="text-4xl font-extrabold tracking-tight text- md:text-5xl lg:text-6xl">{!! $content['title'] !!}</h2>
          @if(!empty($content['description']))
            <p class="mt-6 max-w-3xl text-xl text-dark">{!! $content['description'] !!}</p>
          @endif
        </div>
      @endif
    </div>

    <!-- Overlapping cards -->
    <section class="-mt-32 max-w-7xl mx-auto relative z-10 pb-32 px-4 sm:px-6 lg:px-8"
             aria-labelledby="contact-heading">
      <div class="grid grid-cols-1 gap-y-20 lg:gap-y-0 ">

        <div class="flex flex-col bg-white rounded-2xl shadow-xl">
          <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
            @if(!empty($content['icon']['url']))

              <div class="absolute top-0 p-5 inline-block bg-primary rounded-xl shadow-lg transform -translate-y-1/2">
                <img class="w-12" src="{!! $content['icon']['url'] !!}" alt="">
              </div>
            @endif
            @if(!empty($content['title_card']))
              <h3 class="text-xl font-medium text-gray-900">{!! $content['title_card'] !!}</h3>
              @if(!empty($content['description_card']))
                <p class="mt-4 text-base text-gray-500">{!! $content['description_card'] !!}</p>
              @endif
            @endif
          </div>

        </div>
      </div>
    </section>
  </div>
@endif
