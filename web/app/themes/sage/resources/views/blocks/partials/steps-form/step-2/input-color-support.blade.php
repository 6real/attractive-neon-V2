@php
  $title = get_field('titre_couleur_support', 'option');
  $options = get_field('color_support', 'option');
@endphp
@if(!empty($title) && !empty($options))

  <label for="color-support" class="value">

    {{__($title, 'attractive-block')}}
    @include('blocks.partials.steps-form.error-msg')
    <select id="color-support" name="color_support" data-product-support-color>
      <option value="">{{__('Choisir une option', 'attractive-block')}}</option>
      @foreach($options as $option)
      <option value="{{__($option['slug'], 'attractive-block')}}"
              @if($option['prix']) data-price="{{$option['prix']}}" @endif
              @if($option['prix'] == 0) data-price="{{$option['prix']}}" @endif>
        {{__($option['name'].' ( +'.$option['prix'].' €)', 'attractive-block')}}
      </option>
      @endforeach
    </select>
  </label>
@else
  <strong>{{__('Les valeurs se sont pas présentes dans le back office')}}</strong>
@endif
