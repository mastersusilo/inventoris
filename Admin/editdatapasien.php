<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Edit Data Pasien</h6>
	</div>
	<div class="card-body">
		<?php
		$id=$_GET['id'];
		$qdata=mysqli_query($kon, "SELECT * FROM pasien WHERE idpasien='$id'");
		$data=mysqli_fetch_array($qdata);
		?>
		<form action="proseseditdatapasien.php" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label>Nomor RM</label>
				<input type="text"  class="form-control" name="noRM" id="noRM" value="<?php echo $data['0']?>"placeholder="Isi nomor RM" required>
			</div>
		<div class="form-group">
				<label>Gol Darah</label>
				<select class="form-control" name="gol" id="gol" required>
				<option value="">Golongan Darah</option>
				<option <?php if ($data['1']=="A"){echo "selected";} ?> value="A">A</option>
				<option <?php if ($data['1']=="B"){echo "selected";} ?> value="B">B</option>
				<option <?php if ($data['1']=="AB"){echo "selected";} ?> value="AB">AB</option>
				<option <?php if ($data['1']=="O"){echo "selected";} ?> value="O">O</option></select>
			</div>
			<div class="form-group">
				<label>Nama Pasien</label>
				<input type="text"  class="form-control" name="namapasien" id="namapasien" value="<?php echo $data['namapasien']?>" placeholder="Masukan nama pasien">
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
				<select class="form-control"type="text" name="jnskelamin" id="jnskelamin"  required>
					<option value="">Pilih</option>
					<option value="Perempuan" <?php if ($data['4']=="Perempuan"){echo "selected";} ?>>Perempuan</option>
					<option value="Laki-laki" <?php if ($data['4']=="Laki-laki"){echo "selected";} ?>>Laki-laki</option>	
				</select>
			</div>

			<div class="form-group">
				<label>Alamat</label>
				<input type="text"  class="form-control" name="alamat" id="alamat" value="<?php echo $data['alamat']?>" placeholder="Masukan alamat">
			</div>

			<div class="form-group">
				<label>Nomor Telepon</label>
				<input type="text"  class="form-control" name="notelpon" id="notelpon" value="<?php echo $data['notelpon']?>" placeholder="Masukan nomor telepon">
			</div>

            
			<input type="hidden" name="id" id="id" value="<?php echo $data ['idpasien'];?>">

			<button type="submite" name="submite" class="btn btn-primary btn-user btn-block">Edit Data Pasien</button>
			<hr>
		</form>
	</div>
</div>