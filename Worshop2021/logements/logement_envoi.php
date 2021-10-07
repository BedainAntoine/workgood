<?php

require('../config.php');

try{
    $bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'bitnami', 'mdpdebian');
}catch (Exception $e){
    echo "Not OK";
}


if(isset($_POST["submit"])){

    $nom = htmlspecialchars(trim($_POST['nom']));
    $complAdresse = htmlspecialchars(trim($_POST['complAdresse']));
    $adresseLogement = htmlspecialchars(trim($_POST['adresseLogement']));
    $typeLogement = htmlspecialchars(trim($_POST['typeLogement']));
    $loyer = htmlspecialchars(trim($_POST['loyer']));
    $ville = htmlspecialchars(trim($_POST['ville']));
 

    if($nom && $adresseLogement && $typeLogement && $loyer && $ville){

        $query = "INSERT INTO logement (nom, complAdresse, adresseLogement, typeLogement, loyer, ville) VALUES ('$nom', '$complAdresse', '$adresseLogement', '$typeLogement', '$loyer', '$ville')";
        
        $bdd->exec($query);
    
        if($bdd->connect_error)){
            echo "Message Erreur", $bdd->error_reporting;
            
        }
    
       }else echo "C'est non";
    }
 
?>