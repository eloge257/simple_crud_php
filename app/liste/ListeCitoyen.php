<?php
        //include file
        include("../../database/database.php");

        $sql_query="SELECT * FROM citoyen";
        $citoyens=$conn->query($sql_query);

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

        <h1>Liste</h1>

        <a href="../insert/Addcitoyen.php">Add</a>
    
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Genre</th>
                <th>Nationalite</th>
                <th>Telephone</th>
            </tr>
        </thead>
        <tbody>
            <?php
              foreach ($citoyens as $citoyen) {      ?>
              <tr>
                <td><?=  $citoyen['nom'] ?></td>
                <td><?=  $citoyen['prenom'] ?></td>
                <td><?=  $citoyen['adresse'] ?></td>
                <td><?=  $citoyen['genre'] ?></td>
                <td><?=  $citoyen['nationalite'] ?></td>
                <td><?=  $citoyen['telephone'] ?></td>

              </tr>


            <?php  } ?>
        </tbody>
    </table>
</body>
</html>