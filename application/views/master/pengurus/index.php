<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Pengurus</h4>
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
					<a href="">Data master</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Pengurus</a>
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
										<h4 class="card-title">Daftar Pengurus</h4>
										<div class="d-flex align-items-center">
											<a class="btn btn-primary btn-round ml-auto" href="<?= site_url('Master_pengurus/insert') ?>">
												<i class="fa fa-plus"></i>
												Tambah Pengurus
											</a>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="" class="display table table-hover basic-datatables">
												<thead>
													<tr>
														<th style="font-size: 11px;">#</th>
														<th style="font-size: 11px;">ID Pengurus</th>
														<th style="font-size: 11px;">NIK</th>
														<th style="font-size: 11px;">Nama</th>
														<th style="font-size: 11px;">Jenis Kelamin</th>
														<th style="font-size: 11px;">Tangal Lahir</th>
														<th style="font-size: 11px;">No Telp</th>
														<th style="font-size: 11px;">Email</th>
														<th style="font-size: 11px;">Alamat</th>
														<th style="font-size: 11px;">Jabatan</th>
														<th style="font-size: 11px;">Gaji Pokok</th>
														<th style="font-size: 11px;">Status</th>
														<th style="font-size: 11px;">Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($pengurus as $p) : ?>
														<tr>
															<td style="font-size: 11px;"><?= $no++ ?></td>
															<td style="font-size: 11px;"><?= $p->id_pengurus ?></td>
															<td style="font-size: 11px;"><?= $p->nik ?></td>
															<td style="font-size: 11px;"><?= $p->nama_pengurus ?></td>
															<td style="font-size: 11px;" class="text-center">
																<?php if ($p->jenis_kelamin  == 1) : ?>
																	<i class="icon-symbol-female"></i>
																<?php endif ?>
																<?php if ($p->jenis_kelamin  == 0) : ?>
																	<i class="icon-symbol-male"></i>
																<?php endif ?>
															</td>
															<td style="font-size: 11px;"><?= $p->tempat_lahir ?></td>
															<td style="font-size: 11px;"><?= $p->no_telp ?></td>
															<td style="font-size: 11px;"><?= $p->email ?></td>
															<td style="font-size: 11px;"><?= $p->alamat ?></td>
															<td style="font-size: 11px;"><?= $p->jabatan ?></td>
															<td style="font-size: 11px;"><?= nominal($p->gaji_pokok) ?></td>
															<td style="font-size: 11px;">
																<?php if ($p->status  == 1) : ?>
																	<span class="badge badge-success"><i class="icon-check"></i></span>
																<?php endif ?>
																<?php if ($p->status == 0) : ?>
																	<span class="badge badge-danger"><i class="icon-close"></i></span>
																<?php endif ?></td>
															<td style="font-size: 11px;">
																<a href="" class="text-warning" data-toggle="tooltip" data-placement="top" title="Edit Pengurus"><i class="fa fa-edit"></i></a>
																<a href="" class="text-danger" data-toggle="tooltip" data-placement="top" title="Non Aktifkan Pengurus"><i class="icon-ban"></i></a>
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
