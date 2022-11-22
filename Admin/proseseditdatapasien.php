<?php
Include ("../koneksidb.php");
$noRM  =$_POST["noRM"];
$namapasien    =$_POST["namapasien"];
$tgllahir      =$_POST["tgllahir"];
$gol   =$_POST["gol"];
$jnskelamin    =$_POST["jnskelamin"];
$alamat        =$_POST["alamat"];
$notelpon    =$_POST["notelpon"];
$id            =$_POST["id"];

$ubahdata=mysqli_query($kon, "UPDATE pasien SET goldar='$gol', namapasien ='$namapasien', tgllahir = '$tgllahir', 
                           jnskelamin= '$jnskelamin', alamat='$alamat', notelpon='$notelpon' WHERE idpasien='$id'");

echo "<script>alert ('data berhasil diubah')</script>";
echo "<meta http-equiv='refresh' content='0;
url=index.php?halaman=editdatapasien&id=$id'>";
?>