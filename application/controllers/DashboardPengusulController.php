<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardPengusulController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Makassar');
		if ($this->session->userdata('role') != "pengusul") {
			redirect(base_url('beranda'));
		}
		$this->load->model('DashboardPengusulModel');
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		$profil = $this->db->where('id_user', $id)->get('profil')->row();
		$riwayat_ujian = $this->db->where('id_user', $id)->order_by('id', 'desc')->get('riwayat_ujian')->result();
		$sertifikat = $this->DashboardPengusulModel->listSertifikat();
		$belum_bayar = $this->db->where('id_user', $id)->where('status_bayar', 'Belum Bayar')->get('riwayat_ujian')->num_rows();
		$ditolak = $this->db->where('id_user', $id)->where('status_bayar', 'Ditolak')->get('riwayat_ujian')->num_rows();
		$data = [
			'title' => 'Dashboard',
			'profil' => $profil,
			'riwayat_ujian' => $riwayat_ujian,
			'list_sertifikat' => $sertifikat,
			'belum_bayar' => $belum_bayar,
			'ditolak' => $ditolak
		];
		$this->load->view('templates/pengusul/header_dashboard', $data);
		$this->load->view('page/pengusul/dashboard');
		$this->load->view('templates/pengusul/footer_dashboard');
	}

	public function ujian()
	{
		$id = $this->session->userdata('id');
		$profil = $this->db->where('id_user', $id)->get('profil')->row();
		$data = [
			'title' => 'Ujian',
			'profil' => $profil
		];
		$data['blokirSoalA'] = $this->db->where('id', 8)->get('pengaturan')->row()->nilai;
		$data['blokirSoalB'] = $this->db->where('id', 9)->get('pengaturan')->row()->nilai;
		$this->load->view('templates/pengusul/header_dashboard', $data);
		$this->load->view('page/pengusul/ujian');
		$this->load->view('templates/pengusul/footer_dashboard');
	}

	public function hasil()
	{
		$id = $this->session->userdata('id');
		$profil = $this->db->where('id_user', $id)->get('profil')->row();
		$standar_kelulusan = $this->db->where('nama', 'standar_kelulusan')->get('pengaturan')->row()->nilai;
		$biaya = $this->db->where('id', $profil->provinsi)->get('wilayah_provinsi')->row()->biaya;
		$bank = $this->db->where('aktif', 1)->order_by('nama_bank', 'asc')->get('bank')->result();
		$tipe_soal = $this->input->post('tipe_soal');
		$tipe_sim = $this->input->post('tipe_sim');

		$nilai_subtes1 = 0;
		$nilai_subtes2 = 0;
		$nilai_subtes3 = 0;
		$nilai_subtes4 = 0;
		$nilai_subtes5 = 0;
		$nilai_subtes6 = 0;

		$subtes1 = $this->input->post('subtes1');
		$subtes2 = $this->input->post('subtes2');
		$subtes3 = $this->input->post('subtes3');
		$subtes4 = $this->input->post('subtes4');
		$subtes5 = $this->input->post('subtes5');
		$subtes6 = $this->input->post('subtes6');

		if ($subtes1 == "" && $subtes2 == "" && $subtes3 == "" && $subtes4 == "" && $subtes5 == "" && $subtes6 == "") {
			redirect(base_url('dashboard'));
		}

		$i = 1;
		foreach ($subtes1 as $sub1) {
			if ($sub1 == "a") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes1')->row()->nilai_a;
				$nilai_subtes1 += $nilai;
			} else if ($sub1 == "b") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes1')->row()->nilai_b;
				$nilai_subtes1 += $nilai;
			} else if ($sub1 == "c") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes1')->row()->nilai_c;
				$nilai_subtes1 += $nilai;
			}
			$i++;
		}

		$i = 1;
		foreach ($subtes2 as $sub2) {
			if ($sub2 == "a") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes2')->row()->nilai_a;
				$nilai_subtes2 += $nilai;
			} else if ($sub2 == "b") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes2')->row()->nilai_b;
				$nilai_subtes2 += $nilai;
			} else if ($sub2 == "c") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes2')->row()->nilai_c;
				$nilai_subtes2 += $nilai;
			}
			$i++;
		}

		$i = 1;
		foreach ($subtes3 as $sub3) {
			if ($sub3 == "a") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes3')->row()->nilai_a;
				$nilai_subtes3 += $nilai;
			} else if ($sub3 == "b") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes3')->row()->nilai_b;
				$nilai_subtes3 += $nilai;
			} else if ($sub3 == "c") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes3')->row()->nilai_c;
				$nilai_subtes3 += $nilai;
			}
			$i++;
		}

		$i = 1;
		foreach ($subtes4 as $sub4) {
			if ($sub4 == "a") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes4')->row()->nilai_a;
				$nilai_subtes4 += $nilai;
			} else if ($sub4 == "b") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes4')->row()->nilai_b;
				$nilai_subtes4 += $nilai;
			} else if ($sub4 == "c") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes4')->row()->nilai_c;
				$nilai_subtes4 += $nilai;
			} else if ($sub4 == "d") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes4')->row()->nilai_d;
				$nilai_subtes4 += $nilai;
			}
			$i++;
		}

		$i = 1;
		foreach ($subtes5 as $sub5) {
			if ($sub5 == "a") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes5')->row()->nilai_a;
				$nilai_subtes5 += $nilai;
			} else if ($sub5 == "b") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes5')->row()->nilai_b;
				$nilai_subtes5 += $nilai;
			} else if ($sub5 == "c") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes5')->row()->nilai_c;
				$nilai_subtes5 += $nilai;
			} else if ($sub5 == "d") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes5')->row()->nilai_d;
				$nilai_subtes5 += $nilai;
			}
			$i++;
		}

		$i = 1;
		foreach ($subtes6 as $sub6) {
			if ($sub6 == "a") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes6')->row()->nilai_a;
				$nilai_subtes6 += $nilai;
			} else if ($sub6 == "b") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes6')->row()->nilai_b;
				$nilai_subtes6 += $nilai;
			} else if ($sub6 == "c") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes6')->row()->nilai_c;
				$nilai_subtes6 += $nilai;
			} else if ($sub6 == "d") {
				$this->db->where('tipe', $tipe_soal);
				$this->db->where('no_soal', $i);
				$nilai = $this->db->get('subtes6')->row()->nilai_d;
				$nilai_subtes6 += $nilai;
			}
			$i++;
		}

		$hasil_subtes1 = round(($nilai_subtes1 / (3 * count($subtes1))) * 100);
		$hasil_subtes2 = round(($nilai_subtes2 / (3 * count($subtes2))) * 100);
		$hasil_subtes3 = round(($nilai_subtes3 / (3 * count($subtes3))) * 100);
		$hasil_subtes4 = round(($nilai_subtes4 / (1 * count($subtes4))) * 100);
		$hasil_subtes5 = round(($nilai_subtes5 / (1 * count($subtes5))) * 100);
		$hasil_subtes6 = round(($nilai_subtes6 / (1 * count($subtes6))) * 100);

		$nilai_akhir = round(($hasil_subtes1 + $hasil_subtes2 + $hasil_subtes3 + $hasil_subtes4 + $hasil_subtes5 + $hasil_subtes6) / 6);

		if ($nilai_akhir < $standar_kelulusan) {
			$status_hasil = "Belum Lulus";
			$biaya = "-";
		} else {
			$status_hasil = "Lulus";
			$biaya = $biaya + mt_rand(100, 499);
		}

		if ($status_hasil == "Belum Lulus") {
			$status_bayar = "-";
		} else {
			$status_bayar = "Belum Bayar";
		}


		$invoice1 = $this->random(4);
		$invoice = mt_rand(100, 999);

		$nomor_ujian = $invoice1 . $invoice;

		$riwayat_ujian = array(
			'id_user' => $id,
			'no_ujian' => $nomor_ujian,
			'tipe_soal' => $tipe_soal,
			'jenis_sim' => $tipe_sim,
			'nilai_subtes1' => $hasil_subtes1,
			'nilai_subtes2' => $hasil_subtes2,
			'nilai_subtes3' => $hasil_subtes3,
			'nilai_subtes4' => $hasil_subtes4,
			'nilai_subtes5' => $hasil_subtes5,
			'nilai_subtes6' => $hasil_subtes6,
			'hasil' => $nilai_akhir,
			'standar_kelulusan' => $standar_kelulusan,
			'status_hasil' => $status_hasil,
			'biaya' => $biaya,
			'status_bayar' => $status_bayar,
			'created_at' => date("Y-m-d H:i:s")
		);

		$this->db->insert('riwayat_ujian', $riwayat_ujian);

		$data = [
			'title' => 'Hasil',
			'hasil' => $nilai_akhir,
			'profil' => $profil,
			'standar_kelulusan' => $standar_kelulusan,
			'nomor_ujian' => $nomor_ujian,
			'tipe_soal' => $tipe_soal,
			'tipe_sim' => $tipe_sim,
			'bank' => $bank,
			'biaya' => $biaya
		];
		$this->load->view('templates/pengusul/header_dashboard', $data);
		$this->load->view('page/pengusul/hasil');
		$this->load->view('templates/pengusul/footer_dashboard');
	}

	public function pembayaran()
	{
		$bank = $this->db->where('aktif', 1)->order_by('nama_bank', 'asc')->get('bank')->result();
		$id = $this->session->userdata('id');
		$profil = $this->db->where('id_user', $id)->get('profil')->row();
		$data = [
			'title' => 'Pembayaran',
			'profil' => $profil,
			'bank' => $bank
		];
		$this->load->view('templates/pengusul/header_dashboard', $data);
		$this->load->view('page/pengusul/bayar');
		$this->load->view('templates/pengusul/footer_dashboard');
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

	public function getDetailRiwayat()
	{
		$id = $this->input->post('id');
		$riwayat_ujian = $this->db->where('id', $id)->get('riwayat_ujian')->row();
		$no_ujian = $riwayat_ujian->no_ujian;
		$created_at = date("d-m-Y H:i:s", strtotime($riwayat_ujian->created_at));
		$tipe_soal = $riwayat_ujian->tipe_soal;
		$jenis_sim = $riwayat_ujian->jenis_sim;
		$status_hasil = $riwayat_ujian->status_hasil;
		$alasan_ditolak = $riwayat_ujian->alasan_ditolak;
		if ($riwayat_ujian->biaya == '-') {
			$biaya = "-";
		} else {
			$biaya = "Rp. " . number_format($riwayat_ujian->biaya, 0, ',', '.');
		}
		$status_bayar = $riwayat_ujian->status_bayar;

		$detail_riwayat = array(
			'no_ujian' => $no_ujian,
			'created_at' => $created_at,
			'tipe_soal' => $tipe_soal,
			'jenis_sim' => $jenis_sim,
			'status_hasil' => $status_hasil,
			'biaya' => $biaya,
			'status_bayar' => $status_bayar,
			'alasan_ditolak' => $alasan_ditolak
		);
		echo json_encode($detail_riwayat);
	}

	public function getBiaya()
	{
		$id = $this->input->post('id');
		$riwayat_ujian = $this->db->where('id', $id)->get('riwayat_ujian')->row();
		$biaya = "Rp. " . number_format($riwayat_ujian->biaya, 0, ',', '.');
		$detail_biaya = array(
			'biaya' => $biaya,
		);
		echo json_encode($detail_biaya);
	}

	public function prosesBayar()
	{
		$id = $this->input->post('id_ujian');
		$config['upload_path'] = "./assets/upload/pengaju/bukti"; //path folder file upload
		$config['allowed_types'] = 'gif|jpg|png|jpeg|heic';
		$config['encrypt_name'] = TRUE; //enkripsi file name upload

		$this->load->library('upload', $config); //call library upload 
		if ($this->upload->do_upload("file")) { //upload file
			$nama_file = $this->upload->data();
			$image = $nama_file['file_name']; //set file name ke variable image
			$data = array(
				'status_bayar' => 'Menunggu Konfirmasi',
				'bukti_pembayaran' => $image
			);
			$this->db->where('id', $id);
			$this->db->update('riwayat_ujian', $data);
			redirect(base_url('dashboard'));
		} else {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}
	}

	public function getSoal()
	{
		$tipe_soal = $this->input->post('tipe_soal');
		$tipe_sim = $this->input->post('tipe_sim');
		$subtes1 = $this->db->where('tipe', $tipe_soal)->get('subtes1')->result();
		$subtes2 = $this->db->where('tipe', $tipe_soal)->get('subtes2')->result();
		$subtes3 = $this->db->where('tipe', $tipe_soal)->get('subtes3')->result();
		$subtes4 = $this->db->where('tipe', $tipe_soal)->get('subtes4')->result();
		$subtes5 = $this->db->where('tipe', $tipe_soal)->get('subtes5')->result();
		$subtes6 = $this->db->where('tipe', $tipe_soal)->get('subtes6')->result();

		$this->db->select('sertifikat.*,riwayat_ujian.no_ujian,riwayat_ujian.jenis_sim,riwayat_ujian.nilai_subtes1,riwayat_ujian.nilai_subtes2,riwayat_ujian.nilai_subtes1,riwayat_ujian.nilai_subtes2,riwayat_ujian.nilai_subtes3,riwayat_ujian.nilai_subtes4,riwayat_ujian.nilai_subtes5,riwayat_ujian.nilai_subtes6,riwayat_ujian.hasil,riwayat_ujian.standar_kelulusan,riwayat_ujian.status_hasil,riwayat_ujian.biaya');
		$this->db->from('sertifikat');
		$this->db->join('riwayat_ujian', 'sertifikat.id_riwayat_ujian = riwayat_ujian.id', "left");
		$this->db->where('sertifikat.berakhir >', date('Y-m-d'));
		$this->db->where('sertifikat.id_user', $this->session->userdata('id'));
		$this->db->where('riwayat_ujian.jenis_sim', $tipe_sim);
		$sertifikat = $this->db->get()->num_rows();
		if ($sertifikat > 0) {
			$error = array(
				'error' => 'sertifikat_sudah_ada'
			);
			echo json_encode($error);
			die;
		}

		$this->db->where('jenis_sim', $tipe_sim);
		$this->db->where('status_bayar', 'Belum Bayar');
		// $this->db->or_where('status_bayar', 'Menunggu Konfirmasi');
		$this->db->where('id_user', $this->session->userdata('id'));
		$riwayat_ujian = $this->db->get('riwayat_ujian')->num_rows();
		if ($riwayat_ujian > 0) {
			$error = array(
				'error' => 'ujian_sudah_ada'
			);
			echo json_encode($error);
			die;
		}

		$this->db->where('jenis_sim', $tipe_sim);
		// $this->db->where('status_bayar', 'Belum Bayar');
		$this->db->where('status_bayar', 'Menunggu Konfirmasi');
		$this->db->where('id_user', $this->session->userdata('id'));
		$riwayat_ujian = $this->db->get('riwayat_ujian')->num_rows();
		if ($riwayat_ujian > 0) {
			$error = array(
				'error' => 'ujian_sudah_ada'
			);
			echo json_encode($error);
			die;
		}

		$soal = '';
		$soal .= '<form action="hasil" method="POST" id="soalTes">
        			<input type="text" name="tipe_soal" value="' . $tipe_soal . '" hidden>
			<input type="text" name="tipe_sim" value="' . $tipe_sim . '" hidden>
        <div class="container my-5">
            <h1>Kategori 1</h1>';

		$i = 1;
		foreach ($subtes1 as $sub1) {
			$soal .= '
                <table class="table">
                    <tr>
                        <td width="2%">' . $i . ". " . '</td>
                        <td>' . $sub1->pertanyaan . '</td>
                    </tr>
                </table>

                <table class="table borderless ">
                    <tr>
                        <td width="2%"><input type="radio" name="subtes1[' . $i . ']" id="subtes1_' . $i . '" value="a"></td>
                        <td width="2%">A.</td>
                        <td>' . $sub1->pilihan_a . '</td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes1[' . $i . ']" id="subtes1_' . $i . '" value="b"></td>
                        <td width="2%">B.</td>
                        <td>' . $sub1->pilihan_b . '</td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes1[' . $i  . ']" id="subtes1_' . $i . ' " value="c"></td>
                        <td width="2%">C.</td>
                        <td>' . $sub1->pilihan_c . '</td>
                    </tr>
                </table>';
			$i++;
		}

		$soal .= '<h1 class="mt-5">Kategori 2</h1>';
		$i = 1;
		foreach ($subtes2 as $sub2) {
			$soal .= '
                <table class="table">
                    <tr>
                        <td width="2%">' .  $i . ". " . '</td>
                        <td>' . $sub2->pertanyaan . '</td>
                    </tr>
                </table>

                <table class="table borderless ">
                    <tr>
                        <td width="2%"><input type="radio" name="subtes2[' . $i  . ']" id="subtes2_' . $i  . '" value="a"></td>
                        <td width="2%">A.</td>
                        <td>' . $sub2->pilihan_a . '</td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes2[' . $i  . ']" id="subtes2_' . $i  . '" value="b"></td>
                        <td width="2%">B.</td>
                        <td>' . $sub2->pilihan_b . '</td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes2[' . $i  . ']" id="subtes2_' . $i  . '" value="c"></td>
                        <td width="2%">C.</td>
                        <td>' . $sub2->pilihan_c . '</td>
                    </tr>
                </table>';
			$i++;
		}

		$soal .= '<h1 class="mt-5">Kategori 3</h1>';
		$i = 1;
		foreach ($subtes3 as $sub3) {
			$soal .= '
                <table class="table">
                    <tr>
                        <td width="2%">' . $i . ". " . '</td>
                        <td>' . $sub3->pertanyaan . '</td>
                    </tr>
                </table>

                <table class="table borderless ">
                    <tr>
                        <td width="2%"><input type="radio" name="subtes3[' . $i  . ']" id="subtes3_' .  $i . '" value="a"></td>
                        <td width="2%">A.</td>
                        <td>' . $sub3->pilihan_a . '</td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes3[' . $i  . ']" id="subtes3_' .  $i . '" value="b"></td>
                        <td width="2%">B.</td>
                        <td>' . $sub3->pilihan_b . '</td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes3[' . $i  . ']" id="subtes3_' .  $i . '" value="c"></td>
                        <td width="2%">C.</td>
                        <td>' . $sub3->pilihan_c . '</td>
                    </tr>
                </table>';
			$i++;
		}

		$soal .= '<h1 class="mt-5">Kategori 4</h1>';

		$i = 1;
		foreach ($subtes4 as $sub4) {
			$soal .= '<table class="table">
                    <tr>
                        <td width="2%">' .  $i . ". " . '</td>
                        <td>' .  $sub4->pertanyaan;
			if (($sub4->id == 13) && ($sub4->tipe == 'A') || ($sub4->id == 25) && ($sub4->tipe == 'B')) {
				$soal .= '<a href="#" data-toggle="modal" data-target=".modalKategori4BagianA"><span class="badge badge-info shadow" style="display: inline">Contoh Cara Pengerjaan (Klik Disini)</span></a>';
			} else if (($sub4->id == 23) && ($sub4->tipe == 'A') || ($sub4->id == 35) && ($sub4->tipe == 'B')) {
				$soal .= '<a href="#" data-toggle="modal" data-target=".modalKategori4BagianC"><span class="badge badge-info shadow" style="display: inline">Contoh Cara Pengerjaan (Klik Disini)</span></a>';
			}
			'</td>';

			$soal .= '</tr>
                </table>

                <table class="table borderless ">
                    <tr>
                        <td width="2%"><input type="radio" name="subtes4[' .  $i . ']" id="subtes4_' . $i . '" value="a"></td>
                        <td width="2%">A.</td>
                        <td>' . $sub4->pilihan_a . '</td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes4[' .  $i . ']" id="subtes4_' . $i . '" value="b"></td>
                        <td width="2%">B.</td>
                        <td>' . $sub4->pilihan_b . '</td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes4[' .  $i . ']" id="subtes4_' . $i . '" value="c"></td>
                        <td width="2%">C.</td>
                        <td>' . $sub4->pilihan_c . '</td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes4[' . $i . ']" id="subtes4_' . $i . '" value="d"></td>
                        <td width="2%">D.</td>
                        <td>' . $sub4->pilihan_d . '</td>
                    </tr>
                </table>';
			$i++;
		}

		$soal .= '<h1 class="mt-5">Kategori 5</h1>';
		$i = 1;
		foreach ($subtes5 as $sub5) {
			$soal .= '<table class="table">
                    <tr>
                        <td width="2%">' . $i . ". " . '</td>
                        <td>' .  $sub5->pertanyaan . '</td>
                    </tr>
                </table>

                <table class="table borderless ">
                    <tr>
                        <td width="2%"><input type="radio" name="subtes5[' . $i . ']" id="subtes5_' . $i . '" value="a"></td>
                        <td width="2%">A.</td>
                        <td>' . $sub5->pilihan_a . '</td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes5[' . $i . ']" id="subtes5_' . $i . '" value="b"></td>
                        <td width="2%">B.</td>
                        <td>' . $sub5->pilihan_b . '</td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes5[' . $i . ']" id="subtes5_' . $i . '" value="c"></td>
                        <td width="2%">C.</td>
                        <td>' . $sub5->pilihan_c . '</td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes5[' . $i . ']" id="subtes5_' . $i . '" value="d"></td>
                        <td width="2%">D.</td>
                        <td>' . $sub5->pilihan_d . '</td>
                    </tr>
                </table>';
			$i++;
		}

		$soal .= '<h1 class="mt-5">Kategori 6</h1>';
		$i = 1;
		foreach ($subtes6 as $sub6) {
			$soal .= '<table class="table">
                    <tr>
                        <td width="2%">' . $i . ". " . '</td>
                        <td>' . $sub6->pertanyaan;
			if (($sub6->id == 10) && ($sub6->tipe == 'A') || ($sub6->id == 17) && ($sub6->tipe == 'B')) {
				$soal .= '<a href="#" data-toggle="modal" data-target=".modalKategori6"><span class="badge badge-info shadow" style="display: inline">Contoh Cara Pengerjaan (Klik Disini)</span></a>';
			}
			'</td>';
			$soal .= '</tr>
                </table>

                <table class="table borderless ">
                    <tr>
                        <td width="2%"><input type="radio" name="subtes6[' . $i . ']" id="subtes6_' . $i . '" value="a"></td>
                        <td width="2%">A.</td>
                        <td>' . $sub6->pilihan_a . '</td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes6[' . $i . ']" id="subtes6_' . $i . '" value="b"></td>
                        <td width="2%">B.</td>
                        <td>' . $sub6->pilihan_b . '</td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes6[' . $i . ']" id="subtes6_' . $i . '" value="c"></td>
                        <td width="2%">C.</td>
                        <td>' . $sub6->pilihan_c . '</td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes6[' . $i . ']" id="subtes6_' . $i . '" value="d"></td>
                        <td width="2%">D.</td>
                        <td>' . $sub6->pilihan_d . '</td>
                    </tr>
                </table>';
			$i++;
		}
		$soal .= '<button id="hitung" class="btn btn-success w-100" type="submit"><i class="fas fa-check-circle"></i> Selesai</button>
        </div>
    </form>';
		$array = array(
			'soal' => $soal,
			'subtes1' => count($subtes1),
			'subtes2' => count($subtes2),
			'subtes3' => count($subtes3),
			'subtes4' => count($subtes4),
			'subtes5' => count($subtes5),
			'subtes6' => count($subtes6)
		);
		echo json_encode($array);
	}
}
