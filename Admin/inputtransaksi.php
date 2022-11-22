<?php
	Include ('../koneksidb.php');
	$query= mysqli_query($kon, "SELECT max(no_trans) as ntransaksi From transaksi");
	$data= mysqli_fetch_array($query);
	$ntransaksi=$data['ntransaksi'];

	$urutan= (int) substr($ntransaksi,-5);
	$urutan++;

	$huruf= "TR";
	$ntransaksi=$huruf . sprintf("%05s", $urutan);
?>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Input Data transaksi</h6>
	</div>
	<div class="card-body">
		<form action="prosesinputtransaksi.php" method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label>Nomor transaksi</label>
				<input type="text"  class="form-control" name="ntransaksi" id="ntransaksi" value="<?php echo $ntransaksi;?>" placeholder="Isi Nomor RM " required>
			</div>
<div class="form-group">
				<label>Tanggal</label>
				<input type="text"  class="form-control" name="tgl" id="tgl" value="<?= date('Y-m-d')?>" disabled placeholder="Isi tgl transaksi" required>
			</div>
			<div class="form-group">
				<label>Pasien</label>
				<select name="pasien" class="form-control"  id="pasien" class="form-control" data rel="chosen" required> 
<option value="">-Pilih RM -</option> 
<?php 
$qproduk=mysqli_query($kon,"SELECT * FROM pasien"); 
WHILE($pasien=mysqli_fetch_array($qproduk)) 
{ ?>
<option <?php if (@$_GET['id']==$pasien[0]){echo 'selected';} ?> value='<?= $pasien[0]?>'><?= $pasien[2]?></option>
<?php }
?> 
</select>
			</div>
			<div class="form-group">
				<label>Jumlah transaksi</label>
				<input type="text"  class="form-control" name="jumlah" id="jumlah" placeholder="Isi jumlah transaksi" required>
			</div>
		
			
			
			<button type="submite" name="submite" class="btn btn-success btn-user btn-block">Simpan Data transaksi</button>
			<hr>
		</form>		
	</div>	
</div>