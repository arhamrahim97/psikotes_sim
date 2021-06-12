</div>

</section>
</div>
<footer class="main-footer" style="text-align: center;">
	<strong>Copyright © <?= date("Y") ?> PSIKOTES-SIM</strong>
	<strong style="font-size: 9px; display: block;">Template powered by AdminLTE.io</strong>
</footer>
</div>


<script type="text/javascript" src="<?= 'assets/pengusul/admin-lte/' ?>plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?= 'assets/pengusul/admin-lte/' ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?= 'assets/pengusul/admin-lte/' ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript" src="<?= 'assets/pengusul/admin-lte/' ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script class="u-script" type="text/javascript" src="<?= 'assets/pengusul/' ?>js/jquery.mask.min.js" defer=""></script>
<script type="text/javascript" src="<?= 'assets/pengusul/admin-lte/' ?>js/adminlte.min.js"></script>
<script type="text/javascript" src="<?= 'assets/pengusul/admin-lte/' ?>js/demo.js"></script>

<script>
	// $('a[target="_blank"]').removeAttr('target');
	$(document).ready(function() {
		getListUjian();
		$('.tglLahir').mask('00/00/0000');

	})

	$('.nomorKTP').click(function() {
		if ($(this).val().length == 16) {
			$('#smallNomorKTP').hide()
		} else {
			$('#smallNomorKTP').show()
		}
	})

	$('.nomorKTP').keyup(function() {
		if ($(this).val().length == 16) {
			$('#smallNomorKTP').hide()
		} else {
			$('#smallNomorKTP').show()
		}
	})

	$('.tglLahir').click(function() {
		if ($(this).val().length == 10) {
			$('#smallTglLahir').hide()
		} else {
			$('#smallTglLahir').show()
		}
	})

	$('.tglLahir').keyup(function() {
		if ($(this).val().length == 10) {
			$('#smallTglLahir').hide()
		} else {
			$('#smallTglLahir').show()
		}
	})

	var subtes1 = 0;
	var subtes2 = 0;
	var subtes3 = 0;
	var subtes4 = 0;
	var subtes5 = 0;
	var subtes6 = 0;
	$('#btn-lupa').click(function() {
		// const test = "testing"
		// alert(test)	
		var noKTP = $('#no_ktp').val()
		// var noHP = $('#no-hp').val()
		var tglLahir = $('#tgl-lahir').val()
		if (noKTP == '') {
			Swal.fire({
				title: 'Terjadi Kesalahan',
				text: 'Nomor KTP tidak boleh dikosongkan.',
				icon: 'error',
			})
		} else if ((tglLahir == '')) {
			Swal.fire({
				title: 'Terjadi Kesalahan',
				text: 'Tanggal Lahir tidak boleh dikosongkan.',
				icon: 'error',
			})
		} else {
			$.ajax({
				type: 'post',
				url: `<?= base_url('cekUser') ?>`,
				data: {
					noKTP: noKTP,
					tglLahir: tglLahir
				},
				dataType: 'json',
				success: function(response) {
					if (response.res == 'error') {
						Swal.fire({
							icon: 'error',
							title: 'Terjadi Kesalahan',
							text: response.message,
						})
					} else {
						Swal.fire({
							title: 'Berhasil',
							text: 'Password anda : ' + response.pass,
							icon: 'success',
						}).then((result) => {
							if (result.isConfirmed) {
								window.location.href = "<?= base_url() ?>";
							}
						})
					}
				}
			})

		}


	})

	$('#mulai_ujian').click(function() {
		$('#form_ujian').slideDown();

	})

	$('#btn-mulai').click(function() {
		var jenis_sim = $('.jenis_sim:checked').val();
		var paket = $('.paket:checked').val();
		if (!jenis_sim) {
			Swal.fire({
				icon: 'error',
				title: 'Periksa Kembali Data Anda',
				text: 'Harap Pilih Jenis SIM',
			})
		} else if (!paket) {
			Swal.fire({
				icon: 'error',
				title: 'Periksa Kembali Data Anda',
				text: 'Harap Pilih Paket Soal',
			})
		} else {
			Swal.fire({
				title: 'Apakah anda yakin?',
				text: 'Anda Yakin Ingin Memilih Jenis ' + jenis_sim + " dan Paket Soal " + paket + " ?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Iya',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						type: 'POST',
						url: '<?php echo base_url('getSoal') ?>',
						data: {
							tipe_soal: paket,
							tipe_sim: jenis_sim
						},
						dataType: 'json',
						success: function(data) {
							console.log(data['error']);
							if (data['error'] == "ujian_sudah_ada") {
								Swal.fire({
									icon: 'error',
									title: 'Ujian Sudah Pernah Dilakukan',
									text: 'Ujian Tipe Sim ' + jenis_sim + ' Sudah Pernah Dilaksanakan',
								})
							} else if (data['error'] == "sertifikat_sudah_ada") {
								Swal.fire({
									icon: 'error',
									title: 'Sertifikat Sudah Ada',
									text: 'Sertifikat ' + jenis_sim + ' Sudah Ada dan Masih Aktif',
								})
							} else {
								subtes1 = data['subtes1'];
								subtes2 = data['subtes2'];
								subtes3 = data['subtes3'];
								subtes4 = data['subtes4'];
								subtes5 = data['subtes5'];
								subtes6 = data['subtes6'];
								$('#isi_soal').html(data['soal']);
								$('.pilihan_paket').html(" " + paket);
								$('#soal').slideDown();
								$('#pilihan_paket').html(paket);
								$('#btn-mulai').addClass('disabled');
								$('#pilihan_ujian').slideUp();
								// $("img").addClass("img-fluid");
							}

						},
						error: function(data) {
							console.log(data);
						}
					})
				}
			})
		}

	})

	$(document).on('submit', '#soalTes', function(e) {
		e.preventDefault();
		var form = this;
		var total_cek_subtes1 = 0;
		for (var i = 1; i <= subtes1; i++) {
			if ($("input[name='subtes1[" + i + "]']:checked").val()) {
				total_cek_subtes1 += 1;
			}
		}

		var total_cek_subtes2 = 0;
		for (var i = 1; i <= subtes2; i++) {
			if ($("input[name='subtes2[" + i + "]']:checked").val()) {
				total_cek_subtes2 += 1;
			}
		}

		var total_cek_subtes3 = 0;
		for (var i = 1; i <= subtes3; i++) {
			if ($("input[name='subtes3[" + i + "]']:checked").val()) {
				total_cek_subtes3 += 1;
			}
		}

		var total_cek_subtes4 = 0;
		for (var i = 1; i <= subtes4; i++) {
			if ($("input[name='subtes4[" + i + "]']:checked").val()) {
				total_cek_subtes4 += 1;
			}
		}

		var total_cek_subtes5 = 0;
		for (var i = 1; i <= subtes5; i++) {
			if ($("input[name='subtes5[" + i + "]']:checked").val()) {
				total_cek_subtes5 += 1;
			}
		}

		var total_cek_subtes6 = 0;
		for (var i = 1; i <= subtes6; i++) {
			if ($("input[name='subtes6[" + i + "]']:checked").val()) {
				total_cek_subtes6 += 1;
			}
		}

		if (total_cek_subtes1 < subtes1) {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Periksa Kembali Jawaban Subtes 1',
			})
			return false;
		} else if (total_cek_subtes2 < subtes2) {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Periksa Kembali Jawaban Subtes 2',
			})
			return false;
		} else if (total_cek_subtes3 < subtes3) {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Periksa Kembali Jawaban Subtes 3',
			})
			return false;
		} else if (total_cek_subtes4 < subtes4) {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Periksa Kembali Jawaban Subtes 4',
			})
			return false;
		} else if (total_cek_subtes5 < subtes5) {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Periksa Kembali Jawaban Subtes 5',
			})
			return false;
		} else if (total_cek_subtes6 < subtes6) {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Periksa Kembali Jawaban Subtes 6',
			})
			return false;
		} else {
			Swal.fire({
				title: 'Apakah anda yakin?',
				text: 'Pilihan jawaban anda tidak akan dapat diubah kembali setelah menekan "Iya"',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Iya',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					form.submit();
				}
			})
		}

	})

	$('#btn-upload').click(function() {
		Swal.fire(
			'Berhasil',
			'Upload bukti pembayaran berhasil. Silahkan tunggu maksimal 1x24 jam hingga admin mengkonfirmasi pembayaran anda, dan sertifikat anda dapat langsung di download',
			'success'
		).then((result) => {
			if (result.isConfirmed) {
				window.location.href = "<?= base_url('dashboard') ?>";
			}
		})
	})

	$('#downloadSertifikat').click(function() {
		setTimeout(function() {
			// window.close()
			Swal.fire({
				title: 'Berhasil',
				text: 'Sertifikat berhasil didownload',
				icon: 'success',
			})
		}, 1000);
	})


	function detail_riwayat(id) {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('getDetailRiwayat') ?>',
			data: {
				id: id
			},
			dataType: "JSON",
			success: function(data) {
				$('#judul_no_ujian').html(data.no_ujian);
				$('#no_ujian').html(data.no_ujian);
				$('#tanggal_ujian').html(data.created_at);
				$('#tipe_soal').html(data.tipe_soal);
				$('#tipe_sim').html(data.jenis_sim);
				$('#status_hasil').html(data.status_hasil);
				$('#biaya').html(data.biaya);
				$('#status_bayar').html(data.status_bayar);
				$('#alasan_ditolak').html(data.alasan_ditolak);
				if (data.status_bayar == 'Ditolak') {
					$('#alasan_ditolak2').show()
					$('#proses-pembayaran').show()

				}

			},
			error: function(data) {
				console.log(data);
			}

		})
	}

	$('#konfirmasi_ujian').click(function() {
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: 'Pilihan jawaban anda tidak akan dapat diubah kembali setelah menekan "Iya"',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Iya',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = "<?= base_url('hasil') ?>";
			}
		})
	})

	$(function() {
		bsCustomFileInput.init();
	});

	function getListUjian() {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('listUjianBuktiPembayaran') ?>',
			success: function(data) {
				$('#listUjian').html(data);
				$("#listUjian").prop("disabled", false);
				getBiaya();
			},
			error: function(data) {
				console.log(data);
			}
		})
	}

	function getBiaya() {
		var idUjian = $("#listUjian").val();
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('getDetailBiaya') ?>',
			data: {
				id: idUjian
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				$('#biaya_bayar').html(data.biaya);
			},
			error: function(data) {
				console.log(data);
			}
		})
	}

	$('#formBayar').submit(function(e) {
		e.preventDefault();
		var id_ujian = $("#listUjian").val();
		var foto_bukti = $("#fotoBukti")[0].files[0];
		var form = this;
		if (id_ujian == "") {
			Swal.fire({
				icon: 'error',
				title: 'Periksa Kembali Data Anda',
				text: 'Harap Pilih Ujian',
			})
			return false;
		} else if (!foto_bukti) {
			Swal.fire({
				icon: 'error',
				title: 'Periksa Kembali Data Anda',
				text: 'Foto Bukti Tidak Boleh Dikosongkan',
			})
			return false;
		} else if (foto_bukti.size > 2097152) {
			Swal.fire({
				icon: 'error',
				title: 'Periksa Kembali Data Anda',
				text: 'Ukuran Foto Bukti Tidak Boleh Lebih dari 2 MB',
			})
			return false;
		} else {
			Swal.fire({
				title: 'Anda Yakin Ingin Mengupload Bukti Pembayaran Ini?',
				text: "Bukti Pembayaran Akan Di Proses Oleh Admin",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya!',
				cancelButtonText: 'Tidak'
			}).then((result) => {
				if (result.isConfirmed) {
					form.submit();
				}
			})
		}
	})
</script>

<script>
	document.addEventListener('contextmenu', function(e) {
		e.preventDefault();
	});

	document.onkeydown = function(e) {
		if (event.keyCode == 123) {
			return false;
		}
		if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
			return false;
		}
		if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
			return false;
		}
		if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
			return false;
		}
		if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
			return false;
		}
	}
</script>

</body>

</html>