<div class="container-fluid">

	<div class="row">

		<!-- Area Chart -->
		<div class="col-xl-12 col-lg-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Soal Penyesuaian Diri</h6>
					<div class="dropdown no-arrow">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahSubtes">
							<i class="fas fa-plus"></i>
						</button>
					</div>
					<!-- Modal Tambah-->
					<div class="modal fade" id="modalTambahSubtes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<form method="POST">
							<div class="modal-dialog modal-xl" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Tambah Soal Subtes 3</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label for="namaKecamatan">No Soal</label>
											<input type="number" class="form-control" id="no_soal" placeholder="Masukkan Nomor Soal">
										</div>
										<div class="form-group">
											<label for="namaKecamatan">Pertanyaan</label>
											<textarea name="editor1" id="editor1" class="pertanyaan">
                                            </textarea>
										</div>
										<div class="form-group">
											<label for="namaKecamatan">Jawaban A</label>
											<textarea name="editor2" id="editor2" class="jawaban_a">
                                            </textarea>
										</div>
										<div class="form-group">
											<label for="namaKecamatan">Nilai Jawaban A</label>
											<input type="number" class="form-control" id="nilai_jawaban_a" placeholder="Masukkan Nilai">
										</div>
										<div class="form-group">
											<label for="namaKecamatan">Jawaban B</label>
											<textarea name="editor3" id="editor3" class="jawaban_b">
                                            </textarea>
										</div>
										<div class="form-group">
											<label for="namaKecamatan">Nilai Jawaban B</label>
											<input type="number" class="form-control" id="nilai_jawaban_b" placeholder="Masukkan Nilai">
										</div>
										<div class="form-group">
											<label for="namaKecamatan">Jawaban C</label>
											<textarea name="editor4" id="editor4" class="jawaban_c">
                                            </textarea>
										</div>
										<div class="form-group">
											<label for="namaKecamatan">Nilai Jawaban C</label>
											<input type="number" class="form-control" id="nilai_jawaban_c" placeholder="Masukkan Nilai">
										</div>
										<div class="form-group">
											<label for="exampleFormControlSelect1">Tipe</label>
											<select class="form-control" id="tipe" class="tipe">
												<option value="A">A</option>
												<option value="B">B</option>
											</select>
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
					<div class="modal fade" id="modalEditSubtes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<form method="POST">
							<div class="modal-dialog modal-xl" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Edit Soal Subtes 3</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label for="namaKecamatan">No Soal</label>
											<input type="text" class="form-control" id="id_soal_edit" placeholder="Masukkan Nomor Soal" hidden>
											<input type="number" class="form-control" id="no_soal_edit" placeholder="Masukkan Nomor Soal">
										</div>
										<div class="form-group">
											<label for="namaKecamatan">Pertanyaan</label>
											<textarea name="editor5" id="editor5" class="pertanyaan_edit">
                                            </textarea>
										</div>
										<div class="form-group">
											<label for="namaKecamatan">Jawaban A</label>
											<textarea name="editor6" id="editor6" class="jawaban_a_edit">
                                            </textarea>
										</div>
										<div class="form-group">
											<label for="namaKecamatan">Nilai Jawaban A</label>
											<input type="number" class="form-control" id="nilai_jawaban_a_edit" placeholder="Nilai">
										</div>
										<div class="form-group">
											<label for="namaKecamatan">Jawaban B</label>
											<textarea name="editor7" id="editor7" class="jawaban_b_edit">
                                            </textarea>
										</div>
										<div class="form-group">
											<label for="namaKecamatan">Nilai Jawaban B</label>
											<input type="number" class="form-control" id="nilai_jawaban_b_edit" placeholder="Nilai">
										</div>
										<div class="form-group">
											<label for="namaKecamatan">Jawaban C</label>
											<textarea name="editor8" id="editor8" class="jawaban_c_edit">
                                            </textarea>
										</div>
										<div class="form-group">
											<label for="namaKecamatan">Nilai Jawaban C</label>
											<input type="number" class="form-control" id="nilai_jawaban_c_edit" placeholder="Nilai">
										</div>
										<div class="form-group">
											<label for="exampleFormControlSelect1">Tipe</label>
											<select class="form-control" id="tipe_edit" class="tipe">
												<option value="A">A</option>
												<option value="B">B</option>
											</select>
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

					<div class="modal fade" id="modalPreviewSubtes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<form method="POST">
							<div class="modal-dialog modal-xl" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Preview Soal</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body modal-detail">

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
								<th>Tipe</th>
								<th>No. Soal</th>
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
				url: '<?php echo base_url('getSubtes3') ?>',
				dataSrc: ''
			},
			scrollX: true,

			columns: [{
					data: 'tipe'
				},
				{
					data: 'no_soal'
				},

				{
					data: 'id',
					render: function(data, type, row, meta) {
						return '<button class="btn btn-success btn-sm mr-1" onclick="detail(' + data + ')">' + 'Preview' + '</button><button class="btn btn-info btn-sm" onclick="edit(' + data + ')">' + 'Edit' + '</button>  <button class="btn btn-danger btn-sm" onclick="hapus(' + data + ')">' + 'Hapus' + '</button>';
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
		var id_soal_edit = $("#id_soal_edit").val();
		var no_soal_edit = $("#no_soal_edit").val();
		var pertanyaan_edit = CKEDITOR.instances['editor5'].getData();
		var jawaban_a_edit = CKEDITOR.instances['editor6'].getData();
		var nilai_jawaban_a_edit = $("#nilai_jawaban_a_edit").val();
		var jawaban_b_edit = CKEDITOR.instances['editor7'].getData();
		var nilai_jawaban_b_edit = $("#nilai_jawaban_b_edit").val();
		var jawaban_c_edit = CKEDITOR.instances['editor8'].getData();
		var nilai_jawaban_c_edit = $("#nilai_jawaban_c_edit").val();
		var tipe_edit = $('#tipe_edit option:selected').val();
		if (no_soal_edit == '') {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'No Soal Tidak Boleh Dikosongkan',
			})
		} else if (pertanyaan_edit == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Pertanyaan Tidak Boleh Dikosongkan',
			})
		} else if (jawaban_a_edit == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Jawaban A Tidak Boleh Dikosongkan',
			})
		} else if (nilai_jawaban_a_edit == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Nilai Jawaban A Tidak Boleh Dikosongkan',
			})
		} else if (jawaban_b_edit == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Jawaban B Tidak Boleh Dikosongkan',
			})
		} else if (nilai_jawaban_b_edit == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Nilai Jawaban B Tidak Boleh Dikosongkan',
			})
		} else if (jawaban_c_edit == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Jawaban C Tidak Boleh Dikosongkan',
			})
		} else if (nilai_jawaban_c_edit == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Nilai Jawaban C Tidak Boleh Dikosongkan',
			})
		} else {
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('editSubtes3') ?>',
				data: {
					id_soal_edit: id_soal_edit,
					no_soal_edit: no_soal_edit,
					pertanyaan_edit: pertanyaan_edit,
					jawaban_a_edit: jawaban_a_edit,
					nilai_jawaban_a_edit: nilai_jawaban_a_edit,
					jawaban_b_edit: jawaban_b_edit,
					nilai_jawaban_b_edit: nilai_jawaban_b_edit,
					jawaban_c_edit: jawaban_c_edit,
					nilai_jawaban_c_edit: nilai_jawaban_c_edit,
					tipe_edit: tipe_edit
				},
				success: function(data) {
					if (data == 'true') {
						Swal.fire({
							icon: 'success',
							title: 'Berhasil',
							text: 'Soal Berhasil Diupdate',
						})
						refreshTable();
						$("#modalEditSubtes").modal('hide');
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Terjadi Kesalahan',
							text: 'No Soal Subtes 3 dan Tipe Yang Anda Masukkan Sudah Ada',
						})
					}
				},
				error: function(data) {
					console.log(data);
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
		var no_soal = $("#no_soal").val();
		var pertanyaan = CKEDITOR.instances['editor1'].getData();
		var jawaban_a = CKEDITOR.instances['editor2'].getData();
		var nilai_jawaban_a = $("#nilai_jawaban_a").val();
		var jawaban_b = CKEDITOR.instances['editor3'].getData();
		var nilai_jawaban_b = $("#nilai_jawaban_b").val();
		var jawaban_c = CKEDITOR.instances['editor4'].getData();
		var nilai_jawaban_c = $("#nilai_jawaban_c").val();
		var tipe = $('#tipe option:selected').val();
		if (no_soal == '') {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'No Soal Tidak Boleh Dikosongkan',
			})
		} else if (pertanyaan == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Pertanyaan Tidak Boleh Dikosongkan',
			})
		} else if (jawaban_a == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Jawaban A Tidak Boleh Dikosongkan',
			})
		} else if (nilai_jawaban_a == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Nilai Jawaban A Tidak Boleh Dikosongkan',
			})
		} else if (jawaban_b == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Jawaban B Tidak Boleh Dikosongkan',
			})
		} else if (nilai_jawaban_b == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Nilai Jawaban B Tidak Boleh Dikosongkan',
			})
		} else if (jawaban_c == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Jawaban C Tidak Boleh Dikosongkan',
			})
		} else if (nilai_jawaban_c == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Nilai Jawaban C Tidak Boleh Dikosongkan',
			})
		} else {
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('insertSubtes3') ?>',
				data: {
					no_soal: no_soal,
					pertanyaan: pertanyaan,
					jawaban_a: jawaban_a,
					nilai_jawaban_a: nilai_jawaban_a,
					jawaban_b: jawaban_b,
					nilai_jawaban_b: nilai_jawaban_b,
					jawaban_c: jawaban_c,
					nilai_jawaban_c: nilai_jawaban_c,
					tipe: tipe
				},
				success: function(data) {
					if (data == 'true') {
						Swal.fire({
							icon: 'success',
							title: 'Berhasil',
							text: 'Soal Subtes 3 Berhasil Disimpan',
						})
						refreshTable();
						$("#no_soal").val('');
						CKEDITOR.instances['editor1'].setData('');
						CKEDITOR.instances['editor2'].setData('');
						CKEDITOR.instances['editor3'].setData('');
						CKEDITOR.instances['editor4'].setData('');
						$("#nilai_jawaban_a").val('');
						$("#nilai_jawaban_b").val('');
						$("#nilai_jawaban_c").val('');
						$('#tipe').val('A');
						$("#modalTambahSubtes").modal('hide');
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Terjadi Kesalahan',
							text: 'No Soal Subtes 3 dan Tipe Yang Anda Masukkan Sudah Ada',
						})
					}
				},
				error: function(data) {
					console.log(data);
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
	function edit(id) {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('getEditSubtes3') ?>',
			data: {
				id: id
			},
			dataType: "JSON",
			success: function(data) {
				CKEDITOR.instances['editor5'].setData(data.pertanyaan);
				CKEDITOR.instances['editor6'].setData(data.pilihan_a);
				CKEDITOR.instances['editor7'].setData(data.pilihan_b);
				CKEDITOR.instances['editor8'].setData(data.pilihan_c);
				$("#nilai_jawaban_a_edit").val(data.nilai_a);
				$("#nilai_jawaban_b_edit").val(data.nilai_b);
				$("#nilai_jawaban_c_edit").val(data.nilai_c);
				$("#no_soal_edit").val(data.no_soal);
				$("#id_soal_edit").val(data.id);
				$('#tipe_edit').val(data.tipe);
			},


		})
		$("#modalEditSubtes").modal('show');
	}

	function detail(id) {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('getDetailSubtes3') ?>',
			data: {
				id: id
			},
			success: function(data) {
				console.log(data);
				$('.modal-detail').html(data);
				$("img").addClass("img-fluid");
			},
			error: function(data) {
				console.log(data);
			}
		})
		$("#modalPreviewSubtes").modal('show');
	}

	// Hapus Ajax
	function hapus(id) {
		Swal.fire({
			title: 'Anda Yakin Ingin Menghapus Soal Ini Ini?',
			text: "Soal Yang Sudah Dihapus Tidak Dapat Dikembalikan",
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
					url: '<?php echo base_url('hapusSubtes3') ?>',
					data: {
						id: id
					},
					success: function(data) {
						console.log(data);
						if (data == 'true') {
							Swal.fire({
								icon: 'success',
								title: 'Berhasil',
								text: 'Soal Berhasil Dihapus',
							})
							refreshTable();
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Terjadi Kesalahan',
								text: 'Gagal Menghapus Soal',
							})
						}
					}
				})
			}
		})

	}

	// Toogle Menu Sidebar
	$(document).ready(function() {
		$('.master-sidebar').addClass('show');
		$('#sub-subtes3').addClass('active');
	})
</script>


<script>
	CKEDITOR.replace('editor1', { // attribute id komponen textarea
		height: '100px',
		filebrowserImageBrowseUrl: '<?php echo base_url('assets/vendor/kcfinder/browse.php'); ?>'
	});

	CKEDITOR.replace('editor2', { // attribute id komponen textarea
		height: '100px',
		filebrowserImageBrowseUrl: '<?php echo base_url('assets/vendor/kcfinder/browse.php'); ?>'
	});

	CKEDITOR.replace('editor3', { // attribute id komponen textarea
		height: '100px',
		filebrowserImageBrowseUrl: '<?php echo base_url('assets/vendor/kcfinder/browse.php'); ?>'
	});

	CKEDITOR.replace('editor4', { // attribute id komponen textarea
		height: '100px',
		filebrowserImageBrowseUrl: '<?php echo base_url('assets/vendor/kcfinder/browse.php'); ?>'
	});

	// CKeditor Edit
	CKEDITOR.replace('editor5', { // attribute id komponen textarea
		height: '100px',
		filebrowserImageBrowseUrl: '<?php echo base_url('assets/vendor/kcfinder/browse.php'); ?>'
	});

	CKEDITOR.replace('editor6', { // attribute id komponen textarea
		height: '100px',
		filebrowserImageBrowseUrl: '<?php echo base_url('assets/vendor/kcfinder/browse.php'); ?>'
	});

	CKEDITOR.replace('editor7', { // attribute id komponen textarea
		height: '100px',
		filebrowserImageBrowseUrl: '<?php echo base_url('assets/vendor/kcfinder/browse.php'); ?>'
	});

	CKEDITOR.replace('editor8', { // attribute id komponen textarea
		height: '100px',
		filebrowserImageBrowseUrl: '<?php echo base_url('assets/vendor/kcfinder/browse.php'); ?>'
	});
</script>
