<div class="py-16 overflow-hidden">
  <div class="max-w-7xl mx-auto space-y-8">
    <div class="text-base max-w-prose mx-auto lg:max-w-none">
      @if(!empty($content["title"]))
        <h2 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
          {{$content["title"]}}
        </h2>
      @endif
    </div>
    @if(!empty($content["description"]))
      <div class="relative z-10 text-base max-w-prose mx-auto lg:max-w-5xl lg:mx-0 lg:pr-72">
        <p class="text-lg text-gray-700">
          {{$content["description"]}}
        </p>
      </div>
    @endif
    <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-start">
      <div class="relative z-10">
        <div class="prose prose-indigo text-gray-700 mx-auto lg:max-w-none">
          @if(!empty($content["wysiwyg"]))
            {!! $content["wysiwyg"] !!}
          @endif
        </div>
      </div>

      <div class="mt-12 relative text-base max-w-prose mx-auto lg:mt-0 lg:max-w-none">
        <svg
          class="absolute top-0 right-0 -mt-20 -mr-20 lg:top-auto lg:right-auto lg:bottom-1/2 lg:left-1/2 lg:mt-0 lg:mr-0 xl:top-0 xl:right-0 xl:-mt-20 xl:-mr-20"
          width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
          <defs>
            <pattern id="bedc54bc-7371-44a2-a2bc-dc68d819ae60" x="0" y="0" width="20" height="20"
                     patternUnits="userSpaceOnUse">
              <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
            </pattern>
          </defs>
          <rect width="404" height="384" fill="url(#bedc54bc-7371-44a2-a2bc-dc68d819ae60)"/>
        </svg>
        @if(!empty($testimonial))
          <blockquote class="relative bg-white rounded-lg shadow-lg">
            <div class="rounded-t-lg px-6 py-8 sm:px-10 sm:pt-10 sm:pb-8">
              @if(!empty($testimonial["image"]["url"]))
                <img src="{{$testimonial["image"]["url"]}}" alt="{{$testimonial["image"]["alt"]}}" class="h-8">
              @endif
              <div class="relative text-lg text-gray-700 font-medium mt-8">
                <svg class="absolute top-0 left-0 transform -translate-x-3 -translate-y-2 h-8 w-8 text-gray-200"
                     fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                  <path
                    d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z"/>
                </svg>
                @if(!empty($testimonial["description"]))
                  <p class="relative">{{$testimonial["description"]}}</p>
                @endif

              </div>
            </div>
            <cite
              class="relative flex items-center sm:items-start bg-primary rounded-b-lg not-italic py-5 px-6 sm:py-5 sm:pl-12 sm:pr-10 sm:mt-10">
            <span
              class="relative rounded-full border-2 border-white sm:absolute sm:top-0 sm:transform sm:-translate-y-1/2">

              @if(!empty($testimonial["avatar"]))
                <img class="w-12 h-12 sm:w-20 sm:h-20 rounded-full bg-indigo-300"
                     src="{{$testimonial["avatar"]["url"]}}"
                     alt="{{$testimonial["avatar"]["alt"]}}">
              @endif

            </span>
              @if(!empty($testimonial["name"]) && !empty($testimonial["position"]))
                <span class="relative ml-4 text-indigo-300 font-semibold leading-6 sm:ml-24 sm:pl-1">
                  <span class="text-white font-semibold sm:inline">{{$testimonial["name"]}}</span>
                  <span class="sm:inline text-gray-300"> {{$testimonial["position"]}}</span>
                </span>
              @endif
            </cite>
          </blockquote>
        @endif


      </div>
    </div>
  </div>
</div>
