<?php
//This page connects to the DB and helps run sqls
$server = "localhost";
$user = "root";
$pass = "";
$db = "rgi_student";
$connectToDb = mysqli_connect($server, $user, $pass, $db);
//in the event the database is not found
if(!$connectToDb)
{
die(mysqli_connect_error());
}
?>