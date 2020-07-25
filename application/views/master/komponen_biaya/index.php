<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Komponen Biaya</h4>
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
					<a href="#">Akuntansi</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Komponen Biaya</a>
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
										<h4 class="card-title">Daftar Komponen Biaya</h4>
										<div class="d-flex align-items-center">
											<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addKomponen">
												<i class="fa fa-plus"></i>
												Tambah Komponen Biaya
											</button>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="basic-datatables" class="display table table-hover">
												<thead>
													<tr>
														<th>#</th>
														<th>Kode Komponen Biaya</th>
														<th>Komponen Biaya</th>
														<th>Besaran Biaya</th>
														<th>Tipe</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($komponen as $k) : ?>
														<tr>
															<td><?= $no++ ?></td>
															<td><?= $k->id_komponen ?></td>
															<td><?= $k->komponen_biaya ?></td>
															<td><?= nominal($k->nominal) ?></td>
															<td>
																<?php
																if ($k->tipe == 1) {
																	echo 'Pertahun';
																} elseif ($k->tipe == 2) {
																	echo 'Perbulan';
																} else {
																	echo 'Pendaftaran';
																}
																?>
															</td>
															<td>
																<a href="<?= site_url('Komponen_biaya/update/' . $k->id_komponen) ?>" class="text-warning btn-update">
																	<i class="fas fa-edit"></i>
																</a>
															</td>
														</tr>
													<?php endforeach ?>
												</tbody>
											</table>
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




<!-- Modal -->
<div class="modal fade" id="addKomponen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Komponene Biaya</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('Komponen_biaya/store') ?>" method="POST">
					<div class="form-group">
						<label for="">ID Komponen Biaya</label>
						<input type="text" name="id_komponen" id="" value="<?= $kode ?>" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label for="">Komponen Biaya</label>
						<input type="text" name="komponen_biaya" id="" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Besar Biaya</label>
						<input type="text" name="nominal" id="nominal" class="form-control" required>
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
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
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
