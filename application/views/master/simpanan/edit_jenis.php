<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Update Jenis Simpanan</h4>
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
					<a href="<?= site_url('Simpanan') ?>">Simpanan</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('Jenis_simpanan') ?>">Jenis Simpanan</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Update Jenis Simpanan</a>
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
										<h4 class="card-title">Form Update Jenis Pinjaman</h4>
									</div>
									<div class="card-body">
										<form action="<?= site_url('Jenis_simpanan/edit') ?>" method="POST">
											<div class="form-group">
												<label for="">ID Jenis Simpanan</label>
												<input type="text" name="id_jenis" id="" value="<?= $jenis['id_jenis'] ?>" class="form-control" readonly>
											</div>
											<div class="form-group">
												<label for="">Jenis Simpanan</label>
												<input type="text" name="nama_jenis" id="" class="form-control" value="<?= $jenis['nama_jenis'] ?>">
											</div>
											<div class="form-group">
												<label for="">Besar Simpanan</label>
												<input type="text" name="nominal" id="nominal" class="form-control" value="<?= nominal($jenis['nominal']) ?>">
											</div>
											<div class="form-group">
												<div class="form-check">
													<label class="form-check-label">
														<input name="ket" class="form-check-input" type="checkbox" value="1">
														<span class="form-check-sign">Cicilan</span>
													</label>
												</div>
											</div>
											<div class="py-3 text-center">
												<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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





<script>
	var rupiah1 = document.getElementById("nominal");
	rupiah1.addEventListener("keyup", function(e) {
		rupiah1.value = convertRupiah(this.value, "Rp ");
	});
	rupiah1.addEventListener('keydown', function(event) {
		return isNumberKey(event);
	});

	var rupiah2 = document.getElementById("p1");
	rupiah2.addEventListener("keyup", function(e) {
		rupiah2.value = convertRupiah(this.value, "Rp. ");
	});
	rupiah2.addEventListener('keydown', function(event) {
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
