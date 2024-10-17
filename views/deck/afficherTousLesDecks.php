<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des decks</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>

<body>
    <h1>Tous les decks disponibles</h1>

    <?php if (!empty($decks)): ?>
    <ul>
        <?php foreach ($decks as $deck): ?>
        <li>
            <p>Titre du deck : <?php echo htmlspecialchars($deck['titre_deck']); ?></p>
            <p>Nombre de cartes max : <?php echo htmlspecialchars($deck['nb_cartes']); ?></p>
            <p>Date de début du deck : <?php echo htmlspecialchars($deck['date_debut_deck']); ?></p>
            <p>Date de fin du deck : <?php echo htmlspecialchars($deck['date_fin_deck']); ?></p>
            <p>Nombre de j'aimes : <?php echo htmlspecialchars($deck['nb_jaime']); ?></p>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php else: ?>
    <p>Aucun deck n'est disponible pour le moment.</p>
    <?php endif; ?>

    <a class="accueil_a" href="index.php?action=accueil">Retour à l'accueil</a>
</body>

</html>