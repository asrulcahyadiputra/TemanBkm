<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Periode</h4>
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
					<a href="<?= site_url('Rekening') ?>">Rekening</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Periode</a>
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
										<h4 class="card-title">Periode Generate Bunga</h4>
										<div class="d-flex align-items-center">
											<button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addPeriode">
												<i class="icon-plus"></i>
												Tambah Periode
											</button>
										</div>
									</div>
									<div class="card-body">
										<div class="table-resvonsive">
											<table class="table table-hover basic-datatables">
												<thead>
													<tr>
														<th>#</th>
														<th>Id Periode</th>
														<th>Periode</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<?php
												$no = 1;
												foreach ($periode as $p) : ?>
													<tr>
														<td><?= $no++ ?></td>
														<td><?= $p->id_periode ?></td>
														<td><?= mediumdate_indo($p->periode) ?></td>
														<td>
															<a href="<?= site_url('Rekening/detail_periode/' . $p->id_periode . '/' . $p->periode) ?>"><i class="fas fa-search"></i></a>
														</td>
													</tr>
												<?php endforeach ?>
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
<div class="modal fade" id="addPeriode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Periode</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('Rekening/store_periode') ?>" method="POST">
					<label for="">Periode <small class="text-danger">Masukkan Tanggal Akhir Bulan</small> </label>
					<input type="month" name="periode" id="" class="form-control" required>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>
