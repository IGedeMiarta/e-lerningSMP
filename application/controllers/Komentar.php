<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller
{

    public function materi()
    {
        $data = [
            'id_materi' => $this->input->post('id_materi', TRUE),
            'email' => $this->input->post('email_materi', TRUE),
            'nama' => $this->input->post('nama_materi', TRUE),
            'pesan' => $this->input->post('pesan_materi', TRUE),
            'gambar_chat' => $this->input->post('gambar_chat_materi', TRUE)
        ];

        $this->db->insert('komentar', $data);
    }

    function getAllkomenMateri()
    {
        $id_materi = decrypt_url($this->input->post('id_materi'));
        $komen_materi = $this->db->get_where('komentar', ['id_materi' => $id_materi])->result();
        $dataKomen = $komen_materi;
        echo json_encode($dataKomen);
    }

    public function tugas()
    {
        $data = [
            'id_tugas' => $this->input->post('id_tugas', TRUE),
            'email' => $this->input->post('email_tugas', TRUE),
            'nama' => $this->input->post('nama_tugas', TRUE),
            'pesan' => $this->input->post('pesan_tugas', TRUE),
            'gambar_chat' => $this->input->post('gambar_chat_tugas', TRUE)
        ];

        $this->db->insert('komen_tugas', $data);
    }

    function getAllkomenTugas()
    {
        $id_tugas = decrypt_url($this->input->post('id_tugas'));
        $komen_tugas = $this->db->get_where('komen_tugas', ['id_tugas' => $id_tugas])->result();
        $dataKomen = $komen_tugas;
        echo json_encode($dataKomen);
    }

    public function roomchat()
    {
        $data = [
            'id_kelas' => $this->input->post('id_kelas_rm', TRUE),
            'email' => $this->input->post('email_rm', TRUE),
            'nama' => $this->input->post('nama_rm', TRUE),
            'pesan' => $this->input->post('pesan_rm', TRUE),
            'gambar_rm' => $this->input->post('gambar_rm', TRUE)
        ];

        $this->db->insert('room_chat', $data);
        // redirect('user');
    }
    public function getAllroomChat()
    {
        $email = $this->session->userdata('email');
        $siswa = $this->db->get_where('siswa', ['email' => $email])->row_array();
        $komen_kelas = $this->db->get_where('room_chat', ['id_kelas' => $siswa['id_kelas']])->result();
        $dataKomen = $komen_kelas;
        echo json_encode($dataKomen);
    }
}
