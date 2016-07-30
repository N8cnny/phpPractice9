<?php
$con = mysql_connect('localhost', 'root', '')
or die("Error could not connect to the server: " . mysql_error());
echo "Connected to server.<br>\n";

$db= mysql_select_db('games')
or die("Error could not access the database: " . mysql_error());
echo "Accessed the database.<br>";

$sql= mysql_query("SELECT * FROM contacts ORDER BY LastName, FirstName");

if($sql) {
while ($row = mysql_fetch_object($sql)) {
$id= $row -> id;
$lastName = $row -> lastName;
$firstName = $row -> firstName;
echo("$id, $lastName, $firstName<br>");
}
}
else {
exit("Cannot access database: " . mysql_error());
}

echo"<hr size='1' width='100%'>";
$sql= mysql_query("SELECT * FROM contacts ORDER BY LastName, FirstName");
while ($row= mysql_fetch_array($sql)) {
echo $row['id'] . ", " . $row['firstName'] . ", " . $row['lastName'] . "<br>";
}

echo "<hr size=1 width='100%'>";
echo "<table border='1' cellspacing='0'>";
echo "<tr> <th>FirstName</th><th>LastName</th><th>Email</th><th>StudentID</th></tr>";
$sql= mysql_query("SELECT * FROM contacts ORDER BY LastName, FirstName");

while ($row = mysql_fetch_row($sql)) {
echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
}
echo"</table>";
mysql_close($con);
?>