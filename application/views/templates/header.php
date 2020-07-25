<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?= $title ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url() ?>assets/img/icon.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="<?= base_url() ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['<?= base_url() ?>assets/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/atlantis.min.css">
	<!-- select2 -->
	<link href="<?= base_url() ?>assets/select2/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
	<div class="wrapper <?= $level == 1 ? 'sidebar_minimize' : '' ?>">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				<a href="<?= site_url('Dashboard') ?>" class="logo">
					<img src="<?= base_url() ?>assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>

						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">1</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 1 new notification</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span>
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">Quick Actions</span>
									<span class="subtitle op-8">Shortcuts</span>
								</div>
								<div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Generated Report</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-database"></i>
													<span class="text">Create New Database</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-pen"></i>
													<span class="text">Create New Post</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-interface-1"></i>
													<span class="text">Create New Task</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-list"></i>
													<span class="text">Completed Tasks</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file"></i>
													<span class="text">Create New Invoice</span>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?= base_url() ?>assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?= base_url() ?>assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>Asrul Cahyadi Putra</h4>
												<a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>
										<a class="dropdown-item" href="#">My Balance</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?= base_url() ?>assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Asrul Cahyadi Putra
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item <?= $this->uri->segment(1) == 'Dashboard'  ? 'active' : '' ?>">
							<a href="<?= site_url('Dashboard') ?>" class="collapsed">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('Profile') ?>">
								<i class="fas fa-address-card"></i>
								<p>Profil BKM</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Data Master</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?= site_url('Master_jabatan') ?>">
											<span class="sub-item">Jabatan</span>
										</a>
									</li>
									<li>
										<a href="">
											<span class="sub-item">Pengurus</span>
										</a>
									</li>
									<li>
										<a href="<?= site_url('User') ?>">
											<span class="sub-item">Users</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#simpanan">
								<i class="fas fa-book"></i>
								<p>Simpanan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="simpanan">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?= site_url('Simpanan') ?>">
											<span class="sub-item">Simpanan</span>
										</a>
									</li>
									<li>
										<a href="<?= site_url('Jenis_simpanan') ?>">
											<span class="sub-item">Jenis Simpanan</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#anggota">
								<i class="fas fa-users"></i>
								<p>Anggota</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="anggota">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?= site_url('Pendaftaran') ?>">
											<span class="sub-item">Pendaftaran</span>
										</a>
									</li>
									<li>
										<a href="<?= site_url('Anggota') ?>">
											<span class="sub-item">Anggota</span>
										</a>
									</li>
									<li>
										<a href="">
											<span class="sub-item">Undian</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#rekening">
								<i class="fas fa-money-check"></i>
								<p>Rekening</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="rekening">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?= site_url('Rekening') ?>">
											<span class="sub-item">Rekening Nasabah</span>
										</a>
									</li>
									<li>
										<a href="<?= site_url('Rekening/generate') ?>">
											<span class="sub-item">Generate Bunga</span>
										</a>
									</li>
									<li>
										<a href="<?= site_url('Penyetoran') ?>">
											<span class="sub-item">Penyetoran</span>
										</a>
									</li>
									<li>
										<a href="<?= site_url('Penarikan') ?>">
											<span class="sub-item">Penarikan</span>
										</a>
									</li>
									<li>
										<a href="<?= site_url('Produk_simpanan') ?>">
											<span class="sub-item">Jenis Tabungan</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#kas">
								<i class="fas fa-coins"></i>
								<p>Keuangan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="kas">
								<ul class="nav nav-collapse">
									<li>
										<a href="">
											<span class="sub-item">Kas Masuk</span>
										</a>
									</li>
									<li>
										<a href="">
											<span class="sub-item">Kas Keluar</span>
										</a>
									</li>
									<li>
										<a href="<?= site_url('Invoice') ?>">
											<span class="sub-item">Genearate Invoice</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#aset">
								<i class="fas fa-boxes"></i>
								<p>Manajemen Aset</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="aset">
								<ul class="nav nav-collapse">
									<li>
										<a href="">
											<span class="sub-item">Pengadaan</span>
										</a>
									</li>
									<li>
										<a href="">
											<span class="sub-item">Daftar Aset</span>
										</a>
									</li>
									<li>
										<a href="">
											<span class="sub-item">Jenis Aset</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#akuntansi">
								<i class="fas fa-file-invoice-dollar"></i>
								<p>Akuntansi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="akuntansi">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?= site_url('Jurnal') ?>">
											<span class="sub-item">Jurnal Umum</span>
										</a>
									</li>
									<li>
										<a href="">
											<span class="sub-item">Buku Besar</span>
										</a>
									</li>
									<li>
										<a href="<?= site_url('Coa') ?>">
											<span class="sub-item">Charts Of Account</span>
										</a>
									</li>
									<li>
										<a href="<?= site_url('Komponen_biaya') ?>">
											<span class="sub-item">Komponen Biaya</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
		<div class="main-panel">
