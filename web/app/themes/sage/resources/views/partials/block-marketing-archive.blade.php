<section class="media-reassurance media-reassurance-archive" data-module-reassurance>

  <div class="media-reassurance-col">
    @foreach (get_field('items_archive', 'option') as $item)
      <div class="media-reassurance-content">
        <img src="{{$item['icon']['url']}}" alt="{{$item['icon']['alt']}}"/>
        <h3>{{$item['title']}}</h3>
        <p>{{$item['text']}}</p>
      </div>
    @endforeach
  </div>
  <div class="media-reassurance-media">
    <img src="{{get_field('image', 'option')['url']}}" alt="{{get_field('image', 'option')['alt']}}">
  </div>
  <div class="media-reassurance-col">
    @foreach (get_field('items_right_archive', 'option') as $item)
      <div class="media-reassurance-content">
        <img src="{{$item['icon']['url']}}" alt="{{$item['icon']['alt']}}"/>
        <h3>{{$item['title']}}</h3>
        <p>{{$item['text']}}</p>
      </div>
    @endforeach  </div>
</section>
