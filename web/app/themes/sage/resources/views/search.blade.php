@extends('layouts.app')

@section('content')

  <h1 class="mt-8 text-4xl font-bold tracking-tight text-gray-900">{!! App::title() !!}</h1>

  {{--  @if (!have_posts())--}}
  {{--    <div class="alert alert-warning">--}}
  {{--      {{ __('Sorry, no results were found.', 'sage') }}--}}
  {{--    </div>--}}
  {{--    {!! get_search_form(false) !!}--}}
  {{--  @endif--}}

  <section class="bg-transparent {{ $block['classes'] }}">
    <div class="mx-auto">

      <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

      @while(have_posts()) @php the_post() @endphp
      @include('partials.content-search')
      @endwhile

      <!-- More products... -->
      </div>
    </div>
  </section>



  {!! get_the_posts_navigation() !!}
@endsection
