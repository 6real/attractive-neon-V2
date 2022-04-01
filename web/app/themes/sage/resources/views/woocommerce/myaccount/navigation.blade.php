<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if (!defined('ABSPATH')) {
  exit;
}

do_action('woocommerce_before_account_navigation');
?>

<section class="flex">

  <div class="w-1/4 mt-8">
    <!-- Secondary sidebar -->
    <nav aria-label="Sections"
         class="hidden flex-shrink-0 w-full bg-white border-r border-blue-gray-200 xl:flex xl:flex-col">
      <div class="flex-shrink-0 h-16 px-6 border-b border-blue-gray-200 flex items-center">
        <p class="text-lg font-medium text-blue-gray-900">{{_e('Account','woocommerce')}}</p>
      </div>
      <div class="flex-1 min-h-0 overflow-y-auto">
        @php $icons = get_field('menu-icons', 'option') @endphp
        <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
        @foreach($icons['icones'] as $icon)
          @if($icon['slug'] == $endpoint)
            @php $image = $icon['icone']['url']; @endphp
          @endif
        @endforeach


        <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>"
           class=" flex items-center hover:bg-blue-50 hover:bg-opacity-50 flex p-4 border-b border-blue-gray-200">

          <img class="w-12" src="{{$image}}" alt="{{ esc_html($label)}}">
          <div class="ml-3 text-sm">
            <p class="font-medium text-sm text-blue-gray-900"><?php echo esc_html($label); ?></p>
            <!--          <p class="mt-1 text-blue-gray-500">Enim, nullam mi vel et libero urna lectus enim. Et sed in maecenas tellus.</p>-->
          </div>
        </a>
        <?php endforeach; ?>

      </div>
    </nav>

  </div>


  <!--<nav class="woocommerce-MyAccount-navigation">-->
  <!--	<ul>-->
  <!--		--><?php //foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
<!--			<li class="--><?php //echo wc_get_account_menu_item_classes( $endpoint ); ?><!--">-->
  <!--				<a href="--><?php //echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?><!--">--><?php //echo esc_html( $label ); ?><!--</a>-->
  <!--			</li>-->
  <!--		--><?php //endforeach; ?>
<!--	</ul>-->
  <!--</nav>-->

<?php do_action('woocommerce_after_account_navigation'); ?>
