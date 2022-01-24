<?php

namespace App;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function product_description_markup()
{
    $html = '


  <section aria-labelledby="features-heading" class="max-w-7xl mx-auto sm:px-2">
    <div class="max-w-2xl mx-auto px-4 lg:px-0 lg:max-w-none">
      <div class="max-w-3xl">
        <h2 id="features-heading" class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Technical Specifications</h2>
        <p class="mt-4 text-gray-500">The Organize modular system offers endless options for arranging your favorite and most used items. Keep everything at reach and in its place, while dressing up your workspace.</p>
      </div>

      <div class="mt-4">
        <div class="-mx-4 flex overflow-x-auto sm:mx-0">
          <div class="flex-auto px-4 border-b border-gray-200 sm:px-0">
            <div class="-mb-px flex space-x-10" aria-orientation="horizontal" role="tablist">
              <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
              <button id="features-tab-1" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-6 border-b-2 font-medium text-sm" aria-controls="features-panel-1" role="tab" type="button">
                Design
              </button>

              <button id="features-tab-2" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-6 border-b-2 font-medium text-sm" aria-controls="features-panel-2" role="tab" type="button">
                Material
              </button>

              <button id="features-tab-3" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-6 border-b-2 font-medium text-sm" aria-controls="features-panel-3" role="tab" type="button">
                Considerations
              </button>

              <button id="features-tab-4" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-6 border-b-2 font-medium text-sm" aria-controls="features-panel-4" role="tab" type="button">
                Included
              </button>
            </div>
          </div>
        </div>

        <div id="features-panel-1" class="space-y-16 pt-10 lg:pt-16" aria-labelledby="features-tab-1" role="tabpanel" tabindex="0">
          <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8">
            <div class="mt-6 lg:mt-0 lg:col-span-5">
              <h3 class="text-lg font-medium text-gray-900">Adaptive and modular</h3>
              <p class="mt-2 text-sm text-gray-500">The Organize base set allows you to configure and evolve your setup as your items and habits change. The included trays and optional add-ons are easily rearranged to achieve that perfect setup.</p>
            </div>
            <div class="lg:col-span-7">
              <div class="aspect-w-2 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden sm:aspect-w-5 sm:aspect-h-2">
                <img src="https://tailwindui.com/img/ecommerce-images/product-feature-06-detail-01.jpg" alt="Maple organizer base with slots, supporting white polycarbonate trays of various sizes." class="object-center object-cover">
              </div>
            </div>
          </div>
        </div>

        <div id="features-panel-2" class="space-y-16 pt-10 lg:pt-16" aria-labelledby="features-tab-2" role="tabpanel" tabindex="0">
          <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8">
            <div class="mt-6 lg:mt-0 lg:col-span-5">
              <h3 class="text-lg font-medium text-gray-900">Natural wood options</h3>
              <p class="mt-2 text-sm text-gray-500">Organize has options for rich walnut and bright maple base materials. Accent your desk with a contrasting material, or match similar woods for a calm and cohesive look. Every base is hand sanded and finished.</p>
            </div>
            <div class="lg:col-span-7">
              <div class="aspect-w-2 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden sm:aspect-w-5 sm:aspect-h-2">
                <img src="https://tailwindui.com/img/ecommerce-images/product-feature-06-detail-02.jpg" alt="Walnut organizer base with pen, sticky note, phone, and bin trays, next to modular drink coaster attachment." class="object-center object-cover">
              </div>
            </div>
          </div>
        </div>

        <div id="features-panel-3" class="space-y-16 pt-10 lg:pt-16" aria-labelledby="features-tab-3" role="tabpanel" tabindex="0">
          <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8">
            <div class="mt-6 lg:mt-0 lg:col-span-5">
              <h3 class="text-lg font-medium text-gray-900">Helpful around the home</h3>
              <p class="mt-2 text-sm text-gray-500">Our customers use Organize throughout the house to bring efficiency to many daily routines. Enjoy Organize in your workspace, kitchen, living room, entry way, garage, and more. We can&#039;t wait to see how you&#039;ll use it!</p>
            </div>
            <div class="lg:col-span-7">
              <div class="aspect-w-2 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden sm:aspect-w-5 sm:aspect-h-2">
                <img src="https://tailwindui.com/img/ecommerce-images/product-feature-06-detail-03.jpg" alt="Walnut organizer base with white polycarbonate trays in the kitchen with various kitchen utensils." class="object-center object-cover">
              </div>
            </div>
          </div>
        </div>

        <div id="features-panel-4" class="space-y-16 pt-10 lg:pt-16" aria-labelledby="features-tab-4" role="tabpanel" tabindex="0">
          <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8">
            <div class="mt-6 lg:mt-0 lg:col-span-5">
              <h3 class="text-lg font-medium text-gray-900">Everything you&#039;ll need</h3>
              <p class="mt-2 text-sm text-gray-500">The Organize base set includes the pen, phone, small, and large trays to help you group all your essential items. Expand your set with the drink coaster and headphone stand add-ons.</p>
            </div>
            <div class="lg:col-span-7">
              <div class="aspect-w-2 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden sm:aspect-w-5 sm:aspect-h-2">
                <img src="https://tailwindui.com/img/ecommerce-images/product-feature-06-detail-04.jpg" alt="Walnut organizer system on black leather desk mat on top of white desk." class="object-center object-cover">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
';

    return $html;

}

//<h2>' . __('Le produit', 'woocommerce') . '</h2>
//    <div>
//        <h3>
//             <i class="fas fa-handshake"></i>
//             <span>' . __('Le produit', 'woocommerce') . '</span>
//        </h3>
//        <p>' . __('Chaque néon est constitué d’un support PVC transparent et de tubes LED flexibles soigneusement assemblés à la main.', 'woocommerce') . '</p>
//        <p>' . __('Nous portons une attention particulière à la qualité de nos produits, c’est pourquoi nous avons sélectionné les meilleurs matériaux afin de vous proposer des créations inégalables.', 'woocommerce') . '</p>
//        <p>' . __('Livrés prêt à l’emploi, nos néons sont conçus pour être facile à prendre en main.', 'woocommerce') . '</p>
//    </div>
//    <div>
//        <h3>
//            <i class="fas fa-gem"></i>
//            <span>' . __('Avantages', 'woocommerce') . '</span>
//        </h3>
//
//        <ul>
//            <li> ' . __('Durée de vie étendue : environ 35000 h de fonctionnement', 'woocommerce') . '</li>
//            <li>' . __('Facile à installer avec le kit d’installation fourni', 'woocommerce') . '</li>
//            <li>' . __('Faible consommation d’énergie grâce à l’éclairage LED', 'woocommerce') . '</li>
//            <li>' . __('Ne chauffe pas (à l’inverse du néon traditionnel en verre)', 'woocommerce') . '</li>
//            <li>' . __('Résistant aux chocs', 'woocommerce') . '</li>
//        </ul>
//    </div>
//    <div>
//        <h3>
//            <i class="fas fa-question-circle"></i>
//            <span>' . __('Que contient le colis ?', 'woocommerce') . '</span>
//        </h3>
//        <ul>
//            <li> ' . __('Votre néon LED', 'woocommerce') . '</li>
//            <li>' . __('Le kit de fixation mural (Vis, chevilles, entretoise)', 'woocommerce') . '</li>
//            <li>' . __('Un variateur de luminosité et sa télécommande ou un variateur de couleur RVB et sa télécommande (Optionnel)', 'woocommerce') . '</li>
//            <li>' . __('Un adaptateur basse tension et une prise 12 V (EU/US/UK/AU, en fonction du pays de livraison)', 'woocommerce') . '</li>
//
//        </ul>
//    </div>
