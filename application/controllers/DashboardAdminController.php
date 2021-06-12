<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardAdminController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        if ($this->session->userdata('role') != "admin") {
            redirect(base_url('beranda'));
        }
    }

    public function index()
    {
        $status_hasil = $this->db->query("SELECT status_hasil, COUNT(id) as jumlah FROM riwayat_ujian GROUP BY status_hasil ORDER BY status_hasil ASC")->result();
        $totalsim = $this->db->query("SELECT jenis_sim, COUNT(id) as jumlah FROM riwayat_ujian GROUP BY jenis_sim ORDER BY jenis_sim ASC")->result();
        $totalPengusul = $this->db->where('role', 'pengusul')->get('user')->num_rows();
        $menungguKonfirmasi = $this->db->where('status_bayar', 'Menunggu Konfirmasi')->get('riwayat_ujian')->num_rows();
        $sudahBayar = $this->db->where('status_bayar', 'Sudah Bayar')->get('riwayat_ujian')->num_rows();
        $belumBayar = $this->db->where('status_bayar', 'Belum Bayar')->get('riwayat_ujian')->num_rows();
        $ditolak = $this->db->where('status_bayar', 'ditolak')->get('riwayat_ujian')->num_rows();
        $data = array(
            'judul' => 'Dashboard',
            'status_hasil' => $status_hasil,
            'totalsim' => $totalsim,
            'totalPengusul' => $totalPengusul,
            'menungguKonfirmasi' => $menungguKonfirmasi,
            'sudahBayar' => $sudahBayar,
            'belumBayar' => $belumBayar,
            'ditolak' => $ditolak,
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('page/admin/dashboard');
        $this->load->view('templates/footer');
    }

    public function profil()
    {
        $data = array(
            'judul' => 'Profil'
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('page/admin/profil');
        $this->load->view('templates/footer');
    }
}
