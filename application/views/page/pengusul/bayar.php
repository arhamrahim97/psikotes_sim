<div class="section" id="sect_bayar">
	<div class="alert alert-light alert-dismissible mb-4">
		<h5><i class="icon fas fa-wallet"></i><b> Proses Pembayaran </b></h5>
		Silahkan lakukan pembayaran dan upload bukti pembayarannya (dalam bentuk foto / screenshot mobile banking) di bawah ini.
	</div>
	<div class="row">
		<div class="col-lg-6 col-sm-12">
			<div class="card card-outline card-info">
				<div class="card-body">
					<h5 class="mb-3"><i class="fas fa-credit-card"></i> Daftar Nomor Rekening Transfer</h5>
					<div class="alert alert-light">
						<p class="mb-0">Transfer sejumlah <b id="biaya_bayar"></b> di salah satu rekening berikut, dan jangan lupa untuk foto / screenshot bukti transferannya.</p>
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
					<form action="prosesBayar" method="POST" id="formBayar" enctype="multipart/form-data">
						<div class="form-group">
							<label>Pilih Ujian</label>
							<p><i> (Nomor ujian) - (Tanggal Ujian) - (Jenis SIM)</i></p>
							<select class="form-control" id="listUjian" onchange="getBiaya()" name="id_ujian">

							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Upload foto / screenshot bukti transfer:</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="fotoBukti" name="file" accept="image/x-png,image/gif,image/jpeg">
								<label class="custom-file-label" for="customFile">Pilih foto</label>
							</div>
						</div>
						<button class="btn btn-success w-100" type="submit" role="button"><i class="fas fa-arrow-circle-right"></i> Proses</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>