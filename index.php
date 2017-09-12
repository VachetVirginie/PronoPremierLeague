<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

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
   
     
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}

$conn->close();


?>

<header>
<img src="https://upload.wikimedia.org/wikipedia/fr/thumb/f/f2/Premier_League_Logo.svg/1200px-Premier_League_Logo.svg.png"/>
<br>
<p>

</p>
</header>

<body>
    <div id="match" style="text-align:center">

    </div>
    
</body>

<script>
    let div = document.querySelector('#match');


    let options2 = {
        url: 'premierleague.json',
        callback: function(reponse) {
            let objet = JSON.parse(reponse);

            for (let journée of objet.rounds) {
                let h2 = document.createElement('h2');
                let journee = '<h2 class="jumbotron text-center"> ' + journée.name + '</h2>';
                h2.innerHTML = journee;
                div.appendChild(h2);

                for (let match_journée of journée.matches) {



                    let p = document.createElement('p');
                    let match = '<p> ' + match_journée.team1.name + ' contre ' + match_journée.team2.name + ' <p>';
                    p.innerHTML = match;
                    div.appendChild(p);

                    let article = document.createElement('article');
                    let result = '<article> <form method="POST" action="add.php">'+ '<input type="hidden" name="equipe1" value="'+match_journée.team1.name+'"/>'+'<input type="hidden" name="equipe2" value="'+match_journée.team2.name+'"/>' +'<input type="hidden" name="date" value="'+match_journée.date+'"/>' +'<input type="text" name="nom" size="20" value="1/N/2" maxlength="35" >'  + '<input type="text" name="pseudo" size="20" value="pseudo" maxlength="35" >' + '<INPUT TYPE="submit" NAME="ok" > </form></article><br>';
                    //'<input type="hidden" name="equipe1" value="'+match_journée.team2.name+'"/>';
                    article.innerHTML = result;
                    div.appendChild(article);

                  //let pseudo = document.createElement('article');
                   // let resul = '<article> <form method="POST" action="addpseudo.php">' + "pseudo" + '<input type="text" name="pseudo" size="20" value="1/N/2" maxlength="35" >' + '<INPUT TYPE="submit" NAME="ok" > </form></article>';
                   // pseudo.innerHTML = resul;
                   // div.appendChild(pseudo);

                    let articl = document.createElement('article');
                    let resultat = '<article> <form method="POST" action="prono.php" >'  + '<INPUT TYPE="submit" NAME="ok"value="Vos paris" > </form></article>';
                    articl.innerHTML = resultat;
                    div.appendChild(articl);

                   
                    
                }
            }

        }
    }

    function doAjax(options) {

        let defaults = {
            url: '',
            method: 'GET',
            async: true,
            args: '',
            callback: function() {},
            callbackError: function() {}
        };

        assignArgs(options, defaults);

        let ajax = new XMLHttpRequest();

        ajax.onreadystatechange = function() {
            if (ajax.readyState === 4) {
                if (ajax.status === 200 || ajax.status === 304) {
                    defaults.callback(ajax.response);
                } else {
                    defaults.callbackError();
                }
            }
        }

        ajax.open(defaults.method, defaults.url, defaults.async);
        ajax.send(defaults.args);
    }

    function assignArgs(source, target) {
        for (let clef in source) {
            if (target.hasOwnProperty(clef)) {
                target[clef] = source[clef];
            }
        }

    };
    doAjax(options2);
</script>



</html>