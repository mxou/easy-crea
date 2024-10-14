<!-- views/utilisateur/connexion.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Connexion</title>
</head>

<body>
    <h1>Connexion</h1>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form action="" method="POST">
        <label for="nom_createur">Nom :</label>
        <input type="text" name="nom_createur" required>

        <label for="mdp_createur">Mot de passe :</label>
        <input type="password" name="mdp_createur" required>

        <button type="submit">Se connecter</button>
    </form>
    <p>Pas encore inscrit ? <a href="/easy-crea/public/index.php?action=inscription">Inscrivez-vous ici.</a></p>
</body>

</html>