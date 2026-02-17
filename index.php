<?php
require_once 'classes/Ville.php';
$ville = new Ville();
$villes = $ville->getAllVilles();
var_dump($villes); // Doit afficher 10 villes
die();
?>