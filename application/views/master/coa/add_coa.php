<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Tambah CoA</h4>
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
					<a href="#">Master Data</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('Coa') ?>">Charts Of Account</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Tambah CoA</a>
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
										<h4 class="card-title">Form Tambah CoA</h4>
									</div>
									<div class="card-body">
										<form action="<?= site_url('Coa/insert') ?>" method="POST">
											<div class="form-group">
												<label for="">Kode Akun</label>
												<input type="text" name="kode_akun" id="" class="form-control <?= form_error('kode_akun') != '' ? 'is-invalid' : '' ?>" value="<?= set_value('kode_akun') ?>">
												<div class="invalid-feedback">
													<?= form_error('kode_akun') ?>
												</div>

											</div>
											<div class="form-group">
												<label for="">Nama Akun</label>
												<input type="text" name="akun" id="" class="form-control <?= form_error('akun') != '' ? 'is-invalid' : '' ?>" value="<?= set_value('akun') ?>">
												<div class="invalid-feedback">
													<?= form_error('akun') ?>
												</div>
											</div>
											<div class="form-group">
												<label for="">Header Akun</label>
												<select name="header" id="header" class="form-control <?= form_error('header') != '' ? 'is-invalid' : '' ?>">
													<option value="">--Pilih--</option>
													<?php foreach ($coa as $c) : ?>
														<?php if ($c->header == 0  && $c->sub_header == 0) : ?>
															<option value="<?= $c->kode_akun ?>"><?= $c->kode_akun . ' - ' . $c->akun ?></option>
														<?php endif ?>
													<?php endforeach ?>
												</select>
												<div class="invalid-feedback">
													<?= form_error('header') ?>
												</div>
											</div>
											<div class="form-group">
												<label for="">Sub Header Akun</label>
												<select name="sub_header" id="subHeader" class="form-control <?= form_error('sub_header') != '' ? 'is-invalid' : '' ?>">
													<option value="">--pilih header dahulu--</option>
												</select>
												<div class="invalid-feedback">
													<?= form_error('sub_header') ?>
												</div>
											</div>
											<div class="form-group">
												<label for="">Pos Akun</label>
												<select name="pos" id="subHeader" class="form-control <?= form_error('pos') != '' ? 'is-invalid' : '' ?>">
													<option value="">--pilih--</option>
													<option value="1">Kas</option>
													<option value="2">Bank</option>
												</select>
												<div class="invalid-feedback">
													<?= form_error('pos') ?>
												</div>
											</div>
											<div class="py-3 text-center">
												<a href="<?= site_url('Coa') ?>" class="btn btn-danger">Batal</a>
												<button type="submit" class="btn btn-primary">Simpan</button>
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
