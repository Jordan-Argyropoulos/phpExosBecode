<?php

    function debug($text)
    {
        ?><pre><?php print_r($text); ?></pre><?php
    }

    $countryOptions = [
        "1" => "Russia",
        "2" => "Germany",
        "3" => "France",
        "4" => "Armenia",
        "5" => "USA"
    ];

    // Sanitize the input data
    $bdate = htmlspecialchars($_POST['bdate']);
    $event = htmlspecialchars($_POST['event']);
    $artist = htmlspecialchars($_POST['artist']);
    $description = htmlspecialchars($_POST['description']);
    $promo = htmlspecialchars($_POST['promo']);
    $venue_name = htmlspecialchars($_POST['venue_name']);
    $venue_address_1 = htmlspecialchars($_POST['venue_address_1']);
    $venue_address_2 = htmlspecialchars($_POST['venue_address_2']);
    $city = htmlspecialchars($_POST['city']);
    $region = htmlspecialchars($_POST['region']);
    $postal = htmlspecialchars($_POST['postal']);
    $country = htmlspecialchars($_POST['country']);
    $capacity = htmlspecialchars($_POST['capacity']);
    $attendance = htmlspecialchars($_POST['attendance']);
    $performance = htmlspecialchars($_POST['performance']);
    $time = htmlspecialchars($_POST['time']);
    $contact_firstname = htmlspecialchars($_POST['contact_firstname']);
    $contact_lastname = htmlspecialchars($_POST['contact_lastname']);
    $email = htmlspecialchars($_POST['email']);
    $number = htmlspecialchars($_POST['number']);
    $recorded = htmlspecialchars($_POST['recorded']);


    $countryText = isset($countryOptions[$country]) ? $countryOptions[$country] : "";

    // Validate the input data
    $bdate_obj = DateTime::createFromFormat('Y-m-d', $bdate);
    if (!$bdate_obj) {
        die('The date of event is not valid.');
    }
    
    $event_obj = DateTime::createFromFormat('H:i', $event);
    if (!$event_obj) {
        die('The time of event is not valid.');
    }

    if (!is_numeric($artist)) {
        die('The artist must be a number.');
    }

    if (strlen($description) > 1000) {
        die('The description must be less than 1000 characters.');
    }

    if (strlen($promo) > 255) {
        die('The promoter\'s name must be less than 255 characters.');
    }

    if (strlen($venue_name) > 255) {
        die('The venue name must be less than 255 characters.');
    }

    if (!is_numeric($capacity)) {
        die('The venue capacity must be a number.');
    }

    if (!is_numeric($attendance)) {
        die('The expected attendance must be a number.');
    }

    if (!is_numeric($time)) {
        die('The set time must be a number.');
    }

    if (strlen($contact_firstname) > 255) {
        die('The contact first name must be less than 255 characters.');
    }

    if (strlen($contact_lastname) > 255) {
        die('The contact last name must be less than 255 characters.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('The email address is not valid.');
    }

    if (!is_numeric($number)) {
        die('The contact number must be a number.');
    }
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


    // Affichage des données saisies
    echo "<h1>Formulaire envoyé !</h1>";
    echo "<h2>Données saisies :</h2>";
    echo "<p>Date de l'événement : $bdate</p>";
    echo "<p>Heure de l'événement : $event</p>";
    echo "<p>Artiste sélectionné : $artist</p>";
    echo "<p>Description de l'événement : $description</p>";
    echo "<p>Nom du promoteur : $promo</p>";
    echo "<p>Nom de la salle : $venue_name</p>";
    echo "<p>Adresse de la salle : $venue_address_1, $venue_address_2, $city, $region, $postal, $countryText</p>";
    echo "<p>Nombre attendu de participants : $attendance</p>";
    echo "<p>Type de performance : $performance</p>";
    echo "<p>Temps de jeu (en minutes) : $time</p>";
    echo "<p>Nom du contact : $contact_firstname $contact_lastname</p>";
    echo "<p>Email du contact : $email</p>";
    echo "<p>Numéro de contact : $number</p>";
    echo "<p>Enregistrement de l'événement : $recorded</p>";
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "Le fichier est une image - " . $check["mime"] . ".";
            print '<br><img src="$target_file" />';
            $uploadOk = 1;
        } else {
            echo "Le fichier envoyé n'est pas une image !";
            $uploadOk = 0;
    }
}