<?php
/*
  Fichier : src/config/config.prod.php
*/

/**
 * le DSN de la base
 */
define('APP_DB_DSN', 'mysql:host=mysql-mdelorme.alwaysdata.net;dbname=mdelorme_sae_db;charset=UTF8');

/**
 * le nom de l'utilisateur MYSQL
 */
define('APP_DB_USER', 'mdelorme');

/**
 * le mot de passe de l'utilisateur MYSQL
 */
define('APP_DB_PASSWORD', '!E]NWB#.0:d*$gq');

/**
 * le préfixe des tables dans la base (utile pour les bases partagées)
 */
define('APP_TABLE_PREFIX', '');

// Établir la connexion à la base de données
try {
    $db = new PDO(APP_DB_DSN, APP_DB_USER, APP_DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la BDD" , '<br>';
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
    echo "singe" , '<br>';
}
?>