@php
  $colors = get_field('colors', 'option');

@endphp

<label for="colors">
  {{__('Couleurs :', 'attractive-block')}}
  @include('blocks.partials.steps-form.error-msg')

  <ul>
    @foreach($colors as $color)
      <li data-product-color="{{$color['hexa_color']}}" data-product-color-name="{{__($color["slug_color"], 'attractive-block')}}"
          @if($color['coef_price']) data-price-coef="{{$color['coef_price']}}" @endif>
          <div class="color_rounded" style="background-color: {{$color["hexa_color"]}};"></div>
        <p>{{__($color["name_color"], 'attractive-block')}}</p>
      </li>
    @endforeach
  </ul>
</label>
