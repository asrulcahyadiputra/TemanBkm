<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Komponen SHU</h4>
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
					<a href="<?= site_url('Master_shu') ?>">Komponen SHU</a>
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
										<h4 class="card-title">Komponen Pembagian Sisa Hasil Usaha (SHU)</h4>
										<div class="d-flex align-items-center">
											<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#masterShu">
												<i class="fa fa-plus"></i>
												Tambah Komponen
											</button>
										</div>

									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="display table table-hover custom-datatables">
												<thead>
													<tr class="text-center">
														<th>#</th>
														<th>Kode Komponen</th>
														<th>Komponen</th>
														<th>Persentase</th>
														<th>Tahun</th>
														<th>Keterangan</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($master_shu as $h) : ?>
														<tr>
															<td><?= $no++ ?></td>
															<td><?= $h->id_shu ?></td>
															<td><?= $h->komponen ?></td>
															<td class="text-center"><?= $h->persentase . ' %' ?></td>
															<td class="text-center"><?= $h->tahun ?></td>
															<td><?= $h->keterangan ?></td>
															<td>
																<a href="" class="text-warning"><i class="fa fa-edit"></i></a>
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
<div class="modal fade" id="masterShu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Komponen SHU</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('Master_shu/store') ?>" method="POST">
					<div class="form-group">
						<label for="">ID Komponen</label>
						<input type="text" name="id_shu" id="" class="form-control" value="<?= $id_shu ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Komponen SHU</label>
						<input type="text" name="komponen" id="" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Persentase</label>
						<input type="text" name="persentase" id="" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Tahun</label>
						<input type="number" min="1" name="tahun" id="" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Keterangan</label>
						<textarea name="keterangan" id="" cols="30" rows="3" class="form-control" required></textarea>
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
