<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $child_name = $_POST["child_name"];
    $gender = $_POST["gender"];
    $teacher_name = $_POST["teacher_name"];
    $absence_reason = $_POST["absence_reason"];
    $date = date("l, \\t\\h\\e d F Y");

    $excuses = array(
        "Maladie" => array(
            "Je suis désolé, mais $child_name ne pourra pas assister aux cours aujourd'hui en raison d'une maladie.",
            "$child_name est souffrant et ne pourra pas se rendre à l'école aujourd'hui. Veuillez excuser son absence.",
            "En raison d'une maladie, $child_name ne sera pas présent à l'école aujourd'hui. Merci de votre compréhension.",
            "$child_name est malade et ne pourra pas assister aux cours. Nous espérons qu'il/elle se rétablira bientôt.",
            "Nous tenons à vous informer que $child_name est malade et ne pourra donc pas se rendre à l'école aujourd'hui."
        ),
        "Décès d'un proche" => array(
            "Je suis désolé d'apprendre que $child_name a subi une perte dans sa famille. Il/Elle ne pourra pas assister aux cours aujourd'hui.",
            "$child_name a perdu un proche et aura besoin de temps pour se remettre. Il/Elle ne sera pas présent(e) à l'école aujourd'hui.",
            "Nous avons reçu la triste nouvelle du décès d'un proche de $child_name. Nous vous prions de bien vouloir excuser son absence aujourd'hui.",
            "Malheureusement, $child_name est en deuil suite au décès d'un être cher. Il/Elle ne pourra pas se rendre à l'école aujourd'hui.",
            "En raison d'un décès dans la famille, $child_name ne sera pas en mesure d'assister aux cours aujourd'hui. Veuillez lui accorder une absence justifiée."
        ),
        "Activité extra-scolaire" => array(
            "Veuillez noter que $child_name participera à une activité extra-scolaire aujourd'hui et ne pourra donc pas être présent(e) aux cours.",
            "Nous tenons à vous informer que $child_name participera à une activité extra-scolaire importante aujourd'hui, ce qui justifie son absence.",
            "$child_name représentera notre école lors d'une activité extra-scolaire et ne pourra donc pas assister aux cours aujourd'hui.",
            "En raison d'une activité extra-scolaire prévue de longue date, $child_name ne sera pas présent(e) à l'école aujourd'hui. Merci de votre compréhension.",
            "Nous vous prions d'excuser l'absence de $child_name aujourd'hui, car il/elle est engagé(e) dans une activité extra-scolaire qui contribue à son développement personnel."
        ),
        "Autre" => array(
            "$child_name a reçu un vaccin contre la grippe la semaine dernière et a trop mal au bras pour écrire.",
            "$child_name était absent à l’école car nous avons dû franchir une rivière, donc nous avons fait le pont ! Merci de votre diligence.",
            "$child_name était absent ce jour parce qu’il n’était pas là.",
            "$child_name n’était pas à l’école mardi pour cause de soldes car il fallait qu’elle essaye ses vêtements. Comme je sais que vous me comprenez, je vous remercie et vous souhaite une bonne journée. PS : Et je ne regrette pas mes achats !",
            "$child_name a eu un trou noir, impossible de se souvenir du chemin de l'école..."
        )
    );

    $excuse = $excuses[$absence_reason][array_rand($excuses[$absence_reason])];
    echo "<h2>Excuse générée pour $child_name</h2>";
    echo "<p>Genre: $gender</p>";
    echo "<p>Professeur: $teacher_name</p>";
    echo "<p>Raison de l'absence: $absence_reason</p>";
    echo "<p>Date: $date</p>";
    echo "<p>Excuse: $excuse</p>";
}
?>
