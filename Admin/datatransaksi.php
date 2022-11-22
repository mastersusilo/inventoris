<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-users fa-table"></i>Data Transaksi
			<a href="index.php?halaman=inputdatatransaksi" class="btn btn-primary">Input Data Transaksi</a>
			
		</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No Transaksi</th>
						<th>Nama Pasien</th>
                        <th>Bayar</th>
                        <th>Tanggal</th>
                        
					</tr>
				</thead>
				<tbody>
					<?php
					$qdata=mysqli_query($kon,"SELECT * FROM transaksi"); WHILE ($data=mysqli_fetch_array($qdata))
					{
						
						?>
						<tr>
							<td><?php echo $data['0'];?></td>
							<td><?php echo $data['1'];?></td>
							<td><?php echo $data['2'];?></td>
							<td><?php echo $data['3'];?></td>

						</tr>
						<?php
					}
					   ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	function popupwindow(url, title, w, h) {
    var y = window.outerHeight / 2 + window.screenY - ( 500 / 2)
    var x = window.outerWidth / 2 + window.screenX - ( 600 / 2)
    return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + y + ', left=' + x);
} 
</script>