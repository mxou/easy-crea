<?php
require_once '../config/config.local.php';
require_once '../controllers/CarteController.php';
require_once '../controllers/AccueilController.php';

// Gestion des erreurs personnalisées
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    // Inclure une vue d'erreur
    require './../views/error.php';
    exit;
});

// Gestion des exceptions
set_exception_handler(function($exception) {
    // Inclure une vue d'erreur
    require './../views/error.php';
    exit;
});



// Routeur simple pour traiter les requêtes
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $carteController = new CarteController($db);
    $accueilController = new HomeController();

    switch ($action) {
        case 'afficher':
            $id = $_GET['id'];
            $carteController->afficherCarte($id);
            break;

        case 'creer':
            $carteController->creerCarte();
            break;

        // Cas ajouté pour la page de succès
        case 'success':
    require './../views/carte/success.php';
    break;

     case 'accueil':
        default:
            $accueilController->index(); 
            break;
    }
} else {
    $accueilController = new HomeController();
    $accueilController->index();
}