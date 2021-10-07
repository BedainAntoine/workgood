<?php

require('../config.php');

try{
    $bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'bitnami', 'mdpdebian');
}catch (Exception $e){
    echo "Not OK";
}


if(isset($_POST["submit"])){

    $nom = htmlspecialchars(trim($_POST['nom']));
    $nomEtablissment = htmlspecialchars(trim($_POST['nomEtablissment']));
    $adresse = htmlspecialchars(trim($_POST['adresse']));
    $discpline = htmlspecialchars(trim($_POST['discpline']));
    $niveau = htmlspecialchars(trim($_POST['niveau']));
    $cout = htmlspecialchars(trim($_POST['cout']));
    $ville = htmlspecialchars(trim($_POST['ville']));
 

    if($nom && $nomEtablissment && $adresse && $discpline && $niveau && $cout && $ville){

        $query = "INSERT INTO formation (nom, nomEtablissement, adresse, discpline, niveau, cout, ville) VALUES ('$nom', '$nomEtablissement', '$adresse', '$discpline', '$niveau', '$cout', '$ville')";
        
        $bdd->exec($query);
    
        if($bdd->connect_error)){
            echo "Message Erreur", $bdd->error_reporting;
            
        }
    
       }else echo "C'est non";
    }
 
?>