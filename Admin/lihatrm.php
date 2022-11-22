<?php 
// menghubungkan dengan koneksi database 
include ('../koneksidb.php'); 
$id=$_GET['id'];
$tgl=date('Y-m-d');
		$query= mysqli_query($kon, "SELECT * From rm a,pasien c where a.no_rm='$id' and a.no_pasien=c.idpasien");
		$data= mysqli_fetch_array($query);
	$tahunLahir = $data[6];
$unixTimeSaatIni = time();
$unixTimeTahunLahir= strtotime($tahunLahir);
$unixTimeDalamSetahun = 31536000;
$hitungUsia = ($unixTimeSaatIni - $unixTimeTahunLahir) / $unixTimeDalamSetahun;
$umur=floor($hitungUsia);
	

//post 
//$norm =$_POST["norm"]; 
	//obat


?> 

<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<style type="text/css">
		}
	</style>

<div class="row"> 
<!-- Kolom 1 --> 

<!-- Kolom 2 --> 
<div class="col-lg-12"> 
<div class="card shadow mb-4"> 
<div class="card-header py-3"> 
 <center><h1 class="m-0 font-weight-bold text-primary">HISTORY MEDICAL RECORD KLINIK UMUM </h1></center> </div> 
<div class="card-body"> 
<form> 

<table class="" id="" s width="100%"  cellspacing="0"> 
 <tr > 
 <td width="150px">No Pasien</td><td width="500px">: <?= $data[1]?></td>
 <td width="150px">Jenis Kelamin</td><td width="150px">: <?= $data[7]?></td>
  <td width="150px">Golongan Darah</td> <td>: <?= $data[4]?></td>
</tr>
 <tr> 
 <td>Nama Pasien</td> <td>: <?= $data[5]?></td>
 <td>Tanggal Lahir</td><td>: <?= $data[6]?></td>
  <td>Usia</td><td>: <?= $umur. "Tahun"?></td>
</tr>
</table>
</form>
<hr> 
<div class="table-responsive">
 <table class="table table-bordered" border="1" id="" width="100%"  cellspacing="1"> 
 <thead> 
 <tr bgcolor="grey" style="color:black;text-align: center;"> 
 <th>Tanggal</th> 
 <th>Uraian</th> 
 <th>Hasil</th> 
 </tr> 
 </thead> 
 <tbody> 
<?php
				$query1= mysqli_query($kon, "SELECT distinct(b.tgl) From rm a,detail b where a.no_rm=b.no_rm and a.no_rm=b.no_rm and a.no_rm='$id'");
		while($data1= mysqli_fetch_array($query1)){
			$query2= mysqli_query($kon, "SELECT * From detail where no_rm='$id' and tgl='$data1[0]'");
		$data2= mysqli_fetch_array($query2);
					?>
 <tr> 
 <td rowspan="3" width="100px"><?php echo @$data1[0]; ?> </td> 
 <td width="200px">Anamnesa</td>
  <td><?php echo @$data2[7]; ?> </td> </tr>
 <tr>
<td>Diagnosa</td>
<td><?php echo @$data2[6]; ?> </td></tr>
 <tr>
<td>Resep</td>
<td>Resep RJTP:<br><?php 
$query3= mysqli_query($kon, "SELECT * From detail a,obat b where a.no_rm='$id' and a.tgl='$data1[0]' and a.kd_obat=b.kd_obat");
		while($data3= mysqli_fetch_array($query3)){
			echo $data3[10]."<br>";
		}

?></td></tr>
 <?php 
 }
 ?>
 </tbody>

 </table> 
 </div> 

</div> 
</div> 
</div> 
</div>

<script type="text/javascript">    
<?php echo $jsArray; ?>  
function changeValue(id){  
document.getElementById('harga').value = prdName[id].harga;  
};  
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
</script>
