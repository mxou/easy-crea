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
        require './../views/carte/afficherCarte.php';  // Appelle la vue pour afficher la carte
    }

    // Créer une nouvelle carte
   public function creerCarte() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $texte = $_POST['texte'];
        $choix1_population = $_POST['choix1_population'];
        $choix1_finances = $_POST['choix1_finances'];
        $choix2_population = $_POST['choix2_population'];
        $choix2_finances = $_POST['choix2_finances'];

        $date_soumission = date('Y-m-d H:i:s');
        $ordre = $_POST['ordre'];

               // Encodage des choix en JSON
        $choix1 = json_encode([
            'population' => $choix1_population,
            'finances' => $choix1_finances
        ]);

        $choix2 = json_encode([
            'population' => $choix2_population,
            'finances' => $choix2_finances
        ]);

        // Appelle la méthode pour créer une carte
        $this->carteModel->creerCarte(
            $texte, 
            $choix1_population, 
            $choix1_finances, 
            $choix2_population, 
            $choix2_finances, 
            $date_soumission, 
            $ordre
        );

        // Redirection corrigée
        header('Location: /easy-crea/public/index.php?action=success');
        exit();
    } else {
        require './../views/carte/formulaireCarte.php';
    }
}


}
?>