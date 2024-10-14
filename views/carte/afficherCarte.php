<!DOCTYPE html>
<html>

<head>
    <title>Carte</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
    <h1>Carte sélectionnée</h1>

    <!-- Affiche le texte de la carte -->
    <p><?php echo htmlspecialchars($carte['texte_carte']); ?></p>

    <!-- Affiche les informations du Choix 1 -->
    <h2>Choix 1 :</h2>
    <p>Population : <?php echo htmlspecialchars($carte['choix1_population']); ?></p>
    <p>Finances : <?php echo htmlspecialchars($carte['choix1_finances']); ?></p>

    <!-- Affiche les informations du Choix 2 -->
    <h2>Choix 2 :</h2>
    <p>Population : <?php echo htmlspecialchars($carte['choix2_population']); ?></p>
    <p>Finances : <?php echo htmlspecialchars($carte['choix2_finances']); ?></p>

    <a href="index.php?action=accueil">Revenir a l'accueil</a>

</body>

</html>