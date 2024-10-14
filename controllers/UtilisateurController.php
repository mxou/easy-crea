<?php
require_once './../models/Utilisateur.php';

class UtilisateurController {
    private $utilisateurModel;

    public function __construct($db) {
        $this->utilisateurModel = new Utilisateur($db);
    }

    // Gérer l'inscription
    public function inscription() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Appelle la méthode pour créer un utilisateur
            $this->utilisateurModel->creerUtilisateur($username, $password);
            header('Location: /easy-crea/public/index.php?action=success');
            exit();
        } else {
            require './../views/utilisateur/inscription.php'; // Affiche le formulaire d'inscription
        }
    }

    // Gérer la connexion
    public function connexion() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Vérifie les informations de l'utilisateur
            if ($this->utilisateurModel->verifierUtilisateur($username, $password)) {
                // Gérer la session de l'utilisateur ici
                session_start();
                $_SESSION['utilisateur'] = $username; // Stocke le nom d'utilisateur dans la session
                header('Location: /easy-crea/public/index.php?action=success');
                exit();
            } else {
                $error = "Nom d'utilisateur ou mot de passe incorrect.";
                require './../views/utilisateur/connexion.php'; // Affiche le formulaire de connexion avec un message d'erreur
            }
        } else {
            require './../views/utilisateur/connexion.php'; // Affiche le formulaire de connexion
        }
    }
}
?>