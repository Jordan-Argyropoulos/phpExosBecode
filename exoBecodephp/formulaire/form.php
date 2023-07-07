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

    <form method="post" action="script.php">
        <fieldset>
            <legend class="w-auto px-2">FORMULAIRE</legend>

            <fieldset class="form-group border p-3">
                    <div class="form-group">
                        <label>NOM:</label>
                        <input class="form-control" name="nom" id="nom" type="text" size="45" maxlength="60" />
                    </div>
                    <div class="form-group">
                        <label>PRENOM:</label>
                        <input class="form-control" name="pre" id="pre" type="text" size="15" maxlength="25" />
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
                        <input class="form-check-input" name="loisirs[]" id="loisir1" type="checkbox" value="SPORT" />
                        <label>BASQUIAT </label>
                        <input class="form-check-input" name="loisirs[]" id="loisir2" type="checkbox" value="LECTURE" />
                        <label>AUCUN </label>
                        <input class="form-check-input" name="loisirs[]" id="loisir6" type="checkbox" value="AUCUN" />
                    </p>
                    <p>
                        <label>DIS-M'EN PLUS SUR TOI :</label>
                        <textarea name="comm" id="comm" rows="10" cols="50" placeholder="Votre texte ici"></textarea>
                    </p>
                </fieldset>
                <fieldset>
                    <input type="reset" value="Annuler formulaire" />
                    <input type="submit" value="Envoi du formulaire" />
                </fieldset>
            </fieldset>
    </form>
</body>

</html>