{{--
  Title: Main Media Text
  Description: Media text for landing page
  Category: attractive
  Icon: admin-comments
  Keywords: testimonial quote
  Mode: edit
  Align: full
  PostTypes: page post
  SupportsMode: true
  SupportsMultiple: false
  --}}

<section class="{{ $block['classes'] }}" data-module-example>
  <h1 class="is-style-main">{{ get_field('title') }}</h1>
  @php _e(get_field('content')); @endphp
  <img src="{{get_field('image')['url']}}" alt="neon cover homepage">
  <div class="wp-block-buttons">
    @foreach( get_field('links') as $link)
      <div class="wp-block-button is-style-outline">
        <a href="{{$link['link']}}" class="wp-block-button__link no-border-radius">{{$link['text']}}</a>
      </div>
    @endforeach
  </div>
</section>
