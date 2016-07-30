
<?php
if (isset($_GET["addMsg"])) 
{
$addMsg=$_GET["addMsg"];
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<p>Post your Message:<br />
<textarea name="msg" rows="10" cols="70" wrap></textarea><br />
<input type="submit" name="smtmsg" value="submit" />
</p>
</form>
<?php
}
else
{
if ($_POST)
{
$msg=$_POST["msg"];
$curDate = date("F j, Y, g:i a");

$con = mysql_connect('localhost', 'root', '') 
or die(mysql_error());

$db = mysql_select_db('games') 
or die(mysql_error());

$sql = "INSERT INTO Messages SET Message='$msg', MsgDate=CURDATE()";
mysql_query($sql) 
or die(mysql_error());
$sql = @mysql_query("select * from Messages ORDER BY MsgDate, id desc");
mysql_close($con);
$url = $_SERVER['PHP_SELF'];
header('Location: '.$url) ;
}
else
{
$url = $_SERVER['PHP_SELF'] ."?addMsg=1";
echo "<a href='$url'>Add message</a><hr size='1' width='100%' />";

$con = mysql_connect("localhost", "root","") 
or die(mysql_error());

$db = mysql_select_db("games")
or die(mysql_error());

$sql = @mysql_query("select * from Messages ORDER BY MsgDate, id desc");

echo "<table width='100%'>";
while($row = mysql_fetch_array($sql))
{
echo "<tr><td width='120'>" . $row['MsgDate'] . "</td><td>";
echo $row['Message'] . "</td></tr>";
}
echo "</table>";

mysql_close($con);
}
}
?>