@php $pay = get_field('payment_method', 'option') @endphp

<div class="footer_more">
  <p class="copyright">Copyright © 2021 Attractive Neon, Tous droits réservés</p>
  @if($pay)
    <section>
      <p>Nous acceptons les méthodes de paiement suivantes :</p>
      <ul>
        @foreach($pay as $method)
          <li><img src="{{$method['image']}}" alt="methode de paiement attractive neon"></li>
        @endforeach
      </ul>
    </section>
  @endif

</div>
