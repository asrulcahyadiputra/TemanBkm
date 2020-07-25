<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Penyetoran</h4>
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
					<a href="#">Penyetoran</a>
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
										<h4 class="card-title">Form Penyetoran</h4>
									</div>
									<div class="card-body">
										<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses') ?>"></div>
										<div class="row">
											<div class="col-md-12">
												<div class="card-body">
													<form action="<?= site_url('Penyetoran/store') ?>" method="POST">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Anggota</label>
																	<select width="100%" name="id_anggota" id="idAnggota" class="form-control mx-sm-3 select2" required>
																		<option value="">--pilih--</option>
																		<?php foreach ($anggota as $a) : ?>
																			<option value="<?= $a->id_anggota ?>"><?= $a->id_anggota . ' - ' . $a->nama_anggota ?></option>
																		<?php endforeach ?>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Rekening Tujuan</label>
																	<select width="100%" name="no_rekening" id="noRekening" class="form-control mx-sm-3 select2" required>
																		<option value="">--pilih Anggota--</option>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Minimal Setoran</label>
																	<div id="setoranMinimal">
																		<input type="text" name="minimal" class="form-control" value="Rp 0" readonly>
																	</div>

																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Masukkan Setoran</label>
																	<input type="text" name="nominal" id="nominal1" class="form-control" required>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group text-center">
																	<a href="<?= site_url('Penyetoran') ?>" class="btn btn-danger"><i class="icon-cancel"></i> Batal</a>
																	<button type="submit" class="btn btn-primary"><i class="icon-check"></i>Simpan</button>
																</div>
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
</div>

<script>
	var rupiah1 = document.getElementById("nominal1");
	rupiah1.addEventListener("keyup", function(e) {
		rupiah1.value = convertRupiah(this.value, "Rp ");
	});
	rupiah1.addEventListener('keydown', function(event) {
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
