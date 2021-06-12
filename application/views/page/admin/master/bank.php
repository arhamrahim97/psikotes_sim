<div class="container-fluid">

	<div class="row">

		<!-- Area Chart -->
		<div class="col-xl-12 col-lg-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Bank</h6>
					<div class="dropdown no-arrow">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
							<i class="fas fa-plus"></i>
						</button>
					</div>
					<!-- Modal Tambah-->
					<div class="modal fade" id="modalTambah" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<form method="POST">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Tambah Bank</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label for="tahun">Nama Bank</label>
											<input type="text" class="form-control" id="nama_bank" placeholder="Masukkan Nama Bank">
										</div>
										<div class="form-group">
											<label for="tahun">No Rekening</label>
											<input type="text" class="form-control" id="no_rekening" placeholder="Masukkan Nomor Rekening">
										</div>
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
										<button type="button" class="btn btn-success" id="btnSimpan">Simpan</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<!-- Modal Edit -->
					<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<form method="POST">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Edit Bank</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label for="tahun">Nama Bank</label>
											<input type="text" class="form-control" id="id_bank_edit" placeholder="Masukkan Nama Bank" hidden>
											<input type="text" class="form-control" id="nama_bank_edit" placeholder="Masukkan Nama Bank">
										</div>
										<div class="form-group">
											<label for="tahun">No Rekening</label>
											<input type="text" class="form-control" id="no_rekening_edit" placeholder="Masukkan Nomor Rekening">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
										<button type="button" class="btn btn-success" id="btnUpdate">Simpan</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<table id="tabel" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Bank</th>
								<th>No Rekening</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="row">

		<!-- Area Chart -->
		<div class="col-xl-12 col-lg-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Biaya</h6>
					<div class="dropdown no-arrow">
						<button type="button" class="btn btn-primary" data-toggle="modal" id="btnBiaya">
							<i class="fas fa-pencil-alt"></i>
						</button>
					</div>
					<!-- Modal Tambah-->
					<div class="modal fade" id="modalBiaya" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<form method="POST">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Ubah Biaya</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label for="tahun">Biaya</label>
											<input type="text" class="form-control" id="biaya" placeholder="Masukkan Biaya" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
										</div>
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
										<button type="button" class="btn btn-success" id="btnUpdateBiaya">Simpan</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<p>Biaya Administrasi Untuk Tes Psikologi Saat Ini Adalah : <b>Rp. <?= number_format($biaya, 0, ',', '.') ?></b></p>
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
				url: '<?php echo base_url('getBank') ?>',
				dataSrc: ''
			},
			scrollX: true,

			columns: [{
					data: 'id',
					render: function(data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
				{
					data: 'nama_bank'
				},
				{
					data: 'no_rekening'
				},
				{
					data: 'id',
					render: function(data, type, row, meta) {
						return '<button class="btn btn-info btn-sm" onclick="edit(' + data + ')">' + 'Edit' + '</button>  <button class="btn btn-danger btn-sm" onclick="hapus(' + data + ')">' + 'Hapus' + '</button>';
					}
				}
			]
		})
	})

	// Refresh Table
	function refreshTable() {
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
	function edit(idBank) {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('getEditBank') ?>',
			data: {
				idBank: idBank
			},
			dataType: "JSON",
			success: function(data) {
				$("#id_bank_edit").val(data.id);
				$("#nama_bank_edit").val(data.nama_bank);
				$("#no_rekening_edit").val(data.no_rekening);
			}
		})
		$("#modalEdit").modal('show');
	}

	// Hapus Ajax
	function hapus(idBank) {
		Swal.fire({
			title: 'Anda Yakin Ingin Menghapus Tahun Ini?',
			text: "Bank Yang Sudah Dihapus Tidak Dapat Dikembalikan",
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
					url: '<?php echo base_url('hapusBank') ?>',
					data: {
						idBank: idBank
					},
					success: function(data) {
						if (data == 'true') {
							Swal.fire({
								icon: 'success',
								title: 'Berhasil',
								text: 'Bank Berhasil Dihapus',
							})
							refreshTable();
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Terjadi Kesalahan',
								text: 'Gagal Menghapus Bank',
							})
						}
					}
				})
			}
		})

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

	$(document).ready(function() {
		$('#master-bank').addClass('active');
	})
</script>
