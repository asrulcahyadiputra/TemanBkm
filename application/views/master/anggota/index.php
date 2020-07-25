<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Anggota</h4>
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
					<a href="#">Anggota</a>
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
										<h4 class="card-title">Daftar Anggota</h4>
									</div>
									<div class="card-body">
										<ul class="nav nav-pills nav-secondary  nav-pills-no-bd nav-pills-icons justify-content-center" id="pills-tab-with-icon" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="pills-home-tab-icon" data-toggle="pill" href="#pills-home-icon" role="tab" aria-controls="pills-home-icon" aria-selected="true">
													<i class="icon-user-following"></i>
													Aktif
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-profile-tab-icon" data-toggle="pill" href="#pills-profile-icon" role="tab" aria-controls="pills-profile-icon" aria-selected="false">
													<i class="icon-clock"></i>
													Calon
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-contact-tab-icon" data-toggle="pill" href="#pills-contact-icon" role="tab" aria-controls="pills-contact-icon" aria-selected="false">
													<i class="icon-user-unfollow"></i>
													Non Aktif
												</a>
											</li>
										</ul>
										<div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
											<div class="tab-pane fade show active" id="pills-home-icon" role="tabpanel" aria-labelledby="pills-home-tab-icon">
												<div class="table-responsive">
													<!-- anggota aktif -->
													<table class="table table-hover basic-datatables">
														<thead>
															<tr>
																<th>#</th>
																<th>No Anggota</th>
																<th>Nama Anggota</th>
																<th>Tempat, Tanggal Lahir</th>
																<th>No Telp</th>
																<th>Saldo</th>
																<th>Aksi</th>
															</tr>
														</thead>
														<tbody>
															<?php
															$no = 1;
															foreach ($anggota_tetap as $at) : ?>
																<tr id="<?= $at->id_anggota ?>">
																	<td><?= $no++ ?></td>
																	<td><?= $at->id_anggota ?></td>
																	<td><?= $at->nama_anggota ?></td>
																	<td><?= $at->tempat_lahir . ', ' . mediumdate_indo($at->tgl_lahir) ?></td>
																	<td><?= $at->no_telp ?></td>
																	<td>
																		<?php
																		$saldo = $at->s_debet - $at->s_kredit;
																		echo nominal($saldo);
																		?>
																	</td>
																	<td>
																		<button data-toggle="tooltip" data-placement="top" title="Non Aktifkan Anggota" class="btn btn-danger btn-sm remove"><i class="icon-user-unfollow"></i></button>
																	</td>
																</tr>
															<?php endforeach ?>
														</tbody>
													</table>
												</div>
											</div>
											<div class="tab-pane fade" id="pills-profile-icon" role="tabpanel" aria-labelledby="pills-profile-tab-icon">
												<div class="table-responsive">
													<!-- anggota Calon -->
													<table class="table table-hover basic-datatables">
														<thead>
															<tr>
																<th>#</th>
																<th>Kode Pendaftaran</th>
																<th>Nama Anggota</th>
																<th>Tempat, Tanggal Lahir</th>
																<th>No Telp</th>
																<th>Status</th>
																<th>Aksi</th>
															</tr>
														</thead>
														<tbody>
															<?php
															$no = 1;
															foreach ($anggota_calon as $at) : ?>
																<tr>
																	<td><?= $no++ ?></td>
																	<td><?= $at->kode_pendaftaran ?></td>
																	<td><?= $at->nama_anggota ?></td>
																	<td><?= $at->tempat_lahir . ', ' . mediumdate_indo($at->tgl_lahir) ?></td>
																	<td><?= $at->no_telp ?></td>
																	<td>
																		<span class="badge badge-primary"> <i class="icon-clock"></i> Menunggu Pembayaran</span>
																	</td>
																	<td>
																		<a title="Pembayaran" href="<?= site_url('Pendaftaran/pembayaran/' . $at->id_anggota) ?>"><i class="icon-check"></i></a>
																	</td>
																</tr>
															<?php endforeach ?>
														</tbody>
													</table>
												</div>
											</div>
											<div class="tab-pane fade" id="pills-contact-icon" role="tabpanel" aria-labelledby="pills-contact-tab-icon">
												<!-- anggota aktif -->
												<table class="table table-hover basic-datatables">
													<thead>
														<tr>
															<th>#</th>
															<th>No Anggota</th>
															<th>Nama Anggota</th>
															<th>Tempat, Tanggal Lahir</th>
															<th>No Telp</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$no = 1;
														foreach ($anggota_blokir as $at) : ?>
															<tr id="<?= $at->id_anggota ?>">
																<td><?= $no++ ?></td>
																<td><?= $at->id_anggota ?></td>
																<td><?= $at->nama_anggota ?></td>
																<td><?= $at->tempat_lahir . ', ' . mediumdate_indo($at->tgl_lahir) ?></td>
																<td><?= $at->no_telp ?></td>
																<td>
																	<button data-toggle="tooltip" data-placement="top" title="Aktifkan Anggota" class="btn btn-primary btn-sm activated"><i class="icon-user-follow"></i></button>
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
</div>
