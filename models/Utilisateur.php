<?php
class Utilisateur {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Créer un nouvel utilisateur
    public function creerUtilisateur($nom_createur, $ad_mail_createur, $mdp_createur, $genre, $ddn) {
        $hashedPassword = password_hash($mdp_createur, PASSWORD_DEFAULT); // Hash du mot de passe
        $sql = "INSERT INTO createur (nom_createur, ad_mail_createur, mdp_createur, genre, ddn) VALUES (:nom_createur, :ad_mail_createur, :password, :genre, :ddn)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nom_createur' => $nom_createur,
            ':ad_mail_createur' => $ad_mail_createur,
            ':password' => $hashedPassword,
            ':genre' => $genre,
            ':ddn' => $ddn
        ]);
    }

    // Vérifier les informations de connexion
    public function verifierUtilisateur($nom_createur, $mdp_createur) {
    $sql = "SELECT * FROM createur WHERE nom_createur = :nom_createur";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':nom_createur' => $nom_createur]);

    $utilisateur = $stmt->fetch();
    
    // Vérification du mot de passe
    if ($utilisateur && password_verify($mdp_createur, $utilisateur['mdp_createur'])) {
        return $utilisateur; // Retourne toutes les informations de l'utilisateur, y compris le rôle
    } else {
        return false; // Connexion échouée
    }
}


}
?>