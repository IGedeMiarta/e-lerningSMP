<?php

class Pemberitahuan_model extends CI_Model
{
    public function getAllPemberitahuan()
    {
        $email = $this->session->userdata('email');
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $email])->row_array();
        $id_kelas = $data['siswa']['id_kelas'];

        $this->db->select('*');
        $this->db->from('pemberitahuan');
        $this->db->join('kelas', 'kelas.id = pemberitahuan.id_kelas');
        $this->db->order_by('pemberitahuan.id', 'DESC');
        $this->db->where('id_kelas', $id_kelas);
        return $this->db->get()->result_array();
    }

    public function getAllPemberitahuanMateri()
    {
        $email = $this->session->userdata('email');
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $email])->row_array();
        $id_kelas = $data['siswa']['id_kelas'];

        $this->db->select('*');
        $this->db->from('pemberitahuan');
        $this->db->join('kelas', 'kelas.id = pemberitahuan.id_kelas');
        $this->db->order_by('pemberitahuan.id', 'DESC');
        $this->db->where('id_kelas', $id_kelas);
        $this->db->where('is_tugas', 0);
        return $this->db->get()->result_array();
    }

    public function getAllPemberitahuanTugas()
    {
        $email = $this->session->userdata('email');
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $email])->row_array();
        $id_kelas = $data['siswa']['id_kelas'];

        $this->db->select('*');
        $this->db->from('pemberitahuan');
        $this->db->join('kelas', 'kelas.id = pemberitahuan.id_kelas');
        $this->db->order_by('pemberitahuan.id', 'DESC');
        $this->db->where('id_kelas', $id_kelas);
        $this->db->where('is_tugas', 1);
        return $this->db->get()->result_array();
    }
}
