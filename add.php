 <?php
$servername = "localhost";
$username = "admin";
$password = "simplon";
$dbname = "pronostics";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['nom']))      $nom=$_POST['nom'];
else      $nom="";

if(isset($_POST['pseudo']))      $pseudo=$_POST['pseudo'];
else      $pseudo="";

if(isset($_POST['date']))      $date=$_POST['date'];
else      $date="";

if(isset($_POST['equipe1']))      $equipe1=$_POST['equipe1'];
else      $equipe1="";

if(isset($_POST['equipe2']))      $equipe2=$_POST['equipe2'];
else      $equipe2="";

{
$sql = "INSERT INTO pronostics (prono,column_pseudo,date,equipe1,equipe2)
VALUES ('$nom','$pseudo','$date','$equipe1','$equipe2')";


if ($conn->query($sql) === TRUE) {
   
     echo "$pseudo à jouer $nom pour le match $equipe1 vs $equipe2";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}

$conn->close();



 







 ?>
 