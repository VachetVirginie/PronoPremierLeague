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

{
$sql = "INSERT INTO pronostics (prono,column_pseudo)
VALUES ('$nom','$pseudo')";


if ($conn->query($sql) === TRUE) {
   
     echo "$pseudo à jouer $nom";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}

$conn->close();



 







 ?>
 