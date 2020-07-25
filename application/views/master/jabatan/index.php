<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Jabatan</h4>
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
					<a href="">Data master</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Jabatan</a>
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
										<h4 class="card-title">Daftar Jabatan</h4>
										<div class="d-flex align-items-center">
											<a class="btn btn-primary btn-round ml-auto" href="<?= site_url('Master_jabatan/insert') ?>">
												<i class="fa fa-plus"></i>
												Tambah Jabatan
											</a>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="basic-datatables" class="display table table-hover">
												<thead>
													<tr>
														<th>#</th>
														<th>Kode Jabatan</th>
														<th>Jabatan</th>
														<th>Gaji Pokok</th>
														<th>THR</th>
														<th>Tunjangan Lain</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($jabatan as $j) : ?>
														<tr>
															<td><?= $no++ ?></td>
															<td><?= $j->id_jabatan ?></td>
															<td><?= $j->jabatan ?></td>
															<td><?= nominal($j->gaji_pokok) ?></td>
															<td><?= nominal($j->thr) ?></td>
															<td><?= nominal($j->tunjangan_lain) ?></td>
															<td>
																<a href="<?= site_url('Master_jabatan/update/' . $j->id_jabatan) ?>" class="text-warning" data-toggle="tooltip" data-placement="top" title="Edit Jabatan"><i class="fa fa-edit"></i></a>
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
