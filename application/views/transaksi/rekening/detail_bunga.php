<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Generate</h4>
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
					<a href="<?= site_url('Rekening/generate') ?>">Periode</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="">Generate</a>
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
										<h4 class="card-title">Generate Bunga Per <?= $hari . ' ' . bulan($bulan) . ' ' . $tahun ?></h4>
									</div>
									<div class="card-body">
										<div class="table-resvonsive">
											<div class="row">
												<div class="col-md-12">
													<div class="alert alert-warning" role="alert">
														<i class="fas fa-exclamation-triangle text-warning"> Warning !</i> <br>
														Mohon cek dengan seksama proses perhitungan di bawah ini, Jika Benar silahkan ceklis pada baris yang anda setujui. <br>
														Sistem menganggap 1 bulan adalah 30 Hari.
													</div>
												</div>
											</div>

											<form action="" method="POST">
												<table class="table table-hover">
													<thead>
														<tr class="bg-light text-center">
															<th class="text-center">
																<label class="form-check-label">
																	<input class="form-check-input all" type="checkbox" value="">
																</label>
															</th>
															<th>No Rekening</th>
															<th>Jenis Tabungan</th>
															<th>Bunga / Tahun</th>
															<th>Saldo Terendah</th>
															<th>Bunga</th>
															<th>Biaya ADM</th>
															<th>Biaya Tutup</th>
															<th>Estimisai Saldo</th>
														</tr>
													</thead>
													<tbody>
														<?php if ($rekening) : ?>
															<?php $no = 1;
															foreach ($rekening as $r) : ?>
																<tr>
																	<td class="text-center">
																		<label class="form-check-label">
																			<input name="no_rekening[]" class="form-check-input check" type="checkbox" value="<?= $r->no_rekening ?>" required>
																		</label>
																	</td>
																	<td>
																		<?= $r->no_rekening ?>
																	</td>
																	<td><?= $r->nama_simpanan ?></td>
																	<td class="text-center"><?= $r->bunga . ' %' ?></td>
																	<td class="text-right"><?= nominal(min([$r->saldo])) ?></td>
																	<td class="text-right">
																		<?php
																		$bunga_setahun = $r->bunga / 100;
																		$hari_setahun = 360;
																		$saldo = $r->saldo;
																		$bunga = $saldo * ($bunga_setahun * (30 / $hari_setahun));
																		echo nominal($bunga);
																		?>
																	</td>
																	<td class="text-right"><?= nominal($r->biaya_adm) ?></td>
																	<td class="text-reghit"><?= nominal($r->biaya_tutup) ?></td>
																	<td class="text-right">
																		<?php
																		$biaya_adm = $r->biaya_adm;
																		$biaya_tutup = $r->biaya_tutup;
																		$estimasi_saldo = (($saldo + $bunga) - ($biaya_adm + $biaya_tutup));
																		echo nominal($estimasi_saldo);
																		?>
																	</td>
																</tr>
															<?php endforeach ?>
														<?php endif ?>
														<?php if (!$rekening) : ?>
															<tr>
																<td class="text-center" colspan="9">
																	---Saldo Tidak Ditemukan Untuk Bulan ini---
																</td>
															</tr>
														<?php endif ?>
													</tbody>
												</table>
											</form>
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
