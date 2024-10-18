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

public function obtenirDecksDisponibles() {
    $sql = "SELECT * FROM deck WHERE date_fin_deck > NOW()";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}


// Vérifier si le deck a encore de la place pour des cartes
public function verifierLimiteCartes($id_deck) {
    // Récupérer la limite du nombre de cartes pour ce deck
    $sql = "SELECT nb_cartes FROM deck WHERE id_deck = :id_deck";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':id_deck' => $id_deck]);
    $deck = $stmt->fetch();

    // Compter le nombre de cartes déjà créées dans ce deck
    $sql = "SELECT COUNT(*) as total_cartes FROM carte WHERE id_deck = :id_deck";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':id_deck' => $id_deck]);
    $result = $stmt->fetch();

    return $result['total_cartes'] < $deck['nb_cartes']; // Retourne vrai si la limite n'est pas atteinte
}

public function verifierDateFin($id_deck) {
    $sql = "SELECT date_fin_deck FROM deck WHERE id_deck = :id_deck";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':id_deck' => $id_deck]);
    $deck = $stmt->fetch();

    // Vérifier si la date actuelle est avant la date de fin du deck
    $date_actuelle = new DateTime();
    $date_fin_deck = new DateTime($deck['date_fin_deck']);
    
    return $date_actuelle < $date_fin_deck; // Retourne vrai si la date actuelle est avant la date de fin
}


}

?>