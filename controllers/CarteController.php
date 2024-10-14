<?php
require_once './../models/Carte.php';

class CarteController {
    private $carteModel;

    public function __construct($db) {
        $this->carteModel = new Carte($db);
    }

    // Afficher une carte
    public function afficherCarte($id) {
        $carte = $this->carteModel->obtenirCarte($id);
        require 'views/carte/afficherCarte.php';  // Appelle la vue pour afficher la carte
    }

    // Créer une nouvelle carte
    public function creerCarte() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $texte = $_POST['texte'];
            $choix1 = $_POST['choix1'];
            $choix2 = $_POST['choix2'];
            $date_soumission = date('Y-m-d');
            $ordre = $_POST['ordre'];

            $this->carteModel->creerCarte($texte, $choix1, $choix2, $date_soumission, $ordre);
            header('Location: /carte/success');
        } else {
            require 'views/carte/formulaireCarte.php';  // Appelle la vue du formulaire de création
        }
    }
}
?>
