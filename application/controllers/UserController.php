<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('email');
		$this->load->model('MasterModel');
		$this->load->helper('file');
		date_default_timezone_set('Asia/Makassar');
	}

	public function registerUser()
	{
		$nama_lengkap = $this->input->post('nama_lengkap');
		$nomor_ktp_daftar = $this->input->post('nomor_ktp_daftar');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$newDate = date("Y-d-m", strtotime($tanggal_lahir));
		$nomor_hp = $this->input->post('nomor_hp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$provinsi = $this->input->post('provinsi');
		$kabupaten = $this->input->post('kabupaten');
		$kecamatan = $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');
		$username_daftar = $this->input->post('username_daftar');
		$password_daftar = $this->input->post('password_daftar');

		$ktp_terdaftar = $this->db->where('nomor_ktp', $nomor_ktp_daftar)->get('profil')->num_rows();
		if ($ktp_terdaftar > 0) {
			echo "ktp_false";
			die;
		}

		$config['upload_path'] = "./assets/upload/pengaju/ktp"; //path folder file upload
		$config['allowed_types'] = 'gif|jpg|png|jpeg|heic';
		$config['encrypt_name'] = TRUE; //enkripsi file name upload

		$this->load->library('upload', $config); //call library upload 
		if ($this->upload->do_upload("file")) { //upload file
			$nama_file = $this->upload->data();
			$image = $nama_file['file_name']; //set file name ke variable image
			$data = array(
				'username' => $username_daftar,
				'password' => $password_daftar,
				'role' => 'pengusul',
				'modified_at' => date("Y-m-d H:i:s"),
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->db->insert('user', $data);

			$id_user_terakhir = $this->db->order_by('id', 'desc')->get('user')->row()->id;
			$data = array(
				'id_user' => $id_user_terakhir,
				'nama_lengkap' => $nama_lengkap,
				'nomor_ktp' => $nomor_ktp_daftar,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_lahir' => $newDate,
				'nomor_hp' => $nomor_hp,
				'email' => $email,
				'alamat' => $alamat,
				'provinsi' => $provinsi,
				'kabupaten' => $kabupaten,
				'kecamatan' => $kecamatan,
				'kelurahan' => $kelurahan,
				'foto_ktp' => $image,
				'modified_at' => date("Y-m-d H:i:s"),
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->db->insert('profil', $data);
			// if ($email) {
			//     $this->sendEmail($email, $username_daftar, $password_daftar, $nomor_ktp_daftar);
			// }
			echo "true";
		} else {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}
	}

	public function cekUser()
	{
		$ktp = $this->input->post('noKTP');
		$tglLahir = $this->input->post('tglLahir');
		$newDate = date("Y-d-m", strtotime($tglLahir));


		$this->db->where('nomor_ktp', $ktp);
		$this->db->where('tanggal_lahir', $newDate);
		$cekKTP = $this->db->get('profil')->row();

		if ($cekKTP) {
			$info = $this->db->where('username', $ktp)->get('user')->row();
			$pass = $info->password;
			$data = array('res' => 'success', 'pass' => $pass);
		} else {
			$data = array('res' => 'error', 'message' => 'Nomor KTP beserta Tanggal Lahir tidak ditemukan, silahkan cek kembali inputan nomor KTP dan Tanggal Lahir anda.');
		}
		echo json_encode($data);
	}

	public function loginUser()
	{
		$username = $this->input->post('username_login');
		$password = $this->input->post('password_login');
		$user = $this->db->where('username', $username)->get('user')->row();
		if (!empty($user)) {
			if ($user->password == $password) {
				$data_session = array(
					'id' => $user->id,
					'username' => $user->username,
					'role' => $user->role,
					'status' => 'login'
				);
				$this->session->set_userdata($data_session);
				if ($user->role == "admin") {
					redirect(base_url('dashboardAdmin'));
				} else if ($user->role == "pengusul") {
					redirect(base_url('dashboard'));
				}
			} else {
				$this->session->set_flashdata('error', 'Periksa Kembali Data Login Anda');
				redirect(base_url());
			}
		} else {
			$this->session->set_flashdata('error', 'Periksa Kembali Data Login Anda');
			redirect(base_url());
		}
	}

	public function updateAkun()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('beranda'));
		}
		$id = $this->input->post('id');
		$usernameUpdate = $this->input->post('usernameUpdate');
		$password = $this->input->post('password');
		$namaLengkap = $this->input->post('namaLengkap');
		$nomorKTP = $this->input->post('nomorKTP');
		$tempatLahir = $this->input->post('tempatLahir');
		$tanggalLahir = $this->input->post('tanggalLahir');
		$nomorHp = $this->input->post('nomorHp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$provinsi = $this->input->post('provinsi');
		$kabupaten = $this->input->post('kabupaten');
		$kecamatan = $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');
		$data_profil = array(
			'nama_lengkap' => $namaLengkap,
			'nomor_ktp' => $nomorKTP,
			'tempat_lahir' => $tempatLahir,
			'tanggal_lahir' => $tanggalLahir,
			'nomor_hp' => $nomorHp,
			'email' => $email,
			'alamat' => $alamat,
			'provinsi' => $provinsi,
			'kabupaten' => $kabupaten,
			'kecamatan' => $kecamatan,
			'kelurahan' => $kelurahan,
			'modified_at' => date('Y-m-d H:i:s')
		);

		if ($this->MasterModel->updateProfil($data_profil, $id)) {
		} else {
			echo 'false_profil';
			die;
		}

		$data_user = array(
			'username' => $usernameUpdate,
			'password' => $password,
			'modified_at' => date('Y-m-d H:i:s')
		);

		if ($this->MasterModel->updateUser($data_user, $id)) {
		} else {
			echo 'false_user';
			die;
		}
		echo "true";
	}

	public function updateFoto()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('beranda'));
		}
		$id = $this->input->post('idFoto');

		$config['upload_path'] = "./assets/upload/pengaju/ktp"; //path folder file upload
		$config['allowed_types'] = 'gif|jpg|png|jpeg|heic';
		$config['encrypt_name'] = TRUE; //enkripsi file name upload

		$foto_ktp = $this->db->where('id_user', $id)->get('profil')->row()->foto_ktp;
		unlink('./assets/upload/pengaju/ktp/' . $foto_ktp);

		$this->load->library('upload', $config); //call library upload 
		if ($this->upload->do_upload("file")) { //upload file
			$nama_file = $this->upload->data();
			$image = $nama_file['file_name']; //set file name ke variable image
			$data = array(
				'foto_ktp' => $image,
				'modified_at' => date("Y-m-d H:i:s"),
			);
			$this->db->where('id_user', $id);
			$update = $this->db->update('profil', $data);
			if ($update) {
				echo "true";
			} else {
				echo "false_update";
			}
		} else {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}
	}

	public function registerAdmin()
	{
		if ($this->session->userdata('role') != "admin") {
			redirect(base_url('beranda'));
		}
		$nama_lengkap = $this->input->post('nama_insert');
		$nomor_ktp_daftar = $this->input->post('nomorktp_insert');
		$tempat_lahir = $this->input->post('tempat_lahir_insert');
		$tanggal_lahir = $this->input->post('tanggal_lahir_insert');
		$nomor_hp = $this->input->post('nomorhp_insert');
		$email = $this->input->post('email_insert');
		$alamat = $this->input->post('alamat_insert');
		$provinsi = $this->input->post('provinsi_insert');
		$kabupaten = $this->input->post('kabupaten_insert');
		$kecamatan = $this->input->post('kecamatan_insert');
		$kelurahan = $this->input->post('kelurahan_insert');
		$username_daftar = $this->input->post('username_insert');
		$password_daftar = $this->input->post('password_insert');

		$ktp_terdaftar = $this->db->where('username', $username_daftar)->get('user')->num_rows();
		if ($ktp_terdaftar > 0) {
			echo "ktp_false";
			die;
		}

		$config['upload_path'] = "./assets/upload/pengaju/ktp"; //path folder file upload
		$config['allowed_types'] = 'gif|jpg|png|jpeg|heic';
		$config['encrypt_name'] = TRUE; //enkripsi file name upload

		$this->load->library('upload', $config); //call library upload 
		if ($this->upload->do_upload("file")) { //upload file
			$nama_file = $this->upload->data();
			$image = $nama_file['file_name']; //set file name ke variable image
			$data = array(
				'username' => $username_daftar,
				'password' => $password_daftar,
				'role' => 'admin',
				'modified_at' => date("Y-m-d H:i:s"),
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->db->insert('user', $data);

			$id_user_terakhir = $this->db->order_by('id', 'desc')->get('user')->row()->id;
			$data = array(
				'id_user' => $id_user_terakhir,
				'nama_lengkap' => $nama_lengkap,
				'nomor_ktp' => $nomor_ktp_daftar,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'nomor_hp' => $nomor_hp,
				'email' => $email,
				'alamat' => $alamat,
				'provinsi' => $provinsi,
				'kabupaten' => $kabupaten,
				'kecamatan' => $kecamatan,
				'kelurahan' => $kelurahan,
				'foto_ktp' => $image,
				'modified_at' => date("Y-m-d H:i:s"),
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->db->insert('profil', $data);
			// if ($email) {
			//     $this->sendEmail($email, $username_daftar, $password_daftar, $nomor_ktp_daftar);
			// }
			echo "true";
		} else {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}
	}

	public function hapusAkun()
	{
		if ($this->session->userdata('role') != "admin") {
			redirect(base_url('beranda'));
		}
		$id = $this->input->post('id');

		$foto_ktp = $this->db->where('id_user', $id)->get('profil')->row()->foto_ktp;
		unlink('./assets/upload/pengaju/ktp/' . $foto_ktp);

		$this->db->where('id', $id);
		$this->db->delete('user');

		$this->db->where('id_user', $id);
		$this->db->delete('profil');
		echo "true";
	}

	private function sendEmail($alamat_email, $username, $password, $nomor_ktp_daftar)
	{
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1',
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => 'tespsikologi46@gmail.com',  // Email gmail
			'smtp_pass'   => 'tespsikologiproject',  // Password gmail
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 25,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		];
		$this->load->library('email', $config);

		// Email dan nama pengirim
		$this->email->from('tespsikologi46@gmail.com', 'Tes Psikologi');

		// Email penerima
		$this->email->to($alamat_email); // Ganti dengan email tujuan

		// Subject email
		$this->email->subject('Username dan Password Akun Tes Psikologi');

		// Isi email
		$this->email->message("Selamat, akun anda dengan nomor KTP : $nomor_ktp_daftar berhasil dibuat\n\nusername anda : $username\npassword anda : $password");

		// Tampilkan pesan sukses atau error
		$this->email->send();
	}

	function logout()
	{

		$this->session->sess_destroy();

		redirect(base_url('beranda'));
	}
}
