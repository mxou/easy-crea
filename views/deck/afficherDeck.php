<!DOCTYPE html>
<html>

<head>
    <title>Deck</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
    <h1>Deck sélectionnée</h1>

    <!-- Affiche le texte de la deck -->
    <p><?php echo htmlspecialchars($deck['titre_deck']); ?></p>


    <h2>Caractéristiques :</h2>
    <p>Nombre de cartes max : <?php echo htmlspecialchars($deck['nb_cartes']); ?></p>
    <p>Date de début du deck : <?php echo htmlspecialchars($deck['date_debut_deck']); ?></p>
    <p>Date de fin du deck : <?php echo htmlspecialchars($deck['date_fin_deck']); ?></p>
    <p>Nombre de j'aimes : <?php echo htmlspecialchars($deck['nb_jaime']); ?></p>


    <a href="index.php?action=accueil">Revenir a l'accueil</a>

</body>

</html>