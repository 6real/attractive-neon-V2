@extends('layouts.app')

@section('content')
  <div class="content-posts">
    @include('partials.posts-header')
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif

    @php $i = 1; @endphp

    @while (have_posts() && $i)

      @php the_post() @endphp

      <div @if($i === 1) class="article first" @else class="article" @endif>
        @include('partials.content-'.get_post_type())
      </div>

      @php $i ++ ; @endphp
    @endwhile
    {!! get_the_posts_navigation() !!}
  </div>
@endsection
