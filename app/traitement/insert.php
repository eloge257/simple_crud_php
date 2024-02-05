<?php
  include("../../database/database.php");
  if (isset($_POST['envoyer'])) {
    $nom = $_POST['NOM'];
    $prenom =$_POST['PRENOM'];
    $adresse=$_POST['ADRESSE'];
    $genre=$_POST['GENRE'];
    $nationalite=$_POST['NATIONALITE'];
    $telephone=$_POST['TELEPHONE'];
    $error_nom=null;
    $error_prenom=null;

//quand tu veux envoyer les donnes sur un autre page dans le url
    if (empty($nom)) {
        $error_nom="Champ obligatoire";

    }
    if (empty($prenom)) {
        $error_prenom="Champ obligatoire";
    } 
    if ($error_nom || $error_prenom) {
        $error_params = http_build_query(compact('error_nom', 'error_prenom'));
        header("location:../insert/Addcitoyen.php?$error_params");
        exit;
    }

    //quand tu veux envoyer les donnees sur un autre page via les sessions 
    
    // Les données sont valides, procéder à l'insertion dans la base de données
        $insert= $conn->prepare("INSERT INTO citoyen(nom,prenom,adresse,genre,nationalite,telephone) values(?,?,?,?,?,?)");
        $params=array($nom,$prenom,$adresse,$genre,$nationalite,$telephone);
        $insert->execute($params);
        header("location:../liste/ListeCitoyen.php");


  


  }

?>