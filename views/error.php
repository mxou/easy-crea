<!-- views/errors/error.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <title>Erreur</title>
</head>

<body>
    <h1>Une erreur est survenue</h1>
    <p>Veuillez réessayer plus tard.</p>
    <p>Erreur : <?php echo htmlspecialchars($error); ?></p>
    <a class="accueil_a" href="index.php?action=accueil">Retour à l'accueil</a>

    <?php if (isset($errno) && isset($errstr) && isset($errfile) && isset($errline)): ?>
    <h2>Détails de l'erreur :</h2>
    <p><strong>Type d'erreur :</strong> <?php echo htmlspecialchars($errno); ?></p>
    <p><strong>Message :</strong> <?php echo htmlspecialchars($errstr); ?></p>
    <p><strong>Fichier :</strong> <?php echo htmlspecialchars($errfile); ?></p>
    <p><strong>Ligne :</strong> <?php echo htmlspecialchars($errline); ?></p>
    <?php elseif (isset($exception)): ?>
    <h2>Détails de l'exception :</h2>
    <p><strong>Message :</strong> <?php echo htmlspecialchars($exception->getMessage()); ?></p>
    <p><strong>Fichier :</strong> <?php echo htmlspecialchars($exception->getFile()); ?></p>
    <p><strong>Ligne :</strong> <?php echo htmlspecialchars($exception->getLine()); ?></p>
    <?php endif; ?>
</body>

</html>