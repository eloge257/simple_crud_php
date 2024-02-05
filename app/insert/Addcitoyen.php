<?php
include("../../database/database.php");
$sql_query="SELECT * FROM pays ORDER BY name ASC";
$countries=$conn->query($sql_query);

$error_nom = isset($_GET['error_nom']) ? $_GET['error_nom'] : "";
$error_prenom = isset($_GET['error_prenom']) ? $_GET['error_prenom'] : "";




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../public/profile.png" type="image/png">
    <title>Simple CRUD with PHP</title>
</head>
<body>

    <div class="card">
        <div class="card-header">
            <h1>Add citoyen</h1>
        </div>
        <div class="card-contenu">
            <form action="../traitement/insert.php" method="POST">
              <div>
                  <label for="">Nom</label>
                 <input type="text" name="NOM" id="">
                 <span style="color:red;"><?= $error_nom ?></span>
              </div>
              <div>
                  <label for="">Prenom</label>
                 <input type="text" name="PRENOM" id="">
                 <span style="color:red"><?= $error_prenom ?></span>
              </div>
              <div>
                  <label for="">Adresse</label>
                 <input type="text" name="ADRESSE" id="">
              </div>
              <div>
                  <label for="">Genre</label>
                  <select name="GENRE" >
                      <option>--genre--</option>
                      <option value="1">Masculin</option>
                      <option value="2">Feminim</option>
                  </select>
              </div>
              <div>
                  <label for="">Nationalite</label>
                  <select name="NATIONALITE" id="">
                     <option>--Nationalite</option>
                     <?php  foreach($countries as $country) { ?>
                        <option value="<?= $country['id']?>"><?= $country['name'] ?></option>
                    <?php } ?>
                  </select>
              </div>
              <div>
                <label for="">Telephone</label>
                <input type="text" name="TELEPHONE">
              </div>
              <div>
                <button name="envoyer">Envoyer</button>
              </div>
            </form>
        </div>
    </div>

    
</body>
</html>