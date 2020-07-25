<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Periode <?= bulan($bulan) . ' ' . $tahun ?></h4>
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
					<a href="">Periode <?= bulan($bulan) . ' ' . $tahun ?></a>
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
										<h4 class="card-title">Periode <?= bulan($bulan) . ' ' . $tahun ?></h4>
									</div>
									<div class="card-body">
										<div class="table-resvonsive">
											<table class="table table-bordered">
												<thead>
													<tr class="text-center bg-light">
														<th>Aksi</th>
														<th>Tanggal</th>
														<th>Rekening</th>
													</tr>
												</thead>
												<tbody>
													<?php for ($i = 1; $i < $hari; $i++) : ?>
														<?php foreach ($listing as $l) : ?>
															<?php
															$year = date('Y', strtotime($l->tgl1));
															$day = date('d', strtotime($l->tgl1));
															$month = date('m', strtotime($l->tgl1));
															if ($year == date('Y')) {
																$awal = $month;
															}
															?>
															<?php if ($year == $tahun) ?>
															<?php if ($bulan >  $awal) : ?>
																<?php if ($day == $i) : ?>
																	<?php $convert = $tahun . '-' . $bulan . '-' . $i;
																	$date = date('Y-m-d', strtotime($convert)); ?>
																	<tr>
																		<td class="text-center" style="vertical-align: middle;" rowspan="<?= $l->row + 1 ?>">
																			<a href="<?= site_url('Rekening/detail_bunga/' . $id . '/' . $convert) ?>"><i class="fas fa-calculator"></i> Generate</a>
																		</td>
																		<td class="text-center" style="vertical-align: middle;" rowspan="<?= $l->row + 1 ?>">
																			<?php

																			echo mediumdate_indo($date);

																			?>
																		</td>
																	</tr>
																	<?php foreach ($rekening as $r) : ?>
																		<?php if ($r->tgl_pembuatan == $l->tgl1) : ?>
																			<tr>
																				<td><?= $r->no_rekening . ' [' . $r->nama_simpanan . '] / ' . ' [Pemilik: ' . $r->nama_anggota . ']' ?></td>
																			</tr>
																		<?php endif ?>
																	<?php endforeach ?>
																<?php endif ?>
															<?php endif ?>
														<?php endforeach ?>
													<?php endfor ?>
													<!-- tahun beda -->
													<?php for ($i = 1; $i < $hari; $i++) : ?>
														<?php foreach ($listing as $l) : ?>
															<?php
															$year = date('Y', strtotime($l->tgl1));
															$day = date('d', strtotime($l->tgl1));
															$month = date('m', strtotime($l->tgl1));
															if ($year == date('Y')) {
																$awal = $month + 1;
															}
															?>
															<?php if ($year != $tahun) : ?>
																<?php if ($day == $i) : ?>
																	<?php $convert = $tahun . '-' . $bulan . '-' . $i;
																	$date = date('Y-m-d', strtotime($convert)); ?>
																	<tr>
																		<td class="text-center" style="vertical-align: middle;" rowspan="<?= $l->row + 1 ?>">
																			<a href="<?= site_url('Rekening/detail_bunga/' . $id . '/' . $convert) ?>"><i class="fas fa-calculator"></i> Generate</a>
																		</td>
																		<td class="text-center" style="vertical-align: middle;" rowspan="<?= $l->row + 1 ?>">
																			<?php

																			echo mediumdate_indo($date);

																			?>
																		</td>
																	</tr>
																	<?php foreach ($rekening as $r) : ?>
																		<?php if ($r->tgl_pembuatan == $l->tgl1) : ?>
																			<tr>
																				<td><?= $r->no_rekening . ' [' . $r->nama_simpanan . '] / ' . ' [Pemilik: ' . $r->nama_anggota . ']' ?></td>
																			</tr>
																		<?php endif ?>
																	<?php endforeach ?>
																<?php endif ?>
															<?php endif ?>
														<?php endforeach ?>
													<?php endfor ?>
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
