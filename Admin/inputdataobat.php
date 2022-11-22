<?php
	Include ('../koneksidb.php');
	$query= mysqli_query($kon, "SELECT max(kd_obat) as nobat From obat");
	$data= mysqli_fetch_array($query);
	$nobat=$data['nobat'];

	$urutan= (int) substr($nobat,-5);
	$urutan++;

	$huruf= "OB";
	$nobat=$huruf . sprintf("%05s", $urutan);
?>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Input Data Obat</h6>
	</div>
	<div class="card-body">
		<form action="prosesinputobat.php" method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label>Nomor Obat</label>
				<input type="text"  class="form-control" name="nobat" id="nobat" value="<?php echo $nobat;?>" placeholder="Isi Nomor RM " required>
			</div>

			<div class="form-group">
				<label>Nama Obat</label>
				<input type="text"  class="form-control" name="namaobat" id="namaobat" placeholder="Isi nama obat" required>
			</div>
			<div class="form-group">
				<label>Jenis Obat</label>
				<input type="text"  class="form-control" name="jenis" id="jenis" placeholder="Isi jenis obat" required>
			</div>
		
			
			<div class="form-group">
				<label>Harga</label>
				<input type="text"  class="form-control" name="Harga" id="Harga" placeholder="Isi Harga" required>
			</div>


			<button type="submite" name="submite" class="btn btn-success btn-user btn-block">Simpan Data obat</button>
			<hr>
		</form>		
	</div>	
</div>