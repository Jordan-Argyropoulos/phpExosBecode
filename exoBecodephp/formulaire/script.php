<?php

function debug($text)
{
    ?><pre><?php print_r($text); ?></pre><?php
}


include("D:/wamp64/www/exoBecodephp/phpExosBecode/exoBecodephp/formulaire/connectorPDO.php");

$sql = "SELECT * FROM formulairephp";

    echo '<h3>Nous avons bien reçu votre formulaire avec les données suivantes : </h3>';
    echo '<p>NOM : ', $_GET['nom'], '<br /> PRENOM : ', $_GET['prenom'], '</p><br>';
    echo '<p>AGE :', $_GET['age'], '</p><br>';
    echo '<p>ARTISTE :', $_GET['artitse'], '</p><br>';
    echo '<p>DESCRIPTION :', $_GET['description'], '</p><br>';

?>