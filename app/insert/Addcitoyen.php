<?php
include("../../database/database.php");
$sql_query="SELECT * FROM pays ORDER BY name ASC";
$countries=$conn->query($sql_query);

//on recupere les messages comme ca quand nous avons envoyer les messages dans le url
// $error_nom = isset($_GET['error_nom']) ? $_GET['error_nom'] : "";
// $error_prenom = isset($_GET['error_prenom']) ? $_GET['error_prenom'] : "";

//quand on utilise les sessions on recupere les messages comme ca
$error_nom = isset($_SESSION['error_nom']) ? $_SESSION['error_nom'] : "";
$error_prenom = isset($_SESSION['error_prenom']) ? $_SESSION['error_prenom'] : "";
$error_phone = isset($_SESSION['error_phone']) ? $_SESSION['error_phone'] : "";


// Effacer les erreurs de la session
unset($_SESSION['error_nom']);
unset($_SESSION['error_prenom']);
unset($_SESSION['error_phone']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../public/profile.png" type="image/png">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Simple CRUD with PHP</title>
</head>
<body>

    <div class="panel">
        <div class="card-header">
            <h1>Add citoyen</h1>

        </div>
        <div class="card-contenu">
            <form action="../traitement/insert.php" method="POST">
              <div class="form-row">
                  <label for="">Nom</label>
                 <input type="text" name="NOM" id=""><br>
                 <span  class="form-error"><?= $error_nom ?></span>
              </div>
              <div class="form-row">
                  <label for="">Prenom</label>
                 <input type="text" name="PRENOM" id=""><br>
                 <span  class="form-error"><?= $error_prenom ?></span>
              </div>
              <div class="form-row">
                  <label for="">Adresse</label>
                 <input type="text" name="ADRESSE" id="">
              </div>
              <div class="form-row">
                  <label for="">Genre</label>
                  <select name="GENRE" >
                      <option>--genre--</option>
                      <option value="1">Masculin</option>
                      <option value="2">Feminim</option>
                  </select>
              </div>
              <div class="form-row">
                  <label for="">Nationalite</label>
                  <select name="NATIONALITE" id="">
                     <option>--Nationalite</option>
                     <?php  foreach($countries as $country) { ?>
                        <option value="<?= $country['id']?>"><?= $country['name'] ?></option>
                    <?php } ?>
                  </select>
              </div>
              <div class="form-row">
                <label for="">Telephone</label>
                <input type="text" name="TELEPHONE"> <br>
                <span  class="form-error"><?= $error_phone ?></span>
              </div>
              <div class="form-button">
                <button name="envoyer">Envoyer</button>
                <a href="../liste/ListeCitoyen.php">Retour</a>
              </div>
            </form>
        </div>
    </div>

    
</body>
</html>