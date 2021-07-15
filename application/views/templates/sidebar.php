<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<?php $id = $this->session->userdata('id');
	$profil = $this->db->where('id_user', $id)->get('profil')->row(); ?>
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Psikologi SIM Online</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item" id="master-dashboard">
		<a class="nav-link" href="<?= base_url('dashboardAdmin') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Pengusul
	</div>

	<li class="nav-item" id="master-ujian">
		<a class="nav-link" href="<?= base_url('ujianPengusul') ?>">
			<i class="fas fa-tasks"></i>
			<span>Ujian</span></a>
	</li>

	<!-- Nav Item - Tables -->
	<li class="nav-item" id="master-sertifikat">
		<a class="nav-link" href="<?= base_url('sertifikatPengusul') ?>">
			<i class="fas fa-certificate"></i>
			<span>Sertifikat</span></a>
	</li>

	<li class="nav-item" id="master-akunPengusul">
		<a class="nav-link" href="<?= base_url('akunPengusul') ?>">
			<i class="fas fa-user"></i>
			<span>Akun Pengusul</span></a>
	</li>


	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Master
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
			<i class="fas fa-fw fa-folder"></i>
			<span>Soal</span>
		</a>
		<div id="collapsePages" class="collapse master-sidebar" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('subtes1') ?>" id="sub-subtes1">Stabilitas Emosi</a>
				<a class="collapse-item" href="<?= base_url('subtes2') ?>" id="sub-subtes2">Pengendalian Diri</a>
				<a class="collapse-item" href="<?= base_url('subtes3') ?>" id="sub-subtes3">Penyesuaian Diri</a>
				<a class="collapse-item" href="<?= base_url('subtes4') ?>" id="sub-subtes4">Ketahanan</a>
				<a class="collapse-item" href="<?= base_url('subtes5') ?>" id="sub-subtes5">Kecermatan</a>
				<a class="collapse-item" href="<?= base_url('subtes6') ?>" id="sub-subtes6">Konsentrasi</a>
				<a class="collapse-item" href="<?= base_url('standarKelulusan') ?>" id="standar-kelulusan">Standar Kelulusan</a>
				<a class="collapse-item" href="<?= base_url('pengaturanSoal') ?>" id="pengaturan-soal">Pengaturan Soal</a>
			</div>
		</div>
	</li>


	<!-- Nav Item - Charts -->
	<li class="nav-item" id="master-bank">
		<a class="nav-link" href="<?= base_url('administrasi') ?>">
			<i class="fas fa-landmark"></i>
			<span>Administrasi</span></a>
	</li>

	<!-- Nav Item - Tables -->
	<li class="nav-item" id="master-instansi">
		<a class="nav-link" href="<?= base_url('instansi') ?>">
			<i class="fas fa-building"></i>
			<span>Instansi</span></a>
	</li>

	<li class="nav-item" id="master-akunAdmin">
		<a class="nav-link" href="<?= base_url('akunAdmin') ?>">
			<i class="fas fa-user"></i>
			<span>Akun Admin</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
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

				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $profil->nama_lengkap ?></span>
						<!-- <img class="img-profile rounded-circle" src="<?= "assets/" ?>img/undraw_profile.svg"> -->
						<i class="fas fa-angle-down"></i>
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="<?= base_url('profil') ?>">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Profil
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?= base_url('logout') ?>">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Keluar
						</a>
					</div>
				</li>

			</ul>

		</nav>
		<!-- End of Topbar -->

		<!-- Begin Page Content -->