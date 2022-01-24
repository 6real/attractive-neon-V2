<label for="police">
  {{__('Police :', 'attractive-block')}}
  @include('blocks.partials.steps-form.error-msg')
  <ul>
    @php $fonts = get_field('polices', 'option');@endphp

    @foreach ($fonts as $font)
      <style>
        @font-face {
          font-family: "{{ $font['name'] }}";
          src: url("{{get_stylesheet_directory_uri()}}/assets/fonts/{{ $font['name_file'] }}.woff") format("woff");
          font-weight: normal;
          font-style: normal;
        }

        li[data-product-font-family="{{ $font['name'] }}"] {
          font-family: {{ $font['name'] }}    !important;
          font-size: {{ $font['size_px'] }}px !important;
          line-height: {{ $font['size_px']*1.2 }}px !important;
        }

        @media (max-width: 768px) {
          li[data-product-font-family="{{ $font['name'] }}"] {
            font-size: {{ $font['size_px']*0.5 }}px !important;
            line-height: {{ $font['size_px']*0.7 }}px !important;
          }
        }


      </style>

      <li data-product-font-family="{{ $font['name'] }}"
          data-product-preview-size="{{$font['size_preview']}}"
          data-price-letter="{{$font["price_letter"]}}"
          data-height-letter="{{$font["height_letter"]}}"
          data-coef-complexity="{{$font["coef_complexity"]}}"
          data-price-base="{{$font["price_base"]}}">
        {{__( $font['name'], 'attractive-block')}}
      </li>
    @endforeach

  </ul>

</label>
