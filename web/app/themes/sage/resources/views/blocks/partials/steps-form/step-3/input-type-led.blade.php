@php
  $title = get_field('titre_couleur_tube', 'option');
  $options = get_field('color_tube', 'option');
@endphp
@if(!empty($title) && !empty($options))

  <label for="color-tube" class="value">
    {{__($title, 'attractive-block')}}
    @include('blocks.partials.steps-form.error-msg')
    <select id="color-tube" name="color_tube" data-product-color-tube>
      <option value="">{{__('Choisir une option', 'attractive-block')}}</option>

      @foreach($options as $option)
        <option value="{{$option["slug"]}}">{{__($option["name"], 'attractive-block')}}</option>
      @endforeach
    </select>
  </label>
@else
  <strong>{{__('Les valeurs se sont pas présentes dans le back office')}}</strong>
@endif
