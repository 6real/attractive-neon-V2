



<form class="relative z-0 flex-1 px-2 flex items-center justify-center sm:absolute sm:inset-0"
      id="searchform" method="get" action="<?php echo esc_url(home_url('/')); ?>">

  <input type="hidden" name="post_type[]" value="product"/>
  <input type="hidden" name="terms[]" value="product_cat"/>

  <div class="w-full sm:max-w-xs">
    <label for="search" class="sr-only">Rechercher</label>
    <div class="relative">
      <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">

        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
             fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd"
                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                clip-rule="evenodd"/>
        </svg>
      </div>
      <input id="search"
             class="block w-full bg-white border border-gray-300 rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:outline-none focus:text-gray-900 focus:placeholder-gray-400 focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm"
             type="search"
             class="search-field"
             name="s"
             placeholder="Recherche"
             value="<?php echo get_search_query(); ?>">
    </div>
  </div>
</form>





