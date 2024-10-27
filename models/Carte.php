<?php
class Carte {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Créer une nouvelle carte
    
    public function creerCarte($id_deck, $id_createur, $texte, $choix1_population, $choix1_finances, $choix2_population, $choix2_finances, $date_soumission) {
    $sql = "INSERT INTO carte (id_deck, id_createur, texte_carte, choix1_population, choix1_finances, choix2_population, choix2_finances, date_soumission)
            VALUES (:id_deck, :id_createur, :texte_carte, :choix1_population, :choix1_finances, :choix2_population, :choix2_finances, :date_soumission)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([
        ':id_deck' => $id_deck,
        ':id_createur' => $id_createur,
        ':texte_carte' => $texte,
        ':choix1_population' => $choix1_population,
        ':choix1_finances' => $choix1_finances,
        ':choix2_population' => $choix2_population,
        ':choix2_finances' => $choix2_finances,
        ':date_soumission' => $date_soumission
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

    return $stmt->fetchColumn() > 0;
}

public function obtenirCarteAleatoireDansDeck($id_deck) {
    $sql = "SELECT * FROM carte WHERE id_deck = :id_deck ORDER BY RAND() LIMIT 1";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':id_deck' => $id_deck]);
    return $stmt->fetch();
}



}

?>