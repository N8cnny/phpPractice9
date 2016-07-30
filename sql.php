<?php
if($_POST)
{

$str=$_POST["mysql"];
$uid=$_POST["uid"];
$psd=$_POST["psd"];

if (($uid="anon") && ($psd=="incorrect")) {

$con= mysql_connect("localhost","root","");
if(mysql_select_db("games"))
{

$query= mysql_query($str);

if($query) {
echo"<p>Executed Successfully!</p><hr size=1 width='100%'>";
}
else {
echo "<p>Execution failed". mysql_error() . "</p>";
}

while($row=mysql_fetch_row($query)){
foreach($row as $rs)
{
echo $rs . ",";
}
echo "<br>";
}

mysql_close();
}

else {
die("Error, Could not to connect to database: " . mysql_error());
}

}
else { echo "invalid username or password";
}
}
else
{
?>

<html>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
User ID: <input type="text" name="uid"><br>
Password: <input type="password" name="psd">

<p>SQL statement:<br>
<textarea rows=10 cols=100 name="mysql"></textarea><br>

<input type="submit" value="Submit">
</form>

</body>
</html>

<?php
}
?>
