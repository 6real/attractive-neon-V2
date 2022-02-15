@php
  $isTransparent = is_front_page() ? 'transparent' : '';
  $colorFont = is_front_page() ? '#FFF' : '#32374C';
@endphp





  <header data-module-header x-data="{ openMobile: false }">


    <div class="relative bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">

          <div class="flex justify-start">
            <!-- Logo & Open Mobile  -->

            <a href="{{home_url()}}">
              <span class="sr-only">Workflow</span>
              <img class="block max-h-4" src="@php esc_attr_e(get_field('logo_full', 'option')['url']);  @endphp" alt="Attractive Neon Logo">
            </a>
          </div>
          <div class="-mr-2 -my-2 md:hidden">
            <button @click="openMobile = ! openMobile" type="button"
                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500"
                    aria-expanded="false">
              <span class="sr-only">Open menu</span>
              <!-- Heroicon name: outline/menu -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                   stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
              </svg>
            </button>
          </div>


          <!-- MENU DESKTOP -->
          @if (has_nav_menu('primary_navigation'))
            {{wp_nav_menu(
                  ['theme_location' => 'primary_navigation',
                   'menu_class' => 'hidden md:flex items-center',
                   'container_class' => 'hidden md:block',
                   'container' => 'div',
                   'walker'=> new Walker_Primary()]
             ) }}
          @endif
          @if(!empty($contact_link))
            <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
              <a href="{{get_the_permalink($contact_link->ID)}}"
                 class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-primary-600 hover:bg-primary-700">
                Nous contacter
              </a>
            </div>
          @endif

        </div>
      </div>

      <!--
        Mobile menu, show/hide based on mobile menu state.

        Entering: "duration-200 ease-out"
          From: "opacity-0 scale-95"
          To: "opacity-100 scale-100"
        Leaving: "duration-100 ease-in"
          From: "opacity-100 scale-100"
          To: "opacity-0 scale-95"
      -->
      <div
        x-cloak
        x-show="openMobile"
        @click.outside="openMobile = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"

        class="absolute z-50 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
          <div class="pt-5 pb-6 px-5">
            <div class="flex items-center justify-between">
              <div>
                  <img class="block lg:hidden" src="@php esc_attr_e(get_field('logo_mobile', 'option')['url']);  @endphp" alt="Attractive Neon Logo mobile">
              </div>
              <div class="-mr-2">
                <button @click="openMobile = ! openMobile" type="button"
                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500">
                  <span class="sr-only">Close menu</span>
                  <!-- Heroicon name: outline/x -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                       stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                  </svg>
                </button>
              </div>
            </div>

            {{wp_nav_menu(
                          ['theme_location' => 'primary_navigation',
                           'menu_class' => 'grid gap-y-8',
                           'container_class' => 'mt-6',
                           'container' => 'div',
                           'walker'=> new Walker_Primary_Mobile()]
                     ) }}

          </div>
          <div class="py-6 px-5 space-y-6">
            <div class="grid grid-cols-2 gap-y-4 gap-x-8">
              <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                Pricing
              </a>

              <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                Docs
              </a>

              <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                Help Center
              </a>

              <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                Guides
              </a>

              <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                Events
              </a>

              <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                Security
              </a>
            </div>
            <div>
              <a href="#"
                 class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-primary-600 hover:bg-primary-700">
                Sign up
              </a>
              <p class="mt-6 text-center text-base font-medium text-gray-500">
                Existing customer?
                <a href="#" class="text-primary-600 hover:text-primary-500">
                  Sign in
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

