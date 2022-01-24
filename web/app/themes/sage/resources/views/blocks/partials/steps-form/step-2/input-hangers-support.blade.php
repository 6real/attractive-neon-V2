@php
  $title = get_field('titre_fixation_support', 'option');
  $options = get_field('fixation_support', 'option');
@endphp
@if(!empty($title) && !empty($options))
  <label for="hangers-support" class="selector" data-product-support-hanger>
    {{__($title)}}
    @include('blocks.partials.steps-form.error-msg')
    <ul>
      @foreach($options as $option)
        <li data-product-fixation="{{__($option["slug"], 'attractive-block')}}">
          <strong>{{__($option["name"], 'attractive-block')}}</strong>
          <span>{{__($option["description"], 'attractive-block')}}</span>
        </li>
      @endforeach
    </ul>
  </label>
@else
  <strong>{{__('Les valeurs se sont pas présentes dans le back office')}}</strong>
@endif

