<?php

namespace App;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function instalation_markup()
{
    $html = '

<section class="wc_tabs-shipping mt-8">
   <div class="mb-6">
        <h3 class="my-4">
            <i class="fas fa-box-open"></i>
             <span>' . __('Ouvrir le colis', 'attractive') . '</span>
        </h3>
        <p>' . __('Vérifiez que votre colis contient bien :', 'attractive') . '</p>
        <ul>
            <li>' . __('Votre néon LED', 'attractive') . '</li>
            <li>' . __('Kit de fixation murale (Vis, chevilles, entretoise)', 'attractive') . '</li>
            <li>' . __('Un variateur de luminosité et sa télécommande ou un variateur de couleur RVB et sa télécommande (Optionnel)', 'attractive') . '</li>
            <li>' . __('Un adaptateur basse tension et une prise 12V (EU/US/UK/AU, en fonction du pays de livraison)', 'attractive') . '</li>
        </ul>
    </div>
<div class="mb-6">
        <h3 class="my-4">
            <i class="fas fa-tools"></i>
            <span>' . __('Fixer au mur', 'attractive') . '</span>
        </h3>
        <ul>
            <li>' . __('Placez votre néon sur le mur à l’endroit souhaité pour marquer le mur à travers les trous à l’aide d’un crayon.', 'attractive') . '</li>
            <li>' . __('Pour les 4 points de fixations, percez le trou et mettez la cheville. Ensuite, dévissez la partie supérieure de l’entretoise et faites passer la vis à travers. Puis, vissez fermement dans la cheville à l’aide d’un tournevis cruciforme. ', 'attractive') . '</li>
            <li>' . __('Placer le panneau en face des trous sur les entretoises et vissez fermement la partie supérieure de chaque entretoise. ', 'attractive') . '</li>
        </ul>
    </div>
   <div class="mb-6">
        <h3 class="my-4">
            <i class="fas fa-lightbulb"></i>
            <span>' . __('Branchez votre néon', 'attractive') . '</span>
        </h3>
        <ul>
            <li>' . __('Connectez les câbles de votre néon au variateur fourni.', 'attractive') . '</li>
            <li>' . __('Reliez le variateur à l’adaptateur basse tension.', 'attractive') . '</li>
            <li>' . __('Branchez le transformateur à la prise de courant à l’aide du câble d’alimentation.', 'attractive') . '</li>
            <li>' . __('Régler l\'éclairage de votre néon selon vos envies à l’aide de la télécommande.', 'attractive') . '</li>
            <li>' . __('Il ne vous reste plus qu’à admirer le résultat final !', 'attractive') . '</li>
        </ul>
    </div>
</section>';

    return $html;

}
