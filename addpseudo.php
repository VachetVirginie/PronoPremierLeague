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
if(isset($_POST['pseudo']))      $nom=$_POST['pseudo'];
else      $nom="";



{
$sql = "INSERT INTO pronostics (column_pseudo)
VALUES ('$nom')";


if ($conn->query($sql) === TRUE) {
    echo "Pronostic enregistré $pseudo";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}

$conn->close();



 







 ?>
 