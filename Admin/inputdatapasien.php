<?php
	Include ('../koneksidb.php');
	$query= mysqli_query($kon, "SELECT max(idpasien) as kodeTerbesar From pasien");
	$data= mysqli_fetch_array($query);
	$noRM=$data['kodeTerbesar'];

	$urutan= (int) substr($noRM,-5);
	$urutan++;

	$huruf= "REG";
	$noRM=$huruf . sprintf("%05s", $urutan);
?>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Input Data Pasien</h6>
	</div>
	<div class="card-body">
		<form action="prosesinputpasien.php" method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label>Nomor Regestrasi</label>
				<input type="text"  class="form-control" name="noRM" id="noRM" value="<?php echo $noRM;?>" placeholder="Isi Nomor RM " required>
			</div>
<div class="form-group">
				<label>Gol Darah</label>
				<select class="form-control" name="gol" id="gol" required>
				<option value="">Golongan Darah</option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="AB">AB</option>
				<option value="O">O</option></select>
			</div>
			<div class="form-group">
				<label>Nama Pasien</label>
				<input type="text"  class="form-control" name="namapasien" id="namapasien" placeholder="Isi nama pasien" required>
			</div>
<div class="form-group">
				<label>Alamat</label>
				<textarea  class="form-control" name="alamat" id="alamat" placeholder="Isi alamat" required></textarea>
			</div>

                  <?php
                    $tanggal=date('Y-m-d');
                    ?> 
               <div class="form-group">
				<label class="col-lg-12 col-form-label">Tanggal Lahir</label>
				<input type="date"  class="form-control-col-lg-5" name="tgllahir" id="tgllahir" value="<?php echo $tanggal;?>" required>
				</div>

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select class="form-control"type="text" name="jnskelamin" id="jnskelamin" required>
					<option value="">Pilih</option>
					<option value="Perempuan">Perempuan</option>
					<option value="Laki-laki">Laki-laki</option>	
				</select>
			</div>

			
			<div class="form-group">
				<label>Nomor Telepon</label>
				<input type="text"  class="form-control" name="notelpon" id="notelpon" placeholder="Isi nomor telepon" required>
			</div>


			<button type="submite" name="submite" class="btn btn-success btn-user btn-block">Simpan Data Pasien</button>
			<hr>
		</form>		
	</div>	
</div>