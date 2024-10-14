<?php
require_once '../config/config.local.php';
require_once '../controllers/CarteController.php';

// Routeur simple pour traiter les requêtes
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $carteController = new CarteController($db);

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

    case 'home':
    require './index.php';
    break;


        default:
            echo "Action non reconnue";
    }
} else {
    echo "Bienvenue sur EasyCrea";
    echo '<a href="?action=creer">Créer une carte</a> </br>'; 
}