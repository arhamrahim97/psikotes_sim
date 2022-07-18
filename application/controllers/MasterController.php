<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') or exit('No direct script access allowed');

class MasterController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MasterModel');
        date_default_timezone_set('Asia/Makassar');
        if ($this->session->userdata('role') != "admin") {
            redirect(base_url('beranda'));
        }
    }

    // Administrasi
    public function administrasi()
    {
        $biaya = $this->db->where('nama', 'biaya')->get('pengaturan')->row()->nilai;
        $judul = 'Administrasi';
        $data = array(
            'judul' => $judul,
            'biaya' => $biaya
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('page/admin/master/bank', $data);
        $this->load->view('templates/footer');
    }

    public function insertBank()
    {
        $nama_bank = $this->input->post('nama_bank');
        $no_rekening = $this->input->post('no_rekening');
        $data = array(
            'nama_bank' => $nama_bank,
            'no_rekening' => $no_rekening,
            'modified_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s")
        );
        if ($this->MasterModel->insertBank($data)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function getBank()
    {
        $bank = $this->db->get('bank')->result();
        echo json_encode($bank);
    }

    public function hapusBank()
    {
        $idBank = $this->input->post('idBank');
        $hapusBank = $this->MasterModel->hapusBank($idBank);
        if ($hapusBank) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function getEditBank()
    {
        $id = $this->input->post('idBank');
        $bank = $this->db->where('id', $id)->get('bank')->row();
        echo json_encode($bank);
    }

    public function editBank()
    {
        $id = $this->input->post('idBank');
        $nama_bank_edit = $this->input->post('nama_bank_edit');
        $no_rekening_edit = $this->input->post('no_rekening_edit');

        $data = array(
            'nama_bank' => $nama_bank_edit,
            'no_rekening' => $no_rekening_edit,
            'modified_at' => date("Y-m-d H:i:s")
        );
        if ($this->MasterModel->editBank($data, $id)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function changeActiveBank()
    {
        $id = $this->input->post('id');
        $aktif = $this->input->post('aktif');
        $set_status_bank = null;

        if ($aktif == 1) {
            $set_status_bank = 0;
        } else {
            $set_status_bank = 1;
        }

        $data = [
            'aktif' => $set_status_bank
        ];

        $this->db->where('id', $id);
        $this->db->update('bank', $data);
    }

    public function getBiayaProvinsi()
    {
        $biayaProvinsi = $this->db->get('wilayah_provinsi')->result();
        echo json_encode($biayaProvinsi);
    }

    public function getEditBiayaProvinsi()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $biayaProvinsi = $this->db->get('wilayah_provinsi')->row();
        echo json_encode($biayaProvinsi);
    }

    public function updateBiayaProvinsi()
    {
        $id = $this->input->post('id');
        $biaya = $this->input->post('biaya');
        $data = [
            'biaya' => $biaya
        ];
        $this->db->where('id', $id);
        if ($this->db->update('wilayah_provinsi', $data)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    // Biaya
    public function getBiaya()
    {
        $biaya = $this->db->where('nama', 'biaya')->get('pengaturan')->row();
        echo json_encode($biaya);
    }

    public function updateBiaya()
    {
        $biaya = $this->input->post('biaya');
        $data = array(
            'nilai' => $biaya,
            'modified_at' => date("Y-m-d H:i:s")
        );
        if ($this->MasterModel->updateBiaya($data)) {
            echo "true";
        } else {
            echo "false";
        }
    }
    // End Administrasi

    public function instansi()
    {
        $data = [
            'judul' => 'Instansi',
            'alamat' => $this->db->where('nama', 'alamat')->get('pengaturan')->row()->nilai,
            'no_telepon' => $this->db->where('nama', 'no_telepon')->get('pengaturan')->row()->nilai,
            'email' => $this->db->where('nama', 'email')->get('pengaturan')->row()->nilai,
            'facebook' => $this->db->where('nama', 'facebook')->get('pengaturan')->row()->nilai,
            'instagram' => $this->db->where('nama', 'instagram')->get('pengaturan')->row()->nilai
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('page/admin/master/instansi', $data);
        $this->load->view('templates/footer');
    }

    public function updateInstansi()
    {
        $alamat = $this->input->post('alamat');
        $no_telepon = $this->input->post('no_telepon');
        $email = $this->input->post('email');
        $facebook = $this->input->post('facebook');
        $instagram = $this->input->post('instagram');

        // Alamat
        $data = array(
            'nilai' => $alamat
        );
        if (!$this->MasterModel->updatePengaturan($data, 'alamat')) {
            echo "false";
            die;
        };

        // No_telepon
        $data = array(
            'nilai' => $no_telepon
        );
        if (!$this->MasterModel->updatePengaturan($data, 'no_telepon')) {
            echo "false";
            die;
        };

        // Email
        $data = array(
            'nilai' => $email
        );
        if (!$this->MasterModel->updatePengaturan($data, 'email')) {
            echo "false";
            die;
        };

        // facebook
        $data = array(
            'nilai' => $facebook
        );
        if (!$this->MasterModel->updatePengaturan($data, 'facebook')) {
            echo "false";
            die;
        };

        // Instagram
        $data = array(
            'nilai' => $instagram
        );
        if (!$this->MasterModel->updatePengaturan($data, 'instagram')) {
            echo "false";
            die;
        };
        echo "true";
    }

    public function akunAdmin()
    {
        $data = array(
            'judul' => 'Akun Admin'
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('page/admin/master/akun_admin');
        $this->load->view('templates/footer');
    }

    public function getAkunAdmin()
    {
        $this->db->select('profil.nama_lengkap,profil.nomor_ktp,profil.nama_lengkap,profil.id_user,user.id,user.username,user.password');
        $this->db->from('user');
        $this->db->join('profil', 'profil.id_user = user.id', "right");
        $this->db->where('user.role', 'admin');
        $this->db->order_by('user.id', 'desc');
        $query = $this->db->get()->result();
        echo json_encode($query);
    }

    public function getDetailAkunAdmin()
    {
        $id = $this->input->post('id');
        $this->db->select('profil.*,user.username,user.password');
        $this->db->from('user');
        $this->db->join('profil', 'profil.id_user = user.id', "right");
        $this->db->where('user.role', 'admin');
        $this->db->where('user.id', $id);
        $query = $this->db->get()->row();
        echo json_encode($query);
    }
}
