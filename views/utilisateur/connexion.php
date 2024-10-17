<!-- views/utilisateur/connexion.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <title>Connexion</title>
</head>

<body>
    <section id="section_login">
        <h1>Connexion</h1>
        <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
        <form action="/easy-crea/public/index.php?action=connexion" method="POST" id="form_login">
            <label for=" nom_createur">Nom</label>
            <input type="text" name="nom_createur" required>

            <label for=" mdp_createur">Mot de passe</label>
            <input type="password" name="mdp_createur" required>

            <button type="submit">Se connecter</button>
        </form>
        <p>Pas encore inscrit ? <a href="/easy-crea/public/index.php?action=inscription">Inscrivez-vous ici.</a></p>
    </section>
</body>

</html>