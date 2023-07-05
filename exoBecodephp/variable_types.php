<?php

    $name = "Jordan";
    $age = 34;
    $coloreyes = "Brown";
    $familyname = array('Tata', 'Tonton', 'Toto');
    list($a, $b, $c) = $familyname;
    $hungry = false;

    echo "<p> Hi! My name is $name </p>";
    echo "<p> I am $age years old</p>";
    echo "<p> My eyes are $coloreyes</p>";
    echo "<p> First family $a</p>";
    if ($hungry)
        echo "<p>J'ai faim!</p>";
    else
        echo "<p>J'ai pas faim!</p>";

