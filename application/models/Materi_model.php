<?php

class Materi_model extends CI_Model
{
    public function getAllDataMateri()
    {
        $email = $this->session->userdata('email');
        $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
        $no_regis = $data['guru']['no_regis'];

        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('guru', 'guru.no_regis = materi.guru');
        $this->db->join('mapel', 'mapel.id = materi.mapel');
        $this->db->join('kelas', 'kelas.id = materi.kelas');
        $this->db->where('no_regis', $no_regis);
        return $this->db->get()->result_array();
    }

    public function getRelasiGuruMapel()
    {
        $email = $this->session->userdata('email');
        $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
        $no_regis = $data['guru']['no_regis'];

        $this->db->select('*');
        $this->db->from('mapel');
        $this->db->join('guru-mapel', 'guru-mapel.mapel_id = mapel.id');
        $this->db->where('no_regis', $no_regis);
        return $this->db->get()->result_array();
    }

    public function getRelasiGuruKelas()
    {
        $email = $this->session->userdata('email');
        $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
        $no_regis = $data['guru']['no_regis'];

        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('guru-kelas', 'guru-kelas.kelas_id = kelas.id');
        $this->db->where('no_regis', $no_regis);
        return $this->db->get()->result_array();
    }

    public function insertDataBuatMateri()
    {
        $email = $this->session->userdata('email');
        $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
        $no_regis = $data['guru']['no_regis'];

        $data = [
            'nama_materi' => htmlspecialchars($this->input->post('nama_materi', true)),
            'guru' => $no_regis,
            'mapel' => htmlspecialchars($this->input->post('mapel', true)),
            'kelas' => htmlspecialchars($this->input->post('kelas', true)),
            'bikin_manual' => $this->input->post('bikin_manual'),
            'date_created' => time()
        ];

        $this->db->insert('materi', $data);
    }

    public function siswaMateri()
    {
        $email = $this->session->userdata('email');
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $email])->row_array();
        $id_kelas = $data['siswa']['id_kelas'];

        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('guru', 'guru.no_regis = materi.guru');
        $this->db->join('mapel', 'mapel.id = materi.mapel');
        $this->db->join('kelas', 'kelas.id = materi.kelas');
        $this->db->order_by('materi.id_materi', 'DESC');
        $this->db->where('kelas', $id_kelas);
        return $this->db->get()->result_array();
    }

    public function getMateriById($id_materi)
    {
        $email = $this->session->userdata('email');
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $email])->row_array();
        $id_kelas = $data['siswa']['id_kelas'];

        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('guru', 'guru.no_regis = materi.guru');
        $this->db->join('mapel', 'mapel.id = materi.mapel');
        $this->db->join('kelas', 'kelas.id = materi.kelas');
        $this->db->order_by('materi.id_materi', 'DESC');
        $this->db->where('id_materi', $id_materi);
        $this->db->where('kelas', $id_kelas);
        return $this->db->get()->result_array();
    }
    public function getMateriGuruById($id_materi)
    {
        $email = $this->session->userdata('email');
        $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
        $no_regis = $data['guru']['no_regis'];

        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('guru', 'guru.no_regis = materi.guru');
        $this->db->join('mapel', 'mapel.id = materi.mapel');
        $this->db->join('kelas', 'kelas.id = materi.kelas');
        $this->db->where('no_regis', $no_regis);
        $this->db->where('id_materi', $id_materi);
        return $this->db->get()->row_array();
    }

    // Edit Materi
    public function updatebuatmateri($id_materi)
    {
        $data = [
            'nama_materi' => htmlspecialchars($this->input->post('nama_materi', true)),
            'mapel' => $this->input->post('mapel', true),
            'kelas' => $this->input->post('kelas', true),
            'bikin_manual' => $this->input->post('bikin_manual')
        ];
        $this->db->where('id_materi', $this->input->post('id_materi'));
        $this->db->update('materi', $data);
    }
}
