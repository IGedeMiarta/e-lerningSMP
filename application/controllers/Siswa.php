<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_student();
        $this->load->model('Siswa_model', 'siswa');
        $this->load->model('Guru_model', 'guru');
        $this->load->model('Mapel_model', 'mapel');
        $this->load->model('Materi_model', 'materi');
        $this->load->model('Tugas_model', 'tugas');
        $this->load->model('Pemberitahuan_model', 'pemberitahuan');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {

        $data['judul'] = "Smart Student | Students";
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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('students/index', $data);
        $this->load->view('templates/footer');
    }

    public function Materi($id_materi1)
    {
        $id_materi = decrypt_url($id_materi1);

        $email = $this->session->userdata('email');
        $role = $this->session->userdata('role_id');
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $email])->row_array();
        $id_kelas = $data['siswa']['id_kelas'];
        $data['komentar'] = $this->db->get_where('komentar', ['id_materi' => $id_materi])->result_array();

        $data['judul'] = "Smart Student | Students";
        $data['materi'] = $this->materi->getMateriById($id_materi);

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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('students/materi', $data);
        $this->load->view('templates/footer');
    }

    public function tugas()
    {

        $data['judul'] = "Smart Student | Tugas";
        $data['tugas'] = $this->tugas->siswaTugas();
        $data['materi'] = $this->materi->siswaMateri();

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
        // $menit = 20;
        // $waktu = time() + (60 * $menit);
        // echo date('l, d-m-y H:i:s', $waktu);
        // echo '<br>';
        // echo date('l, d-m-y H:i:s', time());
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('students/tugas', $data);
        $this->load->view('templates/footer');
    }

    public function lihatTugas($id_tugas1)
    {

        $id_tugas = decrypt_url($id_tugas1);

        $data['judul'] = "Smart Student | Tasks";
        $data['tugas'] = $this->tugas->getSiswaTugasById($id_tugas);
        $data['komentar'] = $this->db->get_where('komen_tugas', ['id_tugas' => $id_tugas])->result_array();

        $email_siswa = $this->session->userdata('email');
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $email_siswa])->row_array();

        $where = [
            'no_regis_siswa' => $data['siswa']['no_regis'],
            'tugas_id' => $id_tugas,
        ];

        $data['lihatTugas'] = $this->db->get_where('tugas_siswa', $where)->row_array();

        // var_dump($data['tugas']['nama_tugas']);
        // die;
        $data['materi'] = $this->materi->siswaMateri();

        $data['pemberitahuan'] = $this->pemberitahuan->getAllPemberitahuan();

        date_default_timezone_set('Asia/Jakarta');
        foreach ($data['pemberitahuan'] as $p) {
            $waktu =  time();
            $batas = ($p['date_created'] + (60 * 60));
            if ($waktu >= $batas) {
                $where = 'date_created' < $batas;
                $this->db->delete('pemberitahuan', $where);
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('students/lihat-tugas', $data);
        $this->load->view('templates/footer');
    }
}
