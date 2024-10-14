<!-- views/utilisateur/inscription.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <h1>Inscription</h1>
    <form action="" method="POST">
        <label for="nom_createur">Nom :</label>
        <input type="text" name="nom_createur" required>

        <label for="ad_mail_createur">Email :</label>
        <input type="email" name="ad_mail_createur" required>

        <label for="mdp_createur">Mot de passe :</label>
        <input type="password" name="mdp_createur" required>

        <label for="genre">Genre :</label>
        <select name="genre" required>
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
            <option value="autre">Autre</option>
        </select>

        <label for="ddn">Date de Naissance :</label>
        <input type="date" name="ddn" required>

        <button type="submit">S'inscrire</button>
    </form>
    <p>Déjà inscrit ? <a href="/easy-crea/public/index.php?action=connexion">Connectez-vous ici.</a></p>
</body>

</html>