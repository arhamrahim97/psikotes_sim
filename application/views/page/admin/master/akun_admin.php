<div class="container-fluid">

	<div class="row">

		<!-- Area Chart -->
		<div class="col-xl-12 col-lg-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Akun Admin</h6>
					<div class="dropdown no-arrow">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
							<i class="fas fa-plus"></i>
						</button>
					</div>

					<div class="modal fade" id="modalTambah" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Detail Akun</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form id="insert">
									<div class="modal-body">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputEmail4">Nama Lengkap</label>
												<input type="text" class="form-control" id="nama_insert" placeholder="Nama Lengkap" name="nama_insert">
											</div>
											<div class="form-group col-md-6">
												<label>Nomor KTP</label>
												<input type="text" class="form-control" id="nomorktp_insert" placeholder="Nomor KTP" onkeyup="username_ktp()" maxlength="16" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" name="nomorktp_insert">
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputEmail4">Tempat Lahir</label>
												<input type="text" class="form-control" id="tempat_lahir_insert" name="tempat_lahir_insert" placeholder="Tempat Lahir">
											</div>
											<div class="form-group col-md-6">
												<label for="inputPassword4">Tanggal Lahir</label>
												<input type="date" class="form-control" id="tanggal_lahir_insert" placeholder="Tanggal Lahir" name="tanggal_lahir_insert">
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputEmail4">Nomor HP</label>
												<input type="text" class="form-control" id="nomorhp_insert" placeholder="Nomor HP" name="nomorhp_insert">
											</div>
											<div class="form-group col-md-6">
												<label for="inputPassword4">Email</label>
												<input type="email" class="form-control" id="email_insert" placeholder="Email" name="email_insert">
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-12">
												<label for="inputEmail4">Alamat</label>
												<textarea class="form-control" id="alamat_insert" rows="3" name="alamat_insert"></textarea>
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputEmail4">Provinsi</label>
												<select class="form-control" id="provinsi_insert" name="provinsi_insert" style="width: 100%;" onchange="listKabupatenInsert()">

												</select>
											</div>
											<div class="form-group col-md-6">
												<label for="inputPassword4">Kabupaten</label>
												<select class="form-control" id="kabupaten_insert" name="kabupaten_insert" style="width: 100%;" onchange="listKecamatanInsert()">

												</select>
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputEmail4">Kecamatan</label>
												<select class="form-control" id="kecamatan_insert" name="kecamatan_insert" style="width: 100%;" onchange="listKelurahanInsert()">

												</select>
											</div>
											<div class="form-group col-md-6">
												<label for="inputPassword4">Kelurahan</label>
												<select class="form-control" id="kelurahan_insert" name="kelurahan_insert" style="width: 100%;">

												</select>
											</div>


										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputEmail4">Username</label>
												<input type="hidden" class="form-control" id="id" placeholder="Username">
												<input type="text" class="form-control" id="username_insert" placeholder="Username" maxlength="16" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" name="username_insert">
											</div>
											<div class="form-group col-md-6">
												<label for="inputPassword4">Password</label>
												<input type="text" class="form-control" id="password_insert" placeholder="Password" name="password_insert">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-12">
												<label for="inputPassword4">Foto KTP</label>
												<br>
												<input type="file" id="fotoktp_insert" name="file">
											</div>
										</div>

									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-success" id="btnInsert">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<div class="modal fade" id="modalDetail" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Detail Akun</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">


									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">Nama Lengkap</label>
											<input type="text" class="form-control" id="namaLengkap" placeholder="Nama Lengkap">
										</div>
										<div class="form-group col-md-6">
											<label>Nomor KTP</label>
											<input type="text" class="form-control" id="nomorKTP" placeholder="Nomor KTP" onkeyup="username_ktp()" maxlength="16" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">Tempat Lahir</label>
											<input type="text" class="form-control" id="tempatLahir" placeholder="Tempat Lahir">
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">Tanggal Lahir</label>
											<input type="date" class="form-control" id="tanggalLahir" placeholder="Tanggal Lahir">
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">Nomor HP</label>
											<input type="text" class="form-control" id="nomorHp" placeholder="Nomor HP">
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">Email</label>
											<input type="email" class="form-control" id="email" placeholder="Email">
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-12">
											<label for="inputEmail4">Alamat</label>
											<textarea class="form-control" id="alamat" rows="3"></textarea>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">Provinsi</label>
											<select class="form-control" id="provinsi" style="width: 100%;" onchange="listKabupaten()">

											</select>
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">Kabupaten</label>
											<select class="form-control" id="kabupaten" style="width: 100%;" onchange="listKecamatan()">

											</select>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">Kecamatan</label>
											<select class="form-control" id="kecamatan" style="width: 100%;" onchange="listKelurahan()">

											</select>
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">Kelurahan</label>
											<select class="form-control" id="kelurahan" style="width: 100%;">

											</select>
										</div>

									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">Username</label>
											<input type="hidden" class="form-control" id="id" placeholder="Username">
											<input type="text" class="form-control" id="username" placeholder="Username" maxlength="16" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">Password</label>
											<input type="text" class="form-control" id="password" placeholder="Password">
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-12">
											<label for="inputPassword4">Foto KTP</label>
											<br>
											<a href="" id="linkFoto" target="_blank"><img src="" alt="" class="img-fluid" id="gambarFoto"></a>
										</div>
									</div>
								</div>



								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
									<button class="btn btn-primary btnFoto">Ganti Foto KTP</button>
									<button type="button" class="btn btn-primary" id="btnUbah">Ubah Akun</button>
									<button type="button" class="btn btn-success" id="btnSimpan">Simpan Profil</button>
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade" id="modalFoto" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<form id="formFoto">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Ubah Foto KTP</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<input type="hidden" id="idFoto" name="idFoto">
										<input type="file" class="form-control-file" id="fileFoto" name="file">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-primary">Simpan</button>
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
								<th>Nama</th>
								<th>No KTP</th>
								<th>Username</th>
								<th>Password</th>
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
		$.fn.modal.Constructor.prototype._enforceFocus = function() {};
		$('#provinsi').select2();
		$('#kabupaten').select2();
		$('#kecamatan').select2();
		$('#kelurahan').select2();

		$('#provinsi_insert').select2();
		$('#kabupaten_insert').select2();
		$('#kecamatan_insert').select2();
		$('#kelurahan_insert').select2();
		listProvinsi();
		$("#tabel").DataTable({
			ajax: {
				url: '<?php echo base_url('getAkunAdmin') ?>',
				data: function(d) {},
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
					data: 'nama_lengkap'
				},
				{
					data: 'nomor_ktp'
				},
				{
					data: 'username'
				},
				{
					data: 'password'
				},
				{
					data: 'id',
					render: function(data, type, row, meta) {
						if (data == <?= $this->session->userdata('id') ?>) {
							return '<button class="btn btn-info btn-sm mr-1" onclick="lihat(' + data + ')">' + 'Lihat' + '</button>';
						} else {
							return '<button class="btn btn-info btn-sm mr-1" onclick="lihat(' + data + ')">' + 'Lihat' + '</button><button class="btn btn-danger btn-sm" onclick="hapus(' + data + ')">' + 'Hapus' + '</button>';
						}
					}
				}
			]
		})
		// $.fn.dataTable.ext.errMode = 'none';
	})

	// Refresh Table
	function refreshTable() {
		var table = $("#tabel").DataTable();
		table.ajax.reload();
	}

	function listProvinsi() {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('listProvinsi') ?>',
			success: function(data) {
				$('#provinsi').html(data);
				$('#provinsi_insert').html(data);
			},
			error: function(data) {}
		})
	}

	function listKabupatenInsert() {
		var id_provinsi = $('#provinsi_insert').val();
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('listKabupaten') ?>',
			data: {
				id_provinsi: id_provinsi
			},
			success: function(data) {
				$('#kabupaten_insert').html(data);
			},
			error: function(data) {
				console.log(data);
			}
		})
	}


	function listKecamatanInsert() {
		var id_kabupaten = $('#kabupaten_insert').val();
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('listKecamatan') ?>',
			data: {
				id_kabupaten: id_kabupaten
			},
			success: function(data) {
				$('#kecamatan_insert').html(data);
			},
			error: function(data) {
				console.log(data);
			}
		})
	}

	function listKelurahanInsert() {
		var id_kecamatan = $('#kecamatan_insert').val();
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('listKelurahan') ?>',
			data: {
				id_kecamatan: id_kecamatan
			},
			success: function(data) {
				$('#kelurahan_insert').html(data);
			},
			error: function(data) {
				console.log(data);
			}
		})
	}

	function listKabupaten() {
		var id_provinsi = $('#provinsi').val();
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('listKabupaten') ?>',
			data: {
				id_provinsi: id_provinsi
			},
			success: function(data) {
				$('#kabupaten').html(data);
				$('#kabupaten_insert').html(data);
			},
			error: function(data) {
				console.log(data);
			}
		})
	}

	function listKecamatan() {
		var id_kabupaten = $('#kabupaten').val();
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('listKecamatan') ?>',
			data: {
				id_kabupaten: id_kabupaten
			},
			success: function(data) {
				$('#kecamatan').html(data);
				$('#kecamatan_insert').html(data);
			},
			error: function(data) {
				console.log(data);
			}
		})
	}

	function listKelurahan() {
		var id_kecamatan = $('#kecamatan').val();
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('listKelurahan') ?>',
			data: {
				id_kecamatan: id_kecamatan
			},
			success: function(data) {
				$('#kelurahan').html(data);
				$('#kelurahan_insert').html(data);
			},
			error: function(data) {
				console.log(data);
			}
		})
	}
	// Ambil Update Ajax
	function lihat(id) {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('getDetailAkunAdmin') ?>',
			data: {
				id: id
			},
			dataType: "JSON",
			success: function(data) {
				$("#btnSimpan").hide();
				$("#btnUbah").show();
				$(".btnFoto").show();
				$("#username").val(data.username);
				$("#password").val(data.password);
				$("#namaLengkap").val(data.nama_lengkap);
				$("#nomorKTP").val(data.nomor_ktp);
				$("#tempatLahir").val(data.tempat_lahir);
				$("#tanggalLahir").val(data.tanggal_lahir);
				$("#nomorHp").val(data.nomor_hp);
				$("#email").val(data.email);
				$("#alamat").val(data.alamat);
				$("#id").val(id);
				$("#linkFoto").attr("href", "./assets/upload/pengaju/ktp/" + data.foto_ktp);
				$("#gambarFoto").attr("src", "./assets/upload/pengaju/ktp/" + data.foto_ktp);
				$("#provinsi").val(data.provinsi).trigger('change');
				setTimeout(function() {
					$("#kabupaten").val(data.kabupaten).trigger('change');
				}, 1000);
				setTimeout(function() {
					$("#kecamatan").val(data.kecamatan).trigger('change');
				}, 2000);
				setTimeout(function() {
					$("#kelurahan").val(data.kelurahan).trigger('change');
				}, 3000);
				$("#username").prop('disabled', true);
				$("#password").prop('disabled', true);
				$("#namaLengkap").prop('disabled', true);
				$("#nomorKTP").prop('disabled', true);
				$("#tempatLahir").prop('disabled', true);
				$("#tanggalLahir").prop('disabled', true);
				$("#nomorHp").prop('disabled', true);
				$("#email").prop('disabled', true);
				$("#alamat").prop('disabled', true);
				$("#provinsi").prop('disabled', true);
				$("#kabupaten").prop('disabled', true);
				$("#kecamatan").prop('disabled', true);
				$("#kelurahan").prop('disabled', true);
			}
		})
		$("#modalDetail").modal('show');
	}

	function hapus(id) {
		Swal.fire({
			title: 'Anda Yakin Ingin Menghapus Akun Ini?',
			text: "Akun Yang dihapus tidak dapat dikembalikan lagi",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya!',
			cancelButtonText: 'Tidak'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: '<?php echo base_url('hapusAkun') ?>',
					type: "POST",
					data: {
						id: id
					},
					success: function(data) {
						if (data == "true") {
							Swal.fire({
									icon: 'success',
									title: 'Berhasil',
									text: 'Akun Berhasil Dihapus',
									timer: 1500,
									showCancelButton: false,
									showConfirmButton: false
								})
								.then(function() {
									refreshTable();
								});
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Terjadi Kesalahan',
								text: 'Terjadi Kesalahan pada sistem',
							})
						}
					}
				});
			}
		})
	}

	$(".btnFoto").click(function() {
		$('#idFoto').val($('#id').val());
		$("#modalFoto").modal('show');
		$("#modalDetail").modal('hide');
	})

	function username_ktp() {
		$('#username').val($('#nomorKTP').val());
		$('#username_insert').val($('#nomorktp_insert').val());
	}

	$('#formFoto').submit(function(e) {
		// e.preventDefault();
		var foto_ktp = $("#fileFoto")[0].files[0];
		if (!foto_ktp) {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Foto Tidak Boleh Kosong',
			})
			return false;
		} else if (foto_ktp.size > 2097152) {
			Swal.fire({
				icon: 'error',
				title: 'Periksa Kembali Data Anda',
				text: 'Ukuran Foto KTP Tidak Boleh Lebih dari 2 MB',
			})
			return false;
		} else {
			e.preventDefault();
			Swal.fire({
				title: 'Anda Yakin Ingin Mengubah Akun Ini?',
				text: "Perubahan Pada Akun Akan Disimpan",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya!',
				cancelButtonText: 'Tidak'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: '<?php echo base_url('updateFoto') ?>',
						type: "POST",
						data: new FormData(this),
						processData: false,
						contentType: false,
						cache: false,
						async: false,
						success: function(data) {
							if (data == "false_update") {
								Swal.fire({
									icon: 'error',
									title: 'Terjadi Kesalahan',
									text: 'Foto KTP Gagal Diubah',
								})
							} else if (data == "true") {
								Swal.fire({
										icon: 'success',
										title: 'Berhasil',
										text: 'Foto KTP Berhasil Diubah',
										timer: 1500,
										showCancelButton: false,
										showConfirmButton: false
									})
									.then(function() {
										$("#modalFoto").modal('hide');
										refreshTable();
									});
							} else {
								Swal.fire({
									icon: 'error',
									title: 'Terjadi Kesalahan',
									text: 'Terjadi Kesalahan pada sistem',
								})
								console.log(data);
							}
						}
					});
				}
			})

		}
	})

	$("#btnUbah").click(function() {
		$("#username").prop('disabled', false);
		$("#password").prop('disabled', false);
		$("#namaLengkap").prop('disabled', false);
		$("#nomorKTP").prop('disabled', false);
		$("#tempatLahir").prop('disabled', false);
		$("#tanggalLahir").prop('disabled', false);
		$("#nomorHp").prop('disabled', false);
		$("#email").prop('disabled', false);
		$("#alamat").prop('disabled', false);
		$("#provinsi").prop('disabled', false);
		$("#kabupaten").prop('disabled', false);
		$("#kecamatan").prop('disabled', false);
		$("#kelurahan").prop('disabled', false);
		$("#btnSimpan").show();
		$("#btnUbah").hide();
		$(".btnFoto").hide();
	})

	$("#btnSimpan").click(function() {
		var id = $("#id").val();
		var usernameUpdate = $("#username").val();
		var password = $("#password").val();
		var namaLengkap = $("#namaLengkap").val();
		var nomorKTP = $("#nomorKTP").val();
		var tempatLahir = $("#tempatLahir").val();
		var tanggalLahir = $("#tanggalLahir").val();
		var nomorHp = $("#nomorHp").val();
		var email = $("#email").val();
		var alamat = $("#alamat").val();
		var provinsi = $("#provinsi").val();
		var kabupaten = $("#kabupaten").val();
		var kecamatan = $("#kecamatan").val();
		var kelurahan = $("#kelurahan").val();
		Swal.fire({
			title: 'Anda Yakin Ingin Mengubah Akun Ini?',
			text: "Perubahan Pada Akun Akan Disimpan",
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
					url: '<?php echo base_url('updateAkun') ?>',
					data: {
						id: id,
						usernameUpdate: usernameUpdate,
						password: password,
						namaLengkap: namaLengkap,
						nomorKTP: nomorKTP,
						tempatLahir: tempatLahir,
						tanggalLahir: tanggalLahir,
						nomorHp: nomorHp,
						email: email,
						alamat: alamat,
						provinsi: provinsi,
						kabupaten: kabupaten,
						kecamatan: kecamatan,
						kelurahan: kelurahan
					},
					success: function(data) {
						console.log(data);
						if (data == "false_profil") {
							Swal.fire({
								icon: 'error',
								title: 'Terjadi Kesalahan',
								text: 'Nomor KTP Sudah Ada',
							})
						} else if (data == "false_user") {
							Swal.fire({
								icon: 'error',
								title: 'Terjadi Kesalahan',
								text: 'Username Sudah Ada',
							})
						} else {
							Swal.fire({
									icon: 'success',
									title: 'Berhasil',
									text: 'Akun Berhasil Diubah',
									timer: 1500,
									showCancelButton: false,
									showConfirmButton: false
								})
								.then(function() {
									$("#modalDetail").modal('hide');
									refreshTable();
								});
						}
					},
					error: function(data) {}
				})
			}
		})

	})

	$('#insert').submit(function(e) {
		var nama_insert = $('#nama_insert').val();
		var nomorktp_insert = $('#nomorktp_insert').val();
		var tempat_lahir_insert = $('#tempat_lahir_insert').val();
		var tanggal_lahir_insert = $('#tanggal_lahir_insert').val();
		var nomorhp_insert = $('#nomorhp_insert').val();
		var email_insert = $('#email_insert').val();
		var alamat_insert = $('#alamat_insert').val();
		var provinsi_insert = $('#provinsi_insert').val();
		var kabupaten_insert = $('#kabupaten_insert').val();
		var kecamatan_insert = $('#kecamatan_insert').val();
		var kelurahan_insert = $('#kelurahan_insert').val();
		var username_insert = $('#username_insert').val();
		var password_insert = $('#password_insert').val();
		var fotoktp_insert = $("#fotoktp_insert")[0].files[0];
		if (nama_insert == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Nama Lengkap Tidak Boleh Kosong',
			})
			return false;
		} else if (nomorktp_insert == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Nomor KTP Tidak Boleh Kosong',
			})
			return false;
		} else if (tempat_lahir_insert == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Tempat Lahir Tidak Boleh Kosong',
			})
			return false;
		} else if (tanggal_lahir_insert == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Tanggal Lahir Tidak Boleh Kosong',
			})
			return false;
		} else if (nomorhp_insert == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Nomor HP Tidak Boleh Kosong',
			})
			return false;
		} else if (email_insert == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Email Tidak Boleh Kosong',
			})
			return false;
		} else if (alamat_insert == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Alamat Tidak Boleh Kosong',
			})
			return false;
		} else if (provinsi_insert == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Provinsi Tidak Boleh Kosong',
			})
			return false;
		} else if (kabupaten_insert == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Kabupaten Tidak Boleh Kosong',
			})
			return false;
		} else if (kecamatan_insert == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Kecamatan Tidak Boleh Kosong',
			})
			return false;
		} else if (kelurahan_insert == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Kelurahan Tidak Boleh Kosong',
			})
			return false;
		} else if (username_insert == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Username Tidak Boleh Kosong',
			})
			return false;
		} else if (password_insert == "") {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Password Tidak Boleh Kosong',
			})
			return false;
		} else if (!fotoktp_insert) {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Foto KTP Tidak Boleh Kosong',
			})
			return false;
		} else if (fotoktp_insert.size > 2097152) {
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Ukuran Foto Tidak Boleh lebih dari 2 Mb',
			})
			return false;
		} else {
			e.preventDefault();
			Swal.fire({
				title: 'Anda Yakin Ingin Menambah Akun Admin?',
				text: "Akun Admin Akan Ditambahkan",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya!',
				cancelButtonText: 'Tidak'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: '<?php echo base_url('registerAdmin') ?>',
						type: "POST",
						data: new FormData(this),
						processData: false,
						contentType: false,
						cache: false,
						async: false,
						success: function(data) {
							if (data == "ktp_false") {
								Swal.fire({
									icon: 'error',
									title: 'Terjadi Kesalahan',
									text: 'Username Sudah Ada',
								})
							} else if (data == "true") {
								Swal.fire({
										icon: 'success',
										title: 'Berhasil',
										text: 'Akun Admin Berhasil Ditambahkan',
										timer: 1500,
										showCancelButton: false,
										showConfirmButton: false
									})
									.then(function() {
										$("#modalTambah").modal('hide');
										refreshTable();
									});
							} else {
								Swal.fire({
									icon: 'error',
									title: 'Terjadi Kesalahan',
									text: 'Terjadi Kesalahan pada sistem',
								})
								console.log(data);
							}
						}
					});
				}
			})
		}
	})

	$(document).ready(function() {
		$('#master-akunAdmin').addClass('active');
	})
</script>
