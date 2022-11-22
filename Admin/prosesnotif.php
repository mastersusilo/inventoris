<?php
//koneksi
Include ('../koneksidb.php');
//post
$id         =$_GET["id"];
$no   =$_GET["no"];
if($no=="true"){
	$no=1;
}else{
	$no=0;
}
//proses simpan
$simpan=mysqli_query($kon,"UPDATE pasien set status='$no' where idpasien='$id'");

//lari
echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=datapasien'>"
?>