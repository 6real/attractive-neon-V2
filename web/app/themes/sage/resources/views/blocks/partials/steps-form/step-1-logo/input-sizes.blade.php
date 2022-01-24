<label class="selector" for="sizes">
  {{__('Taille :', 'attractive-block')}}
  @include('blocks.partials.steps-form.error-msg')
  <ul>
    <li data-product-size="S">
      <strong>{{__('Taille S', 'attractive-block')}}</strong>
      <span data-size-lenght>{{__('entre 50 et 75cm  ', 'attractive-block')}}</span>
    </li>
    <li data-product-size="M">
      <strong>{{__('Taille M', 'attractive-block')}}</strong>
      <span data-size-lenght>{{__('entre 75 et 120cm  ', 'attractive-block')}}</span>
    </li>
    <li data-product-size="L">
      <strong>{{__('Taille L', 'attractive-block')}}</strong>
      <span data-size-lenght>{{__('entre 120 et 145cm  ', 'attractive-block')}}</span>
    </li>
  </ul>

  <i>{{__('Selon votre design, une taille précise vous sera proposée par notre équipe de designers', 'attractive-block')}}</i>
</label>
