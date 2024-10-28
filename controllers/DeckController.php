<?php
require_once './../models/Deck.php';

class DeckController {
    private $deckModel;

    public function __construct($db) {
        $this->deckModel = new Deck($db);
    }

    // Afficher une deck
    public function afficherDeck($id) {
        $deck = $this->deckModel->obtenirDeck($id);
        require './../views/deck/afficherDeck.php';  // Appelle la vue pour afficher la deck
    }

    public function afficherTousLesDecks() {
    $decks = $this->deckModel->obtenirDecksDisponibles();
    require './../views/deck/afficherTousLesDecks.php';  
}

    // Créer une nouvelle deck
   public function creerDeck() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titre = $_POST['titre'];
        $nb_cartes = $_POST['nb_cartes'];
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];


        // Appelle la méthode pour créer une deck
        $this->deckModel->creerDeck(
            $titre, 
            $nb_cartes, 
            $date_debut, 
            $date_fin
        );

        // Redirection corrigée
        header('Location: /easy-crea/public/index.php?action=success');
        exit();
    } else {
        require './../views/admin/formulaireDeck.php';
    }
}


}
?>