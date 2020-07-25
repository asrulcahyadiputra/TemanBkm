<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Pembayaran</h4>
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
					<a href="<?= site_url('Pendaftaran') ?>">Pendaftaran</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Pembayaran</a>
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
										<p>
											<div class="alert alert-warning text-danger " role="alert">
												<i class="fas fa-exclamation-triangle"></i> Anggota dapat dikatakan sebagai anggota tetap setelah membayar Simpanan Pokok dan Komponen Biaya Pendaftaran Lainnya. Jika, anggota tidak atau belum membayar silahkan tinggalkan halaman ini dengan menekan tombol merah "Batal".
											</div>

										</p>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<h2 class="text-center">Pembayaran Anggota Baru</h2>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<table class="table">
													<tr class="bg-light">
														<th colspan="2">Data Anggota</th>
													</tr>
													<tr>
														<td>Nama</td>
														<td>: <?= $anggota['nama_anggota'] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-primary">Menunggu Pembayaran</span></td>
													</tr>
													<tr>
														<td>NIK</td>
														<td>: <?= $anggota['nik'] ?></td>
													</tr>
													<tr>
														<td>Jenis Kelamin</td>
														<td>: <?= $anggota['jenis_kelamin'] ?></td>
													</tr>
													<tr>
														<td>Tempat, Tanggal Lahir</td>
														<td>: <?= $anggota['tempat_lahir'] . ', ' . mediumdate_indo($anggota['tgl_lahir']) ?></td>
													</tr>
													<tr>
														<th class="bg-light" colspan="2">Detail pembayaran</th>
													</tr>
												</table>
												<table class="table">
													<thead>
														<tr>
															<th>Kode</th>
															<th>Biaya</th>
															<th>Total Biaya</th>
														</tr>
													</thead>
													<tbody>
														<?php $tkp = 0;
														foreach ($komponen as $k) : ?>
															<tr>
																<td><?= $k->id_komponen ?></td>
																<td><?= $k->komponen_biaya ?></td>
																<td><?= nominal($k->nominal) ?></td>
																<?php $tkp = $tkp + $k->nominal ?>
															</tr>
														<?php endforeach ?>
														<?php $tkj = 0;
														foreach ($simpanan as $s) : ?>
															<tr>
																<td><?= $s->id_jenis ?></td>
																<td><?= $s->nama_jenis ?></td>
																<td><?= nominal($s->nominal) ?></td>
																<?php
																$id_tkj = $s->id_jenis;
																$tkj = $tkj + $s->nominal ?>
															</tr>
														<?php endforeach ?>
													</tbody>
													<tfoot>
														<tr>
															<th class="text-right" colspan="2">Total Bayar</th>
															<th><?= nominal($tkp + $tkj) ?></th>
														</tr>
													</tfoot>
												</table>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12 text-center">
												<div class="form-group">
													<a href="<?= site_url('Pendaftaran') ?>" class="btn btn-danger"><i class="icon-close"></i> Batal</a>
													<a href="<?= site_url('Pendaftaran/bayar/' . $id . '/' . $tkp . '/' . $id_tkj . '/' . $tkj) ?>" class="btn btn-primary"><i class="icon-check"></i> Bayar</a>
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
</div>
