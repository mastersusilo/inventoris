<!-- pembuatan card : informasi agregat (informasi umum) -->
<div class="row">
<?php

$tahun=date('Y');//ambil data tahun sekarang
$bulan=date('m');//ambil data tanggal hari ini
$antri=mysqli_query($kon,"SELECT * from pasien where status=1");
$dantri=mysqli_num_rows($antri);

$pbulan=mysqli_query($kon,"SELECT distinct a.no_rm FROM rm a,pasien b,detail c where a.no_pasien=b.idpasien and a.no_rm=c.no_rm and Month(c.tgl)='$bulan' and YEAR(c.tgl)='$tahun'");
$dpbulan=mysqli_num_rows($pbulan);

$tgl=date('Y-m-d');//ambil data tanggal bulan tahun hari ini
$phari=mysqli_query($kon,"SELECT distinct a.no_rm FROM rm a,pasien b,detail c where a.no_pasien=b.idpasien and a.no_rm=c.no_rm and c.tgl='$tgl'");
$dphari=mysqli_num_rows($phari);


$pasien=mysqli_query($kon,"SELECT distinct a.no_rm FROM rm a,pasien b,detail c where a.no_pasien=b.idpasien and a.no_rm=c.no_rm");
$dpasien=mysqli_num_rows($pasien);
?>

<!-- Card pendapatan total -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase
mb-1">
                     Pasien Total</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo
$dpasien;?></div>
               </div>
               <div class="col-auto">
               <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
        </div>
    </div>
</div>


<!-- Card Pendapatan bulanan -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase
mb-1">
                        Pasien Bulan ini</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo
$dpbulan;?></div>
                    </div>
                    <div class="col-auto">
                         <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
            </div>
        </div>
    </div>
</div>


<!-- Card Penjualan Hari ini -->
<div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-left-info shadow h-100 py-2">
         <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-
1">Pasien Hari ini
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dphari;?></div>
                 </div>
                 <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                 </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase
mb-1">
                        Pasien Antri</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo
$dantri;?></div>
                    </div>
                    <div class="col-auto">
                         <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Akhir pembuatan card : informasi agregat (informasi umum) -->


<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> 
			<?php
			echo strtoupper($_SESSION ['hakakses']);
			?> Area </h6>
	</div>
	<div class="card-body">
		<p>
			Selamat Datang
			<?php
			echo $_SESSION ['namapengguna'];
			?>.
		</p>
	</div>
</div>


