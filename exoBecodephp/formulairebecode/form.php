<?php

function debug($text)
{
    ?><pre><?php print_r($text); ?></pre><?php
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitization des champs
    $bdate = sanitizeInput($_POST["bdate"]);
    $event = sanitizeInput($_POST["event"]);
    $artist = sanitizeInput($_POST["artist"]);
    $description = sanitizeInput($_POST["description"]);
    $promo = sanitizeInput($_POST["promo"]);
    $venue_name = sanitizeInput($_POST["venue_name"]);
    $venue_address_1 = sanitizeInput($_POST["venue_address_1"]);
    $venue_address_2 = sanitizeInput($_POST["venue_address_2"]);
    $city = sanitizeInput($_POST["city"]);
    $region = sanitizeInput($_POST["region"]);
    $postal = sanitizeInput($_POST["postal"]);
    $country = sanitizeInput($_POST["country"]);
    $attendance = sanitizeInput($_POST["attendance"]);
    $performance = sanitizeInput($_POST["performance"]);
    $time = sanitizeInput($_POST["time"]);
    $contact_firstname = sanitizeInput($_POST["contact_firstname"]);
    $contact_lastname = sanitizeInput($_POST["contact_lastname"]);
    $email = sanitizeInput($_POST["email"]);
    $number = sanitizeInput($_POST["number"]);
    $recorded = sanitizeInput($_POST["recorded"]); }

    
    // Affichage des données saisies
    echo "<h2>Données saisies :</h2>";
    echo "<p>Date de l'événement : $bdate</p>";
    echo "<p>Heure de l'événement : $event</p>";
    echo "<p>Artiste sélectionné : $artist</p>";
    echo "<p>Description de l'événement : $description</p>";
    echo "<p>Nom du promoteur : $promo</p>";
    echo "<p>Nom de la salle : $venue_name</p>";
    echo "<p>Adresse de la salle : $venue_address_1, $venue_address_2, $city, $region, $postal, $country</p>";
    echo "<p>Nombre attendu de participants : $attendance</p>";
    echo "<p>Type de performance : $performance</p>";
    echo "<p>Temps de jeu (en minutes) : $time</p>";
    echo "<p>Nom du contact : $contact_firstname $contact_lastname</p>";
    echo "<p>Email du contact : $email</p>";
    echo "<p>Numéro de contact : $number</p>";
    echo "<p>Enregistrement de l'événement : $recorded</p>";

// Fonction pour sanitizé les données
function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
