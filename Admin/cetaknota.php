<?php 
// menghubungkan dengan koneksi database 
include ('../koneksidb.php'); 
$id=$_GET['id'];
$tgl=date('Y-m-d');
		$query= mysqli_query($kon, "SELECT * From rm a,detail b,pasien c where a.no_rm='$id' and a.no_pasien=c.idpasien and a.no_rm=b.no_rm and b.tgl='$tgl'");
		$data= mysqli_fetch_array($query);
	
	

//post 
//$norm =$_POST["norm"]; 
	//obat


?> 
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<link href="../css/sb-admin-2.min.css" rel="stylesheet">

	<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="row"> 
<!-- Kolom 1 --> 

<!-- Kolom 2 --> 
<div class="col-lg-12"> 
<div class="card shadow mb-4"> 
<div class="card-header py-3"> 
 <h3 class="m-0 font-weight-bold text-primary" align="center">RINCIAN BIAYA BEROBAT </h3> </div> 
<div class="card-body"> 
<table width="">
	__________________________________________________________________________________________________________________________
	<tr><td width="200px">
<label class="col-lg-12 col-form-label">No Reg Pasien</label> </td>
<td><?= $data[1];?>
</td></tr>
<tr><td>
	<label class="col-lg-12 col-form-label">Tanggal Periksa</label> </td>
<td><?= $data[11];?>
</td></tr>
<tr><td>
	<label class="col-lg-12 col-form-label">Nama Pasien</label> </td>
<td><?= $data[14];?></span>
</td></tr>
  
<tr><td>
	<label class="col-lg-12 col-form-label">No. RM</label> </td>
<td><?= $data[0];?>
</td></tr>
<tr><td><label class="col-lg-12 col-form-label">Jasa</label> </td>
<td><?php echo "Rp.". number_format(@$data['2'],0,",","."); ?>
</td></tr>
</table>
__________________________________________________________________________________________________________________________
<div class="table-responsive">
 <table class="table table-bordered" id="" width="60%"  cellspacing="0"> 
 <thead> 
 <tr> 
 <th>Nama Obat</th> 
 <th>Harga</th> 
 <th>Jumlah Obat</th> 
 <th>Dosis</th> 
 <th>Sub Total</th> 
 </tr> 
 </thead> 
 <tbody> 
<?php
					$dtc=mysqli_query($kon,"SELECT a.no,a.no_rm, b.nama_obat,b.harga,a.jumlah,a.total,a.dosis FROM detail a,obat b where a.no_rm='$id' and a.kd_obat=b.kd_obat  and a.tgl='$tgl'");
					while ($dt=mysqli_fetch_array($dtc))
					{ $ttl=@$ttl+$dt['5'];
						?>
 <tr> 
 <td><?php echo @$dt['2']; ?> </td> 
 <td><?php echo "Rp.". number_format(@$dt['3'],0,",","."); ?></td> 
 <td><?php echo @$dt['4']; ?></td> 
  <td><?php echo @$dt['6']; ?></td> 
 <td> <?php echo "Rp.". number_format(@$dt['5'],0,",","."); ?></td> 
 
 <?php 
 }
 	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil." rupiah";
	}
 
 
	
 ?> </tr>
 <tr><td colspan="4" align="right">Total</td><td><?= "Rp.". number_format(@$ttl+$data['2'],0,",","."); ?></td></tr>
 <tr><td colspan="4" style="border: none;"><b>Terbilang</b><br><?= terbilang(@$ttl+$data['2']);?></td></tr>
 <tr><td colspan="3" style="border: none;"></td><td style="border: none;">Petugas <br><br><br>Admin</td></tr>
 </tbody> 
 </table> 
 </div> 

</div> 
</div> 
</div> 
</div>

<script type="text/javascript">    
window.print();
</script>