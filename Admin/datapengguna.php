<!-- DataTales Example -->
<div class="card shadow mb-4"> 
	<div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-users fa-table"></i>Data Pengguna</h6>	
</div>
	<div class="card-body"> 
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nama Pengguna</th>
						<th>Username</th>
						<th>Hak Akses</th>
						<th>Status</th>
						<th>Foto</th>
						<th>Utility</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$xusername=$_SESSION['username'];
					$qdata=mysqli_query($kon,"SELECT * FROM pengguna where username= '$xusername'");
					WHILE ($data=mysqli_fetch_array($qdata))
					{
						?>
						<tr>
							<td><?php echo $data['namapengguna']; ?></td>
							<td><?php echo $data['username']; ?></td>
							<td><?php echo $data['hakakses']; ?></td>
							<td><?php echo $data['status']; ?></td>
							<td>
								<?php
								if (!empty($data['fotopengguna']))
								 {

								 ?>
								 <img src="../fotopengguna/<?php echo $data ['fotopengguna'];?>"
								 width="100px">
								 <?php
								}
								?>
							</td>
							<td align="center">
								<a href="index.php?halaman=editdatapengguna&id=<?php echo $data['idpengguna'];?>"class="btn btn-success btn-circle btn-sm">
									<i class="fas fa-edit"></i>
								</a>
								<a href="proseshapuspengguna.php?id=<?php echo $data['idpengguna']; ?>"
									onClick="return confirm ('Apakah Data Akan dihapus')" class="btn btn-danger btn-circle btn-sm">
										<i class="fas fa-trash"></i>
									</a>
							</td>
						</tr>
						<?php
					   }
					 ?>
				</tbody>
			</table>
				
		</div>
		
	</div>
</div>

