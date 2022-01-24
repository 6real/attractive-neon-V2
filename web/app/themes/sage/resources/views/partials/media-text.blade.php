@php $img = get_field('image', get_queried_object()) @endphp

@if($img)
  <div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile">
    <figure class="wp-block-media-text__media">
      <img src="{{$img['url']}}" alt="{{$img['alt']}}">
    </figure>

    <div class="wp-block-media-text__content">
      <h2>{{get_field('title', get_queried_object())}}</h2>
      <p>{{get_field('text', get_queried_object())}}</p>
    </div>
  </div>
@endif

