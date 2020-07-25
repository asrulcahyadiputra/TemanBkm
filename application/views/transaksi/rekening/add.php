<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Tambah Rekening</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="<?= site_url('Dashboard') ?>">
						<i class="flaticon-home"></i>
					</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Transaksi</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('Rekening') ?>">Rekening</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="">Tambah Rekening</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses') ?>"></div>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Cari Anggota / Nasabah</h4>
									</div>
									<div class="card-body">
										<form method="POST" action="<?= site_url('Rekening/insert') ?>" class="form-inline">

											<div class="form-group">

												<select width="100%" name="anggota" id="inputPassword6" class="form-control mx-sm-3 select2">
													<option value="">--pilih--</option>
													<?php foreach ($anggota as $a) : ?>
														<option value="<?= $a->id_anggota ?>"><?= $a->id_anggota . ' - ' . $a->nama_anggota ?></option>
													<?php endforeach ?>
												</select>

											</div>
											<button type="submit" class="btn btn-primary btn-sm "><i class="fas fa-search"></i></button>
										</form>
									</div>
								</div>
								<!-- result -->
								<?php if ($status == 1) : ?>
									<div class="card">
										<div class="card-header">
											<h4 class="card-title">Form Buat Rekening Baru</h4>
										</div>
										<div class="card-boy">
											<form action="<?= site_url('Rekening/store') ?>" method="POST">
												<!-- data anggota -->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="">No Anggota</label>
															<input type="text" name="id_anggota" id="" class="form-control" value="<?= $ag['id_anggota'] ?>" readonly>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="">Nama Anggota</label>
															<input type="text" name="nama_anggota" value="<?= $ag['nama_anggota'] ?>" class="form-control" readonly>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="">NIK</label>
															<input type="text" name="nik" value="<?= $ag['nik'] ?>" class="form-control" readonly>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="">Tempat, Tanggal Lahir</label>
															<input type="text" name="ttl" value="<?= $ag['tempat_lahir'] . ', ' . mediumdate_indo($ag['tgl_lahir']) ?>" class="form-control" readonly>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="">Saldo Simpanan Anggota</label>
															<input type="text" name="saldo" class="form-control" value="<?= nominal($ag['s_debet'] - $ag['s_kredit']) ?>" readonly>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="">Tunggakan</label>
															<input type="text" name="saldo" class="form-control" value="<?= nominal($ag['tunggakan']) ?>" readonly>
														</div>
													</div>
												</div>
												<!-- form rekening -->
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="">No Rekening</label>
															<input readonly class="form-control" type="text" name="no_rekening" value="<?= $no_rek ?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="">Pilih Jenis Simpanan</label>
															<select name="id_p_simpanan" id="jenisSimpanan" class="form-control select2" width="100%" required>
																<option value="">--pilih--</option>
																<?php foreach ($jenis as  $j) : ?>
																	<option value="<?= $j->id_p_simpanan ?>"><?= $j->nama_simpanan . ' Bunga ' . $j->bunga . ' % / Tahun' ?></option>
																<?php endforeach ?>
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label for="">Setoran Awal Minimal</label>
															<div id="setoranAwal">

															</div>

														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label for="">Setoran Awal</label>
															<input type="text" id="nominal1" name="setoran_awal" class="form-control" required>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 text-center">
														<div class="form-group">
															<a href="<?= site_url('Rekening') ?>" class="btn btn-danger"><i class="icon-close"></i> Batal</a>
															<button type="submit" class="btn btn-primary"><i class="icon-check"></i> Simpan</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	var rupiah1 = document.getElementById("nominal1");
	rupiah1.addEventListener("keyup", function(e) {
		rupiah1.value = convertRupiah(this.value, "Rp ");
	});
	rupiah1.addEventListener('keydown', function(event) {
		return isNumberKey(event);
	});

	var rupiah2 = document.getElementById("nominal2");
	rupiah2.addEventListener("keyup", function(e) {
		rupiah2.value = convertRupiah(this.value, "Rp. ");
	});
	rupiah2.addEventListener('keydown', function(event) {
		return isNumberKey(event);
	});

	var rupiah3 = document.getElementById("nominal3");
	rupiah3.addEventListener("keyup", function(e) {
		rupiah3.value = convertRupiah(this.value, "Rp. ");
	});
	rupiah3.addEventListener('keydown', function(event) {
		return isNumberKey(event);
	});

	var rupiah4 = document.getElementById("nominal4");
	rupiah4.addEventListener("keyup", function(e) {
		rupiah4.value = convertRupiah(this.value, "Rp. ");
	});
	rupiah4.addEventListener('keydown', function(event) {
		return isNumberKey(event);
	});

	var rupiah5 = document.getElementById("nominal5");
	rupiah5.addEventListener("keyup", function(e) {
		rupiah5.value = convertRupiah(this.value, "Rp. ");
	});
	rupiah5.addEventListener('keydown', function(event) {
		return isNumberKey(event);
	});

	function convertRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
			split = number_string.split(","),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah += separator + ribuan.join(".");
		}

		rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
		return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
	}

	function isNumberKey(evt) {
		key = evt.which || evt.keyCode;
		if (key != 188 // Comma
			&&
			key != 8 // Backspace
			&&
			key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
			&&
			(key < 48 || key > 57) // Non digit
		) {
			evt.preventDefault();
			return;
		}
	}
</script>
