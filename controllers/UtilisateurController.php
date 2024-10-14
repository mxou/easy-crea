<?php
require_once './../models/Utilisateur.php';

class UtilisateurController {
    private $utilisateurModel;

    public function __construct($db) {
        $this->utilisateurModel = new Utilisateur($db);
    }

    // Inscription d'un nouvel utilisateur
    public function inscription() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données du formulaire
            $nom_createur = $_POST['nom_createur'];
            $ad_mail_createur = $_POST['ad_mail_createur'];
            $mdp_createur = $_POST['mdp_createur'];
            $genre = $_POST['genre'];
            $ddn = $_POST['ddn'];

            // Créer un nouvel utilisateur
            $this->utilisateurModel->creerUtilisateur($nom_createur, $ad_mail_createur, $mdp_createur, $genre, $ddn);

            // Rediriger vers la page de connexion après l'inscription
            header('Location: /easy-crea/public/index.php?action=connexion');
            exit();
        } else {
            require './../views/utilisateur/inscription.php'; // Affiche le formulaire d'inscription
        }
    }

    // Connexion d'un utilisateur
    public function connexion() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom_createur = $_POST['nom_createur'];
            $mdp_createur = $_POST['mdp_createur'];

            // Vérifier les informations de connexion
            $utilisateur = $this->utilisateurModel->verifierUtilisateur($nom_createur, $mdp_createur);
            if ($utilisateur) {
                // Stocker les informations de l'utilisateur dans la session
                $_SESSION['utilisateur'] = $utilisateur;
                header('Location: /easy-crea/public/index.php?action=accueil');
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