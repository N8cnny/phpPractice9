<?php

if($_POST) {

$uid=$_POST["uid"];
$psd=$_POST["psd"];

if (($uid=="anon") && ($psd=="incorrect")) {

$FirstName= $_POST["FirstName"];
$LastName= $_POST["LastName"];
$Email= $_POST["Email"];
$StudentID = $_POST["StudentID"];

$con= mysql_connect("localhost", "root", "");
if(mysql_select_db("games"))
{

$sql= "INSERT INTO contacts VALUES ('$FirstName', '$LastName', '$Email', '$StudentID')";
$query= mysql_query($sql);

if($query) {
echo " <p>Executed succesfully</p><hr size='2' width='100%'>";
}
else {
echo"<p>Exection failed" . mysql_error() . "</p>";
}

echo "<table border='1' cellspacing='0'>";
echo "<tr><th>FirstName</th><th>LastName</th><th>Email</th><th>StudentID</th></tr>";
$sql = mysql_query("SELECT * FROM contacts ORDER BY LastName, FirstName");
while ($row = mysql_fetch_row($sql)) {
echo"<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
}
echo "</table>";
mysql_close();
}
else{
die("error could not connect to the database:" . mysql_error());
}
}
else {
echo" Invalid usernmae or password";
}
}
else {
?>

<html>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
User ID: <input type="text" name="uid"><br>
Password: <input type="password" name="psd">

<hr size=1 width=100%>

First Name: <input type="text" name="FirstName"><br>
Last Name: <input type="text" name="LastName"><br>
Email: <input type="text" name="Email"><br>
StudentID: <input type="text" name="StudentID"><br>

<input type="submit" Vlaue="Submit">
</form>

</body>
</html>
 
<?php
}
?>