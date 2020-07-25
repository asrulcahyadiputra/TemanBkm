<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Charts Of Account</h4>
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
					<a href="#">Charts Of Account</a>
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
										<h4 class="card-title">Daftar Charts Of Account</h4>
										<div class="d-flex align-items-center">
											<a href="<?= site_url('Coa/insert') ?>" class="btn btn-primary btn-round ml-auto">
												<i class="fa fa-plus"></i>
												Tambah CoA
											</a>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="display table table-hover basic-datatables">
												<thead>
													<tr>
														<th>#</th>
														<th>Akun</th>
														<th>Saldo Normal</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

													<?php $no = 1;
													foreach ($coa as $c) : ?>
														<?php if ($c->header != 0 && $c->sub_header != 0) : ?>
															<tr>
																<td><?= $no++ ?></td>
																<td><?= $c->kode_akun . ' - ' . $c->akun ?></td>
																<td>
																	<?php
																	if ($c->saldo_normal == 'dr') {
																		echo "Debet";
																	} else {
																		echo "Kredit";
																	}
																	?>
																</td>
																<td>
																	<a href="<?= site_url('Coa/update/' . $c->kode_akun) ?>" class="text-warning btn-update">
																		<i class="fas fa-edit"></i>
																	</a>
																</td>
															</tr>
														<?php endif ?>
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
