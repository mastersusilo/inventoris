<?php
session_start();
if (!$_SESSION["username"]) 
{
	header('location:../index.php?err=1');
	exit;
}
include("../koneksidb.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Aplikasi Penjualan Resto">
	<meta name="author" content="Sulis">

	<title> SISTEM Informasi Rekam Medis</title>
	<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<link href="../css/sb-admin-2.min.css" rel="stylesheet">

	<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
	<!-- Page Wraper -->
	<div id="wrapper">

	<!--Sidebar-->
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-hospital"></i>
		</div>
		<div class="sidebar-brand-text mx-3">SISFO RM</div>
	</a>

	<!-- Divider-->
	<hr class="sidebar-divider my-0">

	<!--Nav Item - Dashboard-->
	<li class="nav-item active">
		<a class="nav-link" href="index.php">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
<?php
//admin
if($_SESSION["hakakses"] =="Admin"){

?>	<hr class="sidebar-divider">
	<li class="nav-item">
		<a class="nav-link" href="index.php?halaman=datapengguna">
		<i class="fas fa-user fa-table"></i>
		<span>Pengguna</span></a>
	</li>

    <hr class="sidebar-divider">
	<li class="nav-item">
		<a class="nav-link" href="index.php?halaman=datapasien">
		<i class="fas fa-user  fa-book"></i>
		<span>Pasien</span></a>
	</li>
	 <hr class="sidebar-divider">
	<li class="nav-item">
		<a class="nav-link" href="index.php?halaman=dataobat">
		<i class="fas fa-user  fa-book"></i>
		<span>Obat</span></a>
	</li>

	<hr class="sidebar-divider">
	<li class="nav-item">
		<a class="nav-link" href="index.php?halaman=dataregistrasi">
		<i class="fas fa-ceklist fa-th"></i>
		<span>Rekam Medis</span></a>
	</li>

	<hr class="sidebar-divider">
	<li class="nav-item">
		<a class="nav-link" href="index.php?halaman=datatr">
		<i class="fas fa-ceklist fa-th"></i>
		<span>Transaksi</span></a>
	</li>
	<hr class="sidebar-divider">
	<li class="nav-item">
		<a class="nav-link" href="index.php?halaman=datatransaksi">
		<i class="fas fa-ceklist fa-th"></i>
		<span>Nota & Resep</span></a>
	</li>
<?php }
//Apoteker
if($_SESSION["hakakses"] =="Apoteker"){

?>	
	 <hr class="sidebar-divider">
	<li class="nav-item">
		<a class="nav-link" href="index.php?halaman=dataobat">
		<i class="fas fa-user  fa-book"></i>
		<span>Obat</span></a>
	</li> 
	<hr class="sidebar-divider">
	<li class="nav-item">
		<a class="nav-link" href="index.php?halaman=transaksi">
		<i class="fas fa-ceklist fa-th"></i>
		<span>Transaksi</span></a>
	</li>
	<hr class="sidebar-divider">
	<li class="nav-item">
		<a class="nav-link" href="index.php?halaman=cetaktr">
		<i class="fas fa-user  fa-book"></i>
		<span>Nota & Transaksi</span></a>
	</li>

	
<?php }
//Dpkter
if($_SESSION["hakakses"] =="Dokter"){

?>	

  
	

	<hr class="sidebar-divider">
	<li class="nav-item">
		<a class="nav-link" href="index.php?halaman=dataregistrasi">
		<i class="fas fa-ceklist fa-th"></i>
		<span>Rekam Medis</span></a>
	</li>
<?php }
if($_SESSION["hakakses"] =="Perawat"){

?>	

    <hr class="sidebar-divider">
	<li class="nav-item">
		<a class="nav-link" href="index.php?halaman=datapasien">
		<i class="fas fa-user  fa-book"></i>
		<span>Pasien</span></a>
	</li>
	
 <hr class="sidebar-divider">
	<li class="nav-item">
		<a class="nav-link" href="index.php?halaman=datarm">
		<i class="fas fa-book  fa-book"></i>
		<span>Cetak RM</span></a>
	</li>
	
	
<?php }
?>
<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
	</ul>

	<!-- End of sidebar -->

	<!-- Content wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">

	<!-- Topbar -->
	<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

	<!-- Sidebar Toggle (Topbar) -->
	<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		<i class="fa fa-bars"></i>
	</button>


	<!-- Topbar Navbar -->
	<ul class="navbar-nav ml-auto">
		
		<div class="topbar-divider d-none d-sm-block"></div>
		<li  class="nav-item dropdown no-arrow">
		<a  class="nav-link dropdown-toggle" href="#"  id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="mr-2 d-none d-lg-inline text-gray-600 small">
			<?php 
			echo $_SESSION['namapengguna'];
			?></span>	
			<span class="fas fa-user"></span>
		</a>
		<!-- Dropdown - User Information -->
		<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
			<a class="dropdown-item" href="#">
				<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
				<?php
				echo $_SESSION ['namapengguna'];
				?>
			</a>
			<a class="dropdown-item" href="#">
				<i class="fas fa-microchip fa-sm fa-fw mr-2 text-gray-400"></i>
				<?php
				echo $_SESSION ['hakakses']
				?>
			</a>  

			<div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        	<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        	Logout
        </a>
		</div>	
		</li>
	</ul>
	</nav>	
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="Container-fluid">
	<?php	
		if (!isset($_GET['halaman'])) {
			include('home.php');
		}
		else if ($_GET['halaman']=='datapengguna') {
			include('datapengguna.php');
		}
        else if ($_GET['halaman']=='editdatapengguna') {
			include('editdatapengguna.php');
		}

		else if ($_GET['halaman']=='datapasien') {
			include('datapasien.php');
		}else if ($_GET['halaman']=='datarm') {
			include('datarm.php');
		}
			else if ($_GET['halaman']=='dataobat') {
			include('dataobat.php');
		}

        else if ($_GET['halaman']=='inputdatapasien') {
			include('inputdatapasien.php');
		}
		 else if ($_GET['halaman']=='inputdataobat') {
			include('inputdataobat.php');
		}
		 else if ($_GET['halaman']=='inputtransaksi') {
			include('inputtransaksi.php');
		}
		 else if ($_GET['halaman']=='cetaktr') {
			include('cetaktr.php');}

			else if ($_GET['halaman']=='cetaktrans') {
			include('cetaktrans.php');
		}else if ($_GET['halaman']=='transaksi') {
			include('transaksi.php');
		}else if ($_GET['halaman']=='periode') {
			include('periode.php');
		}else if ($_GET['halaman']=='editdatapasien') {
			include('editdatapasien.php');
		}
		else if ($_GET['halaman']=='cetaknota') {
			include('cetaknota.php');
		}
		else if ($_GET['halaman']=='detailtransaksi') {
			include('detailtransaksi.php');
		}
		 else if ($_GET['halaman']=='editdataobat') {
			include('editdataobat.php');
		}

        else if ($_GET['halaman']=='dataregistrasi') {
			include('dataregistrasi.php');
		}
		 else if ($_GET['halaman']=='lihatrm') {
			include('lihatrm.php');
		}
		else if ($_GET['halaman']=='datatransaksi') {
			include('datatransaksi.php');
		}

        else if ($_GET['halaman']=='inputdataregistrasi') {
			include('inputdataregistrasi.php');
		}
		  else if ($_GET['halaman']=='inputdataregistrasilama') {
			include('inputdataregistrasilama.php');
		}
		else if ($_GET['halaman']=='inputdatatransaksi') {
			include('inputdatatransaksi.php');
		}

      
			?>
</div>
<!--/.container-fluid-->
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy;Your Website 2022</span>
		</div>
	</div>
</footer>
<!-- end of Footer -->
</div>

<!-- End of Content Wrapper -->

<!--Scroll to Top Button -->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>	
				</button>
			</div>
	<div class="modal-body">Select "Logout" below if you are ready to enf your current session.</div>	
		<div class="modal-footer">
		<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
		<a class="btn btn-primary" href="../keluar.php">Logout</a>
		</div>	
	  </div>
	</div>
</div>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../js/sb-admin-2.min.js"></script>
<script src="../vendor/chart.js/Chart.min.js"></script>
<script src="../js/demo/chart-area-demo.js"></script>
<script src="../js/demo/chart-pie-demo.js"></script>
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../js/demo/datatables-demo.js"></script>

</body>
</html>
