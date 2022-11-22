<?php
Include ("../koneksidb.php");
$nobat         =$_POST["nobat"];
$namaobat   =$_POST["namaobat"];
$jenis     =$_POST["jenis"];
$keterangan   =$_POST["keterangan"];
$Harga       =$_POST["Harga"];


$ubahdata=mysqli_query($kon, "UPDATE obat SET kd_obat='$nobat', nama_obat ='$namaobat', jenisobat = '$jenis', 
                           keterangan= '$keterangan', harga='$Harga'WHERE kd_obat='$nobat'");

echo "<script>alert ('data berhasil diubah')</script>";
echo "<meta http-equiv='refresh' content='0;
url=index.php?halaman=editdataobat&id=$nobat'>";
?>