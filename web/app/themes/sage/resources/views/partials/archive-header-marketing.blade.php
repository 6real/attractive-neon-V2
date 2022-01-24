@php
  $content = [
    'title'=>get_field('title', 'option'),
    'img'=>get_field('img', 'option'),
    'content'=>get_field('text', 'option'),
    'link'=>get_field('link', 'option'),
    'link_label'=>get_field('link_label', 'option'),
    ];

@endphp

<section class="archive-header-marketing">
  <img src="{{$content['img']['url']}}" alt="{{$content['img']['alt']}}">
  <strong>{{$content['title']}}</strong>
  <p>{{$content['content']}}</p>
  <a id="newsletter_open" href="#">{{$content['link_label']}}</a>
</section>
