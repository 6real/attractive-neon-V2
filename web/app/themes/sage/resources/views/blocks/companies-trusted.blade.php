{{--
  Title: Companies Trusted
  Description: Les entreprises qui nous ont fait confiance
  Category: attractive
  Icon: grid-view
  Keywords: entreprises companies trusted confiance
  Mode: auto
  PostTypes: page post
  SupportsMode: true
  SupportsMultiple: false
  --}}
@php
  $companies_trusted = get_field('companies_trusted');

@endphp

<section class="{{ $block['classes'] }}">
  <!-- This example requires Tailwind CSS v2.0+ -->

  <div class="mx-auto">
    <p class="text-center uppercase text-dark tracking-wider">{!! $companies_trusted['title'] !!}</p>
    <div class="grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5">
      @foreach( $companies_trusted['companies'] as $company)
        <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
          <img class="h-14" src="{!! $company['logo']['url'] !!}" alt="{!! $company['logo']['alt'] !!}">
        </div>
      @endforeach
    </div>
  </div>

</section>
