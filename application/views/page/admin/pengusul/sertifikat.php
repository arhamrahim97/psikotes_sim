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
						<div class="form-group col-md-6">
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
						<div class="form-group col-md-6">
							<label for="inputEmail4">Status</label>
							<select class="form-control" id="status" onchange="refreshTable()">
								<option value="">Semua</option>
								<option value="Aktif">Aktif</option>
								<option value="Expired">Expired</option>
							</select>
						</div>
					</div>
					<hr>
					<table id="tabel" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Id Sertifikat</th>
								<th>No Ujian</th>
								<th>No KTP</th>
								<th>Nama Lengkap</th>
								<th>Jenis SIM</th>
								<th>Berakhir</th>
								<th>Status</th>
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
				url: '<?php echo base_url('getSertifikatPengusul') ?>',
				data: function(d) {
					d.jenisSim = $('#jenisSim').val();
					d.status = $('#status').val();
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
					data: 'id_sertifikat'
				},
				{
					data: 'no_ujian'
				},
				{
					data: 'nomor_ktp'
				},
				{
					data: 'nama_lengkap'
				},
				{
					data: 'jenis_sim'
				},
				{
					data: 'berakhir',
				},
				{
					data: 'status',
				},
				{
					data: 'id',
					render: function(data, type, row, meta) {
						return '<button class="btn btn-info btn-sm" onclick="lihat(' + data + ')">' + 'Lihat' + '</button>';
					}
				}
			]
		})
		// $.fn.dataTable.ext.errMode = 'none';
	})


	if (document.getElementById('downloadSertifikat').clicked == true) {
		// setTimeout(function() {
		// 	// window.close()
		Swal.fire({
			title: 'Berhasil',
			text: 'Sertifikat berhasil didownload',
			icon: 'success',
		})
		// }, 1000);
	}



	// Refresh Table
	function refreshTable() {
		var table = $("#tabel").DataTable();
		table.ajax.reload();
	}


	// Ambil Update Ajax
	function lihat(id) {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('getDetailSertifikat') ?>',
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

	$(document).ready(function() {
		$('#master-sertifikat').addClass('active');
	})
</script>