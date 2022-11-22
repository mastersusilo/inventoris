<?php
//koneksi
Include ('../koneksidb.php');
//post
$nobat         =$_POST["nobat"];
$namaobat   =$_POST["namaobat"];
$jenis     =$_POST["jenis"];
$keterangan   =$_POST["keterangan"];
$Harga       =$_POST["Harga"];

//proses simpan
$simpan=mysqli_query($kon,"INSERT into obat VALUES ('$nobat', '$namaobat', '$jenis', '$keterangan', '$Harga')");

//lari
echo "<script>alert ('data berhasil disimpan')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=dataobat'>"
?>