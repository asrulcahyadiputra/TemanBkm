<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Tambah Jenis Tabungan</h4>
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
					<a href="<?= site_url('Produk_simpanan') ?>">Jenis Tabungan</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Tambah Jenis Tabungan</a>
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
										<h4 class="card-title">Form Tambah Produk Simpanan</h4>
									</div>
									<div class="card-body">
										<form action="<?= site_url('Produk_simpanan/insert') ?>" method="POST">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="">ID Produk Simpanan</label>
														<input type="text" name="id_p_simpanan" id="" value="<?= $kode ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Nama Simpanan</label>
														<input type="text" name="nama_simpanan" id="" class="form-control  <?= form_error('nama_simpanan') != '' ? 'is-invalid' : '' ?>" value="<?= set_value('nama_simpanan') ?>">
														<div class="invalid-feedback">
															<?= form_error('nama_simpanan') ?>
														</div>
													</div>

												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Minimal Setoran Awal</label>
														<input type="text" name="awal_minimal" id="nominal1" class="form-control <?= form_error('awal_minimal') != '' ? 'is-invalid' : '' ?>" value="<?= set_value('awal_minimal') ?>">
														<div class="invalid-feedback">
															<?= form_error('awal_minimal') ?>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for=""> Minimal Setoran Selanjutnya </label>
														<input type="text" name="setoran_minimal" id="nominal2" class="form-control <?= form_error('setoran_minimal') != '' ? 'is-invalid' : '' ?>" value="<?= set_value('setoran_minimal') ?>">
														<div class="invalid-feedback">
															<?= form_error('setoran_minimal') ?>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for=""> Saldo Minimal </label>
														<input type="text" name="saldo_minimal" id="nominal3" class="form-control <?= form_error('saldo_minimal') != '' ? 'is-invalid' : '' ?>" value="<?= set_value('saldo_minimal') ?>">
														<div class="invalid-feedback">
															<?= form_error('saldo_minimal') ?>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for=""> Biaya Administrasi </label>
														<input type="text" name="biaya_adm" id="nominal4" class="form-control <?= form_error('biaya_adm') != '' ? 'is-invalid' : '' ?>" value="<?= set_value('biaya_adm') ?>">
														<div class="invalid-feedback">
															<?= form_error('biaya_adm') ?>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for=""> Biaya Tutup Rekening </label>
														<input type="text" name="biaya_tutup" id="nominal5" class="form-control <?= form_error('biaya_tutup') != '' ? 'is-invalid' : '' ?>" value="<?= set_value('biaya_tutup') ?>">
														<div class="invalid-feedback">
															<?= form_error('biaya_tutup') ?>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Bunga / Tahun</label>
														<input name="bunga" class="form-control <?= form_error('bunga') != '' ? 'is-invalid' : '' ?>" value="<?= set_value('bunga') ?>" type="text">
														<div class="invalid-feedback">
															<?= form_error('bunga') ?>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 text-center py-3">
													<a href="<?= site_url('Produk_simpanan') ?>" class="btn btn-danger"><i class="icon-close"></i> Batal</a>
													<button class="btn btn-primary" type="submit"> <i class="icon-check"></i> Simpan</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
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
