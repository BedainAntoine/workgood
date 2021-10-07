<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'bitnami', 'mdpdebian');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$form = $bdd->query('SELECT * FROM logement');

while($logementDonnees = $form->fetch()){
    ?>
    <p>
    Lieu : <?php echo $logementDonnees['adresseLogement']; ?><br>
    <?php
    if(!$logementDonnees['complAdresse'] == ''){
        ?>
        Complément d'adresse : <?php echo $logementDonnees['complAdresse']; ?><br>
        <?php
    }
    ?>
    Cout du loyer : <?php echo $logementDonnees['loyer']; ?><br>
    Ville : <?php echo $logementDonnees['ville']; ?><br>
    Type Logement : <?php echo $logementDonnees['typeLogement']; ?><br>

    </p>
<?php
}
$form->closeCursor();
?>