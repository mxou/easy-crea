<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Cartes</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>

<body>
    <h1>Toutes les cartes disponibles</h1>

    <?php if (!empty($cartes)): ?>
    <ul>
        <?php foreach ($cartes as $carte): ?>
        <li class="card">
            <p><?php echo htmlspecialchars($carte['texte_carte']); ?></p>
            <p>Choix 1 - Population : <?php echo htmlspecialchars($carte['choix1_population']); ?></p>
            <p>Choix 1 - Finances : <?php echo htmlspecialchars($carte['choix1_finances']); ?></p>
            <p>Choix 2 - Population : <?php echo htmlspecialchars($carte['choix2_population']); ?></p>
            <p>Choix 2 - Finances : <?php echo htmlspecialchars($carte['choix2_finances']); ?></p>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php else: ?>
    <p>Aucune carte n'est disponible pour le moment.</p>
    <?php endif; ?>

    <a href="index.php?action=accueil">Retour à l'accueil</a>
</body>

</html>