<?php
require_once '../config/config.local.php';
require_once '../controllers/CarteController.php';
require_once '../controllers/AccueilController.php';
require_once '../controllers/UtilisateurController.php';

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
    $accueilController = new AccueilController(); // Corrigé ici : HomeController -> AccueilController
    $utilisateurController = new UtilisateurController($db);

    switch ($action) {
        case 'afficher':
            $id = $_GET['id'];
            $carteController->afficherCarte($id);
            break;

        case 'creer':
            $carteController->creerCarte();
            break;

        case 'success':
            require './../views/carte/success.php';
            break;

        case 'inscription':
            $utilisateurController->inscription();
            break;

        case 'connexion':
            $utilisateurController->connexion();
            break;

        case 'accueil':
            $accueilController->index();
            break;

        default:
            // Si l'action n'est pas reconnue, redirige vers la page d'accueil
            $accueilController->index(); 
            break;
    }
} else {
    // Redirection vers la page de connexion si aucune action n'est spécifiée
    header('Location: /easy-crea/public/index.php?action=connexion');
    exit(); // Assurez-vous d'utiliser exit après header pour éviter toute sortie supplémentaire
}