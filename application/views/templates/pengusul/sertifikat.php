<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Kelly+Slab&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Charm&display=swap" rel="stylesheet">
	<!-- Font-Awesome -->
	<link href="<?= 'assets/pengusul/admin-lte/' ?>plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- Bootstrap CSS -->
	<link href="<?= 'assets/pengusul/admin-lte/' ?>css/adminlte.min.css" rel="stylesheet">

	<style>
		@media print {
			.progress {
				position: relative;
			}

			.progress:before {
				display: block;
				content: '';
				position: absolute;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				z-index: 0;
				border-bottom: 2rem solid #eeeeee;
			}

			.progress-bar {
				position: absolute;
				top: 0;
				bottom: 0;
				left: 0;
				z-index: 1;
				border-bottom: 2rem solid #337ab7;
			}

			.bg-success {
				border-bottom-color: #67c600;
			}

			.bg-info {
				border-bottom-color: #5bc0de;
			}

			.bg-warning {
				border-bottom-color: #f0a839;
			}

			.bg-danger {
				border-bottom-color: #ee2f31;
			}

		}
	</style>

	<title>Sertifkat</title>
</head>

<body id="body">
	<div style="z-index: -1000; position: fixed; left: -20px; top: -20px; right: -20px; bottom: -20px; ">
		<img src="<?= base_url('./assets/pengusul/img/sertifikat.jpg') ?>" style="width: 100%;">
	</div>
	<div class="container">
		<div class="row" style="margin-top: 210px;">
			<div class="col text-center">
				<div class="table" style="display: block;">
					<div class="tr">
						<td>
							<img src="<?= base_url('./assets/pengusul/img/logo2.png') ?>" alt="" width="70px" style="position: fixed; left: 110px;">

						</td>
						<td>
							<p style="font-family: 'Kelly Slab', cursive; letter-spacing: 1px; font-size: 44px;">HASIL PEMERIKSAAN PSIKOLOGI</p>
							<hr style="border: 1px solid black; background-color: black; margin-top: -25px; width: 670px; background: black;">
						</td>
					</div>
				</div>

				<div class="" style="text-align: left !important; margin-left: 20px; margin-top: 30px; font-size: 26px;">
					<table style="display: block; margin-top: 60px;">
						<tr>
							<td width="200px">Nama</td>
							<td width="20px">:</td>
							<td><?= strtoupper($nama_lengkap) ?></td>
						</tr>
						<tr>
							<td width="200px">NIK</td>
							<td width="20px">:</td>
							<td><?= $nik ?></td>
						</tr>
						<tr>
							<td width="200px">Nomor Ujian</td>
							<td width="20px">:</td>
							<td><?= $nomor_ujian ?></td>
						</tr>
						<tr>
							<td width="200px">SIM Tes</td>
							<td width="20px">:</td>
							<td><?= strtoupper($jenis_sim) ?></td>
						</tr>
						<tr>
							<td width="200px">Paket Soal</td>
							<td width="20px">:</td>
							<td><?= strtoupper($tipe_soal) ?></td>
						</tr>
						<!-- <tr>
							<td width="200px">Masa aktif sertifikat</td>
							<td width="20px">:</td>
							<td><?= date('d/m/Y', strtotime($tgl_ujian)) ?> - <b><?= date('d/m/Y', strtotime($exp)) ?></b></td>
						</tr> -->
					</table>
					<br>
					<p style="font-size: 26px; margin-top: 0px;"><b>Dengan hasil assessmen psikologis sebagai berikut (%):</b></p>
					<div class="row mt-4" style="margin-left: -20px !important;">
						<div class="col-2">
							<div class="text-center">
								<div style="display:inline;width:90px;height:90px;">
									<input type="text" class="knob" value="<?= $nilai_sub1 ?>%" data-width="100" data-height="100" data-fgcolor="#3c8dbc" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
								</div>
								<p>Stabilitas Emosi</p>
							</div>
						</div>
						<div class="col-2">
							<div class="text-center">
								<div style="display:inline;width:90px;height:90px;">
									<input type="text" class="knob" value="<?= $nilai_sub2 ?>" data-width="100" data-height="100" data-fgcolor="#932ab6" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
								</div>
								<p>Pengendalian Diri</p>
							</div>
						</div>
						<div class="col-2">
							<div class="text-center">
								<div style="display:inline;width:90px;height:90px;">
									<input type="text" class="knob" value="<?= $nilai_sub3 ?>" data-width="100" data-height="100" data-fgcolor="#f56954" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
								</div>
								<p>Penyesuaian Diri</p>
							</div>
						</div>
						<div class="col-2">
							<div class="text-center">
								<div style="display:inline;width:90px;height:90px;">
									<input type="text" class="knob" value="<?= $nilai_sub4 ?>" data-width="100" data-height="100" data-fgcolor="#00a65a" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
								</div>
								<p>Ketahanan</p>
							</div>
						</div>
						<div class="col-2">
							<div class="text-center">
								<div style="display:inline;width:90px;height:90px;">
									<input type="text" class="knob" value="<?= $nilai_sub5 ?>" data-width="100" data-height="100" data-fgcolor="#39CCCC" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
								</div>
								<p>Kecermatan</p>
							</div>
						</div>
						<div class="col-2">
							<div class="text-center">
								<div style="display:inline;width:90px;height:90px;">
									<input type="text" class="knob" value="<?= $nilai_sub6 ?>" data-width="100" data-height="100" data-fgcolor="#00c0ef" data-readonly="true" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
								</div>
								<p>Konsentrasi</p>
							</div>
						</div>
					</div>
					<div class="row" style="margin-left: -5px !important; margin-right: -50px !important; margin-top: 20px; font-size: 26px;">
						<div class="col-11">
							<div class="progress-group">
								<p style="margin-bottom: 0px; display: inline;">Nilai Rata-rata:</p>
								<span class="float-right" style="margin-left: -75px; margin-buttom: 8px;"><b><?= $hasil ?>%</b></span>
								<div class="progress progress-sm">
									<div class="progress-bar bg-gradient-info" style="width: <?= $hasil ?>%"></div>
								</div>
							</div>
						</div>
					</div>


					<p style="margin-top: 30px !important; margin-left: 0px; margin-right: 20px; text-align: justify !important; text-justify: inter-word !important;">Demikan sertifikat ini digunakan sebagai bukti telah melakukan tes psikologi untuk perpanjangan/pembuatan <?= strtoupper($jenis_sim) ?>. Hasil pemeriksaan ini hanya berlaku jika ditandatangani oleh psikolog.</p>


				</div>
				<div class="row" style="margin-top: -10px;">
					<div class="col-4"></div>
					<div class="col-3"></div>
					<div class="col-5" style="font-size: 26px;">
						<p>Palu, <?= strftime("%d %B %Y", strtotime(date('Y-m-d'))) ?></p>
						<p style="margin-top: -20px;">Psikolog Pemeriksa</p>
						<img style="margin-top: -15px; margin-bottom: -15px;" src="<?= base_url('./assets/pengusul/img/ttd.png') ?>" alt="" width="100px">
						<p style="text-decoration: underline;"><b>SIGIT APRIADI, S.PSI.,PSIKOLOG</b></p>
						<p style="margin-top: -24px;"><b>SIPP : 0001 - 17 - 1 - 3</b></p>
					</div>
				</div>

				<p class="" style="float: right !important; margin-top: 85px; margin-right: 15px;">EXP : <?= date('d/m/Y', strtotime($exp)) ?></p>


			</div>
		</div>
	</div>


</body>

<script type="text/javascript" src="<?= 'assets/pengusul/admin-lte/' ?>plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?= 'assets/pengusul/admin-lte/' ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript" src="<?= 'assets/js/' ?>html2canvas.js"></script>
<script type="text/javascript" src="<?= 'assets/js/' ?>jspdf.min.js"></script>


<!-- <script src="print.js"></script> -->

<!-- jQuery Knob -->
<script src="<?= 'assets/pengusul/admin-lte/' ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Sparkline -->
<script src="<?= 'assets/pengusul/admin-lte/' ?>plugins/sparklines/sparkline.js"></script>
<script type="text/javascript" src="<?= 'assets/pengusul/admin-lte/' ?>js/adminlte.min.js"></script>
<script type="text/javascript" src="<?= 'assets/pengusul/admin-lte/' ?>js/demo.js"></script>


<script>
	// $('#cmd').click(function() {

	// });

	$(document).ready(function() {
		// return html2canvas($('#body'), {
		// 	background: "#ffffff",
		// 	onrendered: function(canvas) {
		// 		var myImage = canvas.toDataURL("image/jpeg,1.0");
		// 		// Adjust width and height
		// 		var imgWidth = (canvas.width * 60) / 540;
		// 		var imgHeight = (canvas.height * 70) / 540;
		// 		// jspdf changes
		// 		var pdf = new jsPDF('p', 'mm', 'a4');
		// 		pdf.addImage(myImage, 'png', 15, 2, imgWidth, imgHeight); // 2: 19
		// 		pdf.save(`Budgeting ${$('.pdf-title').text()}.pdf`);
		// 	}
		// });
		window.print()

	});
	$(function() {
		/* jQueryKnob */
		// $(document).ready(function() {
		// 	// window.print();
		// 	myPrint()
		// 	// printJS('myFile.pdf');
		// 	// window.open(pdfUrl);
		// });

		function myPrint() {
			printJS('myFile.pdf');
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
	})
</script>

</html>