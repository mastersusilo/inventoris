<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-users fa-table"></i>Data Obat
			<a href="index.php?halaman=inputtransaksi" class="btn btn-primary">Input Data</a>
			<a title= "Cetak Nota Registrasi" href="./?halaman=periode"
							class="btn btn-danger btn-circle btn-sm">
							<i class="fas fa-print"></i>
							</a>
		</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Kode Transaksi</th>
						<th>Nama Pasien</th>
						<th>Bayar</th>
						<th>Tanggal</th>
						<th>Utility</th>
					</tr>
				</thead>
				<tbody>
					<?php
					function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
					$qdata=mysqli_query($kon,"SELECT * FROM transaksi a,pasien b where a.no_pasien=b.idpasien"); WHILE ($data=mysqli_fetch_array($qdata))
					{
						?>
						<tr>
							<td><?php echo $data['0'];?></td>
							<td><?php echo $data['6'];?></td>
							<td><?php echo rupiah($data['2']);?></td>
							<td><?php echo $data['3'];?></td>
							
							<td align="center">			
						

							<a href="hapustransaksi.php?id=<?php echo $data['0'];?>" onClick="return confirm('Apakah Data Akan Dihapus')" class="btn btn-danger btn-circle btn-sm">
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
<script type="text/javascript">
	function popupwindow(url, title, w, h) {
    var y = window.outerHeight / 2 + window.screenY - ( 500 / 2)
    var x = window.outerWidth / 2 + window.screenX - ( 600 / 2)
    return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + y + ', left=' + x);
} 
</script>