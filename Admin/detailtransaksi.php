<?php 
// menghubungkan dengan koneksi database 
include ('../koneksidb.php'); 
$id=$_GET['id'];
$tgl=date('Y-m-d');
		$query= mysqli_query($kon, "SELECT * From rm a,detail b,pasien c where a.no_rm='$id' and a.no_rm=b.no_rm and b.tgl='$tgl' and a.no_pasien=c.idpasien");
		$data= mysqli_fetch_array($query);
	
	

//post 
//$norm =$_POST["norm"]; 
	//obat


?> 
<div class="row"> 
<!-- Kolom 1 --> 

<!-- Kolom 2 --> 
<div class="col-lg-8"> 
<div class="card shadow mb-4"> 
<div class="card-header py-3"> 
 <h6 class="m-0 font-weight-bold text-primary">Data Rekam Medis </h6> </div> 
<div class="card-body"> 
<form> 
<div class="form-group row"> 
<label class="col-lg-3 col-form-label">Nomor Rekam Medis</label> 
<span class="col-form-label col-lg-9"><?= $data[0];?></span></div> 
<div class="form-group row"> 
<label class="col-lg-3 col-form-label">Tanggal RM</label> 
<span class="col-form-label col-lg-9"><?= $data[11];?></span></div> 
<div class="form-group row"> 
<label class="col-lg-3 col-form-label">No Reg Pasien</label> 
<span class="col-form-label col-lg-9"><?= $data[1]." - ".$data[14];?></span>
 </div> 
<div class="form-group row"> 
<label class="col-lg-3 col-form-label">Anamnese</label> 
<span class="col-form-label col-lg-9"><?= $data[9];?></span></div> 
<div class="form-group row"> 
<label class="col-lg-3 col-form-label">Diagnosa</label> 
<span class="col-form-label col-lg-9"><?= $data[10];?></span></div> 
<div class="form-group row"> 
<label class="col-lg-3 col-form-label">Jasa</label> 
<span class="col-form-label col-lg-9"><?php echo "Rp.". number_format(@$data['2'],0,",","."); ?></span></div> 
</form>
<hr> 
<div class="table-responsive">
 <table class="table table-bordered" id="" width="100%"  cellspacing="0"> 
 <thead> 
 <tr> 
 <th>Nama Obat</th> 
 <th>Harga</th> 
 <th>Jumlah Obat</th> 
 <th>Sub Total</th> 
 </tr> 
 </thead> 
 <tbody> 
<?php
					$dtc=mysqli_query($kon,"SELECT a.no,a.no_rm, b.nama_obat,b.harga,a.jumlah,a.total FROM detail a,obat b where a.no_rm='$id' and a.kd_obat=b.kd_obat and a.tgl='$tgl'");
					while ($dt=mysqli_fetch_array($dtc))
					{ $ttl=@$ttl+$dt['5'];
						?>
 <tr> 
 <td><?php echo @$dt['2']; ?> </td> 
 <td><?php echo "Rp.". number_format(@$dt['3'],0,",","."); ?></td> 
 <td><?php echo @$dt['4']; ?></td> 
 <td> <?php echo "Rp.". number_format(@$dt['5'],0,",","."); ?></td> 
 
 <?php 
 }
 ?> </tr>
 <tr><td colspan="3" align="right">Total</td><td><?= "Rp.". number_format(@$ttl+$data['2'],0,",","."); ?></td></tr>
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