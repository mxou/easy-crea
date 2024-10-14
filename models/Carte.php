<?php
class Carte {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Créer une nouvelle carte
    public function creerCarte($texte, $choix1, $choix2, $date_soumission, $ordre) {
        $sql = "INSERT INTO carte (texte_carte, valeurs_choix1, valeurs_choix2, date_soumission, ordre_soumission)
                VALUES (:texte, :choix1, :choix2, :date_soumission, :ordre)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':texte' => $texte,
            ':choix1' => $choix1,
            ':choix2' => $choix2,
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
}
?>
