<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href=" <?= base_url() . 'assets/img/favicon.ico' ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url() . 'assets/img/favicon.ico' ?>" type="image/x-icon">
    
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font-Awesome -->
	<link href="<?= 'assets/pengusul/admin-lte/' ?>plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- Sweet Alert 2 -->
	<link href="<?= 'assets/pengusul/admin-lte/' ?>plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
	<!-- Bootstrap CSS -->
	<link href="<?= 'assets/pengusul/admin-lte/' ?>css/adminlte.min.css" rel="stylesheet">

	<title><?= $title ?> - PSIKOTES SIM</title>
</head>

<body class="hold-transition layout-top-nav">
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand-md navbar-dark shadow" style="background: #478ac9; border: 0;">
			<div class="container">
				<a href="<?= base_url('dashboard') ?>" class="navbar-brand">
					<span class="brand-text">PSIKOTES SIM</span>
				</a>
				<?php if ($title != "Lupa Password") : ?>
					<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
						<li class="nav-item dropdown">
							<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?= $profil->nama_lengkap ?></a>
							<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
								<!-- <li><a href="#" class="dropdown-item"><i class="fas fa-user-circle"></i> Ubah Akun</a></li>
								<li class="dropdown-divider"></li> -->
								<li><a href="<?= base_url('logout') ?>" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Keluar</a>
								</li>
							</ul>
						</li>
					</ul>
				<?php endif; ?>
			</div>
		</nav>
		<div class="content-wrapper pt-5 bg-white">
			<section class="content bg-white">
				<div class="container pb-4">