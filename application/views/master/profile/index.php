<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Profil BKM</h4>
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
					<a href="#">Profil BKM</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<a href="#" data-toggle="modal" data-target="#editProfile" class="btn btn-warning"><i class="icon-pencil"></i> Edit Profil</a>
					</div>
					<div class="card-body">
						<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses') ?>"></div>
						<div class="row">
							<div class="col-md-12">
								<table class="table">
									<tr>
										<th colspan="2" class="bg-info text-light">Badan Keswadayaan Masyarakat</th>
									</tr>
									<tr>
										<td>Nama BKM</td>
										<td>:<?= $bkm['nama_bkm'] ?></td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>: <?= $bkm['alamat'] ?></td>
									</tr>
									<tr>
										<td>No Telp</td>
										<td>: <?= $bkm['no_telp'] ?></td>
									</tr>
									<tr>
										<td>Email</td>
										<td>: <?= $bkm['email'] ?></td>
									</tr>
									<tr>
										<td>Website</td>
										<td>: <?= $bkm['website'] ?></td>
									</tr>
									<tr>
										<td colspan="2" class="text-center">

										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-primary">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Profile BKM</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('Profile/update') ?>" method="POST">
					<div class="form-group">
						<label for="">Nama BKM</label>
						<input type="text" name="nama_bkm" class="form-control" value="<?= $bkm['nama_bkm'] ?>" required>
					</div>
					<div class="form-group">
						<label for="">Alamat</label>
						<input type="text" name="alamat" class="form-control" value="<?= $bkm['alamat'] ?>" required>
					</div>
					<div class="form-group">
						<label for="">No Telp</label>
						<input type="text" name="no_telp" class="form-control" value="<?= $bkm['no_telp'] ?>" required>
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" name="email" class="form-control" value="<?= $bkm['email'] ?>" required>
					</div>
					<div class="form-group">
						<label for="">Website</label>
						<input type="text" name="website" class="form-control" value="<?= $bkm['website'] ?>" required>
					</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary" id="">Simpan Perubahan</button>
			</div>
			</form>
		</div>
	</div>
</div>
