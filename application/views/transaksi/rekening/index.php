<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Rekening</h4>
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
					<a href="">Rekening</a>
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
										<h4 class="card-title">Daftar Rekening</h4>
										<div class="d-flex align-items-center">
											<a href="<?= site_url('Rekening/insert') ?>" class="btn btn-primary btn-round ml-auto">
												<i class="fas fa-folder-open"></i>
												Buka Rekening
											</a>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover basic-datatables">
												<thead>
													<tr>
														<th>No</th>
														<th>No Rekening</th>
														<th>Tabungan</th>
														<th>Nasabah</th>
														<th>NIK</th>
														<th>Saldo</th>
														<th>Status</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php $no = 1;
													foreach ($rekening as $r) : ?>
														<tr>
															<td><?= $no++ ?></td>
															<td><?= $r->no_rekening ?></td>
															<td><?= $r->nama_simpanan ?></td>
															<td><?= $r->nama_anggota ?></td>
															<td><?= $r->nik ?></td>
															<td>
																<?= nominal($r->s_debet - $r->s_kredit) ?>
															</td>
															<td>
																<?php if ($r->status == 1) : ?>
																	<span class="badge badge-success"><i class="icon-check"></i></span>
																<?php endif ?>
																<?php if ($r->status == 0) : ?>
																	<span class="badge badge-danger"><i class="icon-close"></i></span>
																<?php endif ?>
															</td>
															<td>
																<a title="Detail" href="<?= site_url('Rekening/select/' . $r->no_rekening) ?>"><i class="fas fa-search"></i></a>
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
