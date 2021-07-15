<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') or exit('No direct script access allowed');

class SoalController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Makassar');
		$this->load->model('SoalModel');
		if ($this->session->userdata('role') != "admin") {
			redirect(base_url('beranda'));
		}
	}

	// View Subtes1
	public function subtes1()
	{
		$data['judul'] = 'Soal Stabilitas Emos';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('page/admin/soal/subtes1');
		$this->load->view('templates/footer');
	}

	// Insert Subtes1
	public function insertSubTes1()
	{
		$no_soal = $this->input->post('no_soal');
		$pertanyaan = $this->input->post('pertanyaan');
		$jawaban_a = $this->input->post('jawaban_a');
		$nilai_jawaban_a = $this->input->post('nilai_jawaban_a');
		$jawaban_b = $this->input->post('jawaban_b');
		$nilai_jawaban_b = $this->input->post('nilai_jawaban_b');
		$jawaban_c = $this->input->post('jawaban_c');
		$nilai_jawaban_c = $this->input->post('nilai_jawaban_c');
		$tipe = $this->input->post('tipe');
		$data = array(
			'no_soal' => $no_soal,
			'pertanyaan' => $pertanyaan,
			'pilihan_a' => $jawaban_a,
			'pilihan_b' => $jawaban_b,
			'pilihan_c' => $jawaban_c,
			'nilai_a' => $nilai_jawaban_a,
			'nilai_b' => $nilai_jawaban_b,
			'nilai_c' => $nilai_jawaban_c,
			'tipe' => $tipe,
			'modified_at' => date("Y-m-d H:i:s"),
			'created_at' => date("Y-m-d H:i:s")
		);
		if ($this->SoalModel->insertSubtes1($data)) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// EditSubtes1
	public function editSubtes1()
	{
		$id = $this->input->post('id_soal_edit');
		$no_soal_edit = $this->input->post('no_soal_edit');
		$pertanyaan_edit = $this->input->post('pertanyaan_edit');
		$jawaban_a_edit = $this->input->post('jawaban_a_edit');
		$nilai_jawaban_a_edit = $this->input->post('nilai_jawaban_a_edit');
		$jawaban_b_edit = $this->input->post('jawaban_b_edit');
		$nilai_jawaban_b_edit = $this->input->post('nilai_jawaban_b_edit');
		$jawaban_c_edit = $this->input->post('jawaban_c_edit');
		$nilai_jawaban_c_edit = $this->input->post('nilai_jawaban_c_edit');
		$tipe_edit = $this->input->post('tipe_edit');
		$data = array(
			'no_soal' => $no_soal_edit,
			'pertanyaan' => $pertanyaan_edit,
			'pilihan_a' => $jawaban_a_edit,
			'pilihan_b' => $jawaban_b_edit,
			'pilihan_c' => $jawaban_c_edit,
			'nilai_a' => $nilai_jawaban_a_edit,
			'nilai_b' => $nilai_jawaban_b_edit,
			'nilai_c' => $nilai_jawaban_c_edit,
			'tipe' => $tipe_edit,
			'modified_at' => date("Y-m-d H:i:s"),
		);
		if ($this->SoalModel->editSubtes1($data, $id)) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// Get Subtes1
	public function getSubtes1()
	{
		$this->db->order_by('tipe', 'asc');
		$this->db->order_by('no_soal', 'asc');
		$subtes1 = $this->db->get('subtes1')->result();
		echo json_encode($subtes1);
	}

	// Get Edit Subtes1
	public function getEditSubtes1()
	{
		$id = $this->input->post('id');
		$subtes1 = $this->db->where('id', $id)->get('subtes1')->row();
		echo json_encode($subtes1);
	}

	// Hapus Subtes1
	public function hapusSubtes1()
	{
		$id = $this->input->post('id');
		$hapusSubtes1 = $this->SoalModel->hapusSubtes1($id);
		if ($hapusSubtes1) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// Preview Subtes1
	public function getDetailSubtes1()
	{
		$id = $this->input->post('id');
		// $id = 5;
		$subtes1 = $this->db->where('id', $id)->get('subtes1')->row();
		$detail = '<div>' . $subtes1->pertanyaan . '</div>

        <table class="table borderless">
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">A.</td>
            <td>' . $subtes1->pilihan_a . '</td>
            </tr>
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">B.</td>
            <td>' . $subtes1->pilihan_b . '</td>
            </tr>
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">C.</td>
            <td>' . $subtes1->pilihan_c . '</td>
            </tr>
        </table>
    ';
		echo $detail;
	}

	// End Subtes1

	// Start Subtes 2
	// View Subtes2
	public function subtes2()
	{
		$data['judul'] = 'Soal Pengendalian Diri';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('page/admin/soal/subtes2');
		$this->load->view('templates/footer');
	}

	// Insert Subtes2
	public function insertSubTes2()
	{
		$no_soal = $this->input->post('no_soal');
		$pertanyaan = $this->input->post('pertanyaan');
		$jawaban_a = $this->input->post('jawaban_a');
		$nilai_jawaban_a = $this->input->post('nilai_jawaban_a');
		$jawaban_b = $this->input->post('jawaban_b');
		$nilai_jawaban_b = $this->input->post('nilai_jawaban_b');
		$jawaban_c = $this->input->post('jawaban_c');
		$nilai_jawaban_c = $this->input->post('nilai_jawaban_c');
		$tipe = $this->input->post('tipe');
		$data = array(
			'no_soal' => $no_soal,
			'pertanyaan' => $pertanyaan,
			'pilihan_a' => $jawaban_a,
			'pilihan_b' => $jawaban_b,
			'pilihan_c' => $jawaban_c,
			'nilai_a' => $nilai_jawaban_a,
			'nilai_b' => $nilai_jawaban_b,
			'nilai_c' => $nilai_jawaban_c,
			'tipe' => $tipe,
			'modified_at' => date("Y-m-d H:i:s"),
			'created_at' => date("Y-m-d H:i:s")
		);
		if ($this->SoalModel->insertSubtes2($data)) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// EditSubtes2
	public function editSubtes2()
	{
		$id = $this->input->post('id_soal_edit');
		$no_soal_edit = $this->input->post('no_soal_edit');
		$pertanyaan_edit = $this->input->post('pertanyaan_edit');
		$jawaban_a_edit = $this->input->post('jawaban_a_edit');
		$nilai_jawaban_a_edit = $this->input->post('nilai_jawaban_a_edit');
		$jawaban_b_edit = $this->input->post('jawaban_b_edit');
		$nilai_jawaban_b_edit = $this->input->post('nilai_jawaban_b_edit');
		$jawaban_c_edit = $this->input->post('jawaban_c_edit');
		$nilai_jawaban_c_edit = $this->input->post('nilai_jawaban_c_edit');
		$tipe_edit = $this->input->post('tipe_edit');
		$data = array(
			'no_soal' => $no_soal_edit,
			'pertanyaan' => $pertanyaan_edit,
			'pilihan_a' => $jawaban_a_edit,
			'pilihan_b' => $jawaban_b_edit,
			'pilihan_c' => $jawaban_c_edit,
			'nilai_a' => $nilai_jawaban_a_edit,
			'nilai_b' => $nilai_jawaban_b_edit,
			'nilai_c' => $nilai_jawaban_c_edit,
			'tipe' => $tipe_edit,
			'modified_at' => date("Y-m-d H:i:s"),
		);
		if ($this->SoalModel->editSubtes2($data, $id)) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// Get Subtes2
	public function getSubtes2()
	{
		$this->db->order_by('tipe', 'asc');
		$this->db->order_by('no_soal', 'asc');
		$subtes2 = $this->db->get('subtes2')->result();
		echo json_encode($subtes2);
	}

	// Get Edit Subtes2
	public function getEditSubtes2()
	{
		$id = $this->input->post('id');
		$subtes2 = $this->db->where('id', $id)->get('subtes2')->row();
		echo json_encode($subtes2);
	}

	// Hapus Subtes2
	public function hapusSubtes2()
	{
		$id = $this->input->post('id');
		$hapusSubtes2 = $this->SoalModel->hapusSubtes2($id);
		if ($hapusSubtes2) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// Preview Subtes2
	public function getDetailSubtes2()
	{
		$id = $this->input->post('id');
		// $id = 5;
		$subtes2 = $this->db->where('id', $id)->get('subtes2')->row();
		$detail = '<div>' . $subtes2->pertanyaan . '</div>

        <table class="table borderless">
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">A.</td>
            <td>' . $subtes2->pilihan_a . '</td>
            </tr>
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">B.</td>
            <td>' . $subtes2->pilihan_b . '</td>
            </tr>
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">C.</td>
            <td>' . $subtes2->pilihan_c . '</td>
            </tr>
        </table>
    ';
		echo $detail;
	}
	// End Subtes2

	// Start Subtes 3
	// View Subtes3
	public function subtes3()
	{
		$data['judul'] = 'Soal Penyesuaian Diri';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('page/admin/soal/subtes3');
		$this->load->view('templates/footer');
	}

	// Insert Subtes3
	public function insertSubTes3()
	{
		$no_soal = $this->input->post('no_soal');
		$pertanyaan = $this->input->post('pertanyaan');
		$jawaban_a = $this->input->post('jawaban_a');
		$nilai_jawaban_a = $this->input->post('nilai_jawaban_a');
		$jawaban_b = $this->input->post('jawaban_b');
		$nilai_jawaban_b = $this->input->post('nilai_jawaban_b');
		$jawaban_c = $this->input->post('jawaban_c');
		$nilai_jawaban_c = $this->input->post('nilai_jawaban_c');
		$tipe = $this->input->post('tipe');
		$data = array(
			'no_soal' => $no_soal,
			'pertanyaan' => $pertanyaan,
			'pilihan_a' => $jawaban_a,
			'pilihan_b' => $jawaban_b,
			'pilihan_c' => $jawaban_c,
			'nilai_a' => $nilai_jawaban_a,
			'nilai_b' => $nilai_jawaban_b,
			'nilai_c' => $nilai_jawaban_c,
			'tipe' => $tipe,
			'modified_at' => date("Y-m-d H:i:s"),
			'created_at' => date("Y-m-d H:i:s")
		);
		if ($this->SoalModel->insertSubtes3($data)) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// EditSubtes3
	public function editSubtes3()
	{
		$id = $this->input->post('id_soal_edit');
		$no_soal_edit = $this->input->post('no_soal_edit');
		$pertanyaan_edit = $this->input->post('pertanyaan_edit');
		$jawaban_a_edit = $this->input->post('jawaban_a_edit');
		$nilai_jawaban_a_edit = $this->input->post('nilai_jawaban_a_edit');
		$jawaban_b_edit = $this->input->post('jawaban_b_edit');
		$nilai_jawaban_b_edit = $this->input->post('nilai_jawaban_b_edit');
		$jawaban_c_edit = $this->input->post('jawaban_c_edit');
		$nilai_jawaban_c_edit = $this->input->post('nilai_jawaban_c_edit');
		$tipe_edit = $this->input->post('tipe_edit');
		$data = array(
			'no_soal' => $no_soal_edit,
			'pertanyaan' => $pertanyaan_edit,
			'pilihan_a' => $jawaban_a_edit,
			'pilihan_b' => $jawaban_b_edit,
			'pilihan_c' => $jawaban_c_edit,
			'nilai_a' => $nilai_jawaban_a_edit,
			'nilai_b' => $nilai_jawaban_b_edit,
			'nilai_c' => $nilai_jawaban_c_edit,
			'tipe' => $tipe_edit,
			'modified_at' => date("Y-m-d H:i:s"),
		);
		if ($this->SoalModel->editSubtes3($data, $id)) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// Get Subtes3
	public function getSubtes3()
	{
		$this->db->order_by('tipe', 'asc');
		$this->db->order_by('no_soal', 'asc');
		$subtes3 = $this->db->get('subtes3')->result();
		echo json_encode($subtes3);
	}

	// Get Edit Subtes3
	public function getEditSubtes3()
	{
		$id = $this->input->post('id');
		$subtes3 = $this->db->where('id', $id)->get('subtes3')->row();
		echo json_encode($subtes3);
	}

	// Hapus Subtes3
	public function hapusSubtes3()
	{
		$id = $this->input->post('id');
		$hapusSubtes3 = $this->SoalModel->hapusSubtes3($id);
		if ($hapusSubtes3) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// Preview Subtes3
	public function getDetailSubtes3()
	{
		$id = $this->input->post('id');
		// $id = 5;
		$subtes3 = $this->db->where('id', $id)->get('subtes3')->row();
		$detail = '<div>' . $subtes3->pertanyaan . '</div>

        <table class="table borderless">
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">A.</td>
            <td>' . $subtes3->pilihan_a . '</td>
            </tr>
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">B.</td>
            <td>' . $subtes3->pilihan_b . '</td>
            </tr>
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">C.</td>
            <td>' . $subtes3->pilihan_c . '</td>
            </tr>
        </table>
    ';
		echo $detail;
	}
	// End Subtes3

	// Start Subtes 4
	// View Subtes4
	public function subtes4()
	{
		$data['judul'] = 'Soal Ketahanan';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('page/admin/soal/subtes4');
		$this->load->view('templates/footer');
	}

	// Insert Subtes4
	public function insertSubTes4()
	{
		$no_soal = $this->input->post('no_soal');
		$pertanyaan = $this->input->post('pertanyaan');
		$jawaban_a = $this->input->post('jawaban_a');
		$nilai_jawaban_a = $this->input->post('nilai_jawaban_a');
		$jawaban_b = $this->input->post('jawaban_b');
		$nilai_jawaban_b = $this->input->post('nilai_jawaban_b');
		$jawaban_c = $this->input->post('jawaban_c');
		$nilai_jawaban_c = $this->input->post('nilai_jawaban_c');
		$jawaban_d = $this->input->post('jawaban_d');
		$nilai_jawaban_d = $this->input->post('nilai_jawaban_d');
		$tipe = $this->input->post('tipe');
		$data = array(
			'no_soal' => $no_soal,
			'pertanyaan' => $pertanyaan,
			'pilihan_a' => $jawaban_a,
			'pilihan_b' => $jawaban_b,
			'pilihan_c' => $jawaban_c,
			'pilihan_d' => $jawaban_d,
			'nilai_a' => $nilai_jawaban_a,
			'nilai_b' => $nilai_jawaban_b,
			'nilai_c' => $nilai_jawaban_c,
			'nilai_d' => $nilai_jawaban_d,
			'tipe' => $tipe,
			'modified_at' => date("Y-m-d H:i:s"),
			'created_at' => date("Y-m-d H:i:s")
		);
		if ($this->SoalModel->insertSubtes4($data)) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// EditSubtes4
	public function editSubtes4()
	{
		$id = $this->input->post('id_soal_edit');
		$no_soal_edit = $this->input->post('no_soal_edit');
		$pertanyaan_edit = $this->input->post('pertanyaan_edit');
		$jawaban_a_edit = $this->input->post('jawaban_a_edit');
		$nilai_jawaban_a_edit = $this->input->post('nilai_jawaban_a_edit');
		$jawaban_b_edit = $this->input->post('jawaban_b_edit');
		$nilai_jawaban_b_edit = $this->input->post('nilai_jawaban_b_edit');
		$jawaban_c_edit = $this->input->post('jawaban_c_edit');
		$nilai_jawaban_c_edit = $this->input->post('nilai_jawaban_c_edit');
		$jawaban_d_edit = $this->input->post('jawaban_d_edit');
		$nilai_jawaban_d_edit = $this->input->post('nilai_jawaban_d_edit');
		$tipe_edit = $this->input->post('tipe_edit');
		$data = array(
			'no_soal' => $no_soal_edit,
			'pertanyaan' => $pertanyaan_edit,
			'pilihan_a' => $jawaban_a_edit,
			'pilihan_b' => $jawaban_b_edit,
			'pilihan_c' => $jawaban_c_edit,
			'pilihan_d' => $jawaban_d_edit,
			'nilai_a' => $nilai_jawaban_a_edit,
			'nilai_b' => $nilai_jawaban_b_edit,
			'nilai_c' => $nilai_jawaban_c_edit,
			'nilai_d' => $nilai_jawaban_d_edit,
			'tipe' => $tipe_edit,
			'modified_at' => date("Y-m-d H:i:s"),
		);
		if ($this->SoalModel->editSubtes4($data, $id)) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// Get Subtes4
	public function getSubtes4()
	{
		$this->db->order_by('tipe', 'asc');
		$this->db->order_by('no_soal', 'asc');
		$subtes4 = $this->db->get('subtes4')->result();
		echo json_encode($subtes4);
	}

	// Get Edit Subtes4
	public function getEditSubtes4()
	{
		$id = $this->input->post('id');
		$subtes4 = $this->db->where('id', $id)->get('subtes4')->row();
		echo json_encode($subtes4);
	}

	// Hapus Subtes4
	public function hapusSubtes4()
	{
		$id = $this->input->post('id');
		$hapusSubtes4 = $this->SoalModel->hapusSubtes4($id);
		if ($hapusSubtes4) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// Preview Subtes4
	public function getDetailSubtes4()
	{
		$id = $this->input->post('id');
		// $id = 5;
		$subtes4 = $this->db->where('id', $id)->get('subtes4')->row();
		$detail = '<div>' . $subtes4->pertanyaan . '</div>

        <table class="table borderless">
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">A.</td>
            <td>' . $subtes4->pilihan_a . '</td>
            </tr>
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">B.</td>
            <td>' . $subtes4->pilihan_b . '</td>
            </tr>
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">C.</td>
            <td>' . $subtes4->pilihan_c . '</td>
            </tr>
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">D.</td>
            <td>' . $subtes4->pilihan_d . '</td>
            </tr>
        </table>
    ';
		echo $detail;
	}
	// End Subtes4

	// Start Subtes 5
	// View Subtes5
	public function subtes5()
	{
		$data['judul'] = 'Soal Kecermatan';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('page/admin/soal/subtes5');
		$this->load->view('templates/footer');
	}

	// Insert Subtes5
	public function insertSubTes5()
	{
		$no_soal = $this->input->post('no_soal');
		$pertanyaan = $this->input->post('pertanyaan');
		$jawaban_a = $this->input->post('jawaban_a');
		$nilai_jawaban_a = $this->input->post('nilai_jawaban_a');
		$jawaban_b = $this->input->post('jawaban_b');
		$nilai_jawaban_b = $this->input->post('nilai_jawaban_b');
		$jawaban_c = $this->input->post('jawaban_c');
		$nilai_jawaban_c = $this->input->post('nilai_jawaban_c');
		$jawaban_d = $this->input->post('jawaban_d');
		$nilai_jawaban_d = $this->input->post('nilai_jawaban_d');
		$tipe = $this->input->post('tipe');
		$data = array(
			'no_soal' => $no_soal,
			'pertanyaan' => $pertanyaan,
			'pilihan_a' => $jawaban_a,
			'pilihan_b' => $jawaban_b,
			'pilihan_c' => $jawaban_c,
			'pilihan_d' => $jawaban_d,
			'nilai_a' => $nilai_jawaban_a,
			'nilai_b' => $nilai_jawaban_b,
			'nilai_c' => $nilai_jawaban_c,
			'nilai_d' => $nilai_jawaban_d,
			'tipe' => $tipe,
			'modified_at' => date("Y-m-d H:i:s"),
			'created_at' => date("Y-m-d H:i:s")
		);
		if ($this->SoalModel->insertSubtes5($data)) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// EditSubtes5
	public function editSubtes5()
	{
		$id = $this->input->post('id_soal_edit');
		$no_soal_edit = $this->input->post('no_soal_edit');
		$pertanyaan_edit = $this->input->post('pertanyaan_edit');
		$jawaban_a_edit = $this->input->post('jawaban_a_edit');
		$nilai_jawaban_a_edit = $this->input->post('nilai_jawaban_a_edit');
		$jawaban_b_edit = $this->input->post('jawaban_b_edit');
		$nilai_jawaban_b_edit = $this->input->post('nilai_jawaban_b_edit');
		$jawaban_c_edit = $this->input->post('jawaban_c_edit');
		$nilai_jawaban_c_edit = $this->input->post('nilai_jawaban_c_edit');
		$jawaban_d_edit = $this->input->post('jawaban_d_edit');
		$nilai_jawaban_d_edit = $this->input->post('nilai_jawaban_d_edit');
		$tipe_edit = $this->input->post('tipe_edit');
		$data = array(
			'no_soal' => $no_soal_edit,
			'pertanyaan' => $pertanyaan_edit,
			'pilihan_a' => $jawaban_a_edit,
			'pilihan_b' => $jawaban_b_edit,
			'pilihan_c' => $jawaban_c_edit,
			'pilihan_d' => $jawaban_d_edit,
			'nilai_a' => $nilai_jawaban_a_edit,
			'nilai_b' => $nilai_jawaban_b_edit,
			'nilai_c' => $nilai_jawaban_c_edit,
			'nilai_d' => $nilai_jawaban_d_edit,
			'tipe' => $tipe_edit,
			'modified_at' => date("Y-m-d H:i:s"),
		);
		if ($this->SoalModel->editSubtes5($data, $id)) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// Get Subtes5
	public function getSubtes5()
	{
		$this->db->order_by('tipe', 'asc');
		$this->db->order_by('no_soal', 'asc');
		$subtes5 = $this->db->get('subtes5')->result();
		echo json_encode($subtes5);
	}

	// Get Edit Subtes5
	public function getEditSubtes5()
	{
		$id = $this->input->post('id');
		$subtes5 = $this->db->where('id', $id)->get('subtes5')->row();
		echo json_encode($subtes5);
	}

	// Hapus Subtes4
	public function hapusSubtes5()
	{
		$id = $this->input->post('id');
		$hapusSubtes5 = $this->SoalModel->hapusSubtes5($id);
		if ($hapusSubtes5) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// Preview Subtes5
	public function getDetailSubtes5()
	{
		$id = $this->input->post('id');
		// $id = 5;
		$subtes5 = $this->db->where('id', $id)->get('subtes5')->row();
		$detail = '<div>' . $subtes5->pertanyaan . '</div>

        <table class="table borderless ">
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">A.</td>
            <td>' . $subtes5->pilihan_a . '</td>
            </tr>
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">B.</td>
            <td>' . $subtes5->pilihan_b . '</td>
            </tr>
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">C.</td>
            <td>' . $subtes5->pilihan_c . '</td>
            </tr>
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">D.</td>
            <td>' . $subtes5->pilihan_d . '</td>
            </tr>
        </table>
    ';
		echo $detail;
	}
	// End Subtes5

	// Start Subtes 6
	// View Subtes 6
	public function subtes6()
	{
		$data['judul'] = 'Soal Konsentrasi';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('page/admin/soal/subtes6');
		$this->load->view('templates/footer');
	}

	// Insert Subtes6
	public function insertSubTes6()
	{
		$no_soal = $this->input->post('no_soal');
		$pertanyaan = $this->input->post('pertanyaan');
		$jawaban_a = $this->input->post('jawaban_a');
		$nilai_jawaban_a = $this->input->post('nilai_jawaban_a');
		$jawaban_b = $this->input->post('jawaban_b');
		$nilai_jawaban_b = $this->input->post('nilai_jawaban_b');
		$jawaban_c = $this->input->post('jawaban_c');
		$nilai_jawaban_c = $this->input->post('nilai_jawaban_c');
		$jawaban_d = $this->input->post('jawaban_d');
		$nilai_jawaban_d = $this->input->post('nilai_jawaban_d');
		$tipe = $this->input->post('tipe');
		$data = array(
			'no_soal' => $no_soal,
			'pertanyaan' => $pertanyaan,
			'pilihan_a' => $jawaban_a,
			'pilihan_b' => $jawaban_b,
			'pilihan_c' => $jawaban_c,
			'pilihan_d' => $jawaban_d,
			'nilai_a' => $nilai_jawaban_a,
			'nilai_b' => $nilai_jawaban_b,
			'nilai_c' => $nilai_jawaban_c,
			'nilai_d' => $nilai_jawaban_d,
			'tipe' => $tipe,
			'modified_at' => date("Y-m-d H:i:s"),
			'created_at' => date("Y-m-d H:i:s")
		);
		if ($this->SoalModel->insertSubtes6($data)) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// EditSubtes6
	public function editSubtes6()
	{
		$id = $this->input->post('id_soal_edit');
		$no_soal_edit = $this->input->post('no_soal_edit');
		$pertanyaan_edit = $this->input->post('pertanyaan_edit');
		$jawaban_a_edit = $this->input->post('jawaban_a_edit');
		$nilai_jawaban_a_edit = $this->input->post('nilai_jawaban_a_edit');
		$jawaban_b_edit = $this->input->post('jawaban_b_edit');
		$nilai_jawaban_b_edit = $this->input->post('nilai_jawaban_b_edit');
		$jawaban_c_edit = $this->input->post('jawaban_c_edit');
		$nilai_jawaban_c_edit = $this->input->post('nilai_jawaban_c_edit');
		$jawaban_d_edit = $this->input->post('jawaban_d_edit');
		$nilai_jawaban_d_edit = $this->input->post('nilai_jawaban_d_edit');
		$tipe_edit = $this->input->post('tipe_edit');
		$data = array(
			'no_soal' => $no_soal_edit,
			'pertanyaan' => $pertanyaan_edit,
			'pilihan_a' => $jawaban_a_edit,
			'pilihan_b' => $jawaban_b_edit,
			'pilihan_c' => $jawaban_c_edit,
			'pilihan_d' => $jawaban_d_edit,
			'nilai_a' => $nilai_jawaban_a_edit,
			'nilai_b' => $nilai_jawaban_b_edit,
			'nilai_c' => $nilai_jawaban_c_edit,
			'nilai_d' => $nilai_jawaban_d_edit,
			'tipe' => $tipe_edit,
			'modified_at' => date("Y-m-d H:i:s"),
		);
		if ($this->SoalModel->editSubtes6($data, $id)) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// Get Subtes6
	public function getSubtes6()
	{
		$this->db->order_by('tipe', 'asc');
		$this->db->order_by('no_soal', 'asc');
		$subtes6 = $this->db->get('subtes6')->result();
		echo json_encode($subtes6);
	}

	// Get Edit Subtes6
	public function getEditSubtes6()
	{
		$id = $this->input->post('id');
		$subtes6 = $this->db->where('id', $id)->get('subtes6')->row();
		echo json_encode($subtes6);
	}

	// Hapus Subtes6
	public function hapusSubtes6()
	{
		$id = $this->input->post('id');
		$hapusSubtes6 = $this->SoalModel->hapusSubtes6($id);
		if ($hapusSubtes6) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	// Preview Subtes6
	public function getDetailSubtes6()
	{
		$id = $this->input->post('id');
		$subtes6 = $this->db->where('id', $id)->get('subtes6')->row();
		$detail = '<div>' . $subtes6->pertanyaan . '</div>

        <table class="table borderless ">
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">A.</td>
            <td>' . $subtes6->pilihan_a . '</td>
            </tr>
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">B.</td>
            <td>' . $subtes6->pilihan_b . '</td>
            </tr>
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">C.</td>
            <td>' . $subtes6->pilihan_c . '</td>
            </tr>
            <tr>
            <td width="2%"><input type="radio" name="jawaban" id="exampleRadios1" value="20" ></td>
            <td width="2%">D.</td>
            <td>' . $subtes6->pilihan_d . '</td>
            </tr>
        </table>
    ';
		echo $detail;
	}
	// End Subtes5

	public function tessoal()
	{
		$tipe_soal = 'A';
		$data['subtes1'] = $this->db->where('tipe', $tipe_soal)->get('subtes1')->result();
		$data['subtes2'] = $this->db->where('tipe', $tipe_soal)->get('subtes2')->result();
		$data['subtes3'] = $this->db->where('tipe', $tipe_soal)->get('subtes3')->result();
		$data['subtes4'] = $this->db->where('tipe', $tipe_soal)->get('subtes4')->result();
		$data['subtes5'] = $this->db->where('tipe', $tipe_soal)->get('subtes5')->result();
		$data['subtes6'] = $this->db->where('tipe', $tipe_soal)->get('subtes6')->result();

		$this->load->view('page/admin/soal/tessoal', $data);
	}



	public function hasilSoal()
	{
		$subtes1 = $this->input->post('subtes1');
		$subtes2 = $this->input->post('subtes2');
		$subtes3 = $this->input->post('subtes3');
		$subtes4 = $this->input->post('subtes4');
		$subtes5 = $this->input->post('subtes5');
		$subtes6 = $this->input->post('subtes6');
		print_r($subtes1);
		print_r($subtes2);
		print_r($subtes3);
		print_r($subtes4);
		print_r($subtes5);
		print_r($subtes6);
	}

	public function standarKelulusan()
	{
		$data['standar_kelulusan'] = $this->db->where('nama', 'standar_kelulusan')->get('pengaturan')->row()->nilai;
		$data['judul'] = 'Standar Kelulusan';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('page/admin/soal/standar_kelulusan', $data);
		$this->load->view('templates/footer');
	}

	public function getStandarKelulusan()
	{
		$standar_kelulusan = $this->db->where('nama', 'standar_kelulusan')->get('pengaturan')->row();
		echo json_encode($standar_kelulusan);
	}

	public function updateStandarKelulusan()
	{
		$standarKelulusan = $this->input->post('standarKelulusan');
		$data = array(
			'nilai' => $standarKelulusan,
			'modified_at' => date("Y-m-d H:i:s")
		);
		if ($this->SoalModel->updateStandarKelulusan($data)) {
			echo "true";
		} else {
			echo "false";
		}
	}

	public function pengaturanSoal()
	{
		$data['judul'] = 'Pengaturan Soal';
		$data['blokirSoalA'] = $this->db->where('id', 8)->get('pengaturan')->row()->nilai;
		$data['blokirSoalB'] = $this->db->where('id', 9)->get('pengaturan')->row()->nilai;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('page/admin/soal/pengaturan');
		$this->load->view('templates/footer');
	}

	public function updateBlokirSoalA()
	{
		$checkedSoalA = $this->input->post('checkedSoalA');
		$set_soal_a = null;
		if ($checkedSoalA == 'false') {
			$set_soal_a = 0;
		} else if ($checkedSoalA == 'true') {
			$set_soal_a = 1;
		}
		$data = [
			'nilai' => $set_soal_a
		];
		$this->db->where('id', 8);
		$this->db->update('pengaturan', $data);
	}

	public function updateBlokirSoalB()
	{
		$checkedSoalB = $this->input->post('checkedSoalB');
		$set_soal_b = null;
		if ($checkedSoalB == 'false') {
			$set_soal_b = 0;
		} else if ($checkedSoalB == 'true') {
			$set_soal_b = 1;
		}
		$data = [
			'nilai' => $set_soal_b
		];
		$this->db->where('id', 9);
		$this->db->update('pengaturan', $data);
	}
}
