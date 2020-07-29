<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Kas Masuk</h4>
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
					<a href="#">Keuangan</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('Kas_masuk') ?>">Kas Masuk</a>
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
										<h4 class="card-title">Kas Masuk</h4>
										<div class="d-flex align-items-center">
											<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#KasMasuk">
												<i class="fa fa-plus"></i>
												Tambah Kas Masuk
											</button>
										</div>
										<div>
											<pre>
												<label for=""></label>
											</pre>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="display table table-hover basic-datatables">
												<thead>
													<tr class="text-center">
														<th>#</th>
														<th>Kode Periode</th>
														<th>Periode Tagihan</th>
														<th>Total Hari</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>


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
