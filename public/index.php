<?php
require_once '../config/config.local.php'; // Assurez-vous que ce chemin est correct
require_once '../controllers/CarteController.php';

// Routeur simple pour traiter les requêtes
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Vérifie que la connexion à la base de données est établie
    if (isset($db)) {
        $carteController = new CarteController($db);

        switch ($action) {
            case 'afficher':
                // Vérifie si l'ID est fourni dans l'URL
                if (isset($_GET['id'])) {
                    $id = intval($_GET['id']); // Assure-toi que l'ID est un entier
                    $carteController->afficherCarte($id);
                } else {
                    echo "Aucun ID de carte spécifié.";
                }
                break;

            case 'creer':
                $carteController->creerCarte();
                break;

            default:
                echo "Action non reconnue.";
        }
    } else {
        echo "Erreur de connexion à la base de données.";
    }
} else {
    // Afficher la page d'accueil
    echo "<h1>Bienvenue sur EasyCrea</h1>";
    echo '<a href="?action=creer">Créer une carte</a>'; // Lien vers le formulaire de création
}
?>
