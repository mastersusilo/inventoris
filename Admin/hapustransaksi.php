<?php
//koneksi
Include ('../koneksidb.php');
//post
$id         =$_GET["id"];

//proses simpan
$simpan=mysqli_query($kon,"DELETE from transaksi where no_trans='$id'");

//lari
echo "<script>alert ('data berhasil dihapus')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=transaksi'>"
?>