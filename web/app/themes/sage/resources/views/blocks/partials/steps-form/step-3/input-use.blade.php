@php
  $title = get_field('titre_option_supplementaire', 'option');
  $options = get_field('options_supplementaire', 'option');
@endphp
@if(!empty($title) && !empty($options))
  <label for="use" class="value">
    {{__($title)}}
    @include('blocks.partials.steps-form.error-msg')
    <select id="use" name="shipping_delay" data-product-support-type>
      <option value="">{{__('Choisir une option', 'attractive-block')}}</option>
      @foreach($options as $option)
        <option value="{{__($option['slug'], 'attractive-block')}}"  data-price="{{$option['prix']}}">{{__($option['name'].' ( + '.$option['prix'].' €)', 'attractive-block')}}</option>
      @endforeach
    </select>
  </label>
@else
  <strong>{{__('Les valeurs se sont pas présentes dans le back office')}}</strong>
@endif
