<label class="selector" for="sizes">
  {{__('Taille :', 'attractive-block')}}
  @include('blocks.partials.steps-form.error-msg')
  @php $sizes = get_field('tailles', 'option'); @endphp

  <ul>
    @foreach ($sizes as $size)
    <li data-product-size="{{$size["name_size"]}}" data-product-size-coef="{{$size["coef_size"]}}" data-product-price-coef="{{$size["coef_price"]}}" >
      <strong>{{__("Taille ".$size["name_size"], 'attractive-block')}}</strong>
    </li>
    @endforeach
  </ul>
</label>
