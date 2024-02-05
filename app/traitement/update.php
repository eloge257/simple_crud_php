<?php
  include("../../database/database.php");
  if (isset($_POST['update'])) {
    $idcitoyen = $_POST['idcitoyen'];
    $nom = $_POST['NOM'];
    $prenom =$_POST['PRENOM'];
    $adresse=$_POST['ADRESSE'];
    $genre=$_POST['GENRE'];
    $nationalite=$_POST['NATIONALITE'];
    $telephone=$_POST['TELEPHONE'];
    
    // Les données sont valides, procéder à l'insertion dans la base de données
        $update= $conn->prepare("UPDATE citoyen SET nom=?,prenom=?,adresse=?,genre=?,nationalite=?,telephone=? where idcitoyen=?");
        $params=array($nom,$prenom,$adresse,$genre,$nationalite,$telephone,$idcitoyen);
        $update->execute($params);
        header("location:../liste/ListeCitoyen.php");


  


  }

?>