<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Pendaftaran</h4>
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
					<a href="#">Pendaftaran</a>
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
										<h4 class="card-title">Pendaftaran Anggota Baru</h4>
									</div>
									<div class="card-body">
										<form action="<?= site_url('Pendaftaran/store') ?>" method="POST">
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label for="">Kode Pendaftaran</label>
														<input type="text" name="kode_pendaftaran" id="" class="form-control" value="<?= strtoupper(random_string('alnum', 6)) ?>" readonly>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="">No Anggota</label>
														<input type="text" name="id_anggota" id="" class="form-control" value="<?= $id_anggota ?>" readonly>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="">NIK</label>
														<input type="text" name="nik" id="" class="form-control nik  <?= form_error('nik') != '' ? 'is-invalid' : '' ?>">
														<div class="invalid-feedback">
															<?= form_error('nik') ?>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Nama Anggota</label>
														<input type="text" name="nama_anggota" id="" class="form-control <?= form_error('nama_anggota') != '' ? 'is-invalid' : '' ?>">
														<div class="invalid-feedback">
															<?= form_error('nama_anggota') ?>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<label for="">Tempat Lahir</label>
														<input type="text" name="tempat_lahir" id="" class="form-control <?= form_error('tempat_lahir') != '' ? 'is-invalid' : '' ?>">
														<div class="invalid-feedback">
															<?= form_error('tempat_lahir') ?>
														</div>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label for="">Tanggal Lahir</label>
														<input type="date" name="tgl_lahir" id="" class="form-control <?= form_error('tgl_lahir') != '' ? 'is-invalid' : '' ?>" max="<?= date('Y-m-d') ?>">
														<div class="invalid-feedback">
															<?= form_error('tgl_lahir') ?>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="form-label">Jenis Kelamin</label>
														<div class="selectgroup w-100">
															<label class="selectgroup-item">
																<input type="radio" name="jenis_kelamin" value="Laki-Laki" class="selectgroup-input " required>
																<span class="selectgroup-button">Laki-Laki</span>
															</label>
															<label class="selectgroup-item">
																<input type="radio" name="jenis_kelamin" value="Perempuan" class="selectgroup-input" required>
																<span class="selectgroup-button">Perempuan</span>
															</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="">No Telepon / Hp</label>
														<input type="text" name="no_telp" id="" class="form-control no_hp <?= form_error('no_telp') != '' ? 'is-invalid' : '' ?>">
														<div class="invalid-feedback">
															<?= form_error('no_telp') ?>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Email</label>
														<input type="text" name="email" id="" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 text-center">
													<div class="form-group">
														<a href="<?= site_url('Dashboard') ?>" class="btn btn-danger"><i class="icon-close"></i> Batal</a>
														<button type="submit" class="btn btn-primary"><i class="icon-check"></i> Simpan</button>
													</div>
												</div>
											</div>
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
