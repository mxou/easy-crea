<!-- views/carte/formulaireCarte.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un deck</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>

<body>
    <h1>Créer un nouveau deck</h1>
    <form id="deck_form" method="POST" action="/easy-crea/public/index.php?action=creerDeck">
        <label for="texte">Titre du deck</label>
        <input type="text" id="texte" name="titre" required></input> <br> <br>

        <label for="nb_cartes">Nombre de cartes</label>
        <input type="number" id="nb_cartes" name="nb_cartes" required> <br> <br>

        <label for="date_debut">Date de début</label>
        <input type="date" id="date_debut" name="date_debut" required> <br> <br>

        <label for="date_fin">Date de fin</label>
        <input type="date" id="date_fin" name="date_fin" required> <br> <br>

        <!-- <label for="nb_jaime">Nombre j'aimes</label>
        <input type="number" id="nb_jaime" name="nb_jaime" required> <br> <br> -->

        <button type="submit">Créer le deck</button>
    </form>
    <a href="./index.php?action=admin">Retour dashboard</a>

</body>

</html>