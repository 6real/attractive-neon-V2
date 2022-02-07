@php
$content = get_field('head_marketing', 'option')
@endphp

<section class="archive-header-marketing">
  <img src="{{$content['img']['url']}}" alt="{{$content['img']['alt']}}">
  <strong>{{$content['title']}}</strong>
  <p>{{$content['content']}}</p>
  <a id="newsletter_open" href="#">{{$content['link']['title']}}</a>
</section>
