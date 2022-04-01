@php
  $columns = get_field('columns', 'option');
@endphp

<section class="media-reassurance media-reassurance-archive mb-12" data-module-reassurance>

  <div class="media-reassurance-col">
    @foreach ($columns['items_archive'] as $item)
      <div class="media-reassurance-content">
        <img src="{{$item['icon']['url']}}" alt="{{$item['icon']['alt']}}"/>
        <h3>{{$item['title']}}</h3>
        <p>{{$item['text']}}</p>
      </div>
    @endforeach
  </div>
  <div class="media-reassurance-media">
    <img src="{{$columns['image']['url']}}" alt="{{$columns['image']['url']}}">
  </div>
  <div class="media-reassurance-col">
    @foreach ($columns['items_right_archive']  as $item)
      <div class="media-reassurance-content">
        <img src="{{$item['icon']['url']}}" alt="{{$item['icon']['alt']}}"/>
        <h3>{{$item['title']}}</h3>
        <p>{{$item['text']}}</p>
      </div>
    @endforeach
  </div>
</section>
