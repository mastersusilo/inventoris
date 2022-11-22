<?php
	Include ('../koneksidb.php');
	$query= mysqli_query($kon, "SELECT max(no_trans) as nobat From transaksi");
	$data= mysqli_fetch_array($query);
	$nobat=$data['nobat'];

	$urutan= (int) substr($nobat,-5);
	$urutan++;

	$huruf= "TR";
	$nobat=$huruf . sprintf("%05s", $urutan);
?>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Input Data Transaksi</h6>
	</div>
	<div class="card-body">
		<form action="prosesinputtransaksi.php" method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label>Nomor Transaksi</label>
				<input type="text"  class="form-control" name="notrans" id="notrans" value="<?php echo $nobat;?>" placeholder="Isi Nomor RM " required>
			</div>

			<div class="form-group">
				<label>Nama Pasien</label>
					 <select name="nopasien" id="nopasien" class="form-control" data rel="chosen" required> 
<option value="">-Pilih Pasien -</option> 
<?php 
$qproduk=mysqli_query($kon,"SELECT * FROM pasien"); 
WHILE($obat=mysqli_fetch_array($qproduk)) 
{ 
 echo "<option  
value='$obat[0]'>$obat[2]</option>"; 
} 
?> 
</select> 
			</div>
			<div class="form-group">
				<label>Bayar</label>
				<input type="text"  class="form-control" name="bayar" id="bayar" placeholder="Isi bayar" required>
			</div>
		


			<button type="submite" name="submite" class="btn btn-success btn-user btn-block">Simpan Data Transaksi</button>
			<hr>
		</form>		
	</div>	
</div>