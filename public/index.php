<?php
session_start();
require_once '../config/config.local.php';
require_once '../controllers/CarteController.php';
require_once '../controllers/AccueilController.php';
require_once '../controllers/UtilisateurController.php';
require_once '../controllers/DeckController.php';

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
    $accueilController = new AccueilController(); 
    $utilisateurController = new UtilisateurController($db);
    $deckController = new DeckController($db);

    switch ($action) {
        case 'afficherCarte':
            $id = $_GET['id'];
            $carteController->afficherCarte($id);
            break;

        case 'afficherToutesLesCartes':
            $carteController->afficherToutesLesCartes();
            break;


        case 'afficherDeck':
            $id = $_GET['id'];
            $deckController->afficherDeck($id);
            break;

        case 'afficherTousLesDecks':
            $deckController->afficherTousLesDecks();
            break;

        // Vérifie si l'action est "creerCarte" et récupère l'id_deck depuis les paramètres GET
        case 'creerCarte':
            if (isset($_GET['id_deck'])) {
                $id_deck = $_GET['id_deck'];  // Récupère l'ID du deck passé dans l'URL
                $carteController->creerCarte($id_deck);  // Passe l'ID du deck à la fonction
            } else {
        // Gérer le cas où l'ID du deck n'est pas fourni
                echo "Erreur : ID du deck manquant.";
            }
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
        
        case 'deconnexion':
            session_destroy();  // Détruit la session pour déconnecter l'utilisateur
            header('Location: /easy-crea/public/index.php?action=connexion');
            exit;

        case 'accueil':
            if (isset($_SESSION['utilisateur'])) { // Vérifie si l'utilisateur est connecté
                $accueilController->index(); 
            } else {
                header('Location: /easy-crea/public/index.php?action=connexion');
                exit;
            }
            break;
            
        case 'admin':
            if (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['role_createur'] === 'admin') {
                require './../views/admin/dashboard.php'; // Affiche la page d'admin
            } else {
                header('Location: /easy-crea/public/index.php?action=connexion');
                exit();
            }
            break;

        case 'creerDeck':
            if (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['role_createur'] === 'admin') {
                $deckController->creerDeck();
            } else {
                header('Location: /easy-crea/public/index.php?action=accueil');
                exit();
            }
            break;


        default:
            if (isset($_SESSION['utilisateur'])) {
                $accueilController->index();
            } else {
                header('Location: /easy-crea/public/index.php?action=connexion');
                exit;
            }
            break;
    }
} else {
   if (isset($_SESSION['utilisateur'])) {
        $accueilController = new AccueilController();
        $accueilController->index();
    } else {
        header('Location: /easy-crea/public/index.php?action=connexion');
        exit;
    }
}