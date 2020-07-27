<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="<?= base_url() ?>assets/img/icon.ico" type="image/x-icon" />
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?= base_url() ?>login/css/style.css" />
	<title><?= $title ?></title>
</head>

<body>
	<div class="container">
		<div class="forms-container">
			<div class="signin-signup">
				<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses') ?>"></div>
				<form action="<?= site_url('Auth/validate') ?>" method="POST" class="sign-in-form">
					<h2 class="title">Login</h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input name="username" type="text" placeholder="Username" required />
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input name="password" type="password" placeholder="Password" required />
					</div>
					<input type="submit" value="Login" class="btn solid" />
				</form>
			</div>
		</div>

		<div class="panels-container">
			<div class="panel left-panel">
				<div class="content">
					<h3>Selamat Datang di Aplikasi TemanBKM</h3>
					<p>
						Sistem Informasi Pengelolaan Badan Keswadayaan Masyarakat
					</p>
				</div>
				<img src="<?= base_url() ?>login/img/log.svg" class="image" alt="" />
			</div>
		</div>
	</div>
	<script src="<?= base_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<!-- Sweet Alert -->
	<script src="<?= base_url() ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="<?= base_url() ?>assets/js/myscript.js"></script>
</body>

</html>
