<?php
require_once './../models/Carte.php';

class CarteController {
    private $carteModel;
    private $deckModel;

    public function __construct($db) {
        // Initialiser les modèles Carte et Deck
        $this->carteModel = new Carte($db);
        $this->deckModel = new Deck($db);  // Initialisation du modèle Deck
    }

    // Afficher une carte
    public function afficherCarte($id) {
        $carte = $this->carteModel->obtenirCarte($id);
        require './../views/carte/afficherCarte.php';  
    }

    public function afficherToutesLesCartes() {
    $cartes = $this->carteModel->obtenirToutesLesCartes();
    require './../views/carte/afficherToutesLesCartes.php';  
}


    // Créer une nouvelle carte
 public function creerCarte($id_deck) {
    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['utilisateur'])) {
        header('Location: /easy-crea/public/index.php?action=connexion');
        exit();
    }

    // Récupérer l'ID de l'utilisateur depuis la session
    $id_createur = $_SESSION['utilisateur']['id_createur'];

    // Vérifier si l'utilisateur a déjà créé une carte dans ce deck avant d'afficher le formulaire
    if ($this->carteModel->verifierCarteExistante($id_deck, $id_createur)) {
        $error = "Vous avez déjà créé une carte dans ce deck.";
        require './../views/error.php';
        return;
    }

    // Si la requête est en POST, on traite le formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifier la limite de cartes pour le deck
        if (!$this->deckModel->verifierLimiteCartes($id_deck)) {
            $error = "Le nombre maximum de cartes pour ce deck est atteint.";
            require './../views/error.php';
            return;
        }

        // Récupérer les données du formulaire
        $texte = $_POST['texte'];
        $choix1_population = $_POST['choix1_population'];
        $choix1_finances = $_POST['choix1_finances'];
        $choix2_population = $_POST['choix2_population'];
        $choix2_finances = $_POST['choix2_finances'];
        $date_soumission = date('Y-m-d H:i:s');

        // Créer la carte
        $this->carteModel->creerCarte(
            $id_deck, $id_createur, $texte, $choix1_population,
            $choix1_finances, $choix2_population, $choix2_finances, $date_soumission
        );

        // Redirection après création
        header('Location: /easy-crea/public/index.php?action=afficherTousLesDecks');
        exit();
    } else {
        // Vérifier si une carte de référence est déjà stockée en session
        if (!isset($_SESSION['carte_reference'][$id_deck])) {
            // Sélectionner une carte aléatoire et stocker son ID en session
            $carteReference = $this->carteModel->obtenirCarteAleatoireDansDeck($id_deck);
            $_SESSION['carte_reference'][$id_deck] = $carteReference;
        } else {
            // Récupérer la carte de référence stockée en session
            $carteReference = $_SESSION['carte_reference'][$id_deck];
        }

        // Afficher le formulaire de création de carte avec la carte de référence stockée
        $this->afficherFormulaireCreationCarte($id_deck, $carteReference); // Passer la carte de référence au formulaire
    }
}




    
    

    // Vérifier si l'utilisateur a déjà créé une carte dans ce deck
    public function verifierCarteExistante($id_deck, $id_createur) {
        $sql = "SELECT COUNT(*) FROM carte WHERE id_deck = :id_deck AND id_createur = :id_createur";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id_deck' => $id_deck,
            ':id_createur' => $id_createur
        ]);
    
        return $stmt->fetchColumn() > 0; // Retourne vrai si une carte existe déjà pour ce deck par cet utilisateur
    }

    public function afficherFormulaireCreationCarte($id_deck, $carteReference = null) {
    if (!isset($_SESSION['utilisateur'])) {
        header('Location: /easy-crea/public/index.php?action=connexion');
        exit();
    }

    // Inclure la vue et passer l'ID du deck ainsi que la carte de référence
    require './../views/carte/formulaireCarte.php';
}





    

    


}
?>