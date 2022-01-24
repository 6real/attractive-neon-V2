@php
  $title = get_field('titre_forme_support', 'option');
  $options = get_field('forme_du_support', 'option');
@endphp
@if(!empty($title) && !empty($options))
  <label for="type-support" class="value">
    {{__('Forme du support')}}
    @include('blocks.partials.steps-form.error-msg')
    <select id="type-support" name="shape_support" data-product-support-type>
      <option value="">{{__('Choisir une option', 'attractive-block')}}</option>
      @foreach($options as $option)
        <option value="{{$option["slug"]}}">{{__($option["name"], 'attractive-block')}}</option>
      @endforeach
    </select>
  </label>
@else
  <strong>{{__('Les valeurs se sont pas présentes dans le back office')}}</strong>
@endif
