<?php
include("../../database/database.php");
$sql_query="SELECT * FROM pays ORDER BY name ASC";
$countries=$conn->query($sql_query);



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
            <h1>Editer citoyen</h1>
        </div>
        <div class="card-contenu">
            <form action="../traitement/insert.php" method="POST">
              <div class="form-row">
                  <label for="">Nom</label>
                 <input type="text" name="NOM" id=""><br>
              </div>
              <div class="form-row">
                  <label for="">Prenom</label>
                 <input type="text" name="PRENOM" id=""><br>
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
              </div>
              <div class="form-button">
                <button name="envoyer">Modifier</button>
              </div>
            </form>
        </div>
    </div>

    
</body>
</html>