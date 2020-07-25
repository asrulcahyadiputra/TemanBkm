<footer class="footer">
	<div class="container-fluid">
		<nav class="pull-left">
			<ul class="nav">
				<li class="nav-item">
					<a class="nav-link" href="https://www.themekita.com">
						ThemeKita
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
						Help
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
						Licenses
					</a>
				</li>
			</ul>
		</nav>
		<div class="copyright ml-auto">
			2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
		</div>
	</div>
</footer>
</div>



<!--   Core JS Files   -->
<script src="<?= base_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?= base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="<?= base_url() ?>assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="<?= base_url() ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="<?= base_url() ?>assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="<?= base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="<?= base_url() ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<script src="<?= base_url() ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Atlantis JS -->
<script src="<?= base_url() ?>assets/js/atlantis.min.js"></script>

<!-- sweat alert all
<script src="<?= base_url() ?>assets/js/dist/sweetalert2.all.min.js"></script> -->

<script src="<?= base_url() ?>assets/js/myscript.js"></script>

<!-- select2 -->
<script src="<?= base_url() ?>assets/select2/dist/js/select2.min.js"></script>

<!-- mask jquery -->
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>

<script>
	$(document).ready(function() {
		$('#basic-datatables').DataTable({
			"language": {
				"lengthMenu": "Display _MENU_ records per page",
				"zeroRecords": "--Data Tidak ditemukan--",
				"info": "Showing page _PAGE_ of _PAGES_",
				"infoEmpty": "No records available",
				"infoFiltered": "(filtered from _MAX_ total records)"
			}
		});
		$('.basic-datatables').DataTable({
			"language": {
				"lengthMenu": "Lihat _MENU_ per Halaman",
				"zeroRecords": "--Data Tidak ditemukan--",
				"info": "Halaman  _PAGE_ dari _PAGES_",
				"search": "Cari",
				"infoEmpty": "Belum ada Data",
				"infoFiltered": "(filtered from _MAX_ total records)",
				'paginate': {
					'previous': "Sebelumnya",
					'next': "Selanjutnya",
				}
			}
		});



	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#header').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo base_url(); ?>Coa/sub_header",
				method: "POST",
				data: {
					id: id
				},
				async: false,
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value="' + data[i].kode_akun + '">' + data[i].kode_akun + ' - ' + data[i].akun + '</option>';
					}
					$('#subHeader').html(html);

				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#jenisSimpanan').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo base_url(); ?>Rekening/select_produk",
				method: "POST",
				data: {
					id: id
				},
				async: false,
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					html += '<input class="form-control" name="minimal" readonly value="' + data.awal_minimal + '">';
					$('#setoranAwal').html(html);
				}
			});
		});
	});
</script>
<script>
	$(document).ready(function() {
		$('.select2').select2();
	});
</script>
<!-- penyetoran start -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#idAnggota').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo base_url(); ?>Penyetoran/get_rekening1",
				method: "POST",
				data: {
					id: id
				},
				async: false,
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					html += '<option value="">--pilih--</option>';
					for (i = 0; i < data.length; i++) {
						html += '<option value="' + data[i].no_rekening + '">' + data[i].no_rekening + ' - ' + data[i].nama_simpanan + '</option>';
					}
					$('#noRekening').html(html);

				}
			});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#noRekening').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo base_url(); ?>Penyetoran/get_produk",
				method: "POST",
				data: {
					id: id
				},
				async: false,
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					html += '<input class="form-control" name="setoran_minimal" readonly value="' + data.setoran_minimal + '">';
					$('#setoranMinimal').html(html);
				}
			});
		});
	});
</script>
<!-- penyetoran end -->

<!-- penarikan Start -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#penrikanAnggota').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo base_url(); ?>Penyetoran/get_rekening",
				method: "POST",
				data: {
					id: id
				},
				async: false,
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					html += '<option value="">--pilih--</option>';
					for (i = 0; i < data.length; i++) {
						html += '<option value="' + data[i].no_rekening + '">' + data[i].no_rekening + ' - ' + data[i].nama_simpanan + '</option>';
					}
					$('#penarikanRekening').html(html);

				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#penarikanRekening').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo base_url(); ?>Penarikan/get_produk",
				method: "POST",
				data: {
					id: id
				},
				async: false,
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					html += '<input class="form-control" name="saldo" readonly value="' + data.saldo + '">';
					$('#saldoMinimal').html(html);
				}
			});
		});
	});
</script>

<script>
	$(function() {
		$('.all').click(function() {
			$('.check').prop('checked', this.checked);
		});
	});
</script>

<!-- nonaktifkan anggota -->
<script>
	$(".remove").click(function() {
		var id = $(this).parents("tr").attr("id");
		swal({
			title: "Apakah Anda Yakin ?",
			text: "Anggota akan di Non Aktifkan!",
			type: "warning",
			icon: 'warning',
			buttons: {
				confirm: {
					text: "Ya, Saya Yakin",
					className: "btn btn-success",
				},
				cancel: {
					visible: true,
					text: "TIdak",
					className: "btn btn-danger",
				},
			},
		}).then((Delete) => {
			if (Delete) {
				$.ajax({
					url: '<?= base_url() ?>/Anggota/updated/' + id,
					type: 'UPDATE',
					error: function() {
						swal("Gagal!", "Ada Kesalahan!", {
							icon: "error",
							buttons: {
								confirm: {
									className: 'btn btn-danger'
								}
							},
						});
					},
					success: function(data) {
						$("#" + id).remove();
						swal({
							title: "Berhasil!",
							text: "Anggota Berhasil di Non Aktifkan",
							type: "success",
							icon: "success",
							buttons: {
								confirm: {
									className: "btn btn-success",
								},
							},
						});
					}
				});

			} else {
				swal({
					title: "Data Anggota Anda Aman ! ",
					text: "Tidak Dilakukan Perubahan Apapun",
					type: 'info',
					icon: 'info',
					buttons: {
						confirm: {
							className: 'btn btn-primary'
						}
					}
				});
			}
		});
	});
</script>

<!-- aktifkan anggota -->
<script>
	$(".activated").click(function() {
		var id = $(this).parents("tr").attr("id");
		swal({
			title: "Apakah Anda Yakin ?",
			text: "Anggota akan di Aktifkan!",
			type: "warning",
			icon: 'warning',
			buttons: {
				confirm: {
					text: "Ya, Saya Yakin",
					className: "btn btn-success",
				},
				cancel: {
					visible: true,
					text: "TIdak",
					className: "btn btn-danger",
				},
			},
		}).then((Delete) => {
			if (Delete) {
				$.ajax({
					url: '<?= base_url() ?>/Anggota/activated/' + id,
					type: 'UPDATE',
					error: function() {
						swal("Gagal!", "Ada Kesalahan!", {
							icon: "error",
							buttons: {
								confirm: {
									className: 'btn btn-danger'
								}
							},
						});
					},
					success: function(data) {
						$("#" + id).remove();
						swal({
							title: "Berhasil!",
							text: "Anggota Berhasil Aktifkan",
							type: "success",
							icon: "success",
							buttons: {
								confirm: {
									className: "btn btn-success",
								},
							},
						});
					}
				});

			} else {
				swal({
					title: "Data Anggota Tetap Aman ! ",
					text: "Tidak Dilakukan Perubahan Apapun",
					type: 'info',
					icon: 'info',
					buttons: {
						confirm: {
							className: 'btn btn-primary'
						}
					}
				});
			}
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		// Format nomor HP.
		$('.no_hp').mask('0000-0000-0000');
		$('.nik').mask('0000000000000000');
	})
</script>
</body>

</html>
