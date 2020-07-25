<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Update Komponen Biaya</h4>
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
					<a href="#">Master Data</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('Komponen_biaya') ?>">Komponen Biaya</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Update Komponen Biaya</a>
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
										<h4 class="card-title">Form Update Komponen Biaya</h4>
									</div>
									<div class="card-body">
										<form action="<?= site_url('Komponen_biaya/edit/' . $komponen['id_komponen']) ?>" method="POST">
											<div class="form-group">
												<label for="">ID Komponen Biaya</label>
												<input type="text" name="id_komponen" id="" value="<?= $komponen['id_komponen'] ?>" class="form-control" readonly>
											</div>
											<div class="form-group">
												<label for="">Komponen Biaya</label>
												<input type="text" name="komponen_biaya" id="" class="form-control" value="<?= $komponen['komponen_biaya'] ?>" required>
											</div>
											<div class="form-group">
												<label for="">Besar Biaya</label>
												<input type="text" name="nominal" id="nominal" class="form-control" value="<?= nominal($komponen['nominal']) ?>" required>
											</div>
											<div class="form-group">
												<label for="">Keterangan</label>
												<select name="tipe" id="" class="form-control" required>
													<option value="">--pilih--</option>
													<option value="1">Peratahun</option>
													<option value="2">Perbulan</option>
													<option value="3">Pendaftaran</option>
												</select>
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
