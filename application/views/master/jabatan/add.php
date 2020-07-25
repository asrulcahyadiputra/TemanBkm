<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Tambah Jabatan</h4>
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
					<a href="#">Data master</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('Master_jabatan') ?>">Jabatan</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Tambah Jabatan</a>
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
										<h4 class="card-title">Form Tambah Jabatan</h4>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<form action="<?= site_url('Master_jabatan/store') ?>" method="POST">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label for="">Kode Jabatan</label>
																<input type="text" name="id_jabatan" value="<?= $id_jabatan ?>" class="text form-control" readonly>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<label for="">Jabatan</label>
																<input type="text" name="jabatan" id="" class="form-control" required>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<label for="">Gaji Pokok</label>
																<input type="text" name="gaji_pokok" id="nominal1" class="form-control" required>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<label for="">Tunjangan Hari Raya</label>
																<input type="text" name="thr" id="nominal2" class="form-control" required>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<label for="">Tunjangan Lain</label>
																<input type="text" name="tunjangan_lain" id="nominal3" class="form-control" required>
															</div>
														</div>
													</div>
													<div class="col-md-12 text-center">
														<div class="form-group">
															<a href="<?= site_url('Master_jabatan') ?>" class="btn btn-danger"> Batal</a>
															<button type="submit" class="btn btn-primary"> Simpan</button>
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
