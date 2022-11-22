<?php
//koneksi
Include ('../koneksidb.php');
//post
$notrans         =$_POST["notrans"];
$nopasien   =$_POST["nopasien"];
$bayar     =$_POST["bayar"];
$tgl   =date('Y-m-d');

//proses simpan
$simpan=mysqli_query($kon,"INSERT into transaksi VALUES ('$notrans', '$nopasien', '$bayar', '$tgl')");

//lari
echo "<script>alert ('data berhasil disimpan')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=datatransaksi'>"
?>