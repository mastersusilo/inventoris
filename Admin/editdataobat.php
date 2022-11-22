<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Edit Data obat</h6>
	</div>
	<div class="card-body">
		<?php
		$id=$_GET['id'];
		$qdata=mysqli_query($kon, "SELECT * FROM obat WHERE kd_obat='$id'");
		$data=mysqli_fetch_array($qdata);
		?>
		<form action="proseseditdataobat.php" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label>Nomor Obat</label>
				<input type="text" disabled   class="form-control" name="nobat" id="nobat" value="<?php echo $data['0']?>"placeholder="Isi nomor Obat" required>
				<input type="hidden"  class="form-control" name="nobat" id="nobat" value="<?php echo $data['0']?>"placeholder="Isi nomor Obat" required>
			</div>

			<div class="form-group">
				<label>Nama obat</label>
				<input type="text"  class="form-control" name="namaobat" id="namaobat" value="<?php echo $data['1']?>" placeholder="Masukan nama obat">
			</div>

			      <div class="form-group">
				<label>Jenis Obat</label>
				<input type="text"  class="form-control" name="jenis" id="jenis" value="<?php echo $data['2']?>" placeholder="Isi jenis obat" required>
			</div>
		
			<div class="form-group">
				<label>Keterangan</label>
				<input type="text"  class="form-control" name="keterangan" id="keterangan" value="<?php echo $data['3']?>" placeholder="Isi Keterangan" required>
			</div>
			<div class="form-group">
				<label>Harga</label>
				<input type="text"  class="form-control" name="Harga" id="Harga" value="<?php echo $data['4']?>" placeholder="Isi Harga" required>
			</div>
            
			<input type="hidden" name="id" id="id" value="<?php echo $data ['kd_obat'];?>">

			<button type="submite" name="submite" class="btn btn-primary btn-user btn-block">Edit Data obat</button>
			<hr>
		</form>
	</div>
</div>