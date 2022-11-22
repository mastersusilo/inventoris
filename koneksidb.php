<?php
$host     ="localhost";
$user     ="root";
$password ="";
$db       ="2022_dbrm";

$kon=mysqli_connect($host,$user,$password,$db);

if (!$kon)
 {
	die("Koneksi database Gagal" .mysqli_koneksi_error());
 }

?>