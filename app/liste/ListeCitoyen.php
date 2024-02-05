<?php
        //include file
        include("../../database/database.php");

        $itemsPerPage = 5; // Nombre d'éléments à afficher par page
        $page = isset($_GET['page']) ? $_GET['page'] : 1; // Numéro de page actuel
        $start = ($page - 1) * $itemsPerPage; // Calculer le nombre d'éléments à sauter
                // Vérifier si une recherche a été soumise
        if (isset($_GET['search'])) {
            // Récupérer la valeur de l'input de recherche
            $search = $_GET['search'];

            // Effectuer une requête à la base de données pour récupérer les résultats correspondants à la recherche
            $sql_query = "SELECT * FROM citoyen LEFT JOIN pays ON pays.id = citoyen.nationalite WHERE nom LIKE '%$search%' OR prenom LIKE '%$search%' OR adresse LIKE '%$search%' OR telephone LIKE '%$search%' LIMIT $start, $itemsPerPage ";
            // Vous pouvez modifier la requête selon les champs de votre table et les critères de recherche souhaités

            // Exécuter la requête
            $citoyens = $conn->query($sql_query);
        } else {
            // Si aucune recherche n'est soumise, afficher tous les citoyens
            $sql_query = "SELECT * FROM citoyen LEFT JOIN pays ON pays.id = citoyen.nationalite LIMIT $start, $itemsPerPage";
            $citoyens = $conn->query($sql_query);
        }
        $sql_count = "SELECT COUNT(*) as total FROM citoyen";
        $count_result = $conn->query($sql_count);
        $totalItems = $count_result->fetch(PDO::FETCH_ASSOC)['total'];
        $totalPages = ceil($totalItems / $itemsPerPage); // Calculer le nombre total de pages

        // Afficher les liens vers les différentes pages
        $pagination ="<div class='pagination'>";
        for ($i = 1; $i <= $totalPages; $i++) {
            $pagination .="<a href='?page=$i'>$i</a>";
        }
        $pagination .="</div>";

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

        <h1>Liste des citoyens</h1>

        <div class="header-liste">
            <div class="search">
                <form method="GET" action="">
                    <input type="text" name="search" class="input-search">
                    <button type="submit" class="button-search">Recherche</button>
                </form>
            </div>

            <a href="../insert/Addcitoyen.php" class="btn-table">Nouveau</a>
        
        </div>
     
    <table class="my-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Genre</th>
                <th>Nationalité</th>
                <th>Téléphone </th>
                <th>Action</th>
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
                <td>
                    <a href="../traitement/delete.php?id=<?= $citoyen['idcitoyen'] ?>" class="btn-action">Supprimer</a>
                    <a href="../update/EditCitoyen.php?id=<?= $citoyen['idcitoyen'] ?>" class="btn-action">Modifier</a>
                </td>
              </tr>
            <?php  } ?>
        </tbody>
    </table>

    <div class="pagination">
        <?php
       // for ($i = 1; $i <= $totalPages; $i++) {
            // echo "<a href=>$i</a>";
             ?>
        <a href="<?//= $page=$i; ?>" class="item-pagination"><?//= $i ?></a>
        <?php   //  }  ?>
        <?= $pagination ?>
    </div>
</body>
</html>