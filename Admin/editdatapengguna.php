<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold-text-primary">Edit Data Pengguna</h6>
	</div>
	<div class="card-body">
		<?php
		$id=$_GET ['id'];
		$qdata=mysqli_query($kon, "SELECT * FROM pengguna WHERE idpengguna='$id'");
		$data=mysqli_fetch_array($qdata);
		?>
		<form action="proseseditdatapengguna.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<input type="text"  class="form-control" name="namapengguna" id="namapengguna"
				value="<?php echo $data['namapengguna'] ?>"placeholder="isi nama pengguna" required>
			</div>

			<div class="form-group">
				<input type="text" class="form-control" name="username"
				id="username" value="<?php echo $data['username']?>"placeholder="username"disabled>
			</div>

			<div class="form-group">
				<input type="password" class="form-control" name="password" id="password" placeholder="masukan password baru">
			</div>

			<input type="hidden" name="id" id="id" value="<?php echo $data['idpengguna'];?>">
			<input type="hidden" name="username" id="username" value="<?php echo $data['username'];?>">

			<button type="submite" name="submite" class="btn btn-primary btn-user btn-block">Edit Data Pengguna</button>
			
		</form>
		
	</div>
	
</div>