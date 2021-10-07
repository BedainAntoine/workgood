<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');
session_start();

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'bitnami', 'mdpdebian');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['adresseMail'])){
  $adresseMail = stripslashes($_REQUEST['adresseMail']);
  $adresseMail = mysqli_real_escape_string($conn, $adresseMail);
  $mdp = stripslashes($_REQUEST['mdp']);
  $mdp = mysqli_real_escape_string($conn, $mdp);
    $query = "SELECT * FROM utilisateur WHERE adresseMail='$adresseMail' and mdp='".hash('sha256', $mdp)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['adresseMail'] = $adresseMail;
      header("Location: index.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<form action="" method="post" name="login">
<h1>Connexion</h1>
<input type="text" name="adresseMail" placeholder="Nom d'utilisateur">
<input type="password" name="mdp" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit">
<p>Vous êtes nouveau ici? <a href="../inscription/inscription.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>