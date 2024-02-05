<?php

include("../../database/database.php");
/**
 * @$_GET['id'] : variable qui vient sur la liste
 */
if (isset($_GET['id'])) {
    $idcitoyen= $_GET['id'];
    $delete=$conn->prepare("DELETE from citoyen where idcitoyen=?");
    $delete->execute([$idcitoyen]);
    header("location:../liste/ListeCitoyen.php");

}



?>