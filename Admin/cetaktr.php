<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-users fa-table"></i>Data RM
			
		</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No RM</th>
						<th>Nama Pasien</th>
						<th>Total</th>
                        <th>Utility</th>
					</tr>
				</thead>
				<tbody>
					<?php
					function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
					$tgl=date('Y-m-d');
					$qdata1=mysqli_query($kon,"SELECT distinct a.no_rm FROM rm a,pasien b,detail c where a.no_pasien=b.idpasien and a.no_rm=c.no_rm and c.tgl='$tgl'"); WHILE ($data1=mysqli_fetch_array($qdata1))
					{$qdata=mysqli_query($kon,"SELECT * FROM rm a,pasien b where a.no_pasien=b.idpasien and a.no_rm='$data1[0]' ");
					$data=mysqli_fetch_array($qdata);
					$qjml=mysqli_query($kon,"SELECT sum(b.total) FROM rm a,detail b where a.no_rm=b.no_rm and a.no_rm='$data1[0]' and b.tgl='$tgl' ");
					$jml=mysqli_fetch_array($qjml);
						
						?>
						<tr>
							<td><?php echo $data['0'];?></td>
							<td><?php echo $data['5'];?></td>
							<td><?php echo rupiah($jml['0']+$data[2]);?></td>
							
							<td align="center">
							

							<a title= "Cetak Nota Registrasi" href="#"
							onClick="popupwindow('cetaknota.php?id=<?php echo $data[0];?>');" 
							class="btn btn-danger btn-circle btn-sm">
							<i class="fas fa-print"></i>
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