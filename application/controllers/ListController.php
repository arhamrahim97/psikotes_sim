<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') or exit('No direct script access allowed');

class ListController extends CI_Controller
{
	public function listProvinsi()
	{
		$provinsi = $this->db->order_by('nama', 'asc')->get('wilayah_provinsi')->result();
		$list = '<option value="">- Pilih Provinsi -</option>';
		foreach ($provinsi as $prov) {
			$list .= '<option value="' . $prov->id . '">' . $prov->nama  . '</option>';
		}
		echo $list;
	}

	public function listKabupaten()
	{
		$id_provinsi = $this->input->post('id_provinsi');
		$kabupaten = $this->db->where('provinsi_id', $id_provinsi)->order_by('nama', 'asc')->get('wilayah_kabupaten')->result();
		$list = '<option value="">- Pilih Kabupaten -</option>';
		foreach ($kabupaten as $kab) {
			$list .= '<option value="' . $kab->id . '">' . $kab->nama  . '</option>';
		}
		echo $list;
	}

	public function listKecamatan()
	{
		$id_kabupaten = $this->input->post('id_kabupaten');
		$kecamatan = $this->db->where('kabupaten_id', $id_kabupaten)->order_by('nama', 'asc')->get('wilayah_kecamatan')->result();
		$list = '<option value="">- Pilih Kecamatan -</option>';
		foreach ($kecamatan as $kec) {
			$list .= '<option value="' . $kec->id . '">' . $kec->nama  . '</option>';
		}
		echo $list;
	}

	public function listKelurahan()
	{
		$id_kecamatan = $this->input->post('id_kecamatan');
		$kelurahan = $this->db->where('kecamatan_id', $id_kecamatan)->order_by('nama', 'asc')->get('wilayah_desa')->result();
		$list = '<option value="">- Pilih Kelurahan -</option>';
		foreach ($kelurahan as $kel) {
			$list .= '<option value="' . $kel->id . '">' . $kel->nama  . '</option>';
		}
		echo $list;
	}

	public function listUjianBuktiPembayaran()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('beranda'));
		}
		$id = $this->session->userdata('id');
		$this->db->where('id_user', $id);
		$this->db->where_in('status_bayar', ['Belum Bayar', 'Ditolak']);
		$this->db->order_by('id', 'DESC');
		$riwayat_ujian = $this->db->get('riwayat_ujian')->result();
		$list = '';
		foreach ($riwayat_ujian as $ujian) {
			$list .= '<option value="' . $ujian->id . '">(' . $ujian->no_ujian  . ') - (' . date("d-m-Y H:i:s", strtotime($ujian->created_at)) . ') - (' . $ujian->jenis_sim . ')</option>';
		}
		echo $list;
	}
}
