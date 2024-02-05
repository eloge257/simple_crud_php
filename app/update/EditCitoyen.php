<?php
include("../../database/database.php");
$sql_query="SELECT * FROM pays ORDER BY name ASC";
$countries=$conn->query($sql_query);


// requete pour remplir la form
if (isset($_GET['id'])) {
    $idcitoyen=$_GET['id'];
    $get_row=$conn->prepare("SELECT * FROM citoyen where idcitoyen=?");
    $get_row->execute([$idcitoyen]);
    $row= $get_row->fetch();
    $idcitoyen=$row['idcitoyen'];
    $nom= $row['nom'];
    $prenom= $row['prenom'];
    $adresse= $row['adresse'];
    $genre= $row['genre'];
    $nationalite=$row['nationalite'];
    $telephone=$row['telephone'];

}


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
            <form action="../traitement/update.php" method="POST">
                <input type="hidden" value="<?= $idcitoyen ?>" name="idcitoyen">
              <div class="form-row">
                  <label for="">Nom</label>
                 <input type="text" name="NOM" value="<?= $nom ?>" id="">
              </div>
              <div class="form-row">
                  <label for="">Prenom</label>
                 <input type="text" name="PRENOM" value="<?= $prenom ?>" id="">
              </div>
              <div class="form-row">
                  <label for="">Adresse</label>
                 <input type="text" name="ADRESSE" value="<?= $adresse ?>" id="">
              </div>
              <div class="form-row">
                  <label for="">Genre</label>
                  <select name="GENRE" >
                      <option>--genre--</option>
                      <option value="1" <?php if ($genre==1) { echo "selected";   }  ?>>Masculin</option>
                      <option value="2" <?php if ($genre==2) { echo "selected";   }  ?>>Feminim</option>
                  </select>
              </div>
              <div class="form-row">
                  <label for="">Nationalite</label>
                  <select name="NATIONALITE" id="">
                     <option>--Nationalite</option>
                     <?php  foreach($countries as $country) { 
                        if ($country['id'] == $nationalite) {
                        ?>
                        <option value="<?= $country['id']?>" selected><?= $country['name'] ?></option>
                    <?php } else {  ?>
                        <option value="<?= $country['id']?>"><?= $country['name'] ?></option>

                    <?php } }?>
                  </select>
              </div>
              <div class="form-row">
                <label for="">Telephone</label>
                <input type="text" name="TELEPHONE" value="<?= $telephone ?>"> 
              </div>
              <div class="form-button">
                <button name="update">Modifier</button>
                <a href="../liste/ListeCitoyen.php">Retour</a>

              </div>
            </form>
        </div>
    </div>

    
</body>
</html>