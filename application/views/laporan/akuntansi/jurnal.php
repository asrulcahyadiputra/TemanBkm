<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Jurnal Umum</h4>
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
					<a href="#">Akuntansi</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Jurnal Umum</a>
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
										<h4 class="card-title">Pilih Periode Jurnal :</h4>
										<form class="form-inline">
											<label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
											<div class="input-group mb-2 mr-sm-2">
												<div class="input-group-prepend">
													<div class="input-group-text">Bulan</div>
												</div>
												<input type="month" class="form-control" name="periode" id="inlineFormInputGroupUsername2" placeholder="Username">
											</div>
											<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-eye"></i></button>
										</form>
									</div>
								</div>
								<div class="card">
									<div class="card-header text-center">
										<h4 class="card-title"><?= $bkm['nama_bkm'] ?></h4>
										<h4>Jurnal Umum</h4>
										<h4>Periode Juli 2020</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr class="bg-light">
														<th>#</th>
														<th>Kode Transaksi</th>
														<th>Tanggal</th>
														<th colspan="2">Nama Akun</th>
														<th>Debet</th>
														<th>Kredit</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$debet = 0;
													$kredit = 0;
													$no = 1;
													foreach ($row as $r1) : ?>
														<tr>
															<td rowspan="<?= $r1->rows + 1 ?>"><?= $no++ ?></td>
															<td rowspan="<?= $r1->rows + 1 ?>"><?= $r1->ref ?></td>
															<td rowspan="<?= $r1->rows + 1 ?>"><?= mediumdate_indo($r1->tgl_jurnal) ?></td>
														</tr>
														<?php foreach ($jurnal as $r2) : ?>
															<?php if ($r1->ref == $r2->ref) : ?>
																<tr>
																	<!-- nama akun -->
																	<?php if ($r2->posisi_dr_cr == 'dr') : ?>
																		<td><?= $r2->kode_akun . ' ' . $r2->akun ?></td>
																		<td></td>
																	<?php endif ?>
																	<?php if ($r2->posisi_dr_cr == 'cr') : ?>
																		<td></td>
																		<td><?= $r2->kode_akun . ' ' . $r2->akun ?></td>
																	<?php endif ?>
																	<!-- nominal -->
																	<?php if ($r2->posisi_dr_cr == 'dr') : ?>
																		<?php $debet = $debet + $r2->nominal ?>
																		<td><?= nominal($r2->nominal) ?></td>
																	<?php endif ?>
																	<td></td>
																	<?php if ($r2->posisi_dr_cr == 'cr') : ?>
																		<?php $kredit = $kredit + $r2->nominal ?>
																		<td><?= nominal($r2->nominal) ?></td>
																	<?php endif ?>
																</tr>
															<?php endif ?>
														<?php endforeach ?>
													<?php endforeach ?>
												</tbody>
												<tfoot>
													<th class="text-center" colspan="5">Balance</th>
													<th><?= nominal($debet) ?></th>
													<th><?= nominal($kredit) ?></th>
												</tfoot>
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
