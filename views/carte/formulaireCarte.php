<!-- views/carte/formulaireCarte.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Carte</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>

<body>
    <h1>Créer une Nouvelle Carte</h1>
    <form id="carte_form" method="POST" action="index.php?action=creerCarte&id_deck=<?php echo $id_deck; ?>">
        <label for="texte">Texte de la carte :</label>
        <textarea id="texte" name="texte" required></textarea>

        <label for="choix1_population">Choix 1 - Population :</label>
        <input type="number" id="choix1_population" name="choix1_population" required>

        <label for="choix1_finances">Choix 1 - Finances :</label>
        <input type="number" id="choix1_finances" name="choix1_finances" required>

        <label for="choix2_population">Choix 2 - Population :</label>
        <input type="number" id="choix2_population" name="choix2_population" required>

        <label for="choix2_finances">Choix 2 - Finances :</label>
        <input type="number" id="choix2_finances" name="choix2_finances" required>

        <button type="submit">Créer la carte</button>
    </form>

    <a href="./index.php?action=accueil">Retour a l'accueil</a>

</body>

</html>