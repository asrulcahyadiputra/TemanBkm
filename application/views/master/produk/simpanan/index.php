<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Jenis Tabungan</h4>
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
					<a href="#">Jenis Tabungan</a>
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
										<h4 class="card-title">Daftar Jenis Tabungan</h4>
										<div class="d-flex align-items-center">
											<a href="<?= site_url('Produk_simpanan/insert') ?>" class="btn btn-primary btn-round ml-auto">
												<i class="fa fa-plus"></i>
												Tambah Produk Simpanan
											</a>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="basic-datatables" class="display table table-hover">
												<thead>
													<tr>
														<th style="font-size: 12px;">#</th>
														<th style="font-size: 12px;">Kode Produk</th>
														<th style="font-size: 12px;">Nama Simpanan</th>
														<th style="font-size: 12px;">Setoran Awal</th>
														<th style="font-size: 12px;">Setoran Minimal</th>
														<th style="font-size: 12px;">Saldo Minimal</th>
														<th style="font-size: 12px;">Biaya ADM</th>
														<th style="font-size: 12px;">Biaya Tutup</th>
														<th style="font-size: 12px;">Bunga /Tahun</th>
														<th style="font-size: 12px;">Penyetoran</th>
														<th style="font-size: 12px;">Penarikan</th>
														<th style="font-size: 12px;">Berjangka</th>
														<th style="font-size: 12px;">Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($produk as $p) : ?>
														<tr>
															<td style="font-size: 11px;"><?= $no++ ?></td>
															<td style="font-size: 11px;"><?= $p->id_p_simpanan ?></td>
															<td style="font-size: 11px;"><?= $p->nama_simpanan ?></td>
															<td style="font-size: 11px;"><?= nominal($p->awal_minimal) ?></td>
															<td style="font-size: 11px;"><?= nominal($p->setoran_minimal) ?></td>
															<td style="font-size: 11px;"><?= nominal($p->saldo_minimal) ?></td>
															<td style="font-size: 11px;"><?= nominal($p->biaya_adm) ?></td>
															<td style="font-size: 11px;"><?= nominal($p->biaya_tutup) ?></td>
															<td class="text-center" style="font-size: 11px;"><?= $p->bunga . ' %' ?></td>
															<td style="font-size: 11px;" class="text-center">
																<?php
																if ($p->setor  == 1) {
																	echo "<span class='badge badge-success' ><i class='icon-check' ></i></span>";
																} else {
																	echo "<span class='badge badge-danger' ><i class='icon-ban' ></i></span>";
																}

																?>
															</td>
															<td style="font-size: 11px;" class="text-center">
																<?php
																if ($p->penarikan  == 1) {
																	echo "<span class='badge badge-success' ><i class='icon-check' ></i></span>";
																} else {
																	echo "<span class='badge badge-danger' ><i class='icon-ban' ></i></span>";
																}

																?>
															</td>
															<td style="font-size: 11px;" class="text-center">
																<?php
																if ($p->level  == 1) {
																	echo "<span class='badge badge-success' ><i class='icon-check' ></i></span>";
																} else {
																	echo "<span class='badge badge-danger' ><i class='icon-close' ></i></span>";
																}

																?>
															</td>
															<td style="font-size: 11px;"></td>
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
