<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Users</h4>
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
					<a href="#">Users</a>
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
										<h4 class="card-title">Daftar User (Pengguna Aplikasi)</h4>
										<div class="d-flex align-items-center">
											<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addUsers">
												<i class="fa fa-plus"></i>
												Tambah Users
											</button>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="basic-datatables" class="display table table-hover">
												<thead>
													<tr>
														<th>#</th>
														<th>Nama User</th>
														<th>Username</th>
														<th>Role</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($user as $u) : ?>
														<tr>
															<td><?= $no++ ?></td>
															<td><?= $u->nama ?></td>
															<td><?= $u->username ?></td>
															<td>
																<?php
																if ($u->role == 1) {
																	echo "Super Admin";
																} elseif ($u->role == 0) {
																	echo "Ketua BKM";
																} elseif ($u->role == 2) {
																	echo "Admin";
																}
																if ($u->role == 3) {
																	echo "Keuangan";
																}
																if ($u->role == 4) {
																	echo "Unit Lingkungan";
																}
																if ($u->role == 5) {
																	echo "Unit Sosial";
																}
																if ($u->role == 6) {
																	echo "Anggota";
																}
																?>
															</td>
															<td>
																<?php if ($u->status == 1) : ?>
																	<a href="<?= site_url('User/block/' . $u->id_user . '/0') ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Lock User"><i class="fa fa-lock"></i></a>
																<?php endif ?>
																<?php if ($u->status == 0) : ?>
																	<a href="<?= site_url('User/block/' . $u->id_user . '/1') ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Lock User"><i class="fa fa-lock"></i></a>
																<?php endif ?>
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




<!-- Modal -->
<div class="modal fade" id="addUsers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Users</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-danger">Note : Pada saat menambahkan Users, sistem akan membuat password 123456 (Password Default).</p>
				<form action="<?= site_url('User/store') ?>" method="POST">
					<div class="form-group">
						<label for="">Nama User</label>
						<input type="text" name="nama" id="" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">username</label>
						<input type="text" name="username" id="nominal" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Role</label><br>
						<input type="radio" name="role" value="1" id="" required> Super Admin
						<input type="radio" name="role" value="2" id="" required> Admin
						<input type="radio" name="role" value="3" id="" required> Keuangan
						<input type="radio" name="role" value="4" id="" required> Unit Sosial
						<input type="radio" name="role" value="5" id="" required> Unit Lingkungan
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>
