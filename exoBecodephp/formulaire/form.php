<?php


function debug($text)
{
    ?><pre><?php print_r($text); ?></pre><?php
}


// Inclure le fichier connectorPDO.php
require_once 'connectorPDO.php';

// Variables pour stocker les valeurs du formulaire
$nom = $prenom = $age = $artiste = $descritpion = '';
// Vérifier si le formulaire a été soumis pour créer ou mettre à jour un enregistrement
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'create') {
            // Créer un nouvel enregistrement
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $age = $_POST['age'];
            $artiste = $_POST['artiste'];
            $descritpion = $_POST['descritpion'];

            try {
                $stmt = $pdo->prepare("INSERT INTO formulairephp (nom, prenom, age, artiste, descritpion) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$nom, $prenom, $age, $artiste, $descritpion]);
                echo "L'enregistrement a été créé avec succès.";
            } catch (PDOException $e) {
                echo "Erreur lors de la création de l'enregistrement : " . $e->getMessage();
            }
        } elseif ($_POST['action'] === 'update') {
            // Mettre à jour un enregistrement existant
            $idform = $_POST['idform'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $age = $_POST['age'];
            $artiste = $_POST['artiste'];
            $descritpion = $_POST['descritpion'];

            try {
                $stmt = $pdo->prepare("UPDATE formulairephp SET nom=?, prenom=?, age=?, artiste=?, descritpion=? WHERE idform=?");
                $stmt->execute([$nom, $prenom, $age, $artiste, $descritpion, $idform]);
                echo "L'enregistrement a été mis à jour avec succès.";
            } catch (PDOException $e) {
                echo "Erreur lors de la mise à jour de l'enregistrement : " . $e->getMessage();
            }
        }
    }
}

// Supprimer un enregistrement
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['idform'])) {
    $idform = $_GET['idform'];

    try {
        $stmt = $pdo->prepare("DELETE FROM formulairephp WHERE idform=?");
        $stmt->execute([$idform]);
        echo "L'enregistrement a été supprimé avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'enregistrement : " . $e->getMessage();
    }
}

// Récupérer tous les enregistrements de la base de données
try {
    $stmt = $pdo->query("SELECT * FROM formulairephp");
    $enregistrements = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des enregistrements : " . $e->getMessage();
}

?>

<!doctype html>
<html>

<head>
    <title>Formulaire</title>
        <!-- Compiled and minified CSS -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        
</head>

<body>

    <form method="post" action="">
        <input type="hidden" name="action" value="create">
        <fieldset>
            <legend class="w-auto px-2">FORMULAIRE</legend>

            <fieldset class="form-group border p-3">
                    <div class="form-group">
                        <label>NOM:</label>
                        <input class="form-control" name="nom" id="nom" type="text" size="45" maxlength="60" />
                    </div>
                    <div class="form-group">
                        <label>PRENOM:</label>
                        <input class="form-control" name="prenom" id="prenom" type="text" size="15" maxlength="25" />
                    </div>
                <p>
                        <label>QUEL EST TON AGE ?</label>
                        <input name="age" id="age" type="number" min="18" max="99" placeholder="min. 18 ans" />
                </p>
                <p>

                <fieldset>
                    <legend>QUI PREFERE TU ENTRE ANDY WARHOL ET BASQUIAT ?</legend> 
                    <p>
                        <label>ANDY WARHOL </label>
                        <input class="form-check-input" name="artiste" id="artiste" type="radio" value="ANDY WARHOL" />
                        <label>BASQUIAT </label>
                        <input class="form-check-input" name="artiste" id="artiste" type="radio" value="BASQUIAT" />
                        <label>AUCUN </label>
                        <input class="form-check-input" name="artiste" id="artiste" type="radio" value="AUCUN" />
                    </p>
                    <p>
                        <label>DIS-M'EN PLUS SUR TOI :</label>
                        <textarea name="descritpion" id="descritpion" rows="10" cols="50" placeholder="Votre texte ici"></textarea>
                    </p>
                </fieldset>
                <fieldset>
                    <input type="reset" value="Annuler formulaire" />
                    <input type="submit" value="Envoi du formulaire" />
                </fieldset>
            </fieldset>
    </form>
    <h2>Liste des enregistrements :</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Âge</th>
            <th>Artiste</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($enregistrements as $enregistrement) { ?>
            <tr>
                <td><?php echo $enregistrement['idform']; ?></td>
                <td><?php echo $enregistrement['nom']; ?></td>
                <td><?php echo $enregistrement['prenom']; ?></td>
                <td><?php echo $enregistrement['age']; ?></td>
                <td><?php echo $enregistrement['artiste']; ?></td>
                <td><?php echo $enregistrement['descritpion']; ?></td>
                <td>
                    <a href="edit.php?idform=<?php echo $enregistrement['idform']; ?>">Modifier</a>
                    <a href="?action=delete&idform=<?php echo $enregistrement['idform']; ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>