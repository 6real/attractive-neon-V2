{{--
  Title: Neon custom
  Description: Custom form for custom logo ask
  Category: attractive
  Icon: admin-comments
  Keywords: custom form neon
  Mode: edit
  Align: full
  PostTypes: page post
  SupportsMode: true
  SupportsMultiple: false
  --}}

{{--DATA--}}
@php
  $mockups = get_field('mockups', 'options');
@endphp

<section class="{{ $block['classes'] }}" data-module-neon-custom>
  <div class="neonCustom" id="top">

    <div class="neonCustom-preview active">
      <figure>
        <img src="{{ wp_get_attachment_image_url($mockups[0]["image"], 'full') }}" alt="">
        <canvas class="neonCustom-preview--content"></canvas>
        <div class="toggle-light">
          <circle class="toggle">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492.004 492.004">
              <g fill="white">
                <path fill="white" d="m256,92.3c-74.2,0-127.8,55.3-136.3,114.7-5.3,39.6 7.5,78.2 34.1,107.4 23.4,25 36.2,58.4 36.2,92.8l-.1,54.2c0,21.9 18.1,39.6 40.5,39.6h52.2c22.4,0 40.5-17.7 40.5-39.6l.1-54.2c0-35.4 11.7-67.8 34.1-90.7 24.5-25 37.3-57.3 37.3-90.7-0.1-74.1-63-133.5-138.6-133.5zm46.8,369.1c0,10.4-8.5,18.8-19.2,18.8h-52.2c-10.7,0-19.2-8.3-19.2-18.8v-24h90.5v24zm39.6-159.5c-26.6,27.1-40.5,64.6-40.5,105.3v9.4h-90.5v-9.4c0-38.6-16-77.1-42.6-106.3-23.4-25-33-57.3-28.8-90.7 7.5-50 54-97 116.1-97 65,0 117.2,51.1 117.2,112.6 0,28.1-10.7,55.2-30.9,76.1z"/>
                <rect fill="white" width="21.3" x="245.3" y="11" height="50"/>
                <polygon fill="white" points="385.1,107.4 400,122.3 436.5,87.2 421.5,72.3   "/>
                <rect  fill="white" width="52.2" x="448.8" y="236.2" height="20.9"/>
                <rect fill="white" width="52.2" x="11" y="236.2" height="20.9"/>
                <polygon fill="white" points="90.1,72.2 75.1,87.1 111.6,122.2 126.5,107.3   "/>
              </g>
            </svg>
          </circle>
        </div>
      </figure>
      <div class="neonCustom-mockups">

        @if($mockups)
          @foreach($mockups as $mockup)
            @if ($loop->first)
              <span><img class="active" src="{{ wp_get_attachment_image_url($mockup["image"], ['700', '700']) }}"
                         alt=""></span>
            @else
              <span><img src="{{ wp_get_attachment_image_url($mockup["image"], ['700', '700']) }}"
                         data-img-id="{{$mockup["image"]}}" alt=""></span>
            @endif
          @endforeach
        @endif

      </div>
      <canvas id="myCanvas" width="600" height="400" style="display: none">
        Your browser does not support the HTML5 canvas tag.
      </canvas>
      <section class="neonCustom-info">
        <h3>{{__('Récapitulatif du néon :','attractive-block')}}</h3>
        <span class="neonCustom-info--price">{{__('Prix :','attractive-block')}}<strong>--</strong>&nbsp;€</span>
        <ul class="neonCustom-info--list">
        </ul>
      </section>
    </div>

    <div class="neonCustom-container">
      <nav class="neonCustom-nav">

        <ul class="neonCustom-nav--steps active">
          <li data-step="1" class="active">{{__('Votre néon', 'attractive-blocks')}}</li>
          <li data-step="2">{{__('Le support', 'attractive-blocks')}}</li>
          <li data-step="3">{{__('Options', 'attractive-blocks')}}</li>
        </ul>
      </nav>

      @include('blocks.partials.neon-custom-form')
    </div>
  </div>
  @include('blocks.partials.steps-form.step-3.loader')
</section>

