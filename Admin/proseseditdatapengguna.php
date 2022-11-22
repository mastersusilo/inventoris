<?php
include("../koneksidb.php");
$namapengguna  =$_POST["namapengguna"];
$id            =$_POST["id"];
$password      =$_POST["password"];

//jika password di isi
if ($password<>'') {
	$pasmd5=md5($password);
	$ubahdata=mysqli_query ($kon, "UPDATE pengguna SET namapengguna='$namapengguna', password='$pasmd5' WHERE idpengguna='$id'");
}
else 
 {
 	$ubahdata=mysqli_query ($kon, "UPDATE pengguna SET namapengguna='$namapengguna' WHERE idpengguna='$id'"); 
}

 echo "<script>alert('data berhasil diubah')</script>";
 echo "<meta http-equiv='refresh'content='0; url=index.php?halaman=editdatapengguna&id=$id'>";
 ?>