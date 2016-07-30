<?php
if($_POST)
{
$con = mysql_connect('localhost', 'root', '')
or die("Error could not connect to the server: " . mysql_error());
echo "Connected to server.<br>\n";

$db= mysql_select_db('games')
or die("Error could not access the database: " . mysql_error());
echo "Accessed the database.<br>";

$name = $_POST['name'];
$address = $_POST['address'];
$edu = $_POST['edu_level'];
$atd= $_POST['attend_method'];

$sql = "INSERT INTO requests
(name, address, edu_level, attend_method)
VALUES
('$name', '$address', '$edu', '$atd')";

mysql_Query($sql) or die(mysql_error());
echo " Data submitted successfully";

$sql = mysql_query("SELECT * FROM requests");

if($sql) {
echo "<table border=1 cellspacing=0 width=100%>";
echo "<tr> <td>Name</td>
           <td>Address</td>
           <td>Edu Level</td>
           <td>Attend Method</td>
           <td>ID</td></tr>";

while($row = mysql_fetch_array($sql)) {
echo "<tr><td>" . $row['Name'] .
"</td><td>" . $row['Address'] .
"</td><td>" . $row['Edu_level'] .
"</td><td>" . $row['Attend_method'] .
"</td><td>" . $row['id'] .
"</td></tr>";
}
echo "</table>";
}
else{
die("cannot access database: " . mysql_error());
}
mysql_close($con);
}
else {
?>

<html>
<body>
<h4> Request Information</h4>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
Name: <input type="text" name="name" size=40><br>
Address: <input type="text" name="address" size=90><br>

<p>Highest education level completed?
<br><input type=radio name="edu_level" value="High School">High School
<br><input type=radio name="edu_level" value="College">College
<br><input type=radio name="edu_level" value="Graduate School">Graduate school

<p>How would you like to attend this class?
<select name="attend_method">
<option value="on_campus">On Campus
<option value="online">Online
</select>

<p><input type="submit" value="Submit">
</form>

</body>
</html>
<?php
}
?>