<!-- purple x moss 2020 -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/4b9ba14b0f.js" crossorigin="anonymous"></script>
	<title>Warning</title>
	<style>
		body {
			background-color: #95c2de;
		}

		.mainbox {
			background-color: #95c2de;
			margin: auto;
			height: 600px;
			width: 600px;
			position: relative;
		}

		.err {
			color: #ffffff;
			font-family: 'Nunito Sans', sans-serif;
			font-size: 11rem;
			position: absolute;
			left: 20%;
			top: 8%;
		}

		.far {
			position: absolute;
			font-size: 8.5rem;
			left: 42%;
			top: 15%;
			color: #ffffff;
		}

		.err2 {
			color: #ffffff;
			font-family: 'Nunito Sans', sans-serif;
			font-size: 11rem;
			position: absolute;
			left: 68%;
			top: 8%;
		}

		.msg {
			text-align: justify;
			font-family: 'Nunito Sans', sans-serif;
			font-size: 1.6rem;
			position: absolute;
			left: 16%;
			top: 45%;
			width: 75%;
		}

		a {
			text-decoration: none;
			color: white;
		}

		a:hover {
			text-decoration: underline;
		}
	</style>
</head>

<body>
	<div class="mainbox">
		<div class="err">4</div>
		<i class="far fa-question-circle fa-spin"></i>
		<div class="err2">3</div>
		<div class="msg">
			<p>Mohon maaf atas ketidaknyamanan ini untuk alasan keamanan, akun anda di block sementara !</p>
			<p>
				Percobaan Login Anda telah Mencapai Batas Toleransi Sistem, anda dapat mencoba login dalam 1 X 24 Jam atau anda dapat menghubungi admin untuk membuka block akun Anda.
			</p>
			<p><a href="<?= site_url('Auth') ?>">Kembali</a></p>
		</div>
	</div>
</body>

</html>
