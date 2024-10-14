<!DOCTYPE html>
<html>
<head>
    <title>Carte</title>
</head>
<body>
    <h1>Carte sélectionnée</h1>
    <p><?php echo htmlspecialchars($carte['texte_carte']); ?></p>
    <p>Choix 1 : <?php echo $carte['valeurs_choix1']; ?></p>
    <p>Choix 2 : <?php echo $carte['valeurs_choix2']; ?></p>
</body>
</html>
