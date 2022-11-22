<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-users fa-table"></i>Data Pasien
			<a href="index.php?halaman=inputdatapasien" class="btn btn-primary">Input Data</a>
		</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nomor Pasien</th>
						<th>Golongan Darah</th>
						<th>Nama Pasien</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Nomor Telepon</th>
						<th>Utility</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$qdata=mysqli_query($kon,"SELECT * FROM pasien"); WHILE ($data=mysqli_fetch_array($qdata))
					{
						?>
						<tr>
							<td><?php echo $data['0'];?> <input type="checkbox" <?php if($data[7]==1){echo "checked";} ?> name="aa" onclick="window.location='./prosesnotif.php?id=<?php echo $data[0];?>&no='+this.checked;"></td>
							<td><?php echo $data['1'];?></td>
							<td><?php echo $data['namapasien'];?></td>
							<td><?php echo $data['tgllahir'];?></td>
							<td><?php echo $data['jnskelamin'];?></td>
							<td><?php echo $data['alamat'];?></td>
							<td><?php echo $data['notelpon'];?></td>
							
							<td align="center">			
							<a href="index.php?halaman=editdatapasien&id=<?php echo $data['0'];?>" class="btn btn-success btn-circle btn-sm">
								<i class="fas fa-edit"></i></a>

							<a href="hapuspasien.php?id=<?php echo $data['0'];?>" onClick="return confirm('Apakah Data Akan Dihapus')" class="btn btn-danger btn-circle btn-sm">
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
