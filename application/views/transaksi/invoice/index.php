<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Generate Invoice</h4>
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
					<a href="#">Generate Invoice</a>
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
										<h4 class="card-title">Generate Invoice</h4>
										<div class="d-flex align-items-center">
											<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#Periode">
												<i class="fa fa-plus"></i>
												Tambah Periode Invoice
											</button>
										</div>
										<div>
											<pre>
												<label for=""></label>
											</pre>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="display table table-hover basic-datatables">
												<thead>
													<tr class="text-center">
														<th>#</th>
														<th>Kode Periode</th>
														<th>Periode Tagihan</th>
														<th>Total Hari</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

													<?php
													$no = 1;
													foreach ($periode as $p) : ?>
														<tr>
															<td class="text-center"><?= $no++ ?></td>
															<td><?= $p->id_periode ?></td>
															<td class="text-center">
																<?= bulan(date('m', strtotime($p->periode))) . ' ' . date('Y', strtotime($p->periode)) ?>
															</td>
															<td class="text-center"><?= $p->total_hari . ' Hari' ?></td>
															<td class="text-center">
																<a href="<?= site_url('Invoice/detail/' . $p->id_periode) ?>" data-toggle="tooltip" data-placement="top" title="Lihat Daftar Invoice">
																	<i class="icon-book-open"></i>
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
