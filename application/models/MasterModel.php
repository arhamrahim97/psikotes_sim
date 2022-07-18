<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterModel extends CI_Model
{
    public function insertBank($data)
    {
        $bank = $this->db->where('nama_bank', $data['nama_bank'])->get('bank')->num_rows();
        if ($bank > 0) {
            return false;
        } else {
            $this->db->insert('bank', $data);
            return true;
        }
    }

    public function hapusBank($id)
    {
        $this->db->where('id', $id);
        $hapusBank = $this->db->delete('bank');
        if ($hapusBank) {
            return true;
        } else {
            return false;
        }
    }

    public function editBank($data, $id)
    {
        $bank = $this->db->where('id', $id)->get('bank')->row();

        if ($bank->nama_bank == $data['nama_bank']) {
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('bank');
            return true;
        } else {
            $jumlah_bank = $this->db->where('nama_bank', $data['nama_bank'])->get('bank')->num_rows();
            if ($jumlah_bank > 0) {
                return false;
            } else {
                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('bank');
                return true;
            }
        }
    }

    public function updateBiaya($data)
    {
        $this->db->set($data);
        $this->db->where('nama', 'biaya');
        if ($this->db->update('pengaturan')) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePengaturan($data, $nama)
    {
        $this->db->set($data);
        $this->db->where('nama', $nama);
        if ($this->db->update('pengaturan')) {
            return true;
        } else {
            return false;
        };
    }

    public function updateProfil($data, $id)
    {
        $profil = $this->db->where('id_user', $id)->get('profil')->row();

        if ($profil->nomor_ktp == $data['nomor_ktp']) {
            $this->db->set($data);
            $this->db->where('id_user', $id);
            $this->db->update('profil');
            return true;
        } else {
            $jumlah_profil = $this->db->where('nomor_ktp', $data['nomor_ktp'])->get('profil')->num_rows();
            if ($jumlah_profil > 0) {
                return false;
            } else {
                $this->db->set($data);
                $this->db->where('id_user', $id);
                $this->db->update('profil');
                return true;
            }
        }
    }

    public function updateUser($data, $id)
    {
        $user = $this->db->where('id', $id)->get('user')->row();

        if ($user->username == $data['username']) {
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('user');
            return true;
        } else {
            $jumlah_user = $this->db->where('username', $data['username'])->get('user')->num_rows();
            if ($jumlah_user > 0) {
                return false;
            } else {
                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('user');
                return true;
            }
        }
    }
}
