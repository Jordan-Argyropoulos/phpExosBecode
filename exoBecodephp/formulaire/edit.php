<?php
// Inclure le fichier connectorPDO.php
require_once 'connectorPDO.php';

// Vérifier si un ID d'enregistrement a été fourni
if (isset($_GET['idform'])) {
    $idform = $_GET['idform'];

    // Récupérer les données de l'enregistrement correspondant à l'ID
    try {
        $stmt = $pdo->prepare("SELECT * FROM formulairephp WHERE idform = ?");
        $stmt->execute([$idform]);
        $enregistrement = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'enregistrement existe
        if (!$enregistrement) {
            echo "Enregistrement non trouvé.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération de l'enregistrement : " . $e->getMessage();
        exit;
    }
} else {
    echo "ID d'enregistrement non spécifié.";
    exit;
}

// Variables pour stocker les valeurs de l'enregistrement
$nom = $enregistrement['nom'];
$prenom = $enregistrement['prenom'];
$age = $enregistrement['age'];
$artiste = $enregistrement['artiste'];
$descritpion = $enregistrement['descritpion'];

// Vérifier si le formulaire a été soumis pour mettre à jour l'enregistrement
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les nouvelles valeurs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $artiste = $_POST['artiste'];
    $descritpion = $_POST['descritpion'];

    // Mettre à jour l'enregistrement dans la base de données
    try {
        $stmt = $pdo->prepare("UPDATE formulairephp SET nom=?, prenom=?, age=?, artiste=?, descritpion=? WHERE idform=?");
        $stmt->execute([$nom, $prenom, $age, $artiste, $descritpion, $idform]);
        echo "L'enregistrement a été mis à jour avec succès.";
        header("Location: form.php");
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour de l'enregistrement : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un enregistrement</title>
</head>
<body>
    <h1>Modifier un enregistrement</h1>
    <form method="POST" action="">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?php echo $nom; ?>" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?php echo $prenom; ?>" required><br><br>

        <label for="age">Âge :</label>
        <input type="number" name="age" id="age" value="<?php echo $age; ?>" required><br><br>

        <label for="artiste">Artiste :</label><br>
        <input type="radio" name="artiste" value="ANDY WARHOL" <?php if ($artiste === 'ANDY WARHOL') echo 'checked'; ?> required> ANDY WARHOL<br>
        <input type="radio" name="artiste" value="BASQUIAT" <?php if ($artiste === 'BASQUIAT') echo 'checked'; ?> required> BASQUIAT<br>
        <input type="radio" name="artiste" value="AUCUN" <?php if ($artiste === 'AUCUN') echo 'checked'; ?> required> AUCUN<br><br>

        <label for="descritpion">Description :</label><br>
        <textarea name="descritpion" id="descritpion" required><?php echo $descritpion; ?></textarea><br><br>

        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>
