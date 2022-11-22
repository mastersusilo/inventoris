<?php 
// menghubungkan dengan koneksi database 
include ('../koneksidb.php'); 
Include ('../koneksidb.php');
$tglrm =date('Y-m-d');

if(@$_SESSION['rm']==""){
	$query= mysqli_query($kon, "SELECT max(no_rm) as kodeTerbesar From rm");
	$data= mysqli_fetch_array($query);
	$norm=$data['kodeTerbesar'];

	$urutan= (int) substr($norm,-5);
	$urutan++;

	$huruf= "RM";
	$norm=$huruf . sprintf("%05s", $urutan);
	}else{
		$query= mysqli_query($kon, "SELECT * From rm where no_rm='$_SESSION[rm]'");
			$data= mysqli_fetch_array($query);
		$idp=$data['1'];

		$norm=$_SESSION['rm'];
	}
	

if (isset($_POST['submit'])) 
{ 
	
//post 
//$norm =$_POST["norm"]; 
	//obat
$nobat =$_POST["nobat"]; 
$jumlah =$_POST["jumlah"];
$dosis =$_POST["dosis"];
//rm
$nrm =@$_POST["nrm"]; 
$tglrm =date('Y-m-d');
$nopasien =@$_POST["nopasien"]; 
if(@$_SESSION['b']==""){
$anamnese =addslashes(@$_POST["anamnese"]);
$diagnosa =addslashes(@$_POST["diagnosa"]); 
$jasa =@$_POST["jasa"];
}else{
	$anamnese =@$_SESSION['b'];
$diagnosa =addslashes(@$_SESSION['a']); 
$jasa =addslashes(@$_SESSION['c']);
}
if(@$_SESSION['rm']==""){
mysqli_query($kon,"INSERT into rm VALUES ('$nrm','$nopasien', '$jasa')");}
$ck=mysqli_query($kon,"select harga from obat where kd_obat='$nobat'");
$ack=mysqli_fetch_array($ck);
$totobat=$ack[0]*$jumlah;
$cb=mysqli_query($kon,"select * from detail where no_rm='$norm' and kd_obat='$nobat' and tgl='$tglrm'");
//proses simpan ke temp 
$jbt=mysqli_num_rows($cb);
//if($jbt>=1){
//	$dbt=mysqli_fetch_array($cb);
	//$djml=$dbt[4]+$jumlah;
	//$dtot=$dbt[5] + $totobat;
	//mysqli_query($kon,"UPDATE  detail set jumlah='$djml',total='$dtot' where dosis='$dosis', no_rm='$norm' and kd_obat='$nobat'");
	//echo "<script>alert('a')</script>";
//}else{
$simpan=mysqli_query($kon,"INSERT into detail VALUES ('','$norm',  '$nobat','$dosis', '$jumlah','$totobat','$diagnosa','$anamnese','$tglrm')");
	//echo "<script>alert('b')</script>";
	$_SESSION['a']=$diagnosa;
$_SESSION['b']=$anamnese;
$_SESSION['c']=$jasa;

 //}
$_SESSION['rm']=$norm;
//echo "<script>location.href='index.php?halaman=inputdataregistrasi'</script>";
echo "<script>location.href='index.php?halaman=inputdataregistrasilama&id=$norm'</script>";
} else if (isset($_GET['idhapus'])) 
{ 
mysqli_query($kon,"DELETE from detail where no='$_GET[idhapus]'") ;
}else if (isset($_POST['transaksisubmit'])) 
{
mysqli_query($kon,"UPDATE pasien set status='0' where idpasien='$idp'");
$_SESSION['rm']="";
	$_SESSION['a']="";
$_SESSION['b']="";
$_SESSION['c']="";
echo "<script>location.href='index.php?halaman=inputdataregistrasi'</script>";


}

?> 
<div class="row"> 
<!-- Kolom 1 --> 
<div class="col-lg-4"> 
<div class="card shadow mb-4"> 
<div class="card-header py-3"> 
 <h6 class="m-0 font-weight-bold text-primary">Input Data Obat</h6> </div> 
<div class="card-body"> 
<form action="" method="post"> 
<div class="form-group"> 
<label>No Obat</label> 
 <select name="nobat" id="nobat" onchange="changeValue(this.value)" class="form-control" data rel="chosen" required> 
<option value="">-Pilih Obat -</option> 
<?php 
$jsArray = "var prdName = new Array();\n";
$qproduk=mysqli_query($kon,"SELECT * FROM obat"); 
WHILE($obat=mysqli_fetch_array($qproduk)) 
{ 
 echo "<option  
value='$obat[0]'>$obat[1]</option>"; 
 $jsArray .= "prdName['" . $obat['0'] . "'] = {harga:'" . addslashes($obat['4']) . "'};\n";    
} 
?> 
</select> 
</div> 
<div class="form-group"> 
<label>Harga</label> 
 <input type="text" disabled class="form-control" name="harga"  id="harga" placeholder="Isi harga" required> 
</div>
<div class="form-group"> 
<label>Jumlah</label> 
 <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="jumlah"  id="jumlah" placeholder="Masukkan Jumlah" required> </div> 
 <div class="form-group"> 
<label>Dosis</label> 
 <input type="text" class="form-control" name="dosis"  id="dosis" placeholder="Masukkan dosis" required> </div> 
<button type="submit" name="submit" id="submit" class="btn btn-success  btn-user btn-block">Tambah Data Obat</button> 
<hr> 

  
</div> 
</div> 
</div> 
<!-- Kolom 2 --> 
<div class="col-lg-8"> 
<div class="card shadow mb-4"> 
<div class="card-header py-3"> 
 <h6 class="m-0 font-weight-bold text-primary">Input Data Rekam Medis</h6><br><input type="radio" checked name="baru">Baru | <input type="radio" name="baru" onclick="window.location='index.php?halaman=inputdataregistrasilama'">Lama</div> 
<div class="card-body"> 
<form> 
<div class="form-group row"> 
<label class="col-lg-3 col-form-label">Nomor Rekam Medis</label> 

 <input type="text" class="form-control col-lg-9"  
name="nrm" id="nrm" value="<?= $norm?>" disabled>
<input type="hidden" class="form-control col-lg-9"  
name="nrm" id="nrm" value="<?= $norm?>"> </div> 
<?php 
$tanggal=date('Y-m-d'); 
?> 
<div class="form-group row"> 
<label class="col-lg-3 col-form-label">Tanggal RM</label> 
 <input type="date" value="<?= date('Y-m-d'); ?>" disabled class="form-control col-lg-9"  
name="tglrm" id="tglrm" required> </div> 
<div class="form-group row"> 
<label class="col-lg-3 col-form-label">No Reg Pasien</label> 
<select name="nopasien" class="form-control col-lg-9"  <?php if(@$_SESSION['rm']!=""){echo "disabled";}?>  id="nopasien" onchange="changeValue1(this.value)"  class="form-control" data rel="chosen" required> 
<option value="">-Pilih Pasien -</option> 
<?php 
$qproduk=mysqli_query($kon,"SELECT * FROM pasien where status=1"); 
$jsArray1 = "var prdName1 = new Array();\n";
WHILE($pasien=mysqli_fetch_array($qproduk)) 
{ $qproduk1=mysqli_query($kon,"SELECT * FROM rm where no_pasien='$pasien[0]'");
$pasien1=mysqli_fetch_array($qproduk1) ;
if($pasien1){ continue;}
	$tahunLahir = $pasien[3];
$unixTimeSaatIni = time();
$unixTimeTahunLahir= strtotime($tahunLahir);
$unixTimeDalamSetahun = 31536000;
$hitungUsia = ($unixTimeSaatIni - $unixTimeTahunLahir) / $unixTimeDalamSetahun;
$umur=floor($hitungUsia);
 ?>
<option <?php if (@$data[1]==$pasien[0]){echo 'selected';} ?> value='<?= $pasien[0]?>'><?= $pasien[0]. "-". $pasien[2]?></option>
<?php $jsArray1 .= "prdName1['" . $pasien[0] . "'] = {usia:'" . addslashes($umur) . "'};\n";}
?> 
</select> 
 </div> 
 <div class="form-group row"> 
<label class="col-lg-3 col-form-label">Usia</label> 
 <input value="" disabled type="text" class="form-control col-lg-9"  
name="usia" id="usia"  required> </div> 
<div class="form-group row"> 
<label class="col-lg-3 col-form-label">Anamnese</label> 
 <input value="<?= @$data[3]?>" <?php if(@$_SESSION['rm']!=""){echo "disabled";}?> type="text" class="form-control col-lg-9"  
name="anamnese" id="anamnese"  required> </div> 
<div class="form-group row"> 
<label class="col-lg-3 col-form-label">Diagnosa</label> 
 <input value="<?= @$data[2]?>" <?php if(@$_SESSION['rm']!=""){echo "disabled";}?> type="text" class="form-control col-lg-9"  
name="diagnosa" id="diagnosa"  required> </div> 
<div class="form-group row"> 
<label class="col-lg-3 col-form-label">Jasa</label> 
 <input type="text" value="<?= @$data[5]?>" <?php if(@$_SESSION['rm']!=""){echo "disabled";}?> class="form-control col-lg-9"  
name="jasa" id="jasa"  required> </div> 
</form>
<hr> 
<div class="table-responsive">
 <table class="table table-bordered" id="" width="100%"  cellspacing="0"> 
 <thead> 
 <tr> 
 <th>Nama Obat</th>
 <th>Dosis</th> 
 <th>Harga</th> 
 <th>Jumlah Obat</th> 
 <th>Sub Total</th> 
 <th>Utility</th> 
 </tr> 
 </thead> 
 <tbody> 
<?php
					$dtc=mysqli_query($kon,"SELECT a.no,a.no_rm, b.nama_obat,b.harga,a.jumlah,a.total,a.dosis FROM detail a,obat b where a.no_rm='$norm' and a.kd_obat=b.kd_obat");
					while ($dt=mysqli_fetch_array($dtc))
					{
						?>
 <tr> 
 <td><?php echo @$dt['2']; ?> </td> 
 <td><?php echo @$dt['6']; ?> </td> 
 <td><?php echo "Rp.". number_format(@$dt['3'],0,",","."); ?></td> 
 <td><?php echo @$dt['4']; ?></td> 
 <td> <?php echo "Rp.". number_format(@$dt['5'],0,",","."); ?></td> 
 <td align="center"> 
<a  
href="index.php?halaman=inputdataregistrasi&idhapus=<?php echo $dt['0']; ?>"  onClick="return confirm('Apakah Data Akan Dihapus?')" class="btn btn-danger btn-circle  btn-sm"> 
 <i class="fas fa-trash"></i> 
 </a> 
</td> 
 </tr> 
 <?php 
 $total=8888; 
 }
 ?> 
 </tbody> 

 </table> 
 </div> 
 <form action="" method="post">
 <input type="hidden" name="totalharga" id="totalharga" value="<?php echo @$total;?>">
 <button type="submit" name="transaksisubmit" id="transaksisubmit"  class="btn btn-success btn-user btn-block" >Simpan Transaksi</button> 
</form> 
  
</div> 
</div> 
</div> 
</div>

<script type="text/javascript">    
<?php echo $jsArray;
echo $jsArray1; ?>  
function changeValue(id){  
document.getElementById('harga').value = prdName[id].harga;  
};  
function changeValue1(id){  
document.getElementById('usia').value = prdName1[id].usia;  
};  
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
</script>