<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SoalModel extends CI_Model
{
    // Star Subtes1
    public function insertSubtes1($data)
    {
        $this->db->where('no_soal', $data['no_soal']);
        $this->db->where('tipe', $data['tipe']);
        $subtes1 = $this->db->get('subtes1')->num_rows();

        if ($subtes1 > 0) {
            return false;
        } else {
            $this->db->insert('subtes1', $data);
            return true;
        }
    }

    public function hapusSubtes1($id)
    {
        $this->db->where('id', $id);
        $hapusSubtes1 = $this->db->delete('subtes1');
        if ($hapusSubtes1) {
            return true;
        } else {
            return false;
        }
    }

    public function editSubtes1($data, $id)
    {
        $this->db->where('id', $id);
        $subtes1 = $this->db->get('subtes1')->row();
        if ($data['no_soal'] == $subtes1->no_soal && $data['tipe'] == $subtes1->tipe) {
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('subtes1');
            return true;
        } else {
            $this->db->where('no_soal', $data['no_soal']);
            $this->db->where('tipe', $data['tipe']);
            $jumlah_subtes1 = $this->db->get('subtes1')->num_rows();
            if ($jumlah_subtes1 > 0) {
                return false;
            } else {
                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('subtes1');
                return true;
            }
        }
    }
    // End Subtes2

    // Star Subtes2
    public function insertSubtes2($data)
    {
        $this->db->where('no_soal', $data['no_soal']);
        $this->db->where('tipe', $data['tipe']);
        $subtes2 = $this->db->get('subtes2')->num_rows();

        if ($subtes2 > 0) {
            return false;
        } else {
            $this->db->insert('subtes2', $data);
            return true;
        }
    }

    public function hapusSubtes2($id)
    {
        $this->db->where('id', $id);
        $hapusSubtes2 = $this->db->delete('subtes2');
        if ($hapusSubtes2) {
            return true;
        } else {
            return false;
        }
    }

    public function editSubtes2($data, $id)
    {
        $this->db->where('id', $id);
        $subtes2 = $this->db->get('subtes2')->row();
        if ($data['no_soal'] == $subtes2->no_soal && $data['tipe'] == $subtes2->tipe) {
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('subtes2');
            return true;
        } else {
            $this->db->where('no_soal', $data['no_soal']);
            $this->db->where('tipe', $data['tipe']);
            $jumlah_subtes2 = $this->db->get('subtes2')->num_rows();
            if ($jumlah_subtes2 > 0) {
                return false;
            } else {
                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('subtes2');
                return true;
            }
        }
    }
    // End Subtes2

    // Star Subtes3
    public function insertSubtes3($data)
    {
        $this->db->where('no_soal', $data['no_soal']);
        $this->db->where('tipe', $data['tipe']);
        $subtes3 = $this->db->get('subtes3')->num_rows();

        if ($subtes3 > 0) {
            return false;
        } else {
            $this->db->insert('subtes3', $data);
            return true;
        }
    }

    public function hapusSubtes3($id)
    {
        $this->db->where('id', $id);
        $hapusSubtes3 = $this->db->delete('subtes3');
        if ($hapusSubtes3) {
            return true;
        } else {
            return false;
        }
    }

    public function editSubtes3($data, $id)
    {
        $this->db->where('id', $id);
        $subtes3 = $this->db->get('subtes3')->row();
        if ($data['no_soal'] == $subtes3->no_soal && $data['tipe'] == $subtes3->tipe) {
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('subtes3');
            return true;
        } else {
            $this->db->where('no_soal', $data['no_soal']);
            $this->db->where('tipe', $data['tipe']);
            $jumlah_subtes3 = $this->db->get('subtes3')->num_rows();
            if ($jumlah_subtes3 > 0) {
                return false;
            } else {
                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('subtes3');
                return true;
            }
        }
    }
    // End Subtes3

    // Star Subtes4
    public function insertSubtes4($data)
    {
        $this->db->where('no_soal', $data['no_soal']);
        $this->db->where('tipe', $data['tipe']);
        $subtes4 = $this->db->get('subtes4')->num_rows();

        if ($subtes4 > 0) {
            return false;
        } else {
            $this->db->insert('subtes4', $data);
            return true;
        }
    }

    public function hapusSubtes4($id)
    {
        $this->db->where('id', $id);
        $hapusSubtes4 = $this->db->delete('subtes4');
        if ($hapusSubtes4) {
            return true;
        } else {
            return false;
        }
    }

    public function editSubtes4($data, $id)
    {
        $this->db->where('id', $id);
        $subtes4 = $this->db->get('subtes4')->row();
        if ($data['no_soal'] == $subtes4->no_soal && $data['tipe'] == $subtes4->tipe) {
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('subtes4');
            return true;
        } else {
            $this->db->where('no_soal', $data['no_soal']);
            $this->db->where('tipe', $data['tipe']);
            $jumlah_subtes4 = $this->db->get('subtes4')->num_rows();
            if ($jumlah_subtes4 > 0) {
                return false;
            } else {
                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('subtes4');
                return true;
            }
        }
    }
    // End Subtes4

    // Star Subtes5
    public function insertSubtes5($data)
    {
        $this->db->where('no_soal', $data['no_soal']);
        $this->db->where('tipe', $data['tipe']);
        $subtes5 = $this->db->get('subtes5')->num_rows();

        if ($subtes5 > 0) {
            return false;
        } else {
            $this->db->insert('subtes5', $data);
            return true;
        }
    }

    public function hapusSubtes5($id)
    {
        $this->db->where('id', $id);
        $hapusSubtes5 = $this->db->delete('subtes5');
        if ($hapusSubtes5) {
            return true;
        } else {
            return false;
        }
    }

    public function editSubtes5($data, $id)
    {
        $this->db->where('id', $id);
        $subtes5 = $this->db->get('subtes5')->row();
        if ($data['no_soal'] == $subtes5->no_soal && $data['tipe'] == $subtes5->tipe) {
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('subtes5');
            return true;
        } else {
            $this->db->where('no_soal', $data['no_soal']);
            $this->db->where('tipe', $data['tipe']);
            $jumlah_subtes5 = $this->db->get('subtes5')->num_rows();
            if ($jumlah_subtes5 > 0) {
                return false;
            } else {
                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('subtes5');
                return true;
            }
        }
    }
    // End Subtes5

    // Star Subtes6
    public function insertSubtes6($data)
    {
        $this->db->where('no_soal', $data['no_soal']);
        $this->db->where('tipe', $data['tipe']);
        $subtes6 = $this->db->get('subtes6')->num_rows();

        if ($subtes6 > 0) {
            return false;
        } else {
            $this->db->insert('subtes6', $data);
            return true;
        }
    }

    public function hapusSubtes6($id)
    {
        $this->db->where('id', $id);
        $hapusSubtes6 = $this->db->delete('subtes6');
        if ($hapusSubtes6) {
            return true;
        } else {
            return false;
        }
    }

    public function editSubtes6($data, $id)
    {
        $this->db->where('id', $id);
        $subtes6 = $this->db->get('subtes6')->row();
        if ($data['no_soal'] == $subtes6->no_soal && $data['tipe'] == $subtes6->tipe) {
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('subtes6');
            return true;
        } else {
            $this->db->where('no_soal', $data['no_soal']);
            $this->db->where('tipe', $data['tipe']);
            $jumlah_subtes6 = $this->db->get('subtes6')->num_rows();
            if ($jumlah_subtes6 > 0) {
                return false;
            } else {
                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('subtes6');
                return true;
            }
        }
    }
    // End Subtes5

    public function updateStandarKelulusan($data)
    {
        $this->db->set($data);
        $this->db->where('nama', 'standar_kelulusan');
        if ($this->db->update('pengaturan')) {
            return true;
        } else {
            return false;
        }
    }
}
