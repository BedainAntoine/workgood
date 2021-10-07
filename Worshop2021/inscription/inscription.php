<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
<h1>Inscription<h1>
   
    <form method="post" action="">
        <p>Nom</p>
        <input type="text" name="nom">
        <p>Prenom</p>
        <input type="text" name="prenom">
        <p>Age</p>
        <input type="text" name="age">
        <p>Ville</p>
        <input type="text" name="ville">
        <p>Telephone</p>
        <input type="text" name="telephone">
        <p>adresseMail</p>
        <input type="email" name="adresseMail">
        <p>groupe</p>
        <input type="text" name="groupe">
        <p>Mot de passe</p>
        <input type="password" name="mdp">
        <p>Sexe</p>
        <input type="texte" name="sexe">

        <input type="submit" name="submit" value="Valider">
   
    </form>

<?php
    /* page: inscription.php */
//connexion à la base de données:
require('../config.php');

try{
    $bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'bitnami', 'mdpdebian');
}catch (Exception $e){
    echo "Not OK";
}


//traitement du formulaire:
    if (isset($_POST['submit']))
    {
    
   $nom = htmlspecialchars(trim($_POST['nom']));
   $prenom = htmlspecialchars(trim($_POST['prenom']));
   $age = htmlspecialchars(trim($_POST['age']));
   $ville = htmlspecialchars(trim($_POST['ville']));
   $telephone = htmlspecialchars(trim($_POST['telephone']));
   $adresseMail = htmlspecialchars(trim($_POST['adresseMail']));
   $groupe = htmlspecialchars(trim($_POST['groupe']));
   $mdp = htmlspecialchars(trim($_POST['mdp']));
   $sexe = htmlspecialchars(trim($_POST['sexe'])); 
   
   if($adresseMail && $mdp && $nom && $groupe && $ville && $prenom && $age && $telephone && $sexe){

    $query = "INSERT INTO utilisateur (nom, prenom, age, ville, telephone, adresseMail, groupe, mdp, sexe) VALUES ('$nom', '$prenom', '$age', '$ville', '$telephone', '$adresseMail', '$groupe', '".hash('sha256', $mdp)."', '$sexe')";
    
    $bdd->exec($query);

    if($bdd->connect_error)){
        echo "Message Erreur", $bdd->error_reporting;
        
    }

   }else echo "C'est non";
}
 ?>
</body>
</html>