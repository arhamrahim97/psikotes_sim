<?php if ($hasil >= $standar_kelulusan) : ?>
	<div class="section" id="sect_lulus">
		<div class="alert alert-success alert-dismissible mb-4">
			<h5><i class="icon fas fa-bell"></i><b> Lanjutkan Ke Pembayaran</b></h5>
			Silahkan lakukan pembayaran dan upload bukti pembayarannya (dalam bentuk foto / screenshot mobile banking) di bawah ini.
		</div>
		<div class="row">
			<div class="col-lg-6 col-sm-12">
				<div class="card card-outline card-info">
					<div class="card-body">
						<h5 class="mb-3"><i class="fas fa-credit-card"></i> Daftar Nomor Rekening Transfer</h5>
						<div class="alert alert-light">
							<p class="mb-0">Transfer sejumlah Rp. <b><?= number_format($biaya, 0, ',', '.') ?></b> di salah satu rekening berikut, dan jangan lupa untuk foto / screenshot bukti transferannya.</p>
						</div>
						<?php foreach ($bank as $b) { ?>
							<blockquote class="quote-primary ">
								<p><b><?= $b->nama_bank ?> : <?= $b->no_rekening ?></b></p>
							</blockquote>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-12">
				<div class="card card-outline card-info">
					<div class="card-body">
						<h5 class="mb-3"><i class="fas fa-upload"></i> Upload bukti pembayaran</h5>
						<div class="alert alert-light">
							<table border="0">
								<tbody>
									<tr>
										<th style="width: 120px;">Nomor Ujian</th>
										<th style="width: 10px">:</th>
										<th><?= $nomor_ujian ?></th>
									</tr>
									<tr>
										<th>Nama</th>
										<th style="width: 10px">:</th>
										<th><?= $profil->nama_lengkap ?></th>
									</tr>
									<tr>
										<th>SIM</th>
										<th style="width: 10px">:</th>
										<th><?= $tipe_sim ?></th>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- <form action="">
							<div class="form-group">
								<label for="exampleInputPassword1">Upload foto / screenshot bukti transfer:</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="customFile">
									<label class="custom-file-label" for="customFile">Pilih foto</label>
								</div>
							</div> -->
						<a name="" class="btn btn-success w-100" href="<?= base_url('bayar') ?>" role="button"><i class="fas fa-arrow-circle-right"></i> Proses</a>
						<!-- </form> -->
					</div>
				</div>

			</div>
		</div>
	</div>

<?php else : ?>
	<div class="alert alert-danger alert-dismissible mb-4">
		<h5><i class="icon fas fa-bell"></i><b> Ujian Kembali</b></h5>
		Silahkan lakukan ujian kembali dan jawablah pertanyaan dengan baik dan benar.
	</div>
	<div class="row">
		<div class="col">
			<a name="" id="" class="btn btn-success w-100" href="<?= base_url('ujian') ?>" role="button"><i class="fas fa-undo"></i> Ujian Kembali</a>
		</div>
	</div>
<?php endif ?>