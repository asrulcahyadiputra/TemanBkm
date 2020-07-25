<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title"><?= $anggota['nama_anggota'] ?></h4>
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
					<a href="<?= site_url('Invoice') ?>">Generate Invoice</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('Invoice/detail/' . $id_periode) ?>"><?= $id_periode ?></a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#"><?= $anggota['nama_anggota'] ?></a>
				</li>
			</ul>
		</div>
		<div class="row justify-content-center">
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses') ?>"></div>
			<div class="col-12 col-lg-10 col-xl-9">
				<div class="row align-items-center">
					<div class="col">
						<h6 class="page-pretitle">
							Payments
						</h6>
						<h4 class="page-title">Invoice #<?= $id_invoice ?></h4>
						<?php
						$total = $wajib['nominal'] + $tunggakan['tunggakan'];
						?>
					</div>
					<div class="col-auto">
						<?php if ($invoice) : ?>
							<?php if ($invoice['status'] == 0) : ?>
								<a href="#" class="btn btn-light btn-border">
									Cetak Incoice
								</a>
								<a href="#" class="btn btn-primary ml-2">
									Bayar
								</a>
							<?php endif ?>
							<?php if ($invoice['status'] == 1) : ?>
								<a href="#" class="btn btn-light btn-border">
									Cetak Invoice
								</a>
							<?php endif ?>
						<?php endif ?>
						<?php if (!$invoice) : ?>
							<a href="<?= site_url('Invoice/kirim/' . $id_periode . '/' . $id_anggota . '/' . $id . '/' . $total) ?>" class="btn btn-warning btn-border" data-toggle="tooltip" data-placement="top" title="Kirim Invoice">
								Kirim Invoice
							</a>
						<?php endif ?>
					</div>
				</div>
				<div class="page-divider"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="card card-invoice">
							<div class="card-header">
								<div class="invoice-header">
									<h3 class="invoice-title">
										Invoice
									</h3>
								</div>
								<div class="invoice-desc">
									<?= $bkm['kode_bkm'] . ' - ' . $bkm['nama_bkm'] ?> <br>
									<?= $bkm['alamat'] ?><br />
									Hp <?= $bkm['no_telp'] ?>
								</div>
							</div>
							<div class="card-body">
								<div class="separator-solid"></div>
								<div class="row">
									<div class="col-md-4 info-invoice">
										<h5 class="sub">Tanggal</h5>
										<p><?= mediumdate_indo($detail['tgl_periode']) ?></p>
									</div>
									<div class="col-md-4 info-invoice">
										<h5 class="sub">No Invoice</h5>
										<p>#<?= $id_invoice ?></p>
									</div>
									<div class="col-md-4 info-invoice">
										<h5 class="sub">Kepada</h5>
										<p>
											<?= $anggota['id_anggota'] . ' - ' . $anggota['nama_anggota'] ?><br>
											<?php
											if ($invoice) {
												if ($invoice['status'] == 0) {
													echo "<span class='badge badge-danger'> Belum Bayar</span>";
												} else {
													echo "<span class='badge badge-success'> Sudah Bayar</span>";
												}
											} else {
												echo "<span class='badge badge-warning'> Belum Ditagih</span>";
											}
											?>
										</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="invoice-detail">
											<div class="invoice-top">
												<h3 class="title"><strong>Detail Tagihan</strong></h3>
											</div>
											<div class="invoice-item">
												<div class="table-responsive">
													<table class="table table-striped">
														<thead>
															<tr>
																<td colspan="3"><strong>Komponen</strong></td>
																<td class="text-right"><strong>Total</strong></td>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td colspan="3"><?= $wajib['id_jenis'] . ' - ' . $wajib['nama_jenis'] ?></td>
																<td class="text-right"><?= nominal($wajib['nominal']) ?></td>
															</tr>
															<tr>
																<td colspan="3">Tunggakan</td>
																<td class="text-right"><?= nominal($tunggakan['tunggakan']) ?></td>
															</tr>
															<tr>
																<th class="text-right" colspan="3">Total</th>
																<th class="text-right"><?= nominal($total) ?></th>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="card-footer">
								<h6 class="text-uppercase mt-4 mb-3 fw-bold">
									Notes
								</h6>
								<p class="text-muted mb-0">
									<?php
									if (!$invoice) {
										echo "Invoice Belum Dikirimkan Ke Anggota";
									} else {
									}
									?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
