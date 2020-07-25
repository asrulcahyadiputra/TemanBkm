<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Simpanan</h4>
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
					<a href="#">Simapanan</a>
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
										<h4 class="card-title">Daftar Simpanan Anggota</h4>
										<!-- <div class="d-flex align-items-center">
											<a href="<?= site_url('Produk_simpanan/insert') ?>" class="btn btn-primary btn-round ml-auto">
												<i class="fa fa-plus"></i>
												Tambah Produk Simpanan
											</a>
										</div> -->
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="display table table-hover basic-datatables">
												<thead>
													<tr class="text-center">
														<th style="font-size: 13px;">#</th>
														<th style="font-size: 13px;">No Anggota</th>
														<th tyle="font-size: 13px;">Nama Anggota</th>
														<th style="font-size: 13px;">Simpanan Pokok</th>
														<th style="font-size: 13px;">Simpanan Wajib</th>
														<th style="font-size: 13px;">Simpanan Sukarela</th>
														<th style="font-size: 13px;">Total</th>
													</tr>

												</thead>
												<?php
												$no = 1;
												$total = 0;
												foreach ($simpanan as $s) : ?>
													<tbody>
														<tr>
															<td style="font-size: 13px;"><?= $no++ ?></td>
															<td style="font-size: 13px;"><?= $s->no_anggota ?></td>
															<td style="font-size: 13px;"><?= $s->nama ?></td>
															<td style="font-size: 13px;" class="text-right"><?= nominal($s->simpanan_pokok) ?></td>
															<td style="font-size: 13px;" class="text-right"><?= nominal($s->simpanan_wajib) ?></td>
															<td style="font-size: 13px;" class="text-right"><?= nominal($s->simpanan_sukarela) ?></td>
															<td style="font-size: 13px;" class="text-right"><?= nominal($s->simpanan_pokok + $s->simpanan_wajib + $s->simpanan_sukarela) ?></td>
														</tr>
													</tbody>
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
