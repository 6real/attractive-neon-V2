@php
  @endphp


<header class="bg-white shadow" x-data="{ openMobile: false }">
  <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:divide-y lg:divide-gray-200 lg:px-8">
    <div class="relative h-16 flex justify-between">

      {{--      LOGO      --}}
      <div class="relative z-10 px-2 flex lg:px-0">
        <div class="flex-shrink-0 flex items-center">
          <a href="{{home_url()}}">
            <img class="hidden lg:block h-8 w-auto" src="@php esc_attr_e(get_field('logo_full', 'option')['url']);  @endphp" alt="Attractive Neon Logo">
            <img class="lg:hidden block h-12 w-auto" src="@php esc_attr_e(get_field('logo_mobile', 'option')['url']);  @endphp" alt="Attractive Neon Logo V2">
          </a>
        </div>
      </div>

      {{--      Search      --}}

{{get_search_form()}}


      <!-- Mobile menu button -->
      <div class="relative z-10 flex items-center lg:hidden">
        <button @click="openMobile = ! openMobile"
                type="button"
                class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary"
                aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open menu</span>

          <svg x-show="!openMobile"
               class="block h-6 w-6 relative z-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>

          <svg x-cloak
               x-show="openMobile"
              class="block relative z-10 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>


      <div class="hidden lg:relative lg:z-10 lg:ml-4 lg:flex lg:items-center">


        <a class="flex-shrink-0 bg-white rounded-full p-1 text-gray-900 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
          <span class="sr-only">Panier</span>
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
          </svg>
        </a>

        <a class="flex-shrink-0 bg-white rounded-full p-1 text-gray-900 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
          <span class="sr-only">Compte</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </a>

      </div>
    </div>

    {{--  Nav Menu  --}}
    @if (has_nav_menu('primary_navigation'))
      {{wp_nav_menu(
            ['theme_location' => 'primary_navigation',
             'menu_class' => 'hidden lg:py-2 lg:flex lg:space-x-8 items-center',
             'container_class' => 'hidden md:block',
             'container' => 'div',
             'walker'=> new Walker_Primary()]
       ) }}
    @endif
  </div>


  {{--  Nav Menu Mobile  --}}
  <nav   x-cloak
         x-show="openMobile"
         @click.outside="openMobile = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-90"
         class="lg:hidden" aria-label="Global" id="mobile-menu">


    <div class="pt-2 pb-3 px-2">
      @if (has_nav_menu('primary_navigation'))
        {{wp_nav_menu(
           ['theme_location' => 'primary_navigation',
            'menu_class' => 'grid gap-y-8',
            'container_class' => 'mt-6 ml-4',
            'container' => 'div',
            'walker'=> new Walker_Primary_Mobile()])
        }}
      @endif


    <div class="relative flex lg:hidden items-center justify-around py-4 px-3 mt-6">

      <a class="flex w-1/2 items-center justify-center gap-2 flex-shrink-0 bg-gray-200 rounded p-4 text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
        <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
        <span class="lg:hidden">Panier</span>

      </a>

      <a class="flex w-1/2 items-center justify-center gap-2 flex-shrink-0 bg-gray-200 rounded p-4 text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="lg:hidden">Compte</span>

      </a>

    </div>
  </nav>

</header>
