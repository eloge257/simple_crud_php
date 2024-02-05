<?php
  include("../../database/database.php");
  if (isset($_POST['envoyer'])) {
    $nom = $_POST['NOM'];
    $prenom =$_POST['PRENOM'];
    $adresse=$_POST['ADRESSE'];
    $genre=$_POST['GENRE'];
    $nationalite=$_POST['NATIONALITE'];
    $telephone=$_POST['TELEPHONE'];

    $insert= $conn->prepare("INSERT INTO citoyen(nom,prenom,adresse,genre,nationalite,telephone) values(?,?,?,?,?,?)");
    $params=array($nom,$prenom,$adresse,$genre,$nationalite,$telephone);
    $insert->execute($params);
    header("location:../liste/ListeCitoyen.php");


  }

?>