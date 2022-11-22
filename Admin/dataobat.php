<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-users fa-table"></i>Data Obat
			<a href="index.php?halaman=inputdataobat" class="btn btn-primary">Input Data</a>
		</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Kode Obat</th>
						<th>Nama Obat</th>
						<th>Jenis Obat</th>
						<th>Harga</th>
						<th>Utility</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$qdata=mysqli_query($kon,"SELECT * FROM obat"); WHILE ($data=mysqli_fetch_array($qdata))
					{
						?>
						<tr>
							<td><?php echo $data['0'];?></td>
							<td><?php echo $data['1'];?></td>
							<td><?php echo $data['2'];?></td>
							<td><?php echo $data['4'];?></td>
							
							<td align="center">			
							<a href="index.php?halaman=editdataobat&id=<?php echo $data['0'];?>" class="btn btn-success btn-circle btn-sm">
								<i class="fas fa-edit"></i></a>

							<a href="hapusobat.php?id=<?php echo $data['0'];?>" onClick="return confirm('Apakah Data Akan Dihapus')" class="btn btn-danger btn-circle btn-sm">
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
