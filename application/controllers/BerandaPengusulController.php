<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') or exit('No direct script access allowed');

class BerandaPengusulController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		setlocale(LC_ALL, 'id-ID', 'id_ID');
	}

	public function index()
	{
		$alamat = $this->db->where('nama', 'alamat')->get('pengaturan')->row()->nilai;
		$no_telepon = $this->db->where('nama', 'no_telepon')->get('pengaturan')->row()->nilai;
		$email = $this->db->where('nama', 'email')->get('pengaturan')->row()->nilai;
		$facebook = $this->db->where('nama', 'facebook')->get('pengaturan')->row()->nilai;
		$instagram = $this->db->where('nama', 'instagram')->get('pengaturan')->row()->nilai;
		$total_pendaftar = $this->db->where('role', 'pengusul')->get('user')->num_rows();
		$total_pendaftar_tahunan = $this->db->query('select role, YEAR(created_at) from user WHERE role = "pengusul" && YEAR(created_at) =' . date('Y'))->num_rows();
		$total_pendaftar_bulanan = $this->db->query('select role, MONTH(created_at), YEAR(created_at) from user WHERE role = "pengusul" && YEAR(created_at) =' . date('Y') . ' && MONTH(created_at) =' . date('m'))->num_rows();
		$total_pendaftar_harian = $this->db->query('select role, DAY(created_at), MONTH(created_at), YEAR(created_at) from user WHERE role = "pengusul" && YEAR(created_at) =' . date('Y') . ' && MONTH(created_at) =' . date('m') . ' && DAY(created_at) =' . date('d'))->num_rows();

		$data = array(
			'alamat' => $alamat,
			'no_telepon' => $no_telepon,
			'email' => $email,
			'facebook' => $facebook,
			'instagram' => $instagram,
			'total_pendaftar' => $total_pendaftar,
			'pendaftar_tahunan' => $total_pendaftar_tahunan,
			'pendaftar_bulanan' => $total_pendaftar_bulanan,
			'pendaftar_harian' => $total_pendaftar_harian
		);
		$this->load->view('templates/pengusul/header_beranda', $data);
		$this->load->view('page/pengusul/beranda');
		$this->load->view('templates/pengusul/footer_beranda', $data);
	}

	public function lupa_password()
	{
		$data = [
			'title' => 'Lupa Password',
			// 'profil' => $profil,
			// 'riwayat_ujian' => $riwayat_ujian,
			// 'list_sertifikat' => $sertifikat,
			// 'belum_bayar' => $belum_bayar,
			// 'ditolak' => $ditolak
		];
		$this->load->view('templates/pengusul/header_dashboard', $data);
		$this->load->view('page/pengusul/lupa_password');
		$this->load->view('templates/pengusul/footer_dashboard');
	}

	public function cetakSertifikat()
	{
		if (!$this->session->userdata('status') == "login") {
			redirect(base_url());
		}
		$id_sertifikat = $this->input->get('sertifikat');
		$this->db->select('sertifikat.*,sertifikat.berakhir, riwayat_ujian.no_ujian,riwayat_ujian.jenis_sim,riwayat_ujian.tipe_soal,riwayat_ujian.nilai_subtes1,riwayat_ujian.nilai_subtes2,riwayat_ujian.nilai_subtes3,riwayat_ujian.nilai_subtes4,riwayat_ujian.nilai_subtes5,riwayat_ujian.nilai_subtes6,riwayat_ujian.hasil,riwayat_ujian.standar_kelulusan,riwayat_ujian.status_hasil,riwayat_ujian.biaya,riwayat_ujian.created_at,profil.nomor_ktp as nomor_ktp,profil.nama_lengkap as nama_lengkap');
		$this->db->from('sertifikat');
		$this->db->join('riwayat_ujian', 'sertifikat.id_riwayat_ujian = riwayat_ujian.id', "left");
		$this->db->join('profil', 'sertifikat.id_user = profil.id_user', "left");
		$this->db->where('sertifikat.id_sertifikat', $id_sertifikat);
		if ($this->session->userdata('role') == "Pengusul") {
			$this->db->where('sertifikat.id_user', $this->session->userdata('id'));
		}
		$sertifikat = $this->db->get()->row();
		$data = array(
			'nama_lengkap'  => $sertifikat->nama_lengkap,
			'nik'  => $sertifikat->nomor_ktp,
			'nomor_ujian' => $sertifikat->no_ujian,
			'jenis_sim' => $sertifikat->jenis_sim,
			'tipe_soal' => $sertifikat->tipe_soal,
			'tgl_ujian' => $sertifikat->created_at,
			'exp' => $sertifikat->berakhir,
			'nilai_sub1' => $sertifikat->nilai_subtes1,
			'nilai_sub2' => $sertifikat->nilai_subtes2,
			'nilai_sub3' => $sertifikat->nilai_subtes3,
			'nilai_sub4' => $sertifikat->nilai_subtes4,
			'nilai_sub5' => $sertifikat->nilai_subtes5,
			'nilai_sub6' => $sertifikat->nilai_subtes6,
			'hasil' => $sertifikat->hasil,
		);
		// $data[]	 = $sertifikat->nama_lengkap;

		// $this->load->library('pdfgenerator');

		// $html = $this->load->view('templates/pengusul/sertifikat', $data, true);

		// $this->pdfgenerator->generate($html, 'sertifikat');
		// $this->pdfgenerator->generate($html, 'Sertifikat_');


		$this->load->view('templates/pengusul/sertifikat', $data);
		// echo json_encode($sertifikat);
	}


	public function downloadSertifikat()
	{
		if (!$this->session->userdata('status') == "login") {
			redirect(base_url());
		}
		$id_sertifikat = $this->input->get('sertifikat');
		$this->db->select('sertifikat.*,sertifikat.berakhir, riwayat_ujian.no_ujian,riwayat_ujian.jenis_sim,riwayat_ujian.tipe_soal,riwayat_ujian.nilai_subtes1,riwayat_ujian.nilai_subtes2,riwayat_ujian.nilai_subtes3,riwayat_ujian.nilai_subtes4,riwayat_ujian.nilai_subtes5,riwayat_ujian.nilai_subtes6,riwayat_ujian.hasil,riwayat_ujian.standar_kelulusan,riwayat_ujian.status_hasil,riwayat_ujian.biaya,riwayat_ujian.created_at,profil.nomor_ktp as nomor_ktp,profil.nama_lengkap as nama_lengkap');
		$this->db->from('sertifikat');
		$this->db->join('riwayat_ujian', 'sertifikat.id_riwayat_ujian = riwayat_ujian.id', "left");
		$this->db->join('profil', 'sertifikat.id_user = profil.id_user', "left");
		$this->db->where('sertifikat.id_sertifikat', $id_sertifikat);
		if ($this->session->userdata('role') == "Pengusul") {
			$this->db->where('sertifikat.id_user', $this->session->userdata('id'));
		}

		// $this->load->library('ciqrcode');
		// header("Content-Type: image/png");
		$sertifikat = $this->db->get()->row();

		// $params['data'] = $sertifikat->nama_lengkap;
		// $qrcode = $this->ciqrcode->generate($params);

		$data = array(
			'nama_lengkap'  => $sertifikat->nama_lengkap,
			'nik'  => $sertifikat->nomor_ktp,
			'nomor_sertifikat' => $sertifikat->nomor_sertifikat,
			'nomor_ujian' => $sertifikat->no_ujian,
			'jenis_sim' => $sertifikat->jenis_sim,
			'tipe_soal' => $sertifikat->tipe_soal,
			'tgl_ujian' => $sertifikat->created_at,
			'exp' => $sertifikat->berakhir,
			'nilai_sub1' => $sertifikat->nilai_subtes1,
			'nilai_sub2' => $sertifikat->nilai_subtes2,
			'nilai_sub3' => $sertifikat->nilai_subtes3,
			'nilai_sub4' => $sertifikat->nilai_subtes4,
			'nilai_sub5' => $sertifikat->nilai_subtes5,
			'nilai_sub6' => $sertifikat->nilai_subtes6,
			'hasil' => $sertifikat->hasil,
			// 'qrcode' => $qrcode
		);
		// $data[]	 = $sertifikat->nama_lengkap;

		// $this->load->library('pdfgenerator');

		// $html = $this->load->view('templates/pengusul/sertifikat', $data, true);

		// $this->pdfgenerator->generate($html, 'sertifikat');
		// $this->pdfgenerator->generate($html, 'Sertifikat_');

		$this->load->library('ciqrcode');

		$params['data'] = $sertifikat->nama_lengkap . ' | ' . $sertifikat->no_ujian . ' | EXP : ' . date('d/m/Y', strtotime($sertifikat->berakhir));
		$params['level'] = 'H';
		$params['size'] = 3;
		$params['savename'] = FCPATH . '/assets/upload/pengaju/qrcode/' . $sertifikat->no_ujian . '.png';
		$this->ciqrcode->generate($params);

		$this->load->view('templates/pengusul/sertifikat_pengusul', $data);
		// echo json_encode($sertifikat);
	}
}
