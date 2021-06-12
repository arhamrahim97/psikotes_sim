<div class="container-fluid">

	<div class="row">

		<!-- Area Chart -->
		<div class="col-xl-12 col-lg-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Daftar Ujian</h6>
					<div class="dropdown no-arrow">
					</div>

					<!-- Modal Edit -->
					<div class="modal fade" id="modalProses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<form method="POST">
							<div class="modal-dialog" role="document">
								<div class="modal-content" id="detailUjian">




								</div>
							</div>
						</form>
					</div>

					<div class="modal fade" id="modalProsesPembayaran">

					</div>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="form-row mb-3">
						<div class="form-group col-md-4">
							<label for="inputEmail4">Jenis SIM</label>
							<select class="form-control" id="jenisSim" onchange="refreshTable()">
								<option value="">Semua</option>
								<option value="SIM A">SIM A</option>
								<option value="SIM A UMUM">SIM A UMUM</option>
								<option value="SIM B1">SIM B1</option>
								<option value="SIM B1 UMUM">SIM B1 UMUM</option>
								<option value="SIM B2">SIM B2</option>
								<option value="SIM B2 UMUM">SIM B2 UMUM</option>
								<option value="SIM C">SIM C</option>
								<option value="SIM C1">SIM C1</option>
								<option value="SIM C2">SIM C2</option>
								<option value="SIM D">SIM D</option>
								<option value="SIM INTERNASIONAL">SIM INTERNASIONAL</option>
							</select>
						</div>
						<div class="form-group col-md-4">
							<label for="inputEmail4">Status Hasil</label>
							<select class="form-control" id="statusHasil" onchange="refreshTable()">
								<option value="">Semua</option>
								<option value="Lulus">Lulus</option>
								<option value="Belum Lulus">Belum Lulus</option>
							</select>
						</div>
						<div class="form-group col-md-4">
							<label for="inputEmail4">Status Bayar</label>
							<select class="form-control" id="statusBayar" onchange="refreshTable()">
								<option value="">Semua</option>
								<option value="Ditolak">Ditolak</option>
								<option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
								<option value="Belum Bayar">Belum Bayar</option>
								<option value="Sudah Bayar">Sudah Bayar</option>
							</select>
						</div>
					</div>
					<hr>
					<table id="tabel" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>No.Ujian</th>
								<th>Nama</th>
								<th>No. KTP</th>
								<th>Jenis SIM</th>
								<th>Status Hasil</th>
								<th>Status Bayar</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>
<script>
	// Datatables
	$(document).ready(function() {
		$("#tabel").DataTable({
			ajax: {
				url: '<?php echo base_url('getUjian') ?>',
				data: function(d) {
					d.jenisSim = $('#jenisSim').val();
					d.statusHasil = $('#statusHasil').val();
					d.statusBayar = $('#statusBayar').val();
				},
				dataSrc: '',
				type: 'POST',
			},

			scrollX: true,

			columns: [{
					data: 'id',
					render: function(data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
				{
					data: 'no_ujian'
				},
				{
					data: 'nama_lengkap'
				},
				{
					data: 'nomor_ktp'
				},
				{
					data: 'jenis_sim'
				},
				{
					data: 'status_hasil'
				},
				{
					data: 'status_bayar'
				},
				{
					data: 'id',
					render: function(data, type, row, meta) {
						return '<button class="btn btn-info btn-sm" onclick="proses(' + data + ')">' + 'Proses' + '</button>';
					}
				}
			]
		})
		// $.fn.dataTable.ext.errMode = 'none';
	})

	// Refresh Table
	function refreshTable() {
		console.log($('#jenisSim').val());

		var table = $("#tabel").DataTable();
		table.ajax.reload();
	}

	// Update Ajax
	$("#btnUpdate").click(function() {
		var id_bank_edit = $("#id_bank_edit").val();
		var nama_bank_edit = $("#nama_bank_edit").val();
		var no_rekening_edit = $("#no_rekening_edit").val();
		if (nama_bank_edit == '') {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Nama Bank Tidak Boleh Dikosongkan',
			})
		} else if (no_rekening_edit == '') {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Nomor Rekening Tidak Boleh Dikosongkan',
			})
		} else {
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('editBank') ?>',
				data: {
					idBank: id_bank_edit,
					nama_bank_edit: nama_bank_edit,
					no_rekening_edit: no_rekening_edit
				},
				success: function(data) {
					if (data == 'true') {
						Swal.fire({
							icon: 'success',
							title: 'Berhasil',
							text: 'Bank Berhasil Diupdate',
						})
						$("#modalEdit").modal('hide');
						refreshTable();
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Terjadi Kesalahan',
							text: 'Bank Yang Anda Masukkan Sudah Ada',
						})
					}
				},
				error: function() {
					Swal.fire({
						icon: 'error',
						title: 'Terjadi Kesalahan',
						text: 'Terdapat Kesalahan Pada Sistem',
					})
				}
			})
		}
	})

	// Simpan Ajax
	$("#btnSimpan").click(function() {
		var nama_bank = $("#nama_bank").val();
		var no_rekening = $("#no_rekening").val();
		if (nama_bank == '') {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Nama Bank Tidak Boleh Dikosongkan',
			})
		} else if (no_rekening == '') {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Nomor Rekening Tidak Boleh Dikosongkan',
			})
		} else {
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('insertBank') ?>',
				data: {
					nama_bank: nama_bank,
					no_rekening: no_rekening
				},
				success: function(data) {
					if (data == 'true') {
						Swal.fire({
							icon: 'success',
							title: 'Berhasil',
							text: 'Bank Berhasil Disimpan',
						})
						$("#nama_bank").val('');
						$("#no_rekening").val('');
						$("#modalTambah").modal('hide');
						refreshTable();
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Terjadi Kesalahan',
							text: 'Bank Yang Anda Masukkan Sudah Ada',
						})
					}
				},
				error: function() {
					Swal.fire({
						icon: 'error',
						title: 'Terjadi Kesalahan',
						text: 'Terdapat Kesalahan Pada Sistem',
					})
				}
			})
		}
	})

	// Ambil Update Ajax
	function proses(id) {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('getDetailUjian') ?>',
			data: {
				id: id
			},
			// dataType: "JSON",
			success: function(data) {
				$("#detailUjian").html(data);
			}
		})
		$("#modalProses").modal('show');
	}

	$("#btnBiaya").click(function() {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('getBiaya') ?>',
			dataType: "JSON",
			success: function(data) {
				$("#biaya").val(data.nilai);
			}
		})
		$("#modalBiaya").modal('show');
	})

	$("#btnUpdateBiaya").click(function() {
		var biaya = $("#biaya").val();
		if (biaya == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Biaya Tidak Boleh Dikosongkan',
			})
		} else {
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('updateBiaya') ?>',
				data: {
					biaya: biaya
				},
				success: function(data) {
					if (data == 'true') {
						Swal.fire({
							icon: 'success',
							title: 'Berhasil',
							text: 'Biaya Berhasil Diupdate',
						})
						$("#modalBiaya").modal('hide');
						location.reload();
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Terjadi Kesalahan',
							text: 'Terdapat Kesalahan Pada Sistem',
						})
					}
				},
				error: function() {
					Swal.fire({
						icon: 'error',
						title: 'Terjadi Kesalahan',
						text: 'Terdapat Kesalahan Pada Sistem',
					})
				}
			})
		}
	})

	function tolak() {
		if ($('#prosesPembayaran').val() == 'tolak') {
			$('#alasantolak').show()
			$('#inputAlasan').val('')
		} else {
			$('#alasantolak').hide()
				$('#inputAlasan').val('-')

		}

	}

	$(document).ready(function() {
		$('#master-ujian').addClass('active');

	})

	function prosesPembayaran(id) {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('getDetailPembayaran') ?>',
			data: {
				id: id
			},
			// dataType: "JSON",
			success: function(data) {
				$("#modalProsesPembayaran").html(data);
				$("#modalProses").modal('hide');
				$("#modalProsesPembayaran").modal('show');
				$('.modal').css('overflow-y', 'auto');
			}
		})

	}


	function updateProsesPembayaran(id) {
		if ($('#inputAlasan').val() == '') {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Harap masukkan alasan ditolak, untuk dapat diketahui oleh pengusul',
			})
		} else {
			var prosesPembayaran = $('#prosesPembayaran').val();
			var alasan = $('#inputAlasan').val();
			Swal.fire({
				title: 'Anda Yakin Ingin Memproses Pembayaran Ini?',
				text: "Proses Pembayaran Akan Disimpan dan Diteruskan ke pengusul",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya!',
				cancelButtonText: 'Tidak'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						type: 'POST',
						url: '<?php echo base_url('prosesPembayaran') ?>',
						data: {
							prosesPembayaran: prosesPembayaran,
							alasan: alasan,
							id: id
						},
						success: function(data) {
							if (data == 'true') {
								Swal.fire({
										icon: 'success',
										title: 'Berhasil',
										text: 'Pembayaran berhasil diproses',
										timer: 1500,
										showCancelButton: false,
										showConfirmButton: false
									})
									.then(function() {
										$("#modalProsesPembayaran").modal('hide');
										$('.modal').css('overflow-y', 'auto');
										refreshTable();
									});
							} else {
								Swal.fire({
									icon: 'error',
									title: 'Terjadi Kesalahan',
									text: 'Terdapat Kesalahan Pada Sistem',
								})
							}
						},
						error: function() {
							Swal.fire({
								icon: 'error',
								title: 'Terjadi Kesalahan',
								text: 'Terdapat Kesalahan Pada Sistem',
							})
						}
					})
				}
			})

		}

	}
</script>
