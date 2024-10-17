<?php
class Carte {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Créer une nouvelle carte
    public function creerCarte($texte, $choix1_population, $choix1_finances, $choix2_population, $choix2_finances, $date_soumission, $ordre) {
        $sql = "INSERT INTO carte (texte_carte, choix1_population, choix1_finances, choix2_population, choix2_finances, date_soumission, ordre_soumission)
                VALUES (:texte, :choix1_population, :choix1_finances, :choix2_population, :choix2_finances, :date_soumission, :ordre)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':texte' => $texte,
            ':choix1_population' => $choix1_population,
            ':choix1_finances' => $choix1_finances,
            ':choix2_population' => $choix2_population,
            ':choix2_finances' => $choix2_finances,
            ':date_soumission' => $date_soumission,
            ':ordre' => $ordre
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

}

?>