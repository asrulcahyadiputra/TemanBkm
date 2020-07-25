<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Tambah Pengurus</h4>
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
					<a href="<?= site_url('Master_pengurus') ?>">Pengurus</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Tambah Pengurus</a>
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
										<h4 class="card-title">Form Tambah Pengurus</h4>
									</div>
									<div class="card-body">
										<form action="<?= site_url('Master_pengurus/store') ?>" method="POST">
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="">ID Pengurus</label>
														<input type="text" name="id_pengurus" id="" class="form-control" value="<?= $id_pengurus ?>" readonly>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="">NIK</label>
														<input type="text" name="nik" id="" class="form-control nik <?= form_error('nik') != '' ? 'is-invalid' : '' ?>" value="<?= set_value('nik') ?>">
														<div class="invalid-feedback">
															<?= form_error('nik') ?>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="">Nama Pengurus</label>
														<input type="text" name="nama_pengurus" id="" class="form-control <?= form_error('nama_pengurus') != '' ? 'is-invalid' : '' ?>" value="<?= set_value('nama_pengurus') ?>">
														<div class="invalid-feedback">
															<?= form_error('nama_pengurus') ?>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="">Jenis Kelamin</label><br>
														<input type="radio" name="jenis_kelamin" id="" value="0" class=""> Laki-Laki
														<input type="radio" name="jenis_kelamin" id="" value="1"> Perempuan
														<small class="text-danger"><?= form_error('jenis_kelamin') ?></small>

													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="">Tempat Lahir</label><br>
														<input type="text" name="tempat_lahir" id="" class="form-control <?= form_error('tempat_lahir') != '' ? 'is-invalid' : '' ?>" value="<?= set_value('tempat_lahir') ?>">
														<div class=" invalid-feedback">
															<?= form_error('tempat_lahir') ?>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="">Tanggal Lahir</label><br>
														<input type="date" name="tgl_lahir" max="<?= date('Y-m-d') ?>" id="" class="form-control <?= form_error('tgl_lahir') != '' ? 'is-invalid' : '' ?>" value="<?= set_value('tgl_lahir') ?>">
														<div class=" invalid-feedback">
															<?= form_error('tgl_lahir') ?>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="">No Telp</label><br>
														<input type="text" name="no_telp" id="" class="form-control no_hp <?= form_error('no_telp') != '' ? 'is-invalid' : '' ?>" value="<?= set_value('no_telp') ?>">
														<div class="invalid-feedback">
															<?= form_error('no_telp') ?>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="">Email</label><br>
														<input type="email" name="email" id="" class="form-control email " value="<?= set_value('email') ?>">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="">Jabatan</label><br>
														<select name="id_jabatan" class="form-control <?= form_error('id_jabatan') != '' ? 'is-invalid' : '' ?>" id="">
															<option value="">--pilih jabatan--</option>
															<?php foreach ($jabatan as $j) : ?>
																<option value="<?= $j->id_jabatan ?>"><?= $j->jabatan ?></option>
																php
															<?php endforeach ?>
														</select>
														<div class="invalid-feedback">
															<?= form_error('id_jabatan') ?>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label for="">Alamat</label>
														<textarea name="alamat" class="form-control <?= form_error('alamat') != '' ? 'is-invalid' : '' ?>" id="" cols="30" rows="3"><?= set_value('alamat') ?></textarea>
														<div class="invalid-feedback">
															<?= form_error('alamat') ?>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 text-center">
													<div class="form-group">
														<a href="<?= site_url('Master_pengurus') ?>" class="btn btn-danger">Batal</a>
														<button type="submit" class="btn btn-primary">Simpan</button>
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
