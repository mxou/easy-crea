<!-- views/home/index.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - EasyCrea</title>
</head>

<body>
    <h1>Bienvenue sur EasyCrea</h1>
    <p>Bonjour <?php echo htmlspecialchars($_SESSION['utilisateur']['nom_createur']); ?> !</p>
    </p>
    <!-- <a class="accueil_a" href="index.php?action=creerCarte">Créer une carte</a> <br> -->
    <a class="accueil_a" href="/easy-crea/public/index.php?action=afficherToutesLesCartes">Afficher toutes les
        cartes</a><br>
    <a class="accueil_a" href="/easy-crea/public/index.php?action=afficherTousLesDecks">Afficher tous les
        decks</a><br>
    <a class="accueil_a" href="/easy-crea/public/index.php?action=deconnexion">Se déconnecter</a>



</body>

</html>