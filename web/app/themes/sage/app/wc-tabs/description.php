<?php

namespace App;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function product_description_markup()
{
    $html = '
<section class="wc_tabs-shipping mt-8">

    <div class="mb-6">
        <h3 class="my-4">
             <i class="fas fa-handshake"></i>
             <span>' . __('Le produit', 'woocommerce') . '</span>
        </h3>
        <p>' . __('Chaque néon est constitué d’un support PVC transparent et de tubes LED flexibles soigneusement assemblés à la main.', 'woocommerce') . '</p>
        <p>' . __('Nous portons une attention particulière à la qualité de nos produits, c’est pourquoi nous avons sélectionné les meilleurs matériaux afin de vous proposer des créations inégalables.', 'woocommerce') . '</p>
        <p>' . __('Livrés prêt à l’emploi, nos néons sont conçus pour être facile à prendre en main.', 'woocommerce') . '</p>
    </div>
    <div class="mb-6">
        <h3 class="mb-4">
            <i class="fas fa-gem"></i>
            <span>' . __('Avantages', 'woocommerce') . '</span>
        </h3>

        <ul>
            <li> ' . __('Durée de vie étendue : environ 35000 h de fonctionnement', 'woocommerce') . '</li>
            <li>' . __('Facile à installer avec le kit d’installation fourni', 'woocommerce') . '</li>
            <li>' . __('Faible consommation d’énergie grâce à l’éclairage LED', 'woocommerce') . '</li>
            <li>' . __('Ne chauffe pas (à l’inverse du néon traditionnel en verre)', 'woocommerce') . '</li>
            <li>' . __('Résistant aux chocs', 'woocommerce') . '</li>
        </ul>
    </div>
    <div class="mb-6">
        <h3 class="mb-4">
            <i class="fas fa-question-circle"></i>
            <span>' . __('Que contient le colis ?', 'woocommerce') . '</span>
        </h3>
        <ul>
            <li> ' . __('Votre néon LED', 'woocommerce') . '</li>
            <li>' . __('Le kit de fixation mural (Vis, chevilles, entretoise)', 'woocommerce') . '</li>
            <li>' . __('Un variateur de luminosité et sa télécommande ou un variateur de couleur RVB et sa télécommande (Optionnel)', 'woocommerce') . '</li>
            <li>' . __('Un adaptateur basse tension et une prise 12 V (EU/US/UK/AU, en fonction du pays de livraison)', 'woocommerce') . '</li>

        </ul>
    </div>
    </section>

';

    return $html;

}
