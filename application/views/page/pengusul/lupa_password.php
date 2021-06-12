<div class="row">
	<div class="col-lg-6 col-sm-12  mx-auto">
		<div class="card card-outline card-info">
			<div class="card-header">
				<h3 class="card-title"><i class="fas fa-unlock"></i> Lupa Password</h3>
			</div>
			<div class="card-body">
				<form action="" autocomplete="off">
					<div class="form-group">
						<label class="float-left" style="margin-bottom: 4px;">Nomor KTP :</label>
						<input class="form-control nomorKTP" type="text" placeholder="Masukkan Username / No.KTP" id="no_ktp" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" type="text" maxlength="16" name="no_ktp">
						<small style="float: left; color: #478ac9; margin-top: 2px; font-weight: bold; display: none;" id="smallNomorKTP"><i> Nomor KTP harus 16 digit</i></small>
					</div>
					<div class="form-group" style="margin-top: 22px;">
						<label class="float-left" style="margin-bottom: 4px;">Tanggal Lahir</label>
						<input type="text" class="form-control tglLahir" id="tgl-lahir" placeholder="Masukkan Tanggal Lahir">
						<small style="float: left; color: #478ac9; margin-top: 2px; font-weight: bold; display: none;" id="smallTglLahir"><i> Contoh : 07/09/1997</i></small>
					</div>
					<a class="form-control btn btn-success mt-2" id="btn-lupa"><i class="fas fa-arrow-circle-right"></i> Proses</a>
				</form>
			</div>
		</div>
	</div>
</div>