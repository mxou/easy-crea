<?php
class Carte {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Créer une nouvelle carte
    public function creerCarte($id_deck, $texte, $choix1_population, $choix1_finances, $choix2_population, $choix2_finances, $id_createur) {
        $sql = "INSERT INTO carte (id_deck, texte_carte, choix1_population, choix1_finances, choix2_population, choix2_finances, id_createur, date_soumission)
                VALUES (:id_deck, :texte_carte, :choix1_population, :choix1_finances, :choix2_population, :choix2_finances, :id_createur, NOW())";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id_deck' => $id_deck,
            ':texte_carte' => $texte,
            ':choix1_population' => $choix1_population,
            ':choix1_finances' => $choix1_finances,
            ':choix2_population' => $choix2_population,
            ':choix2_finances' => $choix2_finances,
            ':id_createur' => $id_createur
        ]);
    }
    

    // Récupérer une carte
    public function obtenirCarte($id) {
        $sql = "SELECT * FROM carte WHERE id_carte = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // Récupérer toutes les cartes
    public function obtenirToutesLesCartes() {
        $sql = "SELECT * FROM carte";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(); // Récupère toutes les cartes sous forme de tableau
}

public function verifierCarteExistante($id_deck, $id_createur) {
    $sql = "SELECT COUNT(*) FROM carte WHERE id_deck = :id_deck AND id_createur = :id_createur";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([
        ':id_deck' => $id_deck,
        ':id_createur' => $id_createur
    ]);
    
    // Retourne true si l'utilisateur a déjà créé une carte dans ce deck, sinon false
    return $stmt->fetchColumn() > 0;
}

}

?>