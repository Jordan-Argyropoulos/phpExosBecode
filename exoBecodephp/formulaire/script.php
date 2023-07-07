<?php

    echo '<h3>Nous avons bien reçu votre formulaire avec les données suivantes : </h3>';
    echo '<p>NOM : ', $_GET['nom'], '<br /> PRENOM : ', $_GET['pre'], '</p><br>';
    echo '<p>SEXE :', $_GET['sex'], '</p><br>';
    echo '<p>LANGUE :', $_GET['maternelle'], '</p><br>';
    foreach($_GET['loisirs'] as $key => $value){echo "VOS LOISIRS:" . $value . "<br>";};
    echo '<p>COMMENTAIRE :', $_GET['comm'], '</p><br>';

?>