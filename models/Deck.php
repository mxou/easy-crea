<?php
class Deck {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Créer une nouvelle deck
    public function creerDeck($titre, $nb_cartes, $date_debut, $date_fin) {
    $sql = "INSERT INTO deck (titre_deck, nb_cartes, date_debut_deck, date_fin_deck)
            VALUES (:titre, :nb_cartes, :date_debut_deck, :date_fin_deck)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([
        ':titre' => $titre,
        ':nb_cartes' => $nb_cartes,
        ':date_debut_deck' => $date_debut,  
        ':date_fin_deck' => $date_fin
    ]);
}


    

    // Récupérer une deck
    public function obtenirDeck($id) {
        $sql = "SELECT * FROM deck WHERE id_deck = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function obtenirTousLesDecks() {
        $sql = "SELECT * FROM deck";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(); 
}
}

?>