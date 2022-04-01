<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$allowed_html = array(
  'a' => array(
    'href' => array(),
  ),
);
?>
<div class="xl:ml-8 xl:mt-8">
  <div class="mt-6 space-y-8 divide-y divide-y-blue-gray-200">


    <h1 class="text-xl"> <span class="uppercase font-bold">{{_e('Bonjour ', 'woocommerce').esc_html($current_user->display_name)}} </span> {{_e(', bienvenue sur votre compte', 'woocommerce')}}</h1>

{{--cards--}}

    <div>
      <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">{{_e('Dashboard', 'woocommerce')}}</h2>
      <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-2">
        <li class="col-span-1 flex shadow-sm rounded-md">
          <div class="flex-shrink-0 flex items-center justify-center w-16  bg-primary text-white text-sm font-medium rounded-l-md p-4">
            <svg width="100%" height="100%" viewBox="0 0 172 185"
                 style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
              <path d="M84.277,12.512l28.533,12.631l-67.231,31.447l-26.29,-14.339l64.988,-29.739Zm3.151,156.369l-2.419,-83.532l74.171,-34.234l0,82.46l-71.752,35.306Zm63.228,-126.985l-71.501,33.005l-20.569,-11.218l68.7,-32.132l23.37,10.345Zm-138.718,9.94l25.207,13.748l0,23.953c0,3.296 2.674,5.969 5.969,5.969c3.296,0 5.969,-2.673 5.969,-5.969l0,-17.442l23.98,13.08l2.403,82.958l-63.528,-35.665l0,-80.632Zm-8.891,89.329l75.611,42.45c0.905,0.509 1.912,0.765 2.922,0.765c0.902,0 1.803,-0.202 2.635,-0.614l83.569,-41.12c2.04,-1.003 3.334,-3.082 3.334,-5.355l0,-95.508l-0.009,-0.066c-0.005,-0.506 -0.084,-1.014 -0.223,-1.518c-0.033,-0.12 -0.08,-0.232 -0.12,-0.349c-0.066,-0.191 -0.11,-0.383 -0.196,-0.57c-0.089,-0.193 -0.21,-0.359 -0.317,-0.538c-0.063,-0.105 -0.115,-0.212 -0.184,-0.313c-0.29,-0.425 -0.62,-0.807 -0.996,-1.136l-0.176,-0.131c-0.361,-0.293 -0.753,-0.537 -1.168,-0.736l-0.163,-0.103l-80.915,-35.815c-1.558,-0.684 -3.342,-0.681 -4.9,0.031l-78.265,35.815l-0.075,0.049c-0.46,0.218 -0.892,0.494 -1.287,0.829l-0.221,0.215c-0.288,0.272 -0.55,0.575 -0.785,0.91c-0.085,0.121 -0.171,0.237 -0.247,0.364l-0.14,0.206c-0.202,0.369 -0.359,0.752 -0.476,1.139l-0.022,0.108c-0.132,0.47 -0.19,0.944 -0.205,1.419l-0.028,0.19l0,94.179c0,2.156 1.166,4.146 3.047,5.203Z"
                    style="fill:#fff;fill-rule:nonzero;"/>
            </svg>
          </div>
          <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
            <div class="flex-1 px-4 py-2 text-sm truncate">
              <a href="{{esc_url(wc_get_endpoint_url('orders'))}}" class="text-gray-900 font-medium hover:text-gray-600">{{_e('Mes commandes', 'woocommerce')}}</a>
            </div>
          </div>
        </li>

        <li class="col-span-1 flex shadow-sm rounded-md">
          <div class="flex-shrink-0 flex items-center justify-center w-16 bg-primary text-white text-sm font-medium rounded-l-md p-4">
            <svg width="100%" height="100%" viewBox="0 0 359 335"
                 style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"><g><path d="M179.303,17.166c-44.41,0 -80.54,36.13 -80.54,80.539c0,72.657 60.46,157.197 80.54,183.257c20.07,-26.08 80.55,-110.67 80.55,-183.257c0,-44.409 -36.13,-80.539 -80.55,-80.539Zm0,285.536c-2.47,0 -4.8,-1.09 -6.38,-2.98c-3.71,-4.42 -90.83,-109.33 -90.83,-202.017c0,-53.599 43.61,-97.205 97.21,-97.205c53.61,0 97.22,43.606 97.22,97.205c0,92.687 -87.13,197.597 -90.84,202.017c-1.58,1.89 -3.92,2.98 -6.38,2.98Z" style="fill:#fff;fill-rule:nonzero;stroke:#fff;stroke-width:1px;"/><path
                  d="M179.303,56.259c-22.85,0 -41.44,18.593 -41.44,41.449c0,22.854 18.59,41.449 41.44,41.449c22.86,0 41.45,-18.595 41.45,-41.449c0,-22.856 -18.59,-41.449 -41.45,-41.449Zm0,99.564c-32.04,0 -58.11,-26.07 -58.11,-58.115c0,-32.045 26.07,-58.116 58.11,-58.116c32.05,0 58.12,26.071 58.12,58.116c0,32.045 -26.07,58.115 -58.12,58.115Z"
                  style="fill:#fff;fill-rule:nonzero;stroke:#fff;stroke-width:1px;"/><path
                  d="M349.783,333.702l-340.95,0c-3.56,0 -6.73,-2.26 -7.88,-5.63c-1.16,-3.37 -0.04,-7.1 2.77,-9.28l79.83,-62c1.47,-1.14 3.26,-1.76 5.12,-1.76l32.43,0c4.6,0 8.33,3.74 8.33,8.34c0,4.6 -3.73,8.33 -8.33,8.33l-29.58,0l-58.37,45.34l292.31,0l-58.37,-45.34l-29.59,0c-4.6,0 -8.33,-3.73 -8.33,-8.33c0,-4.6 3.73,-8.34 8.33,-8.34l32.45,0c1.85,0 3.65,0.62 5.11,1.76l79.83,62c2.82,2.18 3.93,5.91 2.78,9.28c-1.16,3.37 -4.33,5.63 -7.89,5.63Z"
                  style="fill:#fff;fill-rule:nonzero;stroke:#fff;stroke-width:1px;"/></g>
            </svg>
          </div>
          <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
            <div class="flex-1 px-4 py-2 text-sm truncate">
              <a href="{{esc_url(wc_get_endpoint_url('edit-address'))}}" class="text-gray-900 font-medium hover:text-gray-600">{{_e('Mes adresses', 'woocommerce')}}</a>
            </div>
          </div>
        </li>

        <li class="col-span-1 flex shadow-sm rounded-md">
          <div class="flex-shrink-0 flex items-center justify-center w-16 bg-primary text-white text-sm font-medium rounded-l-md p-4">
            <svg width="100%" height="100%" viewBox="0 0 520 520" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"><path d="M397.43,65.71l17.96,-17.96l55.96,55.95l-17.97,17.96l-55.95,-55.95Zm-314.49,328.92l41.51,41.5l-69.16,27.67l27.65,-69.17Zm398.41,-245l31.95,-31.95c3.71,-3.71 5.8,-8.74 5.8,-13.98c0,-5.25 -2.09,-10.28 -5.8,-13.99l-83.93,-83.92c-7.73,-7.72 -20.24,-7.72 -27.97,0l-160.1,160.1c-7.72,7.72 -7.72,20.24 0,27.97c7.73,7.73 20.25,7.73 27.98,0l100.18,-100.18l55.95,55.95l-265.77,265.76l-55.95,-55.96l123.07,-123.07c7.73,-7.72 7.73,-20.24 0,-27.97c-7.73,-7.72 -20.24,-7.72 -27.97,0l-137.05,137.06c-1.95,1.941 -3.39,4.201 -4.36,6.6c-0.01,0.02 -0.02,0.03 -0.03,0.04l-55.94,139.87c-2.93,7.34 -1.21,15.73 4.39,21.33c3.77,3.78 8.83,5.79 13.98,5.79c2.47,0 4.97,-0.46 7.35,-1.41l139.86,-55.94c0.02,-0.01 0.03,-0.02 0.05,-0.03c2.4,-0.96 4.65,-2.41 6.59,-4.35l279.75,-279.75l13.99,13.99l-111.89,111.9c-7.73,7.73 -7.73,20.24 0,27.97c3.86,3.86 8.92,5.8 13.98,5.8c5.06,0 10.12,-1.94 13.99,-5.8l125.87,-125.89c7.73,-7.72 7.73,-20.24 0,-27.97l-27.97,-27.97Z" style="fill:#fff;fill-rule:nonzero;"/></svg>
          </div>
          <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
            <div class="flex-1 px-4 py-2 text-sm truncate">
              <a href="{{esc_url(wc_get_endpoint_url('edit-account'))}}" class="text-gray-900 font-medium hover:text-gray-600">{{_e('Mes informations', 'woocommerce')}}</a>
            </div>
          </div>
        </li>

        <li class="col-span-1 flex shadow-sm rounded-md">
          <div class="flex-shrink-0 flex items-center justify-center w-16 bg-primary text-white text-sm font-medium rounded-l-md p-2">
            <svg width="100%" height="100%" viewBox="0 0 1200 622"
                 style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
              <g>
                <path d="M395.928,542.476c7.199,42.785 45.179,75.978 91.523,75.978c46.344,0 84.324,-33.193 91.523,-75.978l252.584,0c7.662,0 13.874,-6.603 13.874,-14.748c0,0 0,-324.978 0,-457.36c0,-38.587 -29.428,-69.868 -65.729,-69.868c-106.805,0 -350.248,0 -457.054,0c-36.301,0 -65.729,31.281 -65.729,69.868c0,132.382 0,457.36 0,457.36c0,8.145 6.211,14.748 13.875,14.748l125.133,0Zm91.523,-75.978c35.521,0 65.003,27.015 65.003,61.23c0,34.215 -29.482,61.229 -65.003,61.229c-35.521,0 -65.003,-27.014 -65.003,-61.229c0,-34.215 29.482,-61.23 65.003,-61.23Zm91.523,46.481l238.709,0c0,0 0,-442.61 0,-442.611c0,-22.296 -17.004,-40.371 -37.98,-40.371c0,0 -457.053,0 -457.054,0c-20.975,0 -37.979,18.075 -37.979,40.372c0,0 0,442.61 -0.001,442.61l111.259,0c7.199,-42.784 45.179,-75.978 91.523,-75.978c46.344,0 84.324,33.194 91.523,75.978Z"
                      style="fill:#fff;stroke:#fff;stroke-width:1px;"/>
                <path
                  d="M216.369,15.248l334.807,0m-334.807,14.749l334.807,0c7.658,0 13.875,-6.609 13.875,-14.749c0,-8.139 -6.217,-14.748 -13.875,-14.748l-334.807,0c-7.657,0 -13.875,6.609 -13.875,14.748c0,8.14 6.218,14.749 13.875,14.749Z"
                  style="fill:#fff;stroke:#fff;stroke-width:1px;"/>
                <path
                  d="M88.159,15.248l91.318,0m-91.318,14.749l91.318,0c7.658,0 13.875,-6.609 13.875,-14.749c0,-8.139 -6.217,-14.748 -13.875,-14.748l-91.318,0c-7.657,0 -13.875,6.609 -13.875,14.748c0,8.14 6.218,14.749 13.875,14.749Z"
                  style="fill:#fff;stroke:#fff;stroke-width:1px;"/>
                <path
                  d="M14.375,15.248l36.892,0m-36.892,14.749l36.892,0c7.658,0 13.875,-6.609 13.875,-14.749c0,-8.139 -6.217,-14.748 -13.875,-14.748l-36.892,0c-7.658,0 -13.875,6.609 -13.875,14.748c0,8.14 6.217,14.749 13.875,14.749Z"
                  style="fill:#fff;stroke:#fff;stroke-width:1px;"/>
                <path
                  d="M216.369,174.792l455.498,0m-455.498,14.749l455.498,0c7.657,0 13.874,-6.609 13.874,-14.749c0,-8.14 -6.217,-14.748 -13.874,-14.748l-455.498,0c-7.657,0 -13.875,6.608 -13.875,14.748c0,8.14 6.218,14.749 13.875,14.749Z"
                  style="fill:#fff;stroke:#fff;stroke-width:1px;"/>
                <path
                  d="M88.159,174.792l91.318,0m-91.318,14.749l91.318,0c7.658,0 13.875,-6.609 13.875,-14.749c0,-8.14 -6.217,-14.748 -13.875,-14.748l-91.318,0c-7.657,0 -13.875,6.608 -13.875,14.748c0,8.14 6.218,14.749 13.875,14.749Z"
                  style="fill:#fff;stroke:#fff;stroke-width:1px;"/>
                <path
                  d="M133.818,309.347l417.358,3.924m-417.481,10.824l417.359,3.924c7.657,0.072 13.929,-6.478 13.996,-14.618c0.068,-8.139 -6.094,-14.806 -13.751,-14.878l-417.358,-3.924c-7.658,-0.072 -13.929,6.478 -13.997,14.617c-0.068,8.14 6.094,14.807 13.751,14.879Z"
                  style="fill:#fff;stroke:#fff;stroke-width:1px;"/>
                <path
                  d="M51.267,309.347l36.892,1.962m-37.585,12.768l36.892,1.962c7.648,0.407 14.168,-5.863 14.551,-13.993c0.382,-8.13 -5.516,-15.06 -13.164,-15.467l-36.893,-1.962c-7.648,-0.407 -14.168,5.863 -14.55,13.993c-0.383,8.13 5.516,15.06 13.164,15.467Z"
                  style="fill:#fff;stroke:#fff;stroke-width:1px;"/>
                <path
                  d="M981.663,434.048c-53.116,0 -95.586,42.28 -95.586,93.419c0,51.139 42.47,93.419 95.586,93.419c53.117,0 95.587,-42.28 95.587,-93.419c0,-51.139 -42.47,-93.419 -95.587,-93.419Zm0,29.497c37.084,0 67.838,28.219 67.838,63.922c0,35.703 -30.754,63.922 -67.838,63.922c-37.083,0 -67.837,-28.219 -67.837,-63.922c0,-35.703 30.754,-63.922 67.837,-63.922Z"
                  style="fill:#fff;stroke:#fff;stroke-width:1px;"/>
                <path
                  d="M896.274,538.794c5.774,0 10.497,-4.888 10.652,-11.023c0.906,-35.944 30.368,-70.891 74.746,-70.93c39.374,-0.035 70.252,35.119 71.155,70.93c0.155,6.135 4.878,11.023 10.652,11.023l94.948,-0.001c27.991,-0.267 40.823,-20.579 40.479,-40.069c-0.294,-16.683 -10.39,-33.883 -30.669,-38.428c0.003,0 -1.268,-114.112 -1.268,-114.112c-0.078,-6.946 -1.585,-13.79 -4.416,-20.051l-84.108,-185.99c-7.543,-16.679 -23.412,-27.286 -40.822,-27.286l-206.065,0c-5.885,0 -10.656,5.071 -10.656,11.326l0,403.284c0,6.255 4.771,11.327 10.656,11.327l64.716,0Zm-9.703,-22.654l-44.358,0l0,-380.63l195.41,0c9.219,0 17.621,5.617 21.614,14.448l84.108,185.989c1.484,3.281 2.273,6.866 2.314,10.505l1.383,124.149c0.068,6.17 4.772,11.147 10.577,11.192c12.686,0.097 19.821,8.362 19.979,17.356c0.156,8.84 -6.645,16.857 -19.331,16.991l-85.125,0c-6.556,-42.717 -44.16,-81.994 -91.488,-81.952c-52.983,0.047 -88.829,39.344 -95.083,81.952Zm153.332,-281.928c0,-11.286 -4.217,-22.11 -11.725,-30.09c-7.508,-7.981 -17.69,-12.464 -28.307,-12.464c-20.096,0 -46.632,0 -66.728,0c-10.617,0 -20.8,4.483 -28.307,12.464c-7.508,7.98 -11.725,18.804 -11.725,30.09c0,23.325 0,55.068 0,78.393c0,11.286 4.217,22.11 11.725,30.09c7.507,7.981 17.69,12.464 28.307,12.464c20.096,0 46.632,0 66.728,0c10.617,0 20.799,-4.483 28.307,-12.464c7.508,-7.98 11.725,-18.804 11.725,-30.09l0,-78.393Zm-21.311,0l0,78.393c0,5.278 -1.972,10.34 -5.483,14.072c-3.511,3.732 -8.273,5.829 -13.238,5.829c-20.096,0 -46.632,0 -66.728,0c-4.965,0 -9.727,-2.097 -13.238,-5.829c-3.511,-3.732 -5.483,-8.794 -5.483,-14.072l0,-78.393c0,-5.278 1.972,-10.34 5.483,-14.072c3.511,-3.732 8.273,-5.829 13.238,-5.829c20.096,0 46.632,0 66.728,0c4.965,0 9.727,2.097 13.238,5.829c3.511,3.732 5.483,8.794 5.483,14.072Z"
                  style="fill:#fff;stroke:#fff;stroke-width:1px;"/>
              </g>
            </svg>          </div>
          <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
            <div class="flex-1 px-4 py-2 text-sm truncate">
              <a href="{{get_permalink( get_page_by_path( 'suivi' ) )}}" class="text-gray-900 font-medium hover:text-gray-600">{{_e('Suivre ma commande', 'woocommerce')}}</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_dashboard');

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_before_my_account');

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_after_my_account');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
