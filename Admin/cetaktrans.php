<?php
include 'indo.php';
$awal=$_GET['awal'];
$akhir=$_GET['akhir'];
?>
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<link href="../css/sb-admin-2.min.css" rel="stylesheet">

	<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="card shadow mb-4">
<center><h2>Laporan Transaksi<br></h2><h6> <?= tgl_indo($awal)?> s/d <?= tgl_indo($akhir) ?></h6></center>	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Kode Transaksi</th>
						<th>Nama Pasien</th>
						<th>Bayar</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include ('../koneksidb.php'); 

					$qdata=mysqli_query($kon,"SELECT * FROM transaksi a,pasien b where a.no_pasien=b.idpasien and a.tgl>='$awal' and a.tgl<='$akhir'"); WHILE ($data=mysqli_fetch_array($qdata))
					{
						?>
						<tr>
							<td><?php echo $data['0'];?></td>
							<td><?php echo $data['6'];?></td>
							<td><?php echo $data['2'];?></td>
							<td><?php echo $data['3'];?></td>
							
							





						</tr>
						<?php
					}
					   ?>
				</tbody>
			</table>
			<label style="margin-left: 80%">Mengetahui</label><br><br><br>
			<label style="margin-left: 81%">Petugas</label>
		</div>
	</div>
</div>
<script type="text/javascript">    
window.print();
</script>