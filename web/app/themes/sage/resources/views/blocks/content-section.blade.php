{{--
  Title: Content Section
  Description: Content Section
  Category: attractive
  Icon: admin-comments
  Keywords: content section contenu
  Mode: auto
  Align: full
  PostTypes: page post
  SupportsMode: true
  SupportsMultiple: true
  --}}


@php
  $type = get_field('type');
  $content = get_field('section');
  $testimonial = get_field('testimonial');
  $image = get_field('image');
@endphp

<section class="bg-transparent {{ $block['classes'] }}">
  @if($type == 'testimonial-cols')
    @include('blocks.partials.content-section.testimonial-cols', ['content' => $content, 'testimonial' => $testimonial] )
  @elseif($type == 'split-image')
    @include('blocks.partials.content-section.split-image', ['content' => $content, 'image' => $image] )
  @endif
</section>

