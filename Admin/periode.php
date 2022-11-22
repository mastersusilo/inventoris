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
 	<div class="col-lg-4">
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Masukkan Periode</h6>
	</div>
	<div class="card-body">
			
			<div class="form-group">
				<label>Tanggal Awal</label>
				<input type="date"  class="form-control" name="awal" id="awal" value="" placeholder="Isi tgl awal " required>
			</div>
<div class="form-group">
				<label>Tanggal Akhir</label>
				<input type="date"  class="form-control" name="akhir" id="akhir" value=""  placeholder="Isi tgl akhir" required>
			</div>
			
		
			
			
			<button type="submite" name="submit" onclick="ctk();" class="btn btn-success btn-user btn-block">Cetak</button>
			<hr>
	</div>	
</div>
</div>
<script type="text/javascript">
	function ctk(){
	var awal=$('#awal').val();
	var akhir =$('#akhir').val();
	if(akhir<awal){
	alert("Tanggal Awal Tidak boleh Lebih Kecil Dari Tanggal Akhir");
}else{
	popupwindow('cetaktrans.php?awal='+awal+'&akhir='+akhir);
}}
function popupwindow(url, title, w, h) {
    var y = window.outerHeight / 2 + window.screenY - ( 500 / 2)
    var x = window.outerWidth / 2 + window.screenX - ( 600 / 2)
    return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + y + ', left=' + x);
} 
</script>