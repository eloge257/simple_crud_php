<?php
        //include file
        include("../../database/database.php");

        $sql_query="SELECT * FROM citoyen LEFT JOIN pays on pays.id=citoyen.nationalite";
        $citoyens=$conn->query($sql_query);

        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../public/profile.png" type="image/png">
    <title>Simple CRUD with PHP</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

        <h1>Liste des citoyes</h1>

        <a href="../insert/Addcitoyen.php">Nouveau</a>
    
    <table class="my-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Genre</th>
                <th>Nationalité</th>
                <th>Téléphone </th>
            </tr>
        </thead>
        <tbody>
            <?php
              foreach ($citoyens as $citoyen) {      ?>
              <tr>
                <td><?=  $citoyen['nom'] ?></td>
                <td><?=  $citoyen['prenom'] ?></td>
                <td><?=  $citoyen['adresse'] ?></td>
                <td><?php echo $citoyen['genre']==1 ?  'Masculin'    :  'Feminim'; ?></td>
                <td><?=  $citoyen['name'] ?></td>
                <td><?=  $citoyen['telephone'] ?></td>
              </tr>
            <?php  } ?>
        </tbody>
    </table>
</body>
</html>