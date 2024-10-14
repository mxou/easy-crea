<!-- views/carte/formulaireCarte.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Carte</title>
    <link rel="stylesheet" href="style.css"> <!-- Lien vers ta feuille de style -->
</head>
<body>
    <h1>Créer une Nouvelle Carte</h1>
    <form action="" method="POST">
        <label for="texte">Texte de la carte (50 à 280 caractères) :</label><br>
        <textarea id="texte" name="texte" rows="4" cols="50" required></textarea><br>

        <label for="choix1">Valeur choix 1 :</label><br>
        <input type="number" id="choix1" name="choix1" required><br>

        <label for="choix2">Valeur choix 2 :</label><br>
        <input type="number" id="choix2" name="choix2" required><br>

        <label for="ordre">Ordre de soumission :</label><br>
        <input type="number" id="ordre" name="ordre" value="0" required><br>

        <input type="submit" value="Créer la carte">
    </form>
</body>
</html>
