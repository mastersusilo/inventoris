<?php
//koneksi
Include ('../koneksidb.php');
//post
$noRM         =$_POST["noRM"];
$namapasien   =$_POST["namapasien"];
$gol   =$_POST["gol"];
$tgllahir     =$_POST["tgllahir"];
$jnskelamin   =$_POST["jnskelamin"];
$alamat       =$_POST["alamat"];
$notelpon     =$_POST["notelpon"];

//proses simpan
$simpan=mysqli_query($kon,"INSERT into pasien VALUES ('$noRM', '$gol','$namapasien', '$tgllahir', '$jnskelamin', '$alamat', '$notelpon',0)");

//lari
echo "<script>alert ('data berhasil disimpan')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=datapasien'>"
?>