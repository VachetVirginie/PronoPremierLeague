<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=pronostics;charset=utf8', 'admin', 'simplon');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM pronostics');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
    //Appel de mon JSON
//$json_source = file_get_contents('premierleague.json');
 
 

 
// Décode le JSON
//$json_data = json_decode($json_source, TRUE);
 
 
// Affiche la valeur des attributs du JSON
//echo $json_data["rounds"][0]["name"];
?>

    <p>
    <strong>pronostics</strong> : <?php echo $donnees['column_pseudo']; ?><br />
    <?php echo $donnees['column_pseudo']; ?>
   a jouer  <?php echo $donnees['prono']; ?>,
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>


