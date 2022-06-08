<div class="relative mb-12">
  <div class="lg:absolute lg:inset-0">
    <div class="lg:absolute lg:inset-y-0 lg:left-0 lg:w-1/2 shadow-md">
      @if(!empty($image['url']))
        <img class="h-56 w-full object-cover lg:absolute lg:h-full rounded-md"
             src="{{$image['url']}}"
             alt="{{$image['alt']}}">
      @endif
    </div>
  </div>
  <div class="relative pt-12 pb-16 px-4 sm:pt-16 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:grid lg:grid-cols-2">
    <div class="lg:col-start-2 lg:pl-8">
      <div class="text-base max-w-prose mx-auto lg:max-w-lg lg:ml-auto lg:mr-0">
        @if(!empty($content['title']))
          <h2 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            {{$content['title']}}
          </h2>
        @endif
        @if(!empty($content['description']))
          <p class="mt-8 text-lg text-dark">
            {{$content['description']}}
          </p>
        @endif
        @if(!empty($content['wysiwyg']))
          <div class="mt-5 prose prose-indigo text-dark">
            {!! $content['wysiwyg'] !!}
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
