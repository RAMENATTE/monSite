<?php 

$bdd = new PDO('mysql:host=localhost;dbname=monSite;charset=utf8', 'root', '');
// en mode développement pour afficher les erreurs
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

?>