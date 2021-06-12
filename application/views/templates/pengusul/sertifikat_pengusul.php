<!DOCTYPE html>
<html lang="en">

<head>
	<!-- <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	<meta name="viewport" content="width=device-width, initial-scale= 0">

	<!-- Google Font: Source Sans Pro -->
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto+Slab&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
	<!-- Font-Awesome -->
	<link href="<?= 'assets/pengusul/admin-lte/' ?>plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

	<link href="<?= 'assets/pengusul/admin-lte/' ?>plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- Bootstrap CSS -->
	<link href="<?= 'assets/pengusul/admin-lte/' ?>css/adminlte.min.css" rel="stylesheet">

	<title>Sertifkat</title>

	<style>
		p {
			font-family: 'Poppins', sans-serif !important;
			font-size: 22px !important;
			/* font-family: 'Roboto Slab', serif !important; */

		}

		tr {
			margin-bottom: -10px !important;
		}
	</style>

</head>

<body id="body" style="background-color: white;">
	<div id="content">
		<div style="position: absolute; z-index: -1000;  left: 0px; top: 0px; right: 0px; bottom: 0px; ">
			<img class="mx-auto d-block" src="<?= base_url('./assets/pengusul/img/sertifikat.jpg') ?>" style="width: 100%; ">
			<div style="float: left; margin-left: 100px !important; position: relative; top: -32px;">
				<p class="" style="font-size: 18px;"><i>Hasil ini hanya berlaku jika ada tanda tangan dari Psikolog. </i> </p>
			</div>
			<div style="float: right; margin-right: 100px !important; position: relative; top: -32px;">
				<p class="" style="font-size: 18px; color: red;">EXP : <?= date('d/m/Y', strtotime($exp)) ?></p>
			</div>
		</div>
		<div class="isi mx-auto" style="margin-top: 32%;  left: 0px; right: 0px; width: 73%; position: absolute; transform: scale(1.2); ">
			<div class="row mx-auto" id="isi2">
				<div class="col text-center">

					<div class="row">
						<div class="col" style="display: inline;">

							<img src="<?= base_url('./assets/pengusul/img/logo2.png') ?>" alt="" width="70px" style="margin-right: 5px; margin-top: -75px">

							<div style="display: inline-block;">
								<!-- <p style="font-family: 'Kelly Slab', cursive; letter-spacing: 1px; font-size: 3.3vw;">HASIL PEMERIKSAAN PSIKOLOGI</p> -->
								<p style="font-family: 'Roboto Slab', serif !important; letter-spacing: 1.5px; font-size: 40px !important;">HASIL ASSESSMENT PSIKOLOGIS</p>
								<hr style="border: 1px solid black; background-color: black; width: 675px; background: black; margin-top: -23px; margin-left: -3px;">

								<p style="font-size: 26px; margin-top: -15px;">Nomor: <?= $nomor_sertifikat ?></p>
							</div>
						</div>

					</div>


					<div class="" style="text-align: left !important; margin-left: 20px; font-size: 26px; ">
						<table style="display: block; margin-top: 30px;">
							<tr>
								<td width="200px">
									<p>Nama</p>
								</td>
								<td width="20px">
									<p>:</p>
								</td>
								<td>
									<p><?= strtoupper($nama_lengkap) ?></p>
								</td>
							</tr>
							<tr>
								<td width="200px">
									<p>NIK</p>
								</td>
								<td width="20px">
									<p>:
									<p>
								</td>
								<td>
									<p><?= $nik ?></p>
								</td>
							</tr>
							<tr>
								<td width="200px">
									<p>Nomor Ujian</p>
								</td>
								<td width="20px">
									<p>:</p>
								</td>
								<td>
									<p><?= $nomor_ujian ?></p>
								</td>
							</tr>
							<tr>
								<td width="200px">
									<p>SIM Tes</p>
								</td>
								<td width="20px">
									<p>:</p>
								</td>
								<td>
									<p><?= strtoupper($jenis_sim) ?></p>
								</td>
							</tr>
							<tr>
								<td width="200px">
									<p>Paket Soal</p>
								</td>
								<td width="20px">
									<p>:</p>
								</td>
								<td>
									<p><?= strtoupper($tipe_soal) ?></p>
								</td>
							</tr>
							<!-- <tr>
							<td width="200px">Masa aktif sertifikat</td>
							<td width="20px">:</td>
							<td><?= date('d/m/Y', strtotime($tgl_ujian)) ?> - <b><?= date('d/m/Y', strtotime($exp)) ?></b></td>
						</tr> -->
						</table>
						<br>
						<p style="font-size: 26px; margin-top: 0px;"><b>Dengan Hasil Assessmen Psikologis Sebagai Berikut (%):</b></p>
						<div class="row mt-4" style="margin-left: -20px !important;">
							<div class="col-2">
								<div class="text-center">
									<div style="display:inline;width:90px;height:90px;">
										<input type="text" class="knob" value="<?= $nilai_sub1 ?>%" data-width="100" data-height="100" data-fgcolor="#3c8dbc" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; top: 6px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
									</div>
									<p>Stabilitas Emosi</p>
								</div>
							</div>
							<div class="col-2">
								<div class="text-center">
									<div style="display:inline;width:90px;height:90px;">
										<input type="text" class="knob" value="<?= $nilai_sub2 ?>" data-width="100" data-height="100" data-fgcolor="#932ab6" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; top: 6px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
									</div>
									<p>Pengendalian Diri</p>
								</div>
							</div>
							<div class="col-2">
								<div class="text-center">
									<div style="display:inline;width:90px;height:90px;">
										<input type="text" class="knob" value="<?= $nilai_sub3 ?>" data-width="100" data-height="100" data-fgcolor="#f56954" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; top: 6px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
									</div>
									<p>Penyesuaian Diri</p>
								</div>
							</div>
							<div class="col-2">
								<div class="text-center">
									<div style="display:inline;width:90px;height:90px;">
										<input type="text" class="knob" value="<?= $nilai_sub4 ?>" data-width="100" data-height="100" data-fgcolor="#00a65a" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; top: 6px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
									</div>
									<p>Ketahanan</p>
								</div>
							</div>
							<div class="col-2">
								<div class="text-center">
									<div style="display:inline;width:90px;height:90px;">
										<input type="text" class="knob" value="<?= $nilai_sub5 ?>" data-width="100" data-height="100" data-fgcolor="#39CCCC" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; top: 6px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
									</div>
									<p>Kecermatan</p>
								</div>
							</div>
							<div class="col-2">
								<div class="text-center">
									<div style="display:inline;width:90px;height:90px;">
										<input type="text" class="knob" value="<?= $nilai_sub6 ?>" data-width="100" data-height="100" data-fgcolor="#00c0ef" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px !important; position: absolute; vertical-align: middle; top: 6px !important; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
									</div>
									<p>Konsentrasi</p>
								</div>
							</div>
						</div>
						<div class="row" style="margin-left: -5px !important; margin-right: -50px !important; margin-top: 20px; font-size: 26px;">
							<div class="col-11">
								<div class="progress-group">
									<p style="margin-bottom: 0px; display: inline;">Nilai Rata-rata:</p>
									<span class="float-right" style="margin-left: -75px; margin-buttom: 8px;"><b><?= $hasil ?>% (LULUS)</b></span>
									<div class="progress progress-sm">
										<div class="progress-bar bg-gradient-info" style="width: <?= $hasil ?>%"> </div>
									</div>
								</div>
							</div>
						</div>


						<p style="margin-top: 30px !important; margin-left: 0px; margin-right: 20px; text-align: justify !important; text-justify: inter-word !important;">Demikian hasil pemeriksaan psikologis ini dibuat sebagai bukti telah melakukan tes psikologi SIM untuk perpanjangan/pembuatan <?= strtoupper($jenis_sim) ?>.</p>


					</div>
					<div class="row" style="margin-top: 30px;">
						<div class="col-4 pt-5">
							<?php
							echo '<img class="mt-5" src="' . base_url('assets/upload/pengaju/qrcode/') . $nomor_ujian . '.png" />';
							?>
							<!-- <p class="" style="font-size: 18px;">EXP : <?= date('d/m/Y', strtotime($exp)) ?></p> -->
						</div>
						<div class="col-3"></div>
						<div class="col-5" style="font-size: 26px;">
							<p>Palu, <?= strftime("%d %B %Y", strtotime(date('Y-m-d'))) ?></p>
							<p style="margin-top: -20px;">Psikolog,</p>
							<img style="margin-top: -15px; margin-bottom: -15px;" src="<?= base_url('./assets/pengusul/img/ttd.png') ?>" alt="" width="100px">
							<p><b>Sigit Apriadi, S.Psi</b></p>
							<hr style="border: 1px solid black; background-color: black; width: 190px; background: black; margin-top: -17px;">
							<p style="margin-top: -20px;"><b>SIPP : 0001-17-1-3</b></p>
						</div>
					</div>


				</div>
			</div>

		</div>

	</div>


</body>

<script type="text/javascript" src="<?= 'assets/pengusul/admin-lte/' ?>plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?= 'assets/pengusul/admin-lte/' ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript" src="<?= 'assets/js/' ?>html2canvas.js"></script>
<script type="text/javascript" src="<?= 'assets/js/' ?>jspdf.min.js"></script>

<script type="text/javascript" src="<?= 'assets/pengusul/admin-lte/' ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>

<!-- <script src="print.js"></script> -->

<!-- jQuery Knob -->
<script src="<?= 'assets/pengusul/admin-lte/' ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Sparkline -->
<script src="<?= 'assets/pengusul/admin-lte/' ?>plugins/sparklines/sparkline.js"></script>
<script type="text/javascript" src="<?= 'assets/pengusul/admin-lte/' ?>js/adminlte.min.js"></script>
<script type="text/javascript" src="<?= 'assets/pengusul/admin-lte/' ?>js/demo.js"></script>


<script>
	$(document).ready(function() {
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

		$('.knob').knob({
			draw: function() {
				if (this.$.data('skin') == 'tron') {

					var a = this.angle(this.cv) // Angle
						,
						sa = this.startAngle // Previous start angle
						,
						sat = this.startAngle // Start angle
						,
						ea // Previous end angle
						,
						eat = sat + a // End angle
						,
						r = true

					this.g.lineWidth = this.lineWidth

					this.o.cursor &&
						(sat = eat - 0.3) &&
						(eat = eat + 0.3)

					if (this.o.displayPrevious) {
						ea = this.startAngle + this.angle(this.value)
						this.o.cursor &&
							(sa = ea - 0.3) &&
							(ea = ea + 0.3)
						this.g.beginPath()
						this.g.strokeStyle = this.previousColor
						this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
						this.g.stroke()
					}

					this.g.beginPath()
					this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
					this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
					this.g.stroke()

					this.g.lineWidth = 2
					this.g.beginPath()
					this.g.strokeStyle = this.o.fgColor
					this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
					this.g.stroke()

					return false
				}
			}
		})

		// HTML To PDF Download
		var nama = 'Sertifikat_' + '<?= $nama_lengkap . '_' . $nomor_ujian . '_' . rand() ?>'
		html2canvas(document.body, {
			background: '#FFFFFF',
			onrendered: function(canvas) {
				var pageData = canvas.toDataURL('image/jpeg', 1.0);
				var pdf = new jsPDF('', 'pt', 'a4');
				pdf.addImage(pageData, 'JPEG', 0, 0, 595.28, 592.28 / canvas.width * canvas.height);
				pdf.save(nama + '.pdf');
				setTimeout(function() {
					window.close()
				}, 500);
			}
		})
	});

	document.documentElement.style.overflow = 'hidden'; // firefox, chrome
	document.body.scroll = "no"; // ie only
</script>

</html>