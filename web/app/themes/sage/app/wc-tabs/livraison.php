<?php

namespace App;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function shipping_markup()
{
    $html = '

<section class="wc_tabs-shipping mt-8">
    <div class="mb-6">
        <h3 class="my-4">
            <i class="fas fa-box-open"></i>
             <span>' . __('Expédition dans le monde entier', 'woocommerce') . '</span>
        </h3>
        <p>' . __('Nous expédions gratuitement dans le monde entier à partir de 350€ d’achat. Le type de prise est adapté en fonction du pays d’expédition. ', 'woocommerce') . '</p>
    </div>

    <div class="mb-6">
        <h3 class="my-4">
            <i class="fas fa-dolly-flatbed"></i>
            <span>' . __('Délais et suivi de livraison', 'woocommerce') . '</span>
        </h3>
        <ul>
            <li>' . __('Livraison Standard (Gratuite) : 10 à 15 jours ouvrables', 'woocommerce') . '</li>
            <li>' . __('Livraison Express (+75€) : 5 à 10 jours ouvrables', 'woocommerce') . '</li>
        </ul>
        <p>' . __('Nous vous tiendrons informé par e-mail de l\'état d’avancement de votre commande à chaque étape du processus.', 'woocommerce') . '</p>
    </div>

    <div class="mb-6">
        <h3 class="my-4">
            <i class="fas fa-sync"></i>
            <span>' . __('Garantie de livraison', 'woocommerce') . '</span>
        </h3>
        <p>' . __('En cas de casse à la réception de votre colis, votre néon sera remplacé gratuitement.', 'woocommerce') . '</p>
        <p>' . __('Vous avez jusqu’à 14 jours à partir de la réception du colis pour nous contacter à partir du formulaire de contact pour que l’on puisse préparer l’envoi de votre nouveau néon dans les meilleurs délais.', 'woocommerce') . '</p>
    </div>
</section>';

    return $html;

}
