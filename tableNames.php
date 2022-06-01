<!--
dbType.php
Ryan Murai
CPSC3300-01
-->

<html>
<head> <title> Registering Pokemon Type </title>
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

$dbname = "bw_db32";

$db = mysql_select_db($dbname, $conn);
if (!$db) {
    print "Error - Could not select the Pokedex database ".$dbname;
    exit;
}

$tName = $_POST['tName'];

$query = "DESC $tName;";

// Testing (delete it when testing is done!!!)
print "<p>Query: ".$query."</p>";

// Execute the query
$result = mysql_query($query);
if (!$result) {
   print "Error - the query could not be executed";
   $error = mysql_error();
   print "<p>" . $error . "</p>";
   exit;
}

// Get the number of rows in the result
$num_rows = mysql_num_rows($result);
print "Number of rows = $num_rows <br />";

// Get the number of fields in the rows
$num_fields = mysql_num_fields($result);
print "Number of fields = $num_fields <br />";

// Get the first row
$row = mysql_fetch_array($result);

if ($row == 0) {
   print "<p> No results! </p>";
   exit;
}

// Display the results in a table
print "<table border = 'border'> <caption> <h2> Query Results for ".$tName." Type Pokemon </h2> </caption>";

print "<tr align = 'center'>";

// Produce the column labels
$keys = array_keys($row);
for ($index = 0; $index < $num_fields; $index++) 
    print "<th>" . $keys[2 * $index + 1] . "</th>";

print "</tr>";

// Output the values of the fields in the rows
for ($row_num = 0; $row_num < $num_rows; $row_num++) {

    print "<tr align = 'center'>";
    $values = array_values($row);
	
    for ($index = 0; $index < $num_fields; $index++){
        $value = htmlspecialchars($values[2 * $index + 1]);
        print "<td>" . $value . "</td> ";
    }

    print "</tr>";
    $row = mysql_fetch_array($result);
}

print "</table>";

mysql_close($conn);
?>
<p>
<a style ="color:#222224;"
    href = "http://css1.seattleu.edu/~murairyan/dbtest/db.html">
    Return to Main Page</a>
</p>
</div>
</body>
</html>
