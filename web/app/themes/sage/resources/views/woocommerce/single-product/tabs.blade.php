@php
$tabs = get_field('tabs_accordion', 'option');
//var_dump($tabs)
@endphp

<div class="mt-8 border-t border-b divide-y divide-medium border-medium">
@foreach($tabs['tabs'] as $tab)
  <div x-data="{ open: false }">
    <h3>
      <button type="button" class="group relative w-full py-4 flex justify-between items-center text-left" aria-controls="disclosure-1" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
        <span class="text-sm font-bold text-dark" x-state:on="Open" x-state:off="Closed" :class="{ 'text-indigo-600': open, 'text-gray-900': !(open) }">
          {!! $tab['title'] !!}
        </span>
        <span class="ml-6 flex items-center">
          <svg class="h-6 w-6 text-medium group-hover:text-dark block" x-state:on="Open"
               x-state:off="Closed" :class="{ 'hidden': open, 'block': !(open) }"
               x-description="Heroicon name: outline/plus-sm" xmlns="http://www.w3.org/2000/svg"
               fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
          <svg class="h-6 w-6 text-primary group-hover:text-primary hidden" x-state:on="Open"
               x-state:off="Closed" :class="{ 'block': open, 'hidden': !(open) }"
               x-description="Heroicon name: outline/minus-sm" xmlns="http://www.w3.org/2000/svg"
               fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6"></path>
          </svg>
        </span>
      </button>
    </h3>


    <div class="tabs_product" id="disclosure-1" x-show="open" style="display: none;">
      {!! $tab['content'] !!}
    </div>
  </div>
  @endforeach
</div>
