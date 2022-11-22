<?php
include ("koneksidb.php");
session_start();

$username        =$_POST["username"];
$password        =$_POST["password"];
$password        =md5($password);

$qdata=mysqli_query($kon, "select * from pengguna where username='$username' AND password='$password'");
$jml  =mysqli_num_rows($qdata);
$data =mysqli_fetch_array($qdata);

if($jml==0)
{
	header('location:index.php?err=1');
}
else
{
	$_SESSION["namapengguna"]          =$data["namapengguna"];
	$_SESSION["teleponpengguna"]       =$data["teleponpengguna"];
	$_SESSION["username"]              =$data["username"];
	$_SESSION["hakakses"]              =$data["hakakses"];

	if($data['hakakses']=='Admin')
	{
		header ('location:Admin/');
	}
	else
	{
		header('location:Admin/');
	}
}

?>