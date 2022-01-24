{{--
  Title: Media Reassurances
  Description: Media text for landing page
  Category: attractive
  Icon: grid-view
  Keywords: media text
  Mode: edit
  PostTypes: page post
  SupportsMode: true
  SupportsMultiple: true
  --}}

<section class="{{ $block['classes'] }}" data-module-reassurance>

  <div class="media-reassurance-col">
    @foreach (get_field('items') as $item)
      <div class="media-reassurance-content">
        <img src="{{$item['icon']['url']}}" alt="{{$item['icon']['alt']}}"/>
        <h3>{{$item['title']}}</h3>
        <p>{{$item['text']}}</p>
      </div>
    @endforeach
  </div>
  <div class="media-reassurance-media">
      <img src="{{get_field('image')['url']}}" alt="{{get_field('image')['alt']}}">
  </div>
  <div class="media-reassurance-col">
    @foreach (get_field('items_right') as $item)
      <div class="media-reassurance-content">
        <img src="{{$item['icon']['url']}}" alt="{{$item['icon']['alt']}}"/>
        <h3>{{$item['title']}}</h3>
        <p>{{$item['text']}}</p>
      </div>
    @endforeach  </div>
</section>
