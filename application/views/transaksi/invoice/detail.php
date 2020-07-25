<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title"><?= $id ?></h4>
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
					<a href="#"><?= $id ?></a>
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
										<h4 class="card-title"># <?= $id . ' - ' . bulan(date('m', strtotime($periode['periode']))) . ' ' . date('Y', strtotime($periode['periode'])) ?></h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="display table table-hover">
												<thead>
													<tr class="bg-light">
														<th class="text-center">Tanggal</th>
														<th>Anggota</th>
														<th>Simpanan Wajib</th>
														<th class="text-center">Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$count = 0;
													foreach ($d_periode as $d) : ?>
														<?php foreach ($anggota as $a) : ?>
															<?php
															$tgl_awal = date_create(date('Y-m-d', strtotime($a->date_created)));
															$tgl_akhir = date_create($d->tgl_periode);
															$total_a   = date_diff($tgl_akhir, $tgl_awal);
															$total_akhir = $total_a->days;
															?>
															<?php if ($total_akhir == $t_hari['jumlah_hari'] && $total_akhir > 0) : ?>
																<tr>
																	<td class="text-center"><?= mediumdate_indo($d->tgl_periode) ?></td>
																	<td>
																		<p><?= $a->id_anggota . ' - ' . $a->nama_anggota ?></p>
																	</td>
																	<td><?= nominal($wajib['nominal']) ?></td>
																	<td class="text-center">
																		<a href="<?= site_url('Invoice/invoice/' . $d->id_periode . '/' . $a->id_anggota . '/' . $d->id) ?>" data-toggle="tooltip" data-placement="top" title="Invoice">
																			<i class="icon-eyeglass"></i>
																		</a>
																	</td>
																</tr>
															<?php endif ?>
														<?php endforeach ?>
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
