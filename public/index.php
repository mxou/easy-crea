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
        default:
            echo "Action non reconnue";
    }
} else {
    echo "Bienvenue sur EasyCrea";
}
?>
