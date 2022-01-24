{{--
  Title: Banner Marketing
  Description: Media text for landing page
  Category: attractive
  Icon: grid-view
  Keywords: banner
  Mode: edit
  PostTypes: page post
  SupportsMode: true
  SupportsMultiple: true
  --}}
@php
  $col_1 = get_field('col_1');
  $col_2 = get_field('col_2');
  $col_3 = get_field('col_3');
@endphp

<section class="{{ $block['classes'] }}">
  <div class="col">
    <figure>
      <img src="{{$col_1['image']['url']}}" alt="{{$col_1['image']['alt']}}">
      <figcaption>{{_e($col_1['contenu'])}}</figcaption>
    </figure>
  </div>
  <div class="col">
    <figure>
      <img src="{{$col_2['image']['url']}}" alt="{{$col_2['image']['alt']}}">
      <figcaption>{{_e($col_2['contenu'])}}</figcaption>
    </figure>
  </div>
  <div class="col">
    <figure>
      <img src="{{$col_3['image']['url']}}" alt="{{$col_3['image']['alt']}}">
      <figcaption>{{_e($col_3['contenu'])}}</figcaption>
    </figure>
  </div>
</section>
