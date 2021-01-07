<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Eror extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_user();
        $this->load->model('Guru_model', 'guru');
        $this->load->model('Siswa_model', 'siswa');
        $this->load->model('Materi_model', 'materi');
        $this->load->model('Pemberitahuan_model', 'pemberitahuan');
    }

    public function index()
    {
        // Membuat Judul Halaman
        $data['judul'] = "Smart Students | Error";
        $data['materi'] = $this->materi->siswaMateri();
        $email = $this->session->userdata('email');
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $email])->row_array();
        $id_kelas = $data['siswa']['id_kelas'];

        // Pemberitahuan
        $data['pemberitahuan'] = $this->pemberitahuan->getAllPemberitahuan();
        $data['pemberitahuanMateri'] = $this->pemberitahuan->getAllPemberitahuanMateri();
        $data['pemberitahuanTugas'] = $this->pemberitahuan->getAllPemberitahuanTugas();

        date_default_timezone_set('Asia/Jakarta');
        foreach ($data['pemberitahuan'] as $p) {
            $waktu =  time();
            $batas = ($p['date_created'] + (60 * 60));
            if ($waktu >= $batas) {
                $where = 'date_created' < $batas;
                $this->db->delete('pemberitahuan', $where);
            }
        }

        $role_id = $this->session->userdata('role_id');
        $data['admin'] = $this->db->get_where('admin', ['role_id' => $role_id])->result_array();
        $data['guru'] = $this->db->get_where('guru', ['role_id' => $role_id])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('404', $data);
        $this->load->view('templates/footer');
    }
}
