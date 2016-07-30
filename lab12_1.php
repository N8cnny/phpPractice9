<?php

$con=mysql_connect("localhost","root","") or die("error, could not connect to server: " . mysql_error());
echo "connected to server.<br>\n";

$db= mysql_select_db('games')
or die("Error, could not connect to database: " . mysql_error());
echo "Accessed the database.<br>";

$sql= "CREATE TABLE contacts(
lastName VARCHAR(20),
firstName VARCHAR(20),
email VARCHAR(50),
id VARCHAR(9),
UNIQUE (id) )";

if(mysql_query($sql)) {
echo "Table created succesfully.<br>";
}
else {
die("Error, could not create table: " . mysql_error());
}

$sql= "INSERT INTO contacts VALUES
('Jon' , 'Doe' , 'jdoe@server.com', 'D00991301') , 
('Suzie', 'Q', 'sq@server.com', 'D00991302'),
('Joe', 'Guy', 'Jguy@server.com', 'D00991303')";

if(mysql_query($sql)) {
echo "Values inserted successfully.";
}
else {
die("Error could not insert values: " . mysql_error());
}
mysql_close($con);
?>