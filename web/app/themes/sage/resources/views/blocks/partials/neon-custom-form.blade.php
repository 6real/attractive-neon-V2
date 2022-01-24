<div class="neonCustom-form neonCustom-form--writing active" data-step="1-writing">

  {{--  <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Mr+Dafoe&family=Orelega+One&family=Satisfy&family=Zen+Dots&display=swap" rel="stylesheet">--}}
  @include('blocks.partials.steps-form.form-step-one')
  <div class="wp-block-buttons">
    <div class="wp-block-button is-style-fill">
      <a class="wp-block-button__link no-border-radius" data-step="2">Suivant</a>
    </div>
  </div>
</div>

<div class="neonCustom-form neonCustom-form--logo" data-step="1-logo">
  @include('blocks.partials.steps-form.form-step-one-logo')
  <div class="wp-block-buttons">
    <div class="wp-block-button is-style-fill">
      <a class="wp-block-button__link no-border-radius" data-step="2">Suivant</a>
    </div>
  </div>
</div>

<div class="neonCustom-form neonCustom-form--support" data-step="2">
  @include('blocks.partials.steps-form.form-step-two')
  <div class="wp-block-buttons">
    <div class="wp-block-button is-style-fill">
      <a class="wp-block-button__link no-border-radius" data-step="1">Précédent</a>
      <a class="wp-block-button__link no-border-radius" data-step="3">Suivant</a>
    </div>
  </div>
</div>

<div class="neonCustom-form neonCustom-form--option" data-step="3">
  @include('blocks.partials.steps-form.form-step-tree')
  <div class="wp-block-buttons">
    <div class="wp-block-button is-style-fill">
      <a class="wp-block-button__link no-border-radius" data-step="2">Précédent</a>
      <a class="wp-block-button__link no-border-radius" data-step="final">Acheter</a>
    </div>
  </div>
</div>

