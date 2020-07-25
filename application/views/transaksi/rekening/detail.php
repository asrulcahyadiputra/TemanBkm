<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title"><?= $rek['no_rekening'] ?></h4>
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
					<a href="#">Transaksi</a>
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
					<a href="#"><?= $rek['no_rekening'] ?></a>
				</li>

			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses') ?>"></div>
						<div class="row">
							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title"><?= $rek['no_rekening'] . '-' . $rek['nama_simpanan'] ?></h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table">
												<tr>
													<th class="bg-light" colspan="2">Data Rekening</th>
												</tr>
												<tr>
													<td>Nama Pemilik</td>
													<td>: <?= $rek['nama_anggota'] ?></td>

												</tr>
												<tr>
													<td>Tanggal Pembukaan</td>
													<td>: <?= mediumdate_indo(date('Y-m-d', strtotime($rek['tgl_pembuatan']))) ?></td>
												</tr>
												<tr>
													<td>Saldo</td>
													<td>: <?= nominal($rek['s_debet'] - $rek['s_kredit']) ?></td>

												</tr>
												<tr>
													<td>Status</td>
													<td>:
														<?php if ($rek['status'] == 1) : ?>
															<span class="badge badge-success">Aktif</span>
														<?php endif ?>
													</td>
												</tr>
												<tr>
													<td>Saldo Minimal</td>
													<td>: <?= nominal($rek['saldo_minimal']) ?></td>

												</tr>
												<tr>
													<td>Rekomendasi</td>
													<td>
														<?php
														$saldo = $rek['s_debet'] - $rek['s_kredit'];
														if ($saldo <= $rek['saldo_minimal']) {
															echo "<p>Saldo telah sampai ke batas minimal saldo, segera hubungi pemilik rekening. Jika Tidak ada penyetoran saldo sampai Bulan depan, Segera lakukan pemblokiran rekening !</p>";
														} else {
															echo "<p>-</p>";
														}
														?>
													</td>
												</tr>
												<tr>
													<td>Jatuh Tempo</td>
													<td>: <?= mediumdate_indo($rek['jatuh_tempo']) ?></td>
												</tr>
												<tr>
													<td>Bunga</td>
													<td>: <?= $rek['bunga'] . '% /Tahun' ?></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="card">
									<div class="card-header">
										<div class="d-flex align-items-center">
											<a href="<?= site_url('Rekening/blokir') ?>" class="btn btn-danger btn-round ml-auto">
												<i class="icon-close"></i>
												Blokir Rekening
											</a>
										</div>
									</div>
									<div class="card-body">
										<div class="table-resvonsive">

											<!-- riwayt transaksi -->
											<table class="table table-hover">
												<thead>
													<tr>
														<th colspan="5" class="bg-light">History Transaksi</th>
													</tr>
													<tr>
														<th>#</th>
														<th>Tanggal</th>
														<th>Debet</th>
														<th>Kredit</th>
														<th>Saldo</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													$posisi = 0;
													foreach ($detail as $d) : ?>
														<tr>
															<td><?= $no++ ?></td>
															<td><?= shortdate_indo(date('Y-m-d', strtotime($d->tgl_setor))) ?></td>
															<!-- item -->
															<?php if ($d->ket == 'dr') : ?>
																<td><?= nominal($d->nominal) ?></td>
															<?php endif ?>
															<td></td>
															<?php if ($d->ket == 'cr') : ?>
																<td><?= nominal($d->nominal) ?></td>
															<?php endif ?>

															<?php if ($d->ket == 'dr') : ?>
																<td>
																	<?php $posisi = $posisi + $d->nominal;
																	echo nominal($posisi);
																	?>
																</td>
															<?php endif ?>
															<?php if ($d->ket == 'cr') : ?>
																<td>
																	<?php $posisi = $posisi - $d->nominal;
																	echo nominal($posisi);
																	?>
																</td>
															<?php endif ?>


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
