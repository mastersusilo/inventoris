<?php
//koneksi
Include ('../koneksidb.php');
//post
$ntransaksi         =$_POST["ntransaksi"];
$pasien   =$_POST["pasien"];
$jumlah     =$_POST["jumlah"];
$tgl   =date('Y-m-d');

//proses simpan
$simpan=mysqli_query($kon,"INSERT into transaksi VALUES ('$ntransaksi', '$pasien', '$jumlah', '$tgl')");

//lari
echo "<script>alert ('data berhasil disimpan')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=transaksi'>";
?>