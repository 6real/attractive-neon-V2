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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<section class="flex">

<div class="w-1/4 mt-8">
  <!-- Secondary sidebar -->
  <nav aria-label="Sections" class="hidden flex-shrink-0 w-full bg-white border-r border-blue-gray-200 xl:flex xl:flex-col">
    <div class="flex-shrink-0 h-16 px-6 border-b border-blue-gray-200 flex items-center">
      <p class="text-lg font-medium text-blue-gray-900">{{_e('Account','woocommerce')}}</p>
    </div>
    <div class="flex-1 min-h-0 overflow-y-auto">

      <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>

      <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" class="hover:bg-blue-50  hover:bg-opacity-50 flex p-6 border-b border-blue-gray-200">
        <!-- Heroicon name: outline/bell -->
        <svg class="flex-shrink-0 -mt-0.5 h-6 w-6 text-blue-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        <div class="ml-3 text-sm">
          <p class="font-medium text-blue-gray-900"><?php echo esc_html( $label ); ?></p>
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

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
