<?php
class Utilisateur {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Créer un nouvel utilisateur
    public function creerUtilisateur($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash du mot de passe
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':username' => $username, ':password' => $hashedPassword]);
    }

    // Vérifier les informations de connexion
    public function verifierUtilisateur($username, $password) {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user; // Renvoie l'utilisateur en cas de succès
        }
        return false; // Échec de la vérification
    }
}
?>