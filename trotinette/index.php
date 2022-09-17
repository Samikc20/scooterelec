<?php

declare(strict_types=1);

session_start();

use controllers\UserController;
use controllers\TrotinetteController;
use controllers\ContactController;
use controllers\PanierController;

function chargerClasse($classe)
{
    $classe = str_replace('\\', '/', $classe);
    require $classe . '.php';
}

spl_autoload_register('chargerClasse');

$userController = new UserController();
$trotinetteController = new TrotinetteController();
$contactController = new ContactController();
$panierController = new PanierController();

if (array_key_exists("action", $_GET)) {
    switch ($_GET['action']) {
        case "create_account":
            $userController->create_account();
            break;
        case 'connexion':
            $userController->connexion();
            break;
        case 'deconnexion':
            $userController->deconnexion();
            break;
        case 'contact':
            $contactController->contact();
            break;
        case 'panier':
            $panierController->afficherPanier();
            break;
        case 'ajouterPanier':
            $panierController->addPanier();
            break;
        case 'removePanier':
            $panierController->removePanier();
            break;
        case 'confirmCommande':
            $panierController->confirmCommande();
            break;
    }
} else {
    $trotinetteController->listTrotinettes();
}
