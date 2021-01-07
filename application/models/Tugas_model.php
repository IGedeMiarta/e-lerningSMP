<?php

class Tugas_model extends CI_Model
{

    public function AddTugas()
    {
        $email = $this->session->userdata('email');
        $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
        $no_regis = $data['guru']['no_regis'];

        $data = [
            'nama_tugas' => $this->input->post('nama_tugas', true),
            'guru' => $no_regis,
            'kelas' => $this->input->post('kelas', true),
            'mapel' => $this->input->post('mapel', true),
            'pesan' => $this->input->post('pesan'),
            'is_essay' => $this->input->post('is_essay'),
            'date_created' => time(),
            'due_date' => $this->input->post('tgl') . ' ' . $this->input->post('jam')
        ];

        $this->db->insert('tugas', $data);
    }

    public function getAllTugas()
    {
        $email = $this->session->userdata('email');
        $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
        $no_regis = $data['guru']['no_regis'];

        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('guru', 'guru.no_regis = tugas.guru');
        $this->db->join('mapel', 'mapel.id = tugas.mapel');
        $this->db->join('kelas', 'kelas.id = tugas.kelas');
        $this->db->where('guru', $no_regis);
        $this->db->order_by('tugas.id_tugas', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getTugasById($id_tugas)
    {
        $email = $this->session->userdata('email');
        $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
        $no_regis = $data['guru']['no_regis'];

        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('guru', 'guru.no_regis = tugas.guru');
        $this->db->join('mapel', 'mapel.id = tugas.mapel');
        $this->db->join('kelas', 'kelas.id = tugas.kelas');
        $this->db->where('guru', $no_regis);
        $this->db->where('id_tugas', $id_tugas);
        return $this->db->get()->row_array();
    }

    public function siswaTugas()
    {
        $email = $this->session->userdata('email');
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $email])->row_array();
        $id_kelas = $data['siswa']['id_kelas'];

        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('guru', 'guru.no_regis = tugas.guru');
        $this->db->join('mapel', 'mapel.id = tugas.mapel');
        $this->db->join('kelas', 'kelas.id = tugas.kelas');
        $this->db->order_by('tugas.id_tugas', 'DESC');
        $this->db->where('kelas', $id_kelas);
        return $this->db->get()->result_array();
    }

    public function getSiswaTugasById($id_tugas)
    {
        $email = $this->session->userdata('email');
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $email])->row_array();
        $id_kelas = $data['siswa']['id_kelas'];

        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('guru', 'guru.no_regis = tugas.guru');
        $this->db->join('mapel', 'mapel.id = tugas.mapel');
        $this->db->join('kelas', 'kelas.id = tugas.kelas');
        $this->db->order_by('tugas.id_tugas', 'DESC');
        $this->db->where('kelas', $id_kelas);
        $this->db->where('id_tugas', $id_tugas);
        return $this->db->get()->row_array();
    }

    public function getAllTugasSiswaByGuru($id_tugas)
    {
        $email = $this->session->userdata('email');
        $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
        $no_regis = $data['guru']['no_regis'];

        $this->db->select('*');
        $this->db->from('tugas_siswa');
        $this->db->join('guru', 'guru.no_regis = tugas_siswa.no_regis_guru');
        $this->db->join('siswa', 'siswa.no_regis = tugas_siswa.no_regis_siswa');
        $this->db->join('mapel', 'mapel.id = tugas_siswa.mapel_id');
        $this->db->join('kelas', 'kelas.id = tugas_siswa.kelas_id');
        $this->db->order_by('tugas_siswa.id', 'ASC');
        $this->db->where('no_regis_guru', $no_regis);
        $this->db->where('tugas_id', $id_tugas);
        $this->db->where('telat', 0);
        return $this->db->get()->result_array();
    }
    public function getAllTugasSiswaTelatByGuru($id_tugas)
    {
        $email = $this->session->userdata('email');
        $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
        $no_regis = $data['guru']['no_regis'];

        $this->db->select('*');
        $this->db->from('tugas_siswa');
        $this->db->join('guru', 'guru.no_regis = tugas_siswa.no_regis_guru');
        $this->db->join('siswa', 'siswa.no_regis = tugas_siswa.no_regis_siswa');
        $this->db->join('mapel', 'mapel.id = tugas_siswa.mapel_id');
        $this->db->join('kelas', 'kelas.id = tugas_siswa.kelas_id');
        $this->db->order_by('tugas_siswa.id', 'ASC');
        $this->db->where('no_regis_guru', $no_regis);
        $this->db->where('tugas_id', $id_tugas);
        $this->db->where('telat', 1);
        return $this->db->get()->result_array();
    }

    public function getSiswaTugasByregis($no_regis, $id_tugas)
    {
        $this->db->select('*');
        $this->db->from('tugas_siswa');
        $this->db->join('guru', 'guru.no_regis = tugas_siswa.no_regis_guru');
        $this->db->join('siswa', 'siswa.no_regis = tugas_siswa.no_regis_siswa');
        $this->db->join('mapel', 'mapel.id = tugas_siswa.mapel_id');
        $this->db->join('kelas', 'kelas.id = tugas_siswa.kelas_id');
        $this->db->where('no_regis_siswa', $no_regis);
        $this->db->where('tugas_id', $id_tugas);
        return $this->db->get()->row_array();
    }
}
