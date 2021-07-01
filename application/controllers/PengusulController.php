<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') or exit('No direct script access allowed');

class PengusulController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Makassar');
		if ($this->session->userdata('role') != "admin") {
			redirect(base_url('beranda'));
		}
	}

	public function ujianPengusul()
	{
		$data = array(
			'judul' => 'Ujian Pengusul'
		);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('page/admin/pengusul/ujian');
		$this->load->view('templates/footer');
	}

	public function getUjian()
	{
		$jenis_sim = $this->input->post('jenisSim');
		$status_hasil = $this->input->post('statusHasil');
		$status_bayar = $this->input->post('statusBayar');
		$this->db->select('riwayat_ujian.id,riwayat_ujian.no_ujian,riwayat_ujian.tipe_soal,riwayat_ujian.jenis_sim,riwayat_ujian.nilai_subtes1,riwayat_ujian.nilai_subtes2,riwayat_ujian.nilai_subtes3,riwayat_ujian.nilai_subtes4,riwayat_ujian.nilai_subtes5,riwayat_ujian.nilai_subtes6,riwayat_ujian.hasil,riwayat_ujian.standar_kelulusan,riwayat_ujian.status_hasil,riwayat_ujian.status_bayar,riwayat_ujian.bukti_pembayaran,riwayat_ujian.created_at,profil.nama_lengkap,profil.nomor_ktp,profil.foto_ktp');
		$this->db->from('riwayat_ujian');
		$this->db->join('profil', 'riwayat_ujian.id_user = profil.id_user', 'left');
		if ($jenis_sim) {
			$this->db->where('riwayat_ujian.jenis_sim', $jenis_sim);
		}
		if ($status_hasil) {
			$this->db->where('riwayat_ujian.status_hasil', $status_hasil);
		}
		if ($status_bayar) {
			$this->db->where('riwayat_ujian.status_bayar', $status_bayar);
		}
		$query = $this->db->order_by('id', 'DESC')->get()->result();
		echo json_encode($query);
	}

	public function getDetailUjian()
	{
		$id = $this->input->post('id');
		$this->db->select('riwayat_ujian.id,riwayat_ujian.no_ujian,riwayat_ujian.tipe_soal,riwayat_ujian.jenis_sim,riwayat_ujian.nilai_subtes1,riwayat_ujian.nilai_subtes2,riwayat_ujian.nilai_subtes3,riwayat_ujian.nilai_subtes4,riwayat_ujian.nilai_subtes5,riwayat_ujian.nilai_subtes6,riwayat_ujian.hasil,riwayat_ujian.standar_kelulusan,riwayat_ujian.status_hasil,riwayat_ujian.status_bayar,riwayat_ujian.alasan_ditolak,riwayat_ujian.bukti_pembayaran,riwayat_ujian.created_at,riwayat_ujian.biaya,riwayat_ujian.id_user,profil.nama_lengkap,profil.nomor_ktp,profil.foto_ktp');
		$this->db->from('riwayat_ujian');
		$this->db->join('profil', 'riwayat_ujian.id_user = profil.id_user', 'left');
		$this->db->where('riwayat_ujian.id', $id);
		$ujian = $this->db->get()->row();

		$created_at = date("d-m-Y H:i:s", strtotime($ujian->created_at));

		if ($ujian->biaya == '-') {
			$biaya = "-";
		} else {
			$biaya = "Rp. " . number_format($ujian->biaya, 0, ',', '.');
		}

		if ($ujian->status_bayar == "Menunggu Konfirmasi" || $ujian->status_bayar == "Ditolak") {
			$proses = '<div class="modal-footer">
                                        <button type="button" class="btn btn-success" id="btnUpdate" onclick="prosesPembayaran(' . $ujian->id . ')">Proses Pembayaran</button>
                                    </div>';
		} else {
			$proses = '';
		}

		$rata_rata = round(($ujian->nilai_subtes1 + $ujian->nilai_subtes2 + $ujian->nilai_subtes3 +  $ujian->nilai_subtes4 + $ujian->nilai_subtes5 + $ujian->nilai_subtes6) / 6);

		$detail = null;
		$detail .= '                          
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Ujian Nomor ' . $ujian->no_ujian . '</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body py-1">
        <ul class="list-group list-group-flush">
					<li class="list-group-item px-2">
						<p style="display: inline;">Nomor Ujian :</p>
						<strong style="float: right;">' . $ujian->no_ujian . '</strong>
					</li>
					<li class="list-group-item px-2">
						<p style="display: inline;">Waktu & Tanggal Ujian :</p>
						<strong style="float: right;">' . $created_at . '</strong>
					</li>
					<li class="list-group-item px-2">
						<p style="display: inline;">Tipe Soal :</p>
						<strong style="float: right;">' . $ujian->tipe_soal . '</strong>
					</li>
					<li class="list-group-item px-2">
						<p style="display: inline;">SIM :</p>
						<strong style="float: right;">' . $ujian->jenis_sim . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Nilai Stabilitas Emosi :</p>
						<strong style="float: right;">' . $ujian->nilai_subtes1 . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Nilai Pengendalian Diri :</p>
						<strong style="float: right;">' . $ujian->nilai_subtes2 . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Nilai Penyesuaian Diri :</p>
						<strong style="float: right;">' . $ujian->nilai_subtes3 . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Nilai Ketahanan :</p>
						<strong style="float: right;">' . $ujian->nilai_subtes4 . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Nilai Kecermatan :</p>
						<strong style="float: right;">' . $ujian->nilai_subtes5 . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Nilai Konsentrasi :</p>
						<strong style="float: right;">' . $ujian->nilai_subtes6 . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Rata-Rata :</p>
						<strong style="float: right;">' . $rata_rata . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Standar Kelulusan :</p>
						<strong style="float: right;">' . $ujian->standar_kelulusan . '</strong>
					</li>
					<li class="list-group-item px-2">
						<p style="display: inline;">Status Hasil :</p>
						<strong style="float: right;">' . $ujian->status_hasil . '</strong>
					</li>
					<li class="list-group-item px-2">
						<p style="display: inline;">Biaya :</p>
						<strong style="float: right;">' . $biaya . '</strong>
					</li>
					<li class="list-group-item px-2">
						<p style="display: inline;">Status Bayar :</p>
						<strong style="float: right;">' . $ujian->status_bayar . '</strong>
					</li>';
		if ($ujian->status_bayar == "Ditolak") {
			$detail .= '<li class="list-group-item px-2">
							<p style="display: inline;">Alasan ditolak :</p>
							<div>
								<div class="form-group">											  
									<strong>' . $ujian->alasan_ditolak . '</strong>					
								</div>
							</div>
						</li>';
		}
		$detail .= '
				</ul>
                </div>';
		$detail .= $proses;
		echo $detail;
	}

	public function getDetailPembayaran()
	{
		$id = $this->input->post('id');
		$this->db->select('riwayat_ujian.id,riwayat_ujian.no_ujian,riwayat_ujian.tipe_soal,riwayat_ujian.jenis_sim,riwayat_ujian.nilai_subtes1,riwayat_ujian.nilai_subtes2,riwayat_ujian.nilai_subtes3,riwayat_ujian.nilai_subtes4,riwayat_ujian.nilai_subtes5,riwayat_ujian.nilai_subtes6,riwayat_ujian.hasil,riwayat_ujian.standar_kelulusan,riwayat_ujian.status_hasil,riwayat_ujian.status_bayar,riwayat_ujian.alasan_ditolak,riwayat_ujian.bukti_pembayaran,riwayat_ujian.created_at,riwayat_ujian.biaya,riwayat_ujian.id_user,profil.nama_lengkap,profil.nomor_ktp,profil.foto_ktp');
		$this->db->from('riwayat_ujian');
		$this->db->join('profil', 'riwayat_ujian.id_user = profil.id_user', 'left');
		$this->db->where('riwayat_ujian.id', $id);
		$ujian = $this->db->get()->row();
		if ($ujian->biaya == '-') {
			$biaya = "-";
		} else {
			$biaya = "Rp. " . number_format($ujian->biaya, 0, ',', '.');
		}
		$detailPembayaran = '';
		$detailPembayaran .= '<div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header px-4">
                                    <h4 class="modal-title">Nomor Ujian : ' . $ujian->no_ujian . '</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body px-4">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-2">
                                            <p style="display: inline;">Nomor Ujian :</p>
                                            <strong style="float: right;">' . $ujian->no_ujian . '</strong>
                                        </li>
                                        <li class="list-group-item px-2">
                                            <p style="display: inline;">Nomor KTP :</p>
                                            <strong style="float: right;">' . $ujian->nomor_ktp . '</strong>
                                        </li>
                                        <li class="list-group-item px-2">
                                            <p style="display: inline;">Foto KTP :</p>
                                        </li>
                                        <li class="list-group-item px-2">
                                            <a href="' . base_url('./assets/upload/pengaju/ktp/' . $ujian->foto_ktp) . '" target="_blank"> <img src="' . base_url('./assets/upload/pengaju/ktp/' . $ujian->foto_ktp) . '" alt="" class="img-fluid"></a>
                                        </li>
                                        <li class="list-group-item px-2">
                                            <p style="display: inline;">Biaya :</p>
                                            <strong style="float: right;">' . $biaya . '</strong>
                                        </li>
                                        <li class="list-group-item px-2">
                                            <p style="display: inline;">Bukti Pembayaran :</p>
                                        </li>
                                        <li class="list-group-item px-2">
                                            <a href="' . base_url('./assets/upload/pengaju/bukti/' . $ujian->bukti_pembayaran) . '" target="_blank"> <img src="' . base_url('./assets/upload/pengaju/bukti/' . $ujian->bukti_pembayaran) . '" alt="" class="img-fluid"></a>
                                        </li>
                                        <li class="list-group-item px-2">
                                            <p style="display: inline;">Proses Pembayaran :</p>
                                            <div>
                                                <select class="form-control" id="prosesPembayaran" onchange=tolak()>
                                                    <option value="terima">Terima</option>
                                                    <option value="tolak">Tolak</option>
                                                </select>
                                            </div>
                                        </li>
										<li class="list-group-item px-2" id="alasantolak" style="display:none">
											<p style="display: inline;">Alasan ditolak :</p>
											<div>
												<div class="form-group">											  
													<textarea class="form-control" name="" id="inputAlasan" rows="3">-</textarea>
												</div>
											</div>
										</li>
                                    </ul>
                                </div>
                                <div class="modal-footer justify-content-end">
                                    <button type="button" class="btn btn-success" id="updatePembayaran" onclick="updateProsesPembayaran(' . $ujian->id . ')">Update Pembayaran</button>
                                </div>
                            </div>
                        </div>';
		echo $detailPembayaran;
	}

	public function prosesPembayaran()
	{
		$id = $this->input->post('id');
		$prosesPembayaran = $this->input->post('prosesPembayaran');
		$alasan = $this->input->post('alasan');
		$this->db->select('riwayat_ujian.id,riwayat_ujian.no_ujian,riwayat_ujian.tipe_soal,riwayat_ujian.jenis_sim,riwayat_ujian.nilai_subtes1,riwayat_ujian.nilai_subtes2,riwayat_ujian.nilai_subtes3,riwayat_ujian.nilai_subtes4,riwayat_ujian.nilai_subtes5,riwayat_ujian.nilai_subtes6,riwayat_ujian.hasil,riwayat_ujian.standar_kelulusan,riwayat_ujian.status_hasil,riwayat_ujian.status_bayar,riwayat_ujian.bukti_pembayaran,riwayat_ujian.created_at,riwayat_ujian.biaya,riwayat_ujian.id_user,profil.nama_lengkap,profil.nomor_ktp,profil.foto_ktp');
		$this->db->from('riwayat_ujian');
		$this->db->join('profil', 'riwayat_ujian.id_user = profil.id_user', 'left');
		$this->db->where('riwayat_ujian.id', $id);
		$ujian = $this->db->get()->row();
		$id_sertifikat = $this->random(5) . mt_rand(10000, 99999);

		$tgl = date('Y-m-d', strtotime('+180 days', strtotime(date('Y-m-d'))));


		if ($prosesPembayaran == "terima") {
			$dataRiwayat = array(
				'admin_id' => $this->session->userdata('id'),
				'status_bayar' => 'Sudah Bayar',
				'alasan_ditolak' => "-",
			);
			$this->db->where('id', $id);
			$this->db->update('riwayat_ujian', $dataRiwayat);


			$array_bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
			$bln = $array_bln[date('n')];
			$query = $this->db->query('SELECT max(nomor_sertifikat) as maxKode FROM sertifikat')->row();
			$id = $query->maxKode;
			$urutan = (int) substr($id, 4, 5);
			$urutan++;
			if ($ujian->tipe_soal == 'A') {
				$kode = sprintf("%05s", $urutan) . '/BAPI-SIM/' . $bln . '/' . date('Y');
			} else if ($ujian->tipe_soal == 'B') {
				$kode = sprintf("%05s", $urutan) . '/SNG-SIM/' . $bln . '/' . date('Y');
			}
			// $kode = 'test';
			$dataSertifikat = array(
				'id_sertifikat' => $id_sertifikat,
				'nomor_sertifikat' => $kode,
				'id_riwayat_ujian' => $ujian->id,
				'id_user' => $ujian->id_user,
				'berakhir' => $tgl,
				'created_at' => date("Y-m-d H:i:s")
			);

			$this->db->insert('sertifikat', $dataSertifikat);
			echo 'true';
		} else {
			$dataRiwayat = array(
				'admin_id' => $this->session->userdata('id'),
				'status_bayar' => 'Ditolak',
				'alasan_ditolak' =>  $alasan
			);

			$this->db->where('id', $id);
			$this->db->update('riwayat_ujian', $dataRiwayat);
			echo 'true';
		}
	}

	// Sertifikat
	public function sertifikatPengusul()
	{
		$data = array(
			'judul' => 'Sertifikat Pengusul'
		);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('page/admin/pengusul/sertifikat');
		$this->load->view('templates/footer');
	}

	public function getSertifikat()
	{
		$jenis_sim = $this->input->post('jenisSim');
		$status = $this->input->post('status');
		$this->db->select('sertifikat.*,riwayat_ujian.no_ujian,riwayat_ujian.jenis_sim,riwayat_ujian.nilai_subtes1,riwayat_ujian.nilai_subtes2,riwayat_ujian.nilai_subtes1,riwayat_ujian.nilai_subtes2,riwayat_ujian.nilai_subtes3,riwayat_ujian.nilai_subtes4,riwayat_ujian.nilai_subtes5,riwayat_ujian.nilai_subtes6,riwayat_ujian.hasil,riwayat_ujian.standar_kelulusan,riwayat_ujian.status_hasil,riwayat_ujian.biaya,profil.nomor_ktp,profil.nama_lengkap');
		$this->db->from('sertifikat');
		$this->db->join('riwayat_ujian', 'sertifikat.id_riwayat_ujian = riwayat_ujian.id', "left");
		$this->db->join('profil', 'sertifikat.id_user = profil.id_user', "left");
		$this->db->order_by('sertifikat.id', 'desc');
		if ($jenis_sim) {
			$this->db->where('riwayat_ujian.jenis_sim', $jenis_sim);
		}
		if ($status == 'Aktif') {
			$this->db->where('sertifikat.berakhir >', date('Y-m-d'));
		} else if ($status == "Expired") {
			$this->db->where('sertifikat.berakhir <', date('Y-m-d'));
		}
		$sertifikat = $this->db->order_by('sertifikat.id', 'DESC')->get()->result();
		$array = array();
		foreach ($sertifikat as $query) {
			$berakhir = date("d-m-Y", strtotime($query->berakhir));
			if ($query->berakhir > date('Y-m-d')) {
				$status = 'Aktif';
			} else {
				$status = 'Expired';
			}
			$data = array(
				'id' => $query->id,
				'id_sertifikat' => $query->id_sertifikat,
				'no_ujian' => $query->no_ujian,
				'nomor_ktp' => $query->nomor_ktp,
				'nama_lengkap' => $query->nama_lengkap,
				'jenis_sim' => $query->jenis_sim,
				'berakhir' => $berakhir,
				'status' => $status
			);
			array_push($array, $data);
		}
		echo json_encode($array);
	}

	public function getDetailSertifikat()
	{
		$id = $this->input->post('id');
		$this->db->select('sertifikat.*,riwayat_ujian.no_ujian,riwayat_ujian.jenis_sim,riwayat_ujian.nilai_subtes1,riwayat_ujian.nilai_subtes2,riwayat_ujian.nilai_subtes1,riwayat_ujian.nilai_subtes2,riwayat_ujian.nilai_subtes3,riwayat_ujian.nilai_subtes4,riwayat_ujian.nilai_subtes5,riwayat_ujian.nilai_subtes6,riwayat_ujian.hasil,riwayat_ujian.standar_kelulusan,riwayat_ujian.status_hasil,riwayat_ujian.biaya,profil.nomor_ktp,profil.nama_lengkap');
		$this->db->from('sertifikat');
		$this->db->join('riwayat_ujian', 'sertifikat.id_riwayat_ujian = riwayat_ujian.id', "left");
		$this->db->join('profil', 'sertifikat.id_user = profil.id_user', "left");
		$this->db->where('sertifikat.id', $id);
		$sertifikat = $this->db->get()->row();

		// $created_at = date("d-m-Y H:i:s", strtotime($sertifikat->created_at));

		$rata_rata = round(($sertifikat->nilai_subtes1 + $sertifikat->nilai_subtes2 + $sertifikat->nilai_subtes3 +  $sertifikat->nilai_subtes4 + $sertifikat->nilai_subtes5 + $sertifikat->nilai_subtes6) / 6);

		if ($sertifikat->berakhir > date("Y-m-d")) {
			$status = 'Aktif';
			$proses = '<div class="modal-footer">
                                        <a id="downloadSertifikat" href="' . base_url('downloadSertifikat?sertifikat=' . $sertifikat->id_sertifikat) . '" class="btn btn-success" id="btnUpdate" target="_blank">Download</a>
                                    </div>';
		} else {
			$status = "Expired";
			$proses = "";
		}

		$detail = '                          
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Sertifikat Nomor : ' . $sertifikat->id_sertifikat . '</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
        <ul class="list-group list-group-flush">
        <li class="list-group-item px-2">
						<p style="display: inline;">Nomor Sertifikat :</p>
						<strong style="float: right;">' . $sertifikat->id_sertifikat . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Status Sertifikat :</p>
						<strong style="float: right;">' . $status . '</strong>
					</li>
					<li class="list-group-item px-2">
						<p style="display: inline;">Nomor Ujian :</p>
						<strong style="float: right;">' . $sertifikat->no_ujian . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Nomor KTP :</p>
						<strong style="float: right;">' . $sertifikat->nomor_ktp . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Nama :</p>
						<strong style="float: right;">' . $sertifikat->nama_lengkap . '</strong>
					</li>
					<li class="list-group-item px-2">
						<p style="display: inline;">SIM :</p>
						<strong style="float: right;">' . $sertifikat->jenis_sim . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Nilai Stabilitas Emosi :</p>
						<strong style="float: right;">' . $sertifikat->nilai_subtes1 . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Nilai Pengendalian Diri :</p>
						<strong style="float: right;">' . $sertifikat->nilai_subtes2 . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Nilai Penyesuaian Diri :</p>
						<strong style="float: right;">' . $sertifikat->nilai_subtes3 . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Nilai Ketahanan :</p>
						<strong style="float: right;">' . $sertifikat->nilai_subtes4 . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Nilai Kecermatan :</p>
						<strong style="float: right;">' . $sertifikat->nilai_subtes5 . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Nilai Konsentrasi :</p>
						<strong style="float: right;">' . $sertifikat->nilai_subtes6 . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Rata-Rata :</p>
						<strong style="float: right;">' . $rata_rata . '</strong>
					</li>
                    <li class="list-group-item px-2">
						<p style="display: inline;">Standar Kelulusan :</p>
						<strong style="float: right;">' . $sertifikat->standar_kelulusan . '</strong>
					</li>
				</ul>
                </div>' . $proses;
		// $detail .= $sertifikat;
		echo $detail;
	}

	public function akunPengusul()
	{
		$data = array(
			'judul' => 'Akun Pengusul'
		);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('page/admin/pengusul/akun_pengusul');
		$this->load->view('templates/footer');
	}

	public function getAkunPengusul()
	{
		$this->db->select('profil.nama_lengkap,profil.nomor_ktp,profil.nama_lengkap,profil.id_user,user.id,user.username,user.password');
		$this->db->from('user');
		$this->db->join('profil', 'profil.id_user = user.id', "right");
		$this->db->where('user.role', 'pengusul');
		$this->db->order_by('user.id', 'desc');
		$query = $this->db->get()->result();
		echo json_encode($query);
	}

	public function getDetailAkunPengusul()
	{
		$id = $this->input->post('id');
		$this->db->select('profil.*,user.username,user.password');
		$this->db->from('user');
		$this->db->join('profil', 'profil.id_user = user.id', "right");
		$this->db->where('user.role', 'pengusul');
		$this->db->where('user.id', $id);
		$query = $this->db->get()->row();
		echo json_encode($query);
	}

	private function random($len)
	{

		$result = "";
		$chars = "abcdefghijklmnopqrstuvwxyz0123456789";

		$charArray = str_split($chars);

		for ($i = 0; $i < $len; $i++) {

			$randItem = array_rand($charArray);

			$result .= "" . $charArray[$randItem];
		}
		return $result;
	}

	public function coba()
	{
		$this->load->library('ciqrcode');

		header("Content-Type: image/png");
		$params['data'] = 'This is a text to encode become QR Code';
		$this->ciqrcode->generate($params);

		// echo '<img src="' . base_url() . 'tes.png" />';
		// $this->load->library('ciqrcode');

		// $params['data'] = 'This is a text to encode become QR Code';
		// $params['level'] = 'H';
		// $params['size'] = 10;
		// $params['savename'] = FCPATH . 'tes.png';
		// $this->ciqrcode->generate($params);

		// echo '<img src="' . base_url() . 'tes.png" />';
	}
}
