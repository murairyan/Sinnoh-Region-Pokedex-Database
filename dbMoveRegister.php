<!-- dbStats.php
    
-->
<html>
<head> <title> Registering </title>
<meta name = "viewport" content = "width=device-width, initial-scale=1">
<style>
body{
  font-family: 'Verdana', sans-serif;
}
.content {
  max-width: 500px;
  margin: auto;
  background: white;
  padding: 10px;
}
</style>
</head>
<body style = "background-color:#AD2128;">

<div class = "content">
  <p>
    <a style = "color:#222224;"
    href = "http://css1.seattleu.edu/~murairyan/dbtest/db.html">
    Return to Main Page </a>
  </p>
<?php

// Connect to MySQL
$servername = "cs100.seattleu.edu";
$username = "user32";
$password = "1234abcdF!";

print $servername;

$conn = mysql_connect($servername, $username, $password);

if (!$conn) {
     print "Error - Could not connect to MySQL";
     exit;
}

$dbname = "bw_db4";

$db = mysql_select_db($dbname, $conn);
if (!$db) {
    print "Error - Could not select the sailor database ".$dbname;
    exit;
}


$PokemonID = $_POST['PokemonID'];
$mName = $_POST['mName'];


// Clean up the given query (delete leading and trailing whitespace)
trim($PokemonID);
trim(mName);

// remove the extra slashes
$PokemonID = stripslashes($PokemonID);
$mName = stripslashes($mName);

$query = 'INSERT INTO CanLearn (PokemonID, mName) VALUES (' .$PokemonID. ', ' .$mName. ');';

print "<p> <b> The query is: </b> " . $query . "</p>";

$result = mysql_query($query);
if (!$result) {
    print "Error - the query could not be executed";
    $error = mysql_error();
    print "<p>" . $error . "</p>";
    exit;
}

print "<p> Insertion Complete! </p>";

mysql_close($conn);
?>

<p>
<a style ="color:#222224;"
    href="http://css1.seattleu.edu/~murairyan/dbtest/db.html">
    Return to Main Page</a>
</p>
</div>
</body>
</html>
