<?php
/**
 * author eloge257
 * Dans cette fichier nous mettons les codes qui nous permet de connecte notre application avec la base de donnees
 * Date le 03/02/2024
 */
// try {
//     //code...
//     $bdd = new PDO("mysql:host=localhost;dbname=citoyen","root","");
// } catch ($message) {
//     echo $message
// }
$servername = "localhost"; // Adresse du serveur MySQL
$username = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL
$dbname = "gestioncitoyen"; // Nom de la base de données

    try {
        // Établir la connexion
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
        // Configurer le mode d'erreur PDO pour afficher les erreurs
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Effectuer des opérations sur la base de données...
        
        // Fermer la connexion
        $conn = null;
    } catch(PDOException $e) {
        echo "La connexion a échoué : " . $e->getMessage();
    }
?>