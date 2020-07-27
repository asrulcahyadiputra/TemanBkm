const flashData = $(".flash-data").data("flashdata");
if (flashData) {
	if (flashData == "warning") {
		swal(
			"Peringatan !",
			"Anggota akan diaktifkan setalah Pembayaran Simpanan Pokok dan Komponen Biaya Pendaftaran",
			{
				icon: "warning",
				buttons: {
					confirm: {
						className: "btn btn-warning",
					},
				},
			}
		);
	} else if (flashData == "warning1") {
		swal(
			"Oops... !",
			"Pastikan Setoran Lebih Besar dari Minimal Penyetoran !",
			{
				icon: "error",
				buttons: {
					confirm: {
						className: "btn btn-danger",
					},
				},
			}
		);
	} else if (flashData == "warning2") {
		swal("Oops... !", "Pengiriman Invoice Belum bisa Dilakukan", {
			icon: "error",
			buttons: {
				confirm: {
					className: "btn btn-danger",
				},
			},
		});
	} else if (flashData == "warning3") {
		swal("Oops... !", "Saldo Tidak Cukup", {
			icon: "error",
			buttons: {
				confirm: {
					className: "btn btn-danger",
				},
			},
		});
	} else if (flashData == "warning4") {
		swal("Oops... !", "Transaksi Di Tolak", {
			icon: "error",
			buttons: {
				confirm: {
					className: "btn btn-danger",
				},
			},
		});
	} else if (flashData == "warning5") {
		swal(
			"Oops... !",
			"Jenis Tabungan / Simpanan Tidak Memperbolehkan Penyetoran",
			{
				icon: "error",
				buttons: {
					confirm: {
						className: "btn btn-danger",
					},
				},
			}
		);
	} else if (flashData == "warning6") {
		swal("Oops... !", "Periode Telah dibuat Sebelumnya", {
			icon: "error",
			buttons: {
				confirm: {
					className: "btn btn-danger",
				},
			},
		});
	} else if (flashData == "warning7") {
		swal("Oops... !", "Anggota Sudah Punya akun", {
			icon: "error",
			buttons: {
				confirm: {
					className: "btn btn-danger",
				},
			},
		});
	} else if (flashData == "warning8") {
		swal("Oops... !", "Username atau Password Salah", {
			icon: "error",
			buttons: {
				confirm: {
					className: "btn btn-danger",
				},
			},
		});
	} else if (flashData == "warning9") {
		swal("Oops... !", "Akun Anda Sedang Di Lock / Banned", {
			icon: "error",
			buttons: {
				confirm: {
					className: "btn btn-danger",
				},
			},
		});
	} else {
		swal("Berhasil!", flashData, {
			icon: "success",
			buttons: {
				confirm: {
					className: "btn btn-success",
				},
			},
		});
	}
}
