<div class="row mb-5" id="pilihan_ujian">
	<div class="col-12">
		<!-- <form action=""> -->
		<div class="row">
			<div class="col-lg-9 col-sm-12">
				<div class="card card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Pilih Jenis SIM</h3>
					</div>
					<div class="card-body">
						<div class="form-group mb-0">
							<div class="row">
								<div class="col-lg-3 col-md-6 col-sm-12">
									<div class="custom-control custom-radio">
										<input class="custom-control-input jenis_sim" type="radio" id="customRadio1" name="jenis_sim" value="SIM A">
										<label for="customRadio1" class="custom-control-label">SIM A</label>
									</div>
									<div class="custom-control custom-radio">
										<input class="custom-control-input jenis_sim" type="radio" id="customRadio2" name="jenis_sim" value="SIM A UMUM">
										<label for="customRadio2" class="custom-control-label">SIM A Umum</label>
									</div>
									<div class="custom-control custom-radio">
										<input class="custom-control-input jenis_sim" type="radio" id="customRadio3" name="jenis_sim" value="SIM B1">
										<label for="customRadio3" class="custom-control-label">SIM B1</label>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-12">

									<div class="custom-control custom-radio ">
										<input class="custom-control-input jenis_sim" type="radio" id="customRadio4" name="jenis_sim" value="SIM B1 UMUM">
										<label for="customRadio4" class="custom-control-label">SIM B1 Umum</label>
									</div>
									<div class="custom-control custom-radio ">
										<input class="custom-control-input jenis_sim" type="radio" id="customRadio5" name="jenis_sim" value="SIM B2">
										<label for="customRadio5" class="custom-control-label">SIM B2</label>
									</div>
									<div class="custom-control custom-radio ">
										<input class="custom-control-input jenis_sim" type="radio" id="customRadio6" name="jenis_sim" value="SIM B2 UMUM">
										<label for="customRadio6" class="custom-control-label">SIM B2 Umum</label>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-12">

									<div class="custom-control custom-radio ">
										<input class="custom-control-input jenis_sim" type="radio" id="customRadio7" name="jenis_sim" value="SIM C">
										<label for="customRadio7" class="custom-control-label">SIM C</label>
									</div>
									<div class="custom-control custom-radio ">
										<input class="custom-control-input jenis_sim" type="radio" id="customRadio8" name="jenis_sim" value="SIM C1">
										<label for="customRadio8" class="custom-control-label">SIM C1</label>
									</div>
									<div class="custom-control custom-radio ">
										<input class="custom-control-input jenis_sim" type="radio" id="customRadio9" name="jenis_sim" value="SIM C2">
										<label for="customRadio9" class="custom-control-label">SIM C2</label>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-12">

									<div class="custom-control custom-radio">
										<input class="custom-control-input jenis_sim" type="radio" id="customRadio10" name="jenis_sim" value="SIM D">
										<label for="customRadio10" class="custom-control-label">SIM D</label>
									</div>
									<div class="custom-control custom-radio ">
										<input class="custom-control-input jenis_sim" type="radio" id="customRadio11" name="jenis_sim" value="SIM INTERNASIONAL">
										<label for="customRadio11" class="custom-control-label">SIM Internasional</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Pilih Paket Soal</h3>
					</div>
					<div class="card-body py-4">
						<div class="form-group mb-3">
							<?php if ($blokirSoalA == 1) { ?>
								<div class="custom-control custom-radio">
									<input class="custom-control-input custom-control-input-danger paket" type="radio" id="customRadio20" name="paket" value="A">
									<label for="customRadio20" class="custom-control-label">Paket A</label>
								</div>
							<?php } ?>
							<?php if ($blokirSoalB == 1) { ?>
								<div class="custom-control custom-radio">
									<input class="custom-control-input custom-control-input-danger paket" type="radio" id="customRadio21" name="paket" value="B">
									<label for="customRadio21" class="custom-control-label">Paket B</label>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<button href="#soal" class="btn btn-success w-100" id="btn-mulai"><i class="fas fa-edit"></i> Mulai Mengerjakan Soal</button>
			</div>
		</div>
		<!-- </form> -->
	</div>
</div>

<section id="soal" style="display: none;">
	<div class="row">
		<div class="col">
			<div class="">
				<div class="card-header">
					<div class="card-title">
						<p>Soal Ujian Paket : <b class="pilihan_paket"></b></p>
					</div>
				</div>
				<div class="card-body" id="isi_soal">
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Modal Contoh Pengerjaan Soal -->
<div class="modal fade modalKategori4BagianA" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Contoh Pengerjaan Soal Kategori 4 Bagian A</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<img class="mx-auto d-block" src="<?= base_url('./assets/pengusul/img/kategori4bagiana.png') ?>" style="width: 100%; ">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade modalKategori4BagianC" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Contoh Pengerjaan Soal Kategori 4 Bagian C</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<img class="mx-auto d-block" src="<?= base_url('./assets/pengusul/img/kategori4bagianc.png') ?>" style="width: 100%; ">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade modalKategori6" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Contoh Pengerjaan Soal Kategori 6</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<img class="mx-auto d-block" src="<?= base_url('./assets/pengusul/img/kategori6.png') ?>" style="width: 100%; ">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>