<div class="jumbotron py-4" id="jumbotron">
	<h1 class="display-4">Selamat Datang, <?= $profil->nama_lengkap ?></h1>
	<p class="lead">Untuk memulai PSIKOTES SIM, Silahkan klik tombol <b>Mulai Ujian</b> dibawah ini.</p>
	<hr class="my-3">
	<p>Jawablah pertanyaan yang diberikan sebaik mungkin.</p>
	<p class="lead">
		<a class="btn btn-success" href="<?= base_url('ujian') ?>" role="button" id="mulai_ujian"><i class="fas fa-arrow-circle-right"></i> Mulai Ujian</a>
	</p>
</div>

<!-- Jika ada ujian yang lulus tapi belum di bayar atau belum di konfirmasi pembayaran oleh admin, maka muncul notif berikut -->
<div class="row">
	<div class="col">
		<?php if ($belum_bayar) { ?>
			<div class="alert alert-danger alert-dismissible mb-4">
				<h5><i class="icon fas fa-exclamation-circle"></i> Pemberitahuan!</h5>
				Terdapat <?= $belum_bayar ?> riwayat ujian yang lulus tetapi belum dibayar. Silahkan bayar terlebih dahulu dan upload bukti pembayaran agar dapat men-download sertifikat dari ujian tersebut. Klik <a href="<?= base_url('bayar') ?>"><span class="badge badge-info"> disini</span></a> untuk mengetahui cara membayar.
			</div>
		<?php } ?>

		<?php if ($ditolak) { ?>
			<div class="alert alert-danger alert-dismissible mb-4">
				<h5><i class="icon fas fa-exclamation-circle"></i> Pemberitahuan!</h5>
				Terdapat <?= $ditolak ?> riwayat ujian yang pembayarannya ditolak. Silahkan klik tombol detail pada nomor ujian tersebut untuk mengetahui alasannnya.
			</div>
		<?php } ?>
	</div>
</div>
<!--  -->

<div class="row" id="card-info">
	<div class="col-lg-5 col-sm-12 mb-3">
		<div class="card card-outline card-info">
			<div class="card-body">
				<h5 class="mb-3"><i class="fas fa-certificate"></i> Daftar Sertifikat PSIKOTES SIM Anda</h5>
				<div class="table-reponsive">
					<table class="table table-sm" id="">

						<thead>
							<tr class="text-center">
								<th scope="col">No</th>
								<th scope="col">No.Ujian</th>
								<th scope="col">Sertifikat</th>
								<th scope="col">Berakhir</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($list_sertifikat) {
								$i = 1;
								foreach ($list_sertifikat as $sertifikat) { ?>
									<tr>
										<th class="text-center"><?= $i ?>.</th>
										<td class="text-center"><?= $sertifikat->no_ujian ?></td>
										<td><?= $sertifikat->jenis_sim ?></td>
										<td class="text-center" style="color: green;"><?= date("d-m-Y", strtotime($sertifikat->berakhir)); ?></td>
										<?php if (date('Y-m-d') < $sertifikat->berakhir) { ?>
											<td class="text-center">
												<a target="_blank" id="downloadSertifikat" href="<?= base_url('downloadSertifikat?sertifikat=' . $sertifikat->id_sertifikat) ?>"><span class="badge badge-success"><i class="fas fa-download"></i> Download</span></a>
											<?php } else { ?>
											<td class="text-center" style="color: grey;">Expired</td>
										<?php } ?>
										</td>
									</tr>
								<?php $i++;
								}
							} else { ?>
								<tr>
									<td colspan="5" class="text-center">Sertifikat Belum Ada</td>
								</tr>
							<?php } ?>
							<!-- <tr>
								<th class="text-center">2</th>
								<td class="text-center">1234567</td>
								<td>SIM C</td>
								<td class="text-center" style="color: green;">25/05/2021</td>

								<td class="text-center">
									<a href=""><span class="badge badge-success"><i class="fas fa-download"></i> Download</span></a>
								</td>
							</tr>
							<tr>
								<th class="text-center">3</th>
								<td class="text-center">1234567</td>
								<td>SIM B Umum</td>
								<td class="text-center" style="color: grey;">13/01/2021</td>
								<td class="text-center" style="color: grey;">Expired</td>
							</tr> -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-7 col-sm-12 mb-3">
		<div class="card card-outline card-info">
			<div class="card-body">
				<h5 class="mb-3"><i class="fas fa-history"></i> Riwayat PSIKOTES SIM Anda</h5>
				<div class="table-reponsive">
					<table class="table table-sm" style="width: 100%;" id="">

						<thead>
							<tr class="text-center">
								<th scope="col">No</th>
								<th scope="col">No. Ujian</th>
								<th scope="col">Status Hasil</th>
								<th scope="col">Status Bayar</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($riwayat_ujian) : ?>
								<?php $i = 1 ?>
								<?php foreach ($riwayat_ujian as $ujian) : ?>
									<tr>
										<th class="text-center"><?= $i ?></th>
										<td class="text-center"><?= $ujian->no_ujian ?></td>
										<td class="text-center"><?= $ujian->status_hasil ?></td>
										<?php if (($ujian->status_bayar == 'Belum Bayar') || ($ujian->status_bayar == 'Ditolak')) : ?>
											<td class="text-center" style="color: red;"><?= $ujian->status_bayar ?></td>
										<?php elseif ($ujian->status_bayar == 'Sudah Bayar') : ?>
											<td class="text-center" style="color: green;"><?= $ujian->status_bayar ?></td>
										<?php elseif ($ujian->status_bayar == 'Menunggu Konfirmasi') : ?>
											<td class="text-center" style="color: orange;"><?= $ujian->status_bayar ?></td>
										<?php else : ?>
											<td class="text-center"><?= $ujian->status_bayar ?></td>
										<?php endif; ?>
										<td class="text-center">
											<a href="" data-toggle="modal" data-target="#modal-riwayat" onclick="detail_riwayat(<?= $ujian->id ?>)"><span class="badge badge-primary"><i class="fas fa-info-circle"></i> Detail</span></a>
										</td>
									</tr>
									<?php $i++ ?>
								<?php endforeach; ?>

							<?php else : ?>
								<tr>
									<td colspan="5" class="text-center">Riwayat Psikotes Belum Ada</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>



</div>

<div class="modal fade" id="modal-riwayat">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header px-4">
				<h4 class="modal-title">Nomor Ujian <span id="judul_no_ujian"></span>
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body px-4 py-1">
				<ul class="list-group list-group-flush">
					<li class="list-group-item px-2">
						<p style="display: inline;">Nomor Ujian :</p>
						<strong style="float: right;" id="no_ujian"></strong>
					</li>
					<li class="list-group-item px-2">
						<p style="display: inline;">Waktu & Tanggal Ujian :</p>
						<strong style="float: right;" id="tanggal_ujian">18:00 05/05/2021</strong>
					</li>
					<li class="list-group-item px-2">
						<p style="display: inline;">Tipe Soal :</p>
						<strong style="float: right;" id="tipe_soal">B</strong>
					</li>
					<li class="list-group-item px-2">
						<p style="display: inline;">SIM :</p>
						<strong style="float: right;" id="tipe_sim">A</strong>
					</li>
					<li class="list-group-item px-2">
						<p style="display: inline;">Status Hasil :</p>
						<strong style="float: right;" id="status_hasil">Lulus</strong>
					</li>
					<li class="list-group-item px-2">
						<p style="display: inline;">Biaya :</p>
						<strong style="float: right;" id="biaya">Rp 50.212</strong>
					</li>
					<li class="list-group-item px-2">
						<p style="display: inline;">Status Bayar :</p>
						<strong style="float: right;" id="status_bayar"></strong>
					</li>

					<li class="list-group-item px-2" id="alasan_ditolak2" style="display: none;">
						<p style="display: inline;">Alasan Ditolak :</p>
						<div class="">
							<strong id="alasan_ditolak"></strong>
						</div>
					</li>
					<li class="list-group-item px-0" id="proses-pembayaran" style="display: none;">
						<div class="" style="display: inline;">
							<a href="<?= base_url('bayar') ?>" class="btn btn-sm btn-primary" style="float: right;"><i class="fas fa-arrow-circle-right"></i> Proses Pembayaran</a>
						</div>
					</li>

				</ul>
			</div>
			<div class="modal-footer justify-content-end mr-2">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i> Tutup</button>
			</div>
		</div>
	</div>
</div>


<script>

</script>