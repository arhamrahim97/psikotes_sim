<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardPengusulModel extends CI_Model
{
    public function listSertifikat()
    {
        $this->db->select('sertifikat.*,riwayat_ujian.no_ujian,riwayat_ujian.jenis_sim,riwayat_ujian.nilai_subtes1,riwayat_ujian.nilai_subtes2,riwayat_ujian.nilai_subtes1,riwayat_ujian.nilai_subtes2,riwayat_ujian.nilai_subtes3,riwayat_ujian.nilai_subtes4,riwayat_ujian.nilai_subtes5,riwayat_ujian.nilai_subtes6,riwayat_ujian.hasil,riwayat_ujian.standar_kelulusan,riwayat_ujian.status_hasil,riwayat_ujian.biaya');
        $this->db->from('sertifikat');
        $this->db->join('riwayat_ujian', 'sertifikat.id_riwayat_ujian = riwayat_ujian.id', "left");
        $this->db->where('sertifikat.id_user', $this->session->userdata('id'));
        $this->db->order_by('sertifikat.id', 'desc');
        // $this->db->group_by('riwayat_ujian.id');
        $query = $this->db->get()->result();
        return $query;
    }
}
