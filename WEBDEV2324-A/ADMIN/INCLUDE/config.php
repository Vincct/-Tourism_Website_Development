<?php
// koneksi ke basis data
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pesonajawa";

$connection = mysqli_connect($servername, $username, $password, $dbname);
if(!$connection)
{
	die("connection failed: ".mysqli_connect_error());
}

?>